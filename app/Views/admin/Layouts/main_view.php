<?php

use Config\App;

$config = new App();
$libUrl = $config->libUrlAdmin;
$urlAdmin = $config->urlAdmin;
$urlFullCurrent = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$server_current = $_SERVER['REQUEST_URI'] ?? "";
$data = [
    "libUrl" => $libUrl,
    "urlAdmin" => $urlAdmin,
    "urlFullCurrent" => $urlFullCurrent,
    "server_current" => $server_current
];
?>

<?= view("admin/Layouts/head_view.php", $data) ?>

<?= view("admin/Layouts/header_view.php", $data) ?>

<?= view("admin/Layouts/left_panel_view.php", $data) ?>

<?= $this->renderSection('content'); ?>

<?= view("admin/Layouts/footer_view.php", $data) ?>

<?= view("admin/Layouts/shortcut_view.php", $data) ?>

<?= view("admin/Layouts/script_view.php", $data) ?>