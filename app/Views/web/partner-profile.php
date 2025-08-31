<?php $user = get_user(); ?>
<?php 

$user_id = decript($uri2);

$row = $db->table("users")->where(['users.id'=>$user_id,"users.status"=>1,])
->join('role',"role.id = users.role",'left')
->join('countries',"countries.id = users.country",'left')
->join('states',"states.id = users.state",'left')
->select("users.*, role.name as role_name, countries.name as country_name, states.name as state_name")
->get()->getFirstRow();

$count_review = count_review($user_id);


if(!empty($row))
{
	include"include/header.php";

	$user_id = $row->id;

	$kyc = $db->table('kyc')->where(["user_id"=>$user_id,])->orderBy('id','desc')->get()->getFirstRow();

	$educations = $db->table("partner_education")
	->where(['partner_education.user_id'=>$user_id,])
	->join('education as education',"partner_education.ed_id = education.id",'left')->get()->getResultObject();	

	$partner_specialization = $db->table("partner_specialization")
	->where(['partner_specialization.user_id'=>$user_id,])
	->join('service as service',"partner_specialization.sp_id = service.id",'left')->get()->getResultObject();

	$partner_service = $db->table("partner_service")
	->where(['partner_service.user_id'=>$user_id,])
	->join('service as service',"partner_service.s_id = service.id",'left')->get()->getResultObject();

	$partner_expertise = $db->table("partner_expertise")
	->where(['partner_expertise.user_id'=>$user_id,])
	->join('service as service',"partner_expertise.e_id = service.id",'left')->get()->getResultObject();

	$partner_certification = $db->table("partner_certification")
	->where(['partner_certification.user_id'=>$user_id,])
	->join('certification as certification',"partner_certification.c_id = certification.id",'left')->get()->getResultObject();





    $limit = 10;
    $status = 1;
    $order_by = 'desc';
    $page = 1; 
    $offset = ($page - 1) * $limit;

    


    $table_name = 'review';
    $query = $db->table($table_name)
        ->join('users', 'users.id = ' . $table_name.'.user_id', 'left')
        ->select("{$table_name}.*, 

            users.name as name,
            users.image as image,

            ")
        ->where([
            $table_name . '.status' =>1,
            $table_name . ".partner_id" => $user_id
        ]);

    $data_list = $query->orderBy($table_name . '.id', $order_by)->limit($limit, $offset)->get()->getResult();
  



$page_title = '';
if($uri=='advocate')
{
	$page_title = 'Advocates';
}
if($uri=='ca')
{	
	$page_title = 'Chartered Accountant (CA)';
}
if($uri=='adviser')
{	
	$page_title = 'Advisers';
}
?>
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?=base_url() ?>">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page"><?=$page_title?></li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title"><?=$page_title?></h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">

					<!-- Instructor Widget -->
					<div class="card">
						<div class="card-body">
							<div class="provider-widget">
								<div class="pro-info-left">
									<div class="provider-img">
										<img src="<?=image_check($row->image,'user.png') ?>" class="img-fluid" alt="User Image">
									</div>
									<div class="pro-info-cont">
										<h4 class="pro-name"><?=$row->name ?></h4>
										<p class="pro-speciality"><?php foreach ($educations as $key => $value) { if($key==0) echo $value->name; else echo', '.$value->name; } ?></p>
										<p class="pro-department"><img src="<?=base_url() ?>assets/img/icon.png" class="img-fluid" alt="Speciality"><?=$row->role_name ?></p>
										<div class="rating">

											<?php
												$i = 1;
												while ($i<=5) {
													if($i<=$count_review['average_rating'])
													 	echo '<i class="fas fa-star filled"></i>';
													else
														echo '<i class="fas fa-star"></i>';
													$i++;	
												}
											?>
											

											<span class="d-inline-block average-rating">(<?=$count_review['total'] ?>)</span>
										</div>
										<div class="clinic-details">
											<p class="pro-location"><i class="fas fa-map-marker-alt"></i> <?=$row->country_name ?>, <?=$row->state_name ?> - <a href="javascript:void(0);">Get Directions</a></p>
										</div>
									</div>
								</div>
								<div class="pro-info-right">
									<div class="clini-infos">
										<ul>
											<li><i class="far fa-thumbs-up"></i> 99%</li>
											<li><i class="far fa-comment"></i> 35 Feedback</li>
											<li><i class="fas fa-map-marker-alt"></i> <?=$row->country_name ?>, <?=$row->state_name ?></li>
											<li><i class="far fa-money-bill-alt"></i> <?=price_formate(@$kyc->appointment_amount) ?> Appointment Charge </li>
										</ul>
									</div>
									<div class="provider-action">
										<a href="javascript:void(0)" class="btn btn-white call-btn" data-bs-toggle="modal" data-bs-target="#voice_call">
											<i class="fas fa-phone"></i>
										</a>
										<a href="javascript:void(0)" class="btn btn-white call-btn" data-bs-toggle="modal" data-bs-target="#video_call">
											<i class="fab fa-whatsapp"></i>
										</a>
									</div>
									<div class="clinic-booking">
										<a class="apt-btn" href="<?=base_url() ?>appointment?partner=<?=encript($row->id) ?>">Book Appointment</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Instructor Widget -->
					
					<!-- Instructor Details Tab -->
					<div class="card">
						<div class="card-body pt-0">
						
							<!-- Tab Menu -->
							<nav class="user-tabs mb-4">
								<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
									<li class="nav-item">
										<a class="nav-link active" href="#doc_overview" data-bs-toggle="tab">Overview</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#doc_reviews" data-bs-toggle="tab">Reviews</a>
									</li>
									<!-- <li class="nav-item">
										<a class="nav-link" href="#doc_business_hours" data-bs-toggle="tab">Business Hours</a>
									</li> -->
								</ul>
							</nav>
							<!-- /Tab Menu -->
							
							<!-- Tab Content -->
							<div class="tab-content pt-0">
							
								<!-- Overview Content -->
								<div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
									<div class="row">
										<div class="col-md-12 col-lg-9">
										
											<!-- About Details -->
											<div class="widget about-widget">
												<h4 class="widget-title">About Me</h4>
												<p><?=$row->about ?></p>
											</div>
											<!-- /About Details -->
										

										<?php if(!empty($educations)){ ?>
											<!-- Education Details -->
											<div class="widget education-widget">
												<h4 class="widget-title">Education</h4>
												<div class="experience-box">
													<ul class="experience-list">
														<?php foreach ($educations as $key => $value) { ?>
															<li>
																<div class="experience-user">
																	<div class="before-circle"></div>
																</div>
																<div class="experience-content">
																	<div class="timeline-content">
																		<a href="#/" class="name"><?=$value->collage ?></a>
																		<div><?=$value->name ?></div>
																		<span class="time">Complete Year <?=$value->year_complete ?></span>
																	</div>
																</div>
															</li>
														<?php } ?>
													</ul>
												</div>
											</div>
											<!-- /Education Details -->
										<?php } ?>
									
											
										<?php if(!empty($partner_service)){ ?>	
											<!-- Services List -->
											<div class="service-list">
												<h4>Services</h4>
												<ul class="clearfix">
													<?php foreach ($partner_service as $key => $value) { ?>
														<li><?=$value->name ?></li>
													<?php } ?>
												</ul>
											</div>
											<!-- /Services List -->
										<?php } ?>
										
										<?php if(!empty($partner_specialization)){ ?>
											<!-- Specializations List -->
											<div class="service-list">
												<h4>Specializations</h4>
												<ul class="clearfix">
													<?php foreach ($partner_specialization as $key => $value) { ?>
														<li><?=$value->name ?></li>
													<?php } ?>
												</ul>
											</div>
											<!-- /Specializations List -->
										<?php } ?>
											
										<?php if(!empty($partner_expertise)){ ?>
											<!-- Expertise List -->
											<div class="service-list">
												<h4>Expertise</h4>
												<ul class="clearfix">
													<?php foreach ($partner_expertise as $key => $value) { ?>
														<li><?=$value->name ?></li>
													<?php } ?>
												</ul>
											</div>
											<!-- /Expertise List -->
										<?php } ?>

										<?php if(!empty($partner_certification)){ ?>	
											<!-- Certification List -->
											<div class="service-list">
												<h4>Certification</h4>
												<ul class="clearfix">
													<?php foreach ($partner_certification as $key => $value) { ?>
														<li><?=$value->name ?></li>
													<?php } ?>
												</ul>
											</div>
											<!-- /Certification List -->
										<?php } ?>

										</div>
									</div>
								</div>
								<!-- /Overview Content -->
								
								
								
								<!-- Reviews Content -->
								<div role="tabpanel" id="doc_reviews" class="tab-pane fade">
								
									<!-- Review Listing -->
									<div class="widget review-listing">

										<?php echo $view = view('partner/review/table',compact('data_list'),[],true); ?>
										
										
										<!-- Show All -->
										<!-- <div class="all-feedback text-center">
											<a href="#" class="btn btn-primary btn-sm">
												Show all feedback <strong>(167)</strong>
											</a>
										</div> -->
										<!-- /Show All -->
										
									</div>
									<!-- /Review Listing -->
								
									<!-- Write Review -->
									<div class="write-review">
										<h4>Write a review for <strong><?=$row->name ?></strong> 
											<?php if(@$user->role!=2){ ?>
												<a href="<?=base_url('login').'?callBack='.encript((empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]") ?>" style="font-size: 12px;color: red;">Login First</a>
											<?php } ?>
										</h4>
										
										<!-- Write Review Form -->
										<form class="form_data" action="<?= base_url('user/review/add'); ?>" method="post" id="ReviewForm" novalidate >

											<input type="hidden" name="partner_id" value="<?=encript($row->id) ?>">

											<div class="form-group">
												<label>Review</label>
												<div class="star-rating">
													<input id="star-5" type="radio" name="rating" value="5">
													<label for="star-5" title="5 stars">
														<i class="active fa fa-star"></i>
													</label>
													<input id="star-4" type="radio" name="rating" value="4">
													<label for="star-4" title="4 stars">
														<i class="active fa fa-star"></i>
													</label>
													<input id="star-3" type="radio" name="rating" value="3">
													<label for="star-3" title="3 stars">
														<i class="active fa fa-star"></i>
													</label>
													<input id="star-2" type="radio" name="rating" value="2">
													<label for="star-2" title="2 stars">
														<i class="active fa fa-star"></i>
													</label>
													<input id="star-1" type="radio" name="rating" value="1">
													<label for="star-1" title="1 star">
														<i class="active fa fa-star"></i>
													</label>
												</div>
											</div>
											
											<div class="form-group">
												<label>Your review</label>
												<textarea id="review_desc" maxlength="100" class="form-control" name="message" required></textarea>
											  
											  <div class="d-flex justify-content-between mt-3"><small class="text-muted"><span id="chars">100</span> characters remaining</small></div>
											</div>
											<hr>
											<div class="form-group">
												<div class="terms-accept">
													<div class="custom-checkbox">
													   <input type="checkbox" id="terms_accept" value="1" name="term">
													   <label for="terms_accept">I have read and accept <a href="<?=base_url() ?>term-condition">Terms and Conditions</a> &amp; Conditions</label>
													</div>
												</div>
											</div>
											<?php if(@$user->role==2){ ?>
												<div class="submit-section">
													<button type="submit" class="btn btn-primary">Add Review</button>
												</div>
											<?php } ?>
										</form>
										<!-- /Write Review Form -->
										
									</div>
									<!-- /Write Review -->
						
								</div>
								<!-- /Reviews Content -->
								
								<!-- Business Hours Content -->
								<div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
									<div class="row">
										<div class="col-md-6 offset-md-3">
										
											<!-- Business Hours Widget -->
											<div class="widget business-widget">
												<div class="widget-content">
													<div class="listing-hours">
														<div class="listing-day current">
															<div class="day">Today <span>5 Nov 2019</span></div>
															<div class="time-items">
																<span class="open-status"><span class="badge bg-success-light">Open Now</span></span>
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Monday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Tuesday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Wednesday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Thursday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Friday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Saturday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day closed">
															<div class="day">Sunday</div>
															<div class="time-items">
																<span class="time"><span class="badge bg-danger-light">Closed</span></span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- /Business Hours Widget -->
									
										</div>
									</div>
								</div>
								<!-- /Business Hours Content -->
								
							</div>
						</div>
					</div>
					<!-- /Instructor Details Tab -->

				</div>
			</div>		
			<!-- /Page Content -->
<?php include"include/footer.php"; ?>

<?php }else{ include"404.php"; } ?>