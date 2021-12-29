<?php require_once 'assets/php/admin-header.php'; ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card my-2 border-info">
            <div class="card-header bg-info text-white">
                <h4 class="m-0">Total Notes By All Users</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive" id="showAllNotes">
                    <p class="text-center lead align-self-center">Please Wait...</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer part -->
                <!-- 2nd col -->
            </div>
            <!-- row div end -->
        </div>
        <!-- container div end -->
    </div>
    <!-- custom script -->
    <script>
        $(document).ready(function(){
            // fetch all note ajax request
            fetchAllNotes();
            function fetchAllNotes(){
                $.ajax({
                    url : 'assets/php/admin-action.php',
                    method : 'post',
                    data : { action: 'fetchAllNotes' },
                    success : function(response){
                        $("#showAllNotes").html(response);
                        $('table').DataTable({
                            order : [0, 'desc']
                        });
                    }
                });
            }

            // display note of an user is details ajax request
            $('body').on('click', '.userNotesDetailsIcon', function(e){
            e.preventDefault();

            notes_id = $(this).attr('id');

            $.ajax({
                url : 'assets/php/admin-action.php',
                method : 'post',
                data : { notes_id : notes_id },
                success : function (response){
                data = JSON.parse(response);
                Swal.fire({
                    title: '<strong>Note : ID('+data.id+')</strong>',
                    icon: 'info',
                    html: '<b>User Name : </b>'+data.name+'<br><br><b>User Email : </b>'+data.email+'<br><br><b>Note Title : </b>'+data.title+'<br><br><b>Note : </b>'+data.note+'<br><br><b>Written on : </b>'+data.created_at+'<br><br><b>Updated on : </b>'+data.updated_at+'<br><br>',
                    showCloseButton: true,
                })
                }
            });
            });

            // delete an note ajax request
            $('body').on('click', '.deleteNoteIcon', function(e){
            e.preventDefault();

            note_del_id = $(this).attr('id');

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
                url : 'assets/php/admin-action.php',
                method : 'post',
                data : { note_del_id : note_del_id },
                success : function (response){
                    Swal.fire(
                    'Deleted!',
                    'Note deleted successfully!',
                    'success'
                    )
                    fetchAllNotes();
                }
            });

            }
            });
            });


            // check notification
            checkNotification();
            function checkNotification(){
                $.ajax({
                    url : 'assets/php/admin-action.php',
                    method : 'post',
                    data : { action : 'checkNotification' },
                    success : function(response){
                        $("#checkNotification").html(response);
                    }
                });
            }

        });
    </script>
</body>
</html>