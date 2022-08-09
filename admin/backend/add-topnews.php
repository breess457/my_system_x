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
           window.location = `../news.php`
      })
  }
</script> 
<?php
    date_default_timezone_set("Asia/Bangkok");
    function setImgpath($nameImg){
        $ext = pathinfo(basename($_FILES[$nameImg]["name"]), PATHINFO_EXTENSION);
          if($ext !=""){
              $new_img_name = "img_".uniqid().".".$ext;
              
              $uploadPath = 'data/news/'.$new_img_name;
              move_uploaded_file($_FILES[$nameImg]["tmp_name"],$uploadPath);
              $newImage = $new_img_name;
              
          }else{
              $newImage = $new_img_name;
              
          }
          return $newImage;
      }

      if($_SERVER['REQUEST_METHOD'] === "POST"){
          $date = date("Y-m-d");
          $header_news = $_POST['header_news'];
          $detail_news = $_POST['detail_news'];
          $type_news = $_POST['type_news'];
          $iduser_addnews = $_POST['iduser_addnews'];
            $insertNew = "INSERT INTO topnews(header_news,detail_news,type_news,id_user_create,set_date,news_image)
                VALUES('$header_news','$detail_news','$type_news','$iduser_addnews','$date','".setImgpath("image_topnews")."')";
             $newsQuery = mysqli_query($conn,$insertNew);
                if($newsQuery){
                    echo "<script>
                            MySetSweetAlert(\"success\",\"เรียบร้อย\",\"เพิ่มข้อมูลข่าวสารเรียบร้อยแล้ว\")
                        </script>";
                }else{
                    echo "<script>
                            MySetSweetAlert(\"error\",\"ล้มเหลว\",\"ไม่สามารถเพิ่มข้อมูลข่าวสารได้\")
                        </script>";
                }
      }else if($_SERVER['REQUEST_METHOD'] === "GET"){
            echo $_SERVER['REQUEST_METHOD'];
      }
?>
</body>
</html>