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
    <link rel="stylesheet" href="../assets/scss/navbarsizeTrue.scss">
    <script src="../assets/scripts/script-bash.js"></script>
    <title>Project Participants</title>
    <style>
        .account-item {
            cursor: pointer;
        }
        .account-item .image {
            width: 45px;
            height: 45px;
            float: left;
            overflow: hidden;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }
        .account-item .image > img {
            width: 100%;
        }
    </style>

</head>
<body class="">
    <?php
        navbarSizeTrue('projects.php','ผู้เข้าร่วมโครงการ',$fullname,$profile);
    ?>
    <main class="page-content mt-2">
        <br><br><br>
        <div class="container">
            <?php
                $getid_project = $_GET['idx_project'];
                $selectData = mysqli_query($conn,"SELECT * FROM project WHERE id='$getid_project'")or die(mysqli_error());
                    foreach($selectData as $res){
                        $fullname = join(array($res['title']," ",$res['f_name'],"  &nbsp;&nbsp; ",$res['l_name']));
                        detailproject($res['id'],$res['project_id'],$res['project_name'],$fullname,$res['detail_project'],
                            $res['operating_area'],$res['project_year'],$res['start_date'],$res['end_date']);
                    }
            ?>
            
        </div>
    </main>
    <main-add-participant></main-add-participant>
    <script src="../assets/scripts/project-participant.js"></script>
</body>
</html>
<?php
 }

?>