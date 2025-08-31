<div class="<?=$col ?>">
	<div class="blog grid-blog grid-service">
		<div class="blog-image">
			<a href="<?=base_url().$value->slug ?>"><img class="img-fluid" src="<?=image_check($value->image) ?>" alt="Post Image"></a>
		</div>
		<div class="blog-content">
			<h3 class="blog-title"><a href="<?=base_url().$value->slug ?>"><?=$value->name ?></a></h3>
			<p class="mb-0"><?=$value->sort_description ?></p>
		</div>
		<div class="text-center">
			<a href="<?=base_url().$value->slug ?>" class="btn course-btn mt-3">Learn More</a>
		</div>
	</div>							
</div>