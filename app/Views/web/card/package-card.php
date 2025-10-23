<div class="plans-main pb-70">
    <div class="container">
        <div class="row">
            <ul>
               <?php
                    $packages = $db->table("package")->where(["status"=>1,])->orderBy('id','desc')->get()->getResult();
                    foreach ($packages as $key => $value) {
                ?>
                    <li>
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
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>