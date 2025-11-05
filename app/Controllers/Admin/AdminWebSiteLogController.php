<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use CodeIgniter\Database\Database;
use CodeIgniter\Config\Services;
use App\Models\ImageModel;

class AdminWebSiteLogController extends BaseController
{
     protected $arr_values = array(
        'routename'=>'website-log.', 
        'title'=>'Website Logs', 
        'table_name'=>'request_logs',
        'page_title'=>'Website Logs',
        "folder_name"=>'backend/admin/website-log',
        "upload_path"=>'upload/',
        "page_name"=>'website-log.php',
       );

      public function __construct()
      {
        create_importent_columns($this->arr_values['table_name']);
        $this->db = \Config\Database::connect();
        $this->pager = \Config\Services::pager();
      }

    public function index()
    {
        $user_id = $this->request->getVar('id');
        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "Manage ".$this->arr_values['page_title'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url(route_to($this->arr_values['routename'].'list'));      
        $data['pagenation'] = array($this->arr_values['title']);
        if(empty($user_id))
        {
            return view($this->arr_values['folder_name'].'/index',compact('data'));
        }
        else
        {
            $table_name = 'users';
            $user_id = decript($user_id);
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
            return view($this->arr_values['folder_name'].'/index',compact('data','row'));
        }
    }
    public function load_data()
    {
        $user_id = $this->request->getVar('user_id');
        $limit = $this->request->getVar('limit');
        $status = $this->request->getVar('status');
        $order_by = $this->request->getVar('order_by');
        $filter_search_value = $this->request->getVar('filter_search_value');
        $page = $this->request->getVar('page') ?: 1; 
        $offset = ($page - 1) * $limit;

        $data['table_name'] = $this->arr_values['table_name'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url(route_to($this->arr_values['routename'].'list'));   

        $where = [];
        $data_list = $this->db->table($this->arr_values['table_name'])
        ->select("{$this->arr_values['table_name']}.*,
         ")
        ->orderBy($this->arr_values['table_name'] . '.id', $order_by);

        if(!empty($user_id)) $data_list->where([$this->arr_values['table_name'] . '.user_id' => $user_id]);


        $from_date = $this->request->getVar('from_date');
        $to_date = $this->request->getVar('to_date');
        if(!empty($from_date))
        {
            $from_date = date('Y-m-d 00:00:00', strtotime($from_date));
            $where["add_date_time >="] = $from_date;
        }
        if(!empty($to_date))
        {
            $to_date = date('Y-m-d 23:59:59', strtotime($to_date));
            $where["add_date_time <="] = $to_date;
        }


        if(!empty($where)) $data_list->where($where);

        $total = $data_list->countAllResults(false);
        $data_list = $data_list->limit($limit, $offset)->get()->getResult();


        
        
        // $total = $total->countAllResults();
        $data['pager'] = $this->pager->makeLinks($page, $limit, $total);
        $data['totalData'] = $total;
        $data['startData'] = ($total > 0) ? $offset+1 : 0;
        $data['endData'] = ($offset + $limit > $total) ? $total : ($offset + $limit);
          

        $db = $this->db;

        $view = view($this->arr_values['folder_name'].'/table',compact('data_list','data','db'),[],true);
        $responseCode = 200;
        $result['status'] = $responseCode;
        $result['status'] = $responseCode;
        $result['message'] = 'Success';
        $result['action'] = 'view';
        $result['data'] = ["list"=>$view,];
        return $this->response->setStatusCode($responseCode)->setJSON($result);
    }
    public function add()
    {
        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "Assign Package";
        $data['table_name'] = $this->arr_values['table_name'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url(route_to($this->arr_values['routename'].'list'));    
        $data['pagenation'] = array($this->arr_values['title']);
        $row = [];
        $db=$this->db;
        return view($this->arr_values['folder_name'].'/form',compact('data','row','db'));
    }
    
    public function view($id=null)
    {   
        $id = decript($id);
        $data['title'] = "Package";
        $data['page_title'] = "View ".$this->arr_values['page_title'];
        $data['table_name'] = $this->arr_values['table_name'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url(route_to($this->arr_values['routename'].'list'));           
        $data['pagenation'] = array($this->arr_values['title']);

        $row = $this->db->table($this->arr_values['table_name'])->where(["id"=>$id,])->get()->getFirstRow();
        if(!empty($row))
        {
            $db=$this->db;
            return view($this->arr_values['folder_name'].'/view',compact('data','row','db'));
        }
        else
        {
            return view('backend/404',compact('data'));            
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