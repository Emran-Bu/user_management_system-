<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap css links -->
    <link rel="stylesheet" href="assets/css/bootstrap-5/bootstrap.min.css">

    <!-- fontawesome css links -->
    <link rel="stylesheet" href="assets/css/font_awesome-5/font-awesome5.15.1cssall.min.css">

    <title><?= ucfirst(basename($_SERVER['PHP_SELF'], '.php') ) ?> | User System</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Maven+Pro&display=swap');
        *{
            font-family: 'Maven Pro', sans-serif;
            outline: none;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><i class="fa fa-code fa-lg"></i>&nbsp; User System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'home.php' ? 'active': '' ?>" aria-current="page" href="home.php"><i class="fas fa-home"></i>&nbsp;Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'profile.php' ? 'active': '' ?>" href="profile.php"><i class="fas fa-user-circle"></i>&nbsp;Profile</a>
            </li>
            <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'feedback.php' ? 'active': '' ?>" href="feedback.php"><i class="fas fa-comment-dots"></i>&nbsp;Feedback</a>
            </li>
            <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'notification.php' ? 'active': '' ?>" href="notification.php"><i class="fas fa-bell"></i>&nbsp;Notification</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user-cog"></i>&nbsp;Hi! <?= $cname ?>
            </a>
            <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink" style="left: -28px !important;">
                <li><a class="dropdown-item text-info" href="#"><i class="fa fa-user-cog"></i>&nbsp;<?= $cemail ?></a></li>
                <li><a class="dropdown-item text-info" href="#"><i class="fa fa-cog"></i>&nbsp;Setting</a></li>
                <hr style="color: #fff; margin: 2px;">
                <li><a class="dropdown-item text-danger" href="assets/php/logout.php"><i class="fa fa-sign-out-alt"></i>&nbsp;Logout</a></li>
            </ul>
            </li>
        </ul>
        </div>
    </div>
    </nav>