<!--  Start Header Area -->
<?php include"include/header.php"; ?>
<!-- End Header Area -->

    <div class="hom-top inner_style">

    <?php include"include/header-nav.php"; ?>


    <!-- LOGIN -->
    <section class="login_page" style="background-image:url('https://static.jeevansathi.com/images/jspc/commonimg/cover_img_free_chat.png');">
        <div class="login py-0 mt-0">
            <div class="container">
                <div class="row">

                    <div class="inn style_login row justify-content-between align-items-end">
                        <div class="lhs col-md-5">
                            <div class="tit">
                                <h2 class="text-white mb-0"><b>Sign in<br>To Find your Soulmate</b></h2>
                            </div>
                            <div class="im">
                                <img src="images/login-couple.png" alt="">
                            </div>
                            <div class="log-bg">&nbsp;</div>
                        </div>
                        <div class="rhs col-md-4">
                            <div>
                                <div class="form-login">
                                    <form class="form_data" method="post" action="<?=base_url(route_to('auth.user.login-action'))?>" id="LoginForm" novalidate>
                                        <div class="form-group">
                                            <label class="lb">Email address <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="username" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
                                        </div>
                                        <div class="row align-items-center justify-content-between mb-2">
                                            <div class="col-6">
                                                <div class="form-group form-check mb-0">
                                                    <label class="form-check-label"><input class="form-check-input" type="checkbox" name="agree"> Remember me</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <a class="fw-bold text-primary text-end d-block" style="text-decoration:underline;" href="forgot">Forgot Password!</a>
                                            </div>
                                        </div>
                                        <button type="submit" class="cta-dark w-100">Login Here</button>
                                    </form>
                                </div>
                                <p class="mt-2 mb-0" style="font-size:13px;color: rgb(133, 136, 144);"><small>By clicking on 'Register Free', you confirm that you accept the <a style="font-size:13px;font-weight:300;color:white;" href="#!">Terms of use</a> and <a style="font-size:13px;font-weight:300;color:white;" href="#!">Privacy Policy.</a></small></p>
                                <div class="form-tit">
                                    <p class="text-white fw-bold mb-0">Not a member? <a class="fw-bold" href="register">Sign Up Here</a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    
<!--  Start Footer Area -->
<?php include"include/footer.php"; ?>
<!-- End Footer Area -->     