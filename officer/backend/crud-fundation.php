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
    <title>Document Fundation</title>
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
           window.location = '../officers.php'
      })
  }
</script>
<?php
    date_default_timezone_set("Asia/Bangkok");
    function setImgpath($nameImg){
        $ext = pathinfo(basename($_FILES[$nameImg]["name"]), PATHINFO_EXTENSION);
          if($ext !=""){
              $new_img_name = "img_".uniqid().".".$ext;
              
              $uploadPath = 'data/fundation/'.$new_img_name;
              move_uploaded_file($_FILES[$nameImg]["tmp_name"],$uploadPath);
              $newImage = $new_img_name;
          }else{
              $newImage = $new_img_name;
          }
          return $newImage;
    }
    if($_SERVER['REQUEST_METHOD'] === "POST"){ 
        if($_POST['status_form'] == "formcreate"){
            $title_fundation = $_POST['title_fundation'];
            $firstname_fundation = $_POST['firstname_fundation'];
            $lastname_fundation = $_POST['lastname_fundation'];
            $age_fundation = $_POST['age_fundation'];
            $sex_fundation = $_POST['sex_fundation'];
            $email_fundation = $_POST['email_fundation'];
            $tell_fundation = $_POST['tell_fundation'];
            $cardnumber_fundation = $_POST['cardnumber_fundation'];
            $occupation_fundation = $_POST['occupation_fundation'];
            $workplace_fundation = $_POST['workplace_fundation'];
            $home_id = $_POST['home_id'];
            $district = $_POST['district'];
            $amphoe = $_POST['amphoe'];
            $province = $_POST['province'];
            $zipcode = $_POST['zipcode'];
            //echo $_FILES['photo_fundation']['name'];
              $setQl = "INSERT INTO fundation SET title_fundation='$title_fundation',firstname_fundation='$firstname_fundation',
                lastname_fundation='$lastname_fundation',age_fundation='$age_fundation',sex_fundation='$sex_fundation',
                email='$email_fundation',tell_fundation='$tell_fundation',cardnumber='$cardnumber_fundation',
                occupation='$occupation_fundation',workplace='$workplace_fundation',image_fundation='".setImgpath("photo_fundation")."',
                homeadress='$home_id',district='$district',amphoe='$amphoe',province='$province',zipcode='$zipcode'
              ";
                $queryFundation = mysqli_query($conn,$setQl)or die(mysqli_error());
                  if($queryFundation){
                        echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"success\",\"เรียบร้อย\",\"เพิ่มข้อมูลกรรมการเรียบร้อยแล้ว\")
                        </script>";
                  }else{
                        echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"error\",\"ล้มเหลว\",\"มีข้อผิดพลาดบางอย่างไม่สามารถเพิ่มข้อมูลได้\")
                        </script>";
                  }
        }else if($_POST['status_form']=="formedit"){
            $edit_title_fundation = $_POST['edit_title_fundation'];
            $edit_firstname_fundation = $_POST['edit_firstname_fundation'];
            $edit_lastname_fundation = $_POST['edit_lastname_fundation'];
            $edit_age_fundation = $_POST['edit_age_fundation'];
            $edit_sex_fundation = $_POST['edit_sex_fundation'];
            $edit_email_fundation = $_POST['edit_email_fundation'];
            $edit_tell_fundation = $_POST['edit_tell_fundation'];
            $edit_cardnumber_fundation = $_POST['edit_cardnumber_fundation'];
            $edit_occupation_fundation = $_POST['edit_occupation_fundation'];
            $edit_workplace_fundation = $_POST['edit_workplace_fundation'];
            $edit_fundation_id = $_POST['edit_fundation_id'];
            $edit_home_id = $_POST['edit_home_id'];
            $edit_district = $_POST['edit_district'];
            $edit_amphoe = $_POST['edit_amphoe'];
            $edit_province = $_POST['edit_province'];
            $edit_zipcode = $_POST['edit_zipcode'];
            
            if(!$_FILES['photo_fundation_edit']['name']){
             $editQl = "UPDATE fundation SET title_fundation='$edit_title_fundation', firstname_fundation='$edit_firstname_fundation',
                lastname_fundation='$edit_lastname_fundation', age_fundation='$edit_age_fundation', sex_fundation='$edit_sex_fundation',
                email='$edit_email_fundation', tell_fundation='$edit_tell_fundation', cardnumber='$edit_cardnumber_fundation',
                occupation='$edit_occupation_fundation', workplace='$edit_workplace_fundation',
                homeadress='$edit_home_id',district='$edit_district',amphoe='$edit_amphoe',province='$edit_province',zipcode='$edit_zipcode' WHERE id_fundation='$edit_fundation_id'";
                //echo $_POST['get_image_name'];
            }else{
                $editQl = "UPDATE fundation SET title_fundation='$edit_title_fundation', firstname_fundation='$edit_firstname_fundation',
                lastname_fundation='$edit_lastname_fundation', age_fundation='$edit_age_fundation', sex_fundation='$edit_sex_fundation',
                email='$edit_email_fundation', tell_fundation='$edit_tell_fundation', cardnumber='$edit_cardnumber_fundation',
                occupation='$edit_occupation_fundation', workplace='$edit_workplace_fundation',image_fundation='".setImgpath("photo_fundation_edit")."',
                homeadress='$edit_home_id',district='$edit_district',amphoe='$edit_amphoe',province='$edit_province',zipcode='$edit_zipcode' WHERE id_fundation='$edit_fundation_id'";
                unlink("data/fundation/".$_POST['get_image_name']);
                //echo $_POST['get_image_name'];
            }
                $queryEdit = mysqli_query($conn,$editQl);
                    if($queryEdit){
                        echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"success\",\"เรียบร้อย\",\"แก้ไขข้อมูลกรรมการเรียบร้อยแล้ว\")
                        </script>";
                    }else{
                        echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"error\",\"ไม่สำเร็จ\",\"มีข้อผิดพลาด ล้มเหลวในการแก้ไข ติดต่อเจ้าหน้าที่\")
                        </script>";
                    }
        }
    }else if($_SERVER['REQUEST_METHOD'] === "GET"){
        if($_GET['status'] == "delete"){
            $fundation_id = $_GET['id_fundation'];
            $image_fundation = $_GET['image_fundation'];
              $Qldelete = mysqli_query($conn,"DELETE FROM fundation WHERE id_fundation=$fundation_id")or die(mysqli_error());
                echo $image_fundation;
                if($Qldelete){
                    unlink("data/fundation/".$_GET['image_fundation']);
                    echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"success\",\"ลบ เรียบร้อย\",\"ลบข้อมูลกรรมการเรียบร้อยแล้ว\")
                        </script>";
                }else{
                    echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"error\",\"ล้มเหลว\",\"ล้มเหลวในการลบ\")
                        </script>";
                }
        }else{
            echo $_SERVER['REQUEST_METHOD'];
        }
    }
?>

</body>
</html>