<?php

function navigationOfiicer($status){
    $list = "
        <nav id=\"sidebar\" class=\"sidebar-wrapper\">
            <div class=\"sidebar-content\">
                <div class=\"sidebar-brand\">
                    <a href=\"#\" class=\"text-primary\">status $status</a>
                    <div id=\"close-sidebar\">
                        <i class=\"fas fa-times\"></i>
                    </div>
                </div>
                <div class=\"sidebar-header row\">
                        <img src=\"../assets/image/logox.png\" alt=\"logo\" width=\"60\" height=\"55\">
                        &nbsp;<h4 class=\"text-white mt-3\">nusantara ptn</h4>
                </div>
                <div class=\"sidebar-search\">
                  <div>
                    <div class=\"input-group\">
                      <input type=\"text\" class=\"form-control search-menu\" placeholder=\"Search...\">
                      <div class=\"input-group-append\">
                        <span class=\"input-group-text\">
                          <i class=\"fa fa-search\" aria-hidden=\"true\"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class=\"sidebar-menu\">
                    <ul>
                        <li class=\"header-menu\">
                            <span>Menu</span>
                        </li>
                        <li>
                          <a href=\"index.php\">
                              <i class=\"fa fa-tachometer-alt\"></i>
                              <span>หน้าแรก</span>
                          </a>
                        </li>
                        <li>
                          <a href=\"officers.php\">
                              <i class=\"fas fa-users\"></i>
                              <span>ข้อมูลอาสาสมมัค(ทั่วไป)</span>
                          </a>
                        </li>
                        <li>
                          <a href=\"orphan_information.php\">
                            <i class=\"fas fa-user\"></i>
                              <span>ข้อมูลเด็กกำพร้า</span>
                          </a>
                        </li>
                        <li>
                          <a href=\"patrons.php\">
                            <i class=\"fas fa-user\"></i>
                              <span>ข้อมูลผู้อุปถัมท์</span>
                          </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    ";
    echo $list;
}

function navbarOfficer($logo){
    $navList = "
        <nav class=\"navbar navbar-tp navbar-expand-md navbar-dark bg-dark row\">
          <div class=\"container-fluid ml-4\">
              <a id=\"show-sidebar\" class=\"btn btn-primary mt-1\" href=\"#\">
                  <i class=\"fas fa-bars\"></i>
              </a>
              <p class=\"h3 mb-0 text-white text-uppercase d-none d-lg-inline-block font-thi\">$logo</p>
              <div class=\"ml-auto\">
                  <a class=\"nav-link btn btn-outline-success\" href=\"logout.php\">
                    <i class=\"now-ui-icons ui-1_settings-gear-63\"></i>
                    Logout
                  </a>
              </div>
          </div>
        </nav>
    ";
    echo $navList;
}

function navbarSizeTrue($location,$logo, $fullname, $profile){
  $size = "
  
      <nav class=\"navbar navbar-tp fixed-top navbar-expand-md navbar-dark bg-dark row\">
        <div class=\"container\">
            <a href=\"$location\" class=\"btn btn-red btn-sm\" style=\"font-size: 1em;\">
              <i class=\"fas fa-reply mt-0\"></i> &nbsp; back
            </a>
            <div class=\"ml-auto\">
              <p class=\"h3 text-white text-uppercase d-none d-lg-inline-block font-thi\">$logo</p>
            </div>
        </div>
      </nav>

  ";

  echo $size;
}

function setData($titleText, $number, $icons){
    $listData = "
      <div class=\"col-xl-3 col-md-6 mb-4\">
        <div class=\"card border-left-primary shadow h-100 py-2\">
            <div class=\"card-body\">
                <div class=\"row no-gutters align-items-center\">
                    <div class=\"col mr-2\">
                        <div class=\"text-xs font-weight-bold text-primary text-uppercase mb-1\">
                            $titleText
                        </div>
                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">$number</div>
                    </div>
                    <div class=\"col-auto\">
                        <i class=\"$icons fa-2x text-gray-300\"></i>
                    </div>
                </div>
            </div>
        </div>
      </div>";
      echo $listData;
  }

  function showDataOrphan($num,$photo,$fullname,$age,$idCardNumber,$dayaddrecord,$idOrphan,$homeImg){
    $show = "
    <tr class=\"classDataList tr-shadow\">
    <div class=\"set-data\" data-id=\"19\">
      <td>$num</td>
      <td> 
          <div class=\"account-item account-item--style2 clearfix js-item-menu\">
              <div class=\"image\">
                  <img src=\"backend/data/orphan-information/$photo\" alt=\"$photo\" />
              </div>
          </div>
      </td>
      <td  data-abc=\"true\">$fullname</td>
      <td data-abc=\"true\">$age</td>
      <td data-abc=\"true\">$idCardNumber</td>
      <td data-abc=\"true\">$dayaddrecord</td>
  
      <td data-abc=\"true\" width=\"9%\">
          <div class=\"table-data-feature\">
              <a href=\"show-information-orphan.php?get_orphanId=".$idOrphan."\" class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"show\">
                <i class=\"fas fa-address-card\"></i>
              </a>
              <a href=\"#print\" class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"print\">
                <i class=\"fas fa-print\"></i>
              </a>
              <a href=\"backend/edit-show-information-orphan.php?getid_orphan=".$idOrphan."&img_orphan=".$photo."&image_home=".$homeImg."\" class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"print\">
                <i class=\"fas fa-trash\"></i>
              </a>
          </div>
      </td>
    </div>
  </tr>
    ";
    echo $show;
  }

  function showdataInformations(
    $id_orphan,$day_add_record,$title_me,$first_name_me,$last_name_me,$berd_day_me,$age_me,$heigh_me,$weigth_me,$blood_group_me,
    $card_id,$call_me,$siblings_number,$me_number,$profile_orphan,/* end t1 */
    $home_id,$district_home,$amphoe_home,$province_home,$zipcode_home,$school_name,$district_school,$amphoe_school,$province_school,
    $zipcode_school,$school2_name,$district_school2,$amphoe_school2,$province_school2,$zipcode_school2, /* end t2 */
    $fullname_father,$occupation_father,$income_father,$berd_day_father,$age_father,$tell_father,$status_father,
    $fullname_mather,$occupation_mather,$income_mather,$berd_day_mather,$age_mather,$tell_mather,$status_mather,/* end t3 */
    $image_home,$family_status,$level_help,$estimate_help,$revenue_family,$deceased,$cause_death,$death_day,$study_status,
    $year_study,$cause_stop_study
  ){
    $data = "
      <div class=\"student-profile py-4\">
        <div class=\"container-fluid\">
          <div class=\"row\">
            <div class=\"col-lg-3\">
              <div class=\"card shadow-sm mb-4\">
                <div class=\"card-header bg-transparent border-0 row\">
                  <h3 class=\"mb-0 ml-1\"><i class=\"far fa-clone pr-1\"></i>ข้อมูล</h3>
                  <button type=\"button\" class=\"ml-auto mr-2 btn-item\" data-toggle=\"modal\" data-target=\"#modaleditOne\" id=\"editonebtn\"
                          data-id=\"$id_orphan\" data-img=\"$profile_orphan\" data-title=\"$title_me\" data-fname=\"$first_name_me\"
                            data-lname=\"$last_name_me\" data-cardid=\"$card_id\" data-call=\"$call_me\" data-heigh=\"$heigh_me\" 
                       data-weigth=\"$weigth_me\" data-bloodgroup=\"$blood_group_me\" data-berdday=\"$berd_day_me\" data-age=\"$age_me\"
                            data-sibingsnumber=\"$siblings_number\" data-menumber=\"$me_number\"
                  >
                      <i class=\"fas fa-edit\"></i>edit
                    </button>
                </div>
                <div class=\"card-header bg-transparent text-center\">
                  <img class=\"profile_img\" src=\"backend/data/orphan-information/$profile_orphan\" alt=\"student dp\">
                  <h3>$title_me $first_name_me &nbsp; $last_name_me</h3>
                </div>
                <div class=\"card-body\">
                  <p class=\"mb-0\"><strong class=\"pr-1\">ปัตร ประชาชน:</strong>$card_id</p>
                  <p class=\"mb-0\"><strong class=\"pr-1\">เบอร์โทร:</strong>$call_me</p>
                  <p class=\"mb-0\"><strong class=\"pr-1\">ส่วนสูง:</strong>$heigh_me</p>
                  <p class=\"mb-0\"><strong class=\"pr-1\">น้ำหนัก:</strong>$weigth_me</p>
                  <p class=\"mb-0\"><strong class=\"pr-1\">กรุปเลือด:</strong>$blood_group_me</p>
                  <p class=\"mb-0\"><strong class=\"pr-1\">วันเกิด:</strong>$berd_day_me</p>
                  <p class=\"mb-0\"><strong class=\"pr-1\">อายุ:</strong>$age_me</p>
                  <p class=\"mb-0\"><strong class=\"pr-1\">จำนวนพี่น้อง:</strong>$siblings_number คน</p>
                  <p class=\"mb-0\"><strong class=\"pr-1\">เป็นคนที่:</strong>$me_number</p>
                  <div class=\"row\">
                    <small class=\"mb-0 mr-2 ml-auto\"><i class=\"far fa-clock pr-1\"></i>เพิ่มข้อมูลเมื่อ $day_add_record</small>
                  </div>
                </div>
              </div>
              <div class=\"card card2 shadow-sm mt-4\">
                <div class=\"card-header bg-transparent border-0 row\">
                  <h3 class=\"mb-0 ml-1\"><i class=\"fas fa-images pr-1\"></i>รูปบ้าน</h3>
                  <button type=\"button\" class=\"ml-auto btn-item\" data-toggle=\"modal\" data-target=\"#modaleditSeven\" id=\"editsevenbtn\"
                    data-id=\"$id_orphan\" data-homeimage=\"$image_home\"
                  >
                    <i class=\"fas fa-edit\"></i>edit
                  </button>
                </div>
                <div class=\"card-header bg-transparent text-center\">
                  <img class=\"img-home\" src=\"backend/data/orphan-information/$image_home\" alt=\"student dp\">
                </div>
              </div>
            </div>
            <div class=\"col-lg-9\">
              <div class=\"row col-lg-12\">
                <div class=\"card shadow-sm col-lg-5 mr-auto\">
                  <div class=\"card-header bg-transparent border-0 row\">
                    <h3 class=\"mb-0\"><i class=\"far fa-home pr-1\"></i>ที่อยู่</h3>
                    <button type=\"button\" class=\"ml-auto btn-item\" data-toggle=\"modal\" id=\"edittruebtn\" data-target=\"#modaleditTrue\"
                      data-id=\"$id_orphan\" data-homeid=\"$home_id\" data-districthome=\"$district_home\" data-amphoehome=\"$amphoe_home\"
                      data-provincehome=\"$province_home\" data-zipcodehome=\"$zipcode_home\"
                    >
                      <i class=\"fas fa-edit\"></i>edit
                    </button>
                  </div>
                  <div class=\"card-body pt-0\">
                    <table class=\"table table-bordered\">
                      <tr>
                        <th width=\"30%\">บ้านเลขที่</th>
                        <td width=\"2%\">:</td>
                        <td>$home_id</td>
                      </tr>
                      <tr>
                        <th width=\"30%\">ตำบล</th>
                        <td width=\"2%\">:</td>
                        <td>$district_home</td>
                      </tr>
                      <tr>
                        <th width=\"30%\">อำเภอ</th>
                        <td width=\"2%\">:</td>
                        <td>$amphoe_home</td>
                      </tr>
                      <tr>
                        <th width=\"30%\">จังหวัด</th>
                        <td width=\"2%\">:</td>
                        <td>$province_home</td>
                      </tr>
                      <tr>
                        <th width=\"30%\">รหัสไปรษณีย์</th>
                        <td width=\"2%\">:</td>
                        <td>$zipcode_home</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class=\"card shadow-sm col-lg-6 ml-auto\">
                  <div class=\"card-header bg-transparent border-0 row\">
                    <h3 class=\"mb-0\"><i class=\"far fa-home pr-1\"></i>โรงเรียนประถม</h3>
                    <button type=\"button\" class=\"ml-auto btn-item\" data-toggle=\"modal\" id=\"edittreebtn\" data-target=\"#modaleditTree\"
                      data-id=\"$id_orphan\" data-schoolname=\"$school2_name\" data-districtschool=\"$district_school2\" 
                      data-amphoeschool=\"$amphoe_school2\" data-provinceschool=\"$province_school2\" data-zipcodeschool=\"$zipcode_school2\"
                    >
                      <i class=\"fas fa-edit\"></i>edit
                    </button>
                  </div>
                  <div class=\"card-body pt-0\">
                    <table class=\"table table-bordered\">
                      <tr>
                        <th width=\"30%\">ชื่อโรงเรียน</th>
                        <td width=\"2%\">:</td>
                        <td>$school2_name</td>
                      </tr>
                      <tr>
                        <th width=\"30%\">ตำบล</th>
                        <td width=\"2%\">:</td>
                        <td>$district_school2</td>
                      </tr>
                      <tr>
                        <th width=\"30%\">อำเภอ</th>
                        <td width=\"2%\">:</td>
                        <td>$amphoe_school2</td>
                      </tr>
                      <tr>
                        <th width=\"30%\">จังหวัด</th>
                        <td width=\"2%\">:</td>
                        <td>$province_school2</td>
                      </tr>
                      <tr>
                        <th width=\"30%\">รหัสไปรษณีย์</th>
                        <td width=\"2%\">:</td>
                        <td>$zipcode_school2</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class=\"card shadow-sm col-lg-12 mt-2\">
                  <div class=\"card-header bg-transparent border-0 row\">
                    <h3 class=\"mb-0\"><i class=\"far fa-home pr-1\"></i>โรงเรียนมัถยม</h3>
                    <button type=\"button\" class=\"ml-auto btn-item\" data-toggle=\"modal\" data-target=\"#modaleditFour\" id=\"editfourbtn\"
                      data-id=\"$id_orphan\" data-school2=\"$school_name\" data-schooldistrict=\"$district_school\" 
                      data-schoolamphoe=\"$amphoe_school\" data-schoolprovince=\"$province_school\" data-schoolzipcode=\"$zipcode_school\"
                    >
                      <i class=\"fas fa-edit\"></i>edit
                    </button>
                  </div>
                  <div class=\"table-responsive table-responsive-data2\">
                    <table class=\"table table-data2\">
                      <thead>
                        <tr>
                            <th>ชื่อโรงเรียน : $school_name</th>
                            <th>ตำบล : $district_school</th>
                            <th>อำเภอ : $amphoe_school</th>
                            <th>จังหวัด : $province_school</th>
                            <th>รหัสไปรษณีย์ : $zipcode_school</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
                <div class=\"card shadow-sm col-lg-12 mt-2\">
                  <div class=\"card-header bg-transparent row border-0\">
                    <h3 class=\"mb-0\"><i class=\"far fa-home pr-1\"></i>ข้อมูลบิดา-มารดา</h3>
                    <button type=\"button\" class=\"ml-auto btn-item\" data-toggle=\"modal\" data-target=\"#modaleditFive\" id=\"editfivebtn\"
                      data-id=\"$id_orphan\" data-fathername=\"$fullname_father\" data-occupationfather=\"$occupation_father\" data-incomefather=\"$income_father\"
                      data-berddayfather=\"$berd_day_father\" data-agefather=\"$age_father\" data-tellfather=\"$tell_father\" data-statusfather=\"$status_father\"
                      data-mathername=\"$fullname_mather\" data-occupationmather=\"$occupation_mather\" data-incomemather=\"$income_mather\"
                      data-berddaymather=\"$berd_day_mather\" data-agemather=\"$age_mather\" data-tellmather=\"$tell_mather\" data-statusmather=\"$status_mather\"
                    >
                      <i class=\"fas fa-edit\"></i>edit
                    </button>
                  </div>
                  <div class=\"table-responsive table-responsive-data2\">
                    <table class=\"table table-data2\">
                      <thead>
                        <tr>
                            <th>ชื่อ-นามสกุล</th>
                            <th>อาชีพ</th>
                            <th>รายได้ </th>
                            <th>วันเกิด</th>
                            <th>อายุ</th>
                            <th>เบอร์โทร</th>
                            <th>สถานภาพ</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class=\"tr-shadow\">
                          <td width=\"22%\" data-abc=\"true\">$fullname_father</td>
                          <td data-abc=\"true\">$occupation_father</td>
                          <td data-abc=\"true\">$income_father</td>
                          <td data-abc=\"true\">$berd_day_father</td>
                          <td data-abc=\"true\">$age_father</td>
                          <td data-abc=\"true\">$tell_father</td>
                          <td data-abc=\"true\">$status_father</td>
                        </tr>
                        <tr class=\"tr-shadow\">
                          <td width=\"22%\" data-abc=\"true\">$fullname_mather</td>
                          <td data-abc=\"true\">$occupation_mather</td>
                          <td data-abc=\"true\">$income_mather</td>
                          <td data-abc=\"true\">$berd_day_mather</td>
                          <td data-abc=\"true\">$age_mather</td>
                          <td data-abc=\"true\">$tell_mather</td>
                          <td data-abc=\"true\">$status_mather</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              
                <div class=\"card shadow-sm mt-2 col-lg-12\">
                  <div class=\"card-header bg-transparent border-0 row\">
                    <h3 class=\"mb-0\"><i class=\"far fa-clone pr-1\"></i>สถานะความเป็นอยู่</h3>
                    <button type=\"button\" class=\"ml-auto btn-item\" data-toggle=\"modal\" data-target=\"#modaleditSix\" id=\"editsixbtn\"
                      data-id=\"$id_orphan\" data-familystatus=\"$family_status\" data-levelhelp=\"$level_help\" data-estimatehelp=\"$estimate_help\"
                      data-revenuefamily=\"$revenue_family\" data-deceased=\"$deceased\" data-causedeath=\"$cause_death\" data-deathday=\"$death_day\"
                      data-studystatus=\"$study_status\" data-yearstudy=\"$year_study\" data-causestopstudy=\"$cause_stop_study\"
                    >
                      <i class=\"fas fa-edit\"></i>edit
                    </button>
                  </div>
                  <div class=\"card-body row pt-0\">
                      <table class=\"table border-primary table-bordered col-lg-4\">
                        <tr>
                          <th width=\"33%\">สถานะครอบครัว</th>
                          <td width=\"1%\">:</td>
                          <td width=\"33%\">$family_status</td>
                        </tr>
                        <tr>
                          <th width=\"33%\">ระดับความช่วยเหลือ</th>
                          <td width=\"1%\">:</td>
                          <td>$level_help</td>
                        </tr>
                        <tr>
                          <th width=\"33%\">ต้องการความช่วยเหลือ</th>
                          <td width=\"1%\">:</td>
                          <td width=\"33%\">$estimate_help</td>
                        </tr>
                        
                      </table>
                      <table class=\"table table-bordered border-success col-lg-4\">
                        <tr>
                          <th width=\"33%\">รายได้ครอบครัว</th>
                          <td width=\"1%\">:</td>
                          <td width=\"33%\">$revenue_family</td>
                        </tr>
                        <tr>
                          <th width=\"33%\">ผู้เสียชีวิต</th>
                          <td width=\"1%\">:</td>
                          <td>$deceased</td>
                        </tr>
                        <tr>
                          <th width=\"33%\">สาเหตุที่เสียชีวิต</th>
                          <td width=\"1%\">:</td>
                          <td width=\"33%\">$cause_death</td>
                        </tr>
                        
                      </table>
                      <table class=\"table table-bordered border-info col-lg-4\">
                        <tr>
                          <th width=\"33%\">วันที่เสียชีวิต</th>
                          <td width=\"1%\">:</td>
                          <td width=\"33%\">$death_day</td>
                        </tr>
                        <tr>
                          <th width=\"33%\">สถานะการเรียน</th>
                          <td width=\"1%\">:</td>
                          <td>$study_status</td>
                        </tr>
                        <tr>
                          <th width=\"33%\">ปีการศึกษา</th>
                          <td width=\"1%\">:</td>
                          <td width=\"33%\">$year_study</td>
                        </tr>
                        
                      </table>
                      <div class=\"form-group col-lg-12\">
                        <label for=\"exampleFormControlTextarea1\">สาเหตุที่หยุดเรียน</label>
                        <textarea class=\"form-control\" id=\"exampleFormControlTextarea1\" rows=\"3\" readonly>$cause_stop_study</textarea>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    ";
    echo $data;
  }

  function tablelistPatrons ($Pnum, $idpatron, $fullname, $cardID, $address, $tell, $carer, $workplace, $newdate, $enddate, $munny, $allmunny, $imageSlipt){
    $listPatron = "
      <tr>
        <td>$Pnum</td>
        <td>$fullname</td>
        <td>$address</td>
        <td>$tell</td>
        <td>$carer</td>
        <td>
            <div class=\"account-item account-item--style2 clearfix js-item-menu\">
                <div class=\"image\">
                    <img src=\"../admin/backend/data/patrons/$imageSlipt \" alt=\"John Doe\" />
                </div>
            </div>
        </td>
        <td>
            <div class=\"table-data-feature\" >
              <a class=\"item\" data-toggle=\"tootip\" data-placement=\"top\" title=\"Add Data\" href=\"getting_a_scholarship.php?id_patron=".$idpatron." \">
                <i class=\"fas fa-list-alt\"></i>
              </a>
            </div>
        </td>
      </tr>
    ";
    echo $listPatron;
  }

  function showDataScholarshipt($numbar, $idscholarshipt, $photo, $namegrantee, $age, $cardId, $entrydate, $fullAdress){
    $showScholarshipt = "
      <tr class=\"classDataList tr-shadow\">
        <td>$numbar</td>
        <td>
          <div class=\"account-item account-item--style2 clearfix js-item-menu\">
              <div class=\"image\">
                  <img src=\"../officer/backend/data/orphan-information/$photo\" alt=\"\" />
              </div>
          </div>
        </td>
        <td>$namegrantee</td>
        <td>$age</td>
        <td>$fullAdress</td>
        <td>$entrydate</td>
        
      </tr>
    ";
    echo $showScholarshipt;
  }
  function listFundation(
    $numse,$fullnameFundation,$fundationSex,$fundationAge,$fundationEmail,$fundationTell,
    $fundationIdCard,$occupationFundation,$fundationWorkplace,$fundationImg,$fundationId
    ){
      $fundation = "
        <tr class=\"classDataList tr-shadow\">
            <td>$numse</td>
            <td>
              <div class=\"account-item account-item--style2 clearfix js-item-menu\">
                  <div class=\"image\">
                      <img src=\"backend/data/fundation/$fundationImg\" alt=\"\" />
                  </div>
              </div>
            </td>
            <td>$fullnameFundation</td>
            <td>$fundationSex</td>
            <td>$fundationAge</td>
            <td>$fundationEmail</td>
            <td>$fundationTell</td>
            <td>
              <div class=\"table-data-feature\" >
                  <button class=\"item\" type=\"button\" id=\"btndataFundation\" data-toggle=\"modal\" data-target=\"#modalFundationedit\" 
                    data-toggle=\"tooltip\" data-placement=\"edit\" data-id=\"$fundationId\" data-image=\"$fundationImg\"
                  >
                      <i class=\"fas fa-pencil-alt\"></i>
                  </button>
                  <a href=\"backend/crud-fundation.php?id_fundation=$fundationId & image_fundation=$fundationImg & status=delete\" class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Delete\">
                      <i class=\"fas fa-trash-alt\"></i>
                  </a>
              </div>
          </td>
        </tr>
      ";
      echo $fundation;
    }
  

?>