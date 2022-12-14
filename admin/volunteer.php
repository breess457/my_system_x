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
                navbarSize("เจ้าหน้าที่",$fullname,$profile)
            ?>
            <div class="container-fluid row">
              
                <div class="col-md-12">
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>รูปภาพ</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>อายุ</th>
                                    <th>เบอร์โทร</th>
                                    <th>เพศ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $getDataofficer = mysqli_query($conn,"SELECT * FROM personal_user LEFT JOIN users ON personal_user.get_userid = users.id WHERE status_users='volunteer'");
                                        foreach($getDataofficer as $x => $result){
                                            $fullnames = join(array($result['title'],$result['first_name'],"&nbsp;",$result['last_name']));
                                            tiblelistvolunteer(($x+1),$result['personal_id'], $result['photo_me'], $fullnames, $result['idcard'],
                                                $result['age'], $result['tell'], $result['email'], $result['sex']
                                            );
                                        }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <main-create-volunteer></main-create-volunteer>
        </main>
    </div>
    <script src="../assets/scripts/volunteer.js"></script>
</body>
</html>
<?php
 }

?>