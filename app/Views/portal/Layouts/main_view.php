<?php

use Config\App;

$config = new App();
$data = [
    "libUrl" => $config->libUrPortal,
]
?>
<?= view("portal/Layouts/header_view.php", $data) ?>
<?= isset($show_banner) && $show_banner ? view("portal/Layouts/banner_view.php", $data) : '' ?>
<?= view("portal/Layouts/menu_view.php", $data) ?>
<?= $this->renderSection('content'); ?>
<?= view("portal/Layouts/footer_view.php", $data) ?>
<?= view("portal/Layouts/login_view.php", $data) ?>
<?= view("portal/Layouts/register_view.php", $data) ?>
<?= view("portal/Layouts/profile_view.php", $data) ?>

