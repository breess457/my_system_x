<?php
include_once('../../../function/config.php');

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");	
 header("Cache-Control: post-check=0, pre-check=0", false);	
  header("Pragma: no-cache");

  if($_SERVER['REQUEST_METHOD'] === "GET"){
    if($_GET['status']=="allApi"){
      $allApi = mysqli_query($conn,"SELECT * FROM fundation")or die(mysqli_error());
       $setnum_allapi = mysqli_num_rows($allApi);
          if($setnum_allapi > 0){
            $getall_array = array();
              foreach($allApi as $resdata){
                $getall_array[] = $resdata;
              }
              print json_encode($getall_array);
              mysqli_close($conn);
          }else{
            print json_encode($_GET['status']);
          }
    }else{
      $ApifundationId = $_GET['fundation_id'];
      $sqlApi = mysqli_query($conn,"SELECT * FROM fundation WHERE id_fundation=$ApifundationId")or die(mysqli_error());
       $setnum_api = mysqli_num_rows($sqlApi);
          if($setnum_api > 0){
              $getData_array = array();
               foreach($sqlApi as $reqData){
                   $getData_array[] = $reqData;
               }
               print json_encode($getData_array);
               mysqli_close($conn);
          }else{
              print json_encode($ApifundationId);
          }
    }
  }else{
    print json_encode(array(
        'icons'=> 'error',
        'title'=>'Unsuccessful',
        'msg'=>'not any request method'
    ));
  } 
?>