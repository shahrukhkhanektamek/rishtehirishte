<!--  Start Header Area -->
<?php include"include/header.php"; ?>
<!-- End Header Area -->

    <div class="hom-top inner_style">

    <?php include"include/header-nav.php"; ?>

    <!-- BANNER -->
    <section>
        <div class="str">
            <div class="ban-inn ab-ban pg-cont" style="background: linear-gradient(to right, #2a262691, #2a2c3c);">
                <div class="container">
                    <div class="row">
                        <div class="hom-ban">
                            <div class="ban-tit">
                                <span>Our Clients</span>
                                <h1>Clients Rishte Hi Rishte</h1>
                                <!-- <p>Rishte Hi Rishte is the fastest growing matrimonial portal in India</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <section>
        <div class="ab-sec2 pb-40">
            <div class="container">
                <div class="row">
                    <ul class="style_clients">
                        <?php
                            $client_logos = $db->table("client_logo")->where(["status"=>1,])->orderBy('id','desc')->get()->getResult();
                            foreach ($client_logos as $key => $value) {
                        ?>
                            <li>
                                <div>
                                <a href="#!" target="_blank">
                                    <img class="img-flui" src="<?=image_check($value->image)?>" loading="lazy" alt="logo">
                                </a>
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