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
    const arr = [<?= setdata_province("เมืองนราธิวาส",$conn) ?>,
        <?= setdata_province("ยี่งอ",$conn) ?>,
        <?= setdata_province("ระแงะ",$conn) ?>,
        <?= setdata_province("บาเจาะ",$conn) ?>,
        <?= setdata_province("เจาะไอร้อง",$conn) ?>,
        <?= setdata_province("ตากใบ",$conn) ?>,
        <?= setdata_province("จะแนะ",$conn) ?>,
        <?= setdata_province("รือเสาะ",$conn) ?>,
        <?= setdata_province("สุไหงปาดี",$conn) ?>,
        <?= setdata_province("สุไหงโก-ลก",$conn) ?>,
        <?= setdata_province("ศรีสาคร",$conn) ?>,
        <?= setdata_province("แว้ง",$conn) ?>,
        <?= setdata_province("สุคิริน",$conn) ?>
    ];
    const set =[10,23,22,44,55,22]

const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [ "เมืองนราธิวาส", "ยี่งอ", "ระแงะ", "บาเจาะ", "เจาะไอร้อง", "ตากใบ", "จะแนะ", "รือเสาะ", "สุไหงปาดี", "สุไหงโก-ลก", "ศรีสาคร", "แว้ง","สุคิริน"],
        datasets: [{
            label:"จำนวนเด็กกำพร้าแต่ละอำเภอในนราธิวาส",
            data: arr,
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