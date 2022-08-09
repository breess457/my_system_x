
<?php
    include_once("function/link.u.php");
    include_once("function/component.u.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/scss/index.u.scss">
    <title>Document</title>
    <style>
      .nav-menu a:hover, .nav-menu .x > a, .nav-menu li:hover > a {
        color: #c8e90c;
        text-decoration: none;
      }
    </style>
</head>
<body id="">

  <?php navigationsbarUsers();  ?>
  <!-- ======= Hero Section ======= -->
   <!-- ======= Hero Section ======= -->
   <section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown text-center ">ยินดีต้อนรับ <span>มูลนิธินูซันตารา</span></h2>
          <p class="animate__animated animate__fadeInUp h5">
            สถานการณ์ความไม่สงบในพื้นที่จังหวัดชายแดนภาคใต้ของไทยตั้งแต่ปี พ.ศ. 2547 จนถึงปัจจุบันส่งผลกระทบต่อทุกฝ่ายโดยเฉพาะประชาชนในพื้นที่ที่ต้องเผชิญกับความสูญเสียทั้งการเสียชีวิตบาดเจ็บพิการสูญเสียอิสรภาพทั้งนี้เหยื่อจากเหตุการณ์ที่ต้องแบกรับความสูญเสียต่อเนื่องและยาวนานนั้นคือสตรีและเด็ก
          </p>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown text-center">มูลนิธินูซันตารา</h2>
          <p class="animate__animated animate__fadeInUp h5">
          จากความเป็นจริงที่เลวร้ายของสุภาพสตรีและเด็กในพื้นที่จังหวัดชายแดนภาคใต้ซึ่งเป็นผลอันเนื่องมาจากเหตุการณ์ความไม่สงบต่างๆทำให้เด็กและสตรีดังกล่าวถูกละเมิดสิทธิทั้งทางด้านร่างกายจิตใจสังคมวัฒนธรรมและจิตวิญญาณด้วยเหตุนี้จึงทำให้มีการรวมกลุ่มกันก่อตั้งเป็น“ เครือข่ายสตรีจังหวัดชายแดนภาคใต้เพื่อสันติภาพ” ในปี พ.ศ. 2551 และต่อมาในวันที่ 29 มกราคม 2553 ได้จดทะเบียนเป็น“ สมาคมสตรีจังหวัดชายแดนภาคใต้เพื่อสันติภาพ” หรือที่รู้จักกันในนาม (DEEP PEACE) <br>
          ปัจจุบันนี้จำนวนเด็กกำพร้าและแม่หม้ายเพิ่มมากขึ้นประกอบกับเรามีโครงการ“ บ้านเด็กกำพร้าซึ่งเป็นการดูแลเด็กกำพร้าในทุกๆด้านโดยเฉพาะในด้านการให้ศึกษาอย่างต่อเนื่องและเรายังมีการเตรียมการเพื่อสร้างโรงเรียนและที่พักสำหรับเด็กกำพร้าเราจึงดำเนินการจดทะเบียนเป็นมูลนิธิเพื่อรองรับโครงการดังกล่าวโดยใช้ชื่อมูลนิธิว่า“ มูลนิธินซันตาราเพื่อสิทธิมนุษยชนและการพัฒนา” หรือ (NUSANTARA) เมื่อวันที่ 23 มีนาคม 2558
          </p>
        </div>
      </div>
      
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown text-center">วัตถุประสงค์</h2>
          <p class="animate__animated animate__fadeInUp h5">
          1.เพื่อปกป้องและคุ้มครองสิทธิมนุษยชนเพื่อคุ้มครองสิทธิเด็กผู้ยากไร้หรือด้อยโอกาส <br>
          2.เพื่อสร้างโอกาสทางการศึกษาเพื่อส่งเสริมการก่อตั้งกลุ่มของเยาวชนในชุมชนสู่การพัฒนาท้องถิ่น <br>
          3.เพื่อเสริมสร้างอาชีพให้กับครอบครัวเด็กกำพร้าและยากจนเพื่อพัฒนาศักยภาพของเด็กกำพร้าและยาก <br>
          4.เพื่อส่งเสริมและรักษาอัตลักษณ์ของคนในพื้นที่ <br>
          4.เพื่อเป็นศูนย์กลางในการประสานงานให้ความช่วยเหลือยากจน
          </p>
        </div>
      </div>
      
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown text-center">วิสัยทัศน์</h2>
          <p class="animate__animated animate__fadeInUp h5">
          ทรัพยากรมนุษย์ต้องได้รับการพัฒนาและคุ้มครองด้านสิทธิและสามารถเข้าถึงโอกาสในด้านต่าง ๆ อย่างเหมาะสม
          </p>
        </div>
      </div>

      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown text-center">พันธะกิจ</h2>
          <p class="animate__animated animate__fadeInUp h5">
         1.สร้างเครือข่ายกับองค์กรต่างๆในพื้นที่และนอกพื้นที่•ประชาสัมพันธ์องค์กรและกิจกรรมต่างๆขององค์กรให้เป็นที่รู้จักผ่านสื่อต่าง ๆ <br>
         2.ให้ความช่วยเหลือเด็กกำพร้าและเด็กด้อยโอกาสทางด้านการศึกษาการเยียวยาสภาพจิตใจและด้านอื่นๆ  <br>
         3.พัฒนาศักยภาพของเด็กกำพร้าและเด็กด้อยโอกาสรวมทั้งคณะทำงาน <br>
         4.พัฒนาหลักสูตรการเรียนการสอนสำหรับเด็กกำพร้า <br>
         5.สร้างความมั่นคงทางการเงินให้กับองค์กรอย่างยั่งยืน <br>
          </p>
        </div>
      </div>

      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown text-center">ต้องการความช่วยเหลือ</h2>
          <p class="animate__animated animate__fadeInUp h5">
          1.เงินสมทบทุนให้ความช่วยเหลือเด็กกำพร้าและยากจนเพื่อการเลี้ยงชีพและเป็นทุนการศึกษา <br>
          2.เงินสมทบทุนเพื่อก่อสร้างอาคารเรียนและหอพักเด็กกำพร้า <br>
          3.อุปกรณ์เครื่องใช้ในสำนักงานและในชีวิตประจำวันของเด็กกำพร้าและยากจน <br>
          </p>
        </div>
      </div>


      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </section><!-- End Hero -->
  <main-modallogin></main-modallogin>
 
  <script src="assets/scripts/index.u.js"></script>
  <script src="assets/scripts/main.u.js"></script>
</body>
</html>