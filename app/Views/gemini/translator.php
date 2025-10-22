<?=view("web/include/header"); ?>
<?php 
$role = 0;	
$user_id = 0;	
$user = get_user();
if(!empty($user))
{
	$role = $user->role;
	$user_id = $user->id;
	$user_role = get_role_by_id($user->role);
}
?>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?=base_url() ?>assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css">		
	<link rel="stylesheet" href="<?=base_url() ?>assets/plugins/dropzone/dropzone.min.css">
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?=base_url() ?>">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page"> Legal Research</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title"> Legal Research</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">						
							<?=view("partner/nav"); ?>							
						</div>

						<div class="col-md-7 col-lg-8 col-xl-9">

								

								

								<div class="card">
									<div class="card-body">
										<div class="live_comment">
											<div class="row">

												<div class="col-md-6">
													<div class="col-12 mt-2">
														<label>Translate To</label>
														<select class="form-control select" id="language">   
														   <option value="Bengali">Bengali</option>
														   <option value="Marathi">Marathi</option>
														   <option value="Telugu">Telugu</option>
														   <option value="Tamil">Tamil</option>
														   <option value="Gujarati">Gujarati</option>
														   <option value="Urdu">Urdu</option>
														   <option value="Kannada">Kannada</option>
														   <option value="Odia">Odia</option>
														   <option value="Punjabi">Punjabi</option>
														   <option value="Malayalam">Malayalam</option>
														   <option value="English">English</option>
														   <option value="Spanish">Spanish</option>
														   <option value="French">French</option>
														   <option value="German">German</option>
														   <option value="Arabic">Arabic</option>
														   <option value="Russian">Russian</option>
														   <option value="Chinese (Simplified)">Chinese (Simplified)</option>
														</select>
													</div>

													<div class="col-md-12 mt-2">
														<div class="form-group mb-0">
															<?php
					                                             $file_data = array(
					                                                 "position"=>1,
					                                                 "columna_name"=>"file",
					                                                 "multiple"=>false,
					                                                 "accept"=>'.pdf',
					                                                 "col"=>"col-md-2",
					                                                 "alt_text"=>"none",
					                                                 "row"=>@$kyc,
					                                                 "placeholder"=>"Drag & drop a PDF, or click to upload",
					                                                 "css"=>["height"=>"50px","width"=>'100%',"margin-bottom"=>'10px',],
					                                             );
					                                        ?>
					                                        <?=view('upload-multiple/index',compact('file_data','db','data'))?>
														</div>
													</div>

													<div class="col-12">
														<textarea class="form-control" id="comment" rows="5" placeholder="Paste text here or upload a document above..."></textarea>
													</div>
												</div>

												<div class="col-md-6">
													<div class="col-12">
														<label>Translated Document</label>
														<div class="live_chat" id="live_chat">
															<div class="chat1 resaponse-area" id="chat1" style="min-height: 245px;padding: 10px 10px;border: 1px solid;border-radius: 5px;">
															</div>
														</div>
													</div>
												</div>

												
												<div class="col-4 mt-2">
													<label style="color: white;">sd</label>
													<button class="btn btn-primary btn_live w-100" id="submit-comment">Translate</button>
												</div>
											</div>
										</div>
										<div class="hide" style="display:none;" id="output"></div>
									</div>
								</div>

								
							
								
						

														
							
						</div>


						
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
			







<script>
	
   $(document).on("click", "#submit-comment",(function(e) {
      event.preventDefault();
      submit_comment();
   }));

    const myInput = document.getElementById("comment");
	myInput.addEventListener("keydown", function (event) {
	    if (event.key === "Enter") {
	      submit_comment(); // call your custom function
	    }
	});

   function submit_comment()
   {
   		var comment = $("#comment").val();
   		if(comment.trim()=='')
   			return false;

   		$("#submit-comment").attr("disabled", true)
   		data_loader("#chat1",1);
   		$(".resaponse-area-card").show();


        // $(".chat1").append(`<div class="me">${(comment)}</div>`);
        $(".chat1").append(`<div class="boat wait"><span class="dot-loader"><span></span><span></span><span></span></span></div>`);
        // $("#comment").val('');
        var div = document.getElementById("live_chat");
  			div.scrollTop = div.scrollHeight;
      
        var form = new FormData();
        form.append("comment",comment);
        form.append("language",$("#language").val());
        var settings = {
          "url": "<?=$data['actionUrl'] ?>",
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
            
   		$("#submit-comment").attr("disabled", false);

            response = admin_response_data_check(response);
            if(response.status==200)
            {
              	$(".chat1").html(`<div class="boat">${(response.message)}</div>`);
              	$(".wait.boat").remove();
              	var div = document.getElementById("live_chat");
  				div.scrollTop = div.scrollHeight;
            }
        });
   }






</script>




<?=view("web/include/footer"); ?>