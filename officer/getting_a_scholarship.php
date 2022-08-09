<?php

session_start();
include_once("../function/component-officer.php");
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
        .gedf-card{
            margin-top:102px
        }

    </style>
</head>
<body class="">
        <?php
            navbarSizeTrue('patrons.php','ผู้ที่ได้รับทุน',$fullname,$profile);
            $id_patron = $_GET['id_patron'];
        ?>
        <main class="page-content mt-0">
            <br><br><br>
            <div class="container-fluid d-flex">
                <div class="col-md-3">
                  <?php
                    $select = mysqli_query($conn,"select * from patron where id='$id_patron'")or die(mysqli_error());
                    $assoc = mysqli_fetch_assoc($select);
                    $setfullname = join(array($assoc['title']," ",$assoc['f_name'],"  ",$assoc['l_name']));
                    $setaddress = join(array($assoc['number_home']," ",$assoc['district_t'],"  ",$assoc['district_a']," ",$assoc['district_j']," ",$assoc['zip_code']));
                    echo"<div class=\"card gedf-card\">";
						echo"<div class=\"card-header\">";
                            echo"<div class=\"d-flex justify-content-between align-items-center\">";
                                echo "<div class=\"d-flex justify-content-between align-items-center\">";
                                    echo "<div class=\"ml-2\">";
                                        echo "<div class=\"h5 ml-5 \">ผู้อุปถัมท์</div>";
                                        echo "<div class=\"h7 text-muted\">".$setfullname."</div>";
                                    echo "</div>";
                                echo "</div>";
                            echo"</div>";
						echo"</div>";
                        echo "<div class=\"card-body\">";
                            echo " <a class=\"card-link\" href=\"#\">";
                                echo"<h5 class=\"card-title\"> <i class=\"fas fa-map-marker-alt\"></i> &nbsp;".$setaddress."</h5>";
                            echo "</a>";
                            echo "<p class=\"card-text\"><i class=\"fas fa-mobile\"></i> &nbsp;".$assoc['tell']."</p>";
                            echo "<p class=\"card-text\"><i class=\"fas fa-briefcase\"></i> &nbsp;".$assoc['career']."</p>";
                            echo "<p class=\"card-text\"><i class=\"fas fa-building\"></i> &nbsp;".$assoc['workplace']."</p>";
                            echo "<p class=\"card-text\"><i class=\"fas fa-calendar\"></i>&nbsp; เริ่มให้ทุน".$assoc['new_date']."</p>";
                            echo "<p class=\"card-text\"><i class=\"fas fa-calendar-times\"></i>&nbsp; สิ้นสุดให้ทุน".$assoc['end_date']."</p>";
                            
                            echo "<p class=\"card-text\"><i class=\"fas fa-dollar-sign\"></i> &nbsp;".$assoc['all_munny']."</p>";
                        echo "</div>";
					echo"</div>";
                  ?>
                </div>
                <div class="col-md-9">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>โปรไฟล์</th>
                                        <th>ชื่อผู้รับทุน</th>
                                        <th>อายุ</th>
                                        <th>ที่อยู่</th>
                                        <th>วันที่เข้าร่วม</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $selectQl = "SELECT * FROM patron_scholarship LEFT JOIN formone_orphan_record ON patron_scholarship.id_grantee = formone_orphan_record.id_orphan LEFT JOIN formtrue_orphan_school ON  formtrue_orphan_school.getid_jion_orphan = patron_scholarship.id_grantee WHERE id_patrons='$id_patron'";
                                        $querysql = mysqli_query($conn, $selectQl)or die(mysqli_error());
                                          foreach($querysql as $i => $res){
                                              $fullnames = join(array($res['title_me'],$res['first_name_me']," ",$res['last_name_me']));
                                              $fulladdress = join(array($res['home_id']," ",$res['district_home']," ",$res['amphoe_home']," ",$res['province_home']," ",$res['zipcode_home']));
                                            showDataScholarshipt(($i + 1),$res['id_scholarship'],$res['profile_orphan'],$fullnames,$res['age_me'],$res['card_id'],$res['entry_date'],$fulladdress);
                                          }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 
            </div>
        </main>
        <main-edit-patron></main-edit-patron>
        <main-add-orphan></main-add-orphan>
    <script src="../assets/scripts/patron-scholarship.js"></script>
</body>
</html>
<?php
 }

?>