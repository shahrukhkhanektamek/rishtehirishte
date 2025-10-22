<?php



$uri = $request->getUri()->getSegment(1);
$limit = 12;
$status = 1;
$page = $request->getVar('page') ?: 1;
$offset = ($page - 1) * $limit;


$table_name = "service";
$data['route'] = base_url('service');   





$data['table_name'] = $table_name;


$data_list = $db->table($table_name)
    ->where([$table_name.'.status' => $status])
    ->select([
        "{$table_name}.*",
    ])
    ->where($table_name.'.status', 1);






$total = $data_list->countAllResults(false);

$data_list = $data_list->orderBy($table_name.'.update_date_time','desc')
    ->limit($limit, $offset)
    ->get()
    ->getResult();




$data['pager'] = $pager->makeLinks($page, $limit, $total);
$data['totalData'] = $total;
$data['startData'] = $offset + 1;
$data['endData'] = ($offset + $limit > $total) ? $total : ($offset + $limit);
$data['data_list'] = $data_list;

?>

<!--  Start Header Area -->
<?php include"include/header.php"; ?>
<!-- End Header Area -->

    <div class="hom-top login_style">

    <?php include"include/header-nav.php"; ?>

    <!-- BANNER -->
    <section>
        <div class="str">
            <div class="ban-inn ab-ban pg-cont" style="background: linear-gradient(to right, rgb(137, 33, 107), rgb(218, 68, 83));">
                <div class="container">
                    <div class="row">
                        <div class="hom-ban">
                            <div class="ban-tit">
                                <h1>Rishte Hi Rishte Services</h1>
                                <h4 class="fw-light text-white">Best Marriage Bureau in Delhi</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

     <section class="dashboard_bg">
        <div class="pt-40 pb-40">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-12 col-lg-12">
                        
                        
                        <div id="myMatches" class="row">
                            <div class="col-md-12 db-sec-com">
                                <div class="row">                            
                                    <?php foreach ($data_list as $key => $value) {                                         
                                        echo view("web/card/service-grid",["col"=>"col-md-6 col-lg-3 mb-4","value"=>$value,]);
                                    } ?>                                    
                                </div>

                                <div class="pagination d-flex align-items-center justify-content-center mt-3">        
                                    <?=$data['pager']?>
                                </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->


<!--  Start Footer Area -->
<?php include"include/footer.php"; ?>
<!-- End Footer Area -->  