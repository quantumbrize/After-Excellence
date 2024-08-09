<script>
    $(document).ready(function() {
        load_cities()
    });

    function load_cities() {
        $.ajax({
            url: "<?= base_url('/api/centres') ?>",
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
                        console.log(resp)
                        $.each(resp.data, function (index, centre) {
                            // let product_img = banner.img.length > 0 ? banner.img[0]['src'] : ''
                            html += `<tr>
                                            <td >
                                                <img src="<?= base_url('public/uploads/centres_images/') ?>${centre.centre_img}" alt="" class="city-img">
                                            </td>
                                            <td >
                                                ${centre.centre_name}
                                            </td>
                                            <td >
                                                ${centre.city_name}
                                            </td>
                                            <td >
                                                ${centre.location}
                                            </td>
                                            <td >
                                                ${centre.phone}
                                            </td>
                                            <td >
                                                <a class="btn btn-info" id="update-banner-btn" href="<?= base_url()?>admin/centres/update?centre_id=${centre.centre_id}">
                                                    <i class="ri-edit-line fs-15"></i>
                                                </a>
                                            </td>
                                            <td >
                                                <button class="btn btn-danger" id="${centre.centre_id}-delete-centre-btn" onclick="delete_centre('${centre.centre_id}')">
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

    function delete_centre(centre_id){
        // alert(banner_id)
        $.ajax({
            url: "<?= base_url('/api/centre/delete') ?>",
            type: "GET",
            data:{centre_id:centre_id},
            beforeSend: function () {
                $('#'+centre_id+'-delete-centre-btn').html(`<div class="spinner-border" role="status"></div>`)
                $('#'+centre_id+'-delete-centre-btn').attr('disabled', true)
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
                load_cities()
            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {
                $('#'+centre_id+'-delete-centre-btn').html(`submit`)
                $('#'+centre_id+'-delete-centre-btn').attr('disabled', false)
            }
        })
    }
</script>