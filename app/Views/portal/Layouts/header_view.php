<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= session()->get('web_configs')['site_name'] ?> - <?= isset($title) ? $title : '' ?></title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="author" content="" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="mobile-web-app-capable" content="yes">

    <link rel="shortcut icon" href="<?php echo isset(session()->get('web_configs')['logo']) ? base_url(session()->get('web_configs')['logo']) : ''; ?>" type="image/x-icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url($libUrl . '/template/lib/lightbox/css/lightbox.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url($libUrl . '/template/lib/owlcarousel/assets/owl.carousel.min.css'); ?>" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url($libUrl . '/template/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url($libUrl . '/template/css/style.css'); ?>" rel="stylesheet">
    <link href="<?= base_url($libUrl . '/portal/css/custom.css'); ?>" rel="stylesheet">

</head>

<body>
    <!-- <div id="ajax-loader" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); z-index:9999;">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Đã thêm vào giỏ hàng</span>
        </div>
    </div> -->
    <div id="notification" style="display:none; position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 9999;
    padding: 20px;
    color: white;
    border-radius: 10px;
    ">
        Đã thêm vào giỏ hàng
    </div>