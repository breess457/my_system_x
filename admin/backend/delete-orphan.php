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
  const MySetSweetAlert =(Icons,Titles,Texts,Location)=>{
      Swal.fire({
          icon: Icons,
          title: Titles,
          text:Texts,
          confirmButtonText:"OK"
      }).then((result)=>{
           window.location = `${Location}`
      })
  }
</script> 
 <?php
    date_default_timezone_set("Asia/Bangkok");
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $getProjectId = $_POST['getProjectId'];
        if(isset($_POST['checkedTrash'])){
            if(!empty($_POST['checkedTrash'])){
                foreach($_POST['checkedTrash'] as $checkboxTrash){
                    
                    $sqltrash = mysqli_query($conn,"DELETE FROM project_participant WHERE id_project_participant = $checkboxTrash")or die(mysqli_error());
                        if($sqltrash){
                            $slide = "<script type=\"text/javascript\">
                                MySetSweetAlert(\"success\",\"ลบเรียบร้อย\",\"ลบข้อมูลเด็กกำพร้าตามที่เลือกเรียบร้อยแล้ว\",\"../project_participants.php?idx_project=$getProjectId\")
                            </script>";
                        }else{
                            $slide = "<script type=\"text/javascript\">
                                MySetSweetAlert(\"error\",\"ล้มเหลว\",\"มีข้อผิดพลาดในระบบโปรดติดต่อนักพัฒนาโดยด่วน\",\"../project_participants.php?idx_project=$getProjectId\")
                            </script>";
                        }
                }
            }else{
                echo '<div>Checkbox is not selected!</div>';
            }
            echo $slide;
        }else{
            $slide = "<script type=\"text/javascript\">
                MySetSweetAlert(\"warning\",\"ล้มเหลว\",\"เพราะคุณไม่ได้ลบใครเลย!\",\"../project_participants.php?idx_project=$getProjectId\")
            </script>";
            echo $slide;
        }
    }else if($_SERVER['REQUEST_METHOD'] === "GET"){
        $projectgetid = $_GET['projectget_id'];
        $idparticipan_project = $_GET['idparticipan_project'];
            $deletesql = mysqli_query($conn,"DELETE FROM project_participant WHERE id_project_participant = $idparticipan_project")or die(mysqli_error());
                if($deletesql){
                    echo  "<script type=\"text/javascript\">
                                MySetSweetAlert(\"success\",\"เรียบร้อย\",\"ลบผู้เข้าร่วมโครงการตามที่เลือกแล้ว\",\"../project_participants.php?idx_project=$projectgetid\")
                            </script>";
                }else{
                    echo "<script type=\"text/javascript\">
                                MySetSweetAlert(\"error\",\"ล้มเหลว\",\"เกิดข้อผิดพาลดบางอย่างในระบบโปรดติดต่อผู้พัฒนา\",\"../project_participants.php?idx_project=$projectgetid\")
                            </script>";
                }
    }
 ?>
</body>
</html>