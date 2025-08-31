<?php
$serviceUrl = '';
if(!empty($service)) $serviceUrl = '?service='.$service;
?>
<?php if(!empty($col)){ ?>
<div class="col-md-6 col-lg-4">
<?php } ?>
<div class="instructor-item">
	<div class="profile-box">
		<div class="img-part">
			<img src="<?=image_check($value->image, 'user.png') ?>" class="img-fluid" alt="instructor">
		</div>
		<div class="profile-info">
			<div class="rating"><i class="fa fa-star checked"></i><i class="fa fa-star checked"></i><i class="fa fa-star checked"></i><i class="fa fa-star non-checked"></i><i class="fa fa-star non-checked"></i></div>
			<h3><a href="<?=base_url('advocate-profile/'.encript($value->id)) ?>"><?=$value->name ?></a></h3>
			<h4>Adviser</h4>		
		</div>
		<div class="instructor-line"></div>	
	</div>
	<div class="profile-detail">
		<div class="row">
			<div class="col-6 d-flex align-items-center clg">
				<div class="icon"><img src="assets/img/icon/icon-01.png" class="img-fluid" alt="college"></div>
				<div><p>University of Hertfordshire</p></div>
			</div>
			<div class="col-6 d-flex align-items-center clg">
				<div class="icon"><img src="assets/img/icon/icon-02.png" class="img-fluid" alt="college"></div>
				<div><h5>Expertise</h5> <p class="exp">Aerodynamics</p> </div>
			</div>
		</div>
		<div class="d-flex justify-content-between align-items-center"> 
			<div class="experience">Experience : 25 years</div>
			<a href="<?=base_url('adviser/'.encript($value->id)).$serviceUrl ?>" class="btn btn-read">BOOK NOW</a>
		</div>	
	</div>	
</div>
<?php if(!empty($col)){ ?>
</div>
<?php } ?>