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
    <link rel="stylesheet" href="../assets/scss/navigationTrue-a-j.scss">
    <link rel="stylesheet" href="../assets/scss/revenue.scss">
    <script src="../assets/scripts/script-bash.js"></script>
    <title>Document admin</title>
    <style>
        .bd-example-modal-xl .modal-dialog{
                max-width: 1100px;
                .modal-content{
                    padding:1rem;
                }
            }
    </style>
</head>
<body class="">
    <div class="page-wrapper chiller-theme toggled">
        <?php
            navigationsbarTrue($fullname,$status);
        ?>
        <main class="page-content mt-0">
            <?php
                navbarSize("ข้อมูลอาสาสมัค(ทั่วไป)",$fullname,$profile)
            ?>
            <div class="container-fluid row">
               
                <div class="col-md-12">
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2 mydataTableFundation">
                            <thead> 
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>รูปภาพ</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>เพศ</th>
                                    <th>อายุ</th>
                                    <th>เบอร์โทรศัพท์</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $showFundationData = mysqli_query($conn,"SELECT * FROM fundation");
                                      foreach($showFundationData as $num=>$res){
                                          $setFullname = join(array($res['title_fundation'],"",$res['firstname_fundation']," ",$res['lastname_fundation']));
                                          $setAddress = join(array($res['homeadress']," ",$res['district']," ",$res['amphoe']," ",$res['province']," ",$res['zipcode']));
                                          listFundation(
                                              ($num+1),$setFullname,$res['sex_fundation'],$res['age_fundation'],$res['email'],$res['tell_fundation'],
                                                $res['cardnumber'],$res['occupation'],$res['workplace'],$res['image_fundation'],$res['id_fundation'],$setAddress
                                          );
                                      }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <main-show-fundation></main-show-fundation>
        </main>
    </div>
    <script>
        $('.mydataTableFundation').DataTable({
            scrollY:400,
            scrollX:false,
            scrollCollapse:true
        })
        const fundationEditApi = (getId, eventFundation)=>{
            fetch(`http://localhost/my_system_x/officer/backend/api/apiget-data-fundation.php?fundation_id=${getId}`,{
                method:"GET",
                headers:{"Content-Type": "application/json; charset=UTF-8",}
            }).then(res => res.json())
            .then(data => { 
                console.log(data)
                eventFundation(data)
            })
            .catch(err => console.log(err))
        }
        class modalShowFundation extends HTMLElement{
            connectedCallback(){
              this.rederShowFundation()
            }
            rederShowFundation(){
              this.innerHTML =`
                <div class="modal fade bd-example-modal-xl" id="modalFundationShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-nanika" id="exampleModalLongTitle">แสดงข้อมูลอาสาสสมัคร</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="backend/crud-fundation.php" method="post" enctype="multipart/form-data">
                                <div class="modal-body row mb-0">
                                    <div class="col-md-9">
                                      <div class="row col-12 mb-3">
                                        <div class="form-group mb-0 mt-0 col-2">
                                            <label class="mb-0 text-dark" for="Showtitlefundation">คำนำหน้า</label>
                                            <input type="text" class="form-control" name="Show_title_fundation" id="Showtitlefundation" disabled>
                                        </div>
                                        <div class="form-group mb-0 mt-0 col-5">
                                          <label class="mb-0 text-dark" for="Showfirstnamefundation">ชื่อ</label>
                                          <input type="text" class="form-control" name="Show_firstname_fundation" id="Showfirstnamefundation" placeholder="ชื่อเต็ม" disabled>
                                        </div>
                                        <div class="form-group mb-0 mt-0 col-3">
                                          <label class="mb-0 text-dark" for="Showlastnamefundation">นามสกุล</label>
                                          <input type="text" class="form-control" name="Show_lastname_fundation" id="Showlastnamefundation" placeholder="นามสกุล" disabled>
                                        </div>
                                        <div class="form-group mb-0 mt-0 col-2">
                                          <label class="mb-0 text-dark" for="Showagefundation">อายุ</label>
                                          <input type="number" class="form-control" name="Show_age_fundation" id="Showagefundation" placeholder="อายุ" disabled>
                                        </div>
                                      </div>
                                      <div class="row col-12 mb-3">
                                        <div class="form-group mb-0 mt-0 col-2">
                                            <label class="mb-0 text-dark" for="Showsexfundation">เพศ</label>
                                            <input type="text" class="form-control" name="Show_lastname_fundation" id="Showsexfundation" placeholder="เพศ" disabled>
                                        </div>
                                        <div class="form-group mb-0 mt-0 col-6">
                                          <label class="mb-0 text-dark" for="Showemailfundation">อีเมล</label>
                                          <input type="email" class="form-control" name="Show_email_fundation" id="Showemailfundation" placeholder="email@exsample.com" disabled>
                                        </div>
                                        <div class="form-group mb-0 mt-0 col-4">
                                          <label class="mb-0 text-dark" for="Showtellfundation">เบอร์โทร</label>
                                          <input type="text" class="form-control" name="Show_tell_fundation" id="Showtellfundation" placeholder="เบอร์โทร" disabled>
                                        </div>
                                      </div>
                                      <div class="col-12 row mb-3">
                                        <div class="form-group mb-0 mt-0 col-4">
                                          <label class="mb-0 text-dark" for="Showcardnumberfundation">เลขบัตรประชาชน</label>
                                          <input type="number" class="form-control" name="Show_cardnumber_fundation" id="Showcardnumberfundation" placeholder="เลขบัตรประชาชน" disabled>
                                        </div>
                                        <div class="form-group mb-0 mt-0 col-4">
                                          <label class="mb-0 text-dark" for="Showoccupationfundation">อาชีพ</label>
                                          <input type="text" class="form-control" name="Show_occupation_fundation" id="Showoccupationfundation" placeholder="อาชีพ" disabled>
                                        </div>
                                        <div class="form-group mb-0 mt-0 col-4">
                                          <label class="mb-0 text-dark" for="Showworkplacefundation">สถานที่ทำงาน</label>
                                          <input type="text" class="form-control" name="Show_workplace_fundation" id="Showworkplacefundation" placeholder="อาชีพ" disabled>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="image w-100">
                                        <img class="set-img" width="200" height="210" />
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-12 pl-3 mt-0">
                                    <div class="row">
                                    <div class="col-4">
                                      <div class="form-group mb-2">
                                        <label for="Show_homeid" class="mb-0 text-dark">ที่อยู่</label>
                                        <input type="text" class="form-control" name="Show_home_id" id="Show_homeid" placeholder="" disabled />
                                      </div>
                                    </div>
                                    <div class="col-2">
                                      <div class="form-group mb-2">
                                          <label class="mb-0">ตำบล</label>
                                          <input name="Show_district" class="form-control" id="ShowDistrict" type="text" disabled>
                                      </div>
                                    </div>
                                    <div class="col-2">
                                      <div class="form-group mb-2">
                                          <label class="mb-0">อำเภอ</label>
                                          <input name="Show_amphoe" class="form-control" id="ShowAmphoe" type="text" disabled>
                                      </div>
                                    </div>
                                    <div class="col-2">
                                      <div class="form-group mb-2">
                                        <label class="mb-0">จังหวัด</label>
                                        <input name="Show_province" class="form-control" id="ShowProvince" type="text" disabled>
                                      </div>
                                    </div>
                                    <div class="col-2">
                                      <div class="form-group mb-2">
                                          <label class="mb-0">รหัสไปรษณีย์</label>
                                          <input name="Show_zipcode" class="form-control" id="ShowZipcode" type="number" disabled>
                                      </div>
                                    </div>
                                    </div>
                                  </div>

            
                            </form>
                        </div>
                    </div> 
                </div>
              `;
            }
        }
        customElements.define('main-show-fundation',modalShowFundation)

         const ShowFundationEvent = (setDatas)=>{
          let selectEl = (el, datas)=> document.getElementById(el).innerHTML = datas
          let inputEl = (el, datax)=> document.getElementById(el).value = datax
        
          return setDatas.map(mapData =>{
              inputEl('Showtitlefundation', mapData.title_fundation)
              inputEl('Showfirstnamefundation', mapData.firstname_fundation)
              inputEl('Showlastnamefundation', mapData.lastname_fundation)
              inputEl('Showagefundation', mapData.age_fundation)
              inputEl('Showsexfundation', mapData.sex_fundation)
              inputEl('Showemailfundation', mapData.email)
              inputEl('Showtellfundation', mapData.tell_fundation)
              inputEl('Showcardnumberfundation', mapData.cardnumber)
              inputEl('Showoccupationfundation', mapData.occupation)
              inputEl('Showworkplacefundation', mapData.workplace)
              inputEl('Show_homeid', mapData.homeadress)
              inputEl('ShowDistrict', mapData.district)
              inputEl('ShowAmphoe', mapData.amphoe)
              inputEl('ShowProvince', mapData.province)
              inputEl('ShowZipcode', mapData.zipcode)
          })
        }

        $(document).on("click","#btnShowdataFundation",function(e){
          let fundationID = $(this).data('id');
          let fundationImage = $(this).data('image')
        
          $("#fundationId").val(fundationID)
          $('.set-img').attr('src',`http://localhost/my_system_x/officer/backend/data/fundation/${fundationImage}`)
          fundationEditApi(fundationID, ShowFundationEvent)
         // e.preventDefault()
        }) 
    </script>
</body>
</html>
<?php
 }

?>