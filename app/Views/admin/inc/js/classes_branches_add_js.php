<script>
    function add(){
      var new_chq_no = parseInt($('#total_chq').val())+1;
    //   var new_input="<input type='text' id='new_"+new_chq_no+"'>";
      var new_input=`<div class="col-lg-8">
                            <div class="mb-3">
                                <input type="text" class="form-control" id='new_${new_chq_no}' value=""
                                    placeholder="Enter branch name ${new_chq_no}" required="">
                            </div>
                        </div>
                        `;
      $('#new_chq').append(new_input);
      $('#total_chq').val(new_chq_no)
    }
    function remove(){
      var last_chq_no = $('#total_chq').val();
      if(last_chq_no>1){
        $('#new_'+last_chq_no).remove();
        $('#total_chq').val(last_chq_no-1);
      }
    }

    function add_class_and_branches_data() {
        var className = $('#className').val()
        var values = [];
        $('[id^="new_"]').each(function() {
            values.push($(this).val());
        });
        console.log(className);

        var formData = new FormData();

        formData.append('className', className);
        formData.append('branches', values);

        $.ajax({
            url: "<?= base_url('/api/class-and-branches/add') ?>",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#class_and_branches_add_btn').html(`<div class="spinner-border" role="status"></div>`)
                $('#class_and_branches_add_btn').attr('disabled', true)

            },
            success: function (resp) {
                let html = ''

                if (resp.status) {
                    html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                            <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`
                        $('#className').val('')
                        $('[id^="new_"]').each(function() {
                            $(this).val('');
                        });
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
                $('#class_and_branches_add_btn').html(`submit`)
                $('#class_and_branches_add_btn').attr('disabled', false)
            }
        })

    }

</script>