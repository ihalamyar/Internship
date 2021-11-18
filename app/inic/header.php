<?php
require_once __DIR__ . '/../database/database.php';
require_once __DIR__ . '/../redirect/redirectTo.php';
require_once __DIR__ . '/../../app/middleware/middleware.php';
$middleware  = new Middleware();
$middleware->loggedIn();
$db = Database::getInstance();
$con = $db->getmyDB();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../public/asset/font/css/all.css">
    <link rel="stylesheet" href="../../public/asset/dashboardStyle/style1.css">
    <link rel="stylesheet" href="../../public/asset/dashboardStyle/style2.css">
    <link rel="stylesheet" href="../../public/asset/dashboardStyle/style3.css">
    <link rel="stylesheet" href="../../public/asset/style.css">
</head>

<body>
    <header class="header">
      
        <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow">
            <a class="sidebar-toggler text-gray-500 me-4 me-lg-5 lead" href="#">
                <i class="fas fa-align-left"></i>
            </a><a class="navbar-brand fw-bold text-uppercase text-base" href="#">
                <span class="d-none d-brand-partial">Bubbly </span><span class="d-none d-sm-inline">Dashboard</span></a>
            <ul class="ms-auto d-flex align-items-center list-unstyled mb-0">
                <li class="nav-item">
                    <form class="ms-auto d-none d-lg-block" id="searchForm">
                        <div class="form-group position-relative mb-0">
                            <button class="position-absolute bg-white border-0 p-0" type="submit" style="top: -3px; left: 0;"><i class="o-search-magnify-1 text-gray-500 text-lg"></i></button>
                            <input class="form-control form-control-sm border-0 shadow-0 ps-4" type="search" placeholder="Search ...">
                        </div>
                    </form>
                </li>
                <li class="nav-item dropdown ms-auto"><a class="nav-link pe-0" id="userInfo" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar p-1" src="https://d19m59y37dris4.cloudfront.net/bubbly/1-0/img/avatar-6.jpg" alt="Jason Doe"></a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userInfo">
                        <div class="dropdown-header text-gray-700">
                            <h6 class="text-uppercase font-weight-bold">Mark Stephen</h6><small>Web Developer</small>
                        </div>
                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity log </a>
                        <div class="dropdown-divider"></div><a class="dropdown-item" href="/logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>