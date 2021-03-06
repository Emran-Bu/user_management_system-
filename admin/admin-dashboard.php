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
                <h2 class="display-2"><?= $count->verified_users(0) ?></h2>
            </div>
        </div>
    </div>
    <div class="col-lg-3 text-light text-center fw-bold">
        <div class="card bg-danger">
            <div class="card-header">Website Hits</div>
            <div class="card-body">
                <h2 class="display-2"><?php $data = $count->site_hits(); echo $data['hits']; ?></h2>
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
                <h2 class="display-2"><?= $count->totalCount('notes') ?></h2>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mb-2 mb-lg-0 text-light text-center fw-bold">
        <div class="card bg-info">
            <div class="card-header">Total Feedback</div>
            <div class="card-body">
                <h2 class="display-2"><?= $count->totalCount('feedback') ?></h2>
            </div>
        </div>
    </div>
    <div class="col-lg-4 text-light text-center fw-bold">
        <div class="card bg-dark">
            <div class="card-header">Total Notifications</div>
            <div class="card-body">
                <h2 class="display-2"><?= $count->totalCount('notification') ?></h2>
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
            <div id="chartGender" style="width: 99%; height: 400px;"></div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card border-info my-3">
            <div class="card-header bg-info text-center text-white lead">Verified/Unverified User's Percentage</div>
            <div id="chartVerified" style="width: 99%; height: 400px;"></div>
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

    
    <!--Load the google chart-->
    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
    <script src="assets/google_chart/google_chart.loader.js"></script>
    <!-- custom script -->
    <script type="text/javascript">
    // gender chart
      google.charts.load('current', {'packages':['corechart']});

      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = new google.visualization.arrayToDataTable([
            ['Gender', 'Number'],
            <?php
            
                $gender = $count->genderPer();
                foreach ($gender as $row) {
                    echo '["'.$row['gender'].'", '.$row['number'].'],';
                }

            ?>
        ]);
        
        var options = {
            is3D: false,
            title: 'Gender Percentage'
        };

        var chart = new google.visualization.PieChart(document.getElementById('chartGender'));
        chart.draw(data, options);
      }

    // verified chart
      google.charts.load('current', {'packages':['corechart']});

      google.charts.setOnLoadCallback(colChart);

      function colChart() {

        var data = new google.visualization.arrayToDataTable([
            ['Verified', 'Number'],
            <?php
            
                $verified = $count->verifiedPer();
                foreach ($verified as $row) {
                    if ($row['verified'] == 0) {
                        $row['verified'] = 'Unverified';
                    } else {
                        $row['verified'] = 'Verified';
                    }
                    
                    echo '["'.$row['verified'].'", '.$row['number'].'],';
                }

            ?>
        ]);
        
        var options = {
            is3D: false,
            title: 'Verified Percentage'
        };

        var chart = new google.visualization.PieChart(document.getElementById('chartVerified'));
        chart.draw(data, options);
      }

      $(document).ready(function(){
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