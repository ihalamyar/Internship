<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once __DIR__ . '/../../../app/vendor/autoload.php';
require_once __DIR__ . '/../../../app/middleware/middleware.php';
require_once __DIR__ . '/../../../app/database/database.php';
require_once __DIR__ . '/../../../app/helper/Helper.php';
require_once __DIR__ . '/../../../app/redirect/redirectTo.php';
// =================Middleware====================
$middleware  = new Middleware();
$middleware->isLoggedIn();
// =================Database====================
$db = Database::getInstance();
$con = $db->getmyDB();
// =================Middleware====================
$helper = new Helper();
    
$mail = new PHPMailer();
?>
<!DOCTYPE html>
<html lang="en">


<head>

    <!-- META ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />

    <!-- DESCRIPTION -->
    <meta name="description" content="NICT UIN Jakarta" />

    <!-- OG -->
    <meta property="og:title" content="NICT UIN Jakarta" />
    <meta property="og:description" content="NICT UIN Jakarta" />
    <meta property="og:image" content="" />
    <meta name="format-detection" content="telephone=no">

    <!-- FAVICONS ICON ============================================= -->
    <link rel="icon" type="image/x-icon" href="/favicon.png" />

    <!-- PAGE TITLE HERE ============================================= -->
    <title>NICT UIN Jakarta </title>

    <!-- MOBILE SPECIFIC ============================================= -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--[if lt IE 9]>
	<script src="assets/js/html5shiv.min.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->

    <!-- All PLUGINS CSS ============================================= -->
    <link rel="stylesheet" type="text/css" href="/public/admin/assets/css/assets.css">

    <!-- TYPOGRAPHY ============================================= -->
    <link rel="stylesheet" type="text/css" href="/public/admin/assets/css/typography.css">
    <!-- SHORTCODES ============================================= -->
    <link rel="stylesheet" type="text/css" href="/public/admin/assets/css/shortcodes/shortcodes.css">
    <!-- STYLESHEETS ============================================= -->
    <link rel="stylesheet" type="text/css" href="/public/admin/assets/css/style.css">
    <link class="skin" rel="stylesheet" type="text/css" href="/public/admin/assets/css/color/color-1.css">

</head>

<body id="bg">
    <div class="page-wraper">
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>