<?php

session_start();
include_once("../function/component.a-j.php");
include_once("../function/config.php");
include_once("../function/link.php");
 if(!isset($_SESSION['users'])){
      echo "
            <script>
                alert('pless your login');
                window.location = '../index.php';
            </script>
        ";
 }else{
    $fullname = $_SESSION['users']['fullname'];
    $profile = $_SESSION['users']['photo'];
    $userid = $_SESSION['users']['id'];
    $status = $_SESSION['users']['status_users'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.20/css/uikit.css">
    <link rel="stylesheet" href="../assets/scripts/module/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css">
    <link rel="stylesheet" href="../assets/scss/navigationTrue-a-j.scss">
    <link rel="stylesheet" href="../assets/scss/revenue.scss">
    <link rel="stylesheet" href="../assets/scripts/module/test/test.scss">
    <script src="../assets/scripts/module/test/test.js"></script>
    <script src="../assets/scripts/script-bash.js"></script>
    <title>Nusantara Patani</title>
    <style>
        .bd-example-modal-xl .modal-dialog{
                max-width: 1100px;
                .modal-content{
                    padding:1rem;
                }
            }
    </style>
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o), m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-33058582-1', 'auto', {
            'name': 'Main'
        });
        ga('Main.send', 'event', 'jquery.Thailand.js', 'GitHub', 'Visit');
    </script>
</head>
<body class="">
    <div class="page-wrapper chiller-theme toggled">
        <?php
            navigationsbarTrue($fullname,$status);
        ?>
        <main class="page-content mt-0">
            <?php
                navbarSize("จัดการข้อมูลผู้ให้ทุน",$fullname,$profile)
            ?>
            <div class="container-fluid row">
                <div class="ml-auto">
                    <?php if($status != "chairman"){ ?>
                    <button class="bd-none au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" 
                        data-target="#newPatronModal"
                    >
                        <i class="fas fa-plus"></i>
                          เพิ่มข้อมูล
                    </button>
                    <?php } ?>
                </div> 
                <div class="col-md-12">
                    <div class="table-responsive table-responsive-data2 mt-2">
                        <table class="table table-data2 mydataTablePatron">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อ สกุล</th>
                                    <th>ที่อยู่</th>
                                    <th>เบอร์โทรศัพท์</th>
                                    <th>อาชีพ</th>
                                    <th>สลิปเงินทุน</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $selectPatron = mysqli_query($conn, "SELECT * FROM patron")or die(mysqli_error());
                                      foreach($selectPatron as $key => $res){
                                          $setFullname = join(array($res['title']," ",$res['f_name'],"   ",$res['l_name']));
                                          $setAddress = join(array($res['number_home']," ",$res['district_t']," ",$res['district_a']," ",$res['district_j']," ",$res['zip_code']));
                                          tablelistPatrons(
                                              ($key+1), $res['id'],$setFullname, $res['id_card'],$setAddress,$res['tell'],$res['career'],
                                              $res['workplace'],$res['img_slip_patron'],$res['f_name'],$status
                                            );
                                      }
                                ?>
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
        </main>
        <main-new-patron></main-new-patron>
        <main-edit-patron></main-edit-patron>
        <modal-show-patron></modal-show-patron>
    </div>
<script src="../assets/scripts/patrons.js"></script>
<script>
    $('.mydataTablePatron').DataTable({
            scrollY:400,
            scrollX:true,
            scrollCollapse:true
        })
</script>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.20/js/uikit.min.js"></script>
<script type="text/javascript" src="../assets/scripts/module/jquery.Thailand.js/jquery.Thailand.js/dependencies/zip.js/zip.js"></script>
<script type="text/javascript" src="../assets/scripts/module/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
<script type="text/javascript" src="../assets/scripts/module/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
<script type="text/javascript" src="../assets/scripts/module/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>
<script>
        $.Thailand({
            database: '../assets/scripts/module/jquery.Thailand.js/jquery.Thailand.js/database/db.json', 

            $district: $('#demo7 [name="distric_a"]'),
            $amphoe: $('#demo7 [name="distric_b"]'),
            $province: $('#demo7 [name="distric_c"]'),
            $zipcode: $('#demo7 [name="distric_e"]'),

            onDataFill: function(data){
                console.info('Data Filled', data);
            },

            onLoad: function(){
                console.info('Autocomplete is ready!');
                $('#loader, .demo').toggle();
            }
        });
        $('#demo7 [name="distric_a"]').change(function(){
            console.log('ตำบล', this.value);
        });
        $('#demo7 [name="distric_b"]').change(function(){
            console.log('อำเภอ', this.value);
        });
        $('#demo7 [name="distric_c"]').change(function(){
            console.log('จังหวัด', this.value);
        });
        $('#demo7 [name="distric_e"]').change(function(){
            console.log('รหัสไปรษณีย์', this.value);
        }); 

        $.Thailand({
            database: '../assets/scripts/module/jquery.Thailand.js/jquery.Thailand.js/database/db.json', 

            $district: $('#demo77 [name="edit_distric_a"]'),
            $amphoe: $('#demo77 [name="edit_distric_b"]'),
            $province: $('#demo77 [name="edit_distric_c"]'),
            $zipcode: $('#demo77 [name="edit_distric_e"]'),

            onDataFill: function(data){
                console.info('Data Filled', data);
            },

            onLoad: function(){
                console.info('Autocomplete is ready!');
                $('#loader, .demo').toggle();
            }
        });
        $('#demo77 [name="edit_distric_a"]').change(function(){
            console.log('ตำบล', this.value);
        });
        $('#demo77 [name="edit_distric_b"]').change(function(){
            console.log('อำเภอ', this.value);
        });
        $('#demo77 [name="edit_distric_c"]').change(function(){
            console.log('จังหวัด', this.value);
        });
        $('#demo77 [name="edit_distric_e"]').change(function(){
            console.log('รหัสไปรษณีย์', this.value);
        }); 
</script>
</body>
</html>
<?php
 }

?>