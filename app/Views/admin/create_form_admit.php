<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">Add Admit Form</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                            <li class="breadcrumb-item active">Add Class Link</li>
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
                        <label class="form-label" for="product-title-input"><b>Default Input fields</b></label>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-lg-6 mt-4">
                                        <input type="text" class="form-control" name="" id="" placeholder="Full Name" disabled>
                                    </div>
                                    <div class="col-lg-6 mt-4">
                                        <input type="text" class="form-control" name="" id="" placeholder="Email Id" disabled>
                                    </div>
                                    <div class="col-lg-6 mt-4">
                                        <input type="text" class="form-control" name="" id="" placeholder="Phone No" disabled>
                                        
                                    </div>
                                    <div class="col-lg-6 mt-4">
                                        <input type="text" class="form-control" name="" id="" placeholder="Date Of birth" disabled>
                                    </div>
                                    <div class="col-lg-6 mt-4">
                                        <input type="text" class="form-control" name="" id="" placeholder="Address" disabled>
                                    </div>
                                    <div class="col-lg-6 mt-4">
                                        <input type="text" class="form-control" name="" id="" placeholder="Photo" disabled>
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
                                <!-- <div class="row">
                                    <div class="col-xl-8 col-lg-8">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2">Question</label>
                                            <input type="text" class="form-control" name="questions[]" id="questions[]" placeholder="Enter a question" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-2">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Input Type</label>
                                            <select class="form-control" name="inputType[]" id="inputType[]">
                                                <option selected disabled value="">select-input-type</option>
                                                <option value="text">Text</option>
                                                <option value="number">Number</option>
                                                <option value="date">Date</option>
                                                <option value="time">time</option>
                                                <option value="file">File</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> -->
                            </div>    
                                <input type="hidden" value="0" id="total_chq">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->





                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                        <label class="form-label" for="product-title-input"><b>Add Centres</b></label>
                            <div class="mb-3">
                                <!-- <label class="form-label" for="product-title-input">Select Class</label> -->
                                <button type="button" onclick="add_centre()" class="btn btn-primary">Add</button>
                                <!-- <button type="button" onclick="remove()" class="btn btn-primary">Remove</button> -->

                            <div id="new_centre">
                                
                            </div>    
                                <input type="hidden" value="0" id="total_centre">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                        <label class="form-label" for="product-title-input"><b>Add Date</b></label>
                            <div class="mb-3">
                                <!-- <label class="form-label" for="product-title-input">Select Class</label> -->
                                <button type="button" onclick="add_date()" class="btn btn-primary">Add</button>
                                <!-- <button type="button" onclick="remove()" class="btn btn-primary">Remove</button> -->

                            <div id="new_date">
                                
                            </div>    
                                <input type="hidden" value="0" id="total_date">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                        <label class="form-label" for="product-title-input"><b>Add Time</b></label>
                            <div class="mb-3">
                                <!-- <label class="form-label" for="product-title-input">Select Class</label> -->
                                <button type="button" onclick="add_time()" class="btn btn-primary">Add</button>
                                <!-- <button type="button" onclick="remove()" class="btn btn-primary">Remove</button> -->

                            <div id="new_time">
                                
                            </div>    
                                <input type="hidden" value="0" id="total_time">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->



























                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input"><b>Importan Notes</b></label>
                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Select Class</label>
                                    <input type="text" class="form-control" id="noteTitle" value="" placeholder="Enter title" required="">
                                </div>
                            </div>
                            <div>
                                <label>About Note</label>

                                <div id="ckeditor-classic">

                                </div>
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