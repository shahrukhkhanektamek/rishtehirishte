<!--  Start Header Area -->
<?php include"include/header.php"; ?>
<!-- End Header Area -->

    <div class="hom-top inner_style">

    <?php include"include/header-nav.php"; ?>
<style>
    .accordion-button, .ab-wel-rhs p {
    font-size: 20px;
}
</style>
    <!-- BANNER -->
    <section>
        <div class="str">
            <div class="ban-inn ab-ban pg-cont" style="background: linear-gradient(to right, rgb(137, 33, 107), rgb(218, 68, 83));">
                <div class="container">
                    <div class="row">
                        <div class="hom-ban">
                            <div class="ban-tit">
                                <h1>Privacy Policy</h1>
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
                    
                    <div class="col-lg-12">
                        <div class="ab-wel-rhs">
                            <div class="ab-wel-tit home-tit text-center">
                                <h2 class="mb-0" style="line-height: 0.9;font-size: 45px;">Privacy Policy</h2>
                            </div>
                            <div class="ab-wel-tit-1 mb-0">
                                <p class="mb-3">

                                <div class="accordion" id="accordionExample">
                                    <?php
                                        $policy = json_decode($policy->privacy_policy);
                                        foreach ($policy as $key => $value) {
                                    ?>
                                      <div class="accordion-item">
                                        <h2 class="accordion-header">
                                          <button class="accordion-button <?=$key==0?'':'collapsed'?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?=$key?>" aria-expanded="true" aria-controls="collapseOne<?=$key?>">
                                            <?=$value->title?>
                                          </button>
                                        </h2>
                                        <div id="collapseOne<?=$key?>" class="accordion-collapse <?=$key==0?'show':''?> collapse " data-bs-parent="#accordionExample">
                                          <div class="accordion-body">
                                            <p><?=$value->value?></p>
                                          </div>
                                        </div>
                                      </div>
                                    <?php } ?>
                                </div>

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