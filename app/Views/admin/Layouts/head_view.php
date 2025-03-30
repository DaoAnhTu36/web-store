<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">

    <title> <?= session()->get('web_configs')['site_name_admin'] . ' - ' . $title ?> </title>
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url($libUrl . '/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url($libUrl . '/css/font-awesome.min.css'); ?>">

    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url($libUrl . '/css/smartadmin-production-plugins.min.css'); ?>">
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url($libUrl . '/css/smartadmin-production.min.css'); ?>">
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url($libUrl . '/css/smartadmin-skins.min.css'); ?>">

    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url($libUrl . '/css/smartadmin-rtl.min.css'); ?>">

    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url($libUrl . '/css/demo.min.css'); ?>">
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url($libUrl . '/css/custom.css'); ?>">
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url($libUrl . '/css/toastify.min.css'); ?>">
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url($libUrl . '/css/toastr.min.css'); ?>">

    <link rel="shortcut icon" href="<?php echo isset(session()->get('web_configs')['logo']) ? session()->get('web_configs')['logo'] : ''; ?>" type="image/x-icon">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

    <link rel="apple-touch-icon" href="<?= base_url($libUrl . '/img/splash/sptouch-icon-iphone.png'); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url($libUrl . '/img/splash/touch-icon-ipad.png'); ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url($libUrl . '/img/splash/touch-icon-iphone-retina.png'); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url($libUrl . '/img/splash/touch-icon-ipad-retina.png'); ?>">

    <script src="<?= base_url('libs/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url($libUrl . '/js/toastr.min.js'); ?>"></script>
    <script src="<?= base_url($libUrl . '/js/custom_notification.js'); ?>"></script>
</head>

<body class="">
    <!-- Loading Spinner -->
    <!-- <div id="ajax-loader" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); z-index:9999;">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div> -->