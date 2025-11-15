<?php  
$user = get_user();


// $check_any_active_plan = check_any_active_plan(@$user->id);
// print_r($check_any_active_plan);

// die;

?>



<!doctype html>
<html lang="en">

<head>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <?php include"meta.php"; ?>

    <!--== CSS FILES ==-->
    <link rel="stylesheet" href="<?=base_url()?>css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.0/dist/fancybox/fancybox.css"/>
    <link rel="stylesheet" href="<?=base_url()?>css/animate.min.css">
    <link rel="stylesheet" href="<?=base_url()?>css/style.css">

    
    <meta name="_token" content="<?= csrf_hash() ?>">
    <link rel="stylesheet" href="<?=base_url('public')?>/toast/saber-toast.css">
    <link rel="stylesheet" href="<?=base_url('public')?>/toast/style.css">
    <link rel="stylesheet" href="<?=base_url('public')?>/front_css.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?=base_url('public')?>/front_script.js"></script>
    <link rel="stylesheet" href="<?=base_url('public')?>/upload-multiple/style.css">
    <script src="<?=base_url('public')?>/upload-multiple/script.js"></script>
    <link rel="stylesheet" href="<?=base_url('public/')?>/assetsadmin/select2/css/select2.min.css">
    <!-- <script src="https://cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script> -->


    <link rel="stylesheet" href="<?=base_url('public/')?>/timepicker/mdtimepicker.css">
    <script src="<?=base_url('public/')?>/timepicker/mdtimepicker.js"></script>


<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
      background-color: #71519d;
      border: 1px solid #f3eedc;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
      color: white;
    }
    .select2-container .select2-selection--single
    {
      height: calc(2.70rem + 2px);
    }    
    .select2-container--default .select2-selection--single {
        padding: 5px 5px;
        padding-top: 6px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow b {
      top: 70%;
    }
    .select2-container--default .select2-selection--single {
      border: 1px solid #f3eedc;
    }
    .select2-container {
        width: 100% !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 33px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 33px;
    }
    /*.select2-results__options {
      max-height: 550px !important;
    }*/
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #71519d;
        color: white;
        border-color: #71519d;
    }


    .form-group .select2-container .select2-selection--single {
        height: calc(2.3rem + 2px);
    }
    .form-group .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 24px;
    }
    .form-group .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 26px;
    }
    .form-control{
        border-color: #f3eedc;
    }


    .banner-form .select2-container--default .select2-selection--multiple .select2-selection__choice {
      background-color: #71519d;
      border: 1px solid #f3eedc;
    }
    .banner-form .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
      color: white;
    }
    .banner-form .select2-container .select2-selection--single
    {
      height: calc(2.70rem + 2px);
    }    
    .banner-form .select2-container--default .select2-selection--single {
        padding: 5px 5px;
        padding-top: 6px;
    }
    .banner-form .select2-container--default .select2-selection--single .select2-selection__arrow b {
      top: 70%;
    }
    .banner-form .select2-container--default .select2-selection--single {
      border: 1px solid #f3eedc;
    }
    .banner-form .select2-container {
        width: 100% !important;
    }
    .banner-form .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 33px;
    }
    .banner-form .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 33px;
    }


    .pagination {
    display: flex;
    justify-content: space-between;
}
.pagination li.active a {
    background: #132855;
    border-color: #132855;
    color: white;
}
.pagination li {
    padding: 0 !important;
    border: 0 !important;
}

.pagination {
    align-items: center;
    margin-top: 5px;
}

.pagination li a {
    padding: 3px 10px !important;
    display: inline-block;
    border: 1px solid;
    margin: 0 5px 0 0;
    border-radius: 3px;
}
.review-listing > ul li .comment .comment-body {
    width: 100%;
}
.active-step {
    background-color: #007bff !important;
    color: white !important;
}
</style>

</head>

<body>
    <!-- PRELOADER -->
    <!-- <div id="preloader">
        <div class="plod">
            <span class="lod1"><img src="images/loder/1.png" alt="" loading="lazy"></span>
            <span class="lod2"><img src="images/loder/2.png" alt="" loading="lazy"></span>
            <span class="lod3"><img src="images/loder/3.png" alt="" loading="lazy"></span>
        </div>
    </div>
    <div class="pop-bg"></div> -->
    <!-- END PRELOADER -->

    <!-- POPUP SEARCH -->
    <!-- <div class="pop-search">
        <span class="ser-clo">+</span>
        <div class="inn">
            <form>
                <input type="text" placeholder="Search here...">
            </form>
            <div class="rel-sear">
                <h4>Top searches:</h4>
                <a href="all-profiles.html">Browse all profiles</a>
                <a href="all-profiles.html">Mens profile</a>
                <a href="all-profiles.html">Female profile</a>
                <a href="all-profiles.html">New profiles</a>
            </div>
        </div>
    </div> -->
    <!-- END -->

    <!-- TOP MENU -->
    <!-- <div class="head-top">
        <div class="container">
            <div class="row">
                <div class="lhs">
                    <ul>
                        <li><a href="#!">About</a></li>
                        <li><a href="#!">FAQ</a></li>
                        <li><a href="#!">Contact</a></li>
                    </ul>
                </div>
                <div class="rhs">
                    <ul>
                        <li><a href="tel:+91-9643728995"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;+91-9643728995</a></li>
                        <li><a target="_blank" href="mailto:rishtehirishte01@gmail.com"><i class="fa-brands fa-facebook-f"></i>&nbsp;rishtehirishte01@gmail.com</a></li>
                        <li><a target="_blank" href="https://www.facebook.com/profile.php?id=100064303471345#"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z" clip-rule="evenodd"/></svg></a></li>
                        <li><a target="_blank" href="https://x.com/RRishte"><i class="fa-brands fa-x-twitter"></i></a></li>
                        <li><a target="_blank" href="https://www.instagram.com/rishtehirishte/"><i class="fa-brands fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->
    <!-- END -->

    <!-- MENU POPUP -->
    <!-- <div class="menu-pop menu-pop1">
        <span class="menu-pop-clo"><i class="fa fa-times" aria-hidden="true"></i></span>
        <div class="inn">
            <img src="images/logo-b.png" alt="" loading="lazy" class="logo-brand-only">
            <p><strong>Best Wedding Matrimony</strong> lacinia viverra lectus. Fusce imperdiet ullamcorper metus eu
                fringilla.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            <ul class="menu-pop-info">
                <li><a href="#!"><i class="fa fa-phone" aria-hidden="true"></i>+92 (8800) 68 - 8960</a></li>
                <li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i>+92 (8800) 68 - 8960</a></li>
                <li><a href="#!"><i class="fa fa-envelope-o" aria-hidden="true"></i>help@company.com</a></li>
                <li><a href="#!"><i class="fa fa-map-marker" aria-hidden="true"></i>3812 Lena Lane City Jackson Mississippi</a></li>
            </ul>
            <div class="menu-pop-help">
                <h4>Support Team</h4>
                <div class="user-pro">
                    <img src="images/profiles/1.jpg" alt="" loading="lazy">
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
        </div>
    </div> -->
    <!-- END -->

    <!-- CONTACT EXPERT -->
    <!-- <div class="menu-pop menu-pop2">
        <span class="menu-pop-clo"><i class="fa fa-times" aria-hidden="true"></i></span>
        <div class="inn">
            <div class="menu-pop-help">
                <h4>Support Team</h4>
                <div class="user-pro">
                    <img src="images/profiles/1.jpg" alt="" loading="lazy">
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
                            <img src="images/couples/1.jpg" alt="" loading="lazy">
                        </div>
                        <div class="rel-pro-con">
                            <h5>Long established fact that a reader distracted</h5>
                            <span class="ic-date">12 Dec 2023</span>
                        </div>
                        <a href="blog-detail.html" class="fclick"></a>
                    </li>
                    <li>
                        <div class="rel-pro-img">
                            <img src="images/couples/3.jpg" alt="" loading="lazy">
                        </div>
                        <div class="rel-pro-con">
                            <h5>Long established fact that a reader distracted</h5>
                            <span class="ic-date">12 Dec 2023</span>
                        </div>
                        <a href="blog-detail.html" class="fclick"></a>
                    </li>
                    <li>
                        <div class="rel-pro-img">
                            <img src="images/couples/4.jpg" alt="" loading="lazy">
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
    <!-- END -->

    <!-- MAIN MENU -->