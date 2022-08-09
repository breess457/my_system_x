
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
    if($_SERVER['REQUEST_METHOD'] === "GET"){

        echo $_SERVER['REQUEST_METHOD'];

    }else if($_SERVER['REQUEST_METHOD'] === "POST"){

          if(isset($_POST['checkboxId'])){
             if(!empty($_POST['checkboxId'])){

                 foreach($_POST['checkboxId'] as $checkboxs){

                     $project_id = $_POST['projectid'];
                     $date = date("Y-m-d");
                     $sql = "INSERT INTO project_participant(getid_project, getid_participan, entry_date)
                        VALUES('$project_id','$checkboxs','$date')";
                     $queryInsert = mysqli_query($conn, $sql)or die(mysqli_error());

                        if($queryInsert){
                            $slide = "<script type=\"text/javascript\">
                                MySetSweetAlert(\"success\",\"insert to success\",\"insert data orphan to success\",\"../project_participants.php?idx_project=$project_id\")
                            </script>";
                        }else{
                            $slide = "<script type=\"text/javascript\">
                                MySetSweetAlert(\"error\",\"insert to error\",\"false to! not insert data orphan\",\"../project_participants.php?idx_project=$project_id\")
                            </script>";
                        }
                 }

             }else{
                 echo '<div>Checkbox is not selected!</div>';
             }

             echo $slide;
         }else{
            $slide = "<script type=\"text/javascript\">
                MySetSweetAlert(\"warning\",\"not data!\",\"เพิ่มเหี้ยไรของมืงเนียะ ไม่มีเหี้ยอะไรเพิ่มเลย!\",\"../project_participants.php?idx_project=$project_id\")
            </script>";

            echo $slide;
         }
    }
    
 ?>
</body>
</html>