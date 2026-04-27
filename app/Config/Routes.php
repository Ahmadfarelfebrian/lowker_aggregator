<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'JobController::index');
$routes->get('job/(:num)', 'JobController::detail/$1');

$routes->get('fetch', 'FetchController::index');

$routes->get('login', 'AuthController::login');
$routes->post('login/process', 'AuthController::process');
$routes->get('logout', 'AuthController::logout');