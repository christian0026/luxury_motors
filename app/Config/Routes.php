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