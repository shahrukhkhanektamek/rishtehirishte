<?php  
$role = 0;	
$user_id = 0;	
$user = get_user();
if(!empty($user))
{
	$role = $user->role;
	$user_id = $user->id;
	$user_role = get_role_by_id($user->role);
}


$base_url = base_url();
$url = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$uri = false;
if(!empty(explode($base_url, $url)[1]))	$uri = true;
?>

<!DOCTYPE html>
<html lang="en">
	
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
		<meta name="_token" content="<?= csrf_hash() ?>">
    	<meta name="base_url" content="<?=base_url('/')?>/">

		<title><?=env("APP_NAME") ?></title>
		
		<!-- Favicons -->
		<link rel="shortcut icon" type="image/x-icon" href="<?=$base_url ?>assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?=$base_url ?>assets/css/bootstrap.min.css">
				
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="<?=$base_url ?>assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="<?=$base_url ?>assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="<?=$base_url ?>assets/css/style.css">


		<link rel="stylesheet" href="<?=base_url('public')?>/toast/saber-toast.css">
		<link rel="stylesheet" href="<?=base_url('public')?>/toast/style.css">
		<link rel="stylesheet" href="<?=base_url('public')?>/front_css.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="<?=base_url('public')?>/front_script.js"></script>
		<link rel="stylesheet" href="<?=base_url('public')?>/upload-multiple/style.css">
		<script src="<?=base_url('public')?>/upload-multiple/script.js"></script>
		<link rel="stylesheet" href="<?=base_url('public/')?>/assetsadmin/select2/css/select2.min.css">
		<script src="https://cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>


		<style>
			.select2-container--default .select2-selection--multiple .select2-selection__choice {
		      background-color: #71519d;
		      border: 1px solid #71519d;
		    }
		    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
		      color: white;
		    }
		    .select2-container .select2-selection--single
		    {
		      height: calc(2.25rem + 2px);
		    }
		    .select2-container--default .select2-selection--single {
		        padding: 5px 5px;
		        padding-top: 6px;
		    }
		    .select2-container--default .select2-selection--single .select2-selection__arrow b {
		      top: 70%;
		    }
		    .select2-container--default .select2-selection--single {
		        border: var(--bs-border-width) solid var(--bs-border-color);
		    }
		    .modal.show {
			    opacity: 1;
			    display: block;
			}
			.modal.show::before {
			    content: "";
			    position: fixed;
			    width: 100%;
			    height: 100%;
			    background: rgba(0, 0, 0, 0.5);
			}
			.form-group {
			    position: relative;
			}
			.password_show_hide {
			    position: absolute;
			    right: 10px;
			    top: 35px;
			    cursor: pointer;
			    color: #757575;
			}
			.custom-form .form-focus .focus-label {
			    left: 25px;
			}
			.custom-form .form-focus .select2-container--default .select2-selection--single .select2-selection__rendered {
			    margin: 0;
			    padding: 0 0 0 7px;
			}
			.custom-form .password_show_hide {
			    right: 25px;
			    top: 18px;
			}
			.select2-container {
			    width: 100% !important;
			}
#resaponse-area, .resaponse-area {
    min-height: 200px;
    max-height: 300px;
    position: relative;
}
.resaponse-area .my-loader {
    position: absolute;
}
.resaponse-area-card
{
	display: none;
}
.breadcrumb-bar .breadcrumb-title, .page-breadcrumb ol li.active, h2.bd-course-breadcrumb-title {
    text-transform: capitalize;
}



.pagination {
    display: flex;
    justify-content: space-between;
}
.pagination li.active a {
    background: lightgray;
    border-color: lightgray;
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



		</style>


	</head>		
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper home">
					
			<!-- Start Navigation -->
			<!-- Header -->
			<header class="header <?=!$uri?'min-header':'black-logo' ?>">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="<?=$base_url ?>" class="navbar-brand logo">
							<img src="<?=$base_url ?>assets/img/logo-white.png" class="img-fluid logo-white" alt="Logo">
							<img src="<?=$base_url ?>assets/img/logo-black.png" class="img-fluid logo-black" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="<?=$base_url ?>" class="menu-logo">
								<img src="<?=$base_url ?>assets/img/logo-white.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							
							<li class="has-submenu active"><a href="<?=$base_url ?>">Home</a></li>
							<li class="has-submenu"><a href="<?=$base_url.'personal-injury' ?>">Personal Injury</a></li>
							<li class="has-submenu"><a href="<?=$base_url.'family-law' ?>">Family Law</a></li>
							<li class="has-submenu"><a href="<?=$base_url.'criminal-defense' ?>">Criminal Defense</a></li>
							<li class="has-submenu"><a href="<?=$base_url.'business-and-corporate-law' ?>">Business and Corporate Law</a></li>
							<li class="has-submenu">
								<a href="<?=$base_url ?>#">Other Services <i class="fas fa-chevron-down"></i></a>

								<?php
								$serviceCategory = $db->table("service_category")->where(["status"=>1,])->get()->getResult();
								if(!empty($serviceCategory)) {
								?>

								<ul class="submenu">
									<?php foreach ($serviceCategory as $key => $value) { 
										
										?>
										<li class="has-submenu">
											<a href="<?=$base_url.$value->slug ?>"><?=$value->name ?></a>
											<?php
												$services = $db->table("service")->where(["status"=>1,"category"=>$value->id,])->limit(10)->get()->getResult();
												if(!empty($services)){
											?>
												<ul class="submenu">
													<?php 
													foreach ($services as $key2 => $value2) {
													?>
														<li><a href="<?=$base_url.$value2->slug ?>"><?=$value2->name ?></a></li>
													<?php } ?>
												</ul>
											<?php } ?>
										</li>
									<?php } ?>
								</ul>
							<?php } ?>
							</li>
							<li class="has-submenu"><a href="<?=$base_url ?>contact">Contact Us</a></li>
							
							
						</ul>
					</div>		 
					<ul class="nav header-navbar-rht">
						<?php if(!in_array($role, [2,3,4,5,6,7])){ ?>
							<li><a href="<?=$base_url ?>login">Log in</a></li>
							<li><a href="<?=$base_url ?>register" class="login-btn">Signup </a></li>
						<?php }else{?>
							<li><a href="<?=base_url($user_role->route.'/dashboard')?>" class="login-btn">My Account </a></li>
						<?php } ?>

					</ul>
				</nav>
			</header>
			<!-- /Header -->	


