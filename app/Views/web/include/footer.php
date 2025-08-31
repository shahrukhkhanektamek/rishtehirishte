	
		<!-- Footer -->	
		<footer class="footer">
				
				<div class="footer-top">
					<div class="container">
						<div class="row">
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-about">
									<h2 class="footer-title">ABOUT <?=env('APP_NAME') ?></h2>
									<div class="footer-about-content">
										<p>At <?=env('APP_NAME') ?>, we stand by you with expert guidance, clear advice, and strong representation. From civil disputes to corporate matters, our team is dedicated to protecting your rights and securing the best possible outcome. With integrity and commitment at our core, we turn legal challenges into solutions. </p>
										
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">POPULAR Services</h2>
									<ul>
										<li><a href="<?=base_url()?>services">Personal Injury</a></li>
										<li><a href="<?=base_url()?>services">Family Law</a></li>
										<li><a href="<?=base_url()?>services">Criminal Defense</a></li>
										<li><a href="<?=base_url()?>services">Business and Corporate Law</a></li>
										<li><a href="<?=base_url()?>services">Real Estate</a></li>
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">Quick Links</h2>
									<ul>
										<li><a href="<?=base_url()?>about">About Us</a></li>
										<li><a href="<?=base_url()?>contact">Contact Us</a></li>
										<li><a href="<?=base_url()?>advocates">Advocates</a></li>
										<li><a href="<?=base_url()?>advisers">Legal Advisers </a></li>
										<li><a href="<?=base_url()?>ca">Chartered Accountant (CA)</a></li>
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-contact">
									<h2 class="footer-title">NEWSLETTER</h2>
									<p> Sign Up to Our Newsletter to Get Latest Updates & Services</p>
									<div class="my-3 footer-newsletter">
										<form class="input-group">
										<input type="email" placeholder="Enter Your Email">
										<div>
											<button class="btn btn-newsletter" type="submit"><i class="fa fa-paper-plane text-white" aria-hidden="true"></i></button>
										</div>
										</form>
									</div>	
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
						</div>
					</div>
				</div>
				<!-- /Footer Top -->
				
				<!-- Footer Bottom -->
                <div class="footer-bottom">
					<div class="container">
					
						<!-- Copyright -->
						<div class="copyright">
							<div class="row">
								<div class="col-md-4 col-lg-4">
									<div class="copyright-text">
										<p class="mb-0">© 2025 All Rights Reserved</p>
									</div>
								</div>
								<div class="col-md-6 col-lg-4">
									<div class="copyright-text center-text">
										<p class="mb-0"><a href="<?=base_url()?>term-condition">Terms and Conditions</a> - <a href="<?=base_url()?>privacy-policy">Privacy Policy</a></p>
									</div>
								</div>
								<div class="col-md-2 col-lg-4 right-text">
									<div class="social-icon">
											<ul>
												<li><a href="<?=base_url()?>#" class="icon" target="_blank"><i class="fab fa-facebook-f"></i> </a></li>
												<li><a href="<?=base_url()?>#" class="icon" target="_blank"><i class="fab fa-twitter"></i> </a></li>
												<li><a href="<?=base_url()?>#" class="icon" target="_blank"><i class="fab fa-instagram"></i> </a></li>
												<li><a href="<?=base_url()?>#" class="icon" target="_blank"><i class="fab fa-linkedin-in"></i> </a></li>
											</ul>
										</div>
								</div>
							</div>
						</div>
						<!-- /Copyright -->
						
					</div>
				</div>
				<!-- /Footer Bottom -->
				
			</footer>
			<!-- /Footer -->
		
		</div>		
		<!-- /Main Wrapper -->
	
		<!-- jQuery -->
		  <!-- <script src="<?=base_url() ?>assets/js/jquery-3.7.1.min.js" type="2c8673e8960f9f9975d13815-text/javascript"></script> -->
		  
		
		<!-- Bootstrap Core JS -->
		<script src="<?=base_url() ?>assets/js/bootstrap.bundle.min.js" type="2c8673e8960f9f9975d13815-text/javascript"></script>
		
		<!-- Slick JS -->
		<script src="<?=base_url() ?>assets/js/slick.js" type="2c8673e8960f9f9975d13815-text/javascript"></script>

		
		<!-- Sticky Sidebar JS -->
        <script src="<?=base_url() ?>assets/plugins/theia-sticky-sidebar/ResizeSensor.js" type="badcbf867befed73334dd13e-text/javascript"></script>
        <script src="<?=base_url() ?>assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js" type="badcbf867befed73334dd13e-text/javascript"></script>
		
		<!-- Custom JS -->
		<script src="<?=base_url() ?>assets/js/script.js" type="2c8673e8960f9f9975d13815-text/javascript"></script>
	
		<script src="<?=base_url() ?>assets/js/rocket-loader.min.js" data-cf-settings="2c8673e8960f9f9975d13815-|49" defer></script>


		<script src="<?=base_url('public/')?>/toast/saber-toast.js"></script>
		<script src="<?=base_url('public/')?>/toast/script.js"></script>
		<script src="<?=base_url('public/')?>/assetsadmin/select2/js/select2.full.min.js"></script>


<script>
	$('.tags').select2({
	  tags: true,
	  tokenSeparators: ['||', '\n']
	});
	$(document).on('click',".logout",function (e) {
	  event.preventDefault();
	  loader('show');
	  $.ajax({
	      url:"<?=base_url('user/logout')?>",
	      type:"GET",
	      dataType:"json",
	      success:function(d)
	      {
	        admin_response_data_check(d)  
	      },
	      error: function(e) 
	    {
	      admin_response_data_check(e)
	    } 
	  });
	});
</script>

<script>
	$('#country').select2({
      ajax: {
        url: "<?=base_url(route_to('search-country'))?>",
        method:"post",
        "headers": {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
       },
        data: function (params) {
          var query = {
            search: params.term,
            type: 'public'
          }

          // Query parameters will be ?search=[term]&type=public
          return query;
        }
      }
    });
	$('#state').select2({
      ajax: {
        url: "<?=base_url(route_to('search-state'))?>",
        method:"post",
        "headers": {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
       },
        data: function (params) {
          var query = {
            search: params.term,
            type: 'public',
            id: $("#country").val()
          }

          // Query parameters will be ?search=[term]&type=public
          return query;
        }
      }
    });

    $('#select-city').select2({
      ajax: {
        url: "<?=base_url(route_to('search-city'))?>",
        method:"post",
        "headers": {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
       },
        data: function (params) {
          var query = {
            search: params.term,
            type: 'public'
          }

          // Query parameters will be ?search=[term]&type=public
          return query;
        }
      }
    });
</script>



</body>

</html>