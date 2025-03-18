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
    $routes->get('/', 'Admin\DashboardController::index');
    $routes->get('dashboard', 'Admin\DashboardController::index');
    $routes->get('language/(:segment)', 'Admin\LanguageController::switch/$1');
    $routes->group('common', function ($routes) {
        $routes->post('change-status', 'Admin\CommonController::changeStatusRecordCommon');
    });
    $routes->group('warehouse', function ($routes) {
        $routes->get('/', 'Admin\WarehouseController::index');
        $routes->get('create', 'Admin\WarehouseController::create');
        $routes->post('save', 'Admin\WarehouseController::save');
        $routes->get('detail/(:num)', 'Admin\WarehouseController::detail/$1');
        $routes->post('update/(:num)', 'Admin\WarehouseController::update/$1');
        $routes->get('delete/(:num)', 'Admin\WarehouseController::delete/$1');
    });
    $routes->group('product', function ($routes) {
        $routes->get('/', 'Admin\ProductController::index');
        $routes->get('create', 'Admin\ProductController::create');
        $routes->post('save', 'Admin\ProductController::save');
        $routes->get('detail/(:num)', 'Admin\ProductController::detail/$1');
        $routes->post('update/(:num)', 'Admin\ProductController::update/$1');
        $routes->get('delete/(:num)', 'Admin\ProductController::delete/$1');
        $routes->get('best-selling-management', 'Admin\ProductController::bestSellingProduct');
        $routes->get('price-management', 'Admin\ProductController::priceProductManagement');
        $routes->get('discount-management', 'Admin\ProductController::discountProductManagement');
    });
    $routes->group('category', function ($routes) {
        $routes->get('/', 'Admin\CategoryController::index');
        $routes->get('create', 'Admin\CategoryController::create');
        $routes->post('save', 'Admin\CategoryController::save');
        $routes->get('detail/(:num)', 'Admin\CategoryController::detail/$1');
        $routes->post('update/(:num)', 'Admin\CategoryController::update/$1');
        $routes->get('delete/(:num)', 'Admin\CategoryController::delete/$1');
    });
    $routes->group('order', function ($routes) {
        $routes->get('', 'Admin\OrderController::indexView');
    });
    $routes->group('transaction', function ($routes) {
        $routes->get('create', 'Admin\TransactionController::create');
        $routes->post('save', 'Admin\TransactionController::save');
        $routes->get('detail/(:num)', 'Admin\TransactionController::detail/$1');
        $routes->post('update/(:num)', 'Admin\TransactionController::update/$1');
        $routes->get('delete/(:num)', 'Admin\TransactionController::delete/$1');
        $routes->get('export-list', 'Admin\TransactionController::exportList');
        $routes->get('import-list', 'Admin\TransactionController::importList');
    });

    $routes->group('supplier', function ($routes) {
        $routes->get('/', 'Admin\SupplierController::index');
        $routes->get('create', 'Admin\SupplierController::create');
        $routes->post('save', 'Admin\SupplierController::save');
        $routes->get('detail/(:num)', 'Admin\SupplierController::detail/$1');
        $routes->post('update/(:num)', 'Admin\SupplierController::update/$1');
        $routes->get('delete/(:num)', 'Admin\SupplierController::delete/$1');
    });

    $routes->group('customer', function ($routes) {
        $routes->get('/', 'Admin\CustomerController::index');
        $routes->get('create', 'Admin\CustomerController::create');
        $routes->post('save', 'Admin\CustomerController::save');
        $routes->get('detail/(:num)', 'Admin\CustomerController::detail/$1');
        $routes->post('update/(:num)', 'Admin\CustomerController::update/$1');
        $routes->get('delete/(:num)', 'Admin\CustomerController::delete/$1');
    });

    $routes->group('account', function ($routes) {
        $routes->get('customer-list', 'Admin\AccountController::customerList');
        $routes->get('administrator-list', 'Admin\AccountController::administratorList');
        $routes->get('create', 'Admin\AccountController::create');
        $routes->post('save', 'Admin\AccountController::save');
        $routes->get('detail/(:num)', 'Admin\AccountController::detail/$1');
        $routes->post('update/(:num)', 'Admin\AccountController::update/$1');
        $routes->get('delete/(:num)', 'Admin\AccountController::delete/$1');
        $routes->get('login', 'Admin\AccountController::login');
        $routes->get('logout', 'Admin\AccountController::logout');
        $routes->post('sign-in', 'Admin\AccountController::signIn');
        $routes->post('change-status', 'Admin\AccountController::changeStatus');
    });
});
