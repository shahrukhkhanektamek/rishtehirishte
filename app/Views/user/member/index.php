<?php $user = get_user(); ?>
<!--  Start Header Area -->
<?php echo view("web/include/header.php"); ?>
<!-- End Header Area -->

<style>
    .plans-main ul li, .plans-main .container
    {
        padding: 0;
    }
    .plans-main {
        padding-bottom: 25px;
    }
</style>
    <div class="hom-top login_style">

    <?php echo view("web/include/header-nav.php"); ?>

    <?php echo view("web/include/dashboard-nav.php"); ?>

                            
                        
                        </div>
                        
                    </div>
                    <div class="col-md-8 col-lg-9">
                        
                        <div class="row">
                            <div class="col-md-12 db-sec-com">
                                <h2 class="db-tit">View Profiles</h2>

                                
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                  
                                  <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Quick Search
                                      </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                      <div class="accordion-body">
                                        <div class="row">
                                            
                                            <div class="col-md-2">
                                                <label class="form-label">Gender</label>
                                                <select class="select" id="gender1" >
                                                    <option value="">Select Gender</option>
                                                    <?php if(@$user->gender==2){ ?>
                                                        <option value="1" >Male</option>
                                                    <?php }else if(@$user->gender==1){ ?>
                                                        <option value="2">Female</option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-md-2">
                                                <label class="form-label">From Age</label>
                                                <select class="select" id="agestart1"  >
                                                    <option value="">Select</option>
                                                    <?php foreach (ages() as $key => $value) {?>
                                                        <option value="<?=$value ?>"><?=$value ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-md-2">
                                                <label class="form-label">To Age</label>
                                                <select class="select" id="ageend1" >
                                                    <option value="">Select</option>
                                                    <?php foreach (ages() as $key => $value) {?>
                                                        <option value="<?=$value ?>"><?=$value ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Religion </label>
                                                <select class="religion"  id="religion1" >
                                                    <option value="">Select</option>
                                                </select>
                                            </div>

                                            <div class="col-md-3">
                                                <label class="form-label">Caste</label>
                                                <select class="caste"  id="caste1" >
                                                    <option value="">Select</option>
                                                </select>
                                            </div>

                                            <div class="col-md-3">
                                                <label class="form-label">Marital Status</label>
                                                <select class="select"  id="maritalstatus1">
                                                    <option value="">Select</option>
                                                    <?php foreach (marital_status() as $key => $value) {?>
                                                        <option value="<?=$value ?>"><?=$value ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Country</label>
                                                <select class="form-control country" id="country1">
                                                    <option value="">Select Country</option>
                                                </select>
                                            </div>
                                            
                                            <div class="col-md-5">
                                                <label class="form-label" style="color: transparent;">C</label>
                                                <button class="cta-dark w-100" id="quick-search"><i class="ri-search-line align-bottom me-1"></i> Search</button>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        Advance Search
                                      </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                      <div class="accordion-body">
                                        <?php
                                        $check_any_active_plan = check_any_active_plan($user->id);
                                        if(!empty($check_any_active_plan['status']))
                                        {
                                        ?>
                                            <div class="row">
                                                                              
                                                <div class="col-md-2">
                                                    <label class="form-label">Gender</label>
                                                    <select class="select" id="gender" >
                                                        <option value="">Select Gender</option>
                                                        <?php if(@$user->gender==2){ ?>
                                                            <option value="1" >Male</option>
                                                        <?php }else if(@$user->gender==1){ ?>
                                                            <option value="2">Female</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label">From Age</label>
                                                    <select class="select" id="agestart"  >
                                                        <option value="">Select</option>
                                                        <?php foreach (ages() as $key => $value) {?>
                                                            <option value="<?=$value ?>"><?=$value ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label">To Age</label>
                                                    <select class="select" id="ageend" >
                                                        <option value="">Select</option>
                                                        <?php foreach (ages() as $key => $value) {?>
                                                            <option value="<?=$value ?>"><?=$value ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label">From Height</label>
                                                    <select class="select"  id="fromheight" >
                                                        <option value="">Select</option>
                                                        <?php foreach (heights() as $key => $value) {?>
                                                            <option value="<?=$key ?>"><?=$value ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label">To Height</label>
                                                    <select class="select"  id="toheight" >
                                                        <option value="">Select</option>
                                                        <?php foreach (heights() as $key => $value) {?>
                                                            <option value="<?=$key ?>"><?=$value ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label">Religion </label>
                                                    <select class="religion"  id="religion" >
                                                        <option value="">Select</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label">Caste</label>
                                                    <select class="caste"  id="caste" >
                                                        <option value="">Select</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="form-label">Marital Status</label>
                                                    <select class="select"  id="maritalstatus">
                                                        <option value="">Select</option>
                                                        <?php foreach (marital_status() as $key => $value) {?>
                                                            <option value="<?=$value ?>"><?=$value ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label">Country</label>
                                                    <select class="form-control country"  id="country">
                                                        <option value="">Select Country</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="form-label">State</label>
                                                    <select class="state"  id="state">
                                                        <option value="">Select State</option>
                                                    </select>
                                                </div>

                                                

                                                <div class="col-md-3">
                                                    <label class="form-label">Manglik ?</label>
                                                    <select class="select"  id="manglik" >
                                                        <option value="">Select</option>
                                                        <?php foreach (manglik() as $key => $value) {?>
                                                            <option value="<?=$value ?>"><?=$value ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-5">
                                                    <label class="form-label">Highest Degree</label>
                                                    <select class="education"  id="highestdegree" >
                                                        <option value="">Select</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label">Occupation</label>
                                                    <select class="occupation"  id="occupation" >
                                                        <option value="">Select</option>
                                                    </select>
                                                </div>




                                                 
                                                 <div class="col-md-5 mt-2" style="margin: 0 auto;">
                                                    <button class="cta-dark w-100" id="advance-search"><i class="ri-search-line align-bottom me-1"></i> Search</button>
                                                </div>
                                            </div>
                                        <?php }else{
                                            echo view('web/card/package-card',compact('db'));
                                        } ?>

                                      </div>
                                    </div>
                                  </div>
                                  
                                </div>
                                

                                <div class="db-pro-stat">
                                    <div class="db-inte-prof-list">
                                        <ul id="data-list">
                                            
                                        </ul>
                                    </div>
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



<script>
    var type=0;
   var data = '';
   var quick_url = "<?=base_url(route_to('user.member.quick_data'))?>";
   var advance_url = "<?=base_url(route_to('user.member.advance_data'))?>";

    function get_url_data()
    {
        var status = 1;
        var order_by = 'desc';
        var limit = 12;
        var filter_search_value = '';
        if(type==1)
        {
            data = `gender=${$("#gender1").val()}&agestart=${$("#agestart1").val()}&ageend=${$("#ageend1").val()}&religion=${$("#religion1").val()}&caste=${$("#caste1").val()}&maritalstatus=${$("#maritalstatus1").val()}&country=${$("#country1").val()}&state=${$("#state1").val()}&order_by=${order_by}&limit=${limit}`;
        }
        else
        {
            data = `gender=${$("#gender").val()}&agestart=${$("#agestart").val()}&ageend=${$("#ageend").val()}&fromheight=${$("#fromheight").val()}&toheight=${$("#toheight").val()}&religion=${$("#religion").val()}&caste=${$("#caste").val()}&maritalstatus=${$("#maritalstatus").val()}&country=${$("#country").val()}&state=${$("#state").val()}&manglik=${$("#manglik").val()}&highestdegree=${$("#highestdegree").val()}&occupation=${$("#occupation").val()}&status=${status}&order_by=${order_by}&limit=${limit}&filter_search_value=${filter_search_value}`;
        }
    }
    


   $(document).on("click", ".pagination a",(function(e) {      
      event.preventDefault();
      get_url_data()
      url = $(this).attr("href")+'&'+data;
      load_table_data();
   }));

   $(document).on("click", "#quick-search",(function(e) {      
      event.preventDefault();
        type = 1;
      get_url_data()
      url = quick_url+'?'+data;
      load_table_data();
   }));
   $(document).on("click", "#advance-search",(function(e) {      
      event.preventDefault();
        type = 2;
      get_url_data()
      url = advance_url+'?'+data;
      load_table_data();
   }));

   function load_table_data()
   {
        data_loader("#data-list",1);
        var form = new FormData();
        var settings = {
          "url": url,
          "method": "GET",
          "timeout": 0,
          "processData": false,
          "headers": {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
           },
          "mimeType": "multipart/form-data",
          "contentType": false,
          "dataType": "json",
          "data": form
        };
        $.ajax(settings).always(function (response) {
            data_loader("#data-list",0);
            response = admin_response_data_check(response);
            $("#data-list").html(response.data.list);

        });
   }

 
</script>




<!--  Start Footer Area -->
<?php echo view("web/include/footer.php"); ?>
<!-- End Footer Area -->  