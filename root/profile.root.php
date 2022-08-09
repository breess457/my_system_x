<?php
session_start();
include_once("../function/component.a-j.php");
include_once("../function/component.root.php");
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
  date_default_timezone_set("Asia/Bangkok");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/scss/style.root.scss">
    <link rel="stylesheet" href="../assets/scss/revenue.scss">
    <link rel="stylesheet" href="../assets/scss/setProfile.scss">
    <title>Volunter Root</title>
    <style>
        body{
            font-family: 'Courier New', Courier, monospace;
        }
      
        .bd-example-modal-xl .modal-dialog{
                max-width: 1100px;
                .modal-content{
                    padding:1rem;
                }
            }
    </style>
</head>
<body>
    <?php navbarRoot($fullname, $profile); ?>
    <br class="mt-4">
      <br>
    <div class="container-fluid mt-4">
                <?php
                    //echo $_SESSION['users']['status_users'];
                    $getQl = mysqli_query($conn,"SELECT * FROM personal_user WHERE get_userid=$userid");
                    $fetch = mysqli_fetch_assoc($getQl);
                    cardProfileRoot($fetch['get_userid'],$fetch['title'],$fetch['first_name'],$fetch['last_name'],$fetch['email'],
                        $fetch['idcard'],$fetch['tell'],$fetch['age'],$fetch['sex'], $fetch['photo_me'],$status,$fullname,$username);
                ?>
                <main-edit-profile formlink="backend/edit-profile.php" selected="disabled" right=" "></main-edit-profile>
    </div>
    <script src="../assets/scripts/profile.js"></script>
</body>
</html>
<?php
}
?>