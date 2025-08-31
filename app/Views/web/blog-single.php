<?php include"include/header.php"; 
$builder = $db->table('blog_category');
$builder->select('blog_category.*, COUNT(blog.id) as blogs_count');
$builder->join('blog', 'blog.category = blog_category.id', 'left');
$builder->where('blog_category.status', 1);
$builder->groupBy('blog_category.id');
$builder->orderBy('blog_category.id', 'desc');

$blog_category = $builder->get()->getResult();
?>
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?=base_url() ?>">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Blog</li>
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
										<a href="javascript:void(0);"><img alt="" src="<?=image_check($row->image) ?>" class="img-fluid"></a>
									</div>
									<h3 class="blog-title"><?=$row->name ?></h3>
									<div class="blog-info clearfix">
										<div class="post-left">
											<ul>
												<li>
													<div class="post-author">
														<a ><img src="<?=base_url() ?>assets/img/favicon.png" alt="Post Author"> <span><?=env('APP_NAME') ?></span></a>
													</div>
												</li>
												<li><i class="far fa-calendar"></i><?=date("d M Y", strtotime($value->add_date_time)) ?></li>
											</ul>
										</div>
									</div>
									<div class="blog-content">
										<?=$row->sort_description ?>
										<?=$row->full_description ?>
									</div>
								</div>
								
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
						</div>
					
						<!-- Blog Sidebar -->
						<div class="col-lg-4 col-md-12 sidebar-right theiaStickySidebar">


							<!-- Latest Posts -->
							<div class="card post-widget">
								<div class="card-header">
									<h4 class="card-title">Latest Posts</h4>
								</div>
								<div class="card-body">
									<ul class="latest-posts">
										<?php
											$blogs = $db->table("blog")->where(["status"=>1,])->limit(5)->orderBy('id','desc')->get()->getResult();
											foreach ($blogs as $key => $value) { ?>	
											<li>
												<div class="post-thumb">
													<a href="<?=base_url().$value->slug ?>">
														<img class="img-fluid" src="<?=image_check($value->image)?>" alt="">
													</a>
												</div>
												<div class="post-info">
													<h4>
														<a href="<?=base_url().$value->slug ?>"><?=$value->name ?></a>
													</h4>
													<p><?=date("M d, Y", strtotime($value->add_date_time)) ?></p>
												</div>
											</li>
										<?php } ?>
									</ul>
								</div>
							</div>
							<!-- /Latest Posts -->

							<!-- Categories -->
							<div class="card category-widget">
								<div class="card-header">
									<h4 class="card-title">Blog Categories</h4>
								</div>
								<div class="card-body">
									<ul class="categories">
										<li><a href="<?=base_url('blogs') ?>" >All </a></li>
										<?php foreach ($blog_category as $key => $value) { ?>
											<li><a href="<?=base_url().$value->slug ?>" class="<?php if($value->slug==$uri)echo 'active'; ?>"><?=$value->name ?> <span>(<?=$value->blogs_count ?>)</span></a></li>
										<?php } ?>
									</ul>
								</div>
							</div>
							<!-- /Categories -->

							
							
						</div>
						<!-- /Blog Sidebar -->
						
                </div>
				</div>

			</div>		
			<!-- /Page Content -->
   
<?php include"include/footer.php"; ?>