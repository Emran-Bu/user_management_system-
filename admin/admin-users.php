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
                        <div class="card border-primary">
                            <div class="card-body">
                                <p id="getEmail"></p>
                                <p id="getPhone"></p>
                                <p id="getDOB"></p>
                                <p id="getGender"></p>
                                <p id="getCreated"></p>
                                <p id="getVerified"></p>
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
        });
    </script>
</body>
</html>