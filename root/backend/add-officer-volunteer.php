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
        if($_SERVER['REQUEST_METHOD'] === "GET"){
            //echo $_SERVER['REQUEST_METHOD'];
            $get_id = $_GET['ex_id'];
            $img_user = $_GET['img_user'];
            $trashimage = mysqli_query($conn,"DELETE users,personal_user FROM users LEFT JOIN personal_user ON users.id = personal_user.get_userid WHERE id='$get_id'")or die(mysqli_error());
                if($trashimage){
                    unlink("data-image/".$img_user);
                    echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"success\",\"เรียบร้อย\",\"ลบข้อมูลเรียบร้อยแล้ว\")
                        </script>";
                }
        }else if($_SERVER['REQUEST_METHOD'] === "POST"){
            $status_user = $_POST['status_user'];
            $user_name = $_POST['user_name']; 
            $password_user = $_POST['password_user'];
            $fullname = join(array($_POST['ferst_name']," ",$_POST['last_name']));
            $photo = $_FILES['photo_officer']['name'];
            
            $id_card = $_POST['id_card'];

              $checkSql = mysqli_query($conn,"SELECT username FROM users WHERE username='$user_name'");
                $checkRows = mysqli_num_rows($checkSql);
                if($checkRows == 1){
                    echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"warning\",\"ข้อมูลซ้ำ\",\"มียูสเซอร์เนมนี้อยู่แล้วโปรดสร้างยูสเซอร์เนมใหม่\")
                        </script>";
                }else{
                    $chkCardId = mysqli_query($conn,"SELECT * FROM personal_user WHERE idcard='$id_card'");
                      $rowcard = mysqli_num_rows($chkCardId);
                      echo $rowcard;
                       if($rowcard > 0){
                        echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"warning\",\"ข้อมูลซ้ำ\",\"มีข้อมูลบัตรประชาชนนี้อยู่แล้วโปรดสร้างข้อมูลบัตรประชาชนใหม่\")
                        </script>";
                       }else{
                         $insertQl = "INSERT INTO users SET username='$user_name', passwd='$password_user',fullname='$fullname',photo='$photo',status_users='$status_user'";
                            $queryQl = mysqli_query($conn,$insertQl)or die(mysqli_error());
                             if($queryQl){
                                 $insertId = mysqli_insert_id($conn);
                                 $title = $_POST['title'];
                                 $first_name = $_POST['ferst_name'];
                                 $last_name = $_POST['last_name'];
                                 $sex = $_POST['sex'];
                                 $age = $_POST['age'];
                                 $email = $_POST['email'];
                                 $tell = $_POST['tell'];
                                
                                $newInsert = "INSERT INTO personal_user SET get_userid='$insertId', title='$title', first_name='$first_name',
                                  last_name='$last_name', idcard='$id_card', tell='$tell', email='$email', photo_me='".setImgpath("photo_officer")."', 
                                  age='$age', sex='$sex'";
                                   $newQuery = mysqli_query($conn,$newInsert)or die(mysqli_error());
                                     if($newQuery){
                                       echo "<script type=\"text/javascript\">
                                               MySetSweetAlert(\"success\",\"เรียบร้อย\",\"เพิ่มข้อมูลเรียบร้อยแล้ว\")
                                           </script>";
                                     }else{
                                       echo "insert error is not insert new table !";
                                     }
                            }else{
                               echo "<script type=\"text/javascript\">
                                       MySetSweetAlert(\"error\",\"not insert\",\"เกิดข้อผิดพลาดบางอย่าง ไม่สามารถเพิ่มข้อมูลได้\")
                                   </script>";
                            }
                        }
                }
        }
 ?>
</body>
</html>