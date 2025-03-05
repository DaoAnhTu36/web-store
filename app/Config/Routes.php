<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Portal\HomeController::index');
$routes->get('/home', 'Portal\HomeController::index');

$routes->group('admin', function ($routes) {

    // Routes cho Dashboard
    $routes->group('dashboard', function ($routes) {
        $routes->get('/', 'Admin\DashboardController::index');
    });

    // Routes cho Product
    $routes->group('product', function ($routes) {
        $routes->get('/', 'Admin\ProductController::index');
        $routes->get('create', 'Admin\ProductController::create');
        $routes->post('insert', 'Admin\ProductController::insert');
        $routes->get('detail/(:num)', 'Admin\ProductController::detail/$1');
        $routes->post('edit/(:num)', 'Admin\ProductController::edit/$1');
        $routes->get('delete/(:num)', 'Admin\ProductController::delete/$1');
    });

    // Routes cho Category
    $routes->group('category', function ($routes) {
        $routes->get('/', 'Admin\CategoryController::index');
        $routes->get('create', 'Admin\CategoryController::create');
        $routes->post('insert', 'Admin\CategoryController::insert');
        $routes->get('detail/(:num)', 'Admin\CategoryController::detail/$1');
        $routes->post('edit/(:num)', 'Admin\CategoryController::edit/$1');
        $routes->get('delete/(:num)', 'Admin\CategoryController::delete/$1');
    });
});
