<?php require_once 'assets/php/admin-header.php'; ?>

<div class="row">
    .di
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
            // fetch all notification ajax request
            fetchAllNotification();
            function fetchAllNotification(){
                $.ajax({
                    url : 'assets/php/admin-action.php',
                    method : 'post',
                    data : { action: 'fetchAllNotification' },
                    success : function(response){
                        $("#showAllNotification").html(response);
                        $('table').DataTable({
                            order : [0, 'desc']
                        });
                    }
                });
            }
        });
    </script>
</body>
</html>