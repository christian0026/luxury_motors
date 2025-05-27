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
    $routes->get('login', 'AdminAuth::login');
    $routes->post('login', 'AdminAuth::loginPost');
    $routes->get('logout', 'AdminAuth::logout');
    $routes->get('dashboard', 'Admin::dashboard', ['filter' => 'adminAuth']);
    $routes->group('cars', ['filter' => 'adminAuth'], function($routes) {
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

// Admin routes
$routes->get('admin/login', 'AdminAuth::index');
$routes->post('admin/login', 'AdminAuth::login');
$routes->get('admin/logout', 'AdminAuth::logout');

// Protected admin routes
$routes->group('admin', ['filter' => 'adminAuth'], function($routes) {
    $routes->get('dashboard', 'Admin::dashboard');
    $routes->get('cars', 'Admin::cars');
    $routes->get('cars/add', 'Admin::addCar');
    $routes->post('cars/add', 'Admin::addCar');
    $routes->get('cars/edit/(:num)', 'Admin::editCar/$1');
    $routes->post('cars/edit/(:num)', 'Admin::editCar/$1');
    $routes->get('cars/delete/(:num)', 'Admin::deleteCar/$1');
});