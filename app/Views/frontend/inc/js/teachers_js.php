<script>
    
    $(document).ready(function () {
        // var userId = '<?= $_COOKIE[SES_USER_USER_ID] ?>';
        // if (userId) {
        //     study_materials(userId);
        // } else {
        //     console.error('User ID cookie not found.');
        // }
        load_staff()
        
    })

    function load_staff() {

        $.ajax({
            url: '<?= base_url('/api/user/staff/') ?>',
            type: "GET",
            beforeSend: function () {
                $('#staff_table_data').html(`<tr>
                                            <td colspan="5">
                                                <center>
                                                    <div class="spinner-border text-success" role="status"></div>
                                                </center>
                                            </td>
                                        </tr>`)
            },
            success: function (resp) {
                console.log(resp)
                if (resp) {
                    let html = ''
                    $.each(resp.data, function (index, item) {
                        console.log(item.staff_name)
                        // html += `<tr>
                        //         <td>${item.staff_name}</td>
                        //         <td><img src="<?= base_url('public/uploads/user_images/') ?>${item.user_image}" alt="" class="product-img"></td>
                        //         <td>${item.staff_role}</td>
                        //         <td>${item.staff_number}</td>
                        //         <td>${item.staff_email}</td>
                        //         <td>
                        //             <i 
                        //                 style="margin-right: 20px; cursor: pointer;"
                        //                 class="ri-edit-2-line text-primary d-inline-block edit-item-btn fs-16" 
                        //                 onclick="open_staff('${item.staff_id}')">
                        //             </i>
                        //             <i 
                        //                 style="margin-right: 20px; cursor: pointer;"
                        //                 class="ri-delete-bin-line text-danger d-inline-block remove-item-btn fs-16" 
                        //                 onclick="delete_staff('${item.staff_id}')">
                        //             </i>
                        //         </td>
                        //     </tr>`

                            html += `<div onclick="window.location.href='<?= base_url()?>study-material?teacher_id=${item.user_id}'" class="section-item teacher-section">
                                        <img src="<?= base_url('public/uploads/user_images/') ?>${item.user_image}" alt="Description of Image 1" class="section-image">
                                        <div class="section-title">${item.staff_name}</div>
                                    </div>`

                    })
                    $('#staff_data').html(html)

                }
            },
            error: function (err) {
                console.err(err)
            }
        })
    }

    function search_teacher() {
       let user_id = '<?= $_COOKIE[SES_USER_USER_ID] ?>';
       let alphabet = $('#searchTeacher').val()
        //    console.log(user_id)
        //    console.log(alphabet)
       $.ajax({
           url: "<?= base_url('/api/search/teacher') ?>",
           type: "GET",
           data:{
                alph: alphabet
            },
           beforeSend: function () {
           },
           success: function (resp) {
               console.log(resp)
               if (resp.status) {
                let html = ''
                    $.each(resp.data, function (index, item) {
                        console.log(item.staff_name)
                            html += `<div onclick="window.location.href='<?= base_url()?>study-material?teacher_id=${item.user_id}'" class="section-item teacher-section">
                                        <img src="<?= base_url('public/uploads/user_images/') ?>${item.user_image}" alt="Description of Image 1" class="section-image">
                                        <div class="section-title">${item.staff_name}</div>
                                    </div>`

                    })
                    $('#staff_data').html(html)
               } else {
                $('#staff_data').html(`<span style="color: red; display: block; text-align: center; margin: 0 auto;">Teacher Not Found!</span>`);
               }

           },
           error: function (err) {
               console.log(err)
           },
           complete: function () {

           }
       })
    }
</script>