<?php

    session_start();
    if (!isset($_SESSION['username'])) {
        header('location:index.php');
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css links -->
    <link rel="stylesheet" href="../assets/css/bootstrap-5/bootstrap.min.css">
    <!-- fontawesome css links -->
    <link rel="stylesheet" href="../assets/css/font_awesome-5/font-awesome5.15.1cssall.min.css">
    <!-- data tables css link -->
    <link rel="stylesheet" type="text/css" href="../assets/DataTables/datatables.min.css"/>
    <!-- custom css -->
    <link rel="stylesheet" href="../assets/css/custom/admin/style.css">
    <!-- Jquery link -->
    <script src="../assets/js/jqueryPlugin/jquery-3.5.1.min.js"></script>
    <!-- bootstrap js links -->
    <script type="text/javascript" src="../assets/js/bootstrap-5/bootstrap.bundle.min.js"></script>
    <!-- data tables js link -->
    <script type="text/javascript" src="../assets/DataTables/datatables.min.js"></script>
    <!-- sweetalert2 -->
    <script src="../assets/sweetalert2@11/add_sweetalert2@11/sweetalert2.all.min.js"></script>
    <!-- custom script -->
    <script>
        $(document).ready(function(){
            $("#open-nav").click(function(){
                $(".admin-nav").toggleClass('animate');
            });
        });
    </script>
    <?php
        $title = basename($_SERVER['PHP_SELF'], '.php');
        $title = explode('-', $title);
        $title = ucfirst($title[1]);
    ?>
    <title><?= $title ?> | Admin Panel</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="admin-nav">
                <h4 class="text-light text-center p-2">Admin Panel</h4>

                <div class="list-group list-group-flush">
                    <a href="admin-dashboard.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-dashboard.php') ? 'nav-active' : '' ?>"><i class="fas fa-chart-pie"></i>&nbsp;&nbsp;Dashboard</a>

                    <a href="admin-users.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-users.php') ? 'nav-active' : '' ?>"><i class="fas fa-user-friends"></i>&nbsp;&nbsp;Users</a>

                    <a href="admin-notes.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-notes.php') ? 'nav-active' : '' ?>"><i class="fas fa-sticky-note"></i>&nbsp;&nbsp;Notes</a>

                    <a href="admin-feedback.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-feedback.php') ? 'nav-active' : '' ?>"><i class="fas fa-comment"></i>&nbsp;&nbsp;Feedback</a>

                    <a href="admin-notification.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-notification.php') ? 'nav-active' : '' ?>"><i class="fas fa-bell"></i>&nbsp;&nbsp;Notification<span id="checkNotification" class="d-inline-block"></span></a>

                    <a href="admin-deleteuser.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-deleteuser.php') ? 'nav-active' : '' ?>"><i class="fas fa-user-slash"></i>&nbsp;&nbsp;Deleted Users</a>

                    <a href="assets/php/admin-action.php?export=excel" class="list-group-item text-light admin-link"><i class="fas fa-table"></i>&nbsp;&nbsp;Export Users</a>

                    <a href="#" class="list-group-item text-light admin-link"><i class="fas fa-id-card"></i>&nbsp;&nbsp;Profile</a>

                    <a href="#" class="list-group-item text-light admin-link"><i class="fas fa-cog"></i>&nbsp;&nbsp;Setting</a>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-lg-12 bg-primary pt-2 justify-content-between d-flex">
                        <a href="#" class="text-light" id="open-nav"><h3><i class="fas fa-bars"></i></h3></a>

                        <h4 class="text-light"><?= $title ?></h4>

                        <a class="text-light text-decoration-none mt-1" href="assets/php/logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>

                        <!-- <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link text-light dropdown-toggle" data-bs-toggle="dropdown">
                                    <i class="fa fa-user-cog">&nbsp;Hi! Emran</i>
                                </a>
                                <ul class="dropdown-menu bg-primary">
                                    <li><a href="assets/php/logout.php" class="text-danger dropdown-item"><i class="fa fa-sign-out-alt"></i>&nbsp;Logout</a></li>
                                </ul>
                            </li>
                        </ul> -->

                    </div>
                    <!-- 2nd row -->
                </div>