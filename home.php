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
                    <p class="text-center lead mt-5">Please Wait...</p>
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
                            <textarea class="form-control form-control-lg" name="note" cols="25" rows="6" placeholder="Write your note here..." required></textarea>
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
                            <input id="title" type="text" name="title" class="form-control form-control-lg" placeholder="Enter Title" required>
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
    
    
    <!-- Jquery link -->
    <script src="assets/js/jqueryPlugin/jquery-3.5.1.min.js"></script>

    <!-- bootstrap js links -->
    <script type="text/javascript" src="assets/js/bootstrap-5/bootstrap.bundle.min.js"></script>

    <!-- data tables js link -->
    <script type="text/javascript" src="assets/DataTables/datatables.min.js"></script>

    <!-- sweetalert2 -->
    <script src="assets/sweetalert2@11/add_sweetalert2@11/sweetalert2.all.min.js"></script>

    <!-- custom script  -->

    <script type="text/javascript">

      // tooltip js
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
      var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl){
        return new bootstrap.Tooltip(tooltipTriggerEl)
      });

      // data tables js
      $(document).ready( function () {

        // add new note ajax request
        $("#addNoteBtn").click(function(e){
          if($("#add-note-form")[0].checkValidity()){
            e.preventDefault();

            $("#addNoteBtn").val("Please Wait...");

            $.ajax({
              url : 'assets/php/process.php',
              method : 'post',
              data : $("#add-note-form").serialize()+'&action=add_note',
              success : function(response){
                $("#addNoteBtn").val("Add Note");
                $("#add-note-form")[0].reset();
                $("#addNoteModal").modal('hide');

                // sweetalert2
                Swal.fire(
                  'Note added successfully!',
                  '',
                  'success'
                )
                displayAllNotes();
              }
            });
          }
        });

        // edit note of an user ajax request
        $("body").on('click', '.editBtn', function(e){
          e.preventDefault();
          
          edit_id = $(this).attr('id');

          $.ajax({
            url : 'assets/php/process.php',
            method : 'post',
            data : { edit_id : edit_id },
            success : function (response){
              data = JSON.parse(response);
              $('#id').val(data.id);
              $('#title').val(data.title);
              $('#note').val(data.note);
            }
          });
        
        });

        // update note of an user ajax request
        $("#editNoteBtn").click(function(e){
          if($("#edit-note-form")[0].checkValidity()){
            e.preventDefault();

            $("#editNoteBtn").val("Please Wait...");

            $.ajax({
              url : 'assets/php/process.php',
              method : 'post',
              data : $("#edit-note-form").serialize()+'&action=update_note',
              success : function(response){
                console.log(response);
                $("#editNoteBtn").val("Update Note");
                $("#edit-note-form")[0].reset();
                $("#editNoteModal").modal('hide');

                // sweetalert2
                Swal.fire(
                  'Note Updated successfully!',
                  '',
                  'success'
                )
                displayAllNotes();
              }
            });
          }
        });

        // delete a note of an user ajax request
        $('body').on('click', '.deleteBtn', function(e){
          e.preventDefault();

          del_id = $(this).attr('id');

          Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'

        }).then((result) => {
          if (result.isConfirmed) {

            $.ajax({
              url : 'assets/php/process.php',
              method : 'post',
              data : { del_id : del_id },
              success : function (response){
                // console.log(response);
                Swal.fire(
                'Deleted!',
                'Note deleted successfully!',
                'success'
                )
                displayAllNotes();
              }
           });

          }
        })
        })

        // display note of an user is details ajax request
        $('body').on('click', '.infoBtn', function(e){
          e.preventDefault();

          info_id = $(this).attr('id');

          $.ajax({
            url : 'assets/php/process.php',
            method : 'post',
            data : { info_id : info_id },
            success : function (response){
              data = JSON.parse(response);
              Swal.fire({
                title: '<strong>Note : ID('+data.id+')</strong>',
                icon: 'info',
                html: '<b>Title : </b>'+data.title+'<br><br><b>Note : </b>'+data.note+'<br><br><b>Written on : </b>'+data.created_at+'<br><br><b>Updated on : </b>'+data.updated_at+'<br><br>',
                showCloseButton: true,
              })
            }
          });
        })

        // display all note ajax of an user
        function displayAllNotes(){
          $.ajax({
            url : 'assets/php/process.php',
            method : 'post',
            data : { action : 'display_notes' },
            success : function (response){
              $("#showNote").html(response);
              $('table').DataTable({
                order: [0, 'desc']
              });
            }
          });
        }

        displayAllNotes();

        // check notification
        checkNotification();
        function checkNotification(){
            $.ajax({
                url : 'assets/php/process.php',
                method : 'post',
                data : { action : 'checkNotification' },
                success : function(response){
                    $("#checkNotification").html(response);
                }
            });
        }

        // checking user is logged in or not
        $.ajax({
            url : 'assets/php/action.php',
            method : 'post',
            data : { action : 'checkUser' },
            success : function(response){
              if(response === 'bye'){
                location.href = 'index.php';
              }
            }
        });

      });

    </script>
    
</body>
</html>