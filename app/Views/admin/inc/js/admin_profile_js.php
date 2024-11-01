<script>
    $(document).ready(function () {
        let user_id = '<?= isset($_SESSION['ADMIN_user_id']) ? $_SESSION['ADMIN_user_id'] : $_SESSION['STAFF_user_id'] ?>'

        get_profile_section(user_id)
        get_admin_settings()

        function get_admin_settings() {
            $.ajax({
                url: '<?= base_url('/api/user/admin/settings') ?>',
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    if (response.status) {
                        $('#fedbackInput').val(response.data.feedback_show == 1 ? 'show' : 'hide')

                    }
                },
                error: function (xhr, status, error) {
                    console.error("An error occurred: " + status + " " + error);
                }
            });

        }

        $('#save_settings').click(function () {
            // Determine the status value based on the feedback input
            let status = $('#fedbackInput').val() === 'show' ? 1 : 0;
            var formData = new FormData();
            formData.append('status', status);
            $.ajax({
                url: '<?= base_url('/api/user/admin/settings') ?>',  // Replace with your actual endpoint URL
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    // Handle success response
                    console.log("Settings saved successfully:", response);
                    html = `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${response.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                    $('#alert').html(html)
                    // Optionally display a message or perform further actions
                },
                error: function (xhr, status, error) {
                    // Handle error response
                    console.error("An error occurred: " + status + " " + error);
                }
            });
        });



        $("#update_profile").click(function () {
            var user_id = $("#userId").val()
            var nameInput = $("#nameInput").val()
            var emailInput = $("#emailInput").val()
            var phonenumberInput = $("#phonenumberInput").val()

            if (nameInput == "") {
                $("#name_val").text("Please enter name!")
            } else {
                $("#name_val").text("")
            }
            if (emailInput == "") {
                $("#number_val").text("Please enter number!")
            } else {
                $("#number_val").text("")
            }
            if (phonenumberInput == "") {
                $("#email_val").text("Please enter email!")
            } else {
                $("#email_val").text("")
            }



            if (nameInput != "" && emailInput != "" && phonenumberInput != "") {
                // alert("hello")
                var formData = new FormData();

                formData.append('nameInput', nameInput);
                formData.append('emailInput', emailInput);
                formData.append('phonenumberInput', phonenumberInput);
                formData.append('user_id', user_id);
                $.ajax({
                    url: "<?= base_url('/api/update/admin') ?>",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $('#update_profile').html(`<div class="spinner-border" role="status"></div>`)
                        $('#update_profile').attr('disabled', true)

                    },
                    success: function (resp) {
                        console.log(resp)
                        var html = ``;
                        if (resp.status) {
                            // window.location.href = "<?= base_url('/user/account') ?>";
                            html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                            location.reload();
                        } else {
                            console.log(resp.status)
                            html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                        }


                        $('#alert').html(html)
                        console.log(resp)
                    },
                    error: function (err) {
                        console.log(err)
                    },
                    complete: function () {
                        $('#update_profile').html(`<i class="ri-edit-box-line align-middle me-2"></i> Update Profile`)
                        $('#update_profile').attr('disabled', false)
                    }
                })
            }
        });

        $("#change_password").click(function () {
            var user_id = $("#userId").val()
            var old_password = $("#oldpasswordInput").val()
            var new_password = $("#newpasswordInput").val()
            var confirm_password = $("#confirmpasswordInput").val()
            // alert(user_id)
            flag1 = true
            flag2 = true

            if (old_password == "") {
                $('#changeOldPass').text('Please enter old password.')
            } else {
                $('#changeOldPass').text('')
            }

            if (new_password == "") {
                $('#changeNewPass').text('Please enter new password.')
            } else if (new_password.length < 6) {
                $('#changeNewPass').text('New password must be 6 digits.')
                flag1 = false
            } else {
                $('#changeNewPass').text('')
            }

            if (confirm_password == "") {
                $('#changeConfirmPass').text('Please enter confirm password.')
            } else if (confirm_password != new_password) {
                $('#changeConfirmPass').text('Does not match with new password!')
                flag2 = false
            } else {
                $('#changeConfirmPass').text('')
            }



            if (old_password != "" && new_password != "" && confirm_password != "" && flag1 && flag2) {
                var formData = new FormData();

                formData.append('user_id', user_id);
                formData.append('old_password', old_password);
                formData.append('new_password', new_password);
                formData.append('confirm_password', confirm_password);

                $.ajax({
                    url: "<?= base_url('/api/change/admin/password') ?>",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $('#change_password').html(`<div class="spinner-border" role="status"></div>`)
                        $('#change_password').attr('disabled', true)

                    },
                    success: function (resp) {
                        console.log(resp)
                        var html = ``;
                        if (resp.status) {
                            html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                            $("#oldpasswordInput").val("")
                            $("#newpasswordInput").val("")
                            $("#confirmpasswordInput").val("")
                        } else {
                            html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`

                        }
                        $('#alert').html(html)


                        console.log(resp)
                    },
                    error: function (err) {
                        console.log(err)
                    },
                    complete: function () {
                        $('#change_password').html(`<i class="ri-edit-box-line align-middle me-2"></i> Change Password`)
                        $('#change_password').attr('disabled', false)
                    }
                })
            }

        })
    });
    function get_profile_section(user_id) {
        $.ajax({
            url: "<?= base_url('api/get/admin') ?>",
            type: "GET",
            data: { user_id: user_id },
            success: function (resp) {
                // resp = JSON.parse(resp)
                // console.log(resp.user_data.number)
                if (resp.status) {
                    console.log(resp)
                    var user_img = `<?= base_url() ?>public/assets_admin/images/users/avatar-1.jpg`
                    if (resp.user_data.type == 'staff') {
                        var user_img = `<?= base_url() ?>public/uploads/user_images/${resp.user_image.img}`
                    }

                    $('#profile_image').html(`<img src="${user_img}" class="rounded-circle avatar-xl img-thumbnail user-profile-image material-shadow" alt="user-profile-image">`)
                    $('#nameInput').val(resp.user_data.user_name)
                    $('#emailInput').val(resp.user_data.email)
                    $('#phonenumberInput').val(resp.user_data.number)
                    $('#userId').val(resp.user_data.uid)
                    $('#user_name').text(resp.user_data.user_name)
                    $('#user_role').text(resp.user_data.type)
                    // var image_url = `https://usercontent.one/wp/www.vocaleurope.eu/wp-content/uploads/no-image.jpg?media=1642546813`

                } else {
                    console.log(resp)
                }
            },
            error: function (err) {
                console.log(err)
            }
        })
    }
</script>