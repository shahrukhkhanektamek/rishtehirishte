<?php 
include"include/header.php"; 

$table_nameOld = $table_name;


$builder = $db->table('service_category');
$builder->select('service_category.*, COUNT(service.id) as services_count');
$builder->join('service', 'service.category = service_category.id', 'left');
$builder->where('service_category.status', 1);
$builder->groupBy('service_category.id');
$builder->orderBy('service_category.id', 'desc');

$service_category = $builder->get()->getResult();





$uri = $request->getUri()->getSegment(1);
$limit = 12;
$status = 1;
$order_by = $request->getVar('order_by') ?:'1';
$search = $request->getVar('search');
$page = $request->getVar('page') ?: 1;
$offset = ($page - 1) * $limit;



$table_name = "service";
$data['route'] = base_url('services');   


$query = $db->table($table_name)
    ->where([
        $table_name . '.status' => $status,
    ])
    ->join('service_category', 'service_category.id = '.$table_name.'.category', 'left')
    ->select("{$table_name}.*,service_category.name as category_name");


$query->orderBy($table_name . '.id', 'desc'); 


if($table_nameOld=='service_category')
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
									<li class="breadcrumb-item active" aria-current="page">Services</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Services</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">


							<div class="card category-widget">
								<div class="card-body">
									<ul class="categories">
										<li><a href="<?=base_url('services') ?>" >All </a></li>
										<?php foreach ($service_category as $key => $value) { ?>
											<li><a href="<?=base_url().$value->slug ?>" class="<?php if($value->slug==$uri)echo 'active'; ?>"><?=$value->name ?> <span>(<?=$value->services_count ?>)</span></a></li>
										<?php } ?>
									</ul>
								</div>
							</div>							
						</div>
						<div class="col-md-7 col-lg-8 col-xl-9">

							<div class="col-md-12">
								<form class="mb-3">
									<div class="input-group">
										<input type="text" placeholder="Search Keyword..." class="form-control" name="search" value="<?=$search ?>">
										<button type="submit" class="btn btn-primary">search</button>
									</div>
								</form>
							</div>


						
							<div class="row row-grid">
								
								<?php foreach ($data_list as $key => $value) { 
	                              	echo view("web/card/service-grid",["col"=>"col-md-6 col-lg-4","value"=>$value,]);
	                            } ?>
															
							</div>
							
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

						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
 <?php include"include/footer.php"; ?>