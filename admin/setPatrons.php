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
    <link rel="stylesheet" href="../assets/scss/revenue.scss">
    <script src="../assets/scripts/script-bash.js"></script>
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
                navbarSize("จัดการข้อมูลการได้รับทุน",$fullname,$profile)
            ?>
            <div class="container-fluid row">
                <div class="ml-auto">
                    <?php if($status != "chairman"){ ?>
                    <button type="button" class="bd-none au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" 
                        data-target="#modalsetPatrons" id="buttonFetchPatron"
                    >
                        <i class="fas fa-plus"></i>
                          เพิ่มข้อมูล
                    </button>
                    <?php } ?>
                   
                </div> 
                <div class="col-md-12">
                    <div class="table-responsive table-responsive-data2 mt-2">
                        <table class="table table-data2 mydataTablesetPatron">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อ สกุล</th>
                                    <th>เงินทั้งหมด</th>
                                    <th>ผู้รับ</th>
                                    <th>เงินต่อคน</th>
                                    <th>วันที่ให้ทุน</th>
                                    <th>สลิปเงินทุน</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $selectPatron = mysqli_query($conn, "SELECT * FROM set_patrons INNER JOIN patron ON patron.id = set_patrons.patron_id")or die(mysqli_error());
                                      foreach($selectPatron as $key => $res){
                                          $setFullname = join(array($res['title']," ",$res['f_name'],"   ",$res['l_name']));
                                          $setAddress = join(array($res['number_home']," ",$res['district_t']," ",$res['district_a']," ",$res['district_j']," ",$res['zip_code']));
                                          tablelistsetPatrons(
                                              ($key+1), $res['id'],$setFullname, $res['id_card'],$res['total_money'],$res['date_capital'],$res['scholarship_amount'],
                                              $res['workplace'],$res['img_slip_patron'],$res['setidpatron'],$res['slip_image_patronset'],$res['person_number'],$status
                                            );
                                      }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <main-set-patron></main-set-patron>
        </main>
    </div>
    <script>
        $('.mydataTablesetPatron').DataTable({
            scrollY:400,
            scrollX:false,
            scrollCollapse:false
        })
    </script>
    <script src="../assets/scripts/setPatron.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
</body>
</html>
<?php
 }

?>