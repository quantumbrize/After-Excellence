<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">Create Result</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                            <li class="breadcrumb-item active">Create Result</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div id="createproduct-form">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        <!-- <label class="form-label" for="product-title-input"><b>Default Input fields</b></label> -->
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-lg-6 mt-4">
                                        <label for="formGroupExampleInput2">Select Student</label>
                                        <!-- <select class="form-control" id="selectStudent"> -->
                                        <select class="form-control choices-single" id="selectStudent">
                                        <!-- <option></option>
                                        <option value="AZ">Arizona</option>
                                        <option value="CO">Colorado</option>
                                        <option value="ID">Idaho</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="UT">Utah</option>
                                        <option value="WY">Wyoming</option> -->
                                        </select>
                                        <span style="color: red;" id="select_student_val"></span>
                                    </div>
                                    <div class="col-lg-4 mt-4">
                                        <label for="formGroupExampleInput2">Total marks of exam</label>
                                        <input type="text" class="form-control" id="totalMarks" placeholder="Total Marks">
                                        <span style="color: red;" id="total_marks_val"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        <label class="form-label" for="product-title-input"><b>Add Input fields</b></label>
                            <div class="mb-3">
                                <!-- <label class="form-label" for="product-title-input">Select Class</label> -->
                                <button type="button" onclick="add()" class="btn btn-primary">Add</button>
                                <!-- <button type="button" onclick="remove()" class="btn btn-primary">Remove</button> -->

                            <div id="new_chq">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2">Question</label>
                                            <input type="text" class="form-control questions" id="questions[]" placeholder="Enter question" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Given Answer</label>
                                            <input type="text" class="form-control givenAnswers" id="givenAnswers[]" placeholder="Enter given answer" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Right Answer</label>
                                            <input type="text" class="form-control rightAnswer" id="rightAnswer[]" placeholder="Enter correct answer" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-2">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Marks</label>
                                            <input type="number" class="form-control obtainedMarks" id="obtainedMarks[]" placeholder="Enter marks" required>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                                <input type="hidden" value="1" id="total_chq">
                            </div>
                        </div>
                    </div>
                </div>
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