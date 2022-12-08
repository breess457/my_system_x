<?php
    include_once("function/link.u.php");
    include_once("function/component.u.php");
    include_once("function/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/scss/index.u.scss">
    <link rel="stylesheet" href="assets/scss/ui-style.u.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Document</title>
    <style>
      .nav-menu a:hover, .nav-menu .x3 > a, .nav-menu li:hover > a {
        color: #c8e90c;
        text-decoration: none;
      }
      .bd-example-modal-xl .modal-dialog{
          max-width: 1300px;
          .modal-content{
              padding:0;
          }
      }
      .modal-content {
          border-radius: 1rem
      }

      .modal-content:hover {
          box-shadow: 2px 2px 2px black
      }
      .modal-content .row{
        margin:0;
        padding:0
      }
      .modal-content .row .card-block {
        font-size: 1em;
        position: relative;
        margin: 0;
        padding: 1em;
        border: none;
        
        box-shadow: none;

     }
     .modal-content .row .card {
         font-size: 1em;
         overflow: hidden;
         padding: 0;
         border: none;
         border-radius: .28571429rem;
         box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
         margin-top:0;
     }
     .modal-content .row .card .getimg{
        margin:0;
        padding:0;
        width:100%;
        height: 270px;
      }
      .modal-content .row .card .card-img span{
        position: absolute;
        top: 15%;
        left: 12%;
        background: #1ABC9C;
        padding: 6px;
        color: #fff;
        font-size: 12px;
        border-radius: 4px;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        -ms-border-radius: 4px;
        -o-border-radius: 4px;
        transform: translate(-50%,-50%);
      }
      .modal-content .row .card .card-img h4{
        font-size: 12px;
        margin:0;
        padding:10px 5px;
        line-height: 0;
      }
      .modal-content .row .recent-articles{
        background-color: #eee;
        height: 100%;
        width:100%;
      }
      .modal-content .row .recent-articles-list {
        max-height: 16rem;
        overflow-y: auto;
      }
      .modal-content .row .recent-articles-list .list{
        margin:0;
        padding:0;
      }
      .modal-content .row .recent-articles-list .list li {
          list-style: none;
          padding: 10px;
          border: 1px solid #e3dada;
          margin-top: 12px;
          border-radius: 5px;
          background: #fff;
          box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
      }
      

    </style>
</head>
<body>
    <?php navigationsbarUsers();  ?>
    <main id="main">
        <?php sectionhead("ข้อมูลโครงการ") ?>
        <section class="">
            <div class="container-fluid">
                <div class="row">
                    <?php 
                        $selectdata = mysqli_query($conn,"SELECT * FROM project LEFT JOIN fundation ON project.select_fundation_id = fundation.id_fundation");
                          foreach($selectdata as $i => $get){
                            $setID = $get['id'];
                            $setSpeseX = mysqli_query($conn,"SELECT getid_project FROM project_participant WHERE getid_project=$setID");
                            $num_row_spesex = mysqli_num_rows($setSpeseX);
                            $setprojectadministater = join(array($get['title_fundation'],"",$get['firstname_fundation']," ",$get['lastname_fundation']));
                                newsblogcard($get['id'],1,$get['project_name'],$get['detail_project'],$get['operating_area'],
                                $get['img_project'],$get['start_date'],$get['end_date'],$setprojectadministater,$num_row_spesex);
                          }
                    ?>
                </div>
            </div>
        </section> 
        <main-modallogin></main-modallogin>
        <main-auther-data></main-auther-data>
    </main>
  <script src="assets/scripts/index.u.js"></script>
  <script src="assets/scripts/index.u.js"></script>
  <script src="assets/scripts/project-about.u.js"></script>
</body>
</html>