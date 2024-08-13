
<script>
    $(document).ready(function () {
        const userId = '<?= $_COOKIE[SES_USER_USER_ID] ?>';
        if (userId) {
            load_banners();
            popular_papers(userId);
            study_materials(userId);
        } else {
            console.error('User ID cookie not found.');
        }
        load_banners()
        // popular_papers('<?= $_SESSION[SES_USER_USER_ID] ?>')
        // study_materials('<?= $_SESSION[SES_USER_USER_ID] ?>')
    })


    function load_banners() {
       
        $.ajax({
            url: "<?= base_url('/api/banners') ?>",
            type: "GET",
            beforeSend: function () {
            },
            success: function (resp) {
                console.log(resp)
                if (resp.status) {
                    let html =``
                    let html2 =``
                    $.each(resp.data, function (index, banner) {
                        isActive = index === 0 ? 'active' : ''
                        // console.log(banner);
                        var shop_now = ``
                        if (banner.title != "") {
                            shop_now = ` <a href="${banner.link}" class="btn btn-danger btn-hover"><i class="ph-shopping-cart align-middle me-1"></i> ShopNow</a>`
                        }
                        html += `<img src="<?= base_url('public/uploads/banner_images/') ?>${banner.img}" alt="Image ${index+1}">`
                        html2 += `<span data-index="${index}" class="${index == 0 ? 'active' : ''}"></span>`
                    })
                    $('#banner_container').html(html);
                    $('#banner_indicators').html(html2);
                } else {
                }

            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {

            }
        })
    }

    function popular_papers(user_id) {
       
       $.ajax({
           url: "<?= base_url('/api/user/popular-papers') ?>",
           type: "GET",
           data:{user_id:user_id},
           beforeSend: function () {
           },
           success: function (resp) {
               console.log(resp)
               if (resp.status) {
                   let html =``
                //    let html2 =``
                   $.each(resp.data, function (index, paper) {
                       let redirect_url = ``
                       if(paper.type == 'link'){
                        redirect_url = paper.link
                       } else if(paper.type == 'pdf'){
                            redirect_url = '<?= base_url('pdf-reader?pdf_url=')?>'+paper.pdf
                       }
                       html += `<a href="${redirect_url}" style="text-decoration:none;">
                                    <div class="banner">
                                        <img src="<?= base_url()?>public/uploads/popular_paper/${paper.img}" alt="Banner Image">
                                        <div class="banner-content">
                                            <h3>${paper.keyword}</h3>
                                            <p>${paper.title}</p>
                                            <h3 style="color:black;">${paper.class_name}</h3>
                                            <h3 style="color:black;">${paper.branch_name}</h3>
                                        </div>
                                    </div>
                                </a>
                                `
                   })
                   $('#banner-container').html(html);
               } else {
               }

           },
           error: function (err) {
               console.log(err)
           },
           complete: function () {

           }
       })
    }

    function study_materials(user_id) {
       
       $.ajax({
           url: "<?= base_url('/api/user/study-material') ?>",
           type: "GET",
           data:{user_id:user_id},
           beforeSend: function () {
           },
           success: function (resp) {
               console.log(resp)
               if (resp.status) {
                   let html =``
                //    let html2 =``
                   $.each(resp.data, function (index, material) {
                       let redirect_url = ``
                       if(material.type == 'link'){
                        redirect_url = material.link
                       } else if(material.type == 'pdf'){
                            redirect_url = '<?= base_url('pdf-reader?pdf_url=')?>'+material.pdf
                       }
                    html += `<div class="section-item">
                                <a href="${redirect_url}" style="text-decoration:none;">
                                    <img src="<?= base_url()?>/public/assets/images/pdfimage.png" alt="Description of Image 1" class="section-image">
                                    <div class="section-title">${material.title}</div>
                                </a>
                            </div>`
                   })
                   $('#study_materials').html(html);
               } else {
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