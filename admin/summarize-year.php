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
    $getYear = $_GET['getyear'];

    function setRevenueChart($year,$month,$connect){
        $sql = mysqli_query($connect,"SELECT date_y_m_d,SUM(amount) AS suntotal,years FROM re_venue WHERE year(date_y_m_d)=$year AND month(date_y_m_d)=$month");
        while($res = mysqli_fetch_array($sql)){
            echo $res['suntotal'];
        }
    }
    function setExpensesChart($year,$month,$connect){
        $sql = mysqli_query($connect,"SELECT date_y_m_d,SUM(amount) AS sentotal,years FROM expenses WHERE year(date_y_m_d)=$year AND month(date_y_m_d)=$month");
        while($res = mysqli_fetch_array($sql)){
            echo $res['sentotal'];
        }
    }

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
    <link rel="stylesheet" href="../assets/scss/navbarsizeTrue.scss">
    <script src="../assets/scripts/script-bash.js"></script>
    <title>Summarize Munny</title>
    <style>
        .tbody-style{
            display: block;
            overflow: auto;
            height: 300px;
            position: relative;
        }
        .thed-style, .tbody-style .trlist-style {
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
    <?php
            navbarSizeTrue('summarize.php',"สรุปการเงินรายเดือนปี $getYear",$fullname,$profile);
        ?>
        <main class="page-content mt-3">
        <br><br><br>
            <div class="container-fluid">
                <div class="row">
                    <div class="ml-5 col-md-7 card mb-5">
                        <canvas id="myrevenueChart" style="height:300px; width:100%"></canvas>
                    </div>
                    <div class="col-md-4 mb-5 ml-4 card">
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead class="thed-style">
                                    <tr>
                                        <th scope="col" style='width:90px'>ลำดับ</th>
                                        <th scope="col" style='width:120px'>เดือน</th>
                                        <th>จำนวนเงิน</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody-style">
                                    <?php
                                        $sqltable1 = mysqli_query($conn,"SELECT date_y_m_d,month(date_y_m_d) AS setmonth,SUM(amount) AS suntotal FROM re_venue WHERE year(date_y_m_d)=$getYear GROUP BY DATE_FORMAT(date_y_m_d,'%m%') ORDER BY DATE_FORMAT(date_y_m_d,'%m%')");
                                            $lists;
                                            $sum1 = 0;
                                            foreach($sqltable1 as $key=>$result){
                                                switch($result['setmonth']){
                                                    case "1":
                                                        $lists ="ม.ค.";
                                                        break;
                                                    case "2":
                                                        $lists ="ก.พ.";
                                                        break;
                                                    case "3":
                                                        $lists ="มี.ค.";
                                                        break;
                                                    case "4":
                                                        $lists ="เม.ย.";
                                                        break;
                                                    case "5":
                                                        $lists ="พ.ค.";
                                                        break;
                                                    case "6":
                                                        $lists ="มิ.ย.";
                                                        break;
                                                    case "7":
                                                        $lists ="ก.ค.";
                                                        break;
                                                    case "8":
                                                        $lists ="ส.ค.";
                                                        break;
                                                    case "9":
                                                        $lists ="ก.ย.";
                                                        break;
                                                    case "10":
                                                        $lists ="ต.ค.";
                                                        break;
                                                    case "11":
                                                        $lists ="พ.ย.";
                                                        break;
                                                    case "12":
                                                        $lists ="ธ.ค.";
                                                        break;
                                                }
                                                listSummarizeRevenue($key+1,$lists,number_format($result['suntotal']));
                                                $sum1+=$result['suntotal'];
                                            }
                                    ?>
                                </tbody>
                            </table>
                            <div class="row col-12">
                                <p class="mr-4 ml-auto">ยอดรวมทั้งหมด</p>
                                <p class="mr-4"><?php echo number_format($sum1) ?>บ.</p>
                            </div>
                        </div>
                    </div>
                    <div class="ml-5 col-md-7 card">
                        <canvas id="myexpensesChart" style="height:300px; width:100%"></canvas>
                    </div>
                    <div class="col-md-4 ml-4 card">
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead class="thed-style">
                                    <tr>
                                        <th scope="col" style='width:90px'>ลำดับ</th>
                                        <th scope="col" style='width:120px'>เดือน</th>
                                        <th>จำนวนเงิน</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody-style">
                                    <?php
                                        $sqltable2 = mysqli_query($conn,"SELECT date_y_m_d,month(date_y_m_d) AS setmonth,SUM(amount) AS suntotal FROM expenses WHERE year(date_y_m_d)=$getYear GROUP BY DATE_FORMAT(date_y_m_d,'%m%') ORDER BY DATE_FORMAT(date_y_m_d,'%m%')");
                                          $list;
                                          $sum2 = 0;
                                            foreach($sqltable2 as $i=>$response){
                                                switch($response['setmonth']){
                                                    case "1":
                                                        $list ="ม.ค.";
                                                        break;
                                                    case "2":
                                                        $list ="ก.พ.";
                                                        break;
                                                    case "3":
                                                        $list ="มี.ค.";
                                                        break;
                                                    case "4":
                                                        $list ="เม.ย.";
                                                        break;
                                                    case "5":
                                                        $list ="พ.ค.";
                                                        break;
                                                    case "6":
                                                        $list ="มิ.ย.";
                                                        break;
                                                    case "7":
                                                        $list ="ก.ค.";
                                                        break;
                                                    case "8":
                                                        $list ="ส.ค.";
                                                        break;
                                                    case "9":
                                                        $list ="ก.ย.";
                                                        break;
                                                    case "10":
                                                        $list ="ต.ค.";
                                                        break;
                                                    case "11":
                                                        $list ="พ.ย.";
                                                        break;
                                                    case "12":
                                                        $list ="ธ.ค.";
                                                        break;
                                                }
                                                listSummarizeRevenue($i+1,$list,number_format($response['suntotal']));
                                                $sum2+=$response['suntotal'];
                                            }
                                    ?>
                                </tbody>
                            </table>
                            <div class="row col-12">
                                <p class="mr-4 ml-auto">ยอดรวมทั้งหมด</p>
                                <p class="mr-4"><?php echo number_format($sum2) ?>บ.</p>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </main>

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
    const datarevenue = {
      labels: labels,
      datasets: [{
        label: 'รายรับ',
        data: [
            <?= setRevenueChart($getYear,'01',$conn) ?>, <?= setRevenueChart($getYear,'02',$conn) ?>, <?= setRevenueChart($getYear,'03',$conn) ?>, <?= setRevenueChart($getYear,'04',$conn) ?>, <?= setRevenueChart($getYear,'05',$conn) ?>,
            <?= setRevenueChart($getYear,'06',$conn) ?>, <?= setRevenueChart($getYear,'07',$conn) ?>,<?= setRevenueChart($getYear,'08',$conn) ?>,<?= setRevenueChart($getYear,'09',$conn) ?>,<?= setRevenueChart($getYear,'10',$conn) ?>,<?= setRevenueChart($getYear,'11',$conn) ?>,<?= setRevenueChart($getYear,'12',$conn) ?>
        ],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 205, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(201, 203, 207, 0.2)'
        ],
        borderColor: [
          'rgb(255, 99, 132)',
          'rgb(255, 159, 64)',
          'rgb(255, 205, 86)',
          'rgb(75, 192, 192)',
          'rgb(54, 162, 235)',
          'rgb(153, 102, 255)',
          'rgb(201, 203, 207)'
        ],
        borderWidth: 1
      }]
    };
    const configRevenue = {
      type: 'bar',
      data: datarevenue,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      },
    };
    const myrevenueChart = new Chart(
        document.getElementById('myrevenueChart'),
        configRevenue
    )
    const dataexpense = {
      labels: labels,
      datasets: [{
        label: 'รายจ่าย',
        data: [<?=setExpensesChart($getYear,'01',$conn)?>, <?=setExpensesChart($getYear,'02',$conn)?>, <?=setExpensesChart($getYear,'03',$conn)?>, <?=setExpensesChart($getYear,'04',$conn)?>, <?=setExpensesChart($getYear,'05',$conn)?>, 
            <?=setExpensesChart($getYear,'06',$conn)?>, <?=setExpensesChart($getYear,'07',$conn)?>,<?=setExpensesChart($getYear,'08',$conn)?>,<?=setExpensesChart($getYear,'09',$conn)?>,<?=setExpensesChart($getYear,'10',$conn)?>,<?=setExpensesChart($getYear,'11',$conn)?>,<?=setExpensesChart($getYear,'12',$conn)?>],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 205, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(201, 203, 207, 0.2)'
        ],
        borderColor: [
          'rgb(255, 99, 132)',
          'rgb(255, 159, 64)',
          'rgb(255, 205, 86)',
          'rgb(75, 192, 192)',
          'rgb(54, 162, 235)',
          'rgb(153, 102, 255)',
          'rgb(201, 203, 207)'
        ],
        borderWidth: 1
      }]
    };
    const configExpenue = {
      type: 'bar',
      data: dataexpense,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      },
    };
    const myexpensesChart = new Chart(
        document.getElementById('myexpensesChart'),
        configExpenue
    )
</script>
</body>
</html>
<?php
 }
?>