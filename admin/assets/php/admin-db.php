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

        // count total number of rows
        public function totalCount($tablename)
        {
            $sql = "SELECT * FROM $tablename";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $count = $stmt->rowCount();

            return $count;
        }

        // count total verified and unverified users
        public function verified_users($status)
        {
            $sql = "SELECT * FROM users WHERE verified = :status";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['status'=>$status]);
            $count = $stmt->rowCount();

            return $count;
        }
    }

?>