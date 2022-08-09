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
    <link rel="stylesheet" href="assets/scss/ui-style.u.scss">
    <link rel="stylesheet" href="assets/scss/index.u.scss">
    <title>Document</title>
    <style>
      .nav-menu a:hover, .nav-menu .x2 > a, .nav-menu li:hover > a {
        color: #c8e90c;
        text-decoration: none;
      }
      .mml-6{
          margin-left: 7%;
      }
    </style>
</head>
<body>
    <?php navigationsbarUsers();  ?>
    <main id="main">
        <?php sectionhead("ข้อมูลเด็กกำพร้า") ?>
        <section class="contact">
            <div class="container-fluid">
                <div class="row mml-6">
                    <?php
                        $select = "SELECT * FROM formone_orphan_record T1 LEFT JOIN formtrue_orphan_school T2 ON T1.id_orphan = T2.getid_jion_orphan";
                        $query = mysqli_query($conn, $select);
                         foreach($query as $x=>$res){
                             $setFullname = join(array($res['title_me'],"",$res['first_name_me']," ",$res['last_name_me']));
                             $setAddress = join(array($res['home_id']," ",$res['district_home']," ",$res['province_home']));
                            cardproject($res['id_orphan'],$setFullname,$res['age_me'],$res['blood_group_me'],$setAddress,$res['profile_orphan']);
                         }
                    ?>
                </div>
            </div>
        </section>
        <main-modallogin></main-modallogin>
    </main>
  <script src="assets/scripts/index.u.js"></script>
  <script src="assets/scripts/index.u.js"></script>
</body>
</html>