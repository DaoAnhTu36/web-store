<?php

use CodeIgniter\Router\RouteCollection;
use App\Models\RouteModel;

/**
 * @var RouteCollection $routes
 */

$routeModel = new RouteModel();
$routesConfigs = $routeModel->renderRoute();
function registerRoutes($routes, $configs, $depth = 0, $maxDepth = 10)
{
    if ($depth > $maxDepth) {
        return;
    }

    foreach ($configs as $config) {
        if (isset($config['is_group']) && $config['is_group']) {
            $routes->group($config['uri'], function ($routes) use ($config, $depth, $maxDepth) {
                if (isset($config['children']) && is_array($config['children']) && !empty($config['children'])) {
                    registerRoutes($routes, $config['children'], $depth + 1, $maxDepth);
                }
            });
        } else {
            $method = strtolower($config['method'] ?? 'get');
            $options = [];
            if ($config['is_ignore']) {
                switch ($method) {
                    case 'get':
                        $routes->get($config['uri'], $config['controller']);
                        break;
                    case 'post':
                        $routes->post($config['uri'], $config['controller']);
                        break;
                    case 'put':
                        $routes->put($config['uri'], $config['controller']);
                        break;
                    case 'delete':
                        $routes->delete($config['uri'], $config['controller']);
                        break;
                    default:
                        break;
                }
            } else {
                if (!empty($config['permission_id'])) {
                    $options['filter'] = 'auth:' . $config['permission_id'];
                }

                switch ($method) {
                    case 'get':
                        $routes->get($config['uri'], $config['controller'], $options);
                        break;
                    case 'post':
                        $routes->post($config['uri'], $config['controller'], $options);
                        break;
                    case 'put':
                        $routes->put($config['uri'], $config['controller'], $options);
                        break;
                    case 'delete':
                        $routes->delete($config['uri'], $config['controller'], $options);
                        break;
                    default:
                        break;
                }
            }
        }
    }
}

registerRoutes($routes, $routesConfigs);

// $routes->get('/', 'Portal\HomeController::index');
// $routes->get('/home', 'Portal\HomeController::index');
// $routes->post('/upload', 'Admin\UploadController::uploadImage');
// $routes->get('/manager-file', 'Admin\UploadController::managerFile');

// $routes->group('portal', function ($routes) {
//     $routes->get('/', 'Portal\HomeController::index');
//     $routes->get('product/detail_product/(:num)', 'Portal\ProductController::detail_product/$1');
// });

// $routes->group('admin', function ($routes) {
//     $routes->get('/', 'Admin\DashboardController::index');
//     $routes->get('dashboard', 'Admin\DashboardController::index');
//     $routes->get('language/(:segment)', 'Admin\LanguageController::switch/$1');
//     $routes->group('common', function ($routes) {
//         $routes->post('change-status', 'Admin\CommonController::changeStatusRecordCommon');
//     });

//     $routes->group('warehouse', function ($routes) {
//         $routes->get('/', 'Admin\WarehouseController::index');
//         $routes->get('create', 'Admin\WarehouseController::create');
//         $routes->post('save', 'Admin\WarehouseController::save');
//         $routes->get('detail/(:num)', 'Admin\WarehouseController::detail/$1');
//         $routes->post('update/(:num)', 'Admin\WarehouseController::update/$1');
//         $routes->get('delete/(:num)', 'Admin\WarehouseController::delete/$1');
//     });

//     $routes->group('product', function ($routes) {
//         $routes->get('/', 'Admin\ProductController::index');
//         $routes->get('create', 'Admin\ProductController::create');
//         $routes->post('save', 'Admin\ProductController::save');
//         $routes->get('detail/(:num)', 'Admin\ProductController::detail/$1');
//         $routes->post('update/(:num)', 'Admin\ProductController::update/$1');
//         $routes->get('delete/(:num)', 'Admin\ProductController::delete/$1');
//         $routes->get('best-selling-management', 'Admin\ProductController::bestSellingProduct');
//         $routes->get('price-management', 'Admin\ProductController::priceProductManagement');
//         $routes->get('discount-management', 'Admin\ProductController::discountProductManagement');
//     });

//     $routes->group('category', function ($routes) {
//         $routes->get('/', 'Admin\CategoryController::index');
//         $routes->get('create', 'Admin\CategoryController::create');
//         $routes->post('save', 'Admin\CategoryController::save');
//         $routes->get('detail/(:num)', 'Admin\CategoryController::detail/$1');
//         $routes->post('update/(:num)', 'Admin\CategoryController::update/$1');
//         $routes->get('delete/(:num)', 'Admin\CategoryController::delete/$1');
//     });

//     $routes->group('order', function ($routes) {
//         $routes->get('', 'Admin\OrderController::indexView');
//     });

//     $routes->group('transaction', function ($routes) {
//         $routes->get('create', 'Admin\TransactionController::create');
//         $routes->post('save', 'Admin\TransactionController::save');
//         $routes->get('detail/(:num)', 'Admin\TransactionController::detail/$1');
//         $routes->post('update/(:num)', 'Admin\TransactionController::update/$1');
//         $routes->get('delete/(:num)', 'Admin\TransactionController::delete/$1');
//         $routes->get('export-list', 'Admin\TransactionController::exportList');
//         $routes->get('import-list', 'Admin\TransactionController::importList');
//     });

//     $routes->group('supplier', function ($routes) {
//         $routes->get('/', 'Admin\SupplierController::index');
//         $routes->get('create', 'Admin\SupplierController::create');
//         $routes->post('save', 'Admin\SupplierController::save');
//         $routes->get('detail/(:num)', 'Admin\SupplierController::detail/$1');
//         $routes->post('update/(:num)', 'Admin\SupplierController::update/$1');
//         $routes->get('delete/(:num)', 'Admin\SupplierController::delete/$1');
//     });

//     $routes->group('customer', function ($routes) {
//         $routes->get('/', 'Admin\CustomerController::index');
//         $routes->get('create', 'Admin\CustomerController::create');
//         $routes->post('save', 'Admin\CustomerController::save');
//         $routes->get('detail/(:num)', 'Admin\CustomerController::detail/$1');
//         $routes->post('update/(:num)', 'Admin\CustomerController::update/$1');
//         $routes->get('delete/(:num)', 'Admin\CustomerController::delete/$1');
//     });

//     $routes->group('account', function ($routes) {
//         $routes->get('', 'Admin\AccountController::index');
//         $routes->get('index', 'Admin\AccountController::index');
//         $routes->get('create', 'Admin\AccountController::create');
//         $routes->post('save', 'Admin\AccountController::save');
//         $routes->get('detail/(:num)', 'Admin\AccountController::detail/$1');
//         $routes->post('update/(:num)', 'Admin\AccountController::update/$1');
//         $routes->get('delete/(:num)', 'Admin\AccountController::delete/$1');
//         $routes->get('login', 'Admin\AccountController::login');
//         $routes->get('logout', 'Admin\AccountController::logout');
//         $routes->post('sign-in', 'Admin\AccountController::signIn');
//     });

//     $routes->group('role', function ($routes) {
//         $routes->get('', 'Admin\RoleController::index');
//         $routes->get('index', 'Admin\RoleController::index');
//         $routes->get('create', 'Admin\RoleController::create');
//         $routes->post('save', 'Admin\RoleController::save');
//         $routes->get('detail/(:num)', 'Admin\RoleController::detail/$1');
//         $routes->post('update/(:num)', 'Admin\RoleController::update/$1');
//         $routes->get('delete/(:num)', 'Admin\RoleController::delete/$1');
//     });

//     $routes->group('permission', function ($routes) {
//         $routes->get('', 'Admin\PermissionController::index');
//         $routes->get('index', 'Admin\PermissionController::index');
//         $routes->get('create', 'Admin\PermissionController::create');
//         $routes->post('save', 'Admin\PermissionController::save');
//         $routes->get('detail/(:num)', 'Admin\PermissionController::detail/$1');
//         $routes->post('update/(:num)', 'Admin\PermissionController::update/$1');
//     });

//     $routes->group('role-permission', function ($routes) {
//         $routes->get('', 'Admin\RolePermissionController::index');
//         $routes->get('index', 'Admin\RolePermissionController::index');
//         $routes->get('create', 'Admin\RolePermissionController::create');
//         $routes->post('save', 'Admin\RolePermissionController::save');
//         $routes->get('detail/(:num)', 'Admin\RolePermissionController::detail/$1');
//         $routes->post('update/(:num)', 'Admin\RolePermissionController::update/$1');
//         $routes->post('change-role-permission', 'Admin\RolePermissionController::changeRolePermission');
//     });

//     $routes->group('route', function ($routes) {
//         $routes->get('', 'Admin\RouteController::index');
//         $routes->get('index', 'Admin\RouteController::index');
//         $routes->get('create', 'Admin\RouteController::create');
//         $routes->post('save', 'Admin\RouteController::save');
//         $routes->get('detail/(:num)', 'Admin\RouteController::detail/$1');
//         $routes->post('update/(:num)', 'Admin\RouteController::update/$1');
//     });
// });
