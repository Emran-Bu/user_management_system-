<?php

    require_once 'config.php';

    class Auth extends Database
    {
        // register new user
        public function register($name, $email, $password){
            $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :pass)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['name'=>$name, 'email'=>$email, 'pass'=>$password]);
            return true;
        }

        // check if user already registered
        public function user_exist($email){
            $sql = "SELECT email FROM users email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email'=>$email]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }  
    }

?>