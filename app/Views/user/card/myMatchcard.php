<?php 
$user = @$data['user'];
$blur = true;
$check_any_active_plan = check_any_active_plan(@$user->id);
if(!empty($check_any_active_plan['status']))
{
    $blur = false;
}
foreach ($latest_list as $key => $value) { ?>
    <li>
        <div class="db-new-pro">
            <img src="<?=image_check($value->image, 'user.png', $blur)?>" loading="lazy" alt="profile" class="profile img-fluid">
            <div>
                <h5 class="list-id-number"><?=env('APP_SORT')?>-<?=$value->user_id?></h5>
                <span class="city"><?=$value->age ?></span><span class="age">	&#8226; <?=$value->religion_name?></span>
            </div>
            <a href="<?=base_url().'user/member/profile/'.strtolower(env('APP_SORT')).'-'.$value->user_id ?>" class="fclick">&nbsp;</a>
        </div>
    </li>
<?php } ?>