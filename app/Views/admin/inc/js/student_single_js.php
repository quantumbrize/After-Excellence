<script>
    function calculateFinalPrice(originalPrice, discountPercentage) {
        // Calculate the discount amount
        var discountAmount = (originalPrice * discountPercentage) / 100;
        
        // Calculate the final price after applying the discount
        var finalPrice = originalPrice - discountAmount;
        
        // Return the final price
        return finalPrice;
    }

    var student_id = ''
    $(document).ready(function () {

            get_student_data('<?= $_GET['user_id'] ?>');

            var student;

            function formatDate(dateString) {
            const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            const date = new Date(dateString);
            const day = date.getDate();
            const month = months[date.getMonth()];
            const year = date.getFullYear();
            return `${day} ${month} ${year}`;
        }

        function get_student_data(user_id) {
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
                        student = resp.data;
                        student_id = student.user_id
                        let html = `<tr>
                                        <td>id</td>
                                        <td style="text-align: right" class="text-secondary">${student.user_id}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td style="text-align: right" class="text-secondary">${student.email} </td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td style="text-align: right" class="text-secondary">${student.number} </td>
                                    </tr>
                                    <tr>
                                        <td>Date Of Birth</td>
                                        <td style="text-align: right" class="text-secondary">${formatDate(student.dob)}</td>
                                    </tr>
                                    <tr>
                                        <td>Password</td>
                                        <td style="text-align: right" class="text-secondary">${student.password} </td>
                                    </tr>
                                    <tr>
                                        <td>Login PIN</td>
                                        <td style="text-align: right" class="text-secondary">${student.login_code} </td>
                                    </tr>
                                   
                                    
                                    
                                    `
                        $('#student_details').html(html);

                        let student_img = `<img src="<?= base_url('public/uploads/user_images/') ?>${student.user_img}" alt="" class="course-img">
                                            <div class="text-center">
                                                <p class="course_name">${student.user_name}</p>
                                                
                                                <span style="font-weight:bold;">Status</span>
                                                <select class="form-control status" onchange="update_status()" id="user_status">
                                                    <option value="${student.status}">${student.status}</option>
                                                    <option value="active">active</option>
                                                    <option value="inactive">inactive</option>
                                                </select>
                                                <div class="text-start mb-3 mt-3 class-roll-btn">
                                                    <button class="btn btn-success w-sm" id="test_add_btn" onclick="creatRoll()">Create</button>
                                                </div>
                                                <table class="table">
                                                    <tbody id="student_details">
                                                        <tr>
                                                            <td>Class:</td>
                                                            <td style="text-align: right" class="text-secondary">${student.student_roll[0]?student.student_roll[0].class_name:""}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Branch:</td>
                                                            <td style="text-align: right" class="text-secondary">${student.student_roll[0]?student.student_roll[0].branch_name:""}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Roll:</td>
                                                            <td style="text-align: right" class="text-secondary">${student.student_roll[0]?student.student_roll[0].student_roll:""}</td>
                                                        </tr>
                                                       
                                                    </tbody>
                                                </table>
                                            </div>`
                        $('#course_image').html(student_img);
                    }
                },
                error: function (err) {
                    console.log(err)
                }

            })
        }

        
        $('#roll_add_btn').on('click', function () {
            var formData = new FormData();

            let class_id = $('#className').val()
            let branch_id = $('#branchName').val()
            let roll = $('#studentRoll').val()

            // var file = $('#images')[0].files;

            formData.append('class_id', class_id);
            formData.append('branch_id', branch_id);
            formData.append('roll', roll);
            formData.append('user_id', student_id);
        
            //console.log('Selected Access:', selectedAccess);
            $.ajax({
                url: '<?= base_url('/api/student-roll/add') ?>',
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () { },
                success: function (resp) {
                    console.log(resp)
                    let html = ''
                    if (resp.status) {
                        html = `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                    <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>`
                        $('#alert').html(html)
                        get_student_data('<?= $_GET['user_id'] ?>');
                        // setTimeout(function () {
                        //     window.location.href = "<?= base_url('/admin/users/staff') ?>";
                        // }, 2000)

                    } else {
                        html = `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - ${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                        $('#alert').html(html)
                    }


                },
                error: function (err) {
                    console.error(err)
                }
            })
        })
    });

    function update_status(){
        // alert('hello')
        var user_status = $('#user_status').val()
        var user_id = '<?= $_GET['user_id'] ?>'
        $.ajax({
                url: "<?= base_url('/api/update/user/status') ?>",
                type: 'POST',
                data: {
                    user_id: user_id,
                    user_status: user_status,
                },
                beforeSend: function () { },
                success: function (resp) {
                    console.log(resp);
                        let html = ''
                    if (resp.status) {
                        html = `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                    <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>`
                        $('#alert').html(html)
                        get_student_data('<?= $_GET['user_id'] ?>');
                    } else {
                        html = `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - ${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                        $('#alert').html(html)
                    }
                    
                },
                error: function (err) {
                    console.log(err)
                }

            })

    }

    function creatRoll(){
        classes()
        // get_branches()
        $('#addClassAndCreatRollModal').modal('show')
    }

    

    function generateRollNumber() {
        const prefix = "FLORALMS";
        const digits = Math.floor(Math.random() * 900000) + 100000;
        const rollNumber = prefix + digits;
        $('#studentRoll').val(rollNumber);
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
                $('#branchName').html(html)
            },
            error: function (err) {
                console.log(err)
            }
        })
    }

</script>