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
    <title>Nusantara-Patani</title>
</head>
<body class="">
    <div class="page-wrapper chiller-theme toggled">
        <?php
            navigationsbarTrue($fullname,$status);
        ?>
        <main class="page-content mt-0">
            <?php
                navbarSize("ข้อมูลรายรับ",$fullname,$profile)
            ?>
            <div class="container-fluid row">
                <div class="ml-auto">
                    <?php if($status === "volunteer"){ ?>
                    <button class="bd-none au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" 
                        data-target="#modalFormrevenue"
                    >
                        <i class="fas fa-plus"></i>
                          เพิ่มข้อมูลรายรับ
                    </button> 
                    <?php } ?>
                </div> 
                <div class="col-md-12">
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อ</th>
                                    <th>รายละเอียด</th>
                                    <th>วันที่</th>
                                    <th>จำนวนเงิน</th>
                                    <th>หลักฐาน สลิป</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $getData = mysqli_query($conn,"SELECT * FROM re_venue")or die(mysqli_error());
                                    foreach($getData as $num => $result){
                                        ListDataRevenue(($num + 1),$result['revenue_name'],$result['details'],
                                                $result['amount'],$result['date_y_m_d'],$result['evidence_slip'], $result['revenue_id']);
                                    };
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </main>
        
        <main-form-revenue></main-form-revenue>
        <main-update-revence></main-update-revence>
        <main-show-revenue></main-show-revenue>

    </div>
<script src="../assets/scripts/revenue.js"></script>

</body>
</html>
<?php
 }

?>