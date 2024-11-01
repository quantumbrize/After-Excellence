<script>
    get_admin_settings()

    function get_admin_settings() {
        $.ajax({
            url: '<?= base_url('/api/user/admin/settings') ?>',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                console.log(response);
                if (response.status && response.data.feedback_show) {
                   
                    $('#feedBackButton').hide()
                }
            },
            error: function (xhr, status, error) {
                console.error("An error occurred: " + status + " " + error);
            }
        });

    }
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
        const userId = '<?= $_COOKIE[SES_USER_USER_ID] ?>';
        if (userId) {
            load_banners();
            popular_papers(userId);
            video_materials(userId)
            study_materials(userId);
            tests(userId)
            load_staff()
        } else {
            console.error('User ID cookie not found.');
        }
        load_banners()

        $("#submit_feedback").click(function () {
            let student_id = '<?= $_COOKIE[SES_USER_USER_ID] ?>';
            // alert("hello")
            var message = $("#feedback-message").val()
            var teachers_id = $("#teachers_id").val()


            if (message == "") {
                $('#messageInput_val').text('Please enter a message.')
            } else {
                $('#messageInput_val').text('')
            }

            if (message != "" && teachers_id != "" && student_id != "") {
                var formData = new FormData();

                formData.append('message', message);
                formData.append('teachers_id', teachers_id);
                formData.append('student_id', student_id);

                $.ajax({
                    url: "<?= base_url('/api/message') ?>",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $('#submit_feedback').html(`<div class="spinner-border" role="status">wait...</div>`)
                        $('#submit_feedback').attr('disabled', true)

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
                            $("#feedback-message").val("")
                            $("#teachers_id").val("")
                            close_modal()
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
                        $('#submit_feedback').html(`Send Message <i class="bi bi-arrow-right-short align-middle fs-16 ms-1"></i>`)
                        $('#submit_feedback').attr('disabled', false)
                    }
                })
            }

        })

        $("#submit_doubt").click(function () {
            let student_id = '<?= $_COOKIE[SES_USER_USER_ID] ?>';
            // alert("hello")
            var doubt_message = $("#doubt-message").val()
            var doubt_teachers_id = $("#doubt_teachers_id").val()


            if (doubt_message == "") {
                $('#doubtmessageInput_val').text('Please enter a doubt.')
            } else {
                $('#doubtmessageInput_val').text('')
            }

            if (doubt_message != "" && doubt_teachers_id != "" && student_id != "") {
                var formData = new FormData();

                formData.append('doubt', doubt_message);
                formData.append('teachers_id', doubt_teachers_id);
                formData.append('student_id', student_id);

                $.ajax({
                    url: "<?= base_url('/api/add/doubt') ?>",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $('#submit_doubt').html(`<div class="spinner-border" role="status">wait...</div>`)
                        $('#submit_doubt').attr('disabled', true)

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
                            $("#doubt-message").val("")
                            $("#doubt_teachers_id").val("")
                            close_doubt_modal()
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
                        $('#submit_doubt').html(`Send Message <i class="bi bi-arrow-right-short align-middle fs-16 ms-1"></i>`)
                        $('#submit_doubt').attr('disabled', false)
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
                    let html = ``
                    let html2 = ``
                    $.each(resp.data, function (index, banner) {
                        isActive = index === 0 ? 'active' : ''
                        // console.log(banner);
                        var shop_now = ``
                        if (banner.title != "") {
                            shop_now = ` <a href="${banner.link}" class="btn btn-danger btn-hover"><i class="ph-shopping-cart align-middle me-1"></i> ShopNow</a>`
                        }
                        html += `<img src="<?= base_url('public/uploads/banner_images/') ?>${banner.img}" alt="Image ${index + 1}">`
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

    function popular_papers(user_id) {

        $.ajax({
            url: "<?= base_url('/api/user/popular-papers') ?>",
            type: "GET",
            data: { user_id: user_id },
            beforeSend: function () {
            },
            success: function (resp) {
                console.log(resp)
                if (resp.status) {
                    let html = ``
                    //    let html2 =``
                    $.each(resp.data, function (index, paper) {
                        let redirect_url = ``
                        if (paper.type == 'link') {
                            redirect_url = paper.link
                        } else if (paper.type == 'pdf') {
                            redirect_url = '<?= base_url('pdf-reader?pdf_url=') ?>' + paper.pdf
                        }
                        html += `<a href="${redirect_url}" style="text-decoration:none;">
                                    <div class="banner">
                                        <img src="<?= base_url() ?>public/uploads/popular_paper/${paper.img}" alt="Banner Image">
                                        <div class="banner-content">
                                            <h3>${paper.keyword}</h3>
                                            <p>${paper.title}</p>
                                            <h3 style="color:black;">${paper.class_name}</h3>
                                            <h3 style="color:black;">${paper.branch_name}</h3>
                                        </div>
                                    </div>
                                </a>
                                `
                    })
                    $('#banner-container').html(html);
                } else {
                    $('#banner-container').html(`<span style="color: red; display: block; text-align: center; margin: 0 auto;">Papers Not Found!</span>`);

                }

            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {

            }
        })
    }

    function study_materials(user_id) {

        $.ajax({
            url: "<?= base_url('/api/user/study-material') ?>",
            type: "GET",
            data: { user_id: user_id },
            beforeSend: function () {
            },
            success: function (resp) {
                console.log(resp)
                if (resp.status) {
                    let html = ``
                    //    let html2 =``
                    $.each(resp.data, function (index, material) {
                        let redirect_url = ``
                        if (material.type == 'link') {
                            redirect_url = material.link
                        } else if (material.type == 'pdf') {
                            redirect_url = '<?= base_url('pdf-reader?pdf_url=') ?>' + material.pdf
                        }
                        html += `<div class="section-item">
                                <a href="${redirect_url}" style="text-decoration:none;">
                                    <img src="<?= base_url() ?>/public/assets/images/pdfimage.png" alt="Description of Image 1" class="section-image">
                                    <div class="section-title">${material.title}</div>
                                </a>
                            </div>`
                    })
                    $('#study_materials').html(html);
                } else {
                    $('#study_materials').html(`<span style="color: red; display: block; text-align: center; margin: 0 auto;">Study Materials Not Found!</span>`);
                }

            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {

            }
        })
    }

    function tests(user_id) {

        $.ajax({
            url: "<?= base_url('/api/student/online-test') ?>",
            type: "GET",
            data: { user_id: user_id },
            beforeSend: function () {
            },
            success: function (resp) {
                console.log(resp)
                if (resp.status) {
                    let html = ``
                    $.each(resp.data, function (index, test) {
                        html += `<div class="test-card">
                                <a href="<?= base_url('test?test_id=') ?>${test.test_id}" style="text-decoration:none;">
                                    <div class="test-name">Test ${index + 1}</div>
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

    function video_materials(user_id) {
        // alert(user_id)
        $.ajax({
            url: "<?= base_url('/api/live-classes') ?>",
            type: "GET",
            beforeSend: function () { },
            success: function (resp) {
                console.log(resp)
                if (resp.status) {
                    var html = ``
                    $.each(resp.data, function (index, item) {
                        html += `<a href="live_class?id=${item.live_class_id}" class="video-item">
                                    <h4>${item.title}</h4>
                                    <p>${item.class_name} - ${item.branch_name}</p>
                                    <video controls width="100%">
                                        <source src="<?= base_url() . 'public/uploads/video_material_video/' ?>${item.video}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                    <p>${item.description}</p>
                                </a>`
                    })
                    $('#video_materials').html(html);
                } else {
                    html = `<span style="color: red; display: block; text-align: center; margin: 0 auto;">Video Materials Not Found!</span>`
                    $('#video_materials').html(html);
                }

            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {

            }
        })
    }

    function load_staff() {

        $.ajax({
            url: '<?= base_url('/api/user/staff/') ?>',
            type: "GET",
            beforeSend: function () {
                $('#staff_table_data').html(`<tr>
                                            <td colspan="5">
                                                <center>
                                                    <div class="spinner-border text-success" role="status"></div>
                                                </center>
                                            </td>
                                        </tr>`)
            },
            success: function (resp) {
                console.log(resp)
                if (resp) {
                    let html = ''
                    $.each(resp.data, function (index, item) {
                        console.log(item.staff_name)
                        // html += `<tr>
                        //         <td>${item.staff_name}</td>
                        //         <td><img src="<?= base_url('public/uploads/user_images/') ?>${item.user_image}" alt="" class="product-img"></td>
                        //         <td>${item.staff_role}</td>
                        //         <td>${item.staff_number}</td>
                        //         <td>${item.staff_email}</td>
                        //         <td>
                        //             <i 
                        //                 style="margin-right: 20px; cursor: pointer;"
                        //                 class="ri-edit-2-line text-primary d-inline-block edit-item-btn fs-16" 
                        //                 onclick="open_staff('${item.staff_id}')">
                        //             </i>
                        //             <i 
                        //                 style="margin-right: 20px; cursor: pointer;"
                        //                 class="ri-delete-bin-line text-danger d-inline-block remove-item-btn fs-16" 
                        //                 onclick="delete_staff('${item.staff_id}')">
                        //             </i>
                        //         </td>
                        //     </tr>`

                        html += `<div onclick="form_options('${item.user_id}', '${item.staff_name}')" class="section-item teacher-section">
                                        <img src="<?= base_url('public/uploads/user_images/') ?>${item.user_image}" alt="Description of Image 1" class="section-image">
                                        <div class="section-title">${item.staff_name}</div>
                                    </div>`

                    })
                    $('#staff_data').html(html)

                }
            },
            error: function (err) {
                console.err(err)
            }
        })
    }

    // var modal = document.getElementById("myModal");
    // var openModalBtn = document.getElementById("openModalBtn");
    // var closeBtn = document.getElementsByClassName("close")[0];
    // openModalBtn.addEventListener("click", function() {
    //     modal.style.display = "block";
    // });
    // closeBtn.addEventListener("click", function() {
    //     modal.style.display = "none";
    // });

    // window.addEventListener("click", function(event) {
    //     if (event.target == modal) {
    //         modal.style.display = "none";
    //     }
    // });
    let glob_teacher_id = ''
    let glob_teacher_name = ''
    function form_options(teacher_id, teacher_name) {
        glob_teacher_id = teacher_id
        glob_teacher_name = teacher_name
        var modal = document.getElementById("optionModal");
        modal.style.display = "block";
    }

    function teacher_feedback_form() {
        let user_id = '<?= $_COOKIE[SES_USER_USER_ID] ?>'
        $.ajax({
            url: "<?= base_url('/api/is-tescher-feedback-submitted') ?>",
            type: "GET",
            data: {
                user_id: user_id,
                teacher_id: glob_teacher_id
            },
            beforeSend: function () {
            },
            success: function (resp) {
                console.log(resp)
                if (resp.status) {
                    var modal = document.getElementById("myModal");
                    var option_modal = document.getElementById("optionModal");
                    modal.style.display = "block";
                    option_modal.style.display = "none";
                    $('#teacher_name').text(glob_teacher_name)
                    $('#teachers_id').val(glob_teacher_id)
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

            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {

            }
        })
    }

    function student_doubt_form() {
        let user_id = '<?= $_COOKIE[SES_USER_USER_ID] ?>'
        var modal = document.getElementById("doubtModal");
        var option_modal = document.getElementById("optionModal");
        modal.style.display = "block";
        option_modal.style.display = "none";
        $('#doubt_teacher_name').text(glob_teacher_name)
        $('#doubt_teachers_id').val(glob_teacher_id)
    }

    function close_modal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    }

    function close_option_modal() {
        var modal = document.getElementById("optionModal");
        modal.style.display = "none";
    }

    function close_doubt_modal() {
        var modal = document.getElementById("doubtModal");
        modal.style.display = "none";
    }




</script>