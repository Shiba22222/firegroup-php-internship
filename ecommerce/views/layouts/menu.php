<?php
    ob_start();
    session_start();
    require '../../connection.php';
?>
<?php
    if(empty($_COOKIE['user_id'])){
        setcookie("login", "Bạn chưa đăng nhập!", time()+1, "/","", 0);
        header("location: ../login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/hss.css">
    <link rel="stylesheet" href="../../assets/vendors/chartjs/Chart.min.css">
    <link rel="stylesheet" href="../../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../../assets/css/app.css">
    <link rel="shortcut icon" href="../../assets/images/favicon.svg" type="image/x-icon">
    
    <title>Document</title>
</head>

<body>
    <div id="app">
        <!-- Menu -->
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="../../assets/images/logo.svg" alt="" srcset="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class='sidebar-title'>Menu</li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="briefcase" width="20"></i>
                                <span>Quản lý Tài khoản</span>
                            </a>

                            <ul class="submenu ">

                                <li>
                                    <a href="../admins/account.php">Tất cả Tài khoản</a>
                                </li>

                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="briefcase" width="20"></i>
                                <span>Quản lý danh mục</span>
                            </a>

                            <ul class="submenu ">

                                <li>
                                    <a href="../categories/category.php">Tất cả danh mục</a>
                                </li>
                            </ul>

                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="briefcase" width="20"></i>
                                <span>Quản lý sản phẩm</span>
                            </a>

                            <ul class="submenu ">

                                <li>
                                    <a href="../products/product.php    ">Tất cả sản phẩm</a>
                                </li>

                            </ul>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>


        <div id="main">


            <!-- Header -->
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ml-auto">

                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar mr-1">
                                    <img src="../../assets/images/avatar/avatar-s-1.png" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block"><?php echo !empty($_COOKIE['user_name']) ? $_COOKIE['user_name'] : "Anonymus";?></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href=""><i data-feather="user"></i> Account</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../layouts/logout.php"><i data-feather="log-out"></i>
                                 Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>