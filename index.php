<?php
    session_start();

    if (isset($_SESSION['user'])) {
        header('location:home.php');
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
        <div class="row wrapper justify-content-center" id="login-box">
            <div class="col-lg-10 my-auto">
                <!-- first card -->
                <div class="card-group myShadow">
                    <div class="card rounded-start rounded-0 p-4" style="flex-grow: 1.4;">
                        <h1 class="text-center fw-bold text-primary">Sign in to Account</h1>
                        <hr class="my-3">
                        <form action="" method="post" class="px-3" id="login-form">
                            <div id="regAlert"></div>
                            <div class="input-group mb-3 form-group">
                                <span class="input-group-text rounded-0">
                                    <i class="far fa-envelope fa-lg"></i>
                                </span>
                                <input class="form-control rounded-0" type="email" name="email" id="email" placeholder="E-Mail" value="<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];} ?>" required>
                            </div>
                            <div class="input-group mb-3 form-group">
                                <span class="input-group-text rounded-0">
                                    <i class="fas fa-key fa-lg"></i>
                                </span>
                                <input class="form-control rounded-0" type="password" name="password" id="password" placeholder="Password" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];} ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <div class="form-check">
                                    <input class="form-check-input float-start" type="checkbox" name="rem" id="formCheck" <?php if(isset($_COOKIE['email'])){ ?> checked <?php } ?> >
                                    <label for="formCheck" class="form-check-label" >Remember me</label>

                                    <div class="forget float-end">
                                        <a class="text-decoration-none" href="#" id="forget-link">Forgotten Password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group d-grid mt-4 pb-2">
                                <input class="btn btn-primary btn-lg myBtn rounded-pill" type="submit" value="Sign In" id="login-btn">
                            </div>
                        </form>
                    </div>
                    <!-- 2nd card -->
                    <div class="card justify-content-center myColor p-4">
                        <h1 class="text-center fw-bold text-light">Hello Friends!</h1>
                        <hr class="my-3 myHr">
                        <p class="text-center text-light fw-bolder lead">Enter your personal details and start your journey with us!</p>
                        <div class="text-center">
                            <button class="btn btn-outline-light btn-lg fw-bolder mt-4 w-50 rounded-pill myLinkBtn" id="login-link">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login Form End -->

        <!-- Register Form Start -->
        <div class="row wrapper justify-content-center" id="register-box" style="display: none;">
            <div class="col-lg-10 my-auto">
                
                <div class="card-group myShadow">
                    <!-- first card Start-->
                    <div class="card justify-content-center myColor p-4">
                        <h1 class="text-center fw-bold text-light">Welcome Back!</h1>
                        <hr class="my-3 myHr">
                        <p class="text-center text-light fw-bolder lead my-3">To keep connected with us please login with your personal info!</p>
                        <div class="text-center">
                            <button class="btn btn-outline-light btn-lg fw-bolder mt-4 w-50 rounded-pill myLinkBtn" id="register-link">Sign In</button>
                        </div>
                    </div>
                    <!-- first card End-->

                    <!-- 2nd card Start-->
                    <div class="card rounded-start rounded-0 p-4" style="flex-grow: 1.4;">
                        <h1 class="text-center fw-bold text-primary">Create Account</h1>
                        <hr class="my-3">
                        <form action="" method="post" class="px-3" id="register-form">
                            <div id="regAlert"></div>
                            <div class="input-group mb-3 form-group">
                                <span class="input-group-text rounded-0">
                                    <i class="far fa-user fa-lg"></i>
                                </span>
                                <input class="form-control rounded-0" type="name" name="name" id="name" placeholder="Full Name" required>
                            </div>
                            <div class="input-group mb-3 form-group">
                                <span class="input-group-text rounded-0">
                                    <i class="far fa-envelope fa-lg"></i>
                                </span>
                                <input class="form-control rounded-0" type="email" name="email" id="remail" placeholder="E-Mail" required>
                            </div>
                            <div class="input-group mb-3 form-group">
                                <span class="input-group-text rounded-0">
                                    <i class="fas fa-key fa-lg"></i>
                                </span>
                                <input class="form-control rounded-0" type="password" name="password" id="rpassword" placeholder="Password" minlength="5" required>
                            </div>
                            <div class="input-group mb-1 form-group">
                                <span class="input-group-text rounded-0">
                                    <i class="fas fa-key fa-lg"></i>
                                </span>
                                <input class="form-control rounded-0" type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" minlength="5" required>
                            </div>
                            <div class="mb-3">
                                <span class="text-danger"><i id="passErr"></i></span>
                            </div>
                            <div class="form-group d-grid mt-4 pb-2">
                                <input class="btn btn-primary btn-lg myBtn rounded-pill" type="submit" value="Sign Up" id="register-btn">
                            </div>
                        </form>
                    </div>
                    <!-- 2nd card End-->
                    
                </div>
            </div>
        </div>
        <!-- Register Form End -->

        <!-- forget password Form Start-->

        <div class="row wrapper justify-content-center" id="forget-box" style="display: none;">
            <div class="col-lg-10 my-auto">
                <div class="card-group myShadow">

                    <!-- first card Start-->
                    <div class="card justify-content-center myColor p-4">
                        <h1 class="text-center fw-bold text-light">Forgot Password!</h1>
                        <hr class="my-3 myHr">
                        
                        <div class="text-center">
                            <button class="btn btn-outline-light btn-lg fw-bolder mt-4 w-50 rounded-pill myLinkBtn" id="back-link">Back</button>
                        </div>
                    </div>
                    <!-- first card end -->

                    <!-- 2nd card start-->
                    
                    <div class="card rounded-start rounded-0 p-4" style="flex-grow: 1.4;">
                        <h1 class="text-center fw-bold text-primary">Forgot Your Password</h1>
                        <hr class="my-3">
                        <p class="text-center lead text-secondary my-3">To reset your password enter the registered e-mail address and we will send you password reset instruction on your e-mail!</p>

                        <form action="" method="post" class="px-3" id="forget-form">
                            <div class="input-group mb-3 form-group">
                                <span class="input-group-text rounded-0">
                                    <i class="far fa-envelope fa-lg"></i>
                                </span>
                                <input class="form-control rounded-0" type="email" name="email" id="femail" placeholder="E-Mail" required>
                            </div>
                           
                            <div class="form-group d-grid mt-4 pb-2">
                                <input class="btn btn-primary btn-lg myBtn rounded-pill" type="submit" value="Reset Password" id="forget-btn">
                            </div>
                        </form>
                    </div>
                    <!-- 2nd card End-->
                </div>
            </div>
        </div>

        <!-- forget password Form End-->

    </div>


    <!-- jQuery Links -->
    <script type="text/javascript" src="assets/js/jqueryPlugin/jquery-3.5.1.min.js"></script>

    <!-- bootstrap js links -->
    <script type="text/javascript" src="assets/js/bootstrap-5/bootstrap.bundle.min.js"></script>

    <!-- custom js -->
    <script>
        $(document).ready(function(){
            $("#login-link").click(function(){
                $("#login-box").hide('slow');
                $("#register-box").show('slow');
            })
            $("#register-link").click(function(){
                $("#login-box").show('slow');
                $("#register-box").hide('slow');
            })
            $("#forget-link").click(function(){
                $("#forget-box").show('slow');
                $("#login-box").hide('slow');
            })
            $("#back-link").click(function(){
                $("#forget-box").hide('slow');
                $("#login-box").show('slow');
            })

            // Register ajax request
            $("#register-btn").click(function(e){
                if ($("#register-form")[0].checkValidity()) {
                    e.preventDefault();

                    $("#register-btn").val("Please Wait...")
                    if ($("#rpassword").val() != $("#cpassword").val()) {
                        $("#passErr").text('* Password did not matched!');
                        $("#register-btn").val("Sign Up");
                    } else{
                        $("#passErr").text('');
                        $.ajax({
                            url : 'assets/php/action.php',
                            method : 'post',
                            data : $("#register-form").serialize()+'&action=register',
                            success : function(response){
                                $("#register-btn").val("Sign Up");
                                if(response === 'register'){
                                    window.location = 'home.php';
                                } else {
                                    $('#regAlert').html(response);
                                }
                            }

                        });
                    }
                }
            });

            //login ajax request
            $("#login-btn").click(function(e){
                if($("#login-form")[0].checkValidity()){
                    e.preventDefault();

                    $("#login-btn").val('Please Wait...');

                    $.ajax({
                        url : 'assets/php/action.php',
                        method : 'post',
                        data : $("#login-form").serialize()+'&action=login',
                        success : function(response){
                            $("#login-btn").val('Sign In');
                            if(response === 'login'){
                                window.location = 'home.php';
                            } else {
                                $('#regAlert').html(response);
                            }
                        }
                    });
                }
            })
        });
    </script>
</body>
</html>