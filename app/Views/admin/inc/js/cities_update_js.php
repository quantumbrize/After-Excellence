<script>
  
    $(document).ready(function () {

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

        $('#city_update_btn').on('click', function () {
            
            var currentUrl = window.location.href;
            var urlParams = new URLSearchParams(currentUrl.split('?')[1]);
            var city_id = urlParams.get('city_id');
            var formData = new FormData();

            formData.append('cityName', $('#cityName').val());
            formData.append('city_id', city_id);
            

            $.each($('#file-input')[0].files, function (index, file) {
                formData.append('images[]', file);
            })
            formData.forEach(function(value, key){
        console.log(key + ": " + value);
    });
            $.ajax({
                url: "<?= base_url('/api/update/city') ?>",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#city_update_btn').html(`<div class="spinner-border" role="status"></div>`)
                    $('#city_update_btn').attr('disabled', true)

                },
                success: function (resp) {
                    let html = ''

                    if (resp.status) {
                        html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                            // get_banner()
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
                    $('#city_update_btn').html(`submit`)
                    $('#city_update_btn').attr('disabled', false)
                }
            })
        })

        
        // function get_banner(){
            var currentUrl = window.location.href;
            var urlParams = new URLSearchParams(currentUrl.split('?')[1]);
            var city_id = urlParams.get('city_id');
            $.ajax({
                url: "<?= base_url('/api/city/update') ?>",
                type: "GET",
                data:{city_id:city_id},
                success: function (resp) {
                    if (resp.status) {
                    console.log(resp)
                    $('#cityName').val(resp.data.name)
                    $('#images').html(`<img src="<?= base_url('public/uploads/cities_images/') ?>${resp.data.img}" alt="" class="city-image">`)
                    
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


        
</script>