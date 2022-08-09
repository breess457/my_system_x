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
    <link rel="stylesheet" href="assets/vendor/php-email-form/validate.js">

    <title>Document</title>
    <style>
      .nav-menu a:hover, .nav-menu .x7 > a, .nav-menu li:hover > a {
        color: #c8e90c;
        text-decoration: none;
      }
    </style>
</head>
<body>
    <?php navigationsbarUsers();  ?>
    <main id="main">
        <?php sectionhead("ติดต่อ") ?>
        <section class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 mt-4">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="info-box">
                            <i class="bx bx-map"></i>
                            <h3>ที่อยู่</h3>
                            <p>133/29 ถ.ผังเมือง 2 ต.สะเตง อ.เมือง จ.ยะลา 95000</p>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="info-box">
                            <i class="bx bx-envelope"></i>
                            <h3>อีเมล</h3>
                            <p>nusantara.ptn@gmai.com</p>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="info-box">
                            <i class="bx bx-phone-call"></i>
                            <h3>โทร</h3>
                            <p>073 720 089</p>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="info-box">
                            <h3>LINE</h3>
                            <p>ID: 073 720 089</p>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <a href="https://www.facebook.com/nusantarapatanii/">
                            <div class="info-box">
                              <h3>facebook</h3>
                              <p>click</p>
                            </div>
                          </a>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-3"> </div>

                </div>
            </div>
        </section>

        <main-modallogin></main-modallogin>
    </main>
  <script src="assets/scripts/index.u.js"></script>
  <script src="assets/scripts/index.u.js"></script>
</body>
</html>