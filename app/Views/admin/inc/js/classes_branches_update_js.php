<script>
     $(document).ready(function () {

        get_class_data('<?= $_GET['class_id'] ?>');
     })
    function add(){
      var new_chq_no = parseInt($('#total_chq').val())+1;
        //   var new_input="<input type='text' id='new_"+new_chq_no+"'>";
      var new_input=`<div class="col-lg-12">
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

    function formatDate(dateString) {
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        const date = new Date(dateString);
        const day = date.getDate();
        const month = months[date.getMonth()];
        const year = date.getFullYear();
        return `${day} ${month} ${year}`;
    }

    function update_class_and_branches_data() {
        var className = $('#className').val()
        var values = [];
        $('[id^="new_"]').each(function() {
            values.push($(this).val());
        });
        var class_id = '<?= $_GET['class_id'] ?>'

        var formData = new FormData();

        formData.append('className', className);
        formData.append('branches', values);
        formData.append('class_id', class_id);

        $.ajax({
            url: "<?= base_url('/api/update/class-and-branches') ?>",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#class_and_branches_update_btn').html(`<div class="spinner-border" role="status"></div>`)
                $('#class_and_branches_update_btn').attr('disabled', true)

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
                        get_class_data('<?= $_GET['class_id'] ?>');
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
                $('#class_and_branches_update_btn').html(`submit`)
                $('#class_and_branches_update_btn').attr('disabled', false)
            }
        })

    }

    function get_class_data(class_id) {
        $.ajax({
            url: "<?= base_url('/api/class-and-branches') ?>",
            type: 'GET',
            data: {
                class_id: class_id
            },
            beforeSend: function () { },
            success: function (resp) {
                // console.log(resp);
                if (resp.status) {
                    classes = resp.data;
                    console.log(classes)
                    let class_name_html = `<h3>${classes.class_name}</h3>`
                    $('#class_name').html(class_name_html);
                    var html = ``
                    $.each(classes.branches, function (Index, branch) {
                        html += `<tr>
                                        <td>${branch.branch_name}</td>
                                        <td style="text-align: right"><a class="" id="${branch.uid}-delete-branch-btn" onclick="delete_branches('${branch.uid}')">
                                            <i class="ri-delete-bin-line fs-15" style="color: red;"></i>

                                            </a>
                                        </td>
                                    </tr>`
                                    
                    });
                    $('#product_details').html(html);
                    $('#className').val(classes.class_name);
                }
            },
            error: function (err) {
                console.log(err)
            }

        })
    }

    function delete_branches(branch_id){
        // alert(banner_id)
        $.ajax({
            url: "<?= base_url('/api/delete/branch') ?>",
            type: "GET",
            data:{branch_id:branch_id},
            beforeSend: function () {
                $('#'+branch_id+'-delete-branch-btn').html(`<div class="spinner-border" role="status"></div>`)
                $('#'+branch_id+'-delete-branch-btn').attr('disabled', true)
            },
            success: function (resp) {
                var html = ""
                if (resp.status) {
                    html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                }else{
                    html += `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - ${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                }
                $('#alert').html(html)
                get_class_data('<?= $_GET['class_id'] ?>');
            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {
                // $('#'+branch_id+'-delete-branch-btn').html(`<i class="ri-delete-bin-line fs-15" style="color: red;"></i>`)
                // $('#'+branch_id+'-delete-branch-btn').attr('disabled', false)
            }
        })
    }

</script>