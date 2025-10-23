<!-- LOGIN -->
<?php
$user = get_user();
$check_any_active_plan = check_any_active_plan(@$user->id);
?>
    <section class="dashboard_bg">
        <div class="pt-40 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <div class="db-nav">
                            <div class="db-nav-pro">
                                <div class="head-pro head-pro-side d-flex align-items-center">
                                    <img src="<?=image_check($user->image,'user.png')?>" loading="lazy" alt="user_profile" loading="lazy">
                                    <div>
                                        <h4 class="overflow-visible"><?=$user->name?></h4>
                                        <b><?=env('APP_SORT').'-'.$user->user_id?></b>
                                    </div>
                                </div>
                            </div>
                            <div class="db-nav-list">
                                <ul id="NavMenu">
                                    <li><a href="<?=base_url()?>user/dashboard">
                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z"/></svg>
                                        Dashboard</a>
                                    </li>
                                    <li><a href="<?=base_url()?>user/my-matches">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                                        My Matches</a>
                                    </li>
                                    <li><a href="<?=base_url()?>user/inbox">
                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 13h3.439a.991.991 0 0 1 .908.6 3.978 3.978 0 0 0 7.306 0 .99.99 0 0 1 .908-.6H20M4 13v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6M4 13l2-9h12l2 9"/></svg>
                                        Inbox</a>
                                    </li>
                                    <li><a href="<?=base_url()?>user/member">
                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/><path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                                        View Profiles</a>
                                    </li>
                                    <li><a href="<?=base_url()?>user/viewed-profiles">
                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/><path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                                        Viewed Profiles</a>
                                    </li>
                                    <li><a href="<?=base_url()?>user/profile">
                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                                        Profile</a>
                                    </li>
                                    <li><a href="<?=base_url('user/member/profile/'.strtolower(env('APP_SORT')).'-'.$user->user_id)?>">
                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                                        My Profile</a>
                                    </li>
                                    <li><a class="logout">
                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2"/></svg>
                                        Log out</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="row mt-3">
                            
                            <div class="col-12 db-sec-com">
                                <!-- <h2 class="db-tit">Plan details</h2> -->
                                <div class="db-pro-stat">
                                    <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="tit-top-curv mb-0">Standard plan</h6>
                                    
                                    </div>
                                    <div class="d-flex align-items-start justify-content-between mt-3">
                                        <div class="db-plan-card">
                                            <img class="img-fluid" src="<?=base_url() ?>images/icon/plan.png" width="40" loading="lazy" alt="icon">
                                        </div>
                                        <div class="db-plan-detil">
                                            <ul>
                                                <?php if($check_any_active_plan['status']==1){ ?>
                                                    <li>Plan Name: <strong><?=$check_any_active_plan['name']?></strong></li>
                                                    <li>Valid till <strong><?=date("d M Y", strtotime($check_any_active_plan['plan_end_date_time']))?></strong></li>
                                                    <li>Contact Limit: <strong><?=$check_any_active_plan['limit']?></strong></li>
                                                    <li>Contact Viewed: <strong><?=$check_any_active_plan['contact_view']?></strong></li>
                                                    <li>Contact Remain: <strong><?=$check_any_active_plan['remaining']?></strong></li>
                                                    <li><a href="<?=base_url('/')?>packages" class="cta-3">Upgrade Now</a></li>
                                                <?php }else{?>
                                                    <li><a href="<?=base_url('/')?>packages" class="cta-3">Purchase Now</a></li>
                                                <?php } ?>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        