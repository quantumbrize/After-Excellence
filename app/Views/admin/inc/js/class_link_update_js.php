<script>
  
    $(document).ready(function () {
        get_live_class_data()

        $('#live_class_update_btn').on('click', function () {
            var formData = new FormData();

            formData.append('class_id', $('#className').val());
            formData.append('branch_id', $('#branchName').val());
            formData.append('class_link', $('#classLink').val());
            formData.append('description', $('#classLinkDescription').val());
            formData.append('live_class_id', $('#live_class_id').val());

            $.ajax({
                url: "<?= base_url('/api/live-class-link/update') ?>",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#live_class_update_btn').html(`<div class="spinner-border" role="status"></div>`)
                    $('#live_class_update_btn').attr('disabled', true)

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
                    console.log(resp)
                },
                error: function (err) {
                    console.log(err)
                },
                complete: function () {
                    $('#live_class_update_btn').html(`submit`)
                    $('#live_class_update_btn').attr('disabled', false)
                }
            })
        })
    });

    function get_live_class_data(){
        var currentUrl = window.location.href;
        var urlParams = new URLSearchParams(currentUrl.split('?')[1]);
        var live_class_id = urlParams.get('live_class_id');
        $.ajax({
            url: "<?= base_url('/api/live-classes') ?>",
            type: "GET",
            data:{live_class_id:live_class_id},
            beforeSend: function () { },
            success: function (resp) {
                console.log(resp)
                classes(resp.data.class_id, resp.data.branch_id)
                $('#classLink').val(resp.data.class_link)
                $('#live_class_id').val(resp.data.live_class_id)
                $('#classLinkDescription').val(resp.data.description)
            },
            error: function (err) {
                console.log(err)
            }
        })
    }

    function classes(class_id, branch_id){
        $.ajax({
            url: "<?= base_url('/api/class-list') ?>",
            type: "GET",
            beforeSend: function () { },
            success: function (resp) {
                // console.log(resp)
                let html = '<option value="">Select-Class</option>'
                if (resp.status) {
                    
                    $.each(resp.data, function (key, val) {
                        var selected_class = ''
                        if(class_id == val.class_id){
                            selected_class = 'selected'
                        }
                        html += `<option ${selected_class} value="${val.class_id}">${val.class_name}</option>`
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

    function get_branches(branch_id){
        var class_id = $('#className').val()
        $.ajax({
            url: "<?= base_url('/api/branches') ?>",
            type: "GET",
            data: {class_id:class_id},
            beforeSend: function () { },
            success: function (resp) {
                // console.log(resp)
                let html = '<option value="">Select-Branch</option>'
                if (resp.status) {
                    $.each(resp.data, function (key, val) {
                        var selected_branch = ''
                        if(branch_id == val.branch_id){
                            selected_branch = 'selected'
                        }
                        html += `<option ${selected_branch} value="${val.branch_id}">${val.branch_name}</option>`
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