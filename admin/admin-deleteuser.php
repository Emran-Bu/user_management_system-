<?php require_once 'assets/php/admin-header.php'; ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card my-2 border-danger">
            <div class="card-header bg-danger text-white">
                <h4 class="m-0">Total Deleted Users</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive" id="showAllDeletedUsers">
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
            // fetch all deleted user ajax request
            fetchAllDeletedUsers();
            function fetchAllDeletedUsers(){
                $.ajax({
                    url : 'assets/php/admin-action.php',
                    method : 'post',
                    data : { action: 'fetchAllDeletedUsers' },
                    success : function(response){
                        $("#showAllDeletedUsers").html(response);
                        $('table').DataTable({
                            order : [0, 'desc']
                        });
                    }
                });
            }

            // restore deleted an user ajax request
            $('body').on('click', '.restoreUserIcon', function(e){
            e.preventDefault();

            restore_id = $(this).attr('id');

            Swal.fire({
            title: 'Are you sure want restore this user?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, restore it!'

            }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                url : 'assets/php/admin-action.php',
                method : 'post',
                data : { restore_id : restore_id },
                success : function (response){
                    // console.log(response);
                    Swal.fire(
                    'Restored!',
                    'User Restore successfully!',
                    'success'
                    )
                    fetchAllDeletedUsers();
                }
            });

            }
            })
            })
        });
    </script>
</body>
</html>