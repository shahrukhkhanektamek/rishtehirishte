<div class="plans-main pb-70">
    <div class="container">
        <div class="row">
            
               <?php
                    $packages = $db->table("package")->where(["status"=>1,"type"=>1,])->orderBy('id','asc')->get()->getResult();
                    foreach ($packages as $key => $value) {
                ?>
                    <div class="col-4 plans-main-li">
                        <div class="pri-box">
                            <div class="row align-items-end">
                                <div class="col-12">
                                    <h2 class="text-center"><?=$value->name ?></h2>
                                </div>
                                <div class="col-12">
                                    <span class="pri-cou text-end"><b><?=price_formate($value->price)?></b>
                                        <span style="font-size: 15px;color: white;">/<?=$value->validity?> Month </span>
                                    </span>
                                </div>
                            </div>
                            <a href="<?=base_url("payment/create-transaction")?>?p_id=<?=encript($value->id)?>&type=1" class="cta" style="cursor: pointer;" data-id="<?=encript($value->id)?>">Get Started</a>
                            <div class="plans-description">
                                <?=$value->full_description ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>



                <?php $packages = $db->table("package")->where(["status"=>1,"type"=>2,])->orderBy('id','asc')->get()->getResult(); ?>
                <?php if(!empty($packages)){ ?>
                    <h2>RM ASSISTANCE PLAN -- <b>Premium | Personalised | Confidential Matrimonial services</b></h2>
                    <?php foreach ($packages as $key => $value) { ?>
                        <div class="col-4 plans-main-li">
                            <div class="pri-box">
                                <div class="row align-items-end">
                                    <div class="col-12">
                                        <h2 class="text-center"><?=$value->name ?></h2>
                                    </div>
                                    <div class="col-12">
                                        <span class="pri-cou text-end"><b><?=price_formate($value->price)?></b>
                                            <span style="font-size: 15px;color: white;">/<?=$value->validity?> Month </span>
                                        </span>
                                    </div>
                                </div>
                                <a href="<?=base_url("payment/create-transaction")?>?p_id=<?=encript($value->id)?>&type=1" class="cta" style="cursor: pointer;" data-id="<?=encript($value->id)?>">Get Started</a>
                                <div class="plans-description">
                                    <?=$value->full_description ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            
        </div>
    </div>
</div>