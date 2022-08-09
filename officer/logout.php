<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
               title:\"เรียบร้อย\",
               text:'ออกจากระบบ เรียบร้อย',
               confirmButtonText:\"OK 🏃‍♀️\"
           }).then((result)=>{
                window.location ='../index.php'
            
           })
        </script>
    ";

    ?>
</body>

</html>