<script>
    $(document).ready(function() {
        load_class_and_branches()
    });

    function formatDate(dateString) {
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        const date = new Date(dateString);
        const day = date.getDate();
        const month = months[date.getMonth()];
        const year = date.getFullYear();
        return `${day} ${month} ${year}`;
    }

    function load_class_and_branches() {
        $.ajax({
            url: "<?= base_url('/api/results') ?>",
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
                        console.log(resp)
                        $.each(resp.data, function (index, result) {
                            // let product_img = banner.img.length > 0 ? banner.img[0]['src'] : ''
                            var question_data = ``
                            var answer_data = ``
                            var right_answer_data = ``
                            var marks_data = ``
                            var total_obtained_marks= 0
                            var user_questions = JSON.parse(result.questions, true)
                            var user_answers = JSON.parse(result.answer, true)
                            var user_right_answer_data = JSON.parse(result.right_ans, true)
                            var user_marks_data = JSON.parse(result.marks, true)
                            $.each(user_questions, function (index, questions) {
                                question_data += `${questions}<br>`
                            })
                            $.each(user_answers, function (index, answer) {
                                answer_data += `${answer}<br>`
                            })
                            $.each(user_right_answer_data, function (index, right_answer) {
                                right_answer_data += `${right_answer}<br>`
                            })
                            $.each(user_marks_data, function (index, marks) {
                                total_obtained_marks += parseFloat(marks)
                                marks_data += `${marks}<br>`
                            })
                            
                            html += `<tr>
                                        <td>
                                            ${result.name}
                                        </td>
                                        <td>
                                            ${result.email}
                                        </td>
                                        <td>
                                            ${result.phone}
                                        </td>
                                        <td>
                                            ${result.total_marks}
                                        </td>
                                        <td>
                                            <a class="btn btn-success" href="<?=base_url()?>admin/results/qna?result_id=${result.result_id}">
                                                View qna
                                            </a>
                                        </td>
                                        <td>
                                            ${total_obtained_marks}
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

    function delete_class_and_branches(class_id){
        // alert(banner_id)
        $.ajax({
            url: "<?= base_url('/api/delete/class-and-branches') ?>",
            type: "GET",
            data:{class_id:class_id},
            beforeSend: function () {
                $('#'+class_id+'-delete-banner-btn').html(`<div class="spinner-border" role="status"></div>`)
                $('#'+class_id+'-delete-banner-btn').attr('disabled', true)
            },
            success: function (resp) {
                var html = ""
                if (resp.status) {
                    html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                }else{
                    html += `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - ${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                }
                $('#alert').html(html)
                load_class_and_branches()
            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {
                $('#'+class_id+'-delete-banner-btn').html(`submit`)
                $('#'+class_id+'-delete-banner-btn').attr('disabled', false)
            }
        })
    }
</script>