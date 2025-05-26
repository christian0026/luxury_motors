<?php

namespace App\Controllers;

use App\Models\CarsModel;

class Cars extends BaseController
{
    protected $carsModel;

    public function __construct()
    {
        $this->carsModel = new CarsModel();
    }

    public function index()
    {
        try {
            // Get filter parameters from GET request
            $filters = [
                'make' => $this->request->getGet('make'),
                'model' => $this->request->getGet('model'),
                'min_price' => $this->request->getGet('min_price'),
                'max_price' => $this->request->getGet('max_price'),
                'min_year' => $this->request->getGet('min_year'),
                'max_year' => $this->request->getGet('max_year'),
                'body_type' => $this->request->getGet('body_type'),
                'transmission' => $this->request->getGet('transmission'),
                'color' => $this->request->getGet('color')
            ];

            // Get all cars with filters applied
            $cars = $this->carsModel->getFilteredCars($filters);
            
            // Get unique values for filter dropdowns
            $filterOptions = $this->carsModel->getFilterOptions();

            $data = [
                'title' => 'Inventory | Luxury Motors',
                'cars' => $cars,
                'filterOptions' => $filterOptions,
                'filters' => $filters
            ];
            
            return view('templates/header', $data)
                . view('cars/index')
                . view('templates/footer');
        } catch (\Exception $e) {
            // Log the error
            log_message('error', 'Error in Cars controller: ' . $e->getMessage());
            
            // Show a friendly error message to the user
            return view('templates/header', ['title' => 'Error | Luxury Motors'])
                . view('errors/error_page', ['message' => 'We encountered an error loading our inventory. Please try again later.'])
                . view('templates/footer');
        }
    }

    public function view($id = null)
    {
        $car = $this->carsModel->getCarWithDetails($id);
        if (empty($car)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the car with ID: ' . $id);
        }
        // Get all images for the car (featured + up to 6 gallery images)
        $carDir = FCPATH . 'assets/images/cars/' . $car['id'] . '/';
        $images = [];
        if (is_dir($carDir)) {
            if (file_exists($carDir . 'featured.jpg')) {
                $images[] = '/assets/images/cars/' . $car['id'] . '/featured.jpg';
            }
            for ($i = 1; $i <= 6; $i++) {
                $imgPath = $carDir . $i . '.jpg';
                if (file_exists($imgPath)) {
                    $images[] = '/assets/images/cars/' . $car['id'] . '/' . $i . '.jpg';
                }
            }
        }
        $data = [
            'title' => $car['make'] . ' ' . $car['model'] . ' | Luxury Motors',
            'car' => $car,
            'images' => $images,
            'similarCars' => $this->carsModel->getSimilarCars($car['make'], $car['id'])
        ];
        return view('cars/view', $data);
    }
}