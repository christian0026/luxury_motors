<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/cars', 'Cars::index');
$routes->get('/about', 'Home::about');
$routes->get('/contact', 'Home::contact');
$routes->get('/test', 'Test::index');

// Admin Routes (now public)
$routes->group('admin', function($routes) {
    $routes->get('dashboard', 'Admin::dashboard');
    $routes->group('cars', function($routes) {
        $routes->get('/', 'Admin::cars');
        $routes->get('add', 'Admin::addCar');
        $routes->post('save', 'Admin::saveCar');
        $routes->get('edit/(:num)', 'Admin::editCar/$1');
        $routes->post('update/(:num)', 'Admin::updateCar/$1');
        $routes->get('delete/(:num)', 'Admin::deleteCar/$1');
        $routes->get('delete-image/(:num)/(:segment)/(:num)', 'Admin::deleteImage/$1/$2/$3');
        $routes->get('delete-image/(:num)/(:segment)', 'Admin::deleteImage/$1/$2');
    });
});

// Public Routes
$routes->get('/', 'Home::index');
$routes->get('/cars', 'Cars::index');
$routes->get('/cars/(:num)', 'Cars::view/$1');
$routes->get('/about', 'Home::about');
$routes->get('/contact', 'Home::contact');