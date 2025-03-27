<?php

use Config\App;

$config = new App();
$data = [
    "libUrl" => $config->libUrPortal,
]
?>

<?= view("portal/Layouts/header_view.php", $data) ?>
<?= view("portal/Layouts/slide_view.php", $data) ?>
<?= view("portal/Layouts/banner_view.php", $data) ?>
<?= view("portal/Layouts/menu_view.php", $data) ?>
<?= $this->renderSection('content'); ?>
<?= view("portal/Layouts/footer_view.php", $data) ?>

