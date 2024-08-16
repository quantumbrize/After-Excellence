
<script>
    $('#student_add_btn').on('click', function () {
        var formData = new FormData();

        formData.append('className', $('#className').val());
        formData.append('branchName', $('#branchName').val());
        formData.append('user_name', $('#name').val());
        formData.append('phone', $('#phone').val());
        formData.append('email', $('#email').val());
        formData.append('dob', $('#dob').val());
        formData.append('roll', $('#roll').val());
        formData.append('password', $('#password').val());
        var file1 = $('#file-input')[0].files[0];
        if (file1) {
            formData.append('user_image', file1);
        }

        $.ajax({
            url: "<?= base_url('/api/user/student/add') ?>",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#student_add_btn').html(`<div class="spinner-border" role="status"></div>`)
                $('#student_add_btn').attr('disabled', true)

            },
            success: function (resp) {
                let html = ''

                if (resp.status) {
                    html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                    $('#name').val('');
                    $('#phone').val('');
                    $('#email').val('');
                    $('#dob').val('');
                    $('#roll').val('');
                    $('#password').val('');
                    $('#branchName').val('');
                    $('#images').html(`<img src="<?= base_url('public/assets/images/demo_profile.webp')?>" alt="">`);
                    classes()
                } else {
                    html += `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - ${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                }


                $('#alert').html(html)
                console.log(resp)
            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {
                $('#student_add_btn').html(`submit`)
                $('#student_add_btn').attr('disabled', false)
            }
        })
    })

    $('#student_update_btn').on('click', function () {
        var formData = new FormData();

        formData.append('className', $('#classNameUpdate').val());
        formData.append('branchName', $('#branchNameUpdate').val());
        formData.append('user_name', $('#nameUpdate').val());
        formData.append('phone', $('#phoneUpdate').val());
        formData.append('email', $('#emailUpdate').val());
        formData.append('dob', $('#dobUpdate').val());
        formData.append('roll', $('#rollUpdate').val());
        formData.append('password', $('#passwordUpdate').val());
        formData.append('user_id', $('#user_id').val());
        var file1 = $('#file-input-update')[0].files[0];
        if (file1) {
            formData.append('user_image', file1);
        }

        $.ajax({
            url: "<?= base_url('/api/update/student') ?>",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#student_update_btn').html(`<div class="spinner-border" role="status"></div>`)
                $('#student_update_btn').attr('disabled', true)

            },
            success: function (resp) {
                let html = ''

                if (resp.status) {
                    html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                    $('#UpdateModal').modal('hide')
                } else {
                    html += `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - ${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                }


                $('#alert').html(html)
                console.log(resp)
            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {
                $('#student_update_btn').html(`submit`)
                $('#student_update_btn').attr('disabled', false)
            }
        })
    })

    let $fileInput = $("#file-input");
    let $imageContainer = $("#images");
    let $numOfFiles = $("#num-of-files");

    function preview() {
        $imageContainer.html("");
        $numOfFiles.text(`${$fileInput[0].files.length} Files Selected`);

        $.each($fileInput[0].files, function (index, file) {
            let reader = new FileReader();
            let $figure = $("<figure>");
            let $figCap = $("<figcaption>").text(file.name);
            // $figure.append($figCap);
            reader.onload = function () {
                let $img = $("<img>").attr("src", reader.result).attr("id", "userImage");
                $figure.prepend($img);
                // $("#userImage").attr("src", reader.result);
            }
            $imageContainer.append($figure);
            reader.readAsDataURL(file);
        });
    }
    $fileInput.change(preview);

    let $fileInputUpdate = $("#file-input-update");
    let $imageContainerUpdate = $("#imagesUpdate");
    let $numOfFilesUpdate = $("#num-of-files-update");

    function preview2() {
        $imageContainerUpdate.html("");
        $numOfFilesUpdate.text(`${$fileInputUpdate[0].files.length} Files Selected`);

        $.each($fileInputUpdate[0].files, function (index, file) {
            let reader = new FileReader();
            let $figure = $("<figure>");
            let $figCap = $("<figcaption>").text(file.name);
            // $figure.append($figCap);
            reader.onload = function () {
                let $img = $("<img>").attr("src", reader.result).attr("id", "userImage");
                $figure.prepend($img);
                // $("#userImage").attr("src", reader.result);
            }
            $imageContainerUpdate.append($figure);
            reader.readAsDataURL(file);
        });
    }
    $fileInputUpdate.change(preview2);

    load_products();
    classes()
    function calculateFinalPrice(originalPrice, discountPercentage) {
        // Calculate the discount amount
        var discountAmount = (originalPrice * discountPercentage) / 100;
        
        // Calculate the final price after applying the discount
        var finalPrice = originalPrice - discountAmount;
        
        // Return the final price
        return finalPrice;
    }

    function formatDate(dateString) {
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        const date = new Date(dateString);
        const day = date.getDate();
        const month = months[date.getMonth()];
        const year = date.getFullYear();
        return `${day} ${month} ${year}`;
    }

    function redirect_single_product(user_id) {
        if ($(event.target).hasClass('stock_number_bx') || $(event.target).hasClass('btn-number')) {
            return false
        }else{
            window.location.href = "<?= base_url('/admin/users/student/single?user_id=') ?>" + user_id;
        }
    }

    function updateStock(product_id,type){
        let stock = parseInt($(`#input-stock-${product_id}`).val())
        stock = type == 'add' ? stock + 1 : stock  - 1;

        $.ajax({
            url: "<?= base_url('/api/product/stock/update') ?>",
            type: "GET",
            data: {
                p_id : product_id,
                stock: stock
            },
            beforeSend: function(){
                $(`#btn-stock-add-${product_id}`).attr('disabled', true)
                $(`#btn-stock-sub-${product_id}`).attr('disabled', true)
            },
            success: function(resp){
                $(`#btn-stock-add-${product_id}`).attr('disabled', false)
                $(`#btn-stock-sub-${product_id}`).attr('disabled', false)
                if(resp.status){
                    $(`#input-stock-${product_id}`).val(stock)
                    $('#alert').html(`<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                                        <i class="ri-checkbox-circle-fill label-icon"></i><strong>${resp.message}</strong>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>`) 
                }
            },
            error: function(err){
                console.log(err)
                $(`#btn-stock-add-${product_id}`).attr('disabled', false)
                $(`#btn-stock-sub-${product_id}`).attr('disabled', false)
                $('#alert').html(`<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                                    <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Internal Server Error
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>`)
            }
        })

    }


    function load_products() {
        $.ajax({
            url: "<?= base_url('/api/students') ?>",
            type: "GET",
            beforeSend: function () {
                $('#table-product-list-all-body').html(`<tr >
                        <td colspan="7"  style="text-align:center;">
                            <div class="spinner-border" role="status"></div>
                        </td>
                    </tr>`)
            },
            success: function (resp) {
                if (resp.status) {
                    if (resp.data.length > 0) {
                        $('#all_product_count').html(resp.data.length)
                        let html = ``
                        console.log(resp)
                        $.each(resp.data, function (index, student) {
                            let student_img = student.user_img.length > 0 ? student.user_img : ''
                            html += `<tr onclick="redirect_single_product('${student.user_id}')">
                                            <td >
                                                <img src="<?= base_url('public/uploads/user_images/') ?>${student_img}" alt="" class="product-img">
                                            </td>
                                            <td >
                                                ${student.user_name}
                                            </td>
                                            <td >
                                                ${student.email}
                                            </td>
                                            <td >
                                                ${student.number}
                                            </td>
                                            <td >
                                                ${student.dob}
                                            </td>
                                            <td >
                                                ${student.student_roll[0].student_roll}
                                            </td>
                                            <td >
                                                ${formatDate(student.created_at)}
                                            </td>
                                            <td >
                                                ${student.status}
                                            </td>
                                            <td >
                                                <button onclick="event.stopPropagation(); update_student('${student.user_id}')" class="btn btn-info">Edit</button>
                                            </td>
                                        </tr>`
                        })
                        $('#table-product-list-all-body').html(html)
                        $('#table-product-list-all').DataTable();
                    }
                }

            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {

            }
        })
    }

    function classes(){
        $.ajax({
            url: "<?= base_url('/api/class-list') ?>",
            type: "GET",
            beforeSend: function () { },
            success: function (resp) {
                // console.log(resp)
                let html = '<option value="">Select-Class</option>'
                if (resp.status) {
                    $.each(resp.data, function (key, val) {
                        html += `<option value="${val.class_id}">${val.class_name}</option>`
                    })
                }
                $('#className').html(html)
                $('#classNameUpdate').append(html)
            },
            error: function (err) {
                console.log(err)
            }
        })
    }

    function get_branches(){
        var class_id = $('#className').val()
        $.ajax({
            url: "<?= base_url('/api/branches') ?>",
            type: "GET",
            data: {class_id:class_id},
            beforeSend: function () { },
            success: function (resp) {
                // console.log(resp)
                let html = '<option value="">Select-Branch</option>'
                if (resp.status) {
                    $.each(resp.data, function (key, val) {
                        html += `<option value="${val.branch_id}">${val.branch_name}</option>`
                    })
                }
                $('#branchNameUpdate').empty()
                $('#branchName').html(html)
                $('#branchNameUpdate').append(html)
            },
            error: function (err) {
                console.log(err)
            }
        })
    }

    function update_student(user_id){
        // alert(user_id)
        $.ajax({
                url: "<?= base_url('/api/students') ?>",
                type: 'GET',
                data: {
                    user_id: user_id
                },
                beforeSend: function () { },
                success: function (resp) {
                    console.log(resp);
                    if (resp.status) {
                        $('#classNameUpdate').empty()
                        $('#branchNameUpdate').empty()
                        $('#classNameUpdate').html(`<option selected value="${resp.data.student_roll[0].class_id}">${resp.data.student_roll[0].class_name}</option>`)
                        classes()
                        $('#branchNameUpdate').html(`<option selected value="${resp.data.student_roll[0].branch_id}">${resp.data.student_roll[0].branch_name}</option>`)
                        get_branches()
                        $('#imagesUpdate').html(`<img src="<?= base_url('public/uploads/user_images/')?>${resp.data.user_img}" alt="">`)
                        $('#nameUpdate').val(resp.data.user_name)
                        $('#emailUpdate').val(resp.data.email)
                        $('#phoneUpdate').val(resp.data.number)
                        $('#dobUpdate').val(resp.data.dob)
                        $('#rollUpdate').val(resp.data.student_roll[0].student_roll)
                        $('#passwordUpdate').val(resp.data.password)
                        $('#user_id').val(resp.data.user_id)
                        $('#UpdateModal').modal('show')
                        load_products()
                    }
                },
                error: function (err) {
                    console.log(err)
                }

            })
    }



</script>