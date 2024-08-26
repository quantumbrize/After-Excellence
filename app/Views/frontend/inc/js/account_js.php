<script>
    function initializeCarousel() {
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');
    const images = document.querySelectorAll('.carousel-images img');
    const indicators = document.querySelectorAll('.carousel-indicators span');
    let currentIndex = 0;

    function updateCarousel() {
        const offset = -currentIndex * 100;
        document.querySelector('.carousel-images').style.transform = `translateX(${offset}%)`;
        indicators.forEach((indicator, index) => {
            indicator.classList.toggle('active', index === currentIndex);
        });
    }

    function showNext() {
        currentIndex = (currentIndex + 1) % images.length;
        updateCarousel();
    }

    function showPrev() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        updateCarousel();
    }

    nextButton.addEventListener('click', showNext);
    prevButton.addEventListener('click', showPrev);

    updateCarousel(); // Initialize the carousel
}
    $(document).ready(function () {
        // alert("hello")
        get_user_data();
        load_banners()

        $("#update_profile").click(function () {
            var user_id = $("#user_id").val()
            var name = $("#firstnameInput").val()
            var number = $("#phonenumberInput").val()
            var email = $("#emailInput").val()

            var city = $("#cityInput").val()
            var block = $("#blockInput").val()
            var post_office = $("#postOfficeInput").val()
            var police_station = $("#policeStationInput").val()
            var district = $("#districtInput").val()
            var state = $("#stateInput").val()
            var zipcode = $("#zipcodeInput").val()
            var contact = $("#contactInput").val()

            if (name == "") {
                $("#name_val").text("Please enter name!")
            } else {
                $("#name_val").text("")
            }
            if (number == "") {
                $("#number_val").text("Please enter number!")
            } else {
                $("#number_val").text("")
            }
            if (email == "") {
                $("#email_val").text("Please enter email!")
            } else {
                $("#email_val").text("")
            }
            if (city == "") {
                $("#city_val").text("Please enter city!")
            } else {
                $("#city_val").text("")
            }
            if (block == "") {
                $("#block_val").text("Please enter block!")
            } else {
                $("#block_val").text("")
            }
            if (post_office == "") {
                $("#po_val").text("Please enter post office!")
            } else {
                $("#po_val").text("")
            }
            if (police_station == "") {
                $("#ps_val").text("Please enter police station!")
            } else {
                $("#ps_val").text("")
            }
            if (district == "") {
                $("#district_val").text("Please enter district!")
            } else {
                $("#district_val").text("")
            }
            if (state == "") {
                $("#state_val").text("Please enter state!")
            } else {
                $("#state_val").text("")
            }
            if (zipcode == "") {
                $("#zip_val").text("Please enter zip code!")
            } else {
                $("#zip_val").text("")
            }
            if (contact == "") {
                $("#contact_val").text("Please enter contact!")
            } else {
                $("#contact_val").text("")
            }


            if (name != "" && number != "" && email != "" && city != "" && block != "" && post_office != "" && police_station != "" && district != "" && state != "" && zipcode != "" && contact != "") {
                // alert("hello")
                var formData = new FormData();

                formData.append('name', name);
                formData.append('number', number);
                formData.append('email', email);
                formData.append('city', city);
                formData.append('block', block);
                formData.append('post_office', post_office);
                formData.append('police_station', police_station);
                formData.append('district', district);
                formData.append('state', state);
                formData.append('zip', zipcode);
                formData.append('contact', contact);
                formData.append('user_id', user_id);
                console.log(formData.get('name'));

                $.each($('#user_img_input')[0].files, function (index, file) {
                    formData.append('images[]', file);
                });
                $.ajax({
                    url: "<?= base_url('/api/user/update') ?>",
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

                        if (resp.status) {
                            // window.location.href = "<?= base_url('/user/account') ?>";
                            Toastify({
                                text: resp.message.toUpperCase(),
                                duration: 3000,
                                position: "center",
                                stopOnFocus: true,
                                style: {
                                    background: resp.status ? 'darkgreen' : 'darkred',
                                },

                            }).showToast();
                            get_user_data();
                        } else {
                            console.log(resp.status)
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
            var user_id = $("#user_id").val()
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
                    url: "<?= base_url('/api/change/password') ?>",
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
                            $("#oldpasswordInput").val("")
                            $("#newpasswordInput").val("")
                            $("#confirmpasswordInput").val("")
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
                        $('#change_password').html(`<i class="ri-edit-box-line align-middle me-2"></i> Change Password`)
                        $('#change_password').attr('disabled', false)
                    }
                })
            }

        })
    })

    function formatDate(dateString) {
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        const date = new Date(dateString);
        const day = date.getDate();
        const month = months[date.getMonth()];
        const year = date.getFullYear();
        return `${day} ${month} ${year}`;
    }

    function load_banners() {
       
       $.ajax({
           url: "<?= base_url('/api/banners') ?>",
           type: "GET",
           beforeSend: function () {
           },
           success: function (resp) {
               console.log(resp)
               if (resp.status) {
                   let html =``
                   let html2 =``
                   $.each(resp.data, function (index, banner) {
                       isActive = index === 0 ? 'active' : ''
                       // console.log(banner);
                       var shop_now = ``
                       if (banner.title != "") {
                           shop_now = ` <a href="${banner.link}" class="btn btn-danger btn-hover"><i class="ph-shopping-cart align-middle me-1"></i> ShopNow</a>`
                       }
                       html += `<img src="<?= base_url('public/uploads/banner_images/') ?>${banner.img}" alt="Image ${index+1}">`
                       html2 += `<span data-index="${index}" class="${index == 0 ? 'active' : ''}"></span>`
                   })
                   $('#banner_container').html(html);
                   $('#banner_indicators').html(html2);
                   initializeCarousel();
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

    function get_user_data() {
        let user_id = '<?= $_COOKIE[SES_USER_USER_ID] ?>';
        $.ajax({
            url: "<?= base_url('api/students') ?>",
            type: "GET",
            data:{user_id:user_id},
            success: function (resp) {
                // resp = JSON.parse(resp)
                console.log(resp.data)
                if (resp.status == true) {
                    console.log(resp)

                    if (resp.data.user_img != null) {
                        $("#profile_photo").attr("src", "<?= base_url('public/uploads/user_images/') ?>" + resp.data.user_img);
                    }

                    var dateParts = resp.data.created_at.split(" ")[0].split("-");
                    var year = dateParts[0];
                    var month = dateParts[1];
                    var day = dateParts[2];
                    var formattedDate = day + "/" + month + "/" + year;
                    $("#user_info").html(` <div class="acc-card-style"></div>
                                        <p><strong>Name:</strong> ${resp.data.user_name}</p>
                                        <p><strong>Mobile / Phone Number:</strong> ${resp.data.number}</p>
                                        <p><strong>Email Address:</strong> ${resp.data.email}</p>
                                        <p><strong>Class:</strong> ${resp.data.student_roll[0].class_name}</p>
                                        <p><strong>Branch:</strong> ${resp.data.student_roll[0].branch_name}</p>
                                        <p><strong>Roll:</strong> ${resp.data.student_roll[0].student_roll}</p>
                                        <p><strong>Since Member:</strong> ${formatDate(resp.data.created_at)}</p>`)
                    $("#user_name").text(resp.data.user_name)
                    // $("#customer_email").text(resp.user_data.email)
                    // $("#customer_class").text(resp.user_roll_data.class_name)
                    // $("#customer_branch").text(resp.user_roll_data.branch_name)
                    // $("#customer_roll").text(resp.user_roll_data.student_roll)

                    



                } else {
                    $("#user_info").html(` <div class="acc-card-style"></div>
                                        <p><strong>Name:</strong></p>
                                        <p><strong>Mobile / Phone Number:</strong> </p>
                                        <p><strong>Email Address:</strong> </p>
                                        <p><strong>Class:</strong> </p>
                                        <p><strong>Branch:</strong> </p>
                                        <p><strong>Roll:</strong> </p>
                                        <p><strong>Since Member:</strong> </p>`)
                    console.log(resp.message)
                }
            },
            error: function () {
            }
        })
    }

    $(document).on('change', 'input[name="user_img[]"]', function (e) {
        console.log(1)
        var files = e.target.files;
        $('#userImage').html(''); // Clear existing previews

        for (var i = 0; i < files.length; i++) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#userImage').append(`<img src="${e.target.result}" height="100" id="user_img"/>`);
            };

            reader.readAsDataURL(files[i]);
        }
    });

    function redirect_single_product(product_id) {
            window.location.href = "<?= base_url('/watch/course_video?product_id=') ?>" + product_id;
    }

    // function get_purchesed_course(user_id) {
    //     $.ajax({
    //         url: "<?= base_url('api/purchased/courses') ?>",
    //         type: "GET",
    //         data:{user_id:user_id},
    //         success: function (resp) {
    //             // resp = JSON.parse(resp)
    //             // console.log(resp)
    //             if (resp.status) {
    //                 // console.log(resp)
    //                 var html = ``
    //                 $.each(resp.data, function (index, product) {
    //                     html += `<tr class="course-row" onclick="redirect_single_product('${product.product_id}')">
    //                                 <td><img src="<?= base_url('public/uploads/product_images/') ?>${product.product_img[0].src}" alt="" class="product-img"></td>
    //                                 <td>${product.name}</td>
    //                                 <td>${product.description}</td>
    //                                 <td>${product.duration}</td>
    //                                 <td>${product.lecturer_name}</td>
    //                             </tr>`
    //                 });
    //                 $('#purchased_courses').html(html);
    //             } else {
    //                 html += `<tr>
    //                                 <td></td>
    //                                 <td></td>
    //                                 <td>${resp.message}!</td>
    //                                 <td></td>
    //                                 <td></td>
    //                             </tr>`
    //                 $('#purchased_courses').html(html);
    //                 console.log(resp.message)
    //             }
    //         },
    //         error: function () {
    //         }
    //     })
    // }

    // function get_test_marks(user_id) {
    //     $.ajax({
    //         url: "<?= base_url('api/all/given-answers') ?>",
    //         type: "GET",
    //         data:{user_id:user_id},
    //         success: function (resp) {
    //             if (resp.status) {
    //                 console.log(resp)
    //                 var html = ``
    //                 let result = '';
    //                 var right_answer = ''
    //                 var answer = ''
    //                 var total_marks = 0
    //                 $.each(resp.data, function (index, item) {
    //                             var ans_marks = '0';
    //                         if (item.question_type == 'mcq') {
    //                             // Determine the selected answer
    //                             if (item.ans_selected == 'a') {
    //                                 answer = item.a;
    //                             } else if (item.ans_selected == 'b') {
    //                                 answer = item.b;
    //                             } else if (item.ans_selected == 'c') {
    //                                 answer = item.c;
    //                             } else if (item.ans_selected == 'd') {
    //                                 answer = item.d;
    //                             }

    //                             // Determine the right answer
    //                             if (item.right_ans == 'a') {
    //                                 right_answer = item.a;
    //                             } else if (item.right_ans == 'b') {
    //                                 right_answer = item.b;
    //                             } else if (item.right_ans == 'c') {
    //                                 right_answer = item.c;
    //                             } else if (item.right_ans == 'd') {
    //                                 right_answer = item.d;
    //                             }

    //                             // Assign marks if the selected answer is correct
    //                             if (answer == right_answer) {
    //                                 ans_marks = item.marks;
    //                                 total_marks = parseInt(total_marks, 10) + parseInt(item.marks, 10);
    //                             }

    //                             // var question_text = ''
    //                             // var question_text = stripHtml(item.question);
    //                         } else if (item.question_type == 'saq') {
    //                             answer = item.ans;

    //                             if (item.right_ans == ' ') {
    //                                 right_answer = 'Not decleared';
    //                             } else if (item.right_ans == 'true') {
    //                                 right_answer = 'Right';
    //                                 ans_marks = item.marks;
    //                                 total_marks = parseInt(total_marks, 10) + parseInt(item.marks, 10);
    //                             } else if (item.right_ans == 'false') {
    //                                 right_answer = 'wrong';
    //                             }
    //                         }

    //                     html += `<tr class="course-row">
    //                                 <td>${item.question}</td>
    //                                 <td>${item.question_type}</td>
    //                                 <td>${answer}</td>
    //                                 <td>${right_answer}</td>
    //                                 <td>${ans_marks}</td>
    //                             </tr>`
    //                 });
    //                 $('#test_marks').html(html);
    //                 $('#total_marks').html(`<tr>
    //                                             <th scope="col">Total:</th>
    //                                             <th scope="col">${total_marks}</th>
    //                                         </tr>`);
    //             } else {
    //                 html += `<tr>
    //                                 <td></td>
    //                                 <td></td>
    //                                 <td>${resp.message}!</td>
    //                                 <td></td>
    //                                 <td></td>
    //                             </tr>`
    //                 $('#test_marks').html(html);
    //                 console.log(resp.message)
    //             }
    //         },
    //         error: function () {
    //         }
    //     })
    // }

    function logout() {;
        $.ajax({
            url: "<?= base_url('logout') ?>",
            type: "GET",
            success: function (resp) {
                window.location.href = '<?= base_url('login')?>';
            },
            error: function () {
            }
        })
    }



</script>