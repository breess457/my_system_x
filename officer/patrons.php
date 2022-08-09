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
    <link rel="stylesheet" href="../assets/scss/navigationTrue-a-j.scss">
    <link rel="stylesheet" href="../assets/scss/revenue.scss">
    <script src="../assets/scripts/script-bash.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="page-wrapper chiller-theme toggled">
        <?php   navigationOfiicer($status); ?>
        <main class="page-content mt-0">
            <?php navbarOfficer("Patrons") ?>
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อ สกุล</th>
                                    <th>ที่อยู่</th>
                                    <th>เบอร์โทรศัพท์</th>
                                    <th>อาชีพ</th>
                                    <th>สลิปเงินทุน</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $selectPatron = mysqli_query($conn, "SELECT * FROM patron")or die(mysqli_error());
                                      foreach($selectPatron as $key => $res){
                                          $setFullname = join(array($res['title']," ",$res['f_name'],"   ",$res['l_name']));
                                          $setAddress = join(array($res['number_home']," ",$res['district_t']," ",$res['district_a']," ",$res['district_j']," ",$res['zip_code']));
                                          tablelistPatrons(
                                              ($key+1), $res['id'],$setFullname, $res['id_card'],$setAddress,$res['tell'],$res['career'],
                                              $res['workplace'],$res['new_date'],$res['end_date'],$res['munny'],$res['all_munny'],$res['img_slip_patron']
                                            );
                                      }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
<?php } ?>