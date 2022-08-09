<?php

include_once('../../function/config.php');

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");	
 header("Cache-Control: post-check=0, pre-check=0", false);	
  header("Pragma: no-cache");
   date_default_timezone_set("Asia/Bangkok");

   if($_SERVER['REQUEST_METHOD'] === "GET"){

       $getProjectId = $_GET['get_id_project'];
        $errArr = array();
       $selectSQL = mysqli_query($conn, "SELECT * FROM project_participant WHERE getid_project = '$getProjectId' ")or die(mysqli_error());
        $set_num = mysqli_num_rows($selectSQL);
          if($set_num > 0){
 
            $getDataArr = array();
              foreach($selectSQL as $reqdata){
                  $getDataArr[] = $reqdata;
              }
              print json_encode($getDataArr);
               mysqli_close($conn);
          }else{
                $errArr[] = 1;
              print json_encode($errArr);
          }
   }else{
       print json_encode(array(
            'icons'=> 'error',
            'title'=>'Unsuccessful',
            'msg'=>'not any request method'
        ));
   }

?>