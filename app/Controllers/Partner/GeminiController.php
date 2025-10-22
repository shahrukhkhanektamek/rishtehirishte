<?php
namespace App\Controllers\Partner;
use App\Controllers\BaseController;
use CodeIgniter\Database\Database;
use CodeIgniter\Config\Services;
use App\Models\ImageModel;
use App\Models\GeminiModel;

class GeminiController extends BaseController
{
     protected $arr_values = array(
        'routename'=>'partner', 
        'title'=>'Gemini', 
        'table_name'=>'package',
        'page_title'=>'Gemini',
        "folder_name"=>'gemini',
        "upload_path"=>'upload/',
        "page_name"=>'package-single.php',
       );

      public function __construct()
      {
        create_importent_columns($this->arr_values['table_name']);
        $this->db = \Config\Database::connect();
      }

    public function ask_ally()
    {
        $session = session()->get('user');
        $vendor_id = $session['id'];

        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "Manage ".$this->arr_values['page_title'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url($this->arr_values['routename']);      
        $data['pagenation'] = array($this->arr_values['title']);

        $db = $this->db;

        $row = [];

        return view($this->arr_values['folder_name'].'/ask-ally',compact('data','db','row'));
    }
    public function action()
    {
        $session = session()->get('user');
        $user_id = $session['id'];

        $comment = $this->request->getPost('comment');

        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "AI ".$this->arr_values['page_title'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url($this->arr_values['routename']);
        $data['pagenation'] = array($this->arr_values['title']);

        $db = $this->db;
        $row = [];

        $GeminiModel = new GeminiModel();
        $response = $GeminiModel->getAllyResponse($comment,'');
        $responseCode = 200;
        $result['status'] = $responseCode;
        $result['message'] = $response;
        $result['action'] = 'view';
        $result['data'] = [];
        return $this->response->setStatusCode($responseCode)->setJSON($result); 
        
    }




    public function legal_research()
    {
        $session = session()->get('user');
        $vendor_id = $session['id'];

        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "Manage ".$this->arr_values['page_title'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url($this->arr_values['routename']);      
        $data['actionUrl'] = $data['route'].'/gemini/legal-research/legal_research_action';
        $data['pagenation'] = array($this->arr_values['title']);

        $db = $this->db;

        $row = [];

        return view($this->arr_values['folder_name'].'/legal-research',compact('data','db','row'));
    }
    public function legal_research_action()
    {
        $session = session()->get('user');
        $user_id = $session['id'];

        $comment = $this->request->getPost('comment');
        $Jurisdiction = $this->request->getPost('Jurisdiction');
        $ResearchType = $this->request->getPost('ResearchType');

        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "AI ".$this->arr_values['page_title'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url($this->arr_values['routename']);
        $data['pagenation'] = array($this->arr_values['title']);

        $db = $this->db;
        $row = [];

        $query['query'] = $comment;
        $query['jurisdiction'] = $Jurisdiction;
        $query['type'] = $ResearchType;

        $GeminiModel = new GeminiModel();
        $response = $GeminiModel->performLegalResearch($query);

        $responseCode = 200;
        $result['status'] = $responseCode;
        $result['message'] = $response['responseText'];
        $result['action'] = 'view';
        $result['data'] = [];
        return $this->response->setStatusCode($responseCode)->setJSON($result);         
    }



    public function translator()
    {
        $session = session()->get('user');
        $vendor_id = $session['id'];

        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "Manage ".$this->arr_values['page_title'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url($this->arr_values['routename']);      
        $data['actionUrl'] = $data['route'].'/gemini/translator/translator_action';
        $data['pagenation'] = array($this->arr_values['title']);

        $db = $this->db;

        $row = [];

        return view($this->arr_values['folder_name'].'/translator',compact('data','db','row'));
    }
    public function translator_action()
    {
        $session = session()->get('user');
        $user_id = $session['id'];

        $comment = $this->request->getPost('comment');
        $language = $this->request->getPost('language');

        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "AI ".$this->arr_values['page_title'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url($this->arr_values['routename']);
        $data['pagenation'] = array($this->arr_values['title']);

        $db = $this->db;
        $row = [];

        $query = $comment;
        

        $GeminiModel = new GeminiModel();
        $response = $GeminiModel->translateDocument($query, $language);

        $responseCode = 200;
        $result['status'] = $responseCode;
        $result['message'] = $response;
        $result['action'] = 'view';
        $result['data'] = [];
        return $this->response->setStatusCode($responseCode)->setJSON($result);         
    }




    public function complaint_writer()
    {
        $session = session()->get('user');
        $vendor_id = $session['id'];

        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "Manage ".$this->arr_values['page_title'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url($this->arr_values['routename']);      
        $data['actionUrl'] = $data['route'].'/gemini/complaint-writer/complaint_writer_action';
        $data['pagenation'] = array($this->arr_values['title']);

        $db = $this->db;

        $row = [];

        return view($this->arr_values['folder_name'].'/complaint-writer',compact('data','db','row'));
    }
    public function complaint_writer_action()
    {
        $session = session()->get('user');
        $user_id = $session['id'];

        $comment = $this->request->getPost('comment');
        $Jurisdiction = $this->request->getPost('Jurisdiction');
        $ResearchType = $this->request->getPost('ResearchType');

        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "AI ".$this->arr_values['page_title'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url($this->arr_values['routename']);
        $data['pagenation'] = array($this->arr_values['title']);

        $db = $this->db;
        $row = [];

        $query['query'] = $comment;
        $query['jurisdiction'] = $Jurisdiction;
        $query['type'] = $ResearchType;

        $GeminiModel = new GeminiModel();
        $response = $GeminiModel->performLegalResearch($query);

        $responseCode = 200;
        $result['status'] = $responseCode;
        $result['message'] = $response['responseText'];
        $result['action'] = 'view';
        $result['data'] = [];
        return $this->response->setStatusCode($responseCode)->setJSON($result);         
    }



    public function document_generator()
    {
        $session = session()->get('user');
        $vendor_id = $session['id'];

        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "Manage ".$this->arr_values['page_title'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url($this->arr_values['routename']);      
        $data['actionUrl'] = $data['route'].'/gemini/document-generator/document_generator_action';
        $data['pagenation'] = array($this->arr_values['title']);

        $db = $this->db;

        $row = [];

        return view($this->arr_values['folder_name'].'/document-generator',compact('data','db','row'));
    }
    public function document_generator_action()
    {
        $session = session()->get('user');
        $user_id = $session['id'];

        $comment = $this->request->getPost('comment');
        $Jurisdiction = $this->request->getPost('Jurisdiction');
        $ResearchType = $this->request->getPost('ResearchType');

        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "AI ".$this->arr_values['page_title'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url($this->arr_values['routename']);
        $data['pagenation'] = array($this->arr_values['title']);

        $db = $this->db;
        $row = [];

        $query['query'] = $comment;
        $query['jurisdiction'] = $Jurisdiction;
        $query['type'] = $ResearchType;

        $GeminiModel = new GeminiModel();
        $response = $GeminiModel->performLegalResearch($query);

        $responseCode = 200;
        $result['status'] = $responseCode;
        $result['message'] = $response['responseText'];
        $result['action'] = 'view';
        $result['data'] = [];
        return $this->response->setStatusCode($responseCode)->setJSON($result);         
    }





    public function document_analyzer()
    {
        $session = session()->get('user');
        $vendor_id = $session['id'];

        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "Manage ".$this->arr_values['page_title'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url($this->arr_values['routename']);      
        $data['actionUrl'] = $data['route'].'/gemini/document-analyzer/document_analyzer_action';
        $data['pagenation'] = array($this->arr_values['title']);

        $db = $this->db;

        $row = [];

        return view($this->arr_values['folder_name'].'/document-analyzer',compact('data','db','row'));
    }
    public function document_analyzer_action()
    {
        $session = session()->get('user');
        $user_id = $session['id'];

        $comment = $this->request->getPost('comment');
        $Jurisdiction = $this->request->getPost('Jurisdiction');
        $ResearchType = $this->request->getPost('ResearchType');

        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "AI ".$this->arr_values['page_title'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url($this->arr_values['routename']);
        $data['pagenation'] = array($this->arr_values['title']);

        $db = $this->db;
        $row = [];

        $query['query'] = $comment;
        $query['jurisdiction'] = $Jurisdiction;
        $query['type'] = $ResearchType;

        $GeminiModel = new GeminiModel();
        $response = $GeminiModel->performLegalResearch($query);

        $responseCode = 200;
        $result['status'] = $responseCode;
        $result['message'] = $response['responseText'];
        $result['action'] = 'view';
        $result['data'] = [];
        return $this->response->setStatusCode($responseCode)->setJSON($result);         
    }



   
    
    

}