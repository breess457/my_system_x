<?php
    include_once("function/link.u.php");
    include_once("function/component.u.php");
    include_once("function/config.php");
    $get_id_article=$_GET['get_id_article'];
    $set_view = $_GET['set_view'] + 1;
    
    $ql_edit = mysqli_query($conn,"UPDATE topnews SET preview_number='$set_view' WHERE id_news=$get_id_article ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/scss/index.u.scss">
    <link rel="stylesheet" href="assets/scss/ui-style.u.scss">
    <title>รายละเอียด ข่าว</title>
    <style>
      .nav-menu a:hover, .nav-menu .x1 > a, .nav-menu li:hover > a {
        color: #c8e90c;
        text-decoration: none;
      }
    </style>
</head>
<body>
    <?php navigationsbarUsers();  ?>
    <main id="main">
        <?php sectionheadDetail_new("รายละเอียดข่าวสาร") ?>
        <section class="pt-5 pb-5">
    <div class="container">
          <div class="row">
            <div class="col-lg-8 mb-4">
                <?php
                    $selectQL = mysqli_query($conn,"SELECT * FROM topnews WHERE id_news=$get_id_article");
                    $fetch = mysqli_fetch_assoc($selectQL);
                ?>
              <img class="img-fluid rounded mb-3"
               style="
                width:800px;height:500px; 
                background-repeat:no-repeat; 
                object-fit:cover; 
                background-attachment:fixed; 
                background-size: cover;" 
               src="admin/backend/data/news/<?php echo $fetch['news_image'] ?>" 
               alt="A guide to building your online presence"
               />
              <a href="#" class="mt-4 h2 text-dark">
                <?php echo $fetch['header_news'] ?>
              </a>
              
              <p class="mt-4">
                <?php echo $fetch['detail_news'] ?>
              </p>
              <div class="d-flex text-small">
                 <span class="text-muted ml-2">เผยแพร่เมื่อ: <?php echo $fetch['set_date'] ?></span>
                 <span class="text-muted ml-4">ประเภทข่าว: <?php echo $fetch['type_news'] ?></span>
                 <span class="text-muted ml-4">จำนวนการเข้าชม: <?php echo $fetch['preview_number'] ?></span>
              </div>
            </div>
            <div class="col-lg-4 ">
             <ul class="list-unstyled">
             <?php
                $query_news = mysqli_query($conn,"SELECT * FROM topnews");
                  foreach($query_news as $i => $res){
             ?>
              <li class="row mb-4">
                <a href="#" class="col-3">
                  <img src="admin/backend/data/news/<?php echo $res['news_image'] ?>"
                     alt="Image" class="rounded img-fluid"
                     style="
                        width:100px;
                        height:100px; 
                        background-repeat:no-repeat; 
                        object-fit:cover; 
                        background-attachment:fixed; 
                        background-size: cover;" 
                  />
                </a>
                <div class="col-9">
                  <a href="#">
                    <h6 class="mb-3 h5 text-dark"><?php echo $res['header_news'] ?></h6>
                  </a>
                  <div class="d-flex text-small">
                    <a href="detail-news.php?get_id_article=<?php echo $res['id_news'] ?>&set_view=<?php echo $res['preview_number'] ?>"
                         class="mr-3">เข้าชม</a>
                    <span class="text-muted ml-1 mr-3"><?php echo $res['set_date'] ?></span>
                  </div>
                </div>
              </li>
             <?php
                  }
             ?>
             </ul>
            </div>
          </div>
        </div>
      </section>
        <main-modallogin></main-modallogin>
    </main>
    <script src="assets/scripts/index.u.js"></script>
    <script src="assets/scripts/main.u.js"></script>
</body>
</html>