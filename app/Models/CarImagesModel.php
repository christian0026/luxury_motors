<?php

namespace App\Models;

use CodeIgniter\Model;

class CarImagesModel extends Model
{
    protected $table = 'car_images';
    protected $primaryKey = 'id';
    protected $allowedFields = ['car_id', 'image_path', 'is_primary'];
    protected $useTimestamps = false;

    public function getPrimaryImage($carId)
    {
        return $this->where(['car_id' => $carId, 'is_primary' => 1])->first();
    }

    public function getCarImages($carId)
    {
        return $this->where('car_id', $carId)->orderBy('is_primary', 'DESC')->findAll();
    }
}