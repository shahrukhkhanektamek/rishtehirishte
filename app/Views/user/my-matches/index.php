<!--  Start Header Area -->
<?php echo view("web/include/header.php"); ?>
<!-- End Header Area -->

    <div class="hom-top login_style">

    <?php echo view("web/include/header-nav.php"); ?>

    <?php echo view("web/include/dashboard-nav.php"); ?>

                            
                        
                        </div>
                        
                    </div>
                    <div class="col-md-8 col-lg-9">
                        
                        <div class="row">
                            <div class="col-md-12 db-sec-com">
                                <h2 class="db-tit">My Matches</h2>
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
   var main_url = "<?=base_url(route_to('user.my-matches.load_data'))?>";

    function get_url_data()
    {
        var status = 1;
        var order_by = 'desc';
        var limit = 12;
        var filter_search_value = '';
        data = `status=${status}&order_by=${order_by}&limit=${limit}&filter_search_value=${filter_search_value}`;
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