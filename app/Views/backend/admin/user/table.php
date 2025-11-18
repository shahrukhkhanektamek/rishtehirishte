<div class="row">
    <?php foreach($data_list as $key => $value) { 
        $check_any_active_plan = check_any_active_plan(@$value->id);
        ?>
        <div class="col-12 mb-0">
            <div class="card shadow-sm border rounded-3 w-100 mb-2">
                <div class="card-body d-flex align-items-center">
                    
                    <!-- Left: Profile Image -->
                    <div class="me-3" style="width:120px; flex-shrink:0;">
                        <img src="<?=image_check($value->image) ?>"
                             alt="<?=$value->name?>"
                             class="img-fluid rounded"
                             style="width:120px; height:120px; object-fit:cover;">
                    </div>

                    <!-- Right: Details -->
                    <div class="flex-grow-1">
                        <!-- Top Row -->
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <?=env('APP_SORT')?>-<?=$value->user_id?> - <?=$value->name?>
                            </h5>
                            <span class="badge bg-<?= $value->status==1 ? 'success' : 'danger' ?>">
                                <?=status_get($value->status)?>
                            </span>
                        </div>
                        <small class="text-muted">
                            Registered: <?=date("d M, Y h:i A", strtotime($value->add_date_time)) ?>
                        </small>

                        <!-- Details Grid -->
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <p class="mb-1"><b>Email:</b> <?=$value->email?></p>
                                <p class="mb-1"><b>Mobile:</b> <?=$value->phone?></p>
                                <p class="mb-1"><b>Age:</b> <?=$value->age?> | 
                                    <b>Sex:</b> <?=$value->gender==1?'Male':'Female'?>
                                </p>
                                <p class="mb-1"><b>Caste:</b> <?=$value->caste_name?></p>
                                <p class="mb-1"><b>Religion:</b> <?=$value->religion_name?></p>
                                <p class="mb-1"><b>M-Tongue:</b> <?=$value->mothertongue_name?></p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1"><b>Edu:</b> <?=$value->education_name?></p>
                                <p class="mb-1"><b>Occup:</b> <?=$value->occupation_name?></p>
                                <p class="mb-1"><b>Anu-Inco:</b> <?=$value->annualincome?></p>
                                <p class="mb-1"><b>State:</b> <?=$value->state_name?></p>
                                <p class="mb-1"><b>City:</b> <?=$value->city?></p>
                                <p class="mt-2"><b>Requirement:</b> Not Fill</p>
                            </div>
                            <div class="col-md-4">
                                <?php if(!empty($value->user_package_id)){ ?>                                    
                                    <?php if($value->plan_end_date_time>date("Y-m-d H:i:s")){ ?>
                                        <p class="mb-1"><b>Package Name:</b> <?=@$check_any_active_plan['name'] ?></p>
                                        <p class="mb-1"><b>Pur. Date:</b> <?=date("d M, Y", strtotime(@$check_any_active_plan['plan_start_date_time'])) ?></p>
                                        <p class="mb-1"><b>Exp Date:</b> <?=date("d M, Y", strtotime(@$check_any_active_plan['plan_end_date_time'])) ?></p>
                                        <p class="mb-1"><b>Contact Limit:</b> <?=$check_any_active_plan['limit'] ?></p>
                                        <p class="mb-1"><b>Contact Viewed:</b> <?=$check_any_active_plan['contact_view'] ?></p>
                                        <p class="mb-1"><b>Contact Remain:</b> <?=$check_any_active_plan['remaining'] ?></p>
                                    <?php }else{?>
                                        <span class="btn btn-success bg-danger">Expired</span>
                                    <?php } ?>
                                    
                                <?php }else{ ?>
                                    <span class="btn btn-success bg-danger">Unpaid</span>
                                <?php } ?>
                            </div>
                            <div class="col-md-12">
                                <!-- Actions -->

                                <div class="row">
                                    <div class="col-12">                                                                    
                                        <div class="mt-3 d-flex justify-content-end">

                                            <a href="<?=$data['route'].'/inbox/'.encript($value->id)?>" 
                                               class="mt-1 btn btn-sm btn-outline-primary me-2">
                                               <i class="ri-dashboard-2-line"></i> Inbox
                                            </a>

                                            <a href="<?=$data['route'].'/viewed-profile/'.encript($value->id)?>" 
                                               class="mt-1 btn btn-sm btn-outline-primary me-2">
                                               <i class="ri-dashboard-2-line"></i> Viewed Profiles
                                            </a>

                                            <a href="<?=$data['route'].'/viewed-contact/'.encript($value->id)?>" 
                                               class="mt-1 btn btn-sm btn-outline-primary me-2">
                                               <i class="ri-dashboard-2-line"></i> Viewed Contacts
                                            </a>

                                            <a href="<?=base_url(route_to('website-log.list')).'?id='.encript($value->id)?>" 
                                               class="mt-1 btn btn-sm btn-outline-primary me-2">
                                               <i class="ri-dashboard-2-line"></i> Website Tranvels
                                            </a>
                                            
                                            <a href="<?=$data['route'].'/edit/'.encript($value->id)?>" 
                                               class="mt-1 btn btn-sm btn-outline-primary me-2">
                                               <i class="ri-ball-pen-line"></i> Edit Profile
                                            </a>

                                            <a href="<?=$data['route'].'/view/'.encript($value->id)?>" 
                                               class="mt-1 btn btn-sm btn-outline-info me-2">
                                               <i class="ri-user-line"></i> View Profile
                                            </a>
                                            
                                            <a href="<?=$data['route'].'/change-password/'.encript($value->id)?>" 
                                               class="mt-1 btn btn-sm btn-outline-primary me-2">
                                               <i class="ri-eye-line"></i> Change Password
                                            </a>

                                            <a href="<?=$data['route'].'/assign-package/'.encript($value->id)?>" 
                                               class="mt-1 btn btn-sm btn-outline-primary me-2">
                                               <i class="ri-inbox-line"></i> Assign Package
                                            </a>

                                        </div>
                                    </div>
                                    <div class="col-12"> 
                                        <div class="mt-1 d-flex justify-content-end">
                                            


                                            <a href="<?=base_url(route_to('user-package.list')).'?id='.encript($value->id)?>" 
                                               class="mt-1 btn btn-sm btn-outline-primary me-2">
                                               <i class="ri-inbox-line"></i> Package History
                                            </a>

                                            <a data-id="<?=encript($value->id)?>"
                                               class="mt-1 btn btn-sm btn-outline-info me-2 show-hide-detail-item-btn">
                                               <i class="ri-information-line"></i> Show Hide Detail
                                            </a>

                                            <a href="<?=$data['route'].'/block_unblock/'.encript($value->id)?>" 
                                               data-value="<?=$value->status?>" 
                                               class="mt-1 btn btn-sm btn-outline-warning me-2 block-item-btn">
                                               <i class="ri-settings-6-line"></i> <?=$value->status==1?'Block Profile':'Unblock Profile' ?>
                                            </a>

                                            <a href="<?=$data['route'].'/delete/'.encript($value->id)?>" 
                                               class="mt-1 btn btn-sm btn-danger remove-item-btn">
                                               <i class="ri-delete-bin-4-line"></i> Delete Profile
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        

                        
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<!-- Pagination -->
<div class="pagination mt-3">
    <div class="pagination-result">
        Showing
        <span class="start-data"><?=$data['startData']?></span>
        to
        <span class="end-data"><?=$data['endData']?></span>
        <span class="total-data"><?=$data['totalData']?> Results</span>
    </div>
    <?=$data['pager']?>
</div>
