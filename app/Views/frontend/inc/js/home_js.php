
<script>
    $(document).ready(function () {
        load_banners()
        // alert('hello')
    })


    function load_banners() {
       
        $.ajax({
            url: "<?= base_url('/api/banners') ?>",
            type: "GET",
            beforeSend: function () {
            },
            success: function (resp) {
                console.log(resp)
                if (resp.status) {
                    let html =``
                    let html2 =``
                    $.each(resp.data, function (index, banner) {
                        isActive = index === 0 ? 'active' : ''
                        // console.log(banner);
                        var shop_now = ``
                        if (banner.title != "") {
                            shop_now = ` <a href="${banner.link}" class="btn btn-danger btn-hover"><i class="ph-shopping-cart align-middle me-1"></i> ShopNow</a>`
                        }
                        html += `<img src="<?= base_url('public/uploads/banner_images/') ?>${banner.img}" alt="Image ${index+1}">`
                        html2 += `<span data-index="${index}" class="${index == 0 ? 'active' : ''}"></span>`
                    })
                    $('#banner_container').html(html);
                    $('#banner_indicators').html(html2);
                } else {
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