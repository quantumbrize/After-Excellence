<script>

    $(document).ready(function () {
        get_test_data()

        $('#test_update_btn').on('click', function () {
            var formData = new FormData();

            formData.append('class_id', $('#className').val());
            formData.append('branch_id', $('#branchName').val());
            formData.append('testTime', $('#testTime').val());
            formData.append('test_url', $('#testUrl').val());
            formData.append('response_url', $('#responseUrl').val());
            formData.append('test_id', $('#testId').val());

            $.ajax({
                url: "<?= base_url('/api/test/update') ?>",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#test_update_btn').html(`<div class="spinner-border" role="status"></div>`)
                    $('#test_update_btn').attr('disabled', true)

                },
                success: function (resp) {
                    let html = ''

                    if (resp.status) {
                        html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                        get_test_data()
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
                    $('#test_update_btn').html(`submit`)
                    $('#test_update_btn').attr('disabled', false)
                }
            })
        })
    });


    function show_ans_update_btn(uid, opt) {
        $(`#${opt}_ans_save_btn_${uid}`).show();
        if (!$(`#${opt}_ans_save_btn_${uid}`).length) {
            $(`#${opt}_${uid}`).after(`<button 
                                            class="btn btn-info m-2" 
                                            id="${opt}_ans_save_btn_${uid}" 
                                            onClick="save_ans('${uid}','${opt}')">
                                            Save</button>`);
        }
    }

    function save_ans(uid, opt) {

      

        $.ajax({
            url: '<?= base_url('/api/answer/update') ?>',
            type: 'POST',
            data: {
                ans_id: uid,
                opt: opt,
                answer: $(`#${opt}_${uid}`).val()
            },
            beforeSend: function () { },
            success: function (resp) {
                let alertHtml = ''
                if (resp.status) {
                    alertHtml += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                    <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>`
                    $(`#${opt}_ans_save_btn_${uid}`).hide();
                } else {
                    alertHtml += `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                    <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - ${resp.message}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>`
                }
                $('#alert').html(alertHtml)

            },
            error: function (err) {
                console.log(err)
            }

        })

    }



    function get_test_data() {
        var currentUrl = window.location.href;
        var urlParams = new URLSearchParams(currentUrl.split('?')[1]);
        var test_id = urlParams.get('test_id');
        $.ajax({
            url: "<?= base_url('/api/tests') ?>",
            type: "GET",
            data: { test_id: test_id },
            beforeSend: function () { },
            success: function (resp) {
                console.log(resp)
                var test = resp.data[0]
                $('#testUrl').val(test.test_url)
                $('#responseUrl').val(test.response_url)
                $('#testId').val(test_id)
                classes(test.class_id, test.branch_id)
                $('#testTime').val(`${test.timer}`)

                if (test.questions.length > 0) {
                    html = ``
                    $.each(test.questions, function (index, item) {

                        if (item.question_type == 'mcq') {
                            html += `<div class="card mb-3 col-lg-6">
                                        <div class="card-header">
                                            <label for="form-label">Q-${index + 1}</label>
                                            <textarea id="q_${item.uid}"></textarea>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-check mb-3">
                                                <input 
                                                    class="form-check-input ${item.answer[0].right_ans == 'a' ? 'bg-success' : 'bg-danger'}"
                                                    type="radio" 
                                                    name="q${index + 1}" 
                                                    ${item.answer[0].right_ans == 'a' ? 'checked' : ''}>
                                                <label for="form-label">A )</label>
                                                <input 
                                                    class="form-control" 
                                                    type="text" 
                                                    value="${item.answer[0].a}" 
                                                    id="a_${item.answer[0].uid}"
                                                    onKeyUp="show_ans_update_btn('${item.answer[0].uid}','a')">
                                            </div>
                                            <div class="form-check mb-3">
                                                <input 
                                                    class="form-check-input ${item.answer[0].right_ans == 'b' ? 'bg-success' : 'bg-danger'}" 
                                                    type="radio" 
                                                    name="q${index + 1}" 
                                                    ${item.answer[0].right_ans == 'b' ? 'checked' : ''}>
                                                <label for="form-label">B )</label>
                                                <input 
                                                    class="form-control" 
                                                    type="text" value="${item.answer[0].b}" 
                                                    id="b_${item.answer[0].uid}"
                                                    onKeyUp="show_ans_update_btn('${item.answer[0].uid}','b')">
                                            </div>
                                            <div class="form-check mb-3">
                                                <input 
                                                    class="form-check-input ${item.answer[0].right_ans == 'c' ? 'bg-success' : 'bg-danger'}" 
                                                    type="radio" 
                                                    name="q${index + 1}" 
                                                    ${item.answer[0].right_ans == 'c' ? 'checked' : ''}>
                                                <label for="form-label">C )</label>
                                                <input 
                                                    class="form-control" 
                                                    type="text" 
                                                    value="${item.answer[0].c}" 
                                                    id="c_${item.answer[0].uid}"
                                                    onKeyUp="show_ans_update_btn('${item.answer[0].uid}','c')">
                                            </div>
                                            <div class="form-check mb-3">
                                                <input 
                                                    class="form-check-input ${item.answer[0].right_ans == 'd' ? 'bg-success' : 'bg-danger'}" 
                                                    type="radio" 
                                                    name="q${index + 1}" 
                                                    ${item.answer[0].right_ans == 'd' ? 'checked' : ''}>
                                                <label for="form-label">D )</label>
                                                <input 
                                                    class="form-control" type="text" 
                                                    value="${item.answer[0].d}" 
                                                    id="d_${item.answer[0].uid}"
                                                    onKeyUp="show_ans_update_btn('${item.answer[0].uid}','d')">
                                            </div>
                                        </div>
                                    </div>`



                        } else {
                            html += `<div class="card mb-3 col-lg-6">
                                        <div class="card-header">
                                            <label for="form-label">Q-${index + 1}</label>
                                            <textarea id="q_${item.uid}"></textarea>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-check mb-3">
                                                <input class="form-control" type="text" value="${item.answer[0].ans}" id="">
                                            </div>
                                        </div>
                                    </div>`
                        }

                        setTimeout(() => {
                            ClassicEditor
                                .create(document.querySelector(`#q_${item.uid}`))
                                .then(editor => {
                                    editor.setData(item.question);
                                    editor.model.document.on('change:data', () => {
                                        $(`#save_btn_${item.uid}`).show();
                                        if (!$(`#save_btn_${item.uid}`).length) {
                                            $(`#q_${item.uid}`).after(`<button class="btn btn-info m-2" id="save_btn_${item.uid}">Save</button>`);

                                            $(`#save_btn_${item.uid}`).on('click', function () {
                                                const contentToSave = editor.getData();

                                                $.ajax({
                                                    url: '<?= base_url('/api/question/update') ?>',
                                                    type: 'POST',
                                                    data: {
                                                        q_id: item.uid,
                                                        question: contentToSave
                                                    },
                                                    beforeSend: function () { },
                                                    success: function (resp) {
                                                        let alertHtml = ''
                                                        if (resp.status) {
                                                            alertHtml += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                                                    <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                                </div>`
                                                            $(`#save_btn_${item.uid}`).hide();
                                                        } else {
                                                            alertHtml += `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                                                    <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - ${resp.message}
                                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                                </div>`
                                                        }
                                                        $('#alert').html(alertHtml)

                                                    },
                                                    error: function (err) {
                                                        console.log(err)
                                                    }

                                                })




                                            });
                                        }


                                    });
                                })
                                .catch(error => {
                                    console.error(error);
                                });
                        }, 0);

                    })
                    $('#qna_con').html(html)
                }



            },
            error: function (err) {
                console.log(err)
            }
        })
    }

    function classes(class_id, branch_id) {
        $.ajax({
            url: "<?= base_url('/api/class-list') ?>",
            type: "GET",
            beforeSend: function () { },
            success: function (resp) {
                // console.log(resp)
                let html = ''
                if (resp.status) {
                    $.each(resp.data, function (key, val) {
                        var isSelected = ''
                        if (val.class_id == class_id) {
                            isSelected = 'selected'
                        }
                        html += `<option ${isSelected} value="${val.class_id}">${val.class_name}</option>`
                        // $('#className').append(html)
                    })
                }
                $('#className').html(html)
                get_branches(branch_id)
            },
            error: function (err) {
                console.log(err)
            }
        })
    }

    function get_branches(branch_id) {
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
                        var isSelected = ''
                        if (val.branch_id == branch_id) {
                            isSelected = 'selected'
                        }
                        html += `<option ${isSelected} value="${val.branch_id}">${val.branch_name}</option>`
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