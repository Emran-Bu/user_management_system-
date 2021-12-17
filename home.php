<?php

    require_once 'assets/php/session.php';
    
?>
<?php require_once 'header.php' ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php if($verified == 'Not Verified!'): ?>
                    <div class="text-center alert alert-danger alert-dismissible p-0 mt-1">
                        <strong>Your E-mail is not verified! We've  sent you and E-mail Verification link on your E-mail, check & verify now!</strong>
                        <button type="button" class="btn" data-bs-dismiss="alert" style="font-size: 20px; margin-bottom: 8px;">&times;</button>
                    </div>
                <?php endif; ?>
                <h3 class="text-center text-primary mt-2 fw-bold">Write your notes here & access anytime anywhere!</h3>
            </div>
        </div>
        <div class="card my-1 border-primary">
            <h5 class="card-header bg-primary d-flex justify-content-between">
                <span class="text-light lead align-self-center">All Notes</span>
                <a class="btn btn-light" href="" data-bs-toggle="modal" data-bs-target="#addNoteModal"><i class="fas fa-plus-circle fa-lg"></i>&nbsp;Add New Note</a>
            </h5>
            <div class="card-body">
                <div class="table-responsive" id="showNote">

                </div>
            </div>
        </div>
    </div>

    <!-- start add new note modal -->
    <div class="modal fade" id="addNoteModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title text-light">Add New Note</h4>
                    <button type="button" data-bs-dismiss="modal" class="text-light btn close">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" id="add-note-form">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control form-control-lg" placeholder="Enter Title" required>
                        </div>
                        <div class="form-group mt-2">
                            <textarea class="form-control form-control-lg" name="note" id="note" cols="25" rows="6" placeholder="Write your note here..." required></textarea>
                        </div>
                        <div class="form-group mt-2">
                            <input class="btn btn-success btn-lg btn-block w-100" name="addNote" id="addNoteBtn" type="submit" value="Add Note">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end add new note modal -->
    
    <!-- start edit note modal -->
    <div class="modal fade" id="editNoteModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title text-light">Edit Note</h4>
                    <button type="button" data-bs-dismiss="modal" class="text-light btn close">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" id="edit-note-form">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control form-control-lg" placeholder="Enter Title" required>
                        </div>
                        <div class="form-group mt-2">
                            <textarea class="form-control form-control-lg" name="note" id="note" cols="25" rows="6" placeholder="Write your note here..." required></textarea>
                        </div>
                        <div class="form-group mt-2">
                            <input class="btn btn-info text-light btn-lg btn-block w-100" name="editNote" id="editNoteBtn" type="submit" value="Update Note">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end Edit note modal -->
    
<?php require_once 'footer.php' ?>