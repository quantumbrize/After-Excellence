<script>
  
    $(document).ready(function () {
        load_cities()

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

        $('#centre_update_btn').on('click', function () {
            var formData = new FormData();
            var currentUrl = window.location.href;
            var urlParams = new URLSearchParams(currentUrl.split('?')[1]);
            var centre_id = urlParams.get('centre_id');

            formData.append('city_id', $('#cityName').val());
            formData.append('centresName', $('#centreName').val());
            formData.append('location', $('#centreLocation').val());
            formData.append('phone', $('#phoneNo').val());
            formData.append('centre_id',centre_id);

            $.each($('#file-input')[0].files, function (index, file) {
                formData.append('images[]', file);
            })

            $.ajax({
                url: "<?= base_url('/api/update/centre') ?>",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#centre_update_btn').html(`<div class="spinner-border" role="status"></div>`)
                    $('#centre_update_btn').attr('disabled', true)

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
                    $('#centre_update_btn').html(`submit`)
                    $('#centre_update_btn').attr('disabled', false)
                }
            })
        })


        // function get_banner(){
            var currentUrl = window.location.href;
            var urlParams = new URLSearchParams(currentUrl.split('?')[1]);
            var centre_id = urlParams.get('centre_id');
            $.ajax({
                url: "<?= base_url('/api/centres') ?>",
                type: "GET",
                data:{centre_id:centre_id},
                success: function (resp) {
                    if (resp.status) {
                    console.log(resp)
                    $('#cityName').append(`<option selected value="${resp.data.city_id}">${resp.data.city_name}</option>`)
                    $('#centreName').val(resp.data.centre_name)
                    $('#centreLocation').val(resp.data.location)
                    $('#phoneNo').val(resp.data.phone)
                    $('#images').html(`<img src="<?= base_url('public/uploads/centres_images/') ?>${resp.data.centre_img}" alt="" class="city-image">`)
                    
                    }else{
                        console.log(resp)
                    }
                },
                error: function (err) {
                    console.log(err)
                },
            })
        // }

    });


    function load_cities() {
        $.ajax({
            url: "<?= base_url('/api/cities') ?>",
            type: "GET",
            beforeSend: function () {
                $('#table-banner-list-all-body').html(`<tr >
                        <td colspan="7"  style="text-align:center;">
                            <div class="spinner-border" role="status"></div>
                        </td>
                    </tr>`)
            },
            success: function (resp) {
                if (resp.status) {
                    if (resp.data.length > 0) {
                        console.log(resp)
                        var html = ``
                        $.each(resp.data, function (index, city) {
                            html += `<option value="${city.uid}">${city.name}</option>`
                        })
                        $('#cityName').append(html)
                    }
                }else{
                    $('#cityName').html(`<option value="">Citys not found!</option>`)
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