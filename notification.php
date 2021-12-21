<?php

    require_once 'assets/php/session.php';
    
?>
<?php require_once 'header.php' ?>

    <div class="container">
        <div class="row justify-content-center my-2">
            <div class="col-lg-6 mt-4" id="showAllNotification">
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button class="btn-close fs-6 p-3" type="button" data-bs-dismiss="alert" aria-label="close"></button>
                    <h4 class="alert-heading">New Notification</h4>
                    <div class="lead fs-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, repudiandae!</div>
                    <hr class="my-2">
                    <p class="float-start mb-0" style="font-size: 14px;">Replay of feedback from admin</p>
                    <p class="float-end mb-0 fst-italic" style="font-size: 14px;">1 Minute ago</p>
                    <div class="clearfix"></div>
                </div>
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
            // fetch notification of an user
            fetchNotification();
            function fetchNotification(){
                $.ajax({
                    url : 'assets/php/process.php',
                    method : 'post',
                    data : { action : 'fetchNotification' },
                    success : function(response){
                        console.log(response);
                    }
                });
            }
        });
    </script>
</body>
</html>