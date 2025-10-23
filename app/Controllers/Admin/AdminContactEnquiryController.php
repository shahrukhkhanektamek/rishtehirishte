<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use CodeIgniter\Database\Database;
use CodeIgniter\Config\Services;
use App\Models\ImageModel;

class AdminContactEnquiryController extends BaseController
{
     protected $arr_values = array(
        'routename'=>'contact-enquiry.', 
        'title'=>'Contact Enquiry', 
        'table_name'=>'enquiry_contact',
        'page_title'=>'Contact Enquiry',
        "folder_name"=>'backend/admin/enquiry/contact-enquiry',
        "upload_path"=>'upload/',
        "page_name"=>'contact-enquiry.php',
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
        $order_by = $this->request->getVar('order_by');
        $page = $this->request->getVar('page') ?: 1; 
        $offset = ($page - 1) * $limit;

        $filter_search_value = $this->request->getVar('filter_search_value');
        $search_by = $this->request->getVar('search_by');

        $data['table_name'] = $this->arr_values['table_name'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url(route_to($this->arr_values['routename'].'list'));   

        // Base Query
        $builder = $this->db->table($this->arr_values['table_name']);
        $builder->where($this->arr_values['table_name'] . '.status', $status);

        // Date Filters - directly apply on builder (no $where array)
        $from_date = $this->request->getVar('from_date');
        $to_date   = $this->request->getVar('to_date');

        if (!empty($from_date)) {
            $from_date = date('Y-m-d 00:00:00', strtotime($from_date));
            $builder->where('add_date_time >=', $from_date);
        }

        if (!empty($to_date)) {
            $to_date = date('Y-m-d 23:59:59', strtotime($to_date));
            $builder->where('add_date_time <=', $to_date);
        }

        // Search Filter
        if (!empty($filter_search_value)) {
            switch ($search_by) {
                case 1:
                    $builder->like($this->arr_values['table_name'] . '.name', $filter_search_value);
                    break;
                case 2:
                    $builder->like($this->arr_values['table_name'] . '.email', $filter_search_value);
                    break;
                case 3:
                    $builder->like($this->arr_values['table_name'] . '.phone', $filter_search_value);
                    break;
                case 4:
                    $builder->like($this->arr_values['table_name'] . '.user_id', $filter_search_value);
                    break;
            }
        }

        // Clone for count (so original builder remains for fetch)
        $countBuilder = clone $builder;
        $total = $countBuilder->countAllResults();

        // Fetch results with ordering and limit
        $data_list = $builder
            ->orderBy($this->arr_values['table_name'] . '.id', $order_by)
            ->limit($limit, $offset)
            ->get()
            ->getResult();

        // Pagination data
        $data['pager'] = $this->pager->makeLinks($page, $limit, $total);
        $data['totalData'] = $total;
        $data['startData'] = ($total > 0) ? $offset + 1 : 0;
        $data['endData']   = ($offset + $limit > $total) ? $total : ($offset + $limit);


        

        $view = view($this->arr_values['folder_name'].'/table',compact('data_list','data'),[],true);
        $responseCode = 200;
        $result['status'] = $responseCode;
        $result['status'] = $responseCode;
        $result['message'] = 'Success';
        $result['action'] = 'view';
        $result['data'] = ["list"=>$view,];
        return $this->response->setStatusCode($responseCode)->setJSON($result);
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