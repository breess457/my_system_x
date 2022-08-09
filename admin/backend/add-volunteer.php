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
    <title>Document Volunteer</title>
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
           window.location = '../../root/volunter.root.php'
      })
  }
</script>
 <?php
    date_default_timezone_set("Asia/Bangkok");
    function setImgpath($nameImg){
        $ext = pathinfo(basename($_FILES[$nameImg]["name"]), PATHINFO_EXTENSION);
          if($ext !=""){
              $new_img_name = "img_".uniqid().".".$ext;
              
              $uploadPath = 'data/volunteer/'.$new_img_name;
              move_uploaded_file($_FILES[$nameImg]["tmp_name"],$uploadPath);
              $newImage = $new_img_name;
              
          }else{
              $newImage = $new_img_name;
              
          }
          return $newImage;
      }
      if($_SERVER['REQUEST_METHOD'] === "POST"){
          $status_user = $_POST['status_user'];
          $user_name = $_POST['user_name'];
          $password_user = $_POST['password_user'];
          $fullname = join(array($_POST['ferst_name']," ",$_POST['last_name']));
          $photo = $_FILES['photo_voluteer']['name'];

            $checkSql = mysqli_query($conn,"SELECT username FROM users WHERE username='$user_name'");
             $checkRows = mysqli_num_rows($checkSql);
              if($checkRows == 1){
                  echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"error\",\"username ซ้ำ\",\"มี username นี้อยู่แล้วโปรดสร้าง username ใหม่\")
                        </script>";
              }else{
                $insertSql = "INSERT INTO users SET username='$user_name', passwd='$password_user', fullname='$fullname', photo='$photo', status_users='$status_user' ";
                 $queryinsert = mysqli_query($conn, $insertSql);
                     if($queryinsert){
                         $insertId = mysqli_insert_id($conn);
                         $title = $_POST['title'];
                         $first_name = $_POST['ferst_name'];
                         $last_name = $_POST['last_name'];
                         $sex = $_POST['sex'];
                         $age = $_POST['age'];
                         $email = $_POST['email'];
                         $tell = $_POST['tell'];
                         $id_card = $_POST['id_card'];

                            $insertNews = "INSERT INTO personal_user SET get_userid='$insertId', title='$title', first_name='$first_name',
                                last_name='$last_name', idcard='$id_card', tell='$tell', email='$email', photo_me='".setImgpath("photo_voluteer")."', 
                                age='$age', sex='$sex'";
                              $newQuery = mysqli_query($conn, $insertNews)or die(mysqli_error());
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
 ?>
</body>
</html>