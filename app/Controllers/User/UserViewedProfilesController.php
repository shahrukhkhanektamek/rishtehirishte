<?php
namespace App\Controllers\User;
use App\Controllers\BaseController;
use CodeIgniter\Database\Database;
use CodeIgniter\Config\Services;
 
class UserViewedProfilesController extends BaseController
{
     protected $arr_values = array(
        'routename'=>'user.viewed-profiles.', 
        'title'=>'Viewed Profiles', 
        'table_name'=>'users',
        'page_title'=>'Viewed Profiles',
        "folder_name"=>'user/viewed-profiles',
        "upload_path"=>'upload/',
        "page_name"=>'viewed-profiles.php',
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
    
    public function load_data()
    {
        $session = session()->get('user');
        $user_id = $session['id'];



        $type = $this->request->getVar('type');
        $limit = $this->request->getVar('limit');
        $limit = 10;
        $status = $this->request->getVar('status');
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
        $height = $this->request->getVar('fromheight');
        $religion = $this->request->getVar('religion');
        $caste = $this->request->getVar('caste');
        $maritalstatus = $this->request->getVar('maritalstatus');
        $country = $this->request->getVar('country');
        $state = $this->request->getVar('state');
        $manglik = $this->request->getVar('manglik');
        $highestdegree = $this->request->getVar('highestdegree');
        $occupation = $this->request->getVar('occupation');




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

        

        // ✅ base query
        $query = $this->db->table("user_view_profile")
            ->where(['user_view_profile.user_id' => $user_id])
            ->where([$table_name.'.status' => 1])
            ->join("users as users","users.id=user_view_profile.member_id","left")
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
            ->where($table_name.'.role', 2);


        


        

        // ✅ Count total
        $total = $query->countAllResults(false);
        $query->orderBy("user_view_profile".'.id','desc');

        


        $data_list = $query->limit($limit, $offset)->get()->getResult();            


        $data['user'] = $user;



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
        $result['data'] = ["list"=>$view];
        return $this->response->setStatusCode($responseCode)->setJSON($result);
    }
   
   

}