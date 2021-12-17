<?php

    require_once 'session.php';

    // handle add new note ajax request
    if (isset($_POST['action']) && $_POST['action'] == 'add_note') {
        $title = $cuser->test_input($_POST['title']);
        $note = $cuser->test_input($_POST['note']);

        $cuser->add_new_note($cid, $title, $note);
    }

?>