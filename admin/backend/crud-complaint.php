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
    <title>CRYD COMPLAINT</title>
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
           window.location = `../complaint.php`
      })
  }
</script> 
    <?php
        if($_SERVER['REQUEST_METHOD']==="GET"){
            $get_id = $_GET['get_id'];
            $trash_data = mysqli_query($conn,"DELETE FROM appeal WHERE id=$get_id");
              if($trash_data){
                echo "<script>
                        MySetSweetAlert(\"success\",\"เรียบร้อย\",\"ลบข้อมูลเรียบร้อยแล้ว\")
                    </script>";
              }else{
                echo "<script>
                        MySetSweetAlert(\"error\",\"ล้มเหลว\",\"ลบข้อมูลไม่สำเร็จมีข้อผิดพลาด\")
                    </script>";
              }
        }
    ?>
</body>
</html>