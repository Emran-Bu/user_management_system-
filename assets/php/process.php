<?php

    require_once 'session.php';

    // handle add new note ajax request
    if (isset($_POST['action']) && $_POST['action'] == 'add_note') {
        $title = $cuser->test_input($_POST['title']);
        $note = $cuser->test_input($_POST['note']);

        $cuser->add_new_note($cid, $title, $note);
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
    }

    // handle delete a note of an user ajax request
    if (isset($_POST['del_id'])) {
        $id = $_POST['del_id'];

        $cuser->delete_note($id);
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
    }
?>