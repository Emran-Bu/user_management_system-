<?php

    require_once 'assets/php/session.php';
    
?>
    <?php require_once 'header.php' ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 mt-3">
                <?php if($verified == 'Verified!'): ?>
                    <div class="card border-primary">
                        <div class="card-header lead text-center bg-primary text-white">Send Feedback to Admin!</div>
                        <div class="card-body">
                            <form action="" method="post" class="px-4" id="feedback-form">
                                <div class="form-group mb-2">
                                    <input class="form-control form-control-lg rounded-0" type="text" name="subject" id="subject" placeholder="Write your subject" required>
                                </div>
                                <div class="form-group mb-2">
                                    <textarea class="form-control form-control-lg rounded-0" rows="6" name="feedback" id="feedback" placeholder="Write your feedback here..." required></textarea>
                                </div>
                                <div class="form-group d-grid">
                                    <input class="rounded-0 btn-lg btn btn-primary btn-block" type="submit" id="feedbackBtn" name="feedbackBtn" value="Send Feedback">
                                </div>
                            </form>
                        </div>
                    <div>
                <?php else: ?>
                    <h1 class="text-center text-secondary mt-5">Verify Your E-Mail First to Send Feedback to Admin!</h1>
                <?php endif; ?>
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
        });
    </script>
</body>
</html>