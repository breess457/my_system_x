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
    <title>Document</title>
    <style>
        .bd-example-modal-xl .modal-dialog{
                max-width: 1150px;
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
            <?php navbarOfficer("จัดการข้อมูลอาสาสมัคร(ทั่วไป)") ?>
            <div class="container-fluid row">
                <div class="ml-auto">
                    <button class="bd-none au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" 
                        data-target="#modalFundationform"
                    >
                        <i class="fas fa-plus"></i>
                          เพิ่มข้อมูล
                    </button>
                </div> 
                <div class="col-md-12 mt-4">
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2 datatablefx">
                            <thead> 
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>รูปภาพ</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>เพศ</th>
                                    <th>อายุ</th>
                                    <th>email</th>
                                    <th>เบอร์โทรศัพท์</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $showFundationData = mysqli_query($conn,"SELECT * FROM fundation");
                                      foreach($showFundationData as $num=>$res){
                                          $setFullname = join(array($res['title_fundation'],"",$res['firstname_fundation']," ",$res['lastname_fundation']));
                                          listFundation(
                                              ($num+1),$setFullname,$res['sex_fundation'],$res['age_fundation'],$res['email'],$res['tell_fundation'],
                                                $res['cardnumber'],$res['occupation'],$res['workplace'],$res['image_fundation'],$res['id_fundation']
                                          );
                                      }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <main-add-fundation></main-add-fundation>
            <main-edit-fundation></main-edit-fundation>
            <main-show-fundation></main-show-fundation>
        </main>
    </div>
    <script>
         $('.datatablefx').DataTable({
            scrollY:400,
            scrollX:true,
            scrollCollapse:true
        })
    </script>
    <script src="../assets/scripts/fundation.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.20/js/uikit.min.js"></script>
    <script type="text/javascript" src="../assets/scripts/module/jquery.Thailand.js/jquery.Thailand.js/dependencies/zip.js/zip.js"></script>
    <script type="text/javascript" src="../assets/scripts/module/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
    <script type="text/javascript" src="../assets/scripts/module/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
    <script type="text/javascript" src="../assets/scripts/module/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>
    <script type="text/javascript">
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
    </script>
</body>
</html>
<?php } ?>