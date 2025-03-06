<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Portal\HomeController::index');
$routes->get('/home', 'Portal\HomeController::index');


$routes->group('admin', function ($routes) {

    $routes->get('language/(:segment)', 'Admin\LanguageController::switch/$1');

    // Routes cho Dashboard
    $routes->group('dashboard', function ($routes) {
        $routes->get('/', 'Admin\DashboardController::index');
    });

    // Routes cho Product
    $routes->group('product', function ($routes) {
        $routes->get('/', 'Admin\ProductController::index');

        $routes->get('createView', 'Admin\ProductController::createView');
        $routes->post('createMethod', 'Admin\ProductController::createMethod');

        $routes->get('detailView/(:num)', 'Admin\ProductController::detailView/$1');

        $routes->get('updateView/(:num)', 'Admin\ProductController::updateView/$1');
        $routes->post('updateMethod/(:num)', 'Admin\ProductController::updateMethod/$1');

        $routes->get('deleteViewMethod/(:num)', 'Admin\ProductController::deleteViewMethod/$1');
    });

    // Routes cho Category
    $routes->group('category', function ($routes) {
        $routes->get('/', 'Admin\CategoryController::index');

        $routes->get('createView', 'Admin\CategoryController::createView');
        $routes->post('createMethod', 'Admin\CategoryController::createMethod');

        $routes->get('detailView/(:num)', 'Admin\CategoryController::detailView/$1');

        $routes->get('updateView/(:num)', 'Admin\CategoryController::updateView/$1');
        $routes->post('updateMethod/(:num)', 'Admin\CategoryController::updateMethod/$1');

        $routes->get('deleteViewMethod/(:num)', 'Admin\CategoryController::deleteViewMethod/$1');
    });
});
