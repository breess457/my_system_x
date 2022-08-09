<?php
include_once('../../../function/config.php');
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");	
 header("Cache-Control: post-check=0, pre-check=0", false);	
  header("Pragma: no-cache");
  if($_SERVER['REQUEST_METHOD'] === "GET"){
    if($_GET['status_user'] === "userplus"){
        $getIdProject = $_GET['project_id'];
        $sql = "SELECT * FROM project_participant LEFT JOIN formone_orphan_record ON formone_orphan_record.id_orphan = project_participant.getid_participan LEFT JOIN formtrue_orphan_school ON formtrue_orphan_school.getid_jion_orphan = project_participant.getid_participan WHERE getid_project=$getIdProject";
            $query = mysqli_query($conn,$sql);
              $nums_row = mysqli_num_rows($query);
               if($nums_row){
                    $getDataArray = array();
                      foreach($query as $setData){
                        $getDataArray[] = $setData;
                      }
                      print json_encode($getDataArray);
                      mysqli_close($conn);
               }else{
                    print json_encode($nums_row);
               }
    }else if($_GET['status_user'] === "usernone"){
        $getIdProjects = $_GET['project_id'];
        $sqlx = mysqli_query($conn,"SELECT getid_project,getid_participan FROM project_participant WHERE getid_project=$getIdProjects");
        $numrows = mysqli_num_rows($sqlx);
         if($numrows){
            $setDataArr = array();
              foreach($sqlx as $res){
                $setDataArr[] = $res['getid_participan'];
              }
              print json_encode($setDataArr);
              mysqli_close($conn);
         }else{
            print json_encode($numrows);
         }
    }
  }
?>
