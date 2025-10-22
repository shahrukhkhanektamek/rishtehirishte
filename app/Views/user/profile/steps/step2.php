<div class="col-xs-12">
    <div class="col-md-12">
        <h3> Profile Detail</h3>
        
        <form method="post" action="<?=base_url('user/profile/step2')?>" id="step2FormData" class="row form_data" novalidate>

            <div class="col-md-4 form-group mb-0">
                <label class="lb">Mother Tongue </label>
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
            <div class="col-md-4 form-group mb-0">
                <label class="lb">Challenged </label>
                <select class="select"  name="challenged" >
                    <option value="">Select</option>
                    <?php foreach (challenged() as $key => $value) {?>
                        <option value="<?=$value ?>" <?php if(@$row->challenged==$value)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4 form-group mb-0">
                <label class="lb">Marital Status <span class="text-danger">*</span></label>
                <select class="select"  name="maritalstatus" required>
                    <option value="">Select</option>
                    <?php foreach (marital_status() as $key => $value) {?>
                        <option value="<?=$value ?>" <?php if(@$row->maritalstatus==$value)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4 form-group mb-0">
                <label class="lb">Have Children ? </label>
                <select class="select"  name="havechildren" >
                    <option value="">Select</option>
                    <?php foreach (have_children() as $key => $value) {?>
                        <option value="<?=$value ?>" <?php if(@$row->havechildren==$value)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4 form-group mb-0">
                <label class="lb">Diet </label>
                <select class="select"  name="diet1">
                    <option value="">Select</option>
                    <?php foreach (diets() as $key => $value) {?>
                        <option value="<?=$value ?>" <?php if(@$row->diet1==$value)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-md-4 form-group mb-0">
                <label class="lb">Drinking </label>
                <select class="select"  name="drinking" >
                    <option value="">Select</option>
                    <?php foreach (drinking() as $key => $value) {?>
                        <option value="<?=$value ?>" <?php if(@$row->drinking==$value)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-md-4 form-group mb-0">
                <label class="lb">Smoking </label>
                <select class="select"  name="smoking" >
                    <option value="">Select</option>
                    <?php foreach (smoking() as $key => $value) {?>
                        <option value="<?=$value ?>" <?php if(@$row->smoking==$value)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-md-4 form-group mb-0">
                <label class="lb">Religion <span class="text-danger">*</span></label>
                <select class="religion"  name="religion" required>
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
            <div class="col-md-4 form-group mb-0">
                <label class="lb">Caste <span class="text-danger">*</span></label>
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
            <div class="col-md-4 form-group mb-0">
                <label class="lb">Are you manglik ? </label>
                <select class="select"  name="manglik" >
                    <option value="">Select</option>
                    <?php foreach (manglik() as $key => $value) {?>
                        <option value="<?=$value ?>" <?php if(@$row->manglik==$value)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4 form-group mb-0">
                <label class="lb">Height <span class="text-danger">*</span></label>
                <select class="select"  name="height" required>
                    <option value="">Select</option>
                    <?php foreach (heights() as $key => $value) {?>
                        <option value="<?=$key ?>" <?php if(@$row->height==$key)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4 form-group">
                <label class="lb">Complexion </label>
                <select class="select"  name="complexion" >
                    <option value="">Select</option>
                    <?php foreach (complexion() as $key => $value) {?>
                        <option value="<?=$value ?>" <?php if(@$row->complexion==$value)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4 form-group">
                <label class="lb">Body Type </label>
                <select class="select"  name="body_type" >
                    <option value="">Select</option>
                    <?php foreach (body_type() as $key => $value) {?>
                        <option value="<?=$value ?>" <?php if(@$row->body_type==$value)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>
            
            
            <div class="col-md-4 form-group mb-0">
                <label class="lb">Country <span class="text-danger">*</span></label>
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
            <div class="col-md-4 form-group mb-0">
                <label class="lb">State <span class="text-danger">*</span></label>
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
            <div class="col-md-4 form-group mb-0">
                <label class="lb">City </label>
                <input type="text" class="form-control" name="city" placeholder="" value="<?=@$row->city?>" >
            </div>
            <div class="col-md-4 form-group mb-0">
                <label class="lb">Pincode </label>
                <input type="text" class="form-control" name="pincode" placeholder="" value="<?=@$row->pincode?>" >
            </div>
            <div class="col-md-12 form-group mb-0">
                <label class="lb">Address </label>
                <input type="text" class="form-control" name="address" placeholder="" value="<?=@$row->address?>" >
            </div>

            <div class="col-lg-12 col-12 form-group form-group mb-0">
                 <label class="lb">Images *</label>
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
            
            <div class="row justify-content-between">
                <button class="pull-right mt-2 btn btn-primary w-auto" type="submit" >Save & Next</button>               
            </div>    

        </form>
        

        
    </div>
</div>


