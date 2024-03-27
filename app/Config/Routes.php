<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'user\HomeController::index');
$routes->get('shopping', 'user\HomeController::shopping');

$routes->get('error/404', function(){
    return view('errors/html/error_404');
});

$routes->get('login', 'admin\LoginController::index');
$routes->post('login', 'admin\LoginController::login');
$routes->get('logout', 'admin\LoginController::logout');

$routes->group('admin',['filter' => 'adminFilter'], function($routes){
    $routes->get('home', 'admin\HomeController::index');
    $routes->group('user', function($routes){
        $routes->get('list', 'admin\UserController::list');
        $routes->get('add', 'admin\UserController::add');
        $routes->post('create', 'admin\UserController::create');
        $routes->get('edit/(:num)', 'admin\UserController::edit/$1');
        $routes->post('update', 'admin\UserController::update');
        $routes->get('delete/(:num)', 'admin\UserController::delete/$1');
    });
    $routes->group('products', function($routes){
        $routes->get('list', 'admin\ProductsController::list');
        $routes->get('edit/(:num)', 'admin\ProductsController::edit/$1');
        $routes->post('update', 'admin\ProductsController::update');
        $routes->get('delete/(:num)', 'admin\ProductsController::delete/$1');
        $routes->get('add', 'admin\ProductsController::add');
        $routes->post('create', 'admin\ProductsController::create');
    });
});
