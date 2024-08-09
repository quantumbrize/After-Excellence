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
            url: "<?= base_url('/api/class-and-branches') ?>",
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
                    if (resp.data.length > 0) {
                        $('#all_banner_count').html(resp.data.length)
                        let html = ``
                        console.log(resp.data[0].branches)
                        $.each(resp.data, function (index, class_branches) {
                            // let product_img = banner.img.length > 0 ? banner.img[0]['src'] : ''
                            html += `<tr>
                                        <td>
                                            ${class_branches.class_name}
                                        </td>
                                        <td>`;
                                        class_branches.branches.forEach(branch => {
                                            html += `${branch.branch_name},<br>`;
                                        });
                            html += `   </td>
                                        <td>
                                            ${formatDate(class_branches.created_at)}
                                        </td>
                                        <td>
                                            <a class="btn btn-info" id="update-banner-btn" href="<?= base_url()?>admin/classes-branches/update?class_id=${class_branches.class_id}">
                                                <i class="ri-edit-line fs-15"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger" id="${class_branches.class_id}-delete-banner-btn" onclick="delete_class_and_branches('${class_branches.class_id}')">
                                                <i class="ri-delete-bin-line fs-15"></i>
                                            </button>
                                        </td>
                                    </tr>`;
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