<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0"> <?= $title ?></h4>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div id="createproduct-form">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input">City Name</label>
                                <input type="text" class="form-control" id="cityName" value=""
                                    placeholder="Enter City Name" required="">
                                <div class="invalid-feedback">Please Enter a banner title.</div>
                            </div>
                            <!-- <div>
                                <label>Description</label>

                                <div id="ckeditor-classic">

                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <label class="form-label" for="product-image-input">City Image</label>
                            <input type="file" id="file-input"  multiple>
                            <label for="file-input" id="btn_upload" class="btn btn-success">
                                <i class="fas fa-upload"></i> &nbsp; Select City Image
                            </label>
                            <p id="num-of-files"></p>
                            <div id="images"></div>
                        </div>
                    </div>

                    <!-- <div class="mb-3">
                        <label class="form-label" for="product-title-input">Link</label>
                        <input type="text" class="form-control" id="bannerLink" value=""
                            placeholder="Put a link here" required="">
                    </div> -->
                    <!-- end card -->

                </div>
                <!-- end col -->

                
                <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <div class="text-start mb-3">
            <button class="btn btn-success w-sm" id="city_add_btn">Submit</button>
        </div>
    </div>
    <!-- container-fluid -->
</div>