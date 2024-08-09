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

                <div class="col-lg-4">
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

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input">Select Time</label>
                                <!-- <input type="text" class="form-control" id="bannerTitle" value=""
                                    placeholder="Enter product title" required=""> -->
                                <select class="form-control" name="testTime" id="testTime">
                                    <option value="">select-time</option>
                                    <option value="30">30</option>
                                    <option value="45">45</option>
                                    <option value="60">60</option>
                                </select>
                                <div class="invalid-feedback">Please Enter a banner title.</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body row">
                            <div class="col-lg-4 mb-3">
                                <label class="form-label" for="product-title-input">Select Questions Type</label>
                                <!-- <input type="text" class="form-control" id="bannerTitle" value=""
                                    placeholder="Enter product title" required=""> -->
                                <select class="form-control" name="qstType" id="qstType">
                                    <option value="">select-type</option>
                                    <option value="mcq">MCQ</option>
                                    <!-- <option value="saq">SAQ</option> -->
                                </select>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label class="form-label" for="product-title-input">Questions Marks*</label>
                                <input type="text" class="form-control" id="question_marks" value=""
                                    placeholder="Enter marks" required="">
                                <!-- <select class="form-control" name="qstType" id="qstType">
                                    <option value="saq">select-type</option>
                                    <option value="mcq">MCQ</option>
                                    <option value="saq">SAQ</option>
                                </select> -->
                            </div>
                            <div class="col-lg-4 mb-3"
                                style="display: flex;align-items: flex-end; justify-content: flex-end;">
                                <h4>Total Marks - <span id="total_marks">0</span></h4>
                            </div>
                            <div class="col-lg-8 mb-3">
                                <label class="form-label">Questions</label>
                                <textarea id="editor_qst"></textarea>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label class="form-label">Image(Optional*)</label>
                                <input type="file" id="file-input"  multiple>
                                <label for="file-input" id="btn_upload" class="btn btn-success">
                                     Upload Image
                                </label>
                                <p id="num-of-files"></p>
                                <div id="images"></div>
                            </div>
                            

                            <div class="col-lg-12 mb-3" id="ans_mcq_con" style="display:none;">
                                <label class="form-label">Options</label>
                                <div class="row">
                                    <div class="col-lg-6 mb-3 option-group">
                                        <div class="checkbox-wrapper-10">
                                            <label>Option A</label>
                                            <input class="tgl tgl-flip" id="cbA" type="checkbox" name="optA" />
                                            <label class="tgl-btn" data-tg-off="&cross;" data-tg-on="&check;"
                                                for="cbA"></label>
                                        </div>
                                        <input type="text" class="form-control" id="qst_a" placeholder="Option A">
                                    </div>
                                    <div class="col-lg-6 mb-3 option-group">
                                        <div class="checkbox-wrapper-10">
                                            <label>Option B</label>
                                            <input class="tgl tgl-flip" id="cbB" type="checkbox" name="optB" />
                                            <label class="tgl-btn" data-tg-off="&cross;" data-tg-on="&check;"
                                                for="cbB"></label>
                                        </div>
                                        <input type="text" class="form-control" id="qst_b" placeholder="Option B">
                                    </div>
                                    <div class="col-lg-6 mb-3 option-group">
                                        <div class="checkbox-wrapper-10">
                                            <label>Option C</label>
                                            <input class="tgl tgl-flip" id="cbC" type="checkbox" name="optC" />
                                            <label class="tgl-btn" data-tg-off="&cross;" data-tg-on="&check;"
                                                for="cbC"></label>
                                        </div>
                                        <input type="text" class="form-control" id="qst_c" placeholder="Option C">
                                    </div>
                                    <div class="col-lg-6 mb-3 option-group">
                                        <div class="checkbox-wrapper-10">
                                            <label>Option D</label>
                                            <input class="tgl tgl-flip" id="cbD" type="checkbox" name="optD" />
                                            <label class="tgl-btn" data-tg-off="&cross;" data-tg-on="&check;"
                                                for="cbD"></label>
                                        </div>
                                        <input type="text" class="form-control" id="qst_d" placeholder="Option D">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3" id="ans_saq_con" style="display:none;">
                                <label class="form-label" for="product-title-input">Answer</label>
                                <input class="form-control" id="editor_ans" placeholder="Answer"/>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <button class="btn btn-info" id="qst_add_btn">Add</button>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="col-lg-12" style="display:none;" id="question_col">
                    <div class="accordion card" id="qaAccordion">
                        <!-- Example Q&A Item 1 -->
                        <div class="card-header">
                            <label class="form-label">Questions</label>
                        </div>
                        <div class="card-body row" id="question_con">



                           


                        </div>
                    </div>
                </div>


            </div>
            <div class="text-start mb-3 " style="display: flex;align-items: center; justify-content: center;">
                <button class="btn btn-success w-25" id="test_add_btn">Submit</button>
            </div>
        </div>

    </div>