
<?php
    include_once("../../function/link.php");
    include_once("../../function/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script type="text/javascript">
  const MySetSweetAlert =(Icons,Titles,Texts,Location)=>{
      Swal.fire({
          icon: Icons,
          title: Titles,
          text:Texts,
          confirmButtonText:"OK"
      }).then((result)=>{
           window.location = `${Location}`
      })
  }
</script> 

<?php
    date_default_timezone_set("Asia/Bangkok");

    
    function setImgpath($nameImg){
        $ext = pathinfo(basename($_FILES[$nameImg]["name"]), PATHINFO_EXTENSION);
          if($ext !=""){
              $new_img_name = "img_".uniqid().".".$ext;
              
              $uploadPath = 'data/project/' . $new_img_name;
              move_uploaded_file($_FILES[$nameImg]["tmp_name"],$uploadPath);
              $newImage = $new_img_name;
              
          }else{
              $newImage = $new_img_name;
              
          }
          return $newImage;
      }
      function setFilepath($fileName){
        $extfile = pathinfo(basename($_FILES[$fileName]["name"]), PATHINFO_EXTENSION);
          if($extfile !=""){
              $new_file_name = "file_".uniqid().".".$extfile;
              
              $uploadPath = 'data/project/file/' . $new_file_name;
              move_uploaded_file($_FILES[$fileName]["tmp_name"],$uploadPath);
              $newFile = $new_file_name;
              
          }else{
              $newFile = $new_file_name;
              
          }
          return $newFile;
      }
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $checkStatus = $_POST['status'];
        if($checkStatus == "create"){
            $project_id = $_POST['project_id'];
            $project_name = $_POST['project_name'];

            $select_fundation_id = $_POST['select_fundation_id'];
            

            $detail_project = $_POST['detail_project'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $area_of_operation = $_POST['area_of_operation'];
            $year = date('Y');

            $sql = "INSERT INTO project(project_name,select_fundation_id,detail_project,operating_area,project_year,start_date,end_date,img_project,filename_project)
                        VALUES('$project_name',$select_fundation_id,'$detail_project','$area_of_operation','$year','$start_date','$end_date','".setImgpath("photo_project")."','".setFilepath("file_project")."')";
            
                $queryInsert = mysqli_query($conn, $sql)or die(mysqli_error());
                  if($queryInsert){
                      $getID = mysqli_insert_id($conn);
                    echo "<script type=\"text/javascript\">
                        MySetSweetAlert(\"success\",\"????????????????????????????????????????????????????????????\",\"?????????????????????????????????????????????????????????????????????????????????????????????????????????\",\"../projects.php\")
                    </script>";
                  }else{
                    echo "<script type=\"text/javascript\">
                        MySetSweetAlert(\"error\",\"????????????????????????????????????\",\"?????????????????????????????????????????????????????????????????????\",\"../projects.php\")
                    </script>";
                  }


        }else if($checkStatus === "edit"){

            $select_editfundation_id = $_POST['select_editfundation_id'];

            $idproject = $_POST['idproject'];
            $editproject_name = $_POST['editproject_name'];
            $editdetail_project = $_POST['editdetail_project'];
            $editstart_date = $_POST['editstart_date'];
            $editend_date = $_POST['editend_date'];
            $editarea_of_operation = $_POST['editarea_of_operation'];
            
                if(!$_FILES['editphoto_project']['name']){
                    if(!$_FILES['edit_file_project']['name']){
                        $editJQl = "UPDATE project SET project_name='$editproject_name',select_fundation_id='$select_editfundation_id',
                            detail_project='$editdetail_project',operating_area='$editarea_of_operation',start_date='$editstart_date',
                            end_date='$editend_date' WHERE id='$idproject'";
                    }else{
                        $editJQl = "UPDATE project SET project_name='$editproject_name',select_fundation_id='$select_editfundation_id',
                            detail_project='$editdetail_project',operating_area='$editarea_of_operation',start_date='$editstart_date',
                            end_date='$editend_date',filename_project='".setFilepath("edit_file_project")."' WHERE id='$idproject'";
                        unlink("data/project/file/". $_POST['filenames']);
                    }
                }else{
                    if(!$_FILES['edit_file_project']['name']){
                        $editJQl = "UPDATE project SET project_name='$editproject_name',select_fundation_id='$select_editfundation_id',
                            detail_project='$editdetail_project',operating_area='$editarea_of_operation',start_date='$editstart_date',
                            end_date='$editend_date',img_project='".setImgpath("editphoto_project")."' WHERE id='$idproject'";
                        unlink("data/project/".$_POST['photoname']);
                    }else{
                        $editJQl = "UPDATE project SET project_name='$editproject_name',select_fundation_id='$select_editfundation_id',
                            detail_project='$editdetail_project',operating_area='$editarea_of_operation',start_date='$editstart_date',
                            end_date='$editend_date',img_project='".setImgpath("editphoto_project")."',filename_project='".setFilepath("edit_file_project")."' WHERE id='$idproject'";
                        unlink("data/project/".$_POST['photoname']);
                        unlink("data/project/file/".$_POST['filenames']);
                    }
                }
                    $queryEditproject = mysqli_query($conn, $editJQl);
                     if($queryEditproject){
                        echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"success\",\"????????????????????????????????????????????????????????????\",\"\",\"../projects.php\")
                        </script>";
                     }else{
                        echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"error\",\"????????????????????????????????????\",\"?????????????????????????????????????????????????????????????????????\",\"../projects.php\")
                        </script>";
                     }
        }
    }else if($_SERVER['REQUEST_METHOD'] == "GET"){
            if($_GET['status'] == "delete"){
                $ex_id = $_GET['ex_id'];
                $image_name = $_GET['image_name'];
                $files_name = $_GET['files_name'];
                    $trashData = mysqli_query($conn,"DELETE FROM project WHERE id=$ex_id");
                      if($trashData){
                        unlink("data/project/".$image_name);
                        unlink("data/project/file/".$files_name);
                         $getIDparticipant = mysqli_query($conn,"SELECT getid_project FROM project_participant WHERE getid_project=$ex_id");
                           $check_row = mysqli_num_rows($getIDparticipant);
                            if($check_row > 0){
                                foreach($getIDparticipant as $key){
                                     $trash_paticipant = mysqli_query($conn,"DELETE FROM project_participant WHERE getid_project=$ex_id");
                                     if(!$trash_paticipant){
                                        echo "error ][ ?????? id ???????????????????????????????????????????????????";
                                     }
                                }
                            }
                        echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"success\",\"????????????????????????????????????????????????????????????????????????\",\"\",\"../projects.php\")
                        </script>";
                      }else{
                        echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"error\",\"?????????????????????\",\"?????????????????????????????????????????????????????????????????????????????????????????????????????????\",\"../projects.php\")
                        </script>";
                      }
            }
    }
?>

</body>
</html>