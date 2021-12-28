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
                    $output .= '
                                <tr>
                                    <td>'.$row['id'].'</td>
                                    <td><img src="'.$uphoto.'" class="rounded-circle" width="40px" height="40px"></td>
                                    <td>'.$row['name'].'</td>
                                    <td>'.$row['email'].'</td>
                                    <td>'.$row['phone'].'</td>
                                    <td>'.$row['gender'].'</td>
                                    <td>'.$row['dob'].'</td>
                                    <td>'.$row['verified'].'</td>
                                    <td>
                                        <a href="#" id="'.$row['id'].'" title="View Details" class="text-primary text-decoration-none userDetailsIcon" data-bs-toggle="modal"data-bs-target="#showUserDetailsModal"><i class="fas fa-info-circle fa-lg"></i>&nbsp;</a>

                                        <a href="#" id="'.$row['id'].'" title="Delete Users" class="text-danger text-decoration-none userDeleteIcon"><i class="fas fa-trash-alt fa-lg"></i>&nbsp;</a>
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

?>