<?php
    $x = join(array("ข้อมูลเด็กกำพร้า",$_GET['data_province']));
    $getdata = $_GET['data_province'];
    include_once("function/link.u.php");
    include_once("function/component.u.php");
    include_once("function/config.php");
    function setdata_province($getamphoe,$connect){
        $sql = mysqli_query($connect,"SELECT amphoe_home FROM formtrue_orphan_school WHERE amphoe_home='$getamphoe'");
          $numrows = mysqli_num_rows($sql);
          // $show_data = $numrows;
           echo $numrows;
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/scss/ui-style.u.scss">
    <link rel="stylesheet" href="assets/scss/index.u.scss">
    <title><?php echo $_GET['data_province']; ?></title>    
    <style>
      .nav-menu a:hover, .nav-menu .x2 > a, .nav-menu li:hover > a {
        color: #c8e90c;
        text-decoration: none;
      }
      .mml-6{
          margin-left: 7%;
      }
    </style>
</head>
<body>
<?php navigationsbarUsers();  ?>
    <main id="main">
        <?php sectionhead($x) ?>
        <div class="container">
            <canvas id="myChart" width="240" height="100"></canvas>
        </div>
        <main-modallogin></main-modallogin>
    </main>
  <script src="assets/scripts/index.u.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    
<script type="text/javascript">
    const arrYala = [
        <?= setdata_province("เมืองยะลา",$conn) ?>,
        <?= setdata_province("รามัน",$conn) ?>,
        <?= setdata_province("กรงปินัง",$conn) ?>,
        <?= setdata_province("ยะหา",$conn) ?>,
        <?= setdata_province("กาบัง",$conn) ?>,
        <?= setdata_province("บันนังสตา",$conn) ?>,
        <?= setdata_province("ธารโต",$conn) ?>,
        <?= setdata_province("เบตง",$conn) ?>
    ];
    const set =[10,23,22,44,55,22]

const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [ "เมืองยะลา", "รามัน", "กรงปินัง", "ยะหา", "กาบัง", "บันนังสตา", "ธารโต", "เบตง"],
        datasets: [{
            label:"จำนวนเด็กกำพร้าแต่ละอำเภอในยะลา",
            data: arrYala,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgb(102, 102, 255)',
                'rgb(102, 0, 204)',
                'rgb(153, 51, 102)',
                'rgb(51, 204, 51)',
                'rgb(0, 204, 255)',
                'rgb(51, 51, 255)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgb(102, 102, 255)',
                'rgb(102, 0, 204)',
                'rgb(153, 51, 102)',
                'rgb(51, 204, 51)',
                'rgb(0, 204, 255)',
                'rgb(51, 51, 255)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
</body>
</html>