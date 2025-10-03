<div class="col-xs-12">
    <div class="col-md-12">
        <h3> Lifestyle & Family</h3>
        
        <form method="post" action="<?=base_url('user/profile/step4')?>" id="step4FormData" class="row form_data" novalidate>

            <div class="col-md-6 form-group mb-0">
                <label class="lb">Family Type <span class="text-danger">*</span></label>
                <select class="select"  name="family_type" required>
                    <option value="">Select</option>
                    <?php foreach (family_type() as $key => $value) {?>
                        <option value="<?=$value ?>" <?php if(@$row->family_type==$value)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-6 form-group mb-0">
                <label class="lb">Family living in <span class="text-danger">*</span></label>
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
            <div class="col-md-12 form-group mb-0">
                <label class="lb">Father's Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="father_name" placeholder="" value="<?=@$row->father_name?>" required>
            </div>
            <div class="col-md-6 form-group mb-0">
                <label class="lb">Father's Occupation <span class="text-danger">*</span></label>
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
            <div class="col-md-6 form-group mb-0">
                <label class="lb">Father's Annual Income <span class="text-danger">*</span></label>
                <select class="select"  name="father_annualincome" required>
                    <option value="">Select</option>
                    <?php foreach (incomes_inr() as $key => $value) {?>
                        <option value="<?=$value ?>" <?php if(@$row->father_annualincome==$value)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-md-12 form-group mb-0">
                <label class="lb">Mother's Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="mother_name" placeholder="" value="<?=@$row->mother_name?>" required>
            </div>
            <div class="col-md-6 form-group mb-0">
                <label class="lb">Mother's Occupation <span class="text-danger">*</span></label>
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
            <div class="col-md-6 form-group mb-0">
                <label class="lb">Mother's Annual Income <span class="text-danger">*</span></label>
                <select class="select"  name="mother_annualincome" required>
                    <option value="">Select</option>
                    <?php foreach (incomes_inr() as $key => $value) {?>
                        <option value="<?=$value ?>" <?php if(@$row->mother_annualincome==$value)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>



            <div class="col-md-6 form-group mb-0">
                <label class="lb">Brothers Married <span class="text-danger">*</span></label>
                <select class="select"  name="brother_married" required>
                    <option value="">Select</option>
                    <?php foreach (married_unmarried() as $key => $value) {?>
                        <option value="<?=$value ?>" <?php if(@$row->brother_married==$value)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-6 form-group mb-0">
                <label class="lb">Brothers Unmarried <span class="text-danger">*</span></label>
                <select class="select"  name="brother_unmarried" required>
                    <option value="">Select</option>
                    <?php foreach (married_unmarried() as $key => $value) {?>
                        <option value="<?=$value ?>" <?php if(@$row->brother_unmarried==$value)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-6 form-group mb-0">
                <label class="lb">Sister Married <span class="text-danger">*</span></label>
                <select class="select"  name="sister_married" required>
                    <option value="">Select</option>
                    <?php foreach (married_unmarried() as $key => $value) {?>
                        <option value="<?=$value ?>" <?php if(@$row->sister_married==$value)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-6 form-group mb-0">
                <label class="lb">Sister Unmarried <span class="text-danger">*</span></label>
                <select class="select"  name="sister_unmarried" required>
                    <option value="">Select</option>
                    <?php foreach (married_unmarried() as $key => $value) {?>
                        <option value="<?=$value ?>" <?php if(@$row->sister_unmarried==$value)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-12 form-group mb-0">
                <label class="lb">About My Family <span class="text-danger">*</span></label>
                <textarea class="form-control" name="aboutfamily" rows="4" required><?=@$row->aboutfamily?></textarea>
                <script>CKEDITOR.replace( 'aboutfamily' );</script>
            </div>
            <div class="row justify-content-between">
                <button class="pull-right mt-2 btn btn-primary w-auto" type="submit" >Save & Next</button>               
            </div>  
            

        </form>

    </div>
</div>