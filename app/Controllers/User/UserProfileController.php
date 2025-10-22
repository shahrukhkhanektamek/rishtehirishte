<?php
namespace App\Controllers\User;
use App\Controllers\BaseController;
use CodeIgniter\Database\Database;
use CodeIgniter\Config\Services;
use App\Models\ImageModel;
 
class UserProfileController extends BaseController
{
     protected $arr_values = array(
        'routename'=>'user.profile.', 
        'title'=>'Profile', 
        'table_name'=>'users',
        'page_title'=>'Profile',
        "folder_name"=>'user/profile',
        "upload_path"=>'upload/',
        "page_name"=>'profile.php',
       );

      public function __construct()
      {
        create_importent_columns($this->arr_values['table_name']);
        $this->db = \Config\Database::connect();
      }

    public function index()
    {
        $session = session()->get('user');
        $user_id = $id = $session['id'];

        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "Manage ".$this->arr_values['page_title'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url(route_to($this->arr_values['routename'].'index'));      
        $data['pagenation'] = array($this->arr_values['title']);

        $table_name = $this->arr_values['table_name'];
        // ✅ Active package subquery (हर user का latest active package)
        $activePackageSubQuery = "
            SELECT up1.*
            FROM user_package up1
            INNER JOIN (
                SELECT user_id, MAX(plan_end_date_time) AS latest_end
                FROM user_package
                WHERE is_delete=0
                GROUP BY user_id
            ) up2
            ON up1.user_id = up2.user_id
            AND up1.plan_end_date_time = up2.latest_end
        ";
        $row = $this->db->table('users')->where(["users.id"=>$user_id])
        ->join("education as education","education.id={$table_name}.highestdegree","left")
        ->join("occupation as occupation","occupation.id={$table_name}.occupation","left")
        ->join("religion as religion","religion.id={$table_name}.religion","left")
        ->join("caste as caste","caste.id={$table_name}.caste","left")
        ->join("languages as languages","languages.id={$table_name}.mothertongue","left")
        ->join("countries as countries","countries.id={$table_name}.country","left")
        ->join("states as states","states.id={$table_name}.state","left")
        ->join("($activePackageSubQuery) as user_package",
               "user_package.user_id = {$table_name}.id",
               "left")
        ->select([
                "{$table_name}.*",
                "education.name as education_name",
                "occupation.name as occupation_name",
                "religion.name as religion_name",
                "caste.name as caste_name",
                "languages.name as mothertongue_name",
                "states.name as state_name",
                "countries.name as country_name",
                "user_package.id as user_package_id",
                "user_package.package_name as package_name",
                "user_package.plan_start_date_time as plan_start_date_time",
                "user_package.plan_end_date_time as plan_end_date_time",
                "user_package.contact_limit as contact_limit",
                "user_package.view_contact as view_contact",
                "TIMESTAMPDIFF(YEAR, {$table_name}.dob, CURDATE()) as age",
            ])
        ->get()->getFirstRow();
        $rowR = $this->db->table("requirement_form")->where(["user_id"=>$id,])->get()->getFirstRow();
        $db = $this->db;
        $mainData = $this->mainData;
        return view($this->arr_values['folder_name'].'/form',compact('data','row','rowR','db','mainData'));
    }
    public function complete_profile()
    {
        $session = session()->get('user');
        $user_id = $id = $session['id'];

        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "Manage ".$this->arr_values['page_title'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url(route_to($this->arr_values['routename'].'index'));      
        $data['pagenation'] = array($this->arr_values['title']);
        // $row = $this->db->table($this->arr_values['table_name'])->where(["id"=>$id,])->get()->getFirstRow();


        $table_name = $this->arr_values['table_name'];
        // ✅ Active package subquery (हर user का latest active package)
        $activePackageSubQuery = "
            SELECT up1.*
            FROM user_package up1
            INNER JOIN (
                SELECT user_id, MAX(plan_end_date_time) AS latest_end
                FROM user_package
                WHERE is_delete=0
                GROUP BY user_id
            ) up2
            ON up1.user_id = up2.user_id
            AND up1.plan_end_date_time = up2.latest_end
        ";
        $row = $this->db->table('users')->where(["users.id"=>$user_id])
        ->join("education as education","education.id={$table_name}.highestdegree","left")
        ->join("occupation as occupation","occupation.id={$table_name}.occupation","left")
        ->join("religion as religion","religion.id={$table_name}.religion","left")
        ->join("caste as caste","caste.id={$table_name}.caste","left")
        ->join("languages as languages","languages.id={$table_name}.mothertongue","left")
        ->join("countries as countries","countries.id={$table_name}.country","left")
        ->join("states as states","states.id={$table_name}.state","left")
        ->join("($activePackageSubQuery) as user_package",
               "user_package.user_id = {$table_name}.id",
               "left")
        ->select([
                "{$table_name}.*",
                "education.name as education_name",
                "occupation.name as occupation_name",
                "religion.name as religion_name",
                "caste.name as caste_name",
                "languages.name as mothertongue_name",
                "states.name as state_name",
                "countries.name as country_name",
                "user_package.id as user_package_id",
                "user_package.package_name as package_name",
                "user_package.plan_start_date_time as plan_start_date_time",
                "user_package.plan_end_date_time as plan_end_date_time",
                "user_package.contact_limit as contact_limit",
                "user_package.view_contact as view_contact",
                "TIMESTAMPDIFF(YEAR, {$table_name}.dob, CURDATE()) as age",
            ])
        ->get()->getFirstRow();


        $rowR = $this->db->table("requirement_form")->where(["user_id"=>$id,])->get()->getFirstRow();
        $db = $this->db;
        $mainData = $this->mainData;
        return view('user/complete-profile',compact('data','row','rowR','db','mainData'));
    }

    public function view()
    {
        $session = session()->get('user');
        $id = $session['id'];

        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "Manage ".$this->arr_values['page_title'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url(route_to($this->arr_values['routename'].'index'));      
        $data['pagenation'] = array($this->arr_values['title']);
        $row = $this->db->table($this->arr_values['table_name'])->where(["id"=>$id,])->get()->getFirstRow();
        $db = $this->db;
        $mainData = $this->mainData;
        return view($this->arr_values['folder_name'].'/view',compact('data','row','db','mainData'));
    }
    public function update()
    {
        
        $session = session()->get('user');
        $add_by = $session['id'];
        $id = $add_by;

        $data = [
            "name"=>$this->request->getPost('name'),
            "phone"=>$this->request->getPost('phone'),
            "email"=>$this->request->getPost('email'),
            "address"=>$this->request->getPost('address'),
            "country"=>$this->request->getPost('country'),
            "state"=>$this->request->getPost('state'),
            "city"=>$this->request->getPost('city'),
            "pincode"=>$this->request->getPost('pincode'),
            "status"=>1,
        ];

        $entryStatus = false;
        
        if($this->db->table($this->arr_values['table_name'])->where('id', $id)->update($data)) $entryStatus = true;
        else $entryStatus = false;        


        if($entryStatus)
        {
            $action = 'edit';
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



    public function step1()
    {
        
        $session = session()->get('user');
        $add_by = $session['id'];
        $id = $add_by;

        $data = [
            "name"=>$this->request->getPost('name'),
            // "email"=>$this->request->getPost('email'),
            "phone"=>$this->request->getPost('phone'),
            "alt_phone"=>$this->request->getPost('alt_phone'),
            // "gender"=>$this->request->getPost('gender'),
            // "dob"=>$this->request->getPost('dob'),
            "place_of_birth"=>$this->request->getPost('place_of_birth'),
            "time_of_birth"=>$this->request->getPost('time_of_birth'),
            "profilefor"=>$this->request->getPost('profilefor'),
            "update_date_time"=>date("Y-m-d H:i:s"),
        ];

        $entryStatus = false;
        
        if($this->db->table($this->arr_values['table_name'])->where('id', $id)->update($data)) $entryStatus = true;
        else $entryStatus = false;        


        if($entryStatus)
        {
            $action = 'step';
            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Success';
            $result['position'] = 'next';
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
    public function step2()
    {
        
        $session = session()->get('user');
        $add_by = $session['id'];
        $id = $add_by;

        $data = [
            
            "mothertongue"=>$this->request->getPost('mothertongue'),
            "challenged"=>$this->request->getPost('challenged'),
            "maritalstatus"=>$this->request->getPost('maritalstatus'),
            "havechildren"=>$this->request->getPost('havechildren'),
            "diet1"=>$this->request->getPost('diet1'),
            "drinking"=>$this->request->getPost('drinking'),
            "smoking"=>$this->request->getPost('smoking'),
            "religion"=>$this->request->getPost('religion'),
            "caste"=>$this->request->getPost('caste'),
            "manglik"=>$this->request->getPost('manglik'),
            "height"=>$this->request->getPost('height'),
            "complexion"=>$this->request->getPost('complexion'),
            "body_type"=>$this->request->getPost('body_type'),
            "country"=>$this->request->getPost('country'),
            "state"=>$this->request->getPost('state'),
            "city"=>$this->request->getPost('city'),
            "pincode"=>$this->request->getPost('pincode'),
            "address"=>$this->request->getPost('address'),            
            "update_date_time"=>date("Y-m-d H:i:s"),
        ];
        

        $entryStatus = false;
        
        if($this->db->table($this->arr_values['table_name'])->where('id', $id)->update($data)) $entryStatus = true;
        else $entryStatus = false;        


        if($entryStatus)
        {

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

            $action = 'step';
            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Success';
            $result['position'] = 'next';
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
    public function step3()
    {
        
        $session = session()->get('user');
        $add_by = $session['id'];
        $id = $add_by;

        $data = [
            "highestdegree"=>$this->request->getPost('highestdegree'),
            "collegename"=>$this->request->getPost('collegename'),
            "occupation"=>$this->request->getPost('occupation'),
            "annualincome"=>$this->request->getPost('annualincome'),
            "annualincomeindoller"=>$this->request->getPost('annualincomeindoller'),
            "diet"=>$this->request->getPost('diet'),
            "expressyou"=>$this->request->getPost('expressyou'),
            "update_date_time"=>date("Y-m-d H:i:s"),
        ];


        $entryStatus = false;
        
        if($this->db->table($this->arr_values['table_name'])->where('id', $id)->update($data)) $entryStatus = true;
        else $entryStatus = false;        


        if($entryStatus)
        {
            $action = 'step';
            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Success';
            $result['position'] = 'next';
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
    public function step4()
    {        
        $session = session()->get('user');
        $add_by = $session['id'];
        $id = $add_by;

        $data = [
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
            "update_date_time"=>date("Y-m-d H:i:s"),
        ];
        

        $entryStatus = false;
        
        if($this->db->table($this->arr_values['table_name'])->where('id', $id)->update($data)) $entryStatus = true;
        else $entryStatus = false;        


        if($entryStatus)
        {
            $action = 'step';
            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Success';
            $result['position'] = 'next';
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
    public function step5()
    {
        
        $session = session()->get('user');
        $add_by = $session['id'];
        $id = $add_by;

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

        $this->db->table($this->arr_values['table_name'])->where('id', $id)->update(["update_date_time"=>date("Y-m-d H:i:s")]);
        

        $entryStatus = false;
        

        $check = $this->db->table("requirement_form")->where(["user_id"=>$id,])->get()->getFirstRow();
        if(empty($check))
        {
            if($this->db->table('requirement_form')->insert($requirmentData))
                $entryStatus = true;
        }
        else
        {
            if($this->db->table('requirement_form')->where(["user_id"=>$id,])->update($requirmentData))
                $entryStatus = true;
        }


        if($entryStatus)
        {
            $action = 'step';
            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Success';
            $result['position'] = 'done';
            $result['url'] = base_url(route_to('user.dashboard'));
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


    public function update_profile_image()
    {
        $session = session()->get('user');
        $add_by = $session['id'];
        $id = $add_by;

        $data = [
            "status"=>1,
        ];

        $image = $this->request->getFile('croppedImage');

        if ($image && $image->isValid() && !$image->hasMoved()) {

            $uploadPath = FCPATH.$this->arr_values['upload_path'];

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            // Unique file name
            $fileName = time() . '-' . uniqid() . '.jpg';

            if ($image->move($uploadPath, $fileName)) {
                
                // Success response (add your response here)
                $data['image'] = $fileName;
                $this->db->table($this->arr_values['table_name'])->where('id', $id)->update($data);
                

                return $this->response->setJSON([
                    'status' => 200,
                    'message' => 'Image uploaded successfully.',
                    'path' => $uploadPath . $fileName,
                    'action' => 'reload',
                    'data' => [],
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 200,
                    'message' => 'Failed to save image.',
                    'action' => 'reload',
                    'data' => [],
                ]);
            }
        } else {
            return $this->response->setJSON([
                'status' => 200,
                'message' => 'No image file uploaded or invalid.',
                'action' => 'reload',
                'data' => [],
            ]);
        }
    }

}