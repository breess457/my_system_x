
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.20/css/uikit.css">
    <link rel="stylesheet" href="../assets/scripts/module/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css">
    <link rel="stylesheet" href="../assets/scss/navigationTrue-a-j.scss">
    <link rel="stylesheet" href="../assets/scss/revenue.scss">
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
                navbarSize("จัดการข้อมูลเด็กกำพร้า",$fullname,$profile)
            ?>
            <div class="container-fluid row">
                <div class="ml-auto">
  
                </div> 
                <div class="col-md-12">
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>รูปภาพ</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>อายุ</th>
                                    <th>บัตรประชาชน</th>
                                    <th>วันที่เพิ่มข้อมูล</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql_orphan1 = "SELECT * FROM formone_orphan_record";
                                    $get_data_orphans_1 = mysqli_query($conn,$sql_orphan1)or die(mysqli_error());
                                    foreach($get_data_orphans_1 as $num => $result) {
                                        $fullname_me = join(array($result['title_me'],$result['first_name_me']," ",$result['last_name_me']));
                                        showDataOrphan(($num+1),$result['profile_orphan'],$fullname_me,$result['age_me'],$result['card_id'],
                                            $result['day_add_record'],$result['id_orphan']);
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