<?php

namespace App\Controllers;

use App\Models\CarsModel;

class Test extends BaseController
{
    public function index()
    {
        $carsModel = new CarsModel();
        $cars = $carsModel->findAll();
        
        echo '<pre>';
        print_r($cars);
        echo '</pre>';
    }
}