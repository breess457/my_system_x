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
           window.location = '../patrons.php'
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
            $new_date = $_POST['new_date'];
            $end_date = $_POST['end_date'];
            $num_x = $_POST['num_x'];
            $all_manny = $_POST['all_manny'];

            $img = $_FILES['photo_officer']['name'];

            $newsql = "INSERT INTO patron SET title='$title', f_name='$ferst_name', l_name='$last_name', id_card='$card_id',
                number_home='$id_home', district_t='$distric_a', district_a='$distric_b', district_j='$distric_c', zip_code='$distric_e',
                tell='$tell', career='$career', workplace='$workplace', new_date='$new_date', end_date='$end_date', munny='$num_x', all_munny='$all_manny', img_slip_patron='".setImgpath("photo_officer")."' ";

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