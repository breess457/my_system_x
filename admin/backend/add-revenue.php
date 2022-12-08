
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
           window.location = '../revenue.php'
      })
  }
</script>
 <?php
    date_default_timezone_set("Asia/Bangkok");

    function setImgpath($nameImg){
      $ext = pathinfo(basename($_FILES[$nameImg]["name"]), PATHINFO_EXTENSION);
        if($ext !=""){
            $new_img_name = "img_".uniqid().".".$ext;
            
            $uploadPath = "data/revenue/".$new_img_name;
            move_uploaded_file($_FILES[$nameImg]["tmp_name"],$uploadPath);
            $newImage = $new_img_name;
            
        }else{
            $newImage = $new_img_name;
        }
        return $newImage;
    }

        if($_SERVER['REQUEST_METHOD'] === "POST"){
            if($_POST['status'] === "update"){
                $ErevenueId = $_POST["revenueId"];
                $Erevenue_name = $_POST['Erevenue_name'];
                $Edetail = $_POST['Edetail'];
                $Eamount = $_POST['Eamount'];
                $Eslip = $_POST['revenueSlip'];
                $edit_user_id = $_POST['edit_user_id'];
                $edit_funder = $_POST['edit_funder'];
                if($_FILES['Eevidence_slip']['tmp_name'] == ""){
                    $sql = "UPDATE re_venue SET revenue_name='$Erevenue_name',details='$Edetail',amount='$Eamount',id_user='$edit_user_id',funder='$edit_funder'
                     WHERE revenue_id='$ErevenueId'";
                }else{
                    $sql = "UPDATE re_venue SET revenue_name='$Erevenue_name',details='$Edetail',amount='$Eamount',
                     evidence_slip='".setImgpath("Eevidence_slip")."',id_user='$edit_user_id',funder='$edit_funder' WHERE revenue_id='$ErevenueId'";
                     if($Eslip != ''){
                         unlink("data/revenue/".$Eslip);
                     }
                }
                $edit_query = mysqli_query($conn, $sql)or die(mysqli_error());
                    if($edit_query){
                        echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"success\",\"แก้ไขข้อมูลเรียบร้อย\",\"\")
                        </script>";
                    }else{
                        echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"error\",\"เกิดข้อผิดพลาด\",\"เกิดข้อผิดพลาด มีบางอย่างขัดข้อง ติดต่อผู้พัฒนา\")
                        </script>";
                    }
            }else if($_POST['status'] === "create"){
                $revenue_name = $_POST['revenue_name'];
                $detail = $_POST['detail'];
                $amount = $_POST['amount'];
                $getuser_id = $_POST['user_id'];
                $funder = $_POST['funder'];
                $date = date("Y-m-d");
                $year = date('Y');
                if(!$_FILES["evidence_slip"]["name"]){
                    echo "<script type=\"text/javascript\">
                        MySetSweetAlert(\"error\", \"ไม่มีหลักฐาน\",\"ไม่มี หลักฐาน สลิป กรุณาเพิ่ม สลิป เพื่อเป็นหลักฐานด้วย\");
                    </script>";
                }else{
                    $insert = "INSERT INTO re_venue(revenue_name,details,date_y_m_d,amount,evidence_slip,years,id_user,funder)
                        VALUES('$revenue_name','$detail','$date','$amount','".setImgpath("evidence_slip")."','$year','$getuser_id','$funder')";

                    $set_query = mysqli_query($conn, $insert)or die(mysqli_error());
                    if($set_query){
                        echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"success\",\"เพิ่มข้อมูลเรียบร้อย\",\"\")
                        </script>";
                    }else{
                        echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"error\",\"เกิดข้อผิดพลาด\",\"เกิดข้อผิดพลาด มีบางอย่างขัดข้อง ติดต่อผู้พัฒนา\")
                        </script>";
                    }
                }
            }else{
                echo $_SERVER['REQUEST_METHOD'];
            }
        }else if($_SERVER['REQUEST_METHOD'] === "GET"){
            if(isset($_GET['status'])== "delete"){
            
                $revenue_id = $_GET['re_id'];
                $img_slip = $_GET['img_slip'];

                $sqlTrash = "DELETE FROM re_venue WHERE revenue_id='$revenue_id'";
                $query_trash = mysqli_query($conn, $sqlTrash)or die(mysqli_error());
                    if($query_trash){
                        $ulfile = "data/revenue/".$img_slip;
                        unlink($ulfile);
                        echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"success\",\"ลบข้อมูลเรียบร้อย\",\"\")
                        </script>";
                    }else{
                        echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"error\",\"เกิดข้อผิดพลาด\",\"เกิดข้อผิดพลาด มีบางอย่างขัดข้อง ติดต่อผู้พัฒนา\")
                        </script>";
                    }
                
                //echo $revenue_name, "<br />", $detail, "<br />", $amount, "<br />", $date;
            }else{  
                echo "else";
            }
        }else{
            echo $_SERVER['REQUEST_METHOD'];
        }
 ?>
</body>
</html>