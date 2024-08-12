
<script>
    $(document).ready(function () {
        popular_papers('<?= $_SESSION[SES_USER_USER_ID] ?>')
        // alert('hello')
    })

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
                                </a>`
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

   

</script>