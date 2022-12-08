<?php
include_once('../../../function/config.php');
date_default_timezone_set("Asia/Bangkok");

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");	
 header("Cache-Control: post-check=0, pre-check=0", false);	
  header("Pragma: no-cache"); 
  if($_SERVER['REQUEST_METHOD'] === "GET"){
    if($_GET['status'] === "SELECT"){
        $set_sql = mysqli_query($conn,"SELECT * FROM map_location_orphan t1 LEFT JOIN formone_orphan_record t2 ON t1.get_orphan_id = t2.id_orphan LEFT JOIN formtrue_orphan_school t3 ON t1.get_orphan_id = t3.getid_jion_orphan");
         $setArr = array();
           while($res = mysqli_fetch_array($set_sql)){
             $map_id = $res["map_id"];
             $latitude = $res["latitude"];
             $logitude = $res["logitude"];
             $get_orphan_id = $res["get_orphan_id"];
             $fullname = join(array($res["title_me"],$res["first_name_me"],"  ",$res["last_name_me"]));
             $address = join(array($res["home_id"]," ",$res["district_home"]," ",$res["amphoe_home"]," ",$res["province_home"]," ",$res["zipcode_home"]));
             $image = $res["profile_orphan"];
             $arr = array();
             $arr["map_id"] = $map_id;
             $arr["latitude"] = $latitude;
             $arr["logitude"] = $logitude;
             $arr["get_orphan_id"] = $get_orphan_id;
             $arr["fullname"] = $fullname;
             $arr["image_orphan"] = $image;
             $arr["location_orphan"] = $address;
             array_push($setArr,$arr);
           }
           print json_encode($setArr);
    }else if($_GET['status'] === "DELETE"){

    }else{
        print json_encode($_GET['status']);
    }
  }else if($_SERVER['REQUEST_METHOD'] === "POST"){
    $orphanid = $_POST['orphanid'];
    $latitude = $_POST['latitude'];
    $logitude = $_POST['logitude'];

    $editQl = "UPDATE map_location_orphan SET latitude=$latitude,logitude=$logitude WHERE get_orphan_id=$orphanid";
     $querymapQl = mysqli_query($conn,$editQl)or die(mysqli_error());
       
      if($querymapQl){
        echo  json_encode(array(200));
      }else{
        echo "error";
      }
    /* $postArr = array();
    $arrpost = array();
    $arrpost["orphanid"] = $orphanid;
    $arrpost["latitude"] = $latitude;
    $arrpost["logitude"] = $logitude;
    array_push($postArr,$arrpost);
    print json_encode($postArr); */

  }
?>