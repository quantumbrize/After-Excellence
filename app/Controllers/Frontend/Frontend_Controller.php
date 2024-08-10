<?php

namespace App\Controllers\Frontend;

use App\Controllers\Main_Controller;
use App\Models\UsersModel;
use App\Models\OtpModel;
use App\Models\StudentModel;

class Frontend_Controller extends Main_Controller
{


    public function __construct()
    {
        // Load session library
        $this->session = \Config\Services::session();
    }

    public function index(): void
    {
        $data = PAGE_DATA_FRONTEND;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['home_css.php'],
                'title' => 'Home',
                'header' => [],
                'sidebar' => [],
                'site' => 'frontend'
            ],
            'data_footer' => [
                'footer_link' => ['home_js.php'],
                'footer' => [],
                'site' => 'frontend'
            ]
        ];
        $this->load_page('/frontend/home', $data);
    }

    public function about_us(): void
    {
        $data = PAGE_DATA_FRONTEND;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => [],
                'title' => 'About Us',
                'header' => [],
                'sidebar' => [],
                'site' => 'frontend'
            ],
            'data_footer' => [
                'footer_link' => [],
                'footer' => [],
                'site' => 'frontend'
            ]
        ];
        $this->load_page('/frontend/about_us', $data);
    }

    public function purchase_guide(): void
    {
        $data = PAGE_DATA_FRONTEND;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => [],
                'title' => 'Purchase Guide',
                'header' => [],
                'sidebar' => [],
                'site' => 'frontend'
            ],
            'data_footer' => [
                'footer_link' => [],
                'footer' => [],
                'site' => 'frontend'
            ]
        ];
        $this->load_page('/frontend/purchase_guide', $data);
    }

    public function terms_conditions(): void
    {
        $data = PAGE_DATA_FRONTEND;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => [],
                'title' => 'Terms of Conditions',
                'header' => [],
                'sidebar' => [],
                'site' => 'frontend'
            ],
            'data_footer' => [
                'footer_link' => [],
                'footer' => [],
                'site' => 'frontend'
            ]
        ];
        $this->load_page('/frontend/terms_conditions', $data);
    }

    public function privacy_policy(): void
    {
        $data = PAGE_DATA_FRONTEND;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => [],
                'title' => 'Privacy Policy',
                'header' => [],
                'sidebar' => [],
                'site' => 'frontend'
            ],
            'data_footer' => [
                'footer_link' => [],
                'footer' => [],
                'site' => 'frontend'
            ]
        ];
        $this->load_page('/frontend/privacy_policy', $data);
    }

    public function user_registration(): void
    {
        $data = PAGE_DATA_FRONTEND;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['registration_css.php'],
                'title' => 'User Registration',
                'header' => [],
                'sidebar' => [],
                'site' => 'frontend'
            ],
            'data_footer' => [
                'footer_link' => ['registration_js.php'],
                'footer' => [],
                'site' => 'frontend'
            ]
        ];
        $this->load_page('/frontend/registration', $data);
    }

    public function start_online_test()
    {
        $user_id = $this->is_logedin();
        if (!empty($user_id)) {
            $data = PAGE_DATA_FRONTEND;
            $data = [
                'data_page' => [],
                'data_header' => [
                    'header_link' => ['start_test_css.php'],
                    'title' => 'Online Test',
                    'header' => [],
                    'sidebar' => [],
                    'site' => 'frontend'
                ],
                'data_footer' => [
                    'footer_link' => ['start_test_js.php'],
                    'footer' => [],
                    'site' => 'frontend'
                ]
            ];
            $this->load_page('/frontend/start_test', $data);
        } else {
            // return redirect()->to('login');
            $this->index();
        }
    }

    public function online_test()
    {
        $user_id = $this->is_logedin();
        if (!empty($user_id)) {
            $data = PAGE_DATA_FRONTEND;
            $data = [
                'data_page' => [],
                'data_header' => [
                    'header_link' => ['online_test_css.php'],
                    'title' => 'Online Test',
                    'header' => [],
                    'sidebar' => [],
                    'site' => 'frontend'
                ],
                'data_footer' => [
                    'footer_link' => ['online_test_js.php'],
                    'footer' => [],
                    'site' => 'frontend'
                ]
            ];
            $this->load_page('/frontend/online_test', $data);
        } else {
            // return redirect()->to('login');
            $this->index();
        }
    }

    public function live_classes(): void
    {
        $user_id = $this->is_logedin();
        if (!empty($user_id)) {
            $data = PAGE_DATA_FRONTEND;
            $data = [
                'data_page' => [],
                'data_header' => [
                    'header_link' => ['live_classes_css.php'],
                    'title' => 'Live Classes',
                    'header' => [],
                    'sidebar' => [],
                    'site' => 'frontend'
                ],
                'data_footer' => [
                    'footer_link' => ['live_classes_js.php'],
                    'footer' => [],
                    'site' => 'frontend'
                ]
            ];
            $this->load_page('/frontend/live_classes', $data);
        } else {
            // return redirect()->to('login');
            $this->index();
        }

    }

    public function faq(): void
    {
        $data = PAGE_DATA_FRONTEND;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => [],
                'title' => 'FAQ',
                'header' => [],
                'sidebar' => [],
                'site' => 'frontend'
            ],
            'data_footer' => [
                'footer_link' => [],
                'footer' => [],
                'site' => 'frontend'
            ]
        ];
        $this->load_page('/frontend/faq', $data);
    }

    public function contact_us(): void
    {
        $data = PAGE_DATA_FRONTEND;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => [],
                'title' => 'Contact Us',
                'header' => [],
                'sidebar' => [],
                'site' => 'frontend'
            ],
            'data_footer' => [
                'footer_link' => ['contact_us_js.php'],
                'footer' => [],
                'site' => 'frontend'
            ]
        ];
        $this->load_page('/frontend/contact_us', $data);
    }

    /**USERS */
    public function account()
    {
        $user_id = $this->is_logedin();
        if (!empty($user_id)) {
            $data = PAGE_DATA_FRONTEND;
            $data = [
                'data_page' => [],
                'data_header' => [
                    'header_link' => ['account_css.php'],
                    'title' => 'Account',
                    'header' => [],
                    'sidebar' => [],
                    'site' => 'frontend'
                ],
                'data_footer' => [
                    'footer_link' => ['account_js.php'],
                    'footer' => [],
                    'site' => 'frontend'
                ]
            ];
            $this->load_page('/frontend/account', $data);
        } else {
            return redirect()->to('login');
        }

    }

    public function course_video()
    {
        $user_id = $this->is_logedin();
        if (!empty($user_id)) {
            $data = PAGE_DATA_FRONTEND;
            $data = [
                'data_page' => [],
                'data_header' => [
                    'header_link' => ['watch_course_video_css.php'],
                    'title' => 'Account',
                    'header' => [],
                    'sidebar' => [],
                    'site' => 'frontend'
                ],
                'data_footer' => [
                    'footer_link' => ['watch_course_video_js.php'],
                    'footer' => [],
                    'site' => 'frontend'
                ]
            ];
            $this->load_page('/frontend/watch_course_video', $data);
        } else {
            return redirect()->to('login');
        }

    }

    public function address(): void
    {
        $data = PAGE_DATA_FRONTEND;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => [],
                'title' => 'Address',
                'header' => [],
                'sidebar' => [],
                'site' => 'frontend'
            ],
            'data_footer' => [
                'footer_link' => [],
                'footer' => [],
                'site' => 'frontend'
            ]
        ];
        $this->load_page('/frontend/address', $data);
    }

    public function city_centres(): void
    {
        $data = PAGE_DATA_FRONTEND;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['city_centres_css.php'],
                'title' => 'City & Centres',
                'header' => [],
                'sidebar' => [],
                'site' => 'frontend'
            ],
            'data_footer' => [
                'footer_link' => ['city_centres_js.php'],
                'footer' => [],
                'site' => 'frontend'
            ]
        ];
        $this->load_page('/frontend/city_centres', $data);
    }

    public function start_test_anonymous()
    {
        $data = PAGE_DATA_FRONTEND;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['anonymous_test_start_css.php'],
                'title' => 'Online Test',
                'header' => [],
                'sidebar' => [],
                'site' => 'frontend'
            ],
            'data_footer' => [
                'footer_link' => ['anonymous_test_start_js.php'],
                'footer' => [],
                'site' => 'frontend'
            ]
        ];
        $this->load_page('/frontend/anonymous_test_start', $data);
    }

    public function online_test_anonymous()
    {
        $data = PAGE_DATA_FRONTEND;
        $data = [
            'data_page' => [],
            'data_header' => [
                'header_link' => ['online_test_anonymous_css.php'],
                'title' => 'Online Test',
                'header' => [],
                'sidebar' => [],
                'site' => 'frontend'
            ],
            'data_footer' => [
                'footer_link' => ['online_test_anonymous_js.php'],
                'footer' => [],
                'site' => 'frontend'
            ]
        ];
        $this->load_page('/frontend/online_test_anonymous', $data);
    }

    public function marksheet()
    {
        $user_id = $this->is_logedin();
        if (!empty($user_id)) {
            $data = PAGE_DATA_FRONTEND;
            $data = [
                'data_page' => [],
                'data_header' => [
                    'header_link' => ['marksheet_css.php'],
                    'title' => 'Marksheet',
                    'header' => [],
                    'sidebar' => [],
                    'site' => 'frontend'
                ],
                'data_footer' => [
                    'footer_link' => ['marksheet_js.php'],
                    'footer' => [],
                    'site' => 'frontend'
                ]
            ];
            $this->load_page('/frontend/marksheet', $data);
        } else {
            return redirect()->to('login');
        }

    }

    public function study_material()
    {
            $data = PAGE_DATA_FRONTEND;
            $data = [
                'data_page' => [],
                'data_header' => [
                    'header_link' => ['study_material_css.php'],
                    'title' => 'study_material',
                    'header' => [],
                    'sidebar' => [],
                    'site' => 'frontend'
                ],
                'data_footer' => [
                    'footer_link' => ['study_material_js.php'],
                    'footer' => [],
                    'site' => 'frontend'
                ]
            ];
            $this->load_page('/frontend/study_material', $data);

    }

    public function paper()
    {
            $data = PAGE_DATA_FRONTEND;
            $data = [
                'data_page' => [],
                'data_header' => [
                    'header_link' => ['paper_css.php'],
                    'title' => 'paper',
                    'header' => [],
                    'sidebar' => [],
                    'site' => 'frontend'
                ],
                'data_footer' => [
                    'footer_link' => ['paper_js.php'],
                    'footer' => [],
                    'site' => 'frontend'
                ]
            ];
            $this->load_page('/frontend/paper', $data);

    }

    public function login_pin()
    {
        echo view('/frontend/login_code');

    }


    public function logout()
    {
        $session = \Config\Services::session();

        $session->remove(SES_USER_USER_ID);
        $session->remove(SES_USER_TYPE);
        return redirect()->to('login');
    }

    public function load_login()
    {
        echo view('frontend/login');
    }
    public function load_signup()
    {
        echo view('frontend/signup');
    }

    public function load_otp()
    {
        echo view('frontend/otp');
    }

    public function handle_signup()
    {
        $response = [
            "status" => false,
            "message" => "",
            "user_id" => ""
        ];

        try {
            $UsersModel = new UsersModel();
            $emailCondition = ['email' => $this->request->getPost('email'), 'type' => 'user', 'status' => 'active'];
            $numberCondition = ['number' => $this->request->getPost('number'), 'type' => 'user', 'status' => 'active'];

            $emailConditionPending = ['email' => $this->request->getPost('email'), 'type' => 'user', 'status' => 'pending'];
            $numberConditionPending = ['number' => $this->request->getPost('number'), 'type' => 'user', 'status' => 'pending'];

            $emailConditionPending = $UsersModel->where($emailConditionPending)->first();
            $numberConditionPending = $UsersModel->where($numberConditionPending)->first();

            $recordEmail = $UsersModel->where($emailCondition)->first();
            $recordNumber = $UsersModel->where($numberCondition)->first();

            if ($recordEmail) {
                $response['message'] = 'Email All Ready Exists Try Diffrent';
            } else if ($recordNumber) {
                $response['message'] = 'Number All Ready Exists Try Diffrent';
            } else if ($emailConditionPending || $numberConditionPending) {
                $user_id = $emailConditionPending ? $emailConditionPending['uid'] : $numberConditionPending['uid'];
                $OtpModel = new OtpModel();
                $otp = mt_rand(1000, 9999);
                $otpData = [
                    "uid" => $this->generate_uid(UID_OTP),
                    "user_id" => $user_id,
                    "otp" => $otp
                ];
                $mailHtml = "<!DOCTYPE html>
                            <html>
                            <head>
                                <meta charset='UTF-8'>
                                <title>Your OTP Code</title>
                                <style>
                                    *{
                                        margin: 0;
                                        padding: 0;
                                    }
                                    body {
                                        font-family: Arial, sans-serif;
                                        margin: 0;
                                        padding: 0;
                                        background-color: #f4f4f4;
                                    }
                                    .container {
                                        width: 100%;
                                        max-width: 600px;
                                        margin: 0 auto;
                                        background-color: #ffffff;
                                        padding: 20px;
                                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                                    }
                                    .header {
                                        background-color: #4CAF50;
                                        color: #ffffff;
                                        padding: 10px 0;
                                        text-align: center;
                                        font-size: 24px;
                                    }
                                    .content {
                                        margin: 20px 0;
                                        text-align: center;
                                    }
                                    .otp {
                                        font-size: 32px;
                                        font-weight: bold;
                                        margin: 20px 0;
                                        color: #333333;
                                    }
                                    .footer {
                                        text-align: center;
                                        color: #777777;
                                        font-size: 14px;
                                        margin-top: 20px;
                                    }
                                </style>
                            </head>
                            <body>
                                <div class='container'>
                                    <div class='header'>
                                        Atomz OTP Verification
                                    </div>
                                    <div class='content'>
                                        <p>Hello,</p>
                                        <p>Your OTP code is:</p>
                                        <p class='otp'> ".$otp." </p>
                                        <p>Please use this code to complete your verification.</p>
                                    </div>
                                    <div class='footer'>
                                        <p>&copy; 2024 Atomz. All rights reserved.</p>
                                    </div>
                                </div>
                            </body>
                            </html>";

                $mailConfig = [
                    'setFrom_mail' => 'contact@atomz.in',
                    'setFrom_name' => 'atomz',
                    'setTo_mail' => $emailConditionPending ? $emailConditionPending['email'] : $numberConditionPending['email'],
                    'setTo_subject' => 'Your OTP for sign-up',
                    'message' => $mailHtml
                ];
                $this->send_mail($mailConfig);

                $OtpModel->insert($otpData);

                $response['status'] = true;
                $response['message'] = 'OTP send to Your Email';
                $response['user_id'] = $user_id;
            } else {
                $userData = [
                    "uid" => $this->generate_uid(UID_USER),
                    "user_name" => $this->request->getPost('user_name'),
                    "email" => $this->request->getPost('email'),
                    "number" => $this->request->getPost('number'),
                    "password" => md5($this->request->getPost('password')),
                    "status" => STATUS_PENDING,
                    "type" => TYPE_USER
                ];
                $UsersModel->insert($userData);
                $OtpModel = new OtpModel();


                //$otp = $this->generate_otp();
                $otp = mt_rand(1000, 9999);
                $otpData = [
                    "uid" => $this->generate_uid(UID_OTP),
                    "user_id" => $userData['uid'],
                    "otp" => $otp
                ];


                $mailHtml = "<!DOCTYPE html>
                <html>
                <head>
                    <meta charset='UTF-8'>
                    <title>Your OTP Code</title>
                    <style>
                        *{
                            margin: 0;
                            padding: 0;
                        }
                        body {
                            font-family: Arial, sans-serif;
                            margin: 0;
                            padding: 0;
                            background-color: #f4f4f4;
                        }
                        .container {
                            width: 100%;
                            max-width: 600px;
                            margin: 0 auto;
                            background-color: #ffffff;
                            padding: 20px;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        }
                        .header {
                            background-color: #4CAF50;
                            color: #ffffff;
                            padding: 10px 0;
                            text-align: center;
                            font-size: 24px;
                        }
                        .content {
                            margin: 20px 0;
                            text-align: center;
                        }
                        .otp {
                            font-size: 32px;
                            font-weight: bold;
                            margin: 20px 0;
                            color: #333333;
                        }
                        .footer {
                            text-align: center;
                            color: #777777;
                            font-size: 14px;
                            margin-top: 20px;
                        }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <div class='header'>
                            Atomz OTP Verification
                        </div>
                        <div class='content'>
                            <p>Hello,</p>
                            <p>Your OTP code is:</p>
                            <p class='otp'> ".$otp." </p>
                            <p>Please use this code to complete your verification.</p>
                        </div>
                        <div class='footer'>
                            <p>&copy; 2024 Atomz. All rights reserved.</p>
                        </div>
                    </div>
                </body>
                </html>";

                $mailConfig = [
                    'setFrom_mail' => 'contact@atomz.in',
                    'setFrom_name' => 'atomz',
                    'setTo_mail' => $this->request->getPost('email'),
                    'setTo_subject' => 'Your OTP for sign-up',
                    'message' => $mailHtml
                ];
                $this->send_mail($mailConfig);

                $OtpModel->insert($otpData);

                $response['status'] = true;
                $response['message'] = 'OTP send to Your Email';
                $response['user_id'] = $userData['uid'];
            }
        } catch (Exception $e) {
            $response['message'] = 'OTP send to Your Email';
        }


        echo json_encode($response);

    }

    public function resend_otp(){
        $response = [
            "status" => false,
            "message" => "user not found",
        ];

        try {
            $UsersModel = new UsersModel();
            $userCondition = ['uid' => $this->request->getGet('user_id')];
            $user = $UsersModel->where($userCondition)->first();
            if ($user) {
                $OtpModel = new OtpModel();
                $otp = mt_rand(1000, 9999);
                $otpData = [
                    "uid" => $this->generate_uid(UID_OTP),
                    "user_id" => $user['uid'],
                    "otp" => $otp
                ];
                $mailHtml = "<!DOCTYPE html>
                            <html>
                            <head>
                                <meta charset='UTF-8'>
                                <title>Your OTP Code</title>
                                <style>
                                    *{
                                        margin: 0;
                                        padding: 0;
                                    }
                                    body {
                                        font-family: Arial, sans-serif;
                                        margin: 0;
                                        padding: 0;
                                        background-color: #f4f4f4;
                                    }
                                    .container {
                                        width: 100%;
                                        max-width: 600px;
                                        margin: 0 auto;
                                        background-color: #ffffff;
                                        padding: 20px;
                                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                                    }
                                    .header {
                                        background-color: #4CAF50;
                                        color: #ffffff;
                                        padding: 10px 0;
                                        text-align: center;
                                        font-size: 24px;
                                    }
                                    .content {
                                        margin: 20px 0;
                                        text-align: center;
                                    }
                                    .otp {
                                        font-size: 32px;
                                        font-weight: bold;
                                        margin: 20px 0;
                                        color: #333333;
                                    }
                                    .footer {
                                        text-align: center;
                                        color: #777777;
                                        font-size: 14px;
                                        margin-top: 20px;
                                    }
                                </style>
                            </head>
                            <body>
                                <div class='container'>
                                    <div class='header'>
                                        Atomz OTP Verification
                                    </div>
                                    <div class='content'>
                                        <p>Hello,</p>
                                        <p>Your OTP code is:</p>
                                        <p class='otp'> ".$otp." </p>
                                        <p>Please use this code to complete your verification.</p>
                                    </div>
                                    <div class='footer'>
                                        <p>&copy; 2024 Atomz. All rights reserved.</p>
                                    </div>
                                </div>
                            </body>
                            </html>";

                $mailConfig = [
                    'setFrom_mail' => 'contact@atomz.in',
                    'setFrom_name' => 'atomz',
                    'setTo_mail' => $user['email'],
                    'setTo_subject' => 'Your OTP for sign-up',
                    'message' => $mailHtml
                ];
                $this->send_mail($mailConfig);

                $OtpModel->insert($otpData);

                $response['status'] = true;
                $response['message'] = 'OTP send to Your Email';
            }


        }catch (Exception $e) {
            $response['message'] = 'OTP send to Your Email';
        }


        echo json_encode($response);
    }

    public function handle_login()
    {
        $response = [
            "status" => false,
            "message" => "User Not Found",
            "user_id" => ""
        ];
        $email_number = $this->request->getPost('email_number');
        $password = $this->request->getPost('password');
        $UsersModel = new UsersModel();

        $UsersData = $UsersModel
            ->where('password', md5($password))
            ->where('type', 'student')
            ->where('status', 'active')
            ->groupStart()
                ->where('email', $email_number)
                ->orWhere('number', $email_number)
            ->groupEnd()
            ->get()
            ->getResultArray();
        $UsersData = !empty($UsersData[0]) ? $UsersData[0] : null;
        if (!empty($UsersData)) {
            $otp = mt_rand(1000, 9999);
            $StudentModel = new StudentModel();
            $StudentModel->transStart();
            try {
                $StudentModel
                    ->where('user_id', $UsersData['uid'])
                    ->set(['login_code' => $otp])
                    ->update();
                $StudentModel->transCommit();
            } catch (\Exception $e) {
                $StudentModel->transRollback();
                throw $e;
            }
            // $this->session->set(SES_USER_USER_ID, $UsersData['uid']);
            // $this->session->set(SES_USER_TYPE, $UsersData['type']);
            // $this->pr($this->session->get());
            $response = [
                "status" => true,
                "message" => "User Found",
                "data" => $UsersData,
                "login_code" => $otp
            ];
        }


        echo json_encode($response);
    }

    public function verify_pin()
    {
        $response = [
            "status" => false,
            "message" => "PIN NOT MATCHED",
            "user_id" => ""
        ];
        $StudentModel = new StudentModel();
        $student = $StudentModel->where('user_id', $this->request->getPost('user_id'))->first();
        if($student){
            if($student['login_code'] == $this->request->getPost('pin')){
                $this->session->set(SES_USER_USER_ID, $this->request->getPost('user_id'));
                $this->session->set(SES_USER_TYPE, $this->request->getPost('type'));
                $response = [
                    "status" => true,
                    "message" => "PIN MATCHED",
                    "user_id" => $this->request->getPost('user_id')
                ];
            }
        }
        echo json_encode($response);
    }

    // public function verify_otp()
    // {
    //     $response = [
    //         "status" => false,
    //         "message" => "OTP NOT MATCHED",
    //         "user_id" => ""
    //     ];
    //     $OtpModel = new OtpModel();
    //     $OtpModel->where('user_id', $this->request->getPost('user_id'));
    //     $latestOtp = $OtpModel->orderBy('created_at', 'DESC')->first();
    //     if ($latestOtp['otp'] == $this->request->getPost('otp')) {
    //         $usersModel = new UsersModel();
    //         $usersModel->setUserActive($latestOtp['user_id'], ['status' => 'active']);
    //         $response = [
    //             "status" => true,
    //             "message" => "OTP MATCHED",
    //             "user_id" => $this->request->getPost('user_id')
    //         ];
    //     }
    //     echo json_encode($response);

    // }

    public function signup_success()
    {
        echo view('frontend/signup_success');
    }

    public function load_forgot_password()
    {
        echo view('frontend/forgot_password');
    }

    public function send_otp()
    {
        $response = [
            "status" => false,
            "message" => "Invalid Email",
            "user_id" => ""
        ];
        $email = $this->request->getPost('email');
        $UsersModel = new UsersModel();
        $user = $UsersModel->where(['email' => $email,'type'=>'user'])->first();

        if (!empty($user)) {
            $OtpModel = new OtpModel();
            //$otp = $this->generate_otp();
            $otp = mt_rand(1000, 9999);
            
            $mailHtml = "<!DOCTYPE html>
                            <html>
                            <head>
                                <meta charset='UTF-8'>
                                <title>Your OTP Code</title>
                                <style>
                                    *{
                                        margin: 0;
                                        padding: 0;
                                    }
                                    body {
                                        font-family: Arial, sans-serif;
                                        margin: 0;
                                        padding: 0;
                                        background-color: #f4f4f4;
                                    }
                                    .container {
                                        width: 100%;
                                        max-width: 600px;
                                        margin: 0 auto;
                                        background-color: #ffffff;
                                        padding: 20px;
                                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                                    }
                                    .header {
                                        background-color: #4CAF50;
                                        color: #ffffff;
                                        padding: 10px 0;
                                        text-align: center;
                                        font-size: 24px;
                                    }
                                    .content {
                                        margin: 20px 0;
                                        text-align: center;
                                    }
                                    .otp {
                                        font-size: 32px;
                                        font-weight: bold;
                                        margin: 20px 0;
                                        color: #333333;
                                    }
                                    .footer {
                                        text-align: center;
                                        color: #777777;
                                        font-size: 14px;
                                        margin-top: 20px;
                                    }
                                </style>
                            </head>
                            <body>
                                <div class='container'>
                                    <div class='header'>
                                        Atomz OTP Verification
                                    </div>
                                    <div class='content'>
                                        <p>Hello,</p>
                                        <p>Your OTP code is:</p>
                                        <p class='otp'> ".$otp." </p>
                                        <p>Please use this code to change your password.</p>
                                    </div>
                                    <div class='footer'>
                                        <p>&copy; 2024 Atomz. All rights reserved.</p>
                                    </div>
                                </div>
                            </body>
                            </html>";

                $mailConfig = [
                    'setFrom_mail' => 'contact@atomz.in',
                    'setFrom_name' => 'atomz',
                    'setTo_mail' => $user['email'],
                    'setTo_subject' => 'OTP to change password',
                    'message' => $mailHtml
                ];
                $this->send_mail($mailConfig);


            $otpData = [
                "uid" => $this->generate_uid(UID_OTP),
                "user_id" => $user['uid'],
                "otp" => $otp
            ];
            $OtpModel->insert($otpData);
            $response = [
                "status" => true,
                "message" => "OTP Sent To Your email",
                "user_id" => $user['uid']
            ];
        }

        echo json_encode($response);
    }

    public function change_password()
    {
        echo view('frontend/change_password');
    }
    public function handle_change_password()
    {
        $response = [
            "status" => false,
            "message" => "password not changed",
        ];
        $user_id = $this->request->getPost('user_id');
        $password = md5($this->request->getPost('password'));

        $UsersModel = new UsersModel();
        $change = $UsersModel->set('password', $password)
            ->where('uid', $user_id)
            ->update();
        $response['status'] = $change == '1';
        $response['message'] = $response['status'] ? "Password Changed Seccessfully" : "Password Not Changed";

        echo json_encode($response);

    }
}
