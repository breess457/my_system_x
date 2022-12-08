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
    $getid_project = $_GET['idx_project'];
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
    <title>Project Participants</title>
    <style>
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
        navbarSizeTrue('set_projects.php','ผู้เข้าร่วมโครงการ',$fullname,$profile);
    ?>
    <main class="page-content mt-2">
        <br><br><br>
        <div class="container">
           
            <div class="col-md-12">
                <div class="table-responsive table-responsive-data2">
                  <form action="backend/delete-orphan.php" method="post">
                    <div class="col-md-12 row">
                        <button type="submit" class="btn btn-red btn-sm ml-auto">ลบข้อมูลที่เลื่อกทั้งหมด</button>
                        <button class="btn btn-green btn-sm" type="button" data-id="<?php echo $getid_project; ?>" id="btnAddParticipant" data-toggle="modal" 
                             data-target="#modaAddParticipant"
                        >เพิ่มผู้เข้าร่วมโครงการ</button>
                    </div>
                    <table class="table table-data2 settabledata">
                        <thead class="">
                            <tr>
                                <th>ลำดับ</th>
                                <th>รูปภาพ</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>อายุ</th>
                                <th>บัตรประชาชน</th>
                                <th>วันที่เข้าร่วม</th>
                                <th>เลือก</th>
                                <th>ปุ่ม</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <?php
                                $sqli = "SELECT * FROM project_participant LEFT JOIN formone_orphan_record ON project_participant.getid_participan = formone_orphan_record.id_orphan  WHERE getid_project = $getid_project";
                                 $setQuery = mysqli_query($conn, $sqli)or die(mysqli_error());
                                 foreach($setQuery as $num => $get){
                                     $getFullname = join(array($get['title_me'],"",$get['first_name_me']," ",$get['last_name_me']));
                                    showDataPaticipants(($num+1),$get['profile_orphan'],$getFullname,$get['age_me'],$get['card_id'],$get['entry_date'],
                                        $get['getid_participan'],$get['id_project_participant'],$getid_project);
                                 }
                            ?>
                        </tbody>
                    </table>
                    <input type="hidden" name="getProjectId" value="<?php echo $getid_project; ?>" />
                  </form>
                </div>
            </div> 
        </div>
    </main>
    <main-add-participant></main-add-participant>
    <script src="../assets/scripts/project-participant.js"></script>
    <script>
        $('.settabledata').DataTable({
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