<?php



$uri = $request->getUri()->getSegment(1);
$limit = 12;
$status = 1;
$page = $request->getVar('page') ?: 1;
$offset = ($page - 1) * $limit;


$table_name = "memories";
$data['route'] = base_url('memories');   





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
                                <h1>Rishte Hi Rishte Memories</h1>
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
                                        <?php foreach ($data_list as $key => $value) { ?>
                                            <div class="col-md-4 mb-4">
                                                <div class="blog-box">
                                                    <div class="blog-box-image" style="height: auto;">
                                                        
                                                        <video id="videoPreview<?=$key?>" 
                                                        style="width: 100%;    padding: 11px 10px 4px 10px;"
                                                        src="<?=base_url('upload/memories/').@$value->video?>"
                                                        
                                                          controls ></video>
                                                    </div>
                                                </div>                          
                                            </div>

                                        <?php } ?>
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

<script>
document.addEventListener('play', function(e) {
    // सभी videos को select करें
    var videos = document.getElementsByTagName('video');
    for (var i = 0; i < videos.length; i++) {
        // जो video play हो रहा है, उसे छोड़कर बाकी सब pause कर दें
        if (videos[i] !== e.target) {
            videos[i].pause();
        }
    }
}, true);
</script>


<!--  Start Footer Area -->
<?php include"include/footer.php"; ?>
<!-- End Footer Area -->  

