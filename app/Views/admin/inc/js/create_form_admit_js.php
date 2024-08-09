<script>
    var editor;
    $(document).ready(function() {
        load_all_data()

        ClassicEditor.create(document.querySelector("#ckeditor-classic")).then(function (createdEditor) {
            editor = createdEditor;
            editor.ui.view.editable.element.style.height = "200px";
        }).catch(function (error) {
            console.error(error);
        });

        $('#live_class_add_btn').on('click', function () {
            var formData = new FormData();

            $('.questions').each(function() {
                formData.append('questions[]', $(this).val());
            });

            $('.inputType').each(function() {
                formData.append('inputType[]', $(this).val());
            });

            $('.exam_centre').each(function() {
                formData.append('exam_centre[]', $(this).val());
            });

            $('.exam_date').each(function() {
                formData.append('exam_date[]', $(this).val());
            });

            $('.exam_time').each(function() {
                formData.append('exam_time[]', $(this).val());
            });
            $('.exam_end_time').each(function() {
                formData.append('exam_end_time[]', $(this).val());
            });

            formData.append('noteTitle', $('#noteTitle').val());
            formData.append('note', editor.getData());

            $.ajax({
                url: "<?= base_url('/api/add/admit-form/queston') ?>",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#live_class_add_btn').html(`<div class="spinner-border" role="status"></div>`)
                    $('#live_class_add_btn').attr('disabled', true)

                },
                success: function (resp) {
                    let html = ''

                    if (resp.status) {
                        html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                    } else {
                        html += `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - ${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                    }
                    $('#alert').html(html)
                    load_all_data()
                    console.log(resp)
                },
                error: function (err) {
                    console.log(err)
                },
                complete: function () {
                    $('#live_class_add_btn').html(`submit`)
                    $('#live_class_add_btn').attr('disabled', false)
                }
            })
        })
    });

    function load_all_data() {
        $.ajax({
            url: "<?= base_url('/api/admit-form/data') ?>",
            type: "GET",
            beforeSend: function () {},
            success: function (resp) {
                console.log(resp)
                if (resp.status) {
                    $('#new_chq').empty()
                    $('#new_centre').empty()
                    $('#new_date').empty()
                    $('#new_time').empty()
                    var new_chq_no = parseInt($('#total_chq').val())+1;
                        let html = ``
                        $.each(resp.data, function (index, admitData) {
                            var new_chq_no = parseInt($('#total_chq').val())+1;
                            var select_type_text = '';
                            var select_type_number = '';
                            var select_type_date = '';
                            var select_type_time = '';
                            var select_type_file = '';
                            if(admitData.question_type == 'text'){
                                select_type_text = 'selected';
                            }else if(admitData.question_type == 'number'){
                                select_type_number = 'selected';
                            }else if(admitData.question_type == 'date'){
                                select_type_date = 'selected';
                            }else if(admitData.question_type == 'time'){
                                select_type_time = 'selected';
                            }else if(admitData.question_type == 'file'){
                                var select_type_file = 'selected';
                            }
                            html += `<div class="row" id='new_${new_chq_no}'>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="formGroupExampleInput2">Question</label>
                                                <input type="text" class="form-control questions" name="questions[]" id="questions[]" value="${admitData.question}" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3">
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">Input Type</label>
                                                <select class="form-control inputType" name="inputType[]" id="inputType[]">
                                                    <option disabled value="">select-input-type</option>
                                                    <option ${select_type_text} value="text">Text</option>
                                                    <option ${select_type_number} value="number">Number</option>
                                                    <option ${select_type_date} value="date">Date</option>
                                                    <option ${select_type_time} value="time">time</option>
                                                    <option ${select_type_file} value="file">File</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3">
                                            <div class="form-group mt-4">
                                                <button type="button" onclick="remove('${new_chq_no}')" class="btn btn-danger">Remove</button>
                                            </div>
                                        </div>
                                    </div> `;
                            $('#total_chq').val(new_chq_no)
                        })
                        $('#new_chq').append(html)
                        $('#noteTitle').val(resp.note_data.title)
                        editor.setData(resp.note_data.note)
                        var centre_data = JSON.parse(resp.note_data.centre_name, true)
                        html_centre = ``;
                        $.each(centre_data, function (index, centre) {
                            var new_centre_no = parseInt($('#total_centre').val())+1;
                            html_centre += `<div class="row mt-2" id='new_centre_${new_centre_no}'>
                                        <div class="col-xl-10 col-lg-10">
                                            <div class="form-group">
                                                <label for="formGroupExampleInput2">Centre Name</label>
                                                <input type="text" class="form-control exam_centre" name="exam_centre[]" id="exam_centre[]" value="${centre}" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-2">
                                            <div class="form-group mt-4">
                                                <button type="button" onclick="remove_centre('${new_centre_no}')" class="btn btn-danger">X</button>
                                            </div>
                                        </div>
                                    </div> `;
                            $('#total_centre').val(new_centre_no)
                        })
                        $('#new_centre').append(html_centre)

                        var date_data = JSON.parse(resp.note_data.date, true)
                        html_date = ``;
                        $.each(date_data, function (index, date) {
                            var new_date_no = parseInt($('#total_date').val())+1;
                            html_date += `<div class="row mt-2" id='new_date_${new_date_no}'>
                                            <div class="col-xl-10 col-lg-10">
                                                <div class="form-group">
                                                    <label for="formGroupExampleInput2">Exam Date</label>
                                                    <input type="date" class="form-control exam_date" name="exam_date[]" id="exam_date[]" value="${date}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-2">
                                                <div class="form-group mt-4">
                                                    <button type="button" onclick="remove_date('${new_date_no}')" class="btn btn-danger">X</button>
                                                </div>
                                            </div>
                                        </div>`;
                            $('#total_date').val(new_date_no)
                        })
                        $('#new_date').append(html_date)

                   

                        var time_data = JSON.parse(resp.note_data.time, true)
                        console.log(time_data);
                        html_time = ``;
                        $.each(time_data, function (index, time) {
                            var new_time_no = parseInt($('#total_time').val())+1;
                            html_time += `<div class="row mt-2" id='new_time_${new_time_no}'>
                                            <div class="col-xl-5 col-lg-5">
                                                <div class="form-group">
                                                    <label for="formGroupExampleInput2">Start Time</label>
                                                    <input type="time" class="form-control exam_time" name="exam_time[]" id="exam_time[]" value="${time.start}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-lg-5">
                                                <div class="form-group">
                                                    <label for="formGroupExampleInput2">End Time</label>
                                                    <input type="time" class="form-control exam_end_time" name="exam_end_time[]" id="exam_end_time[]" value="${time.end}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-2">
                                                <div class="form-group mt-4">
                                                    <button type="button" onclick="remove_time('${new_time_no}')" class="btn btn-danger">X</button>
                                                </div>
                                            </div>
                                        </div>`;
                            $('#total_time').val(new_time_no)
                        })
                        $('#new_time').append(html_time)

                }else{
                    var new_chq_no = parseInt($('#total_chq').val())+1;
                    html = `<div class="row" id='new_${new_chq_no}'>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="formGroupExampleInput2">Question</label>
                                                <input type="text" class="form-control" name="questions[]" id="questions[]" placeholder="Enter a question" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3">
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">Input Type</label>
                                                <select class="form-control" name="inputType[]" id="inputType[]">
                                                    <option selected disabled value="">select-input-type</option>
                                                    <option value="text">Text</option>
                                                    <option value="number">Number</option>
                                                    <option value="date">Date</option>
                                                    <option value="time">time</option>
                                                    <option value="file">File</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> `;
                    $('#new_chq').html(html)
                }

            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {
               
            }
        })
    }

    function add(){
      var new_chq_no = parseInt($('#total_chq').val())+1;
        //   var new_input="<input type='text' id='new_"+new_chq_no+"'>";
      var new_input=`
            <div class="row" id='new_${new_chq_no}'>
                <div class="col-xl-6 col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Question</label>
                        <input type="text" class="form-control questions" name="questions[]" id="questions[]" placeholder="Enter a question" required>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Input Type</label>
                        <select class="form-control inputType" name="inputType[]" id="inputType[]">
                            <option selected disabled value="">select-input-type</option>
                            <option value="text">Text</option>
                            <option value="number">Number</option>
                            <option value="date">Date</option>
                            <option value="time">time</option>
                            <option value="file">File</option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3">
                    <div class="form-group mt-4">
                        <button type="button" onclick="remove('${new_chq_no}')" class="btn btn-danger">Remove</button>
                    </div>
                </div>
            </div>      
      `;
      $('#new_chq').append(new_input);
      $('#total_chq').val(new_chq_no)
    }
    function remove(chq_no){
      var last_chq_no = $('#total_chq').val();
      if(last_chq_no>1){
        $('#new_'+chq_no).remove();
        $('#total_chq').val(last_chq_no-1);
      }
    }

    function add_centre(){
        var new_centre_no = parseInt($('#total_centre').val())+1;
        //   var new_input="<input type='text' id='new_"+new_chq_no+"'>";
        var new_input=`
                        <div class="row" id='new_centre_${new_centre_no}'>
                            <div class="col-xl-10 col-lg-10">
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Centre Name</label>
                                    <input type="text" class="form-control exam_centre" name="exam_centre[]" id="exam_centre[]" placeholder="Enret centre name" required>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2">
                                <div class="form-group mt-4">
                                    <button type="button" onclick="remove_centre('${new_centre_no}')" class="btn btn-danger">X</button>
                                </div>
                            </div>
                        </div>`;
        $('#new_centre').append(new_input);
        $('#total_centre').val(new_centre_no)
    }
    function remove_centre(centre_no){
      var last_centre_no = $('#total_centre').val();
      if(last_centre_no>1){
        $('#new_centre_'+centre_no).remove();
        $('#total_centre').val(last_centre_no-1);
      }
    }

    function add_date(){
        var new_date_no = parseInt($('#total_date').val())+1;
        //   var new_input="<input type='text' id='new_"+new_chq_no+"'>";
        var new_input=`
                        <div class="row" id='new_date_${new_date_no}'>
                            <div class="col-xl-10 col-lg-10">
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Exam Date</label>
                                    <input type="date" class="form-control exam_date" name="exam_date[]" id="exam_date[]" placeholder="Enter date" required>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2">
                                <div class="form-group mt-4">
                                    <button type="button" onclick="remove_date('${new_date_no}')" class="btn btn-danger">X</button>
                                </div>
                            </div>
                        </div>`;
        $('#new_date').append(new_input);
        $('#total_date').val(new_date_no)
    }
    function remove_date(date_no){
      var last_date_no = $('#total_date').val();
      if(last_date_no>1){
        $('#new_date_'+date_no).remove();
        $('#total_date').val(last_date_no-1);
      }
    }

    function add_time(){
        var new_time_no = parseInt($('#total_time').val())+1;
        //   var new_input="<input type='text' id='new_"+new_chq_no+"'>";
        var new_input=`<div class="row" id='new_time_${new_time_no}'>
                            <div class="col-xl-5 col-lg-5">
                                                <div class="form-group">
                                                    <label for="formGroupExampleInput2">Start Time</label>
                                                    <input type="time" class="form-control exam_time" name="exam_time[]" id="exam_time[]" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-lg-5">
                                                <div class="form-group">
                                                    <label for="formGroupExampleInput2">End Time</label>
                                                    <input type="time" class="form-control exam_end_time" name="exam_end_time[]" id="exam_end_time[]" required>
                                                </div>
                                            </div>
                            <div class="col-xl-2 col-lg-2">
                                <div class="form-group mt-4">
                                    <button type="button" onclick="remove_time('${new_time_no}')" class="btn btn-danger">X</button>
                                </div>
                            </div>
                        </div>`;
        $('#new_time').append(new_input);
        $('#total_time').val(new_time_no)
    }
    function remove_time(time_no){
      var last_time_no = $('#total_time').val();
      if(last_time_no>1){
        $('#new_time_'+time_no).remove();
        $('#total_time').val(last_time_no-1);
      }
    }

    
</script>