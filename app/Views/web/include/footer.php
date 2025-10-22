<?php
$contact_detail = json_decode($db->table('setting')->getWhere(["name"=>'main',])->getRow()->data);
?>
 <!-- FOOTER -->
    <section class="wed-hom-footer" style="background-image:url('https://images.pexels.com/photos/11484514/pexels-photo-11484514.jpeg?_gl=1*1n82qd7*_ga*MTI5MzkzNzAwNS4xNzU1MjM0NTcw*_ga_8JE65Q40S6*czE3NTUyMzQ1NjkkbzEkZzEkdDE3NTUyMzQ5MDIkajIkbDAkaDA.')">
        <div class="container">
            <!-- <div class="row foot-supp">
                <h2><span>Free support:</span> +92 (8800) 68 - 8960 &nbsp;&nbsp;|&nbsp;&nbsp; <span>Email:</span>
                    info@example.com</h2>
            </div> -->
            <div class="row justify-content-center wed-foot-link wed-foot-link-1">
                <div class="col-md-4">
                    <h4>Get In Touch</h4>
                    <p class="mb-1">Address: Janak Puri, New Delhi - 110058</p>
                    <p class="mb-1"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24">  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="m17.0896 13.371 1.1431 1.1439c.1745.1461.3148.3287.4111.5349.0962.2063.1461.4312.1461.6588 0 .2276-.0499.4525-.1461.6587-.0963.2063-.4729.6251-.6473.7712-3.1173 3.1211-6.7739 1.706-9.90477-1.4254-3.13087-3.1313-4.54323-6.7896-1.41066-9.90139.62706-.61925 1.71351-1.14182 2.61843-.23626l1.1911 1.19193c1.1911 1.19194.3562 1.93533-.4926 2.80371-.92477.92481-.65643 1.72741 0 2.38391l1.8713 1.8725c.3159.3161.7443.4936 1.191.4936.4468 0 .8752-.1775 1.1911-.4936.8624-.8261 1.6952-1.6004 2.8382-.4565ZM14 8.98134l5.0225-4.98132m0 0L15.9926 4m3.0299.00002v2.98135"/></svg> 
                        <?php foreach (json_decode($contact_detail->mobile)?json_decode($contact_detail->mobile):[] as $key => $value) { ?>
                            <?php if($key>0)echo ", "; ?><a href="tel:<?=$value?>"><?=$value ?></a>
                        <?php } ?>
                    </p>
                    <p class="mb-0"><svg style="position:relative;top:-2px;" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M21 8v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8m18 0-8.029-4.46a2 2 0 0 0-1.942 0L3 8m18 0-9 6.5L3 8"/></svg> 
                        <?php 
                        foreach (($contact_detail->email)?($contact_detail->email):[] as $key => $value) { ?>
                            <?php if($key>0)echo ", "; ?><a href="mailto:<?=$value?>"><?=$value ?></a>
                        <?php } ?>
                    </p>
                </div>
                <div class="col-md-4">
                    <h4>HELP &amp; SUPPORT</h4>
                    <ul>
                        <li><a href="<?=base_url()?>about.php">About company</a></li>
                        <li><a href="<?=base_url()?>contact.php">Contact us</a></li>
                        <li><a href="<?=base_url()?>clients.php">Our Clients</a></li>
                        <li><a href="<?=base_url()?>blog">Blog</a></li>
                        <li><a href="<?=base_url()?>service">Services</a></li>
                        <li><a href="<?=base_url()?>packages.php">Packages</a></li>
                        <li><a href="<?=base_url()?>login.php">Login</a></li>
                        <li><a href="<?=base_url()?>register.php">Register</a></li>
                    </ul>
                </div>
                <div class="col-md-3 fot-soc">
                    <h4>SOCIAL MEDIA</h4>
                    <ul>
                        <li><a class="facebook" target="_blank" href="<?=$contact_detail->facebook?>"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" style="position:relative;top:-2px;" width="18" height="18" fill="white" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z" clip-rule="evenodd"/></svg></a></li>
                        <li><a class="twitter" target="_blank" href="<?=$contact_detail->twitter?>"><i class="fa-brands fa-x-twitter"></i></a></li>
                        <li><a class="instagram" target="_blank" href="<?=$contact_detail->instagram?>"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a class="linkedin" target="_blank" href="<?=$contact_detail->linkedin?>"><i class="fa-brands fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>
            
            <div class="cr py-3">
                <ul class="btm_ftr_link">
                    <li><a href="<?=base_url('term-condition') ?>">Terms & Conditions</a></li>
                    <li><a href="<?=base_url('privacy-policy')?>">Privacy Policy</a></li>
                    <li><a href="<?=base_url('refund-policy')?>">Refund Policy</a></li>
                    <li><a href="<?=base_url('disclaimer')?>">Disclaimer</a></li>
                    <li><a href="faqs.php">FAQ's</a></li>
                </ul>
                <div class="row">
                    <p>Copyright ©2023 <span>Rishte Hi Rishte.</span> All rights reserved.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <div class="floating_btn">
        <a class="blink" href="#enquiryNow" data-bs-toggle="modal" data-bs-target="#enquiryModal">
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 10.5h.01m-4.01 0h.01M8 10.5h.01M5 5h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1h-6.6a1 1 0 0 0-.69.275l-2.866 2.723A.5.5 0 0 1 8 18.635V17a1 1 0 0 0-1-1H5a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z"/></svg> Get Enquire
        </a>
    </div>

<!-- Enquiry Modal -->
<div class="modal fade" id="enquiryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="row gy-2">
                <div class="col-lg-12">
                    <div class="modal-img">
                        <div class="ad-content text-start">
                            <div class="">
                                <h4>Connect With Us!</h4>
                                <p>Personalized Matchmaking | Safe & Secure Services | 100% Privacy</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">                        
                    <div class="content-body">
                        <form class="contact-form__wrapper form_data" method="POST" action="<?=base_url('contact-enquiry') ?>" enctype="multipart/form-data" novalidate id="contactModalForm">
                            <input type="hidden" name="url" value="<?=(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
                            <div class="modal-header">
                                <!-- <p class="mb-0" style="line-height:1.35;">Contact our support team for quick and friendly assistance.</p> -->
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body pt-1">
                                <div class="row gx-2">
                                    <div class="col-md-12">
                                        <div class="contact-form__input style_modal">
                                            <label>Candidate name <span>*</span></label>
                                            <input class="form-control" type="text" name="name" placeholder="" required="">
                                            <span class="icon far fa-user"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="contact-form__input style_modal">
                                            <label>Email addess <span>*</span></label>
                                            <input class="form-control" type="email" name="email" placeholder="" >
                                            <span class="icon far fa-envelope"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="contact-form__input style_modal">
                                            <label>Phone number <span>*</span></label>
                                            <input class="form-control" type="number" name="phone" placeholder="" required="">
                                            <span class="icon fa-solid fa-phone"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="contact-form__input style_modal">
                                            <label>Your location <span>*</span></label>
                                            <input class="form-control" type="text" name="city" placeholder="" required="">
                                            <span class="icon fa-solid fa-map-marker"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="contact-form__input style_modal">
                                            <label>I'm looking for <span>*</span></label>
                                            <select class="select" name="lookingFor" required>
                                                <option value="">Select</option>
                                                <option value="Groom">Groom</option>
                                                <option value="Bride">Bride</option>
                                            </select>
                                            <span class="icon fa-solid fa-female"></span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="cta-dark" style="opacity:0.4;" data-bs-dismiss="modal"><i class="fa-solid fa-times me-1"></i>Close</button>
                                <button type="submit" class="cta-dark">Send query <i class="fa-solid fa-long-arrow-right ms-1"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Enquiry Success Modal -->
<div class="modal fade" id="enquirySuccessModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="successLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content text-center border-0 shadow-lg" style="overflow:hidden; border-radius:14px;">
      
      <div class="modal-header border-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body py-4">
        
        <!-- Success Animation -->
        <div class="success-wrap mx-auto mb-3">
          <svg class="check" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
            <circle cx="32" cy="32" r="28"/>
            <path d="M19 33 L28.5 42.5 L46 24"/>
          </svg>
        </div>

        <h4 class="fw-semibold mb-2 text-success">Enquiry Sent Successfully!</h4>
        <p class="text-muted mb-0">
          Thank you for connecting with us. <br> Our team will get back to you shortly.
        </p>

      </div>

      <div class="modal-footer border-0 justify-content-center pb-4">
        <button type="button" class="btn btn-success px-4" data-bs-dismiss="modal">
          <i class="fa-solid fa-check me-1"></i> OK
        </button>
      </div>
    </div>
  </div>
</div>
<style>
  .modal .success-wrap {
    width: 100px;
    height: 100px;
    background: linear-gradient(135deg, #ecfdf5, #ffffff);
    border-radius: 50%;
    display: grid;
    place-items: center;
    box-shadow: 0 8px 25px rgba(16,185,129,0.15);
    position: relative;
    animation: popIn 0.6s ease;
  }

  @keyframes popIn {
    0% { transform: scale(0.4); opacity: 0; }
    60% { transform: scale(1.1); opacity: 1; }
    100% { transform: scale(1); }
  }

  .modal svg.check {
    width: 70px;
    height: 70px;
  }
  .modal svg circle {
    fill: none;
    stroke: #10b981;
    stroke-width: 4;
    stroke-linecap: round;
    stroke-linejoin: round;
    stroke-dasharray: 220;
    stroke-dashoffset: 220;
    animation: drawCircle 0.7s ease forwards;
  }
  .modal svg path {
    fill: none;
    stroke: #064e3b;
    stroke-width: 4.5;
    stroke-linecap: round;
    stroke-linejoin: round;
    stroke-dasharray: 48;
    stroke-dashoffset: 48;
    animation: drawTick 0.4s ease 0.5s forwards;
  }

  @keyframes drawCircle {
    to { stroke-dashoffset: 0; }
  }
  @keyframes drawTick {
    to { stroke-dashoffset: 0; }
  }
</style>






<div id='whatsapp-chat' class='hide'>
  <div class='header-chat'>
    <div class='head-home'>
      <div class='info-avatar'><img src='<?=base_url() ?>images/logo.webp' loading="lazy" alt="logo" /></div>
      <p><span class="whatsapp-name"><?=env('APP_NAME')?></span><br><small>Online</small></p>

    </div>
    <div class='get-new hide'>
      <div id='get-label'></div>
      <div id='get-nama'></div>
    </div>
  </div>
  <div class='home-chat'>

  </div>
  <div class='start-chat'>
    <div class="WhatsappChat__Component-sc-1wqac52-0 whatsapp-chat-body">
      <div class="WhatsappChat__MessageContainer-sc-1wqac52-1 dAbFpq">
        <div style="opacity: 0;" class="WhatsappDots__Component-pks5bf-0 eJJEeC">
          <div class="WhatsappDots__ComponentInner-pks5bf-1 hFENyl">
            <div class="WhatsappDots__Dot-pks5bf-2 WhatsappDots__DotOne-pks5bf-3 ixsrax"></div>
            <div class="WhatsappDots__Dot-pks5bf-2 WhatsappDots__DotTwo-pks5bf-4 dRvxoz"></div>
            <div class="WhatsappDots__Dot-pks5bf-2 WhatsappDots__DotThree-pks5bf-5 kXBtNt"></div>
          </div>
        </div>
        <div style="opacity: 1;" class="WhatsappChat__Message-sc-1wqac52-4 kAZgZq">
          <div class="WhatsappChat__Author-sc-1wqac52-3 bMIBDo"><?=env('APP_NAME')?></div>
          <div class="WhatsappChat__Text-sc-1wqac52-2 iSpIQi">Hi there 👋<br>How can I help you?</div>
          <div class="WhatsappChat__Time-sc-1wqac52-5 cqCDVm">1:40</div>
        </div>
      </div>
    </div>

    <div class='blanter-msg'>
      <textarea id='chat-input' placeholder='Write a response' maxlength='120' row='1'></textarea>
      <a href='javascript:void;' id='send-it'><svg viewBox="0 0 448 448">
          <path d="M.213 32L0 181.333 320 224 0 266.667.213 416 448 224z" />
        </svg></a>

    </div>
  </div>
  <div id='get-number'></div><a class='close-chat' href='javascript:void' aria-label="close">×</a>
</div>
<a class='blantershow-chat' href='javascript:void' title='Show Chat'><svg width="38" viewBox="0 0 24 24">
    <defs />
    <path fill="#FFFFFF" d="M20.5 3.4A12.1 12.1 0 0012 0 12 12 0 001.7 17.8L0 24l6.3-1.7c2.8 1.5 5 1.4 5.8 1.5a12 12 0 008.4-20.3z" />
    <path fill="#4caf50" d="M12 21.8c-3.1 0-5.2-1.6-5.4-1.6l-3.7 1 1-3.7-.3-.4A9.9 9.9 0 012.1 12a10 10 0 0117-7 9.9 9.9 0 01-7 16.9z" />
    <path fill="#FFFFFF" d="M17.5 14.3c-.3 0-1.8-.8-2-.9-.7-.2-.5 0-1.7 1.3-.1.2-.3.2-.6.1s-1.3-.5-2.4-1.5a9 9 0 01-1.7-2c-.3-.6.4-.6 1-1.7l-.1-.5-1-2.2c-.2-.6-.4-.5-.6-.5-.6 0-1 0-1.4.3-1.6 1.8-1.2 3.6.2 5.6 2.7 3.5 4.2 4.2 6.8 5 .7.3 1.4.3 1.9.2.6 0 1.7-.7 2-1.4.3-.7.3-1.3.2-1.4-.1-.2-.3-.3-.6-.4z" />
  </svg>
 </a>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="<?=base_url()?>js/jquery.min.js"></script> -->
    <script src="<?=base_url()?>js/popper.min.js"></script>
    <script src="<?=base_url()?>js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>js/select-opt.js"></script>
    <script src="<?=base_url()?>js/slick.js"></script>
    <script src="<?=base_url()?>js/custom.js"></script>
    <script src="<?=base_url()?>js/wizard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.0/dist/fancybox/fancybox.umd.js"></script>

    <script src="<?=base_url('public/')?>/toast/saber-toast.js"></script>
    <script src="<?=base_url('public/')?>/toast/script.js"></script>
    <script src="<?=base_url('public/')?>/assetsadmin/select2/js/select2.full.min.js"></script>


<script>
    $(".ui-sortable").sortable();

    $("select").select2();
    $('.tags').select2({
      tags: true,
      tokenSeparators: ['||', '\n']
    });

    

    $(".upload-single-image").on('change', function(){
      var files = [];
      var j=1;
      var upload_div = $(this).data("target");
      var name = $(this).data('name');
                console.log(upload_div);
      $( "."+upload_div ).empty();
        for (var i = 0; i < this.files.length; i++)
        {
            if (this.files && this.files[i]) 
            {
                var reader = new FileReader();
                reader.onload = function (e) {
                $('.'+upload_div).attr("src",e.target.result);
                j++;
            }
            reader.readAsDataURL(this.files[i]);
        }
      }      
    });

      let currentStep = 1;
      const totalSteps = 5;
      function showStep(step) {
          // hide all steps
          document.querySelectorAll(".setup-content").forEach(el => el.classList.add("d-none"));
          // show current step
          document.getElementById("step-" + step).classList.remove("d-none");

          // update step indicator
          document.querySelectorAll(".stepwizard-step a").forEach((btn, index) => {
              if (index + 1 < step) {
                  btn.classList.remove("btn-default");
                  btn.classList.add("btn-step");
              } else if (index + 1 === step) {
                  btn.classList.remove("btn-default");
                  btn.classList.add("active-step");
              } else {
                  btn.classList.remove("btn-step", "active-step");
                  btn.classList.add("btn-default");
              }
          });
      }

      // Next Button
      document.querySelectorAll(".nextBtn").forEach(btn => {
          btn.addEventListener("click", () => {
              if (currentStep < totalSteps) {
                  currentStep++;
                  showStep(currentStep);
              }
          });
      });

      // Previous Button
      document.querySelectorAll(".prevBtn").forEach(btn => {
          btn.addEventListener("click", () => {
              if (currentStep > 1) {
                  currentStep--;
                  showStep(currentStep);
              }
          });
      });

      // Step click (circle buttons)
      document.querySelectorAll(".stepwizard-step a").forEach((btn, index) => {
          btn.addEventListener("click", () => {
              currentStep = index + 1;
              showStep(currentStep);
          });
      });

      // Finish Button
      const finishBtn = document.querySelector(".finishBtn");
      if (finishBtn) {
          finishBtn.addEventListener("click", () => {
              alert("All steps completed!");
          });
      }

      // show first step on load
      // showStep(currentStep);


    $('.country').select2({
      ajax: {
        url: "<?=base_url(route_to('search-country'))?>",
        method:"post",
        "headers": {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
       },
        data: function (params) {
          var query = {
            search: params.term,
            type: 'public'
          }

          // Query parameters will be ?search=[term]&type=public
          return query;
        }
      }
    });
    $('.state').select2({
      ajax: {
        url: "<?=base_url(route_to('search-state'))?>",
        method:"post",
        "headers": {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
       },
        data: function (params) {
          var query = {
            search: params.term,
            type: 'public',
            id:$(".country").val()
          }

          // Query parameters will be ?search=[term]&type=public
          return query;
        }
      }
    });
    $('.religion').select2({
      ajax: {
        url: "<?=base_url(route_to('religion'))?>",
        method:"post",
        "headers": {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
       },
        data: function (params) {
          var query = {
            search: params.term,
            type: 'public'
          }

          // Query parameters will be ?search=[term]&type=public
          return query;
        }
      }
    });
    $('.caste').select2({
      ajax: {
        url: "<?=base_url(route_to('caste'))?>",
        method:"post",
        "headers": {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
       },
        data: function (params) {
          var query = {
            search: params.term,
            type: 'public',
            id:$(".religion").val()
          }

          // Query parameters will be ?search=[term]&type=public
          return query;
        }
      }
    });
    $('#countryR').select2({
      ajax: {
        url: "<?=base_url(route_to('search-country'))?>",
        method:"post",
        "headers": {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
       },
        data: function (params) {
          var query = {
            search: params.term,
            type: 'public'
          }

          // Query parameters will be ?search=[term]&type=public
          return query;
        }
      }
    });
    $('#stateR').select2({
      ajax: {
        url: "<?=base_url(route_to('search-state'))?>",
        method:"post",
        "headers": {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
       },
        data: function (params) {
          var query = {
            search: params.term,
            type: 'public',
            id:$(".country").val()
          }

          // Query parameters will be ?search=[term]&type=public
          return query;
        }
      }
    });
    $('#religionR').select2({
      ajax: {
        url: "<?=base_url(route_to('religion'))?>",
        method:"post",
        "headers": {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
       },
        data: function (params) {
          var query = {
            search: params.term,
            type: 'public'
          }

          // Query parameters will be ?search=[term]&type=public
          return query;
        }
      }
    });
    $('#casteR').select2({
      ajax: {
        url: "<?=base_url(route_to('caste'))?>",
        method:"post",
        "headers": {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
       },
        data: function (params) {
          var query = {
            search: params.term,
            type: 'public',
            id:$("#religionR").val()
          }

          // Query parameters will be ?search=[term]&type=public
          return query;
        }
      }
    });
    $('.languages').select2({
      ajax: {
        url: "<?=base_url(route_to('languages'))?>",
        method:"post",
        "headers": {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
       },
        data: function (params) {
          var query = {
            search: params.term,
            type: 'public'
          }

          // Query parameters will be ?search=[term]&type=public
          return query;
        }
      }
    });
    $('.occupation').select2({
      ajax: {
        url: "<?=base_url(route_to('occupation'))?>",
        method:"post",
        "headers": {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
       },
        data: function (params) {
          var query = {
            search: params.term,
            type: 'public'
          }

          // Query parameters will be ?search=[term]&type=public
          return query;
        }
      }
    });
    $('.education').select2({
      ajax: {
        url: "<?=base_url(route_to('search-education'))?>",
        method:"post",
        "headers": {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
       },
        data: function (params) {
          var query = {
            search: params.term,
            type: 'public'
          }

          // Query parameters will be ?search=[term]&type=public
          return query;
        }
      }
    });
    $('.education-category').select2({
      ajax: {
        url: "<?=base_url(route_to('education-category'))?>",
        method:"post",
        "headers": {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
       },
        data: function (params) {
          var query = {
            search: params.term,
            type: 'public'
          }

          // Query parameters will be ?search=[term]&type=public
          return query;
        }
      }
    });
</script>







<script type="text/javascript">
    //COMMON SLIDER
    $('.slider').slick({
        infinite: false,
        slidesToShow: 5,
        arrows: false,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: false,
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                centerMode: false
            }
        }]

    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var CurrentUrl = window.location.origin + window.location.pathname;
        $('#NavMenu li a').each(function(Key, Value) {
            if (Value['href'] === CurrentUrl) {
                $(Value).parent().addClass('act');
            }
        });
    });
</script>
<script type="text/javascript">
Fancybox.bind('[data-fancybox="gallery"]', {
  // Your custom options for a specific gallery
});
</script>

<script  type="text/javascript">
$(document).on("click", "#send-it", function () {
  var a = document.getElementById("chat-input");
  if ("" != a.value) {
    var b = $("#get-number").text(),
      c = document.getElementById("chat-input").value,
      d = "https://web.whatsapp.com/send",
      e = b,
      f = "&text=" + c;
    if (
      /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
        navigator.userAgent
      )
    )
      var d = "whatsapp://send";
    var g = d + "?phone=+91<?=$contact_detail->whatsapp[0]?>" + e + f;
    window.open(g, "_blank");
  }
}),
  $(document).on("click", ".informasi", function () {
    (document.getElementById("get-number").innerHTML = $(this)
      .children(".my-number")
      .text()),
      $(".start-chat,.get-new").addClass("show").removeClass("hide"),
      $(".home-chat,.head-home").addClass("hide").removeClass("show"),
      (document.getElementById("get-nama").innerHTML = $(this)
        .children(".info-chat")
        .children(".chat-nama")
        .text()),
      (document.getElementById("get-label").innerHTML = $(this)
        .children(".info-chat")
        .children(".chat-label")
        .text());
  }),
  $(document).on("click", ".close-chat", function () {
    $("#whatsapp-chat").addClass("hide").removeClass("show");
  }),
  $(document).on("click", ".blantershow-chat", function () {
    $("#whatsapp-chat").addClass("show").removeClass("hide");
  });
</script>



<!-- memberCotactModal Modal -->
<div class="modal fade" id="memberCotactModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="row gy-2">
                
                <div class="col-lg-12">                        
                    <div class="content-body">
                        
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body pt-1">
                            
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click',".logout",function (e) {
      event.preventDefault();
      loader('show');
      $.ajax({
          url:"<?=base_url()?>user/logout",
          type:"GET",
          dataType:"json",
          success:function(d)
          {
            admin_response_data_check(d)  
          },
          error: function(e) 
        {
          admin_response_data_check(e)
        } 
      });
    });
    let memberId = '';
    $(document).on("click", ".send-interest",(function(e) {      
        event.preventDefault();
        memberId = $(this).data('id');
        loader("show");
        var form = new FormData();
        form.append("member_id", memberId);
        var settings = {
          "url": "<?=base_url(route_to('user.member.send_interest'))?>",
          "method": "POST",
          "timeout": 0,
          "processData": false,
          "headers": {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
           },
          "mimeType": "multipart/form-data",
          "contentType": false,
          "dataType": "json",
          "data": form
        };
        $.ajax(settings).always(function (response) {
            loader("hide");
            response = admin_response_data_check(response);
        });
   }));
    $(document).on("click", ".accept-interest",(function(e) {      
        event.preventDefault();
        loader("show");
        var form = new FormData();
        form.append("id", $(this).data('id'));
        var settings = {
          "url": "<?=base_url(route_to('user.member.accept_interest'))?>",
          "method": "POST",
          "timeout": 0,
          "processData": false,
          "headers": {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
           },
          "mimeType": "multipart/form-data",
          "contentType": false,
          "dataType": "json",
          "data": form
        };
        $.ajax(settings).always(function (response) {
            loader("hide");
            response = admin_response_data_check(response);
        });
   }));
    $(document).on("click", ".decline-interest",(function(e) {      
        event.preventDefault();
        loader("show");
        var form = new FormData();
        form.append("id", $(this).data('id'));
        var settings = {
          "url": "<?=base_url(route_to('user.member.decline_interest'))?>",
          "method": "POST",
          "timeout": 0,
          "processData": false,
          "headers": {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
           },
          "mimeType": "multipart/form-data",
          "contentType": false,
          "dataType": "json",
          "data": form
        };
        $.ajax(settings).always(function (response) {
            loader("hide");
            response = admin_response_data_check(response);
        });
   }));

   $(document).on("click", ".view-contact",(function(e) {      
        event.preventDefault();
        memberId = $(this).data('id');
        loader("show");
        var form = new FormData();
        form.append("member_id", memberId);
        var settings = {
          "url": "<?=base_url(route_to('user.member.view_contact'))?>",
          "method": "POST",
          "timeout": 0,
          "processData": false,
          "headers": {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
           },
          "mimeType": "multipart/form-data",
          "contentType": false,
          "dataType": "json",
          "data": form
        };
        $.ajax(settings).always(function (response) {
            loader("hide");
            response = admin_response_data_check(response);
            if(response.status==200)
            {
                $("#memberCotactModal").modal("show");
                $("#memberCotactModal .modal-body").html(response.data.view);                
            }
        });
   }));

</script>




</body>
</html>