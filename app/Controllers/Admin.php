<?php

namespace App\Controllers;

use App\Models\CarsModel;
use App\Models\CarImagesModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Admin extends BaseController
{
    protected $carsModel;
    protected $carImagesModel;
    protected $helpers = ['form', 'url'];

    public function __construct()
    {
        $this->carsModel = new CarsModel();
        $this->carImagesModel = new CarImagesModel();
    }

    public function dashboard()
    {
        $data = [
            'title' => 'Admin Dashboard',
            'total_cars' => $this->carsModel->countAll(),
            'featured_cars' => $this->carsModel->where('featured', 1)->countAllResults(),
            'sold_cars' => $this->carsModel->where('sold', 1)->countAllResults()
        ];

        return view('admin/dashboard', $data);
    }

    public function cars()
    {
        $data = [
            'title' => 'Manage Cars',
            'cars' => $this->carsModel->findAll()
        ];

        return view('admin/cars/index', $data);
    }

    public function addCar()
    {
        $data = [
            'title' => 'Add New Car',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/cars/add', $data);
    }

    public function saveCar()
    {
        $rules = [
            'make' => 'required|min_length[2]|max_length[100]',
            'model' => 'required|min_length[2]|max_length[100]',
            'year' => 'required|numeric|greater_than[1900]|less_than_equal_to['.(date('Y')+1).']',
            'price' => 'required|numeric',
            'mileage' => 'required|numeric',
            'transmission' => 'required',
            'body_type' => 'required',
            'color' => 'required',
            'engine' => 'required',
            'horsepower' => 'required|numeric',
            'torque' => 'required|numeric',
            'top_speed' => 'required|numeric',
            'acceleration' => 'required',
            'fuel_type' => 'required',
            'doors' => 'required|numeric',
            'seats' => 'required|numeric',
            'description' => 'required',
            'featured_image' => 'uploaded[featured_image]|max_size[featured_image,10240]|is_image[featured_image]',
            'gallery_images' => 'permit_empty',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $carData = [
            'make' => $this->request->getPost('make'),
            'model' => $this->request->getPost('model'),
            'year' => $this->request->getPost('year'),
            'price' => $this->request->getPost('price'),
            'mileage' => $this->request->getPost('mileage'),
            'transmission' => $this->request->getPost('transmission'),
            'body_type' => $this->request->getPost('body_type'),
            'color' => $this->request->getPost('color'),
            'engine' => $this->request->getPost('engine'),
            'horsepower' => $this->request->getPost('horsepower'),
            'torque' => $this->request->getPost('torque'),
            'top_speed' => $this->request->getPost('top_speed'),
            'acceleration' => $this->request->getPost('acceleration'),
            'fuel_type' => $this->request->getPost('fuel_type'),
            'doors' => $this->request->getPost('doors'),
            'seats' => $this->request->getPost('seats'),
            'description' => $this->request->getPost('description'),
            'featured' => $this->request->getPost('featured') ? 1 : 0,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $carId = $this->carsModel->insert($carData);

        // Handle image uploads
        $carDir = ROOTPATH . 'public/assets/images/cars/' . $carId . '/';
        if (!is_dir($carDir)) mkdir($carDir, 0777, true);

        // Featured image
        $featured = $this->request->getFile('featured_image');
        if ($featured && $featured->isValid() && !$featured->hasMoved()) {
            $featured->move($carDir, 'featured.jpg', true);
        }

        // Gallery images
        $gallery = $this->request->getFiles('gallery_images');
        if ($gallery && isset($gallery['gallery_images'])) {
            $i = 1;
            foreach ($gallery['gallery_images'] as $img) {
                if ($img->isValid() && !$img->hasMoved() && $i <= 6) {
                    $img->move($carDir, $i . '.jpg', true);
                    $i++;
                }
            }
        }

        return redirect()->to('/admin/cars')->with('message', 'Car added successfully');
    }

    public function editCar($id)
    {
        $car = $this->carsModel->find($id);
        if (!$car) {
            throw new PageNotFoundException('Car not found');
        }
        $carDir = FCPATH . 'assets/images/cars/' . $car['id'] . '/';
        $featuredImage = file_exists($carDir . 'featured.jpg') ? '/assets/images/cars/' . $car['id'] . '/featured.jpg' : '';
        $galleryImages = [];
        for ($i = 1; $i <= 6; $i++) {
            $imgPath = $carDir . $i . '.jpg';
            if (file_exists($imgPath)) {
                $galleryImages[] = '/assets/images/cars/' . $car['id'] . '/' . $i . '.jpg';
            }
        }
        $data = [
            'title' => 'Edit Car',
            'car' => $car,
            'featuredImage' => $featuredImage,
            'galleryImages' => $galleryImages,
            'validation' => \Config\Services::validation()
        ];
        return view('admin/cars/edit', $data);
    }

    public function updateCar($id)
    {
        $car = $this->carsModel->find($id);
        if (!$car) {
            throw new PageNotFoundException('Car not found');
        }
        $rules = [
            'make' => 'required|min_length[2]|max_length[100]',
            'model' => 'required|min_length[2]|max_length[100]',
            'year' => 'required|numeric|greater_than[1900]|less_than_equal_to['.(date('Y')+1).']',
            'price' => 'required|numeric',
            'mileage' => 'required|numeric',
            'transmission' => 'required',
            'body_type' => 'required',
            'color' => 'required',
            'engine' => 'required',
            'horsepower' => 'required|numeric',
            'torque' => 'required|numeric',
            'top_speed' => 'required|numeric',
            'acceleration' => 'required',
            'fuel_type' => 'required',
            'doors' => 'required|numeric',
            'seats' => 'required|numeric',
            'description' => 'required',
            'featured_image' => 'permit_empty|uploaded[featured_image]|max_size[featured_image,10240]|is_image[featured_image]',
            'gallery_images' => 'permit_empty',
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $carData = [
            'make' => $this->request->getPost('make'),
            'model' => $this->request->getPost('model'),
            'year' => $this->request->getPost('year'),
            'price' => $this->request->getPost('price'),
            'mileage' => $this->request->getPost('mileage'),
            'transmission' => $this->request->getPost('transmission'),
            'body_type' => $this->request->getPost('body_type'),
            'color' => $this->request->getPost('color'),
            'engine' => $this->request->getPost('engine'),
            'horsepower' => $this->request->getPost('horsepower'),
            'torque' => $this->request->getPost('torque'),
            'top_speed' => $this->request->getPost('top_speed'),
            'acceleration' => $this->request->getPost('acceleration'),
            'fuel_type' => $this->request->getPost('fuel_type'),
            'doors' => $this->request->getPost('doors'),
            'seats' => $this->request->getPost('seats'),
            'description' => $this->request->getPost('description'),
            'featured' => $this->request->getPost('featured') ? 1 : 0,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->carsModel->update($id, $carData);
        $carDir = ROOTPATH . 'public/assets/images/cars/' . $id . '/';
        if (!is_dir($carDir)) mkdir($carDir, 0777, true);
        // Featured image
        $featured = $this->request->getFile('featured_image');
        if ($featured && $featured->isValid() && !$featured->hasMoved()) {
            $featured->move($carDir, 'featured.jpg', true);
        }
        // Gallery images
        $gallery = $this->request->getFiles('gallery_images');
        if ($gallery && isset($gallery['gallery_images'])) {
            // Remove old gallery images
            for ($i = 1; $i <= 6; $i++) {
                $imgPath = $carDir . $i . '.jpg';
                if (file_exists($imgPath)) {
                    unlink($imgPath);
                }
            }
            $i = 1;
            foreach ($gallery['gallery_images'] as $img) {
                if ($img->isValid() && !$img->hasMoved() && $i <= 6) {
                    $img->move($carDir, $i . '.jpg', true);
                    $i++;
                }
            }
        }
        return redirect()->to('/admin/cars')->with('message', 'Car updated successfully');
    }

    public function deleteCar($id)
    {
        $car = $this->carsModel->find($id);
        if (!$car) {
            throw new PageNotFoundException('Car not found');
        }

        // Delete associated images
        $images = $this->carImagesModel->where('car_id', $id)->findAll();
        foreach ($images as $image) {
            if (file_exists(ROOTPATH . 'public/' . $image['image_path'])) {
                unlink(ROOTPATH . 'public/' . $image['image_path']);
            }
        }

        $this->carImagesModel->where('car_id', $id)->delete();
        $this->carsModel->delete($id);

        return redirect()->to('/admin/cars')->with('message', 'Car deleted successfully');
    }

    public function deleteImage($carId, $type, $index = null)
    {
        $carDir = ROOTPATH . 'public/assets/images/cars/' . $carId . '/';
        if ($type === 'featured') {
            $imgPath = $carDir . 'featured.jpg';
        } elseif ($type === 'gallery' && $index) {
            $imgPath = $carDir . $index . '.jpg';
        } else {
            return redirect()->back()->with('error', 'Invalid image type.');
        }
        if (file_exists($imgPath)) {
            unlink($imgPath);
            return redirect()->back()->with('message', 'Image removed.');
        }
        return redirect()->back()->with('error', 'Image not found.');
    }

    protected function setPrimaryImage($carId)
    {
        $hasPrimary = $this->carImagesModel->where(['car_id' => $carId, 'is_primary' => 1])->first();
        if (!$hasPrimary) {
            $firstImage = $this->carImagesModel->where('car_id', $carId)->first();
            if ($firstImage) {
                $this->carImagesModel->update($firstImage['id'], ['is_primary' => 1]);
            }
        }
    }
}