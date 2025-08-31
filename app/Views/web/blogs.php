<?php 
include"include/header.php"; 

$table_nameOld = $table_name;


$builder = $db->table('blog_category');
$builder->select('blog_category.*, COUNT(blog.id) as blogs_count');
$builder->join('blog', 'blog.category = blog_category.id', 'left');
$builder->where('blog_category.status', 1);
$builder->groupBy('blog_category.id');
$builder->orderBy('blog_category.id', 'desc');

$blog_category = $builder->get()->getResult();





$uri = $request->getUri()->getSegment(1);
$limit = 12;
$status = 1;
$order_by = $request->getVar('order_by') ?:'1';
$search = $request->getVar('search');
$page = $request->getVar('page') ?: 1;
$offset = ($page - 1) * $limit;



$table_name = "blog";
$data['route'] = base_url('services');   


$query = $db->table($table_name)
    ->where([
        $table_name . '.status' => $status,
    ])
    ->join('blog_category', 'blog_category.id = '.$table_name.'.category', 'left')
    ->select("{$table_name}.*,blog_category.name as category_name");


$query->orderBy($table_name . '.id', 'desc'); 


if($table_nameOld=='blog_category')
{
	$query->where($table_name.'.category', $row->id);
}

if(!empty($search))
{
    $query->groupStart()
        ->like($table_name . '.name', $search)
    ->groupEnd();
}

$total = $query->countAllResults(false);
$data_list = $query->limit($limit, $offset)->get()->getResult();
$data['pager'] = $pager->makeLinks($page, $limit, $total);
$data['totalData'] = $total;
$data['startData'] = $offset + 1;
$data['endData'] = ($offset + $limit > $total) ? $total : ($offset + $limit);
$data['data_list'] = $data_list;

?>


			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?=base_url() ?>">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Blogs</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Blogs</h2>
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
						
							<div class="row blog-grid-row">
								<?php foreach ($data_list as $key => $value) { 
	                              	echo view("web/card/blog-grid",["col"=>"col-md-6 col-sm-12","value"=>$value,]);
	                            } ?>

								


							</div>
							
							<!-- Blog Pagination -->
							<div class="row">
								<div class="pagination">
								        <div class="pagination-result">
								        Showing
								        <span class="start-data">  <?=$data['startData'] ?></span>
								        <span>to</span>
								        <span class="end-data"><?=$data['endData'] ?></span>
								        <span class="total-data"><?=$data['totalData'] ?> Results</span>
								    </div>
								    <?=$data['pager']?>
								</div>
								<div class="col-md-12 d-none">
									<div class="blog-pagination">
										<nav>
											<ul class="pagination justify-content-center">
												<li class="page-item disabled">
													<a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-double-left"></i></a>
												</li>
												<li class="page-item">
													<a class="page-link" href="#">1</a>
												</li>
												<li class="page-item active">
													<a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
												</li>
												<li class="page-item">
													<a class="page-link" href="#">3</a>
												</li>
												<li class="page-item">
													<a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a>
												</li>
											</ul>
										</nav>
									</div>
								</div>
							</div>
							<!-- /Blog Pagination -->
							
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