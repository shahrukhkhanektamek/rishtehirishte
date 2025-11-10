<?=view('backend/include/header') ?>
<?php
$today = date('Y-m-d H:i:s');
$next10Days = date('Y-m-d H:i:s', strtotime('+10 days'));
$next20Days = date('Y-m-d H:i:s', strtotime('+20 days'));
$next30Days = date('Y-m-d H:i:s', strtotime('+30 days'));
?>
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="dashboard_style h-100">
                                <div class="row">

                                    
                                        

                                    
                                        <div class="col-xl-3 col-md-6">
                                            <div class="card card-animate bg-primary">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="text-uppercase fw-medium text-muted text-white-50 mb-0" style="color: white !important;">Total Male Users</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-end justify-content-between mt-2">
                                                        <div>
                                                            <h4 class="fs-22 fw-semibold ff-secondary text-white mb-2"><span class="counter-value" data-target="<?=$db->table('users')->where(["role"=>2,"gender"=>1,])->countAllResults()?>"></span></h4>
                                                        </div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-white bg-opacity-25 rounded fs-2">
                                                                <i class="ri-user-line text-warning"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->


                                    
                                        <div class="col-xl-3 col-md-6">
                                            <div class="card card-animate bg-primary">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="text-uppercase fw-medium text-muted text-white-50 mb-0" style="color: white !important;">Total Female Users</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-end justify-content-between mt-2">
                                                        <div>
                                                            <h4 class="fs-22 fw-semibold ff-secondary text-white mb-2"><span class="counter-value" data-target="<?=$db->table('users')->where(["role"=>2,"gender"=>2,])->countAllResults()?>"></span></h4>
                                                        </div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-white bg-opacity-25 rounded fs-2">
                                                                <i class="ri-user-fill text-warning"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->

                                        <div class="col-xl-3 col-md-6">
                                            <div class="card card-animate bg-primary">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="text-uppercase fw-medium text-muted text-white-50 mb-0" style="color: white !important;">Total Admin Users</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-end justify-content-between mt-2">
                                                        <div>
                                                            <h4 class="fs-22 fw-semibold ff-secondary text-white mb-2"><span class="counter-value" data-target="<?=$db->table('users')->where(["role"=>2,"register_by"=>'admin',])->countAllResults()?>"></span></h4>
                                                        </div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-white bg-opacity-25 rounded fs-2">
                                                                <i class="ri-user-fill text-warning"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->

                                        <div class="col-xl-3 col-md-6">
                                            <div class="card card-animate bg-primary">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="text-uppercase fw-medium text-muted text-white-50 mb-0" style="color: white !important;">Total Website Users</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-end justify-content-between mt-2">
                                                        <div>
                                                            <h4 class="fs-22 fw-semibold ff-secondary text-white mb-2"><span class="counter-value" data-target="<?=$db->table('users')->where(["role"=>2,"register_by"=>'Website',])->countAllResults()?>"></span></h4>
                                                        </div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-white bg-opacity-25 rounded fs-2">
                                                                <i class="ri-user-fill text-warning"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->



                                        <div class="col-xl-3 col-md-6">
                                            <div class="card card-animate bg-primary">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="text-uppercase fw-medium text-muted text-white-50 mb-0" style="color: white !important;">Expire in 10 days Users</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-end justify-content-between mt-2">
                                                        <div>
                                                            <h4 class="fs-22 fw-semibold ff-secondary text-white mb-2"><span class="counter-value" data-target="<?=$db->table('user_package')->where('plan_end_date_time >=', $today)->where('plan_end_date_time <=', $next10Days)->where('status', '1')->countAllResults();?>"></span></h4>
                                                        </div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-white bg-opacity-25 rounded fs-2">
                                                                <i class="ri-user-fill text-warning"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->



                                        <div class="col-xl-3 col-md-6">
                                            <div class="card card-animate bg-primary">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="text-uppercase fw-medium text-muted text-white-50 mb-0" style="color: white !important;">Expire in 20 days Users</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-end justify-content-between mt-2">
                                                        <div>
                                                            <h4 class="fs-22 fw-semibold ff-secondary text-white mb-2"><span class="counter-value" data-target="<?=$db->table('user_package')->where('plan_end_date_time >=', $today)->where('plan_end_date_time <=', $next20Days)->where('status', '1')->countAllResults();?>"></span></h4>
                                                        </div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-white bg-opacity-25 rounded fs-2">
                                                                <i class="ri-user-fill text-warning"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->



                                        <div class="col-xl-3 col-md-6">
                                            <div class="card card-animate bg-primary">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="text-uppercase fw-medium text-muted text-white-50 mb-0" style="color: white !important;">Expire in 30 days Users</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-end justify-content-between mt-2">
                                                        <div>
                                                            <h4 class="fs-22 fw-semibold ff-secondary text-white mb-2"><span class="counter-value" data-target="<?=$db->table('user_package')->where('plan_end_date_time >=', $today)->where('plan_end_date_time <=', $next30Days)->where('status', '1')->countAllResults();?>"></span></h4>
                                                        </div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-white bg-opacity-25 rounded fs-2">
                                                                <i class="ri-user-fill text-warning"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->

                                    
                                        

                                    
                                        <div class="col-xl-3 col-md-6">
                                            <div class="card card-animate bg-primary">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="text-uppercase fw-medium text-muted text-white-50 mb-0" style="color: white !important;">Total Enquiry</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-end justify-content-between mt-2">
                                                        <div>
                                                            <h4 class="fs-22 fw-semibold ff-secondary text-white mb-2"><span class="counter-value" data-target="<?=$db->table('enquiry_contact')->countAllResults()?>"></span></h4>
                                                        </div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-white bg-opacity-25 rounded fs-2">
                                                                <i class="ri-message-2-line text-warning"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->

                                    

                                        
                                        
                                        
                                    


                                </div> <!-- end row-->
                            </div> <!-- end .h-100-->
                        </div> <!-- end col -->
                    </div>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
<?=view('backend/include/footer') ?>