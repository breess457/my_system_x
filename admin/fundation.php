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
    <title>Document admin</title>
    <style>
        .bd-example-modal-xl .modal-dialog{
                max-width: 1100px;
                .modal-content{
                    padding:1rem;
                }
            }
    </style>
</head>
<body class="">
    <div class="page-wrapper chiller-theme toggled">
        <?php
            navigationsbarTrue($fullname,$status);
        ?>
        <main class="page-content mt-0">
            <?php
                navbarSize("อาสาสมัค(ทั่วไป)",$fullname,$profile)
            ?>
            <div class="container-fluid row">
                <div class="ml-auto">
                    <!-- <button class="bd-none au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" 
                        data-target="#modalFundationform"
                    >
                        <i class="fas fa-plus"></i>
                          เพิ่มข้อมูลกรรมการมุลนิธิ
                    </button> -->
                </div> 
                <div class="col-md-12">
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead> 
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>รูปภาพ</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>เพศ</th>
                                    <th>อายุ</th>
                                    <th>email</th>
                                    <th>เบอร์โทรศัพท์</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $showFundationData = mysqli_query($conn,"SELECT * FROM fundation");
                                      foreach($showFundationData as $num=>$res){
                                          $setFullname = join(array($res['title_fundation'],"",$res['firstname_fundation']," ",$res['lastname_fundation']));
                                          $setAddress = join(array($res['homeadress']," ",$res['district']," ",$res['amphoe']," ",$res['province']," ",$res['zipcode']));
                                          listFundation(
                                              ($num+1),$setFullname,$res['sex_fundation'],$res['age_fundation'],$res['email'],$res['tell_fundation'],
                                                $res['cardnumber'],$res['occupation'],$res['workplace'],$res['image_fundation'],$res['id_fundation'],$setAddress
                                          );
                                      }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
<?php
 }

?>