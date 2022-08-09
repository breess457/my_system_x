<?php
include_once('../../../function/config.php');

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");	
 header("Cache-Control: post-check=0, pre-check=0", false);	
  header("Pragma: no-cache");

  if($_SERVER['REQUEST_METHOD'] === "GET"){
      $getpatronID = $_GET['patron_id'];

      $sql = mysqli_query($conn, "SELECT * FROM patron WHERE id=$getpatronID")or die(mysqli_error());
      $fetch_assoc = mysqli_fetch_assoc($sql);
      $getdataArr = array();
      $getdataArr[] = $fetch_assoc;
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