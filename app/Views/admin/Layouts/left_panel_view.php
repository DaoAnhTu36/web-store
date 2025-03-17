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
                    Administrator
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
            <li class="<?= $controller == 'product' || $controller == 'best-selling-management' || $controller == 'price-management' || $controller == 'discount-management' ? 'active' : ''; ?>">
                <a href="javscript:void(0)" title=""><i class="fa fa-lg fa-fw fa-cube"></i><span class="menu-item-parent">Sản phẩm</span></a>
                <ul>
                    <li class="<?= $controller == 'product' && ($method == 'index' || $method == '') ? 'active' : ''; ?>">
                        <a href="<?= site_url('admin/product') ?>" title="">
                            <span class="menu-item-parent">Sản phẩm</span>
                        </a>
                    </li>
                    <li class="<?= $controller == 'best-selling-management' && $method == '' ? 'active' : ''; ?>">
                        <a href="<?= site_url('admin/best-selling-management') ?>" title="">
                            <span class="menu-item-parent">Sản phẩm bán chạy</span>
                        </a>
                    </li>
                    <li class="<?= $controller == 'price-management' && $method == '' ? 'active' : ''; ?>">
                        <a href="<?= site_url('admin/price-management') ?>" title="">
                            <span class="menu-item-parent">Quản lý giá</span>
                        </a>
                    </li>
                    <li class="<?= $controller == 'discount-management' && $method == '' ? 'active' : ''; ?>">
                        <a href="<?= site_url('admin/discount-management') ?>" title="">
                            <span class="menu-item-parent">Khuyến mại</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javscript:void(0)" title=""><i class="fa fa-lg fa-fw fa-cube"></i><span class="menu-item-parent">Kho hàng</span></a>
                <ul>
                    <li class="<?= $controller == 'stock-management' ? 'active open' : ''; ?>">
                        <a href="<?= site_url('admin/stock-management') ?>" title=""></i> <span class="menu-item-parent">Quản lý kho hàng</span></a>
                    </li>
                    <li class="<?= $controller == 'warehouse-management' ? 'active open' : ''; ?>">
                        <a href="<?= site_url('admin/warehouse-management') ?>" title=""></i> <span class="menu-item-parent">Quản lý hàng tồn kho</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javscript:void(0)" title=""><i class="fa fa-lg fa-fw fa-cube"></i><span class="menu-item-parent">Giao dịch</span></a>
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
            <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh" rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
                <i class="fa fa-refresh"></i>
            </span>
        </span>

        <ol class="breadcrumb">
            <li><?= isset($controller) ? $controller : '' ?></li>
            <li><?= isset($method) ? $method : '' ?></li>
        </ol>

    </div>
    <!-- END RIBBON -->