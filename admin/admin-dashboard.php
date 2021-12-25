<?php
 require_once 'assets/php/admin-header.php'; 
 require_once 'assets/php/admin-db.php';
 
 $count = new Admin();
?>

<!-- 1st views dashboard card start -->
<div class="row mt-3">
    <div class="col-lg-3 mb-2 mb-lg-0 text-light text-center fw-bold">
        <div class="card bg-primary">
            <div class="card-header">Total Users</div>
            <div class="card-body">
                <h2 class="display-2"><?= $count->totalCount('users') ?></h2>
            </div>
        </div>
    </div>
    <div class="col-lg-3 mb-2 mb-lg-0 text-light text-center fw-bold">
        <div class="card bg-success">
            <div class="card-header">Verified Users</div>
            <div class="card-body">
                <h2 class="display-2"><?= $count->verified_users(1) ?></h2>
            </div>
        </div>
    </div>
    <div class="col-lg-3 mb-2 mb-lg-0 text-light text-center fw-bold">
        <div class="card bg-warning">
            <div class="card-header">Unverified Users</div>
            <div class="card-body">
                <h2 class="display-2">14</h2>
            </div>
        </div>
    </div>
    <div class="col-lg-3 text-light text-center fw-bold">
        <div class="card bg-danger">
            <div class="card-header">Website Hits</div>
            <div class="card-body">
                <h2 class="display-2">120</h2>
            </div>
        </div>
    </div>
</div>
<!-- 1st views dashboard card end -->

<!-- 2nd views dashboard card start -->
<div class="row mt-3">
    <div class="col-lg-4 mb-2 mb-lg-0 text-light text-center fw-bold">
        <div class="card bg-secondary">
            <div class="card-header">Total Notes</div>
            <div class="card-body">
                <h2 class="display-2">20</h2>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mb-2 mb-lg-0 text-light text-center fw-bold">
        <div class="card bg-info">
            <div class="card-header">Total Feedback</div>
            <div class="card-body">
                <h2 class="display-2">35</h2>
            </div>
        </div>
    </div>
    <div class="col-lg-4 text-light text-center fw-bold">
        <div class="card bg-dark">
            <div class="card-header">Total Notifications</div>
            <div class="card-body">
                <h2 class="display-2">2002</h2>
            </div>
        </div>
    </div>
</div>
<!-- 2nd views dashboard card start -->

<!-- 3rd chart row card start -->
<div class="row">
    <div class="col-lg-6">
        <div class="card border-success my-3">
            <div class="card-header bg-success text-center text-white lead">Male/Female User's Percentage</div>
            <div id="chatOne" style="width: 99%; height: 400px;"></div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card border-info my-3">
            <div class="card-header bg-info text-center text-white lead">Verified/Unverified User's Percentage</div>
            <div id="chatOne" style="width: 99%; height: 400px;"></div>
        </div>
    </div>
</div>
<!-- 4th chart row card end -->

<!-- footer part -->
                <!-- 2nd col -->
            </div>
            <!-- row div end -->
        </div>
        <!-- container div end -->
    </div>
    
</body>
</html>