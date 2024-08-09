<script>
    $(document).ready(function() {
        // new Choices(document.querySelector(".choices-single"));
        var studentChoices = new Choices(document.querySelector(".choices-single"));
        load_students(studentChoices)

       

        $('#live_class_add_btn').on('click', function () {
            var student = $('#selectStudent').val();
            var totalMarks = $('#totalMarks').val();
            var flag = true;

            if(student == "" || student == null){
                $('#select_student_val').text('Please select a student')
            }else{
                $('#select_student_val').text('')
            }

            if(totalMarks == ""){
                $('#total_marks_val').text('Please enter the total marks')
            }else{
                $('#total_marks_val').text('')
            }
            var formData = new FormData();

            $('.questions').each(function() {
                if($(this).val() == ""){
                    flag = false
                }else{
                    formData.append('questions[]', $(this).val());
                }
                
            });

            $('.givenAnswers').each(function() {
                if($(this).val() == ""){
                    flag = false
                }else{
                    formData.append('givenAnswers[]', $(this).val());
                }
                
            });

            $('.rightAnswer').each(function() {
                if($(this).val() == ""){
                    flag = false
                }else{
                    formData.append('rightAnswer[]', $(this).val());
                }
                
            });

            $('.obtainedMarks').each(function() {
                if($(this).val() == ""){
                    flag = false
                }else{
                    formData.append('obtainedMarks[]', $(this).val());
                }
                
            });

            if(student != "" && student != null && totalMarks != "" && flag == true){
                formData.append('selectStudent', student);
                formData.append('totalMarks', totalMarks);

                $.ajax({
                    url: "<?= base_url('/api/add/unsigned-user/result') ?>",
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
                                window.location.href = '<?= base_url('admin/results')?>';
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
                        $('#live_class_add_btn').html(`submit`)
                        $('#live_class_add_btn').attr('disabled', false)
                    }
                })
            } else if (flag == false){
                html = `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                    <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Don't submit empty fields
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>`
                $('#alert').html(html)
            }
            
        })

        
    });

    function add(){
      var new_chq_no = parseInt($('#total_chq').val())+1;
        //   var new_input="<input type='text' id='new_"+new_chq_no+"'>";
      var new_input=`
            <div class="row" id='new_${new_chq_no}'>
                <div class="col-xl-3 col-lg-3">
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Question</label>
                        <input type="text" class="form-control questions" id="questions[]" placeholder="Enter question" required>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Given Answer</label>
                        <input type="text" class="form-control givenAnswers" id="givenAnswers[]" placeholder="Enter given answer" required>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Right Answer</label>
                        <input type="text" class="form-control rightAnswer" id="rightAnswer[]" placeholder="Enter correct answer" required>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Marks</label>
                        <input type="text" class="form-control obtainedMarks" id="obtainedMarks[]" placeholder="Enter marks" required>
                    </div>
                </div>
                <div class="col-xl-1 col-lg-1">
                    <div class="form-group mt-4">
                        <button type="button" onclick="remove('${new_chq_no}')" class="btn btn-danger">X</button>
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

    function load_students(studentChoices) {
        $.ajax({
            url: "<?= base_url('/api/admit/user/data') ?>",
            type: "GET",
            beforeSend: function () {},
            success: function (resp) {
                console.log(resp)
                if (resp.status) {
                    // var html = `<option value="" selected disabled>Select-a-student</option>`
                    var choices = [
                        { value: "", label: "Select-a-student", disabled: true, selected: true }
                    ];
                    $.each(resp.data, function (index, student) {
                        // html += `<option value="${student.submit_admit_data_id}" >${student.name} (${student.email})</option>`
                        choices.push({
                            value: student.submit_admit_data_id,
                            label: `${student.name} (${student.email})`
                        });
                    })
                    // $('.choices-single').html(html)
                    studentChoices.setChoices(choices, 'value', 'label', true);

                }else{
                    $('.choices-single').html(`<option value="" selected disabled>No-data-found</option>`)
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