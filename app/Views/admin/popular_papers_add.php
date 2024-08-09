
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">Popular Paper</h4>


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
                                    <input type="text" class="form-control" id="title" value=""
                                        placeholder="Add Title" required="">
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
                                    <input type="text" class="form-control" id="keyword" value=""
                                        placeholder="Add Title" required="">
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
                                <input type="file" id="file-input"  multiple>
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
                    <div class="card">
                        <div class="card-body row">
                            <div class="col-lg-4 mb-3">
                                <label class="form-label" for="product-title-input">Select Material Type</label>
                                <fieldset>
                                    <label for="option1">
                                        <input type="radio" checked id="option1" name="materialOptions" value="pdf">
                                       PDF
                                    </label>
                                    <label for="option2">
                                        <input type="radio" id="option2" name="materialOptions" value="link">
                                        LINK
                                    </label>
                                </fieldset>
                                <!-- <select class="form-control" name="qstType" id="qstType">
                                    <option value="saq">select-type</option>
                                    <option value="mcq">MCQ</option>
                                    <option value="saq">SAQ</option>
                                </select> -->
                            </div>
                                <div class="col-lg-12 mb-3" id="upload_pdf" style="display:none;">
                                    <!-- <label for="pdf-input">Choose PDF File</label> -->
                                    <input type="file" id="pdf-input">
                                    <label for="pdf-input" id="btn_pdf_upload" class="btn btn-success">
                                        Upload PDF
                                    </label>
                                    <p id="num-of-pdf-files"></p>
                                    <div id="pdfs"></div>
                                </div>
                                <div class="col-lg-12 mb-3" id="upload_link" style="display:none;">
                                        <label for="link-input">Enter Link</label>
                                    <input class="form-control" id="material_link" placeholder="Link"/>
                                </div>
                        </div>
                    </div>
                </div>













                <!-- <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label" for="product-title-input">Link </label><i class="ri-link"></i>
                        <input type="text" class="form-control" id="classLink" value=""
                            placeholder="Put a link here" required="">
                    </div>
                </div>
                <div class="col-lg-12">
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
            <button class="btn btn-success w-sm" id="popular_paper_add_btn">Submit</button>
        </div>
    </div>
    <!-- container-fluid -->
</div>