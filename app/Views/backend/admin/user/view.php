<?=view('backend/include/header') ?>

<div class="page-content table_page">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0"><?=$data['page_title']?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?=base_url('/admin')?>">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a ><?=$data['title']?></a></li>
                            <li class="breadcrumb-item active"><?=$data['page_title']?></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row g-3 form_data" >

            
            
            <!--end col-->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0 flex-grow-1"><?=$data['title']?> View Profile</h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row g-3">

                            <table width="100%" cellpadding="0" cellspacing="0" border="0"
                              style="background:#ffffff;padding:20px 0;font-family: Arial, Helvetica, sans-serif;">
                              <tr>
                                <td align="center">

                                  <!-- container -->
                                  <table cellpadding="0" cellspacing="0" border="0"
                                    style="width:80%;background:#ffffff;border:1px solid #e5e5e5;border-radius:12px;">
                                    <tr>
                                      <td style="padding:12px;">

                                        <!-- two column layout -->
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                          <tr valign="top">

                                            <!-- LEFT CARD -->
                                            <td width="38%" style="padding-right:18px;">
                                              <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                                style="background:#f9f9f9;border-radius:12px;padding:15px;">
                                                <tr>
                                                  <td align="center" style="padding-bottom:10px;">
                                                    <img src="<?= image_check($row->images) ?>" width="120" height="120" alt="avatar"
                                                      style="border-radius:12px;object-fit:cover;border:2px solid #C9302C;">
                                                  </td>
                                                </tr>

                                                <tr>
                                                  <td style="font-size:20px;font-weight:700;color:#222222;padding-bottom:8px;">
                                                    <?= esc($row->name) ?>
                                                  </td>
                                                </tr>

                                                <tr>
                                                  <td style="font-size:13px;color:#555555;line-height:1.4;padding-bottom:14px;">
                                                    <?= (($row->aboutfamily)) ?>
                                                  </td>
                                                </tr>

                                                <tr>
                                                  <td style="font-weight:700;color:#C9302C;font-size:16px;padding-bottom:8px;">Family</td>
                                                </tr>

                                                <tr>
                                                  <td style="font-size:13px;color:#333333;line-height:1.5;">
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                      <tr>
                                                        <td style="width:55%;font-size:13px;color:#666666;padding:4px 0;">Father's Status</td>
                                                        <?php $father = $db->table("occupation")->where(["id"=>$row->father_occupation])->get()->getFirstRow(); ?>
                                                        <td style="font-size:13px;color:#111111;padding:4px 0;">:
                                                          <?= $father->name ?? 'Not Available' ?></td>
                                                      </tr>
                                                      <tr>
                                                        <td style="font-size:13px;color:#666666;padding:4px 0;">Mother's Status</td>
                                                        <?php $mother = $db->table("occupation")->where(["id"=>$row->mother_occupation])->get()->getFirstRow(); ?>
                                                        <td style="font-size:13px;color:#111111;padding:4px 0;">:
                                                          <?= $mother->name ?? 'Not Available' ?></td>
                                                      </tr>
                                                      <tr>
                                                        <td style="font-size:13px;color:#666666;padding:4px 0;">Brothers Married</td>
                                                        <td style="font-size:13px;color:#111111;padding:4px 0;">: <?= esc($row->brother_married) ?></td>
                                                      </tr>
                                                      <tr>
                                                        <td style="font-size:13px;color:#666666;padding:4px 0;">Brothers Unmarried</td>
                                                        <td style="font-size:13px;color:#111111;padding:4px 0;">: <?= esc($row->brother_unmarried) ?></td>
                                                      </tr>
                                                      <tr>
                                                        <td style="font-size:13px;color:#666666;padding:4px 0;">Sister Married</td>
                                                        <td style="font-size:13px;color:#111111;padding:4px 0;">: <?= esc($row->sister_married) ?></td>
                                                      </tr>
                                                      <tr>
                                                        <td style="font-size:13px;color:#666666;padding:4px 0;">Sister Unmarried</td>
                                                        <td style="font-size:13px;color:#111111;padding:4px 0;">: <?= esc($row->sister_unmarried) ?></td>
                                                      </tr>
                                                      <tr>
                                                        <td style="font-size:13px;color:#666666;padding:4px 0;">Family Affluence</td>
                                                        <td style="font-size:13px;color:#111111;padding:4px 0;">: <?= esc($row->family_type) ?></td>
                                                      </tr>
                                                      <tr>
                                                        <td style="font-size:13px;color:#666666;padding:4px 0;">Native Place</td>
                                                        <?php
                                                          $country = $db->table("countries")->where(["id"=>$row->country])->get()->getFirstRow();
                                                          $state   = $db->table("states")->where(["id"=>$row->state])->get()->getFirstRow();
                                                        ?>
                                                        <td style="font-size:13px;color:#111111;padding:4px 0;">:
                                                          <?= $state->name ?? 'Not Available' ?>,
                                                          <?= esc($row->city) ?>,
                                                          <?= $country->name ?? 'Not Available' ?>
                                                        </td>
                                                      </tr>
                                                    </table>
                                                  </td>
                                                </tr>
                                              </table>
                                            </td>

                                            <!-- RIGHT DETAILS -->
                                            <td width="62%" style="padding-left:6px;">
                                              <table width="100%" cellpadding="0" cellspacing="0" border="0">

                                                <!-- Basic details -->
                                                <tr>
                                                  <td style="font-size:20px;font-weight:700;color:#C9302C;padding-bottom:10px;">Basic Details</td>
                                                </tr>
                                                <tr>
                                                  <td style="font-size:13px;color:#333333;">
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                      <tr>
                                                        <td style="width:48%;font-size:13px;color:#666666;padding:6px 0;">Date of Birth</td>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">:
                                                          <?= date("d-M Y", strtotime($row->dob)) ?></td>
                                                      </tr>

                                                      <tr>
                                                        <td style="width:48%;font-size:13px;color:#666666;padding:6px 0;">Time of Birth</td>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">:
                                                          <?= date("h:i A", strtotime($row->time_of_birth)) ?></td>
                                                      </tr>
                                                      <tr>
                                                        <td style="width:48%;font-size:13px;color:#666666;padding:6px 0;">Place of Birth</td>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">:
                                                          <?= $row->place_of_birth ?></td>
                                                      </tr>

                                                      <tr>
                                                        <td style="font-size:13px;color:#666666;padding:6px 0;">Height</td>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">: <?= esc($row->height) ?></td>
                                                      </tr>
                                                      <tr>
                                                        <td style="font-size:13px;color:#666666;padding:6px 0;">Marital Status</td>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">: <?= esc($row->maritalstatus) ?></td>
                                                      </tr>
                                                      <tr>
                                                        <td style="font-size:13px;color:#666666;padding:6px 0;">Email ID</td>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">: <?= esc($row->email) ?></td>
                                                      </tr>
                                                      <tr>
                                                        <td style="font-size:13px;color:#666666;padding:6px 0;">Contact No.</td>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">: <?= esc($row->phone) ?></td>
                                                      </tr>
                                                    </table>
                                                  </td>
                                                </tr>

                                                <!-- Religious -->
                                                <tr><td style="height:12px;"></td></tr>
                                                <tr>
                                                  <td style="font-size:18px;font-weight:700;color:#C9302C;padding-bottom:8px;">Religious Background</td>
                                                </tr>
                                                <tr>
                                                  <td style="font-size:13px;color:#333333;">
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                      <tr>
                                                        <td style="width:48%;font-size:13px;color:#666666;padding:6px 0;">Religion</td>
                                                        <?php $religion = $db->table("religion")->where(["id"=>$row->religion])->get()->getFirstRow(); ?>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">:
                                                          <?= $religion->name ?? 'Not Available' ?></td>
                                                      </tr>
                                                      <tr>
                                                        <td style="font-size:13px;color:#666666;padding:6px 0;">Community</td>
                                                        <?php $caste = $db->table("caste")->where(["id"=>$row->caste])->get()->getFirstRow(); ?>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">:
                                                          <?= $caste->name ?? 'Not Available' ?></td>
                                                      </tr>
                                                      <tr>
                                                        <td style="font-size:13px;color:#666666;padding:6px 0;">Mother Tongue</td>
                                                        <?php $mothertongue = $db->table("languages")->where(["id"=>$row->mothertongue])->get()->getFirstRow(); ?>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">:
                                                          <?= $mothertongue->name ?? 'Not Available' ?></td>
                                                      </tr>
                                                    </table>
                                                  </td>
                                                </tr>

                                                <!-- Location & Career -->
                                                <tr><td style="height:12px;"></td></tr>
                                                <tr>
                                                  <td style="font-size:18px;font-weight:700;color:#C9302C;padding-bottom:8px;">
                                                    Location, Education &amp; Career
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td style="font-size:13px;color:#333333;">
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                      <tr>
                                                        <td style="width:48%;font-size:13px;color:#666666;padding:6px 0;">Living in</td>
                                                        <?php $stateLive = $db->table("states")->where(["id"=>$row->family_living])->get()->getFirstRow(); ?>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">:
                                                          <?= $stateLive->name ?? 'Not Available' ?> | <?= esc($row->city) ?></td>
                                                      </tr>
                                                      <tr>
                                                        <td style="font-size:13px;color:#666666;padding:6px 0;">Grew up in</td>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">:
                                                          <?= $country->name ?? 'Not Available' ?></td>
                                                      </tr>
                                                      <tr>
                                                        <td style="font-size:13px;color:#666666;padding:6px 0;">Highest Qualification</td>
                                                        <?php $edu = $db->table("education")->where(["id"=>$row->highestdegree])->get()->getFirstRow(); ?>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">:
                                                          <?= $edu->name ?? 'Not Available' ?></td>
                                                      </tr>
                                                      <tr>
                                                        <td style="font-size:13px;color:#666666;padding:6px 0;">College Name</td>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">: <?= esc($row->collegename) ?></td>
                                                      </tr>
                                                      <tr>
                                                        <td style="font-size:13px;color:#666666;padding:6px 0;">Income</td>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">: <?= esc($row->annualincome) ?></td>
                                                      </tr>
                                                    </table>
                                                  </td>
                                                </tr>

                                              </table>
                                            </td>
                                          </tr>
                                        </table>

                                      </td>
                                    </tr>
                                    <tr style="padding: 10px;display: block;">
                                      <th><b>Note: This Content may be confidential or privileged Also, the details provided in the profile are sent by the said party & our company is not responsible for any misinterpretation regarding the same, "Please do not print this unless it is absolutely necessary, as an initiative towards Environmental Awareness"</b></th>
                                    </tr>
                                  </table>
                                  <!-- end container -->

                                </td>
                              </tr>
                              
                            </table>

                            

                            <div class="row mt-2">
                              <div class="col-md-6" style="margin: 0 auto;">
                                  
                                  <h1 class="h3 bg-light text-center text-body-secondary p-2">Share Profile</h1>                                

                                <div class="row mt-2 text-center w-100 justify-content-center">
                                    <a class="btn btn-success w-auto me-4 create-pdf" data-type="1" style="background-color: #25D366;border: 0;">
                                        <i class="ri-whatsapp-line"></i>
                                        Send On Whatsapp
                                    </a>
                                    <a class="btn btn-success w-auto create-pdf" data-type="2" style="background-color: #EA4335;border: 0;">
                                        <i class="ri-mail-line"></i>
                                        Send On Mail
                                    </a>
                                </div>
                              </div>
                            </div>




                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!-- container-fluid -->
</div><!-- End Page-content -->





<script>
  let type = 0;
$(document).on("click", ".create-pdf",(function(e) {
    type = $(this).data("type")
    createPdf()
}));
function createPdf()
{
    loader('show');
    var form = new FormData();
    form.append("id","<?=encript($row->id) ?>");
    form.append("shareUserId",$("#select-all-user").val());
    form.append("type",type);
    var settings = {
      "url": "<?=$data['route']?>/create-pdf",
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
        loader(0);
        response = admin_response_data_check(response);
        shareOnWhatsapp(response.data)

        // $("#data-list").html(response.data.list);

    });
}



async function shareOnWhatsapp(data) {
    let pdfUrl = data.pdf;

    try {
        const response = await fetch(pdfUrl);
        const blob = await response.blob();
        const file = new File([blob], data.fileName, { type: 'application/pdf' });

        // Check if browser supports sharing files (mobile only)
        if (navigator.canShare && navigator.canShare({ files: [file] })) {
            await navigator.share({
                title: 'Profile PDF',
                text: 'Here is the Profile PDF.',
                files: [file]
            });
        } 
        // React Native WebView: send PDF to app for native sharing
        else if (window.ReactNativeWebView) {
            const reader = new FileReader();
            reader.onload = function() {
                const base64Data = reader.result.split(',')[1]; // get Base64 string
                const message = {
                    type: 'shareFile',
                    payload: {
                        fileName: data.fileName,
                        fileType: 'application/pdf',
                        base64: base64Data,
                        message: 'Here is the Profile PDF.'
                    }
                };
                window.ReactNativeWebView.postMessage(JSON.stringify(message));
            };
            reader.readAsDataURL(file);
        } 
        // Fallback: just share URL via WhatsApp Web
        else {
            const encodedText = encodeURIComponent('Here is the Profile PDF: ' + pdfUrl);
            const whatsappUrl = `https://wa.me/?text=${encodedText}`;
            window.open(whatsappUrl, "_blank");
        }
    } catch (error) {
        console.error('Error sharing file:', error);
        alert('Sharing failed.');
    }
}





// async function shareOnWhatsapp(data)
// {
//   let pdfUrl = data.pdf;

//     try {
//         const response = await fetch(pdfUrl);
//         const blob = await response.blob();
//         const file = new File([blob], data.fileName, { type: 'application/pdf' });

//         if (navigator.canShare && navigator.canShare({ files: [file] })) {
//             await navigator.share({
//                 title: 'Profile PDF',
//                 text: 'Here is the Profile PDF.',
//                 files: [file]
//             });
//         } else if (window.ReactNativeWebView) {
//             // Send message to React Native app
//             const message = {
//                 type: 'share',
//                 payload: {
//                     title: 'Profile PDF',
//                     message: 'Here is the Profile PDF.',
//                     url: pdfUrl
//                 }
//             };
//             window.ReactNativeWebView.postMessage(JSON.stringify(message));
//         } else {
//             alert('Sharing is not supported on this device/browser.');
//         }
//     } catch (error) {
//         console.error('Error sharing file:', error);
//         alert('Sharing failed.');
//     }
// }


// document.getElementById('pdf-share-btn').addEventListener('click', async function() {
//     const pdfUrl = document.getElementById('pdf-download-btn').href;

//     try {
//         const response = await fetch(pdfUrl);
//         const blob = await response.blob();
//         const file = new File([blob], 'OrderTransfer.pdf', { type: 'application/pdf' });

//         if (navigator.canShare && navigator.canShare({ files: [file] })) {
//             await navigator.share({
//                 title: 'Profile PDF',
//                 text: 'Here is the Profile PDF.',
//                 files: [file]
//             });
//         } else if (window.ReactNativeWebView) {
//             // Send message to React Native app
//             const message = {
//                 type: 'share',
//                 payload: {
//                     title: 'Profile PDF',
//                     message: 'Here is the Profile PDF.',
//                     url: pdfUrl
//                 }
//             };
//             window.ReactNativeWebView.postMessage(JSON.stringify(message));
//         } else {
//             alert('Sharing is not supported on this device/browser.');
//         }
//     } catch (error) {
//         console.error('Error sharing file:', error);
//         alert('Sharing failed.');
//     }
// });




</script>

<?=view('backend/include/footer') ?>