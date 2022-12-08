<?php
    include_once("../../function/link.php");
    include_once("../../function/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script type="text/javascript">
  const MySetSweetAlert =(Icons,Titles,Texts)=>{
      Swal.fire({
          icon: Icons,
          title: Titles,
          text:Texts,
          confirmButtonText:"OK"
      }).then((result)=>{
        window.history.back()
      })
  }
</script>
<?php
    function setImgpath($nameImg){
        $ext = pathinfo(basename($_FILES[$nameImg]["name"]), PATHINFO_EXTENSION);
          if($ext !=""){
              $new_img_name = "img_".uniqid().".".$ext;
              
              $uploadPath = 'data/board/'.$new_img_name;
              move_uploaded_file($_FILES[$nameImg]["tmp_name"],$uploadPath);
              $newImage = $new_img_name;
              
          }else{
              $newImage = $new_img_name;
              echo "error";
          }
          return $newImage;
      }

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        if($_POST['status'] === "CREATE"){
            $title = $_POST['title'];
            $ferst_name = $_POST['ferst_name'];
            $last_name = $_POST['last_name'];
             $set_fullname = join(array($title," ",$ferst_name,"  ",$last_name));
             echo "<br/>";
             echo $set_fullname;
            $card_id = $_POST['card_id'];
            $tell = $_POST['tell'];
            $board_email = $_POST['board_email'];
            $facebook_board = $_POST['facebook_board'];
            $birthday_board = $_POST['birthday_board'];
            $board_religion = $_POST['board_religion'];
            $number_of_balls = $_POST['number_of_balls'];

           // echo join(array($card_id," ",$tell," ",$board_email," ",$facebook_board));
           // echo "<br/>";
           // echo $_FILES["board_image"]["name"];
           // echo "<br/>";
            //imagename ===> board_image;
            $position_bord = $_POST['position_bord'];
            $occupation_board = $_POST['occupation_board'];
            $sex = $_POST['sex'];
            echo $sex;
            $age_board = $_POST['age_board'];
            echo $age_board;
            $board_status = $_POST['board_status'];
           // echo join(array($position_bord," ",$occupation_board," ",$sex," ",$age_board," ",$board_status));
           // echo "<br/>";

            //ที่อยู่ตามบัตรประชาชน
            $home1_id = $_POST['home1_id'];
            $home1_district = $_POST['home1_district'];
            $home1_amphoe = $_POST['home1_amphoe'];
            $home1_province = $_POST['home1_province'];
            $home1_zipcode = $_POST['home1_zipcode'];
           // echo join(array($home1_id," ", $home1_district," ",$home1_amphoe," ",$home1_province," ",$home1_zipcode));
           // echo "<br/>";

            //ที่อยู่ปัจจุบันที่ติดต่อได้
            $home2_id = $_POST['home2_id'];
            $home2_district = $_POST['home2_district'];
            $home2_amphoe = $_POST['home2_amphoe'];
            $home2_province = $_POST['home2_province'];
            $home2_zipcode = $_POST['home2_zipcode'];
            //echo join(array($home2_id," ", $home2_district," ",$home2_amphoe," ",$home2_province," ",$home2_zipcode));
            //echo "<br/>";
            
            //ประวัติการศึกษา
            $Qualification_board = $_POST['Qualification_board']; //วุฒิการศึกษาสูงสุด
            $Institution_board = $_POST['Institution_board']; //ชื่อสถาบัน
            $Branch_board = $_POST['Branch_board']; //สาขาวิชา

            $work_history = $_POST['work_history']; //ประวัติการทำงาน
            $motto = $_POST['motto']; //คติประจำใจ
            $talent = $_POST['talent']; //ความสามารถพิเศษ
           // echo join(array($work_history,"  ",$motto,"   ",$talent));
              
              $select_id_card = mysqli_query($conn,"SELECT number_cardid_board FROM board_users WHERE number_cardid_board='$card_id'");
               $numrows = mysqli_num_rows($select_id_card);
                 if($numrows === 1){
                    echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"error\",\"เลขบัตรประชาชน ซ้ำ\",\"มี เลขบัตรประชาชน นี้อยู่แล้วโปรดสร้าง เลขบัตรประชาชน ใหม่\")
                      </script>";
                 }else{
                    $sql_boardusers = "INSERT INTO board_users SET titleboard='$title',fullname_bord='$ferst_name',lastname_board='$last_name',position_bord='$position_bord',birthday_board='$birthday_board',
                        number_cardid_board='$card_id',occupation_board='$occupation_board',sex='$sex',board_religion='$board_religion',board_status='$board_status',board_age='$age_board',
                        number_of_balls='$number_of_balls',board_image='".setImgpath("board_image")."'
                    ";
                    //echo $sql_boardusers;
                    //echo "<br/>";
                      $query_boardusers = mysqli_query($conn,$sql_boardusers);
                        if($query_boardusers){
                            $get_insert_id = mysqli_insert_id($conn);
                            $sql2_usercontact = "INSERT INTO board_users2_contact SET get_boardid='$get_insert_id',board_email='$board_email',board_facebook='$facebook_board',
                                board_phone='$tell',work_history='$work_history',motto='$motto',talent='$talent'
                            ";
                            //echo $sql2_usercontact;
                            //echo "<br/>";
                            $sql3_boardschool = "INSERT INTO board_users3_school SET get_boardid='$get_insert_id',qualification='$Qualification_board',institution='$Institution_board',branch='$Branch_board'";
                            //echo $sql3_boardschool;
                            //echo "<br/>";
                            $sql4_locationaddress = "INSERT INTO board_users4_location_address SET home1_id='$home1_id',home1_district='$home1_district',home1_amphoe='$home1_amphoe',
                                home1_province='$home1_province',home1_zipcode='$home1_zipcode',home2_id='$home2_id',home2_district='$home2_district',home2_amphoe='$home2_amphoe',
                                home2_province='$home2_province',home2_zipcode='$home2_zipcode',get_boarduser_id='$get_insert_id'
                            ";
                            //echo $sql4_locationaddress;
                            //echo "<br/>";
                              $query_usercontact = mysqli_query($conn,$sql2_usercontact);
                              $query_boardschool = mysqli_query($conn,$sql3_boardschool);
                              $query_locationaddress = mysqli_query($conn,$sql4_locationaddress);
                                if($query_usercontact & $query_boardschool & $query_locationaddress){
                                    echo "<script type=\"text/javascript\">
                                            MySetSweetAlert(\"success\",\"เรียบร้อย\",\"เพิ่มข้อมูลคณะกรรมการเรียบร้อยแล้ว\")
                                        </script>";
                                }else{
                                    echo "<script type=\"text/javascript\">
                                        MySetSweetAlert(\"error\",\"ล้มเหลว!\",\"เพิ่มข้อมูลล้มเหลว! ไม่สามารถเพิ่มได้ติดต่อแอดมิน\")
                                    </script>";
                                }
                        }else{
                            echo "<script type=\"text/javascript\">
                                 MySetSweetAlert(\"error\",\"ล้มเหลว!\",\"เพิ่มข้อมูลล้มเหลว ไม่สามารถเพิ่มได้ติดต่อแอดมิน\")
                             </script>";
                        }
                 }
        }else if($_POST['status'] === "UPDATE"){
            $get_board_id = $_POST['get_board_id'];
            $edit_board_title = $_POST['edit_board_title'];
            $edit_board_firstname = $_POST['edit_board_firstname'];
            $edit_board_lastname = $_POST['edit_board_lastname'];
            $edit_board_cardid = $_POST['edit_board_cardid'];
            $edit_board_tell = $_POST['edit_board_tell'];
            $edit_board_bertday = $_POST['edit_board_bertday'];
            $edit_board_email = $_POST['edit_board_email'];
            $edit_board_facebook = $_POST['edit_board_facebook'];
            $edit_board_religion = $_POST['edit_board_religion'];
            $edit_position_bord = $_POST['edit_position_bord'];
            $edit_occupation_board = $_POST['edit_occupation_board'];
            $edit_sex = $_POST['edit_sex'];
            $edit_age_board = $_POST['edit_age_board'];
            $edit_board_status = $_POST['edit_board_status'];
            $edit_number_of_balls = $_POST['edit_number_of_balls'];
            $edit_homeid = $_POST['edit_homeid'];
            $edit_district = $_POST['edit_district'];
            $edit_amphoe = $_POST['edit_amphoe'];
            $edit_province = $_POST['edit_province'];
            $edit_zipcode = $_POST['edit_zipcode'];
            $edit_homeid_true = $_POST['edit_homeid_true'];
            $edit_district_true = $_POST['edit_district_true'];
            $edit_amphoe_true = $_POST['edit_amphoe_true'];
            $edit_prvince_true = $_POST['edit_prvince_true'];
            $edit_zipcode_true = $_POST['edit_zipcode_true'];

            $edit_Qualification_board = $_POST['edit_Qualification_board'];
            $edit_Institution_board = $_POST['edit_Institution_board'];
            $edit_Branch_board = $_POST['edit_Branch_board'];
            $edit_workhistory = $_POST['edit_workhistory'];
            $edit_motto = $_POST['edit_motto'];
            $edit_talent = $_POST['edit_talent'];
            //image name
            $get_image_name = $_POST['get_image_name'];
             
             if(!$_FILES['editboard_image']['tmp_name']){
                 $editQl = "UPDATE board_users SET titleboard='$edit_board_title',fullname_bord='$edit_board_firstname',lastname_board='$edit_board_lastname',
                     position_bord='$edit_position_bord',occupation_board='$edit_occupation_board',sex='$edit_sex',board_religion='$edit_board_religion',board_status='$edit_board_status',
                     board_age='$edit_age_board',number_of_balls='$edit_number_of_balls' WHERE bord_id='$get_board_id'
                 ";
              }else{
                 $editQl = "UPDATE board_users SET titleboard='$edit_board_title',fullname_bord='$edit_board_firstname',lastname_board='$edit_board_lastname',
                     position_bord='$edit_position_bord',occupation_board='$edit_occupation_board',sex='$edit_sex',board_religion='$edit_board_religion',board_status='$edit_board_status',
                     board_age='$edit_age_board',number_of_balls='$edit_number_of_balls',board_image='".setImgpath("editboard_image")."' WHERE bord_id='$get_board_id'
                 ";
                 if($get_image_name){
                    unlink("data/board/".$get_image_name);
                 }else{
                    echo "not image";
                 }
              }
               $editQl2 = "UPDATE board_users2_contact SET board_email='$edit_board_email',board_facebook='$edit_board_facebook',board_phone='$edit_board_tell',
                    work_history='$edit_workhistory',motto='$edit_motto',talent='$edit_talent' WHERE get_boardid='$get_board_id'
               ";
               $editQl3 = "UPDATE board_users3_school SET qualification='$edit_Qualification_board',institution='$edit_Institution_board',branch='$edit_Branch_board' WHERE get_boardid ='$get_board_id'
               ";
               $editQl4 = "UPDATE board_users4_location_address SET home1_id='$edit_homeid',home1_district='$edit_district',home1_amphoe='$edit_amphoe',
                    home1_province='$edit_province',home1_zipcode='$edit_zipcode',home2_id='$edit_homeid_true',home2_district='$edit_district_true',
                    home2_amphoe='$edit_amphoe_true',home2_province='$edit_prvince_true',home2_zipcode='$edit_zipcode_true' WHERE get_boarduser_id='$get_board_id'
               ";
                    $edit_query_one = mysqli_query($conn, $editQl);
                    $edit_query_true = mysqli_query($conn, $editQl2);
                    $edit_query_tree = mysqli_query($conn, $editQl3);
                    $edit_query_four = mysqli_query($conn, $editQl4);
                     if($edit_query_one & $edit_query_true & $edit_query_tree & $edit_query_four){
                        echo "<script type=\"text/javascript\">
                                MySetSweetAlert(\"success\",\"เรียบร้อย\",\"แก้ไขข้อมูลคณะกรรมการเรียบร้อยแล้ว\")
                            </script>";
                     }else{
                        echo "<script type=\"text/javascript\">
                                MySetSweetAlert(\"error\",\"ล้มเหลว\",\"แก้ไขข้อมูลล้มเหลว เกิดการผิดพลาดในระบบ ติดต่อเจ้าหน้าที่\")
                            </script>";
                     }
             
        }else{
            echo "error method status is status f * fukking";
        }
    }else if($_SERVER['REQUEST_METHOD']=== "GET"){
        if($_GET['status']==="delete"){
            $getboard_id = $_GET['getboard_id'];
            $getboardImg = $_GET['getboardImg'];
              $delone = mysqli_query($conn,"DELETE FROM board_users WHERE bord_id='$getboard_id'");
              $deltrue = mysqli_query($conn,"DELETE FROM board_users2_contact WHERE get_boardid='$getboard_id'");
              $deltree = mysqli_query($conn,"DELETE FROM board_users3_school WHERE get_boardid='$getboard_id'");
              $delfour = mysqli_query($conn,"DELETE FROM board_users4_location_address WHERE get_boarduser_id='$getboard_id'");
                if($delone & $deltrue & $deltree & $delfour){
                    unlink("data/board/".$getboardImg);
                    echo "<script type=\"text/javascript\">
                                MySetSweetAlert(\"success\",\"เรียบร้อย\",\"ลบข้อมูลคณะกรรมการเรียบร้อยแล้ว\")
                            </script>";
                }else{
                    echo "<script type=\"text/javascript\">
                                MySetSweetAlert(\"error\",\"ล้มเหลว\",\"เกิดการผิดพลาดในระบบ ไม่สามารถลบข้อมูลได้ ติดต่อเจ้าหน้าที่\")
                            </script>";
                }
        }else{
            echo $_GET['status'];
        }
    }else{
        echo "error requesr method is not method fffffukking <br/>";
        echo $_SERVER['REQUEST_METHOD'];
    }
?>
</body>
</html>