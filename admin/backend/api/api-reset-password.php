
<?php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");	
    header("Cache-Control: post-check=0, pre-check=0", false);	
    header("Pragma: no-cache");
include_once('../../../function/config.php');
if($_SERVER['REQUEST_METHOD'] == "GET"){

    $get_id = $_GET['getId'];
    $newPasswords = $_GET['newPasswords'];
        $query_edit_bypassword = mysqli_query($conn,"UPDATE users SET passwd='$newPasswords' WHERE id=$get_id");
          if($query_edit_bypassword){
            print json_encode(array(
                'status'=>200,
                'title'=>'เรียบร้อย',
                'icons'=>'success',
                'text'=>'เปลียนแปลงรหัสผ่านเรียบร้อยแล้ว'
            ));
          }else{
            print json_encode(array(
                'status'=>404,
                'title'=>'update error',
                'icons'=>'error',
                'text'=>'update password to error'
            ));
          }
}else{
    echo json_encode(array(
        'status'=>404,
        'title'=>'update error',
        'icons'=>'error',
        'text'=>$_SERVER['REQUEST_METHOD']
    ));
}

?>