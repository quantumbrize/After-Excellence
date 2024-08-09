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

        <div class="row">
            <div class="col-xl-4 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="fs-16">Course</h5>
                            </div>
                            <div class="flex">
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
     
                    <div id="course_image">
                            
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                    <!-- end card -->
            </div>
            <!-- end col -->

            <div class="col-xl-8 col-lg-8">
                <div>
                <div class="card">

                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <th>Course Details</th>
                                    <th></th>
                                </thead>
                                <!-- <tbody>
                                    <tr>
                                        <td>
                                            <input type="number" placeholder="stock amount" id="stock_qty" class="form-control">
                                        </td>
                                        <td>
                                            <button class="btn btn-success" id="add_stock_btn">Add</button>
                                        </td>
                                    </tr>
                                </tbody> -->
                            </table>
                            <table class="table">
                                <tbody id="student_details">
                                    <tr>
                                        <td>id</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Category</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Price</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Discount</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Final Price</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>About Course</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Duration</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Start date</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Max-Student</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Professor</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Contact</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
    <!-- container-fluid -->
</div>

 <!-- removeNotificationModal -->
 <div id="addClassAndCreatRollModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="NotificationModalbtn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="product-title-input">Select Class</label>
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
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="product-title-input">Select Branch</label>
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
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input">Roll </label>
                                <div class="input-container">
                                    <input type="text" class="form-control" id="studentRoll" value="" placeholder="" required="">
                                    <button type="button" class="btn w-sm btn-primary" onclick="generateRollNumber()">Generate</button>
                                </div>
                            </div>
                            <!-- end card -->

                        </div>
                    </div>
                    <!-- end row -->

                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">
                            Close
                        </button>
                        <div class="text-start mb-3 mt-3 class-roll-btn">
                            <button class="btn btn-success w-sm" id="roll_add_btn">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->















