<?=view('backend/include/header') ?>

<div class="page-content table_page">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0"><?=$data['page_title']?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?=base_url('/admin')?>">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a ><?=$data['title']?></a></li>
                            <li class="breadcrumb-item active"><?=$data['page_title']?></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <form class="row g-3 form_data" action="<?=$data['route'].'/update'?>" method="post" enctype="multipart/form-data" id="form_data_submit" novalidate>

             <?= csrf_field() ?>
            <input type="hidden" name="id" value="<?=encript(@$row->id)?>">
            
            <!--end col-->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0 flex-grow-1">Basic Information</h4>
                    </div>

                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row g-3">
                                
                                <div class="col-md-6 hide">
                                    <label class="form-label">Slug </label>
                                    <input type="text" class="form-control" name="slug" placeholder="" value="<?=@$row->slug?>" >
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Email </label>
                                    <input type="text" class="form-control" name="email" placeholder="" value="<?=@$row->email?>" >
                                </div>

                                <?php if(empty($row)){ ?>
                                    <div class="col-md-3">
                                        <label class="form-label">Password </label>
                                        <input type="text" class="form-control" name="password" placeholder="" >
                                    </div>
                                <?php } ?>

                                <div class="col-md-<?php if(empty($row))echo'3';else echo'6'; ?>">
                                    <label class="form-label">Name </label>
                                    <input type="text" class="form-control" name="name" placeholder="" value="<?=@$row->name?>" >
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Mobile </label>
                                    <input type="text" class="form-control" name="phone" placeholder="" value="<?=@$row->phone?>" >
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Alt. Mobile </label>
                                    <input type="text" class="form-control" name="alt_phone" placeholder="" value="<?=@$row->alt_phone?>" >
                                </div> 
                                

                                <div class="col-md-6">
                                    <label class="form-label">Date of birth </label>
                                    <?php 
                                    $day = '';
                                    $month = '';
                                    $year= '';
                                    if(!empty(@$row->dob))
                                    {
                                        $month = date("m", strtotime(@$row->dob));
                                        $day = date("d", strtotime(@$row->dob));
                                        $year = date("Y", strtotime(@$row->dob));
                                    }
                                    ?>
                                    <div class="btn-group w-100">
                                        <select class="form-control" name="month" >
                                            <option value="">Select Month</option>
                                            <?php foreach (months() as $key => $value) {?>
                                                <option value="<?=$key ?>" <?php if($month==$key)echo'selected'; ?>><?=$value ?></option>
                                            <?php } ?>
                                        </select>
                                        <select class="form-control" name="day" >
                                            <option value="">Select Day</option>
                                            <?php foreach (days() as $key => $value) {?>
                                                <option value="<?=$value ?>" <?php if($day==$value)echo'selected'; ?>><?=$value ?></option>
                                            <?php } ?>
                                        </select>
                                        <select class="form-control" name="year" >
                                            <option value="">Select Year</option>
                                            <?php foreach (years() as $key => $value) {?>
                                                <option value="<?=$value ?>" <?php if($year==$value)echo'selected'; ?>><?=$value ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>



                                <div class="col-md-3">
                                    <label class="form-label">Gender </label>
                                    <select class="select"  name="gender" >
                                        <option value="">Select Gender</option>
                                        <option value="1" <?php if(@$row->gender==1)echo'selected'; ?> >Male</option>
                                        <option value="2" <?php if(@$row->gender==2)echo'selected'; ?> >Female</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Create Profile For </label>
                                    <select class="select"  name="profilefor" >
                                        <option value="">Select</option>
                                        <?php foreach (create_for() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->profilefor==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Place Of Birth </label>
                                    <input type="text" class="form-control" name="place_of_birth" placeholder="" value="<?=@$row->place_of_birth?>" >
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Time Of Birth </label>
                                    <input type="text" class="form-control" id="timepicker1" name="time_of_birth" value="<?php if(!empty($row->time_of_birth))echo date("h:i A", strtotime($row->time_of_birth)) ?>" >
                                </div>
                                

                               

                                <div class="col-md-3">
                                    <label class="form-label">Country </label>
                                    <select class="form-control country"  name="country">
                                        <option value="">Select Country</option>
                                        <?php  
                                        if(!empty($row))
                                        {
                                            $country = $db->table("countries")->where(["id"=>$row->country,])->get()->getFirstRow();
                                            if(!empty($country))
                                            {
                                        ?>
                                        <option value="<?=$country->id ?>" selected><?=$country->name ?></option>
                                        <?php }} ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">State </label>
                                    <select class="state"  name="state">
                                        <option value="">Select State</option>
                                        <?php  
                                        if(!empty($row))
                                        {
                                            $state = $db->table("states")->where(["id"=>$row->state,])->get()->getFirstRow();
                                            if(!empty($state))
                                            {
                                        ?>
                                        <option value="<?=$state->id ?>" selected><?=$state->name ?></option>
                                        <?php }} ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">City </label>
                                    <input type="text" class="form-control" name="city" placeholder="" value="<?=@$row->city?>" >
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Pincode </label>
                                    <input type="text" class="form-control" name="pincode" placeholder="" value="<?=@$row->pincode?>" >
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Address </label>
                                    <input type="text" class="form-control" name="address" placeholder="" value="<?=@$row->address?>" >
                                </div>
                               

                                <div class="col-md-12">
                                    <label for="planStatus" class="form-label">Status </label>
                                    <select class="js-example-basic-single" id="planStatus" name="status" data-minimum-results-for-search="Infinity" >
                                        <option value="1" <?php if(!empty(@$row) && @$row->status==1) echo'selected' ?> >Active</option>
                                        <option value="0" <?php if(!empty(@$row) && @$row->status==0) echo'selected' ?> >Disable</option>
                                    </select>
                                    <div class="invalid-feedback">Please select any on option.</div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0 flex-grow-1">Profile Detail</h4>
                    </div>

                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row g-3">

                                <div class="col-md-4">
                                    <label class="form-label">Mother Tongue </label>
                                    <select class="languages"  name="mothertongue" >
                                        <option value="">Select</option>
                                        <?php
                                        if(!empty($row))
                                        {
                                            $languages = $db->table("languages")->where(["id"=>$row->mothertongue,])->get()->getFirstRow();
                                            if(!empty($languages))
                                            {
                                        ?>
                                        <option value="<?=$languages->id ?>" selected><?=$languages->name ?></option>
                                        <?php }} ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Challenged </label>
                                    <select class="select"  name="challenged">
                                        <option value="">Select</option>
                                        <?php foreach (challenged() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->challenged==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Marital Status </label>
                                    <select class="select"  name="maritalstatus">
                                        <option value="">Select</option>
                                        <?php foreach (marital_status() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->maritalstatus==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Have Children ? </label>
                                    <select class="select"  name="havechildren" >
                                        <option value="">Select</option>
                                        <?php foreach (have_children() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->havechildren==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Diet </label>
                                    <select class="select"  name="diet1" >
                                        <option value="">Select</option>
                                        <?php foreach (diets() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->diet1==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Drinking </label>
                                    <select class="select"  name="drinking" >
                                        <option value="">Select</option>
                                        <?php foreach (drinking() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->drinking==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Smoking </label>
                                    <select class="select"  name="smoking" >
                                        <option value="">Select</option>
                                        <?php foreach (smoking() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->smoking==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Religion </label>
                                    <select class="religion"  name="religion" >
                                        <option value="">Select</option>
                                        <?php
                                        if(!empty($row))
                                        {
                                            $languages = $db->table("religion")->where(["id"=>$row->religion,])->get()->getFirstRow();
                                            if(!empty($languages))
                                            {
                                        ?>
                                        <option value="<?=$languages->id ?>" selected><?=$languages->name ?></option>
                                        <?php }} ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Caste </label>
                                    <select class="caste"  name="caste" >
                                        <option value="">Select</option>
                                        <?php
                                        if(!empty($row))
                                        {
                                            $languages = $db->table("caste")->where(["id"=>$row->caste,])->get()->getFirstRow();
                                            if(!empty($languages))
                                            {
                                        ?>
                                        <option value="<?=$languages->id ?>" selected><?=$languages->name ?></option>
                                        <?php }} ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Are you manglik ? </label>
                                    <select class="select"  name="manglik" >
                                        <option value="">Select</option>
                                        <?php foreach (manglik() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->manglik==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Height </label>
                                    <select class="select"  name="height" >
                                        <option value="">Select</option>
                                        <?php foreach (heights() as $key => $value) {?>
                                            <option value="<?=$key ?>" <?php if(@$row->height==$key)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Complexion </label>
                                    <select class="select"  name="complexion" >
                                        <option value="">Select</option>
                                        <?php foreach (complexion() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->complexion==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Body Type </label>
                                    <select class="select"  name="body_type" >
                                        <option value="">Select</option>
                                        <?php foreach (body_type() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->body_type==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-lg-12 col-12 form-group">
                                     <label class="form-label">Images *</label>
                                     <div class="images">
                                         <?php 
                                             $file_data = array(
                                                 "position"=>3,
                                                 "columna_name"=>"images",
                                                 "multiple"=>true,
                                                 "accept"=>'image/*',
                                                 "col"=>"col-md-3",
                                                 "alt_text"=>"none",
                                                 "row"=>$row,
                                             );
                                             echo view('upload-multiple/index', compact('file_data'));
                                         ?>
                                     </div>
                                </div>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0 flex-grow-1">Education & Profession</h4>
                    </div>

                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row g-3">

                                <div class="col-md-4">
                                    <label class="form-label">Highest Degree </label>
                                    <select class="education"  name="highestdegree" >
                                        <option value="">Select</option>
                                        <?php
                                        if(!empty($row))
                                        {
                                            $educations = $db->table("education")->where(["id"=>$row->highestdegree,])->get()->getFirstRow();
                                            if(!empty($educations))
                                            {
                                        ?>
                                        <option value="<?=$educations->id ?>" selected><?=$educations->name ?></option>
                                        <?php }} ?>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Collage Name </label>
                                    <input type="text" class="form-control" name="collegename" placeholder="" value="<?=@$row->collegename?>" >
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Occupation </label>
                                    <select class="occupation"  name="occupation" >
                                        <option value="">Select</option>
                                        <?php
                                        if(!empty($row))
                                        {
                                            $occupations = $db->table("occupation")->where(["id"=>$row->occupation,])->get()->getFirstRow();
                                            if(!empty($occupations))
                                            {
                                        ?>
                                        <option value="<?=$occupations->id ?>" selected><?=$occupations->name ?></option>
                                        <?php }} ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Annual Income </label>
                                    <select class="select"  name="annualincome" >
                                        <option value="">Select</option>
                                        <?php foreach (incomes_inr() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->annualincome==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Annual Incom ( In $) </label>
                                    <select class="select"  name="annualincomeindoller" >
                                        <option value="">Select</option>
                                        <?php foreach (incomes_doller() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->annualincomeindoller==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Diet </label>
                                    <select class="select"  name="diet" >
                                        <option value="">Select</option>
                                        <?php foreach (diets() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->diet==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-lg-12">
                                    <label class="form-label">Express Yourself </label>
                                    <textarea class="form-control" name="expressyou" rows="4" ><?=@$row->expressyou?></textarea>
                                    <script>CKEDITOR.replace( 'expressyou' );</script>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0 flex-grow-1">Lifestyle & Family</h4>
                    </div>

                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row g-3">

                                <div class="col-md-4">
                                    <label class="form-label">Family Type </label>
                                    <select class="select"  name="family_type" >
                                        <option value="">Select</option>
                                        <?php foreach (family_type() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->family_type==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Family living in </label>
                                    <select class="state"  name="family_living" >
                                        <option value="">Select</option>
                                        <?php
                                        if(!empty($row))
                                        {
                                            $state = $db->table("states")->where(["id"=>$row->family_living,])->get()->getFirstRow();
                                            if(!empty($state))
                                            {
                                        ?>
                                        <option value="<?=$state->id ?>" selected><?=$state->name ?></option>
                                        <?php }} ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Father's Name </label>
                                    <input type="text" class="form-control" name="father_name" placeholder="" value="<?=@$row->father_name?>" >
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Father's Occupation </label>
                                    <select class="occupation"  name="father_occupation" >
                                        <option value="">Select</option>
                                        <?php
                                        if(!empty($row))
                                        {
                                            $occupations = $db->table("occupation")->where(["id"=>$row->father_occupation,])->get()->getFirstRow();
                                            if(!empty($occupations))
                                            {
                                        ?>
                                        <option value="<?=$occupations->id ?>" selected><?=$occupations->name ?></option>
                                        <?php }} ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Father's Annual Income </label>
                                    <select class="select"  name="father_annualincome" >
                                        <option value="">Select</option>
                                        <?php foreach (incomes_inr() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->father_annualincome==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Mother's Name </label>
                                    <input type="text" class="form-control" name="mother_name" placeholder="" value="<?=@$row->mother_name?>" >
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Mother's Occupation </label>
                                    <select class="occupation"  name="mother_occupation" >
                                        <option value="">Select</option>
                                        <?php
                                        if(!empty($row))
                                        {
                                            $occupations = $db->table("occupation")->where(["id"=>$row->mother_occupation,])->get()->getFirstRow();
                                            if(!empty($occupations))
                                            {
                                        ?>
                                        <option value="<?=$occupations->id ?>" selected><?=$occupations->name ?></option>
                                        <?php }} ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Mother's Annual Income </label>
                                    <select class="select"  name="mother_annualincome" >
                                        <option value="">Select</option>
                                        <?php foreach (incomes_inr() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->mother_annualincome==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>



                                <div class="col-md-4">
                                    <label class="form-label">Brothers Married </label>
                                    <select class="select"  name="brother_married" >
                                        <option value="">Select</option>
                                        <?php foreach (married_unmarried() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->brother_married==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Brothers Unmarried </label>
                                    <select class="select"  name="brother_unmarried" >
                                        <option value="">Select</option>
                                        <?php foreach (married_unmarried() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->brother_unmarried==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Sister Married </label>
                                    <select class="select"  name="sister_married" >
                                        <option value="">Select</option>
                                        <?php foreach (married_unmarried() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->sister_married==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Sister Unmarried </label>
                                    <select class="select"  name="sister_unmarried" >
                                        <option value="">Select</option>
                                        <?php foreach (married_unmarried() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->sister_unmarried==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-label">About My Family </label>
                                    <textarea class="form-control" name="aboutfamily" rows="4" ><?=@$row->aboutfamily?></textarea>
                                    <script>CKEDITOR.replace( 'aboutfamily' );</script>
                                </div>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0 flex-grow-1">Requirement for partner</h4>
                    </div>

                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row g-3">

                                <div class="col-md-4">
                                    <label class="form-label">From Age </label>
                                    <select class="select" name="agestartR"  >
                                        <option value="">Select</option>
                                        <?php foreach (ages() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$rowR->agestart==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">To Age </label>
                                    <select class="select" name="ageendR" >
                                        <option value="">Select</option>
                                        <?php foreach (ages() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$rowR->ageend==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">From Height </label>
                                    <select class="select" name="heightstartR" >
                                        <option value="">Select</option>
                                        <?php foreach (heights() as $key => $value) {?>
                                            <option value="<?=$key ?>" <?php if(@$rowR->heightstart==$key)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">To Height </label>
                                    <select class="select" name="heightendR" >
                                        <option value="">Select</option>
                                        <?php foreach (heights() as $key => $value) {?>
                                            <option value="<?=$key ?>" <?php if(@$rowR->heightend==$key)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Income From </label>
                                    <select class="select" name="incomeR" >
                                        <option value="">Select</option>
                                        <?php foreach (incomes_inr() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$rowR->income==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Income To </label>
                                    <select class="select" name="incomeendR" >
                                        <option value="">Select</option>
                                        <?php foreach (incomes_inr() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$rowR->incomeend==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Annual Incom ( In $) </label>
                                    <select class="select" name="incomedollarR" >
                                        <option value="">Select</option>
                                        <?php foreach (incomes_doller() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$rowR->incomedollar==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Annual Upto ( In $) </label>
                                    <select class="select" name="incomeenddollarR" >
                                        <option value="">Select</option>
                                        <?php foreach (incomes_doller() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$rowR->incomeenddollar==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>


                                <div class="col-md-4">
                                    <label class="form-label">Religion </label>
                                    <select class="" id="religionR" name="religionR[]" multiple >
                                        <option value="">Select</option>
                                        <?php
                                        if(!empty($row))
                                        {
                                            if(is_array(json_decode(@$rowR->religion)) || is_object(json_decode(@$rowR->religion)))
                                            $religions2 = $db->table("religion")->whereIn("id", json_decode(@$rowR->religion))->get()->getResult();
                                            if(!empty($religions2))
                                            {
                                                foreach ($religions2 as $key => $value) {
                                        ?>
                                                <option value="<?=$value->id ?>" selected><?=$value->name ?></option>
                                        <?php }}} ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Caste </label>
                                    <select class="" id="casteR" name="casteR[]" multiple >
                                        <option value="">Select</option>
                                        <?php
                                        if(!empty($row))
                                        {
                                            if(is_array(json_decode(@$rowR->caste)) || is_object(json_decode(@$rowR->caste)))
                                            $castes2 = $db->table("caste")->whereIn("id", json_decode(@$rowR->caste))->get()->getResult();
                                            if(!empty($castes2))
                                            {
                                                foreach ($castes2 as $key => $value) {
                                        ?>
                                                <option value="<?=$value->id ?>" selected><?=$value->name ?></option>
                                        <?php }}} ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Marital Status </label>
                                    <select class="select"  name="maritalstatusR[]" multiple >
                                        <option value="">Select</option>
                                        <?php foreach (marital_status() as $key => $value) {
                                            $selected = '';
                                            $selectedCheck = json_decode(@$rowR->maritalstatus);
                                            if(!empty($selectedCheck))
                                            {
                                                if(in_array($value, $selectedCheck))
                                                    $selected = 'selected';
                                            }
                                            ?>
                                            <option value="<?=$value ?>" <?=$selected?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Have Children ? </label>
                                    <select class="select" name="childrenR" >
                                        <option value="">Select</option>
                                        <?php foreach (have_children() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$rowR->children==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Manglik  </label>
                                    <select class="select"  name="manglikR[]" multiple >
                                        <option value="">Select</option>
                                        <?php foreach (manglik() as $key => $value) {
                                            $selected = '';
                                            $selectedCheck = json_decode(@$rowR->manglik);
                                            if(!empty($selectedCheck))
                                            {
                                                if(in_array($value, $selectedCheck))
                                                    $selected = 'selected';
                                            }
                                            ?>
                                            <option value="<?=$value ?>" <?=$selected?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Education </label>
                                    <select class="education" name="educationR[]" multiple >
                                        <option value="">Select</option>
                                        <?php
                                        if(!empty($row))
                                        {
                                            if(is_array(json_decode(@$rowR->education)) || is_object(json_decode(@$rowR->education)))
                                            $educations2 = $db->table("education")->whereIn("id", json_decode(@$rowR->education))->get()->getResult();
                                            if(!empty($educations2))
                                            {
                                                foreach ($educations2 as $key => $value) {
                                        ?>
                                                <option value="<?=$value->id ?>" selected><?=$value->name ?></option>
                                        <?php }}} ?>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Occupation </label>
                                    <select class="occupation"  name="occupationR[]" multiple >
                                        <option value="">Select</option>
                                        <?php
                                        if(!empty($row))
                                        {
                                            if(is_array(json_decode(@$rowR->occupation)) || is_object(json_decode(@$rowR->occupation)))
                                            $occupations2 = $db->table("occupation")->whereIn("id", json_decode(@$rowR->occupation))->get()->getResult();
                                            if(!empty($occupations2))
                                            {
                                                foreach ($occupations2 as $key => $value) {
                                        ?>
                                                <option value="<?=$value->id ?>" selected><?=$value->name ?></option>
                                        <?php }}} ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Country </label>
                                    <select class="" id="countryR" name="countryR[]" multiple >
                                        <option value="">Select</option>
                                        <?php
                                        if(!empty($row))
                                        {
                                            if(is_array(json_decode(@$rowR->country)) || is_object(json_decode(@$rowR->country)))
                                            $countries2 = $db->table("countries")->whereIn("id", json_decode(@$rowR->country))->get()->getResult();
                                            if(!empty($countries2))
                                            {
                                                foreach ($countries2 as $key => $value) {
                                        ?>
                                                <option value="<?=$value->id ?>" selected><?=$value->name ?></option>
                                        <?php }}} ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">State </label>
                                    <select class="" id="stateR" name="stateR[]" multiple >
                                        <option value="">Select</option>
                                        <?php
                                        if(!empty($row))
                                        {
                                            if(is_array(json_decode(@$rowR->state)) || is_object(json_decode(@$rowR->state)))
                                            $states2 = $db->table("states")->whereIn("id", json_decode(@$rowR->state))->get()->getResult();
                                            if(!empty($states2))
                                            {
                                                foreach ($states2 as $key => $value) {
                                        ?>
                                                <option value="<?=$value->id ?>" selected><?=$value->name ?></option>
                                        <?php }}} ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Challenged </label>
                                    <select class="select"  name="challengedR[]" multiple >
                                        <option value="">Select</option>
                                        <?php foreach (challenged() as $key => $value) {$selected = '';
                                            $selectedCheck = json_decode(@$rowR->challenged);
                                            if(!empty($selectedCheck))
                                            {
                                                if(in_array($value, $selectedCheck))
                                                    $selected = 'selected';
                                            }
                                            ?>
                                            <option value="<?=$value ?>" <?=$selected?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-lg-12">
                                    <label class="form-label">Other Requirements </label>
                                    <textarea class="form-control" name="otherrequirementsR" rows="4" ><?=@$rowR->otherrequirements?></textarea>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-12">                
                <div class="card card-body">
                    <div class="col-12">
                        <div class="text-start  text-center">
                            <button type="submit" class="btn btn-success btn-label"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
        <!--end row-->
    </div>
    <!-- container-fluid -->
</div><!-- End Page-content -->



<script>    
    $('#timepicker').mdtimepicker({
        timeFormat: 'hh:mm:ss.000', // format of the time value (data-time attribute)
        format: 'h:mm tt',    // format of the input value
        readOnly: false,       // determines if input is readonly
        hourPadding: false,
        theme: 'purple',
        okLabel: 'Ok',
        cancelLabel: 'Cancel'
    });
</script>

<script>
    var maritalstatus = $('select[name="maritalstatus"]');
    var havechildren = $('select[name="havechildren"]');

    $(document).on("change", maritalstatus ,(function(e) {
        setHideShowFlieds();
    }));

    function setHideShowFlieds() {
        if($(maritalstatus).val()=='Never Married')
        {
            $(havechildren).parent().hide();
        }
        else
        {
            $(havechildren).parent().show();            
        }
    }
    setHideShowFlieds();
</script>

<script>
    var maritalstatusR = $('select[name="maritalstatusR[]"]');
    var havechildrenR = $('select[name="childrenR"]');

    $(document).on("change", maritalstatusR ,(function(e) {
        setHideShowFliedsR();
    }));

    function setHideShowFliedsR() {
        if($(maritalstatusR).val().includes('Never Married'))
        {
            $(havechildrenR).parent().hide();
        }
        else
        {
            $(havechildrenR).parent().show();            
        }
    }
    setHideShowFliedsR();
</script>



<?=view('backend/include/footer') ?>