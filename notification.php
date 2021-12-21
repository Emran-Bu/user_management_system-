<?php

    require_once 'assets/php/session.php';
    
?>
<?php require_once 'header.php' ?>

    <div class="container">
        <div class="row justify-content-center my-2">
            <div class="col-lg-6 mt-4" id="showAllNotification">
                
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