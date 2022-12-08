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
                navbarSize("ข้อมูลรายจ่าย",$fullname,$profile)
            ?>
            <div class="container-fluid row">
                <div class="ml-auto">
                    <?php if($status ==="volunteer"){ ?>
                    <button class="bd-none au-btn au-btn-icon au-btn--green au-btn--small" 
                    data-toggle="modal" data-target="#modalFormexpenses"
                    >
                        <i class="fas fa-plus"></i>
                          เพิ่มข้อมูล
                    </button>
                    <?php } ?>
                </div> 
                <div class="col-md-12 mt-4">
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2 datatableEx">
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
                                $getData = mysqli_query($conn,"SELECT * FROM expenses")or die(mysqli_error());
                                    foreach($getData as $num => $result){
                                        ListDataExpenses(($num + 1),$result['expenses_name'],$result['details'],
                                                $result['amount'],$result['date_y_m_d'],$result['evidence_slip'], $result['expenses_id'],$status);
                                    };
                            ?>
                            </tbody> 
                        </table>
                    </div>
                </div> 
            </div>
        </main> 
        <main-show-expenses></main-show-expenses>
        <main-form-expenses></main-form-expenses>
        <main-update-expenses></main-update-expenses>
    </div>
    <script>
         $('.datatableEx').DataTable({
            scrollY:400,
            scrollX:true,
            scrollCollapse:true
        })
    </script>
    <script src="../assets/scripts/expenses.js"></script>
</body>
</html>
<?php
 }

?>