    
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
              id = JSON.parse(response);
              console.log(id);
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

      });

    </script>
    
</body>
</html>