<script>
     $(document).ready(function () {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const c_id = urlParams.get('c_id');
        load_product(c_id)
        // load_categories()
        
    })

    function load_product(c_id){
        if(c_id != null){
            $.ajax({
                url: "<?= base_url('/api/product') ?>",
                data:{c_id:c_id},
                type: "GET",
                success: function (resp) {
                    
                    if (resp.status) {
                        console.log(resp)
                        // $('#user_address').empty();
                            var html =``  
                            $.each(resp.data, function(index, product) {
                                console.log(product)
                                // if(index <= 8){
                                    var enrolled_now = ``
                                    if(product.enrolled < product.max_student){
                                        enrolled_now =`<a class="edu-btn btn-medium" onclick="add_to_cart('${product.product_id}')">Add to Cart</a>`
                                    }else{
                                        enrolled_now =`<span style="color:red;">ALL SEATS ARE FULL!</span>`
                                    }
                                    var original_price = product.base_discount ? (product.base_price - (product.base_price * product.base_discount / 100)) : product.base_price;
                                    var base_price = product.base_discount ? product.base_discount : "";
                                    html += `<div class="edu-course course-style-4 course-style-9">
                                                <div class="inner">
                                                    <div class="thumbnail" style="max-height: 200px; max-width: 200px;">
                                                        <a href="<?=base_url('product/details?p_id=')?>${product.product_id}">
                                                            <img src="<?=base_url()?>public/uploads/product_images/${product.product_img[0].src}" alt="Course Meta" style="max-height: 200px; max-width: 200px; border-radius: 50%;">
                                                        </a>
                                                    </div>
                                                    <div class="content">
                                                        
                                                        <h6 class="title">
                                                            <a href="<?=base_url('product/details?p_id=')?>${product.product_id}">${product.name}</a>
                                                        </h6>
                                                        <div class="course-price">₹${original_price}</div>
                                                        <p>${product.description}</p>
                                                        
                                                    </div>
                                                </div>
                                                <div class="hover-content-aside">
                                                    <div class="content">
                                                        <span class="course-level">Engineering</span>
                                                        <h5 class="title">
                                                            <a href="course-details.html">${product.name}</a>
                                                        </h5>
                                                        <ul class="course-meta">
                                                            <li>Durations</li>
                                                            <li>${product.duration}</li>
                                                            <li>All Levels</li>
                                                        </ul>
                                                        <div class="course-feature">
                                                            <h6 class="title">Description</h6>
                                                            <ul>
                                                                <li>${product.description}</li>
                                                            </ul>
                                                        </div>
                                                        <div class="button-group">
                                                            ${enrolled_now}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>`
                                            // $('#total_products').html(`<p class="text-muted flex-grow-1 mb-0">Showing ${index+1} results</p>`);
                                // }
                            })
                            $('#product-grid').html(html);
                    } else {
                        $('#product-grid').html(`<span style="display: flex; justify-content: center; text-align: center;">${resp.message}!</span>`);
                        console.log("error")
                    }
                    
                },
                error: function (err) {
                    console.log(err)
                },
            })  
        } else{
            $.ajax({
                url: "<?= base_url('/api/product') ?>",
                type: "GET",
                success: function (resp) {
                    
                    if (resp.status) {
                        console.log(resp)
                        // $('#user_address').empty();
                            var html =``  
                            $.each(resp.data, function(index, product) {
                                // console.log(product.product_id)
                                // if(index <= 8){
                                    var enrolled_now = ``
                                    if(product.enrolled < product.max_student){
                                        enrolled_now =`<a class="edu-btn btn-medium" onclick="add_to_cart('${product.product_id}')">Add to Cart</a>`
                                    }else{
                                        enrolled_now =`<span style="color:red;">ALL SEATS ARE FULL!</span>`
                                    }
                                    var original_price = product.base_discount ? (product.base_price - (product.base_price * product.base_discount / 100)) : product.base_price;
                                    var base_price = product.base_discount ? product.base_discount : "";
                                    html += `<div class="edu-course course-style-4 course-style-9">
                                                <div class="inner">
                                                    <div class="thumbnail" style="max-height: 200px; max-width: 200px;">
                                                        <a href="<?=base_url('product/details?p_id=')?>${product.product_id}">
                                                            <img src="<?=base_url()?>public/uploads/product_images/${product.product_img[0].src}" alt="Course Meta" style="max-height: 200px; max-width: 200px; border-radius: 50%;">
                                                        </a>
                                                    </div>
                                                    <div class="content">
                                                        
                                                        <h6 class="title">
                                                            <a href="<?=base_url('product/details?p_id=')?>${product.product_id}">${product.name}</a>
                                                        </h6>
                                                        <div class="course-price">₹${original_price}</div>
                                                        <p>${product.description}</p>
                                                        
                                                    </div>
                                                </div>
                                                <div class="hover-content-aside">
                                                    <div class="content">
                                                        <span class="course-level">Engineering</span>
                                                        <h5 class="title">
                                                            <a href="course-details.html">${product.name}</a>
                                                        </h5>
                                                        <ul class="course-meta">
                                                            <li>Durations</li>
                                                            <li>${product.duration}</li>
                                                            <li>All Levels</li>
                                                        </ul>
                                                        <div class="course-feature">
                                                            <h6 class="title">Description</h6>
                                                            <ul>
                                                                <li>${product.description}</li>
                                                            </ul>
                                                        </div>
                                                        <div class="button-group">
                                                            ${enrolled_now}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>`
                                            // $('#total_products').html(`<p class="text-muted flex-grow-1 mb-0">Showing ${index+1} results</p>`);
                                // }
                            })
                            $('#product-grid').html(html);
                    } else {
                        $('#product-grid').html(`<span style="display: flex; justify-content: center; text-align: center;">${resp.message}!</span>`);
                        console.log("error")
                    }
                    
                },
                error: function (err) {
                    console.log(err)
                },
            })  
        }
    }
    function add_to_cart(p_id) {
        
        $.ajax({
            url: "<?= base_url('/api/user/id') ?>",
            type: "GET",
            success: function (resp) {
                
                if (resp.status) {
                    // console.log(resp.data) 
                    $.ajax({
                        url: "<?= base_url('/api/user/cart/add') ?>",
                        type: "POST",
                        data:{product_id:p_id, 
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
                    // }
                    // var data = {
                    //     product_id: p_id,
                    //     variation_id: 'VAR00001',
                    //     qty: '1'
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

    function out_of_stock(){
        Toastify({
            text: 'Currently this product is out of stock'.toUpperCase(),
            duration: 3000,
            position: "center",
            stopOnFocus: true,
            style: {
                background: 'gray',
            },

        }).showToast();
    }

    // function load_categories() {

    //     $.ajax({
    //         url: "<?= base_url('/api/categories') ?>",
    //         type: "GET",
    //         beforeSend: function () { },
    //         success: function (resp) {
    //             if (resp.status) {
    //                 console.log(resp)
    //                 html = `<li>
    //                             <a href="javascript:void(0)" onclick="load_product(${c_id = null})" class="d-flex py-1 align-items-center">
    //                                 <div class="flex-grow-1">
    //                                     <h5 class="fs-13 mb-0 listname">All</h5>
    //                                 </div>
    //                             </a>
    //                         </li>`
    //                 $.each(resp.data, function (index, item) {
    //                     html += `<li>
    //                                 <a href="javascript:void(0)" onClick="load_products('${item.uid}')" class="d-flex py-1 align-items-center">
    //                                     <div class="flex-grow-1">
    //                                         <h5 class="fs-13 mb-0 listname">${item.name}</h5>
    //                                     </div>
    //                                 </a>
    //                             </li>`
    //                 })
    //                 $('#pills-tab').html(html)
    //             }
    //         },
    //         error: function (err) {
    //             console.error(err)
    //         }
    //     })


    // }

    function load_products(c_id) {

        $.ajax({
            url: "<?= base_url('/api/category/product/list') ?>",
            type: "GET",
            data: {
                c_id: c_id
            },
            beforeSend: function () {
                $('#product-grid').html(`<div style="width: 100%;
                                                    display: flex;
                                                    align-items: center;
                                                    justify-content: center;
                                                    height: 200px;">
                                            <div style="height: 50px;
                                                        width: 50px;
                                                        font-size: 20px;
                                                        color: #004aad;" class="spinner-border" 
                                                role="status">
                                            </div>
                                        </div>`)
            },
            success: function (resp) {

                console.log(resp)
                if (resp.status == true) {
                    html = ''
                    if (resp.data.length > 0) {
                        $.each(resp.data, function (index, product) {
                            // console.log(product)
                                // if(index <= 8){
                                    var original_price = product.base_discount ? (product.base_price - (product.base_price * product.base_discount / 100)): product.base_price;
                                    var base_price = product.base_discount ? product.base_discount : "";
                                    html += `<div class="col-xxl-3 col-lg-4 col-md-6">
                                                <div class="card ecommerce-product-widgets border-0 rounded-0 shadow-none overflow-hidden">
                                                    <a href="<?= base_url('product/details?id=')?>${product.product_id}">
                                                        <div class="bg-light bg-opacity-50 rounded py-4 position-relative"> <img
                                                                src="<?=base_url()?>public/uploads/product_images/${product.product_img[0].src}" alt=""
                                                                style="max-height: 200px;max-width: 100%;" class="mx-auto d-block rounded-2">
                                                            
                                                            <div class="avatar-xs label">
                                                                <div class="avatar-title bg-danger rounded-circle fs-11">${product.base_discount}%</div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="pt-4">
                                                        <div>
                                                            <ul class="clothe-colors list-unstyled hstack gap-1 mb-3 flex-wrap">
                                                                <li> <input type="radio" name="sizes1" id="product-color-12"> <label
                                                                        class="avatar-xxs btn btn-success p-0 d-flex align-items-center justify-content-center rounded-circle"
                                                                        for="product-color-12"></label> </li>
                                                                <li> <input type="radio" name="sizes1" id="product-color-13"> <label
                                                                        class="avatar-xxs btn btn-info p-0 d-flex align-items-center justify-content-center rounded-circle"
                                                                        for="product-color-13"></label> </li>
                                                                <li> <input type="radio" name="sizes1" id="product-color-14"> <label
                                                                        class="avatar-xxs btn btn-warning p-0 d-flex align-items-center justify-content-center rounded-circle"
                                                                        for="product-color-14"></label> </li>
                                                                <li> <input type="radio" name="sizes1" id="product-color-15"> <label
                                                                        class="avatar-xxs btn btn-danger p-0 d-flex align-items-center justify-content-center rounded-circle"
                                                                        for="product-color-15"></label> </li>
                                                            </ul> 
                                                            <a href="<?= base_url('product/details?id=')?>${product.product_id}">
                                                                <h6 class="text-capitalize fs-15 lh-base text-truncate mb-0">${product.name}</h6>
                                                            </a>
                                                            <div class="mt-2"> <span class="float-end">4.9 <i
                                                                        class="ri-star-half-fill text-warning align-bottom"></i></span>
                                                                <h5 class="text-secondary mb-0">₹${original_price}<span
                                                                        class="text-muted fs-12"><del>₹${product.base_price}</del></span></h5>
                                                            </div>
                                                            <div class="tn mt-3"> <a href="javascript:void(0)" onclick="add_to_cart('${product.product_id}')"
                                                                    class="btn btn-primary btn-hover w-100 add-btn"><i
                                                                        class="mdi mdi-cart me-1"></i> Add To Cart</a> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>`
                                    // $('#product-grid').append(html);
                                    $('#total_products').html(`<p class="text-muted flex-grow-1 mb-0">Showing ${index+1} results</p>`);
                                // }
                        })
                        $('#product-grid').html(html);
                    } else {
                        $('#product-grid').html(`<h3 class="text-danger">No Products Found</h3>`);
                    }
                } else {
                    $('#product-grid').html(`<h3 class="text-danger">No Products Found</h3>`);
                }
            },
            error: function (err) {
                console.error(err)
            },
            complete: function () { }
        })

    }

    // function search_product() {
    //     var alphabet = $('#searchProductList').val()
    //     // alert(alphabet)
    //     $.ajax({
    //         url: "<?= base_url('/api/search/product') ?>",
    //         type: "GET",
    //         data: {
    //             alph: alphabet
    //         },
    //         beforeSend: function () {
    //             $('#product-grid').html(`<div style="width: 100%;
    //                                                 display: flex;
    //                                                 align-items: center;
    //                                                 justify-content: center;
    //                                                 height: 200px;">
    //                                         <div style="height: 50px;
    //                                                     width: 50px;
    //                                                     font-size: 20px;
    //                                                     color: #004aad;" class="spinner-border" 
    //                                             role="status">
    //                                         </div>
    //                                     </div>`)
    //         },
    //         success: function (resp) {

    //             console.log(resp)
    //             if (resp.status == true) {
    //                 html = ''
    //                 if (resp.data.length > 0) {
    //                     $.each(resp.data, function (index, product) {
    //                         // console.log(product)
    //                             // if(index <= 8){
    //                                 var original_price = product.base_discount ? (product.base_price - (product.base_price * product.base_discount / 100)): product.base_price;
    //                                 var base_price = product.base_discount ? product.base_discount : "";
    //                                 html += `<div class="col-xxl-3 col-lg-4 col-md-6">
    //                                             <div class="card ecommerce-product-widgets border-0 rounded-0 shadow-none overflow-hidden">
    //                                                 <a href="<?= base_url('product/details?id=')?>${product.product_id}">
    //                                                     <div class="bg-light bg-opacity-50 rounded py-4 position-relative"> <img
    //                                                             src="<?=base_url()?>public/uploads/product_images/${product.product_img[0].src}" alt=""
    //                                                             style="max-height: 200px;max-width: 100%;" class="mx-auto d-block rounded-2">
                                                            
    //                                                         <div class="avatar-xs label">
    //                                                             <div class="avatar-title bg-danger rounded-circle fs-11">${product.base_discount}%</div>
    //                                                         </div>
    //                                                     </div>
    //                                                 </a>
    //                                                 <div class="pt-4">
    //                                                     <div>
    //                                                         <ul class="clothe-colors list-unstyled hstack gap-1 mb-3 flex-wrap">
    //                                                             <li> <input type="radio" name="sizes1" id="product-color-12"> <label
    //                                                                     class="avatar-xxs btn btn-success p-0 d-flex align-items-center justify-content-center rounded-circle"
    //                                                                     for="product-color-12"></label> </li>
    //                                                             <li> <input type="radio" name="sizes1" id="product-color-13"> <label
    //                                                                     class="avatar-xxs btn btn-info p-0 d-flex align-items-center justify-content-center rounded-circle"
    //                                                                     for="product-color-13"></label> </li>
    //                                                             <li> <input type="radio" name="sizes1" id="product-color-14"> <label
    //                                                                     class="avatar-xxs btn btn-warning p-0 d-flex align-items-center justify-content-center rounded-circle"
    //                                                                     for="product-color-14"></label> </li>
    //                                                             <li> <input type="radio" name="sizes1" id="product-color-15"> <label
    //                                                                     class="avatar-xxs btn btn-danger p-0 d-flex align-items-center justify-content-center rounded-circle"
    //                                                                     for="product-color-15"></label> </li>
    //                                                         </ul> 
    //                                                         <a href="<?= base_url('product/details?id=')?>${product.product_id}">
    //                                                             <h6 class="text-capitalize fs-15 lh-base text-truncate mb-0">${product.name}</h6>
    //                                                         </a>
    //                                                         <div class="mt-2"> <span class="float-end">4.9 <i
    //                                                                     class="ri-star-half-fill text-warning align-bottom"></i></span>
    //                                                             <h5 class="text-secondary mb-0">₹${original_price}<span
    //                                                                     class="text-muted fs-12"><del>₹${product.base_price}</del></span></h5>
    //                                                         </div>
    //                                                         <div class="tn mt-3"> <a href="javascript:void(0)" onclick="add_to_cart('${product.product_id}')"
    //                                                                 class="btn btn-primary btn-hover w-100 add-btn"><i
    //                                                                     class="mdi mdi-cart me-1"></i> Add To Cart</a> </div>
    //                                                     </div>
    //                                                 </div>
    //                                             </div>
    //                                         </div>`
    //                                 // $('#product-grid').append(html);
    //                                 $('#total_products').html(`<p class="text-muted flex-grow-1 mb-0">Showing ${index+1} results</p>`);
    //                             // }
    //                     })
    //                     $('#product-grid').html(html);
    //                 } else {
    //                     $('#product-grid').html(`<h3 class="text-danger">No Products Found</h3>`);
    //                 }
    //             } else {
    //                 $('#product-grid').html(`<h3 class="text-danger">No Products Found</h3>`);
    //             }
    //         },
    //         error: function (err) {
    //             console.error(err)
    //         },
    //         complete: function () { }
    //     })

    // }

    function clear_all(){
        load_product(c_id=null)
        $('#searchProductList').val("")
    }
</script>