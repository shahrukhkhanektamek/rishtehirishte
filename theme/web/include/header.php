<?php  
$base_url = 'https://developershahrukh.in/demo/rajkumar/legalfirmnew/';
$url = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$uri = false;
if(!empty(explode($base_url, $url)[1]))	$uri = true;
?>

<!DOCTYPE html>
<html lang="en">
	
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
		<title>DreamsCLG</title>
		
		<!-- Favicons -->
		<link rel="shortcut icon" type="image/x-icon" href="<?=$base_url ?>assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?=$base_url ?>assets/css/bootstrap.min.css">
				
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="<?=$base_url ?>assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="<?=$base_url ?>assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="<?=$base_url ?>assets/css/style.css">

	</head>		
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper home">
					
			<!-- Start Navigation -->
			<!-- Header -->
			<header class="header <?=!$uri?'min-header':'' ?>">
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
							<img src="<?=$base_url ?>assets/img/logo-white.png" class="img-fluid sticky-none" alt="Logo">
							<img src="<?=$base_url ?>assets/img/logo-black.png" class="img-fluid sticky-block" alt="Logo">
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
							<li class="has-submenu"><a href="<?=$base_url ?>">Personal Injury</a></li>
							<li class="has-submenu"><a href="<?=$base_url ?>">Family Law</a></li>
							<li class="has-submenu"><a href="<?=$base_url ?>">Criminal Defense</a></li>
							<li class="has-submenu"><a href="<?=$base_url ?>">Business and Corporate Law</a></li>
							<li class="has-submenu">
								<a href="<?=$base_url ?>#">Other Services <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li class="has-submenu">
										<a href="<?=$base_url ?>#">Instructors</a>
										<ul class="submenu">
											<li><a href="<?=$base_url ?>map-grid.php">Map Grid</a></li>
											<li><a href="<?=$base_url ?>map-list.php">Map List</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li class="has-submenu"><a href="<?=$base_url ?>contact.php">Contact Us</a></li>
							
							
						</ul>
					</div>		 
					<ul class="nav header-navbar-rht">
						<li><a href="<?=$base_url ?>login.php">Log in</a></li>
						<li><a href="<?=$base_url ?>register.php" class="login-btn">Signup </a></li>
						
					</ul>
				</nav>
			</header>
			<!-- /Header -->	


