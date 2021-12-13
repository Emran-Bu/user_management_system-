<?php
    require_once 'assets/php/auth.php';

    $user = new Auth();

    if (isset($_GET['email']) && isset($_GET['token'])) {
        $email = $user->test_input($_GET['email']);
        $token = $user->test_input($_GET['token']);

        $auth_user = $user->reset_pass_auth($email, $token);

        if ($auth_user != null) {
            if (isset($_POST['subResetPass'])) {
                $newpass = $_POST['pass'];
                $cnewpass = $_POST['cpass'];

                $hnewpass = password_hash($cnewpass, PASSWORD_DEFAULT);

                if ($newpass == $cnewpass) {
                    $user->update_new_password($hnewpass, $email);
                    $succMsg = $user->showMessage('success', 'Password Change successfully!<br><a class="btn btn-info" href="index.php">Login Here!</a>');
                } else {
                    $errorMsg = $user->showMessage('danger', 'Password did not matched!');
                }
            }
        } else {
            header('location:index.php');
            exit();
        }
    } else {
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
    <link rel="stylesheet" href="assets/css/bootstrap-5/bootstrap.min.css">

    <!-- fontawesome css links -->
    <link rel="stylesheet" href="assets/css/font_awesome-5/font-awesome5.15.1cssall.min.css">

    <!-- custom css links -->
    <link rel="stylesheet" href="assets/css/custom/style.css">
    <title>User | Systems</title>
</head>
<body>
    
    <div class="container">
        <!-- Login Form Start -->
        <div class="row wrapper justify-content-center" id="reset-box">
            <div class="col-lg-10 my-auto">
                
                <div class="card-group myShadow">

                    <!-- first card -->
                    <div class="card justify-content-center rounded-start rounded-0 myColor p-4">
                        <h1 class="text-center fw-bold text-light">Reset Your Password!</h1>
                    </div>
                    <!-- first card end -->

                    <!-- 2nd card start-->
                    <div class="card rounded-end rounded-0 p-4" style="flex-grow: 2;">
                        <h1 class="text-center fw-bold text-primary">Enter New Password!</h1>
                        <hr class="my-3">
                        <form action="" method="post" class="px-3" id="login-form">
                            <?php
                                if (isset($_POST['subResetPass'])) {
                                    if (isset($succMsg)) {
                                        echo $succMsg;
                                    } else {
                                        echo $errorMsg;
                                    }
                                }
                            ?>
                            <div class="input-group mb-3 form-group">
                                <span class="input-group-text rounded-0">
                                    <i class="fas fa-key fa-lg"></i>
                                </span>
                                <input class="form-control rounded-0" type="password" name="pass" id="pass" placeholder="Password" required>
                            </div>
                            <div class="input-group mb-3 form-group">
                                <span class="input-group-text rounded-0">
                                    <i class="fas fa-key fa-lg"></i>
                                </span>
                                <input class="form-control rounded-0" type="password" name="cpass" id="cpass" placeholder="Confirm Password" required>
                            </div>
                            <div class="form-group d-grid mt-4 pb-2">
                                <input class="btn btn-primary btn-lg myBtn rounded-pill" type="submit" name="subResetPass" value="Reset Password" id="reset-btn">
                            </div>
                        </form>
                    </div>
                    <!-- 2nd card end -->
                </div>
            </div>
        </div>
    </div>
</body>
</html>