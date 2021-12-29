<?php require_once 'assets/php/admin-header.php'; ?>

<div class="row justify-content-center my-2">
    <div class="col-lg-6 mt-4" id="showNotification">

    </div>
</div>
<!-- footer part -->
                <!-- 2nd col -->
            </div>
            <!-- row div end -->
        </div>
        <!-- container div end -->
    </div>
    <script>
        $(document).ready(function(){
            // fetch notification ajax request
            fetchNotification();
            function fetchNotification(){
                $.ajax({
                    url : 'assets/php/admin-action.php',
                    method : 'post',
                    data : { action: 'fetchNotification' },
                    success : function(response){
                        $("#showNotification").html(response);
                        // console.log(response);
                    }
                });
            }

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

            // remove notification
            $("body").on('click', '.btn-close', function(e){
                e.preventDefault();
                notification_id = $(this).attr('id');

                $.ajax({
                    url : 'assets/php/admin-action.php',
                    method : 'post',
                    data : { notification_id : notification_id },
                    success : function(response){
                        fetchNotification();
                        checkNotification();
                    }
                });
            });

        });
    </script>
</body>
</html>