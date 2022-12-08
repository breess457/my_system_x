<?php

session_start();
include_once("../function/component.a-j.php");
include_once("../function/config.php");
include_once("../function/link.php");
 if(!isset($_SESSION['users'])){
      echo "
            <script>
                alert('pless your login');
                window.location = '../index.php';
            </script>
        ";
 }else{
    $fullname = $_SESSION['users']['fullname'];
    $profile = $_SESSION['users']['photo'];
    $userid = $_SESSION['users']['id'];
    $status = $_SESSION['users']['status_users'];
    date_default_timezone_set("Asia/Bangkok");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <link rel="stylesheet" href="../assets/scss/navigationTrue-a-j.scss">
    <link rel="stylesheet" href="../assets/scss/revenue.scss">
    <script src="../assets/scripts/script-bash.js"></script>
    <title>Summarize Munny</title>
    <style>
        .tbody-style{
            display: block;
            overflow: auto;
            height: 300px;
            position: relative;
        }
        .thed-style, .tbody-style .trlist-style  {
            display:table;
            width:100%;
            table-layout:fixed;
        }
        tfooter .trset{
            display:table;
            width:100%;
            table-layout:fixed;
        }
        .thed-style {
            width: calc( 100% - 1em )
        }
    </style>
</head>
<body>
    <div class="page-wrapper chiller-theme toggled">
    <?php
            navigationsbarTrue($fullname,$status);
        ?>
        <main class="page-content mt-0">
        <?php
                navbarSize("สรุปการเงิน",$fullname,$profile)
            ?>
            <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col-md-12 card mb-3">
                        <canvas id="bar-chartcanvas" style="height:360px;"></canvas>
                    </div>
                    <div class="col-md-5 mr-auto table-responsive table-responsive-data2 card">
                        <table class="table table-data2">
                            <thead class="thed-style">
                                <tr>
                                    <th scope="col" style='width:90px'>ลำดับ</th>
                                    <th scope="col" style="width:110px">ปี</th>
                                    <th>รวมรายรับ</th>
                                </tr>
                            </thead>
                            <tbody class="tbody-style">
                                <?php
                                    $selectQl = mysqli_query($conn,"SELECT DATE_FORMAT(date_y_m_d, '%Y') AS setyear,years,SUM(amount) AS suntotalrevenue FROM re_venue  GROUP BY DATE_FORMAT(date_y_m_d, '%Y') ORDER BY DATE_FORMAT(date_y_m_d, '%Y')");
                                    $lisyear = array();
                                    $setRevenue = array();
                                    $sumrevenue = 0;
                                    foreach($selectQl as $x=>$res){
                                    
                                        listdataSummarize($x+1,$res['setyear'],number_format($res['suntotalrevenue']));
                                        $sumrevenue += $res['suntotalrevenue'];
                                        $lisyear[] = "\"".$res['setyear']."\"";
                                        $setRevenue[] = "\"".$res['suntotalrevenue']."\"";
                                        
                                      }
                                      
                                        
                                        $lisyear = implode(",",$lisyear);
                                        $setRevenue = implode(",",$setRevenue);
                                ?>
                            </tbody>
                        </table>
                        <div class="col-12 row">
                            <p class="mr-4">ยอดรวมทั้งหมด</p>
                            <p class="mr-4">รายรับ <?php echo number_format($sumrevenue) ?>บ.</p>
                        </div>
                    </div>
                    <div class="col-md-5 ml-auto table-responsive table-responsive-data2 card">
                        <table class="table table-data2">
                            <thead class="thed-style">
                                <tr>
                                    <th scope="col" style='width:90px'>ลำดับ</th>
                                    <th scope="col" style="width:110px">ปี</th>
                                    <th>รวมรายจ่าย</th>
                                </tr>
                            </thead>
                            <tbody class="tbody-style">
                                <?php
                                    $selectQl = mysqli_query($conn,"SELECT DATE_FORMAT(date_y_m_d, '%Y') AS setyear,years,SUM(amount) AS suntotalexpenses FROM expenses  GROUP BY DATE_FORMAT(date_y_m_d, '%Y') ORDER BY DATE_FORMAT(date_y_m_d, '%Y')");
                                    $lisyear = array();
                                    $setExpenses = array();
                                    $sumexpenses = 0;
                                    foreach($selectQl as $x=>$res){
                                    
                                        listdataSummarize($x+1,$res['setyear'],number_format($res['suntotalexpenses']));
                                        $sumexpenses += $res['suntotalexpenses'];
                                        $lisyear[] = "\"".$res['setyear']."\"";
                                        $setExpenses[] = "\"".$res['suntotalexpenses']."\"";
                                        
                                      }
                                      
                                        
                                        $lisyear = implode(",",$lisyear);
                                        $setExpenses = implode(",",$setExpenses);
                                ?>
                            </tbody>
                        </table>
                        <div class="col-12 row">
                            <p class="mr-4">ยอดรวมทั้งหมด</p>
                            <p class="mr-4">รายจ่าย <?php echo number_format($sumexpenses) ?>บ.</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

$(function(){

//get the bar chart canvas
var ctx = $("#bar-chartcanvas");

//bar chart data
var data = {
  labels: [<?php echo $lisyear; ?>],
  datasets: [
    {
      label: "รายรับ",
      data: [<?php echo $setRevenue; ?>],
      backgroundColor: [
        "rgb(255, 99, 132)"
      ],
      borderColor: [
        "rgba(10,20,30,1)"
      ],
      borderWidth: 1
    },
    {
      label: "รายจ่าย",
      data: [<?php echo $setExpenses; ?>],
      backgroundColor: [
        "rgba(50,150,200,0.3)"
      ],
      borderColor: [
        "rgba(50,150,200,1)"
      ],
      borderWidth: 1
    }
  ]
};

//options
var options = {
  responsive: true,
  title: {
    display: true,
    position: "top",
    text: "Bar Graph",
    fontSize: 18,
    fontColor: "#111"
  },
  legend: {
    display: true,
    position: "bottom",
    labels: {
      fontColor: "#333",
      fontSize: 16
    }
  },
  scales: {
    yAxes: [{
      ticks: {
        min: 0
      }
    }]
  }
};

//create Chart class object
var chart = new Chart(ctx, {
  type: "bar",
  data: data,
  options: options
});
});
</script>
</body>
</html>
<?php
 }
?>