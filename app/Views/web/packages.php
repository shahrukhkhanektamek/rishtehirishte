<!--  Start Header Area -->
<?php include"include/header.php"; ?>
<!-- End Header Area -->

    <div class="hom-top inner_style">

    <?php include"include/header-nav.php"; ?>
    
    <!-- PRICING PLANS -->
    <section>
        <div class="plans-ban">
            <div class="container">
                <div class="row">
                    <span class="pri">Packages</span>
                    <h1>Get Started <br> Pick your Plan Now</h1>
                    <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p> -->
                    <!-- <span class="nocre">No credit card required</span> -->
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- PRICING PLANS -->
    <section>
        <div class="plans-main pb-70">
            <div class="container">
                <div class="row">
                    <ul>
                       <?php
                            $packages = $db->table("package")->where(["status"=>1,])->orderBy('id','desc')->get()->getResult();
                            foreach ($packages as $key => $value) {
                        ?>
                            <li>
                                <div class="pri-box">
                                    <div class="row align-items-end">
                                        <div class="col-12">
                                            <h2 class="text-center"><?=$value->name ?></h2>
                                        </div>
                                        <div class="col-12">
                                            <span class="pri-cou text-end"><b><?=price_formate($value->price)?></b>
                                                <span style="font-size: 15px;color: white;">/<?=$value->validity?> Month </span>
                                            </span>
                                        </div>
                                    </div>
                                    <a href="register" class="cta">Get Started</a>
                                    <div class="plans-description">
                                        <?=$value->full_description ?>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->


<!--  Start Footer Area -->
<?php include"include/footer.php"; ?>
<!-- End Footer Area --> 