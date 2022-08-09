
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
    <title>Nusantara Patani</title>
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
                navbarSize("ข่าวประชาสัมพันธ์",$fullname,$profile)
            ?>
            <div class="container-fluid row">
                <div class="ml-auto">
                    <?php if($status != 'chairman'){ ?>
                    <button class="bd-none au-btn au-btn-icon au-btn--blues au-btn--small" data-toggle="modal" 
                        data-target="#modalFormTopnews" data-user="<?php echo $userid ?>" id="btnCreatenews"
                    >
                        <i class="fas fa-plus"></i>
                          เพิ่มข้อมูลข่าวสาร
                    </button> 
                    <?php } ?>
                </div> 
                <div class="row mt-2">
                    <?php
                        $getdata_news = "SELECT * FROM topnews ORDER BY id_news DESC";
                         $setQuery = mysqli_query($conn, $getdata_news)or die(mysqli_error());
                            foreach($setQuery as $i => $res){
                                topnewsCard(($i+1),$res['id_news'],$res['header_news'],$res['detail_news'],$res['type_news'],
                                    $res['set_date'],$res['news_image'],$res['id_user_create'],$res['preview_number'],$status);
                            }
                    ?>
                </div>
            </div>
        </main>
        <main-create-topnew></main-create-topnew>
        <main-edit-news></main-edit-news>
    </div>
    <script src="../assets/scripts/news.js"></script>
</body>
</html>
<?php
 }

?>