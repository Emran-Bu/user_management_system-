<?php

    require_once 'session.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    
    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);

    // handle add new note ajax request
    if (isset($_POST['action']) && $_POST['action'] == 'add_note') {
        $title = $cuser->test_input($_POST['title']);
        $note = $cuser->test_input($_POST['note']);

        $cuser->add_new_note($cid, $title, $note);

        $cuser->notification($cid, 'Admin', 'Note Added');
    }

    // handle display all notes of an user
    if(isset($_POST['action']) && $_POST['action'] == 'display_notes'){
        $output = '';

        $notes = $cuser->get_notes($cid);
        $sl = 1;

        if($notes){
            $output .= '<table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Note</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';
            foreach ($notes as $row) {
                $output .= '<tr>
                <td>'.$sl++.'</td>
                <td>'.$row['title'].'</td>
                <td>'.substr($row['note'], 0, 75).'...</td>
                <td>
                    <a href="#" id="'.$row['id'].'" title="View Details" class="text-success infoBtn text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="top"><i class="fas fa-info-circle fa-lg"></i>&nbsp;</a>

                    <a href="#" id="'.$row['id'].'" data-bs-toggle="modal" data-bs-target="#editNoteModal" class="text-primary editBtn text-decoration-none"><i data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Note" class="fas fa-edit fa-lg"></i>&nbsp;</a>

                    <a href="#" id="'.$row['id'].'" title="Delete Note" class="text-danger deleteBtn text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="top"><i class="fas fa-trash-alt fa-lg"></i>&nbsp;</a>
                </td>
                </tr>';
            }
            $output .= '</tbody> </table>';

            echo $output;
        } else {
            echo "<h3 class='text-center text-secondary'>:) You have not written any note yet! write your first note now!</h3>";
        }
    }

    // handle edit note of an user ajax request
    if (isset($_POST['edit_id'])) {
        $id = $_POST['edit_id'];

        $row = $cuser->edit_note($id);
        echo json_encode($row);
    }

    // handle update note of user ajax request
    if (isset($_POST['action']) && $_POST['action']=='update_note') {
        $id = $cuser->test_input($_POST['id']);
        $title = $cuser->test_input($_POST['title']);
        $note = $cuser->test_input($_POST['note']);

        $cuser->update_note($id, $title, $note);
        $cuser->notification($cid, 'Admin', 'Note Updated');
    }

    // handle delete a note of an user ajax request
    if (isset($_POST['del_id'])) {
        $id = $_POST['del_id'];

        $cuser->delete_note($id);
        $cuser->notification($cid, 'Admin', 'Note Deleted');

    }

    // handle display note of an user is details ajax request
    if (isset($_POST['info_id'])) {
        $id = $_POST['info_id'];
        $row = $cuser->edit_note($id);
        echo json_encode($row);
    }

    // handle profile update ajax request
    if (isset($_FILES['image'])) {
        $name = $cuser->test_input($_POST['name']);
        $gender = $cuser->test_input($_POST['gender']);
        $dob = $cuser->test_input($_POST['dob']);
        $phone = $cuser->test_input($_POST['phone']);

        $oldImg = $_POST['oldImg'];
        $folder = 'uploads/';

        if (isset($_FILES['image']['name']) && ($_FILES['image']['name'] != '')) {
            $newImage = $folder.date('Y_m_d_h_i_s_').$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $newImage);

            if ($oldImg != null) {
                unlink($oldImg);
            }
        } else {
            $newImage = $oldImg;
        }

        $cuser->update_profile($name, $gender, $dob, $phone, $newImage, $cid);
        $cuser->notification($cid, 'Admin', 'Profile Updated');

    }

    // handle change password ajax request

    if (isset($_POST['action']) && $_POST['action'] == 'change_pass') {
        $currentPass = $_POST['curpass'];
        $newPass = $_POST['newpass'];
        $cnewPass = $_POST['cnewpass'];

        $hnewPass = password_hash($newPass, PASSWORD_DEFAULT);

        if ($newPass != $cnewPass) {
            echo $cuser->showMessage('danger', 'Password Did Not Matched!');
        } else {
            if (password_verify($currentPass, $cpass)) {
                $cuser->change_password($hnewPass, $cid);
                echo $cuser->showMessage('success', 'Password Changed Successfully!');
                $cuser->notification($cid, 'Admin', 'Password Changed');

            } else {
                echo $cuser->showMessage('danger', 'Current Password is Wrong!');
            }
        }
    }

    // verify E-mail ajax request
    if (isset($_POST['action']) && $_POST['action'] == 'verify-email') {
        try {
            // server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            
            $mail->Username = Database::USERNAME;
            $mail->Password = Database::PASSWORD;
            
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // recipients
            $mail->setFrom(Database::USERNAME, 'User Management System');
            $mail->addAddress($cemail);

            // content
            $mail->isHTML(true);
            $mail->Subject = 'Verify Password';
            $mail->Body = '<h3>Click the below link to verify your E-Mail.<br><br><a href="http://localhost/user_system/verify-email.php?email='.$cemail.'">http://localhost/user_system/verify-email.php?email='.$cemail.'</a><br><br>Regards<br>Emran Hasan</h3>';

            $mail->send();
            echo $cuser->showMessage('success', 'Verification link sent to your E-Mail. Please check your mail!');

        } catch(Exception $e){
            echo $cuser->showMessage('danger', 'Something went wrong please try again later!');
        }
    }

    // handle send feedback to admin ajax request
    if (isset($_POST['action']) && $_POST['action'] == 'feedback') {
        $subject = $cuser->test_input($_POST['subject']);
        $feedback = $cuser->test_input($_POST['feedback']);

        $cuser->send_feedback($subject, $feedback, $cid);
        $cuser->notification($cid, 'Admin', 'Feedback written');

    }
    
    // handle fetch notification of an user
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

    // handle check notification
    if(isset($_POST['action']) && $_POST['action'] == 'checkNotification'){
       $countNotification =  $cuser->fetchNotification($cid);
       if ($countNotification) {
        //  echo '<i class="fas fa-circle text-danger align-top" style="font-size: 10px;">'.count($countNotification).'</i>';
        echo '
            <p class="bg-danger d-inline-block rounded-circle fw-bold" style="height: 20px; width: 20px; font-size: 10px; vertical-align: top;  margin-top: -10px"><span class="text-center d-flex justify-content-center" style="margin-top: 2px;">'.count($countNotification).'</span></p>
            ';
       } else {
           echo '';
       }
    }

    // handle remove notification
    if (isset($_POST['notification_id'])) {
        $id = $_POST['notification_id'];
        $cuser->removeNotification($id);
    }

    // handle send permanent Delete User to user ajax request
    if (isset($_POST['del_email_id'])) {
        $email = $_POST['del_email_id'];
        $pass = $_POST['pass'];
        $conpass = $_POST['cpass'];

        if ($pass != $conpass) {
            echo 'Password Did Not Matched!';
        } else {
            if (password_verify($pass, $cpass)) {
                $cuser->permanentDeleteUser($email);
            } else {
                echo 'Password is Wrong!';
            }
        }

    }
?>