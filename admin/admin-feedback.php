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

<!-- reply feedback modal -->
<div class="modal fade" id="showReplyModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-light">Reply This Feedback</h4>
                <button type="button" data-bs-dismiss="modal" class="text-light btn close modCloseBtnColor">&times;</button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" id="reply-feedback-form">
                    <div class="form-group">
                        <textarea class="form-control form-control-lg" name="message" id="message" cols="25" rows="6" placeholder="Write your message here..." required></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <input class="btn btn-info text-light btn-lg btn-block w-100" name="replyFeedback" id="feedbackReplyBtn" type="submit" value="Send Reply">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end Edit note modal -->

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

            // get the current row user id and feedback id
            var uid;
            var fid;
            $("body").on('click', '.replyNoteIcon', function(e){
                uid = $(this).attr("id");
                fid = $(this).attr("fid");
            });

            // send feedback replay to the user ajax request
            $("#feedbackReplyBtn").click(function(e){
                if ($('#reply-feedback-form')[0].checkValidity()) {
                    let message = $('#message').val();
                    e.preventDefault();
                    $("#feedbackReplyBtn").val('Please Wait...');

                    $.ajax({
                        url : 'assets/php/admin-action.php',
                        method : 'post',
                        data : { uid : uid, message : message, fid : fid },
                        success : function (response){
                            $("#feedbackReplyBtn").val('Send Reply');
                            $("#showReplyModal").modal('hide');
                            $('#reply-feedback-form')[0].reset();

                            // sweetalert2
                            Swal.fire(
                            'Feedback Send successfully!',
                            '',
                            'success'
                            )
                            
                            fetchAllFeedback();
                        }
                    });
                }
            });


            // delete an feedback ajax request
            $('body').on('click', '.userFeedbackDeleteIcon', function(e){
            e.preventDefault();

            feedback_del_id = $(this).attr('id');

            Swal.fire({
            title: 'Are you sure?<br>Delete This Feedback!',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'

            }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                url : 'assets/php/admin-action.php',
                method : 'post',
                data : { feedback_del_id : feedback_del_id },
                success : function (response){
                    Swal.fire(
                    'Deleted!',
                    'feedback deleted successfully!',
                    'success'
                    )
                    fetchAllFeedback();
                }
            });

            }
            });
            });

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

        });
    </script>
</body>
</html>