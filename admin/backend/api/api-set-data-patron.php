<?php
include_once('../../../function/config.php');
date_default_timezone_set("Asia/Bangkok");

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");	
 header("Cache-Control: post-check=0, pre-check=0", false);	
  header("Pragma: no-cache"); 

  if($_SERVER['REQUEST_METHOD'] === "GET"){
    if($_GET['status']==="getdata"){
      $sql = mysqli_query($conn, "SELECT * FROM patron")or die(mysqli_error());
      $numrow = mysqli_num_rows($sql);
        if($numrow > 0){
            $setDataArray = array();
            foreach($sql as $result){
                $setDataArray[] = $result;
            }
            print json_encode($setDataArray);
             mysqli_close($conn);
        }
    }else if($_GET['status']=== "numberCapital"){
        $get_id_orphan = $_GET['get_id_orphan'];
        $setDataArr = array();
        $scholarshipQl = mysqli_query($conn,"SELECT * FROM patron_scholarship t1 LEFT JOIN set_patrons t2 ON t1.id_patrons = t2.setidpatron LEFT JOIN patron t3 ON t2.patron_id = t3.id WHERE id_grantee=$get_id_orphan");
          if(mysqli_num_rows($scholarshipQl) >0){
            foreach($scholarshipQl as $response){
                $setDataArr[] = $response;
            }
            print json_encode($setDataArr);
            mysqli_close($conn);
          }else{
            print json_encode($setDataArr);
          }
    }else{
        print json_encode($_GET['status']);
    }
       
  }else if($_SERVER['REQUEST_METHOD'] === "POST"){
    /* echo $_SERVER['REQUEST_METHOD'];
    print_r($_SERVER); */
    $getPatron_id = $_POST['patronID'];
    $get_amount = $_POST['Amount'];
    $date_capital = date("Y-m-d");
        $insert = "INSERT INTO set_patrons(patron_id,amount,date_capital)VALUES('$getPatron_id','$get_amount','$date_capital')";
          $query = mysqli_query($conn,$insert);
            if($query){
                print json_encode(array(
                    'status'=>200,
                    'icons'=>'success',
                    'title'=>'เรียบร้อย',
                    'text'=>'เพิ่มผู้อุปถัมภ์เก่าเรียบร้อยแล้ว',
                    'id'=>mysqli_insert_id($conn)
                ));
                mysqli_close($conn);
            }else{
                print json_encode(array(
                    'status'=>404,
                    'icons'=>'error',
                    'title'=>'error',
                    'text'=>'error of fontend',
                    'id'=>mysqli_insert_id($conn)
                ));
            }/* 
            echo $get_amount;
            echo $getPatron_id; */
  }
?>