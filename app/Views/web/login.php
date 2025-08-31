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
						<div class="col-md-8 offset-md-2">
							
							<!-- Login Tab Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="assets/img/login-banner.jpg" class="img-fluid" alt="<?=env('APP_NAME') ?> Login">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Login <span><?=env('APP_NAME') ?></span></h3>
										</div>
										<form class="form_data" action="<?= base_url(route_to('auth.user.login-action')); ?>" method="post" id="LoginForm" novalidate >

											<?php if(!empty(request()->getGet('callBack') || !empty($callBack))){ ?>
												<input type="hidden" name="callBack" value="<?=request()->getGet('callBack')?request()->getGet('callBack'):$callBack ?>">
											<?php } ?>

											<div class="form-group form-focus">
												<input type="email" class="form-control floating" name="username" required>
												<label class="focus-label">Email</label>
											</div>
											<div class="form-group form-focus">
												<input type="password" class="form-control floating" name="password" required>
												<label class="focus-label">Password</label>
											</div>
											<div class="text-end">
												<a class="forgot-link" href="forgot-password">Forgot Password ?</a>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn w-100" type="submit">Login</button>
											
											<div class="text-center dont-have">Don’t have an account? <a href="register">Register</a></div>
										</form>
									</div>
								</div>
							</div>
							<!-- /Login Tab Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
<?php include"include/footer.php"; ?>