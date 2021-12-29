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
        });
    </script>
</body>
</html>