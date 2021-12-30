<?php

    require_once 'assets/php/session.php';
    
?>
    <?php require_once 'header.php' ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 mt-3">

                    <div class="card border-danger">
                        <div class="card-header lead text-center bg-danger text-white">Permanently Delete This Account!</div>
                        <div class="card-body">
                            <div class="table-responsive px-5" id="showUserDeleteDataTable">
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <th>ID : </th>
                                        <td><?= $cid ?></td>
                                    </tr>
                                    <tr>
                                        <th>Name : </th>
                                        <td><?= $cname ?></td>
                                    </tr>
                                    <tr>
                                        <th>E-Mail : </th>
                                        <td><?= $cemail ?></td>
                                    </tr>
                                    <tr>
                                        <th>Registered On : </th>
                                        <td><?= $reg_on ?></td>
                                    </tr>
                                </table>


<div id="confirmPassword" style="display: none;">
    <div class="row">
        <div id="confirmPassAlert"></div>
        <div class="col-lg-12">
            <div class="card border-success">
                <div class="card-header bg-success text-white text-center lead p-0">
                    Password Confirm
                </div>
                <form action="" method="post" class="px-3 mt-3" id="confirm-pass-form">

                <div class="alert alert-danger alert-dismissible p-0 text-center" id="confirmPassErrorAlert" style="display: none;">
                    <button class="btn " data-bs-dismiss="alert" type="button" name="button" >&times;</button>
                </div>

                    <div class="form-group mb-2">
                        <label for="pass">Enter Your Password : </label>
                        <input class="form-control" type="password" name="pass" id="pass" placeholder="New Password" minlength="5" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="cpass">Confirm Your Password : </label>
                        <input class="form-control" type="password" name="cpass" id="cpass" placeholder="Confirm New Password" minlength="5" required>
                        
                        <div class="text-danger">
                        <i id="confirmPassError"></i>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

                                <span><em><b>Note :</b> If you permanently delete your account, you will lose your all notes and all stored data. This will never be returned. So make sure then delete your account!</em></span>
                                <div class="mt-2 d-grid">
                                    <button class="btn btn-danger" del_email_id="<?= $cemail ?>" id="permanentDeleteUser">Delete Account</button>
                                </div>
                            </div>
                        </div>
                    <div>
                
            </div>
        </div>
    </div>
    
    
    <!-- Jquery link -->
    <script src="assets/js/jqueryPlugin/jquery-3.5.1.min.js"></script>

    <!-- bootstrap js links -->
    <script type="text/javascript" src="assets/js/bootstrap-5/bootstrap.bundle.min.js"></script>

    <!-- data tables js link -->
    <script type="text/javascript" src="assets/DataTables/datatables.min.js"></script>

    <!-- sweetalert2 -->
    <script src="assets/sweetalert2@11/add_sweetalert2@11/sweetalert2.all.min.js"></script>

    <!-- custom script  -->

    <script>
        $(document).ready(function(){
            // send permanent Delete User to user ajax request
            $("#permanentDeleteUser").click(function(){
                $("#confirmPassword").show();

                if ($("#pass").val() == '' && $("#cpass").val() == '') {
                        $("#confirmPassErrorAlert").show();
                        $("#confirmPassErrorAlert").text('Enter Your Password!');
                }
                else if ($("#pass").val() != $("#cpass").val()) {
                    $("#confirmPassError").text('* Password did not matched!');
                    $("#confirmPassErrorAlert").show();
                    $("#confirmPassErrorAlert").text('Password did not matched!');
                } 
                else {
                $("#permanentDeleteUser").text('Please Wait...');

                del_email_id = $(this).attr('del_email_id');
                pass = $("#pass").val();
                cpass = $("#cpass").val();

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
                        data : { del_email_id : del_email_id, pass : pass, cpass : cpass },
                        success : function (response){
                        $("#permanentDeleteUser").text('Delete Account');
                        $("#confirmPassErrorAlert").text(response);
                        
                        if (response === 'Password Did Not Matched!' || response === 'Password is Wrong!') {
                            
                        } else {
                        Swal.fire(
                        'Deleted!',
                        'Your Account deleted successfully!',
                        'success'
                        )
                        location.href = 'index.php';
                        }
                        }
                    });
                    
                    }
                })
            }
            });

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