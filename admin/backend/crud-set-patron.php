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
           window.location = '../setPatrons.php'
      })
  }
</script>
<?php
date_default_timezone_set("Asia/Bangkok");
function setImgpath($nameImg){
  $ext = pathinfo(basename($_FILES[$nameImg]["name"]), PATHINFO_EXTENSION);
    if($ext !=""){
        $new_img_name = "img_".uniqid().".".$ext;
        
        $uploadPath = 'data/patrons/slipt-patron/'.$new_img_name;
        move_uploaded_file($_FILES[$nameImg]["tmp_name"],$uploadPath);
        $newImage = $new_img_name;
        
    }else{
        $newImage = $new_img_name;
        
    }
    return $newImage;
}
  if($_SERVER['REQUEST_METHOD']==="POST"){
    if($_POST['status'] === "CREATE"){
        $select_patron_id = $_POST['select_patron_id'];
        $scholarship_amount = $_POST['scholarship_amount'];
        $total_money = $_POST['total_money'];
        $person_number = $_POST['person_number'];
        $patron_day = $_POST['patron_day'];
        $date_catocal = date('Y-m-d');
         $setQl = "INSERT INTO set_patrons(patron_id,scholarship_amount,total_money,patron_day,person_number,date_capital,slip_image_patronset)
            VALUES('$select_patron_id','$scholarship_amount','$total_money','$patron_day',$person_number,'$date_catocal','".setImgpath("slipt_patron_img")."')";
            $queryQlt = mysqli_query($conn,$setQl);
            if($queryQlt){
              echo "<script type=\"text/javascript\">
                       MySetSweetAlert(\"success\",\"เรียบร้อย\",\"จัดการข้อมูลผู้ให้ทุนเรียบร้อยแล้ว\")
                    </script>";
            }else{
              echo "<script type=\"text/javascript\">
                     MySetSweetAlert(\"error\",\"ล้มเหลว\",\"ล้มเหลวในจัดการข้อมูลผู้ให้ทุน ติดต่อเจ้าหน้าที่\")
                  </script>";
            }
    }
  }else if($_SERVER['REQUEST_METHOD']==="GET"){
    if($_GET['status'] === "delete"){
      
      $patron_id = $_GET['patron_id'];
      $patron_img = $_GET['patron_img'];
              $trashPatron = mysqli_query($conn,"DELETE FROM set_patrons WHERE setidpatron=$patron_id");
                    if($trashPatron){
                        unlink('data/patrons/slipt-patron/'.$patron_img);
                        $get_data_scolar = mysqli_query($conn,"SELECT id_patrons FROM patron_scholarship WHERE id_patrons=$patron_id");
                          $row = mysqli_num_rows($get_data_scolar);
                            if($row > 0){
                                foreach($get_data_scolar as $res){
                                    $trash_scolar = mysqli_query($conn,"DELETE FROM patron_scholarship WHERE id_patrons=$patron_id");
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
  }
?>
</body>
</html>