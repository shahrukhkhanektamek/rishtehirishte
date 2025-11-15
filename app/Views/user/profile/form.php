<?php $user = get_user(); ?>
<!--  Start Header Area -->
<?php echo view("web/include/header.php"); ?>
<!-- End Header Area -->

    <div class="hom-top login_style">

    <?php echo view("web/include/header-nav.php"); ?>

    <?php echo view("web/include/dashboard-nav.php"); ?>

                        </div>
                    </div>
                    <div class="col-md-8 col-lg-9">
                        <div class="row">
                            <div class="col-md-12 db-sec-com">
                                <h2 class="db-tit">Profile settings</h2>
                                <div class="col7 fol-set-rhs">
                                    <!--START-->
                                    <div class="ms-write-post fol-sett-sec sett-rhs-pro">
                                        <!-- <div class="foll-set-tit fol-pro-abo-ico">
                                            <h4>Profile</h4>
                                        </div> -->
                                        <div class="fol-sett-box">
                                            <ul>
                                                <li>
                                                    <div class="sett-lef">
                                                        <div class="auth-pro-sm sett-pro-wid">
                                                            <div class="auth-pro-sm-img">
                                                                <img src="https://ik.imagekit.io/9sqym9p8y/@inabilansari/profile-square.svg" loading="lazy" alt="user_profile" loading="lazy">
                                                            </div>
                                                            <div class="auth-pro-sm-desc">
                                                                <h5><?=$user->name?></h5>
                                                                <p><?=env('APP_SORT').'-'.$user->user_id?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sett-rig">
                                                        <a class="set-sig-out logout">Sign Out</a>
                                                    </div>
                                                </li>
                                                <li class="d-none">
                                                    <div class="sett-lef">
                                                        <div class="sett-rad-left">
                                                            <h5>Profile visible</h5>
                                                            <p>You can set-up who can able to view your profile.</p>
                                                        </div>
                                                    </div>
                                                    <div class="sett-rig">
                                                        <div class="sett-select-drop">
                                                            <select>
                                                              <option value="All users">All users</option>
                                                              <option value="Premium">Premium</option>
                                                              <option value="Free">Free</option>
                                                              <option value="Free">No-more visible(You can't visible, so no one can view your profile)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="d-none">
                                                    <div class="sett-lef">
                                                        <div class="sett-rad-left">
                                                            <h5>Who can send you Interest requests?</h5>
                                                            <p>You can set-up who can able to make Interest request here.</p>
                                                        </div>
                                                    </div>
                                                    <div class="sett-rig">
                                                        <div class="sett-select-drop">
                                                            <select>
                                                                <option value="All users">All users</option>
                                                                <option value="Premium">Premium</option>
                                                                <option value="Free">Free</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>


<div class="row justify-content-between mt-5">
    <div class="col-md-3">
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a type="button" class="btn-step btn-circle">1</a>
                    <p><span>Step 1</span> Basic Detail</p>
                </div>
                <div class="stepwizard-step">
                    <a type="button" class="btn-default btn-circle" disabled="disabled">2</a>
                    <p><span>Step 2</span> Profile Detail</p>
                </div>
                <div class="stepwizard-step">
                    <a type="button" class="btn-default btn-circle" disabled="disabled">3</a>
                    <p><span>Step 3</span> Education & Profession</p>
                </div>
                <div class="stepwizard-step">
                    <a type="button" class="btn-default btn-circle" disabled="disabled">4</a>
                    <p><span>Step 4</span> Lifestyle & Family</p>
                </div>
                <div class="stepwizard-step">
                    <a type="button" class="btn-default btn-circle" disabled="disabled">5</a>
                    <p><span>Step 5</span> Requirement for partner</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">

        <div class="row setup-content" id="step-1">
            <?php echo view("user/profile/steps/step1") ?>        
        </div>
        <div class="row setup-content" id="step-2">
            <?php echo view("user/profile/steps/step2") ?>
        </div>
        <div class="row setup-content" id="step-3">
            <?php echo view("user/profile/steps/step3") ?>
        </div>
        <div class="row setup-content" id="step-4">
            <?php echo view("user/profile/steps/step4") ?>
        </div>
        <div class="row setup-content" id="step-5">
            <?php echo view("user/profile/steps/step5") ?>
        </div>

    </div>

</div>

                                    </div>
                                    <!--END-->	
                                   						
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->
<!--  Start Footer Area -->
<?php echo view("web/include/footer.php"); ?>
<script>showStep(currentStep);</script>

<script>
   var maritalstatusstep2 = $('select[name="maritalstatus"]');
var havechildrenstep2 = $('select[name="havechildren"]');

$(document).on("change", maritalstatusstep2, function(e) {
    setHideShowFliedsstep2();
});

function setHideShowFliedsstep2() {
    if (maritalstatusstep2.val() === 'Never Married') {
        havechildrenstep2.parent().hide();
    } else {
        havechildrenstep2.parent().show();            
    }
}
setHideShowFliedsstep2();
</script>



<script>
    var maritalstatusR = $('select[name="maritalstatusR[]"]');
    var havechildrenR = $('select[name="childrenR"]');

    $(document).on("change", maritalstatusR ,(function(e) {
        setHideShowFliedsR();
    }));

    function setHideShowFliedsR() {
        if($(maritalstatusR).val().includes('Never Married'))
        {
            $(havechildrenR).parent().hide();
        }
        else
        {
            $(havechildrenR).parent().show();            
        }
    }
    setHideShowFliedsR();
</script>

<!-- End Footer Area --> 