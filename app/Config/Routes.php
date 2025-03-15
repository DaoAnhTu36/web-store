<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Portal\HomeController::index');
$routes->get('/home', 'Portal\HomeController::index');
$routes->post('/upload', 'Admin\UploadController::uploadImage');
$routes->get('/manager-file', 'Admin\UploadController::managerFile');
$routes->group('portal', function ($routes) {
    $routes->get('/', 'Portal\HomeController::index');
    $routes->get('product/detail_product/(:num)', 'Portal\ProductController::detail_product/$1');
});

$routes->group('admin', function ($routes) {
    $routes->get('dashboard', 'Admin\DashboardController::index');
    $routes->get('language/(:segment)', 'Admin\LanguageController::switch/$1');
    $routes->get('best-selling-management', 'Admin\BestSellingProductController::indexView');
    $routes->get('price-management', 'Admin\ProductPriceController::indexView');
    $routes->get('discount-management', 'Admin\ProductDiscountController::indexView');
    $routes->get('stock-management', 'Admin\StockController::indexView');
    $routes->get('warehouse-management', 'Admin\WarehouseController::indexView');
    $routes->group('product', function ($routes) {
        $routes->get('/', 'Admin\ProductController::index');
        $routes->get('createView', 'Admin\ProductController::createView');
        $routes->post('createMethod', 'Admin\ProductController::createMethod');
        $routes->get('detailView/(:num)', 'Admin\ProductController::detailView/$1');
        $routes->get('updateView/(:num)', 'Admin\ProductController::updateView/$1');
        $routes->post('updateMethod/(:num)', 'Admin\ProductController::updateMethod/$1');
        $routes->get('deleteViewMethod/(:num)', 'Admin\ProductController::deleteViewMethod/$1');
    });
    $routes->group('category', function ($routes) {
        $routes->get('/', 'Admin\CategoryController::index');
        $routes->get('createView', 'Admin\CategoryController::createView');
        $routes->post('createMethod', 'Admin\CategoryController::createMethod');
        $routes->get('detailView/(:num)', 'Admin\CategoryController::detailView/$1');
        $routes->get('updateView/(:num)', 'Admin\CategoryController::updateView/$1');
        $routes->post('updateMethod/(:num)', 'Admin\CategoryController::updateMethod/$1');
        $routes->get('deleteViewMethod/(:num)', 'Admin\CategoryController::deleteViewMethod/$1');
    });
    $routes->group('order', function ($routes) {
        $routes->get('', 'Admin\OrderController::indexView');
    });
});
