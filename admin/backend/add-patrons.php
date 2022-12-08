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
                  
                  $uploadPath = 'data/patrons/' . $new_img_name;
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
            $card_id = $_POST['card_id'];
            $tell = $_POST['tell'];
            $id_home = $_POST['id_home'];
            $distric_a = $_POST['distric_a'];
            $distric_b = $_POST['distric_b'];
            $distric_c = $_POST['distric_c'];
            $distric_e = $_POST['distric_e'];
            $career = $_POST['career'];
            $workplace = $_POST['workplace'];

            $chk_patron = mysqli_query($conn,"SELECT id_card FROM patron WHERE id_card=$card_id");
             $num_rows = mysqli_num_rows($chk_patron);
             if($num_rows > 0){
                echo "<script type=\"text/javascript\">
                         MySetSweetAlert(\"warning\",\"ข้อมูลซ้ำ\",\"มี เลขบัตรประชาชน นี้อยู่แล้วโปรดสร้างเลขบัตรประชาชนใหม่\")
                    </script>";
             }else{
                $newsql = "INSERT INTO patron SET title='$title', f_name='$ferst_name', l_name='$last_name', id_card='$card_id',
                  number_home='$id_home', district_t='$distric_a', district_a='$distric_b', district_j='$distric_c', zip_code='$distric_e',
                  tell='$tell', career='$career', workplace='$workplace', img_slip_patron='".setImgpath("photo_patron")."' ";

                  $queryInsert = mysqli_query($conn, $newsql)or die(mysqli_error());
                    if($queryInsert){
                        echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"success\",\"เพิ่มข้อมูลเรียบร้อย\",\"\")
                        </script>";
                    }else{
                        echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"error\",\"เกิดข้อผิดพลาด\",\"เกิดข้อผิดพลาด มีบางอย่างขัดข้อง ทำให้ไม่สามารถลบข้อมูลได้ ติดต่อผู้พัฒนา\")
                        </script>";
                    }
             }

            

          }else if($_POST['status']==="UPDATE"){
            $editIdpatron = $_POST['editIdpatron'];

            $edit_title = $_POST['edit_title'];
            $edit_ferst_name = $_POST['edit_ferst_name'];
            $edit_last_name = $_POST['edit_last_name'];
            $edit_card_id = $_POST['edit_card_id'];
            $edit_tell = $_POST['edit_tell'];
            $edit_id_home = $_POST['edit_id_home'];
            $edit_distric_a = $_POST['edit_distric_a'];
            $edit_distric_b = $_POST['edit_distric_b'];
            $edit_distric_c = $_POST['edit_distric_c'];
            $edit_distric_e = $_POST['edit_distric_e'];
            $edit_career = $_POST['edit_career'];
            $edit_workplace = $_POST['edit_workplace'];
             $chk_edit_patron = mysqli_query($conn,"SELECT id_card FROM patron WHERE id_card=$edit_card_id");
               $setnum_row = mysqli_num_rows($chk_edit_patron);
                if($setnum_row == 2){
                    echo "<script type=\"text/javascript\">
                        MySetSweetAlert(\"warning\",\"ข้อมูลซ้ำ\",\"มี เลขบัตรประชาชน นี้อยู่แล้วโปรดสร้างเลขบัตรประชาชนใหม่\")
                    </script>";
                }else{
                     if(!$_FILES['edit_photo_patron']['name']){
                       $editQl = "UPDATE patron SET title='$edit_title',f_name='$edit_ferst_name',l_name='$edit_last_name',id_card='$edit_card_id',
                           number_home='$edit_id_home',district_t='$edit_distric_a',district_a='$edit_distric_b',district_j='$edit_distric_c',zip_code='$edit_distric_e',
                           tell='$edit_tell',career='$edit_career',workplace='$edit_workplace' WHERE id=$editIdpatron
                       ";
                     }else{
                       $editQl = "UPDATE patron SET title='$edit_title',f_name='$edit_ferst_name',l_name='$edit_last_name',id_card='$edit_card_id',
                           number_home='$edit_id_home',district_t='$edit_distric_a',district_a='$edit_distric_b',district_j='$edit_distric_c',zip_code='$edit_distric_e',
                           tell='$edit_tell',career='$edit_career',workplace='$edit_workplace',img_slip_patron='".setImgpath("edit_photo_patron")."' WHERE id=$editIdpatron
                       ";
                           unlink("data/patrons/".$_POST['editimagenname']);
                     }
                       $edit_patron_query = mysqli_query($conn,$editQl);
                        if($edit_patron_query){
                           echo "<script type=\"text/javascript\">
                                   MySetSweetAlert(\"success\",\"เรียบร้อย\",\"แก้ไขข้อมูลเรียบร้อย\")
                               </script>";
                        }else{
                           echo "<script type=\"text/javascript\">
                               MySetSweetAlert(\"error\",\"ล้มเหลว\",\"ไม่สามารถแก้ไขข้อมูลดังกล่าวได้ ติดต่อเจ้าหน้าที่\")
                           </script>";
                        }
                }
          }else{
            echo $_POST['status'];
          }

        }else if ($_SERVER['REQUEST_METHOD'] === "GET"){
            if($_GET['status']==="delete"){
                $id = $_GET['patron_id'];
                $imagename = $_GET['patron_img'];
                $trashPatron = mysqli_query($conn,"DELETE FROM patron WHERE id=$id");
                    if($trashPatron){
                        unlink('data/patrons/'.$imagename);
                        $get_data_scolar = mysqli_query($conn,"SELECT id_patrons FROM patron_scholarship WHERE id_patrons=$id");
                          $row = mysqli_num_rows($get_data_scolar);
                            if($row > 0){
                                foreach($get_data_scolar as $res){
                                    $trash_scolar = mysqli_query($conn,"DELETE FROM patron_scholarship WHERE id_patrons=$id");
                                      if(!$trash_scolar){
                                        echo "error not delete table patron_scholarship ..].[..";
                                      }
                                }
                            }
                        
                        echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"success\",\"ลบข้อมูลเรียบร้อย\",\" \")
                        </script>";
                    }else{
                        echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"error\",\"เกิดข้อผิดพลาด\",\"เกิดข้อผิดพลาด มีบางอย่างขัดข้อง ทำให้ไม่สามารถลบข้อมูลได้ ติดต่อผู้พัฒนา\")
                        </script>";
                    }
            }
         }else{
            echo $_SERVER['REQUEST_METHOD'];
        }
    ?>
</body>
</html>