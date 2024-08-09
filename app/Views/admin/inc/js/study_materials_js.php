<script>
    $(document).ready(function() {
        load_study_materials()
        
    });

    function formatDate(dateString) {
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        const date = new Date(dateString);
        const day = date.getDate();
        const month = months[date.getMonth()];
        const year = date.getFullYear();
        return `${day} ${month} ${year}`;
    }

    function load_study_materials() {
        $.ajax({
            url: "<?= base_url('/api/study-materials') ?>",
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
                        $.each(resp.data, function (index, study_materials) {
                            // let product_img = banner.img.length > 0 ? banner.img[0]['src'] : ''
                            let materials = ``
                            if(study_materials.type == 'pdf'){
                                materials = `<a href="javascript:void(0)" onclick="openModal('<?= base_url()?>public/uploads/study_material/${study_materials.pdf}')" class="btn btn-success"
                                                id="addproduct-btn">
                                                PDF
                                            </a>`
                            } else {
                                materials = `${study_materials.link}`
                            }
                            html += `<tr>
                                            <td>
                                                ${study_materials.class_name}
                                            </td>
                                            <td>
                                                ${study_materials.branch_name}
                                            </td>
                                            <td>
                                                ${study_materials.title}
                                            </td>
                                            <td>
                                                ${materials}
                                            </td>
                                            <td>
                                                ${formatDate(study_materials.created_at)}
                                            </td>
                                            <td>
                                                <a class="btn btn-info" id="update-banner-btn" href="<?= base_url()?>admin/update/study-materials?study_material_id=${study_materials.study_material_id}">
                                                    <i class="ri-edit-line fs-15"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger" id="${study_materials.study_material_id}-delete-banner-btn" onclick="delete_stydy_material('${study_materials.study_material_id}')">
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

    function openModal(path) {
        $('#exampleModalLong').modal('show');
        var pdf = document.getElementById('study_material_pdf');
        pdf.src = path;
    }
    function closeModal() {
        $('#exampleModalLong').modal('hide');
    }

   

    function delete_stydy_material(study_material_id){
        // alert(banner_id)
        $.ajax({
            url: "<?= base_url('/api/delete/study-materials') ?>",
            type: "GET",
            data:{study_material_id:study_material_id},
            beforeSend: function () {
                $('#'+study_material_id+'-delete-banner-btn').html(`<div class="spinner-border" role="status"></div>`)
                $('#'+study_material_id+'-delete-banner-btn').attr('disabled', true)
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
                load_study_materials()
            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {
                $('#'+study_material_id+'-delete-banner-btn').html(`submit`)
                $('#'+study_material_id+'-delete-banner-btn').attr('disabled', false)
            }
        })
    }
</script>