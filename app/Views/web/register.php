<?php include"include/header.php"; ?>
<style>
.content {
    background-color: white;
}
.header {
    border-bottom: 1px solid #555c7326;
}
</style>
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-10" style="margin: 0 auto;">
								
							<!-- Register Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-12 col-lg-12 login-right">
										<div class="login-header">
											<h3>Register</h3>
										</div>
										
										<!-- Register Form -->
										<form class="row custom-form form_data" action="<?= base_url(route_to('auth.user.signup-action')); ?>" method="post" id="SignupForm" novalidate>
											
											<div class="form-group form-focus col-lg-4">
												<input type="text" class="form-control floating" name="name" required>
												<label class="focus-label">Name</label>
											</div>
											<div class="form-group form-focus col-lg-4">
												<input type="number" class="form-control floating" name="phone" required>
												<label class="focus-label">Mobile Number</label>
											</div>
											<div class="form-group form-focus col-lg-4">
												<input type="email" class="form-control floating" name="email" required>
												<label class="focus-label">Email</label>
											</div>

											<div class="form-group form-focus col-lg-4">
												<select class="select"  name="gender" required>
													<option value="">Select Gender</option>
													<option value="1">Male</option>
													<option value="2">Female</option>
													<option value="3">Transgender</option>
												</select>
											</div>
											<div class="form-group form-focus col-lg-4">
												<input type="date" class="form-control floating" name="dob" required>
												<label class="focus-label" style="top: -20px;">Date of Birth</label>
											</div>
											<div class="form-group form-focus col-lg-4">
												<input type="email" class="form-control floating" name="address" required>
												<label class="focus-label">Address</label>
											</div>
											<div class="form-group form-focus col-lg-3">
												<select class="form-control" id="country" required name="country">
													<option value="">Select Country</option>
												</select>
											</div>
											<div class="form-group form-focus col-lg-3">
												<select class="form-control" id="state" required name="state">
													<option value="">Select State</option>
												</select>
											</div>
											<div class="form-group form-focus col-lg-3">
												<input type="email" class="form-control floating" name="city" required>
												<label class="focus-label">City</label>
											</div>
											<div class="form-group form-focus col-lg-3">
												<input type="email" class="form-control floating" name="pincode" required>
												<label class="focus-label">Pincode</label>
											</div>

											<div class="form-group form-focus col-lg-12" style="display: flex;justify-content: space-evenly;">
												<label class="btn btn-dark" style="line-height: 2.4;">
													<input type="radio" name="role" autocomplete="off" value="2"> User
												</label>
												<label class="btn btn-dark" style="line-height: 2.4;">
													<input type="radio" name="role" autocomplete="off" value="3"> Advocate
												</label>
												<label class="btn btn-dark" style="line-height: 2.4;">
													<input type="radio" name="role" autocomplete="off" value="4"> CA
												</label>
												<label class="btn btn-dark" style="line-height: 2.4;">
													<input type="radio" name="role" autocomplete="off" value="5"> Adviser
												</label>
											</div>


											<div class="form-group form-focus col-lg-6">
												<input type="password" class="form-control floating" name="password" required>
												<label class="focus-label">Create Password</label>
												<i class="fa fa-eye password_show_hide"></i>
											</div>
											<div class="form-group form-focus col-lg-6">
												<input type="password" class="form-control floating" name="cpassword" required>
												<label class="focus-label">Confirm Password</label>
												<i class="fa fa-eye password_show_hide"></i>
											</div>




											<div class="text-end">
												<a class="forgot-link" href="login">Already have an account?</a>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn w-100" type="submit">Signup</button>
											
										</form>
										<!-- /Register Form -->
										
									</div>
								</div>
							</div>
							<!-- /Register Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
<?php include"include/footer.php"; ?>