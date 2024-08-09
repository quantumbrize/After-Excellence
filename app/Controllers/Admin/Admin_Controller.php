<?php

namespace App\Controllers\Admin;

use App\Controllers\Main_Controller;
use App\Models\UsersModel;
use App\Models\StaffAccessModel;
use App\Models\AccessModel;
use App\Models\StaffModel;

class Admin_Controller extends Main_Controller
{
    public function index(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['dashboard_css.php'],
                'header_asset_link' => [
                    'assets_admin/libs/jsvectormap/css/jsvectormap.min.css',
                    'assets_admin/libs/swiper/swiper-bundle.min.css'
                ],
                'title' => 'Dashboard',
                'header' => [],
                'sidebar' => ['dashboard' => true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['dashboard_js.php'],
                'footer_asset_link' => [
                    'assets_admin/libs/apexcharts/apexcharts.min.js',
                    'assets_admin/libs/jsvectormap/js/jsvectormap.min.js',
                    'assets_admin/libs/jsvectormap/maps/world-merc.js',
                    'assets_admin/libs/swiper/swiper-bundle.min.js',
                    'assets_admin/js/pages/dashboard-ecommerce.init.js'
                ],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/dashboard', $data);
    }

    public function banner(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['banners_css.php'],
                'header_asset_link' => [
                    'assets_admin/libs/nouislider/nouislider.min.css',
                    'assets_admin/libs/gridjs/theme/mermaid.min.css',
                    'assets_admin/css/app.min.css',
                    'assets_admin/css/custom.min.css'
                ],
                'title' => 'Banners',
                'header' => [],
                'sidebar' => ['banners' => true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['banners_js.php'],
                'footer_asset_link' => [
                    'assets_admin/libs/nouislider/nouislider.min.js',
                    'assets_admin/libs/wnumb/wNumb.min.js',
                    'assets_admin/libs/gridjs/gridjs.umd.js',
                    'assets_admin/js/pages/ecommerce-product-list.init.js',
                ],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/banners', $data);
    }

    public function banners_add(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['banners_add_css.php'],
                'header_asset_link' => [
                    'assets_admin/libs/nouislider/nouislider.min.css',
                    'assets_admin/libs/gridjs/theme/mermaid.min.css',
                    'assets_admin/css/app.min.css',
                    'assets_admin/css/custom.min.css'
                ],
                'title' => 'Banners',
                'header' => [],
                'sidebar' => ['banners' => true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['banners_add_js.php'],
                'footer_asset_link' => ['assets_admin/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/banners_add', $data);
    }

    public function banners_update(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['banners_update_css.php'],
                'header_asset_link' => [
                    'assets_admin/libs/nouislider/nouislider.min.css',
                    'assets_admin/libs/gridjs/theme/mermaid.min.css',
                    'assets_admin/css/app.min.css',
                    'assets_admin/css/custom.min.css'
                ],
                'title' => 'Banners',
                'header' => [],
                'sidebar' => ['banners' => true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['banner_update_js.php'],
                'footer_asset_link' => ['assets_admin/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/banner_update', $data);
    }

    public function promotion_card(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['promotion_card_css.php'],
                'header_asset_link' => [
                    'assets_admin/libs/nouislider/nouislider.min.css',
                    'assets_admin/libs/gridjs/theme/mermaid.min.css',
                    'assets_admin/css/app.min.css',
                    'assets_admin/css/custom.min.css'
                ],
                'title' => 'promotion Card',
                'header' => [],
                'sidebar' => ['promotion_card' => true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['promotion_card_js.php'],
                'footer_asset_link' => [],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/promotion_card', $data);
    }

    public function discounts_add()
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['discounts_add_css.php'],
                'header_asset_link' => [],
                'title' => 'Discounts',
                'header' => [],
                'sidebar' => ['discounts' => true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['discounts_add_js.php'],
                'footer_asset_link' => [],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/discounts_add', $data);
    }

    public function discounts_list()
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['discounts_list_css.php'],
                'header_asset_link' => [],
                'title' => 'Discounts',
                'header' => [],
                'sidebar' => ['discounts' => true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['discounts_list_js.php'],
                'footer_asset_link' => [],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/discounts_list', $data);
    }

    public function classes_branches_add(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['classes_branches_add_css.php'],
                'title' => 'Classes Branches',
                'header' => [],
                'sidebar' => ['classes_branches'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['classes_branches_add_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/classes_branches_add',$data);
    }

    public function classes_branches(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['class_branches_css.php'],
                'title' => 'Classes Branches',
                'header' => [],
                'sidebar' => ['classes_branches'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['class_branches_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/class_branches',$data);
    }

    public function classes_branches_update(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['classes_branches_update_css.php'],
                'title' => 'Classes Branches',
                'header' => [],
                'sidebar' => ['classes_branches'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['classes_branches_update_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/classes_branches_update',$data);
    }

    public function class_link_add(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['class_link_add_css.php'],
                'title' => 'Live Class',
                'header' => [],
                'sidebar' => ['live_classes'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['class_link_add_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/class_link_add',$data);
    }

    public function class_link_list(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['class_links_css.php'],
                'title' => 'Live Class',
                'header' => [],
                'sidebar' => ['live_classes'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['class_links_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/class_links',$data);
    }

    public function class_link_update(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['class_link_update_css.php'],
                'title' => 'Live Class',
                'header' => [],
                'sidebar' => ['live_classes'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['class_link_update_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/class_link_update',$data);
    }

    public function test_create(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['test_create_css.php'],
                'title' => 'Test Create',
                'header' => [],
                'sidebar' => ['test_create'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['test_create_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/test_create',$data);
    }

    public function test_list(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['tests_css.php'],
                'title' => 'Tests',
                'header' => [],
                'sidebar' => ['test_list'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['tests_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/tests',$data);
    }

    public function test_update(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['test_update_css.php'],
                'title' => 'Test Update',
                'header' => [],
                'sidebar' => ['test_create'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['test_update_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/test_update',$data);
    }

    public function cities(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['cities_css.php'],
                'title' => 'Cities',
                'header' => [],
                'sidebar' => ['cities'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['cities_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/cities',$data);
    }

    public function add_cities(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['cities_add_css.php'],
                'title' => 'Cities',
                'header' => [],
                'sidebar' => ['cities'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['cities_add_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/cities_add',$data);
    }

    public function update_cities(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['cities_update_css.php'],
                'title' => 'Cities',
                'header' => [],
                'sidebar' => ['cities'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['cities_update_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/cities_update',$data);
    }

    public function centres(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['centres_css.php'],
                'title' => 'Centres',
                'header' => [],
                'sidebar' => ['centres'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['centres_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/centres',$data);
    }

    public function add_centre(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['centres_add_css.php'],
                'title' => 'Centres',
                'header' => [],
                'sidebar' => ['centres'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['centres_add_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/centres_add',$data);
    }

    public function update_centre(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['centres_update_css.php'],
                'title' => 'Centres',
                'header' => [],
                'sidebar' => ['centres'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['centres_update_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/centres_update',$data);
    }

    public function check_answers_all(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['check_answers_all_css.php'],
                'title' => 'Tests',
                'header' => [],
                'sidebar' => ['test_create'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['check_answers_all_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/check_answers_all',$data);
    }

    public function user_answers(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['user_answers_css.php'],
                'title' => 'Tests',
                'header' => [],
                'sidebar' => ['test_create'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['user_answers_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/user_answers',$data);
    }

    public function check_answers_anonymous_all(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['check_anonymous_answers_all_css.php'],
                'title' => 'Tests',
                'header' => [],
                'sidebar' => ['test_create'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['check_anonymous_answers_all_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/check_anonymous_answers_all',$data);
    }

    public function user_answers_anonymous(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['user_answers_anonymous_css.php'],
                'title' => 'Tests',
                'header' => [],
                'sidebar' => ['test_create'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['user_answers_anonymous_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/user_answers_anonymous',$data);
    }

    public function create_form_admit(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['create_form_admit_css.php'],
                'title' => 'Admit Form',
                'header' => [],
                'sidebar' => ['create_form_admit'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['create_form_admit_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/create_form_admit',$data);
    }

    public function admit_user_data(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['admit_response_data_css.php'],
                'title' => 'User Admit Data',
                'header' => [],
                'sidebar' => ['admit_response_data'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['admit_response_data_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/admit_response_data',$data);
    }

    public function create_result(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['create_result_css.php'],
                'title' => 'User Admit Data',
                'header' => [],
                'sidebar' => ['create_result'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['create_result_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/create_result',$data);
    }

    public function results(): void
    {
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['results_css.php'],
                'title' => 'User Admit Data',
                'header' => [],
                'sidebar' => ['create_result'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['results_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/results',$data);
    }

    public function results_qna(): void
    {
        
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['results_qna_css.php'],
                'title' => 'User Admit Data',
                'header' => [],
                'sidebar' => ['create_result'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['results_qna_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/results_qna',$data);
    }

    public function add_study_materials(): void
    {
        
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['study_materials_add_css.php'],
                'title' => 'Study Materials',
                'header' => [],
                'sidebar' => ['study_materials'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['study_materials_add_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/study_materials_add',$data);
    }

    public function study_materials(): void
    {
        
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['study_materials_css.php'],
                'title' => 'Study Materials',
                'header' => [],
                'sidebar' => ['study_materials'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['study_materials_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/study_materials',$data);
    }

    public function study_materials_update(): void
    {
        
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['study_materials_update_css.php'],
                'title' => 'Study Materials',
                'header' => [],
                'sidebar' => ['study_materials'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['study_materials_update_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/study_materials_update',$data);
    }

    public function add_popular_papers(): void
    {
        
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['popular_papers_add_css.php'],
                'title' => 'Study Materials',
                'header' => [],
                'sidebar' => ['popular_papers'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['popular_papers_add_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/popular_papers_add',$data);
    }

    public function popular_papers(): void
    {
        
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['popular_papers_css.php'],
                'title' => 'Study Materials',
                'header' => [],
                'sidebar' => ['popular_papers'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['popular_papers_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/popular_papers',$data);
    }

    public function popular_papers_update(): void
    {
        
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['popular_papers_update_css.php'],
                'title' => 'Study Materials',
                'header' => [],
                'sidebar' => ['popular_papers'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['popular_papers_update_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/popular_papers_update',$data);
    }


    public function isAuth($page, $data)
    {
        $session = \Config\Services::session();
        if (empty($session->get(SES_ADMIN_USER_ID)) && empty($session->get(SES_STAFF_USER_ID))) {
            return $this->load_login();
        } else {
            $this->load_page($page, $data);
        }
    }
    public function logout()
    {
        $session = \Config\Services::session();

        $session->remove(SES_ADMIN_USER_ID);
        $session->remove(SES_ADMIN_TYPE);
        $session->remove(SES_STAFF_USER_ID);
        $session->remove(SES_STAFF_TYPE);
        $session->remove(SES_STAFF_ACCESS);
        
        return redirect()->to('admin/login');
    }
    public function load_login(): void
    {
        echo view('admin/login');
    }

    public function handle_login()
    {
        $response = [
            "status" => false,
            "message" => "user not found"
        ];

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        // $this->pr($email);
        // $this->pr($password);
        $UsersModel = new UsersModel();
        $UsersData = $UsersModel
            ->where('password', md5($password))
            ->where('email', $email)
            ->groupStart()
                ->where('type', 'admin')
                ->orWhere('type', 'staff')
            ->groupEnd()
            ->where('status', 'active')
            ->get()
            ->getResultArray();
        $UsersData = !empty($UsersData[0]) ? $UsersData[0] : null;
        // $this->prd($UsersData);
        if (!empty($UsersData)) {
            $response["status"] = true;
            $session = \Config\Services::session();
            if ($UsersData['type'] == 'admin') {
                $session->set(SES_ADMIN_USER_ID, $UsersData['uid']);
                $session->set(SES_ADMIN_TYPE, $UsersData['type']);
                $response["message"] = "Admin Found";
            } else {
                $session->set(SES_STAFF_USER_ID, $UsersData['uid']);
                $session->set(SES_STAFF_TYPE, $UsersData['type']);
                try {
                    $StaffModel = new StaffModel();
                    $StaffData = $StaffModel
                        ->where(['user_id' => $UsersData['uid']])
                        ->find();
                    if (!empty($StaffData)) {
                        // $this->prd($StaffData);
                        $staff_id = $StaffData[0]['uid'];

                        $StaffAccessModel = new StaffAccessModel();
                        $staffAccess = $StaffAccessModel
                            ->select('access_id')
                            ->where(['staff_id' => $staff_id])
                            ->find();
                        if (!empty($staffAccess)) {
                            $AccessModel = new AccessModel();
                            $accessArr = [];
                            foreach ($staffAccess as $index => $item) {
                                $accessName = $AccessModel
                                                ->select('name')
                                                ->where(['uid' => $item['access_id']])
                                                ->find();
                                $accessArr[$index] = $accessName[0]['name'];
                                                //$this->pr($accessName);
                            }
                            $session->set(SES_STAFF_ACCESS, $accessArr);
                            $response["message"] = "Staff Found";
                        }else{
                            $session->set(SES_STAFF_ACCESS, []);
                        }
                    }else{
                        $session->set(SES_STAFF_ACCESS, []);
                    }


                } catch (\Exception $e) {
                    $response['message'] = $e->getMessage();
                }
            }
        }
        echo json_encode($response);

    }

}
