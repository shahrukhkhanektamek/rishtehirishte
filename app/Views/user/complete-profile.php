<!--  Start Header Area -->
<?php echo view("web/include/header.php"); ?>
<!-- End Header Area -->

    <div class="hom-top inner_style">

    <?php echo view("web/include/header-nav.php"); ?>

    <!-- BANNER -->
    <section>
        <div class="str">
            <div class="ban-inn ab-ban pg-cont" style="background: linear-gradient(to right, rgb(137, 33, 107), rgb(218, 68, 83));">
                <div class="container">
                    <div class="row">
                        <div class="hom-ban">
                            <div class="ban-tit">
                                <h1>Complete Your Profile</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

   



    <!-- ABOUT START -->
    <section class="pt-60 pb-60">
        <div class="ab-wel">
            <div class="container">
                <div class="row justify-content-between mt-5">
                    <div class="col-md-3">
                        <div class="stepwizard">
                            <div class="stepwizard-row setup-panel">
                                <div class="stepwizard-step">
                                    <a href="#step-1" type="button" class="btn-step btn-circle">1</a>
                                    <p><span>Step 1</span> Profile Detail</p>
                                </div>
                                <div class="stepwizard-step">
                                    <a href="#step-2" type="button" class="btn-default btn-circle" disabled="disabled">2</a>
                                    <p><span>Step 2</span> Education & Profession</p>
                                </div>
                                <div class="stepwizard-step">
                                    <a href="#step-3" type="button" class="btn-default btn-circle" disabled="disabled">3</a>
                                    <p><span>Step 3</span> Lifestyle & Family</p>
                                </div>
                                <div class="stepwizard-step">
                                    <a href="#step-4" type="button" class="btn-default btn-circle" disabled="disabled">4</a>
                                    <p><span>Step 4</span> Requirement for partner</p>
                                </div>
                                <div class="stepwizard-step d-none">
                                    <a href="#step-5" type="button" class="btn-default btn-circle" disabled="disabled">5</a>
                                    <p><span>Step 5</span> Basic Detail</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">

                        <div class="row setup-content" id="step-1">
                            <?php echo view("user/profile/steps/step2") ?>
                        </div>
                        <div class="row setup-content d-none" id="step-2" >
                            <?php echo view("user/profile/steps/step3") ?>
                        </div>
                        <div class="row setup-content d-none" id="step-3" >
                            <?php echo view("user/profile/steps/step4") ?>
                        </div>
                        <div class="row setup-content d-none" id="step-4" >
                            <?php echo view("user/profile/steps/step5") ?>
                        </div>
                        <div class="row setup-content d-none" id="step-5">
                            <?php echo view("user/profile/steps/step1") ?>        
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- END -->

<!--  Start Footer Area -->
<?php echo view("web/include/footer.php"); ?>
<!-- End Footer Area --> 