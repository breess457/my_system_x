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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.20/css/uikit.css">
    <link rel="stylesheet" href="../assets/scripts/module/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css">
    <link rel="stylesheet" href="../assets/scss/navigationTrue-a-j.scss">
    <link rel="stylesheet" href="../assets/scss/revenue.scss">
    <link rel="stylesheet" href="../assets/scripts/module/test/test.scss">
    <script src="../assets/scripts/module/test/test.js"></script>
    <script src="../assets/scripts/script-bash.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="page-wrapper chiller-theme toggled">
        <?php   navigationOfiicer($status); ?>
        <main class="page-content mt-0">
            <?php navbarOfficer("Dashbord") ?>
            <div class="container-fluid">
                <div class="row">
                    <?php
                            $project = mysqli_query($conn,"SELECT id FROM project")or die(mysqli_error());
                            $setnumproject = mysqli_num_rows($project);
                            setData("จำนวนโครงการ",$setnumproject,'fas fa-calendar');
                            $orphan = mysqli_query($conn,"SELECT id_orphan FROM formone_orphan_record")or die(mysqli_error());
                            $setnumorphan = mysqli_num_rows($orphan);
                            setData("จำนวนเด็กกำพร้า",$setnumorphan,'fas fa-users');
                            $patron = mysqli_query($conn, "SELECT id FROM patron");
                            $setnumpatron = mysqli_num_rows($patron);
                            setData("ผู้อุปถัมภ์",$setnumpatron,'fas fa-user');
                            $news = mysqli_query($conn,"SELECT * FROM fundation");
                            $setnumnews = mysqli_num_rows($news);
                            setData("อาสาสมัค",$setnumnews,'fas fa-newspaper');
                    ?>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
<?php } ?>