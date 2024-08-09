<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseLecturerModel extends Model
{
    protected $table            = 'course_lecturer';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}


// $coure_lecturer_data = [
            //     'uid' => $this->generate_uid(UID_COURSE_LECTURER),
            //     'course_id' => $product_data['uid'],
            //     'user_id' => $data['professor_name'],
            //     'status' => 'active',
            // ];

            // use App\Models\CourseLecturerModel;

             // $CourseLecturerModel = new CourseLecturerModel();