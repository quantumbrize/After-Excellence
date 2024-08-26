<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CommonModel;
use App\Models\UsersModel;
use App\Models\UserImageModel;
use App\Models\AddressModel;
use App\Models\MessageModel;
use App\Models\AccessModel;
use App\Models\StaffAccessModel;
use App\Models\StaffModel;
use App\Models\VendorModel;
use App\Models\StudentModel;
use App\Models\StudentClassRollModel;
use App\Models\StudentDoubtModel;

class User_Controller extends Api_Controller
{
    public function __construct()
    {
        // Load session library
        $this->session = \Config\Services::session();
    }

    private function update_user($data)
    {

        $resp = [
            'status' => false,
            'message' => 'Faild!',
            'data' => null
        ];

        if (empty($data['name'])) {
            $resp['message'] = 'Please Enter Name';
        } else if (empty($data['number'])) {
            $resp['message'] = 'Please Enter Number';
        } else if (empty($data['email'])) {
            $resp['message'] = 'Please Enter Email';
        } else if (empty($data['city'])) {
            $resp['message'] = 'Please Enter City';
        }  else if (empty($data['block'])) {
            $resp['message'] = 'Please Enter Block';
        } else if (empty($data['post_office'])) {
            $resp['message'] = 'Please Enter Post Office';
        } else if (empty($data['police_station'])) {
            $resp['message'] = 'Please Enter Police Station';
        } else if (empty($data['district'])) {
            $resp['message'] = 'Please Enter District';
        } else if (empty($data['state'])) {
            $resp['message'] = 'Please Enter State';
        } else if (empty($data['zip'])) {
            $resp['message'] = 'Please Enter Zip Code';
        } else if (empty($data['contact'])) {
            $resp['message'] = 'Please Enter Contact';
        } else {

            $user_data = [
                'user_name' => $data['name'],
                'number' => $data['number'],
                'email' => $data['email'],
            ];
            $UserModel = new UsersModel();
            $UserModel->transStart();
            try {
                $UserModel
                    ->where('uid', $data['user_id'])
                    ->set($user_data)
                    ->update();
                $UserModel->transCommit();
            } catch (\Exception $e) {
                $UserModel->transRollback();
                throw $e;
            }

            $update_address_data = [
                'state' => $data['state'],
                'district' => $data['district'],
                'vill_city' => $data['city'],
                'block' => $data['block'],
                'post_office' => $data['post_office'],
                'police_station' => $data['police_station'],
                'pin' => $data['zip'],
                'contact' => $data['contact'],
            ];

            $UserAddressModel = new AddressModel();
            $UserAddressModel->transStart();
            try {
                    $UserAddressModel
                        ->where('user_id', $data['user_id'])
                        ->set($update_address_data)
                        ->update();
                $UserAddressModel->transCommit();
            } catch (\Exception $e) {
                $UserAddressModel->transRollback();
                throw $e;
            }

            $uploadedFiles = $this->request->getFiles();
            // $this->prd($uploadedFiles);
            if (!empty($uploadedFiles['images'])) {
                $UserImagesModel = new UserImageModel();
                $UsersData = $UserImagesModel
                    ->where('user_id', $data['user_id'])
                    ->get()
                    ->getResultArray();
                $UserImageData = !empty($UsersData[0]) ? $UsersData[0] : null;
                foreach ($uploadedFiles['images'] as $file) {
                    $file_src = $this->single_upload($file, PATH_USER_IMG);
                    $UserImagesModel->transStart();
                    try {
                        if (!empty($UserImageData)) {
                            $user_image_data = [
                                'img' => $file_src,
                            ];
                            $UserImagesModel
                                ->where('user_id', $data['user_id'])
                                ->set($user_image_data)
                                ->update();
                        } else {
                            $user_image_data = [
                                'uid' => $this->generate_uid(UID_USER_IMG),
                                'user_id' => $data['user_id'],
                                'img' => $file_src,
                            ];
                            $UserImagesModel->insert($user_image_data);
                        }
                        $UserImagesModel->transCommit();
                    } catch (\Exception $e) {
                        $UserImagesModel->transRollback();
                        throw $e;
                    }
                }
            }
            $resp['status'] = true;
            $resp['message'] = 'Update Successful';
            $resp['data'] = ['user_id' => $data['user_id']];
        }
        return $resp;
    }

    private function change_password($data)
    {

        $resp = [
            'status' => false,
            'message' => 'Password Changed Faild!',
            'data' => null
        ];

        if (empty($data['old_password'])) {
            $resp['message'] = 'Please Enter Old Password';
        } else if (empty($data['new_password'])) {
            $resp['message'] = 'Please Enter New Password';
        } else if (empty($data['confirm_password'])) {
            $resp['message'] = 'Please Enter Confirm Password';
        } else {
            $UserModel = new UsersModel();
            $UsersData = $UserModel
                ->where('uid', $data['user_id'])
                ->where('password', md5($data['old_password']))
                ->where('type', 'student')
                ->get()
                ->getResultArray();
            $UsersData = !empty($UsersData[0]) ? $UsersData[0] : null;
            if (!empty($UsersData) || $UsersData != null) {
                $UserModel->transStart();
                try {
                    $UserModel
                        ->where('uid', $data['user_id'])
                        ->set(['password' => md5($data['new_password'])])
                        ->update();
                    $UserModel->transCommit();
                } catch (\Exception $e) {
                    $UserModel->transRollback();
                    throw $e;
                }
                $resp['status'] = true;
                $resp['message'] = 'Password Changed Successfully';
                $resp['data'] = "";
            } else {
                $resp['message'] = 'Old password did not match!';
            }
        }
        return $resp;
    }

    private function message($data)
    {

        $resp = [
            'status' => false,
            'message' => 'Faild!',
            'data' => null
        ];
        // $this->prd($data['teachers_id']);
        if (empty($data['message'])) {
            $resp['message'] = 'Please Enter Message';
        } else {
            $insert_message = [
                'uid' => $this->generate_uid(UID_MESSAGE),
                'student_id' => $data['student_id'],
                'teacher_id' => $data['teachers_id'],
                'message' => $data['message'],
            ];
            $MessageModel = new MessageModel();
            $MessageModel->transStart();
            try {
                $messageData = $MessageModel->insert($insert_message);
                $MessageModel->transCommit();
            } catch (\Exception $e) {
                $MessageModel->transRollback();
                throw $e;
            }

            if ($messageData) {
                $resp['status'] = true;
                $resp['message'] = 'Message Submitted Successfully';
                $resp['data'] = "";
            }

        }
        return $resp;
    }

    private function get_user()
    {
        $user_id = $this->is_logedin();
        // echo $user_id;
        $resp = [
            "status" => false,
            "message" => "Data Not Found",
            "user_data" => ""
        ];
        if (!empty($user_id)) {
            $UsersModel = new UsersModel();
            $UsersData = $UsersModel
                ->where('uid', $user_id)
                ->get()
                ->getResultArray();
            $UsersData = !empty($UsersData[0]) ? $UsersData[0] : null;

            // $this->pr($user_id);
            // $this->prd($UsersData);
            // $StudentClassRollModel = new StudentClassRollModel();
            // $UsersRollData = $StudentClassRollModel
            //     ->where('user_id', $user_id)
            //     ->get()
            //     ->getResultArray();
            // $UsersRollData = !empty($UsersRollData[0]) ? $UsersRollData[0] : null;
            if($UsersData['came_from'] == 'online'){
                $UserAddressModel = new AddressModel();
                $AddressData = $UserAddressModel
                    ->where('user_id', $user_id)
                    ->get()
                    ->getResultArray();
                $AddressData = !empty($AddressData[0]) ? $AddressData[0] : null;

                $AllAddressData = $UserAddressModel
                    ->where('user_id', $user_id)
                    ->get()
                    ->getResultArray();
                $AllAddressData = !empty($AllAddressData) ? $AllAddressData : null;

                $UserImageModel = new UserImageModel();
                $ImageData = $UserImageModel
                    ->where('user_id', $user_id)
                    ->get()
                    ->getResultArray();
                $ImageData = !empty($ImageData[0]) ? $ImageData[0] : null;

                $CommonModel = new CommonModel();
                $sql_roll = "SELECT
                        student_class_roll.roll AS student_roll,
                        student_class_roll.uid AS student_class_roll_id,
                        student_class_roll.created_at,
                        classes.class_name,
                        branches.branch_name
                        
                    FROM
                        student_class_roll
                    JOIN
                        classes ON student_class_roll.class_id = classes.uid
                    JOIN
                        branches ON student_class_roll.branch_id = branches.uid
                    WHERE
                        student_class_roll.user_id = '{$user_id}'";

                    $UsersRollData = $CommonModel->customQuery($sql_roll);
                $resp = [
                    "status" => true,
                    "message" => "Data fetched",
                    "user_id" => $user_id,
                    "user_data" => $UsersData,
                    "user_roll_data" => $UsersRollData[0],
                    "address" => $AddressData,
                    "user_img" => $ImageData,
                    "all_address" => $AllAddressData,
                ];
            } else{
                $CommonModel = new CommonModel();

                $sql = "SELECT
                            users.uid AS user_id,
                            users.user_name,
                            users.email,
                            users.number,
                            users.type,
                            users.came_from,
                            submit_admit_data.dob,
                            submit_admit_data.address,
                            submit_admit_data.img,
                            submit_admit_data.questions AS user_questions,
                            submit_admit_data.answers AS user_answers,
                            classes.class_name,
                            branches.branch_name,
                            unsigned_user_result.total_marks,
                            unsigned_user_result.questions AS admin_questions,
                            unsigned_user_result.answer AS admin_answers,
                            unsigned_user_result.right_ans,
                            unsigned_user_result.marks
                        FROM
                            users
                        JOIN
                            submit_admit_data ON users.uid = submit_admit_data.user_id
                        JOIN
                            classes ON submit_admit_data.class_id = classes.uid
                        JOIN
                            branches ON submit_admit_data.branch_id = branches.uid
                        JOIN
                            unsigned_user_result ON submit_admit_data.uid = unsigned_user_result.admit_data_id
                        WHERE
                            users.uid = '{$user_id}'";

                        $StudentData = $CommonModel->customQuery($sql);
                        $StudentData = json_decode(json_encode($StudentData), true);

                        $resp = [
                            "status" => true,
                            "message" => "Data fetched",
                            "user_id" => $user_id,
                            "user_data" => $UsersData,
                            "student_data" => $StudentData,
                        ];
            }
            
        }
        return $resp;
    }

    private function get_admin($data)
    {
        // echo $user_id;
        $resp = [
            "status" => false,
            "message" => "Data Not Found",
            "user_data" => ""
        ];
        if (!empty($data['user_id'])) {
            $UsersModel = new UsersModel();
            $UsersData = $UsersModel
                ->where('uid', $data['user_id'])
                ->get()
                ->getResultArray();
            $UsersData = !empty($UsersData[0]) ? $UsersData[0] : null;
            $UsersImageData = '';
            if($UsersData && $UsersData['type'] == 'staff'){
                $UserImageModel = new UserImageModel();
                $UsersImageData = $UserImageModel
                ->where('user_id', $data['user_id'])
                ->get()
                ->getResultArray();
            $UsersImageData = !empty($UsersImageData[0]) ? $UsersImageData[0] : null;
            }
            $resp = [
                "status" => true,
                "message" => "Data fetched",
                "user_data" => $UsersData,
                "user_image" => $UsersImageData,
            ];
        } else {
            $resp = [
                "user_data" => $data['user_id'],];
        }
        return $resp;
    }

    private function update_admin($data)
    {

        $resp = [
            'status' => false,
            'message' => 'Faild!',
            'data' => null
        ];

        if (empty($data['nameInput'])) {
            $resp['message'] = 'Please Enter Name';
        } else if (empty($data['emailInput'])) {
            $resp['message'] = 'Please Enter Number';
        } else if (empty($data['phonenumberInput'])) {
            $resp['message'] = 'Please Enter Email';
        } else if (empty($data['user_id'])) {
            $resp['message'] = 'User Not Found';
        } else {

            $user_data = [
                'user_name' => $data['nameInput'],
                'email' => $data['emailInput'],
                'number' => $data['phonenumberInput'],
            ];
            $UserModel = new UsersModel();
            $UserModel->transStart();
            try {
                $UserModel
                    ->where('uid', $data['user_id'])
                    ->set($user_data)
                    ->update();
                $UserModel->transCommit();
            } catch (\Exception $e) {
                $UserModel->transRollback();
                throw $e;
            }
            $resp['status'] = true;
            $resp['message'] = 'Update Successful';
            $resp['data'] = ['user_id' => $data['user_id']];
        }
        return $resp;
    }

    private function change_admin_password($data)
    {

        $resp = [
            'status' => false,
            'message' => 'Password Changed Faild!',
            'data' => null
        ];

        if (empty($data['old_password'])) {
            $resp['message'] = 'Please Enter Old Password';
        } else if (empty($data['new_password'])) {
            $resp['message'] = 'Please Enter New Password';
        } else if (empty($data['confirm_password'])) {
            $resp['message'] = 'Please Enter Confirm Password';
        } else {
            $UserModel = new UsersModel();
            $UsersData = $UserModel
                ->where('uid', $data['user_id'])
                ->where('password', md5($data['old_password']))
                ->where('type', 'admin')
                ->orWhere('type', 'staff')
                ->get()
                ->getResultArray();
            $UsersData = !empty($UsersData[0]) ? $UsersData[0] : null;
            if (!empty($UsersData) || $UsersData != null) {
                $UserModel->transStart();
                try {
                    $UserModel
                        ->where('uid', $data['user_id'])
                        ->set(['password' => md5($data['new_password'])])
                        ->update();
                    $updated = $UserModel->transCommit();
                    if($updated){
                        $resp['status'] = true;
                        $resp['message'] = 'Password Changed Successfully';
                        $resp['data'] = "";
                    }
                } catch (\Exception $e) {
                    $UserModel->transRollback();
                    throw $e;
                }
                
            } else {
                $resp['message'] = 'Old password did not match!';
            }
        }
        return $resp;
    }

    private function customer($user_id)
    {
        // echo $user_id;
        $resp = [
            "status" => false,
            "message" => "Data Not Found",
            "user_data" => ""
        ];
        if (!empty($user_id)) {
            $UsersModel = new UsersModel();
            $UsersData = $UsersModel
                ->where('uid', $user_id)
                ->get()
                ->getResultArray();
            $UsersData = !empty($UsersData[0]) ? $UsersData[0] : null;

            $UserAddressModel = new AddressModel();
            $AddressData = $UserAddressModel
                ->where('user_id', $user_id)
                ->get()
                ->getResultArray();
            $AddressData = !empty($AddressData[0]) ? $AddressData[0] : null;

            $AllAddressData = $UserAddressModel
                ->where('user_id', $user_id)
                ->get()
                ->getResultArray();
            $AllAddressData = !empty($AllAddressData) ? $AllAddressData : null;

            $UserImageModel = new UserImageModel();
            $ImageData = $UserImageModel
                ->where('user_id', $user_id)
                ->get()
                ->getResultArray();
            $ImageData = !empty($ImageData[0]) ? $ImageData[0] : null;
            $resp = [
                "status" => true,
                "message" => "Data fetched",
                "user_id" => $user_id,
                "user_data" => $UsersData,
                "address" => $AddressData,
                "user_img" => $ImageData,
                "all_address" => $AllAddressData,
            ];
        } else {
            $UsersModel = new UsersModel();
            $users = $UsersModel->where('type', 'user')->findAll();
            if (count($users) > 0) {
                $UserImageModel = new UserImageModel();
                foreach ($users as $index => $user) {
                    $img = $UserImageModel->where('user_id', $user['uid'])->first();
                    $users[$index]['user_img'] = $img;
                }

            }
            $resp = [
                "status" => true,
                "message" => "Data fetched",
                "user_data" => $users,
            ];
        }
        return $resp;
    }

    private function delete_customer($data)
    {
        // echo $user_id;
        $resp = [
            "status" => false,
            "message" => "Data Not Found",
            "user_data" => ""
        ];
        if ($data) {
            $UserModel = new UsersModel();
            $UserModel->transStart();
            try {
                $UserModel
                    ->where('uid', $data['user_id'])
                    ->set(['status' => 'deleted'])
                    ->update();
                $UserModel->transCommit();
            } catch (\Exception $e) {
                $UserModel->transRollback();
                throw $e;
            }
            $resp = [
                "status" => true,
                "message" => "Data Deleted",
                "user_data" => ""
            ];
        }
        return $resp;
    }

    // private function total_customer()
    // {
    //     $resp = [
    //         'status' => false,
    //         'message' => 'no customer found',
    //         'data' => 0
    //     ];
    //     try {
    //         $UsersModel = new UsersModel();
    //         $totalUsers = $UsersModel->where('type', 'user')->countAllResults();
    //         if (!empty($totalUsers)) {
    //             $resp = [
    //                 'status' => true,
    //                 'message' => 'Total customers found',
    //                 'data' => $totalUsers
    //             ];
    //         }
    //     } catch (\Exception $e) {
    //         $resp['message'] = $e;
    //     }
    //     return $resp;
    // }

    private function total_customer()
    {
        $resp = [
            'status' => false,
            'message' => 'No student found',
            'data' => 0
        ];
        try {
            $UsersModel = new UsersModel();
            $totalUsers = $UsersModel
            ->distinct()
            ->select('email')
            ->where('type', 'student')
            ->countAllResults();
            if (!empty($totalUsers)) {
                $resp = [
                    'status' => true,
                    'message' => 'Total student found',
                    'data' => $totalUsers
                ];
            }
        } catch (\Exception $e) {
            $resp['message'] = $e;
        }
        return $resp;
    }

    private function staff_access($data)
    {
        $resp = [
            "status" => false,
            "message" => "Data Not Found",
            "data" => []
        ];


        try {
            $AccessModel = new AccessModel();
            if (empty($data['staff_id'])) {
                $allAccess = $AccessModel->where('status', 'active')->findAll();
                if ($allAccess) {
                    $resp['status'] = true;
                    $resp['message'] = "All access data retrieved";
                    $resp['data'] = $allAccess;
                } else {
                    // If no access data found at all
                    $resp['message'] = "No access data found";
                }
            }
        } catch (\Exception $e) {
            $resp['message'] = $e->getMessage();
        }
        return $resp;
    }
    private function access_add($data)
    {
        $resp = [
            "status" => false,
            "message" => "Data Not Found",
            "data" => []
        ];
        try {
            $AccessModel = new AccessModel();
            // Generating a UID for the access
            $uid = $this->generate_uid(UID_ACCESS);
            // Access data from the parameter $data
            $accessData = [
                "uid" => $uid,
                "name" => $data['name'],
                "status" => "active"
            ];

            // Insert data into the database
            $isAdded = $AccessModel->insert($accessData);

            // Check if data is successfully inserted
            if ($isAdded) {
                $resp['status'] = true;
                $resp['message'] = "Data inserted successfully";
                $resp['data'] = ['access_id' => $uid];
            } else {
                $resp['message'] = "Failed to insert data";
            }
        } catch (\Exception $e) {
            // Catching any exceptions and setting error message
            $resp['message'] = $e->getMessage();
        }
        return $resp;
    }
    private function staff_add($data)
    {
        $response = [
            "status" => false,
            "message" => "Staff Not Added",
            "data" => []
        ];
        $uploadedFiles = $this->request->getFiles();
        try {
            if (
                empty($uploadedFiles['images']) ||
                empty($data['staffName']) ||
                empty($data['staffEmail']) ||
                empty($data['staffNumber']) ||
                empty($data['staffPassword']) ||
                empty($data['staffRole'])
            ) {
                $response['message'] = "Please Add All Staff Details";

            } else {
                $UsersModel = new UsersModel();
                $isExists = $UsersModel->where(['email' => $data['staffEmail'], 'type' => 'staff'])->findAll();
                //$this->prd($isEmailExists);

                if (empty($isExists)) {
                    // Instantiate necessary models
                    $UsersModel = new UsersModel();
                    $StaffModel = new StaffModel();
                    $UserImageModel = new UserImageModel();

                    // Prepare user data
                    $userData = [
                        "uid" => $this->generate_uid(UID_USER),
                        "user_name" => $data['staffName'],
                        "email" => $data['staffEmail'],
                        "number" => $data['staffNumber'],
                        "password" => md5($data['staffPassword']),
                        "status" => "active",
                        "type" => "staff"
                    ];

                    $user_image_data = [
                        "uid"               => $this->generate_uid(UID_USER_IMG),
                        "user_id"           => $userData['uid'],
                    ];

                    foreach ($uploadedFiles['images'] as $file) {
                        $file_src = $this->single_upload($file, PATH_USER_IMG);
                        $user_image_data['img'] = $file_src;
                    }

                    // Insert user data
                    $isUsersAdded = $UsersModel->insert($userData);

                    if($isUsersAdded){
                        $UserImageModel->insert($user_image_data);
                    }
                    

                    // If user added successfully, proceed to add staff
                    if ($isUsersAdded) {
                        $staffData = [
                            "uid" => $this->generate_uid(UID_STAFF),
                            "user_id" => $userData['uid'],
                            "role" => $data['staffRole'],
                            "status" => "active"
                        ];

                        // Insert staff data
                        $isStaffAdded = $StaffModel->insert($staffData);

                        // If staff added successfully and access rights are provided, insert staff access
                        if ($isStaffAdded && !empty($data['selectedAccess'])) {
                            foreach (explode(",",$data['selectedAccess']) as $index => $item) {
                                $StaffAccessModel = new StaffAccessModel();
                                $accessData = [
                                    "uid" => $this->generate_uid(UID_STAFF_ACCESS),
                                    "staff_id" => $staffData['uid'],
                                    "access_id" => $item
                                ];
                                $StaffAccessModel->insert($accessData);
                            }
                            // Update response upon successful addition
                            $response = [
                                "status" => true,
                                "message" => "Staff Added Successfully",
                                "data" => ['staff_id' => $staffData['uid']]
                            ];
                        }

                    }
                } else {
                    $response['message'] = 'Try Diffrent Email';
                }

            }
        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $response['message'] = $e->getMessage();
        }

        return $response;
    }

    private function staff($data)
    {

        $response = [
            "status" => false,
            "message" => "Staff Not Found",
            "data" => []
        ];

        try {
            $CommonModel = new CommonModel();
            if (!isset($data['s_id'])) {
                $sql = "SELECT 
                        staff.uid AS staff_id,
                        staff.role AS staff_role,
                        users.user_name AS staff_name,
                        users.uid AS user_id,
                        users.email AS staff_email,
                        users.number AS staff_number,
                        user_img.img AS user_image
                    FROM
                        staff
                    JOIN 
                        users ON staff.user_id = users.uid
                    JOIN 
                        user_img ON user_img.user_id = users.uid;";
                $staff = $CommonModel->customQuery($sql);
                $staff = json_decode(json_encode($staff), true);
            } else {
                $s_id = $data['s_id'];
                $sql = "SELECT 
                            staff.uid AS staff_id,
                            staff.role AS staff_role,
                            users.user_name AS staff_name,
                            users.uid AS user_id,
                            users.email AS staff_email,
                            users.number AS staff_number,
                            user_img.img AS user_image
                        FROM
                            staff
                        JOIN 
                            users ON staff.user_id = users.uid 
                        JOIN 
                            user_img ON user_img.user_id = users.uid
                        WHERE
                            staff.uid = '{$s_id}';";
                $staff = $CommonModel->customQuery($sql);
                $staff = json_decode(json_encode($staff), true);
                $staff = !empty($staff) ? $staff[0] : null;

                $sql_access = "SELECT 
                            access.uid AS access_id
                        FROM
                            access
                        JOIN
                            staff_access ON staff_access.access_id = access.uid
                        WHERE 
                            staff_access.staff_id = '{$s_id}';";
                $access = $CommonModel->customQuery($sql_access);
                $access = json_decode(json_encode($access), true);
                $access = !empty($access) ? $access : null;

                $accArr = [];
                if (!empty($access)) {
                    foreach ($access as $index => $item) {
                        $accArr[$index] = $item['access_id'];
                    }
                }

                $staff['access'] = $accArr;
            }


            $response = [
                "status" => !empty($staff),
                "message" => !empty($staff) ? "Staff Found" : "Staff Not Found",
                "data" => !empty($staff) ? $staff : []
            ];


        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $response['message'] = $e->getMessage();
        }



        return $response;
    }

    private function delete_staff($data)
    {

        $response = [
            "status" => false,
            "message" => "Faild to delete staff",
            "data" => []
        ];

        try {
            $CommonModel = new CommonModel();
            $StaffModel = new StaffModel();
            $StaffAccessModel = new StaffAccessModel();
            $UsersModel = new UsersModel();
                $staff_id = $data['staff_id'];
                $sql = "SELECT 
                    users.uid AS user_id
                FROM
                    staff
                JOIN 
                    users ON staff.user_id = users.uid 
                WHERE
                    staff.uid = '{$staff_id}';";
                $user_id = $CommonModel->customQuery($sql);
                $user_id = json_decode(json_encode($user_id), true);
                if($user_id){
                    $delete_staff = $StaffModel->where('uid', $staff_id)->delete();
                    if($delete_staff){
                        $delete_user = $UsersModel->where('uid', $user_id[0])->delete();
                        if($delete_user){
                            $delete_staff_access = $StaffAccessModel->where('staff_id', $staff_id)->delete();
                            if($delete_staff_access){
                                $response = [
                                    "status" => true,
                                    "message" => "Staff deleted successfully",
                                    "data" => [],
                                ];
                    
                            }
                        }
                    }
                }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $response['message'] = $e->getMessage();
        }



        return $response;
    }


    private function access_update($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to update access.",
        ];

        try {
            $StaffAccessModel = new StaffAccessModel();

            $conditions = ['staff_id' => $data['staff_id'], 'access_id' => $data['access_id']];

            if ($StaffAccessModel->where($conditions)->countAllResults()) {
                // If a record exists with the provided staff_id and access_id, delete it
                $isUpdated = $StaffAccessModel->where($conditions)->delete();
            } else {
                // If no record exists, insert a new one
                $accessData = [
                    "uid" => $this->generate_uid(UID_STAFF_ACCESS),
                    "staff_id" => $data['staff_id'],
                    "access_id" => $data['access_id']
                ];
                $isUpdated = $StaffAccessModel->insert($accessData);
            }

            // Update response based on success or failure
            if ($isUpdated) {
                $resp['status'] = true;
                $resp['message'] = "Access updated successfully.";
            } else {
                $resp['message'] = "Failed to update access.";
            }
        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;
    }


    private function staff_update($data)
    {

        $resp = [
            "status" => false,
            "message" => "Failed to update access.",
            "data" => []
        ];

        try {

            if (
                empty($data['staffName']) ||
                empty($data['staffEmail']) ||
                empty($data['staffNumber']) ||
                empty($data['staffRole'])
            ) {
                $resp['message'] = "Please Add All Staff Details";
            } else {
                $staff_id = $data['staffId'];
                $sql = "SELECT
                            users.uid AS user_id
                        FROM 
                            users
                        JOIN
                            staff ON users.uid = staff.user_id
                        WHERE
                            staff.uid = '{$staff_id}';";
                $CommonModel = new CommonModel();
                $user_id = $CommonModel->customQuery($sql);
                $user_id = json_decode(json_encode($user_id), true);
                $user_id = !empty($user_id) ? $user_id[0]['user_id'] : null;

                $updateStaffData = [
                    "role" => $data['staffRole'],
                ];
                $updateUserData = [
                    "user_name" => $data['staffName'],
                    "number" => $data['staffNumber'],
                    "email" => $data['staffEmail']
                ];

                $UsersModel = new UsersModel();
                $StaffModel = new StaffModel();
                $UserImageModel = new UserImageModel();

                // Update user details
                $isUserUpdated = $UsersModel->where(['uid' => $user_id])->set($updateUserData)->update();
                // Update staff details
                $isStaffUpdated = $StaffModel->where(['user_id' => $user_id])->set($updateStaffData)->update();

                $uploadedFiles = $this->request->getFiles();
                if(isset($uploadedFiles['images'])){
                    foreach ($uploadedFiles['images'] as $file) {
                        $file_src = $this->single_upload($file, PATH_USER_IMG);
                        $banner_data['img'] = $file_src;
                        if($banner_data['img'] !=""){
                            $isUserImageUpdated = $UserImageModel->where(['user_id' => $user_id])->set($banner_data)->update();
                        }
                    }
                }

                if ($isUserUpdated && $isStaffUpdated) {
                    $resp = [
                        "status" => true,
                        "message" => "Updated",
                        "data" => ['user_id' => $user_id]
                    ];
                } else {
                    $resp["message"] = "Failed to update.";
                }
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;

    }

    private function seller_list($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to update access.",
            "data" => []
        ];

        try {

            $sql = "SELECT
                        vendor.uid AS vendor_id,
                        vendor.user_img,
                        vendor.signature_img,
                        vendor.pan_img,
                        vendor.aadhar_img,
                        users.uid AS user_id,
                        users.user_name,
                        users.number,
                        users.email
                    FROM
                        vendor
                    JOIN users ON vendor.user_id = users.uid
                    WHERE
                        (users.type = 'admin' OR users.type = 'seller')
                        AND users.status = 'active'";
            $CommonModel = new CommonModel();

            $vendors = $CommonModel->customQuery($sql);
            $vendors = json_decode(json_encode($vendors), true);
            if (!empty($vendors)) {
                $resp['status'] = true;
                $resp['message'] = "All vendors data retrieved";
                $resp['data'] = $vendors;
            } else {
                // If no access data found at all
                $resp['message'] = "No vendors data found";
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;

    }

    private function add_new_seller($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to update access.",
            "data" => []
        ];

        try {
            $uploadedFiles = $this->request->getFiles();
            if (empty($data['user_name'])) {
                $resp['message'] = 'Please add user name';
            } else if (empty($data['number'])) {
                $resp['message'] = 'Please add number';
            } else if (empty($data['email'])) {
                $resp['message'] = 'Please add email';
            } else if (empty($data['password'])) {
                $resp['message'] = 'Please add password';
            } else if (empty($uploadedFiles['user_img'])) {
                $resp['message'] = 'Please add user image';
            }else if (empty($uploadedFiles['signature'])) {
                $resp['message'] = 'Please add signature';
            }else if (empty($uploadedFiles['pan_img'])) {
                $resp['message'] = 'Please add pan card image';
            }else if (empty($uploadedFiles['aadhar_img'])) {
                $resp['message'] = 'Please add aadhar card image';
            }else {

                $user_data = [
                    "uid" => $this->generate_uid(UID_USER),
                    "user_name" => $data['user_name'],
                    "email" => $data['email'],
                    "number" => $data['number'],
                    "password" => md5($data['password']),
                    "type" => 'seller',
                    "status" => 'active'
                ];
                $vendor_data = [
                    "uid" => $this->generate_uid(UID_VENDOR),
                    "user_id" => $user_data['uid'],
                    "status" => 'active'
                ];
                foreach ($uploadedFiles['user_img'] as $file) {
                    $file_src = $this->single_upload($file, PATH_USER_IMG);
                    $vendor_data['user_img'] = $file_src;
                }
                foreach ($uploadedFiles['signature'] as $file) {
                    $file_src = $this->single_upload($file, PATH_USER_DOC);
                    $vendor_data['signature_img'] = $file_src;
                }
                foreach ($uploadedFiles['pan_img'] as $file) {
                    $file_src = $this->single_upload($file, PATH_USER_DOC);
                    $vendor_data['pan_img'] = $file_src;
                }
                foreach ($uploadedFiles['aadhar_img'] as $file) {
                    $file_src = $this->single_upload($file, PATH_USER_DOC);
                    $vendor_data['aadhar_img'] = $file_src;
                }
                $UsersModel = new UsersModel();
                $VendorModel = new VendorModel();

                // Insert user data
                $UsersModel->insert($user_data);
                // Insert vendor data
                $VendorModel->insert($vendor_data);

                $resp['status'] = true;
                $resp['message'] = 'Seller added successfully';
                $resp['data'] = ['vendor_id' => $vendor_data['uid']];
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;
    }

    private function seller($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to update access.",
            "data" => []
        ];

        // $this->prd($data['user_id']);

        try {

            $sql = "SELECT
                        vendor.uid AS vendor_id,
                        vendor.user_img,
                        vendor.signature_img,
                        vendor.pan_img,
                        vendor.aadhar_img,
                        users.uid AS user_id,
                        users.user_name,
                        users.number,
                        users.email
                    FROM
                        vendor
                    JOIN users ON vendor.user_id = users.uid
                    WHERE
                    users.uid = '{$data['user_id']}'";

            $CommonModel = new CommonModel();
            $vendors = $CommonModel->customQuery($sql);

            $vendors = json_decode(json_encode($vendors), true);
            if (!empty($vendors)) {
                $resp['status'] = true;
                $resp['message'] = "All vendors data retrieved";
                $resp['data'] = $vendors[0];
            } else {
                // If no access data found at all
                $resp['message'] = "No vendors data found";
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;

    }

    private function update_seller($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to update.",
            "data" => []
        ];

        try {
            if (empty($data['user_name'])) {
                $resp['message'] = 'Please add user name';
            } else if (empty($data['number'])) {
                $resp['message'] = 'Please add number';
            } else if (empty($data['email'])) {
                $resp['message'] = 'Please add email';
            } else {

                $updateUserData = [
                    "user_name" => $data['user_name'],
                    "email" => $data['email'],
                    "number" => $data['number'],
                ];

                $updateVendorDoc = [];
                $uploadedFiles = $this->request->getFiles();
                if(isset($uploadedFiles['user_img'])){
                    foreach ($uploadedFiles['user_img'] as $file) {
                        $file_src = $this->single_upload($file, PATH_USER_IMG);
                        $updateVendorDoc['user_img'] = $file_src;
                    }
                }
                if(isset($uploadedFiles['signature'])){
                    foreach ($uploadedFiles['signature'] as $file) {
                        $file_src = $this->single_upload($file, PATH_USER_DOC);
                        $updateVendorDoc['signature_img'] = $file_src;
                    }
                }
                if(isset($uploadedFiles['pan_img'])){
                    foreach ($uploadedFiles['pan_img'] as $file) {
                        $file_src = $this->single_upload($file, PATH_USER_DOC);
                        $updateVendorDoc['pan_img'] = $file_src;
                    }
                }
                if(isset($uploadedFiles['aadhar_img'])){
                    foreach ($uploadedFiles['aadhar_img'] as $file) {
                        $file_src = $this->single_upload($file, PATH_USER_DOC);
                        $updateVendorDoc['aadhar_img'] = $file_src;
                    }
                }
                $UsersModel = new UsersModel();
                $VendorModel = new VendorModel();

                // Update user details
                $isUserUpdated = $UsersModel->where(['uid' => $data['user_id']])->set($updateUserData)->update();
                if($isUserUpdated){
                    $isVendorUpdated = $VendorModel->where(['user_id' => $data['user_id']])->set($updateVendorDoc)->update();
                    if($isVendorUpdated){
                        $resp['status'] = true;
                        $resp['message'] = 'Seller update successfully';
                        $resp['data'] = "";
                    }
                }
                // Insert user data
                // $UsersModel->insert($user_data);
                
                
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;
    }

    private function seller_delete($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to Delete Seller.",
            "data" => []
        ];

        // $this->prd($data['user_id']);

        try {

            $UsersModel = new UsersModel();
            $VendorModel = new VendorModel();
            $deleteUser = $UsersModel->where('uid', $data['user_id'])->delete();
            if($deleteUser){
                $deleteVendor = $VendorModel->where('user_id', $data['user_id'])->delete();
            }
            if ($deleteVendor) {
                $resp['status'] = true;
                $resp['message'] = "Seller Deleteted Successful";
                $resp['data'] = "";
            } else {
                // If no access data found at all
                $resp['message'] = "No Seller found";
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;

    }

    private function search_staff($data)
    {

        $response = [
            "status" => false,
            "message" => "Staff Not Found",
            "data" => []
        ];

        try {
            $CommonModel = new CommonModel();
            $sql = "SELECT 
                    staff.uid AS staff_id,
                    staff.role AS staff_role,
                    users.user_name AS staff_name,
                    users.uid AS user_id,
                    users.email AS staff_email,
                    users.number AS staff_number,
                    user_img.img AS user_image
                FROM
                    staff
                JOIN 
                    users ON staff.user_id = users.uid
                JOIN 
                    user_img ON user_img.user_id = users.uid";

                if (!empty($data['alph'])) {
                    $alph = $data['alph'];
                    $sql .= " AND
                        users.user_name LIKE '%{$alph}%';";
                }
            $staff = $CommonModel->customQuery($sql);
            $staff = json_decode(json_encode($staff), true);


            $response = [
                "status" => !empty($staff),
                "message" => !empty($staff) ? "Staff Found" : "Staff Not Found",
                "data" => $staff
            ];


        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $response['message'] = $e->getMessage();
        }



        return $response;
    }
    

    // private function new_student_registration($data)
    // {
    //     $resp = [
    //         "status" => false,
    //         "message" => "Failed to Registration.",
    //         "data" => []
    //     ];

    //     try {
    //         $uploadedFiles = $this->request->getFiles();
    //         if (empty($data['user_name'])) {
    //             $resp['message'] = 'Please enter name';
    //         } else if (empty($data['fathers_name'])) {
    //             $resp['message'] = 'Please enter fathers name';
    //         } else if (empty($data['phone'])) {
    //             $resp['message'] = 'Please enter phone';
    //         } else if (empty($data['whatsapp'])) {
    //             $resp['message'] = 'Please enter whatsapp no.';
    //         } else if (empty($data['email'])) {
    //             $resp['message'] = 'Please enter email';
    //         } else if (empty($data['dob'])) {
    //             $resp['message'] = 'Please enter date of birth';
    //         } else if (empty($data['aadhar'])) {
    //             $resp['message'] = 'Please enter aadhar number';
    //         } else if (empty($data['password'])) {
    //             $resp['message'] = 'Please enter password';
    //         } else if (empty($data['state'])) {
    //             $resp['message'] = 'Please enter state';
    //         } else if (empty($data['district'])) {
    //             $resp['message'] = 'Please enter district';
    //         } else if (empty($data['city'])) {
    //             $resp['message'] = 'Please enter city';
    //         } else if (empty($data['block'])) {
    //             $resp['message'] = 'Please enter block';
    //         } else if (empty($data['post_office'])) {
    //             $resp['message'] = 'Please enter post office';
    //         } else if (empty($data['police_station'])) {
    //             $resp['message'] = 'Please enter police station';
    //         } else if (empty($data['pin_code'])) {
    //             $resp['message'] = 'Please enter pin code';
    //         } else if (empty($data['contact_no'])) {
    //             $resp['message'] = 'Please enter contact no.';
    //         } else if (empty($data['last_qualific'])) {
    //             $resp['message'] = 'Please enter last qualification';
    //         } else if (empty($data['passing_year'])) {
    //             $resp['message'] = 'Please enter passing year';
    //         } else if (empty($data['parcentage'])) {
    //             $resp['message'] = 'Please parcentage of marks';
    //         } else if (empty($data['marks'])) {
    //             $resp['message'] = 'Please marks';
    //         } else if (empty($data['exam_board'])) {
    //             $resp['message'] = 'Please examination board';
    //         } else if (empty($uploadedFiles['student_photo'])) {
    //             $resp['message'] = 'Please add a your photo';
    //         }else if (empty($uploadedFiles['aadhar_img'])) {
    //             $resp['message'] = 'Please add aadhar card image';
    //         }else if (empty($uploadedFiles['marksheet_img'])) {
    //             $resp['message'] = 'Please add marksheet image';
    //         }else {

    //             $user_data = [
    //                 "uid" => $this->generate_uid(UID_USER),
    //                 "user_name" => $data['user_name'],
    //                 "email" => $data['email'],
    //                 "number" => $data['phone'],
    //                 "password" => md5($data['password']),
    //                 "type" => 'student',
    //                 "status" => 'pending',
    //                 "came_frome" => 'online'
    //             ];
    //             $student_data = [
    //                 "uid"                   => $this->generate_uid(UID_STUSENT),
    //                 "user_id"               => $user_data['uid'],
    //                 "fathers_name"          => $data['fathers_name'],
    //                 "whatsapp_no"           => $data['whatsapp'],
    //                 "dob"                   => $data['dob'],
    //                 "aadhar"                => $data['aadhar'],
    //                 "last_qualification"    => $data['last_qualific'],
    //                 "passing_year"          => $data['passing_year'],
    //                 "marks_in_parcentage"   => $data['parcentage'],
    //                 "marks"                 => $data['marks'],
    //                 "exam_board"            => $data['exam_board']
    //             ];

    //             $address_data = [
    //                 "uid"               => $this->generate_uid(UID_ADDRESS),
    //                 "user_id"           => $user_data['uid'],
    //                 "state"             => $data['state'],
    //                 "district"          => $data['district'],
    //                 "vill_city"         => $data['city'],
    //                 "block"             => $data['block'],
    //                 "post_office"       => $data['post_office'],
    //                 "police_station"    => $data['police_station'],
    //                 "pin"               => $data['pin_code'],
    //                 "contact"           => $data['contact_no'],
    //             ];

    //             $user_image_data = [
    //                 "uid"               => $this->generate_uid(UID_USER_IMG),
    //                 "user_id"           => $user_data['uid'],
    //             ];
                

    //             $file_src = $this->single_upload($uploadedFiles['student_photo'], PATH_USER_IMG);
    //             $user_image_data['img'] = $file_src;

    //             $file_src = $this->single_upload($uploadedFiles['aadhar_img'], PATH_USER_DOC);
    //             $student_data['aadhar_img'] = $file_src;
            
    //             $file_src = $this->single_upload($uploadedFiles['marksheet_img'], PATH_USER_DOC);
    //             $student_data['marksheet_img'] = $file_src;

    //             $UsersModel = new UsersModel();
    //             $UserImageModel = new UserImageModel();
    //             $StudentModel = new StudentModel();
    //             $AddressModel = new AddressModel();

    //             // Insert user data
    //            $insert_user_data = $UsersModel->insert($user_data);
    //            if($insert_user_data){
    //                 $insert_user_img_data = $UserImageModel->insert($user_image_data);
    //                 if($insert_user_img_data){
    //                         $insert_student_data = $StudentModel->insert($student_data);
    //                         if($insert_student_data){
    //                             $insert_address_data = $AddressModel->insert($address_data);
    //                             if($insert_address_data){
    //                                 $resp['status'] = true;
    //                                 $resp['message'] = 'Thanks For Registration. Please Wait For Admin Approval';
    //                                 $resp['data'] = ['user_id' => $user_data['uid']];
    //                             }
    //                         }
    //                 }
    //            }
               
                

                
    //         }

    //     } catch (\Exception $e) {
    //         // Catch any exceptions and set error message
    //         $resp['message'] = $e->getMessage();
    //     }

    //     return $resp;
    // }

    private function new_student_registration($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to Registration.",
            "data" => []
        ];

        try {
            $uploadedFiles = $this->request->getFiles();
            if (empty($data['user_name'])) {
                $resp['message'] = 'Please enter name';
            } else if (empty($data['phone'])) {
                $resp['message'] = 'Please enter phone';
            } else if (empty($data['email'])) {
                $resp['message'] = 'Please enter email';
            } else if (empty($data['dob'])) {
                $resp['message'] = 'Please enter date of birth';
            } else if (empty($data['roll'])) {
                $resp['message'] = 'Please enter roll';
            } else if (empty($data['className'])) {
                $resp['message'] = 'Please select class';
            } else if (empty($data['branchName'])) {
                $resp['message'] = 'Please select branch';
            } else if (empty($data['password'])) {
                $resp['message'] = 'Please enter password';
            } else if (empty($uploadedFiles['user_image'])) {
                $resp['message'] = 'Please add a your photo';
            } else {

                $user_data = [
                    "uid" => $this->generate_uid(UID_USER),
                    "user_name" => $data['user_name'],
                    "email" => $data['email'],
                    "number" => $data['phone'],
                    "password" => md5($data['password']),
                    "type" => 'student',
                    "status" => 'active'
                ];
                $student_data = [
                    "uid"                   => $this->generate_uid(UID_STUSENT),
                    "user_id"               => $user_data['uid'],
                    "dob"                   => $data['dob'],
                    "password"              => $data['password'],
                    "login_code"            => ''
                    
                ];

                $class_roll = [
                    "uid"                   => $this->generate_uid('ROL'),
                    "user_id"               => $user_data['uid'],
                    "class_id"              => $data['className'],
                    "branch_id"             => $data['branchName'],
                    "roll"                  => $data['roll'],
                    "status"                => 'active',
                    
                ];

                $user_image_data = [
                    "uid"               => $this->generate_uid(UID_USER_IMG),
                    "user_id"           => $user_data['uid'],
                ];
                

                $file_src = $this->single_upload($uploadedFiles['user_image'], PATH_USER_IMG);
                $user_image_data['img'] = $file_src;

                $UsersModel = new UsersModel();
                $UserImageModel = new UserImageModel();
                $StudentModel = new StudentModel();
                $StudentClassRollModel = new StudentClassRollModel();

                // Insert user data
               $insert_user_data = $UsersModel->insert($user_data);
               if($insert_user_data){
                    $insert_user_img_data = $UserImageModel->insert($user_image_data);
                    if($insert_user_img_data){
                            $insert_student_data = $StudentModel->insert($student_data);
                            if($insert_student_data){
                                $insert_class_roll_data = $StudentClassRollModel->insert($class_roll);
                                if($insert_class_roll_data){
                                    $resp['status'] = true;
                                    $resp['message'] = 'Student Added Succesfully';
                                    $resp['data'] = ['user_id' => $user_data['uid']];
                                }
                            }
                    }
               }
               
                

                
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;
    }

    public function students($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Students not Found',
            'data' => null
        ];

        $CommonModel = new CommonModel();

        $sql = "SELECT
            users.uid AS user_id,
            users.user_name AS user_name,
            users.email,
            users.number,
            users.status,
            users.created_at,
            user_img.uid AS user_img_id,
            user_img.img AS user_img,
            student.uid AS student_id,
            student.dob,
            student.password,
            student.login_code
        FROM
            users
        JOIN
            user_img ON users.uid = user_img.user_id
        JOIN
            student ON users.uid = student.user_id";

        if (!empty($data['user_id'])) {
            $user_id = $data['user_id'];
            $sql .= " WHERE
                users.uid = '{$user_id}';";

        } else {
            $sql .= ";";
        }


        $students = $CommonModel->customQuery($sql);
        $students = json_decode(json_encode($students), true);

        if (count($students) > 0) {
            foreach($students as $index => $student){

                $sql_roll = "SELECT
                        student_class_roll.roll AS student_roll,
                        student_class_roll.uid AS student_class_roll_id,
                        student_class_roll.created_at,
                        classes.uid AS class_id,
                        classes.class_name,
                        branches.uid AS branch_id,
                        branches.branch_name
                        
                    FROM
                        student_class_roll
                    JOIN
                        classes ON student_class_roll.class_id = classes.uid
                    JOIN
                        branches ON student_class_roll.branch_id = branches.uid
                    WHERE
                        student_class_roll.user_id = '{$student['user_id']}'";
    
                    $students[$index]['student_roll'] = $CommonModel->customQuery($sql_roll);
            }

            $resp["status"] = true;
            $resp["data"] = !empty($data['user_id']) ? $students[0] : $students;
            $resp["message"] = 'Students Found';
        }
        return $resp;
    }

    private function update_student($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to Update Student.",
            "data" => []
        ];

        try {
            $uploadedFiles = $this->request->getFiles();
            if (empty($data['user_name'])) {
                $resp['message'] = 'Please enter name';
            } else if (empty($data['phone'])) {
                $resp['message'] = 'Please enter phone';
            } else if (empty($data['email'])) {
                $resp['message'] = 'Please enter email';
            } else if (empty($data['dob'])) {
                $resp['message'] = 'Please enter date of birth';
            } else if (empty($data['roll'])) {
                $resp['message'] = 'Please enter roll';
            } else if (empty($data['className'])) {
                $resp['message'] = 'Please select class';
            } else if (empty($data['branchName'])) {
                $resp['message'] = 'Please select branch';
            } else if (empty($data['password'])) {
                $resp['message'] = 'Please enter password';
            } else if (empty($data['user_id'])) {
                $resp['message'] = 'User not found';
            } else {

                $user_data = [
                    "user_name" => $data['user_name'],
                    "email" => $data['email'],
                    "number" => $data['phone'],
                    "password" => md5($data['password']),
                ];
                $student_data = [
                    "dob"                   => $data['dob'],
                    "password"              => $data['password'],
                    
                ];

                $class_roll = [
                    "class_id"              => $data['className'],
                    "branch_id"             => $data['branchName'],
                    "roll"                  => $data['roll'],
                ];
                
                $UsersModel = new UsersModel();
                $UserImageModel = new UserImageModel();
                $StudentModel = new StudentModel();
                $StudentClassRollModel = new StudentClassRollModel();

                $uploadedFiles = $this->request->getFiles();
                if (!empty($uploadedFiles['user_image'])){
                    $file_src = $this->single_upload($uploadedFiles['user_image'], PATH_USER_IMG);
                    $user_image_data['img'] = $file_src;
                    $UserImageModel->set($user_image_data)
                        ->where('user_id', $data['user_id'])
                        ->update();
                }
                // $this->prd($uploadedFiles['user_image']);
                $UsersModel->set($user_data)
                    ->where('uid', $data['user_id'])
                    ->update();
                $StudentModel->set($student_data)
                    ->where('user_id', $data['user_id'])
                    ->update();
                $StudentClassRollModel->set($class_roll)
                    ->where('user_id', $data['user_id'])
                    ->update();
                $resp['status'] = true;
                $resp['message'] = 'Student Update Succesfully';
                $resp['data'] = ['user_id' => $data['user_id']];
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;
    }

    private function update_user_status($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to update.",
            "data" => []
        ];

        try {
            if (empty($data['user_status'])) {
                $resp['message'] = 'User status not found';
            } else if (empty($data['user_id'])) {
                $resp['message'] = 'User not found';
            } else {

                $updateUserData = [
                    "status" => $data['user_status'],
                ];

                $UsersModel = new UsersModel();
                $StudentClassRollModel = new StudentClassRollModel();

                $StudentData = $StudentClassRollModel
                    ->where(['user_id' => $data['user_id']])
                    ->find();
                if(!empty($StudentData)){
                    $isUserUpdated = $UsersModel->where(['uid' => $data['user_id']])->set($updateUserData)->update();
                    if($isUserUpdated){
                            $resp['status'] = true;
                            $resp['message'] = 'Status update successfully';
                            $resp['data'] = "";
                    }
                }else{
                    $resp['message'] = 'Please create roll and put the user in a class';
                }
                
                // Insert user data
                // $UsersModel->insert($user_data);
                
                
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;
    }

    private function is_tescher_feedback_submitted($data)
    {
        $resp = [
            "status" => true,
            "message" => "No feedback found for this teacher",
            "data" => []
        ];
        $user_id = $data['user_id'];
        $teacher_id = $data['teacher_id'];
        // $this->prd($data['user_id']);

        try {

            $sql = "SELECT
                        message.uid AS message_id,
                        message.student_id,
                        message.teacher_id
                    FROM
                        message
                    WHERE
                        message.student_id = '{$user_id}'
                    AND
                        message.teacher_id = '{$teacher_id}'";

            $CommonModel = new CommonModel();
            $message = $CommonModel->customQuery($sql);

            $message = json_decode(json_encode($message), true);
            if (!empty($message)) {
                $resp['status'] = false;
                $resp['message'] = "Already Submitted for this teacher!";
                $resp['data'] = $message[0];
            } else {
                // If no access data found at all
                $resp['message'] = "No feedback found for this teacher";
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;

    }

    private function message_all()
    {
        $resp = [
            'status' => false,
            'message' => 'No messages found',
            'data' => []
        ];
        try {
            // $MessageModel = new MessageModel();
            // $messages = $MessageModel->findAll();
            $CommonModel = new CommonModel();
            $sql = "SELECT
            message.uid AS message_id,
            message.message,
            message.created_at,
            users.uid AS student_id,
            users.user_name AS student_name,
            teacher.uid AS teacher_id,
            teacher.user_name AS teacher_name
        FROM
            message
        JOIN
            users ON message.student_id = users.uid
        JOIN
            users AS teacher ON message.teacher_id = teacher.uid";

            $messages = $CommonModel->customQuery($sql);
            if (count($messages) > 0) {
                $resp = [
                    'status' => true,
                    'message' => 'Messages found',
                    'data' => $messages
                ];
            }
        } catch (\Exception $e) {
            $resp['message'] = $e;
        }
        return $resp;
    }

    private function add_doubt($data)
    {

        $resp = [
            'status' => false,
            'message' => 'Faild!',
            'data' => null
        ];
        // $this->prd($data['teachers_id']);
        if (empty($data['doubt'])) {
            $resp['doubt'] = 'Please Enter Message';
        } else {
            $insert_doubt = [
                'uid' => $this->generate_uid(UID_DOUBT),
                'student_id' => $data['student_id'],
                'teacher_id' => $data['teachers_id'],
                'doubt' => $data['doubt'],
            ];
            $StudentDoubtModel = new StudentDoubtModel();
            $StudentDoubtModel->transStart();
            try {
                $messageData = $StudentDoubtModel->insert($insert_doubt);
                $StudentDoubtModel->transCommit();
            } catch (\Exception $e) {
                $StudentDoubtModel->transRollback();
                throw $e;
            }

            if ($messageData) {
                $resp['status'] = true;
                $resp['message'] = 'Doubt Submitted Successfully';
                $resp['data'] = "";
            }

        }
        return $resp;
    }

    private function doubts_all()
    {
        $resp = [
            'status' => false,
            'message' => 'No doubt found',
            'data' => []
        ];
        try {
            // $MessageModel = new MessageModel();
            // $messages = $MessageModel->findAll();
            $CommonModel = new CommonModel();
            $sql = "SELECT
            student_doubt.uid AS doubt_id,
            student_doubt.doubt,
            student_doubt.created_at,
            users.uid AS student_id,
            users.user_name AS student_name,
            teacher.uid AS teacher_id,
            teacher.user_name AS teacher_name
        FROM
            student_doubt
        JOIN
            users ON student_doubt.student_id = users.uid
        JOIN
            users AS teacher ON student_doubt.teacher_id = teacher.uid";

            $doubts = $CommonModel->customQuery($sql);
            if (count($doubts) > 0) {
                $resp = [
                    'status' => true,
                    'message' => 'Messages found',
                    'data' => $doubts
                ];
            }
        } catch (\Exception $e) {
            $resp['message'] = $e;
        }
        return $resp;
    }











    public function POST_add_new_seller()
    {
        $data = $this->request->getPost();
        $resp = $this->add_new_seller($data);
        return $this->response->setJSON($resp);
    }

    public function GET_seller_list()
    {
        $data = $this->request->getGet();
        $resp = $this->seller_list($data);
        return $this->response->setJSON($resp);
    }

    public function GET_search_staff()
    {
        $data = $this->request->getGet();
        $resp = $this->search_staff($data);
        return $this->response->setJSON($resp);
    }

    public function GET_is_tescher_feedback_submitted()
    {
        $data = $this->request->getGet();
        $resp = $this->is_tescher_feedback_submitted($data);
        return $this->response->setJSON($resp);
    }

    public function GET_a_seller()
    {
        $data = $this->request->getGet();
        $resp = $this->seller($data);
        return $this->response->setJSON($resp);
    }

    public function POST_staff_update()
    {
        $data = $this->request->getPost();
        $resp = $this->staff_update($data);
        return $this->response->setJSON($resp);
    }

    public function GET_access_update()
    {
        $data = $this->request->getGet();
        $resp = $this->access_update($data);
        return $this->response->setJSON($resp);
    }


    public function GET_staff()
    {
        $data = $this->request->getGet();
        $resp = $this->staff($data);
        return $this->response->setJSON($resp);

    }

    public function GET_delete_staff()
    {
        $data = $this->request->getGet();
        $resp = $this->delete_staff($data);
        return $this->response->setJSON($resp);

    }

    public function POST_staff_add()
    {
        $data = $this->request->getPost();
        $resp = $this->staff_add($data);
        return $this->response->setJSON($resp);

    }
    public function GET_access_add()
    {

        $data = $this->request->getGet();
        $resp = $this->access_add($data);
        return $this->response->setJSON($resp);

    }

    public function GET_staff_access()
    {
        $data = $this->request->getGet();
        $resp = $this->staff_access($data);
        return $this->response->setJSON($resp);

    }

    public function POST_update_user()
    {
        $data = $this->request->getPost();
        $resp = $this->update_user($data);
        return $this->response->setJSON($resp);

    }

    public function POST_update_seller()
    {
        $data = $this->request->getPost();
        $resp = $this->update_seller($data);
        return $this->response->setJSON($resp);

    }

    public function POST_change_password()
    {
        $data = $this->request->getPost();
        $resp = $this->change_password($data);
        return $this->response->setJSON($resp);

    }

    public function POST_message()
    {
        $data = $this->request->getPost();
        $resp = $this->message($data);
        return $this->response->setJSON($resp);

    }

    public function POST_add_doubt()
    {
        $data = $this->request->getPost();
        $resp = $this->add_doubt($data);
        return $this->response->setJSON($resp);

    }

    public function GET_get_user()
    {

        $resp = $this->get_user();
        return $this->response->setJSON($resp);

    }

    public function GET_customer()
    {
        $data = $this->request->getGet();
        $resp = $this->customer($data);
        return $this->response->setJSON($resp);

    }

    public function GET_delete_customer()
    {
        $data = $this->request->getGet();
        $resp = $this->delete_customer($data);
        return $this->response->setJSON($resp);

    }

    public function GET_total_customer()
    {
        $resp = $this->total_customer();
        return $this->response->setJSON($resp);
    }

    public function GET_seller_delete()
    {
        $data = $this->request->getGet();
        $resp = $this->seller_delete($data);
        return $this->response->setJSON($resp);

    }

    public function POST_new_student_registration()
    {
        $data = $this->request->getPost();
        $resp = $this->new_student_registration($data);
        return $this->response->setJSON($resp);
    }

    public function POST_update_student()
    {
        $data = $this->request->getPost();
        $resp = $this->update_student($data);
        return $this->response->setJSON($resp);
    }

    public function GET_students()
    {

        $data = $this->request->getGet();
        $resp = $this->students($data);
        return $this->response->setJSON($resp);

    }

    public function POST_update_user_status()
    {
        $data = $this->request->getPost();
        $resp = $this->update_user_status($data);
        return $this->response->setJSON($resp);
    }

    public function GET_message_all()
    {
        $data = $this->request->getGet();
        $resp = $this->message_all($data);
        return $this->response->setJSON($resp);

    }

    public function GET_doubts_all()
    {
        $data = $this->request->getGet();
        $resp = $this->doubts_all($data);
        return $this->response->setJSON($resp);

    }

    public function GET_get_admin()
    {
        $data = $this->request->getGet();
        $resp = $this->get_admin($data);
        return $this->response->setJSON($resp);

    }

    public function POST_update_admin()
    {
        $data = $this->request->getPost();
        $resp = $this->update_admin($data);
        return $this->response->setJSON($resp);

    }

    public function POST_change_admin_password()
    {
        $data = $this->request->getPost();
        $resp = $this->change_admin_password($data);
        return $this->response->setJSON($resp);

    }
}
