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
    <title>Document</title>
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
        <?php sectionhead("ข่าวสาร") ?>
        <section class="blog" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8 entries">
                        <?php 
                            $query_topnews = mysqli_query($conn, "SELECT * FROM topnews LEFT JOIN personal_user ON topnews.id_user_create = personal_user.get_userid");
                                foreach($query_topnews as $x => $req){
                                    $nameuser = join(array($req['first_name'],$req['last_name']));
                                    articerlist($req['news_image'], $req['header_news'], $req['detail_news'], $req['set_date'],$req['preview_number'],$req['type_news'],$req['id_news'],$nameuser);
                                }
                        ?>
                    </div>
                    <div class="col-lg-2">

                    </div>
                </div>
            </div>
        </section>
        <main-modallogin></main-modallogin>
    </main>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  <script src="assets/scripts/index.u.js"></script>
  <script src="assets/scripts/main.u.js"></script>
</body>
</html>