
<div class="row">

    <div class="col-12 text-center">

        <div class="avatar-wrap" aria-hidden="true">
            <div class="avatar">
              <!-- replace src with your avatar -->
              <img src="<?=image_check($member->image,'user.png') ?>" alt="User avatar">
            </div>            
        </div>

        <?php if($member->is_mobile_show==0){ ?>
            <h2 id="modalTitle"><?=$member->name?> has chosen to keep <?=$member->gender==1?'him':'her'?> contact number hide</h2>
        <?php }else{ ?>
            <h2 id="modalTitle"><?=$member->name?></h2>
        <?php } ?>

        <?php if($member->is_mobile_show==1){ ?>
            <a class="btn" role="button" style="font-size: 20px;font-weight: 900;padding: 7px 0;margin: 0;" href="tel:<?=$member->phone?>">
                <i class="fa fa-phone-volume"></i> <?=$member->phone ?>
            </a>
        <?php } ?>


        <?php if($member->is_mobile_show==1 || $viewType==1){ ?>
            <a class="btn mt-2" role="button" style="font-size: 20px;font-weight: 900;padding: 7px 0;" href="mailto:<?=$member->email?>">
                <i class="fa fa-envelope"></i> <?=$member->email ?>                
            </a>
        <?php } ?>
        <br>

        <?php if($member->is_mobile_show==0 && $viewType==0){ ?>
            <a class="view-contact" style="cursor: pointer;font-size: 17px;margin: -15px 0 -25px 0;display: block;" data-id="<?=encript($member->id)?>" data-type='1'><b>View email address</b></a><br>
            1 contact view will be deducted (<?=$check_any_active_plan['remaining']?> left)
        <?php } ?>

        
    </div>
</div>