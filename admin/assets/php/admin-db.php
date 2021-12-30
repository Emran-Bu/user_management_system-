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
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }

        // gender percentage
        public function verifiedPer()
        {
            $sql = "SELECT verified, COUNT(*) AS number FROM users GROUP BY verified";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }

        // Count Website Hits
        public function site_hits()
        {
            $sql = "SELECT hits FROM visitors";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        }

        // fetch all registered user
        public function fetchAllUsers($val)
        {
            $sql = "SELECT * FROM users WHERE deleted != $val";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $result;
        }

        // Fetch user details by id
        public function fetchUseDetailsById($id)
        {
            $sql = "SELECT * FROM users WHERE id = :id AND deleted != 0";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return $result;
        }  

        // delete an user details by id and
        // restore an user details by id
        public function userAction($id , $val)
        {
            $sql = "UPDATE users SET deleted = $val WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            
            return true;
        }
        
        // fetch all notes with user info
        public function fetchAllNotes()
        {
            $sql = "SELECT notes.id, notes.title, notes.note, notes.created_at, notes.updated_at, users.name, users.email FROM notes INNER JOIN users ON notes.uid = users.id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $result;
        }

        // fetch notes details with user details info by id
        public function fetchAllNotesUsersInfoByID($id)
        {
            $sql = "SELECT notes.id, notes.title, notes.note, notes.created_at, notes.updated_at, users.name, users.email FROM notes INNER JOIN users ON notes.uid = users.id WHERE notes.id = $id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return $result;
        }

        // delete a note of an user by admin
        public function deleteNoteOfUserByAdmin($id)
        {
            $sql = "DELETE FROM notes WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            
            return true;
        }

        // fetch all feedback with user info
        public function fetchAllFeedback()
        {
            $sql = "SELECT f.id, f.subject, f.feedback, f.created_at, f.uid, u.name, u.email FROM feedback f INNER JOIN users u ON f.uid = u.id WHERE replied != 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $result;
        }

        // reply to user
        public function replyFeedback($uid, $message)
        {
            $sql = "INSERT INTO notification (uid, type, message) VALUES (:uid, 'user', :message)";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['uid'=>$uid, 'message'=>$message]);
            
            return true;
        }

        // set feedback replied
        public function feedbackReplied($fid)
        {
            $sql = "UPDATE feedback SET replied = 1 WHERE id = :fid";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['fid'=>$fid]);
            
            return true;
        }

        // send feedback Delete User to admin
        public function feedbackDeleteByAdmin($id)
        {
            $sql = "DELETE FROM feedback WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            return true;
        }

        // fetch notification with user info
        public function fetchNotification()
        {
            $sql = "SELECT n.id, n.message, n.created_at, u.name, u.email FROM notification n INNER JOIN users u ON n.uid = u.id WHERE type = 'Admin' ORDER BY n.id DESC LIMIT 5";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $result;
        }

        // remove Notification
        public function removeNotification($id)
        {
            $sql = "DELETE FROM notification WHERE id = :id AND type = 'Admin'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            return true;
        }

        // fetch all users from db
        public function exportAllUsers()
        {
            $sql = "SELECT * FROM users";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $return = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $return;
        }

        // send permanent Delete User to admin
        public function permanentDeleteUser($id)
        {
            $sql = "DELETE FROM users WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            return true;
        }

    }

?>