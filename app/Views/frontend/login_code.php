<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Pin</title>
    <link rel="stylesheet" href="<?= base_url()?>/public/assets/css/pin.css">
     <!--  -->
     <link rel="stylesheet" href="<?= base_url()?>/public/assets/css/global.css">
     
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
     <!--  -->

     <!-- External JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/scripts/choices.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="<?= base_url()?>/public/assets/images/arrow.png" alt="">
            <h3>Create New Pin</h3>
        </div>
        <p class="instruction">Add a Pin Number to Make Your Account more Secure</p>
        <div class="pin-inputs">
            <input type="text"  onkeyup="moveToNext(1, event)" maxLength="1" id="digit1-input" class="pin-box" >
            <input type="text"  onkeyup="moveToNext(2, event)" maxLength="1" id="digit2-input" class="pin-box" >
            <input type="text"  onkeyup="moveToNext(3, event)" maxLength="1" id="digit3-input" class="pin-box"  >
            <input type="text"  onkeyup="moveToNext(4, event)" maxLength="1" id="digit4-input" class="pin-box" >
        </div>
        <button class="login-action" id="confirm-btn">Continue <div class="imgs"><img src="<?= base_url()?>/public/assets/images/arrow.png" alt=""></div></button>
        <div class="keypad">
            <!-- <button class="key">1</button>
            <button class="key">2</button>
            <button class="key">3</button>
            <button class="key">4</button>
            <button class="key">5</button>
            <button class="key">6</button>
            <button class="key">7</button>
            <button class="key">8</button>
            <button class="key">9</button>
            <button class="key">*</button>
            <button class="key">0</button>
            <button class="key backspace">&larr;</button> -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>

        $(document).ready(function () {

            $('#confirm-btn').on('click', function () {

                let otp1 = $('#digit1-input').val()
                let otp2 = $('#digit2-input').val()
                let otp3 = $('#digit3-input').val()
                let otp4 = $('#digit4-input').val()

                let otp = otp1 + otp2 + otp3 + otp4


                if (otp.length < 4) {
                    Toastify({
                        text: 'Please enter a valid PIN!'.toUpperCase(),
                        duration: 3000,
                        position: "center",
                        stopOnFocus: true,
                        style: {
                            background:'darkred',
                        },

                    }).showToast();
                } else {
                    console.log(otp);
                    $.ajax({
                        url: '<?= base_url('verify-pin-action') ?>',
                        method: 'POST',
                        data: {
                            pin: otp,
                            user_id: '<?= $_GET['user_id'] ?>',
                            type: '<?= $_GET['type'] ?>',
                        },
                        beforeSend: function () {
                            $('#confirm-btn').html(`<div class="spinner-border text-light" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>`)
                            $('#confirm-btn').attr('disabled', true);
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
                                console.log(resp)
                                window.location.href = `<?= base_url() ?>`;
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
                            $('#confirm-btn').attr('disabled', false);
                        },
                        complete: function () {
                            $('#confirm-btn').html(`Confirm`)
                            $('#confirm-btn').attr('disabled', false);

                        }

                    })

                }

            })
        })

        function moveToNext(current, event) {
            const maxDigits = 4; // Total number of input fields
            const currentInput = document.getElementById(`digit${current}-input`);
            const nextInput = document.getElementById(`digit${current + 1}-input`);
            const prevInput = document.getElementById(`digit${current - 1}-input`);

            // Check if the key pressed is a digit
            if (event.key >= 0 && event.key <= 9) {
                if (current < maxDigits && currentInput.value.length === currentInput.maxLength) {
                    nextInput.focus();
                }
            } 
            // Check if the backspace key was pressed
            else if (event.key === "Backspace") {
                if (current > 1 && currentInput.value.length === 0) {
                    prevInput.focus();
                }
            }
        }


    </script>
</body>
</html>
