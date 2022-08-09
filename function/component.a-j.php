<?php

function navState($resStatus){
  if($resStatus === "chairman"){
    $ls = "<li class=\"sidebar-dropdown\">
            <a href=\"#\">
                <i class=\"fas fa-users\"></i>
                <span>ข้อมูลบัญชีผู้ใช้</span>
                <span class=\"badge badge-pill badge-success\">2</span>
            </a>
            <div class=\"sidebar-submenu\">
              <ul>
                <li>
                  <a href=\"volunteer.php\">เจ้าหน้าที่</a>
                </li>
                <li>
                  <a href=\"officer.php\">อาสาสมัค</a>
                </li>
              </ul>
            </div>
          </li>";
  }else{
    $ls = "<li class=\"\">
             <a href=\"#\" onClick=\"myAlertState()\">
                 <i class=\"fas fa-users\"></i>
                 <span>ข้อมูลบัญชีผู้ใช้</span>
                 <span class=\"badge badge-pill badge-secondary\">2</span>
             </a>
           </li>
             <script type=\"\">
                const myAlertState =()=>{
                    Swal.fire({
                            icon: \"warning\",
                            title: \"ไม่อนุญาต\",
                            text: \"หน้าเพจนี้ สำหรับประธานเท่านั้น\",
                            showConfirmButton: false,
                        })
                }
            </script>
           ";

  }
  return $ls;
}

function navigationsbarTrue($fullname, $status){
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
                        <span>General</span>
                      </li>
                      <li class=\"sidebar-dropdown\">
                        <a href=\"#\">
                          <i class=\"fa fa-tachometer-alt\"></i>
                          <span>หน้าแรก</span>
                          <span class=\"badge badge-pill badge-warning\">ใหม่</span>
                        </a>
                        <div class=\"sidebar-submenu\">
                          <ul>
                            <li>
                              <a href=\"index.php\">รายงานสถิติ
                                <span class=\"badge badge-pill badge-success\">Pro</span>
                              </a>
                            </li>
                            <li>
                              <a href=\"news.php\">ข่าวสารต่างๆ</a>
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class=\"sidebar-dropdown\">
                        <a href=\"#\">
                            <i class=\"fas fa-database\"></i>
                            <span>จัดการข้อมูลต่างๆ</span>
                            <span class=\"badge badge-pill badge-primary\">5</span>
                        </a>
                        <div class=\"sidebar-submenu\">
                          <ul>
                            <li>
                              <a href=\"orphan_information.php\">จัดการข้อมูลเด็กกำพร้า</a>
                            </li>
                            <li>
                              <a href=\"patrons.php\">จัดการข้อมูลผู้อุปถัมภ์</a>
                            </li>
                            <li>
                              <a href=\"setPatrons.php\">จัดการข้อมูลการอุปถัมภ์</a>
                            </li>
                            <li>
                              <a href=\"complaint.php\">ข้อมูลการร้องเรียน</a>
                            </li>
                            <li>
                              <a href=\"fundation.php\">ข้อมูลอาสาสมัค(ทั่วไป)</a>
                            </li>
                            <li>
                              <a href=\"projects.php\">ข้อมูลโครงการ</a>
                            </li>
                            <li>
                              <a href=\"set_projects.php\">ผู้เข้าร่วมโครงการ</a>
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class=\"sidebar-dropdown\">
                        <a href=\"#\">
                            <i class=\"fab fa-bitcoin\"></i>
                            <span>การเงิน</span>
                            <span class=\"badge badge-pill badge-info\">2</span>
                        </a>
                        <div class=\"sidebar-submenu\">
                          <ul>
                            <li>
                              <a href=\"revenue.php\">รายรับ</a>
                            </li>
                            <li>
                              <a href=\"expenses.php\">รายจ่าย</a>
                            </li>
                          </ul>
                        </div>
                      </li>
                      ".navState($status)."
                      <li class=\"header-menu\">
                        <span>Extra</span>
                      </li>
                      <li>
                        <a href=\"map.php\">
                            <i class=\"fas fa-location-arrow\"></i>
                            <span>แผนที่</span>
                        </a>
                      </li>
                      <li>
                        <a href=\"profile.php\">
                            <i class=\"fas fa-user-circle\"></i>
                            <span>profile</span>
                            <span class=\"badge badge-pill badge-primary\">Beta</span>
                        </a>
                      </li>
                      <li>
                        <a href=\"help.php\">
                            <i class=\"fab fa-hire-a-helper\"></i>
                            <span>help</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                
              </nav>
              
    ";
    echo $list;
}

function navbarSize($logo, $fullname, $profile){
  $size = "
  
      <nav class=\"navbar navbar-tp navbar-expand-md navbar-dark bg-dark row\">
        <div class=\"container-fluid ml-4\">
            <a id=\"show-sidebar\" class=\"btn btn-primary mt-1\" href=\"#\">
                <i class=\"fas fa-bars\"></i>
            </a>
            <p class=\"h3 mb-0 text-white text-uppercase d-none d-lg-inline-block font-thi\">$logo</p>
            <div class=\"ml-auto\">
                <a class=\"nav-link btn btn-outline-success\" href=\"logout.php\">
                  <i class=\"now-ui-icons ui-1_settings-gear-63\"></i>
                  ออกจากระบบ
                </a>
            </div>
        </div>
      </nav>

  ";

  echo $size;
}

function navbarSizeTrue($location,$logo, $fullname, $profile){
  $size = "
  
      <nav class=\"navbar navbar-tp fixed-top navbar-expand-md navbar-dark bg-dark row\">
        <div class=\"container\">
            <a href=\"$location\" class=\"btn btn-red btn-sm\" style=\"font-size: 1em;\">
              <i class=\"fas fa-reply mt-0\"></i> &nbsp; ย้อนกลับ
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
 
function manageState($getmember, $newid,$headerNew,$detailnew,$typenew,$img_news){
  if($getmember == "volunteer"){
  $ms = "
    <button type=\"button\" id=\"btnUpdateTopnews\" data-toggle=\"modal\" data-target=\"#modalEditTopnews\" class=\"btn btn-outline-warning btn-sm mr-2 \"
        data-id=\"$newid\" data-headernews=\"$headerNew\" data-detailnew=\"$detailnew\" data-typenew=\"$typenew\" data-imagenew=\"$img_news\"
    >
        <i class=\"fas fa-edit\"></i> เเก้ไข
     </button>
    <button type=\"button\" id=\"confirmTrash\" data-id=\"$newid\" data-image=\"$img_news\"
      class=\"btn btn-outline-danger btn-sm\"
    >
      <i class=\"fas fa-trash\"></i> ลบ
    </button>
  ";
  }else{
    $ms = "<p class=\"text-danger\">สถานะของคุณสามารถดูได้อย่างเดียว</p>";
  }
  return $ms;
}

function topnewsCard($i, $newsId, $headernews, $detailnews, $typenews, $getdate, $newsimage, $idusercreate, $previewnumber, $statusmember){
  $thistNews = "
      <div class=\"col-md-12\">
       <div class=\"card flex-md-row mb-2 shadow-sm h-md-250\">
           <div class=\"card-body d-flex flex-column align-items-start\">
               <strong class=\"d-inline-block mb-2 text-primary\"><i class=\"fas fa-bookmark\"></i> $typenews</strong>
               <h6 class=\"mb-0\">
                  <a class=\"text-dark\" href=\"#\"><i class=\"fas fa-file-alt\"></i> หัวข้อ: $headernews</a>
               </h6>
               <div class=\"row ml-1\">
                  <div class=\"mb-1 mr-5 text-muted small\"><i class=\"fas fa-clock\"></i> วันที่โพสต์: $getdate</div>
                  <div class=\"mb-1 ml-5 text-muted small\"><i class=\"fas fa-play-circle\"></i> จำนวนเข้าชม: $previewnumber ครั้ง</div>
               </div>
               <p class=\"card-text mb-auto\">$detailnews</p>
               <div class=\"d-flex\">
                  ".manageState($statusmember, $newsId,$headernews,$detailnews,$typenews,$newsimage)."
               </div>
           </div>
           <img class=\"card-img-right img-not-replace flex-auto d-none d-lg-block\" alt=\"xlxl\" src=\"backend/data/news/$newsimage\" width=\"200px\" height=\"250px\">
       </div>
     </div>
  ";
  echo $thistNews;
}

function ListDataRevenue($num, $name, $detail, $amount, $date, $evidenceSlip, $getId){
  $del = "delete";
  $list = "
      <tr class=\"tr-shadow\">
          <td>$num</td>
          <td>$name</td>
          <td>$detail</td>
          <td>$date</td>
          <td>$amount ฿</td>
          <td>
              <div class=\"account-item clearfix js-item-menu\">
                <div class=\"image\">
                    <img src=\"backend/data/revenue/$evidenceSlip\" alt=\"John Doe\" />
                </div>
              </div>
          </td>
          <td>
              <div class=\"table-data-feature\" >
                  <button class=\"item\" id=\"btnShowRevenue\" data-toggle=\"modal\" data-target=\"#modalShowRevenue\"
                    data-id=\"$getId\" data-name=\"$name\" data-detail=\"$detail\" data-amount=\"$amount\" data-slip=\"$evidenceSlip\"
                  >
                    <i class=\"fas fa-list-alt\"></i>
                  </button>
                  <button class=\"item\" id=\"btnUpdateRevence\" data-toggle=\"modal\" data-target=\"#modalFormrevenueupdate\"
                      data-id=\"$getId\" data-name=\"$name\" data-detail=\"$detail\" data-amount=\"$amount\" data-slip=\"$evidenceSlip\"
                  >
                    <i class=\"fas fa-pencil-alt\"></i>
                  </button>
                  <a href=\"backend/add-revenue.php?re_id=$getId&status=$del&img_slip=$evidenceSlip\" class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Delete\">
                    <i class=\"fas fa-trash-alt\"></i>
                  </a>
              </div>
          </td>
      </tr>   
  ";
  echo $list;
}

function ListDataExpenses($num, $name, $detail, $amount, $date, $evidenceSlip, $getIdx){
  $del = "delete";
  $list = "
      <tr class=\"tr-shadow\">
          <td>$num</td>
          <td>$name</td>
          <td>$detail</td>
          <td>$date</td>
          <td>$amount ฿</td>
          <td>
              <div class=\"account-item clearfix js-item-menu\">
              <div class=\"image\">
                  <img src=\"backend/data/expenses/$evidenceSlip\" alt=\"John Doe\" />
              </div>
              </div>
          </td>
          <td>
              <div class=\"table-data-feature\" >
              <button class=\"item\" id=\"btnShowExpenses\" data-toggle=\"modal\" data-target=\"#modalShowExpenses\"
                      data-id=\"$getIdx\" data-name=\"$name\" data-detail=\"$detail\" data-amount=\"$amount\" data-slip=\"$evidenceSlip\"
                  >
                      <i class=\"fas fa-list-alt\"></i>
                  </button>
                  <button class=\"item\" id=\"btnUpdateExpenses\" data-toggle=\"modal\" data-target=\"#modalFormexpensesupdate\"
                      data-id=\"$getIdx\" data-name=\"$name\" data-detail=\"$detail\" data-amount=\"$amount\" data-slip=\"$evidenceSlip\"
                  >
                      <i class=\"fas fa-pencil-alt\"></i>
                  </button>
                  <a href=\"backend/add-expenses.php?ex_id=$getIdx&status=$del&img_slip=$evidenceSlip  \" class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Delete\">
                      <i class=\"fas fa-trash-alt\"></i>
                  </a>
              </div>
          </td>
      </tr>   
  ";
  echo $list;
}

function tablelistproject($i, $projectname, $responsibleTitle,$responsiblename,$responsiblelastname, $operationArea, $yearproject, $startdate, $enddate, $id, $projectid, $projectImg, $detail, $fileproject){
    $listProject = "
      <tr class=\"tr-shadow\">
        <td>
          <div class=\"account-item account-item--style2 clearfix js-item-menu\">
            <div class=\"image\">
              <img src=\"backend/data/project/$projectImg \" alt=\"John Doe\" />
            </div>
          </div>
        </td>
        <td>$projectname</td>
        <td>$responsibleTitle $responsiblename  $responsiblelastname</td>
        <td>$operationArea</td>
        <td><a href=\"backend/data/project/file/$fileproject\">เปิดไฟล์</a></td>
        <td>
            <div class=\"table-data-feature\" >
                <a class=\"item\" data-toggle=\"tootip\" data-placement=\"top\" title=\"Add Data\" href=\"detail_projects.php?idx_project=".$id." \">
                  <i class=\"fas fa-list-alt\"></i>
                </a>
                <button class=\"item\" id=\"btnUpdateProject\" data-toggle=\"modal\" data-target=\"#modalFormprojectupdate\"
                    data-toggle=\"tooltip\" data-placement=\"edit\" data-id=\"$id\" data-projectname=\"$projectname\" data-responsibletitle=\"$responsibleTitle\"
                    data-operationarea=\"$operationArea\" data-yearproject=\"$yearproject\" data-startdate=\"$startdate\" data-enddate=\"$enddate\" data-detail=\"$detail\"
                    data-projectnumber=\"$projectid\" data-projectimage=\"$projectImg\" data-responsiblename=\"$responsiblename\" data-responsiblelastname=\"$responsiblelastname\" 
                    data-fileproject=\"$fileproject\"
                >
                    <i class=\"fas fa-pencil-alt\"></i>
                </button>
                <button type=\"button\" id=\"confirmTrashProject\" data-id=\"$id\" data-imagename=\"$projectImg\" data-filename=\"$fileproject\" class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Delete\">
                    <i class=\"fas fa-trash-alt\"></i>
                </button>
            </div>
        </td>
      </tr>
    ";
    echo $listProject;

}
function tablelistSetproject($i, $projectname, $responsibleTitle,$responsiblename,$responsiblelastname, $operationArea, $yearproject, $startdate, $enddate, $id, $projectid, $projectImg, $detail, $fileproject){
  $listProject = "
    <tr class=\"tr-shadow\">
      <td>
        <div class=\"account-item account-item--style2 clearfix js-item-menu\">
          <div class=\"image\">
            <img src=\"backend/data/project/$projectImg \" alt=\"John Doe\" />
          </div>
        </div>
      </td>
      <td>$projectname</td>
      <td>$responsibleTitle $responsiblename  $responsiblelastname</td>
      <td>$operationArea</td>
      <td><a href=\"backend/data/project/file/$fileproject\">เปิดไฟล์</a></td>
      <td>
          <div class=\"table-data-feature\" >
              <a class=\"item\" data-toggle=\"tootip\" data-placement=\"top\" title=\"Add Data\" href=\"project_participants.php?idx_project=".$id." \">
                <i class=\"fas fa-list-alt\"></i>
              </a>
              <button type=\"button\" class=\"item\" id=\"btnShowUseradd\" data-id=\"$id\" data-toggle=\"modal\" data-target=\"#modalShowuserAdd\">
                  <i class=\"fas fa-user-plus\"></i>
              </button>
              <button type=\"button\" id=\"btnShowusernone\" class=\"item\" data-id=\"$id\" data-toggle=\"modal\" data-target=\"#modalShowuserNone\">
                  <i class=\"far fa-user\"></i>
              </button>
          </div>
      </td>
    </tr>
  ";
  echo $listProject;

}
function tiblelistofficer($num, $idOfficer, $photoOfficer, $fullnameOfficer, $email, $idcard, $tell, $age, $sex){
  $officerList = "
    <tr class=\"tr-shadow\">
        <td>$num</td>
        <td>
          <div class=\"account-item account-item--style2 clearfix js-item-menu\">
              <div class=\"image\">
                  <img src=\"../root/backend/data-image/$photoOfficer \" alt=\"John Doe\" />
              </div>
          </div>
        </td>
        <td>$fullnameOfficer</td>
        <td>$sex</td>
        <td>$age</td>
        <td>$email</td>
        <td>$tell</td>
        
    </tr>
  ";
  echo $officerList;
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
                  <img src=\"backend/data/patrons/$imageSlipt \" alt=\"John Doe\" />
              </div>
          </div>
      </td>
      <td>
          <div class=\"table-data-feature\" >
          <a href=\"#\" class=\"item\" >
            <i class=\"fas fa-list-alt\"></i>
          </a>
          <button type=\"button\" id=\"btnupdatePatron\" data-id=\"$idpatron\" data-imgpatron=\"$imageSlipt\" class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Delete\">
            <i class=\"fas fa-user-plus\"></i>
          </button>
            <button type=\"button\" id=\"confirmTrashPatron\" data-id=\"$idpatron\" data-imgpatron=\"$imageSlipt\" class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Delete\">
                <i class=\"fas fa-trash-alt\"></i>
            </button>
          </div>
      </td>
    </tr>
  ";
  echo $listPatron;
}
function tablelistsetPatrons ($Pnum, $idpatron, $fullname, $cardID, $address, $tell, $carer, $workplace, $newdate, $enddate, $munny, $allmunny, $imageSlipt){
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
                  <img src=\"backend/data/patrons/$imageSlipt \" alt=\"John Doe\" />
              </div>
          </div>
      </td>
      <td>
          <div class=\"table-data-feature\" >
            <a class=\"item\" data-toggle=\"tootip\" data-placement=\"top\" title=\"Add Data\" href=\"getting_a_scholarship.php?id_patron=".$idpatron." \">
              <i class=\"fas fa-list-alt\"></i>
            </a>
            <button type=\"button\" id=\"confirmTrashPatron\" data-id=\"$idpatron\" data-imgpatron=\"$imageSlipt\" class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Delete\">
                <i class=\"fas fa-trash-alt\"></i>
            </button>
          </div>
      </td>
    </tr>
  ";
  echo $listPatron;
}

function tiblelistvolunteer($num, $idVolunteer, $photoVolunteer, $fullnameVolunteer, $nickname, $age, $tell, $district_a, $district_j){
    $volunteerList = "
      <tr class=\"tr-shadow\">
          <td>$num</td>
          <td>
            <div class=\"account-item account-item--style2 clearfix js-item-menu\">
                <div class=\"image\">
                    <img src=\"../root/backend/data-image/$photoVolunteer \" alt=\"John Doe\" />
                </div>
            </div>
          </td>
          <td>$fullnameVolunteer</td>
          <td>$age</td>
          <td>$tell</td>
          <td>$district_a</td>
          <td>$district_j</td>
          
      </tr>
    ";
    echo $volunteerList;
}

function showDataOrphan($num,$photo,$fullname,$age,$idCardNumber,$dayaddrecord,$idOrphan){
  $show = "
  <tr class=\"classDataList tr-shadow\">
  <div class=\"set-data\" data-id=\"19\">
    <td>$num</td>
    <td> 
        <div class=\"account-item account-item--style2 clearfix js-item-menu\">
            <div class=\"image\">
                <img src=\"../officer/backend/data/orphan-information/$photo\" alt=\"$photo\" />
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
                
              </div>
              <div class=\"card-header bg-transparent text-center\">
                <img class=\"profile_img\" src=\"../officer/backend/data/orphan-information/$profile_orphan\" alt=\"student dp\">
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
                
              </div>
              <div class=\"card-header bg-transparent text-center\">
                <img class=\"img-home\" src=\"../officer/backend/data/orphan-information/$image_home\" alt=\"student dp\">
              </div>
            </div>
          </div>
          <div class=\"col-lg-9\">
            <div class=\"row col-lg-12\">
              <div class=\"card shadow-sm col-lg-5 mr-auto\">
                <div class=\"card-header bg-transparent border-0 row\">
                  <h3 class=\"mb-0\"><i class=\"far fa-home pr-1\"></i>ที่อยู่</h3>
                  
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

function detailproject($id, $projectid, $projectname, $fullname, $detail, $operationArea, $yearproject, $startdate, $enddate){
  $tron = "
      <div class=\"jumbotron\">
        <div class=\"row mt-0\">
            <h6 class=\"h6-reponsive mb-0 mt-0 dark-text\">รหัสโครงการ: $projectid</h6>
            <h6 class=\"h6-reponsive mb-0 mt-0 dark-text ml-auto\">ผู้รับผิดชอบโครงการ: $fullname</h6>
        </div>
        <h5 class=\"h5-reponsive mb-1 purple-text text-center\">ชื่อโครงการ: $projectname</h5>
        <div class=\"col-md-12 row\">
          <div class=\"form-group mb-2 col-9\">
              <label class=\"ml-1 mt-0 mb-0 font-weight-bold text-success\">รายละเอียด(Detail)</label>
              <textarea class=\"form-control\" rows=\"3\" cols=\"30\" name=\"detail\" id=\"Detail\" disabled>$detail</textarea>
          </div>
          <div class=\"form-group mb-2 col-3\">
              <label class=\"ml-1 mt-0 mb-0 font-weight-bold text-success\">พื่นที่ดำเนินงาน</label>
              <textarea class=\"form-control\" rows=\"3\" cols=\"30\" name=\"operationArea\" id=\"operationArea\" disabled>$operationArea</textarea>
          </div>
        </div>
        <div class=\"row\">
          <div class=\"col-md-3\">
              <h6 class=\"green-text p-responsive text-center mt-2\">วันที่เริ่มโครงการ: $startdate</h6>
          </div>
          <div class=\"col-md-3\">
              <h6 class=\"red-text p-responsive text-center mt-2\">สิ้นสุดเมื่อ: $enddate</h6>
          </div>
          <div class=\"col-md-3\">
              <h6 class=\"dark-text p-responsive text-center mt-2\">ปีโครงการ: $yearproject</h6>
          </div>
          
        </div>
        
      </div>
  ";
  echo $tron;
}
function jumbotron($id, $projectid, $projectname, $fullname, $detail, $operationArea, $yearproject, $startdate, $enddate){
  $tron = "
        <div class=\"row\">
          <div class=\"col-md-3\">
          </div>
          <div class=\"col-md-3\">
          </div>
          <div class=\"col-md-3\">
              <h6 class=\"dark-text p-responsive text-center mt-2\">ปีโครงการ: $yearproject</h6>
          </div>
          <div class=\"col-md-3\">
              <button class=\"btn btn-cyan btn-sm\" type=\"button\" data-id=\"$id\" id=\"btnAddParticipant\" data-toggle=\"modal\" 
                data-target=\"#modaAddParticipant\"
              >เพิ่มผู้เข้าร่วมโครงการ</button>
          </div>
        </div>
        
      </div>
  ";
  echo $tron;
}

function showDataPaticipants($num,$photo,$fullname,$age,$idCardNumber,$entryDate,$idOrphan,$idparticipantproject,$idproject){
  $show_x = "
    <tr class=\"classDataList tr-shadow\">
      <div class=\"set-data\" data-id=\"19\">
        <td>$num</td>
        <td> 
            <div class=\"account-item account-item--style2 clearfix js-item-menu\">
                <div class=\"image\">
                    <img src=\"../officer/backend/data/orphan-information/$photo\" alt=\"\" />
                </div>
            </div>
        </td>
        <td width=\"20%\" data-abc=\"true\">$fullname</td>
        <td data-abc=\"true\">$age</td>
        <td data-abc=\"true\">$idCardNumber</td>
        <td data-abc=\"true\">$entryDate</td>

        <td>
            <input type=\"checkbox\" class=\"learn-checkbox\" name=\"checkedTrash[]\" value=\"$idparticipantproject\" />
        </td>
        <td>
          <a href=\"backend/delete-orphan.php?projectget_id=$idproject&idparticipan_project=$idparticipantproject\" class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"ลบ\">
            <i class=\"fas fa-trash-alt\"></i>
          </a>
        </td>
      </div>
    </tr>
  ";
  echo $show_x;
}

function getComplaint($Cnumber, $Cid, $Cfullname, $Ctell, $Cbertday, $Cemail, $Caddress, $Cheadding, $Ccontent,$datepost){
  $showComplaint = "
    <fieldset class=\"card border-info col-md-12 ml-2 mr-1 mt-1 mb-2 border\">
        <legend class=\"scheduler-border ml-auto\">
           <span> <i class=\"fas fa-clock\"></i> $datepost</span>
           <button type=\"button\" id=\"comfirmTrashComplaint\" data-id=\"$Cid\" class=\"ml-2 btn btn-sm btn-outline-danger\">
              <i class=\"fas fa-trash-alt\"></i>
            </button>
        </legend>
        <div class=\"card-header row\">
          <p class=\"mr-2 mt-0 mb-0 text-dark font-thi h5\">หัวข้อ: $Cheadding</p>
          <p class=\"ml-auto mt-0 mb-0 font-thi\"><i class=\"fas fa-user\"></i>&nbsp;$Cfullname</p>
        </div>
        <div class=\"card-block mt-2\">
            <p class=\"font-thi\" style=\"font-size:18px\">$Ccontent</p>
        </div>
        <div class=\"card-footer text-secondary\">
          <div class=\"row mb-0 mt-0\">
            <p class=\"col-6\"><i class=\"fas fa-envelope\"></i>&nbsp;$Cemail</p>
            <p class=\"ml-auto mt-0 mb-0\"><i class=\"fas fa-mobile-alt\"></i> $Ctell</p>
            <p class=\"ml-auto mt-0 mb-0 font-thi\" style=\"font-size:16px\">
             <i class=\"fas fa-map-marker-alt\"></i>&nbsp;$Caddress
            </p>
          </div>
        </div>
    </fieldset>
  ";
  echo $showComplaint;
}

function showDataScholarshipt($numbar, $idscholarshipt, $photo, $namegrantee, $age, $cardId, $entrydate, $patronId){
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
      <td>$cardId</td>
      <td>$entrydate</td>
      <td>
        <input type=\"checkbox\" class=\"learn-checkbox\" name=\"checkedTrash[]\" value=\"$idscholarshipt\" />
      </td>
      <td>
        <a href=\"backend/delete-grantee-scholarship.php?idscholarship_patron=$idscholarshipt&id_patron=$patronId\" class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"ลบ\">
          <i class=\"fas fa-trash-alt\"></i>
        </a>
      </td>
    </tr>
  ";
  echo $showScholarshipt;
}

function listFundation(
  $numse,$fullnameFundation,$fundationSex,$fundationAge,$fundationEmail,$fundationTell,
  $fundationIdCard,$occupationFundation,$fundationWorkplace,$fundationImg,$fundationId,$setAddress
  ){
    $fundation = "
      <tr class=\"classDataList tr-shadow\">
          <td>$numse</td>
          <td>
            <div class=\"account-item account-item--style2 clearfix js-item-menu\">
                <div class=\"image\">
                    <img src=\"../officer/backend/data/fundation/$fundationImg\" alt=\"\" />
                </div>
            </div>
          </td>
          <td>$fullnameFundation</td>
          <td>$fundationSex</td>
          <td>$fundationAge</td>
          <td>$fundationEmail</td>
          <td>$fundationTell</td>
          <td>$setAddress</td>
      </tr>
    ";
    echo $fundation;
  }

  function statusOne($getStatus){
      if($getStatus == "chairman"){
       $l = "ประธาน";
      }else if($getStatus == "volunteer"){
        $l = "เจ้าหน้าที่";
      }else{
         $l = "แอดมิน";
      }
      return $l;
  }

  function cardProfile($id, $title,$firstname, $lastname, $Email, $cardNumbers, $tell, $age, $sex, $photo, $statusx,$fullnames,$username,$passwd){
    $listProfile = "
    <div class=\"container rounded bg-white mt-5\">
        <div class=\"row\">
            <div class=\"col-md-4 border-right\">
                <div class=\"d-flex flex-column align-items-center text-center p-3 py-5\">
                  <img class=\"mt-3\" src=\"../root/backend/data-image/$photo\" width=\"190\">
                  <span class=\"font-weight-bold\">$fullnames</span>
                  <span class=\"text-black-50\">$username</span>
                  <span>สถานะ: ".statusOne($statusx)."</span>
                </div> 
            </div>
            <div class=\"col-md-8\">
                <div class=\"p-3 py-5\">
                  
                    <div class=\"row mt-2\">
                        <div class=\"col-md-5\">
                          <label>:ชื่อ</label>
                          <p class=\"form-control\">$title $firstname</p>
                        </div>
                        <div class=\"col-md-3\">
                          <label>นามสกุล</label>
                          <p class=\"form-control\">$lastname</p>
                        </div>
                        <div class=\"col-md-2\">
                          <label>อายุ</label>
                          <p class=\"form-control\">$age</p>
                        </div>
                        <div class=\"col-md-2\">
                          <label>เพศ</label>
                          <p class=\"form-control\">$sex</p>
                        </div>
                    </div>
                    <div class=\"row mt-1\">
                        <div class=\"col-md-12\">
                          <label>เลขบัตรประชาชน</label>
                          <p class=\"form-control\">$cardNumbers</p>
                        </div>
                        <div class=\"col-md-12\">
                          <label>เบอร์</label>
                          <p class=\"form-control\">$tell</p>
                        </div>
                    </div>
                    
                    <div class=\"mt-5 text-right\">
                      <button type=\"button\" id=\"btnResetPass\" data-id=\"$id\" data-password=\"$passwd\" class=\"text-primary mr-2\">เปลียนรหัสผ่าน <i class=\"fas fa-key\"></i></button>
                      <button class=\"btn btn-sm btn-warning ml-3\" type=\"button\" data-toggle=\"modal\" data-target=\"#modalEditProfile\"
                        id=\"btnEditProfile\" data-id=\"$id\" data-title=\"$title\" data-firstname=\"$firstname\" data-lastname=\"$lastname\"
                        data-age=\"$age\" data-sex=\"$sex\" data-username=\"$username\" data-cardid=$cardNumbers data-photo=$photo
                        data-tell=$tell data-stete=\"volunter\"
                      >เเก้ไขโปรไฟล์</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ";
    echo $listProfile;
}


?>
