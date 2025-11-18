<?=view('backend/include/header') ?>
<style>
li {
    list-style: none;
}
</style>
<div class="page-content">
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

        <?php include('profile-card.php') ?>

        <div class="row mt-2">
            <div class="col-lg-12">
                <div class="card">
                    
                    <div class="card-header p-0">
                        

                        <div class="row mt-2" style="padding: 0px 15px 10px 15px;">
                            
                             <div class="col-md-1 hide">
                                <select class="form-control order_by" id="order_by">
                                   <option value="desc">DESC</option>
                                   <option value="asc">ASC</option>
                                </select>
                             </div>
                             <div class="col-md-2 hide">
                                <select class="form-control limit" id="limit">
                                   <option value="12">12</option>
                                   <option value="24">24</option>
                                   <option value="36">36</option>
                                   <option value="100">100</option>
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

                             <div class="col-md-4">
                                <div class="navbar-item navbar-form">
                                      <div class="form-group">
                                         <input type="text" class="form-control search-input" placeholder="Search Email Id.">
                                      </div>
                                </div>
                             </div>
                             <div class="col-md-2">
                                <button href="{{$data['back_btn']}}" class="btn btn-dark search w-100"><i class="ri-search-line align-bottom me-1"></i> Search</button>
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
</div><!-- End Page-content -->
<?=view('backend/include/footer') ?>

<script>
   var data = '';
   var main_url = "<?=$data['route']?>/load_viewed_contact_data";
   let type = 1;
    var status = '';
   function get_url_data()
   {
       var order_by = $("#order_by").val();
       var search_by = $("#search_by").val();
       var limit = $("#limit").val();
       var filter_search_value = $(".search-input").val();
       data = `user_id=<?=$row->id?>&search_by=${search_by}&type=${type}&status=${status}&order_by=${order_by}&limit=${limit}&filter_search_value=${filter_search_value}`;
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


</script>
