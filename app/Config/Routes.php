<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);

// Frontend Routes
$routes->get('/',                                   'Frontend\Frontend_Controller::home'); // Home page
$routes->get('/logout',                             'Frontend\Frontend_Controller::logout'); // Logout functionality
$routes->get('/user/registration',                  'Frontend\Frontend_Controller::user_registration'); // Logout functionality
$routes->get('/login',                              'Frontend\Frontend_Controller::load_login'); // Load login page
$routes->post('/login-action',                      'Frontend\Frontend_Controller::handle_login'); // Handle login form submission
$routes->get('/forgot-password',                    'Frontend\Frontend_Controller::load_forgot_password'); // Load forgot password page
$routes->get('/sign-up',                            'Frontend\Frontend_Controller::load_signup'); // Load sign up page
$routes->get('/sign-up-success',                    'Frontend\Frontend_Controller::signup_success'); // Sign up success page
$routes->post('/sign-up-action',                    'Frontend\Frontend_Controller::handle_signup'); // Handle sign up form submission
$routes->get('/resend-otp',                        'Frontend\Frontend_Controller::resend_otp'); // Handle sign up form submission
$routes->get('/change-password',                    'Frontend\Frontend_Controller::change_password'); // Load change password page
$routes->post('/change-password-action',            'Frontend\Frontend_Controller::handle_change_password'); // Handle change password form submission
$routes->post('/send-otp',                          'Frontend\Frontend_Controller::send_otp'); // Send OTP for verification
$routes->get('/verify-otp',                         'Frontend\Frontend_Controller::load_otp'); // Load OTP verification page
// $routes->post('/verify-otp-action',                 'Frontend\Frontend_Controller::verify_otp');
$routes->get('/product/list',                       'Frontend\Product_Controller::product_list'); // List of products
$routes->get('/product/details',                    'Frontend\Product_Controller::product_details'); // Product details page
$routes->get('/product/category',                   'Frontend\Product_Controller::product_category'); // Product category page
$routes->get('/user/account',                       'Frontend\Frontend_Controller::account'); // User account page
$routes->get('/user/address',                       'Frontend\Frontend_Controller::address'); // User address page
$routes->get('/user/cart',                          'Frontend\Product_Controller::cart'); // User cart page
$routes->get('/user/cart/checkout',                 'Frontend\Product_Controller::cart_checkout'); // Checkout page
$routes->get('/about-us',                           'Frontend\Frontend_Controller::about_us'); // About us page
$routes->get('/purchase-guide',                     'Frontend\Frontend_Controller::purchase_guide'); // Purchase guide page
$routes->get('/terms-conditions',                   'Frontend\Frontend_Controller::terms_conditions'); // Terms and conditions page
$routes->get('/privacy-policy',                     'Frontend\Frontend_Controller::privacy_policy'); // Privacy policy page
$routes->get('/faq',                                'Frontend\Frontend_Controller::faq'); // FAQ page
$routes->get('/invoice',                            'Frontend\Order_Controller::invoice'); // Invoice page
$routes->get('/order/success',                      'Frontend\Order_Controller::order_success'); // Order success page
$routes->get('/order/track',                        'Frontend\Order_Controller::track_order'); // Track order page
$routes->get('/order/cancel',                       'Frontend\Order_Controller::cancel_order'); // Cancel order page
$routes->get('/order/return',                       'Frontend\Order_Controller::return_order'); // Return order page
$routes->get('/order/item/return',                  'Frontend\Order_Controller::return_order_item'); // Return order item page
$routes->get('/order/history',                      'Frontend\Order_Controller::order_history'); // Order history page
$routes->get('/order/conformation',                 'Frontend\Order_Controller::conformation'); // Order confirmation page
$routes->get('/order/returns',                      'Frontend\Order_Controller::returns'); // Order returns page
$routes->get('/contact-us',                         'Frontend\Frontend_Controller::contact_us'); // Contact us page
$routes->get('/payment',                            'Frontend\Order_Controller::payment'); // Payment page
$routes->get('/review',                             'Frontend\Product_Controller::review'); // Review page
$routes->get('/wishlist',                           'Frontend\Product_Controller::wishlist'); // Wishlist page
$routes->get('/online-test',                        'Frontend\Frontend_Controller::online_test'); // Online test page
$routes->get('/live-classes',                       'Frontend\Frontend_Controller::live_classes'); // Live classes page
$routes->get('/watch/course_video',                 'Frontend\Frontend_Controller::course_video'); // Watch course video page
$routes->get('/city/centres',                       'Frontend\Frontend_Controller::city_centres'); // City centres page
$routes->get('/start/test',                         'Frontend\Frontend_Controller::start_online_test'); // Start test page
$routes->get('/get/admit',                          'Frontend\Frontend_Controller::start_test_anonymous'); // Start test page
$routes->get('/admit/offline-test',                 'Frontend\Frontend_Controller::online_test_anonymous'); // Test Admit for offline test page
$routes->get('/offline-test/marksheet',             'Frontend\Frontend_Controller::marksheet'); // Marksheet page


$routes->get('/study-material',                     'Frontend\Frontend_Controller::study_material');
$routes->get('/papers',                             'Frontend\Frontend_Controller::paper');
$routes->get('/login-pin',                          'Frontend\Frontend_Controller::login_pin');
$routes->post('/verify-pin-action',                 'Frontend\Frontend_Controller::verify_pin'); // Handle PIN verification form submission
$routes->get('/pdf-reader',                         'Frontend\Frontend_Controller::pdf_reader');
$routes->get('/test',                               'Frontend\Frontend_Controller::test');
$routes->get('/video-player',                       'Frontend\Frontend_Controller::video_player');





// Admin Routes
$routes->get('/admin',                              'Admin\Admin_Controller::index'); // Admin dashboard page
$routes->get('/admin/login',                        'Admin\Admin_Controller::load_login'); // Admin login page
$routes->get('/admin/logout',                       'Admin\Admin_Controller::logout'); // Admin logout functionality
$routes->post('/admin/login-action',                'Admin\Admin_Controller::handle_login'); // Handle admin login form submission
$routes->get('/admin/categories',                   'Admin\Category_Controller::index'); // Admin categories page
$routes->get('/admin/product',                      'Admin\Product_Controller::load_single_product'); // Admin single product page
$routes->get('/admin/product/list',                 'Admin\Product_Controller::index'); // Admin product list page
$routes->get('/admin/product/add',                  'Admin\Product_Controller::load_product_add'); // Admin product add page
$routes->get('/admin/product/update',               'Admin\Product_Controller::load_product_update'); // Admin product update page
$routes->get('/admin/product/variant/add',          'Admin\Product_Controller::load_add_variants'); // Admin add product variants page
$routes->get('/admin/orders',                       'Admin\Orders_Controller::index'); // Admin orders page
$routes->get('/admin/orders/returns',               'Admin\Orders_Controller::load_orders_returns'); // Admin order returns page
$routes->get('/admin/orders/returns/details',       'Admin\Orders_Controller::load_orders_returns_single'); // Admin order returns details page
$routes->get('/admin/user/order',                   'Admin\Orders_Controller::load_single_order'); // Admin single order page
$routes->get('/admin/users/customers',              'Admin\User_Controller::load_customer'); // Admin customers page
$routes->get('/admin/users/vendors',                'Admin\User_Controller::load_vendor'); // Admin vendors page
$routes->get('/admin/users/staff',                  'Admin\User_Controller::load_staff'); // Admin staff page
$routes->get('/admin/users/staff/add',              'Admin\User_Controller::load_staff_add'); // Admin add staff page
$routes->get('/admin/users/staff/update',           'Admin\User_Controller::load_staff_update'); // Admin Staff Update page
$routes->get('/admin/users/students',               'Admin\User_Controller::load_students'); // Admin Staff Update page
$routes->get('/admin/profile',                      'Admin\User_Controller::load_admon_profile'); // Admin Staff Update page

$routes->get('/admin/users/student/single',         'Admin\User_Controller::load_student_single'); // Admin Staff Update page
$routes->get('/admin/banners',                      'Admin\Admin_Controller::banner'); // Admin banners page
$routes->get('/admin/banners/add',                  'Admin\Admin_Controller::banners_add'); // Admin add banners page
$routes->get('/admin/banners/update',               'Admin\Admin_Controller::banners_update'); // Admin update banners page
$routes->get('/admin/discounts/add',                'Admin\Admin_Controller::discounts_add'); // Admin add discounts page
$routes->get('/admin/discounts',                    'Admin\Admin_Controller::discounts_list'); // Admin discounts list page
$routes->get('/admin/promotion-card',               'Admin\Admin_Controller::promotion_card'); // Admin promotion card page
$routes->get('/admin/classes-branches/add',         'Admin\Admin_Controller::classes_branches_add'); // Admin classes and branches add page
$routes->get('/admin/classes-branches',             'Admin\Admin_Controller::classes_branches'); // Admin classes and branches page
$routes->get('/admin/classes-branches/update',      'Admin\Admin_Controller::classes_branches_update'); // Admin classes and branches update page
$routes->get('/admin/test/create',                  'Admin\Admin_Controller::test_create'); // Admin Create Test page
$routes->get('/admin/test/list',                    'Admin\Admin_Controller::test_list'); // Admin Test List page
$routes->get('/admin/test/update',                  'Admin\Admin_Controller::test_update'); // Admin Test Update page
$routes->get('/admin/messages',                     'Admin\User_Controller::load_messages'); // Admin Test Update page
$routes->get('/admin/check/answers',                'Admin\Admin_Controller::check_answers_all'); // Admin Check Answers page
$routes->get('/admin/user/answers',                 'Admin\Admin_Controller::user_answers'); // Admin User Answers page
$routes->get('/admin/check/answers/anonymous',      'Admin\Admin_Controller::check_answers_anonymous_all'); // Admin Check Answers Anonymous page
$routes->get('/admin/user/answers/anonymous',       'Admin\Admin_Controller::user_answers_anonymous'); // Admin User Answers Anonymous page
$routes->get('/admin/user/admit',                   'Admin\Admin_Controller::admit_user_data'); // User admit page
$routes->get('/admin/create/result',                'Admin\Admin_Controller::create_result'); // Create result page
$routes->get('/admin/results',                      'Admin\Admin_Controller::results'); // Result page
$routes->get('/admin/results/qna',                  'Admin\Admin_Controller::results_qna');
$routes->get('/admin/add/study-materials',          'Admin\Admin_Controller::add_study_materials');
$routes->get('/admin/study-materials',              'Admin\Admin_Controller::study_materials');
$routes->get('/admin/update/study-materials',       'Admin\Admin_Controller::study_materials_update');

$routes->get('/admin/add/popular-papers',           'Admin\Admin_Controller::add_popular_papers');
$routes->get('/admin/popular-papers',               'Admin\Admin_Controller::popular_papers');
$routes->get('/admin/update/popular-papers',        'Admin\Admin_Controller::popular_papers_update');

$routes->get('/admin/create/admit-form',            'Admin\Admin_Controller::create_form_admit'); // Admin Create Admit Form page

$routes->get('/admin/live-classes/add',             'Admin\Admin_Controller::class_link_add'); // Admin add live class page
$routes->get('/admin/live-classes/links',           'Admin\Admin_Controller::class_link_list'); // Admin add live class links page
$routes->get('/admin/live-classes/update',          'Admin\Admin_Controller::class_link_update'); // Admin update live class links page
$routes->get('/admin/cities',                       'Admin\Admin_Controller::cities'); // Admin Cities page
$routes->get('/admin/cities/add',                   'Admin\Admin_Controller::add_cities'); // Admin Add Cities page
$routes->get('/admin/cities/update',                'Admin\Admin_Controller::update_cities'); // Admin update Cities page

$routes->get('/admin/centres',                       'Admin\Admin_Controller::centres'); // Admin Centres page
$routes->get('/admin/centres/add',                   'Admin\Admin_Controller::add_centre'); // Admin Add Centres page
$routes->get('/admin/centres/update',                'Admin\Admin_Controller::update_centre'); // Admin update Centres page






// Seller Routes 
$routes->get('/seller',                             'Seller\Seller_Controller::index'); // Seller index
$routes->get('/seller/login',                       'Seller\Seller_Controller::load_login'); // Seller load login page
$routes->get('/seller/logout',                      'Seller\Seller_Controller::logout'); // Seller logout page
$routes->post('/seller/login-action',               'Seller\Seller_Controller::handle_login'); // Seller action login
$routes->get('/seller/product/list',                'Seller\Seller_Controller::load_all_products'); // Seller Product
$routes->get('/seller/product/add',                 'Seller\Seller_Controller::load_add_products'); // Seller Product add
$routes->get('/seller/orders',                      'Seller\Seller_Controller::load_all_orders'); // Seller oders 
$routes->get('/seller/orders/returns',              'Seller\Seller_Controller::load_all_orders_returns'); // Seller oders  returns
$routes->get('/seller/order/details',               'Seller\Seller_Controller::load_single_order'); // single order page seller
$routes->get('/seller/product',                     'Seller\Seller_Controller::load_single_product'); // single product load
$routes->get('/seller/product/update',              'Seller\Seller_Controller::load_product_update'); // single product update
$routes->get('/seller/product/variant/add',         'Seller\Seller_Controller::load_product_variant_add'); // single product variant
$routes->get('/seller/orders/returns/details',      'Seller\Seller_Controller::load_order_return'); // single product variant





// Api Routes
$routes->get('/api',                                'Api\Api_Controller::index'); // API index
$routes->get('/api/categories/all',                 'Api\Category_Controller::GET_categories'); // Get all categories
$routes->get('/api/categories/single',              'Api\Category_Controller::GET_category_single'); // Get single category
$routes->get('/api/categories',                     'Api\Category_Controller::GET_category'); // Get categories
$routes->get('/api/category/product/list',          'Api\Category_Controller::GET_categories_list');
$routes->post('/api/category/add',                  'Api\Category_Controller::POST_add_category'); // Add category
$routes->post('/api/category/update',               'Api\Category_Controller::POST_update_category'); // Update category
$routes->post('/api/category/delete',               'Api\Category_Controller::POST_delete_category'); // Delete category
$routes->get('/api/category/by/id',                 'Api\Category_Controller::GET_a_category'); // Get a single category by id
$routes->get('/api/product',                        'Api\Product_Controller::GET_product'); // Get product
$routes->get('/api/search/product',                 'Api\Product_Controller::GET_search_products'); // Search product
$routes->post('/api/product/add',                   'Api\Product_Controller::POST_add_product'); // Add product
$routes->post('/api/product/update',                'Api\Product_Controller::POST_update_product'); // Update product
$routes->get('/api/product/delete',                 'Api\Product_Controller::GET_delete_product'); // delete product
$routes->get('/api/product/variant',                'Api\Product_Controller::GET_variation'); // Get product variant
$routes->get('/api/product/variant/options',        'Api\Product_Controller::GET_variation_options'); // Get product variant options
$routes->post('/api/product/variant/add',           'Api\Product_Controller::POST_add_new_variant'); // Add new product variant
$routes->get('/api/product/variant/stock/update',   'Api\Product_Controller::GET_product_config_stock_update'); // Update product configuration stock
$routes->get('/api/product/stock/update',           'Api\Product_Controller::GET_product_stock_update'); // Update product stock
$routes->get('/api/user/id',                        'Api\Product_Controller::GET_user_id'); // Get user ID
$routes->get('/api/total/product',                  'Api\Product_Controller::GET_total_product'); // Get total product
$routes->get('/api/delete/product-img',             'Api\Product_Controller::GET_product_img_delete'); // Delete a product image
$routes->post('/api/user/update',                   'Api\User_Controller::POST_update_user'); // Update user
$routes->get('/api/user/orders',                    'Api\Order_Controller::GET_user_orders'); // Get user orders
$routes->post('/api/change/password',               'Api\User_Controller::POST_change_password'); // Change user password
$routes->post('/api/message',                       'Api\User_Controller::POST_message'); // Send message
$routes->get('/api/user',                           'Api\User_Controller::GET_get_user'); // Get user
$routes->get('/api/total/customer',                 'Api\User_Controller::GET_total_customer'); // Get total customer
$routes->get('/api/user/staff/',                    'Api\User_Controller::GET_staff'); // Get All Staff
$routes->get('/api/user/staff/delete',              'Api\User_Controller::GET_delete_staff'); // Get All Staff
$routes->get('/api/user/staff/access',              'Api\User_Controller::GET_staff_access'); // Get all access OR staff access
$routes->post('/api/user/staff/add',                'Api\User_Controller::POST_staff_add');  // Add staff access
$routes->post('/api/user/staff/update',             'Api\User_Controller::POST_staff_update');  // Update staff access
$routes->get('/api/user/staff/access/add',          'Api\User_Controller::GET_access_add');  // Get all access OR staff access
$routes->get('/api/user/staff/access/update',       'Api\User_Controller::GET_access_update');  // Get Update User Access 
$routes->post('/api/user/student/add',              'Api\User_Controller::POST_new_student_registration');  // Add staff access
$routes->get('/api/all/messages',                   'Api\User_Controller::GET_message_all');  // GET all messages
$routes->get('/api/get/admin',                      'Api\User_Controller::GET_get_admin');  // GET Admin Update
$routes->post('/api/update/admin',                   'Api\User_Controller::POST_update_admin');  // POST Admin Data
$routes->post('/api/change/admin/password',          'Api\User_Controller::POST_change_admin_password');  // POST Change Admin Password

$routes->get('/api/user/cart',                      'Api\Cart_Controller::GET_cart'); // Get user cart
$routes->post('/api/user/cart/add',                 'Api\Cart_Controller::POST_cart_add'); // Add item to cart
$routes->get('/api/user/cart/remove',               'Api\Cart_Controller::GET_cart_remove'); // Remove item from cart
$routes->get('/api/user/cart/empty',                'Api\Cart_Controller::GET_cart_empty'); // Empty cart
$routes->get('/api/user/cart/item/update',          'Api\Cart_Controller::GET_cart_item_update'); // Update cart item
$routes->get('/api/order',                          'Api\Order_Controller::GET_order_details'); // Get order details
$routes->post('/api/order/confirm',                 'Api\Order_Controller::POST_order_confirm'); // Confirm order
$routes->get('/api/order/cancel',                   'Api\Order_Controller::GET_order_cancel'); // Cancel order
$routes->get('/api/order/return',                   'Api\Order_Controller::GET_order_return_request'); // Request order return
$routes->get('/api/order/status/update',            'Api\Order_Controller::GET_order_status_update'); // Update order status
$routes->get('/api/order/item/status/update',       'Api\Order_Controller::GET_order_item_status_update'); // Update order item status
$routes->get('/api/order/returns/status/update',    'Api\Order_Controller::GET_order_return_status_update'); // Update order return status
$routes->get('/api/order/payment/status/update',    'Api\Order_Controller::GET_order_payment_status_update'); // Update order payment status
$routes->get('/api/order/returns',                  'Api\Order_Controller::GET_user_order_returns'); // Get user order returns
$routes->post('/api/banner/add',                    'Api\Banner_Controller::POST_add_banner'); // Add banner
$routes->get('/api/banners',                        'Api\Banner_Controller::GET_banners'); // Get banners
$routes->get('/api/banner/delete',                  'Api\Banner_Controller::GET_delete_banner'); // Delete banner
$routes->get('/api/banner/update',                  'Api\Banner_Controller::GET_update_banner'); // Update banner
$routes->post('/api/update/banner',                 'Api\Banner_Controller::POST_banner_update'); // Update banner
$routes->get('/api/discounts',                      'Api\Product_Controller::GET_discounts_all'); // Get all discounts
$routes->get('/api/discounts/delete',               'Api\Product_Controller::GET_discounts_delete'); // Delete discounts
$routes->post('/api/discounts/add',                 'Api\Product_Controller::POST_discounts_add'); // Add discounts
$routes->get('/api/customers',                      'Api\User_Controller::GET_customer'); // Get customers
$routes->get('/api/delete/customer',                'Api\User_Controller::GET_delete_customer'); // Delete customer
$routes->get('/api/promotion-card/update',          'Api\Banner_Controller::POST_update_promotion_card'); // Update promotion card
$routes->post('/api/update/promotion-card',         'Api\Banner_Controller::POST_promotion_card_update'); // Update promotion card
$routes->get('/api/orders',                         'Api\Order_Controller::GET_all_orders'); // Get all orders
$routes->get('/api/total/order',                    'Api\Order_Controller::GET_total_order'); // Get total order
$routes->get('/api/revenue',                        'Api\Order_Controller::GET_revenue'); // Get revenue
$routes->get('/api/seller',                         'Api\User_Controller::GET_a_seller');// Get a seller
$routes->get('/api/delete/seller',                  'Api\User_Controller::GET_seller_delete');// Seller Delete
$routes->post('/api/update/seller',                 'Api\User_Controller::POST_update_seller'); // Update seller
$routes->get('/api/students',                       'Api\User_Controller::GET_students'); // Get Students
$routes->post('/api/update/user/status',            'Api\User_Controller::POST_update_user_status'); // Update User Status
$routes->get('/api/purchased/courses',              'Api\Order_Controller::GET_purchased_courses'); // Get Purchased Courses
$routes->post('/api/city/add',                      'Api\Banner_Controller::POST_add_cities'); // Post Add city
$routes->get('/api/cities',                         'Api\Banner_Controller::GET_cities'); // Get cities
$routes->get('/api/city/delete',                    'Api\Banner_Controller::GET_delete_city'); // Get Delete city
$routes->get('/api/city/update',                    'Api\Banner_Controller::GET_update_city'); // Get Update city
$routes->post('/api/update/city',                   'Api\Banner_Controller::POST_city_update'); // Post Update city

$routes->post('/api/centre/add',                      'Api\Banner_Controller::POST_add_centres'); // Post Add centre
$routes->get('/api/centres',                          'Api\Banner_Controller::GET_centres'); // Get centres
$routes->get('/api/centre/delete',                    'Api\Banner_Controller::GET_delete_centre'); // Get Delete centre
$routes->get('/api/centre/update',                    'Api\Banner_Controller::GET_update_centre'); // Get Update centre
$routes->post('/api/update/centre',                   'Api\Banner_Controller::POST_centre_update'); // Post Update centre

$routes->get('/api/cities-centres',                   'Api\Banner_Controller::GET_citiese_and_centres'); // Get centres

$routes->get('/api/class-list',                         'Api\Class_Controller::GET_class_list');// Get Class List
$routes->get('/api/branches',                           'Api\Class_Controller::GET_branches');// Get Branches
$routes->get('/api/live-classes',                       'Api\Class_Controller::GET_live_classes');// Get Live Classes
$routes->post('/api/live-class-link/add',               'Api\Class_Controller::POST_add_live_class_link');// Add Live Class Data
$routes->get('/api/delete/live-class',                  'Api\Class_Controller::GET_delete_live_class_link');// Delete Live Class Link
$routes->post('/api/live-class-link/update',            'Api\Class_Controller::POST_update_live_class_link');// Add Live Class Data
$routes->post('/api/class-and-branches/add',            'Api\Class_Controller::POST_add_class_and_branches');// Add Class Branches
$routes->get('/api/class-and-branches',                 'Api\Class_Controller::GET_classes_and_branch');// Add Live Class Data
$routes->get('/api/delete/class-and-branches',          'Api\Class_Controller::GET_delete_class_and_branches');// Delete Class and Branches Data
$routes->get('/api/delete/branch',                      'Api\Class_Controller::GET_delete_branch');// Delete Branches Data
$routes->post('/api/update/class-and-branches',         'Api\Class_Controller::POST_update_class_and_branches');// Update Class & Branches Data
$routes->post('/api/test/add',                          'Api\Class_Controller::POST_add_a_test');// Update Class & Branches Data
$routes->get('/api/tests',                              'Api\Class_Controller::GET_tests');// Get Tests Data
$routes->post('/api/test/update',                       'Api\Class_Controller::POST_update_test');// POST Update Test Data
$routes->get('/api/test/delete',                        'Api\Class_Controller::GET_delete_test');// get Delete Test Data
$routes->post('/api/student-roll/add',                  'Api\Class_Controller::POST_add_roll_and_class');// POST Add Student Roll Data
$routes->get('/api/student/live/class',                 'Api\Class_Controller::GET_live_class_by_student_id');// GET Students Live Class Data
$routes->get('/api/student/online-test',                'Api\Class_Controller::GET_tests_by_student_id');// GET Students Online Test Data
$routes->post('/api/question/update',                   'Api\Class_Controller::POST_question_update');// POST Update question
$routes->post('/api/answer/update',                     'Api\Class_Controller::POST_answer_update');// POST Update qsts
$routes->post('/api/online-test/submit',                'Api\Class_Controller::POST_test_submit');// POST Update qsts
$routes->get('/api/anonymous/online-test',              'Api\Class_Controller::GET_test_for_anonymous');// GET Anonymous Online Test Data
$routes->get('/api/all/given-answers',                  'Api\Class_Controller::GET_get_all_given_answer');// GET All given answers Data
$routes->get('/api/unique/users',                       'Api\Class_Controller::GET_get_unique_user_from_student_submission');// GET Unique User Data
$routes->post('/api/online-test/submit/anonymous',      'Api\Class_Controller::POST_test_submit_anonymous');// GET Unique User Data
$routes->get('/api/unique/users/anonymous',             'Api\Class_Controller::GET_get_unique_user_from_student_submission_anynmous');// GET Unique User Anonymous Data
$routes->get('/api/all/given-answers/anonymous',        'Api\Class_Controller::GET_get_all_given_answer_anonymous');// GET Unique User Anonymous Data
$routes->get('/api/update/given-answers/right-wrong',   'Api\Class_Controller::GET_update_right_ans');// GET Update User user answer right or wrong Data
$routes->get('/api/admit-form/data',                    'Api\Class_Controller::GET_admit_form');// GET Admit Form Data
$routes->post('/api/add/admit-form/queston',            'Api\Class_Controller::POST_add_admit_questions');// GET Add Admit Form Data
$routes->get('/api/admit-form/frontend',                'Api\Class_Controller::GET_admit_form_frontend');// GET Admit Form Data Frontend
$routes->post('/api/add/user/admit/data',               'Api\Class_Controller::POST_submit_admit_data');// POST Add User Admit Data
$routes->get('/api/admit/user/data',                    'Api\Class_Controller::GET_admit_user_data');// GET User Admit Data
$routes->post('/api/add/unsigned-user/result',          'Api\Class_Controller::POST_create_result');// POST Add Unsigned User Result
$routes->get('/api/results',                            'Api\Class_Controller::GET_results');// GET Results
$routes->get('/api/results/qna',                        'Api\Class_Controller::GET_results_byId');// GET Results
$routes->get('/api/offline-user/delete',                'Api\Class_Controller::GET_delete_offline_student');// GET Delete Offline User 
$routes->post('/api/add/study-material',                'Api\Class_Controller::POST_add_study_material');
$routes->get('/api/study-materials',                    'Api\Class_Controller::GET_study_materials');
$routes->get('/api/delete/study-materials',             'Api\Class_Controller::GET_delete_study_material');
$routes->post('/api/add/popular-paper',                 'Api\Class_Controller::POST_add_popular_paper');
$routes->get('/api/popular-papers',                     'Api\Class_Controller::GET_popular_papers');
$routes->get('/api/user/popular-papers',                'Api\Class_Controller::GET_popular_papers_by_student');
$routes->get('/api/user/study-material',                'Api\Class_Controller::GET_study_material_by_student');
$routes->get('/api/search/study-material',              'Api\Class_Controller::GET_search_study_material');
$routes->get('/api/search/popular-papers',              'Api\Class_Controller::GET_search_popular_papers');

$routes->get('/api/delete/popular-paper',               'Api\Class_Controller::GET_delete_popular_paper');
$routes->post('/api/update/popular-paper',              'Api\Class_Controller::POST_update_popular_paper');
$routes->post('/api/update/study-materials',            'Api\Class_Controller::POST_update_study_material');
$routes->post('/api/update/student',                    'Api\User_Controller::POST_update_student');




// SELLER SECTION
$routes->get('/api/best-selling',                   'Api\Product_Controller::GET_best_selling'); // Get best selling products
$routes->get('/api/seller/product',                 'Api\Seller_Product_Controller::GET_seller_product'); // Get seller product
$routes->get('/api/best-selling/item',              'Api\Product_Controller::GET_best_selling_item'); // Get best selling products for a seller
$routes->get('/api/seller/products',                'Api\Seller_Product_Controller::GET_total_product'); // Get total product
$routes->get('/api/seller/orders/total',            'Api\Seller_Product_Controller::GET_total_order'); // Get total order
$routes->get('/api/seller/orders',                  'Api\Order_Controller::GET_seller_order'); // Get all vendor order
$routes->get('/api/total/selling/item',             'Api\Order_Controller::GET_total_selling_item'); // Get total selling order
$routes->get('/api/seller/revenue',                 'Api\Order_Controller::GET_seller_revenue'); // Get seller revenue
$routes->get('/api/seller/order/returns',           'Api\Order_Controller::GET_seller_order_return_request'); // Get all vendor order
$routes->get('/api/seller/earning',                 'Api\Order_Controller::GET_seller_earning'); // Get all vendor order
$routes->get('/api/sellers',                        'Api\User_Controller::GET_seller_list');// Get all vendors
$routes->post('/api/seller/add',                    'Api\User_Controller::POST_add_new_seller');// Get all vendors