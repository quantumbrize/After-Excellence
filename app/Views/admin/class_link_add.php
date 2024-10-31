<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">Video Materials</h4>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div id="createproduct-form">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input">Select Class</label>
                                <!-- <input type="text" class="form-control" id="bannerTitle" value=""
                                    placeholder="Enter product title" required=""> -->
                                <select class="form-control" name="className" id="className" onchange="get_branches()">
                                    <!-- <option value="">hello</option>
                                        <option value="">hii</option>
                                        <option value="">what</option> -->
                                </select>
                                <div class="invalid-feedback">Please Enter a banner title.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input">Select Branch</label>
                                <!-- <input type="text" class="form-control" id="bannerTitle" value=""
                                    placeholder="Enter product title" required=""> -->
                                <select class="form-control" name="branchName" id="branchName">
                                    <option value="">Branch Not Found</option>
                                    <!-- <option value="">hello</option>
                                        <option value="">hii</option>
                                        <option value="">what</option> -->
                                </select>
                                <div class="invalid-feedback">Please Enter a banner title.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input">Title</label>
                                <!-- <input type="text" class="form-control" id="bannerTitle" value=""
                                    placeholder="Enter product title" required=""> -->
                                <input type="text" class="form-control" id="title" value="" placeholder="Add Title"
                                    required="">
                                <div class="invalid-feedback">Please Enter a title.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <div>
                                    <label>Description</label>

                                    <div id="ckeditor-classic">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input">Keyword</label>
                                <!-- <input type="text" class="form-control" id="bannerTitle" value=""
                                    placeholder="Enter product title" required=""> -->
                                <input type="text" class="form-control" id="keyword" value="" placeholder="Add Title"
                                    required="">
                                <div class="invalid-feedback">Please Enter keyword.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input">Image</label>
                                <input type="file" id="file-input" multiple>
                                <label for="file-input" id="btn_upload" class="btn btn-success">
                                    Upload Image
                                </label>
                                <p id="num-of-files"></p>
                                <div id="images"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label" for="product-title-input">Upload Video </label><i class="ri-link"></i>
                        <input type="file" class="form-control" id="videoFile" value="" placeholder="Put a link here"  accept="video/*" required="">
                    </div>
                    <!-- end card -->
                </div>


                <!-- <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label" for="product-title-input">Short Description </label><i class="ri-link"></i>
                        <input type="text" class="form-control" id="classLinkDescription" value=""
                            placeholder="Add short description" required="">
                    </div>

                </div> -->
                <!-- end col -->


                <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <div class="text-start mb-3">
            <button class="btn btn-success w-sm" id="live_class_add_btn">Submit</button>
        </div>
    </div>
    <!-- container-fluid -->
</div>