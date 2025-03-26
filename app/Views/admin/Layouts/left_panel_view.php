<?php

$string = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
$path_array =  preg_split('/\/+/', $string, -1, PREG_SPLIT_NO_EMPTY);
$controller = isset($path_array[1]) ? $path_array[1] : '';
$method = isset($path_array[2]) ? $path_array[2] : '';
?>

<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS variables -->
<aside id="left-panel">

    <!-- User info -->
    <div class="login-info">
        <span> <!-- User image size is adjusted inside CSS, it should stay as it -->

            <a href="<?= site_url('admin/dashboard') ?>" id="show-shortcut" data-action="toggleShortcut">
                <img src="<?= base_url($libUrl . '/img/avatars/android-chrome-512x512.png'); ?>" alt="me" class="online" />
                <span>
                    <?= session()->get('full_name') ?>
                </span>
                <i class="fa fa-angle-down"></i>
            </a>

        </span>
    </div>
    <!-- end user info -->

    <!-- NAVIGATION : This navigation is also responsive-->
    <nav>
        <ul>
            <li class="<?= $controller == 'dashboard' ? 'active open' : ''; ?>">
                <a href="<?= site_url('admin/dashboard') ?>" title=""><i class="fa fa-lg fa-fw fa-cube"></i> <span class="menu-item-parent">Dashboard</span></a>
            </li>
            <li class="<?= $controller == 'category' ? 'active' : ''; ?>">
                <a href="<?= site_url('admin/category') ?>" title="">
                    <i class="fa fa-lg fa-fw fa-cube"></i><span class="menu-item-parent">Danh mục</span>
                </a>
            </li>
            <li class="<?= $controller == 'product' ? 'active' : ''; ?>">
                <a title=""><i class="fa fa-lg fa-fw fa-cube"></i><span class="menu-item-parent">Sản phẩm</span></a>
                <ul>
                    <li class="<?= $controller == 'product' && ($method == 'index' || $method == '') ? 'active' : ''; ?>">
                        <a href="<?= site_url('admin/product') ?>" title="">
                            <span class="menu-item-parent">Sản phẩm</span>
                        </a>
                    </li>
                    <li class="<?= $controller == 'product' && $method == 'best-selling-management' ? 'active' : ''; ?>">
                        <a href="<?= site_url('admin/product/best-selling-management') ?>" title="">
                            <span class="menu-item-parent">Sản phẩm bán chạy</span>
                        </a>
                    </li>
                    <li class="<?= $controller == 'product' && $method == 'price-management' ? 'active' : ''; ?>">
                        <a href="<?= site_url('admin/product/price-management') ?>" title="">
                            <span class="menu-item-parent">Quản lý giá sản phẩm</span>
                        </a>
                    </li>
                    <li class="<?= $controller == 'product-discount' ? 'active' : ''; ?>">
                        <a href="<?= site_url('admin/product-discount') ?>" title="">
                            <span class="menu-item-parent">Sản phẩm khuyến mại</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="<?= $controller == 'product-attributes' ? 'active' : ''; ?>">
                <a href="<?= site_url('admin/product-attributes/index') ?>" title=""><i class="fa fa-lg fa-fw fa-cube"></i>
                    <span class="menu-item-parent">Thuộc tính sản phẩm</span>
                </a>
            </li>
            <li>
                <a title=""><i class="fa fa-lg fa-fw fa-cube"></i><span class="menu-item-parent">Chương trình KM</span></a>
                <ul>
                    <li class="<?= $controller == 'discount' ? 'active open' : ''; ?>">
                        <a href="<?= site_url('admin/discount') ?>" title=""></i>
                            <span class="menu-item-parent">Danh sách chương trình</span>
                        </a>
                    </li>
                    <li class="<?= $controller == 'discount-type' ? 'active open' : ''; ?>">
                        <a href="<?= site_url('admin/discount-type') ?>" title=""></i>
                            <span class="menu-item-parent">Loại khuyến mại</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a title=""><i class="fa fa-lg fa-fw fa-cube"></i><span class="menu-item-parent">Kho hàng</span></a>
                <ul>
                    <li class="<?= $controller == 'warehouse' ? 'active open' : ''; ?>">
                        <a href="<?= site_url('admin/warehouse') ?>" title=""></i> <span class="menu-item-parent">Danh sách kho hàng</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a title=""><i class="fa fa-lg fa-fw fa-cube"></i><span class="menu-item-parent">Giao dịch</span></a>
                <ul>
                    <li class="<?= $controller == 'transaction' && $method == 'create' ? 'active open' : ''; ?>">
                        <a href="<?= site_url('admin/transaction/create') ?>" title=""></i> <span class="menu-item-parent">Thêm mới</span></a>
                    </li>
                    <li class="<?= $controller == 'transaction' && $method == 'import-list' ? 'active open' : ''; ?>">
                        <a href="<?= site_url('admin/transaction/import-list') ?>" title=""></i> <span class="menu-item-parent">Giao dịch nhập hàng</span></a>
                    </li>
                    <li class="<?= $controller == 'transaction' && $method == 'export-list' ? 'active open' : ''; ?>">
                        <a href="<?= site_url('admin/transaction/export-list') ?>" title=""></i> <span class="menu-item-parent">Giao dịch xuất hàng</span></a>
                    </li>
                </ul>
            </li>
            <li class="<?= $controller == 'order' ? 'active' : ''; ?>">
                <a href="<?= site_url('admin/order') ?>" title=""><i class="fa fa-lg fa-fw fa-cube"></i><span class="menu-item-parent">Đơn hàng</span></a>
            </li>
            <li class="<?= $controller == 'customer' ? 'active' : ''; ?>">
                <a href="<?= site_url('admin/customer') ?>" title=""><i class="fa fa-lg fa-fw fa-cube"></i><span class="menu-item-parent">Khách hàng</span></a>
            </li>
            <li class="<?= $controller == 'supplier' ? 'active' : ''; ?>">
                <a href="<?= site_url('admin/supplier') ?>" title=""><i class="fa fa-lg fa-fw fa-cube"></i><span class="menu-item-parent">Nhà cung cấp</span></a>
            </li>
            <li class="<?= $controller == 'account' ? 'active' : ''; ?>">
                <a href="<?= site_url('admin/account') ?>" title=""><i class="fa fa-lg fa-fw fa-cube"></i><span class="menu-item-parent">Quản trị viên</span></a>
            </li>
            <li>
                <a title=""><i class="fa fa-lg fa-fw fa-cube"></i><span class="menu-item-parent">Quản lý quyền truy cập</span></a>
                <ul>
                    <li class="<?= $controller == 'role' || $controller == 'role-permission' ? 'active open' : ''; ?>">
                        <a href="<?= site_url('admin/role') ?>" title=""></i> <span class="menu-item-parent">Vai trò/Chức vụ</span></a>
                    </li>
                    <li class="<?= $controller == 'permission' ? 'active open' : ''; ?>">
                        <a href="<?= site_url('admin/permission') ?>" title=""></i> <span class="menu-item-parent">Quyền truy cập</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a title=""><i class="fa fa-lg fa-fw fa-cube"></i><span class="menu-item-parent">Cấu hình website</span></a>
                <ul>
                    <li class="<?= $controller == 'route' ? 'active open' : ''; ?>">
                        <a href="<?= site_url('admin/route') ?>" title=""></i> <span class="menu-item-parent">Routes</span></a>
                    </li>
                    <li class="<?= $controller == 'website-config' ? 'active open' : ''; ?>">
                        <a href="<?= site_url('admin/website-config') ?>" title=""></i> <span class="menu-item-parent">Settings</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>


    <span class="minifyme" data-action="minifyMenu">
        <i class="fa fa-arrow-circle-left hit"></i>
    </span>

</aside>
<!-- END NAVIGATION -->
<!-- MAIN PANEL -->
<div id="main" role="main">

    <!-- RIBBON -->
    <div id="ribbon">

        <span class="ribbon-button-alignment">
            <span id="refresh" class="btn btn-ribbon">
                <i class="fa fa-refresh" onclick="return window.location.reload()"></i>
            </span>
        </span>

        <ol class="breadcrumb">
            <li><?= isset($controller) ? $controller : '' ?></li>
            <li><?= isset($method) ? $method : '' ?></li>
        </ol>

    </div>
    <!-- END RIBBON -->