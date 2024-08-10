<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!--  -->
    <link rel="stylesheet" href="<?= base_url()?>/public/assets/css/global.css">
    <link rel="stylesheet" href="<?= base_url()?>/public/assets/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!--  -->
    <!-- Mulish font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <!-- External JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/scripts/choices.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">


    <style>
        #alert {
            position: fixed;
            top: 10px;
            z-index: 1000;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            left: 0px;
        }
    </style>
</head>
<body>
    <div class="login-card card">
        <img class="logo" src="<?= base_url()?>/public/assets/images/logo  1.png" alt="">
        <h4>Let’s Sign In.!</h4>
        <p>Login to Your Account to Continue your Courses</p>
       <div class="login-info">
        <div class="input-box">
         <img src="<?= base_url()?>/public/assets/images/email.png" alt="">
         <input type="email" id="email_number" placeholder="email">
        </div>
        <div class="input-box ">
         <img src="<?= base_url()?>/public/assets/images/lock.png" alt="">
         <input type="password" id="password-input" placeholder="password">
         <!-- <img class="hide" src="<?= base_url()?>/public/assets/images/hide.png" alt=""> -->
        </div>
        <div class="forget-box">
            <div class="remember-box">
                <input type="radio">
                <p>Remember me</p>
            </div>
            <a href="#"><p>Forgot Password?</p></a>
        </div>
        <button class="login-action" id="sign-in-btn">Sign in <div class="imgs"><img src="<?= base_url()?>/public/assets/images/arrow.png" alt=""></div></button>
      
       </div>
       <div class="other-action">
       
        <!-- <p>Don't have an Account <a href="signup.html">SIGN UP</a></p> -->
       </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
        $(document).ready(function () {
            // $('#password-addon').on('click', function () {
            //     if ($('#password-input').attr('type') == 'password') {
            //         $('#password-input').attr('type', 'text')
            //     } else {
            //         $('#password-input').attr('type', 'password')

            //     }
            // })


            $('#sign-in-btn').on('click', function () {

                let email_number = $('#email_number').val();
                let password = $('#password-input').val();

                $.ajax({
                    url: "<?= base_url('login-action') ?>",
                    type: 'POST',
                    data: {
                        email_number: email_number,
                        password: password,
                    },
                    beforeSend: function () {
                        $('#sign-in-btn').html(`<div class="spinner-border text-light" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>`)
                        $('#sign-in-btn').attr('disabled', true);
                    },
                    success: function (resp) {
                        resp = JSON.parse(resp)
                        if (resp.status == true) {
                            Toastify({
                            text: resp.message.toUpperCase(),
                            duration: 3000,
                            position: "center",
                            stopOnFocus: true,
                            style: {
                                background: resp.status ? 'darkgreen' : 'darkred',
                            },

                        }).showToast();

                            window.location.href = `<?= base_url()?>login-pin?user_id=${resp.data.uid}&type=${resp.data.type}`;
                            console.log(resp)
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
                        $('#sign-in-btn').html(`Sign In`)
                        $('#sign-in-btn').attr('disabled', false);
                    },
                    complete: function () {
                        $('#sign-in-btn').html(`Sign In`)
                        $('#sign-in-btn').attr('disabled', false);
                    },
                    error: function () {
                        $('#sign-in-btn').html(`Sign In`)
                        $('#sign-in-btn').attr('disabled', false);
                        $('#alert').html(`<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                                    <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Internal Server Error
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>`)
                    }
                })

            })

        })


    </script>
</body>
</html>