<?php 
$user = @$data['user'];
$blur = true;
$check_any_active_plan = check_any_active_plan(@$user->id);
if(!empty($check_any_active_plan['status']))
{
    $blur = false;
}
foreach ($data_list as $key => $value) { 

    ?>
 <li>
    <div class="db-int-pro-1"> 
        <img class="img-fluid " src="<?=image_check($value->image, 'user.png',$blur)?>" loading="lazy" alt="image"> 
        <?php if(!empty($value->package_name)){ ?>
            <span class="badge bg-primary user-pla-pat"><?=$value->package_name ?> user</span>
        <?php } ?>
    </div>
    <div class="db-int-pro-2">
        <h5 class="list-id-number"><?=env('APP_SORT')?>-<?=$value->user_id?></h5> 
        <ol class="poi">
            <li>Age: <strong><?=$value->age ?></strong></li>
            <li>Height: <strong><?=$value->height?></strong></li>
            <li>Religion: <strong><?=$value->religion_name?></strong></li>
            <li>Caste: <strong><?=$value->caste_name?></strong></li>
            <li>Marital: <strong><?=$value->maritalstatus ?></strong></li>
            <li>Country: <strong><?=$value->country_name ?></strong></li>
        </ol>
        <ol class="poi poi-date" style="opacity:0.6;">
            <li>Education: <b><?=$value->education_name?></b>&nbsp;|&nbsp; Occupation: <b><?=$value->occupation_name?></b>&nbsp;|&nbsp; Income: <b><?=$value->annualincome?></b></li>
        </ol>
        <a href="<?=base_url().'user/member/profile/'.strtolower(env('APP_SORT')).'-'.$value->user_id ?>" class="cta-5" target="_blank">View full profile <i class="fas fa-arrow-right ms-2"></i></a>
    </div>
    <?php if(@$user->role==2){ ?>
    <div class="db-int-pro-3">

        <?php
        if(empty($value->request_status))
        {
        ?>
            <button type="button" class=" mb-1 cta-dark send-interest" data-id="<?=encript($value->id)?>">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M4.248 19C3.22 15.77 5.275 8.232 12.466 8.232V6.079a1.025 1.025 0 0 1 1.644-.862l5.479 4.307a1.108 1.108 0 0 1 0 1.723l-5.48 4.307a1.026 1.026 0 0 1-1.643-.861v-2.154C5.275 13.616 4.248 19 4.248 19Z"/></svg>
                Send Interest
            </button>
        <?php 
        }
        else
        {
            if($value->request_senderID==$user->id){
        ?>
            <?php if($value->request_status=='pending'){ ?>
                <button type="button" class=" mb-1 cta-dark ">Interest Sent</button>
            <?php }else if($value->request_status=='accept'){ ?>
                <button type="button" class=" mb-1 cta-dark bg-success">Interest Accepted</button>
            <?php }else if($value->request_status=='decline'){ ?>
                <button type="button" class=" mb-1 cta-dark bg-danger">Interest Decline</button>
            <?php } ?>

            <?php }else{ ?>
                <?php if($value->request_status=='pending'){ ?>
                    <button type="button" class=" mb-1 cta-dark ">Interest Recieve</button>
                    <button type="button" class=" mb-1 cta-dark bg-success accept-interest" data-id="<?=encript($value->request_id)?>">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M4.248 19C3.22 15.77 5.275 8.232 12.466 8.232V6.079a1.025 1.025 0 0 1 1.644-.862l5.479 4.307a1.108 1.108 0 0 1 0 1.723l-5.48 4.307a1.026 1.026 0 0 1-1.643-.861v-2.154C5.275 13.616 4.248 19 4.248 19Z"/></svg>
                        Accept Interest
                    </button>
                    <button type="button" class=" mb-1 cta-dark bg-danger decline-interest" data-id="<?=encript($value->request_id)?>">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M4.248 19C3.22 15.77 5.275 8.232 12.466 8.232V6.079a1.025 1.025 0 0 1 1.644-.862l5.479 4.307a1.108 1.108 0 0 1 0 1.723l-5.48 4.307a1.026 1.026 0 0 1-1.643-.861v-2.154C5.275 13.616 4.248 19 4.248 19Z"/></svg>
                        Decline Interest
                    </button>
                <?php }else if($value->request_status=='accept'){ ?>
                    <button type="button" class=" mb-1 cta-dark bg-success">Interest Accepted</button>
                <?php }else if($value->request_status=='decline'){ ?>
                    <button type="button" class=" mb-1 cta-dark bg-danger">Interest Declined</button>
                <?php } ?>
            <?php } ?>

        <?php
        }
        ?>
        <button type="button" class=" cta-dark view-contact" style="background: magenta;" data-id="<?=encript($value->id)?>">
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="m17.0896 13.371 1.1431 1.1439c.1745.1461.3148.3287.4111.5349.0962.2063.1461.4312.1461.6588 0 .2276-.0499.4525-.1461.6587-.0963.2063-.4729.6251-.6473.7712-3.1173 3.1211-6.7739 1.706-9.90477-1.4254-3.13087-3.1313-4.54323-6.7896-1.41066-9.90139.62706-.61925 1.71351-1.14182 2.61843-.23626l1.1911 1.19193c1.1911 1.19194.3562 1.93533-.4926 2.80371-.92477.92481-.65643 1.72741 0 2.38391l1.8713 1.8725c.3159.3161.7443.4936 1.191.4936.4468 0 .8752-.1775 1.1911-.4936.8624-.8261 1.6952-1.6004 2.8382-.4565ZM14 8.98134l5.0225-4.98132m0 0L15.9926 4m3.0299.00002v2.98135"/></svg>
            View Contact
        </button>


    </div>
    <?php } ?>
</li>
<?php } ?>

<?php if(!empty($data['totalData'])){ ?>
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
<?php }else{ ?>
    <!-- <a class="btn btn-primary" href="<?=base_url('user/my-matches')?>">More</a> -->
<?php } ?>