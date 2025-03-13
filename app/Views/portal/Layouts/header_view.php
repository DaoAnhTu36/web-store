<!DOCTYPE html>
<html lang="en">

<head>
    <title>Store DAT <?= isset($title) ? $title : '' ?></title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="author" content="" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="<?= base_url($libUrl . '/img/favicon/favicon.ico'); ?>" type="image/x-icon">

    <link rel="stylesheet" href="<?= base_url($libUrl . '/portal/css/swiper-bundle.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url($libUrl . '/portal/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url($libUrl . '/portal/css/vendor.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url($libUrl . '/portal/css/style.css'); ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Roboto', sans-serif !important;
            font-weight: 400 !important;
        }
    </style>
</head>

<body>