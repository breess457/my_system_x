<?php
    include_once("function/link.u.php");
    include_once("function/component.u.php");
    include_once("function/config.php");
    function setdata_orphan($data,$connect){
        $sql = mysqli_query($connect,"SELECT getid_jion_orphan,province_home FROM formtrue_orphan_school WHERE province_home='$data'");
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
    <title>Document</title>
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
        <?php sectionhead("ข้อมูลเด็กกำพร้า") ?>
            <div class="container-fluid row">
                <div class="col-md-8 row">
                 <div class="col-3"></div>
                  <div class="col-8">
                        <canvas id="myChart"></canvas>
                  </div>
                </div>
                <div class="col-md-4">
                    <div class="card pattani" onclick='location.href="data-province.php?data_province=ปัตตานี"'>
                        <h2 class="ml-auto mr-4 mt-3 mb-0 text-dark">ปัตตานี</h2>
                        <p class="mt-auto ml-4 mb-0 med-font">จำนวนเด็กกำพร้าในปัตตานี</p>
                        <h1 class="ml-4 large-font"><?php setdata_orphan("ปัตตานี",$conn); ?> คน</h1>
                    </div>
                    <div class="card yala" onclick='location.href="province-yala.php?data_province=ยะลา"'>
                        <h2 class="ml-auto mr-4 mt-3 mb-0 text-dark">ยะลา</h2>
                        <p class="mt-auto ml-4 mb-0 med-font">จำนวนเด็กกำพร้าในยะลา</p>
                        <h1 class="ml-4 large-font"><?php setdata_orphan("ยะลา",$conn); ?> คน</h1>
                    </div>
                    <div class="card nrathiwat" onclick="location.href='province-nara.php?data_province=นราธิวาส'">
                        <h2 class="ml-auto mr-4 mt-3 mb-0 text-dark">นราธิวาส</h2>
                        <p class="mt-auto ml-4 mb-0 med-font">จำนวนเด็กกำพร้าในนราธิวาส</p>
                        <h1 class="ml-4 large-font"><?php setdata_orphan("นราธิวาส",$conn); ?> คน</h1>
                    </div>
                </div>
            </div>
        <main-modallogin></main-modallogin>
    </main>
  <script src="assets/scripts/index.u.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
  <script type="text/javascript">

    const canvasP = document.getElementById('myChart')
    const ctx = canvasP.getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: [ "ปัตตานี", "ยะลา", "นราธิวาส"],
            datasets: [{
                data: [<?php setdata_orphan("ปัตตานี",$conn); ?>, <?php setdata_orphan("ยะลา",$conn); ?>, <?php setdata_orphan("นราธิวาส",$conn); ?>],
                backgroundColor: [
                    '#96ee58',
                    'rgba(54, 162, 235, 0.2)',
                    '#f5ed0c',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 2,
                hoverOffset: 4
            }]
        },
         options: {
            legend:{
                display:true,
                position:"top"
            }
        } 
    }); 

    function clickHandler(click){
        const points = myChart.getElementsAtEventForMode(click, 'nearest', { intersect:true }, true)
          if(points.length){
            const firstPoint = points[0]

            console.log(points)
            console.log(firstPoint)
            const value = myChart.data.labels[firstPoint.index]
            console.log(value)
            switch (value) {
                case 'ปัตตานี':
                    window.location = `data-province.php?data_province=${value}`
                    break;
                case 'ยะลา':
                    window.location = `province-yala.php?data_province=${value}`
                    break;
                case 'นราธิวาส':
                    window.location = `province-nara.php?data_province=${value}`
                    break;
                default:
                    alert(value)
                    break;
            }
            
          }
    }   
    canvasP.onclick = clickHandler;

  </script>
</body>
</html>