
<?php

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "nusantara_patani";

    $conn = new mysqli($host,$user,$password,$db);
        mysqli_set_charset($conn, 'utf8');
         if(!$conn){
             die("not connect !");
         }

?>