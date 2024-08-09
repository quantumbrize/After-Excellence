
<script>
    $(document).ready(function () {
        load_online_tests('<?= $_SESSION[SES_USER_USER_ID] ?>')
    })

    function formatDate(dateString) {
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        const date = new Date(dateString);
        const day = date.getDate();
        const month = months[date.getMonth()];
        const year = date.getFullYear();
        return `${day} ${month} ${year}`;
    }

    function load_online_tests(user_id) {
        $.ajax({
            url: "<?= base_url('/api/student/online-test') ?>",
            type: "GET",
            data:{user_id:user_id},
            beforeSend: function () {
            },
            success: function (resp) {
                console.log(resp)
                if (resp.status) {
                    
                    $('#examination_form').html(`<a href="<?= base_url('online-test')?>" class="edu-btn">Start test<i class="icon-4"></i></a>`)
                    
                } else {
                    $('#examination_form').html(`<h3 class="message-text">${resp.message}!</h3>`);
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