<!--  Start Header Area -->
<?php include"include/header.php"; ?>
<!-- End Header Area -->

    <div class="hom-top login_style">

    <?php include"include/header-nav.php"; ?>


    <!-- REGISTER -->
    <section class="pt-80 pb-50">
        <div class="pg-faq">
            <div class="container">
              <div class="form-tit d-flex align-items-center">
                            <!-- <h4 class="mb-0 me-3">FAQ</h4> -->
                            <h1 class="mb-0 text-danger">Frequently asked questions</h1>
                        </div>
                <div class="row">
                    <div class="col-md-8 inn ab-faq-lhs">
                        
                        
                      <div class="accordion" id="accordionExample">
                        
                        <?php
                            $faqs = $db->table("faq")->where(["status"=>1,])->get()->getResult();
                            foreach ($faqs as $key => $value) {
                        ?>
                          <div class="accordion-item">
                            <h2 class="accordion-header">
                              <button class="accordion-button <?=$key==0?'':'collapsed'?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?=$key?>" aria-expanded="true" aria-controls="collapseOne<?=$key?>">
                                <?=$value->name?>
                              </button>
                            </h2>
                            <div id="collapseOne<?=$key?>" class="accordion-collapse <?=$key==0?'show':''?> collapse " data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                <p><?=$value->message?></p>
                              </div>
                            </div>
                          </div>
                        <?php } ?>



                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="prof-rhs-help" style="background-image:url('https://thoduneeda.com/images/slide1.jpg');">
                        <div class="inn">
                            <h3>Connect with Us!</h3>
                            
                            <div class="form-login">
                              <form class="contact-form__wrapper text-start form_data" method="POST" action="<?=base_url('contact-enquiry') ?>" enctype="multipart/form-data" novalidate id="contactPageForm">
                                  <input type="hidden" name="url" value="<?=(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
                                  <div class="form-group">
                                      <label class="lb">Name</label>
                                      <input type="text" class="form-control" placeholder="Enter your full name"
                                          name="name" required>
                                  </div>
                                  <div class="form-group">
                                      <label class="lb">Email</label>
                                      <input type="email" class="form-control" id="email"
                                          placeholder="Enter email" name="email">
                                  </div>
                                  <div class="form-group">
                                      <label class="lb">Phone</label>
                                      <input type="number" class="form-control" id="phone"
                                          placeholder="Enter phone number" name="phone" required>
                                  </div>
                                  <div class="form-group">
                                      <label class="lb">Location</label>
                                      <input type="text" class="form-control" id="city"
                                          placeholder="Enter city" name="city" required>
                                  </div>
                                  <div class="form-group">
                                      <label class="lb">I'm looking for</label>
                                      <select class="select" name="lookingFor" required>
                                          <option value="">Select</option>
                                          <option value="Groom">Groom</option>
                                          <option value="Bride">Bride</option>
                                      </select>
                                  </div>
                                  <!-- <div class="form-group form-check">
                                      <label class="form-check-label">
                                          <input class="form-check-input" type="checkbox" name="agree"> Creating
                                          an account means you’re okay with our <a href="#!">Terms of Service</a>,
                                          Privacy Policy, and our default Notification Settings.
                                      </label>
                                  </div> -->
                                  <button type="submit" class="cta-dark w-100">Send Message</button>
                              </form>
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
<?php include"include/footer.php"; ?>
<!-- End Footer Area -->    