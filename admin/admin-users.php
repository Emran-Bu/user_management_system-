<?php require_once 'assets/php/admin-header.php'; ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card my-2 border-success">
            <div class="card-header bg-success text-white">
                <h4 class="m-0">Total Registered Users</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive" id="showAllUsers">
                    <p class="text-center lead align-self-center">Please Wait...</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- start display users in details modal -->
<div class="modal fade" id="showUserDetailsModal">
    <div class="modal-dialog modal-dialog-centered mw-100 w-50">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title text-light" id="getName">Add New Note</h4>
                <button type="button" data-bs-dismiss="modal" class="text-light btn close modCloseBtnColor">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card border-primary bg-dark text-white">
                            <div class="card-body">
                                <p class="text-primary" id="getEmail"></p>
                                <p class="text-primary" id="getPhone"></p>
                                <p class="text-primary" id="getDOB"></p>
                                <p class="text-primary" id="getGender"></p>
                                <p class="text-primary" id="getCreated"></p>
                                <p class="text-primary" id="getVerified"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card align-self-center" id="getImage"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End display users in details modal -->

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
            // fetch all user ajax request
            fetchAllUsers();
            function fetchAllUsers(){
                $.ajax({
                    url : 'assets/php/admin-action.php',
                    method : 'post',
                    data : { action: 'fetchAllUsers' },
                    success : function(response){
                        $("#showAllUsers").html(response);
                        $('table').DataTable({
                            order : [0, 'desc']
                        });
                    }
                });
            }

            // display user details ajax request
            $('body').on('click', '.userDetailsIcon', function(e){
                e.preventDefault();

                details_id = $(this).attr('id');

                $.ajax({
                    url : 'assets/php/admin-action.php',
                    method : 'post',
                    data : { details_id : details_id },
                    success : function(response){
                        data = JSON.parse(response);

                        $('#getName').text(data.name + ' ' + '(ID : ' + data.id + ')');
                        
                        $('#getEmail').html('<p3 class="text-light fw-bold fs-6">Email : </p3> ' + data.email);
                        $('#getPhone').html('<p3 class="text-light fw-bold fs-6">Phone :</p3> ' + data.phone);

                        $('#getDOB').html('<p3 class="text-light fw-bold fs-6">DOB :</p3> : ' + data.dob);

                        $('#getGender').html('<p3 class="text-light fw-bold fs-6">Gender :</p3> ' + data.gender);

                        $('#getCreated').html('<p3 class="text-light fw-bold fs-6">Joined On :</p3> ' + data.created_at);

                        if (data.verified == '1') {
                            $('#getVerified').html('<p3 class="text-light fw-bold fs-6">Verified :</p3> Verified!');
                        } else {
                            $('#getVerified').html('<p3 class="text-light fw-bold fs-6">Verified :</p3> Not Verified!');
                        }

                        if (data.photo != '') {
                            $('#getImage').html('<img src="../assets/php/'+ data.photo +'" class="img-thumbnail img-fluid align-self-center" style="width : 100%; height : 274px">');
                        } else {
                            $('#getImage').html('<img src="../assets/img/avatar2.jpg" class="img-thumbnail img-fluid align-self-center" style="width : 100%; height : 274px">');
                        }
                    }
                });
            });

            // delete an user ajax request
            $('body').on('click', '.userDeleteIcon', function(e){
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
                url : 'assets/php/admin-action.php',
                method : 'post',
                data : { del_id : del_id },
                success : function (response){
                    // console.log(response);
                    Swal.fire(
                    'Deleted!',
                    'User deleted successfully!',
                    'success'
                    )
                    fetchAllUsers();
                }
            });

            }
            })
            })
            
        });
    </script>
</body>
</html>