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
    <link rel="stylesheet" href="t.scss">
    
    <title>Document</title>
    <style>
      .nav-menu a:hover, .nav-menu .x5 > a, .nav-menu li:hover > a {
        color: #c8e90c;
        text-decoration: none;
      }
    </style>
</head>
<body>
    <?php navigationsbarUsers();  ?>
    <main id="main">
        <?php sectionhead("บุคลากร") ?>
        <section class="blog" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
            <div class="container-fluid">
                <div class="row">
                    <?php 
                       $getdata = mysqli_query($conn,"SELECT * FROM users
                                    LEFT JOIN personal_user ON users.id = personal_user.get_userid");
                        foreach($getdata as $num =>$res){
                            $setFname = join(array($res['title'],$res['first_name']," ",$res['last_name']));
                            fnOurTeam($setFname,$res['photo_me'],$res['username'],$res['sex'],$res['age'],$res['status_users'],$res['tell'],$res['id']);
                        }
                        
                    ?>
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