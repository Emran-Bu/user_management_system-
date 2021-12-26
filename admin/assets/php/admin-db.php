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

        // gender percentage
        public function genderPer()
        {
            $sql = "SELECT gender, COUNT(*) AS number FROM users WHERE gender != '' GROUP BY gender";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        }

        // gender percentage
        public function verifiedPer()
        {
            $sql = "SELECT verified, COUNT(*) AS number FROM users GROUP BY verified";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        }
    }

?>