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
    <!-- custom css -->
    <link rel="stylesheet" href="../assets/css/custom/admin/style.css">
    <title>Login | Admin</title>
</head>
<body class="bg-dark">

    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-lg-5">
                <div class="card border-danger shadow">
                    <div class="card-header bg-danger">
                        <h3 class="m-0 text-white text-center"><i class="fas fa-user-cog"></i>&nbsp;Admin Panel Login</h3>
                    </div>
                    <div class="card-body">
                        <form class="px-3" action="" method="post" id="admin-login-form">
                            <div class="form-group">
                                <input class="form-control form-control-lg" type="text" name="username" id="username" placeholder="Username" required autofocus>
                            </div>
                            <div class="form-group mt-3">
                                <input class="form-control form-control-lg" type="password" name="password" id="password" placeholder="Password" required>
                            </div>
                            <div class="form-group mt-3 d-grid">
                                <input class="btn btn-danger" value="Login" type="submit" name="admin-login" id="adminLoginBtn">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery link -->
    <script src="../assets/js/jqueryPlugin/jquery-3.5.1.min.js"></script>

    <!-- bootstrap js links -->
    <script type="text/javascript" src="../assets/js/bootstrap-5/bootstrap.bundle.min.js"></script>
    
</body>
</html>