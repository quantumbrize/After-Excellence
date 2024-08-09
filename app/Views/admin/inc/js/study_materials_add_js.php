<script>
  
    $(document).ready(function () {
        classes()

        let $pdfFileInput = $("#pdf-input");
        let $pdfContainer = $("#pdfs");
        let $numOfPdfFiles = $("#num-of-pdf-files");

        function preview2() {
            $pdfContainer.html("");
            $numOfPdfFiles.text(`${$pdfFileInput[0].files.length} Files Selected`);

            $.each($pdfFileInput[0].files, function (index, file) {
                let reader = new FileReader();
                let $figure = $("<figure>");
                let $figCap = $("<figcaption>").text(file.name);
                $figure.append($figCap);
                reader.onload = function () {
                    let $img = $("<img>").attr("src", reader.result);
                    // $figure.prepend(reader.result);
                }
                // $pdfContainer.append($figure);
                reader.readAsDataURL(file);
            });
        }
        $pdfFileInput.change(preview2);

        $('input[name="materialOptions"]').on('change', function () {
            if ($('input[name="materialOptions"]:checked').val() == 'pdf') {
                $('#upload_link').hide();
                $('#upload_pdf').show();
                $('#material_link').val("");
            } else if ($('input[name="materialOptions"]:checked').val() == 'link') {
                $('#upload_link').show();
                $('#upload_pdf').hide();
                $('#file-input').val("");
            }
        });
        $('input[name="materialOptions"]:checked').trigger('change');

        $('#study_material_add_btn').on('click', function () {
            var formData = new FormData();

            formData.append('class_id', $('#className').val());
            formData.append('branch_id', $('#branchName').val());
            formData.append('title', $('#title').val());
            // formData.append('description', $('#classLinkDescription').val());

            formData.append('type', $('input[name="materialOptions"]:checked').val());
            formData.append('material_link', $('#material_link').val());
            $.each($('#pdf-input')[0].files, function (index, file) {
                formData.append('pdf[]', file);
            });

            $.ajax({
                url: "<?= base_url('/api/add/study-material') ?>",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#study_material_add_btn').html(`<div class="spinner-border" role="status"></div>`)
                    $('#study_material_add_btn').attr('disabled', true)

                },
                success: function (resp) {
                    let html = ''

                    if (resp.status) {
                        html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                        // $('#classLink').val(``)
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
                    $('#study_material_add_btn').html(`submit`)
                    $('#study_material_add_btn').attr('disabled', false)
                }
            })
        })
        
    });

    function classes(){
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

    function get_branches(){
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