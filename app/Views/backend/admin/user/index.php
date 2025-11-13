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
                                        <li class="breadcrumb-item active"><?=$data['page_title']?></li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header d-flex align-items-center">
                                    <h5 class="card-title mb-0 flex-grow-1"><?=$data['page_title']?></h5>
                                    <div>
                                        <a href="<?=$data['route'].'/add'?>" class="btn btn-primary add-new">Add New <?=$data['title']?></a>
                                    </div>
                                </div>
                                <div class="card-header p-0">
                                    



                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                      
                                      <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                            Basic Search
                                          </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                          <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <select class="form-control status" id="statuschange">
                                                       <option value="1">Active</option>
                                                       <option value="0">Inactive</option>
                                                    </select>
                                                 </div>
                                                 <div class="col-md-2 hide">
                                                    <select class="form-control order_by" id="order_by">
                                                       <option value="desc">DESC</option>
                                                       <option value="asc">ASC</option>
                                                    </select>
                                                 </div>
                                                 <div class="col-md-1">
                                                    <select class="form-control limit" id="limit">
                                                       <option value="12">12</option>
                                                       <option value="24">24</option>
                                                       <option value="36">36</option>
                                                       <option value="100">100</option>
                                                    </select>
                                                 </div>   
                                                 <div class="col-md-2">
                                                    <select class="form-control" id="register_by">
                                                       <option value="">Register By</option>
                                                       <option value="admin">Admin</option>
                                                       <option value="website">Website</option>
                                                    </select>
                                                 </div>    
                                                 <div class="col-md-2">
                                                    <select class="form-control" id="search_by">
                                                       <option value="">Search By</option>
                                                       <option value="1">Name</option>
                                                       <option value="2">Email</option>
                                                       <option value="3">Phone</option>
                                                       <option value="4">ID. No.</option>
                                                    </select>
                                                 </div>                                             
                                                 <div class="col-md-3">
                                                    <div class="navbar-item navbar-form">
                                                          <div class="form-group">
                                                             <input type="text" class="form-control search-input" placeholder="Enter keyword">
                                                          </div>
                                                    </div>
                                                 </div>
                                                 <div class="col-md-3">
                                                    <button href="<?=$data['route']?>" class="btn btn-dark search w-100"><i class="ri-search-line align-bottom me-1"></i> Search</button>
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
                                            <div class="row">
                                                                              
                                                <div class="col-md-2">
                                                    <label class="form-label">Gender</label>
                                                    <select class="select" id="gender" >
                                                        <option value="">Select Gender</option>
                                                        <option value="1" >Male</option>
                                                        <option value="2">Female</option>
                                                        <option value="3">Transgender</option>
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




                                                 
                                                 <div class="col-md-4 mt-2" style="margin: 0 auto;">
                                                    <button href="<?=$data['route']?>" class="btn btn-dark search w-100"><i class="ri-search-line align-bottom me-1"></i> Search</button>
                                                 </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      
                                    </div>








                                    
                                </div>
                                <div class="card-body" id="data-list">                                    
                                </div>
                                
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->



        

<?=view('backend/include/footer') ?>

<script>
   var data = '';
   var main_url = "<?=$data['route']?>/load_data";

   function get_url_data()
   {
       var status = $("#statuschange").val();
       var type = "<?=request()->getGet('type') ?>";
       var order_by = $("#order_by").val();
       var search_by = $("#search_by").val();
       var register_by = $("#register_by").val();
       var limit = $("#limit").val();
       var filter_search_value = $(".search-input").val();
       data = `register_by=${register_by}&search_by=${search_by}&type=${type}&gender=${$("#gender").val()}&agestart=${$("#agestart").val()}&ageend=${$("#ageend").val()}&fromheight=${$("#fromheight").val()}&toheight=${$("#toheight").val()}&religion=${$("#religion").val()}&caste=${$("#caste").val()}&maritalstatus=${$("#maritalstatus").val()}&country=${$("#country").val()}&state=${$("#state").val()}&manglik=${$("#manglik").val()}&highestdegree=${$("#highestdegree").val()}&occupation=${$("#occupation").val()}&status=${status}&order_by=${order_by}&limit=${limit}&filter_search_value=${filter_search_value}`;
   }
    get_url_data();
   url = main_url+'?'+data;
   load_table();
   $(document).on("change", "#statuschange, .order_by, .limit",(function(e) {
      get_url_data();
      url =main_url+"?"+data;
      load_table();
   }));
   $(document).on("click", ".search",(function(e) {
      get_url_data();
      url =main_url+"?"+data;
      load_table();
   }));
   $(document).on("click", ".pagination a",(function(e) {      
      event.preventDefault();
      get_url_data()
      url = $(this).attr("href")+'&'+data;
      load_table();
   }));

   function load_table()
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

   let uidd = '';
   $(document).on("click", ".show-hide-detail-item-btn",(function(e) {      
        event.preventDefault();
        uidd = $(this).data('id');

        loader("show");
        var form = new FormData();
        var settings = {
          "url": "<?=$data['route'].'/user_detail/'?>?id="+uidd,
          "method": "POST",
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
            loader("hide");
            response = admin_response_data_check(response);
            if(response.status==200)
            {
                $("#showhidename").html(response.data.name);
                $("#showhideimage").attr("src",response.data.image);

                if(response.data.is_mobile_show==1) $("#showhidemobile").attr("checked",true);
                else $("#showhidemobile").attr("checked",false);

                if(response.data.is_email_show==1) $("#showhideemail").attr("checked",true);
                else $("#showhideemail").attr("checked",false);

                $("#showhidedetailmodal").modal('show');
            }

        });


   }));


   $(document).on("click", ".show-hide-detail-item-btn-confirm",(function(e) {      
        event.preventDefault();
        loader("show");

        var data = '';

        var form = new FormData();

        if($("#showhidemobile:checked").val())
            data = data+'&mobile='+$("#showhidemobile:checked").val();
        if($("#showhideemail:checked").val())
            data = data+'&email='+$("#showhideemail:checked").val();

        var settings = {
          "url": "<?=$data['route'].'/show_hide_detail/'?>?id="+uidd+data,
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
            loader("hide");
            response = admin_response_data_check(response);
            if(response.status==200)
            {
                $("#showhidedetailmodal").modal('hide');
            }

        });

      
   }));


</script>
