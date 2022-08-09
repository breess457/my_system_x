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
    </style>
</head>
<body class="">
        <?php
            navbarSizeTrue('patrons.php','ผู้ที่ได้รับทุน',$fullname,$profile);
            $id_patron = $_GET['id_patron'];
        ?>
        <main class="page-content mt-0">
            <br><br><br>
            <div class="container-fluid">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-9 row">
					            	<?php
                                        $select = mysqli_query($conn,"select * from patron where id='$id_patron'")or die(mysqli_error());
                                        $assoc = mysqli_fetch_assoc($select);

                                        $setfullname = join(array($assoc['title']," ",$assoc['f_name'],"  ",$assoc['l_name']));
                                        echo "<h3 class=\"font-thi\"> ชื่อ: ". $setfullname .'</h3> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                        echo "<h3 class=\"font-thi text-salmon\"> เบอร์โทร: ". $assoc['tell'] ."</h3> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                        echo "<h3 class=\"font-thi\"> อาชีพ: ". $assoc['career'] .'</h3> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                        echo "<h3 class=\"text-success font-thi\"> ทุนทั้งหมด: ". $assoc['all_munny'] .'</h3>';
                                    ?>
					            </div>
					            <div class="col-sm-3">
                                    <?php if($status !="chairman"){ ?>
					            	<button type="button" data-target="#addEmployeeModal" id="getbtngentree" data-id="<?php echo $id_patron; ?>" class="btn btn-success btn-sm" data-toggle="modal">
                                        <span>เพิ่มผู้รับทุน</span>
                                    </button>
                                    <?php }else{ ?>
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                            <span>เพิ่มผู้รับทุน</span>
                                        </button>
                                    <?php } ?>
					            	<button type="button" data-target="#editEmployeeModal" id="editbtnpatron" data-id="<?php echo $id_patron; ?>" class="btn btn-yellow btn-sm" data-toggle="modal">
                                        <span>รายละเอียด ผู้ให้ทุน</span>
                                    </button>						
					            </div>
                            </div>
                        </div>
                        <form action="backend/delete-grantee-scholarship.php" method="post">
                            <div class="col-md-12 row">
                                <button type="submit" class="btn btn-red btn-sm ml-auto">ลบข้อมูลที่เลื่อกทั้งหมด</button>
                            </div>
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>โปรไฟล์</th>
                                        <th>ชื่อผู้รับทุน</th>
                                        <th>อายุ</th>
                                        <th>บัตรประชาชน</th>
                                        <th>วันที่เข้าร่วม</th>
                                        <th>เลือก</th>
                                        <th>ปุ่ม</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $selectQl = "SELECT * FROM patron_scholarship LEFT JOIN formone_orphan_record ON patron_scholarship.id_grantee = formone_orphan_record.id_orphan WHERE id_patrons='$id_patron'";
                                        $querysql = mysqli_query($conn, $selectQl)or die(mysqli_error());
                                          foreach($querysql as $i => $res){
                                              $fullnames = join(array($res['title_me'],$res['first_name_me']," ",$res['last_name_me']));
                                            showDataScholarshipt(($i + 1),$res['id_scholarship'],$res['profile_orphan'],$fullnames,$res['age_me'],$res['card_id'],$res['entry_date'],$id_patron);
                                          }
                                    ?>
                                </tbody>
                            </table>
                            <input type="hidden" name="getidpatron" value="<?php echo $id_patron ?>">
                        </form>
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