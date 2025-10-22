
<div class="row">

    <div class="col-12 text-center">

        <div class="avatar-wrap" aria-hidden="true">
            <div class="avatar">
              <!-- replace src with your avatar -->
              <img src="<?=image_check($member->image,'user.png') ?>" alt="User avatar">
            </div>            
        </div>

        <h2 id="modalTitle"><?=$member->name?></h2>

        <a class="btn" role="button" style="font-size: 20px;font-weight: 900;padding: 7px 0;margin: 0;" href="tel:<?=$member->phone?>">
            <i class="fa fa-phone-volume"></i> <?=$member->phone ?>                
        </a>
        <a class="btn mt-2" role="button" style="font-size: 20px;font-weight: 900;padding: 7px 0;" href="mailto:<?=$member->email?>">
            <i class="fa fa-envelope"></i> <?=$member->email ?>                
        </a>
        
    </div>
</div>