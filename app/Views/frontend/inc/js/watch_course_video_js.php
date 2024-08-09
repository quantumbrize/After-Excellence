
<script>
    $(document).ready(function () {
        load_course('<?= $_GET['product_id'] ?>')
    })

    function calculateFinalPrice(originalPrice, discountPercentage) {
        // Calculate the discount amount
        var discountAmount = (originalPrice * discountPercentage) / 100;
        
        // Calculate the final price after applying the discount
        var finalPrice = originalPrice - discountAmount;
        
        // Return the final price
        return finalPrice;
    }

    function formatDate(dateString) {
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        const date = new Date(dateString);
        const day = date.getDate();
        const month = months[date.getMonth()];
        const year = date.getFullYear();
        return `${day} ${month} ${year}`;
    }

    function load_course(p_id) {
        // alert(user_id)
        $.ajax({
            url: "<?= base_url('/api/product') ?>",
            type: "GET",
            data:{p_id:p_id},
            beforeSend: function () {
            },
            success: function (resp) {
                console.log(resp)
                if (resp.status) {
                    
                    // var html = ``
                        html = `<div class="col-lg-12" >
                                    <div class=" video-style">
                                        <iframe class="" src="${resp.data.video_url}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-lg-12" >
                                    <div class="login-form-box registration-form">
                                            <div class="row mb-4" >
                                                <div class="row">
                                                <div class="col-xl-12 col-lg-12">
                                                    <div>
                                                        <div class="card">
                                                                <div class="card-body">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <th>All Details</th>
                                                                            <th></th>
                                                                        </thead>
                                                                    </table>
                                                                    <table class="table">
                                                                        <tbody id="product_details">
                                                                        <tr>
                                                                            <td>Code</td>
                                                                            <td style="text-align: right" class="text-secondary">${resp.data.product_code}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Details</td>
                                                                            <td style="text-align: right" class="text-secondary">${resp.data.description}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Category</td>
                                                                            <td style="text-align: right" class="text-secondary">${resp.data.category}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Price</td>
                                                                            <td style="text-align: right" class="text-success fs-16 ">${calculateFinalPrice(resp.data.base_price,resp.data.base_discount)} ₹</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>About Course</td>
                                                                            <td style="text-align: right" class="text-secondary">${resp.data.about_product}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Duration</td>
                                                                            <td style="text-align: right" class="text-secondary">${resp.data.duration}</td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <!-- end card -->
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                    </div>
                                </div>`
                    $('#examination_form').html(html);
                    $('#page_title').text(resp.data.name);
                } else {
                    html = `<div class="col-lg-12" >
                                <div class="login-form-box registration-form">
                                    <h3 class="title" style="text-align:center">${resp.message}!</h3>
                                </div>
                            </div>`
                        $('#examination_form').html(html);
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