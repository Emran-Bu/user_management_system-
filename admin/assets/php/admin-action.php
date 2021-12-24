<?php

    require_once 'admin-db.php';

    $admin = new Admin();

    session_start();

    // handle admin login
    if (isset($_POST['action']) && $_POST['action'] == 'adminLogin') {
        $username = $admin->test_input($_POST['username']);
        $password = $admin->test_input($_POST['password']);

        $hpassword = sha1($password);

        $loggedInUser = $admin->admin_login($username, $hpassword);

        if ($loggedInUser != null) {
            echo 'admin_login';
            $_SESSION['username'] = $username;
        } else {
            echo $admin->showMessage('danger', 'Username or Password Incorrect!');
        }
    }

?>