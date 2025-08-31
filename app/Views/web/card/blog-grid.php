<div class="<?=$col ?>">								
	<!-- Blog Post -->
	<div class="blog grid-blog">
		<div class="blog-image">
			<a href="<?=base_url().$value->slug ?>"><img class="img-fluid" src="<?=image_check($value->image) ?>" alt="Post Image"></a>
		</div>
		<div class="blog-content">
			<ul class="entry-meta meta-item">
				<li>
					<div class="post-author">
						<a><img src="<?=base_url() ?>assets/img/favicon.png" alt="Post Author"> <span> <?=env('APP_NAME') ?></span></a>
					</div>
				</li>
				<li><i class="far fa-clock"></i><?=date("d M Y", strtotime($value->add_date_time)) ?></li>
			</ul>
			<h3 class="blog-title"><a href="<?=base_url().$value->slug ?>"><?=$value->name ?></a></h3>
			<p class="mb-0"><?=$value->sort_description ?></p>
		</div>
	</div>
	<!-- /Blog Post -->									
</div>
