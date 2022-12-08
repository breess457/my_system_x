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
    <title>Patrons</title>
    <style>
        .table-wrapper {
        	background: #fff;
        	padding: 20px 25px;
        	border-radius: 3px;
        	min-width: 1000px;
        	box-shadow: 0 1px 1px rgba(0,0,0,.05); 
        }
        .table-title {        
        	padding-bottom: 15px;
        	background: #435d7d;
        	color: #fff;
        	padding: 16px 30px;
        	min-width: 100%;
        	margin: -20px -25px 10px;
        	border-radius: 3px 3px 0 0;
        }
        .table-title h2 {
        	margin: 5px 0 0;
        	font-size: 24px;
        }
        .table-title .btn-group {
        	float: right;
        }
        .table-title .text-salmon{
            color: salmon;
        }
        .table-title .btn {
        	color: #fff;
        	float: right;
        	font-size: 7px;
        	border: none;
        	min-width: 30px;
        	border-radius: 2px;
        	border: none;
        	outline: none !important;
        	margin-left: 0;
        }
        .table-title .btn i {
        	float: left;
        	font-size: 17px;
        	margin-right: 5px;
        }
        .table-title .btn span {
        	float: left;
        	margin-top: 2px;
        }
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
        .tbody-style{
            display: block;
            overflow: auto;
            height: 460px;
            position: relative;
        }
        .thed-style, .tbody-style .trlist-style {
            display:table;
            width:100%;
            table-layout:fixed;
        }
        .thed-style {
            width: calc( 100% - 1em )
        }
        .popup-wrapper {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 8px #aaa;
            overflow: hidden;
        }
        .popup-title {
            padding: 10px 15px;
            background-color: #f4f4f4;
            border-bottom: 1px solid #f0f0f0;
        }
        .popup-title h3 {
            margin: 0;
            line-height: 1.5em;
            color: #333;
        }
        .popup-body {
            padding: 10px 15px;
            color: #555;
        }
        .popup-close {
            float: right;
            margin-top: 2px;
            padding: 0;
            font-size: 24px;
            line-height: 1;
            border: 0;
            background: transparent;
            color: #aaa;
            cursor: pointer;
        }
        .popup-close:hover {
            color: #333;
        }
    </style>
</head>
<body class="">
        <?php
            navbarSizeTrue('setPatrons.php','ผู้ที่ได้รับทุน',$fullname,$profile);
            $id_patron = $_GET['patron_setid'];
            $person_number = $_GET['person_numbers'];
            $datemy = $_GET['datemy'];
            $newDatemy = date ("Y-m-d", strtotime("+09 day", strtotime($datemy)));
            $d = date('Y-m-d');

            $calculate =strtotime("$newDatemy") - strtotime($d);
            $summary=floor($calculate / 86400); // 86400 มาจาก 24*360 (1วัน = 24 ชม.)
        ?>
        <main class="page-content mt-0">
            <br><br><br>
            <div class="container-fluid">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        
                        <form action="backend/delete-grantee-scholarship.php" method="post">
                            <div class="col-md-12 row">
                                <?php 
                                    if($status != "chairman"){ 
                                        if(date('Y-m-d') >= $newDatemy){
                                ?>
                                    <h5 class="ml-auto text-dark">จัดการได้แค่10วัน และในขณะนี้ก็เกิน10วันแล้ว</h5>
                                <?php 
                                        }else{
                                ?>
                                    <h5 class="mr-auto">สามารถจัดการได้อีก <?php echo $summary ?> วัน</h5>
                                    <button type="submit" class="btn btn-red btn-sm ml-auto">ลบข้อมูลที่เลื่อกทั้งหมด</button>
                                    <button type="button" data-target="#addEmployeeModal" id="getbtngentree" data-dates="<?php echo $datemy ?>" data-id="<?php echo $id_patron; ?>" class="btn btn-success btn-sm" data-toggle="modal">
                                        <span>เพิ่มผู้รับทุน</span>
                                    </button>
                                <?php
                                        } 
                                    }
                                ?>
                            </div>
                            <table class="table table-data2 setDataTable">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>โปรไฟล์</th>
                                        <th>ชื่อผู้รับทุน</th>
                                        <th>อายุ</th>
                                        <th>บัตรประชาชน</th>
                                        <th>วันที่เข้าร่วม</th>
                                     <?php if($status != "chairman"){ ?>
                                        <th>เลือก</th>
                                        <th>ปุ่ม</th>
                                     <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $selectQl = "SELECT * FROM patron_scholarship LEFT JOIN formone_orphan_record ON patron_scholarship.id_grantee = formone_orphan_record.id_orphan WHERE id_patrons='$id_patron'";
                                        $querysql = mysqli_query($conn, $selectQl)or die(mysqli_error());
                                          foreach($querysql as $i => $res){
                                              $fullnames = join(array($res['title_me'],$res['first_name_me']," ",$res['last_name_me']));
                                            showDataScholarshipt(($i + 1),$res['id_scholarship'],$res['profile_orphan'],$fullnames,$res['age_me'],$res['card_id'],$res['entry_date'],$id_patron,$person_number,$status,$datemy);
                                          }
                                    ?>
                                </tbody>
                            </table>
                            <input type="hidden" name="dateme" value="<?php echo $datemy ?>">
                            <input type="hidden" name="getidpatron" value="<?php echo $id_patron ?>">
                            <input type="hidden" name="getpersonnumber" value="<?php echo $person_number ?>"/>
                        </form>
                    </div>
                </div>
                 
            </div>
        </main>
        <main-add-orphan personnumber=<?php echo $person_number ?>></main-add-orphan>
    <script src="../assets/scripts/patron-scholarship.js"></script>
    <script>
        $('.setDataTable').DataTable({
            scrollY:400,
            scrollX:false,
            scrollCollapse:true
        })
        
    </script>
</body>
</html>
<?php
 }

?>