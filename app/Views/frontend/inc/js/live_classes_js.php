
<script>
    $(document).ready(function () {
        load_live_class('<?= $_COOKIE[SES_USER_USER_ID] ?>')
    })

    function formatDate(dateString) {
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        const date = new Date(dateString);
        const day = date.getDate();
        const month = months[date.getMonth()];
        const year = date.getFullYear();
        return `${day} ${month} ${year}`;
    }

    function load_live_class(user_id) {
        // alert(user_id)
        $.ajax({
            url: "<?= base_url('/api/student/live/class') ?>",
            type: "GET",
            data:{user_id:user_id},
            beforeSend: function () {
            },
            success: function (resp) {
                console.log(resp)
                if (resp.status) {
                    
                    var html = ``
                    $.each(resp.data, function (index, video) {
                        html += `<div class="section-item">
                                    <a href="<?= base_url('video-player?live_class_id=')?>${video.live_class_id}" style="text-decoration:none;">
                                        <img src="<?= base_url()?>/public/uploads/video_material_images/${video.img}" alt="Description of Image 1" class="section-image">
                                        <div class="section-title">${video.title}</div>
                                    </a>
                                </div>`
                    })
                    $('#study_materials').html(html);
                } else {
                    html = `<div class="col-lg-12" >
                                <div class="login-form-box registration-form">
                                    <h3 class="title" style="text-align:center">${resp.message}!</h3>
                                </div>
                            </div>`
                        $('#study_materials').html(html);
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