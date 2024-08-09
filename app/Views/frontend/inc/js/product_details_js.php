<script>
    let product_id = "";
    let c_id = "";
    $(document).ready(function () {
        // Get the URL parameters
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const p_id = urlParams.get('p_id');
        
        $.ajax({
            url: "<?= base_url('/api/product') ?>",
            type: "GET",
            data: { p_id: p_id },
            success: function (resp) {
                
                if (resp.status) {
                    
                    var product = resp.data
                    console.log(product)
                    product_id = product.product_id;
                    c_id = product.category_id;
                    // get_similar_product(resp.data.category_id, product_id)
                    $('#course_title').text(product.name)
                    $('#about_course').html(product.about_product)
                    $('#course_details').html(product.description)
                    var original_price = product.base_discount ? (product.base_price - (product.base_price * (product.base_discount / 100))).toFixed(2) : product.base_price.toFixed(2);
                    var base_price = product.base_discount ? product.base_price : "";
                    var base_discount = product.base_discount ? product.base_discount : "";
                    $('#course_includes').html(`<li>
                                                <span class="label"><i class="icon-60"></i>Price:</span>
                                                <span class="value price">₹${original_price}</span>
                                            </li>
                                            <li>
                                                <span class="label"><i class="icon-61"></i>Duration:</span>
                                                <span class="value">${product.duration}</span>
                                            </li>
                                            <li>
                                                <span class="label"><i class="icon-59"></i>Language:</span>
                                                <span class="value">English</span>
                                            </li>`)

                            $('#course_image').html(`<img src="<?=base_url()?>public/uploads/product_images/${product.product_img[0].src}" alt="Courses">`)
                            $('#course_lecturer').html(`<img src="<?= base_url('public/uploads/user_images/') ?>${product.user_image}" alt="Author Images">`)
                            $('#course_lecturer_name').html(product.lecturer_name)
                            $('#course_lecturer_role').html(product.staff_role)
                            if(product.enrolled < product.max_student){
                                $('#start_now').html(`<a class="edu-btn" onclick="add_to_cart()">Start Now <i class="icon-4"></i></a>`)
                            }else{
                                $('#start_now').html(`<span style="color:red;">ALL SEATS ARE FULL!</span>`)
                            }
                            
                                            

                    // var truncatedDescription = truncateText(resp.data.description, 150);
                    // $('#product_description').html(truncatedDescription)
                    // $('#product_description').data('full-description', resp.data.description);

                    // if(resp.data.product_stock >= 1){
                    //     $('#product_stock').append(`<li class=""><i class="bi bi-check2-circle me-2 align-middle text-success"></i>In stock</li>`);
                    //     $('#product_add_to_cart_button').append(`<button type="button" onclick="add_to_cart()" class="btn btn-success btn-hover w-100"><i class="bi bi-basket2 me-2"></i> Add To Cart</button>`);
                        
                    // }else{
                    //     $('#product_stock').append(`<li class="out-of-stock"><i class="bi bi-x-circle me-2 align-middle text-danger"></i>Out of stock</li>`);
                    //     $('#product_add_to_cart_button').append(`<button type="button" class="btn w-100 out_of_stock"><i class="bi bi-basket2 me-2"></i> Add To Cart</button>`);
                        
                    // }

                    // var original_price = resp.data.base_discount ? (resp.data.base_price - (resp.data.base_price * (resp.data.base_discount / 100))).toFixed(2) : resp.data.base_price.toFixed(2);
                    // var base_price = resp.data.base_discount ? resp.data.base_price : "";
                    // var base_discount = resp.data.base_discount ? resp.data.base_discount : "";
                    // $('#product_price').html('₹'+original_price  + `<span class="text-muted fs-14" id="base_price"><del>₹${base_price}</del></span> <span class="fs-14 ms-2 text-danger">${base_discount}% off</span>`)

                    // $.each(resp.data.product_img, function(index, p_img) {
                    //     var isActive = ''
                    //     if(index == 0){
                    //         isActive = 'active'
                    //     }
                    //     html2 = `<div class="carousel-item ${isActive}">
                    //                 <img class="d-block w-100 fixed-size-image" src="<?= base_url()?>public/uploads/product_images/${p_img.src}" alt="" style=" width: 300px;">
                    //             </div>`
                    //     $('#main_image').append(html2);
                    // })
                    
                } else {
                    console.log(resp)
                    
                }
                // console.log(resp)
            },
            error: function (err) {
                console.log(err)
            },
        })

        get_varient(id)

        

        function truncateText(text, maxLength) {
            if (text.length > maxLength) {
                return text.substring(0, maxLength) + '... <a href="javascript:void(0);" class="link-info" id="read_more_link">Read More</a>';
            } else {
                return text;
            }
        }
        $('#product_description').on('click', '#read_more_link', function(e) {
            e.preventDefault();
            var $description = $('#product_description');
            var fullDescription = $description.data('full-description');
            if ($(this).text() === 'Read More') {
                    $description.html(fullDescription + ' <a href="javascript:void(0);" id="show_less_link">Show Less</a>');
                } else {
                    $description.html(truncatedDescription + ' <a href="javascript:void(0);" id="read_more_link">Read More</a>');
                }
        });
        $('#product_description').on('click', '#show_less_link', function(e) {
                e.preventDefault();
                var $description = $('#product_description');
                var truncatedDescription = truncateText($description.data('full-description'), 150); // Adjust the character count as needed
                
                $description.html(truncatedDescription);
            });

            
    })
    function add_to_cart() {
    //    var product_quantity = $('#product_quantity').val()
        console.log(product_id)
        $.ajax({
            url: "<?= base_url('/api/user/id') ?>",
            type: "GET",
            success: function (resp) {
                
                if (resp.status) {
                    console.log(resp.data) 
                    $.ajax({
                        url: "<?= base_url('/api/user/cart/add') ?>",
                        type: "POST",
                        data:{product_id:product_id, 
                            user_id:resp.data,
                            variation_id:'VAR00001',
                            qty:'1',
                            },
                        success: function (resp) {
                            
                            if (resp.status) {
                                Toastify({
                                text: resp.message.toUpperCase(),
                                duration: 3000,
                                position: "center",
                                stopOnFocus: true,
                                style: {
                                    background: resp.status ? 'darkgreen' : 'darkred',
                                },

                            }).showToast();
                            get_cart_header()
                            get_profile_section()
                            } else {
                                console.log(resp)
                                Toastify({
                                text: resp.message.toUpperCase(),
                                duration: 3000,
                                position: "center",
                                stopOnFocus: true,
                                style: {
                                    background: resp.status ? 'darkgreen' : 'darkred',
                                },

                            }).showToast();
                            }
                            
                        },
                        error: function (err) {
                            console.log(err)
                        },
                    })
                    
                } else {
                    Toastify({
                        text: 'Please login'.toUpperCase(),
                        duration: 3000,
                        position: "center",
                        stopOnFocus: true,
                        style: {
                            background: 'darkred',
                        },

                    }).showToast();
                    // console.log(resp)
                    // var existingData = localStorage.getItem('cartData');
                    // var dataArray = existingData ? JSON.parse(existingData) : [];
                    // if (!Array.isArray(dataArray)) {
                    //     dataArray = []; // Initialize as empty array if not already an array
                    // }
                    // var data = {
                    //     product_id: product_id,
                    //     variation_id: 'VAR00001',
                    //     qty: product_quantity
                    // };
                    // dataArray.push(data);
                    
                    // var jsonData = JSON.stringify(dataArray);
                    // localStorage.setItem('cartData', jsonData);
                    

                    // // Retrieve data from local storage
                    // var storedData = localStorage.getItem('cartData');
                    // var retrievedData = JSON.parse(storedData);
                    // console.log(retrievedData); // This will log 'value1'

                    // if(retrievedData != ""){
                    //     var message = 'Item added to cart'
                    //     Toastify({
                    //         text: message.toUpperCase(),
                    //         duration: 3000,
                    //         position: "center",
                    //         stopOnFocus: true,
                    //         style: {
                    //             background: 'darkgreen',
                    //         },

                    //     }).showToast();
                    // }else{
                    //     var message = 'Item added Faild!'
                    //     Toastify({
                    //         text: message.toUpperCase(),
                    //         duration: 3000,
                    //         position: "center",
                    //         stopOnFocus: true,
                    //         style: {
                    //             background: 'darkred',
                    //         },

                    //     }).showToast(); 
                    // }
                    
                }

                
            },
            error: function (err) {
                console.log(err)
            },
        })

    }

    function quantity_increase(){
        var product_quantity = parseInt($('#product_quantity').val())
        if(product_quantity < 100){
            $('#product_quantity').val(product_quantity+1)
        }
    }

    function quantity_decrease(){
        var product_quantity = parseInt($('#product_quantity').val())
        if(product_quantity > 1){
            $('#product_quantity').val(product_quantity-1)
        }
    }

    function get_similar_product(c_id, product_id){
        // alert(product_id)
        $.ajax({
            url: "<?= base_url('/api/product?c_id=') ?>"+c_id,
            type: "GET",
            success: function (resp) {
                
                if (resp.status) {
                    console.log(resp)
                    $.each(resp.data, function(index, products) {
                        if(products.product_id != product_id){
                            var original_price = products.base_discount ? (products.base_price - (products.base_price * (products.base_discount / 100))).toFixed(2) : products.base_price.toFixed(2);
                            var base_price = products.base_discount ? products.base_price : "";
                            var base_discount = products.base_discount ? products.base_discount : "";
                            var add_to_cart_button = ` <div class="mt-3">
                                                        <a href="shop-cart.html" class="btn btn-primary w-100 add-btn"><i class="mdi mdi-cart me-1"></i> Add To Cart</a>
                                                    </div>`
                            if(products.product_stock < 1){
                                add_to_cart_button = `<span style="color:red;">Currently unavailable</span>`

                            }
                            var html = `<div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <div class="card ecommerce-product-widgets border-0 rounded-0 shadow-none overflow-hidden card-animate">
                                            <a href="<?= base_url('product/details?id=')?>${products.product_id}">
                                                <div class="bg-light bg-opacity-50 rounded py-4 position-relative">
                                                    <img src="<?= base_url()?>public/uploads/product_images/${products.product_img[0].src}" alt="" style="max-height: 200px;max-width: 100%;" class="mx-auto d-block rounded-2">
                                                </div>
                                            </a>
                                            <div class="pt-4">
                                                <ul class="clothe-colors list-unstyled hstack gap-1 mb-3 flex-wrap">
                                                    <li><input type="radio" name="sizes10" id="product-color-102"><label class="avatar-xxs btn btn-secondary p-0 d-flex align-items-center justify-content-center rounded-circle" for="product-color-102"></label></li>
                                                    <li><input type="radio" name="sizes10" id="product-color-103"><label class="avatar-xxs btn btn-dark p-0 d-flex align-items-center justify-content-center rounded-circle" for="product-color-103"></label></li>
                                                    <li><input type="radio" name="sizes10" id="product-color-104"><label class="avatar-xxs btn btn-danger p-0 d-flex align-items-center justify-content-center rounded-circle" for="product-color-104"></label></li>
                                                    <li><input type="radio" name="sizes10" id="product-color-105"><label class="avatar-xxs btn btn-light p-0 d-flex align-items-center justify-content-center rounded-circle" for="product-color-105"></label></li>
                                                </ul>
                                                <a href="<?= base_url('product/details?id=')?>${products.product_id}">
                                                    <h6 class="text-capitalize fs-15 lh-base text-truncate mb-0">${products.name}</h6>
                                                </a>
                                                <div class="mt-2">
                                                    <span class="float-end">4.1 <i class="ri-star-half-fill text-warning align-bottom"></i></span>
                                                    <h5 class="mb-0">₹${original_price}</h5>
                                                </div>
                                                ${add_to_cart_button}
                                            </div>
                                        </div>
                                    </div>`
                                    $('#similar_product').append(html)
                        }
                        
                    })
                    
                } else {
                    console.log(resp)
                    
                }
                // console.log(resp)
            },
            error: function (err) {
                console.log(err)
            },
        })
    }

    function get_varient(id){
        $.ajax({
            url: "<?= base_url('/api/product/variant?p_id=') ?>"+id,
            type: "GET",
            success: function (resp) {
                console.log(resp)
                if (resp.status) {
                    console.log(resp)
                    $('#product_size').html(`<li> <input type="radio" checked="" name="sizes7" id="product-color-72"> <label class="avatar-xs btn btn-soft-primary text-uppercase p-0 fs-12 d-flex align-items-center justify-content-center rounded-circle" for="product-color-72">${resp.data[0].size}</label> </li>`)
                    $('#product_color').html(`<li>
                                            <input type="radio" name="sizes" id="product-color-2" checked="" value="${resp.data[0].color}">
                                            <label class="avatar-xs btn p-0 d-flex align-items-center justify-content-center rounded-circle" style="background-color:${resp.data[0].color}" for="product-color-2"></label>
                                        </li>`)
                    
                } else {
                    console.log(resp)
                    
                }
                
            },
            error: function (err) {
                console.log(err)
            },
        })
    }

</script>