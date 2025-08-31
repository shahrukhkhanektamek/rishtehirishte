<?php include"include/header.php"; ?>

<style>
.content {
    padding: 0px 0;
}
label.focus-label {
    margin-left: 15px;
}
</style>	
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?=base_url() ?>">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Contact Us</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Contact Us</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content indextwelve ">
				<div class="containers">
					<section class="counters-section">
						<div class="container">
							

							<div class="row">
								<div class="col-md-6">
									<div class="row text-center">
										<div class="col-md-6">
											<div class="blue">
												<h1><i class="fa fa-phone"></i></h1>
												<p><a href="tel:1122334455">+91-1122334455</a></p>
											</div>
										</div> 
										<div class="col-md-6">
											<div class="orange">
												<h1><i class="fa fa-envelope"></i></h1>
												<p><a href="mailto:test@gmail.com">test@gmail.com</a></p>
											</div>
										</div>
										<div class="col-md-12 mt-3">
											<div class="blue">
												<h1><i class="fa fa-map-marker-alt"></i></h1>
												<p>J-555 Delhi, India</p>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="account-content">
										<div class="row align-items-center justify-content-center">
											
											<div class="col-md-12 login-right">
												<div class="login-header">
													<h3>Get In Touch <span><?=env('APP_NAME') ?></span></h3>
												</div>
												<form class="row form_data" action="<?=base_url('contact-enquiry')?>" method="post" id="ContactForm" novalidate="">

													<?= csrf_field() ?>
					                                <input type="hidden" name="url" value="<?=(empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
													
													<div class="form-group col-md-6 form-focus focused">
														<input type="text" class="form-control floating" name="name" required="">
														<label class="focus-label">Name</label>
													</div>

													<div class="form-group col-md-6 form-focus focused">
														<input type="phone" class="form-control floating" name="phone" required="">
														<label class="focus-label">Phone</label>
													</div>

													<div class="form-group col-md-12 form-focus focused">
														<input type="email" class="form-control floating" name="email" required="">
														<label class="focus-label">Email</label>
													</div>

													<div class="form-group col-md-12 form-focus focused" style="min-height: 150px;">
														<textarea class="form-control floating" name="message" style="min-height: 150px;"></textarea>
														<label class="focus-label">Message</label>
													</div>


													<button class="btn btn-primary btn-block btn-lg login-btn w-100" type="submit">Send Message</button>
													
												</form>
											</div>
										</div>
									</div>										
								</div>
								<div class="col-md-12">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d18925.645857061943!2d77.04962024813074!3d28.66877489758849!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d0438728d3fc9%3A0x64e1eebb4ec4e142!2sNangloi%2C%20Delhi%2C%20110041!5e1!3m2!1sen!2sin!4v1754772626938!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
								</div>

							</div>

						</div>
					</section>
				</div>



				

			</div>		
			<!-- /Page Content -->
<?php include"include/footer.php"; ?>