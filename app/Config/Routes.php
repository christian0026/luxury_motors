<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/cars', 'Cars::index');
$routes->get('/about', 'Home::about');
$routes->get('/contact', 'Home::contact');
$routes->get('/login', 'Auth::login');
$routes->get('/register', 'Auth::register');
$routes->get('/test', 'Test::index');
// Authentication Routes
$routes->group('', ['filter' => 'csrf'], function($routes) {
    $routes->post('login', 'Auth::login');
    $routes->post('register', 'Auth::register');
});

$routes->get('login', 'Auth::login');
$routes->get('register', 'Auth::register');
$routes->get('logout', 'Auth::logout');

// Admin Routes
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'Admin::dashboard');
    
    $routes->group('cars', function($routes) {
        $routes->get('/', 'Admin::cars');
        $routes->get('add', 'Admin::addCar');
        $routes->post('save', 'Admin::saveCar');
        $routes->get('edit/(:num)', 'Admin::editCar/$1');
        $routes->post('update/(:num)', 'Admin::updateCar/$1');
        $routes->get('delete/(:num)', 'Admin::deleteCar/$1');
        $routes->get('delete-image/(:num)', 'Admin::deleteImage/$1');
    });
});

// Public Routes
$routes->get('/', 'Home::index');
$routes->get('/cars', 'Cars::index');
$routes->get('/cars/(:num)', 'Cars::view/$1');
$routes->get('/about', 'Home::about');
$routes->get('/contact', 'Home::contact');