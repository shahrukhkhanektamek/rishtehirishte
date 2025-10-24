<!--  Start Header Area -->
<?php include"include/header.php"; ?>
<!-- End Header Area -->

    <div class="hom-top">

    <?php include"include/header-nav.php"; ?>

<?php

$table_name = 'featured_profile';
$featured_list = $db->table($table_name)
->join("users as users","users.id={$table_name}.user_id","left")
->join("states as states","states.id=users.state","left")
->select([
    "{$table_name}.*",
    "users.name as name",
    "TIMESTAMPDIFF(YEAR, users.dob, CURDATE()) as age",
    "users.state as state",
    "users.user_id as user_id",
    "users.image as image",
    "states.name as state_name",
])
->where([$table_name . '.status' => 1])
->orderBy($table_name . '.id', 'desc');
$featured_list = $featured_list->orderBy($table_name.'.id','desc')->limit(10)->get()->getResult();

?>

    <!-- BANNER & SEARCH -->
    <section>
        <div class="str">
            <div class="hom-head">
                <div class="container-fluid">
                    <div class="row">
                        <div class="hom-ban">
                            <div class="ban-tit">
                                <!-- <span><i class="no1">#1</i> Matrimony</span> -->
                                <h1>Find your Right Match here</h1>
                                <p>Most Trusted & Oldest Matrimonial Services.</p>
                            </div>
                            <div class="ban-search chosenini">
                                <form action="<?=base_url('search')?>">
                                    <ul class="banner-form row">
                                        <li class="col sr-look">
                                            <div class="form-group">
                                                <label>I'm looking for</label>
                                                <select class="select" name="lookingFor">
                                                    <option disabled="" selected="" value="">I'm looking for</option>
                                                    <option value="Groom">Groom</option>
                                                    <option value="Bride">Bride</option>
                                                </select>
                                            </div>
                                        </li>
                                        <li class="col sr-age">
                                            <div class="form-group">
                                                <label>Start Age</label>
                                                <select class="select" name="agestart">
                                                    <option value="">Start Age</option>
                                                    <?php foreach (ages() as $key => $value) {?>
                                                        <option value="<?=$value ?>"><?=$value ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </li>
                                        <li class="col sr-age">
                                            <div class="form-group">
                                                <label>End Age</label>
                                                <select class="select" name="ageend">
                                                    <option value="">End Age</option>
                                                    <?php foreach (ages() as $key => $value) {?>
                                                        <option value="<?=$value ?>"><?=$value ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </li>
                                        <li class="col sr-reli">
                                            <div class="form-group">
                                                <label>Religion</label>
                                                <select class="religion" name="religion">
                                                    <option value="">Religion</option>
                                                </select>
                                            </div>
                                        </li>
                                        <li class="col sr-reli">
                                            <div class="form-group">
                                                <label>Caste</label>
                                                <select class="caste" name="caste">
                                                    <option value="">Caste</option>
                                                </select>
                                            </div>
                                        </li>
                                        <li class="col sr-reli">
                                            <div class="form-group">
                                                <label>Marital Status</label>
                                                <select class="select" name="maritalstatus">
                                                    <<option value="">Marital Status</option>
                                                    <?php foreach (marital_status() as $key => $value) {?>
                                                        <option value="<?=$value ?>"><?=$value ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </li>
                                        <li class="col sr-reli">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <select class="country" name="country">
                                                    <option value="">Country</option>
                                                </select>
                                            </div>
                                        </li>
                                        <li class="col sr-reli" >
                                            <button class="cta-dark w-100" type="submit">Let's Begin</button>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- BANNER SLIDER -->
    <section>
        <div class="hom-ban-sli">
            <div>
                <ul class="ban-sli">

                    <?php
                        $banners = $db->table("banner")->where(["status"=>1,])->get()->getResult();
                        foreach ($banners as $key => $value) {
                    ?>
                        <li>
                            <div class="image">
                                <img class="img-fluid" src="<?=image_check($value->image) ?>" alt="image" loading="lazy">
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </section>
    <!-- END -->


    <!-- TEAM START -->
    <section class="pt-40 pb-50">
        <div class="ab-team">
            <div class="container">
                <div class="row">
                    <div class="home-tit">
                        <!-- <p>OUR PROFESSIONALS</p> -->
                        <h2><span>Featured Profile</span></h2>
                        <span class="leaf1"></span>
                    </div>
                    <ul class="featured-sli">
                        <?php
                        foreach ($featured_list as $key => $value) {
                        ?>
                            <li>
                                <div>
                                    <!--<span class="location_tag">New Delhi</span>-->
                                    <img src="<?=image_check($value->image) ?>" alt="USERNAME" loading="lazy" class="img-fluid lazy">
                                    <p>
                                        <i class="fa-solid fa-user me-1"></i> <?=$value->age ?>, <?=$value->state_name ?>
                                    </p>
                                    <h4>Profile ID: <?=$value->user_id ?> </h4>
                                    <!--<ul class="social-light">-->
                                    <!--    <li><a href="#!">View profile <i class="fa-solid fa-arrow-right"></i></a></li>-->
                                    <!--</ul>-->
                                </div>
                            </li>
                        <?php } ?>                        
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->


    <!-- BANNER -->
    <section>
        <div class="str">
            <div class="ban-inn ban-home style_home">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-11">
                        <div class="hom-ban">
                            <div class="ban-tit">
                                <span><i class="no1">#1</i> Matrimonial Services</span>
                                <h2>Did you Know Why Families choose Us First?</h2>
                                <p class="mt-3">At Rishte Hi Rishte Matrimonial, We don't just match profiles-- we also match values, attitudes, and family prestige. With our understanding and wide range of experience in this field over the decade, we have been able to solemnize matches efficiently. Keeping members' information 100% discrete and confidential, we provide matches that suit your class & complement your status. With a team of well-trained & seasoned professionals, we excel in finding the perfect partner, making us the Top/Best matrimonial Company.</p>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <section class="pb-80">
        <div class="ab-sec2">
            <div class="container">
                <div class="row">
                    <ul class="home-3-cards">
                        <li>
                            <div class="success-image-div">
                                <span>
                                    <img src="images/icon/prize.png" alt="">
                                    <h4>Genuine profiles</h4>
                                    <!-- <p>The most trusted wedding Matrimonial brand</p> -->
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="success-image-div">
                                <span>
                                    <img src="images/icon/trust.png" alt="">
                                    <h4>Most trusted</h4>
                                    <!-- <p>The most trusted wedding Matrimonial brand</p> -->
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="success-image-div">
                                <span>
                                    <img src="images/icon/rings.png" alt="">
                                    <h4>Personalized Matchmaking | 100% Privacy</h4>
                                    <!-- <p>The most trusted wedding Matrimonial brand</p> -->
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->


    <!-- ABOUT START -->
    <section class="pt-20 pb-60">
        <div class="ab-wel">
            <div class="container">
                <div class="row align-items-start">
                    <div class="col-lg-6 pe-md-5">
                        <div class="ab-wel-lhs">
                            <!-- <span class="ab-wel-3"></span> -->
                            <img src="https://diamondmatrimonialservices.com/images/abouthome.png" alt="image" loading="lazy" class="img-fluid w-100 ab-wel-1">
                            <!-- <img src="images/couples/20.jpg" alt="" loading="lazy" class="ab-wel-2">
                            <span class="ab-wel-4"></span> -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ab-wel-rhs">
                            <div class="ab-wel-tit home-tit text-start">
                                <h2 class="mb-0" style="line-height: 0.9;font-size: 45px;">Rishte Hi Rishte Matrimonial
                                    <em class="m-0">Best Marriage Bureau in Delhi</em>
                                </h2>
                                <em class="mb-3 d-block">We're Your Extended Family. Service Towards Success.</em>
                                <span class="leaf1 mx-0"></span>
                            </div>
                            <div class="ab-wel-tit-1 mb-0">
                                <p class="mb-3">
                                    <?=$about->home?>
                                </p>
                                
                                <a href="about.php" class="cta-dark mt-3"><span>Know more <i class="fa-solid fa-arrow-right ms-2"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- RECENT COUPLES -->
    <section>
        <div class="hom-couples-all">
            <div class="container">
                <div class="row">
                    <div class="home-tit">
                        <!-- <p>trusted brand</p> -->
                        <h2><span>Success Stories</span></h2>
                        <span class="leaf1"></span>
                        <span class="tit-ani-"></span>
                    </div>
                </div>

            <div class="hom-coup-test">
                <ul class="couple-sli">
                    <?php
                        $success_storys = $db->table("success_story")->where(["status"=>1,])->limit(10)->orderBy('id','desc')->get()->getResult();
                        foreach ($success_storys as $key => $value) {
                    ?>

                        <li>
                            <div class="hom-coup-box">
                                <div class="success-image-div2">
                                    <span class="leaf"></span>
                                    <img class="img-fluid" src="<?=image_check($value->image) ?>" alt="USERNAME" loading="lazy">
                                </div>
                                <div class="bx">
                                    <h4>
                                        <?=$value->name ?> 
                                        <span><?=$value->sort_description ?></span>
                                    </h4>
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


    <!-- BLOG POSTS START -->
    <section>
        <div class="hom-blog">
            <div class="container">
                <div class="row">
                    <div class="home-tit pt-60">
                        <h2><span>Blog & Articles</span></h2>
                        <span class="leaf1"></span>
                        <span class="tit-ani-"></span>
                    </div>
                    <div class="blog">
                        <div class="row gx-md-3">

                            <?php
                                $blogs = $db->table("blog")->where(["status"=>1,])->limit(10)->orderBy('id','desc')->get()->getResult();
                                foreach ($blogs as $key => $value) {                                         
                                        echo view("web/card/blog-grid",["col"=>"col-md-6 col-lg-3","value"=>$value,]);
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->


    <!-- FIND YOUR MATCH BANNER -->
    <section>
        <div class="str count">
            <div class="container">
                <div class="row">
                    <div class="fot-ban-inn" style="background-image:url('https://royalmatrimonial.com/wp-content/uploads/2025/06/qqqw.jpg');">
                        <div class="lhs">
                            <h2>Find your perfect Match now</h2>
                            <p>Offers trusted matrimonial services. Register today! To Help You Find The Right Match Of Your Choice.</p>
                            <a href="register" class="cta-3">Register Now</a>
                            <a href="#enquiryNow" data-bs-toggle="modal" data-bs-target="#enquiryModal" class="cta-4">Enquire Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->


    <!-- TRUST BRANDS -->
    <section class="pb-70">
        <div class="hom-cus-revi">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                <div class="col-md-8">
                    <div class="home-tit text-start">
                        <!-- <p>trusted brand</p> -->
                        <h2><span>What our customer think about us</span></h2>
                        <span class="leaf1 m-0"></span>
                        <span class="tit-ani-"></span>
                    </div>
                    <div class="slid-inn cus-revi">
                        <ul class="slider3">
                                
                            <?php
                                $testimonials = $db->table("testimonial")->where(["status"=>1,])->orderBy('id','desc')->get()->getResult();
                                foreach ($testimonials as $key => $value) {
                            ?>
                                <li>
                                    <div class="cus-revi-box">
                                        <!-- <div class="revi-im">
                                            <img class="img-fluid" src="<?=image_check($value->image) ?>" alt="image" loading="lazy">
                                        </div> -->
                                        <p><?=$value->message ?></p>
                                        <h5><?=$value->name?></h5>
                                        <span><?=$value->designation ?></span>
                                    </div>
                                </li>
                            <?php } ?>

                           
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 ps-md-5">
                    <img class="img-fluid w-100" src="images/certificate.JPG" loading="lazy" alt="image">
                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

<!--  Start Footer Area -->
<?php include"include/footer.php"; ?>
<!-- End Footer Area -->  

<script>
    setTimeout(function() {
  $("#enquiryModal").modal("show");
}, 5000);
</script>