<script>
     $(document).ready(function () {
        

        $("#getInTouchSubmit").click(function(){
            // alert("hello")
            var name = $("#contact-name").val()
            var email = $("#contact-email").val()
            var phone = $("#contact-phone").val()
            var subject = $("#contact-subject").val()
            var message = $("#contact-message").val()
            flag1 = true
            flag2 = true
            var re = /\S+@\S+\.\S+/;
            valid_email = re.test(email);

            // alert(valid_email)
            if(name == ""){
                $('#nameInput_val').text('Please enter your name.')
            }else{
                $('#nameInput_val').text('')
            }
            if(email == ""){
                $('#emailInput_val').text('Please enter email.')
            }else if(!valid_email){
                $('#emailInput_val').text('Please enter valid email.')
            }else{
                $('#emailInput_val').text('')
            }
            if(phone == ""){
                $('#phoneInput_val').text('Please enter phone no..')
            }else{
                $('#phoneInput_val').text('')
            }
            if(subject == ""){
                $('#subjectInput_val').text('Please enter a subject.')
            }else{
                $('#subjectInput_val').text('')
            }
            if(message == ""){
                $('#messageInput_val').text('Please enter a message.')
            }else{
                $('#messageInput_val').text('')
            }

            if(name != "" && email != "" && phone != "" && subject != "" && message != "" && valid_email){
                var formData = new FormData();

                formData.append('name', name);
                formData.append('email', email);
                formData.append('phone', phone);
                formData.append('subject', subject);
                formData.append('message', message);

                    $.ajax({
                        url: "<?= base_url('/api/message') ?>",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        beforeSend: function () {
                            $('#getInTouchSubmit').html(`<div class="spinner-border" role="status"></div>`)
                            $('#getInTouchSubmit').attr('disabled', true)

                        },
                        success: function (resp) {
                            console.log(resp)

                            if (resp.status) {
                                Toastify({
                                    text: resp.message.toUpperCase(),
                                    duration: 3000,
                                    position: "center",
                                    stopOnFocus: true,
                                    style: {
                                        background: resp.status ? 'darkgreen' : 'darkred',
                                    },

                                }).showToast();
                                $("#contact-name").val("")
                                $("#contact-email").val("")
                                $("#contact-phone").val("")
                                $("#contact-subject").val("")
                                $("#contact-message").val("")
                            } else {
                                Toastify({
                                    text: resp.message.toUpperCase(),
                                    duration: 3000,
                                    position: "center",
                                    stopOnFocus: true,
                                    style: {
                                        background: resp.status ? 'darkgreen' : 'darkred',
                                    },

                                }).showToast();
                                
                            }
                            console.log(resp)
                        },
                        error: function (err) {
                            console.log(err)
                        },
                        complete: function () {
                            $('#getInTouchSubmit').html(`Send Message <i class="bi bi-arrow-right-short align-middle fs-16 ms-1"></i>`)
                            $('#getInTouchSubmit').attr('disabled', false)
                        }
                    })
            }

        })
    })
</script>