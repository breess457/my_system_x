<?php
include_once('../../../function/config.php');

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");	
 header("Cache-Control: post-check=0, pre-check=0", false);	
  header("Pragma: no-cache");

  if($_SERVER['REQUEST_METHOD'] === "GET"){
    $get_board_id = $_GET['get_board_id'];

     $sql = mysqli_query($conn,"SELECT * FROM board_users b1 LEFT JOIN board_users2_contact b2 ON b1.bord_id = b2.get_boardid
        LEFT JOIN board_users3_school b3 ON b3.get_boardid = b1.bord_id 
        LEFT JOIN board_users4_location_address b4 ON b4.get_boarduser_id = b1.bord_id WHERE bord_id=$get_board_id");
    
    $assoc_fetch = mysqli_fetch_assoc($sql);
    $getdataArr = array();
    $getdataArr[] = $assoc_fetch;
    print json_encode($getdataArr);
    mysqli_close($conn);

  }else{
    print json_encode(array(
        'icons'=> 'error',
        'title'=>'Unsuccessful',
        'msg'=>'not any request method'
    ));
  }
?>