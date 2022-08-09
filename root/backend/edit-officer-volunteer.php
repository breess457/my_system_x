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
  const MySetSweetAlert =(Icons,Titles,Texts)=>{
      Swal.fire({
          icon: Icons,
          title: Titles,
          text:Texts,
          confirmButtonText:"OK"
      }).then((result)=>{
           window.location = `../officer.root.php`
      })
  }
</script>
<?php
        date_default_timezone_set("Asia/Bangkok");
        function setImgpath($nameImg){
            $ext = pathinfo(basename($_FILES[$nameImg]["name"]), PATHINFO_EXTENSION);
              if($ext !=""){
                  $new_img_name = "img_".uniqid().".".$ext;
                  
                  $uploadPath = 'data-image/'.$new_img_name;
                  move_uploaded_file($_FILES[$nameImg]["tmp_name"],$uploadPath);
                  $newImage = $new_img_name;
                  
              }else{
                  $newImage = $new_img_name;
                  
              }
              return $newImage;
          }
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $get_user_id = $_POST['get_user_id'];
        $get_img_name = $_POST['get_img_name'];
        $edit_title = $_POST['edit_title'];
        $edit_first_name = $_POST['edit_first_name'];
        $edit_last_name = $_POST['edit_last_name'];
        $set_fullname = join(array($edit_first_name," ",$edit_last_name));
        $edit_status_user = $_POST['edit_status_user'];
        $edit_username = $_POST['edit_username'];
        $edit_password_user = $_POST['edit_password_user'];
        $edit_sex = $_POST['edit_sex'];
        $edit_age = $_POST['edit_age'];
        $edit_tell = $_POST['edit_tell'];
        $edit_cardid = $_POST['edit_cardid'];
        
        $check_data = mysqli_query($conn,"SELECT username FROM users WHERE username='$edit_username'");
            $check_rows = mysqli_num_rows($check_data);
            if($check_rows == 1){  
                 $editsql = "UPDATE users SET username='$edit_username',passwd='$edit_password_user',
                    fullname='$set_fullname',status_users='$edit_status_user' WHERE id=$get_user_id";
                        $queryedit = mysqli_query($conn,$editsql);
                        if($queryedit){
                            if(!$_FILES['editphoto_user']['name']){
                                $edit_table2 = "UPDATE personal_user SET title='$edit_title', first_name='$edit_first_name', last_name='$edit_last_name',
                                idcard='$edit_cardid',tell='$edit_tell' WHERE get_userid=$get_user_id";
                            }else{
                                
                                $edit_table2 = "UPDATE personal_user SET title='$edit_title', first_name='$edit_first_name', last_name='$edit_last_name',
                                idcard='$edit_cardid',tell='$edit_tell',photo_me='".setImgpath("editphoto_user")."' WHERE get_userid=$get_user_id";
                                unlink('data-image/'.$get_img_name);
                            }
                            $query_table2 = mysqli_query($conn,$edit_table2);
                                if($query_table2){
                                    echo "<script type=\"text/javascript\">
                                        MySetSweetAlert(\"success\",\"แก้ไขข้อมูลเรียบร้อย\",\"\")
                                    </script>";
                                }else{
                                    echo "<script type=\"text/javascript\">
                                        MySetSweetAlert(\"error\",\"ล้มเหลว\",\"ระบบมีข้อผิดพลาดบ่างอย่างไม่สามารถแก้ไขข้อมูลได้ โปรดติดต่อผู้พัฒนา\")
                                    </script>";
                                }
                        }else{
                            echo "<script type=\"text/javascript\">
                                MySetSweetAlert(\"error\",\"ล้มเหลว!\",\"ระบบมีข้อผิดพลาดบ่างอย่างไม่สามารถแก้ไขข้อมูลได้ โปรดติดต่อผู้พัฒนา\")
                            </script>";
                        }
            }else{
                echo "<script type=\"text/javascript\">
                    MySetSweetAlert(\"warning\",\"บัญชีซ่ำ\",\" มีบัญชีนี้ก่อนหน้าแล้ว โปรดใช้บัญชีอื่น\")
                </script>";
            }      
    }
?>
</body>
</html>