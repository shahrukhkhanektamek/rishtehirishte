<?php




$builder = $db->table('service_category');
$builder->select('service_category.*, COUNT(service.id) as services_count');
$builder->join('service', 'service.category = service_category.id', 'left');
$builder->where('service_category.status', 1);
$builder->groupBy('service_category.id');
$builder->orderBy('service_category.id', 'desc');

$service_category = $builder->get()->getResult();




$uri = $request->getUri()->getSegment(1);
$limit = 12;
$status = 1;
$page = $request->getVar('page') ?: 1;
$offset = ($page - 1) * $limit;


$lookingFor = $request->getVar('lookingFor');
$agestart = $request->getVar('agestart');
$ageend = $request->getVar('ageend');
$religion = $request->getVar('religion');
$country = $request->getVar('country');


$table_name = "users";
$data['route'] = base_url('search');   





$gender = $lookingFor=='Groom'?1:2;
$fromheight = $request->getVar('fromheight');
$toheight = $request->getVar('toheight');

$religion = $request->getVar('religion');
$caste = $request->getVar('caste');
$maritalstatus = $request->getVar('maritalstatus');
$country = $request->getVar('country');
$state = $request->getVar('state');
$manglik = $request->getVar('manglik');
$highestdegree = $request->getVar('highestdegree');
$occupation = $request->getVar('occupation');




$data['table_name'] = $table_name;


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

$data_list = $db->table($table_name)
    ->where([$table_name.'.status' => $status])
    ->join("education as education","education.id={$table_name}.highestdegree","left")
    ->join("occupation as occupation","occupation.id={$table_name}.occupation","left")
    ->join("religion as religion","religion.id={$table_name}.religion","left")
    ->join("caste as caste","caste.id={$table_name}.caste","left")
    ->join("languages as languages","languages.id={$table_name}.mothertongue","left")
    ->join("countries as countries","countries.id={$table_name}.country","left")
    ->join("states as states","states.id={$table_name}.state","left")
    // ✅ Active Package join
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
        "user_package.id as user_package_id",           // 👉 Active package id (null = no package)
        "user_package.package_name as package_name",
        "user_package.plan_start_date_time as plan_start_date_time",
        "user_package.plan_end_date_time as plan_end_date_time",
        "user_package.contact_limit as contact_limit",
        "user_package.view_contact as view_contact",
        "TIMESTAMPDIFF(YEAR, {$table_name}.dob, CURDATE()) as age",
    ])
    ->where($table_name.'.role =', 2);





if(!empty($gender)) $data_list->where("{$table_name}.gender",$gender);
if(!empty($religion)) $data_list->where("{$table_name}.religion",$religion);
if(!empty($caste)) $data_list->where("{$table_name}.caste",$caste);
if(!empty($maritalstatus)) $data_list->where("{$table_name}.maritalstatus",$maritalstatus);
if(!empty($country)) $data_list->where("{$table_name}.country",$country);
if(!empty($state)) $data_list->where("{$table_name}.state",$state);
if(!empty($manglik)) $data_list->where("{$table_name}.manglik",$manglik);
if(!empty($highestdegree)) $data_list->where("{$table_name}.highestdegree",$highestdegree);
if(!empty($occupation)) $data_list->where("{$table_name}.occupation",$occupation);

$today = date("Y-m-d");
if(!empty($agestart) && !empty($ageend))
{
    // Convert age to date of birth range
    $from_date = date("Y-m-d", strtotime("-$ageend years", strtotime($today)));
    $to_date   = date("Y-m-d", strtotime("-$agestart years", strtotime($today)));

    $data_list->where("{$table_name}.dob >=", $from_date);
    $data_list->where("{$table_name}.dob <=", $to_date);
}

if(!empty($fromheight)) $data_list->where("{$table_name}.height >=",$fromheight);
if(!empty($toheight)) $data_list->where("{$table_name}.height <=",$toheight);

$total = $data_list->countAllResults(false);

$data_list = $data_list->orderBy($table_name.'.update_date_time','desc')
    ->limit($limit, $offset)
    ->get()
    ->getResult();




$data['pager'] = $pager->makeLinks($page, $limit, $total);
$data['totalData'] = $total;
$data['startData'] = $offset + 1;
$data['endData'] = ($offset + $limit > $total) ? $total : ($offset + $limit);
$data['data_list'] = $data_list;

?>

<!--  Start Header Area -->
<?php include"include/header.php"; ?>
<!-- End Header Area -->

    <div class="hom-top login_style">

    <?php include"include/header-nav.php"; ?>

     <section class="dashboard_bg">
        <div class="pt-40 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <div class="db-nav">
                            
                            <div class="db-nav-list">
                                <form action="<?=base_url('search')?>">
                                    <ul id="NavMenu" class="banner-form">
                                        
                                        <li>
                                            <div class="form-group">
                                                <label>I'm looking for</label>
                                                <select class="select" name="lookingFor">
                                                    <option disabled="" selected="" value="">I'm looking for</option>
                                                    <option value="Groom" <?php if($lookingFor=='Groom')echo'selected'; ?> >Groom</option>
                                                    <option value="Bride" <?php if($lookingFor=='Bride')echo'selected'; ?> >Bride</option>
                                                </select>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-group">
                                                <label>Start Age</label>
                                                <select class="select" name="agestart">
                                                    <option value="">Start Age</option>
                                                    <?php foreach (ages() as $key => $value) {?>
                                                        <option value="<?=$value ?>" <?php if($agestart==$value)echo'selected'; ?> ><?=$value ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-group">
                                                <label>End Age</label>
                                                <select class="select" name="ageend">
                                                    <option value="">End Age</option>
                                                    <?php foreach (ages() as $key => $value) {?>
                                                        <option value="<?=$value ?>" <?php if($ageend==$value)echo'selected'; ?> ><?=$value ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-group">
                                                <label>Religion</label>
                                                <select class="religion" name="religion">
                                                    <option value="">Religion</option>
                                                    <?php
                                                    if(!empty($religion))
                                                    {
                                                        $religions = $db->table("religion")->where(["id"=>$religion,])->get()->getFirstRow();
                                                        if(!empty($religions))
                                                        {
                                                    ?>
                                                    <option value="<?=$religions->id ?>" selected><?=$religions->name ?></option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-group">
                                                <label>Caste</label>
                                                <select class="caste" name="caste">
                                                    <option value="">Caste</option>
                                                    <?php
                                                    if(!empty($caste))
                                                    {
                                                        $castes = $db->table("caste")->where(["id"=>$caste,])->get()->getFirstRow();
                                                        if(!empty($castes))
                                                        {
                                                    ?>
                                                    <option value="<?=$castes->id ?>" selected><?=$castes->name ?></option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-group">
                                                <label>Marital Status</label>
                                                <select class="select" name="maritalstatus">
                                                    <option value="">Marital Status</option>
                                                    <?php foreach (marital_status() as $key => $value) {?>
                                                        <option value="<?=$value ?>" <?php if($maritalstatus==$value)echo'selected'; ?> ><?=$value ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-group">
                                                <label>Country</label>
                                                <select class="country" name="country">
                                                    <option value="">Country</option>
                                                    <?php  
                                                    if(!empty($country))
                                                    {
                                                        $countries = $db->table("countries")->where(["id"=>$country,])->get()->getFirstRow();
                                                        if(!empty($countries))
                                                        {
                                                    ?>
                                                    <option value="<?=$countries->id ?>" selected><?=$countries->name ?></option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                        </li>
                                        <li>
                                            <button class="cta-dark w-100" type="submit">Let's Beign</button>
                                        </li>
                                        
                                    </ul>
                                </form>
                            </div>

                            
                        
                        </div>
                        
                    </div>
                    <div class="col-md-8 col-lg-9">
                        
                        
                        <div id="myMatches" class="row">
                            <div class="col-md-12 db-sec-com">
                                <h2 class="db-tit">Search Result</h2>
                                <div class="db-pro-stat">
                                    <div class="db-inte-prof-list">
                                        <ul>
                                            <?php 
                                                
                                                echo view("user/card/profileListCard",["col"=>"col-md-6 col-lg-4","data_list"=>$data_list,]);
                                             ?>    
                                        </ul>
                                    </div>
                                </div>

                                <div class="pagination d-flex align-items-center justify-content-center mt-3">        
                                    <?=$data['pager']?>
                                </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->


<!--  Start Footer Area -->
<?php include"include/footer.php"; ?>
<!-- End Footer Area -->  