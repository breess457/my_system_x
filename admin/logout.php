<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nusantara Patani</title>
</head>

<body>

    <?php
    include('../function/link.php');
    session_start();
    session_destroy();
    echo "
        <script>
            Swal.fire({
               icon:\"success\",
               title:\"ออกจากระบบสำเร็จ\",
               text:'ออกจากระบบ เรียบร้อย',
               showConfirmButton: false,
           }).then((result)=>{
                window.location ='../index.php'
            
           })
        </script>
    ";

    ?>
</body>

</html>