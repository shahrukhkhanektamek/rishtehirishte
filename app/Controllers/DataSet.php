<?php

namespace App\Controllers;
use CodeIgniter\Database\Database;
use CodeIgniter\HTTP\RequestInterface;

class DataSet extends BaseController
{

    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->db2 = \Config\Database::connect('second');
    }
    public function index()
    {
    }
    public function users()
    {

        $usersData = [];
        $oldUsers = $this->db2->table("rform")
        ->limit(5)
        ->offset(0)
        ->getWhere(["status"=>1,])->getResultObject();

        // print_r($oldUsers);
        // die;

        foreach ($oldUsers as $key => $value) {
            $countryId = 0;
            $stateId = 0;

            $countries = $this->db->table('countries')->where(["name"=>$value->country,])->get()->getFirstRow();
            if(!empty($countries)) $countryId = $countries->id;

            $states = $this->db->table('states')->where(["name"=>$value->state,])->get()->getFirstRow();
            if(!empty($states)) $stateId = $states->id;

            $image = $value->image;
            $images = [
                ["image_path"=>$value->image2,],
                ["image_path"=>$value->image3,],
            ];
            
            $month = @explode("-",$value->dob)[0];
            $day = @explode("-",$value->dob)[1];
            $year = @explode("-",$value->dob)[2];
            $dob = $year.'-'.$month.'-'.$day;
            if(empty($month)) $dob = '';
            $usersData = [
                "id"=>$value->id,
                "user_id"=>$value->id,
                "role"=>2,
                "status"=>1,
                "name"=>$value->name,
                "email"=>$value->email,
                "password"=>$value->password,
                "phone"=>$value->mobile,
                "dob"=>$dob,
                "profilefor"=>$value->profilefor,
                "gender"=>$value->sex=='Male'?1:2,
                "mothertongue"=>$value->mothertongue,
                "maritalstatus"=>$value->maritalstatus,
                "havechildren"=>$value->havechildren,
                "religion"=>$value->religion,
                "caste"=>$value->caste,
                "manglik"=>$value->manglik,
                "height"=>$value->height,
                "country"=>$countryId,
                "state"=>$stateId,
                "city"=>$value->city,
                "pincode"=>$value->pincode,
                "image"=>$image,
                "images"=>json_encode($images),
                "highestdegree"=>$value->highestdegree,
                "collegename"=>$value->collegename,
                "occupation"=>$value->occupation,
                "annualincome"=>$value->annualincome,
                "expressyou"=>$value->expressyou,
                "family_type"=>$value->ftype,
                "family_living"=>$value->fliving,
                "father_occupation"=>$value->foccupation,
                "father_annualincome"=>$value->fannualincome,
                "mother_occupation"=>$value->moccupation,
                "mother_annualincome"=>$value->mannualincome,
                "brother_married"=>$value->bmarried,
                "brother_unmarried"=>$value->bunmarried,
                "sister_married"=>$value->smarried,
                "sister_unmarried"=>$value->sunmarried,
                "address"=>$value->address,
                "aboutfamily"=>$value->aboutfamily,
                "age"=>$value->extra1,
                "diet"=>$value->extra2,
                "register_by"=>$value->extra3,
                "father_name"=>$value->fname,
                "mother_name"=>$value->mname,
                "time_of_birth"=>$value->tob,
                "place_of_birth"=>$value->pob,
                "add_date_time"=>$value->dateofr,
                "alt_phone"=>$value->extra4,
                "challenged"=>$value->extra5,




                "annualincomeindoller"=>$value->extra6,
                "package_id"=>$value->pakages,
                "ip_address"=>$value->ip_address,
                "complexion"=>$value->complexion,
                "body_type"=>$value->body_type,
            ];
            // $this->db->table("users")->insert($usersData);
            // print_r($usersData);
        }

        // print_r($oldUsers);

        // die;
        // $table_name = 'service';
        // $page_name = 'single-service.php';
        // $expertise = $this->db->table("expertise")->getWhere(["status"=>1,])->getResultObject();
        // // die;
        // foreach ($expertise as $key => $value)
        // {
        //     $data = [
        //         "name"=>$value->name,
        //         "service_type"=>3,
        //         "category"=>18,
        //         "slug"=>'',
        //         "sort_description"=>'',
        //         "full_description"=>'',
        //         "document_area"=>'',
        //         "extra"=>'',
        //         "status"=>1,
        //         "is_delete"=>0,
        //     ];
        //     $data['add_by'] = 1;
        //     $data['add_date_time'] = date("Y-m-d H:i:s");
        //     $data['update_date_time'] = date("Y-m-d H:i:s");
        //     if($this->db->table($table_name)->insert($data)) $entryStatus = true;
        //     else $entryStatus = false;
        //     $id = $insertId = $this->db->insertID();

        //     $name = $data['name'];
        //     if(empty($this->request->getPost('slug'))) $slug = slug($name);
        //     else $slug = slug($this->request->getPost('slug'));
        //     $p_id = $id;
        //     $table_name = $table_name;
        //     $new_slug = insert_slug($slug,$p_id,$table_name,$page_name);

        //     insert_meta_tag($new_slug,$name);


        // }


        

        die;
        $table_name = 'certification';
        $page_name = 'partners.php';
        $main_menus = $this->db->table($table_name)->getWhere(["status"=>1,])->getResultObject();
        foreach ($main_menus as $key => $value)
        {
            $name = $value->name;
            $slug = $value->slug;
            $id = $value->id;
            if(empty($slug)) $slug = slug($name);
            else $slug = slug($slug);
            $p_id = $id;
            $table_name = $table_name;
            $new_slug = insert_slug($slug,$p_id,$table_name,$page_name);
            insert_meta_tag($new_slug,$name);
        }

    }
    
}
