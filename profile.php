<?php

    require_once 'assets/php/session.php';
    
?>
<?php require_once 'header.php' ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card rounded-0 mt-3 border-primary">
                    <div class="card-header border-primary">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a href="#profile" class="nav-link active font-weight-bold" data-bs-toggle="tab">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a href="#editProfile" class="nav-link font-weight-bold" data-bs-toggle="tab">Edit Profile</a>
                            </li>
                            <li class="nav-item">
                                <a href="#changePassword" class="nav-link font-weight-bold" data-bs-toggle="tab">Change Password</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <!-- profile tab content start -->
                            <div class="tab-pane container active" id="profile">
                                <div class="row">
                                    <div id="verifyEmailAlert"></div>
                                    <div class="col-lg-6">
                                        <div class="card border-primary">
                                            <div class="card-header bg-primary text-light text-center lead">
                                                User ID : <?= $cid; ?>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text p-2 m-1 rounded" style="border: 1px solid #0275d8;"><b>Name : </b><?= $cname; ?></p>

                                                <p class="card-text p-2 m-1 rounded" style="border: 1px solid #0275d8;"><b>E-Mail : </b><?= $cemail; ?></p>

                                                <p class="card-text p-2 m-1 rounded" style="border: 1px solid #0275d8;"><b>Gender : </b><?= $cgender; ?></p>

                                                <p class="card-text p-2 m-1 rounded" style="border: 1px solid #0275d8;"><b>Date of Birth : </b><?= $cdob; ?></p>

                                                <p class="card-text p-2 m-1 rounded" style="border: 1px solid #0275d8;"><b>Phone : </b><?= $cphone; ?></p>

                                                <p class="card-text p-2 m-1 rounded" style="border: 1px solid #0275d8;"><b>Registered On : </b><?= $reg_on; ?></p>

                                                <p class="card-text p-2 m-1 rounded" style="border: 1px solid #0275d8;"><b>E-Mail Verified : </b><?= $verified; ?>
                                                
                                                <?php if ($verified == 'Not Verified!'): ?>
                                                    <a href="#" class="float-end" id="verify-email">Verify Now</a>
                                                <?php endif ?>

                                                </p>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 mt-3 mt-lg-0 align-self-center">
                                        <div class="card border-primary">
                                            <?php if(!$cphoto): ?>
                                                <img src="assets/img/avatar2.jpg" class="img-thumbnail img-fluid" alt="avatar" srcset="" style="height: 405px;">
                                            <?php else: ?>
                                                <img src="<?= 'assets/php/'.$cphoto; ?>" class="img-thumbnail img-fluid" alt="avatar" srcset="" style="height: 405px;">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- profile tab content End -->

                            <!-- profile tab content start -->
                            <div class="tab-pane container fade" id="editProfile">
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="card border-danger align-self-center">
                                            <?php if(!$cphoto): ?>
                                                <img src="assets/img/avatar2.jpg" class="img-thumbnail img-fluid" alt="avatar" srcset="" style="height: 405px;">
                                            <?php else: ?>
                                                <img src="<?= 'assets/php/'.$cphoto; ?>" class="img-thumbnail img-fluid" alt="avatar" srcset="" style="height: 405px;">
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mt-3 mt-lg-0">
                                        <div class="card border-danger">
                                            <form action="" method="post" class="px-3 mt-2" enctype="multipart/form-data" id="profile-update-form">
                                                <input type="hidden" name="oldImg" value="<?= $cphoto; ?>">
                                                <div class="form-group mb-3">
                                                    <label class="form-control-label" for="profilePhoto" class="m-1">Upload Profile Image : </label>
                                                    <input class="form-control" type="file" name="image" id="profilePhoto">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-control-label" for="name" class="m-1">Name : </label>
                                                    <input class="form-control" type="text" name="name" id="name" value="<?= $cname; ?>">
                                                </div>

                                                <div class="form-group mb-2"> 
                                                    <div class="d-flex">
                                                        <div class="me-3"><label class="">Gender : </label></div>
                                                        <div class="form-check me-3">
                                                            <input type="radio" class="form-check-input" name="gender" value="Male" <?= ($cgender == 'Male')? 'checked':'' ?>>
                                                            <label class="form-control-label" for="gender" class="">Male</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input" name="gender" value="Female" <?= ($cgender == 'Female')? 'checked':'' ?>>
                                                            <label class="form-control-label" for="gender" class="">Female</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="dob">Date of Birth : </label>
                                                    <input class="form-control" type="date" name="dob" id="dob" value="<?= $cdob; ?>">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="phone">Phone : </label>
                                                    <input class="form-control" type="tel" name="phone" id="phone" placeholder="Phone" value="<?= $cphone; ?>">
                                                </div>

                                                <div class="form-group mb-2">
                                                    <input class="btn btn-danger w-100 btn-block" type="submit" name="profile_update" id="profileUpdateBtn" value="Update Profile">
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- profile tab content end -->

                            <!-- change password tab contents start -->
                            <div class="tab-pane container fade" id="changePassword">
                                <div class="row">
                                    <div id="changePassAlert"></div>
                                    <div class="col-lg-6">
                                        <div class="card border-success">
                                            <div class="card-header bg-success text-white text-center lead">
                                                Change Password
                                            </div>
                                            <form action="" method="post" class="px-3 mt-3" id="change-pass-form">
                                                
                                                <div class="form-group mb-2">
                                                    <label for="curpass">Enter Your Current Password : </label>
                                                    <input class="form-control" type="password" name="curpass" id="curpass" placeholder="Current Password" minlength="5" required>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="newpass">Enter New Password : </label>
                                                    <input class="form-control" type="password" name="newpass" id="newpass" placeholder="New Password" minlength="5" required>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="cnewpass">Confirm New Password : </label>
                                                    <input class="form-control" type="password" name="cnewpass" id="cnewpass" placeholder="Confirm New Password" minlength="5" required>
                                                    
                                                    <div class="text-danger">
                                                    <i id="changePassError"></i>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-2 d-grid">
                                                    <input class="btn btn-success" value="Change Password" type="submit" name="changepass" id="changePassBtn">
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mt-3 mt-lg-0 align-self-center">
                                        <div class="card border-success">
                                            <img class="img-thumbnail img-fluid" src="assets/img/passwords2.png" alt="" srcset="" style="height: 334px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- change password tab contents end -->
                        </div>
                    </div>
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
            // profile update ajax request
            $("#profile-update-form").submit(function(e){
                e.preventDefault();
                $.ajax({
                    url : 'assets/php/process.php',
                    method : 'post',
                    processData : false,
                    contentType : false,
                    cache : false,
                    data : new FormData(this),
                    success : function(response){
                        location.reload();
                    }
                });
            });

            // change password ajax request
            $('#changePassBtn').click(function(e){
                if ($('#change-pass-form')[0].checkValidity()) {
                    e.preventDefault();

                    $('#changePassBtn').val('Please Wait...');
                    
                    if ($("#newpass").val() != $("#cnewpass").val()) {
                        $("#changePassError").text('* Password did not matched!');
                        $('#changePassBtn').val('Change Password');
                     } else {
                        $.ajax({
                            url : 'assets/php/process.php',
                            method : 'post',
                            data : $('#change-pass-form').serialize()+'&action=change_pass',
                            success : function(response){
                                $("#changePassAlert").html(response);
                                $('#changePassBtn').val('Change Password');
                                $("#changePassError").text('');
                                $("#change-pass-form")[0].reset();
                            }
                        });
                     }
                }
            });

            // verify E-mail ajax request
            $("#verify-email").click(function(e){
                e.preventDefault();
                $(this).text('Please Wait...');

                $.ajax({
                    url : 'assets/php/process.php',
                    method : 'post',
                    data : { action : 'verify-email'},
                    success : function(response){
                        $("#verifyEmailAlert").html(response);
                        $("#verify-email").text('Verify Now');
                    }
                });
            });
        });
    </script>
</body>
</html>
