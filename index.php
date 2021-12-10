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
                            <div class="input-group mb-3 form-group">
                                <span class="input-group-text rounded-0">
                                    <i class="far fa-envelope fa-lg"></i>
                                </span>
                                <input class="form-control rounded-0" type="email" name="email" id="email" placeholder="E-Mail" required>
                            </div>
                            <div class="input-group mb-3 form-group">
                                <span class="input-group-text rounded-0">
                                    <i class="fas fa-key fa-lg"></i>
                                </span>
                                <input class="form-control rounded-0" type="password" name="password" id="password" placeholder="Password" required>
                            </div>
                            <div class="form-group mb-3">
                                <div class="form-check">
                                    <input class="form-check-input float-start" type="checkbox" name="rem" id="formCheck">
                                    <label for="formCheck" class="form-check-label">Remember me</label>

                                    <div class="forget float-end">
                                        <a href="#" id="forgetLink">Forget Password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group d-grid mt-4 pb-2">
                                <input class="btn btn-primary btn-lg myBtn rounded-pill" type="submit" value="Sign In" id="login-btn">
                            </div>
                        </form>
                    </div>
                    <!-- 2nd card -->
                    <div class="card myColor p-4">
                        <h1 class="text-center fw-bold text-light">Hello Friends!</h1>
                        <hr class="my-3 myHr">
                        <p class="text-center text-light fw-bolder lead">Enter your personal details and start your journey with us!</p>
                        <div class="text-center">
                            <button class="btn btn-outline-light btn-lg fw-bolder mt-4 w-50 rounded-pill myLinkBtn" id="register-link">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery Links -->
    <script type="text/javascript" src="assets/js/jqueryPlugin/jquery-3.5.1.min.js"></script>

    <!-- bootstrap js links -->
    <script type="text/javascript" src="assets/js/bootstrap-5/bootstrap.bundle.min.js"></script>

</body>
</html>