
<script>
    $(document).ready(function () {
        load_live_class('<?= $_SESSION[SES_USER_USER_ID] ?>')
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
                    $.each(resp.data, function (index, class_link) {
                        html += `<div class="col-lg-12" >
                        
                                    <div class="login-form-box registration-form">
                                    <h5>${index+1}.</h5>
                                    
                                        <a href="${class_link.class_link}"  target="_blank" class="edu-btn" style="color: white;">Join Class<i class="icon-4"></i></a>
                                        <!-- <form> -->
                                            <div class="row mb-4" >
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                                <label class="form-label" for="product-title-input">Short description:- ${class_link.description}</label>
                                                                <div class="invalid-feedback">Please Enter a banner title.</div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                    </div>
                                </div>`
                    })
                    $('#examination_form').html(html);
                } else {
                    html = `<div class="col-lg-12" >
                                <div class="login-form-box registration-form">
                                    <h3 class="title" style="text-align:center">${resp.message}!</h3>
                                </div>
                            </div>`
                        $('#examination_form').html(html);
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