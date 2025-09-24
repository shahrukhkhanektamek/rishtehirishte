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
                                    <label class="form-label">Slug <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="slug" placeholder="" value="<?=@$row->slug?>" >
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="" value="<?=@$row->name?>" required>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="email" placeholder="" value="<?=@$row->email?>" required>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Mobile <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="phone" placeholder="" value="<?=@$row->phone?>" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Alt. Mobile <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="alt_phone" placeholder="" value="<?=@$row->alt_phone?>" >
                                </div>

                                

                                <div class="col-md-2">
                                    <label class="form-label">Gender <span class="text-danger">*</span></label>
                                    <select class="select"  name="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="1" <?php if($row->gender==1)echo'selected'; ?> >Male</option>
                                        <option value="2" <?php if($row->gender==2)echo'selected'; ?> >Female</option>
                                        <option value="3" <?php if($row->gender==3)echo'selected'; ?> >Transgender</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Date of birth <span class="text-danger">*</span></label>
                                    <?php 
                                    $day = '';
                                    $month = '';
                                    $year= '';
                                    if(!empty($row->dob))
                                    {
                                        $month = date("m", strtotime($row->dob));
                                        $day = date("d", strtotime($row->dob));
                                        $year = date("Y", strtotime($row->dob));
                                    }
                                    ?>
                                    <div class="btn-group w-100">
                                        <select class="form-control" name="month" required>
                                            <option value="">Select Month</option>
                                            <?php foreach (months() as $key => $value) {?>
                                                <option value="<?=$key ?>" <?php if($month==$key)echo'selected'; ?>><?=$value ?></option>
                                            <?php } ?>
                                        </select>
                                        <select class="form-control" name="day" required>
                                            <option value="">Select Day</option>
                                            <?php foreach (days() as $key => $value) {?>
                                                <option value="<?=$value ?>" <?php if($day==$value)echo'selected'; ?>><?=$value ?></option>
                                            <?php } ?>
                                        </select>
                                        <select class="form-control" name="year" required>
                                            <option value="">Select Year</option>
                                            <?php foreach (years() as $key => $value) {?>
                                                <option value="<?=$value ?>" <?php if($year==$value)echo'selected'; ?>><?=$value ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Place Of Birth <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="place_of_birth" placeholder="" value="<?=@$row->place_of_birth?>" >
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Time Of Birth <span class="text-danger">*</span></label>
                                    <input type="time" class="form-control" name="time_of_birth" value="<?=@$row->time_of_birth?>" >
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Create Profile For <span class="text-danger">*</span></label>
                                    <select class="select"  name="profilefor" required>
                                        <option value="">Select</option>
                                        <?php foreach (create_for() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->profilefor==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                               

                                <div class="col-md-3">
                                    <label class="form-label">Country <span class="text-danger">*</span></label>
                                    <select class="form-control country" required name="country">
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
                                    <label class="form-label">State <span class="text-danger">*</span></label>
                                    <select class="state" required name="state">
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
                                    <label class="form-label">City <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="city" placeholder="" value="<?=@$row->city?>" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Pincode <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="pincode" placeholder="" value="<?=@$row->pincode?>" required>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Address <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="address" placeholder="" value="<?=@$row->address?>" required>
                                </div>
                               

                                <div class="col-md-12">
                                    <label for="planStatus" class="form-label">Status <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single" id="planStatus" name="status" data-minimum-results-for-search="Infinity" required>
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
                                    <label class="form-label">Marital Status <span class="text-danger">*</span></label>
                                    <select class="select"  name="maritalstatus">
                                        <option value="">Select</option>
                                        <?php foreach (marital_status() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->maritalstatus==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Have Children ? <span class="text-danger">*</span></label>
                                    <select class="select"  name="havechildren" required>
                                        <option value="">Select</option>
                                        <?php foreach (have_children() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->havechildren==$value)echo'selected'; ?>><?=$value ?></option>
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
                                    <label class="form-label">Caste <span class="text-danger">*</span></label>
                                    <select class="caste"  name="caste" required>
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
                                    <label class="form-label">Are you manglik ? <span class="text-danger">*</span></label>
                                    <select class="select"  name="manglik" required>
                                        <option value="">Select</option>
                                        <?php foreach (manglik() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->manglik==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Height <span class="text-danger">*</span></label>
                                    <select class="select"  name="height" required>
                                        <option value="">Select</option>
                                        <?php foreach (heights() as $key => $value) {?>
                                            <option value="<?=$key ?>" <?php if(@$row->height==$key)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Complexion <span class="text-danger">*</span></label>
                                    <select class="select"  name="complexion" required>
                                        <option value="">Select</option>
                                        <?php foreach (complexion() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->complexion==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Body Type <span class="text-danger">*</span></label>
                                    <select class="select"  name="body_type" required>
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
                                                 "col"=>"col-md-12",
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
                                    <label class="form-label">Highest Degree <span class="text-danger">*</span></label>
                                    <select class="education"  name="highestdegree" required>
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
                                    <label class="form-label">Collage Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="collegename" placeholder="" value="<?=@$row->collegename?>" required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Occupation <span class="text-danger">*</span></label>
                                    <select class="occupation"  name="occupation" required>
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
                                    <label class="form-label">Annual Income <span class="text-danger">*</span></label>
                                    <select class="select"  name="annualincome" required>
                                        <option value="">Select</option>
                                        <?php foreach (incomes_inr() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->annualincome==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Annual Incom ( In $) <span class="text-danger">*</span></label>
                                    <select class="select"  name="annualincomeindoller" required>
                                        <option value="">Select</option>
                                        <?php foreach (incomes_doller() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->annualincomeindoller==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Diet <span class="text-danger">*</span></label>
                                    <select class="select"  name="diet" required>
                                        <option value="">Select</option>
                                        <?php foreach (diets() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->diet==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-lg-12">
                                    <label class="form-label">Express Yourself <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="expressyou" rows="4" required><?=@$row->expressyou?></textarea>
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
                                    <label class="form-label">Family Type <span class="text-danger">*</span></label>
                                    <select class="select"  name="family_type" required>
                                        <option value="">Select</option>
                                        <?php foreach (family_type() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->family_type==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Family living in <span class="text-danger">*</span></label>
                                    <select class="state"  name="family_living" required>
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
                                    <label class="form-label">Father's Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="father_name" placeholder="" value="<?=@$row->father_name?>" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Father's Occupation <span class="text-danger">*</span></label>
                                    <select class="occupation"  name="father_occupation" required>
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
                                    <label class="form-label">Father's Annual Income <span class="text-danger">*</span></label>
                                    <select class="select"  name="father_annualincome" required>
                                        <option value="">Select</option>
                                        <?php foreach (incomes_inr() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->father_annualincome==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Mother's Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="mother_name" placeholder="" value="<?=@$row->mother_name?>" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Mother's Occupation <span class="text-danger">*</span></label>
                                    <select class="occupation"  name="mother_occupation" required>
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
                                    <label class="form-label">Mother's Annual Income <span class="text-danger">*</span></label>
                                    <select class="select"  name="mother_annualincome" required>
                                        <option value="">Select</option>
                                        <?php foreach (incomes_inr() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->mother_annualincome==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>



                                <div class="col-md-4">
                                    <label class="form-label">Brothers Married <span class="text-danger">*</span></label>
                                    <select class="select"  name="brother_married" required>
                                        <option value="">Select</option>
                                        <?php foreach (married_unmarried() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->brother_married==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Brothers Unmarried <span class="text-danger">*</span></label>
                                    <select class="select"  name="brother_unmarried" required>
                                        <option value="">Select</option>
                                        <?php foreach (married_unmarried() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->brother_unmarried==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Sister Married <span class="text-danger">*</span></label>
                                    <select class="select"  name="sister_married" required>
                                        <option value="">Select</option>
                                        <?php foreach (married_unmarried() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->sister_married==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Sister Unmarried <span class="text-danger">*</span></label>
                                    <select class="select"  name="sister_unmarried" required>
                                        <option value="">Select</option>
                                        <?php foreach (married_unmarried() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->sister_unmarried==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-label">About My Family <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="aboutfamily" rows="4" required><?=@$row->aboutfamily?></textarea>
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
                                    <label class="form-label">From Age <span class="text-danger">*</span></label>
                                    <select class="select"  name="for" required>
                                        <option value="">Select</option>
                                        <?php foreach (ages() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->for==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">To Age <span class="text-danger">*</span></label>
                                    <select class="select"  name="for" required>
                                        <option value="">Select</option>
                                        <?php foreach (ages() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->for==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">From Height <span class="text-danger">*</span></label>
                                    <select class="select"  name="for" required>
                                        <option value="">Select</option>
                                        <?php foreach (heights() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->for==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">To Height <span class="text-danger">*</span></label>
                                    <select class="select"  name="for" required>
                                        <option value="">Select</option>
                                        <?php foreach (heights() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->for==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Have Children ? <span class="text-danger">*</span></label>
                                    <select class="select"  name="for" required>
                                        <option value="">Select</option>
                                        <?php foreach (have_children() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->for==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Income From <span class="text-danger">*</span></label>
                                    <select class="select"  name="for" required>
                                        <option value="">Select</option>
                                        <?php foreach (incomes_inr() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->for==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Income To <span class="text-danger">*</span></label>
                                    <select class="select"  name="for" required>
                                        <option value="">Select</option>
                                        <?php foreach (incomes_inr() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->for==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Annual Incom ( In $) <span class="text-danger">*</span></label>
                                    <select class="select"  name="for" required>
                                        <option value="">Select</option>
                                        <?php foreach (incomes_doller() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->for==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Annual Upto ( In $) <span class="text-danger">*</span></label>
                                    <select class="select"  name="for" required>
                                        <option value="">Select</option>
                                        <?php foreach (incomes_doller() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->for==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>


                                <div class="col-md-4">
                                    <label class="form-label">Religion <span class="text-danger">*</span></label>
                                    <select class="religion"  name="for" multiple >
                                        <option value="">Select</option>
                                        <?php
                                        if(!empty($row))
                                        {
                                            $religions = $db->table("religion")->where(["id"=>$row->religion,])->get()->getFirstRow();
                                            if(!empty($religions))
                                            {
                                        ?>
                                        <option value="<?=$religions->id ?>" selected><?=$religions->name ?></option>
                                        <?php }} ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Caste <span class="text-danger">*</span></label>
                                    <select class="caste"  name="for" multiple >
                                        <option value="">Select</option>
                                        <?php
                                        if(!empty($row))
                                        {
                                            $castes = $db->table("caste")->where(["id"=>$row->caste,])->get()->getFirstRow();
                                            if(!empty($castes))
                                            {
                                        ?>
                                        <option value="<?=$castes->id ?>" selected><?=$castes->name ?></option>
                                        <?php }} ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Marital Status <span class="text-danger">*</span></label>
                                    <select class="select"  name="for" multiple >
                                        <option value="">Select</option>
                                        <?php foreach (marital_status() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->for==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Manglik  <span class="text-danger">*</span></label>
                                    <select class="select"  name="for" multiple >
                                        <option value="">Select</option>
                                        <?php foreach (manglik() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->for==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Education <span class="text-danger">*</span></label>
                                    <select class="select"  name="for" multiple >
                                        <option value="">Select</option>
                                        <?php foreach (create_for() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->for==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Occupation <span class="text-danger">*</span></label>
                                    <select class="occupation"  name="for" multiple >
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
                                    <label class="form-label">Country <span class="text-danger">*</span></label>
                                    <select class="country"  name="for" multiple >
                                        <option value="">Select</option>
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
                                <div class="col-md-4">
                                    <label class="form-label">State <span class="text-danger">*</span></label>
                                    <select class="state"  name="for" multiple >
                                        <option value="">Select</option>
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
                                <div class="col-md-4">
                                    <label class="form-label">Challenged <span class="text-danger">*</span></label>
                                    <select class="select"  name="for" multiple >
                                        <option value="">Select</option>
                                        <?php foreach (challenged() as $key => $value) {?>
                                            <option value="<?=$value ?>" <?php if(@$row->for==$value)echo'selected'; ?>><?=$value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-lg-12">
                                    <label class="form-label">Other Requirements <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="about_family" rows="4" required><?=@$row->about_family?></textarea>
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







<?=view('backend/include/footer') ?>