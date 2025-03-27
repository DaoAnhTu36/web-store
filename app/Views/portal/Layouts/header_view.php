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

    <link rel="stylesheet" href="<?= base_url($libUrl . '/bootstrap-4.6.2/css/bootstrap.min.css'); ?>" />

</head>

<body>