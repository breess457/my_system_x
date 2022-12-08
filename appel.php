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
      .nav-menu a:hover, .nav-menu .x6 > a, .nav-menu li:hover > a {
        color: #c8e90c;
        text-decoration: none;
      }
    </style>
</head>
<body>
    <?php navigationsbarUsers();  ?>
    <main id="main">
        <?php sectionhead("แจ้งข้อมูลเด็กกำพร้า") ?>
        <section class="contact">
            <div class="container">
                <div class="row">

                 <div class="col-lg-3"></div>

                    <div class="col-lg-6 mt-4">
                      <form action="backend/chk-contact-form.php" method="post" enctype="multipart/form-data">
                        <h3 class="text-center">แจ้งข้อมูลเด็กกำพร้า</h3>
                        <div class="row">
                          <div class="col-3"></div>
                          <div class="col-6 mb-4">
                            <div class="container">
                                <div class="wrapper" id="btnWrapper">
                                    <div class="image">
                                       <img src="" alt="" class="my-image"> 
                                    </div>
                                    <div class="content">
                                        <div class="icon">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                        </div>
                                        <div class="text">แตะเพื่ออัปโหลด</div>
                                    </div>
                                    <div class="btnCancle">
                                        <i class="fas fa-times"></i>
                                    </div>
                                    <div class="file-name">File name hear</div>
                                </div>
                                <input type="file" name="img_orphan" class="EsetDefaultImgStd" hidden>
                            </div>
                          </div>
                          <div class="col-3"></div>
                          <div class="col-3">
                            <div class="form-group">
                              <div class="form-group">
                                <select class="form-control" name="title">
                                  <option value="นาย">นาย</option>
                                  <option value="นางสาว">นางสาว</option>
                                  <option value="นาง">นาง</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-5">
                            <div class="form-group">
                              <input type="text" name="f_name" class="form-control" placeholder="ชื่อ" required/>
                              <div class="validate"></div>
                            </div>
                          </div>
                          <div class="col-4">
                            <div class="form-group">
                              <input type="text" name="l_name" class="form-control" placeholder="นามสกุล" required/>
                              <div class="validate"></div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <input type="text" name="tell" class="form-control" placeholder="เบอร์โทร" required/>
                              <div class="validate"></div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <input type="date" name="date" class="form-control" placeholder="วันที่/เดือน/ปีเกิด" required/>
                              <div class="validate"></div>
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="form-group">
                              <input type="email" class="form-control" name="email" placeholder="อีเมล" required/>
                              <div class="validate"></div>
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="form-group">
                              <textarea class="form-control" name="address" rows="5" placeholder="ที่อยู๋" required></textarea>
                              <div class="validate"></div>
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="form-group">
                              <input type="text" class="form-control" name="heading" placeholder="หัวข้อ" required/>
                              <div class="validate"></div>
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="form-group">
                              <textarea class="form-control" name="content" rows="5" placeholder="เนื้อหา" required></textarea>
                              <div class="validate"></div>
                            </div>
                          </div>
                          
                        </div>
                        <div class="text-center"><button type="submit" class="btn btn-success">ส่งข้อความ</button></div>
                      </form>
                    </div>

                    <div class="col-lg-3"></div>

                </div>
            </div>
        </section>

        <main-modallogin></main-modallogin>
    </main>
  <script src="assets/scripts/index.u.js"></script>
  <script src="assets/scripts/index.u.js"></script>
  <script>
    let setwrapper = document.querySelector(".wrapper");
      let setImgName = document.querySelector(".file-name");
      let setBtncancle = document.querySelector(".btnCancle");
      let typeImg = document.querySelector(".my-image");
      let defaultInput = document.querySelector(".EsetDefaultImgStd");
      let CustomButton = document.querySelector("#btnWrapper");
      let setExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
  
      CustomButton.onclick = function () {
        defaultInput.click();
      };
      defaultInput.addEventListener("change", function () {
        const file = this.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = function () {
            const result = reader.result;
            typeImg.src = result;
            setwrapper.classList.add("active");
          };
          setBtncancle.addEventListener("click", function () {
            typeImg.src = "";
            setwrapper.classList.remove("active");
          });
          reader.readAsDataURL(file);
        }
        if (this.value) {
          let valueStore = this.value.match(setExp);
          setImgName.textContent = valueStore;
        }
      });
  </script>
</body>
</html>