<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0"> <?= $title ?></h4>

                </div>
            </div>
        </div>
        <div id="createproduct-form">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Staff Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div id="images"></div>
                                <label class="form-label" for="product-image-input">User Image</label>
                                <input type="file" id="file-input"  multiple>
                                <label for="file-input" id="btn_upload" class="btn btn-success">
                                    <i class="fas fa-upload"></i> &nbsp; Select User Image
                                </label>
                                <p id="num-of-files"></p>
                                
                            </div>
                            <div class="mb-3">
                                <label class="form-label" >Staff Name</label>
                                <input type="text" class="form-control" id="staff-name" placeholder="Enter Staff Name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" >Staff Role</label>
                                <input type="text" class="form-control" id="staff-role" placeholder="Enter Staff Role">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" >Phone Number</label>
                                <input type="text" class="form-control" id="staff-number" placeholder="Enter Staff Phone Number">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" >Email</label>
                                <input type="text" class="form-control" id="staff-email" placeholder="Enter Staff Email">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" >Password</label>
                                <input type="text" class="form-control" id="staff-password" placeholder="Password">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Staff Access</h5>
                        </div>
                        <div class="card-body" id="access_bx">
                           
                        </div>
                        <!-- end card body -->
                    </div>
                </div>
            </div>

        </div>
        <div class="text-start mb-3">
            <button class="btn btn-success w-sm" id="staff_add_btn">Add</button>
        </div>
    </div>
</div>