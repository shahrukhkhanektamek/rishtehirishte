<!--  Start Header Area -->
<?php include"include/header.php";

$states = $db->table('states')->getWhere(["status"=>1,])->getResultObject();
$cities = $db->table('city')->getWhere(["status"=>1,])->getResultObject();

?>
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
                                <h1><?=$row->name.@$stateCity?></h1>
                                <h4 class="fw-light text-white mb-0"><?=$row->name.@$stateCity ?></h4>
                                <!-- <p>We're Your Extended Family. Service Towards Success.</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->
<?php
$description = strip_tags($row->full_description); // HTML remove for word count
$words = explode(' ', $description);
$firstPart = implode(' ', array_slice($words, 0, 100)); // pehle 40 words
$secondPart = implode(' ', array_slice($words, 100));   // baaki sab
?>
    <!-- ABOUT START -->
    <section class="pt-60 pb-60">
        <div class="ab-wel">
            <div class="container">
                <div class="row align-items-start">
                    <div class="col-lg-6 pe-md-5">
                        <div class="ab-wel-lhs">
                            <!-- <span class="ab-wel-3"></span> -->
                            <img src="<?=image_check($row->image)?>" alt="image" loading="lazy" class="img-fluid w-100 ab-wel-1">
                            <!-- <img src="images/couples/20.jpg" alt="" loading="lazy" class="ab-wel-2">
                            <span class="ab-wel-4"></span> -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ab-wel-rhs">
                            <div class="ab-wel-tit home-tit text-start">
                                <h2 class="mb-3" style="line-height:58px;"><?=$row->name.@$stateCity?></h2>
                                <span class="leaf1 mx-0"></span>
                            </div>
                            <div class="ab-wel-tit-1 mb-0">
                                <p class="mb-3"><?=$firstPart?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($secondPart)) : ?>
                    <div class="col-12 mt-3">
                        <div class="ab-wel-extra">
                            <p><?=$secondPart?></p>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="col-lg-12">
                        <a class="btn btn-primary m-auto fs-4 mt-3 d-block" style="width:fit-content;" href="#enquiryNow" data-bs-toggle="modal" data-bs-target="#enquiryModal">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 10.5h.01m-4.01 0h.01M8 10.5h.01M5 5h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1h-6.6a1 1 0 0 0-.69.275l-2.866 2.723A.5.5 0 0 1 8 18.635V17a1 1 0 0 0-1-1H5a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z"></path></svg> Enquiry for <?=$row->name ?>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- END -->


                <style>
.show-more-height,
.show-more-height2 {
    height: 270px;
    overflow: hidden
}
.show-more,
.show-more2 {
    position: relative;
    font-weight: 800;
    text-align: center;
    color: var(--bs-primary);
    cursor: pointer;
    text-decoration: underline;
    text-underline-offset: 0.3rem;
    z-index: 2;
}
.tp-service-5-title {
    font-size: 30px;
    margin-bottom: 5px;
    display: block;
    font-weight: 800;
}
/*.show-more-height:after,
.show-more-height2:after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    width: 100%;
    height: 60px;
    background: linear-gradient(0deg, rgba(246, 247, 249, 1) 0%, rgba(246, 247, 249, 0) 100%);
    z-index: 1;
}*/
</style>

         <section class="bd-course-breadcrumb-area section-space d-none">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12 ">
                     <div class="bd-course-breadcrumb-wrapper cardwhite">

                        <div class="row">
                            <div class="col-lg-3">
                              <h2 class="bd-course-breadcrumb-title"><?=$row->name?> in States</h2>
                            </div>
                            <div class="col-lg-9">

                                 <div class="servicecontent">
                                    <div class="tp-service-5-right">
                                        <span class="tp-service-5-title"><?=$row->name?> in States</span>
                                        <div class="tp-service-5-list text show-more-height p-relative">
                                            <ul class="row">
                                                <?php foreach ($states as $key => $value) { ?>
                                                   <li class="col-xl-3 col-lg-3 col-md-4 col-6"><a href="<?=base_url($row->slug.'-in-'.slug($value->name)) ?>"><?=$row->name?> In <?=$value->name ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <div class="show-more"><span>Click to view more</span><i class="fa fa-angle-double-down ms-2"></i></div>
                                    </div>
                                 </div>
                            </div>
                        </div>


                        <div class="row mt-50">
                            <div class="col-lg-3">
                              <h2 class="bd-course-breadcrumb-title"><?=$row->name?> in Cities</h2>
                            </div>
                            <div class="col-lg-9">

                                 <div class="servicecontent">
                                    <div class="tp-service-5-right" style="position: relative;">
                                        <span class="tp-service-5-title"><?=$row->name?> in City</span>
                                        <div class="tp-service-5-list text2 show-more-height2 p-relative">
                                            <ul class="row">
                                                <?php foreach ($cities as $key => $value) { ?>
                                                   <li class="col-xl-3 col-lg-3 col-md-4 col-6"><a href="<?=base_url($row->slug.'-in-'.slug($value->name)) ?>"><?=$row->name?> In <?=$value->name ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <div class="show-more2"><span>Click to view more</span><i class="fa fa-angle-double-down ms-2"></i></div>
                                    </div>
                                 </div>
                            </div>
                        </div>




                     </div>
                     
                  </div>

                  
               </div>
            </div>
         </section>

<script  type="text/javascript">
$(".show-more").click(function () {
  if ($(".text").hasClass("show-more-height")) {
    $(".show-more span").text("Click to view less");
    $(".show-more i").addClass("fa-angle-double-up");
    $(".show-more i").removeClass("fa-angle-double-down");
  } else {
    $(".show-more span").text("Click to view more");
    $(".show-more i").addClass("fa-angle-double-down");
    $(".show-more i").removeClass("fa-angle-double-up");
  }
  $(".text").toggleClass("show-more-height");
});
$(".show-more2").click(function () {
  if ($(".text2").hasClass("show-more-height2")) {
    $(".show-more2 span").text("Click to view less");
    $(".show-more2 i").addClass("fa-angle-double-up");
    $(".show-more2 i").removeClass("fa-angle-double-down");
  } else {
    $(".show-more2 span").text("Click to view more");
    $(".show-more2 i").addClass("fa-angle-double-down");
    $(".show-more2 i").removeClass("fa-angle-double-up");
  }
  $(".text2").toggleClass("show-more-height2");
});

// select_variant
$("#select_variant").change(function () {
    var value = $(this).val();
    $(".basicPlanFeatures, .standardPlanFeatures, .proPlanFeatures").hide();
    if (value==1)
    {
        $(".basicPlanFeatures").show();
    }
    else if (value==2)
    {
        $(".standardPlanFeatures").show();
    }
    else if (value==3)
    {
        $(".proPlanFeatures").show();
    }
    $("#planType").val(value);
});


</script>



<!--  Start Footer Area -->
<?php include"include/footer.php"; ?>
<!-- End Footer Area --> 