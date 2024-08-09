
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">


                <div class="card">
                    <div class="card-header">
                        <h3> <?= $title ?></h3>
                    </div>
                    <div class="row p-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                            <label class="form-label" for="product-title-input">Class Name: </label>
                                            <input type="text" class="form-control" id="className" value=""
                                                placeholder="Enter class name" required="">
                                    </div>
                                <!-- end card -->

                                </div>
                                <!-- end col -->
                            </div>
                            <div class="accordion" id="accordion">
                            <label class="form-label" for="product-title-input">Add Branches: </label>
                            <button class="btn btn-success" onclick="add()">Add +</button>
                            <button class="btn btn-danger" onclick="remove()">remove -</button>
                            <div class="row mt-2">
                                <div id="new_chq">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="new_" value=""
                                                placeholder="Enter branch name 1" required="">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" value="1" id="total_chq">
                            </div>

                            <!-- <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                            <label class="form-label" for="product-title-input">Add Branches </label><i class="ri-link"></i>
                                            <input type="text" class="form-control" id="classLink" value=""
                                                placeholder="Put a link here" required="">
                                    </div>

                                </div>
                            </div> -->







                            </div>



                            <div class="text-start mb-3">
                                <button class="btn btn-success w-sm" onclick="update_class_and_branches_data()" id="class_and_branches_update_btn">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">


                <div class="card">
                    <div class="card-header" id="class_name">
                        <!-- <h3>Classes & Branches</h3> -->
                    </div>
                    <div class="row">
                        <div class="card-body">
                            <table class="table">
                                <tbody id="product_details">
                                    <!-- <tr>
                                        <td>Branch Name</td>
                                        <td></td>
                                    </tr> -->
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  Small modal example -->
    <div class="modal fade bs-example-modal-md" id="delete_modal" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true" style="opacity: 1;">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mySmallModalLabel">Do Youn Really Want to Delete This Category</h5>
                </div>
                <div class="modal-body">
                    <h3 class="fs-15">All the Sub Categories will Also be deleted</h3>
                    <input type="text" id="delete_cat_id" hidden>
                    <input type="text" id="delete_cat_bx" hidden>
                </div>
                <div class="modal-footer">
                    <a  class="btn btn-link link-success fw-medium material-shadow-none" data-bs-dismiss="modal" onclick="hide_delete_modal()">
                        <i class="ri-close-line me-1 align-middle"></i> 
                        Close
                    </a>
                    <button type="button" class="btn btn-danger" id="delete_action_btn" onclick="delete_category_action()">DELETE</button>
                </div>
            </div>
        </div>
    </div>
</div>