
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
           window.location = '../expenses.php'
      })
  }
</script>
 <?php
    date_default_timezone_set("Asia/Bangkok");

    function setImgpath($nameImg){
      $ext = pathinfo(basename($_FILES[$nameImg]["name"]), PATHINFO_EXTENSION);
        if($ext !=""){
            $new_img_name = "img_".uniqid().".".$ext;
            
            $uploadPath = 'data/expenses/'.$new_img_name;
            move_uploaded_file($_FILES[$nameImg]["tmp_name"],$uploadPath);
            $newImage = $new_img_name;
            
        }else{
            $newImage = $new_img_name;
        }
        return $newImage;
    }

    $check_status = $_POST['status'];

    if($check_status === "update"){

        $expensesId = $_POST['expensesId'];
        $Expenses_name = $_POST['Expenses_name'];
        $Edetail = $_POST['Edetail'];
        $Eamount = $_POST['Eamount'];
        $expensesSlip = $_POST['expensesSlip'];
        if($_FILES['Eevidence_slip']['tmp_name'] == ""){
            $edit = "UPDATE expenses SET expenses_name='$Expenses_name',details='$Edetail',amount='$Eamount'
            WHERE expenses_id='$expensesId'";
        }else{
            $edit = "UPDATE expenses SET expenses_name='$Expenses_name',details='$Edetail',amount='$Eamount',
            evidence_slip='".setImgpath("Eevidence_slip")."' WHERE expenses_id='$expensesId'";
            $ulfiless = "data/expenses/".$expensesSlip;
            unlink($ulfiless);
        }
        $query_edit = mysqli_query($conn, $edit);
            if($query_edit){
                echo "<script type=\"text/javascript\">
                    MySetSweetAlert(\"success\",\"แก้ไขข้อมูลเรียบร้อย\",\"\")
                </script>";
            }else{
                echo "<script type=\"text/javascript\">
                    MySetSweetAlert(\"error\",\"เกิดข้อผิดพลาด\",\"เกิดข้อผิดพลาด มีบางอย่างขัดข้อง ติดต่อผู้พัฒนา\")
                </script>";
            }

    }else if(isset($_GET['status'])== "delete"){
        $expens_id = $_GET['ex_id'];
        $img_slip = $_GET['img_slip'];
        echo $expens_id;

        $trash = "DELETE FROM expenses WHERE expenses_id = $expens_id";
        $query_del = mysqli_query($conn, $trash);
         if($query_del){
             $ulfile = "data/expenses/".$img_slip;
             unlink($ulfile);

             echo "<script type=\"text/javascript\">
                    MySetSweetAlert(\"success\",\"ลบข้อมูลเรียบร้อย\",\"\")
                </script>";
         }else{
             echo "<script type=\"text/javascript\">
                    MySetSweetAlert(\"error\",\"เกิดข้อผิดพลาด\",\"เกิดข้อผิดพลาด มีบางอย่างขัดข้อง ติดต่อผู้พัฒนา\")
                </script>";
         }
    }else if($check_status === "create"){
        $revenue_name = $_POST['expenses_name'];
        $detail = $_POST['detail'];
        $amount = $_POST['amount'];
        $date = date("Y-m-d");
        $year = date('Y');
        if(!$_FILES["evidence_slip"]["name"]){
            echo "<script type=\"text/javascript\">
                MySetSweetAlert(\"error\", \"ไม่มีหลักฐาน\",\"ไม่มี หลักฐาน สลิป กรุณาเพิ่ม สลิป เพื่อเป็นหลักฐานด้วย\");
            </script>";
        }else{
            $insert = "INSERT INTO expenses(expenses_name,details,date_y_m_d,amount,evidence_slip,years)
                VALUES('$revenue_name','$detail','$date','$amount','".setImgpath("evidence_slip")."','$year')";

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
        //echo $revenue_name, "<br />", $detail, "<br />", $amount, "<br />", $date;
    }
 ?>
</body>
</html>