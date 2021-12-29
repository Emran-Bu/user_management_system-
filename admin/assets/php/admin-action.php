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

    // handle fetch all user ajax request
    if (isset($_POST['action']) && $_POST['action'] == 'fetchAllUsers') {
        $output = '';
        $data = $admin->fetchAllUsers(0);
        $path = '../assets/php/';
        
        if ($data) {
            $output .= '
                <table class="table table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>E-Mail</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>DOB</th>
                            <th>Verified</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';
                foreach ($data as $row){
                    if ($row['photo'] != '') {
                        $uphoto = $path.$row['photo'];
                    } else {
                        $uphoto = '../assets/img/avatar2.jpg';
                    }

                    if ($row['verified'] == 1) {
                        $verifyIcon = '<i class="fas fa-user-check fa-lg text-success"></i>';
                    } else {
                        $verifyIcon = '<i class="fas fa-user-times fa-lg text-danger"></i>';
                    }
                    
                    $output .= '
                                <tr>
                                    <td>'.$row['id'].'</td>
                                    <td><img src="'.$uphoto.'" class="rounded-circle" width="40px" height="40px"></td>
                                    <td>'.$row['name'].'</td>
                                    <td>'.$row['email'].'</td>
                                    <td>'.$row['phone'].'</td>
                                    <td>'.$row['gender'].'</td>
                                    <td>'.$row['dob'].'</td>
                                    <td>'.$verifyIcon.'</td>
                                    <td>
                                        <a href="#" id="'.$row['id'].'" title="View Details" class="text-primary text-decoration-none userDetailsIcon" data-bs-toggle="modal"data-bs-target="#showUserDetailsModal"><i class="fas fa-info-circle fa-lg"></i>&nbsp;</a>

                                        <a href="#" id="'.$row['id'].'" title="Delete User" class="text-danger text-decoration-none userDeleteIcon"><i class="fas fa-trash-alt fa-lg"></i>&nbsp;</a>
                                    </td>
                                </tr>
                            ';
                }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h3 class="text-center text-secondary">:) No any user registered yet!</h3>';
        }
    }

    // handle display user details ajax request
    if (isset($_POST['details_id'])) {
        $id = $_POST['details_id'];

        $data = $admin->fetchUseDetailsById($id);

        echo json_encode($data);
    }

    // handle delete an user details ajax request
    if (isset($_POST['del_id'])) {
        $id = $_POST['del_id'];

        $data = $admin->userAction($id, 0);
    }

    // handle fetch all deleted user ajax request
    if (isset($_POST['action']) && $_POST['action'] == 'fetchAllDeletedUsers') {
        $output = '';
        $data = $admin->fetchAllUsers(1);
        $path = '../assets/php/';
        
        if ($data) {
            $output .= '
                <table class="table table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>E-Mail</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>DOB</th>
                            <th>Verified</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';
                foreach ($data as $row){
                    if ($row['photo'] != '') {
                        $uphoto = $path.$row['photo'];
                    } else {
                        $uphoto = '../assets/img/avatar2.jpg';
                    }

                    if ($row['verified'] == 1) {
                        $verifyIcon = '<i class="fas fa-user-check fa-lg text-success"></i>';
                    } else {
                        $verifyIcon = '<i class="fas fa-user-times fa-lg text-danger"></i>';
                    }
                    
                    $output .= '
                                <tr>
                                    <td>'.$row['id'].'</td>
                                    <td><img src="'.$uphoto.'" class="rounded-circle" width="40px" height="40px"></td>
                                    <td>'.$row['name'].'</td>
                                    <td>'.$row['email'].'</td>
                                    <td>'.$row['phone'].'</td>
                                    <td>'.$row['gender'].'</td>
                                    <td>'.$row['dob'].'</td>
                                    <td>'.$verifyIcon.'</td>
                                    <td>
                                        <a href="#" id="'.$row['id'].'" title="Restore User" class="text-white text-decoration-none badge bg-dark restoreUserIcon">Restore</a>
                                    </td>
                                </tr>
                            ';
                }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h3 class="text-center text-secondary">:) No any user deleted yet!</h3>';
        }
    }

    // handle restore delete an user details ajax request
    if (isset($_POST['restore_id'])) {
        $id = $_POST['restore_id'];

        $data = $admin->userAction($id, 1);
    }

    // handle fetch all note ajax request
    if (isset($_POST['action']) && $_POST['action'] == 'fetchAllNotes') {
        $output = '';
        $note = $admin->fetchAllNotes();
        $sl = 1;
        if ($note) {
            $output .= '
                <table class="table table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User Name</th>
                            <th>User E-Mail</th>
                            <th>Note Title</th>
                            <th>Note</th>
                            <th>Written On</th>
                            <th>Updated ON</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';
                foreach ($note as $row){
                    
                    $output .= '
                                <tr>
                                    <td>'.$sl++.'</td>
                                    <td>'.$row['name'].'</td>
                                    <td>'.$row['email'].'</td>
                                    <td>'.$row['title'].'</td>
                                    <td>'.substr($row['note'], 0, 75).'...</td>
                                    <td>'.$row['created_at'].'</td>
                                    <td>'.$row['updated_at'].'</td>
                                    <td>
                                        <a href="#" id="'.$row['id'].'" title="View Details" class="text-primary text-decoration-none userNotesDetailsIcon"><i class="fas fa-info-circle fa-lg"></i>&nbsp;</a>

                                        <a href="#" id="'.$row['id'].'" title="Delete Note" class="text-danger text-decoration-none deleteNoteIcon"><i class="fas fa-trash-alt fa-lg"></i>&nbsp;</a>
                                    </td>
                                </tr>
                            ';
                }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h3 class="text-center text-secondary">:) No any Notes written yet!</h3>';
        }
    }

    // handle display note of an user is details ajax request
    if (isset($_POST['notes_id'])) {
        $id = $_POST['notes_id'];

        $data = $admin->fetchAllNotesUsersInfoByID($id);

        echo json_encode($data);
    }

    // handle delete an note ajax request
    if (isset($_POST['note_del_id'])) {
        $id = $_POST['note_del_id'];

        $data = $admin->deleteNoteOfUserByAdmin($id);
    }

    // handle fetch all feedback ajax request
    if (isset($_POST['action']) && $_POST['action'] == 'fetchAllFeedback') {
        $output = '';
        $feedback = $admin->fetchAllFeedback();
        $sl = 1;
        if ($feedback) {
            $output .= '
                <table class="table table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th>FID</th>
                            <th>UID</th>
                            <th>User Name</th>
                            <th>User E-Mail</th>
                            <th>Subject</th>
                            <th>Feedback</th>
                            <th>Sent On</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';
                foreach ($feedback as $row){
                    
                    $output .= '
                                <tr>
                                    <td>'.$sl++.'</td>
                                    <td>'.$row['uid'].'</td>
                                    <td>'.$row['name'].'</td>
                                    <td>'.$row['email'].'</td>
                                    <td>'.$row['subject'].'</td>
                                    <td>'.$row['feedback'].'</td>
                                    <td>'.$row['created_at'].'</td>
                                    <td>
                                        <a href="#" id="'.$row['uid'].'" fid="'.$row['id'].'" title="Reply" class="text-primary text-decoration-none replyNoteIcon" data-bs-toggle="modal" data-bs-target="#showReplyModal"><i class="fas fa-reply fa-lg"></i></a>
                                    </td>
                                </tr>
                            ';
                }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h3 class="text-center text-secondary">:) No any feedback written yet!</h3>';
        }
    }

    // handle send feedback replay to the user ajax request
    if (isset($_POST['message'])) {
        $uid = $_POST['uid'];
        $message = $admin->test_input($_POST['message']);
        $fid = $_POST['fid'];

        $admin->replyFeedback($uid, $message);
        $admin->feedbackReplied($fid);
    }

    // handle fetch notification of admin
    if(isset($_POST['action']) && $_POST['action'] == 'fetchNotification'){
        $notification = $cuser->fetchNotification($cid);
        $output = '';

        if($notification){
            foreach($notification as $row){
                $output .='
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button id="'.$row['id'].'" class="btn-close p-3" style="font-size: 11px;" type="button" aria-label="close"></button>
                    <h4 class="alert-heading">New Notification</h4>
                    <div class="lead fs-6 text-primary">'.$row['message'].'</div>
                    <hr class="my-2">
                    <p class="float-start mb-0" style="font-size: 13px; color: black;">Replay of feedback from admin</p>
                    <p class="float-end mb-0 fst-italic" style="font-size: 13px; color: red;">'.$cuser->timeInAgo($row['created_at']).'</p>
                    <div class="clearfix"></div>
                </div>
                ';
            }
            echo $output;
        } else {
            echo '<h3 class="text-center text-secondary mt-5">No any new notification!</h3>';
        }
    }

?>