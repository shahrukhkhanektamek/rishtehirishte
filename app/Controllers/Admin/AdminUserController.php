<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use CodeIgniter\Database\Database;
use CodeIgniter\Config\Services;
use App\Models\ImageModel;

class AdminUserController extends BaseController
{
     protected $arr_values = array(
        'routename'=>'admin-user.', 
        'title'=>'User', 
        'table_name'=>'users',
        'page_title'=>'User',
        "folder_name"=>'backend/admin/user',
        "upload_path"=>'upload/',
        "page_name"=>'single-user.php',
       );

      public function __construct()
      {
        create_importent_columns($this->arr_values['table_name']);
        $this->db = \Config\Database::connect();
        $this->pager = \Config\Services::pager();
      }

    public function index()
    {
        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "Manage ".$this->arr_values['page_title'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url(route_to($this->arr_values['routename'].'list'));      
        $data['pagenation'] = array($this->arr_values['title']);
        return view($this->arr_values['folder_name'].'/index',compact('data'));
    }
    public function load_data()
    { 
        $limit = $this->request->getVar('limit');
        $status = $this->request->getVar('status');
        $type = $this->request->getVar('type');
        $order_by = $this->request->getVar('order_by');
        $filter_search_value = $this->request->getVar('filter_search_value');
        $page = $this->request->getVar('page') ?: 1; 
        $offset = ($page - 1) * $limit;



        $register_by = $this->request->getVar('register_by');
        $search_by = $this->request->getVar('search_by');




        $data['table_name'] = $this->arr_values['table_name'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url(route_to($this->arr_values['routename'].'list'));   

        $data_list = $this->db->table($this->arr_values['table_name'])->where([$this->arr_values['table_name'].'.status' => $status,])
        ->join("education as education","education.id={$this->arr_values['table_name']}.highestdegree","left")
        ->join("occupation as occupation","occupation.id={$this->arr_values['table_name']}.occupation","left")
        ->join("religion as religion","religion.id={$this->arr_values['table_name']}.religion","left")
        ->join("caste as caste","caste.id={$this->arr_values['table_name']}.caste","left")
        ->join("languages as languages","languages.id={$this->arr_values['table_name']}.mothertongue","left")
        ->join("states as states","states.id={$this->arr_values['table_name']}.state","left")
        ->select([
            "{$this->arr_values['table_name']}.*",
            "education.name as education_name",
            "occupation.name as occupation_name",
            "religion.name as religion_name",
            "caste.name as caste_name",
            "languages.name as mothertongue_name",
            "states.name as state_name",
        ])
        ->where($this->arr_values['table_name'].'.role =', $type);

        if (!empty($filter_search_value)) {
            if($search_by==1) $data_list->like($this->arr_values['table_name'].'.name', $filter_search_value);
            if($search_by==2) $data_list->like($this->arr_values['table_name'].'.email', $filter_search_value);
            if($search_by==3) $data_list->like($this->arr_values['table_name'].'.phone', $filter_search_value);
            if($search_by==4) $data_list->like($this->arr_values['table_name'].'.user_id', $filter_search_value);            
        }

        if(!empty($register_by)) $data_list->where("register_by",$register_by);


        $total = $data_list->countAllResults(false);
        $data_list = $data_list->orderBy($this->arr_values['table_name'].'.id',$order_by)
        ->limit($limit, $offset)
        ->get()->getResult();
          


        $data['pager'] = $this->pager->makeLinks($page, $limit, $total);
        $data['totalData'] = $total;
        $data['startData'] = $offset+1;
        $data['endData'] = ($offset + $limit > $total) ? $total : ($offset + $limit);


        $view = view($this->arr_values['folder_name'].'/table',compact('data_list','data'),[],true);
        $responseCode = 200;
        $result['status'] = $responseCode;
        $result['message'] = 'Success';
        $result['action'] = 'view';
        $result['data'] = ["list"=>$view,];
        return $this->response->setStatusCode($responseCode)->setJSON($result);
    }
    public function add()
    {
        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "Add ".$this->arr_values['page_title'];
        $data['table_name'] = $this->arr_values['table_name'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url(route_to($this->arr_values['routename'].'list'));    
        $data['pagenation'] = array($this->arr_values['title']);
        $row = [];
        $db=$this->db;
        return view($this->arr_values['folder_name'].'/form',compact('data','row','db'));
    }
    public function edit($id=null)
    {   
        $id = decript($id);
        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "Edit ".$this->arr_values['page_title'];
        $data['table_name'] = $this->arr_values['table_name'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url(route_to($this->arr_values['routename'].'list'));           
        $data['pagenation'] = array($this->arr_values['title']);

        $row = $this->db->table($this->arr_values['table_name'])->where(["id"=>$id,])->get()->getFirstRow();
        if(!empty($row))
        {
            $rowR = $this->db->table("requirement_form")->where(["user_id"=>$row->id,])->get()->getFirstRow();

            $db=$this->db;
            return view($this->arr_values['folder_name'].'/form',compact('data','row','rowR','db'));
        }
        else
        {
            return view('admin/404',compact('data'));            
        }
    }
    public function view($id=null)
    {   
        $id = decript($id);
        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "View ".$this->arr_values['page_title'];
        $data['table_name'] = $this->arr_values['table_name'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url(route_to($this->arr_values['routename'].'list'));           
        $data['pagenation'] = array($this->arr_values['title']);

        $row = $this->db->table($this->arr_values['table_name'])
        ->join('countries', 'countries.id = ' . $this->arr_values['table_name'] . '.country', 'left')
        ->join('states', 'states.id = ' . $this->arr_values['table_name'] . '.state', 'left')

        ->select("
                {$this->arr_values['table_name']}.*, 
                CASE
                    WHEN {$this->arr_values['table_name']}.role = 2 THEN 'User'
                    WHEN {$this->arr_values['table_name']}.role = 3 THEN 'Advocate'
                    WHEN {$this->arr_values['table_name']}.role = 4 THEN 'CA'
                    WHEN {$this->arr_values['table_name']}.role = 5 THEN 'Adviser'
                    WHEN {$this->arr_values['table_name']}.role = 6 THEN 'Employee'
                    ELSE 'other'
                END AS role_name,
                states.name as state_name,
                countries.name as country_name,
            ")

        ->where([$this->arr_values['table_name'] .".id"=>$id,])->get()->getFirstRow();
        if(!empty($row))
        {
            $db=$this->db;
            return view($this->arr_values['folder_name'].'/account-view',compact('data','row','db'));
        }
        else
        {
            return view('admin/404',compact('data'));            
        }
    }
    public function change_password($id=null)
    {   
        $id = decript($id);
        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "View ".$this->arr_values['page_title'];
        $data['table_name'] = $this->arr_values['table_name'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url(route_to($this->arr_values['routename'].'list'));           
        $data['pagenation'] = array($this->arr_values['title']);

        $row = $this->db->table($this->arr_values['table_name'])
        ->join('countries', 'countries.id = ' . $this->arr_values['table_name'] . '.country', 'left')
        ->join('states', 'states.id = ' . $this->arr_values['table_name'] . '.state', 'left')

        ->select("
                {$this->arr_values['table_name']}.*, 
                CASE
                    WHEN {$this->arr_values['table_name']}.role = 3 THEN 'Advocate'
                    WHEN {$this->arr_values['table_name']}.role = 4 THEN 'CA'
                    WHEN {$this->arr_values['table_name']}.role = 5 THEN 'Adviser'
                    ELSE 'other'
                END AS role_name,
                states.name as state_name,
                countries.name as country_name,
            ")

        ->where([$this->arr_values['table_name'] .".id"=>$id,])->get()->getFirstRow();
        if(!empty($row))
        {
            $db=$this->db;
            return view($this->arr_values['folder_name'].'/change-password',compact('data','row','db'));
        }
        else
        {
            return view('admin/404',compact('data'));            
        }
    }

    public function change_password_action()
    {
        $id = decript($this->request->getPost('id'));

        $session = session()->get('user');
        $add_by = $session['id'];

        $data = [
            "password"=>md5($this->request->getPost('password')),
        ];


        if($this->request->getPost('password')!=$this->request->getPost('cpassword'))
        {
            $action = 'add';
            if(empty($insertId)) $action = 'edit';
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = 'Confirm Password Not Match!';
            $result['action'] = $action;
            $result['data'] = [];
            return $this->response->setStatusCode($responseCode)->setJSON($result);               
        }


        $entryStatus = false;
        
        if($this->db->table($this->arr_values['table_name'])->where('id', $id)->update($data)) $entryStatus = true;
        else $entryStatus = false;
        


        if($entryStatus)
        {
            $action = 'add';
            if(empty($insertId)) $action = 'edit';
            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Success';
            $result['action'] = $action;
            $result['data'] = [];
            return $this->response->setStatusCode($responseCode)->setJSON($result);            
        }
        else
        {
            $action = 'add';
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = $this->db->error()['message'];
            $result['action'] = $action;
            $result['data'] = [];
            return $this->response->setStatusCode($responseCode)->setJSON($result);
        }
    }

    public function update()
    {
        $id = decript($this->request->getPost('id'));

        $session = session()->get('user');
        $add_by = $session['id'];

        $data = [
            "name"=>$this->request->getPost('name'),
            "email"=>$this->request->getPost('email'),
            "phone"=>$this->request->getPost('phone'),
            "alt_phone"=>$this->request->getPost('alt_phone'),
            "gender"=>$this->request->getPost('gender'),
            "gender"=>$this->request->getPost('gender'),
            "dob"=>$this->request->getPost('year').'-'.$this->request->getPost('month').'-'.$this->request->getPost('day'),
            "place_of_birth"=>$this->request->getPost('place_of_birth'),
            "time_of_birth"=>$this->request->getPost('time_of_birth'),
            "profilefor"=>$this->request->getPost('profilefor'),
            "country"=>$this->request->getPost('country'),
            "state"=>$this->request->getPost('state'),
            "city"=>$this->request->getPost('city'),
            "pincode"=>$this->request->getPost('pincode'),
            "address"=>$this->request->getPost('address'),
            
            "mothertongue"=>$this->request->getPost('mothertongue'),
            "challenged"=>$this->request->getPost('challenged'),
            "maritalstatus"=>$this->request->getPost('maritalstatus'),
            "havechildren"=>$this->request->getPost('havechildren'),
            "religion"=>$this->request->getPost('religion'),
            "caste"=>$this->request->getPost('caste'),
            "manglik"=>$this->request->getPost('manglik'),
            "height"=>$this->request->getPost('height'),
            "complexion"=>$this->request->getPost('complexion'),
            "body_type"=>$this->request->getPost('body_type'),
            "highestdegree"=>$this->request->getPost('highestdegree'),
            "collegename"=>$this->request->getPost('collegename'),
            "occupation"=>$this->request->getPost('occupation'),
            "annualincome"=>$this->request->getPost('annualincome'),
            "annualincomeindoller"=>$this->request->getPost('annualincomeindoller'),
            "diet"=>$this->request->getPost('diet'),
            "expressyou"=>$this->request->getPost('expressyou'),
            "family_type"=>$this->request->getPost('family_type'),
            "family_living"=>$this->request->getPost('family_living'),
            "father_name"=>$this->request->getPost('father_name'),
            "father_occupation"=>$this->request->getPost('father_occupation'),
            "father_annualincome"=>$this->request->getPost('father_annualincome'),
            "mother_name"=>$this->request->getPost('mother_name'),
            "mother_annualincome"=>$this->request->getPost('mother_annualincome'),
            "brother_married"=>$this->request->getPost('brother_married'),
            "brother_unmarried"=>$this->request->getPost('brother_unmarried'),
            "sister_married"=>$this->request->getPost('sister_married'),
            "sister_unmarried"=>$this->request->getPost('sister_unmarried'),
            "aboutfamily"=>$this->request->getPost('aboutfamily'),

            "status"=>$this->request->getPost('status'),
            "is_delete"=>0,
        ];


        $email = $this->request->getPost('email');
        $checkEmail = $this->db->table($this->arr_values['table_name'])->where('id !=', $id)->where(["email"=>$email,])->get()->getFirstRow();
        if(!empty($checkEmail))
        {
            $action = 'add';
            if(empty($id)) $action = 'edit';
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = 'Email id exist!';
            $result['action'] = $action;
            $result['data'] = [];
            return $this->response->setStatusCode($responseCode)->setJSON($result);               
        }





        $entryStatus = false;
        if(empty($id))
        {
            $data['register_by'] = 'admin';
            $data['add_by'] = $add_by;
            $data['add_date_time'] = date("Y-m-d H:i:s");
            $data['update_date_time'] = date("Y-m-d H:i:s");
            if($this->db->table($this->arr_values['table_name'])->insert($data)) $entryStatus = true;
            else $entryStatus = false;
            $id = $insertId = $this->db->insertID();
        }
        else
        {
            $data['update_date_time'] = date("Y-m-d H:i:s");
            if($this->db->table($this->arr_values['table_name'])->where('id', $id)->update($data)) $entryStatus = true;
            else $entryStatus = false;
        }


        if($entryStatus)
        {


            $requirmentData = [
                "agestart"=>$this->request->getPost("agestartR"),
                "ageend"=>$this->request->getPost("ageendR"),
                "heightstart"=>$this->request->getPost("heightstartR"),
                "heightend"=>$this->request->getPost("heightendR"),
                "children"=>$this->request->getPost("childrenR"),
                "income"=>$this->request->getPost("incomeR"),
                "incomeend"=>$this->request->getPost("incomeendR"),
                "incomedollar"=>$this->request->getPost("incomedollarR"),
                "incomeenddollar"=>$this->request->getPost("incomeenddollarR"),

                "religion"=>json_encode($this->request->getPost("religionR")),
                "caste"=>json_encode($this->request->getPost("casteR")),
                "maritalstatus"=>json_encode($this->request->getPost("maritalstatusR")),
                "manglik"=>json_encode($this->request->getPost("manglikR")),
                "education"=>json_encode($this->request->getPost("educationR")),
                "occupation"=>json_encode($this->request->getPost("occupationR")),
                "country"=>json_encode($this->request->getPost("countryR")),
                "state"=>json_encode($this->request->getPost("stateR")),
                "challenged"=>json_encode($this->request->getPost("challengedR")),
                "otherrequirements"=>$this->request->getPost("otherrequirementsR"),
            ];
            $check = $this->db->table("requirement_form")->where(["user_id"=>$id,])->get()->getFirstRow();
            if(empty($check))
            {
                $this->db->table('requirement_form')->insert($requirmentData);
            }
            else
            {
                $this->db->table('requirement_form')->where(["user_id"=>$id,])->update($requirmentData);
            }







            $ImageModel = new ImageModel();

            $all_image_column_names = ['images'];
            $return_image_array = $ImageModel->upload_multiple_image($all_image_column_names,$this->arr_values['table_name'],$id,$this->request);
            if(!empty($return_image_array))
            {
                foreach ($return_image_array as $key => $value)
                {
                    if(!empty($value)) $update_data[$key] = $value;
                }
            }
            else
            {
                foreach ($all_image_column_names as $key => $value)
                {
                    $update_data[$value] = json_encode([]);
                }
            }

            if(!empty($update_data))
            {
                $this->db->table($this->arr_values['table_name'])->where(["id"=>$id,])->update($update_data);
            } 





            $action = 'add';
            if(empty($insertId)) $action = 'edit';
            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Success';
            $result['action'] = $action;
            $result['data'] = [];
            return $this->response->setStatusCode($responseCode)->setJSON($result);            
        }
        else
        {
            $action = 'add';
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = $this->db->error()['message'];
            $result['action'] = $action;
            $result['data'] = [];
            return $this->response->setStatusCode($responseCode)->setJSON($result);
        }
    }
    public function block_unblock($id)
    {
        $id = decript($id);
        $status = $this->request->getPost('status');

        $user = $this->db->table($this->arr_values['table_name'])->where(["id"=>$id,])->get()->getFirstRow();

        $status = 1;
        if($user->status==1) $status = 0;
        else $status = 1;

        $data = [
            "status"=>$status,
        ];
        if($this->db->table($this->arr_values['table_name'])->where('id', $id)->update($data))
        {
            $action = 'view';
            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Successfuly';
            $result['action'] = $action;
            $result['data'] = [];
            return $this->response->setStatusCode($responseCode)->setJSON($result);
        }
        else
        {
            $action = 'view';
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = $this->db->error()['message'];
            $result['action'] = $action;
            $result['data'] = [];
            return $this->response->setStatusCode($responseCode)->setJSON($result);
        }
    }
    public function delete($id)
    {
        $id = decript($id);
        $data = $this->db->table($this->arr_values['table_name'])->where(["id"=>$id,])->get()->getFirstRow();
        $slug = $data->slug;
        if($this->db->table($this->arr_values['table_name'])->where("id", $id)->delete())
        {
            $this->db->table('slugs')->where(["slug"=>$slug,"table_name"=>$this->arr_values['table_name'],])->delete();
            $this->db->table("meta_tags")->where("slug", $slug)->delete();
            $action = 'delete';
            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Delete Successfuly';
            $result['action'] = $action;
            $result['data'] = [];
            return $this->response->setStatusCode($responseCode)->setJSON($result);
        }
        else
        {
            $action = 'delete';
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = $this->db->error()['message'];
            $result['action'] = $action;
            $result['data'] = [];
            return $this->response->setStatusCode($responseCode)->setJSON($result);
        }
    }

}