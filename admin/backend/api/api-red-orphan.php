
<?php

include_once('../../../function/config.php');

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");	
 header("Cache-Control: post-check=0, pre-check=0", false);	
  header("Pragma: no-cache");
   date_default_timezone_set("Asia/Bangkok");

   if($_SERVER['REQUEST_METHOD'] === "GET"){
        $getIDproject = $_GET['getIDproject'];
        $Ql = "SELECT * FROM project_participant LEFT JOIN formone_orphan_record 
            ON project_participant.getid_participan = formone_orphan_record.id_orphan WHERE getid_project=$getIDproject";
            $setQuery = mysqli_query($conn, $Ql);
            $set_number_row = mysqli_num_rows($setQuery);
              if($set_number_row > 0){
                    $getDataArr = array();
                    foreach($setQuery as $resData){
                        $getDataArr[] = $resData;
                    }
                    print json_encode($getDataArr);
                    mysqli_close($conn);
              }else{
                  print json_encode($getIDproject);
              }
   }else{
    print json_encode(array(
        'icons'=> 'error',
        'title'=>'none data',
        'msg'=>'not any request method'
    ));
   }

?>