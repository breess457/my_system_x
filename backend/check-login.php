<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php

    session_start();
    include_once("../function/config.php");
    include_once("../function/link.php");


    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$email' && passwd='$password'";
     $que = mysqli_query($conn,$sql) or die(mysqli_error());
     $num = mysqli_num_rows($que);
    if(!$num){
        echo "
        <script type=\"text/javascript\">
            Swal.fire({
                icon: 'error',
                title: 'ล้มเหลว',
                text: 'อีเมลหรื่อรหัสผ่านไม่ถูกต้อง โปรดล็อคอินอีกครั้ง',
                showConfirmButton: false,
          }).then(()=>{
              window.location = '../index.php';
          })
        </script>
        ";
    }else{
        $fetch = mysqli_fetch_assoc($que);
        $_SESSION['status_users'] = $fetch['status_users'];
         if($fetch['status_users'] === "admin"){
            $_SESSION['users'] = $fetch;
            echo '
                    <script type="text/javascript">
                        Swal.fire({
                            icon: "success",
                            title: "สวัสดีคุณแอดมิน",
                            text: "เข้าสู่ระบบเรียบร้อย",
                            showConfirmButton: false,
                        }).then(()=>{
                            window.location = "../root/"
                        })
                    </script>
                ';
         }else if($fetch['status_users'] === "volunteer"){
              $_SESSION['users'] = $fetch;
                echo '
                    <script type="text/javascript">
                        Swal.fire({
                            icon: "success",
                            title: "สวัสดีคุณเจ้าหน้าที่",
                            text: "เข้าสู่ระบบเรียบร้อย",
                            showConfirmButton: false,
                        }).then(()=>{
                            window.location = "../admin/"
                        })
                    </script>
                ';
         }else if($fetch['status_users'] === "chairman"){
            $_SESSION['users'] = $fetch;
            echo '
                <script type="text/javascript">
                    Swal.fire({
                        icon: "success",
                        title: "สวัสดีท่านประธาน",
                        text: "เข้าสู่ระบบเรียบร้อย",
                        showConfirmButton: false,
                    }).then(()=>{
                        window.location = "../admin/"
                    })
                </script>
            ';
         }else if($fetch['status_users'] === "officer"){
            $_SESSION['users'] = $fetch;
            echo '
                <script type="text/javascript">
                    Swal.fire({
                        icon: "success",
                        title: "สวัสดีคุณอาสาสมัคร",
                        text: "เข้าสู่ระบบเรียบร้อย",
                        showConfirmButton: false,
                    }).then(()=>{
                        window.location = "../officer/"
                    })
                </script>
            ';
         }
    }


?>
</body>
</html>