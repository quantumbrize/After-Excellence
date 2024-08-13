<script>
    
    $(document).ready(function () {
        var userId = '<?= $_COOKIE[SES_USER_USER_ID] ?>';
        if (userId) {
            study_materials(userId);
        } else {
            console.error('User ID cookie not found.');
        }
        
        // study_materials('<?= $_SESSION[SES_USER_USER_ID] ?>')
    })

    function getCookie(name) {
        const match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
        if (match) return match[2];
        return null;
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

    function search_study_materials() {
       let user_id = getCookie('USER_user_id');
       let alphabet = $('#searchStudyMaterial').val()
       
       $.ajax({
           url: "<?= base_url('/api/search/study-material') ?>",
           type: "GET",
           data:{user_id:user_id,
                alph: alphabet
            },
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