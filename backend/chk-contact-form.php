<?php
    include_once('../function/config.php');
    include_once('../function/link.u.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD Contact</title>
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
           window.location = '../appel.php'
      })
  }
</script>
  <?php
        date_default_timezone_set("Asia/Bangkok");
        function setImgpath($nameImg){
            $ext = pathinfo(basename($_FILES[$nameImg]["name"]), PATHINFO_EXTENSION);
              if($ext !=""){
                  $new_img_name = "img_".uniqid().".".$ext;
                  
                  $uploadPath = '../data/appel-orphan/'.$new_img_name;
                  move_uploaded_file($_FILES[$nameImg]["tmp_name"],$uploadPath);
                  $newImage = $new_img_name;
                  
              }else{
                  $newImage = $new_img_name;
              }
              return $newImage;
          }
        $title = $_POST['title'];
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
            $fullname = join(array($title," ",$f_name,"  ",$l_name));
        $tell = $_POST['tell'];
        $date = $_POST['date'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $heading = $_POST['heading'];
        $content = $_POST['content'];
        $post_datenow = date("Y-m-d");
        if($_FILES['img_orphan']['tmp_name']== ""){
            echo "<script type=\"text/javascript\">
                    MySetSweetAlert(\"warning\",\"ไม่สำเร็จ\",\"กรุณาอัปโหลดรูปภาพด้วยครับ\")
                </script>
            ";
        }else{
            $insertData = "INSERT INTO appeal(full_name,phone,date_new,email,address,header_appeal,content_appeal,appel_image,post_datenow)VALUES('$fullname','$tell','$date','$email','$address','$heading','$content','".setImgpath("img_orphan")."','$post_datenow')"; 
                $query_contact = mysqli_query($conn,$insertData)or die(mysqli_error());
                    if($query_contact){
                        echo "<script type=\"text/javascript\">
                                MySetSweetAlert(\"success\",\"เพิ่มข้อมูลเรียบร้อย\",\"\")
                            </script>
                        ";
                    }else{
                        echo "<script type=\"text/javascript\">
                                MySetSweetAlert(\"error\",\"เพิ่มข้อมูลล้มเหลว\",\"มีข้อผิดพลาดไม่สามารถเพิ่มข้อมูลได้ โปรดแจ้งเจ้าหน้าที่\")
                            </script>
                        ";
                    }
        }
  ?>
</body>
</html>