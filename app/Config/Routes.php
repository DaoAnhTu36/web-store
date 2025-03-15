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
    $routes->get('best-selling-management', 'Admin\BestSellingProductController::index');
    $routes->get('price-management', 'Admin\ProductPriceController::index');
    $routes->get('discount-management', 'Admin\ProductDiscountController::index');
    $routes->get('stock-management', 'Admin\StockController::index');
    $routes->get('warehouse-management', 'Admin\WarehouseController::index');
    $routes->group('product', function ($routes) {
        $routes->get('/', 'Admin\ProductController::index');
        $routes->get('create', 'Admin\ProductController::create');
        $routes->post('save', 'Admin\ProductController::save');
        $routes->get('detail/(:num)', 'Admin\ProductController::detail/$1');
        $routes->post('update/(:num)', 'Admin\ProductController::update/$1');
        $routes->delete('delete/(:num)', 'Admin\ProductController::delete/$1');
    });
    $routes->group('category', function ($routes) {
        $routes->get('/', 'Admin\CategoryController::index');
        $routes->get('create', 'Admin\CategoryController::create');
        $routes->post('save', 'Admin\CategoryController::save');
        $routes->get('detail/(:num)', 'Admin\CategoryController::detail/$1');
        $routes->post('update/(:num)', 'Admin\CategoryController::update/$1');
        $routes->delete('delete/(:num)', 'Admin\CategoryController::delete/$1');
    });
    $routes->group('order', function ($routes) {
        $routes->get('', 'Admin\OrderController::indexView');
    });
    $routes->group('transaction', function ($routes) {
        $routes->get('/', 'Admin\TransactionController::index');
        $routes->get('create', 'Admin\TransactionController::create');
        $routes->post('save', 'Admin\TransactionController::save');
        $routes->get('detail/(:num)', 'Admin\TransactionController::detail/$1');
        $routes->post('update/(:num)', 'Admin\TransactionController::update/$1');
        $routes->delete('delete/(:num)', 'Admin\TransactionController::delete/$1');
        $routes->get('export-list', 'Admin\TransactionController::importList');
        $routes->get('import-list', 'Admin\TransactionController::exportList');
    });

    $routes->group('supplier', function ($routes) {
        $routes->get('/', 'Admin\SupplierController::index');
        $routes->get('create', 'Admin\SupplierController::create');
        $routes->post('save', 'Admin\SupplierController::save');
        $routes->get('detail/(:num)', 'Admin\SupplierController::detail/$1');
        $routes->post('update/(:num)', 'Admin\SupplierController::update/$1');
        $routes->delete('delete/(:num)', 'Admin\SupplierController::delete/$1');
    });

    $routes->group('customer', function ($routes) {
        $routes->get('/', 'Admin\CustomerController::index');
        $routes->get('create', 'Admin\CustomerController::create');
        $routes->post('save', 'Admin\CustomerController::save');
        $routes->get('detail/(:num)', 'Admin\CustomerController::detail/$1');
        $routes->post('update/(:num)', 'Admin\CustomerController::update/$1');
        $routes->delete('delete/(:num)', 'Admin\CustomerController::delete/$1');
    });
});
