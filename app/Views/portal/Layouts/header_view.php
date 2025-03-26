<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= session()->get('web_configs')['site_name'] . ' - ' . $title ?></title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="author" content="" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="<?= session()->get('web_configs')['logo']; ?>" type="image/x-icon">
    <link rel="icon" href="<?= session()->get('web_configs')['logo']; ?>" type="image/x-icon">

    <link rel="stylesheet" href="<?= base_url($libUrl . '/portal/css/swiper-bundle.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url($libUrl . '/portal/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url($libUrl . '/portal/css/vendor.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url($libUrl . '/portal/css/style.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url($libUrl . '/portal/css/custom.css'); ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <script src="<?= base_url($libUrl . '/js/jquery-3.2.1.slim.min.js'); ?>"></script>
    <script src="<?= base_url($libUrl . '/js/popper.min.js'); ?>"></script>
    <script src="<?= base_url($libUrl . '/js/bootstrap4/bootstrap.min.js'); ?>"></script>
    <style>
        * {
            font-family: 'Roboto', sans-serif !important;
            font-weight: 400 !important;
        }
    </style>
</head>

<body>