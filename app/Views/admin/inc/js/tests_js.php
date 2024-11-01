<script>
    $(document).ready(function() {
        load_tests()
    });

    function formatDate(dateString) {
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        const date = new Date(dateString);
        const day = date.getDate();
        const month = months[date.getMonth()];
        const year = date.getFullYear();
        return `${day} ${month} ${year}`;
    }

    function load_tests() {
        var user_id = '<?= !empty($_SESSION[SES_ADMIN_USER_ID]) ? $_SESSION[SES_ADMIN_USER_ID] : $_SESSION[SES_STAFF_USER_ID] ?>'
        $.ajax({
            url: "<?= base_url('/api/tests') ?>",
            data:{user_id:user_id},
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
                        $.each(resp.data, function (index, test) {
                            // let product_img = banner.img.length > 0 ? banner.img[0]['src'] : ''
                            html += `<tr>
                                            <td>
                                                ${test.class_name}
                                            </td>
                                            <td>
                                                ${test.branch_name}
                                            </td>
                                            <td>
                                                ${formatDate(test.created_at)}
                                            </td>
                                            <td>
                                                <a class="btn btn-info" id="update-banner-btn" href="<?= base_url()?>admin/test/update?test_id=${test.test_id}">
                                                    <i class="ri-edit-line fs-15"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger" id="${test.test_id}-delete-banner-btn" onclick="delete_test('${test.test_id}')">
                                                    <i class="ri-delete-bin-line fs-15"></i>
                                                </button>
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

    function delete_test(test_id){
        // alert(banner_id)
        $.ajax({
            url: "<?= base_url('/api/test/delete') ?>",
            type: "GET",
            data:{test_id:test_id},
            beforeSend: function () {
                $('#'+test_id+'-delete-banner-btn').html(`<div class="spinner-border" role="status"></div>`)
                $('#'+test_id+'-delete-banner-btn').attr('disabled', true)
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
                load_tests()
            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {
                // $('#'+test_id+'-delete-banner-btn').html(`submit`)
                // $('#'+test_id+'-delete-banner-btn').attr('disabled', false)
            }
        })
    }
</script>