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

            <div class="col-xl-12 col-lg-12">
                <div>
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row g-4">
                                <div class="col-sm-auto">
                                    <div>
                                       <a href="javascript:void(0)" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            id="addproduct-btn">
                                            <i class="ri-add-line align-bottom me-1"></i>
                                            Add Student
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm" style="display: none;">
                                    <div class="d-flex justify-content-sm-end">
                                        <div class="search-box ms-2">
                                            <input type="text" class="form-control" id="searchProductList"
                                                placeholder="Search Products...">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active fw-semibold" data-bs-toggle="tab"
                                                href="#productnav-all" role="tab">
                                                All <span id="all_product_count"
                                                    class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1"></span>
                                            </a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a class="nav-link fw-semibold" data-bs-toggle="tab"
                                                href="#productnav-published" role="tab">
                                                Published <span 
                                                    class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1">0</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link fw-semibold" data-bs-toggle="tab"
                                                href="#productnav-draft" role="tab">
                                                Draft<span 
                                                    class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1">0</span>
                                            </a>
                                        </li> -->
                                    </ul>
                                </div>
                                <div class="col-auto">
                                    <div id="selection-element">
                                        <div class="my-n1 d-flex align-items-center text-muted">
                                            Select <div id="select-content" class="text-body fw-semibold px-1"></div>
                                            Result <button type="button"
                                                class="btn btn-link link-danger p-0 ms-3 material-shadow-none"
                                                data-bs-toggle="modal" data-bs-target="#removeItemModal">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card header -->
                        <div class="card-body">

                            <div class="tab-content text-muted">
                                <div class="tab-pane active" id="productnav-all" role="tabpanel">

                                    <table id="table-product-list-all" class="table nowrap align-middle table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>DOB</th>
                                                <th>Roll</th>
                                                <th>Created At</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-product-list-all-body">
                                            
                                        </tbody>
                                    </table>

                                </div>
                                <!-- end tab pane -->

                                <div class="tab-pane" id="productnav-published" role="tabpanel">
                                    <div id="table-product-list-published" class="table-card gridjs-border-none">
                                    <h5 class="mt-4">Sorry! No Result Found</h5>
                                    </div>
                                </div>
                                <!-- end tab pane -->

                                <div class="tab-pane" id="productnav-draft" role="tabpanel">
                                    <div class="py-4 text-center">
                                        <h5 class="mt-4">Sorry! No Result Found</h5>
                                    </div>
                                </div>
                                <!-- end tab pane -->
                            </div>
                            <!-- end tab content -->

                        </div>
                        <!-- end card body -->
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

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Studen Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-6">
                <label class="form-label" for="product-title-input">Select Class</label>
                    <select class="form-control" name="className" id="className" onchange="get_branches()">

                    </select>
                <div class="invalid-feedback">Please Enter a banner title.</div>
            </div>
            <div class="col-6">
                <label class="form-label" for="product-title-input">Select Branch</label>
                    <select class="form-control" name="branchName" id="branchName">
                        <option value="">Branch Not Found</option>
                    </select>
                <div class="invalid-feedback">Please Enter a banner title.</div>
            </div>
        <!-- </div> -->
        <!-- <div class="row"> -->
            <div class="col-4">
                <label class="form-label" for="product-title-input">Image</label>
                <input type="file" id="file-input" >
                <label for="file-input" id="btn_upload" class="btn btn-success">
                        Upload Image
                </label>
                <!-- <p id="num-of-files"></p>
                <div id="images"></div> -->
            </div>
            <div class="col-2">
                <p id="num-of-files"></p>
                <div id="images">
                    <img src="<?= base_url('public/assets/images/demo_profile.webp')?>" alt="">
                </div>
            </div>
            <div class="col-6">
                <label class="form-label" for="product-title-input">Name</label>
                    <input type="text" class="form-control" id="name" value=""
                        placeholder="Add Name" required="">
                <div class="invalid-feedback">Please Enter a title.</div>
            </div>
        <!-- </div> -->
        <!-- <div class="row"> -->
            <div class="col-6">
                <label class="form-label" for="product-title-input">Email</label>
                    <input type="text" class="form-control" id="email" value=""
                        placeholder="Add Email" required="">
                <div class="invalid-feedback">Please Enter a title.</div>
            </div>
            <div class="col-6">
                <label class="form-label" for="product-title-input">Phone</label>
                    <input type="text" class="form-control" id="phone" value=""
                        placeholder="Add Phone" required="">
                <div class="invalid-feedback">Please Enter a title.</div>
            </div>
        <!-- </div> -->
        <!-- <div class="row"> -->
            <div class="col-6">
                <label class="form-label" for="product-title-input">DOB</label>
                    <input type="date" class="form-control" id="dob" value=""
                        placeholder="Add DOB" required="">
                <div class="invalid-feedback">Please Enter a title.</div>
            </div>
            <div class="col-6">
                <label class="form-label" for="product-title-input">Roll</label>
                    <input type="text" class="form-control" id="roll" value=""
                        placeholder="Add Roll" required="">
                <div class="invalid-feedback">Please Enter a title.</div>
            </div>
            <div class="col-6">
                <label class="form-label" for="product-title-input">Password</label>
                    <input type="text" class="form-control" id="password" value=""
                        placeholder="Add Password" required="">
                <div class="invalid-feedback">Please Enter a title.</div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="student_add_btn" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>