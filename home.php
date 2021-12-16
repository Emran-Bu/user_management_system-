<?php

    require_once 'assets/php/session.php';
    
?>
<?php require_once 'header.php' ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php if($verified == 'Not Verified!'): ?>
                    <div class="text-center alert alert-danger alert-dismissible p-0 mt-1">
                        <strong>Your E-mail is not verified! We've  sent you and E-mail Verification link on your E-mail, check & verify now!</strong>
                        <button type="button" class="btn" data-bs-dismiss="alert" style="font-size: 20px; margin-bottom: 8px;">&times;</button>
                    </div>
                <?php endif; ?>
                <h3 class="text-center text-primary mt-2 fw-bold">Write your notes here & access anytime anywhere!</h3>
            </div>
        </div>
    </div>
    <!-- <h1><?= basename($_SERVER['PHP_SELF']); ?></h1> -->

<?php require_once 'footer.php' ?>