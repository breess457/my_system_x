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
                    <?php
                            $project = mysqli_query($conn,"SELECT id FROM project")or die(mysqli_error());
                            $setnumproject = mysqli_num_rows($project);
                            setData("โครงการ",$setnumproject,'fas fa-calendar');
                            $orphan = mysqli_query($conn,"SELECT id_orphan FROM formone_orphan_record")or die(mysqli_error());
                            $setnumorphan = mysqli_num_rows($orphan);
                            setData("เด็กกำพร้า",$setnumorphan,'fas fa-users');
                            $patron = mysqli_query($conn, "SELECT id FROM patron");
                            $setnumpatron = mysqli_num_rows($patron);
                            setData("ผู้อุปถัมภ์",$setnumpatron,'fas fa-user');
                            $news = mysqli_query($conn,"SELECT * FROM topnews");
                            $setnumnews = mysqli_num_rows($news);
                            setData("ข่าวสาร",$setnumnews,'fas fa-newspaper');
                            $board = mysqli_query($conn,"SELECT bord_id FROM board_users");
                            $setnumboard = mysqli_num_rows($board);
                            setData("คณะกรรมการ",$setnumboard,'fas fa-users');
                            $fundation = mysqli_query($conn,"SELECT id_fundation FROM fundation");
                            $setnumfundation = mysqli_num_rows($board);
                            setData("อาสาสมัค",$setnumfundation,'fas fa-users');
                    ?>
                </div>
                <div class="row">
                    <div class="card col-md-8 ml-5 mb-0">
                        <canvas id="myrevenueChart" style="height:200px; width:100%"></canvas>
                    </div>
                    <div class="card col-md-3 ml-2 mb-0">
                        <canvas id="myrevenueChartY"></canvas>
                    </div>
                    <div class="card col-md-8 ml-5 mb-0 mt-3">
                        <canvas id="myexpensesChart" style="height:200px; width:100%"></canvas>
                    </div>
                    <div class="card col-md-3 ml-2 mb-0 mt-3">
                        <canvas id="myexpensesChartY"></canvas>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <?php
        function setmonthrevenue($m,$conect){
          $Ys = DATE('Y');
          $settotolArr = array();
          $sql = mysqli_query($conect,"SELECT date_y_m_d,SUM(amount) AS suntotal,years FROM re_venue WHERE year(date_y_m_d)=$Ys AND month(date_y_m_d)=$m");
         // echo $sql;
          while($res = mysqli_fetch_array($sql)){
            echo $res['suntotal'];
          }
         
        }
        function setmonthexpenses($m,$conect){
          $Ys = DATE('Y');
          $settotolArr = array();
          $sql = mysqli_query($conect,"SELECT date_y_m_d,SUM(amount) AS suntotal,years FROM expenses WHERE year(date_y_m_d)=$Ys AND month(date_y_m_d)=$m");
         // echo $sql;
          while($res = mysqli_fetch_array($sql)){
            echo $res['suntotal'];
          }
         
        }
        
        $Ys = DATE('Y');  
        $selectrevenueYear = "SELECT amount, SUM(amount) AS totolRY,DATE_FORMAT(date_y_m_d, '%Y') AS date_y_m_d
            FROM re_venue GROUP BY DATE_FORMAT(date_y_m_d,'%Y%') ORDER BY DATE_FORMAT(date_y_m_d, '%Y')";
          $queryrevenueYear = mysqli_query($conn,$selectrevenueYear);
          $setrevenueYear = array();
          $setrevenuetotolY = array();
            while($resOneYear = mysqli_fetch_array($queryrevenueYear)){
                $setrevenueYear[] = "\"".$resOneYear['date_y_m_d']."\"";
                $setrevenuetotolY[] = "\"".$resOneYear['totolRY']."\"";
            }
            $setrevenueYear = implode(",", $setrevenueYear);
            $setrevenuetotolY = implode(",", $setrevenuetotolY);
        $selectexpensesYear = "SELECT amount, SUM(amount) AS totolEY,DATE_FORMAT(date_y_m_d,'%Y') AS date_y_m_d
            FROM expenses GROUP BY DATE_FORMAT(date_y_m_d,'%Y%') ORDER BY DATE_FORMAT(date_y_m_d,'%Y')";
          $queryexpensesYear = mysqli_query($conn,$selectexpensesYear);
          $setexpensesYear = array();
          $setexpensestotolY = array();
             while($resTrueYear = mysqli_fetch_array($queryexpensesYear)){
                 $setexpensesYear[] = "\"".$resTrueYear['date_y_m_d']."\"";
                 $setexpensestotolY[] = "\"".$resTrueYear['totolEY']."\"";
             }
             $setexpensesYear = implode(",", $setexpensesYear);
             $setexpensestotolY = implode(",", $setexpensestotolY);
    ?>
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
                label: 'รายรับปีนี้',
                backgroundColor: 'rgb(0, 204, 0)',
                borderColor: 'rgb(0, 204, 0)',
                data :[<?= setmonthrevenue('01',$conn)?>,<?=setmonthrevenue('02',$conn) ?>,<?=setmonthrevenue('03',$conn)?>,<?=setmonthrevenue('04',$conn)?>,<?=setmonthrevenue('05',$conn)?>,<?=setmonthrevenue('06',$conn)?>,
                <?=setmonthrevenue('07',$conn)?>,<?=setmonthrevenue('08',$conn)?>,<?=setmonthrevenue('09',$conn)?>,<?=setmonthrevenue('10',$conn)?>,<?=setmonthrevenue('11',$conn)?>,<?=setmonthrevenue('12',$conn)?>]
              }]
            };
            const dataexpenses = {
                labels: labels,
              datasets: [{
                label: 'รายจ่ายปีนี้',
                backgroundColor: 'rgb(255, 102, 0)',
                borderColor: 'rgb(255, 102, 0)',
                data :[<?= setmonthexpenses('01',$conn)?>,<?=setmonthexpenses('02',$conn) ?>,<?=setmonthexpenses('03',$conn)?>,<?=setmonthexpenses('04',$conn)?>,<?=setmonthexpenses('05',$conn)?>,<?=setmonthexpenses('06',$conn)?>,
                <?=setmonthexpenses('07',$conn)?>,<?=setmonthexpenses('08',$conn)?>,<?=setmonthexpenses('09',$conn)?>,<?=setmonthexpenses('10',$conn)?>,<?=setmonthexpenses('11',$conn)?>,<?=setmonthexpenses('12',$conn)?>]
              }]
            }
            const configOne = {
              type: 'bar',
              data: datarevenue,
              options: {}
            };
            const configTrue = {
              type: 'bar',
              data: dataexpenses,
              options: {}
            };
            const myrevenueChart = new Chart(
              document.getElementById('myrevenueChart'),
              configOne
            );
            const myexpensesChart = new Chart(
              document.getElementById('myexpensesChart'),
              configTrue
            );
            /* Y */
            const datarevenueYear = {
              labels: [
                <?php echo $setrevenueYear ?>
              ],
              datasets: [{
                label: 'My First Dataset',
                data: [<?php echo $setrevenuetotolY ?>],
                backgroundColor: [
                  'rgb(255, 99, 132)',
                  'rgb(54, 162, 235)',
                  'rgb(255, 205, 86)',
                  'rgb(153, 51, 255)',
                  'rgb(51, 204, 51)'
                ],
                hoverOffset: 4
              }]
            };
            const configrevenueY = {
                type: 'pie',
                data: datarevenueYear,
            }
            const myrevenueChartY = new Chart(
                document.getElementById('myrevenueChartY'),
                configrevenueY
            )
            const dataexpensesYear = {
              labels: [
                <?php echo $setexpensesYear ?>
              ],
              datasets: [{
                label: 'My First Dataset',
                data: [<?php echo $setexpensestotolY ?>],
                backgroundColor: [
                  'rgb(255, 99, 132)',
                  'rgb(54, 162, 235)',
                  'rgb(255, 205, 86)',
                  'rgb(153, 51, 255)',
                  'rgb(51, 204, 51)'
                ],
                hoverOffset: 4
              }]
            };
            const configexpensesY = {
                type: 'pie',
                data: dataexpensesYear,
            }
            const myexpensesChartY = new Chart(
                document.getElementById('myexpensesChartY'),
                configexpensesY
            )
    </script>
</body>
</html>
<?php
 }

?>