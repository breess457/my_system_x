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
    $get_id_orphan = $_GET['get_orphanId'];
        
    $select_data = mysqli_query($conn,"SELECT * FROM formone_orphan_record t1 LEFT JOIN formtrue_orphan_school t2 ON t1.id_orphan = t2.getid_jion_orphan 
        LEFT JOIN formtree_parents_orphan t3 ON t3.join_id_orphan = t1.id_orphan LEFT JOIN formfour_status_orphan t4 ON t4.id_join_orphan = t1.id_orphan 
        LEFT JOIN map_location_orphan t5 ON t5.get_orphan_id = t1.id_orphan WHERE id_orphan = $get_id_orphan");
    $fetch = mysqli_fetch_assoc($select_data);
    echo "<script language=\"JavaScript\">
                var litidudeJs =".$fetch['latitude']."
                var logintudeJs = ".$fetch['logitude']."
            </script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/scss/navigationTrue-a-j.scss">
    <link rel="stylesheet" href="../assets/scss/show-data-orphan.scss">
    <link rel="stylesheet" href="../assets/scss/navbarsizeTrue.scss">
    <script src="../assets/scripts/script-bash.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="../assets/scripts/module/jquery-1.11.2.min.js" ></script>
    <title>SHOW DATA ORPHAN</title>
    <script language="JavaScript">

        function setupMap() {  
            var myOptions = {
              zoom: 14,
              center: new google.maps.LatLng(litidudeJs, logintudeJs),
              mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById('map_canvas'),myOptions);
            var marker = new google.maps.Marker({ 
              map:map,
              position: new google.maps.LatLng(litidudeJs,logintudeJs),
              draggable: true
            });
        
        }
    </script>
</head>
<body onload="setupMap()">
  <?php
        navbarSizeTrue('orphan_information.php','แสดงข้อมูลเด็กกำพร้า',$fullname,$profile)
  ?>
  <main class="page-content mt-2">
      <br><br><br>
      <div class="">
          <?php
                

                $number_project = mysqli_query($conn,"SELECT getid_participan,getid_project FROM project_participant WHERE getid_participan=$get_id_orphan");
                
                $selectCaptical = mysqli_query($conn,"SELECT * FROM patron_scholarship WHERE id_grantee=$get_id_orphan");
                
                showdataInformations(
                    /* table one */
                    $fetch['id_orphan'],$fetch['day_add_record'],$fetch['title_me'],$fetch['first_name_me'],$fetch['last_name_me'],$fetch['berd_day_me'],$fetch['age_me'],
                    $fetch['heigh_me'],$fetch['weigth_me'],$fetch['blood_group_me'],$fetch['card_id'],$fetch['call_me'],$fetch['siblings_number'],$fetch['me_number'],$fetch['profile_orphan'],
                    /* table true */
                    $fetch['home_id'],$fetch['district_home'],$fetch['amphoe_home'],$fetch['province_home'],$fetch['zipcode_home'],$fetch['school_name'],$fetch['district_school'],
                    $fetch['amphoe_school'],$fetch['province_school'],$fetch['zipcode_school'],$fetch['school2_name'],$fetch['district_school2'],$fetch['amphoe_school2'],
                    $fetch['province_school2'],$fetch['zipcode_school2'],
                    /* table tree */
                    $fetch['fullname_father'],$fetch['occupation_father'],$fetch['income_father'],$fetch['berd_day_father'],$fetch['age_father'],$fetch['tell_father'],$fetch['status_father'],
                    $fetch['fullname_mather'],$fetch['occupation_mather'],$fetch['income_mather'],$fetch['berd_day_mather'],$fetch['age_mather'],$fetch['tell_mather'],$fetch['status_mather'],
                    /* table four */
                    $fetch['image_home'],$fetch['family_status'],$fetch['level_help'],$fetch['estimate_help'],1,$fetch['deceased'],$fetch['cause_death'],$fetch['death_day'],
                    $fetch['study_status'],$fetch['year_study'],$fetch['cause_stop_study'],mysqli_num_rows($selectCaptical),mysqli_num_rows($number_project)
                );
                //echo mysqli_num_rows($selectCaptical);
          ?>

      </div>
  </main>
</body>
</html>
<?php
 }
?>