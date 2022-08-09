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
        $edit_new_id = $_POST['edit_new_id'];
        $get_img_name = $_POST['get_img_name'];
        $edit_header_news = $_POST['edit_header_news'];
        $edit_detail_news = $_POST['edit_detail_news'];
        $edit_type_news = $_POST['edit_type_news'];
        //e_image_topnews
          if(!$_FILES['e_image_topnews']['name']){
            $sql = "UPDATE topnews SET header_news='$edit_header_news', detail_news='$edit_detail_news',
                type_news='$edit_type_news' WHERE id_news=$edit_new_id";
          }else{
            $sql = "UPDATE topnews SET header_news='$edit_header_news', detail_news='$edit_detail_news',
                type_news='$edit_type_news',news_image='".setImgpath("e_image_topnews")."' WHERE id_news=$edit_new_id";
                unlink('data/news/'.$get_img_name);
          }
                $editQuery = mysqli_query($conn,$sql);
                    if($editQuery){
                        echo "<script>
                            MySetSweetAlert(\"success\",\"เรียบร้อย\",\"แก้ไขข้อมูลเรียบร้อยแล้ว\")
                        </script>";
                    }else{
                        echo "<script>
                            MySetSweetAlert(\"error\",\"ล้มเหลว\",\"ไม่สามารถแก้ไขข้อมูลได้ ติดต่อเจ้าหน้าที่\")
                        </script>";
                    }
      }else if($_SERVER['REQUEST_METHOD'] === "GET"){
            $get_new_id = $_GET['get_new_id'];
            $img_news = $_GET['img_news'];

            $trashQl = mysqli_query($conn,"DELETE FROM topnews WHERE id_news=$get_new_id");
                if($trashQl){
                    unlink('data/news/'.$img_news);
                    echo "<script>
                        MySetSweetAlert(\"success\",\"เรียบร้อย\",\"ลบข้อมูลเรียบร้อยแล้ว\")
                    </script>";
                }else{
                    echo "<script>
                        MySetSweetAlert(\"error\",\"ล้มเหลว\",\"ไม่สามารถลบข้อมูลได้ ติดต่อเจ้าหน้าที่\")
                    </script>";
                }
      }
?>
</body>
</html>