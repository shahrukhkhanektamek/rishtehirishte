<?php include"include/header.php"; 
$category = $db->table('service_category')->where(["id"=>$row->category,])->get()->getRow();
$services = $db->table('service')->getWhere(["status"=>1,"category"=>$row->category,])->getResultObject();
$servicesCard = $db->table('service')->limit(6)->getWhere(["status"=>1,"category"=>$row->category,])->getResultObject();
$states = $db->table('states')->getWhere(["status"=>1,])->getResultObject();
$cities = $db->table('city')->getWhere(["status"=>1,])->getResultObject();


?>
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?=base_url() ?>">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page"><?=@$category->name ?></li>
									<li class="breadcrumb-item active" aria-current="page"><?=$row->name ?></li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title"><?=$row->name ?></h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">
				
					<div class="row">
						<div class="col-lg-8 col-md-12">
							<div class="blog-view">
								<div class="blog blog-single-post">
									<div class="blog-image">
										<div class="row">
											<div class="col-md-4">
												<a href="javascript:void(0);"><img alt="" src="<?=image_check_front($row->image) ?>" class="img-fluid"></a>												
											</div>
											<div class="col-md-8">
												<h3 class="blog-title" style="text-transform: capitalize;"><?=$row->name ?></h3>
												<p><?=$row->sort_description ?></p>
											</div>
										</div>
									</div>									
									<div class="blog-content">
										<p><?=$row->full_description ?></p>
				                        <p><?=$row->document_area ?></p>
				                        <p><?=$row->extra ?></p>   
									</div>
								</div>								
							</div>
						</div>
					
						<!-- Blog Sidebar -->
						<div class="col-lg-4 col-md-12 sidebar-right theiaStickySidebar">

							<div class="card category-widget d-none">
								<div class="card-body">
									<?php if($row->service_type==1){ ?>
										<a href="<?=base_url().'ca?service='.$row->slug?>" class="btn btn-primary">Hire CA</a>									
									<?php }elseif ($row->service_type==2) { ?>
										<a href="<?=base_url().'advocates?service='.$row->slug?>" class="btn btn-primary">Hire Advocate</a>	
									<?php }elseif ($row->service_type==3) { ?>
										<a href="<?=base_url().'advisers?service='.$row->slug?>" class="btn btn-primary">Hire Adviser</a>	
									<?php } ?>
								</div>
							</div>
							
							<!-- Categories -->
							<div class="card category-widget">
								<div class="card-header">
									<h4 class="card-title">Get In Touch</h4>
								</div>
								<div class="card-body">

									<form class="form_data" action="<?=base_url('lead-enquiry')?>" method="post" enctype="multipart/form-data" id="form_data_submit" novalidate>
		                                <?= csrf_field() ?>
		                                <input type="hidden" name="url" value="<?=(empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
		                                <input type="hidden" name="service" value="<?=encript($row->id) ?>">

										<div class="form-group">
											<label>Name <span class="text-danger">*</span></label>
											<input type="text" class="form-control" name="name" required>
										</div>
										<div class="form-group">
											<label>Phone <span class="text-danger">*</span></label>
											<input type="text" class="form-control" name="phone" required>
										</div>
										<div class="form-group">
											<label>Your Email Address </label>
											<input type="email" class="form-control" name="email">
										</div>
										<div class="form-group">
											<label>Comments</label>
											<textarea rows="4" class="form-control" name="message"></textarea>
										</div>
										<div class="form-group d-none">
											<label>Country</label>
											<select class="form-control" id="country" name="country">
												<option value="99" selected>India</option>
											</select>
										</div>
										<div class="form-group">
											<label>State</label>
											<select class="form-control" id="state" name="state">
												<option value="">Select State</option>
											</select>
										</div>

										<div class="submit-section">
											<button class="btn btn-primary" type="submit">Submit</button>
										</div>

										

										
									</form>
								</div>
							</div>
							<!-- /Categories -->
							
							<div class="card blog-share clearfix">
									<div class="card-header">
										<h4 class="card-title">Share the post</h4>
									</div>
									<div class="card-body">
										<ul class="social-share">
											<li><a href="#" title="Facebook"><i class="fab fa-facebook"></i></a></li>
											<li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
											<li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
											<li><a href="#" title="Google Plus"><i class="fab fa-google-plus"></i></a></li>
											<li><a href="#" title="Youtube"><i class="fab fa-youtube"></i></a></li>
										</ul>
									</div>
							</div>							
							
						</div>
						<!-- /Blog Sidebar -->
						
                </div>


                <div class="row">
						<div class="col-lg-4 col-md-12">
							<div class="blog-view">
								<div class="profile-sidebar">
								
									<div class="dashboard-widget">
										<nav class="dashboard-menu">
											<ul>
												<?php foreach ($services as $key => $value) { ?>
				                                    <li class="active">
														<a href="<?=base_url($value->slug) ?>" style="justify-content: space-between;display: flex;">
															<?=$value->name ?>
					                                    	<i class="fa fa-angle-right"></i>
														</a>
													</li>
				                                 <?php } ?>												
											</ul>
										</nav>
									</div>

								</div>
							</div>
						</div>
						<div class="col-lg-8 col-md-8">
							<div class="bd-course-details-content" style="background: white;">
		                        <div class="container">
		                           <div class="row justify-content-between align-items-center section-title-space g-30">
		                              <div class="col-xl-7 col-lg-7 col-md-9">
		                                 <div class="bd-section-title-wrapper">
		                                    <span class="bd-section-subtitle">Top Picks for You</span>
		                                    <h2 class="bd-section-title">Discover Your Next Services</h2>
		                                 </div>
		                              </div>
		                             
		                           </div>
		                           <div class="row g-30">
		                              
		                              <?php foreach ($servicesCard as $key => $value) { 
		                              	echo view("web/card/service-grid",["col"=>"col-md-6 col-lg-4","value"=>$value,]);
		                              } ?>


		                              
		                           </div>
		                        </div>                    
		                     </div>
						</div>
				</div>




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

         <section class="bd-course-breadcrumb-area section-space">
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
                              <h2 class="bd-course-breadcrumb-title"><?=$row->name?> in city</h2>
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









				</div>

			</div>		
			<!-- /Page Content -->
<?php include"include/footer.php"; ?>

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
