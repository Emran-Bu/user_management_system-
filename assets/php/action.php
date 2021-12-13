<?php

    session_start();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    
    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);

    require_once 'auth.php';

    $user = new Auth();

    // handle register ajax  request
    if (isset($_POST['action']) && $_POST['action'] == 'register') {
        $name = $user->test_input($_POST['name']);
        $email = $user->test_input($_POST['email']);
        $pass = $user->test_input($_POST['password']);

        $hpass = password_hash($pass, PASSWORD_DEFAULT);

        if ($user->user_exist($email)) {
            echo $user->showMessage('warning', 'This E-mail is already registered!');
        } else {
            if ($user->register($name, $email, $hpass)) {
                echo 'register';
                $_SESSION['user'] = $email;
            } else {
                echo $user->showMessage('warning', 'something went wrong ! try again later!');
            }
            
        }
    }

    // handle login ajax  request

    if (isset($_POST['action']) && $_POST['action'] == 'login') {
        $email = $user->test_input($_POST['email']);
        $pass = $user->test_input($_POST['password']);

        $loggedInUser = $user->login($email);

        if ($loggedInUser != null) {
            if (password_verify($pass, $loggedInUser['password'])) {
                if (!empty($_POST['rem'])) {
                    setcookie("email", "$email", time()+(30*24*60*60), "/");
                    setcookie("password", "$pass", time()+(30*24*60*60), "/");
                } else {
                    setcookie("email", "", 1, "/");
                    setcookie("password", "", 1, "/");
                }
                echo 'login';
                $_SESSION['user'] = $email;
            } else {
                echo $user->showMessage('danger', 'Password Is Incorrect!');
            }
        } else {
            echo $user->showMessage('danger', 'User Not Found!');
        }
    }

    // handle forgot password ajax  request
    if(isset($_POST['action']) && $_POST['action'] == 'forgot'){
        $email = $user->test_input($_POST['email']);
        $user_found = $user->currentUser($email);

        if ($user_found != null) {
            $token = uniqid();
            $token = str_shuffle($token);

            $user->forgot_password($token, $email);

            try {
                // server settings
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                
                $mail->Username = Database::USERNAME;
                $mail->Password = Database::PASSWORD;
                
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;

                // recipients
                $mail->setFrom(Database::USERNAME, 'User Management System');
                $mail->addAddress($email);

                // content
                $mail->isHTML(true);
                $mail->Subject = 'Reset Password';
                $mail->Body = '<h3>Click the below link to reset your password.<br><br><a href="http://localhost/user_system/reset-pass.php?email='.$email.'&token='.$token.'">http://localhost/user_system/reset-pass.php?email='.$email.'&token='.$token.'</a><br><br>Regards<br>Emran Hasan</h3>';

                $mail->send();
                echo $user->showMessage('success', 'We have send you the reset link in your e-mail ID, please check your e-mail inbox and spam folder!');

            } catch(Exception $e){
                echo $user->showMessage('danger', 'Something went wrong please try again later!');
            }
        } else {
            echo $user->showMessage('warning', 'This email is not registered!');
        }
    }

?>