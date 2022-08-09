
<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");	
 header("Cache-Control: post-check=0, pre-check=0", false);	
  header("Pragma: no-cache");
   date_default_timezone_set("Asia/Bangkok");
     $currentDay = date("Y-m-d");

    require_once('../../function/config.php');

    if($_SERVER['REQUEST_METHOD'] === "GET"){

        $sqlSet = "SELECT * FROM formone_orphan_record LEFT JOIN formtrue_orphan_school ON formone_orphan_record.id_orphan = formtrue_orphan_school.getid_jion_orphan ";
        $setQuery = mysqli_query($conn, $sqlSet)or die(mysqli_error());
            $num = mysqli_num_rows($setQuery);
                if($num > 0){
                    $dataArray = array();
                     foreach($setQuery as $resData){
                         $dataArray[] = $resData;
                     }
                    print json_encode($dataArray);
                     mysqli_close($conn);
                }else{
                    print json_encode(null);
                }

    }else{
        print json_encode(array(
            'icons'=> 'error',
            'title'=>'Unsuccessful',
            'msg'=>'not any request method'
        ));
    }

?>