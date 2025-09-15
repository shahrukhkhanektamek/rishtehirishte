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
                                        <div class="row">
                                            

                                            
                                            <div class="col-lg-12 mb-3">
                                                <label class="form-label" for="product-title-input">Home</label>
                                                <textarea class="form-control" name="home" required><?=@$form_data->home?></textarea>
                                                <script>CKEDITOR.replace( 'home' );</script>
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <label class="form-label" for="product-title-input">About Page Sort </label>
                                                <textarea class="form-control" name="sort" required><?=@$form_data->sort?></textarea>
                                                <script>CKEDITOR.replace( 'sort' );</script>
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <label class="form-label" for="product-title-input">About Page Full </label>
                                                <textarea class="form-control" name="full" required><?=@$form_data->full?></textarea>
                                                <script>CKEDITOR.replace( 'full' );</script>
                                            </div>



                                        </div>
                                        <!-- end card -->
                                        <div class="text-center mt-2 mb-3">
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