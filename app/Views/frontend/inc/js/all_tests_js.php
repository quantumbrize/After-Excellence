<script>
    $(document).ready(function () {
        const userId = '<?= $_COOKIE[SES_USER_USER_ID] ?>';
        if (userId) {
            tests(userId)
        } else {
            console.error('User ID cookie not found.');
        }
    })
    function formatDate(dateString) {
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        const date = new Date(dateString);
        const day = date.getDate();
        const month = months[date.getMonth()];
        const year = date.getFullYear();
        return `${day} ${month} ${year}`;
    }
    function tests(user_id) {
       $.ajax({
           url: "<?= base_url('/api/student/online-test') ?>",
           type: "GET",
           data:{user_id:user_id},
           beforeSend: function () {
           },
           success: function (resp) {
               console.log(resp)
               if (resp.status) {
                   let html =``
                   $.each(resp.data, function (index, test) {
                    html += `<div class="test-card">
                                <a href="<?= base_url('test?test_id=')?>${test.test_id}" style="text-decoration:none;">
                                    <div class="test-name">Test ${index+1}</div>
                                    <span style="color:black;">Date: ${formatDate(test.created_at)}</span>
                                    <div class="test-details">
                                        <span>${test.class_name}</span>
                                        <span>Branch ${test.branch_name}</span>
                                        <span>Time: ${test.timer}</span>
                                    </div>
                                </a>
                            </div>`
                    })
                   $('#online_tests').html(html);
               } else {
                $('#online_tests').html(`<span style="color: red; display: block; text-align: center; margin: 0 auto;">Test Not Found!</span>`);
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