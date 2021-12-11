<?php

    session_start();

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
        print_r($_POST);
        // echo 'hello';
    }

?>