<?php

include_once('../../function/config.php');
require_once('../../function/link.php');

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
  const MySetSweetAlert =(Icons,Titles,Texts,Location)=>{
      Swal.fire({
          icon: Icons,
          title: Titles,
          text:Texts,
          confirmButtonText:"OK"
      }).then((result)=>{
           window.location = `${Location}`
      })
  }
</script> 
<?php
    function setImgpath($nameImg){
        $ext = pathinfo(basename($_FILES[$nameImg]["name"]), PATHINFO_EXTENSION);
          if($ext !=""){
              $new_img_name = "img_".uniqid().".".$ext;
              
              $uploadPath = 'data/orphan-information/'.$new_img_name;
              move_uploaded_file($_FILES[$nameImg]["tmp_name"],$uploadPath);
              $newImage = $new_img_name;
          }else{
              $newImage = $new_img_name;
          }
          return $newImage;
      }

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        if($_POST['formgroup'] == "oneformdata"){ //form one

           $orphan_id = $_POST['orphan_id'];
           $title_me = $_POST['title_me'];
           $firstname = $_POST['firstname'];
           $lastname = $_POST['lastname'];
           $cardid = $_POST['cardid'];
           $call = $_POST['call'];
           $berd_day_me = $_POST['berd_day_me'];
           $age = $_POST['age'];
           $heigh = $_POST['heigh'];
           $weigth = $_POST['weigth'];
           $sibingsnumber = $_POST['sibingsnumber'];
           $menumber = $_POST['menumber'];
           $blood_group_me = $_POST['blood_group_me'];
           $my_image = $_POST['my_image'];
            if($_FILES['meImage']['tmp_name'] == ""){
                $sqlOne = "UPDATE formone_orphan_record SET title_me='$title_me',first_name_me='$firstname',last_name_me='$lastname',
                    berd_day_me='$berd_day_me',age_me='$age',heigh_me='$heigh',weigth_me='$weigth',blood_group_me='$blood_group_me',
                    card_id='$cardid',call_me='$call',siblings_number='$sibingsnumber',me_number='$menumber' WHERE id_orphan='$orphan_id'";
            }else{
                $sqlOne = "UPDATE formone_orphan_record SET title_me='$title_me',first_name_me='$firstname',last_name_me='$lastname',
                    berd_day_me='$berd_day_me',age_me='$age',heigh_me='$heigh',weigth_me='$weigth',blood_group_me='$blood_group_me',
                    card_id='$cardid',call_me='$call',siblings_number='$sibingsnumber',me_number='$menumber',profile_orphan='".setImgpath("meImage")."'
                    WHERE id_orphan='$orphan_id'";
                if($my_image !=''){
                    unlink('data/orphan-information/'.$my_image);
                }
            }
                $queryOne = mysqli_query($conn,$sqlOne)or die(mysqli_error());
                  if($queryOne){
                       echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"success\",\"แก้ไขข้อมูลเรียบร้อย\",\"\",\"../show-information-orphan.php?get_orphanId=".$orphan_id."\")
                        </script>";
                  }else{
                    echo "<script type=\"text/javascript\">
                        MySetSweetAlert(\"error\",\"แก้ไขข้อมูล ล้มเหลว\",\" แก้ข้อมูล ล้มเหลว มีข้อผิดพลาดบางอย่าง \",\"../show-information-orphan.php?get_orphanId=".$orphan_id."\")
                    </script>";
                  }

        }else if($_POST['formgroup'] == "trueformdata"){ //form true

            $formtrueid = $_POST['formtrueid'];
            $home_id = $_POST['home_id'];
            $district_home = $_POST['district_home'];
            $amphoe_home = $_POST['amphoe_home'];
            $province_home = $_POST['province_home'];
            $zipcode_home = $_POST['zipcode_home'];
             $editSqlTrue = "UPDATE formtrue_orphan_school SET home_id='$home_id', district_home='$district_home', 
                amphoe_home='$amphoe_home', province_home='$province_home', zipcode_home='$zipcode_home' WHERE getid_jion_orphan=$formtrueid";
                  $queryTrue = mysqli_query($conn, $editSqlTrue)or die(mysqli_error());
                    if($queryTrue){
                        echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"success\",\"แก้ไขข้อมูลเรียบร้อย\",\"\",\"../show-information-orphan.php?get_orphanId=".$formtrueid."\")
                        </script>";
                    }else{
                        echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"error\",\"แก้ไขข้อมูล ล้มเหลว\",\" แก้ข้อมูล ล้มเหลว มีข้อผิดพลาดบางอย่าง \",\"../show-information-orphan.php?get_orphanId=".$formtrueid."\")
                        </script>";
                    }

        }else if($_POST['formgroup'] == "treeformdata"){
            $formtreeid = $_POST['formtreeid'];
            $school_name = $_POST['school_name'];
            $district_school = $_POST['district_school'];
            $amphoe_school = $_POST['amphoe_school'];
            $province_school = $_POST['province_school'];
            $zipcode_school = $_POST['zipcode_school'];
             $editSqlTree = "UPDATE formtrue_orphan_school SET school2_name='$school_name',district_school2='$district_school',amphoe_school2='$amphoe_school',
                province_school2='$province_school',zipcode_school2='$zipcode_school' WHERE getid_jion_orphan=$formtreeid";
                  $queryTree = mysqli_query($conn, $editSqlTree)or die(mysqli_error());
                    if($queryTree){
                        echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"success\",\"แก้ไขข้อมูลเรียบร้อย\",\"\",\"../show-information-orphan.php?get_orphanId=".$formtreeid."\")
                        </script>";
                    }else{
                        echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"error\",\"แก้ไขข้อมูล ล้มเหลว\",\" แก้ข้อมูล ล้มเหลว มีข้อผิดพลาดบางอย่าง \",\"../show-information-orphan.php?get_orphanId=".$formtreeid."\")
                        </script>";
                    }
        }else if($_POST['formgroup'] == "fourformdata"){
            $formfourid = $_POST['formfourid'];
            $school_name2 = $_POST['school_name2'];
            $district_school2 = $_POST['district_school2'];
            $amphoe_school2 = $_POST['amphoe_school2'];
            $province_school2 = $_POST['province_school2'];
            $zipcode_school2 = $_POST['zipcode_school2'];
              $editSqlFour = "UPDATE formtrue_orphan_school SET school_name='$school_name2', district_school='$district_school2', amphoe_school='$amphoe_school2',
                province_school='$province_school2', zipcode_school='$zipcode_school2' WHERE getid_jion_orphan=$formfourid";
                  $queryFour = mysqli_query($conn, $editSqlFour)or die(mysqli_error());
                    if($queryFour){
                        echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"success\",\"แก้ไขข้อมูลเรียบร้อย\",\"\",\"../show-information-orphan.php?get_orphanId=".$formfourid."\")
                        </script>";
                    }else{
                        echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"error\",\"แก้ไขข้อมูล ล้มเหลว\",\" แก้ข้อมูล ล้มเหลว มีข้อผิดพลาดบางอย่าง \",\"../show-information-orphan.php?get_orphanId=".$formfourid."\")
                        </script>";
                    } 
        }else if($_POST['formgroup'] == "fiveformdata"){
            $formfiveid = $_POST['formfiveid'];
            $fathername = $_POST['fathername'];
            $occupation_father = $_POST['occupation_father'];
            $income_father = $_POST['income_father'];
            $berd_day_father = $_POST['berd_day_father'];
            $age_father = $_POST['age_father'];
            $tell_mather = $_POST['tell_mather'];
            $status_father = $_POST['status_father'];
            $mathername = $_POST['mathername'];
            $occupation_mather = $_POST['occupation_mather'];
            $income_mather = $_POST['income_mather'];
            $berd_day_mather = $_POST['berd_day_mather'];
            $age_mather = $_POST['age_mather'];
            $tell_mather = $_POST['tell_mather'];
            $status_mather = $_POST['status_mather'];
             $editSqlFive = "UPDATE formtree_parents_orphan SET fullname_father='$fathername',occupation_father='$occupation_father',income_father='$income_father',berd_day_father='$berd_day_father',
                age_father='$age_father',tell_father='$tell_mather',status_father='$status_father',fullname_mather='$mathername',occupation_mather='$occupation_mather',
                income_mather='$income_mather',berd_day_mather='$berd_day_mather',age_mather='$age_mather',tell_mather='$tell_mather',status_mather='$status_mather'
                WHERE join_id_orphan=$formfiveid";
                 $queryFive = mysqli_query($conn, $editSqlFive)or die(mysqli_error());
                  if($queryFive){
                    echo "<script type=\"text/javascript\">
                        MySetSweetAlert(\"success\",\"แก้ไขข้อมูลเรียบร้อย\",\"\",\"../show-information-orphan.php?get_orphanId=".$formfiveid."\")
                    </script>";
                  }else{
                    echo "<script type=\"text/javascript\">
                        MySetSweetAlert(\"error\",\"แก้ไขข้อมูล ล้มเหลว\",\" แก้ข้อมูล ล้มเหลว มีข้อผิดพลาดบางอย่าง \",\"../show-information-orphan.php?get_orphanId=".$formfiveid."\")
                    </script>";
                  }

        }else if($_POST['formgroup'] == "sixformdata"){
            $formsixid = $_POST['formsixid'];
            $status_family = $_POST['status_family'];
            $revenue_family = $_POST['revenue_family'];
            $level_holp = $_POST['level_holp'];
            $estimate_help = $_POST['estimate_help'];
            $deceased = $_POST['deceased'];
            $cause_death = $_POST['cause_death'];
            $death_day = $_POST['death_day'];
            $year_study = $_POST['year_study'];
            $study_status = $_POST['study_status'];
            $cause_stop_study = $_POST['cause_stop_study'];
                $editSqlSix = "UPDATE formfour_status_orphan SET family_status='$status_family',level_help='$level_holp',estimate_help='$estimate_help',revenue_family='$revenue_family',
                    deceased='$deceased',cause_death='$cause_death',death_day='$death_day',study_status='$study_status',year_study='$year_study',cause_stop_study='$cause_stop_study'
                    WHERE id_join_orphan=$formsixid";
                     $querySix = mysqli_query($conn,$editSqlSix)or die(mysqli_error());
                       if($querySix){
                        echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"success\",\"แก้ไขข้อมูลเรียบร้อย\",\"\",\"../show-information-orphan.php?get_orphanId=".$formsixid."\")
                        </script>";
                       }else{
                        echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"error\",\"แก้ไขข้อมูล ล้มเหลว\",\" แก้ข้อมูล ล้มเหลว มีข้อผิดพลาดบางอย่าง \",\"../show-information-orphan.php?get_orphanId=".$formsixid."\")
                        </script>";
                       }

        }else if($_POST['formgroup'] == "sevenformdata"){
            $formsevenid = $_POST['formsevenid'];
            $home_image_name = $_POST['home_image_name'];
                if($_FILES['home_photo']['tmp_name'] == ''){
                    echo "<script type=\"text/javascript\">
                                MySetSweetAlert(\"warning\",\"ไม่มีข้อมูลให้update\",\" คุณไม่ได้ update อะไรเลย \",\"../show-information-orphan.php?get_orphanId=".$formsevenid."\")
                            </script>";
                }else{
                    $editSqlSeven = "UPDATE formfour_status_orphan SET image_home='".setImgpath("home_photo")."' WHERE id_join_orphan=$formsevenid";
                        $querySeven = mysqli_query($conn, $editSqlSeven)or die(nysqli_error());
                          if($querySeven){
                              if($home_image_name !=''){
                                    unlink('data/orphan-information/'.$home_image_name);
                               }
                               echo "<script type=\"text/javascript\">
                                    MySetSweetAlert(\"success\",\"แก้ไขข้อมูลเรียบร้อย\",\"\",\"../show-information-orphan.php?get_orphanId=".$formsevenid."\")
                                </script>";
                          }else{
                            echo "<script type=\"text/javascript\">
                                MySetSweetAlert(\"error\",\"แก้ไขข้อมูล ล้มเหลว\",\" แก้ข้อมูล ล้มเหลว มีข้อผิดพลาดบางอย่าง \",\"../show-information-orphan.php?get_orphanId=".$formsevenid."\")
                            </script>";
                          }
                }
        }else{
            echo "false error mot form munber ไม่มี form นี้ ในการกำหนด มีข้อผิดพลาด ทางระบบ";
        }
    }else if($_SERVER['REQUEST_METHOD']=== "GET"){
        $getid_orphan = $_GET['getid_orphan'];
        $image_home = $_GET['image_home'];
        $img_orphan = $_GET['img_orphan'];

        $deleteT1 = mysqli_query($conn,"DELETE FROM formone_orphan_record WHERE id_orphan=$getid_orphan")or die(mysqli_error());
            if($deleteT1){
                unlink('data/orphan-information/'.$img_orphan);
                $deleteT2 = mysqli_query($conn,"DELETE FROM formtrue_orphan_school WHERE getid_jion_orphan=$getid_orphan");
                $deleteT3 = mysqli_query($conn,"DELETE FROM formtree_parents_orphan WHERE join_id_orphan=$getid_orphan");
                $deleteT4 = mysqli_query($conn,"DELETE FROM formfour_status_orphan WHERE id_join_orphan=$getid_orphan");
                    if($deleteT2 & $deleteT3 & $deleteT4){
                        unlink('data/orphan-information/'.$image_home);
                        echo "<script type=\"text/javascript\">
                                MySetSweetAlert(\"success\",\"delete 2 success\",\" delete ข้อมูลเรียบร้อย \",\"../orphan_information.php\")
                            </script>";
                    }else{
                        echo "<script type=\"text/javascript\">
                                MySetSweetAlert(\"error\",\"delete 2 ล้มเหลว\",\" แก้ข้อมูล ล้มเหลว มีข้อผิดพลาดบางอย่าง \",\"../orphan_information.php\")
                            </script>";
                    }
            }else{
                echo "<script type=\"text/javascript\">
                        MySetSweetAlert(\"error\",\"delte 1 ล้มเหลว\",\" แก้ข้อมูล ล้มเหลว มีข้อผิดพลาดบางอย่าง \",\"../orphan_information.php\")
                    </script>";
            }

    }
?>
</body>
</html>