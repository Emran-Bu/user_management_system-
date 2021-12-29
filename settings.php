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
                                <span><em><b>Note :</b> If you permanently delete your account? you lost your all notes and all stored data! you can't forget him! please sure then delete your account!</em></span>
                                <div class="mt-2 d-grid">
                                    <button class="btn btn-danger">Delete Account</button>
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
            // send feedback to admin ajax request
            $("#feedbackBtn").click(function(e){
                if ($("#feedback-form")[0].checkValidity()) {
                    e.preventDefault();
                    $("#feedbackBtn").val('Please Wait...');

                    $.ajax({
                        url : 'assets/php/process.php',
                        method : 'post',
                        data : $("#feedback-form").serialize()+'&action=feedback',
                        success : function (response){
                            $("#feedback-form")[0].reset();
                            $("#feedbackBtn").val('Send Feedback');
                            Swal.fire(
                                'Feedback successfully sent to the Admin',
                                '',
                                'success'
                            )
                        }
                    });
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
        });
    </script>
</body>
</html>