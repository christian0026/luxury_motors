<?php

namespace App\Models;

use CodeIgniter\Model;

class CarsModel extends Model
{
    protected $table = 'cars';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'make', 'model', 'year', 'price', 'mileage', 'transmission', 
        'body_type', 'color', 'engine', 'horsepower', 'torque', 
        'top_speed', 'acceleration', 'fuel_type', 'doors', 'seats', 
        'description', 'featured', 'sold'
    ];

    public function getFilteredCars(array $filters = [])
    {
        $builder = $this->builder();
        
        // Apply filters
        if (!empty($filters['make'])) {
            $builder->where('make', $filters['make']);
        }
        
        if (!empty($filters['model'])) {
            $builder->like('model', $filters['model']);
        }
        
        if (!empty($filters['min_price'])) {
            $builder->where('price >=', (float)str_replace(['$', ','], '', $filters['min_price']));
        }
        
        if (!empty($filters['max_price'])) {
            $builder->where('price <=', (float)str_replace(['$', ','], '', $filters['max_price']));
        }
        
        if (!empty($filters['min_year'])) {
            $builder->where('year >=', $filters['min_year']);
        }
        
        if (!empty($filters['max_year'])) {
            $builder->where('year <=', $filters['max_year']);
        }
        
        if (!empty($filters['body_type'])) {
            $builder->where('body_type', $filters['body_type']);
        }
        
        if (!empty($filters['transmission'])) {
            $builder->where('transmission', $filters['transmission']);
        }
        
        if (!empty($filters['color'])) {
            $builder->where('color', $filters['color']);
        }
        
        // Only show available cars
        $builder->where('sold', 0);
        
        return $builder->orderBy('featured', 'DESC')
                      ->orderBy('price', 'DESC')
                      ->get()
                      ->getResultArray();
    }

    public function getFilterOptions()
    {
        $options = [];
        
        // Get distinct makes
        $options['makes'] = $this->builder()
                                ->select('make')
                                ->distinct(true)
                                ->orderBy('make', 'ASC')
                                ->get()
                                ->getResultArray();
        
        // Get distinct body types
        $options['body_types'] = $this->builder()
                                    ->select('body_type')
                                    ->distinct(true)
                                    ->orderBy('body_type', 'ASC')
                                    ->get()
                                    ->getResultArray();
        
        // Get distinct transmissions
        $options['transmissions'] = $this->builder()
                                    ->select('transmission')
                                    ->distinct(true)
                                    ->orderBy('transmission', 'ASC')
                                    ->get()
                                    ->getResultArray();
        
        // Get distinct colors
        $options['colors'] = $this->builder()
                                ->select('color')
                                ->distinct(true)
                                ->orderBy('color', 'ASC')
                                ->get()
                                ->getResultArray();
        
        // Get min and max price
        $minMaxPrice = $this->builder()
                        ->selectMin('price', 'min_price')
                        ->selectMax('price', 'max_price')
                        ->get()
                        ->getRowArray();
        
        $options['min_price'] = $minMaxPrice['min_price'] ?? 0;
        $options['max_price'] = $minMaxPrice['max_price'] ?? 1000000;
        
        // Get min and max year
        $minMaxYear = $this->builder()
                        ->selectMin('year', 'min_year')
                        ->selectMax('year', 'max_year')
                        ->get()
                        ->getRowArray();
        
        $options['min_year'] = $minMaxYear['min_year'] ?? date('Y') - 10;
        $options['max_year'] = $minMaxYear['max_year'] ?? date('Y');
        
        return $options;
    }

    public function getCarWithDetails($id)
    {
        return $this->find($id);
    }

    public function getSimilarCars($make, $excludeId)
    {
        return $this->where('make', $make)
                   ->where('id !=', $excludeId)
                   ->where('sold', 0)
                   ->orderBy('RAND()')
                   ->limit(3)
                   ->findAll();
    }
}