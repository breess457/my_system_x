<?php
session_start();
include_once("../function/component.a-j.php");
include_once("../function/component.root.php");
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
    <link rel="stylesheet" href="../assets/scss/style.root.scss">
    <title>Index Root</title>
</head>
<body>
    <?php navbarRoot($fullname, $profile); ?>
  <div class="container-fluid mt-4">
      <br class="mt-4">
      <br><br>
    <?php
        echo"<div class=\"row\">";
            $project = mysqli_query($conn,"SELECT id FROM project")or die(mysqli_error());
            $setnumproject = mysqli_num_rows($project);
            setData("จำนวนโครงการ",$setnumproject,'fas fa-calendar');
            $orphan = mysqli_query($conn,"SELECT id_orphan FROM formone_orphan_record")or die(mysqli_error());
            $setnumorphan = mysqli_num_rows($orphan);
            setData("จำนวนเด็กกำพร้า",$setnumorphan,'fas fa-users');
            $patron = mysqli_query($conn, "SELECT id FROM patron");
            $setnumpatron = mysqli_num_rows($patron);
            setData("ผู้อุปถัมภ์",$setnumpatron,'fas fa-user');
            $news = mysqli_query($conn,"SELECT * FROM topnews");
            $setnumnews = mysqli_num_rows($news);
            setData("ข่าวสาร",$setnumnews,'fas fa-newspaper');
            $board = mysqli_query($conn,"SELECT bord_id FROM board_users");
            $setnumboard = mysqli_num_rows($board);
            setData("คณะกรรมการ",$setnumboard,'fas fa-newspaper');
            $fundation = mysqli_query($conn,"SELECT id_fundation FROM fundation");
            $setnumfundation = mysqli_num_rows($board);
            setData("อาสาสมัค(ทั่วไป)",$setnumfundation,'fas fa-newspaper');
        echo"</div>";
    ?>
    <div class="row">
        <div class="card col-md-8 ml-5 mb-0">
            <canvas id="myrevenueChart" style="height:280px; width:100%"></canvas>
        </div>
        <div class="card col-md-3 ml-3 mb-0">
          <div class="col-11">
            <canvas id="myrevenueChartY"></canvas>
          </div>
        </div>
        <div class="card col-md-8 ml-5 mb-0 mt-3">
            <canvas id="myexpensesChart" style="height:280px; width:100%"></canvas>
        </div>
        <div class="card col-md-3 ml-3 mb-0 mt-3">
          <div class="col-11">
            <canvas id="myexpensesChartY"></canvas>
          </div>
        </div>
    </div>
    <br>
    <br>
  </div>
  <?php
        $Ys = DATE('Y');
        $selectrevenueChart = "SELECT amount, SUM(amount) AS totol, years,DATE_FORMAT(date_y_m_d,'%M-%Y') AS date_y_m_d
            FROM re_venue WHERE years='$Ys' GROUP BY DATE_FORMAT(date_y_m_d, '%m%') ORDER BY DATE_FORMAT(date_y_m_d,'%Y-%m-%d')";
        $queryrevenueChart = mysqli_query($conn, $selectrevenueChart);
        $setrevenueArr = array();
        $settotolArr = array();
        //$ty = array();
          while($resOne = mysqli_fetch_array($queryrevenueChart)){
              $setrevenueArr[] = "\"".$resOne['date_y_m_d']."\"";
              //$ty[] = "\"".$resOne['date_y']."\"";
              $settotolArr[] = "\"".$resOne['totol']."\"";
          }
          $setrevenueArr = implode(",", $setrevenueArr);
          $settotolArr = implode(",", $settotolArr);
          
          $selectexpensesChart = "SELECT amount, SUM(amount) AS totolx,years,DATE_FORMAT(date_y_m_d,'%M-%Y') AS date_y
            FROM expenses WHERE years='$Ys' GROUP BY DATE_FORMAT(date_y_m_d,'%m%') ORDER BY DATE_FORMAT(date_y_m_d,'%Y-%m-%d')";
           $queryexpensesChart = mysqli_query($conn, $selectexpensesChart);
           $setexpensesArr = array();
           $setexpensesTotol = array();
          //echo $ty;
            while($resTrue = mysqli_fetch_array($queryexpensesChart)){
                $setexpensesArr[] = "\"".$resTrue['date_y']."\"";
                $setexpensesTotol[] = "\"".$resTrue['totolx']."\"";
            }
            $setexpensesArr = implode(",", $setexpensesArr);
            $setexpensesTotol = implode(",", $setexpensesTotol);
        
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
                 $setexpensesYear[] = "\" ".$resTrueYear['date_y_m_d']."\"";
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
                label: 'รายรับ',
                backgroundColor: 'rgb(0, 204, 0)',
                borderColor: 'rgb(0, 204, 0)',
                data: [<?php echo $settotolArr ?>],
              }]
            };
            const dataexpenses = {
                labels: labels,
              datasets: [{
                label: 'รายจ่าย',
                backgroundColor: 'rgb(255, 102, 0)',
                borderColor: 'rgb(255, 102, 0)',
                data: [<?php echo $setexpensesTotol ?>],
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
                label: 'รายรับ รายปี',
                data: [<?php echo $setrevenuetotolY ?>],
                backgroundColor: [
                  'rgb(255, 99, 132)',
                  'rgb(54, 162, 235)',
                  'rgb(255, 205, 86)'
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
                label: 'รายจ่าย รายปี',
                data: [<?php echo $setexpensestotolY ?>],
                backgroundColor: [
                  'rgb(255, 99, 132)',
                  'rgb(54, 162, 235)',
                  'rgb(255, 205, 86)'
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