<?php
namespace App\Controllers\Admin;
use App\Controllers\Admin\Admin_Controller;

class User_Controller extends Admin_Controller{

    public function index(): void{
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['customer_css.php'],
                'title' => 'Customer',
                'header' => [],
                'sidebar' => ['customer'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['customer_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/customers',$data);
    }

    

    public function load_customer(){
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['customer_css.php'],
                'title' => 'Customer',
                'header' => [],
                'sidebar' => ['users'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['customer_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/customers',$data);
    }

    public function load_vendor(){
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['vendor_css.php'],
                'title' => 'Vendor',
                'header' => [],
                'sidebar' => ['users'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['vendor_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/vendors',$data);
    }
 
    public function load_staff(){
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['staff_css.php'],
                'title' => 'Staff',
                'header' => [],
                'sidebar' => ['users'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['staff_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/staff',$data);
    }

    public function load_staff_add(){
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['staff_add_css.php'],
                'title' => 'New Staff',
                'header' => [],
                'sidebar' => ['users'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['staff_add_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/staff_add',$data);
    }

    function load_staff_update(){
    
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['staff_single_css.php'],
                'title' => 'Staff',
                'header' => [],
                'sidebar' => ['users'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['staff_single_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/staff_single',$data);

    }

    public function load_students(){
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['students_css.php'],
                'title' => 'Students',
                'header' => [],
                'sidebar' => ['users'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['students_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/students',$data);
    }

    public function load_student_single(){
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['student_single_css.php'],
                'title' => 'Student Single',
                'header' => [],
                'sidebar' => ['users'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['student_single_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/student_single',$data);
    }

    public function load_messages(){
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['messages_css.php'],
                'title' => 'Messages',
                'header' => [],
                'sidebar' => ['messages'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['messages_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/messages',$data);
    }


    public function load_admon_profile(){
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['admin_profile_css.php'],
                'title' => 'Admin Profile',
                'header' => [],
                'sidebar' => ['admin_profile'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['admin_profile_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/admin_profile',$data);
    }

    public function load_doubts(){
        $data = PAGE_DATA_ADMIN;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['students_doubts_css.php'],
                'title' => 'Doubts',
                'header' => [],
                'sidebar' => ['messages'=>true],
                'site' => 'admin'
            ],
            'data_footer' => [
                'footer_link' => ['students_doubts_js.php'],
                'footer' => [],
                'site' => 'admin'
            ]
        ];

        $this->isAuth('/admin/students_doubts',$data);
    }



}

?>