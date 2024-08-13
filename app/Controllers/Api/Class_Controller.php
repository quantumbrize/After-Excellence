<?php

namespace App\Controllers\Api;

use App\Models\UsersModel;
use App\Models\ProductModel;
use App\Models\ProductItemModel;
use App\Models\ProductConfigModel;
use App\Models\ProductMetaDetalisModel;
use App\Models\CommonModel;
use App\Models\VendorModel;
use App\Models\ProductImagesModel;
use App\Models\VariationModel;
use App\Models\VariationOptionModel;
use App\Models\VariantImagesModel;
use App\Models\DiscountsModel;
use App\Models\OrdersModel;
use App\Models\OrderItemsModel;
use App\Models\CourseLecturerModel;
use App\Models\BranchModel;
use App\Models\ClassModel;
use App\Models\LiveClassModel;
use App\Models\TestsModel;
use App\Models\AnswersModel;
use App\Models\QuestionsModel;
use App\Models\StudentClassRollModel;
use App\Models\TestSubmissionModel;
use App\Models\TestsSubmissionAnonymousModel;
use App\Models\AdmitFormModel;
use App\Models\ImportanNotesModel;
use App\Models\SubmitAdmitDataModel;
use App\Models\UnsignedUserResultModel;
use App\Models\StudyMaterialModel;
use App\Models\PopularPaperModel;

class Class_Controller extends Api_Controller
{
    private function class_list($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to update access.",
            "data" => []
        ];

        try {

            $sql = "SELECT
                        classes.uid AS class_id,
                        classes.class_name
                    FROM
                        classes";

            if (!empty($data['class_id'])) {
                $class_id = $data['class_id'];
                $sql .= " WHERE
                        classes.uid = '{$class_id}'";
            }

            $CommonModel = new CommonModel();

            $classes = $CommonModel->customQuery($sql);
            $classes = json_decode(json_encode($classes), true);
            if (!empty($classes)) {
                $resp['status'] = true;
                $resp['message'] = "All class data retrieved";
                $resp['data'] = $classes;
            } else {
                // If no access data found at all
                $resp['message'] = "No class data found";
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;

    }

    private function branches($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to get brenches.",
            "data" => []
        ];

        try {

            $sql = "SELECT
                        branches.uid AS branch_id,
                        branches.class_id AS class_id,
                        branches.branch_name
                    FROM
                        branches";

            if (!empty($data['class_id'])) {
                $class_id = $data['class_id'];
                $sql .= " WHERE
                        branches.class_id = '{$class_id}'";
            }

            $CommonModel = new CommonModel();

            $Branches = $CommonModel->customQuery($sql);
            $Branches = json_decode(json_encode($Branches), true);
            if (!empty($Branches)) {
                $resp['status'] = true;
                $resp['message'] = "Branch data retrieved";
                $resp['data'] = $Branches;
            } else {
                // If no access data found at all
                $resp['message'] = "No branch data found";
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;

    }

    private function add_live_class_link($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to add link.",
            "data" => []
        ];

        try {
            if (empty($data['class_id'])) {
                $resp['message'] = 'Please add a class';
            } else if (empty($data['branch_id'])) {
                $resp['message'] = 'Please add a branch';
            } else if (empty($data['class_link'])) {
                $resp['message'] = 'Please add a link';
            } else if (empty($data['description'])) {
                $resp['message'] = 'Please add description';
            } else {

                $live_class_data = [
                    "uid" => $this->generate_uid(UID_LIVE_CLASS),
                    "class_id" => $data['class_id'],
                    "branch_id" => $data['branch_id'],
                    "link" => $data['class_link'],
                    "description" => $data['description'],
                ];
                $LiveClassModel = new LiveClassModel();

                // Insert live class data
                $insert_data = $LiveClassModel->insert($live_class_data);

                if ($insert_data) {
                    $resp['status'] = true;
                    $resp['message'] = 'Live class data added successfully';
                    $resp['data'] = ['vendor_id' => $live_class_data['uid']];
                } else {
                    $resp['status'] = false;
                    $resp['message'] = 'Faild to insert live class data';
                    $resp['data'] = [];
                }
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;
    }

    public function live_classes($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Product not Found',
            'data' => null
        ];

        $CommonModel = new CommonModel();

        $sql = "SELECT
            live_class.uid AS live_class_id,
            live_class.link AS class_link,
            live_class.description,
            live_class.created_at,
            classes.class_name,
            classes.uid AS class_id,
            branches.branch_name,
            branches.uid AS branch_id
        FROM
            live_class
        JOIN
            classes ON classes.uid = live_class.class_id
        JOIN
            branches ON branches.uid = live_class.branch_id";

        if (!empty($data['live_class_id'])) {
            $live_class_id = $data['live_class_id'];
            $sql .= " WHERE
                live_class.uid = '{$live_class_id}';";
        }


        //$this->prd()

        $liveClasses = $CommonModel->customQuery($sql);

        if (count($liveClasses) > 0) {

            $resp["status"] = true;
            $resp["data"] = !empty($data['live_class_id']) ? $liveClasses[0] : $liveClasses;
            $resp["message"] = 'Live Classes Found';
        }
        // $this->prd($resp);
        return $resp;
    }

    private function delete_live_class_link($data)
    {
        $response = [
            'status' => false,
            'message' => 'Live class link deletion failed'
        ];

        try {
            // Extract product ID from data
            $live_class_id = $data['live_class_id'];

            // Instantiate ProductModel
            $LiveClassModel = new LiveClassModel();
            // Delete product using the product ID
            $deleted = $LiveClassModel->where('uid', $live_class_id)->delete();
            // Check if deletion was successful
            if ($deleted) {
                $response['status'] = true;
                $response['message'] = 'Live class link successfully deleted';
            }
        } catch (\Exception $e) {
            // Handle any errors
            $response['message'] = $e->getMessage();
        }

        return $response;
    }

    private function update_live_class_link($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Live class not Updated',
        ];
        if (empty($data['class_id'])) {
            $resp['message'] = 'Please add a class';
        } else if (empty($data['branch_id'])) {
            $resp['message'] = 'Please add a branch';
        } else if (empty($data['class_link'])) {
            $resp['message'] = 'Please add a link';
        } else if (empty($data['live_class_id'])) {
            $resp['message'] = 'Live class not found';
        } else if (empty($data['description'])) {
            $resp['message'] = 'Please add description';
        } else {
            $live_class_data = [
                "class_id" => $data['class_id'],
                "branch_id" => $data['branch_id'],
                "link" => $data['class_link'],
                "description" => $data['description'],
            ];


            $LiveClassModel = new LiveClassModel();



            // Transaction Start
            $LiveClassModel->transStart();

            try {
                $LiveClassModel->set($live_class_data)
                    ->where('uid', $data['live_class_id'])
                    ->update();

                // Commit the transaction if all queries are successful
                $LiveClassModel->transCommit();
                $resp = [
                    'status' => true,
                    'message' => 'Live class Updated',
                ];

            } catch (\Exception $e) {
                // Rollback the transaction if an error occurs
                $LiveClassModel->transRollback();
                $resp['message'] = $e->getMessage();
            }

        }

        return $resp;

    }

    private function add_class_and_branches($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to add link.",
            "data" => []
        ];

        try {
            if (empty($data['className'])) {
                $resp['message'] = 'Please add a class name';
                return $resp;
            }
            $string = $data['branches'];
            $string = strip_tags($string);
            $items = explode(',', $string);
            $itemCount = count($items);
            // $this->prd($itemCount);
            for ($i = 1; $i < $itemCount; $i++) {
                if ($items[$i] == "") {
                    $resp['message'] = "Don't submit empty field ";
                    return $resp;
                }
            }

            $insert_class_data = [
                "uid" => $this->generate_uid(UID_CLASS),
                "class_name" => $data['className'],
            ];

            $insert_branch_data = [];
            for ($i = 1; $i < $itemCount; $i++) {
                $insert_branch_data[] = array(
                    "uid" => $this->generate_uid(UID_BRANCH),
                    "class_id" => $insert_class_data['uid'],
                    "branch_name" => $items[$i],
                );
            }
            $ClassModel = new ClassModel();
            $BranchModel = new BranchModel();
            $added_class_data = $ClassModel->insert($insert_class_data);
            if ($added_class_data) {
                $added_branch_data = $BranchModel->insertBatch($insert_branch_data);
                if ($added_branch_data) {
                    $resp['status'] = true;
                    $resp['message'] = 'Class and Branches data added successfully';
                    $resp['data'] = ['class_id' => $insert_class_data['uid']];
                } else {
                    $resp['status'] = false;
                    $resp['message'] = 'Faild to insert Class and Branches data';
                    $resp['data'] = [];
                }
            }
        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;
    }

    private function classes_and_branch($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to update access.",
            "data" => []
        ];

        try {

            $sql = "SELECT
                        classes.uid AS class_id,
                        classes.class_name,
                        classes.created_at
                    FROM
                        classes";

            if (!empty($data['class_id'])) {
                $class_id = $data['class_id'];
                $sql .= " WHERE
                        classes.uid = '{$class_id}'";
            }

            $CommonModel = new CommonModel();

            $classes = $CommonModel->customQuery($sql);
            $classes = json_decode(json_encode($classes), true);
            if (count($classes) > 0) {
                $BranchModel = new BranchModel();
                foreach ($classes as $key => $class) {
                    $classes[$key]['branches'] = $BranchModel->where('class_id', $class['class_id'])->findAll();
                }

                if (!empty($classes)) {
                    $resp['status'] = true;
                    $resp['message'] = "All class data retrieved";
                    $resp['data'] = !empty($data['class_id']) ? $classes[0] : $classes;
                } else {
                    // If no access data found at all
                    $resp['message'] = "No class data found";
                }
            }


        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;

    }

    private function delete_class_and_branches($data)
    {
        $response = [
            'status' => false,
            'message' => 'Live class link deletion failed'
        ];

        try {
            // Extract product ID from data
            $class_id = $data['class_id'];

            // Instantiate ProductModel
            $ClassModel = new ClassModel();
            $BranchModel = new BranchModel();
            $LiveClassModel = new LiveClassModel();
            // Delete product using the product ID
            $deleted_class = $ClassModel->where('uid', $class_id)->delete();
            if ($deleted_class) {
                $deleted_branch = $BranchModel->where('class_id', $class_id)->delete();
                if ($deleted_branch) {
                    $deleted_live_class = $LiveClassModel->where('class_id', $class_id)->delete();
                    if ($deleted_live_class) {
                        $response['status'] = true;
                        $response['message'] = 'Class and branches successfully deleted';
                    }
                }
            }
            // Check if deletion was successful

        } catch (\Exception $e) {
            // Handle any errors
            $response['message'] = $e->getMessage();
        }

        return $response;
    }

    private function delete_branch($data)
    {
        $response = [
            'status' => false,
            'message' => 'Branch deletion failed'
        ];

        try {
            // Extract product ID from data
            $branch_id = $data['branch_id'];

            // Instantiate ProductModel
            $BranchModel = new BranchModel();
            $LiveClassModel = new LiveClassModel();
            $deleted_branch = $BranchModel->where('uid', $branch_id)->delete();
            if ($deleted_branch) {
                $deleted_live_class = $LiveClassModel->where('branch_id', $branch_id)->delete();
                if ($deleted_live_class) {
                    $response['status'] = true;
                    $response['message'] = 'Branch successfully deleted';
                }
            }
            // Check if deletion was successful

        } catch (\Exception $e) {
            // Handle any errors
            $response['message'] = $e->getMessage();
        }

        return $response;
    }

    private function update_class_and_branches($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to update class.",
            "data" => []
        ];

        try {
            if (empty($data['className'])) {
                $resp['message'] = 'Please add a class name';
                return $resp;
            }
            if (empty($data['class_id'])) {
                $resp['message'] = 'Class not found';
                return $resp;
            }

            $string = $data['branches'];
            $string = strip_tags($string);
            $items = explode(',', $string);
            $itemCount = count($items);
            // $this->prd($itemCount);

            for ($i = 1; $i < $itemCount; $i++) {
                if ($itemCount > 2 && $items[$i] == "") {
                    $resp['message'] = "Don't submit empty field ";
                    return $resp;
                }
            }


            $insert_class_data = [
                "class_name" => $data['className'],
            ];


            $insert_branch_data = [];
            for ($i = 1; $i < $itemCount; $i++) {
                $insert_branch_data[] = array(
                    "uid" => $this->generate_uid(UID_BRANCH),
                    "class_id" => $data['class_id'],
                    "branch_name" => $items[$i],
                );
            }
            //    $this->prd($insert_branch_data);
            $ClassModel = new ClassModel();
            $BranchModel = new BranchModel();
            $update_class_data = $ClassModel->set($insert_class_data)
                ->where('uid', $data['class_id'])
                ->update();
            $added_branch_data = "";
            if ($update_class_data && $insert_branch_data[0]['branch_name'] != "") {
                $added_branch_data = $BranchModel->insertBatch($insert_branch_data);
            }
            if ($added_branch_data || $update_class_data) {
                $resp['status'] = true;
                $resp['message'] = 'Class and Branches data update successfully';
                $resp['data'] = ['class_id' => $data['class_id']];
            } else {
                $resp['status'] = false;
                $resp['message'] = 'Faild to update Class and Branches data';
                $resp['data'] = [];
            }
        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;
    }

    private function add_a_test($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to add test.",
        ];


        try {
            if (empty($data['class_id'])) {
                $resp['message'] = 'Please add a class';
            } else if (empty($data['branch_id'])) {
                $resp['message'] = 'Please add a branch';
            } else if (empty($data['testTime'])) {
                $resp['message'] = 'Please add time';
            } else {

                $questions = json_decode($data['questions']);
                $questions = json_decode(json_encode($questions), true);

                $TestsModel = new TestsModel();
                $QuestionsModel = new QuestionsModel();
                $AnswersModel = new AnswersModel();

                $test_add_data = [
                    'uid' => $this->generate_uid(UID_TESTS),
                    'user_id' => $data['user_id'],
                    'class_id' => $data['class_id'],
                    'branch_id' => $data['branch_id'],
                    'timer' => $data['testTime'],
                    'status' => 'active'
                ];

                //$this->prd($questions);
                if (!empty($questions)) {
                    foreach ($questions as $index => $item) {
                        $question_add_data = [
                            'uid' => $this->generate_uid(UID_QUESTIONS),
                            'test_id' => $test_add_data['uid'],
                            'question' => $item['qst'],
                            'question_type' => $item['qstType'],
                            'marks' => $item['marks']
                        ];
                        $uploadedFiles = $this->request->getFiles();
                        if(isset($uploadedFiles[$item['images']])){
                            foreach ($uploadedFiles[$item['images']] as $file) {
                                $file_src = $this->single_upload($file, PATH_QUESTION_IMG);
                                $question_add_data['img'] = $file_src;
                            }
                        }
                        if ($item['qstType'] == 'mcq') {
                            $right = '';
                            if ($item['qstAnsOpt']['right']['a'] == 1) {
                                $right = 'a';
                            } else if ($item['qstAnsOpt']['right']['b'] == 1) {
                                $right = 'b';
                            } else if ($item['qstAnsOpt']['right']['c'] == 1) {
                                $right = 'c';
                            } else if ($item['qstAnsOpt']['right']['d'] == 1) {
                                $right = 'd';
                            }

                            $answer_add_data = [
                                'uid' => $this->generate_uid(UID_ANSWERS),
                                'question_id' => $question_add_data['uid'],
                                'a' => $item['qstAnsOpt']['a'],
                                'b' => $item['qstAnsOpt']['b'],
                                'c' => $item['qstAnsOpt']['c'],
                                'd' => $item['qstAnsOpt']['d'],
                                'right_ans' => $right
                            ];
                        } else {
                            $answer_add_data = [
                                'uid' => $this->generate_uid(UID_ANSWERS),
                                'question_id' => $question_add_data['uid'],
                                'ans' => $item['qstAns']
                            ];
                        }
                        $QuestionsModel->insert($question_add_data);
                        $AnswersModel->insert($answer_add_data);
                    }
                }
                $isAdded = $TestsModel->insert($test_add_data);

                $resp = [
                    "status" => $isAdded > 0,
                    "message" => $isAdded > 0 ? 'test added' : "Failed to add test.",
                ];
            }
        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;
    }

    public function tests($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Tests not Found',
            'data' => null
        ];

        $CommonModel = new CommonModel();

        $sql = "SELECT
            tests.uid AS test_id,
            tests.created_at,
            tests.timer,
            classes.class_name,
            classes.uid AS class_id,
            branches.branch_name,
            branches.uid AS branch_id,
            users.user_name
        FROM
            tests
        JOIN
            classes ON classes.uid = tests.class_id
        JOIN
            branches ON branches.uid = tests.branch_id
        JOIN
            users ON users.uid = tests.user_id
        WHERE
            tests.status = 'active'";

        if (!empty($data['test_id'])) {
            $test_id = $data['test_id'];
            $sql .= " AND
                tests.uid = '{$test_id}';";
        }
        if (!empty($data['branch_id'])) {
            $branch_id = $data['branch_id'];
            $sql .= " AND
                tests.branch_id = '{$branch_id}';";
        }
        if (!empty($data['class_id'])) {
            $class_id = $data['class_id'];
            $sql .= " AND
                tests.class_id = '{$class_id}';";
        }
        if (!empty($data['user_id'])) {
            $user_id = $data['user_id'];
            $sql .= " AND
                tests.user_id = '{$user_id}';";
        }

        $tests = $CommonModel->customQuery($sql);
        $tests = json_decode(json_encode($tests), true);

        if (count($tests) > 0) {
            $QuestionsModel = new QuestionsModel();
            $AnswersModel = new AnswersModel();
            foreach ($tests as $key => $test) {
                $tests[$key]['questions'] = $QuestionsModel->where('test_id', $test['test_id'])->findAll();
                foreach ($tests[$key]['questions'] as $index => $question) {
                    $tests[$key]['questions'][$index]['answer'] = $AnswersModel->where('question_id', $question['uid'])->findAll();
                }
            }

            $resp["status"] = true;
            $resp["data"] = !empty($data['live_class_id']) ? $tests[0] : $tests;
            $resp["message"] = 'Tests Found';
        }
        // $this->prd($resp);
        return $resp;
    }

    private function update_test($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Test not Updated',
        ];

        if (empty($data['class_id'])) {
            $resp['message'] = 'Please add a class';
        } else if (empty($data['branch_id'])) {
            $resp['message'] = 'Please add a branch';
        } else if (empty($data['testTime'])) {
            $resp['message'] = 'Please add time';
        } else if (empty($data['test_url'])) {
            $resp['message'] = 'Please add a test url';
        } else if (empty($data['response_url'])) {
            $resp['message'] = 'Please add a response url';
        } else if (empty($data['test_id'])) {
            $resp['message'] = 'Test not found';
        } else {
            $test_data = [
                "class_id" => $data['class_id'],
                "branch_id" => $data['branch_id'],
                "test_url" => $data['test_url'],
                "response_url" => $data['response_url'],
                "timer" => $data['testTime'],
            ];


            $TestsModel = new TestsModel();



            // Transaction Start
            $TestsModel->transStart();

            try {
                $TestsModel->set($test_data)
                    ->where('uid', $data['test_id'])
                    ->update();

                // Commit the transaction if all queries are successful
                $TestsModel->transCommit();
                $resp = [
                    'status' => true,
                    'message' => 'Test Updated',
                ];

            } catch (\Exception $e) {
                // Rollback the transaction if an error occurs
                $TestsModel->transRollback();
                $resp['message'] = $e->getMessage();
            }

        }

        return $resp;

    }

    private function delete_test($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Test deleted faild',
        ];

        if (empty($data['test_id'])) {
            $resp['message'] = 'Test not found';
        } else {
            $test_data = [
                "status" => 'deleted',
            ];


            $TestsModel = new TestsModel();



            // Transaction Start
            $TestsModel->transStart();

            try {
                $TestsModel->set($test_data)
                    ->where('uid', $data['test_id'])
                    ->update();

                // Commit the transaction if all queries are successful
                $TestsModel->transCommit();
                $resp = [
                    'status' => true,
                    'message' => 'Test deleted successfully',
                ];

            } catch (\Exception $e) {
                // Rollback the transaction if an error occurs
                $TestsModel->transRollback();
                $resp['message'] = $e->getMessage();
            }

        }

        return $resp;

    }

    private function add_roll_and_class($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to add test.",
            "data" => []
        ];

        try {
            if (empty($data['class_id'])) {
                $resp['message'] = 'Please add a class';
            } else if (empty($data['branch_id'])) {
                $resp['message'] = 'Please add a branch';
            } else if (empty($data['roll'])) {
                $resp['message'] = 'Please generate roll no.';
            } else if (empty($data['user_id'])) {
                $resp['message'] = 'User not found';
            } else {

                $insert_data = [
                    "uid" => $this->generate_uid(UID_ROLL),
                    "user_id" => $data['user_id'],
                    "class_id" => $data['class_id'],
                    "branch_id" => $data['branch_id'],
                    "roll" => $data['roll'],
                    "status" => 'active',
                ];

                $update_data = [
                    "class_id" => $data['class_id'],
                    "branch_id" => $data['branch_id'],
                    "roll" => $data['roll'],
                ];
                $StudentClassRollModel = new StudentClassRollModel();

                $StudentData = $StudentClassRollModel
                    ->where(['user_id' => $data['user_id']])
                    ->find();
                if (!empty($StudentData)) {
                    $StudentClassRollModel->set($update_data)
                        ->where('user_id', $data['user_id'])
                        ->update();
                    $resp['status'] = true;
                    $resp['message'] = 'Roll and class update successfully';
                    $resp['data'] = ['user_id' => $data['user_id']];
                } else {
                    $insert_student_data = $StudentClassRollModel->insert($insert_data);
                    if ($insert_student_data) {
                        $resp['status'] = true;
                        $resp['message'] = 'Roll and class added successfully';
                        $resp['data'] = ['user_id' => $data['user_id']];
                    } else {
                        $resp['status'] = false;
                        $resp['message'] = 'Faild to insert the student data';
                        $resp['data'] = [];
                    }
                }
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;
    }

    public function live_class_by_student_id($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Live Class not Found',
            'data' => null
        ];

        $CommonModel = new CommonModel();

        $sql = "SELECT
            student_class_roll.uid AS student_class_roll_id,
            live_class.link AS class_link,
            live_class.description
        FROM
            student_class_roll
        JOIN
            live_class ON student_class_roll.branch_id = live_class.branch_id";

        if (!empty($data['user_id'])) {
            $user_id = $data['user_id'];
            $sql .= " WHERE
                student_class_roll.user_id = '{$user_id}';";
        }

        $live_class = $CommonModel->customQuery($sql);

        if (count($live_class) > 0) {

            $resp["status"] = true;
            $resp["data"] = $live_class;
            $resp["message"] = 'Live Class Link Found';
        }
        // $this->prd($resp);
        return $resp;
    }

    public function tests_by_student_id($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Test not Found',
            'data' => null
        ];

        // $CommonModel = new CommonModel();

        // $sql = "SELECT
        //     student_class_roll.uid AS student_class_roll_id,
        //     tests.uid AS test_id,
        //     tests.test_url,
        //     tests.timer
        // FROM
        //     student_class_roll
        // JOIN
        //     tests ON student_class_roll.branch_id = tests.branch_id
        // WHERE
        //     tests.status = 'active'";

        $CommonModel = new CommonModel();

        $sql = "SELECT
            student_class_roll.uid AS student_class_roll_id,
            tests.uid AS test_id,
            tests.created_at,
            tests.timer,
            classes.class_name,
            classes.uid AS class_id,
            branches.branch_name,
            branches.uid AS branch_id,
            users.user_name
        FROM
            student_class_roll
        JOIN
            tests ON student_class_roll.branch_id = tests.branch_id
        JOIN
            classes ON classes.uid = tests.class_id
        JOIN
            branches ON branches.uid = tests.branch_id
        JOIN
            users ON users.uid = tests.user_id
        WHERE
            tests.status = 'active'";

        if (!empty($data['user_id'])) {
            $user_id = $data['user_id'];
            $sql .= " AND
                student_class_roll.user_id = '{$user_id}';";
        }

        $tests = $CommonModel->customQuery($sql);
        $tests = json_decode(json_encode($tests), true);

        if (count($tests) > 0) {
            $QuestionsModel = new QuestionsModel();
            $AnswersModel = new AnswersModel();
            foreach ($tests as $key => $test) {
                $tests[$key]['questions'] = $QuestionsModel->where('test_id', $test['test_id'])->findAll();
                foreach ($tests[$key]['questions'] as $index => $question) {
                    $tests[$key]['questions'][$index]['answer'] = $AnswersModel->where('question_id', $question['uid'])->findAll();
                }
            }
            $resp["status"] = true;
            $resp["data"] = !empty($data['user_id']) ? $tests[0] : $tests;
            $resp["message"] = 'Online Test Found';
        }
        return $resp;
    }

    private function question_update($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Question not Updated',
        ];


        try {
            if (!isset($data['q_id']) || !isset($data['question'])) {
                throw new \Exception('Invalid input data');
            }
            $QuestionsModel = new QuestionsModel();


            $updateResult = $QuestionsModel->where('uid', $data['q_id'])
                ->set(['question' => $data['question']])
                ->update();
            if ($updateResult) {
                $resp['status'] = true;
                $resp['message'] = 'Question updated successfully';
            } else {
                $resp['message'] = 'Failed to update question';
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }
        return $resp;

    }

    private function answer_update($data)
    {
        $resp = [
            'status' => false,
            'message' => 'answer not Updated',
        ];


        try {
            if (!isset($data['ans_id']) || !isset($data['opt']) || !isset($data['answer'])) {
                throw new \Exception('Invalid input data');
            }
            $AnswersModel = new AnswersModel();

            $updateResult = $AnswersModel->where('uid', $data['ans_id'])
                ->set([$data['opt'] => $data['answer']])
                ->update();
            if ($updateResult) {
                $resp['status'] = true;
                $resp['message'] = 'answer updated successfully';
            } else {
                $resp['message'] = 'Failed to update answer';
            }


        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }
        return $resp;
    }


    private function test_submit($data)
    {

        $resp = [
            'status' => false,
            'message' => 'Test not Submitted',
        ];


        try {
            $TestSubmissionModel = new TestSubmissionModel();
            $ansArr = json_decode($data['answer_data']);
            $ansArr = json_decode(json_encode($ansArr), true);

            if (!empty($ansArr)) {
                foreach ($ansArr as $index => $item) {

                    if ($item['q_type'] == 'mcq') {
                        $insert_data = [
                            'uid' => $this->generate_uid('TSU'),
                            'q_id' => $item['q_id'],
                            'student_id' => $data['user_id'],
                            'ans' => ' ',
                            'ans_selected' => $item['selected_opt'],
                            'right_ans' => $item['right_opt'],
                        ];
                        $addResult = $TestSubmissionModel->insert($insert_data);
                    } else {
                        $insert_data = [
                            'uid' => $this->generate_uid('TSU'),
                            'q_id' => $item['q_id'],
                            'student_id' => $data['user_id'],
                            'ans' => $item['ans'],
                            'ans_selected' => ' ',
                            'right_ans' => ' ',
                        ];
                        $addResult = $TestSubmissionModel->insert($insert_data);
                    }
                    if ($addResult) {
                        $resp['status'] = true;
                        $resp['message'] = 'Test Submitted successfully';
                    } else {
                        $resp['message'] = 'Test not Submitted';
                    }
                }
            }


            //$this->prd($ansArr);

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }
        return $resp;

    }

    private function test_for_anonymous($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Tests not Found',
            'data' => null
        ];

        $CommonModel = new CommonModel();

        $sql = "SELECT
            tests.uid AS test_id,
            tests.created_at,
            tests.timer,
            classes.class_name,
            classes.uid AS class_id,
            branches.branch_name,
            branches.uid AS branch_id,
            users.user_name
        FROM
            tests
        JOIN
            classes ON classes.uid = tests.class_id
        JOIN
            branches ON branches.uid = tests.branch_id
        JOIN
            users ON users.uid = tests.user_id
        WHERE
            tests.status = 'active'";

        if (!empty($data['branch_id'])) {
            $branch_id = $data['branch_id'];
            $sql .= " AND
                tests.branch_id = '{$branch_id}';";
        }
        if (!empty($data['class_id'])) {
            $class_id = $data['class_id'];
            $sql .= " AND
                tests.class_id = '{$class_id}';";
        }

        $tests = $CommonModel->customQuery($sql);
        $tests = json_decode(json_encode($tests), true);

        if (count($tests) > 0) {
            $QuestionsModel = new QuestionsModel();
            $AnswersModel = new AnswersModel();
            foreach ($tests as $key => $test) {
                $tests[$key]['questions'] = $QuestionsModel->where('test_id', $test['test_id'])->findAll();
                foreach ($tests[$key]['questions'] as $index => $question) {
                    $tests[$key]['questions'][$index]['answer'] = $AnswersModel->where('question_id', $question['uid'])->findAll();
                }
            }

            $resp["status"] = true;
            $resp["data"] = !empty($data['branch_id']) ? $tests[0] : $tests;
            $resp["message"] = 'Tests Found';
        }
        // $this->prd($resp);
        return $resp;
    }

    private function get_all_given_answer($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Tests not Found',
            'data' => null
        ];

        $CommonModel = new CommonModel();

        $sql = "SELECT
                test_submission.uid AS test_sub_id,
                test_submission.created_at,
                test_submission.ans,
                test_submission.ans_selected,
                test_submission.right_ans AS right_ans,
                questions.question,
                questions.question_type,
                questions.marks,
                answers.ans,
                answers.a,
                answers.b,
                answers.c,
                answers.d,
                tests.uid AS test_id,
                classes.class_name,
                classes.uid AS class_id,
                branches.branch_name,
                branches.uid AS branch_id,
                users.user_name,
                users.email,
                student_class_roll.roll AS student_roll
            FROM
                test_submission
            JOIN
                questions ON test_submission.q_id = questions.uid
            JOIN
                answers ON questions.uid = answers.question_id
            JOIN
                tests ON tests.uid = questions.test_id
            JOIN
                classes ON classes.uid = tests.class_id
            JOIN
                branches ON tests.branch_id = branches.uid
            JOIN
                users ON test_submission.student_id = users.uid
            JOIN
                student_class_roll ON test_submission.student_id = student_class_roll.user_id";

        if (!empty($data['user_id'])) {
            $user_id = $data['user_id'];
            $sql .= " AND
                    test_submission.student_id = '{$user_id}';";
        }

        $tests = $CommonModel->customQuery($sql);
        $tests = json_decode(json_encode($tests), true);

        if (count($tests) > 0) {
            $resp["status"] = true;
            $resp["data"] = $tests;
            $resp["message"] = 'Tests Found';
        }

        return $resp;
    }

    public function get_unique_user_from_student_submission($data)
    {
        $resp = [
            'status' => false,
            'message' => 'User not Found',
            'data' => null
        ];

        $CommonModel = new CommonModel();

        $sql = "SELECT DISTINCT student_id
        FROM
            test_submission";

        $users = $CommonModel->customQuery($sql);
        $users = json_decode(json_encode($users), true);

        if (count($users) > 0) {
            foreach ($users as $key => $user) {
                $s_id = $user['student_id'];
                $sql2 = "SELECT
                    test_submission.uid AS test_sub_id,
                    test_submission.created_at,
                    users.user_name,
                    users.email,
                    student_class_roll.roll AS student_roll,
                    classes.class_name,
                    classes.uid AS class_id,
                    branches.branch_name,
                    branches.uid AS branch_id
                FROM
                    test_submission
                JOIN
                    users ON test_submission.student_id = users.uid
                JOIN
                    student_class_roll ON users.uid = student_class_roll.user_id
                JOIN
                    classes ON student_class_roll.class_id = classes.uid
                JOIN
                    branches ON student_class_roll.branch_id = branches.uid
                WHERE
                    test_submission.student_id = '{$s_id}';";

                $users[$key]['students'] = $CommonModel->customQuery($sql2);
            }
            $resp["status"] = true;
            $resp["data"] = $users;
            $resp["message"] = 'Tests Found';
        }

        return $resp;
    }

    private function test_submit_anonymous($data)
    {

        $resp = [
            'status' => false,
            'message' => 'Test not Submitted',
        ];


        try {
            $TestsSubmissionAnonymousModel = new TestsSubmissionAnonymousModel();
            $ansArr = json_decode($data['answer_data']);
            $ansArr = json_decode(json_encode($ansArr), true);

            $user_image = '';
            if (!empty($ansArr)) {
                $uploadedFiles = $this->request->getFiles();
                foreach ($uploadedFiles['images'] as $file) {
                    $file_src = $this->single_upload($file, PATH_USER_IMG);
                    $user_image = $file_src;
                }
                foreach ($ansArr as $index => $item) {

                    if ($item['q_type'] == 'mcq') {
                        $insert_data = [
                            'uid' => $this->generate_uid('TSU'),
                            'class_id' => $data['class_id'],
                            'branch_id' => $data['branch_id'],
                            'q_id' => $item['q_id'],
                            'email' => $data['user_email'],
                            'name' => $data['user_name'],
                            'phone' => $data['user_phone'],
                            'dob' => $data['user_dob'],
                            'address' => $data['user_address'],
                            'photo' => $user_image,
                            'ans' => ' ',
                            'ans_selected' => $item['selected_opt'],
                            'right_ans' => $item['right_opt'],
                        ];
                        $addResult = $TestsSubmissionAnonymousModel->insert($insert_data);
                    } else {
                        $insert_data = [
                            'uid' => $this->generate_uid('TSU'),
                            'class_id' => $data['class_id'],
                            'branch_id' => $data['branch_id'],
                            'q_id' => $item['q_id'],
                            'email' => $data['user_email'],
                            'name' => $data['user_name'],
                            'phone' => $data['user_phone'],
                            'dob' => $data['user_dob'],
                            'address' => $data['user_address'],
                            'photo' => $user_image,
                            'ans' => $item['ans'],
                            'ans_selected' => ' ',
                            'right_ans' => ' ',
                        ];
                        $addResult = $TestsSubmissionAnonymousModel->insert($insert_data);
                    }
                    if ($addResult) {
                        $class_id = $data['class_id'];
                        $branch_id = $data['branch_id'];
                        $sql = "SELECT
                                    classes.uid AS class_id,
                                    classes.class_name
                                FROM
                                    classes
                                WHERE
                                    classes.uid = '{$class_id}'";

                        $CommonModel = new CommonModel();

                        $class_branch['class'] = $CommonModel->customQuery($sql);
                        // $classes = json_decode(json_encode($classes), true);



                        $sql2 = "SELECT
                                    branches.uid AS branch_id,
                                    branches.branch_name
                                FROM
                                    branches
                                WHERE
                                    branches.uid = '{$branch_id}'";
                        $CommonModel = new CommonModel();

                        $email_id['email_id'] = $data['user_email'];
                        $class_branch['branch'] = $CommonModel->customQuery($sql2);
                        $class_branch['user_img'] = $user_image;
                        $class_branch['answers_data'] = $this->get_all_given_answer_anonymous($email_id);

                        // $class_branch['class'] = $this->class_list($data['class_id']);
                        // $class_branch['branch'] = $this->branches($data['branch_id']);
                        $resp['status'] = true;
                        $resp['message'] = 'Test Submitted successfully';
                        $resp['data'] = $class_branch;
                    } else {
                        $resp['message'] = 'Test not Submitted';
                    }
                }
            }


            //$this->prd($ansArr);

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }
        return $resp;

    }

    private function get_unique_user_from_student_submission_anynmous($data)
    {
        $resp = [
            'status' => false,
            'message' => 'User not Found',
            'data' => null
        ];

        $CommonModel = new CommonModel();

        $sql = "SELECT DISTINCT email
        FROM
            test_submission_anonymous";

        $users = $CommonModel->customQuery($sql);
        $users = json_decode(json_encode($users), true);

        if (count($users) > 0) {
            foreach ($users as $key => $user) {
                $e_id = $user['email'];
                $sql2 = "SELECT
                    test_submission_anonymous.uid AS test_sub_id,
                    test_submission_anonymous.email AS user_email,
                    test_submission_anonymous.name AS user_name,
                    test_submission_anonymous.phone,
                    test_submission_anonymous.dob,
                    test_submission_anonymous.address,
                    test_submission_anonymous.photo,
                    test_submission_anonymous.created_at,
                    classes.class_name,
                    classes.uid AS class_id,
                    branches.branch_name,
                    branches.uid AS branch_id
                FROM
                    test_submission_anonymous
                JOIN
                    classes ON test_submission_anonymous.class_id = classes.uid
                JOIN
                    branches ON test_submission_anonymous.branch_id = branches.uid
                WHERE
                    test_submission_anonymous.email = '{$e_id}';";

                $users[$key]['students'] = $CommonModel->customQuery($sql2);
            }
            $resp["status"] = true;
            $resp["data"] = $users;
            $resp["message"] = 'Tests Found';
        }

        return $resp;
    }

    private function get_all_given_answer_anonymous($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Tests not Found',
            'data' => null
        ];


        $CommonModel = new CommonModel();

        $sql = "SELECT
                test_submission_anonymous.uid AS test_sub_id,
                test_submission_anonymous.created_at,
                test_submission_anonymous.ans,
                test_submission_anonymous.ans_selected,
                test_submission_anonymous.right_ans AS right_ans,
                test_submission_anonymous.name AS user_name,
                test_submission_anonymous.phone,
                test_submission_anonymous.right_ans AS right_ans,
                test_submission_anonymous.right_ans AS right_ans,
                questions.question,
                questions.question_type,
                questions.marks,
                answers.ans,
                answers.a,
                answers.b,
                answers.c,
                answers.d,
                tests.uid AS test_id,
                classes.class_name,
                classes.uid AS class_id,
                branches.branch_name,
                branches.uid AS branch_id
            FROM
                test_submission_anonymous
            JOIN
                questions ON test_submission_anonymous.q_id = questions.uid
            JOIN
                answers ON questions.uid = answers.question_id
            JOIN
                tests ON tests.uid = questions.test_id
            JOIN
                classes ON classes.uid = tests.class_id
            JOIN
                branches ON tests.branch_id = branches.uid";

        if (!empty($data['email_id'])) {
            $email_id = $data['email_id'];
            $sql .= " WHERE
                    test_submission_anonymous.email = '{$email_id}';";
        }

        $tests = $CommonModel->customQuery($sql);
        $tests = json_decode(json_encode($tests), true);

        if (count($tests) > 0) {
            $resp["status"] = true;
            $resp["data"] = $tests;
            $resp["message"] = 'Tests Found';
        }

        return $resp;
    }

    private function update_right_ans($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to update answer.",
            "data" => []
        ];

        try {
            if (empty($data['ans_type'])) {
                $resp['message'] = 'Please select right or wrong';
                return $resp;
            }
            if (empty($data['test_sub_id'])) {
                $resp['message'] = 'Question not found';
                return $resp;
            }



            $update_data = [
                "right_ans" => $data['ans_type'],
            ];

            $TestSubmissionModel = new TestSubmissionModel();
            $update_test_sub_data = $TestSubmissionModel->set($update_data)
                ->where('uid', $data['test_sub_id'])
                ->update();

            if ($update_test_sub_data) {
                $resp['status'] = true;
                $resp['message'] = 'Answer update successfully';
                $resp['data'] = ['test_sub_data' => $data['test_sub_id']];
            }
        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;
    }

    private function admit_form($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to get admit form data.",
            "data" => []
        ];

        try {
            $CommonModel = new CommonModel();

            $sql = "SELECT
                        admit_form.uid AS admit_form_id,
                        admit_form.question,
                        admit_form.question_type
                    FROM
                        admit_form";

            $admitFormData = $CommonModel->customQuery($sql);
            $admitFormData = json_decode(json_encode($admitFormData), true);

            $sql2 = "SELECT
                        important_notes.uid AS note_id,
                        important_notes.title,
                        important_notes.note,
                        important_notes.centre_name,
                        important_notes.date,
                        important_notes.time
                    FROM
                    important_notes";

            $importantNoteData = $CommonModel->customQuery($sql2);
            $importantNoteData = json_decode(json_encode($importantNoteData), true);

            if (!empty($admitFormData) && !empty($importantNoteData)) {
                $resp['status'] = true;
                $resp['message'] = "Admit form data retrieved";
                $resp['data'] = $admitFormData;
                $resp['note_data'] = $importantNoteData[0];
            } else {
                $resp['message'] = "No admit form data found";
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;

    }

    private function add_admit_questions($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to add data.",
            "data" => []
        ];

        try {
            if (empty($data['questions'])) {
                $resp['message'] = 'Please add question';
            } else if (empty($data['inputType'])) {
                $resp['message'] = 'Please add input type';
            } else if (empty($data['noteTitle'])) {
                $resp['message'] = 'Please add a note title';
            } else if (empty($data['note'])) {
                $resp['message'] = 'Please add note';
            } else {
                // $this->prd($data['questions'][0]);
                $admit_form_data = [];
                foreach ($data['questions'] as $key => $question) {
                    $admit_form_data[] = array(
                        "uid" => $this->generate_uid(UID_ADMIT_FORM),
                        "question" => $question,
                        "question_type" => $data['inputType'][$key],
                    );
                }

                $exam_centre = json_encode($data['exam_centre']);
                $exam_date = json_encode($data['exam_date']);


                $exam_time = json_encode($data['exam_time']);
                $exam_end_time = json_encode($data['exam_end_time']);

                // Decode the JSON strings back to arrays
                $exam_time_array = json_decode($exam_time, true);
                $exam_end_time_array = json_decode($exam_end_time, true);

                // Combine the start and end times into the desired format
                $result = [];
                foreach ($exam_time_array as $index => $start_time) {
                    $result[] = [
                        "start" => $start_time,
                        "end" => $exam_end_time_array[$index]
                    ];
                }
                $exam_time = json_encode($result);


                $important_note_data = [
                    "uid" => $this->generate_uid(UID_IMPORTANT_NOTE),
                    "title" => $data['noteTitle'],
                    "note" => $data['note'],
                    "centre_name" => $exam_centre,
                    "date" => $exam_date,
                    "time" => $exam_time,
                ];

                $AdmitFormModel = new AdmitFormModel();
                $ImportanNotesModel = new ImportanNotesModel();
                $deleted = $AdmitFormModel->truncate();
                $deleted_note = $ImportanNotesModel->truncate();
                if ($deleted) {
                    $insert_data = $AdmitFormModel->insertBatch($admit_form_data);
                    $insert_note_data = $ImportanNotesModel->insert($important_note_data);

                    if ($insert_note_data) {
                        $resp['status'] = true;
                        $resp['message'] = 'Data added successfully';
                        $resp['data'] = [];
                    } else {
                        $resp['status'] = false;
                        $resp['message'] = 'Faild to insert Data';
                        $resp['data'] = [];
                    }
                } else {
                    $resp['message'] = 'Faild to delete Data';
                }

                // Insert live class data

            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;
    }

    private function admit_form_frontend($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to get admit form data.",
            "data" => []
        ];

        try {
            $CommonModel = new CommonModel();

            $sql = "SELECT
                        admit_form.uid AS admit_form_id,
                        admit_form.question,
                        admit_form.question_type
                    FROM
                        admit_form";

            $admitFormData = $CommonModel->customQuery($sql);
            $admitFormData = json_decode(json_encode($admitFormData), true);

            $sql2 = "SELECT
                        important_notes.uid AS note_id,
                        important_notes.title,
                        important_notes.note,
                        important_notes.centre_name,
                        important_notes.date,
                        important_notes.time
                    FROM
                    important_notes";

            $importantNoteData = $CommonModel->customQuery($sql2);
            $importantNoteData = json_decode(json_encode($importantNoteData), true);

            $class_id = $data['class_id'];
            $branch_id = $data['branch_id'];
            $sql3 = "SELECT
                        classes.uid AS class_id,
                        classes.class_name
                    FROM
                        classes
                    WHERE
                        classes.uid = '{$class_id}'";

            $classData = $CommonModel->customQuery($sql3);
            $classData = json_decode(json_encode($classData), true);

            $sql4 = "SELECT
                        branches.uid AS branch_id,
                        branches.class_id AS class_id,
                        branches.branch_name
                    FROM
                        branches
                    WHERE
                        branches.uid = '{$branch_id}'";


            $branchData = $CommonModel->customQuery($sql4);
            $branchData = json_decode(json_encode($branchData), true);

            if (!empty($admitFormData) && !empty($importantNoteData)) {
                $resp['status'] = true;
                $resp['message'] = "Admit form data retrieved";
                $resp['data']['questions'] = $admitFormData;
                $resp['data']['note_data'] = $importantNoteData[0];
                $resp['data']['class_data'] = $classData[0];
                $resp['data']['branch_data'] = $branchData[0];
            } else {
                $resp['message'] = "No admit form data found";
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;

    }

    private function submit_admit_data($data)
    {

        $resp = [
            'status' => false,
            'message' => 'Test not Submitted',
        ];


        try {
            if (empty($data['user_name'])) {
                $resp['message'] = 'Please add name';
            } else if (empty($data['user_email'])) {
                $resp['message'] = 'Please add email';
            } else if (empty($data['user_phone'])) {
                $resp['message'] = 'Please add phone no';
            } else if (empty($data['user_dob'])) {
                $resp['message'] = 'Please add date of birth';
            } else if (empty($data['user_address'])) {
                $resp['message'] = 'Please add address';
            } else if (empty($data['user_password'])) {
                $resp['message'] = 'Please add address';
            } else if (empty($data['exam_centre'])) {
                $resp['message'] = 'Please add exam centre';
            } else if (empty($data['exam_date'])) {
                $resp['message'] = 'Please add exam date';
            } else if (empty($data['exam_time'])) {
                $resp['message'] = 'Please add exam time';
            } else {
                $UsersModel = new UsersModel();
                $SubmitAdmitDataModel = new SubmitAdmitDataModel();

                $user_image = '';
                $uploadedFiles = $this->request->getFiles();
                foreach ($uploadedFiles['images'] as $file) {
                    $file_src = $this->single_upload($file, PATH_USER_IMG);
                    $user_image = $file_src;
                }
                $userQuestion = json_encode($data['userQuestion']);
                $userAnswers = json_encode($data['userAnswers']);


                $user_data = [
                    "uid" => $this->generate_uid(UID_USER),
                    "user_name" => $data['user_name'],
                    "email" => $data['user_email'],
                    "number" => $data['user_phone'],
                    "password" => md5($data['user_password']),
                    "type" => 'student',
                    "status" => 'active',
                    "came_from" => 'offline'
                ];

                $update_user_data = [
                    "user_name" => $data['user_name'],
                    "number" => $data['user_phone'],
                    "password" => md5($data['user_password']),
                ];

                $insert_user_admit_data = [
                    "uid" => $this->generate_uid(UID_SUBMIT_USER_DATA),
                    "user_id" => $user_data['uid'],
                    "class_id" => $data['class_id'],
                    "branch_id" => $data['branch_id'],
                    "name" => $data['user_name'],
                    "email" => $data['user_email'],
                    "phone" => $data['user_phone'],
                    "dob" => $data['user_dob'],
                    "address" => $data['user_address'],
                    "password" => md5($data['user_password']),
                    "img" => $user_image,
                    "exam_centre" => $data['exam_centre'],
                    "exam_date" => $data['exam_date'],
                    "exam_time" => $data['exam_time'],
                    "questions" => $userQuestion,
                    "answers" => $userAnswers,
                ];

                $update_user_admit_data = [
                    "class_id" => $data['class_id'],
                    "branch_id" => $data['branch_id'],
                    "name" => $data['user_name'],
                    "phone" => $data['user_phone'],
                    "dob" => $data['user_dob'],
                    "address" => $data['user_address'],
                    "password" => md5($data['user_password']),
                    "img" => $user_image,
                    "exam_centre" => $data['exam_centre'],
                    "exam_date" => $data['exam_date'],
                    "exam_time" => $data['exam_time'],
                    "questions" => $userQuestion,
                    "answers" => $userAnswers,
                ];

                $sql_email = "SELECT *
                    FROM
                        submit_admit_data
                    WHERE
                        submit_admit_data.email = '{$data['user_email']}'";

                $CommonModel = new CommonModel();
                $student_exist = $CommonModel->customQuery($sql_email);
                $student_exist = json_decode(json_encode($student_exist), true);

                if (empty($student_exist)) {
                    $insert_user_data = $UsersModel->insert($user_data);
                    if ($insert_user_data) {
                        $insert_data = $SubmitAdmitDataModel->insert($insert_user_admit_data);
                        if ($insert_data) {
                            $class_id = $data['class_id'];
                            $branch_id = $data['branch_id'];
                            $sql = "SELECT
                                            classes.uid AS class_id,
                                            classes.class_name
                                        FROM
                                            classes
                                        WHERE
                                            classes.uid = '{$class_id}'";

                            $CommonModel = new CommonModel();

                            $class_branch['class'] = $CommonModel->customQuery($sql);
                            // $classes = json_decode(json_encode($classes), true);



                            $sql2 = "SELECT
                                            branches.uid AS branch_id,
                                            branches.branch_name
                                        FROM
                                            branches
                                        WHERE
                                            branches.uid = '{$branch_id}'";
                            $CommonModel = new CommonModel();
                            $class_branch['branch'] = $CommonModel->customQuery($sql2);

                            $sql3 = "SELECT
                                            important_notes.uid AS note_id,
                                            important_notes.title,
                                            important_notes.note
                                        FROM
                                        important_notes";

                            $importantNoteData = $CommonModel->customQuery($sql3);
                            $class_branch['importantNoteData'] = json_decode(json_encode($importantNoteData), true);

                            $class_branch['user_img'] = $user_image;

                            $resp['status'] = true;
                            $resp['message'] = 'Data added successfully';
                            $resp['data'] = $class_branch;
                        } else {
                            $resp['status'] = false;
                            $resp['message'] = 'Faild to insert admit Data';
                            $resp['data'] = [];
                        }
                    } else {
                        $resp['status'] = false;
                        $resp['message'] = 'Faild to insert user Data';
                        $resp['data'] = [];
                    }
                } else if (!empty($student_exist)) {
                    $update_user_data = $UsersModel->where(['email' => $data['user_email']])->set($update_user_data)->update();
                    if ($update_user_data) {
                        $update_data = $SubmitAdmitDataModel->where(['email' => $data['user_email']])->set($update_user_admit_data)->update();
                        if ($update_data) {
                            $class_id = $data['class_id'];
                            $branch_id = $data['branch_id'];
                            $sql = "SELECT
                                            classes.uid AS class_id,
                                            classes.class_name
                                        FROM
                                            classes
                                        WHERE
                                            classes.uid = '{$class_id}'";

                            $CommonModel = new CommonModel();

                            $class_branch['class'] = $CommonModel->customQuery($sql);
                            // $classes = json_decode(json_encode($classes), true);



                            $sql2 = "SELECT
                                            branches.uid AS branch_id,
                                            branches.branch_name
                                        FROM
                                            branches
                                        WHERE
                                            branches.uid = '{$branch_id}'";
                            $CommonModel = new CommonModel();
                            $class_branch['branch'] = $CommonModel->customQuery($sql2);

                            $sql3 = "SELECT
                                            important_notes.uid AS note_id,
                                            important_notes.title,
                                            important_notes.note
                                        FROM
                                        important_notes";

                            $importantNoteData = $CommonModel->customQuery($sql3);
                            $class_branch['importantNoteData'] = json_decode(json_encode($importantNoteData), true);

                            $class_branch['user_img'] = $user_image;

                            $resp['status'] = true;
                            $resp['message'] = 'Data update successfully';
                            $resp['data'] = $class_branch;
                        } else {
                            $resp['status'] = false;
                            $resp['message'] = 'Faild to update admit Data';
                            $resp['data'] = [];
                        }
                    } else {
                        $resp['status'] = false;
                        $resp['message'] = 'Faild to update user Data';
                        $resp['data'] = [];
                    }
                }
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }
        return $resp;

    }

    private function admit_user_data($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to get admit form data.",
            "data" => []
        ];

        try {
            $CommonModel = new CommonModel();

            $sql = "SELECT
                        submit_admit_data.uid AS submit_admit_data_id,
                        submit_admit_data.name,
                        submit_admit_data.email,
                        submit_admit_data.phone,
                        submit_admit_data.dob,
                        submit_admit_data.img,
                        submit_admit_data.address,
                        submit_admit_data.questions,
                        submit_admit_data.answers,
                        classes.uid AS class_id,
                        classes.class_name,
                        branches.uid AS branch_id,
                        branches.branch_name
                    FROM
                        submit_admit_data
                    JOIN
                        classes ON classes.uid = submit_admit_data.class_id
                    JOIN
                        branches ON branches.uid = submit_admit_data.branch_id";

            // $sql = "SELECT
            //         submit_admit_data.uid AS submit_admit_data_id,
            //         submit_admit_data.name,
            //         submit_admit_data.email,
            //         submit_admit_data.phone,
            //         submit_admit_data.dob,
            //         submit_admit_data.img,
            //         submit_admit_data.address,
            //         submit_admit_data.questions,
            //         submit_admit_data.answers,
            //         classes.uid AS class_id,
            //         classes.class_name,
            //         branches.uid AS branch_id,
            //         branches.branch_name
            //     FROM
            //         submit_admit_data
            //     JOIN
            //         classes ON classes.uid = submit_admit_data.class_id
            //     JOIN
            //         branches ON branches.uid = submit_admit_data.branch_id
            //     WHERE
            //         submit_admit_data.email IN (
            //             SELECT email
            //             FROM submit_admit_data
            //             GROUP BY email
            //             HAVING COUNT(*) = 1
            //         );
            //     ";

            if (!empty($data['admit_data_id'])) {
                $admit_data_id = $data['admit_data_id'];
                $sql .= " WHERE
                            submit_admit_data.uid = '{$admit_data_id}';";
            }

            $admitData = $CommonModel->customQuery($sql);
            $admitData = json_decode(json_encode($admitData), true);

            if (!empty($admitData)) {
                $resp['status'] = true;
                $resp['message'] = "Admit data retrieved";
                $resp['data'] = !empty($data['admit_data_id']) ? $admitData[0] : $admitData;
            } else {
                $resp['message'] = "No admit data found";
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;

    }

    private function create_result($data)
    {

        $resp = [
            'status' => false,
            'message' => 'Result not created',
        ];


        try {
            if (empty($data['selectStudent'])) {
                $resp['message'] = 'Please select a student';
            } else if (empty($data['totalMarks'])) {
                $resp['message'] = 'Please add total marks';
            } else if (empty($data['questions'])) {
                $resp['message'] = 'Please add questions';
            } else if (empty($data['givenAnswers'])) {
                $resp['message'] = 'Please add given answers';
            } else if (empty($data['rightAnswer'])) {
                $resp['message'] = 'Please add right answers';
            } else if (empty($data['obtainedMarks'])) {
                $resp['message'] = 'Please add obtained marks';
            } else {

                $questions = json_encode($data['questions']);
                $givenAnswers = json_encode($data['givenAnswers']);
                $rightAnswer = json_encode($data['rightAnswer']);
                $obtainedMarks = json_encode($data['obtainedMarks']);

                $insert_result_data = [
                    "uid" => $this->generate_uid(UID_UNSIGNED_USER_RESULT),
                    "admit_data_id" => $data['selectStudent'],
                    "total_marks" => $data['totalMarks'],
                    "questions" => $questions,
                    "answer" => $givenAnswers,
                    "right_ans" => $rightAnswer,
                    "marks" => $obtainedMarks,
                ];

                $UnsignedUserResultModel = new UnsignedUserResultModel();
                $insert_data = $UnsignedUserResultModel->insert($insert_result_data);

                if ($insert_data) {


                    $resp['status'] = true;
                    $resp['message'] = 'Result added successfully';
                    $resp['data'] = [];
                } else {
                    $resp['status'] = false;
                    $resp['message'] = 'Faild to insert Data';
                    $resp['data'] = [];
                }
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }
        return $resp;

    }

    private function results($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to get results data.",
            "data" => []
        ];

        try {
            $CommonModel = new CommonModel();

            $sql = "SELECT
                        unsigned_user_result.uid AS result_id,
                        unsigned_user_result.total_marks,
                        unsigned_user_result.questions,
                        unsigned_user_result.answer,
                        unsigned_user_result.right_ans,
                        unsigned_user_result.marks,
                        submit_admit_data.name,
                        submit_admit_data.email,
                        submit_admit_data.phone,
                        submit_admit_data.exam_centre,
                        submit_admit_data.uid AS admit_data_id,
                        classes.class_name,
                        branches.branch_name
                    FROM
                        unsigned_user_result
                    JOIN
                        submit_admit_data ON unsigned_user_result.admit_data_id = submit_admit_data.uid
                    JOIN
                        classes ON submit_admit_data.class_id = classes.uid
                    JOIN
                        branches ON submit_admit_data.branch_id = branches.uid";

            if (!empty($data['user_id'])) {
                $user_id = $data['user_id'];
                $sql .= " WHERE
                    submit_admit_data.user_id = '{$user_id}';";
            }

            $resultData = $CommonModel->customQuery($sql);
            $resultData = json_decode(json_encode($resultData), true);

            if (!empty($resultData)) {
                $resp['status'] = true;
                $resp['message'] = "Result data retrieved";
                $resp['data'] = !empty($data['user_id']) ? $resultData[0] : $resultData;
            } else {
                $resp['message'] = "No result data found";
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;

    }

    private function results_byId($id)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to get results data.",
            "data" => []
        ];

        try {
            $CommonModel = new CommonModel();

            $sql = "SELECT
                        unsigned_user_result.uid AS result_id,
                        unsigned_user_result.total_marks,
                        unsigned_user_result.questions,
                        unsigned_user_result.answer,
                        unsigned_user_result.right_ans,
                        unsigned_user_result.marks,
                        submit_admit_data.name,
                        submit_admit_data.email,
                        submit_admit_data.phone,
                        submit_admit_data.exam_centre,
                        submit_admit_data.uid AS admit_data_id,
                        classes.class_name,
                        branches.branch_name
                    FROM
                        unsigned_user_result
                    JOIN
                        submit_admit_data ON unsigned_user_result.admit_data_id = submit_admit_data.uid
                    JOIN
                        classes ON submit_admit_data.class_id = classes.uid
                    JOIN
                        branches ON submit_admit_data.branch_id = branches.uid
                    WHERE
                        unsigned_user_result.uid = '".$id."'";
          

            $resultData = $CommonModel->customQuery($sql);
            $resultData = json_decode(json_encode($resultData), true);

            if (!empty($resultData)) {
                $resp['status'] = true;
                $resp['message'] = "Result data retrieved";
                $resp['data'] =  $resultData[0];
            } else {
                $resp['message'] = "No result data found";
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;
    }


    private function delete_offline_student($data)
    {
        // echo $user_id;
        $resp = [
            "status" => false,
            "message" => "Data Not Found",
            "user_data" => ""
        ];
        if ($data) {
            $UsersModel = new UsersModel();
            $SubmitAdmitDataModel = new SubmitAdmitDataModel();
            try {
                $user_data = $SubmitAdmitDataModel->where('uid', $data['submit_admit_data_id'])->first();
                if ($user_data) {
                    $delete_student = $SubmitAdmitDataModel->where('uid', $data['submit_admit_data_id'])->delete();
                    if ($delete_student) {
                        $delete_user = $UsersModel->where('email', $user_data['user_id'])
                            ->where('type', 'student')
                            ->where('came_from', 'offline')
                            ->delete();
                        if ($delete_user) {
                            $resp = [
                                "status" => true,
                                "message" => $user_data['user_id'] . " This user has been deleted",
                                "user_data" => ""
                            ];
                        }

                    }
                }

            } catch (\Exception $e) {
                throw $e;
            }
        }
        return $resp;
    }

    private function add_study_material($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to add study material.",
            "data" => []
        ];

        try {
            $uploadedFiles = $this->request->getFiles();
            if (empty($data['class_id'])) {
                $resp['message'] = 'Please add a class';
            } else if (empty($data['branch_id'])) {
                $resp['message'] = 'Please add a branch';
            } else if (empty($data['title'])) {
                $resp['message'] = 'Please add a title';
            } else if ($data['type'] == 'pdf' && empty($uploadedFiles['pdf'])) {
                    $resp['message'] = 'Please add a PDF';
            } else if ($data['type'] == 'link' && empty($data['material_link'])) {
                    $resp['message'] = 'Please add a Link';
            } else {
                // $this->pr($data['material_link']);
                $study_material_data = [
                    "uid" => $this->generate_uid('STMT'),
                    "class_id" => $data['class_id'],
                    "branch_id" => $data['branch_id'],
                    "title" => $data['title'],
                    "link" => $data['material_link'],
                    "type" => $data['type'],
                ];
                
                // if(isset($uploadedFiles['pdf'])){
                if (!empty($uploadedFiles['pdf'])){
                    foreach ($uploadedFiles['pdf'] as $file) {
                        $file_src = $this->single_upload($file, PATH_STUDY_MATERIAL);
                        $study_material_data['pdf'] = $file_src;
                    }
                } else{
                    $study_material_data['pdf'] = '';
                }
                
                $StudyMaterialModel = new StudyMaterialModel();

                // Insert live class data
                $insert_data = $StudyMaterialModel->insert($study_material_data);
                // $this->prd($insert_data);
                if ($insert_data) {
                    $resp['status'] = true;
                    $resp['message'] = 'Study material added successfully';
                    $resp['data'] = [];
                } else {
                    $resp['status'] = false;
                    $resp['message'] = 'Faild to insert Study material';
                    $resp['data'] = [];
                }
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;
    }

    public function study_materials($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Study Materials Not Found',
            'data' => null
        ];

        $CommonModel = new CommonModel();

        $sql = "SELECT
            study_material.uid AS study_material_id,
            study_material.title,
            study_material.pdf,
            study_material.link,
            study_material.type,
            study_material.created_at,
            classes.class_name,
            classes.uid AS class_id,
            branches.branch_name,
            branches.uid AS branch_id
        FROM
            study_material
        JOIN
            classes ON classes.uid = study_material.class_id
        JOIN
            branches ON branches.uid = study_material.branch_id";

        if (!empty($data['study_material_id'])) {
            $study_material_id = $data['study_material_id'];
            $sql .= " WHERE
                study_material.uid = '{$study_material_id}';";
        }

        $studyMaterials = $CommonModel->customQuery($sql);

        if (count($studyMaterials) > 0) {

            $resp["status"] = true;
            $resp["data"] = !empty($data['study_material_id']) ? $studyMaterials[0] : $studyMaterials;
            $resp["message"] = 'Study Materials Found';
        }
        // $this->prd($resp);
        return $resp;
    }

    private function delete_study_material($data)
    {
        $response = [
            'status' => false,
            'message' => 'Study Material deletion failed'
        ];

        try {
            // Extract product ID from data
            $study_material_id = $data['study_material_id'];

            // Instantiate ProductModel
            $StudyMaterialModel = new StudyMaterialModel();
            // Delete product using the product ID
            $deleted = $StudyMaterialModel->where('uid', $study_material_id)->delete();
            // Check if deletion was successful
            if ($deleted) {
                $response['status'] = true;
                $response['message'] = 'This Study Material successfully deleted';
            }
        } catch (\Exception $e) {
            // Handle any errors
            $response['message'] = $e->getMessage();
        }

        return $response;
    }

    private function add_popular_paper($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to add popular paper.",
            "data" => []
        ];

        try {
            $uploadedFiles = $this->request->getFiles();
            if (empty($data['class_id'])) {
                $resp['message'] = 'Please add a class';
            } else if (empty($data['branch_id'])) {
                $resp['message'] = 'Please add a branch';
            } else if (empty($data['title'])) {
                $resp['message'] = 'Please add a title';
            } else if (empty($data['desc'])) {
                $resp['message'] = 'Please add description';
            } else if (empty($data['keyword'])) {
                $resp['message'] = 'Please add a keyword';
            } else if (empty($uploadedFiles['images'])) {
                $resp['message'] = 'Please add a image';
            } else if ($data['type'] == 'pdf' && empty($uploadedFiles['pdf'])) {
                    $resp['message'] = 'Please add a PDF';
            } else if ($data['type'] == 'link' && empty($data['material_link'])) {
                    $resp['message'] = 'Please add a Link';
            } else {
                // $this->pr($data['material_link']);
                $popular_paper_data = [
                    "uid" => $this->generate_uid('STMT'),
                    "class_id" => $data['class_id'],
                    "branch_id" => $data['branch_id'],
                    "title" => $data['title'],
                    "description" => $data['desc'],
                    "keyword" => $data['keyword'],
                    "link" => $data['material_link'],
                    "type" => $data['type'],
                ];
                
                if (!empty($uploadedFiles['images'])){
                    foreach ($uploadedFiles['images'] as $file) {
                        $file_src = $this->single_upload($file, PATH_POPULAR_PAPER);
                        $popular_paper_data['img'] = $file_src;
                    }
                }
                // if(isset($uploadedFiles['pdf'])){
                if (!empty($uploadedFiles['pdf'])){
                    foreach ($uploadedFiles['pdf'] as $file) {
                        $file_src = $this->single_upload($file, PATH_STUDY_MATERIAL);
                        $popular_paper_data['pdf'] = $file_src;
                    }
                } else{
                    $popular_paper_data['pdf'] = '';
                }
                
                $PopularPaperModel = new PopularPaperModel();

                // Insert live class data
                $insert_data = $PopularPaperModel->insert($popular_paper_data);
                // $this->prd($insert_data);
                if ($insert_data) {
                    $resp['status'] = true;
                    $resp['message'] = 'Popular paper added successfully';
                    $resp['data'] = [];
                } else {
                    $resp['status'] = false;
                    $resp['message'] = 'Faild to insert popular paper';
                    $resp['data'] = [];
                }
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;
    }

    public function popular_papers($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Popular Paper Not Found',
            'data' => null
        ];

        $CommonModel = new CommonModel();

        $sql = "SELECT
            popular_paper.uid AS popular_paper_id,
            popular_paper.title,
            popular_paper.description,
            popular_paper.keyword,
            popular_paper.img,
            popular_paper.pdf,
            popular_paper.link,
            popular_paper.type,
            popular_paper.created_at,
            classes.class_name,
            classes.uid AS class_id,
            branches.branch_name,
            branches.uid AS branch_id
        FROM
            popular_paper
        JOIN
            classes ON classes.uid = popular_paper.class_id
        JOIN
            branches ON branches.uid = popular_paper.branch_id";

        if (!empty($data['popular_paper_id'])) {
            $popular_paper_id = $data['popular_paper_id'];
            $sql .= " WHERE
                popular_paper.uid = '{$popular_paper_id}';";
        }

        $popularPaper = $CommonModel->customQuery($sql);

        if (count($popularPaper) > 0) {

            $resp["status"] = true;
            $resp["data"] = !empty($data['popular_paper_id']) ? $popularPaper[0] : $popularPaper;
            $resp["message"] = 'Popular Paper Found';
        }
        // $this->prd($resp);
        return $resp;
    }

    private function delete_popular_paper($data)
    {
        $response = [
            'status' => false,
            'message' => 'Papers deletion failed'
        ];

        try {
            // Extract product ID from data
            $popular_paper_id = $data['popular_paper_id'];

            // Instantiate ProductModel
            $PopularPaperModel = new PopularPaperModel();
            // Delete product using the product ID
            $deleted = $PopularPaperModel->where('uid', $popular_paper_id)->delete();
            // Check if deletion was successful
            if ($deleted) {
                $response['status'] = true;
                $response['message'] = 'This paper successfully deleted';
            }
        } catch (\Exception $e) {
            // Handle any errors
            $response['message'] = $e->getMessage();
        }

        return $response;
    }

    private function update_popular_paper($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to update answer.",
            "data" => []
        ];

        try {
            $uploadedFiles = $this->request->getFiles();
            if (empty($data['class_id'])) {
                $resp['message'] = 'Please add a class';
            } else if (empty($data['branch_id'])) {
                $resp['message'] = 'Please add a branch';
            } else if (empty($data['title'])) {
                $resp['message'] = 'Please add a title';
            } else if (empty($data['desc'])) {
                $resp['message'] = 'Please add description';
            } else if (empty($data['keyword'])) {
                $resp['message'] = 'Please add a keyword';
            } else if ($data['type'] == 'link' && empty($data['material_link'])) {
                    $resp['message'] = 'Please add a Link';
            } else if (empty($data['popular_paper_id'])) {
                $resp['message'] = 'Paper not found';
            } else {
                $update_data = [
                    "class_id" => $data['class_id'],
                    "branch_id" => $data['branch_id'],
                    "title" => $data['title'],
                    "description" => $data['desc'],
                    "keyword" => $data['keyword'],
                    "link" => $data['material_link'],
                    "type" => $data['type'],
                ];

               if(isset($uploadedFiles['images'])){
                    foreach ($uploadedFiles['images'] as $file) {
                        $file_src = $this->single_upload($file, PATH_POPULAR_PAPER);
                        $update_data['img'] = $file_src;
                    }
                }

                if(isset($uploadedFiles['pdf'])){
                    foreach ($uploadedFiles['pdf'] as $file) {
                        $file_src = $this->single_upload($file, PATH_STUDY_MATERIAL);
                        $update_data['pdf'] = $file_src;
                    }
                } else if($data['type'] == 'link'){
                    $update_data['pdf'] = '';
                }

                $PopularPaperModel = new PopularPaperModel();
                $update_popular_paper_data = $PopularPaperModel->set($update_data)
                    ->where('uid', $data['popular_paper_id'])
                    ->update();

                if ($update_popular_paper_data) {
                    $resp['status'] = true;
                    $resp['message'] = 'Paper update successfully';
                    $resp['data'] = ['popular_paper_id' => $data['popular_paper_id']];
                }
            }
        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }
        

        return $resp;
    }

    private function update_study_material($data)
    {
        $resp = [
            "status" => false,
            "message" => "Failed to update study material.",
            "data" => []
        ];

        try {
            $uploadedFiles = $this->request->getFiles();
            if (empty($data['class_id'])) {
                $resp['message'] = 'Please add a class';
            } else if (empty($data['branch_id'])) {
                $resp['message'] = 'Please add a branch';
            } else if (empty($data['title'])) {
                $resp['message'] = 'Please add a title';
            } else if ($data['type'] == 'link' && empty($data['material_link'])) {
                    $resp['message'] = 'Please add a Link';
            } else if (empty($data['study_material_id'])) {
                $resp['message'] = 'Study material not found';
            } else {
                // $this->pr($data['material_link']);
                $update_data = [
                    "class_id" => $data['class_id'],
                    "branch_id" => $data['branch_id'],
                    "title" => $data['title'],
                    "link" => $data['material_link'],
                    "type" => $data['type'],
                ];
                
                if(isset($uploadedFiles['pdf'])){
                // if (!empty($uploadedFiles['pdf'])){
                    foreach ($uploadedFiles['pdf'] as $file) {
                        $file_src = $this->single_upload($file, PATH_STUDY_MATERIAL);
                        $update_data['pdf'] = $file_src;
                    }
                } else if($data['type'] == 'link'){
                    $update_data['pdf'] = '';
                }
                
                $StudyMaterialModel = new StudyMaterialModel();
                $update_study_material_data = $StudyMaterialModel->set($update_data)
                ->where('uid', $data['study_material_id'])
                ->update();
                // $this->prd($insert_data);
                if ($update_study_material_data) {
                    $resp['status'] = true;
                    $resp['message'] = 'Study material update successfully';
                    $resp['data'] = [];
                } else {
                    $resp['status'] = false;
                    $resp['message'] = 'Faild to update Study material';
                    $resp['data'] = [];
                }
            }

        } catch (\Exception $e) {
            // Catch any exceptions and set error message
            $resp['message'] = $e->getMessage();
        }

        return $resp;
    }

    public function popular_papers_by_student($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Popular Paper Not Found',
            'data' => null
        ];

        $CommonModel = new CommonModel();

        $sql = "SELECT
            student_class_roll.uid AS student_class_roll_id,
            popular_paper.uid AS popular_paper_id,
            popular_paper.title,
            popular_paper.description,
            popular_paper.keyword,
            popular_paper.img,
            popular_paper.pdf,
            popular_paper.link,
            popular_paper.type,
            popular_paper.created_at,
            classes.class_name,
            classes.uid AS class_id,
            branches.branch_name,
            branches.uid AS branch_id
        FROM
            student_class_roll
        JOIN
            popular_paper ON student_class_roll.branch_id = popular_paper.branch_id
        JOIN
            classes ON classes.uid = popular_paper.class_id
        JOIN
            branches ON branches.uid = popular_paper.branch_id";

        if (!empty($data['user_id'])) {
            $user_id = $data['user_id'];
            $sql .= " WHERE
                student_class_roll.user_id = '{$user_id}';";
        }

        $popularPaper = $CommonModel->customQuery($sql);

        if (count($popularPaper) > 0) {

            $resp["status"] = true;
            $resp["data"] = $popularPaper;
            $resp["message"] = 'Popular Paper Found';
        }
        // $this->prd($resp);
        return $resp;
    }

    public function study_material_by_student($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Study Material Not Found',
            'data' => null
        ];

        $CommonModel = new CommonModel();

        $sql = "SELECT
            student_class_roll.uid AS student_class_roll_id,
            study_material.uid AS study_material_id,
            study_material.title,
            study_material.pdf,
            study_material.link,
            study_material.type,
            study_material.created_at,
            classes.class_name,
            classes.uid AS class_id,
            branches.branch_name,
            branches.uid AS branch_id
        FROM
            student_class_roll
        JOIN
            study_material ON student_class_roll.branch_id = study_material.branch_id
        JOIN
            classes ON classes.uid = study_material.class_id
        JOIN
            branches ON branches.uid = study_material.branch_id";

        if (!empty($data['user_id'])) {
            $user_id = $data['user_id'];
            $sql .= " WHERE
                student_class_roll.user_id = '{$user_id}';";
        }

        $popularPaper = $CommonModel->customQuery($sql);

        if (count($popularPaper) > 0) {

            $resp["status"] = true;
            $resp["data"] = $popularPaper;
            $resp["message"] = 'Study material Found';
        }
        // $this->prd($resp);
        return $resp;
    }

    public function search_study_material($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Study Material Not Found',
            'data' => null
        ];

        $user_id = $data['user_id'];
        // $this->prd($data['alph']);
        $CommonModel = new CommonModel();

        $sql = "SELECT
            student_class_roll.uid AS student_class_roll_id,
            study_material.uid AS study_material_id,
            study_material.title,
            study_material.pdf,
            study_material.link,
            study_material.type,
            study_material.created_at,
            classes.class_name,
            classes.uid AS class_id,
            branches.branch_name,
            branches.uid AS branch_id
        FROM
            student_class_roll
        JOIN
            study_material ON student_class_roll.branch_id = study_material.branch_id
        JOIN
            classes ON classes.uid = study_material.class_id
        JOIN
            branches ON branches.uid = study_material.branch_id
        WHERE
            student_class_roll.user_id = '{$user_id}'";

        // if (!empty($data['user_id'])) {
        //     $user_id = $data['user_id'];
        //     $sql .= " WHERE
        //         student_class_roll.user_id = '{$user_id}';";
        // }
        if (!empty($data['alph'])) {
            $alph = $data['alph'];
            $sql .= " AND
                study_material.title LIKE '%{$alph}%';";

        }

        $popularPaper = $CommonModel->customQuery($sql);

        if (count($popularPaper) > 0) {

            $resp["status"] = true;
            $resp["data"] = $popularPaper;
            $resp["message"] = 'Study material Found';
        }
        // $this->prd($resp);
        return $resp;
    }

    public function search_popular_papers($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Popular Paper Not Found',
            'data' => null
        ];

        $user_id = $data['user_id'];
        $CommonModel = new CommonModel();

        $sql = "SELECT
            student_class_roll.uid AS student_class_roll_id,
            popular_paper.uid AS popular_paper_id,
            popular_paper.title,
            popular_paper.description,
            popular_paper.keyword,
            popular_paper.img,
            popular_paper.pdf,
            popular_paper.link,
            popular_paper.type,
            popular_paper.created_at,
            classes.class_name,
            classes.uid AS class_id,
            branches.branch_name,
            branches.uid AS branch_id
        FROM
            student_class_roll
        JOIN
            popular_paper ON student_class_roll.branch_id = popular_paper.branch_id
        JOIN
            classes ON classes.uid = popular_paper.class_id
        JOIN
            branches ON branches.uid = popular_paper.branch_id
        WHERE
            student_class_roll.user_id = '{$user_id}'";

        // if (!empty($data['user_id'])) {
        //     $user_id = $data['user_id'];
        //     $sql .= " WHERE
        //         student_class_roll.user_id = '{$user_id}';";
        // }
        if (!empty($data['alph'])) {
            $alph = $data['alph'];
            $sql .= " AND
                popular_paper.title LIKE '%{$alph}%';";

        }

        $popularPaper = $CommonModel->customQuery($sql);

        if (count($popularPaper) > 0) {

            $resp["status"] = true;
            $resp["data"] = $popularPaper;
            $resp["message"] = 'Popular Paper Found';
        }
        // $this->prd($resp);
        return $resp;
    }








    public function POST_test_submit()
    {
        $data = $this->request->getPost();
        $resp = $this->test_submit($data);
        return $this->response->setJSON($resp);
    }

    public function POST_add_study_material()
    {
        $data = $this->request->getPost();
        $resp = $this->add_study_material($data);
        return $this->response->setJSON($resp);
    }

    public function POST_add_popular_paper()
    {
        $data = $this->request->getPost();
        $resp = $this->add_popular_paper($data);
        return $this->response->setJSON($resp);
    }

    public function POST_update_popular_paper()
    {
        $data = $this->request->getPost();
        $resp = $this->update_popular_paper($data);
        return $this->response->setJSON($resp);
    }

    public function POST_update_study_material()
    {
        $data = $this->request->getPost();
        $resp = $this->update_study_material($data);
        return $this->response->setJSON($resp);
    }

    public function GET_get_unique_user_from_student_submission_anynmous()
    {
        $data = $this->request->getGet();
        $resp = $this->get_unique_user_from_student_submission_anynmous($data);
        return $this->response->setJSON($resp);
    }

    public function GET_study_materials()
    {
        $data = $this->request->getGet();
        $resp = $this->study_materials($data);
        return $this->response->setJSON($resp);
    }

    public function GET_popular_papers()
    {
        $data = $this->request->getGet();
        $resp = $this->popular_papers($data);
        return $this->response->setJSON($resp);
    }

    public function GET_popular_papers_by_student()
    {
        $data = $this->request->getGet();
        $resp = $this->popular_papers_by_student($data);
        return $this->response->setJSON($resp);
    }

    public function GET_study_material_by_student()
    {
        $data = $this->request->getGet();
        $resp = $this->study_material_by_student($data);
        return $this->response->setJSON($resp);
    }

    public function GET_search_study_material()
    {
        $data = $this->request->getGet();
        $resp = $this->search_study_material($data);
        return $this->response->setJSON($resp);
    }

    public function GET_search_popular_papers()
    {
        $data = $this->request->getGet();
        $resp = $this->search_popular_papers($data);
        return $this->response->setJSON($resp);
    }

    public function GET_delete_study_material()
    {
        $data = $this->request->getGet();
        $resp = $this->delete_study_material($data);
        return $this->response->setJSON($resp);
    }

    public function GET_delete_popular_paper()
    {
        $data = $this->request->getGet();
        $resp = $this->delete_popular_paper($data);
        return $this->response->setJSON($resp);
    }


    public function POST_test_submit_anonymous()
    {
        $data = $this->request->getPost();
        $resp = $this->test_submit_anonymous($data);
        return $this->response->setJSON($resp);
    }

    public function POST_add_admit_questions()
    {
        $data = $this->request->getPost();
        $resp = $this->add_admit_questions($data);
        return $this->response->setJSON($resp);
    }


    public function POST_answer_update()
    {
        $data = $this->request->getPost();
        $resp = $this->answer_update($data);
        return $this->response->setJSON($resp);
    }

    public function POST_create_result()
    {
        $data = $this->request->getPost();
        $resp = $this->create_result($data);
        return $this->response->setJSON($resp);
    }

    public function POST_submit_admit_data()
    {
        $data = $this->request->getPost();
        $resp = $this->submit_admit_data($data);
        return $this->response->setJSON($resp);
    }

    public function GET_delete_offline_student()
    {
        $data = $this->request->getGet();
        $resp = $this->delete_offline_student($data);
        return $this->response->setJSON($resp);
    }

    public function GET_admit_form()
    {
        $data = $this->request->getGet();
        $resp = $this->admit_form($data);
        return $this->response->setJSON($resp);
    }

    public function GET_results()
    {
        $data = $this->request->getGet();
        $resp = $this->results($data);
        return $this->response->setJSON($resp);
    }

    public function GET_admit_form_frontend()
    {
        $data = $this->request->getGet();
        $resp = $this->admit_form_frontend($data);
        return $this->response->setJSON($resp);
    }

    public function GET_admit_user_data()
    {
        $data = $this->request->getGet();
        $resp = $this->admit_user_data($data);
        return $this->response->setJSON($resp);
    }


    public function GET_class_list()
    {
        $data = $this->request->getGet();
        $resp = $this->class_list($data);
        return $this->response->setJSON($resp);
    }

    public function POST_question_update()
    {
        $data = $this->request->getPost();
        $resp = $this->question_update($data);
        return $this->response->setJSON($resp);
    }

    public function GET_results_byId()
    {
        $result_id = $this->request->getGet('result_id');
        $resp = $this->results_byId($result_id);
        return $this->response->setJSON($resp);
    }


    public function GET_branches()
    {
        $data = $this->request->getGet();
        $resp = $this->branches($data);
        return $this->response->setJSON($resp);
    }

    public function POST_add_live_class_link()
    {
        $data = $this->request->getPost();
        $resp = $this->add_live_class_link($data);
        return $this->response->setJSON($resp);
    }

    public function GET_live_classes()
    {
        $data = $this->request->getGet();

        $resp = $this->live_classes($data);
        return $this->response->setJSON($resp);
    }

    public function GET_delete_live_class_link()
    {
        $data = $this->request->getGet();

        $resp = $this->delete_live_class_link($data);
        return $this->response->setJSON($resp);
    }

    public function POST_update_live_class_link()
    {
        $data = $this->request->getPost();
        $resp = $this->update_live_class_link($data);
        return $this->response->setJSON($resp);
    }

    public function POST_add_class_and_branches()
    {
        $data = $this->request->getPost();
        $resp = $this->add_class_and_branches($data);
        return $this->response->setJSON($resp);
    }

    public function GET_classes_and_branch()
    {
        $data = $this->request->getGet();
        $resp = $this->classes_and_branch($data);
        return $this->response->setJSON($resp);
    }

    public function GET_get_all_given_answer_anonymous()
    {
        $data = $this->request->getGet();
        $resp = $this->get_all_given_answer_anonymous($data);
        return $this->response->setJSON($resp);
    }

    public function GET_delete_class_and_branches()
    {
        $data = $this->request->getGet();

        $resp = $this->delete_class_and_branches($data);
        return $this->response->setJSON($resp);
    }

    public function GET_delete_branch()
    {
        $data = $this->request->getGet();

        $resp = $this->delete_branch($data);
        return $this->response->setJSON($resp);
    }

    public function GET_update_right_ans()
    {
        $data = $this->request->getGet();

        $resp = $this->update_right_ans($data);
        return $this->response->setJSON($resp);
    }

    public function POST_update_class_and_branches()
    {
        $data = $this->request->getPost();
        $resp = $this->update_class_and_branches($data);
        return $this->response->setJSON($resp);
    }

    public function POST_add_a_test()
    {
        $data = $this->request->getPost();
        $resp = $this->add_a_test($data);
        return $this->response->setJSON($resp);
    }

    public function GET_tests()
    {
        $data = $this->request->getGet();

        $resp = $this->tests($data);
        return $this->response->setJSON($resp);
    }

    public function POST_update_test()
    {
        $data = $this->request->getPost();
        $resp = $this->update_test($data);
        return $this->response->setJSON($resp);
    }

    public function GET_delete_test()
    {
        $data = $this->request->getGet();

        $resp = $this->delete_test($data);
        return $this->response->setJSON($resp);
    }

    public function POST_add_roll_and_class()
    {
        $data = $this->request->getPost();
        $resp = $this->add_roll_and_class($data);
        return $this->response->setJSON($resp);
    }

    public function GET_live_class_by_student_id()
    {
        $data = $this->request->getGet();

        $resp = $this->live_class_by_student_id($data);
        return $this->response->setJSON($resp);
    }

    public function GET_tests_by_student_id()
    {
        $data = $this->request->getGet();

        $resp = $this->tests_by_student_id($data);
        return $this->response->setJSON($resp);
    }

    public function GET_test_for_anonymous()
    {
        $data = $this->request->getGet();

        $resp = $this->test_for_anonymous($data);
        return $this->response->setJSON($resp);
    }

    public function GET_get_all_given_answer()
    {
        $data = $this->request->getGet();

        $resp = $this->get_all_given_answer($data);
        return $this->response->setJSON($resp);
    }


    public function GET_get_unique_user_from_student_submission()
    {
        $data = $this->request->getGet();

        $resp = $this->get_unique_user_from_student_submission($data);
        return $this->response->setJSON($resp);
    }



}