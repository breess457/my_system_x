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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/scss/navigationTrue-a-j.scss">
    <link rel="stylesheet" href="../assets/scss/revenue.scss">
    <script src="../assets/scripts/script-bash.js"></script>
	<title>Nusantara-Patani</title>
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
                navbarSize("ผู้เข้าร่วมโครงการ",$fullname,$profile)
            ?>
            <div class="container-fluid row">
                <div class="ml-auto">
                    &nbsp;
                </div> 
                <div class="col-md-12">
                    <p>ข้อมูลโครงการ</p>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>รูป</th>
                                    <th>ชื่อโคงการ</th>
                                    <th>ผู้รับผิดชอบโครงการ</th>
                                    <th>พื้นที่ดำเนินงาน</th>
                                    <th>ไฟล์</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $getDataproject = mysqli_query($conn,"SELECT * FROM project");
                                    foreach($getDataproject as $i => $res){

                                        $responsiblePerson = join(array($res['title']," ",$res['f_name'],"   ",$res['l_name']));

                                        tablelistSetproject(($i++),$res['project_name'],$res['title'],$res['f_name'],$res['l_name'],$res['operating_area'],$res['project_year'],
                                            $res['start_date'],$res['end_date'], $res['id'],$res['project_id'],$res['img_project'], $res['detail_project'], $res['filename_project']);
                                    }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <show-user-plus></show-user-plus>
        <show-user-none></show-user-none>
    </div>
    <script src="../assets/scripts/setProject.js"></script>

 
</body>
</html>
<?php
 }

?>