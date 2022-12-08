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
    $username = $_SESSION['users']['username'];
    
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
    <link rel="stylesheet" href="../assets/scss/setProfile.scss">
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
                navbarSize("โปรไฟล์ส่วนตัว",$fullname,$profile)
            ?>
            <div class="container-fluid">
                <?php
                    //echo $_SESSION['users']['status_users'];
                    $getQl = mysqli_query($conn,"SELECT * FROM personal_user LEFT JOIN users ON users.id=personal_user.get_userid WHERE get_userid=$userid");
                    $fetch = mysqli_fetch_assoc($getQl);
                    cardProfile($fetch['get_userid'],$fetch['title'],$fetch['first_name'],$fetch['last_name'],$fetch['email'],
                        $fetch['idcard'],$fetch['tell'],$fetch['age'],$fetch['sex'], $fetch['photo_me'],$status,$fullname,$username,$fetch['passwd']);
                ?>
            </div>
            <main-edit-profile formlink="backend/edit-profile.php" selected=" " right="disabled"></main-edit-profile>
        </main>
    </div>
    <script src="../assets/scripts/profile.js"></script>
    <script>
        function alers(){
            alert("hello")
        }
    </script>
</body>
</html>
<?php
 }

?>