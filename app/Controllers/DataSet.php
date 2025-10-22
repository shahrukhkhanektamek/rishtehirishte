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
        ->limit(1000)
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
                "password"=>md5($value->password),
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
                "address"=>trim($value->address),
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
            $this->db->table("users")->insert($usersData);
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

    public function educations()
    {
        $educationData = [];
        $oldedu = $this->db2->table("edu")
        // ->limit(5)
        ->offset(0)
        ->getWhere(["status"=>1,])->getResultObject();
        foreach ($oldedu as $key => $value) {

            $category = 0;
            $education_category = $this->db->table('education_category')->where(["name"=>$value->label,])->get()->getFirstRow();
            if(!empty($education_category)) $category = $education_category->id;            
            $educationData = [
                "status"=>1,
                "name"=>$value->title,
                "category"=>$category,
                
            ];
            $this->db->table("education")->insert($educationData);
            // print_r($educationData);
        }
    }

    public function set_language()
    {
        $languageData = [];
        $oldlanguage = $this->db->table("users")
        ->groupBy('mothertongue')
        ->offset(0)
        ->getWhere(["status"=>1,])->getResultObject();
        foreach ($oldlanguage as $key => $value) {

            $idd = 0;
            $languages = $this->db->table('languages')->where(["name"=>$value->mothertongue,])->get()->getFirstRow();
            if(!empty($languages)) $idd = $languages->id;            
            $languageData = [
                "mothertongue"=>$idd,
            ];
             $this->db->table("users")->where(["mothertongue"=>$value->mothertongue,])->update($languageData);
        }



        $languageData = [];
        $oldlanguage = $this->db->table("users")
        ->groupBy('religion')
        ->offset(0)
        ->getWhere(["status"=>1,])->getResultObject();
        foreach ($oldlanguage as $key => $value) {

            $idd = 0;
            $religions = $this->db->table('religion')->where(["name"=>$value->religion,])->get()->getFirstRow();
            if(!empty($religions)) $idd = $religions->id;                
            $languageData = [
                "religion"=>$idd,
            ];
             $this->db->table("users")->where(["religion"=>$value->religion,])->update($languageData);
        }

        $languageData = [];
        $oldlanguage = $this->db->table("users")
        ->groupBy('caste')
        ->offset(0)
        ->getWhere(["status"=>1,])->getResultObject();
        foreach ($oldlanguage as $key => $value) {

            $idd = 0;
            $castes = $this->db->table('caste')->where(["name"=>$value->caste,])->get()->getFirstRow();
            if(!empty($castes)) $idd = $castes->id;                
            $languageData = [
                "caste"=>$idd,
            ];
             $this->db->table("users")->where(["caste"=>$value->caste,])->update($languageData);
        }

        $languageData = [];
        $oldlanguage = $this->db->table("users")
        ->groupBy('highestdegree')
        ->offset(0)
        ->getWhere(["status"=>1,])->getResultObject();
        foreach ($oldlanguage as $key => $value) {

            $idd = 0;
            $highestdegrees = $this->db->table('education')->where(["name"=>$value->highestdegree,])->get()->getFirstRow();
            if(!empty($highestdegrees)) $idd = $highestdegrees->id;                
            $languageData = [
                "highestdegree"=>$idd,
            ];
             $this->db->table("users")->where(["highestdegree"=>$value->highestdegree,])->update($languageData);
        }



        $languageData = [];
        $oldlanguage = $this->db->table("users")
        ->groupBy('occupation')
        ->offset(0)
        ->getWhere(["status"=>1,])->getResultObject();
        foreach ($oldlanguage as $key => $value) {

            $idd = 0;
            $occupations = $this->db->table('occupation')->where(["name"=>$value->occupation,])->get()->getFirstRow();
            if(!empty($occupations)) $idd = $occupations->id;
            else
            {
                $this->db->table('occupation')->insert(["name"=>$value->occupation,"status"=>1,]);
                $idd = $this->db->insertID();
            }
            $languageData = [
                "occupation"=>$idd,
            ];
             $this->db->table("users")->where(["occupation"=>$value->occupation,])->update($languageData);
        }


        $languageData = [];
        $oldlanguage = $this->db->table("users")
        ->groupBy('family_living')
        ->offset(0)
        ->getWhere(["status"=>1,])->getResultObject();
        foreach ($oldlanguage as $key => $value) {

            $idd = 0;
            $family_livings = $this->db->table('states')->where(["name"=>$value->family_living,])->get()->getFirstRow();
            if(!empty($family_livings)) $idd = $family_livings->id;                
            $languageData = [
                "family_living"=>$idd,
            ];
             $this->db->table("users")->where(["family_living"=>$value->family_living,])->update($languageData);
        }


        $languageData = [];
        $oldlanguage = $this->db->table("users")
        ->groupBy('father_occupation')
        ->offset(0)
        ->getWhere(["status"=>1,])->getResultObject();
        foreach ($oldlanguage as $key => $value) {

            $idd = 0;
            $father_occupations = $this->db->table('occupation')->where(["name"=>$value->father_occupation,])->get()->getFirstRow();
            if(!empty($father_occupations)) $idd = $father_occupations->id;
            else
            {
                $this->db->table('occupation')->insert(["name"=>$value->father_occupation,"status"=>1,]);
                $idd = $this->db->insertID();
            }
            $languageData = [
                "father_occupation"=>$idd,
            ];
             $this->db->table("users")->where(["father_occupation"=>$value->father_occupation,])->update($languageData);
        }


        $languageData = [];
        $oldlanguage = $this->db->table("users")
        ->groupBy('mother_occupation')
        ->offset(0)
        ->getWhere(["status"=>1,])->getResultObject();
        foreach ($oldlanguage as $key => $value) {

            $idd = 0;
            $mother_occupations = $this->db->table('occupation')->where(["name"=>$value->mother_occupation,])->get()->getFirstRow();
            if(!empty($mother_occupations)) $idd = $mother_occupations->id;
            else
            {
                $this->db->table('occupation')->insert(["name"=>$value->mother_occupation,"status"=>1,]);
                $idd = $this->db->insertID();
            }
            $languageData = [
                "mother_occupation"=>$idd,
            ];
             $this->db->table("users")->where(["mother_occupation"=>$value->mother_occupation,])->update($languageData);
        }










        $languageData = [];
        $oldlanguage = $this->db->table("requirement_form")
        ->groupBy('education')
        ->offset(0)
        ->get()->getResultObject();
        foreach ($oldlanguage as $key => $value) {

            $idd = 0;
            $educations = $this->db->table('education')->where(["name"=>$value->education,])->get()->getFirstRow();
            if(!empty($educations)) $idd = $educations->id;                
            $languageData = [
                "education"=>$idd,
            ];
             $this->db->table("requirement_form")->where(["education"=>$value->education,])->update($languageData);
        }

        $languageData = [];
        $oldlanguage = $this->db->table("requirement_form")
        ->groupBy('occupation')
        ->offset(0)
        ->get()->getResultObject();
        foreach ($oldlanguage as $key => $value) {

            $idd = 0;
            $occupations = $this->db->table('occupation')->where(["name"=>$value->occupation,])->get()->getFirstRow();
            if(!empty($occupations)) $idd = $occupations->id;
            else
            {
                $this->db->table('occupation')->insert(["name"=>$value->occupation,"status"=>1,]);
                $idd = $this->db->insertID();
            }
            $languageData = [
                "occupation"=>$idd,
            ];
             $this->db->table("requirement_form")->where(["occupation"=>$value->occupation,])->update($languageData);
        }
        
        $languageData = [];
        $oldlanguage = $this->db->table("requirement_form")
        ->groupBy('country')
        ->offset(0)
        ->get()->getResultObject();
        foreach ($oldlanguage as $key => $value) {

            $idd = 0;
            $countrys = $this->db->table('countries')->where(["name"=>$value->country,])->get()->getFirstRow();
            if(!empty($countrys)) $idd = $countrys->id;                
            $languageData = [
                "country"=>$idd,
            ];
             $this->db->table("requirement_form")->where(["country"=>$value->country,])->update($languageData);
        }



        $languageData = [];
        $oldlanguage = $this->db->table("requirement_form")
        ->groupBy('state')
        ->offset(0)
        ->get()->getResultObject();
        foreach ($oldlanguage as $key => $value) {

            $idd = 0;
            $states = $this->db->table('states')->where(["name"=>$value->state,])->get()->getFirstRow();
            if(!empty($states)) $idd = $states->id;                
            $languageData = [
                "state"=>$idd,
            ];
             $this->db->table("requirement_form")->where(["state"=>$value->state,])->update($languageData);
        }




        $languageData = [];
        $oldlanguage = $this->db->table("requirement_form")
        ->groupBy('religion')
        ->offset(0)
        ->get()->getResultObject();
        foreach ($oldlanguage as $key => $value) {

            $idd = 0;
            $religions = $this->db->table('religion')->where(["name"=>$value->religion,])->get()->getFirstRow();
            if(!empty($religions)) $idd = $religions->id;                
            $languageData = [
                "religion"=>$idd,
            ];
             $this->db->table("requirement_form")->where(["religion"=>$value->religion,])->update($languageData);
        }


        $languageData = [];
        $oldlanguage = $this->db->table("requirement_form")
        ->groupBy('caste')
        ->offset(0)
        ->get()->getResultObject();
        foreach ($oldlanguage as $key => $value) {

            $idd = 0;
            $castes = $this->db->table('caste')->where(["name"=>$value->caste,])->get()->getFirstRow();
            if(!empty($castes)) $idd = $castes->id;                
            $languageData = [
                "caste"=>$idd,
            ];
             $this->db->table("requirement_form")->where(["caste"=>$value->caste,])->update($languageData);
        }


        $this->db->table("requirement_form")->where(["manglik"=>'Not Selected',])->update(["manglik"=>'',]);
        $this->db->table("requirement_form")->where(["education"=>'Not Selected',])->update(["education"=>'',]);
        $this->db->table("requirement_form")->where(["occupation"=>'Not Selected',])->update(["occupation"=>'',]);
        $this->db->table("requirement_form")->where(["city"=>'Not Selected',])->update(["city"=>'',]);
        $this->db->table("requirement_form")->where(["maritalstatus"=>'Not Selected',])->update(["maritalstatus"=>'',]);
        $this->db->table("requirement_form")->where(["children"=>'Not Selected',])->update(["children"=>'',]);
        $this->db->table("requirement_form")->where(["challenged"=>'Not Selected',])->update(["challenged"=>'',]);


        $this->db->table("users")->where(["manglik"=>'Not Selected',])->update(["manglik"=>'',]);
        $this->db->table("users")->where(["challenged"=>'Not Selected',])->update(["challenged"=>'',]);
        $this->db->table("users")->where(["profilefor"=>'Not Selected',])->update(["profilefor"=>'',]);
        $this->db->table("users")->where(["maritalstatus"=>'Not Selected',])->update(["maritalstatus"=>'',]);
        $this->db->table("users")->where(["havechildren"=>'Not Selected',])->update(["havechildren"=>'',]);
        $this->db->table("users")->where(["height"=>'Not Selected',])->update(["height"=>'',]);
        $this->db->table("users")->where(["annualincome"=>'Not Selected',])->update(["annualincome"=>'',]);
        $this->db->table("users")->where(["family_type"=>'Not Selected',])->update(["family_type"=>'',]);
        $this->db->table("users")->where(["father_annualincome"=>'Not Selected',])->update(["father_annualincome"=>'',]);
        $this->db->table("users")->where(["father_annualincome"=>'Not Selected',])->update(["father_annualincome"=>'',]);
        $this->db->table("users")->where(["brother_married"=>'Not Selected',])->update(["brother_married"=>'',]);
        $this->db->table("users")->where(["brother_unmarried"=>'Not Selected',])->update(["brother_unmarried"=>'',]);
        $this->db->table("users")->where(["sister_married"=>'Not Selected',])->update(["sister_married"=>'',]);
        $this->db->table("users")->where(["sister_unmarried"=>'Not Selected',])->update(["sister_unmarried"=>'',]);
        $this->db->table("users")->where(["diet"=>'Not Selected',])->update(["diet"=>'',]);
        $this->db->table("users")->where(["annualincomeindoller"=>'Not Selected',])->update(["annualincomeindoller"=>'',]);
        $this->db->table("users")->where(["complexion"=>'Not Selected',])->update(["complexion"=>'',]);
        $this->db->table("users")->where(["body_type"=>'Not Selected',])->update(["body_type"=>'',]);



    }

    public function set_user_packages()
    {
        $educationData = [];
        $oldedu = $this->db2->table("package_tbl")
        // ->limit(5)
        ->offset(0)
        ->getWhere()->getResultObject();
        foreach ($oldedu as $key => $value) {

            $amount = $value->pack_amount;
            $educationData = [
                "status"=>1,
                "package_name"=>$value->pack_name,
                "plan_start_date_time"=>date("Y-m-d H:i:s", $value->pack_pur_date),
                "plan_end_date_time"=>date("Y-m-d H:i:s", $value->pack_exp_date),
                "contact_limit"=>(int) $value->pack_veiw_contact+(int) $value->pack_totview_contact,
                // "view_contact"=>$value->pack_totview_contact,
                "user_id"=>$value->cus_id,
                // "validity"=>$value->cus_id,
                "amount"=>$value->pack_amount,
                "gst"=>0,
                "final_amount"=>$value->pack_amount,

                "add_date_time"=>date("Y-m-d H:i:s"),
                
            ];
            // $this->db->table("user_package")->insert($educationData);
            $checkWallet = $this->db->table('wallet')->where(["user_id"=>$value->cus_id,])->get()->getFirstRow();
            if(empty($checkWallet))
            {
                // $this->db->table("wallet")->insert(["user_id"=>$value->cus_id,"contact_limit"=>(int) $value->pack_veiw_contact+(int)$value->pack_totview_contact,"contact_view"=>(int)$value->pack_totview_contact,]);
            }
            else
            {
                // $this->db->table("wallet")
                // ->where("id", $checkWallet->id)
                // ->set("contact_limit", "contact_limit + " . ($value->pack_veiw_contact + $value->pack_totview_contact), false)
                // ->set("contact_view", "contact_view + " . $value->pack_totview_contact, false)
                // ->update();
            }
            print_r($educationData);
        }
    }

    public function set_featured_profile()
    {
        $educationData = [];
        $oldedu = $this->db2->table("featuredprofiile")
        // ->limit(5)
        ->offset(0)
        ->getWhere()->getResultObject();
        foreach ($oldedu as $key => $value) {
            
            $educationData = [
                "status"=>1,
                "user_id"=>$value->id,
                "add_date_time"=>date("Y-m-d H:i:s"),
                
            ];
            // $this->db->table("featured_profile")->insert($educationData);
            print_r($educationData);
        }
    }
    public function set_service()
    {
        $educationData = [];
        $oldedu = $this->db->table("service")
        // ->limit(5)
        ->offset(0)
        ->getWhere()->getResultObject();
        foreach ($oldedu as $key => $value) {

            
            $name = $value->name;
            $slug = slug($name);
            $p_id = $value->id;
            $table_name = "service";
            $new_slug = insert_slug($slug,$p_id,$table_name,"service-details.php");
            // insert_meta_tag($new_slug,$name);


            
            // $educationData = [
            //     "status"=>1,
            //     "user_id"=>$value->id,
            //     "add_date_time"=>date("Y-m-d H:i:s"),
                
            // ];
            // $this->db->table("service")->insert($educationData);
            print_r($educationData);
        }
    }
    
}
