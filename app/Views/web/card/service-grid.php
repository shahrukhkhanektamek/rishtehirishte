<div class="<?=$col ?>">								
	<div class="blog-box">
        <div class="blog-box-image">
            <img class="img-fluid" src="<?=image_check($value->image) ?>" loading="lazy" alt="image">
        </div>
        <a class="pe-0" href="<?=base_url().$value->slug ?>"><h4><?=$value->name ?></h4></a>
    </div>							
</div>
