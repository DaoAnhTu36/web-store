<?php

use Config\App;

$config = new App();
$libUrl = $config->libUrlAdmin;
$urlAdmin = $config->urlAdmin;
$urlFullCurrent = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$data = [
    "libUrl" => $libUrl,
    "urlAdmin" => $urlAdmin,
    "urlFullCurrent" => $urlFullCurrent,
]
?>

<!DOCTYPE html>
<html lang="en-us" id="extr-page">

<head>
    <meta charset="utf-8">
    <title> Login</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- #CSS Links -->
    <!-- Basic Styles -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url($libUrl . '/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url($libUrl . '/css/font-awesome.min.css') ?>">

    <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url($libUrl . '/css/smartadmin-production-plugins.min.css') ?>">
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url($libUrl . '/css/smartadmin-production.min.css') ?>">
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url($libUrl . '/css/smartadmin-skins.min.css') ?>">

    <!-- SmartAdmin RTL Support -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url($libUrl . '/css/smartadmin-rtl.min.css') ?>">

    <!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

    <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url($libUrl . '/css/demo.min.css') ?>">

    <!-- #FAVICONS -->
    <link rel="shortcut icon" href="<?= base_url($libUrl . '/img/favicon/favicon.ico') ?>" type="image/x-icon">
    <link rel="icon" href="<?= base_url($libUrl . '/img/favicon/favicon.ico') ?>" type="image/x-icon">

    <!-- #GOOGLE FONT -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">


</head>

<body class="animated fadeInDown">

    <header id="header">

        <div id="logo-group">
            <span id="logo"> <img src="<?= base_url($libUrl . '/img/logo.png') ?>" alt="DAT Store"> </span>
        </div>

        <span id="extr-page-header-space"> <span class="hidden-mobile hiddex-xs">Cần một tài khoản?</span> <a href="register.html" class="btn btn-danger">Tạo tài khoản mới</a> </span>

    </header>

    <div id="main" role="main">

        <!-- MAIN CONTENT -->
        <div id="content" class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="well no-padding">
                        <form action="<?= base_url('admin/account/sign-in'); ?>" method="POST" id="login-form" class="smart-form client-form">
                            <header>
                                Đăng nhập quản trị viên
                            </header>

                            <fieldset>

                                <section>
                                    <label class="label">Tên đăng nhập</label>
                                    <label class="input"> <i class="icon-append fa fa-user"></i>
                                        <input type="text" name="user_name">
                                </section>

                                <section>
                                    <label class="label">Mật khẩu</label>
                                    <label class="input"> <i class="icon-append fa fa-lock"></i>
                                        <input type="password" name="password">
                                        <div class="note">
                                            <a href="forgotpassword.html">Quên mật khẩu?</a>
                                        </div>
                                </section>

                                <section>
                                    <label class="checkbox">
                                        <input type="checkbox" name="remember" checked="">
                                        <i></i>Lưu phiên đăng nhập</label>
                                </section>
                            </fieldset>
                            <footer>
                                <button type="submit" class="btn btn-primary">
                                    Đăng nhập
                                </button>
                            </footer>
                        </form>

                    </div>

                    <h5 class="text-center"> - Hoặc sử dụng -</h5>

                    <ul class="list-inline text-center">
                        <li>
                            <a href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="btn btn-info btn-circle"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="btn btn-warning btn-circle"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

    </div>

    <!--================================================== -->

    <!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
    <script src="<?= base_url($libUrl . '/js/plugin/pace/pace.min.js') ?>"></script>

    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        if (!window.jQuery) {
            document.write('<script src="<?= base_url($libUrl . '/js/libs/jquery-3.2.1.min.js') ?>"><\/script>');
        }
    </script>

    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        if (!window.jQuery.ui) {
            document.write('<script src="<?= base_url($libUrl . '/js/libs/jquery-ui.min.js') ?>"><\/script>');
        }
    </script>

    <!-- IMPORTANT: APP CONFIG -->
    <script src="<?= base_url($libUrl . '/js/app.config.js') ?>"></script>

    <!-- JS TOUCH : include this plugin for mobile drag / drop touch events 		
		<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

    <!-- BOOTSTRAP JS -->
    <script src="<?= base_url($libUrl . '/js/bootstrap/bootstrap.min.js') ?>"></script>

    <!-- JQUERY VALIDATE -->
    <script src="<?= base_url($libUrl . '/js/plugin/jquery-validate/jquery.validate.min.js') ?>"></script>

    <!-- JQUERY MASKED INPUT -->
    <script src="<?= base_url($libUrl . '/js/plugin/masked-input/jquery.maskedinput.min.js') ?>"></script>

    <!--[if IE 8]>
			
			<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
			
		<![endif]-->

    <!-- MAIN APP JS FILE -->
    <script src="<?= base_url($libUrl . '/js/app.min.js') ?>"></script>

    <script>
        runAllForms();

        $(function() {
            // Validation
            $("#login-form").validate({
                // Rules for form validation
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 3,
                        maxlength: 20
                    }
                },

                // Messages for form validation
                messages: {
                    email: {
                        required: 'Please enter your email address',
                        email: 'Please enter a VALID email address'
                    },
                    password: {
                        required: 'Please enter your password'
                    }
                },

                // Do not change code below
                errorPlacement: function(error, element) {
                    error.insertAfter(element.parent());
                }
            });
        });
    </script>

</body>

</html>