<?php 

    session_start();
    session_destroy();
    echo "
        <script>
            alert('ออกจากระบบ เรียบร้อย');
            window.location = '../index.php';
        </script>
    ";

?>