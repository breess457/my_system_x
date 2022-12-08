<?php 
    session_start();
    include_once("../function/config.php");
    include_once("../function/component-officer.php");
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
    <style>
        .bd-example-modal-xl .modal-dialog{
            max-width: 900px;
            .modal-content{
                padding:1rem;
            }
        }
        .my-custom-scrollbar {
            position: relative;
            overflow: auto;
        }
        .table-wrapper-scroll-y {
            display: block;
            height: 480px;
        }
    </style>
</head>
<body>
<div class="page-wrapper chiller-theme toggled">
        <?php   navigationOfiicer($status); ?>
        <main class="page-content mt-0">
            <?php navbarOfficer("ข้อมูลโครงการ") ?>
            <div class="container-fluid">
                <div class="col-md-12">
                    <p>ข้อมูลโครงการ</p>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2 mydataTablesetProject">
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
                                    $getDataproject = mysqli_query($conn,"SELECT * FROM project LEFT JOIN fundation ON project.select_fundation_id = fundation.id_fundation ");
                                    foreach($getDataproject as $i => $res){
                                        officerslistSetproject(($i++),$res['project_name'],$res['title_fundation'],$res['firstname_fundation'],$res['lastname_fundation'],$res['operating_area'],$res['project_year'],
                                            $res['start_date'],$res['end_date'], $res['id'],$res['img_project'], $res['detail_project'], $res['filename_project'],
                                            $status
                                        );
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
        <main-detail-project></main-detail-project>
    </div>
    <script src="../assets/scripts/setProject.js"></script>
    <script>
        $('.mydataTablesetProject').DataTable({
            scrollY:400,
            scrollX:true,
            scrollCollapse:true
        })
    </script>
</body>
</html>
<?php
    }
?>