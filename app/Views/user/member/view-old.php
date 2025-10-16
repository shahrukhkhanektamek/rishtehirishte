<!--  Start Header Area -->
<?php echo view("web/include/header.php"); ?>
<!-- End Header Area -->

    <div class="hom-top inner_style">

    <?php echo view("web/include/header-nav.php"); ?>


    <!-- PROFILE -->
    <section>
        <div class="profi-pg profi-ban">
            <div class="">
                <div class="">
                    <div class="profile">
                        <div class="pg-pro-big-im">
                            <div class="s1">
                                <img src="<?=image_check($row->image!='user.png'?:$row->images, 'user.png')?>" loading="lazy" class="pro" alt="image">
                            </div>
                            <div class="s3">
                                <a class="cta fol cta-chat send-interest" data-id="<?=encript($row->id)?>"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M4.248 19C3.22 15.77 5.275 8.232 12.466 8.232V6.079a1.025 1.025 0 0 1 1.644-.862l5.479 4.307a1.108 1.108 0 0 1 0 1.723l-5.48 4.307a1.026 1.026 0 0 1-1.643-.861v-2.154C5.275 13.616 4.248 19 4.248 19Z"/></svg>Send Intrest</a>
                                
                                <span class="cta cta-sendint view-contact" data-id="<?=encript($row->id)?>" data-toggle="modal" data-target="#sendInter"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="m17.0896 13.371 1.1431 1.1439c.1745.1461.3148.3287.4111.5349.0962.2063.1461.4312.1461.6588 0 .2276-.0499.4525-.1461.6587-.0963.2063-.4729.6251-.6473.7712-3.1173 3.1211-6.7739 1.706-9.90477-1.4254-3.13087-3.1313-4.54323-6.7896-1.41066-9.90139.62706-.61925 1.71351-1.14182 2.61843-.23626l1.1911 1.19193c1.1911 1.19194.3562 1.93533-.4926 2.80371-.92477.92481-.65643 1.72741 0 2.38391l1.8713 1.8725c.3159.3161.7443.4936 1.191.4936.4468 0 .8752-.1775 1.1911-.4936.8624-.8261 1.6952-1.6004 2.8382-.4565ZM14 8.98134l5.0225-4.98132m0 0L15.9926 4m3.0299.00002v2.98135"/></svg>View Contact</span>
                            </div>
                        </div>
                    </div>
                    <div class="profi-pg profi-bio">
                        <div class="lhs">
                            <div class="pro-pg-intro">
                                <h1><?=$row->name?></h1>
                                <div class="pro-info-status">
                                    <span class="stat-1 profile-page-id"><?=env('APP_SORT').'-'.$row->user_id?></span>
                                </div>
                                <ul>
                                    <li>
                                        <div>
                                            <img class="img-fluid" width="40px" src="https://cdn3d.iconscout.com/3d/premium/thumb/map-location-3d-icon-png-download-4615402.png" loading="lazy" alt="icon">
                                            <span>Country: <strong><?=$row->country_name?></strong></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img class="img-fluid" width="40px" src="https://cdn3d.iconscout.com/3d/premium/thumb/map-location-3d-icon-png-download-4615402.png" loading="lazy" alt="icon">
                                            <span>State: <strong><?=$row->state_name?></strong></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img class="img-fluid" width="40px" src="https://cdn3d.iconscout.com/3d/premium/thumb/calendar-3d-icon-png-download-5408392.png" loading="lazy" alt="icon">
                                            <span>Age: <strong><?=$row->age?></strong></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img class="img-fluid" width="40px" src="https://cdn3d.iconscout.com/3d/premium/thumb/measure-14353115-11525100.png" loading="lazy" alt="icon">
                                            <span>Height: <strong><?=$row->height?></strong></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img class="img-fluid" width="40px" src="https://cdn3d.iconscout.com/3d/premium/thumb/team-3d-icon-png-download-4466195.png" loading="lazy" alt="icon">
                                            <span>Religion: <strong><?=$row->religion_name?></strong></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img class="img-fluid" width="40px" src="https://cdn3d.iconscout.com/3d/premium/thumb/user-verification-3d-icon-png-download-5915194.png" loading="lazy" alt="icon">
                                            <span>Gender: <strong><?=$row->gender_name ?></strong></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img class="img-fluid" width="40px" src="https://cdn3d.iconscout.com/3d/premium/thumb/wedding-couple-showing-and-looking-wedding-ring-3d-icon-png-download-8624967.png" loading="lazy" alt="icon">
                                            <span>Marital Status: <strong><?=$row->maritalstatus ?></strong></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="pr-bio-c pr-bio-abo">
                                <h3>Express Myself</h3>
                                <p><?=$row->expressyou?></p>
                            </div>
                            
                           
                            <div class="pr-bio-c pr-bio-gal" id="gallery">
                                <h3>Photo gallery</h3>
                                <div id="image-gallery">
                                    <?php 
                                    $images = [];
                                    if(!empty(json_decode(@$row->images)))
                                        $images = json_decode(@$row->images);
                                    foreach ($images as $key => $value) {
                                    ?>
                                        <div class="pro-gal-imag">
                                            <div class="img-wrapper">
                                                <a href="<?=image_check($value->image_path)?>" data-fancybox="gallery"><img src="<?=image_check($value->image_path)?>" class="img-responsive" alt=""></a>
                                            </div>
                                        </div>
                                    <?php } ?>                                    
                                </div>
                            </div>
                           


                            <div class="pr-bio-c pr-bio-info">
                                <h3>Education & Profession</h3>
                                <ul class="style100">
                                    <?php
                                    $educations = $db->table("education")->where(["id"=>$row->highestdegree,])->get()->getFirstRow();
                                    $occupations = $db->table("occupation")->where(["id"=>$row->occupation,])->get()->getFirstRow();
                                    ?>
                                    <li><b>Highest Degree</b> : <?=@$educations->name?></li>
                                    <li><b>Collage Name</b> : <?=$row->collegename?></li>
                                    <li><b>Occupation</b> : <?=@$occupations->name?></li>
                                    <li><b>Annual Income</b> : <?=@$row->annualincome?></li>
                                    <li><b>Annual Incom ( In $)</b> : <?=$row->annualincomeindoller?></li>
                                    <li><b>Diet</b> : <?=@$row->diet?></li>
                                </ul>
                            </div>
                            
                            
                            <!-- Lifestyle & Family ABOUT -->
                            <div class="pr-bio-c pr-bio-info">
                                <h3>Lifestyle & Family</h3>
                                <ul class="style100">
                                    <?php
                                    $fatheroccupations = $db->table("occupation")->where(["id"=>$row->father_occupation,])->get()->getFirstRow();
                                    $motheroccupations = $db->table("occupation")->where(["id"=>$row->mother_occupation,])->get()->getFirstRow();
                                    ?>

                                    <li><b>Family Type</b> : <?=$row->family_type?></li>
                                    <li><b>Father's Name</b> : <?=$row->father_name?></li>
                                    <li><b>Father's Occupation</b> : <?=@$fatheroccupations->name?></li>
                                    <li><b>Father's Annual Income</b> : <?=@$row->father_annualincome?></li>
                                    <li><b>Mother's Name</b> : <?=$row->mother_name?></li>
                                    <li><b>Mother's Occupation</b> : <?=@$motheroccupations->name?></li>
                                    <li><b>Mother Annual Income</b> : <?=$row->mother_annualincome?></li>
                                    <li><b>Brothers Married / Brothers Unmarried</b> : <?=$row->brother_married?>/<?=$row->brother_unmarried?></li>
                                    <li><b>Sister Married / Sister Unmarried</b> : <?=$row->sister_married?>/<?=$row->sister_unmarried?></li>
                                </ul>
                            </div>
                            <div class="pr-bio-c pr-bio-hob">
                                <h3>About Family</h3>
                                <p><?=$row->aboutfamily?></p>
                            </div>
                            <!-- END Lifestyle & Family ABOUT -->



                            <!-- Requirement for partner ABOUT -->
                            <div class="pr-bio-c pr-bio-info">
                                <h3>Requirement for partner</h3>
                                <ul class="style100">
                                   
                                    <?php
                                        $educations = $db->table("education")->where(["id"=>$row->highestdegree,])->get()->getFirstRow();
                                        $occupations = $db->table("occupation")->where(["id"=>$row->occupation,])->get()->getFirstRow();
                                        
                                        $religionNames = '';
                                        if(is_array(json_decode(@$rowR->religion)) || is_object(json_decode(@$rowR->religion)))
                                        $religions2 = $db->table("religion")->whereIn("id", json_decode(@$rowR->religion))->get()->getResult();
                                        if(!empty($religions2))
                                        {
                                            foreach ($religions2 as $key => $value) {
                                                $religionNames .= '<span class="badge btn btn-success m-1 mt-0 mb-0">'.$value->name.'</span>';
                                            }
                                        }

                                        $casteNames = '';
                                        if(is_array(json_decode(@$rowR->caste)) || is_object(json_decode(@$rowR->caste)))
                                            $castes2 = $db->table("caste")->whereIn("id", json_decode(@$rowR->caste))->get()->getResult();
                                            if(!empty($castes2))
                                            {
                                                foreach ($castes2 as $key => $value) {
                                                $casteNames .= '<span class="badge btn btn-success m-1 mt-0 mb-0">'.$value->name.'</span>';
                                            }
                                        }

                                        $maritalstatusNames = '';
                                        foreach (marital_status() as $key => $value) {
                                            $selected = '';
                                            $selectedCheck = json_decode(@$rowR->maritalstatus);
                                            if(!empty($selectedCheck))
                                            {
                                                if(in_array($value, $selectedCheck))
                                                    $maritalstatusNames .= '<span class="badge btn btn-success m-1 mt-0 mb-0">'.$value.'</span>';
                                            }
                                        }

                                        $mangliknames = '';
                                        foreach (manglik() as $key => $value) {
                                            $selected = '';
                                            $selectedCheck = json_decode(@$rowR->manglik);
                                            if(!empty($selectedCheck))
                                            {
                                                if(in_array($value, $selectedCheck))
                                                    $mangliknames .= '<span class="badge btn btn-success m-1 mt-0 mb-0">'.$value.'</span>';
                                            }
                                        }

                                        $educations2Name = '';
                                        if(is_array(json_decode(@$rowR->education)) || is_object(json_decode(@$rowR->education)))
                                            $educations2 = $db->table("education")->whereIn("id", json_decode(@$rowR->education))->get()->getResult();
                                            if(!empty($educations2))
                                            {
                                                foreach ($educations2 as $key => $value) {
                                                $educations2Name .= '<span class="badge btn btn-success m-1 mt-0 mb-0">'.$value->name.'</span>';
                                            }
                                        }

                                        $occupations2Name = '';
                                        if(is_array(json_decode(@$rowR->occupation)) || is_object(json_decode(@$rowR->occupation)))
                                            $occupations2 = $db->table("occupation")->whereIn("id", json_decode(@$rowR->occupation))->get()->getResult();
                                            if(!empty($occupations2))
                                            {
                                                foreach ($occupations2 as $key => $value) {
                                                $occupations2Name .= '<span class="badge btn btn-success m-1 mt-0 mb-0">'.$value->name.'</span>';
                                            }
                                        }

                                        $countries2Name = '';
                                        if(is_array(json_decode(@$rowR->country)) || is_object(json_decode(@$rowR->country)))
                                            $countries2 = $db->table("countries")->whereIn("id", json_decode(@$rowR->country))->get()->getResult();
                                            if(!empty($countries2))
                                            {
                                                foreach ($countries2 as $key => $value) {
                                                $countries2Name .= '<span class="badge btn btn-success m-1 mt-0 mb-0">'.$value->name.'</span>';
                                            }
                                        }

                                        $states2Name = '';
                                        if(is_array(json_decode(@$rowR->state)) || is_object(json_decode(@$rowR->state)))
                                            $states2 = $db->table("states")->whereIn("id", json_decode(@$rowR->state))->get()->getResult();
                                            if(!empty($states2))
                                            {
                                                foreach ($states2 as $key => $value) {
                                                $states2Name .= '<span class="badge btn btn-success m-1 mt-0 mb-0">'.$value->name.'</span>';
                                            }
                                        }
                                        $challengedName = '';
                                        foreach (challenged() as $key => $value) {$selected = '';
                                            $selectedCheck = json_decode(@$rowR->challenged);
                                            if(!empty($selectedCheck))
                                            {
                                                if(in_array($value, $selectedCheck))
                                                    $challengedName .= '<span class="badge btn btn-success m-1 mt-0 mb-0">'.$value.'</span>';
                                            }
                                        } 

                                    ?>
                                    

                                    <li><b>Age</b> : <?=$rowR->agestart.' To '.$rowR->ageend?></li>
                                    <li><b>Height</b> : <?=$rowR->heightstart.' To '.$rowR->heightend?></li>
                                    <li><b>Have Children? </b> : <?=@$rowR->children?></li>
                                    <li><b>Income</b> : <?=$rowR->income.' To '.$rowR->incomeend?></li>
                                    <li><b>Income ($)</b> : <?=$rowR->incomedollar.' To '.$rowR->incomeenddollar?></li>
                                    <li><b>Religion </b> : <?=$religionNames?></li>
                                    <li><b>Caste </b> : <?=@$casteNames?></li>
                                    <li><b>Marital Status </b> : <?=@$maritalstatusNames?></li>
                                    <li><b>Manglik  </b> : <?=@$mangliknames?></li>
                                    <li><b>Education  </b> : <?=@$educations2Name?></li>
                                    <li><b>Occupation  </b> : <?=@$occupations2Name?></li>
                                    <li><b>Country  </b> : <?=@$countries2Name?></li>
                                    <li><b>State  </b> : <?=@$states2Name?></li>
                                    <li><b>Challenged  </b> : <?=@$challengedName?></li>
                                    
                                </ul>
                            </div>
                            <div class="pr-bio-c pr-bio-hob">
                                <h3>Other Requirements</h3>
                                <p><?=$rowR->otherrequirements?></p>
                            </div>
                            <!-- END Requirement for partner ABOUT -->



                           


                        </div>

                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END PROFILE -->

<!--  Start Footer Area -->
<?php echo view("web/include/footer.php"); ?>
<!-- End Footer Area -->    