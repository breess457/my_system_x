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
    <script src="../assets/scripts/script-bash.js"></script>
    <title>Complaint</title>
    <style>
        legend.scheduler-border {
            width: auto !important;
            border: none;
            font-size: 18px;
            color:blue
        }
         .item {
            display: block;
            height: 30px;
            width: 30px;
            -webkit-border-radius: 100%;
            -moz-border-radius: 100%;
            border-radius: 100%;
            background: #e5e5e5;
            margin-right: 15px;
            margin-left:25px;
            border: none;
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
                navbarSize("ข้อมูลการแจ้งข้อมูลเด็กกำพร้า",$fullname,$profile);
            ?>
            <div class="container-fluid row">
                <div class="col-md-10">
                    <?php
                        $selectComplaint = mysqli_query($conn,"SELECT * FROM appeal ORDER BY id DESC");
                            foreach($selectComplaint as $key => $resx){
                                getComplaint(($key+1),$resx['id'],$resx['full_name'],$resx['phone'],$resx['date_new'],$resx['email'],$resx['address'],$resx['header_appeal'],$resx['content_appeal'],$resx['post_datenow']);
                            }
                    ?>
                </div>
                <div class="col-md-2 ml-auto">
                    <p class="mt-5"><i class="fas fa-clock"></i> วันที่โพสต์</p>
                    <p><i class="fas fa-user"></i> ชื่อผู้ร้องเรียน</p>
                    <p><i class="fas fa-envelope"></i> email</p>
                    <p><i class="fas fa-mobile-alt"></i> เบอร์โทร</p>
                    <p><i class="fas fa-map-marker-alt"></i> ที่อยู่</p>
                </div>
            </div>
        </main>
    </div>
    <script >
        $(document).on("click","#comfirmTrashComplaint",function(e){
            let id =$(this).data('id')
            Swal.fire({
                title: 'คุณแน่ใจไหม ?',
                text: "คุณจะไม่สามารถย้อนกลับได้!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'ยกเลิก',
                confirmButtonText: 'ยืนยัน'
            }).then((result)=>{
                if(result.isConfirmed){
                    window.location = `backend/crud-complaint.php?get_id=${id}`
                }
            })
        })
    </script>
</body>
</html>
<?php
 }

?>