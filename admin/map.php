
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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <link rel="stylesheet" href="../assets/scss/navigationTrue-a-j.scss">
    <script src="../assets/scripts/script-bash.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="../assets/scripts/module/jquery-1.11.2.min.js" ></script>
    <script language="JavaScript" src="../assets/scripts/gps.map.js"></script>
    <title>map location orphans</title>
    <style>     
    </style>
</head>
<body onload="setupMap()">
    <div class="page-wrapper chiller-theme toggled">
        <?php
            navigationsbarTrue($fullname,$status);
        ?>
        <main class="page-content mt-0">
            <?php
                navbarSize("แผนที่",$fullname,$profile)
            ?>
            <div class="container-fluid row">
                <div id="map_canvas" style="width:1150px;height:620px;"></div>
                <!-- <div id="divShow"></div> -->
                
            </div>
        </main>
    </div>
</body>
</html>
<?php
 }

?>

