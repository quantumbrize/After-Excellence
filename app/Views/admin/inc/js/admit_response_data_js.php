<script>
    $(document).ready(function() {
        load_all_offline_students()
    });

    function formatDate(dateString) {
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        const date = new Date(dateString);
        const day = date.getDate();
        const month = months[date.getMonth()];
        const year = date.getFullYear();
        return `${day} ${month} ${year}`;
    }

    function load_all_offline_students() {
        $.ajax({
            url: "<?= base_url('/api/admit/user/data') ?>",
            type: "GET",
            beforeSend: function () {
                $('#table-banner-list-all-body').html(`<tr>
                        <td colspan="7"  style="text-align:center;">
                            <div class="spinner-border" role="status"></div>
                        </td>
                    </tr>`)
            },
            success: function (resp) {
                if (resp.status) {
                    if (resp.data.length > 0) {
                        $('#all_banner_count').html(resp.data.length)
                        let html = ``
                        console.log(resp.data)
                        $.each(resp.data, function (index, admit_data) {
                            // let product_img = banner.img.length > 0 ? banner.img[0]['src'] : ''
                            var question_data = ``
                            var answer_data = ``
                            var user_questions = JSON.parse(admit_data.questions, true)
                            var user_answers = JSON.parse(admit_data.answers, true)
                            $.each(user_questions, function (index, questions) {
                                question_data += `${questions}<br>`
                            })
                            $.each(user_answers, function (index, answer) {
                                answer_data += `${answer}<br>`
                            })
                            
                            html += `<tr>
                                        <td>
                                            ${admit_data.class_name}
                                        </td>
                                        <td>
                                            ${admit_data.branch_name}
                                        </td>
                                        <td>
                                            ${admit_data.name}
                                        </td>
                                        <td>
                                            ${admit_data.email}
                                        </td>
                                        <td>
                                            ${admit_data.phone}
                                        </td>
                                        <td>
                                            ${admit_data.dob}
                                        </td>
                                        <td>
                                            ${admit_data.address}
                                        </td>
                                        <td>
                                            <img src="<?= base_url('public/uploads/user_images/') ?>${admit_data.img}" alt="" class="product-img">
                                        </td>
                                        <td>
                                            ${question_data}
                                        </td>
                                        <td>
                                            ${answer_data}
                                        </td>
                                        <td>
                                            <button type="button" id="${admit_data.submit_admit_data_id}-delete-student-btn" onclick="delete_offline_user('${admit_data.email}', '${admit_data.submit_admit_data_id}')" class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>`;
                        })
                        $('#table-banner-list-all-body').html(html)
                        $('#table-banner-list-all').DataTable();
                    }
                }else{
                    // $('#table?
                }

            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {
               
            }
        })
    }

    function delete_offline_user(user_email, submit_admit_data_id){
        // alert(banner_id)
        $.ajax({
            url: "<?= base_url('/api/offline-user/delete') ?>",
            type: "GET",
            data:{submit_admit_data_id:submit_admit_data_id},
            beforeSend: function () {
                $('#'+submit_admit_data_id+'-delete-student-btn').html(`<div class="spinner-border" role="status"></div>`)
                $('#'+submit_admit_data_id+'-delete-student-btn').attr('disabled', true)
            },
            success: function (resp) {
                var html = ""
                console.log(resp)
                if (resp.status) {
                    html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                }else{
                    alert("faild")
                    html += `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - ${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                }
                $('#alert').html(html)
                load_all_offline_students()

            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {
                
                // $('#'+submit_admit_data_id+'-delete-student-btn').html(`submit`)
                // $('#'+submit_admit_data_id+'-delete-student-btn').attr('disabled', false)
            }
        })
    }
</script>