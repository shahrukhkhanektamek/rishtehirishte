<!--  Start Header Area -->
<?php include"include/header.php"; ?>
<!-- End Header Area -->

    <div class="hom-top inner_style">

    <?php include"include/header-nav.php"; ?>

    <!-- BANNER -->
    <section>
        <div class="str">
            <div class="ban-inn ab-ban pg-cont" style="background: linear-gradient(to right, rgb(137, 33, 107), rgb(218, 68, 83));">
                <div class="container">
                    <div class="row">
                        <div class="hom-ban">
                            <div class="ban-tit">
                                <h1><?=$row->name?></h1>
                                <h4 class="fw-light text-white mb-0"><?=$row->name?></h4>
                                <!-- <p>We're Your Extended Family. Service Towards Success.</p> -->
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
                <div class="row align-items-start">
                    <div class="col-lg-4 pe-md-5">
                        <div class="ab-wel-lhs">
                            <img src="<?=image_check($row->image) ?>" alt="image" loading="lazy" class="img-fluid w-100 ab-wel-1">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="ab-wel-rhs">
                            <div class="ab-wel-tit home-tit text-start d-none">
                                <h2 class="mb-3" style="line-height:58px;"><?=$row->name?></h2>
                            </div>
                            <div class="ab-wel-tit-1 mb-0 border-0 mt-0 pt-0">
                                <p class="mb-3">
                                    <?=$row->sort_description?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="ab-wel-rhs">
                            <div class="ab-wel-tit-1 mb-0">
                                <p class="mb-3">
                                    <?=$row->full_description?>
                                </p>
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