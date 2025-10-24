<?php $user = get_user(); ?>
<div class="container-fluid">
            <!-- <div class="row align-items-center"> -->
                <div class="hom-nav row align-items-center justify-content-between">
                    <!-- LOGO -->
                    <div class="logo col-md-3">
                        <!-- <span class="menu desk-menu">
                            <i></i><i></i><i></i>
                        </span> -->
                        <a href="<?=base_url()?>" class="logo-brand"><img src="<?=base_url()?>images/main-logo.png" alt="rishtehirishte" loading="lazy" class="ic-logo img-fluid"></a>
                    </div>

                    <!-- EXPLORE MENU -->
                    <div class="bl col-md-6">
                        <ul>
                            <!-- <li class="smenu-pare">
                                <span class="smenu">Explore</span>
                                <div class="smenu-open smenu-box">
                                    <div class="container">
                                        
                                    </div>
                                </div>
                            </li> -->
                            <li><a href="<?=base_url()?>about">About Us</a></li>
                            <li class="smenu-pare">
                                <span class="smenu">Services</span>
                                <div class="smenu-open smenu-multi smenu-box">
                                    <div class="container">                                        

                                        <div class="row">                                            
                                           <?php
                                            $services = $db->table("service")
                                            ->limit(30)
                                                           ->where(["status" => 1])
                                                           ->get()
                                                           ->getResult();

                                            if (!empty($services)) {
                                                foreach ($services as $key => $service) {
                                            ?>
                                                    <div class="multi-col">
                                                        <div class="inn">
                                                            <ul>
                                                                <li class="has-mega-menu">
                                                                    <a href="<?= base_url($service->slug) ?>" class="contact-us">
                                                                        <?= $service->name ?>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><a href="<?=base_url()?>clients">Our Clients</a></li>
                            <li><a href="<?=base_url()?>packages">Packages</a></li>
                            <li><a href="<?=base_url()?>memories">Memories</a></li>
                            <li><a href="<?=base_url()?>contact">Contact Us</a></li>
                        </ul>
                    </div>

                    <!-- USER PROFILE -->
                    <div class="col-md-3">
                        <div class="al">
                            <?php if(@$user->role!=2){ ?>
                                <div class="d-flex align-items-center float-md-end">
                                    <a style="display:block;" href="login" class="login_button text-white fw-semibold me-3" type="submit"><i class="far fa-user me-2"></i>Login</a>
                                    <a style="display:block;" href="register" class="cta-dark" type="submit">Register Here</a>
                                </div>                                
                            <?php }else{?>
                                <a class="logout login_button text-white fw-semibold me-3" ><i class="fas fa-sign-out me-1"></i>Logout</a>
                                <div class="head-pro">
                                    <a href="<?=base_url('user/dashboard')?>" >
                                        <img src="<?=image_check($user->image,'user.png')?>" loading="lazy" alt="user_profile" loading="lazy">
                                        <b class="text-light"><?=env('APP_SORT').'-'.$user->user_id?></b><br>
                                        <h4 class="text-white"><?=$user->name?></h4>
                                        <span class="fclick"></span>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <!--MOBILE MENU-->
                    <div class="mob-menu">
                        <div class="mob-me-ic">
                            <span class="ser-open mobile-ser">
                                <img src="<?=base_url()?>images/icon/search.svg" alt="">
                            </span>
                            <span class="mobile-exprt" data-mob="dashbord">
                                <img src="<?=base_url()?>images/icon/users.svg" alt="">
                            </span>
                            <span class="mobile-menu" data-mob="mobile">
                                <img src="<?=base_url()?>images/icon/menu.svg" alt="">
                            </span>
                        </div>
                    </div>
                    <!--END MOBILE MENU-->
                </div>
            <!-- </div> -->
        </div>
    </div>
    <!-- END -->

    <!-- EXPLORE MENU POPUP -->
    <!-- <div class="mob-me-all mobile_menu">
        <div class="mob-me-clo"><img src="<?=base_url()?>images/icon/close.svg" alt=""></div>
        <div class="mv-bus">
            <h4><i class="fa fa-globe" aria-hidden="true"></i> EXPLORE CATEGORY</h4>
            <ul>
                <li><a href="all-profiles.html">Browse profiles</a></li>
                <li><a href="wedding.html">Wedding page</a></li>
                <li><a href="services.html">All Services</a></li>
                <li><a href="plans.html">Join Now</a></li>
            </ul>
            <h4><i class="fa fa-align-center" aria-hidden="true"></i> All Pages</h4>
            <ul>
                <li><a href="all-profiles.html">All profiles</a></li>
                <li><a href="profile-details.html">Profile details</a></li>
                <li><a href="wedding.html">Wedding</a></li>
                <li><a href="wedding-video.html">Wedding video</a></li>
                <li><a href="services.html">Our Services</a></li>
                <li><a href="plans.html">Pricing plans</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="sign-up.html">Sign-up</a></li>
                <li><a href="photo-gallery.html">Photo gallery</a></li>
                <li><a href="photo-gallery-1.html">Photo gallery 1</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="blog-detail.html">Blog detail</a></li>
                <li><a href="enquiry.html">Ask your doubts</a></li>
                <li><a href="make-reservation.html">Make Reservation</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li><a href="coming-soon.html" target="_blank">Coming soon</a></li>
                <li><a href="404.html">404</a></li>
            </ul>
            <div class="menu-pop-help">
                <h4>Support Team</h4>
                <div class="user-pro">
                    <img src="<?=base_url()?>images/profiles/1.jpg" alt="" loading="lazy">
                </div>
                <div class="user-bio">
                    <h5>Ashley emyy</h5>
                    <span>Senior personal advisor</span>
                    <a href="enquiry.html" class="btn btn-primary btn-sm">Ask your doubts</a>
                </div>
            </div>
            <div class="menu-pop-soci">
                <ul>
                    <li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                    <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    <li><a href="#!"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                    <li><a href="#!"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <div class="late-news">
                <h4>Latest news</h4>
                <ul>
                    <li>
                        <div class="rel-pro-img">
                            <img src="<?=base_url()?>images/couples/1.jpg" alt="" loading="lazy">
                        </div>
                        <div class="rel-pro-con">
                            <h5>Long established fact that a reader distracted</h5>
                            <span class="ic-date">12 Dec 2023</span>
                        </div>
                        <a href="blog-detail.html" class="fclick"></a>
                    </li>
                    <li>
                        <div class="rel-pro-img">
                            <img src="<?=base_url()?>images/couples/3.jpg" alt="" loading="lazy">
                        </div>
                        <div class="rel-pro-con">
                            <h5>Long established fact that a reader distracted</h5>
                            <span class="ic-date">12 Dec 2023</span>
                        </div>
                        <a href="blog-detail.html" class="fclick"></a>
                    </li>
                    <li>
                        <div class="rel-pro-img">
                            <img src="<?=base_url()?>images/couples/4.jpg" alt="" loading="lazy">
                        </div>
                        <div class="rel-pro-con">
                            <h5>Long established fact that a reader distracted</h5>
                            <span class="ic-date">12 Dec 2023</span>
                        </div>
                        <a href="blog-detail.html" class="fclick"></a>
                    </li>
                </ul>
            </div>
            <div class="prof-rhs-help">
                <div class="inn">
                    <h3>Tell us your Needs</h3>
                    <p>Tell us what kind of service you are looking for.</p>
                    <a href="enquiry.html">Register for free</a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- END MOBILE MENU POPUP -->

    <!-- MOBILE USER PROFILE MENU POPUP -->
    <!-- <div class="mob-me-all dashbord_menu">
        <div class="mob-me-clo"><img src="<?=base_url()?>images/icon/close.svg" alt=""></div>
        <div class="mv-bus">
            <div class="head-pro">
                <img src="<?=base_url()?>images/profiles/1.jpg" alt="" loading="lazy">
                <b>user profile</b><br>
                <h4>Ashley emyy</h4>
            </div>
            <ul>
                <li><a href="login.html">Login</a></li>
                <li><a href="sign-up.html">Sign-up</a></li>
                <li><a href="plans.html">Pricing plans</a></li>
                <li><a href="all-profiles.html">Browse profiles</a></li>
            </ul>
        </div>
    </div> -->
    <!-- END USER PROFILE MENU POPUP -->