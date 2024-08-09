<script>
    $(document).ready(function() {
        load_popular_papers()
        
    });

    function formatDate(dateString) {
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        const date = new Date(dateString);
        const day = date.getDate();
        const month = months[date.getMonth()];
        const year = date.getFullYear();
        return `${day} ${month} ${year}`;
    }

    function load_popular_papers() {
        $.ajax({
            url: "<?= base_url('/api/popular-papers') ?>",
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
                        $.each(resp.data, function (index, popular_paper) {
                            // let product_img = banner.img.length > 0 ? banner.img[0]['src'] : ''
                            let materials = ``
                            if(popular_paper.type == 'pdf'){
                                materials = `<a href="javascript:void(0)" onclick="openModal('<?= base_url()?>public/uploads/study_material/${popular_paper.pdf}')" class="btn btn-success"
                                                id="addproduct-btn">
                                                PDF
                                            </a>`
                            } else {
                                materials = `${popular_paper.link}`
                            }
                            html += `<tr>
                                            <td>
                                                ${popular_paper.class_name}
                                            </td>
                                            <td>
                                                ${popular_paper.branch_name}
                                            </td>
                                            <td>
                                                ${popular_paper.title}
                                            </td>
                                            <td>
                                                ${popular_paper.description}
                                            </td>
                                            <td>
                                                ${popular_paper.keyword}
                                            </td>
                                            <td>
                                            <img src="<?= base_url('public/uploads/popular_paper/') ?>${popular_paper.img}" alt="" class="product-img">
                                                
                                            </td>
                                            <td>
                                                ${materials}
                                            </td>
                                            <td>
                                                ${formatDate(popular_paper.created_at)}
                                            </td>
                                            <td>
                                                <a class="btn btn-info" id="update-banner-btn" href="<?= base_url()?>admin/update/popular-papers?popular_paper_id=${popular_paper.popular_paper_id}">
                                                    <i class="ri-edit-line fs-15"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger" id="${popular_paper.popular_paper_id}-delete-banner-btn" onclick="delete_popular_paper('${popular_paper.popular_paper_id}')">
                                                    <i class="ri-delete-bin-line fs-15"></i>
                                                </button>
                                            </td>

                                        </tr>`
                        })
                        // <td>
                        //                         <a class="btn btn-info" id="update-banner-btn" href="<?= base_url()?>admin/live-classes/update?live_class_id=${live_class.live_class_id}">
                        //                             <i class="ri-edit-line fs-15"></i>
                        //                         </a>
                        //                     </td>
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

   

    function delete_popular_paper(popular_paper_id){
        // alert(banner_id)
        $.ajax({
            url: "<?= base_url('/api/delete/popular-paper') ?>",
            type: "GET",
            data:{popular_paper_id:popular_paper_id},
            beforeSend: function () {
                $('#'+popular_paper_id+'-delete-banner-btn').html(`<div class="spinner-border" role="status"></div>`)
                $('#'+popular_paper_id+'-delete-banner-btn').attr('disabled', true)
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
                load_popular_papers()
            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {
                $('#'+popular_paper_id+'-delete-banner-btn').html(`submit`)
                $('#'+popular_paper_id+'-delete-banner-btn').attr('disabled', false)
            }
        })
    }
</script>