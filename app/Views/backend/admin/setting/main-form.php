<?=view('backend/include/header') ?>
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div
                                class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0"><?=$data['page_title']?></h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?=base_url('/admin')?>">Home</a></li>
                                        <li class="breadcrumb-item active"><?=$data['page_title']?>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <form class="needs-validation form_data" action="<?=$data['route']?>" method="post" enctype="multipart/form-data" id="form_data_submit" novalidate>
                        <!-- @csrf -->
                        <input type="hidden" name="id" value="<?=encript(@$row->id)?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body frm">
                                        <div class="row gy-3">
                                            <div class="col-lg-4">
                                                <label class="form-label" for="product-title-input">Phone</label>
                                                <select class="form-control tags" name="mobile[]" multiple required>
                                                    <?php
                                                    $arrData = [];
                                                    if (!empty($form_data->mobile)) {
                                                        if (is_string($form_data->mobile)) {
                                                            $decoded = json_decode($form_data->mobile, true);
                                                            $arrData = is_array($decoded) ? $decoded : [];
                                                        } elseif (is_array($form_data->mobile)) {
                                                            $arrData = $form_data->mobile;
                                                        }
                                                    }
                                                    foreach ($arrData as $key => $value) {
                                                    ?>
                                                        <option selected value="<?=$value?>"><?=$value ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-lg-4">
                                                <label class="form-label" for="product-title-input">WhatsApp Number</label>
                                                <select class="form-control tags" name="whatsapp[]" multiple required>
                                                    <?php
                                                    $arrData = [];
                                                    if (!empty($form_data->whatsapp)) {
                                                        if (is_string($form_data->whatsapp)) {
                                                            $decoded = json_decode($form_data->whatsapp, true);
                                                            $arrData = is_array($decoded) ? $decoded : [];
                                                        } elseif (is_array($form_data->whatsapp)) {
                                                            $arrData = $form_data->whatsapp;
                                                        }
                                                    }
                                                    foreach ($arrData as $key => $value) {
                                                    ?>
                                                        <option selected value="<?=$value?>"><?=$value ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-lg-4">
                                                <label class="form-label" for="product-title-input">Email</label>
                                                <select class="form-control tags" name="email[]" multiple required>
                                                    <?php
                                                    $arrData = [];
                                                    if (!empty($form_data->email)) {
                                                        if (is_string($form_data->email)) {
                                                            $decoded = json_decode($form_data->email, true);
                                                            $arrData = is_array($decoded) ? $decoded : [];
                                                        } elseif (is_array($form_data->email)) {
                                                            $arrData = $form_data->email;
                                                        }
                                                    }
                                                    foreach ($arrData as $key => $value) {
                                                    ?>
                                                        <option selected value="<?=$value?>"><?=$value ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-lg-6">
                                                <label class="form-label" for="product-title-input">Address</label>
                                                <textarea class="form-control" name="address" required><?=@$form_data->address?></textarea>
                                            </div>

                                            <div class="col-lg-6">
                                                <label class="form-label" for="product-title-input">Map Link</label>
                                                <textarea class="form-control" name="location_map" required><?=@$form_data->location_map?></textarea>
                                            </div>

                                            <div class="col-lg-12">
                                                <label class="form-label" for="product-title-input">Google Map</label>
                                                <textarea class="form-control" name="google_map" rows="4" required><?=@$form_data->google_map?></textarea>
                                            </div>

                                            <div class="col-lg-4 hide">
                                                <label class="form-label" for="product-title-input">School Time</label>
                                                <input type="text" class="form-control" placeholder="School Time" name="school_time" value="<?=@$form_data->school_time?>" required>
                                            </div>

                                            <div class="col-lg-4">
                                                <label class="form-label" for="product-title-input">Facebook Link</label>
                                                <input type="text" class="form-control" placeholder="#" name="facebook" value="<?=@$form_data->facebook?>" >
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="form-label" for="product-title-input">Twitter Link</label>
                                                <input type="text" class="form-control" placeholder="#" name="twitter" value="<?=@$form_data->twitter?>" >
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="form-label" for="product-title-input">Linkedin Link</label>
                                                <input type="text" class="form-control" placeholder="#" name="linkedin" value="<?=@$form_data->linkedin?>" >
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="form-label" for="product-title-input">Instagram Link</label>
                                                <input type="text" class="form-control" placeholder="#" name="instagram" value="<?=@$form_data->instagram?>" >
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="form-label" for="product-title-input">Telegram Link</label>
                                                <input type="text" class="form-control" placeholder="#" name="telegram" value="<?=@$form_data->telegram?>" >
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="form-label" for="product-title-input">Youtube Video Link</label>
                                                <input type="text" class="form-control" placeholder="#" name="youtube" value="<?=@$form_data->youtube?>" >
                                            </div>
                                        </div>
                                        <!-- end card -->
                                        <div class="text-start mt-3">
                                            <button type="submit" class="btn btn-success w-sm">Save</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                    </form>
                </div>
            </div>
<?=view('backend/include/footer') ?>