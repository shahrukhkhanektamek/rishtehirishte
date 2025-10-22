<div class="col-xs-12">
    <div class="col-md-12">
        <h3>Requirement for partner</h3>
        
        <form method="post" action="<?=base_url('user/profile/step5')?>" id="step5FormData" class="row form_data" novalidate>

            <div class="col-md-6 form-group mb-0">
                <label class="lb">From Age <span class="text-danger">*</span></label>
                <select class="select" name="agestartR" required >
                    <option value="">Select</option>
                    <?php foreach (ages() as $key => $value) {?>
                        <option value="<?=$value ?>" <?php if(@$rowR->agestart==$value)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-6 form-group mb-0">
                <label class="lb">To Age <span class="text-danger">*</span></label>
                <select class="select" name="ageendR" required>
                    <option value="">Select</option>
                    <?php foreach (ages() as $key => $value) {?>
                        <option value="<?=$value ?>" <?php if(@$rowR->ageend==$value)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-6 form-group mb-0">
                <label class="lb">From Height <span class="text-danger">*</span></label>
                <select class="select" name="heightstartR" >
                    <option value="">Select</option>
                    <?php foreach (heights() as $key => $value) {?>
                        <option value="<?=$key ?>" <?php if(@$rowR->heightstart==$key)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-6 form-group mb-0">
                <label class="lb">To Height <span class="text-danger">*</span></label>
                <select class="select" name="heightendR" >
                    <option value="">Select</option>
                    <?php foreach (heights() as $key => $value) {?>
                        <option value="<?=$key ?>" <?php if(@$rowR->heightend==$key)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>
            
            <div class="col-md-4 form-group mb-0">
                <label class="lb">Annual Income From </label>
                <select class="select" name="incomeR" >
                    <option value="">Select</option>
                    <?php foreach (incomes_inr() as $key => $value) {?>
                        <option value="<?=$value ?>" <?php if(@$rowR->income==$value)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4 form-group mb-0">
                <label class="lb">Annual Income To </label>
                <select class="select" name="incomeendR" >
                    <option value="">Select</option>
                    <?php foreach (incomes_inr() as $key => $value) {?>
                        <option value="<?=$value ?>" <?php if(@$rowR->incomeend==$value)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4 form-group mb-0">
                <label class="lb">Annual Income From ( In $) </label>
                <select class="select" name="incomedollarR" >
                    <option value="">Select</option>
                    <?php foreach (incomes_doller() as $key => $value) {?>
                        <option value="<?=$value ?>" <?php if(@$rowR->incomedollar==$value)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4 form-group mb-0">
                <label class="lb">Annual Income To Upto ( In $) </label>
                <select class="select" name="incomeenddollarR" >
                    <option value="">Select</option>
                    <?php foreach (incomes_doller() as $key => $value) {?>
                        <option value="<?=$value ?>" <?php if(@$rowR->incomeenddollar==$value)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>


            <div class="col-md-12 form-group mb-0">
                <label class="lb">Religion <span class="text-danger">*</span></label>
                <select class="" name="religionR[]" multiple required id="religionR" >
                    <option value="">Select</option>
                    <?php
                    if(!empty($row))
                    {
                        if(is_array(json_decode(@$rowR->religion)) || is_object(json_decode(@$rowR->religion)))
                        $religions = $db->table("religion")->whereIn("id", json_decode(@$rowR->religion))->get()->getResult();
                        if(!empty($religions))
                        {
                            foreach ($religions as $key => $value) {
                    ?>
                            <option value="<?=$value->id ?>" selected><?=$value->name ?></option>
                    <?php }}} ?>
                </select>
            </div>
            <div class="col-md-12 form-group mb-0">
                <label class="lb">Caste <span class="text-danger">*</span></label>
                <select class=""  name="casteR[]" multiple required id="casteR" >
                    <option value="">Select</option>
                    <?php
                    if(!empty($row))
                    {
                        if(is_array(json_decode(@$rowR->caste)) || is_object(json_decode(@$rowR->caste)))
                        $castes = $db->table("caste")->whereIn("id", json_decode(@$rowR->caste))->get()->getResult();
                        if(!empty($castes))
                        {
                            foreach ($castes as $key => $value) {
                    ?>
                            <option value="<?=$value->id ?>" selected><?=$value->name ?></option>
                    <?php }}} ?>
                </select>
            </div>
            <div class="col-md-12 form-group mb-0">
                <label class="lb">Marital Status <span class="text-danger">*</span></label>
                <select class="select"  name="maritalstatusR[]" multiple required >
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
            <div class="col-md-12 form-group mb-0">
                <label class="lb">Have Children ? </label>
                <select class="select" name="childrenR" >
                    <option value="">Select</option>
                    <?php foreach (have_children() as $key => $value) {?>
                        <option value="<?=$value ?>" <?php if(@$rowR->children==$value)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-12 form-group mb-0">
                <label class="lb">Manglik  </label>
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
            <div class="col-md-12 form-group mb-0">
                <label class="lb">Education </label>
                <select class="education" name="educationR[]" multiple >
                    <option value="">Select</option>
                    <?php
                    if(!empty($row))
                    {
                        if(is_array(json_decode(@$rowR->education)) || is_object(json_decode(@$rowR->education)))
                        $educations = $db->table("education")->whereIn("id", json_decode(@$rowR->education))->get()->getResult();
                        if(!empty($educations))
                        {
                            foreach ($educations as $key => $value) {
                    ?>
                            <option value="<?=$value->id ?>" selected><?=$value->name ?></option>
                    <?php }}} ?>
                </select>
            </div>
            <div class="col-md-12 form-group mb-0">
                <label class="lb">Occupation </label>
                <select class="occupation"  name="occupationR[]" multiple >
                    <option value="">Select</option>
                    <?php
                    if(!empty($row))
                    {
                        if(is_array(json_decode(@$rowR->occupation)) || is_object(json_decode(@$rowR->occupation)))
                        $occupations = $db->table("occupation")->whereIn("id", json_decode(@$rowR->occupation))->get()->getResult();
                        if(!empty($occupations))
                        {
                            foreach ($occupations as $key => $value) {
                    ?>
                            <option value="<?=$value->id ?>" selected><?=$value->name ?></option>
                    <?php }}} ?>
                </select>
            </div>
            <div class="col-md-12 form-group mb-0">
                <label class="lb">Country <span class="text-danger">*</span></label>
                <select class="country"  name="countryR[]" multiple >
                    <option value="">Select</option>
                    <?php
                    if(!empty($row))
                    {
                        if(is_array(json_decode(@$rowR->country)) || is_object(json_decode(@$rowR->country)))
                        $countries = $db->table("countries")->whereIn("id", json_decode(@$rowR->country))->get()->getResult();
                        if(!empty($countries))
                        {
                            foreach ($countries as $key => $value) {
                    ?>
                            <option value="<?=$value->id ?>" selected><?=$value->name ?></option>
                    <?php }}} ?>
                </select>
            </div>
            <div class="col-md-12 form-group mb-0">
                <label class="lb">State </label>
                <select class="state"  name="stateR[]" multiple >
                    <option value="">Select</option>
                    <?php
                    if(!empty($row))
                    {
                        if(is_array(json_decode(@$rowR->state)) || is_object(json_decode(@$rowR->state)))
                        $states = $db->table("states")->whereIn("id", json_decode(@$rowR->state))->get()->getResult();
                        if(!empty($states))
                        {
                            foreach ($states as $key => $value) {
                    ?>
                            <option value="<?=$value->id ?>" selected><?=$value->name ?></option>
                    <?php }}} ?>
                </select>
            </div>
            <div class="col-md-12 form-group mb-0">
                <label class="lb">Challenged </label>
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

            <div class="col-lg-12 form-group mb-02">
                <label class="lb">Other Requirements </label>
                <textarea class="form-control" name="otherrequirementsR" rows="4" ><?=@$rowR->otherrequirements?></textarea>
            </div>

            <div class="row justify-content-between">
                <button class="pull-right mt-2 btn btn-primary w-auto" type="submit" >Finish</button>
            </div>  


        </form>

    </div>
</div>




