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
    <script src="../assets/scripts/script-bash.js"></script>
    <title>Nusantara Patani</title>
    
</head>
<body class="">
    <div class="page-wrapper chiller-theme toggled">
        <?php
            navigationsbarTrue($fullname,$status);
        ?>
        <main class="page-content mt-0">
            <?php
                navbarSize("หน้าเเรก",$fullname,$profile)
            ?>
            <div class="container-fluid">

                <div class="row">
                    <div class="card col-md-8 ml-5 mb-0">
                        <canvas id="myrevenueChart" style="height:200px; width:100%"></canvas>
                    </div>
                    <div class="card col-md-8 ml-5 mb-0 mt-3">
                        <canvas id="myexpensesChart" style="height:200px; width:100%"></canvas>
                    </div>
                </div>
                <?php
                  function setmonth($m,$conect){
                    $Ys = DATE('Y');
                    $settotolArr = array();
                    $sql = mysqli_query($conect,"SELECT date_y_m_d,SUM(amount) AS suntotal,years FROM re_venue WHERE years=$Ys AND month(date_y_m_d)=$m");
                   // echo $sql;
                    while($res = mysqli_fetch_array($sql)){
                      echo $res['suntotal'];
                    }
                   
                  }
                  setmonth('06',$conn);
      
                ?>
            </div>
        </main>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
         const labels = [
              'ม.ค.',
              'ก.พ.',
              'มี.ค.',
              'เม.ย.',
              'พ.ค.',
              'มิ.ย.',
              'ก.ค.',
              'ส.ค.',
              'ก.ย.',
              'ต.ค.',
              'พ.ย.',
              'ธ.ค.'
            ];
            /* =========== */
            const datarevenue = {
              labels: labels,
              datasets: [{
                label: 'รายรับ',
                backgroundColor: 'rgb(0, 204, 0)',
                borderColor: 'rgb(0, 204, 0)',
                data :[<?= setmonth('01',$conn)?>,<?=setmonth('02',$conn) ?>,<?=setmonth('03',$conn)?>,<?=setmonth('04',$conn)?>,<?=setmonth('05',$conn)?>,<?=setmonth('06',$conn)?>,
                <?=setmonth('07',$conn)?>,<?=setmonth('08',$conn)?>,<?=setmonth('09',$conn)?>,<?=setmonth('10',$conn)?>,<?=setmonth('11',$conn)?>,<?=setmonth('12',$conn)?>]
              }]
            };
            const configOne = {
              type: 'bar',
              data: datarevenue,
              options: {}
            };
            const myrevenueChart = new Chart(
              document.getElementById('myrevenueChart'),
              configOne
            );
            /* ============= */
            const dataexpenses = {
                labels: labels,
              datasets: [{
                label: 'รายจ่าย',
                backgroundColor: 'rgb(255, 102, 0)',
                borderColor: 'rgb(255, 102, 0)',
                data: [11,22,33,44,55,66,77,88,99,100,120],
              }]
            }
            const configTrue = {
              type: 'bar',
              data: dataexpenses,
              options: {}
            };
            const myexpensesChart = new Chart(
              document.getElementById('myexpensesChart'),
              configTrue
            );
            /* ============== */
    </script>
</body>
</html>
<?php
 }

?>