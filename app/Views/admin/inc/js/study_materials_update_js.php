<script>
  
    $(document).ready(function () {
        classes()
        load_study_material('<?= $_GET['study_material_id']?>')

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

        $('#study_material_update_btn').on('click', function () {
            var formData = new FormData();

            formData.append('study_material_id', $('#study_material_id').val());
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
                url: "<?= base_url('/api/update/study-materials') ?>",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#study_material_update_btn').html(`<div class="spinner-border" role="status"></div>`)
                    $('#study_material_update_btn').attr('disabled', true)

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
                    load_study_material('<?= $_GET['study_material_id']?>')
                    console.log(resp)
                },
                error: function (err) {
                    console.log(err)
                },
                complete: function () {
                    $('#study_material_update_btn').html(`submit`)
                    $('#study_material_update_btn').attr('disabled', false)
                }
            })
        })
        
    });

    function load_study_material(study_material_id) {
        $.ajax({
            url: "<?= base_url('/api/study-materials') ?>",
            type: "GET",
            data:{study_material_id:study_material_id},
            beforeSend: function () {
            },
            success: function (resp) {
                console.log(resp)
                if (resp.status) {
                    $('#study_material_id').val(resp.data.study_material_id)
                    $('#className').append(`<option selected value="${resp.data.class_id}">${resp.data.class_name}</option>`)
                    $('#branchName').html(`<option value="${resp.data.branch_id}">${resp.data.branch_name}</option>`)
                    $('#title').val(resp.data.title)
                    if(resp.data.type == 'pdf'){
                        $("#option1").prop("checked", true);
                        $('#upload_link').hide();
                        $('#upload_pdf').show();
                        $('#material_link').val("");
                        let pdf_data = `<?= base_url()?>public/uploads/study_material/${resp.data.pdf}`;
                        $('#pdf_data').attr('src', pdf_data);
                    } else if(resp.data.type == 'link'){
                        $("#option2").prop("checked", true);
                        $('#upload_link').show();
                        $('#upload_pdf').hide();
                        $('#pdf-input').val("");
                        $('#material_link').val(resp.data.link)
                    }
                }else{
                }

            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {
               
            }
        })
    }

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