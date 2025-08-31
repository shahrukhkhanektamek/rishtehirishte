<?php
	$user = get_user();
	if(@$user->role==2){
?>


<?php include"include/header.php";

$user_id = decript(request()->getGet('partner'));

$row = $db->table("users")->where(['users.id'=>$user_id,"users.status"=>1,])
->join('role',"role.id = users.role",'left')
->join('countries',"countries.id = users.country",'left')
->join('states',"states.id = users.state",'left')
->select("users.*, role.name as role_name, countries.name as country_name, states.name as state_name")
->get()->getFirstRow();

$count_review = count_review($user_id);


$kyc = $db->table("kyc")->where(['kyc.user_id'=>$user_id,"kyc.status"=>1,])->orderBy('id', 'desc')->get()->getFirstRow();



 ?>
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?=base_url() ?>">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Appointment</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Appointment</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">

					<div class="row">
						<div class="col-md-7 col-lg-8">
							<div class="card">
								<div class="card-body">
								
									<!-- Checkout Form -->
									
									<form class="form_data" action="<?= base_url('user/appointment/book'); ?>" method="post" id="AppointmentForm" novalidate >

										<input type="hidden" name="partner_id" value="<?=encript($row->id) ?>">
									
										<!-- Personal Information -->
										<div class="info-widget">
											<h4 class="card-title">Personal Information</h4>
											<div class="row">
												<div class="col-md-4 col-sm-12">
													<div class="form-group card-label">
														<label>First Name</label>
														<input class="form-control" type="text" name="name" required>
													</div>
												</div>
												<div class="col-md-4 col-sm-12">
													<div class="form-group card-label">
														<label>Email</label>
														<input class="form-control" type="email" name="email" required>
													</div>
												</div>
												<div class="col-md-4 col-sm-12">
													<div class="form-group card-label">
														<label>Phone</label>
														<input class="form-control" type="number" name="phone" required>
													</div>
												</div>
												<div class="form-group d-none">
													<label>Country</label>
													<select class="form-control" id="country" name="country">
														<option value="99" selected>India</option>
													</select>
												</div>
												<div class="form-group">
													<label>State</label>
													<select class="form-control" id="state" name="state">
														<option value="">Select State</option>
													</select>
												</div>
											</div>
										</div>
										<!-- /Personal Information -->
										
										<div class="payment-widget d-none">
											<h4 class="card-title">Payment Method</h4>
											
											<!-- Credit Card Payment -->
											<div class="payment-list">
												<label class="payment-radio credit-card-option">
													<input type="radio" name="radio" checked>
													<span class="checkmark"></span>
													Credit card
												</label>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group card-label">
															<label for="card_name">Name on Card</label>
															<input class="form-control" id="card_name" type="text">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group card-label">
															<label for="card_number">Card Number</label>
															<input class="form-control" id="card_number" placeholder="1234  5678  9876  5432" type="text">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group card-label">
															<label for="expiry_month">Expiry Month</label>
															<input class="form-control" id="expiry_month" placeholder="MM" type="text">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group card-label">
															<label for="expiry_year">Expiry Year</label>
															<input class="form-control" id="expiry_year" placeholder="YY" type="text">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group card-label">
															<label for="cvv">CVV</label>
															<input class="form-control" id="cvv" type="text">
														</div>
													</div>
												</div>
											</div>
											<!-- /Credit Card Payment -->
											
											<!-- Paypal Payment -->
											<div class="payment-list">
												<label class="payment-radio paypal-option">
													<input type="radio" name="radio">
													<span class="checkmark"></span>
													Paypal
												</label>
											</div>
											<!-- /Paypal Payment -->
											
											
											
											
										</div>

										<!-- Terms Accept -->
										<div class="terms-accept">
											<div class="custom-checkbox">
											   <input type="checkbox" id="terms_accept" value="1" name="term">
											   <label for="terms_accept">I have read and accept Terms &amp; Conditions</label>
											</div>
										</div>
										<!-- /Terms Accept -->

										<!-- Submit Section -->
											<div class="submit-section mt-4">
												<button type="submit" class="btn btn-primary">Confirm and Pay</button>
											</div>
										<!-- /Submit Section -->
									</form>
									<!-- /Checkout Form -->
									
								</div>
							</div>
							
						</div>
						
						<div class="col-md-5 col-lg-4 theiaStickySidebar">
						
							<!-- Booking Summary -->
							<div class="card booking-card">
								<div class="card-header">
									<h4 class="card-title">Booking Summary</h4>
								</div>
								<div class="card-body">
								
									<!-- Booking instructor Info -->
									<div class="booking-pro-info">
										<a href="instructor-profile.html" class="booking-pro-img">
											<img src="<?=image_check($row->image,'user.png') ?>" alt="User Image">
										</a>
										<div class="booking-info">
											<h4><a href="instructor-profile.html"><?=$row->name ?></a></h4>
											<div class="rating">
												<?php
													$i = 1;
													while ($i<=5) {
														if($i<=$count_review['average_rating'])
														 	echo '<i class="fas fa-star filled"></i>';
														else
															echo '<i class="fas fa-star"></i>';
														$i++;	
													}
												?>
												<span class="d-inline-block average-rating"><?=$count_review['total'] ?></span>
											</div>
											<div class="clinic-details">
												<p class="pro-location"><i class="fas fa-map-marker-alt"></i> <?=$row->country_name ?>, <?=$row->state_name ?></p>
											</div>
										</div>
									</div>
									<!-- Booking instructor Info -->
									
									<div class="booking-summary">
										<div class="booking-item-wrap">
											
											<ul class="booking-fee">
												<li>Appointment Fee <span><?=price_formate(@$kyc->appointment_amount) ?></span></li>
											</ul>
											<div class="booking-total">
												<ul class="booking-total-list">
													<li>
														<span>Total</span>
														<span class="total-cost"><?=price_formate(@$kyc->appointment_amount) ?></span>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Booking Summary -->
							
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
<?php include"include/footer.php"; ?>
<?php }else{ 
	$callBack = encript((empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
	include"login.php";
} ?>