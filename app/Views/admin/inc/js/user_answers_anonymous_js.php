<script>
    $(document).ready(function() {
        load_user_answers('<?= $_GET['user_email']?>')
    });

    function formatDate(dateString) {
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        const date = new Date(dateString);
        const day = date.getDate();
        const month = months[date.getMonth()];
        const year = date.getFullYear();
        return `${day} ${month} ${year}`;
    }

    function load_user_answers(email_id) {
        $.ajax({
            url: "<?= base_url('/api/all/given-answers/anonymous') ?>",
            data:{email_id:email_id},
            type: "GET",
            beforeSend: function () {
                $('#table-banner-list-all-body').html(`<tr >
                        <td colspan="7"  style="text-align:center;">
                            <div class="spinner-border" role="status"></div>
                        </td>
                    </tr>`)
            },
            success: function (resp) {
                if (resp.status) {
                    console.log(resp)
                    if (resp.data.length > 0) {
                        $('#all_banner_count').html(resp.data.length)
                        let html = ``
                        console.log(resp)
                        $.each(resp.data, function (index, ans) {
                            // let product_img = banner.img.length > 0 ? banner.img[0]['src'] : ''
                            var answer = ''
                            if(ans.question_type == 'mcq'){
                                if(ans.ans_selected == 'a'){
                                    var answer = ans.a

                                }else if(ans.ans_selected == 'b'){
                                    var answer = ans.b

                                }else if(ans.ans_selected == 'c'){
                                    var answer = ans.c

                                }else if(ans.ans_selected == 'd'){
                                    var answer = ans.d

                                }
                            }else if(ans.question_type == 'saq'){
                                var answer = ans.ans
                            }
                             var right_answer = ''
                            if(ans.question_type == 'mcq'){
                                if(ans.right_ans == 'a'){
                                    var right_answer = ans.a

                                }else if(ans.right_ans == 'b'){
                                    var right_answer = ans.b

                                }else if(ans.right_ans == 'c'){
                                    var right_answer = ans.c

                                }else if(ans.right_ans == 'd'){
                                    var right_answer = ans.d

                                }
                            }
                            html += `<tr>
                                            <td>
                                                ${index+1}
                                            </td>
                                            <td>
                                                ${ans.question}
                                            </td>
                                            <td>
                                                ${ans.question_type}
                                            </td>
                                            <td>
                                                ${answer}
                                            </td>
                                            <td>
                                                ${right_answer}
                                            </td>
                                            
                                        </tr>`
                        })
                        $('#table-banner-list-all-body').html(html)
                        $('#table-banner-list-all').DataTable();
                    }
                }else{
                    $('#table-banner-list-all-body').html(`<tr >
                        <td>
                            DATA NOT FOUND!
                        </td>
                    </tr>`)
                }

            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {
               
            }
        })
    }

    // function delete_test(test_id){
    //     // alert(banner_id)
    //     $.ajax({
    //         url: "<?= base_url('/api/test/delete') ?>",
    //         type: "GET",
    //         data:{test_id:test_id},
    //         beforeSend: function () {
    //             $('#'+test_id+'-delete-banner-btn').html(`<div class="spinner-border" role="status"></div>`)
    //             $('#'+test_id+'-delete-banner-btn').attr('disabled', true)
    //         },
    //         success: function (resp) {
    //             var html = ""
    //             if (resp.status) {
    //                 html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
    //                             <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
    //                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //                         </div>`
    //             }else{
    //                 html += `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
    //                             <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - ${resp.message}
    //                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //                         </div>`
    //             }
    //             $('#alert').html(html)
    //             load_tests()
    //         },
    //         error: function (err) {
    //             console.log(err)
    //         },
    //         complete: function () {
    //             // $('#'+test_id+'-delete-banner-btn').html(`submit`)
    //             // $('#'+test_id+'-delete-banner-btn').attr('disabled', false)
    //         }
    //     })
    // }
</script>