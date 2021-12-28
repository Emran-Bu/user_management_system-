<?php require_once 'assets/php/admin-header.php'; ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card my-2 border-warning">
            <div class="card-header bg-warning text-white">
                <h4 class="m-0">Total Feedback From Users</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive" id="showAllFeedback">
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
            // fetch all feedback ajax request
            fetchAllFeedback();
            function fetchAllFeedback(){
                $.ajax({
                    url : 'assets/php/admin-action.php',
                    method : 'post',
                    data : { action: 'fetchAllFeedback' },
                    success : function(response){
                        $("#showAllFeedback").html(response);
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