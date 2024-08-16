<script>
    load_video('<?= $_GET['live_class_id']?>')
    function load_video(live_class_id) {
        // alert(user_id)
        $.ajax({
            url: "<?= base_url('/api/live-classes') ?>",
            type: "GET",
            data:{live_class_id:live_class_id},
            beforeSend: function () {
            },
            success: function (resp) {
                console.log(resp)
                if (resp.status) {
                    $('#video_material').attr('src', resp.data.class_link)
                    $('#keyword').text(resp.data.keyword)
                    $('#title').text(resp.data.title)
                    $('#description').html(resp.data.description)
                } else {
                    // html = `<div class="col-lg-12" >
                    //             <div class="login-form-box registration-form">
                    //                 <h3 class="title" style="text-align:center">${resp.message}!</h3>
                    //             </div>
                    //         </div>`
                    //     $('#examination_form').html(html);
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