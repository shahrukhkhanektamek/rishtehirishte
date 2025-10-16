<div class="col-xs-12">
    <div class="col-md-12">
        <h3> Education & Profession</h3>
        
        <form method="post" action="<?=base_url('user/profile/step3')?>" id="step3FormData" class="row form_data" novalidate>

            <div class="col-md-12 form-group mb-0">
                <label class="lb">Highest Degree <span class="text-danger">*</span></label>
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

            <div class="col-md-12 form-group mb-0">
                <label class="lb">Collage Name </label>
                <input type="text" class="form-control" name="collegename" placeholder="" value="<?=@$row->collegename?>" >
            </div>

            <div class="col-md-12 form-group mb-0">
                <label class="lb">Occupation <span class="text-danger">*</span></label>
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
            <div class="col-md-12 form-group mb-0">
                <label class="lb">Annual Income </label>
                <select class="select"  name="annualincome">
                    <option value="">Select</option>
                    <?php foreach (incomes_inr() as $key => $value) {?>
                        <option value="<?=$value ?>" <?php if(@$row->annualincome==$value)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-12 form-group mb-0">
                <label class="lb">Annual Incom ( In $) </label>
                <select class="select"  name="annualincomeindoller">
                    <option value="">Select</option>
                    <?php foreach (incomes_doller() as $key => $value) {?>
                        <option value="<?=$value ?>" <?php if(@$row->annualincomeindoller==$value)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-md-12 form-group mb-0">
                <label class="lb">Diet </label>
                <select class="select"  name="diet">
                    <option value="">Select</option>
                    <?php foreach (diets() as $key => $value) {?>
                        <option value="<?=$value ?>" <?php if(@$row->diet==$value)echo'selected'; ?>><?=$value ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-lg-12 form-group mb-0">
                <label class="lb">Express Yourself </label>
                <textarea class="form-control" name="expressyou" rows="4" ><?=@$row->expressyou?></textarea>
                <script>CKEDITOR.replace( 'expressyou' );</script>
            </div>
            <div class="row justify-content-between">
                <button class="pull-right mt-2 btn btn-primary w-auto" type="submit" >Save & Next</button>               
            </div>    

        </form>

    </div>
</div>