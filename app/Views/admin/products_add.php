<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">Create Course</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                            <li class="breadcrumb-item active">Create Course</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div id="createproduct-form">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input">Course Title</label>
                                <input type="hidden" class="form-control" id="formAction" name="formAction" value="add">
                                <input type="text" class="form-control d-none" id="product-id-input">
                                <input type="text" class="form-control" id="product-title-input" value=""
                                    placeholder="Enter product title" required="">
                                <div class="invalid-feedback">Please Enter a course title.</div>
                            </div>
                            <div>
                                <label>Course Details</label>

                                <div id="ckeditor-classic">

                                </div>
                            </div>
                            <div>
                                <label>About Course</label>

                                <div id="ckeditor-classic2">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <label class="form-label" for="product-image-input">Course Image</label>
                            <input type="file" id="file-input"  multiple>
                            <label for="file-input" id="btn_upload" class="btn btn-success">
                                <i class="fas fa-upload"></i> &nbsp; Select Product Image
                            </label>
                            <p id="num-of-files"></p>
                            <div id="images"></div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input">Video Url<i class="ri-link"></i></label>
                                <input type="hidden" class="form-control" id="formAction" name="formAction" value="add">
                                <input type="text" class="form-control d-none" id="product-id-input">
                                <input type="text" class="form-control" id="video-url-input" value=""
                                    placeholder="Enter product title" required="">
                                <div class="invalid-feedback">Please Enter a video url.</div>
                            </div>
                        </div>
                    </div>

                    

                    

                </div>
                <!-- end col -->

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info"
                                        role="tab">
                                        Course Info
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- end card header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="manufacturer-name-input">Course
                                                    Code</label>
                                                <input type="text" class="form-control" id="product-code-input"
                                                    placeholder="Enter the code">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="manufacturer-brand-input">Course
                                                    Duration</label>
                                                <input type="text" class="form-control" id="product-duration-input"
                                                    placeholder="Enter the course duration">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row">

                                        <div class="col-lg-6 ">
                                            <div class="mb-3">
                                                <!-- <label class="form-label" for="product-price-input">Starting Date</label> -->
                                                <div class="input-group has-validation mb-3">
                                                    <!-- <span class="input-group-text" id="product-price-addon">₹</span> -->
                                                    <input type="hidden" class="form-control" id="product-starting-date-input"
                                                        value="01-01-2001" aria-label="Price"
                                                        aria-describedby="product-price-addon" required="">
                                                    <!-- <div class="invalid-feedback">Please Enter starting date.</div> -->
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <!-- <label class="form-label" for="product-discount-input">Maximum Student</label> -->
                                                <div class="input-group mb-3">
                                                    <!-- <span class="input-group-text" id="product-discount-addon">%</span> -->
                                                    <input type="hidden" class="form-control" id="product-max-student-input"
                                                        value="0" aria-label="discount"
                                                        aria-describedby="product-discount-addon">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- end tab-pane -->
                            </div>
                            <!-- end tab content -->
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info"
                                        role="tab">
                                        General Info
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#addproduct-metadata" role="tab">
                                        Meta Data
                                    </a>
                                </li> -->
                            </ul>
                        </div>
                        <!-- end card header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-12 ">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-price-input">Price</label>
                                            <div class="input-group has-validation mb-3">
                                                <span class="input-group-text" id="product-price-addon">₹</span>
                                                <input type="text" class="form-control" id="product-price-input"
                                                    placeholder="Enter price" aria-label="Price"
                                                    aria-describedby="product-price-addon" required="">
                                                <div class="invalid-feedback">Please Enter a product price.</div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <!-- <label class="form-label" for="product-discount-input">Discount</label> -->
                                            <div class="input-group mb-3">
                                                <!-- <span class="input-group-text" id="product-discount-addon">%</span> -->
                                                <input type="hidden" class="form-control" id="product-discount-input"
                                                    value="0" aria-label="discount"
                                                    aria-describedby="product-discount-addon">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    </div>
                                    <!-- end row -->

                                    <div class="row">
                                        <!-- <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="manufacturer-name-input">Professor
                                                    Name</label>
                                                    <select class="form-control" id="professor-name-input">
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="manufacturer-brand-input">Contact
                                                    No.</label>
                                                <input type="text" class="form-control" id="contact-input"
                                                    placeholder="Enter a contact no.">
                                            </div>
                                        </div> -->
                                    </div>
                                    <!-- end row -->

                                    
                                </div>
                                <!-- end tab-pane -->

                                <div class="tab-pane" id="addproduct-metadata" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="meta-title-input">Meta title</label>
                                                <input type="text" class="form-control" placeholder="Enter meta title"
                                                    id="meta-title-input">
                                            </div>
                                        </div>
                                        <!-- end col -->

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="meta-keywords-input">Meta
                                                    Keywords</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter meta keywords" id="meta-keywords-input">
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->

                                    <div>
                                        <label class="form-label" for="meta-description-input">Meta Description</label>
                                        <textarea class="form-control" id="meta-description-input"
                                            placeholder="Enter meta description" rows="3"></textarea>
                                    </div>
                                </div>
                                <!-- end tab pane -->
                            </div>
                            <!-- end tab content -->
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->


                    <!-- <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Publish</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="choices-publish-status-input" class="form-label">Status</label>

                                <select class="form-select" id="choices-publish-status-input" data-choices=""
                                    data-choices-search-false="">
                                    <option value="published" selected="">Published</option>
                                    <option value="scheduled">Scheduled</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>

                            <div>
                                <label for="choices-publish-visibility-input" class="form-label">Visibility</label>
                                <select class="form-select" id="choices-publish-visibility-input" data-choices=""
                                    data-choices-search-false="">
                                    <option value="public" selected="">Public</option>
                                    <option value="hidden">Hidden</option>
                                </select>
                            </div>
                        </div>
                    </div> -->
                    <!-- end card -->
                    <input type="hidden" class="form-control" id="choices-publish-status-input" value="published" aria-label="discount" aria-describedby="product-discount-addon">
                    <input type="hidden" class="form-control" id="choices-publish-visibility-input" value="public" aria-label="discount" aria-describedby="product-discount-addon">
                    <input type="hidden" id="datepicker-publish-input" class="form-control" value="15-01-2030" data-provider="flatpickr" data-date-format="d.m.y" data-enable-time="">

                    <!-- <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Publish Schedule</h5>
                        </div>
                        <div class="card-body">
                            <div>
                                <label for="datepicker-publish-input" class="form-label">Publish Date & Time</label>
                                <input type="text" id="datepicker-publish-input" class="form-control"
                                    placeholder="Enter publish date" data-provider="flatpickr" data-date-format="d.m.y"
                                    data-enable-time="">
                            </div>
                        </div>
                    </div> -->
                    <!-- end card -->

                    <!-- <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Product Categories</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted mb-2"> <a href="#" class="float-end text-decoration-underline">Add
                                    New</a>Select product category</p>
                            <select class="form-select" id="choices-category-input" name="choices-category-input" onchange="get_sub_category()"
                                data-choices="" data-choices-search-false="">

                            </select>
                        </div>
                    </div> -->
                    <!-- end card -->

                    <div class="card" id="mainCategories">
                        <!-- <div class="card-header">
                            <h5 class="card-title mb-0">Product Categories</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted mb-2"> <a href="#" class="float-end text-decoration-underline">Add
                                    New</a>Select product category</p>
                            <select class="form-select" id="choices-category-input" name="choices-category-input" onchange="get_sub_category()"
                                data-choices="" data-choices-search-false="">

                            </select>
                        </div> -->
                        <!-- end card body -->
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Course Tags</h5>
                        </div>
                        <div class="card-body">
                            <div class="hstack gap-3 align-items-start">
                                <div class="flex-grow-1">
                                    <input class="form-control" data-choices="" data-choices-multiple-remove="true"
                                        placeholder="Enter tags" type="text" value="" id="product-tags-input">
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->


                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <div class="text-start mb-3">
            <button class="btn btn-success w-sm" id="product_add_btn">Submit</button>
        </div>
    </div>
    <!-- container-fluid -->
</div>