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
                <div class="col-lg-4">
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
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input">Select Branch</label>
                                <!-- <input type="text" class="form-control" id="bannerTitle" value=""
                                    placeholder="Enter product title" required=""> -->
                                <select class="form-control" name="branchName" id="branchName">
                                    <!-- <option value="">Branch Not Found</option> -->
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

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input">Select Time</label>
                                <input type="text" class="form-control" id="testTime" value="" required="">
                                <!-- <select class="form-control" name="testTime" id="testTime">
                                    <option value="">select-time</option>
                                    <option value="30">30</option>
                                    <option value="45">45</option>
                                    <option value="60">60</option>
                                </select> -->
                                <div class="invalid-feedback">Please Enter a banner title.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="row" id="qna_con">
                  
                </div>

                <input type="hidden" class="form-control" id="testId">

                <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <div class="text-start mb-3">
            <button class="btn btn-success w-sm" id="test_update_btn">Submit</button>
        </div>
    </div>
    <!-- container-fluid -->
</div>