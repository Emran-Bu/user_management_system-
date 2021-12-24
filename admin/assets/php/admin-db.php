<?php

    require_once 'config.php';

    class Admin extends Database{
        // admin login
        public function admin_login($username, $password){
            $sql = "SELECT * FROM admin WHERE username = :username AND password = :password";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['username'=>$username, 'password'=>$password]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }
    }

?>