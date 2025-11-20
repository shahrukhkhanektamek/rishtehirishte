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

                            <?php include"profile-pdf.php"; ?>

                            

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