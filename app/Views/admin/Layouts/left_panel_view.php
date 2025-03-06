<?php

$string = $_SERVER['PATH_INFO'];
$path_array =  preg_split('/\/+/', $string, -1, PREG_SPLIT_NO_EMPTY);
$controller = $path_array[1];
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
            <li class="<?= $controller == 'category' ? 'active open' : ''; ?>">
                <a href="#" title=""><i class="fa fa-lg fa-fw fa-cube"></i> <span class="menu-item-parent">Danh mục</span></a>
                <ul>
                    <li class="<?= $controller == 'category' && ($method == 'index' || $method == '') ? 'active' : ''; ?>">
                        <a href="<?= site_url('admin/category') ?>" title=""><span class="menu-item-parent">Danh mục</span></a>
                    </li>
                    <li class="<?= $controller == 'category' && $method == 'createView' ? 'active' : ''; ?>">
                        <a href="<?= site_url('admin/category/createView') ?>" title=""><span class="menu-item-parent">Thêm danh mục mới</span></a>
                    </li>
                </ul>
            </li>
            <li class="<?= $controller == 'product' ? 'active open' : ''; ?>">
                <a href="#" title=""><i class="fa fa-lg fa-fw fa-cube"></i> <span class="menu-item-parent">Sản phẩm</span></a>
                <ul>
                    <li class="<?= $controller == 'product' && ($method == 'index' || $method == '') ? 'active' : ''; ?>">
                        <a href="<?= site_url('admin/product') ?>" title=""><span class="menu-item-parent">Sản phẩm</span></a>
                    </li>
                    <li class="<?= $controller == 'product' && $method == 'createView' ? 'active' : ''; ?>">
                        <a href="<?= site_url('admin/product/createView') ?>" title=""><span class="menu-item-parent">Thêm sản phẩm mới</span></a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="#" title=""><i class="fa fa-lg fa-fw fa-cube"></i> <span class="menu-item-parent">Đơn hàng</span></a>
                <ul>
                    <li>
                        <a href="#" title=""><span class="menu-item-parent">Đơn hàng</span></a>
                    </li>
                    <li>
                        <a href="#" title=""><span class="menu-item-parent">Chi tiết đơn hàng</span></a>
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