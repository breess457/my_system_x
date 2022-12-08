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
            <?php navbarOfficer("การได้รับทุน") ?>
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2 mydataTablexs">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ภาพ</th>
                                    <th>ชื่อ สกุล</th>
                                    <th>จำนวนเงินทุน</th>
                                    <th>จำนวนผู้รับทุน</th>
                                    <th>วันที่ให้ทุน</th> 
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $selectPatron = mysqli_query($conn, "SELECT * FROM set_patrons LEFT JOIN patron ON set_patrons.patron_id = patron.id")or die(mysqli_error());
                                      foreach($selectPatron as $key => $res){
                                          $setFullname = join(array($res['title']," ",$res['f_name'],"   ",$res['l_name']));
                                          $setAddress = join(array($res['number_home']," ",$res['district_t']," ",$res['district_a']," ",$res['district_j']," ",$res['zip_code']));
                                          tablelistPatrons(
                                              ($key+1), $res['id'],$setFullname, $res['date_capital'],$setAddress,$res['total_money'],$res['patron_day'],
                                              $res['person_number'],$res['img_slip_patron'],$res['setidpatron']
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
    <script>
         $('.mydataTablexs').DataTable({
            scrollY:400,
            scrollX:false,
            scrollCollapse:true
        })
    </script>
</body>
</html>
<?php } ?>