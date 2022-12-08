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
    <title>Expenses Root</title>
    <style>
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
      <br><br>
    <div class="container-fluid mt-4 row">
      <div class="ml-auto">
          <button class="bd-none au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" 
              data-target="#modalFormofficer"
          >
              <i class="fas fa-plus"></i>
                เพิ่มข้อมูล
          </button>
      </div> 
      <div class="col-md-12 mt-4">
          <div class="table-responsive table-responsive-data2">
              <table class="table table-data2 datatableroot">
                  <thead> 
                      <tr>
                          <th>ลำดับ</th>
                          <th>รูปภาพ</th>
                          <th>ชื่อ-นามสกุล</th>
                          <th>เพศ</th>
                          <th>อายุ</th>
                          <th>อีเมล</th>
                          <th>เบอร์โทรศัพท์</th>
                          <th>สิทธ์การใช้งาน</th>
                          <th>จัดการ</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                          $getDataofficer = mysqli_query($conn,"SELECT * FROM personal_user LEFT JOIN users ON personal_user.get_userid = users.id WHERE status_users!='admin'");
                              foreach($getDataofficer as $x => $result){
                                  $setFullname = join(array($result['title'],$result['first_name']," ",$result['last_name']));
                                  tiblelistofficerRoot(($x+1),$result['id'], $result['photo_me'], $result['title'],$result['first_name'],$result['last_name'], $result['username'],
                                      $result['idcard'], $result['tell'],$result['age'],$result['sex'],$result['status_users'],$result['passwd']
                                  );
                              }
                      ?>
                  </tbody>
              </table>
          </div>
      </div>
      <main-add-officer></main-add-officer>
      <main-edit-users></main-edit-users>
      <main-get-users></main-get-users>
    </div>
    <script>
         $('.datatableroot').DataTable({
            scrollY:400,
            scrollX:true,
            scrollCollapse:true
        }) 
    </script>
  <script src="../assets/scripts/officer.js"></script>
</body>
</html>
<?php
}
?>