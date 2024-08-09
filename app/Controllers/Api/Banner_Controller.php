<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\BannersModel;
use App\Models\PromotionCardModel;
use App\Models\CitiesModel;
use App\Models\CentresModel;
use App\Models\CommonModel;

class Banner_Controller extends Api_Controller
{
    private function add_banner($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Product not added',
            'data' => null
        ];

        $uploadedFiles = $this->request->getFiles();
        if (empty ($uploadedFiles['images'])) {
            $resp['message'] = 'Your Banner Has No Image';
        } else if (empty ($data['bannerLink'])) {
            $resp['message'] = 'Please Add A Link';
        }else {


            $banner_data = [
                'uid' => $this->generate_uid(UID_BANNER),
                'title' => '',
                'description' => '',
                'link' => $data['bannerLink'],
            ];
            
            
            foreach ($uploadedFiles['images'] as $file) {
                $file_src = $this->single_upload($file, PATH_BANNER_IMG);
                $banner_data['img'] = $file_src;
            }
            $BannerModel = new BannersModel();


            // Transaction Start
            $BannerModel->transStart();
            try {
                $BannerModel->insert($banner_data);
                // Commit the transaction if all queries are successful
                $BannerModel->transCommit();
            } catch (\Exception $e) {
                // Rollback the transaction if an error occurs
                $BannerModel->transRollback();
                $resp['message'] = $e->getMessage();
            }

            $resp['status'] = true;
            $resp['message'] = 'Banner added';
            $resp['data'] = ['banner_id' => $banner_data['uid']];
        }
        return $resp;
    }

    private function banners()
    {

        $resp = [
            "status" => false,
            "message" => "Data Not Found",
            "data" => ""
        ];
        
        $BannerModel = new BannersModel();
        $BanneData = $BannerModel
        ->get()
        ->getResultArray();
        $BanneData = !empty($BanneData) ? $BanneData : null;

        $resp = [
            "status" => true,
            "message" => "Data fetched",
            "data" => $BanneData,
        ];
        return $resp; 
    }

    private function delete_banner($data)
    {

        $resp = [
            "status" => false,
            "message" => "Data delete failed",
            "data" => ""
        ];
        $BannerModel = new BannersModel();
        $delete_data = $BannerModel->where('uid', $data['banner_id'])->delete();
        if($delete_data){
            $resp = [
                "status" => true,
                "message" => "Data deleted",
                "data" => "",
            ];
        }
        return $resp;

    }

    private function update_banner($data)
    {
        // $this->prd($data['banner_id']);
        $resp = [
            "status" => false,
            "message" => "Banner Not Found!",
            "data" => $data
        ];
        $BannerModel = new BannersModel();
        try {

            // Selecting the cart with the specified User
            $banner = $BannerModel->where('uid', $data['banner_id'])->first();

            if ($banner) {
                // Cart exists
                $resp['status'] = true;
                $resp['message'] = 'Banner Found';
                $resp['data'] = $banner;
            }
        } catch (\Exception $e) {
            $resp['message'] = $e->getMessage();
        }
        return $resp;

    }

    private function banner_update($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Banner not updated',
            'data' => null
        ];
        
        if (empty ($data['bannerLink'])) {
            $resp['message'] = 'Please Add A Link';
        }else {


            $banner_data = [
                'link' => $data['bannerLink'],
            ];
            
            $uploadedFiles = $this->request->getFiles();
            if(isset($uploadedFiles['images'])){
                foreach ($uploadedFiles['images'] as $file) {
                    $file_src = $this->single_upload($file, PATH_BANNER_IMG);
                    $banner_data['img'] = $file_src;
                }
            }
            
            $BannerModel = new BannersModel();


            // Transaction Start
            $BannerModel->transStart();
            try {
                $BannerModel
                        ->where('uid', $data['banner_id'])
                        ->set($banner_data)
                        ->update();
                $BannerModel->transCommit();
            } catch (\Exception $e) {
                // Rollback the transaction if an error occurs
                $BannerModel->transRollback();
                $resp['message'] = $e->getMessage();
            }

            $resp['status'] = true;
            $resp['message'] = 'Banner Updated';
            $resp['data'] = "";
        }
        return $resp;
    }

    private function update_promotion_card($data)
    {
        // $this->prd($data['banner_id']);
        $resp = [
            "status" => false,
            "message" => "Banner Not Found!",
            "data" => $data
        ];
        $PromotionCardModel = new PromotionCardModel();
        try {

            // Selecting the cart with the specified User
            $card = $PromotionCardModel->first();

            if ($card) {
                // Cart exists
                $resp['status'] = true;
                $resp['message'] = 'Promotion Card Found';
                $resp['data'] = $card;
            }
        } catch (\Exception $e) {
            $resp['message'] = $e->getMessage();
        }
        return $resp;

    }

    private function promotion_card_update($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Banner not updated',
            'data' => null
        ];
        
        
        if (empty ($data['link1'])) {
            $resp['message'] = 'Your Card 1 Has Link';
        } else if (empty ($data['link2'])) {
            $resp['message'] = 'Your Card 2 Has Link';
        } else {


            $card_data = [
                'link1' => $data['link1'],
                'link2' => $data['link2'],
            ];
            
            $uploadedFiles = $this->request->getFiles();
            if(isset($uploadedFiles['images1'])){
                foreach ($uploadedFiles['images1'] as $file) {
                    $file_src = $this->single_upload($file, PATH_PROMOTION_CARD_IMG);
                    $card_data['img1'] = $file_src;
                }
            }
            if(isset($uploadedFiles['images2'])){
                foreach ($uploadedFiles['images2'] as $file) {
                    $file_src = $this->single_upload($file, PATH_PROMOTION_CARD_IMG);
                    $card_data['img2'] = $file_src;
                }
            }

            // $this->prd($card_data);
            
            $PromotionCardModel = new PromotionCardModel();


            // Transaction Start
            $PromotionCardModel->transStart();
            try {
                $PromotionCardModel
                        ->where('uid', $data['card_id'])
                        ->set($card_data)
                        ->update();
                $PromotionCardModel->transCommit();
            } catch (\Exception $e) {
                // Rollback the transaction if an error occurs
                $PromotionCardModel->transRollback();
                $resp['message'] = $e->getMessage();
            }

            $resp['status'] = true;
            $resp['message'] = 'Card Updated';
            $resp['data'] = "";
        }
        return $resp;
    }

    private function add_cities($data)
    {
        $resp = [
            'status' => false,
            'message' => 'City not added',
            'data' => null
        ];

        $uploadedFiles = $this->request->getFiles();
        if (empty ($uploadedFiles['images'])) {
            $resp['message'] = 'This City Has No Image';
        } else if (empty ($data['cityName'])) {
            $resp['message'] = 'Please Add City Name';
        }else {


            $city_data = [
                'uid' => $this->generate_uid(UID_CITY),
                'name' => $data['cityName'],
                'status' => 'active',
            ];
            
            
            foreach ($uploadedFiles['images'] as $file) {
                $file_src = $this->single_upload($file, PATH_CITY_IMG);
                $city_data['img'] = $file_src;
            }
            $CitiesModel = new CitiesModel();


            // Transaction Start
            $CitiesModel->transStart();
            try {
                $CitiesModel->insert($city_data);
                // Commit the transaction if all queries are successful
                $CitiesModel->transCommit();
            } catch (\Exception $e) {
                // Rollback the transaction if an error occurs
                $CitiesModel->transRollback();
                $resp['message'] = $e->getMessage();
            }

            $resp['status'] = true;
            $resp['message'] = 'City added';
            $resp['data'] = ['city_id' => $city_data['uid']];
        }
        return $resp;
    }

    private function cities()
    {

        $resp = [
            "status" => false,
            "message" => "Data Not Found",
            "data" => ""
        ];
        
        $CitiesModel = new CitiesModel();
        $CitiesData = $CitiesModel
        ->get()
        ->getResultArray();
        $CitiesData = !empty($CitiesData) ? $CitiesData : null;

        $resp = [
            "status" => true,
            "message" => "Data fetched",
            "data" => $CitiesData,
        ];
        return $resp; 
    }

    private function delete_city($data)
    {

        $resp = [
            "status" => false,
            "message" => "Data delete failed",
            "data" => ""
        ];
        $CitiesModel = new CitiesModel();
        $delete_data = $CitiesModel->where('uid', $data['city_id'])->delete();
        if($delete_data){
            $resp = [
                "status" => true,
                "message" => "Data deleted",
                "data" => "",
            ];
        }
        return $resp;

    }

    private function update_city($data)
    {
        // $this->prd($data['banner_id']);
        $resp = [
            "status" => false,
            "message" => "City Not Found!",
            "data" => $data
        ];
        $CitiesModel = new CitiesModel();
        try {

            // Selecting the cart with the specified User
            $city = $CitiesModel->where('uid', $data['city_id'])->first();

            if ($city) {
                // Cart exists
                $resp['status'] = true;
                $resp['message'] = 'City Found';
                $resp['data'] = $city;
            }
        } catch (\Exception $e) {
            $resp['message'] = $e->getMessage();
        }
        return $resp;

    }

    private function city_update($data)
    {
        $resp = [
            'status' => false,
            'message' => 'City not updated',
            'data' => null
        ];
        
        if (empty ($data['cityName'])) {
            $resp['message'] = 'Please Add City Name';
        }else {


            $city_data = [
                'name' => $data['cityName'],
            ];
            
            $uploadedFiles = $this->request->getFiles();
            if(isset($uploadedFiles['images'])){
                foreach ($uploadedFiles['images'] as $file) {
                    $file_src = $this->single_upload($file, PATH_CITY_IMG);
                    $city_data['img'] = $file_src;
                }
            }
            
            $CitiesModel = new CitiesModel();


            // Transaction Start
            $CitiesModel->transStart();
            try {
                $CitiesModel
                        ->where('uid', $data['city_id'])
                        ->set($city_data)
                        ->update();
                $CitiesModel->transCommit();
            } catch (\Exception $e) {
                // Rollback the transaction if an error occurs
                $CitiesModel->transRollback();
                $resp['message'] = $e->getMessage();
            }

            $resp['status'] = true;
            $resp['message'] = 'City Updated';
            $resp['data'] = "";
        }
        return $resp;
    }

    private function add_centres($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Centres not added',
            'data' => null
        ];

        $uploadedFiles = $this->request->getFiles();
        if (empty ($uploadedFiles['images'])) {
            $resp['message'] = 'This City Has No Image';
        } else if (empty ($data['centresName'])) {
            $resp['message'] = 'Please Add Centre Name';
        } else if (empty ($data['phone'])) {
            $resp['message'] = 'Please Add Phone No.';
        } else if (empty ($data['location'])) {
            $resp['message'] = 'Please Add Location';
        } else if (empty ($data['city_id'])) {
            $resp['message'] = 'City Not Found';
        } else {


            $centre_data = [
                'uid' => $this->generate_uid(UID_CENTRES),
                'city_id' => $data['city_id'],
                'name' => $data['centresName'],
                'location' => $data['location'],
                'phone' => $data['phone'],
                'status' => 'active',
            ];
            
            
            foreach ($uploadedFiles['images'] as $file) {
                $file_src = $this->single_upload($file, PATH_CENTRE_IMG);
                $centre_data['img'] = $file_src;
            }
            $CentresModel = new CentresModel();


            // Transaction Start
            $CentresModel->transStart();
            try {
                $CentresModel->insert($centre_data);
                // Commit the transaction if all queries are successful
                $CentresModel->transCommit();
            } catch (\Exception $e) {
                // Rollback the transaction if an error occurs
                $CentresModel->transRollback();
                $resp['message'] = $e->getMessage();
            }

            $resp['status'] = true;
            $resp['message'] = 'Centre added';
            $resp['data'] = ['centre_id' => $centre_data['uid']];
        }
        return $resp;
    }

    private function centres($data)
    {

        $resp = [
            "status" => false,
            "message" => "Data Not Found",
            "data" => ""
        ];
        
        // $CentresModel = new CentresModel();
        // $CentreData = $CentresModel
        // ->get()
        // ->getResultArray();
        // $CentreData = !empty($CentreData) ? $CentreData : null;

        $CommonModel = new CommonModel();

        $sql = "SELECT
            centres.uid AS centre_id,
            centres.name AS centre_name,
            centres.img AS centre_img,
            centres.location,
            centres.phone,
            cities.name AS city_name,
            cities.uid AS city_id,
            cities.img AS city_img
        FROM
            centres
        JOIN
            cities ON centres.city_id = cities.uid";

        if (!empty($data['centre_id'])) {
            $centre_id = $data['centre_id'];
            $sql .= " WHERE
                centres.uid = '{$centre_id}';";
        }

        $CentreData = $CommonModel->customQuery($sql);

        $resp = [
            "status" => true,
            "message" => "Data fetched",
            "data" => !empty($data['centre_id']) ? $CentreData[0] : $CentreData,
        ];
        return $resp; 
    }

    private function delete_centre($data)
    {

        $resp = [
            "status" => false,
            "message" => "Data delete failed",
            "data" => ""
        ];
        $CentresModel = new CentresModel();
        $delete_data = $CentresModel->where('uid', $data['centre_id'])->delete();
        if($delete_data){
            $resp = [
                "status" => true,
                "message" => "Data deleted",
                "data" => "",
            ];
        }
        return $resp;

    }

    private function update_centre($data)
    {
        // $this->prd($data['banner_id']);
        $resp = [
            "status" => false,
            "message" => "Centre Not Found!",
            "data" => $data
        ];
        $CentresModel = new CentresModel();
        try {

            // Selecting the cart with the specified User
            $centre = $CentresModel->where('uid', $data['centre_id'])->first();

            if ($city) {
                // Cart exists
                $resp['status'] = true;
                $resp['message'] = 'Centre Found';
                $resp['data'] = $centre;
            }
        } catch (\Exception $e) {
            $resp['message'] = $e->getMessage();
        }
        return $resp;

    }

    private function centre_update($data)
    {
        $resp = [
            'status' => false,
            'message' => 'Centre not updated',
            'data' => null
        ];
        
        if (empty ($data['centresName'])) {
            $resp['message'] = 'Please Add Centre Name';
        } else if (empty ($data['phone'])) {
            $resp['message'] = 'Please Add Phone No.';
        } else if (empty ($data['location'])) {
            $resp['message'] = 'Please Add Location';
        } else if (empty ($data['city_id'])) {
            $resp['message'] = 'City Not Found';
        } else if (empty ($data['centre_id'])) {
            $resp['message'] = 'Centre Not Found';
        } else {

            $centre_data = [
                'city_id' => $data['city_id'],
                'name' => $data['centresName'],
                'location' => $data['location'],
                'phone' => $data['phone'],
            ];
            
            $uploadedFiles = $this->request->getFiles();
            if(isset($uploadedFiles['images'])){
                foreach ($uploadedFiles['images'] as $file) {
                    $file_src = $this->single_upload($file, PATH_CENTRE_IMG);
                    $centre_data['img'] = $file_src;
                }
            }
            
            $CentresModel = new CentresModel();


            // Transaction Start
            $CentresModel->transStart();
            try {
                $CentresModel
                        ->where('uid', $data['centre_id'])
                        ->set($centre_data)
                        ->update();
                $CentresModel->transCommit();
            } catch (\Exception $e) {
                // Rollback the transaction if an error occurs
                $CentresModel->transRollback();
                $resp['message'] = $e->getMessage();
            }

            $resp['status'] = true;
            $resp['message'] = 'Centre Updated';
            $resp['data'] = "";
        }
        return $resp;
    }


    private function citiese_and_centres($data)
    {

        $resp = [
            "status" => false,
            "message" => "Data Not Found",
            "data" => ""
        ];

        $CommonModel = new CommonModel();

        $sql = "SELECT
            cities.uid AS city_id,
            cities.name AS city_name,
            cities.img AS city_img
        FROM
            cities";

        if (!empty($data['city_id'])) {
            $city_id = $data['city_id'];
            $sql .= " WHERE
                cities.uid = '{$city_id}';";
        }

        $CityData = $CommonModel->customQuery($sql);

        if (count($CityData) > 0) {
            $CentresModel = new CentresModel();
            foreach ($CityData as $key => $city) {
                $CityData[$key]->centres_data = $CentresModel->where('city_id', $city->city_id)->findAll();
            }

            $resp = [
                "status" => true,
                "message" => "Data fetched",
                "data" => !empty($data['city_id']) ? $CityData[0] : $CityData,
            ];
        }

        
        return $resp; 
    }
























    public function POST_add_banner()
    {
        $data = $this->request->getPost();
        $resp = $this->add_banner($data);
        return $this->response->setJSON($resp);

    }

    public function GET_banners()
    {
        $data = $this->request->getPost();
        $resp = $this->banners($data);
        return $this->response->setJSON($resp);

    }

    public function GET_delete_banner()
    {
        $data = $this->request->getGet();
        $resp = $this->delete_banner($data);
        return $this->response->setJSON($resp);

    }

    public function GET_update_banner()
    {
        $data = $this->request->getGet();
        $resp = $this->update_banner($data);
        return $this->response->setJSON($resp);

    }

    public function POST_banner_update()
    {
        $data = $this->request->getPost();
        $resp = $this->banner_update($data);
        return $this->response->setJSON($resp);

    }

    public function POST_update_promotion_card()
    {
        $data = $this->request->getGet();
        $resp = $this->update_promotion_card($data);
        return $this->response->setJSON($resp);

    }

    public function POST_promotion_card_update()
    {
        $data = $this->request->getPost();
        $resp = $this->promotion_card_update($data);
        return $this->response->setJSON($resp);

    }

    public function POST_add_cities()
    {
        $data = $this->request->getPost();
        $resp = $this->add_cities($data);
        return $this->response->setJSON($resp);

    }

    public function GET_cities()
    {
        $data = $this->request->getPost();
        $resp = $this->cities($data);
        return $this->response->setJSON($resp);

    }

    public function GET_delete_city()
    {
        $data = $this->request->getGet();
        $resp = $this->delete_city($data);
        return $this->response->setJSON($resp);

    }

    public function GET_update_city()
    {
        $data = $this->request->getGet();
        $resp = $this->update_city($data);
        return $this->response->setJSON($resp);

    }

    public function POST_city_update()
    {
        $data = $this->request->getPost();
        $resp = $this->city_update($data);
        return $this->response->setJSON($resp);

    }

    












    public function POST_add_centres()
    {
        $data = $this->request->getPost();
        $resp = $this->add_centres($data);
        return $this->response->setJSON($resp);

    }

    public function GET_centres()
    {
        $data = $this->request->getGet();
        $resp = $this->centres($data);
        return $this->response->setJSON($resp);

    }

    public function GET_delete_centre()
    {
        $data = $this->request->getGet();
        $resp = $this->delete_centre($data);
        return $this->response->setJSON($resp);

    }

    public function GET_update_centre()
    {
        $data = $this->request->getGet();
        $resp = $this->update_centre($data);
        return $this->response->setJSON($resp);

    }

    public function POST_centre_update()
    {
        $data = $this->request->getPost();
        $resp = $this->centre_update($data);
        return $this->response->setJSON($resp);

    }

    public function GET_citiese_and_centres()
    {
        $data = $this->request->getGet();
        $resp = $this->citiese_and_centres($data);
        return $this->response->setJSON($resp);

    }

}
