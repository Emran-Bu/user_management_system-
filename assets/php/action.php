<?php

    require_once 'auth.php';

    $user = new Auth();

    if (isset($_POST['action']) && $_POST['action'] == 'register') {
        $name = $user->test_input();
    }

?>