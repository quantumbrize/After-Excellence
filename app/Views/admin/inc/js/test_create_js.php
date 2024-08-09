<script>
    let qstArr = []
    let qstType = ''
    let qst = ''
    let qstAns = ''
    let qstAnsOpt = {}
    function removeQst(id) {

        qstArr = qstArr.filter(obj => obj.id != id);

        console.log(qstArr);

        loadQuestions();
    }

        let $fileInput = $("#file-input");
        let $imageContainer = $("#images");
        let $numOfFiles = $("#num-of-files");

        function preview() {
            $imageContainer.html("");
            $numOfFiles.text(`${$fileInput[0].files.length} Files Selected`);

            $.each($fileInput[0].files, function (index, file) {
                let reader = new FileReader();
                let $figure = $("<figure>");
                let $figCap = $("<figcaption>").text(file.name);
                $figure.append($figCap);
                reader.onload = function () {
                    let $img = $("<img>").attr("src", reader.result);
                    $figure.prepend($img);
                }
                $imageContainer.append($figure);
                reader.readAsDataURL(file);
            });
        }
        $fileInput.change(preview);

    ClassicEditor
        .create(document.querySelector('#editor_qst'))
        .then(editor => {
            editorQst = editor;
        })
        .catch(error => {
            console.error(error);
        });

    classes()






    $('.tgl-flip').on('change', function () {
        if ($(this).is(':checked')) {
            $('.tgl-flip').not(this).prop('checked', false);
        }
    });

    let total_marks = 0
    $('#qst_add_btn').on('click', function () {

        qstType = $('#qstType').val()
        qst = editorQst.getData()
        qstAns = $('#editor_ans').val()
        let questions_mrks = parseInt($('#question_marks').val(), 10); 
        qstAnsOpt = {
            "a": $('#qst_a').val(),
            "b": $('#qst_b').val(),
            "c": $('#qst_c').val(),
            "d": $('#qst_d').val(),
            "right": {
                'a': $('#cbA').is(':checked'),
                'b': $('#cbB').is(':checked'),
                'c': $('#cbC').is(':checked'),
                'd': $('#cbD').is(':checked')
            }
        }

        alert_msg = ''
        if (qstType == '') {
            alert_msg = 'Pleae Select Questions Type'
        } else if (questions_mrks == '') {
            alert_msg = 'Pleae Add Question Marks'
        } else if (qst == '') {
            alert_msg = 'Pleae Add Question'
        } else if (qstType == 'mcq' && ($('#qst_a').val() == '' || $('#qst_b').val() == '' || $('#qst_c').val() == '' || $('#qst_d').val() == '')) {
            alert_msg = 'Pleae Add All MCQ Options'
        } else if (qstType == 'mcq' && ($('#cbA').is(':checked') == false && $('#cbB').is(':checked') == false && $('#cbC').is(':checked') == false && $('#cbD').is(':checked') == false)) {
            alert_msg = 'Pleae Select The Right MCQ Option'
        }

        if (alert_msg != '') {
            $('#alert').html(`<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                 <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - ${alert_msg}
                                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                             </div>` )
        } else {
            total_marks += questions_mrks;
            let qstUid = Date.now() + Math.floor(Math.random() * 1000);
            qstArr.push({
                "id": qstUid,
                // "file" : $('#file-input')[0].files
                "qstType": qstType,
                "qst": qst,
                "qstAns": qstAns,
                "qstAnsOpt": qstAnsOpt,
                "marks": questions_mrks
            })
            
            
            $('#total_marks').html(total_marks);
            $('#qstType').val('saq')
            editorQst.setData('')
            $('#qst_a').val('')
            $('#qst_b').val('')
            $('#qst_c').val('')
            $('#qst_d').val('')
            $('#editor_ans').val('')
            $('#cbA').prop('checked', false);
            $('#cbB').prop('checked', false);
            $('#cbC').prop('checked', false);
            $('#cbD').prop('checked', false);
            $('#ans_mcq_con').hide()
            $('#ans_saq_con').hide()
            console.log(qstArr)
            loadQuestions()
        }
    })



    function loadQuestions() {
        if (qstArr.length > 0) {
            $('#question_col').show();
            let html = ``
            // $('#total_marks').html(qstArr.length)
            $.each(qstArr, function (index, item) {
                html += `<div class="card mb-0 col-lg-6" id="${item.id}">
                                <div class="card-header">
                                    <h2 class="mb-0 d-flex justify-content-between align-items-center">
                                        <button style="display: flex;" class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_${item.id}" aria-expanded="true" aria-controls="collapse_${item.id}">
                                            <span style="margin-right: 20px;">Q - ${index + 1}</span> ${item.qst}
                                        </button>
                                        <button class="btn btn-danger" type="button" onClick="removeQst('${item.id}')">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapse_${item.id}" class="collapse" aria-labelledby="headingOne" data-parent="#qaAccordion">
                                    <div class="card-body">
                                        ${item.qstType == 'mcq'
                        ?
                        `<ul class="list-group">
                                                <li class="list-group-item ${item.qstAnsOpt.right.a ? 'text-success fw-bold' : 'text-danger'}">
                                                    <span style="margin-right:20px;">A)</span> ${item.qstAnsOpt.a}
                                                </li>
                                                <li class="list-group-item ${item.qstAnsOpt.right.d ? 'text-success fw-bold' : 'text-danger'}">
                                                    <span style="margin-right:20px;">B)</span> ${item.qstAnsOpt.b}
                                                </li>
                                                <li class="list-group-item ${item.qstAnsOpt.right.c ? 'text-success fw-bold' : 'text-danger'}">
                                                    <span style="margin-right:20px;">C)</span> ${item.qstAnsOpt.c}
                                                </li>
                                                <li class="list-group-item ${item.qstAnsOpt.right.d ? 'text-success fw-bold' : 'text-danger'}">
                                                    <span style="margin-right:20px;">D)</span> ${item.qstAnsOpt.d}
                                                </li>
                                            </ul>`
                        :
                        `<ul class="list-group">
                                                <li class="list-group-item text-success fw-bold" style="display: flex;">
                                                    <span style="margin-right:20px;">ans )</span> ${item.qstAns}
                                                </li>
                                            </ul>`
                    }    
                                    </div>
                                </div>
                            </div>`

            })
            $('#question_con').html(html)
        } else {
            $('#question_col').hide();
        }
    }



    $('#qstType').on('change', function () {
        if ($('#qstType').val() == 'mcq') {
            $('#ans_saq_con').hide()
            $('#ans_mcq_con').show()
        } else if ($('#qstType').val() == 'saq') {
            $('#ans_saq_con').show()
            $('#ans_mcq_con').hide()
        }

    })


    $('#test_add_btn').on('click', function () {
        var formData = new FormData();

        formData.append('user_id', '<?= !empty($_SESSION[SES_ADMIN_USER_ID]) ? $_SESSION[SES_ADMIN_USER_ID] : $_SESSION[SES_STAFF_USER_ID] ?>');
        formData.append('class_id', $('#className').val());
        formData.append('branch_id', $('#branchName').val());
        formData.append('testTime', $('#testTime').val());
        formData.append('questions', JSON.stringify(qstArr));

        // $.each($('#file-input')[0].files, function (index, file) {
        //     formData.append('images_1234[]', file);
        // })




        $.ajax({
            url: "<?= base_url('/api/test/add') ?>",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#test_add_btn').html(`<div class="spinner-border" role="status"></div>`)
                $('#test_add_btn').attr('disabled', true)

            },
            success: function (resp) {
                let html = ''

                if (resp.status) {
                    html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                            <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`
                    $('#qstType').val('saq')
                    editorQst.setData('')
                    $('#qst_a').val('')
                    $('#qst_b').val('')
                    $('#qst_c').val('')
                    $('#qst_d').val('')
                    $('#editor_ans').val('')
                    $('#cbA').prop('checked', false);
                    $('#cbB').prop('checked', false);
                    $('#cbC').prop('checked', false);
                    $('#cbD').prop('checked', false);
                    $('#ans_mcq_con').hide()
                    $('#ans_saq_con').hide()
                    qstAnsOpt = {}
                    qstArr = []
                    loadQuestions()
                } else {
                    html += `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                            <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - ${resp.message}
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
                $('#test_add_btn').html(`submit`)
                $('#test_add_btn').attr('disabled', false)
            }
        })
    })


    function classes() {
        $.ajax({
            url: "<?= base_url('/api/class-list') ?>",
            type: "GET",
            beforeSend: function () { },
            success: function (resp) {
                // console.log(resp)
                let html = '<option value="">Select-Class</option>'
                if (resp.status) {
                    $.each(resp.data, function (key, val) {
                        html += `<option value="${val.class_id}">${val.class_name}</option>`
                    })
                }
                $('#className').html(html)
            },
            error: function (err) {
                console.log(err)
            }
        })
    }

    function get_branches() {
        var class_id = $('#className').val()
        $.ajax({
            url: "<?= base_url('/api/branches') ?>",
            type: "GET",
            data: { class_id: class_id },
            beforeSend: function () { },
            success: function (resp) {
                // console.log(resp)
                let html = '<option value="">Select-Branch</option>'
                if (resp.status) {
                    $.each(resp.data, function (key, val) {
                        html += `<option value="${val.branch_id}">${val.branch_name}</option>`
                    })
                }
                $('#branchName').html(html)
            },
            error: function (err) {
                console.log(err)
            }
        })
    }
</script>