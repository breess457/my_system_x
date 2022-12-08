
<?php

include_once("../../function/link.php");
include_once('../../function/config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD grantee scholarship</title>
</head>
<body>
<script type="text/javascript">
  const MySetSweetAlert =(Icons,Titles,Texts,location)=>{
      Swal.fire({
          icon: Icons,
          title: Titles,
          text:Texts,
          confirmButtonText:"OK"
      }).then((result)=>{
           window.location = `${location}`
      })
  }
</script>
    <?php
        date_default_timezone_set("Asia/Bangkok");

        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $patronIdfalse = $_POST['patronId'];
            $get_personnumber = $_POST['get_personnumber'];
            $datetical = $_POST['dateticals'];
            if(isset($_POST['checkboxIdgrantee'])){
                if(!empty($_POST['checkboxIdgrantee'])){
                    foreach($_POST['checkboxIdgrantee'] as $checkedId){
                        $patronId = $_POST['patronId'];
                        $entryDate = date("Y-m-d");

                        $insertQl = "INSERT INTO patron_scholarship(id_patrons, id_grantee, entry_date)
                            VALUES('$patronId','$checkedId','$entryDate')";
                        $querysql = mysqli_query($conn, $insertQl)or die(mysqli_error());
                            if($querysql){
                                $slide = "<script type=\"text/javascript\">
                                    MySetSweetAlert(\"success\",\"เรียบร้อย\",\"เพิ่มข้อมูลตามที่เลือกเรียบร้อยแล้ว\",\"../getting_a_scholarship.php?patron_setid=$patronId&person_numbers=$get_personnumber&datemy=$datetical\")
                                </script>";
                            }else{
                                $slide = "<script type=\"text/javascript\">
                                    MySetSweetAlert(\"error\",\"ล้มเหลว\",\"ไม่สามารถเพิ่มข้อมูลตามที่เลือกได้\",\"../getting_a_scholarship.php?patron_setid=$patronId&person_numbers=$get_personnumber&datemy=$datetical\")
                                </script>";
                            }

                        //echo "patronid: ". $patronId ."&nbsp; date: " . $entryDate . "&nbsp; granteeId: " . $checkedId . "<br/>";
                    }
                }else{
                    echo "<div>Checkbox is not selected!</div>";
                }

                echo $slide;
            }else{
                echo "<script type=\"text/javascript\">
                      MySetSweetAlert(\"warning\",\"ล้มเหลว!\",\"ไม่มีข้อมูลอะไรให้เพิ่มเลย!\",\"../getting_a_scholarship.php?patron_setid=$patronIdfalse&person_numbers=$get_personnumber&datemy=$datetical\")
                    </script>";
            }
        }else if($_SERVER['REQUEST_METHOD'] === "GET"){
            

            
        }
    ?>
</body>
</html>