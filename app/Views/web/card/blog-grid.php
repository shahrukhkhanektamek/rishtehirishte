<div class="<?=$col ?>">								
	<div class="blog-box">
        <div class="blog-box-image">
            <img class="img-fluid" src="<?=image_check($value->image) ?>" loading="lazy" alt="image">
        </div>
        <h4 style="padding: 0 10px;"><?=$value->name ?></h4>
        <div class="justify-content-between d-flex align-items-center" style="margin: -10px 0 10px 0;padding: 0 10px;">
        	<div class="post-author">
				<img src="<?=base_url() ?>upload/favicon.png" style="width: 25px;margin: 0;" alt="Post Author"> <span> <?=env('APP_NAME') ?></span>
			</div>
			<span>
				<i class="far fa-clock"></i><?=date("d M Y", strtotime($value->add_date_time)) ?>
			</span>
        </div>
        <!-- <p><?php // $value->sort_description ?></p> -->
        <div style="padding: 0 10px;height: 54px;">        	
        	<a href="<?=base_url().$value->slug ?>" class="cta-dark"><span>Read more <i class="fa-solid fa-arrow-right ms-2"></i></span></a>
        </div>
    </div>							
</div>
