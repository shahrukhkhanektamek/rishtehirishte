<?php
namespace App\Controllers\User;
use App\Controllers\BaseController;
use CodeIgniter\Database\Database;
use CodeIgniter\Config\Services;
 
class UserMemberController extends BaseController
{
     protected $arr_values = array(
        'routename'=>'user.profile.', 
        'title'=>'Profile', 
        'table_name'=>'users',
        'page_title'=>'Profile',
        "folder_name"=>'user/member',
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
        $id = $session['id'];

        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "Manage ".$this->arr_values['page_title'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url(route_to($this->arr_values['routename'].'index'));      
        $data['pagenation'] = array($this->arr_values['title']);
        $row = $this->db->table($this->arr_values['table_name'])->where(["id"=>$id,])->get()->getFirstRow();
        $db = $this->db;
        $mainData = $this->mainData;
        return view($this->arr_values['folder_name'].'/index',compact('data','row','db','mainData'));
    }
    public function profile($user_id)
    {
        $session = session()->get('user');
        $id = $session['id'];
        // echo $user_id;
        $user_id = @explode(strtolower(env('APP_SORT').'-'), $user_id)[1];
        

        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "Manage ".$this->arr_values['page_title'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url(route_to($this->arr_values['routename'].'index'));      
        $data['pagenation'] = array($this->arr_values['title']);
        
        $db = $this->db;
        $mainData = $this->mainData;


        $table_name = "users";
        $data['table_name'] = $table_name;


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
        $row = $this->db->table('users')->where(["users.user_id"=>$user_id])
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
                "
                CASE
                    WHEN {$table_name}.gender = 1 THEN 'Male'
                    WHEN {$table_name}.gender = 2 THEN 'Female'
                    ELSE 'other'
                END AS gender_name
                ",
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


        
        $check_any_active_plan = check_any_active_plan($id);
        if(!empty($check_any_active_plan['status']))
        {
            $check = $this->db->table("user_view_profile")->where(["member_id"=>$user_id,"user_id"=>$id,])->get()->getFirstRow();
            if(empty($check))
            {
                $this->db->table('user_view_profile')->insert(["user_id"=>$id,"member_id"=>$user_id,"date_time"=>date("Y-m-d H:i:s"),]);
            }
        }

        $rowR = $this->db->table("requirement_form")->where(["user_id"=>$id,])->get()->getFirstRow();
        if(!empty($row))
        {
            return view($this->arr_values['folder_name'].'/view',compact('data','row','rowR','db','mainData'));
        }
        else
        {
            return view('web/404',compact('data','db','mainData'));            
        }


    }


    public function advance_data()
    {
        $session = session()->get('user');
        $user_id = $session['id'];



        $type = $this->request->getVar('type');
        $limit = $this->request->getVar('limit')?:12;
        $status = 1;
        $order_by = $this->request->getVar('order_by');
        $filter_search_value = $this->request->getVar('filter_search_value');
        $page = $this->request->getVar('page') ?: 1; 
        $offset = ($page - 1) * $limit;

        $data['table_name'] = $this->arr_values['table_name'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url(route_to($this->arr_values['routename'].'index'));

        $from_date = $this->request->getVar('from_date');
        $to_date = $this->request->getVar('to_date');





        
        $table_name = "users";
        $data['table_name'] = $table_name;


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
        $user = $this->db->table('users')->where(["users.id"=>$user_id])
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
        $data['user'] = $user;

        $table_name = "users";
        $date_time = date("Y-m-d H:i:s");

        

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
            ->join("countries as countries","countries.id={$this->arr_values['table_name']}.country","left")
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
                "countries.name as country_name",
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






        $data['pager'] = $this->pager->makeLinks($page, $limit, $total);
        $data['totalData'] = $total;
        $data['startData'] = $offset + 1;
        $data['endData'] = ($offset + $limit > $total) ? $total : ($offset + $limit);
        $data['data_list'] = $data_list;
        


        $view = view('user/card/profileListCard',compact('data_list','data'),[],true);
        $responseCode = 200;
        $result['status'] = $responseCode;
        $result['status'] = $responseCode;
        $result['message'] = 'Success';
        $result['action'] = 'view';
        $result['data'] = ["list"=>$view,];
        return $this->response->setStatusCode($responseCode)->setJSON($result);
    }

    public function quick_data()
    {
        $session = session()->get('user');
        $user_id = $session['id'];



        
        $limit = $this->request->getVar('limit')?:12;
        $status = 1;
        $order_by = $this->request->getVar('order_by');
        $filter_search_value = $this->request->getVar('filter_search_value');
        $page = $this->request->getVar('page') ?: 1; 
        $offset = ($page - 1) * $limit;

        $data['table_name'] = $this->arr_values['table_name'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url(route_to($this->arr_values['routename'].'index'));

        $from_date = $this->request->getVar('from_date');
        $to_date = $this->request->getVar('to_date');





        
        $table_name = "users";
        $data['table_name'] = $table_name;


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
        $user = $this->db->table('users')->where(["users.id"=>$user_id])
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

        $table_name = "users";
        $date_time = date("Y-m-d H:i:s");

        

        $gender = $this->request->getVar('gender');
        if(@$user->gender==2) $gender = 1;
        else $gender = 2;
        
        $agestart = $this->request->getVar('agestart');
        $ageend = $this->request->getVar('ageend');

        $religion = $this->request->getVar('religion');
        $caste = $this->request->getVar('caste');
        $maritalstatus = $this->request->getVar('maritalstatus');
        $country = $this->request->getVar('country');
        $state = $this->request->getVar('state');
        $manglik = $this->request->getVar('manglik');

        // echo $user->id; 4345



        


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

        $login_id = $user->id;
        $data_list = $this->db->table($this->arr_values['table_name'])
            ->where([$this->arr_values['table_name'].'.status' => $status])
            ->join("education as education","education.id={$this->arr_values['table_name']}.highestdegree","left")
            ->join("occupation as occupation","occupation.id={$this->arr_values['table_name']}.occupation","left")
            ->join("religion as religion","religion.id={$this->arr_values['table_name']}.religion","left")
            ->join("caste as caste","caste.id={$this->arr_values['table_name']}.caste","left")
            ->join("languages as languages","languages.id={$this->arr_values['table_name']}.mothertongue","left")
            ->join("countries as countries","countries.id={$this->arr_values['table_name']}.country","left")
            ->join("states as states","states.id={$this->arr_values['table_name']}.state","left")
            // ✅ Active Package join
            ->join("($activePackageSubQuery) as user_package",
                   "user_package.user_id = {$this->arr_values['table_name']}.id",
                   "left")
            ->join(
                    "request as req",
                    "( (req.senderID = {$this->arr_values['table_name']}.id AND req.receiverID = $login_id)
                       OR (req.receiverID = {$this->arr_values['table_name']}.id AND req.senderID = $login_id)
                    )",
                    "left"
                )
            ->select([
                "{$this->arr_values['table_name']}.*",
                "education.name as education_name",
                "occupation.name as occupation_name",
                "religion.name as religion_name",
                "caste.name as caste_name",
                "languages.name as mothertongue_name",
                "countries.name as country_name",
                "states.name as state_name",
                "user_package.id as user_package_id",           // 👉 Active package id (null = no package)
                "user_package.package_name as package_name",
                "user_package.plan_start_date_time as plan_start_date_time",
                "user_package.plan_end_date_time as plan_end_date_time",
                "user_package.contact_limit as contact_limit",
                "user_package.view_contact as view_contact",
                "TIMESTAMPDIFF(YEAR, {$this->arr_values['table_name']}.dob, CURDATE()) as age",
                "req.id as request_id",
                "req.status as request_status",
                "req.senderID as request_senderID",
                "req.receiverID as request_receiverID",
                "req.reqdatetime as request_datetime"
            ])
            ->where($this->arr_values['table_name'].'.role =', 2);

        

        if(!empty($gender)) $data_list->where("{$this->arr_values['table_name']}.gender",$gender);
        if(!empty($religion)) $data_list->where("{$this->arr_values['table_name']}.religion",$religion);
        if(!empty($caste)) $data_list->where("{$this->arr_values['table_name']}.caste",$caste);
        if(!empty($maritalstatus)) $data_list->where("{$this->arr_values['table_name']}.maritalstatus",$maritalstatus);
        if(!empty($country)) $data_list->where("{$this->arr_values['table_name']}.country",$country);
        // if(!empty($state)) $data_list->where("{$this->arr_values['table_name']}.state",$state);
        if(!empty($occupation)) $data_list->where("{$this->arr_values['table_name']}.occupation",$occupation);

        $today = date("Y-m-d");
        // if(!empty($agestart) && !empty($ageend))
        // {
        //     // Convert age to date of birth range
        //     $from_date = date("Y-m-d", strtotime("-$ageend years", strtotime($today)));
        //     $to_date   = date("Y-m-d", strtotime("-$agestart years", strtotime($today)));

        //     $data_list->where("{$this->arr_values['table_name']}.dob >=", $from_date);
        //     $data_list->where("{$this->arr_values['table_name']}.dob <=", $to_date);
        // }

        $total = $data_list->countAllResults(false);

        $data_list = $data_list->orderBy($this->arr_values['table_name'].'.id',$order_by)
            ->limit($limit, $offset)
            ->get()
            ->getResult();



        $data['user']  =$user;


        $data['pager'] = $this->pager->makeLinks($page, $limit, $total);
        $data['totalData'] = $total;
        $data['startData'] = $offset + 1;
        $data['endData'] = ($offset + $limit > $total) ? $total : ($offset + $limit);
        $data['data_list'] = $data_list;
        


        $view = view('user/card/profileListCard',compact('data_list','data'),[],true);
        $responseCode = 200;
        $result['status'] = $responseCode;
        $result['status'] = $responseCode;
        $result['message'] = 'Success';
        $result['action'] = 'view';
        $result['data'] = ["list"=>$view,];
        return $this->response->setStatusCode($responseCode)->setJSON($result);
    }
   
    public function send_interest()
    {
        $session = session()->get('user');
        $user_id = $session['id'];

        $db = $this->db;
        
        $check_any_active_plan = check_any_active_plan($user_id);
        // $check_any_active_plan['status'] = 0;
        if(empty($check_any_active_plan['status']))
        {
            $type = 2;
            $view = view('web/card/become-paid-member',compact('db','type'),[],true);

            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'You have no active plan!';
            $result['action'] = 'view';
            $result['type'] = 2;
            $result['data'] = ["view"=>$view,];
            return $this->response->setStatusCode($responseCode)->setJSON($result);
        }
        else if($check_any_active_plan['remaining']<1)
        {
            $type = 3;
            $view = view('web/card/become-paid-member',compact('db','type'),[],true);

            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'You have used all limit!';
            $result['action'] = 'view';
            $result['type'] = 3;
            $result['data'] = ["view"=>$view,];
            return $this->response->setStatusCode($responseCode)->setJSON($result);
        }


        $receiverID = decript($this->request->getPost('member_id'));
        $checkrequest = $this->db->table("request")->where(["senderID"=>$user_id,"receiverID"=>$receiverID,])->get()->getFirstRow();
        if(empty($checkrequest))
        {

            $countLimit = $this->db->table("request")
            ->where("reqdatetime >= ", date("Y-m-d 00:00:00"))
            ->where("reqdatetime <= ", date("Y-m-d 23:59:00"))
            ->where(["senderID"=>$user_id,])->countAllResults();

            if($countLimit>=5)
            {
                $type2 = 1;
                $view = view('user/card/limitExpire',compact('db','type2'),[],true);

                $responseCode = 200;
                $result['status'] = $responseCode;
                $result['message'] = 'You have used all limit!';
                $result['action'] = 'view';
                $result['type'] = 3;
                $result['data'] = ["view"=>$view,];
                return $this->response->setStatusCode($responseCode)->setJSON($result);
            }

            $this->db->table('request')->insert([
                "senderID"=>$user_id,
                "receiverID"=>$receiverID,
                "status"=>'pending',
                "reqdatetime"=>date("Y-m-d H:i:s"),
            ]);

            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Sent Successfully';
            $result['action'] = 'return';
            $result['data'] = [];
            return $this->response->setStatusCode($responseCode)->setJSON($result);
        }
        else
        {
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = 'Already Sent!';
            $result['action'] = 'return';
            $result['data'] = [];
            return $this->response->setStatusCode($responseCode)->setJSON($result);
        }
    }
    public function accept_interest()
    {
        $session = session()->get('user');
        $user_id = $session['id'];

        $id = decript($this->request->getPost('id'));

        $checkrequest = $this->db->table("request")->where(["id"=>$id,"receiverID"=>$user_id,])->get()->getFirstRow();
        if(!empty($checkrequest))
        {
            $this->db->table('request')->where("id", $checkrequest->id)->update([
                "status"=>'accept',
            ]);

            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Accepted Successfully';
            $result['action'] = 'return';
            $result['data'] = [];
            return $this->response->setStatusCode($responseCode)->setJSON($result);
        }
        else
        {
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = 'Allready Sent!';
            $result['action'] = 'return';
            $result['data'] = [];
            return $this->response->setStatusCode($responseCode)->setJSON($result);
        }
    }
    public function decline_interest()
    {
        $session = session()->get('user');
        $user_id = $session['id'];

        $id = decript($this->request->getPost('id'));

        $checkrequest = $this->db->table("request")->where(["id"=>$id,"receiverID"=>$user_id,])->get()->getFirstRow();
        if(!empty($checkrequest))
        {
            $this->db->table('request')->where("id", $checkrequest->id)->update([
                "status"=>'decline',
            ]);

            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Declined Successfully';
            $result['action'] = 'return';
            $result['data'] = [];
            return $this->response->setStatusCode($responseCode)->setJSON($result);
        }
        else
        {
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = 'Allready Sent!';
            $result['action'] = 'return';
            $result['data'] = [];
            return $this->response->setStatusCode($responseCode)->setJSON($result);
        }
    }

    public function view_contact()
    {
        $session = session()->get('user');
        $user_id = $session['id'];

        $viewType = $this->request->getVar('viewType');

        $db = $this->db;

        $check_any_active_plan = check_any_active_plan($user_id);
        // $check_any_active_plan['status'] = 0;
        if(empty($check_any_active_plan['status']))
        {
            $type = 2;
            $view = view('web/card/become-paid-member',compact('db','type'),[],true);

            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'You have no active plan!';
            $result['action'] = 'view';
            $result['type'] = 2;
            $result['data'] = ["view"=>$view,];
            return $this->response->setStatusCode($responseCode)->setJSON($result);
        }
        else if($check_any_active_plan['remaining']<1)
        {
            $type = 3;
            $view = view('web/card/become-paid-member',compact('db','type'),[],true);

            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'You have used all limit!';
            $result['action'] = 'view';
            $result['type'] = 3;
            $result['data'] = ["view"=>$view,];
            return $this->response->setStatusCode($responseCode)->setJSON($result);
        }


        $member_id = decript($this->request->getPost('member_id'));
        $member = $this->db->table("users")->where(["id"=>$member_id,])->get()->getFirstRow();
        if(!empty($member))
        {
            if($member->is_mobile_show==1 || $viewType==1)
            {
                $user_view_contacts = $this->db->table("user_view_contacts")->where(["user_id"=>$user_id,"member_id"=>$member_id,])->get()->getFirstRow();
                if(empty($user_view_contacts))
                {
                    $countLimit = $this->db->table("user_view_contacts")
                    ->where("date_time >= ", date("Y-m-d 00:00:00"))
                    ->where("date_time <= ", date("Y-m-d 23:59:00"))
                    ->where(["user_id"=>$user_id,])->countAllResults();

                    if($countLimit>=10)
                    {
                        $type2 = 2;
                        $view = view('user/card/limitExpire',compact('db','type2'),[],true);

                        $responseCode = 200;
                        $result['status'] = $responseCode;
                        $result['message'] = 'You have used all limit!';
                        $result['action'] = 'view';
                        $result['type'] = 3;
                        $result['data'] = ["view"=>$view,];
                        return $this->response->setStatusCode($responseCode)->setJSON($result);
                    }
                }
                if(empty($user_view_contacts))
                {
                    $this->db->table('user_view_contacts')->insert([
                        "user_id"=>$user_id,
                        "member_id"=>$member_id,
                        "date_time"=>date("Y-m-d H:i:s"),
                    ]);

                    $wallet = $this->db->table('wallet')->where(["user_id"=>$user_id,])->get()->getFirstRow();
                    if(!empty($wallet))
                    {
                        $this->db->table("wallet")
                        ->where("id", $wallet->id)
                        ->set("contact_view", "contact_view + " . 1, false)
                        ->update();
                    }
                }
            }

            $view = view('user/card/ViewContactCard',compact('member','check_any_active_plan','viewType'),[],true);
            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'View Successfully';
            $result['action'] = 'view';
            $result['type'] = 1;
            $result['data'] = ["view"=>$view,];
            return $this->response->setStatusCode($responseCode)->setJSON($result);
        }
        else
        {
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = 'Error!';
            $result['action'] = 'view';
            $result['data'] = [];
            return $this->response->setStatusCode($responseCode)->setJSON($result);
        }
    }
}