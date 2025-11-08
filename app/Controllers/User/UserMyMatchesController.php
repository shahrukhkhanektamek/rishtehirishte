<?php
namespace App\Controllers\User;
use App\Controllers\BaseController;
use CodeIgniter\Database\Database;
use CodeIgniter\Config\Services;
 
class UserMyMatchesController extends BaseController
{
     protected $arr_values = array(
        'routename'=>'user.profile.', 
        'title'=>'Profile', 
        'table_name'=>'users',
        'page_title'=>'Profile',
        "folder_name"=>'user/my-matches',
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
        $query = $this->db->table($table_name)
            ->where([$table_name.'.status' => 1])
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


        /// ✅ Core PHP wali values user row se nikal li
        $religion1 = $user->religion_name;
        $caste1    = $user->caste_name;
        $age1      = date("Y") - date("Y", strtotime($user->dob)); // approx age
        $sex1      = $user->gender==1?'Male':'Female';       // 1=Male, 2=Female
        $ms1       = $user->maritalstatus;

        // $sex1 = 'Male';


        /// ✅ caste filter mapping
        $caste_filter = [];
        if ($caste1 == "Arora") {
            $caste_filter = ['Arora','Khatri','Punjabi','Kashyap','Sood'];
        } else if ($caste1 == "Agarwal") {
            $caste_filter = ['Agarwal','Bania','Gupta','Vaish','Jaiswal'];
        } else if ($caste1 == "Brahmin") {
            $caste_filter = ['Brahmin','Gour Brahmin','Punjabi Brahmin','Brahmin Bhatt',
                             'Brahmin Bhumihar','Bengali Brahmin','Brahmin Goswami',
                             'Brahmin Kanyakubja','Brahmin Maithil','Brahmin Saryuparin',
                             'Brahmin Tyagi','Brahmin Vats','Garhwali Brahmins',
                             'Kumaoni Brahmins','Kashmiri Pandit','Dhiman Brahmin',
                             'Gaur Sarswat Brahmin','Himachali Brahmin','Nagar Brahmin',
                             'Saraswat Brahmins','Bhandari','Goswami'];
        }
        // बाकी caste mapping इसी तरह डाल सकते हो…


        /// ✅ religion filter mapping
        $religion_filter = [];
        if ($religion1 == "JAIN") {
            $religion_filter = ['Jain','Digambar','Shwetamber','Pitamber'];
        } else if ($religion1 == "Sikh") {
            $religion_filter = ['Sikh'];
        } else if ($religion1 == "Muslim") {
            $religion_filter = ['Muslim'];
        }

        /// ✅ condition set (Core PHP जैसा)
        if ($religion1 == "Muslim" || $religion1 == "Sikh") {
            if(!empty($religion_filter)) {
                $query->whereIn("religion.name", $religion_filter);
            }
        } else {
            if(!empty($caste_filter)) {
                $query->whereIn("caste.name", $caste_filter);
            }
        }

        /// ✅ Gender + Age filter
        $today = date("Y-m-d");

        if ($sex1 == "Male") {
            $dage = $age1 + 10;
            $from_date = date("Y-m-d", strtotime("-$dage years", strtotime($today)));
            $to_date   = date("Y-m-d", strtotime("-$age1 years", strtotime($today)));

            $query->where("{$table_name}.gender", 2); // Female
            if ($ms1 == "Never Married") {
                $query->where("{$table_name}.maritalstatus", "Never Married");
            } else {
                $query->where("{$table_name}.maritalstatus !=", "Never Married");
            }
            $query->where("{$table_name}.dob >=", $from_date);
            $query->where("{$table_name}.dob <=", $to_date);

        } else if ($sex1 == "Female") {
            $dage = $age1 - 10;
            $from_date = date("Y-m-d", strtotime("-$age1 years", strtotime($today)));
            $to_date   = date("Y-m-d", strtotime("-$dage years", strtotime($today)));

            $query->where("{$table_name}.gender", 1); // Male
            if ($ms1 == "Never Married") {
                $query->where("{$table_name}.maritalstatus", "Never Married");
            } else {
                $query->where("{$table_name}.maritalstatus !=", "Never Married");
            }
            $query->where("{$table_name}.dob >=", $to_date);
            $query->where("{$table_name}.dob <=", $from_date);
        }


        // ✅ Count total
        $total = $query->countAllResults(false);
        $query->orderBy($table_name.'.update_date_time','desc');

        $queryLatest = clone $query;

        // ✅ Get results
        $latest_list = $queryLatest->limit(10, 0)->get()->getResult();
        
        if($type==1)
        {
            $data_list = $query->limit($limit, 10)->get()->getResult();
            $total = 0;
        }
        else
        {
            $data_list = $query->limit($limit, $offset)->get()->getResult();            
        } 





        $data['user'] = $user;

        $data['pager'] = $this->pager->makeLinks($page, $limit, $total);
        $data['totalData'] = $total;
        $data['startData'] = $offset + 1;
        $data['endData'] = ($offset + $limit > $total) ? $total : ($offset + $limit);
        $data['data_list'] = $data_list;
        


        $view = view('user/card/profileListCard',compact('data_list','data'),[],true);
        $view2 = view('user/card/myMatchcard',compact('latest_list','data'),[],true);
        $responseCode = 200;
        $result['status'] = $responseCode;
        $result['status'] = $responseCode;
        $result['message'] = 'Success';
        $result['action'] = 'view';
        $result['data'] = ["list"=>$view,"list2"=>$view2,];
        return $this->response->setStatusCode($responseCode)->setJSON($result);
    }
   
   

}