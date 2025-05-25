<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Luxury Motors | Premium Car Dealership',
            'featuredCars' => $this->getFeaturedCars()
        ];
        
        return view('templates/header', $data)
              . view('home')
              . view('templates/footer');
    }
    
    public function about()
    {
        $data = ['title' => 'About Us | Luxury Motors'];
        return view('templates/header', $data)
              . view('about')
              . view('templates/footer');
    }
    
    public function contact()
    {
        $data = ['title' => 'Contact Us | Luxury Motors'];
        return view('templates/header', $data)
              . view('contact')
              . view('templates/footer');
    }
    
    private function getFeaturedCars()
    {
        // This will later be replaced with database calls
        return [
            [
                'id' => 1,
                'model' => 'Ferrari SF90 Stradale',
                'price' => '$625,000',
                'image' => 'sf90.jpg',
                'year' => 2023,
                'miles' => 500
            ],
            [
                'id' => 2,
                'model' => 'Lamborghini Aventador SVJ',
                'price' => '$517,000',
                'image' => 'svj.jpg',
                'year' => 2022,
                'miles' => 1200
            ],
            [
                'id' => 3,
                'model' => 'McLaren 720S',
                'price' => '$315,000',
                'image' => '720s.jpg',
                'year' => 2021,
                'miles' => 3500
            ]
        ];
    }
}