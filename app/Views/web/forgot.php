<!--  Start Header Area -->
<?php include"include/header.php"; ?>
<!-- End Header Area -->

    <div class="hom-top inner_style">

    <?php include"include/header-nav.php"; ?>


    <!-- LOGIN -->
    <section class="login_page" style="background-image:url('<?=base_url('images/login.webp')?>');">
        <div class="login py-0 mt-0">
            <div class="container">
                <div class="row">

                    <div class="inn style_login row justify-content-between align-items-center">
                        <div class="lhs col-md-5">
                            <div class="tit">
                                <h2 class="text-white mb-0"><b>Forgot<br>Password</b></h2>
                            </div>
                            <div class="im">
                                <img src="images/login-couple.png" alt="">
                            </div>
                            <div class="log-bg">&nbsp;</div>
                        </div>
                        <div class="rhs col-md-4">
                            <div>
                                <div class="form-login">
                                    <form class="form_data" method="post" action="<?=base_url(route_to('auth.user.send_password'))?>" id="LoginForm" novalidate>
                                        <div class="form-group">
                                            <label class="lb">Email address <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="username" required>
                                        </div>
                                        <button type="submit" class="cta-dark w-100">Send Password</button>
                                    </form>
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