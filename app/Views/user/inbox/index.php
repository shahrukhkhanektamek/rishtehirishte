<!--  Start Header Area -->
<?php echo view("web/include/header.php"); ?>
<!-- End Header Area -->

    <div class="hom-top login_style">

    <?php echo view("web/include/header-nav.php"); ?>

    <?php echo view("web/include/dashboard-nav.php"); ?>

<style>
/*#212529*/
.btn-secondary.active{
    background-color: #132855 !important;
}
</style>
  
                        </div>
                        
                    </div>
                    <div class="col-md-8 col-lg-9">
                        
                        <div class="row">
                            <div class="col-md-12 db-sec-com">
                                <h2 class="db-tit">Inbox</h2>
                                <div class="db-pro-stat mb-2">
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-secondary btn-sm w-100 select-type active" data-type="1">Receive Interest</button>
                                        </div>
                                        <div class="col-6">
                                            <button class="btn btn-secondary btn-sm w-100 select-type" data-type="2">Sent Interest</button>
                                        </div>
                                        <ul class="d-flex justify-content-start mt-1">
                                            <li class="m-1 mb-2 mt-0"><button class="btn btn-secondary btn-sm select-status active" data-status="">All Interest</button></li>
                                            <li class="m-1 mb-2 mt-0"><button class="btn btn-secondary btn-sm select-status" data-status="accept">Accept Interest</button></li>
                                            <li class="m-1 mb-2 mt-0"><button class="btn btn-secondary btn-sm select-status" data-status="pending">Pending Interest</button></li>
                                            <li class="m-1 mb-2 mt-0"><button class="btn btn-secondary btn-sm select-status" data-status="decline">Decline Interest</button></li>
                                        </ul>                                    
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
   var data = '';
   var main_url = "<?=base_url(route_to('user.inbox.load_data'))?>";
   let type = 1;
   let status = '';
    function get_url_data()
    {
        var order_by = 'desc';
        var limit = 12;
        var filter_search_value = '';
        data = `type=${type}&status=${status}&order_by=${order_by}&limit=${limit}&filter_search_value=${filter_search_value}`;
    }
    get_url_data();
    url = main_url+'?'+data;
    load_table_data();


   $(document).on("click", ".pagination a",(function(e) {      
      event.preventDefault();
      get_url_data()
      url = $(this).attr("href")+'&'+data;
      load_table_data();
   }));

   $(document).on("click", ".select-type",(function(e) {      
      event.preventDefault();
      $(".select-type").removeClass('active');
      $(this).addClass('active');
      type = $(this).data('type')
      get_url_data()
      url = main_url+'?'+data;
      load_table_data();
   }));
   $(document).on("click", ".select-status",(function(e) {      
      event.preventDefault();

      $(".select-status").removeClass('active');
      $(this).addClass('active');

      status = $(this).data('status')
      get_url_data()
      url = main_url+'?'+data;
      load_table_data();
   }));

   function load_table_data()
   {
        data_loader("#data-list",1);
        var form = new FormData();
        form.append('type', type);
        form.append('status', status);
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