<?php

    class Database
    {
        private $dsn = "mysql:host=localhost; dbname=db_user_system";
        private $dbuser = "root";
        private $dbpass = "";

        public $conn;

        public function __construct()
        {
            try {
                $this->conn = new PDO($this->dsn, $this->dbuser, $this->dbpass);
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

            return $this->conn;
        }

        // check input
        public function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        // error success message alert
        public function showMessage($type, $message)
        {
            return '<div class="text-center alert alert-'.$type.' alert-dismissible p-1">
                <strong>'.$message.'</strong>
                <button type="button" class="btn" data-bs-dismiss="alert" style="font-size: 20px; margin-bottom: 8px;">&times;</button>
            </div>';
        }
    }

?>