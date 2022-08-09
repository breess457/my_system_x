<?php 
    session_start();
    include_once("../function/config.php");
    include_once("../function/component-officer.php");
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
    <title>Orphan Informations</title>
    <style>
        .bd-example-modal-xl .modal-dialog{
            max-width: 1220px;
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
<body>
    <div class="page-wrapper chiller-theme toggled">
        <?php   navigationOfiicer($status); ?>
        <main class="page-content mt-0">
            <?php navbarOfficer("ข้อมูลเด็กกำพร้า") ?>
            <div class="container-fluid row">
                <div class="ml-auto">
                    <button class="bd-none au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" 
                        data-target="#modalFormInformation"
                    >
                        <i class="fas fa-plus"></i>
                          เพิ่มข้อมูลเด็กกำพร้า
                    </button>
                </div> 
                <div class="col-md-12">
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>รูปภาพ</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>อายุ</th>
                                    <th>บัตรประชาชน</th>
                                    <th>วันที่เพิ่มข้อมูล</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql_orphan1 = "SELECT * FROM formone_orphan_record t1 LEFT JOIN formfour_status_orphan t4 ON t1.id_orphan =t4.id_join_orphan";
                                    $get_data_orphans_1 = mysqli_query($conn,$sql_orphan1)or die(mysqli_error());
                                    foreach($get_data_orphans_1 as $num => $result) {
                                        $fullname_me = join(array($result['title_me'],$result['first_name_me']," ",$result['last_name_me']));
                                        showDataOrphan(($num+1),$result['profile_orphan'],$fullname_me,$result['age_me'],$result['card_id'],
                                            $result['day_add_record'],$result['id_orphan'],$result['image_home']);
                                    }
                                ?>
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
            <main-create-orphan></main-create-orphan>
        </main>
    </div>
    <script src="../assets/scripts/orphan_information.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.20/js/uikit.min.js"></script>
    <script type="text/javascript" src="../assets/scripts/module/jquery.Thailand.js/jquery.Thailand.js/dependencies/zip.js/zip.js"></script>
    <script type="text/javascript" src="../assets/scripts/module/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
    <script type="text/javascript" src="../assets/scripts/module/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
    <script type="text/javascript" src="../assets/scripts/module/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>
    <script type="text/javascript">
        /******************\
         *     DEMO 1     *
        \******************/ 
        // demo 1: load database from json. if your server is support gzip. we recommended to use this rather than zip.
        // for more info check README.md

        $.Thailand({
            database: '../assets/scripts/module/jquery.Thailand.js/jquery.Thailand.js/database/db.json', 

            $district: $('#demo1 [name="district"]'),
            $amphoe: $('#demo1 [name="amphoe"]'),
            $province: $('#demo1 [name="province"]'),
            $zipcode: $('#demo1 [name="zipcode"]'),

            onDataFill: function(data){
                console.info('Data Filled', data);
            },

            onLoad: function(){
                console.info('Autocomplete is ready!');
                $('#loader, .demo').toggle();
            }
        });
        $('#demo1 [name="district"]').change(function(){
            console.log('ตำบล', this.value);
        });
        $('#demo1 [name="amphoe"]').change(function(){
            console.log('อำเภอ', this.value);
        });
        $('#demo1 [name="province"]').change(function(){
            console.log('จังหวัด', this.value);
        });
        $('#demo1 [name="zipcode"]').change(function(){
            console.log('รหัสไปรษณีย์', this.value);
        });

        $.Thailand({
            database: '../assets/scripts/module/jquery.Thailand.js/jquery.Thailand.js/database/db.json', 

            $district: $('#demo2 [name="district_school"]'),
            $amphoe: $('#demo2 [name="amphoe_school"]'),
            $province: $('#demo2 [name="province_school"]'),
            $zipcode: $('#demo2 [name="zipcode_school"]'),

            onDataFill: function(data){
                console.info('Data Filled', data);
            },

            onLoad: function(){
                console.info('Autocomplete is ready!');
                $('#loader, .demo').toggle();
            }
        });
        $('#demo2 [name="district_school"]').change(function(){
            console.log('ตำบล', this.value);
        });
        $('#demo2 [name="amphoe_school"]').change(function(){
            console.log('อำเภอ', this.value);
        });
        $('#demo2 [name="province_school"]').change(function(){
            console.log('จังหวัด', this.value);
        });
        $('#demo2 [name="zipcode_school"]').change(function(){
            console.log('รหัสไปรษณีย์', this.value);
        });

        $.Thailand({
            database: '../assets/scripts/module/jquery.Thailand.js/jquery.Thailand.js/database/db.json', 

            $district: $('#demo3 [name="district_shool2"]'),
            $amphoe: $('#demo3 [name="amphoe_shool2"]'),
            $province: $('#demo3 [name="province_shool2"]'),
            $zipcode: $('#demo3 [name="zipcode_shool2"]'),

            onDataFill: function(data){
                console.info('Data Filled', data);
            },

            onLoad: function(){
                console.info('Autocomplete is ready!');
                $('#loader, .demo').toggle();
            }
        });
        $('#demo3 [name="district_shool2"]').change(function(){
            console.log('ตำบล', this.value);
        });
        $('#demo3 [name="amphoe_shool2"]').change(function(){
            console.log('อำเภอ', this.value);
        });
        $('#demo3 [name="province_shool2"]').change(function(){
            console.log('จังหวัด', this.value);
        });
        $('#demo3 [name="zipcode_shool2"]').change(function(){
            console.log('รหัสไปรษณีย์', this.value);
        });


    </script>
</body>
</html>
<?php } ?>