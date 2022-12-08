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
    <title>Delete Grantee Scholarship</title>
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
        if($_SERVER['REQUEST_METHOD'] === "GET"){
            $id_patron = $_GET['id_patron'];
            $idscholarship = $_GET['idscholarship_patron'];
            $person_numbers = $_GET['person_number'];
            $dates = $_GET['dates'];
            $delsql = mysqli_query($conn, "DELETE FROM patron_scholarship WHERE id_scholarship = $idscholarship")or die(mysqli_error());
                if($delsql){
                    echo "<script type=\"text/javascript\">
                              MySetSweetAlert(\"success\",\"เรียบร้อย\",\"ลบข้อมูลเด็กที่ได้รับทุนเรียบร้อยแล้ว\",\"../getting_a_scholarship.php?patron_setid=$id_patron&person_numbers=$person_numbers&datemy=$dates\")
                          </script>";
                    
                } else{
                    echo "error not server defaind massege to get admin now!";
                }
        }else if($_SERVER['REQUEST_METHOD'] === "POST"){
            $getidpatron = $_POST['getidpatron'];
            $getpersonnumber = $_POST['getpersonnumber'];
            $datemy = $_POST['dateme'];
            if(isset($_POST['checkedTrash'])){
                if(!empty($_POST['checkedTrash'])){
                    foreach($_POST['checkedTrash'] as $deletecheckbox){
                        $sqlcheckedtrash = mysqli_query($conn,"DELETE FROM patron_scholarship WHERE id_scholarship=$deletecheckbox")or die(mysqli_error());
                        if($sqlcheckedtrash){
                            $slipt = "<script type=\"text/javascript\">
                                        MySetSweetAlert(\"success\",\"เรียบร้อย\",\"ลบข้อมูลตามที่เลือกเรียบร้อยแล้ว\",\"../getting_a_scholarship.php?patron_setid=$getidpatron&person_numbers=$getpersonnumber&datemy=$datemy\")
                                      </script>";
                        }else{
                            $slipt = "<script type=\"text/javascript\">
                                        MySetSweetAlert(\"error\",\"ล้มเหลว\",\"ระบบมีข้อผิดพลาดไม่สามารถลบข้อมูลตามเลือกได้!\",\"../getting_a_scholarship.php?patron_setid=$getidpatron&person_numbers=$getpersonnumber&datemy=$datemy\")
                                      </script>";
                        }
                    }
                    
                }else{
                    echo '<div>Checkbox is not selected!</div>';
                }
                echo $slipt;
            }else{
                echo "<script type=\"text/javascript\">
                      MySetSweetAlert(\"warning\",\"ลบไม่สำเร็จ!\",\"ไม่มีข้อมูลอะไรให้ลบเลย!\",\"../getting_a_scholarship.php?patron_setid=$getidpatron&person_numbers=$getpersonnumber&datemy=$datemy\")
                    </script>";
            }
        }else{
            echo $_SERVER['REQUEST_METHOD'];
            echo "error none method!";
        }
    ?>
</body>
</html>