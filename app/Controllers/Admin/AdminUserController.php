<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use CodeIgniter\Database\Database;
use CodeIgniter\Config\Services;
use App\Models\ImageModel;
use App\Models\Custom;

use Dompdf\Dompdf;
use Dompdf\Options;

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
        
        $gender = $this->request->getVar('gender');
        $agestart = $this->request->getVar('agestart');
        $ageend = $this->request->getVar('ageend');
        $fromheight = $this->request->getVar('fromheight');
        $toheight = $this->request->getVar('toheight');

        $religion = $this->request->getVar('religion');
        $caste = $this->request->getVar('caste');
        $maritalstatus = $this->request->getVar('maritalstatus');
        $country = $this->request->getVar('country');
        $state = $this->request->getVar('state');
        $manglik = $this->request->getVar('manglik');
        $highestdegree = $this->request->getVar('highestdegree');
        $occupation = $this->request->getVar('occupation');




        $data['table_name'] = $this->arr_values['table_name'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url(route_to($this->arr_values['routename'].'list'));   


        $date_time = date("Y-m-d H:i:s");
        // ✅ Active package subquery (हर user का latest active package)
        $activePackageSubQuery = "
            SELECT up1.*
            FROM user_package up1
            INNER JOIN (
                SELECT user_id, MAX(plan_end_date_time) AS latest_end
                FROM user_package
                WHERE is_delete=0
                GROUP BY user_id order by 'desc'
            ) up2
            ON up1.user_id = up2.user_id
            AND up1.plan_end_date_time = up2.latest_end
        ";

        $data_list = $this->db->table($this->arr_values['table_name'])
            ->where([$this->arr_values['table_name'].'.status' => $status])
            ->join("education as education","education.id={$this->arr_values['table_name']}.highestdegree","left")
            ->join("occupation as occupation","occupation.id={$this->arr_values['table_name']}.occupation","left")
            ->join("religion as religion","religion.id={$this->arr_values['table_name']}.religion","left")
            ->join("caste as caste","caste.id={$this->arr_values['table_name']}.caste","left")
            ->join("languages as languages","languages.id={$this->arr_values['table_name']}.mothertongue","left")
            ->join("states as states","states.id={$this->arr_values['table_name']}.state","left")
            // ✅ Active Package join
            ->join("($activePackageSubQuery) as user_package",
                   "user_package.user_id = {$this->arr_values['table_name']}.id",
                   "left")
            ->select([
                "{$this->arr_values['table_name']}.*",
                "education.name as education_name",
                "occupation.name as occupation_name",
                "religion.name as religion_name",
                "caste.name as caste_name",
                "languages.name as mothertongue_name",
                "states.name as state_name",
                "user_package.id as user_package_id",           // 👉 Active package id (null = no package)
                "user_package.package_name as package_name",
                "user_package.plan_start_date_time as plan_start_date_time",
                "user_package.plan_end_date_time as plan_end_date_time",
                "user_package.contact_limit as contact_limit",
                "user_package.view_contact as view_contact",
                "TIMESTAMPDIFF(YEAR, {$this->arr_values['table_name']}.dob, CURDATE()) as age",
            ])
            ->where($this->arr_values['table_name'].'.role =', 2);

        if (!empty($filter_search_value)) {
            if($search_by==1) $data_list->like($this->arr_values['table_name'].'.name', $filter_search_value);
            if($search_by==2) $data_list->like($this->arr_values['table_name'].'.email', $filter_search_value);
            if($search_by==3) $data_list->like($this->arr_values['table_name'].'.phone', $filter_search_value);
            if($search_by==4) $data_list->like($this->arr_values['table_name'].'.user_id', $filter_search_value);
        }

        if(!empty($register_by)) $data_list->where("register_by",$register_by);

        if(!empty($gender)) $data_list->where("{$this->arr_values['table_name']}.gender",$gender);
        if(!empty($religion)) $data_list->where("{$this->arr_values['table_name']}.religion",$religion);
        if(!empty($caste)) $data_list->where("{$this->arr_values['table_name']}.caste",$caste);
        if(!empty($maritalstatus)) $data_list->where("{$this->arr_values['table_name']}.maritalstatus",$maritalstatus);
        if(!empty($country)) $data_list->where("{$this->arr_values['table_name']}.country",$country);
        if(!empty($state)) $data_list->where("{$this->arr_values['table_name']}.state",$state);
        if(!empty($manglik)) $data_list->where("{$this->arr_values['table_name']}.manglik",$manglik);
        if(!empty($highestdegree)) $data_list->where("{$this->arr_values['table_name']}.highestdegree",$highestdegree);
        if(!empty($occupation)) $data_list->where("{$this->arr_values['table_name']}.occupation",$occupation);

        $today = date("Y-m-d");
        if(!empty($agestart) && !empty($ageend))
        {
            // Convert age to date of birth range
            $from_date = date("Y-m-d", strtotime("-$ageend years", strtotime($today)));
            $to_date   = date("Y-m-d", strtotime("-$agestart years", strtotime($today)));

            $data_list->where("{$this->arr_values['table_name']}.dob >=", $from_date);
            $data_list->where("{$this->arr_values['table_name']}.dob <=", $to_date);
        }

        if(!empty($fromheight)) $data_list->where("{$this->arr_values['table_name']}.height >=",$fromheight);
        if(!empty($toheight)) $data_list->where("{$this->arr_values['table_name']}.height <=",$toheight);

        $total = $data_list->countAllResults(false);

        $data_list = $data_list->orderBy($this->arr_values['table_name'].'.id',$order_by)
            ->limit($limit, $offset)
            ->get()
            ->getResult();

            // print_r($data_list);
            // die;

          


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
            return view('backend/404',compact('data'));            
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

        $data_list = $this->db->table($this->arr_values['table_name'])
        ->where([$this->arr_values['table_name'] .".id"=>$id,])
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
            "TIMESTAMPDIFF(YEAR, {$this->arr_values['table_name']}.dob, CURDATE()) as age", // 👈 Age calculation
        ])
        ->where($this->arr_values['table_name'].'.role =', 2);        
        $row = $data_list->get()->getFirstRow();

        if(!empty($row))
        {
            $rowR = $this->db->table("requirement_form")->where(["user_id"=>$row->id,])->get()->getFirstRow();
            $db=$this->db;
            return view($this->arr_values['folder_name'].'/view',compact('data','row','db','rowR'));
        }
        else
        {
            return view('backend/404',compact('data'));            
        }
    }
    public function dashboard($id=null)
    {   
        $id = decript($id);
        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "View ".$this->arr_values['page_title'];
        $data['table_name'] = $this->arr_values['table_name'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url(route_to($this->arr_values['routename'].'list'));           
        $data['pagenation'] = array($this->arr_values['title']);

        $data_list = $this->db->table($this->arr_values['table_name'])
        ->where([$this->arr_values['table_name'] .".id"=>$id,])
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
            "TIMESTAMPDIFF(YEAR, {$this->arr_values['table_name']}.dob, CURDATE()) as age", // 👈 Age calculation
        ])
        ->where($this->arr_values['table_name'].'.role =', 2);        
        $row = $data_list->get()->getFirstRow();

        if(!empty($row))
        {
            $rowR = $this->db->table("requirement_form")->where(["user_id"=>$row->id,])->get()->getFirstRow();
            $db=$this->db;
            return view($this->arr_values['folder_name'].'/dashboard',compact('data','row','db','rowR'));
        }
        else
        {
            return view('backend/404',compact('data'));            
        }
    }
    public function inbox($id=null)
    {   
        $id = decript($id);
        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "View ".$this->arr_values['page_title'];
        $data['table_name'] = $this->arr_values['table_name'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url(route_to($this->arr_values['routename'].'list'));           
        $data['pagenation'] = array($this->arr_values['title']);

        $data_list = $this->db->table($this->arr_values['table_name'])
        ->where([$this->arr_values['table_name'] .".id"=>$id,])
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
            "TIMESTAMPDIFF(YEAR, {$this->arr_values['table_name']}.dob, CURDATE()) as age", // 👈 Age calculation
        ])
        ->where($this->arr_values['table_name'].'.role =', 2);        
        $row = $data_list->get()->getFirstRow();

        if(!empty($row))
        {
            $rowR = $this->db->table("requirement_form")->where(["user_id"=>$row->id,])->get()->getFirstRow();
            $db=$this->db;
            return view($this->arr_values['folder_name'].'/inbox',compact('data','row','db','rowR'));
        }
        else
        {
            return view('backend/404',compact('data'));            
        }
    }
    public function load_inbox_data()
    { 
        $limit = $this->request->getVar('limit');
        $status = $this->request->getVar('status');
        $type = $this->request->getVar('type');
        $order_by = $this->request->getVar('order_by');
        $filter_search_value = $this->request->getVar('filter_search_value');
        $page = $this->request->getVar('page') ?: 1; 
        $offset = ($page - 1) * $limit;



        
        $user_id = $this->request->getVar('user_id');
        $search_by = $this->request->getVar('search_by');


        $data['table_name'] = $this->arr_values['table_name'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url(route_to($this->arr_values['routename'].'list'));   


        $date_time = date("Y-m-d H:i:s");
        // ✅ Active package subquery (हर user का latest active package)
        $activePackageSubQuery = "
            SELECT up1.*
            FROM user_package up1
            INNER JOIN (
                SELECT user_id, MAX(plan_end_date_time) AS latest_end
                FROM user_package
                WHERE is_delete=0
                GROUP BY user_id order by 'desc'
            ) up2
            ON up1.user_id = up2.user_id
            AND up1.plan_end_date_time = up2.latest_end
        ";

        $data_list = $this->db->table("request");

        if($type==1)
        {
            $data_list->join("users as users","users.id=request.senderID","left");
            $data_list->where(["receiverID"=>$user_id,]);
        }
        else if($type==2)
        {
            $data_list->join("users as users","users.id=request.receiverID","left");
            $data_list->where(["senderID"=>$user_id,]);            
        }
        else if($type==3)
        {
            $data_list->join("users as users","users.id=request.senderID","left");
            $data_list->where(["receiverID"=>$user_id,]);          
        }
        else if($type==4)
        {
            $data_list->join("users as users","users.id=request.receiverID","left");
            $data_list->where(["senderID"=>$user_id,]);
        }
        if(!empty($status)) $data_list->where(['request.status' => $status]);
        $data_list->join("education as education","education.id={$this->arr_values['table_name']}.highestdegree","left")
            ->join("occupation as occupation","occupation.id={$this->arr_values['table_name']}.occupation","left")
            ->join("religion as religion","religion.id={$this->arr_values['table_name']}.religion","left")
            ->join("caste as caste","caste.id={$this->arr_values['table_name']}.caste","left")
            ->join("languages as languages","languages.id={$this->arr_values['table_name']}.mothertongue","left")
            ->join("states as states","states.id={$this->arr_values['table_name']}.state","left")
            // ✅ Active Package join
            ->join("($activePackageSubQuery) as user_package",
                   "user_package.user_id = {$this->arr_values['table_name']}.id",
                   "left")
            ->select([
                "{$this->arr_values['table_name']}.*",
                "education.name as education_name",
                "occupation.name as occupation_name",
                "religion.name as religion_name",
                "caste.name as caste_name",
                "languages.name as mothertongue_name",
                "states.name as state_name",
                "user_package.id as user_package_id",           // 👉 Active package id (null = no package)
                "user_package.package_name as package_name",
                "user_package.plan_start_date_time as plan_start_date_time",
                "user_package.plan_end_date_time as plan_end_date_time",
                "user_package.contact_limit as contact_limit",
                "user_package.view_contact as view_contact",
                "TIMESTAMPDIFF(YEAR, {$this->arr_values['table_name']}.dob, CURDATE()) as age",

                "request.id as request_id",
                "request.status as request_status",
                "request.senderID as request_senderID",
                "request.receiverID as request_receiverID",
                "request.reqdatetime as request_datetime"
            ])
            ->where($this->arr_values['table_name'].'.role =', 2);

        if (!empty($filter_search_value)) {
            if($search_by==1) $data_list->like($this->arr_values['table_name'].'.name', $filter_search_value);
            if($search_by==2) $data_list->like($this->arr_values['table_name'].'.email', $filter_search_value);
            if($search_by==3) $data_list->like($this->arr_values['table_name'].'.phone', $filter_search_value);
            if($search_by==4) $data_list->like($this->arr_values['table_name'].'.user_id', $filter_search_value);
        }



        $total = $data_list->countAllResults(false);

        $data_list = $data_list->orderBy('request.id',$order_by)
            ->limit($limit, $offset)
            ->get()
            ->getResult();
      


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







    public function viewed_profile($id=null)
    {   
        $id = decript($id);
        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "View ".$this->arr_values['page_title'];
        $data['table_name'] = $this->arr_values['table_name'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url(route_to($this->arr_values['routename'].'list'));           
        $data['pagenation'] = array($this->arr_values['title']);

        $data_list = $this->db->table($this->arr_values['table_name'])
        ->where([$this->arr_values['table_name'] .".id"=>$id,])
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
            "TIMESTAMPDIFF(YEAR, {$this->arr_values['table_name']}.dob, CURDATE()) as age", // 👈 Age calculation
        ])
        ->where($this->arr_values['table_name'].'.role =', 2);        
        $row = $data_list->get()->getFirstRow();

        if(!empty($row))
        {
            $rowR = $this->db->table("requirement_form")->where(["user_id"=>$row->id,])->get()->getFirstRow();
            $db=$this->db;
            return view($this->arr_values['folder_name'].'/viewed-profile',compact('data','row','db','rowR'));
        }
        else
        {
            return view('backend/404',compact('data'));            
        }
    }
    public function load_viewed_profile_data()
    { 
        $limit = $this->request->getVar('limit');
        $status = $this->request->getVar('status');
        $type = $this->request->getVar('type');
        $order_by = $this->request->getVar('order_by');
        $filter_search_value = $this->request->getVar('filter_search_value');
        $page = $this->request->getVar('page') ?: 1; 
        $offset = ($page - 1) * $limit;



        
        $user_id = $this->request->getVar('user_id');
        $search_by = $this->request->getVar('search_by');


        $data['table_name'] = $this->arr_values['table_name'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url(route_to($this->arr_values['routename'].'list'));   


        $date_time = date("Y-m-d H:i:s");
        // ✅ Active package subquery (हर user का latest active package)
        $activePackageSubQuery = "
            SELECT up1.*
            FROM user_package up1
            INNER JOIN (
                SELECT user_id, MAX(plan_end_date_time) AS latest_end
                FROM user_package
                WHERE is_delete=0
                GROUP BY user_id order by 'desc'
            ) up2
            ON up1.user_id = up2.user_id
            AND up1.plan_end_date_time = up2.latest_end
        ";

        $data_list = $this->db->table("user_view_profile");

        
        $data_list->where(['user_view_profile.user_id' => $user_id]);
        $data_list->join("users as users","users.id=user_view_profile.member_id","left");
        $data_list->join("education as education","education.id={$this->arr_values['table_name']}.highestdegree","left")
            ->join("occupation as occupation","occupation.id={$this->arr_values['table_name']}.occupation","left")
            ->join("religion as religion","religion.id={$this->arr_values['table_name']}.religion","left")
            ->join("caste as caste","caste.id={$this->arr_values['table_name']}.caste","left")
            ->join("languages as languages","languages.id={$this->arr_values['table_name']}.mothertongue","left")
            ->join("states as states","states.id={$this->arr_values['table_name']}.state","left")
            // ✅ Active Package join
            ->join("($activePackageSubQuery) as user_package",
                   "user_package.user_id = {$this->arr_values['table_name']}.id",
                   "left")
            ->select([
                "{$this->arr_values['table_name']}.*",
                "education.name as education_name",
                "occupation.name as occupation_name",
                "religion.name as religion_name",
                "caste.name as caste_name",
                "languages.name as mothertongue_name",
                "states.name as state_name",
                "user_package.id as user_package_id",           // 👉 Active package id (null = no package)
                "user_package.package_name as package_name",
                "user_package.plan_start_date_time as plan_start_date_time",
                "user_package.plan_end_date_time as plan_end_date_time",
                "user_package.contact_limit as contact_limit",
                "user_package.view_contact as view_contact",
                "TIMESTAMPDIFF(YEAR, {$this->arr_values['table_name']}.dob, CURDATE()) as age",

            ])
            ->where($this->arr_values['table_name'].'.role =', 2);

        if (!empty($filter_search_value)) {
            if($search_by==1) $data_list->like($this->arr_values['table_name'].'.name', $filter_search_value);
            if($search_by==2) $data_list->like($this->arr_values['table_name'].'.email', $filter_search_value);
            if($search_by==3) $data_list->like($this->arr_values['table_name'].'.phone', $filter_search_value);
            if($search_by==4) $data_list->like($this->arr_values['table_name'].'.user_id', $filter_search_value);
        }



        $total = $data_list->countAllResults(false);

        $data_list = $data_list->orderBy('user_view_profile.id',$order_by)
            ->limit($limit, $offset)
            ->get()
            ->getResult();
      


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
                    WHEN {$this->arr_values['table_name']}.role = 2 THEN 'User'
                    WHEN {$this->arr_values['table_name']}.role = 3 THEN 'CA'
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
            return view('backend/404',compact('data'));            
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
            // if(empty($insertId)) $action = 'edit';
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
            "dob"=>$this->request->getPost('year').'-'.$this->request->getPost('month').'-'.$this->request->getPost('day'),
            "place_of_birth"=>$this->request->getPost('place_of_birth'),
            "time_of_birth"=>$this->request->getPost('time_of_birth'),
            "profilefor"=>$this->request->getPost('profilefor'),
            "country"=>$this->request->getPost('country'),
            "state"=>$this->request->getPost('state'),
            "city"=>$this->request->getPost('city'),
            "pincode"=>$this->request->getPost('pincode'),
            "address"=>$this->request->getPost('address'),

            "diet1"=>$this->request->getPost('diet1'),
            "drinking"=>$this->request->getPost('drinking'),
            "smoking"=>$this->request->getPost('smoking'),
            
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
        if(empty($id))
        {
            $data['password'] = md5($this->request->getPost('password'));
        }


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


    public function profilePdfSave($id = null)
    {
        $id = $this->request->getPost('id');
        $shareUserId = $this->request->getPost('shareUserId');
        $type = $this->request->getPost('type');
        $id = decript($id);

        $data_list = $this->db->table($this->arr_values['table_name'])
        ->where([$this->arr_values['table_name'] .".id"=>$id,])
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
            "TIMESTAMPDIFF(YEAR, {$this->arr_values['table_name']}.dob, CURDATE()) as age", // 👈 Age calculation
        ])
        ->where($this->arr_values['table_name'].'.role =', 2);        
        $row = $data_list->get()->getFirstRow();

        $rowR = $this->db->table("requirement_form")->where(["user_id"=>$row->id,])->get()->getFirstRow();
        $db=$this->db;
        $html = view($this->arr_values['folder_name'].'/profile-pdf',compact('row','db','rowR'));
        

        $phone = '';
        $email = '';
        $shareUser = $this->db->table('users')->where(["id"=>$shareUserId,])->get()->getFirstRow();
        if(!empty($shareUser))
        {
            $phone = $shareUser->phone;
            $email = $shareUser->email;
        }


        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'DejaVu Sans');
        $options->set('dpi', 96); // Default screen DPI
        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // save to writable folder (writable path)
        $output = $dompdf->output();
        $filepath = FCPATH . 'upload/pdfs/';
        if (!is_dir($filepath)) {
            mkdir($filepath, 0777, true); // recursive create with permissions
        }
        $filepath .= 'profile_'.$id.'.pdf';
        file_put_contents($filepath, $output);

        $action = 'view';
        $responseCode = 200;
        $result['status'] = $responseCode;
        $result['message'] = "Success!";
        $result['action'] = $action;
        $result['data'] = [
            "pdf"=>base_url().'upload/pdfs/profile_'.$id.'.pdf',
            "fileName"=>'profile_'.$id.'.pdf',
            "phone"=>$phone,
            "email"=>$email,
            "type"=>$type,
        ];
        return $this->response->setStatusCode($responseCode)->setJSON($result);

        // return redirect()->to(base_url('writable/uploads/pdfs/profile_'.$id.'.pdf'));
    }

    public function assign_package($id=null)
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
                    WHEN {$this->arr_values['table_name']}.role = 3 THEN 'CA'
                    ELSE 'other'
                END AS role_name,
                states.name as state_name,
                countries.name as country_name,
            ")

        ->where([$this->arr_values['table_name'] .".id"=>$id,])->get()->getFirstRow();
        if(!empty($row))
        {
            $db=$this->db;
            return view($this->arr_values['folder_name'].'/assign-package',compact('data','row','db'));
        }
        else
        {
            return view('backend/404',compact('data'));            
        }
    }

    public function assign_package_action()
    {
        $id = decript($this->request->getPost('id')); 
        $pakcageId = $this->request->getPost('pakcage'); 
        $session = session()->get('user');
        $add_by = $session['id'];

        $package = $this->db->table("package")->where(["id"=>$pakcageId,])->get()->getFirstRow();

        $CustomModel = new Custom();
        $CustomModel->insert_user_package($id,$package);

        $action = 'redirect';
        $responseCode = 200;
        $result['status'] = $responseCode;
        $result['message'] = 'Success';
        $result['action'] = $action;
        $result['url'] = base_url(route_to('admin-user.list'));
        $result['data'] = [];
        return $this->response->setStatusCode($responseCode)->setJSON($result);
    }



    public function user_detail()
    {
        $id = decript($this->request->getVar('id'));
        $user = $this->db->table($this->arr_values['table_name'])->where(["id"=>$id,])->get()->getFirstRow();
        $user->image = image_check($user->image,'user.png');

        if(!empty($user))
        {
            $action = 'view';
            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Successfuly';
            $result['action'] = $action;
            $result['data'] = $user;
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
    public function show_hide_detail()
    {
        $id = decript($this->request->getVar('id'));
        $is_mobile_show = $this->request->getVar('mobile');
        $is_email_show = $this->request->getVar('email');

        $user = $this->db->table($this->arr_values['table_name'])->where(["id"=>$id,])->get()->getFirstRow();

        

        $data['is_mobile_show'] = $is_mobile_show?1:0;
        $data['is_email_show'] = $is_email_show?1:0;
        


        if(empty($data))
        {
            $action = 'view';
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = "Select Any One!";
            $result['action'] = $action;
            $result['data'] = [];
            return $this->response->setStatusCode($responseCode)->setJSON($result);
        }

        
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