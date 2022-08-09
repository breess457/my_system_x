
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
    <link rel="stylesheet" href="../assets/scss/news.scss">
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
                navbarSize("gps",$fullname,$profile)
            ?>
            <div class="container-fluid row">
                
            </div>
        </main>
        <main-create-topnew></main-create-topnew>
    </div>
</body>
</html>
<?php
 }

?>