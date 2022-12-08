<?php
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
                  <a href=\"officer.php\">อาสาสมัคร</a>
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
function SteteLi($sst){
  
}
function navigationsbarTrue($fullname, $status){
    $list = "
              <nav id=\"sidebar\" class=\"sidebar-wrapper\">
                <div class=\"sidebar-content\">
                    <div class=\"sidebar-brand\">
                        <a href=\"index.php\" class=\"text-primary\"> สถานะ ".statusOne($status)."</a>
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
                              <a href=\"news.php\">จัดการข้อมูลประชาสัมพันธ์</a>
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class=\"sidebar-dropdown\">
                        <a href=\"#\">
                            <i class=\"fas fa-database\"></i>
                            <span>จัดการข้อมูลต่างๆ</span>
                            <span class=\"badge badge-pill badge-primary\">8</span>
                        </a>
                        <div class=\"sidebar-submenu\">
                          <ul>
                            <li>
                              <a href=\"patrons.php\">จัดการข้อมูลผู้ให้ทุน</a>
                            </li>
                            <li>
                              <a href=\"setPatrons.php\">จัดการข้อมูลการได้รับทุน</a>
                            </li>
                            <li>
                              <a href=\"projects.php\">จัดการข้อมูลโครงการ</a>
                            </li>
                            <li>
                              <a href=\"set_projects.php\">จัดการข้อมูลผู้เข้าร่วมโครงการ</a>
                            </li>
                            <li>
                              <a href=\"board-users.php\">จัดการคณะกรมมการมูลนิธิ</a>
                            </li>
                            <li>
                              <a href=\"complaint.php\">ข้อมูลแจ้งข้อมูลเด็กกำพร้า</a>
                            </li>
                            <li>
                              <a href=\"orphan_information.php\">ข้อมูลเด็กกำพร้า</a>
                            </li>
                            <li>
                              <a href=\"fundation.php\">ข้อมูลอาสาสมัค(ทั่วไป)</a>
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
                            <li>
                              <a href=\"summarize.php\">สรุปการเงิน</a>
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
                            <span>โปรไฟล์</span>
                            <span class=\"badge badge-pill badge-primary\">Beta</span>
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
    <div class=\"col-xl-2 col-md-6 mb-4\">
      <div class=\"card border-left-primary shadow h-100 py-2\">
          <div class=\"card-body\">
              <div class=\"row no-gutters align-items-center\">
                  <div class=\"col mr-2\">
                      <div class=\"text-xs font-weight-bold text-dark text-uppercase mb-1\">
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

function chkSteteRevenue($nameStete, $detailStete, $amountStete, $dateStete, $evidenceSlipStete, $getIdStete,$getuseridStete,$funderStete,$stateUserStete){
  $del = "delete";
  $dateme = date('Y-m-d');
  $sdate = date ("Y-m-d", strtotime("+05 day", strtotime($dateStete)));
  $llis = strtotime("$dateme") - strtotime("$sdate");
  $sslist = floor($llis / 86400);
  if($stateUserStete != "chairman"){
    if(date('Y-m-d') > date ("Y-m-d", strtotime("+04 day", strtotime($dateStete)))){
        $listStete = "
          <button type=\"button\" class='item btnfalseDate' data-datese=\"$sslist\">
            <i class=\"fas fa-pencil-alt text-danger\"></i>
          </button>
          <button type=\"button\" class='item btnfalseDate' data-datese=\"$sslist\">
            <i class=\"fas fa-trash-alt text-danger\"></i>
          </button>
        ";
    }else{
      $listStete = "
        <button class=\"item\" id=\"btnUpdateRevence\" data-toggle=\"modal\" data-target=\"#modalFormrevenueupdate\"
        data-id=\"$getIdStete\" data-name=\"$nameStete\" data-detail=\"$detailStete\" data-amount=\"$amountStete\" data-slip=\"$evidenceSlipStete\"
        data-userid=\"$getuseridStete\" data-funder=\"$funderStete\"
        >
          <i class=\"fas fa-pencil-alt\"></i>
        </button>

        <button type=\"button\" id=\"SetconfirmTrash\" data-id=\"$getIdStete\" data-image=\"$evidenceSlipStete\"
          class=\"item\"
        >
          <i class=\"fas fa-trash-alt\"></i>
        </button>
      ";
    }
  }else{
    $listStete = "";
  }
  return $listStete;
}
function ListDataRevenue($num, $name, $detail, $amount, $date, $evidenceSlip, $getId,$getuserid,$funder,$stateUser){
  
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
                    data-username=\"$getuserid\" data-funder=\"$funder\"
                  >
                    <i class=\"fas fa-list-alt\"></i>
                  </button>
                  ".chkSteteRevenue($name, $detail, $amount, $date, $evidenceSlip, $getId,$getuserid,$funder,$stateUser)."
              </div>
          </td>
      </tr>   
  ";
  echo $list;
}

function chkSteteExpenses($name_stete, $detail_stete, $amount_stete, $date_stete, $evidenceSlip_stete, $getIdx_stete,$state_User_stete){
  $del = "delete";
  $datemy = date('Y-m-d');
  $sydate = date ("Y-m-d", strtotime("+05 day", strtotime($date_stete)));
  $lils = strtotime("$datemy") - strtotime("$sydate");
  $lsisl = floor($lils / 86400);
   if($state_User_stete != "chairman"){
    if(date("y-m-d") > date ("Y-m-d", strtotime("+04 day", strtotime($date_stete)))){
      $list_state = "
          <button type=\"button\" class='item btnfalseDate' data-datese=\"$lsisl\">
            <i class=\"fas fa-pencil-alt text-danger\"></i>
          </button>
          <button type=\"button\" class='item btnfalseDate' data-datese=\"$lsisl\">
            <i class=\"fas fa-trash-alt text-danger\"></i>
          </button>
      ";
    }else{
    $list_state = "
      <button class=\"item\" id=\"btnUpdateExpenses\" data-toggle=\"modal\" data-target=\"#modalFormexpensesupdate\"
        data-id=\"$getIdx_stete\" data-name=\"$name_stete\" data-detail=\"$detail_stete\" data-amount=\"$amount_stete\" data-slip=\"$evidenceSlip_stete\"
      >
          <i class=\"fas fa-pencil-alt\"></i>
      </button>
      
      <button type=\"button\" id=\"confirmTrash\" data-id=\"$getIdx_stete\" data-image=\"$evidenceSlip_stete\"
        class=\"item\"
      >
        <i class=\"fas fa-trash-alt\"></i> ลบ
      </button>
      ";
    }
   }else{
    $list_state = "";
   }
   return $list_state;
}
function ListDataExpenses($num, $name, $detail, $amount, $date, $evidenceSlip, $getIdx,$state_User){
  
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
                  ".chkSteteExpenses($name, $detail, $amount, $date, $evidenceSlip, $getIdx,$state_User)."
              </div>
          </td>
      </tr>   
  ";
  echo $list;
}
function listdataSummarize($numbex,$dtail,$total){
  
  $listsummarize = "
    <tr class=\"trlist-style tr-shadow\">
      <td scope=\"col\" style='width:90px'>$numbex</td>
      <td scope=\"col\" style='width:110px'><a href=\"summarize-year.php?getyear=$dtail\">$dtail</a></td>
      <td>$total</td>
    </tr>
  ";
  echo $listsummarize;
}
function listSummarizeRevenue($x,$month,$total){
  $listx = "
    <tr class=\"trlist-style tr-shadow\">
      <td scope=\"col\" style='width:90px'>$x</td>
      <td scope=\"col\" style='width:120px'\">$month</td>
      <td>$total บ.</td>
    </tr>
  ";
  echo $listx;
}

function tablelistproject($i, $projectname, $operationArea, $yearproject, $startdate, $enddate, $id, $projectImg, $detail, $fileproject,$title_fundation,$firstname_fundation,$lastname_fundation,$statuje){
  if($statuje != "chairman"){
    if(date('Y-m-d') > $enddate){
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
            <td>$title_fundation $firstname_fundation  $lastname_fundation</td>
            <td>$operationArea</td>
            <td><a href=\"backend/data/project/file/$fileproject\">เปิดไฟล์</a></td>
            <td>
                <div class=\"table-data-feature\" >
                    <button type=\"button\" id=\"ButtonShowProject\" class=\"item\" data-toggle=\"modal\" data-target=\"#modalSowProject\" 
                      data-placement=\"top\"  data-id=\"$id\" data-projectname=\"$projectname\" data-responsibletitle=\"$title_fundation\"
                      data-operationarea=\"$operationArea\" data-yearproject=\"$yearproject\" data-startdate=\"$startdate\" data-enddate=\"$enddate\" data-detail=\"$detail\"
                       data-projectimage=\"$projectImg\" data-responsiblename=\"$firstname_fundation\" data-responsiblelastname=\"$lastname_fundation\" 
                      data-fileproject=\"$fileproject\"
                    >
                      <i class=\"fas fa-list-alt\"></i>
                    </button>
                    <button type=\"button\" id=\"falseTrashBtnProject\" data-enddate=\"$enddate\" class=\"item\">
                        <i class=\"fas fa-pencil-alt text-danger\"></i>
                    </button>
                    <button type=\"button\" class=\"item\" id=\"falseTrashBtnProject\" data-enddate=\"$enddate\">
                      <i class=\"fas fa-trash-alt text-danger\"></i>
                    </button>
                </div>
            </td>
          </tr>
        ";
    }else{
    
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
        <td>$title_fundation $firstname_fundation  $lastname_fundation</td>
        <td>$operationArea</td>
        <td><a href=\"backend/data/project/file/$fileproject\">เปิดไฟล์</a></td>
        <td>
            <div class=\"table-data-feature\" >
                <button type=\"button\" id=\"ButtonShowProject\" class=\"item\" data-toggle=\"modal\" data-target=\"#modalSowProject\" 
                  data-placement=\"top\"  data-id=\"$id\" data-projectname=\"$projectname\"
                  data-operationarea=\"$operationArea\" data-yearproject=\"$yearproject\" data-startdate=\"$startdate\" data-enddate=\"$enddate\" data-detail=\"$detail\"
                   data-projectimage=\"$projectImg\"
                  data-fileproject=\"$fileproject\" data-titlefundation=\"$title_fundation\" data-firstnamefundation=\"$firstname_fundation\" data-lastnamefundation=\"$lastname_fundation\"
                >
                  <i class=\"fas fa-list-alt\"></i>
                </button>
                <button class=\"item\" id=\"btnUpdateProject\" data-toggle=\"modal\" data-target=\"#modalFormprojectupdate\"
                    data-toggle=\"tooltip\" data-placement=\"edit\" data-id=\"$id\" data-projectname=\"$projectname\"
                    data-operationarea=\"$operationArea\" data-yearproject=\"$yearproject\" data-startdate=\"$startdate\" data-enddate=\"$enddate\" data-detail=\"$detail\"
                     data-projectimage=\"$projectImg\"
                    data-fileproject=\"$fileproject\" data-titlefundation=\"$title_fundation\" data-firstnamefundation=\"$firstname_fundation\" data-lastnamefundation=\"$lastname_fundation\"
                >
                    <i class=\"fas fa-pencil-alt\"></i>
                </button>
                <button type=\"button\" id=\"confirmTrashProject\" data-id=\"$id\" data-imagename=\"$projectImg\" data-filename=\"$fileproject\" class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"ลบ\">
                    <i class=\"fas fa-trash-alt\"></i>
                </button>
            </div>
        </td>
      </tr>
    ";
    }
  }else{
    
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
        <td>$title_fundation $firstname_fundation  $lastname_fundation</td>
        <td>$operationArea</td>
        <td><a href=\"backend/data/project/file/$fileproject\">เปิดไฟล์</a></td>
        <td>
            <div class=\"table-data-feature\" >
                <button type=\"button\" id=\"ButtonShowProject\" class=\"item\" data-toggle=\"modal\" data-target=\"#modalSowProject\" 
                  data-placement=\"top\"  data-id=\"$id\" data-projectname=\"$projectname\" data-responsibletitle=\"$title_fundation\"
                  data-operationarea=\"$operationArea\" data-yearproject=\"$yearproject\" data-startdate=\"$startdate\" data-enddate=\"$enddate\" data-detail=\"$detail\"
                   data-projectimage=\"$projectImg\" data-responsiblename=\"$firstname_fundation\" data-responsiblelastname=\"$lastname_fundation\" 
                  data-fileproject=\"$fileproject\"
                >
                  <i class=\"fas fa-list-alt\"></i>
                </button>
            </div>
        </td>
      </tr>
    ";
    
  }
    echo $listProject;

}
function btn_setproject($mem_status,$i_D,$dateend){
  if($mem_status != "chairman"){
    if(date('Y-m-d') > $dateend){
      $li_st = "<button type=\"button\" class=\"item\" id=\"AlertEndDate\">
        <i class=\"fas fa-list-alt text-danger\"></i>
      </button>";
    }else{
      $li_st = "<a class=\"item\" data-toggle=\"tootip\" data-placement=\"top\" title=\"เลือกผู้เข้าร่วมโครงการ\" href=\"project_participants.php?idx_project=$i_D \">
        <i class=\"fas fa-list-alt\"></i>
      </a>";
    }
  }else{
    
    $li_st = "";
  }
  return $li_st;
}
function tablelistSetproject($i, $projectname, $responsibleTitle,$responsiblename,$responsiblelastname, $operationArea, $yearproject, $startdate, $enddate, $id, $projectImg, $detail, $fileproject,$set_sta_tus){
  
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
              ".btn_setproject($set_sta_tus,$id,$enddate)."
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
        <td>$tell</td>
        
    </tr>
  ";
  echo $officerList;
}
function patronBtn($statup, $Patron_id,$img_slipt,$nick_name){
  if($statup === "chairman"){
    $evas = "";
  }else{
    $evas = "
    <button type=\"button\" id=\"editbtnpatron\" data-id=\"$Patron_id\" data-image=\"$img_slipt\" data-target=\"#editEmployeeModal\" class=\"item\" data-toggle=\"modal\">
      <i class=\"fas fa-edit\"></i>
    </button>
    <button type=\"button\" id=\"confirmTrashPatron\" data-id=\"$Patron_id\" data-nickname=\"$nick_name\" data-imgpatron=\"$img_slipt\" class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Delete\">
       <i class=\"fas fa-trash-alt\"></i>
    </button>";
  }
  return $evas;
  
}
function tablelistPatrons ($Pnum, $idpatron, $fullname, $cardID, $address, $tell, $carer, $workplace, $imageSlipt, $nickname,$statusme){
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
          <button type=\"button\" id=\"ButtonShowModalPatron\" data-id=\"$idpatron\" data-target=\"#ShowModalPatron\" data-toggle=\"modal\" class=\"item\" >
            <i class=\"fas fa-list-alt\"></i>
          </button>
          ".patronBtn($statusme,$idpatron,$imageSlipt,$nickname)."
          </div>
      </td>
    </tr>
  ";
  echo $listPatron;
}
function set_patron_btn($set_statused,$get_patron_id,$slip_img,$datecitals){
  if($set_statused !="chairman"){
    if(date('Y-m-d') > date ("Y-m-d", strtotime("+02 day", strtotime($datecitals)))){
      $llai = "
        <button type=\"button\" id=\"falseTrashBtn\" class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"ลบไม่ได้\">
          <i class=\"fas fa-trash-alt text-danger\"></i>
        </button>";
    }else{
      $llai = "
        <button type=\"button\" id=\"confirmTrashPatron\" data-id=\"$get_patron_id\" data-imgpatron=\"$slip_img\" data-date=\"$datecitals\" class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"ลบ\">
          <i class=\"fas fa-trash-alt\"></i>
        </button>";
    }
  }else{
    $llai="";
  }
  return $llai;
}
function tablelistsetPatrons ($Pnum, $idpatron, $fullname, $cardID, $totalmunny, $datecital, $amounts, $workplace, $imageUser,$getpatronid,$sliptImg,$personnumber,$statuxed){
  $listPatron = "
  <form>
    <tr>
      <td>$Pnum</td>
      <td>$fullname</td>
      <td>$totalmunny</td>
      <td>$personnumber</td>
      <td>$amounts</td>
      <td>$datecital</td> 
      <td>
          <div class=\"account-item account-item--style2 clearfix js-item-menu\">
              <div class=\"image\">
                  <img src=\"backend/data/patrons/slipt-patron/$sliptImg \" alt=\"John Doe\" />
              </div>
          </div>
      </td>
      <td>
          <div class=\"table-data-feature\" >
            <a class=\"item\" data-toggle=\"tootip\" data-placement=\"top\" title=\"จัดสรรทุน\" href=\"getting_a_scholarship.php?patron_setid=".$getpatronid."&person_numbers=$personnumber&datemy=$datecital \">
              <i class=\"fas fa-list-alt\"></i>
            </a>
            ".set_patron_btn($statuxed,$idpatron,$sliptImg,$datecital)."
          </div>
      </td>
    </tr>
    </form>
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
          <td>$district_j</td>
          
      </tr>
    ";
    echo $volunteerList;
}

function showDataOrphan($num,$photo,$fullname,$age,$idCardNumber,$dayaddrecord,$idOrphan){
  $show = "
    <tr class=\" tr-shadow\">

        <td>$num</td>
        <td> 
            <div class=\"account-item account-item--style2 clearfix js-item-menu\">
                <div class=\"image\">
                    <img src=\"../officer/backend/data/orphan-information/$photo\" alt=\"$photo\" />
                </div>
            </div>
        </td>
        <td>$fullname</td>
        <td>$age</td>
        <td>$idCardNumber</td>
        <td>$dayaddrecord</td>

        <td width=\"9%\">
            <div class=\"table-data-feature\">
                <a href=\"show-information-orphan.php?get_orphanId=".$idOrphan."\" class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"show\">
                  <i class=\"fas fa-address-card\"></i>
                </a>
            </div>
        </td>

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
  $year_study,$cause_stop_study,$catical_number,$number_project
){
  $data = "
    <div class=\"student-profile py-4\">
      <div class=\"container-fluid\">
        <div class=\"row\">
          <div class=\"col-lg-3\">
            <div class=\"card shadow-sm mb-4\">
              <div class=\"card-header bg-transparent border-0 row\">
                <h3 class=\"mb-0 ml-1\"><i class=\"far fa-clone pr-1\"></i>ข้อมูล</h3>
                <button class=\"btn-sm btn-success ml-auto\" onclick=\"window.print()\">ปริ้น</button>
              </div>
              <div class=\"card-header bg-transparent text-center\">
                <div class=\"card-img-block\">
                    <img class=\"img-fluid\" src=\"../officer/backend/data/orphan-information/$image_home\" alt=\"Card image cap\">
                </div>
                <div class=\"card-img-body\">
                  <img class=\"profile_img\" src=\"../officer/backend/data/orphan-information/$profile_orphan\" alt=\"student dp\">
                </div>
              </div>
              <div class=\"card-body mt-5\">
                <h3 class=\"text-center\">$title_me $first_name_me &nbsp; $last_name_me</h3>
                <p class=\"mb-0\"><strong class=\"pr-1\">บัตร ประชาชน:</strong>$card_id</p>
                <p class=\"mb-0\"><strong class=\"pr-1\">เบอร์โทร:</strong>$call_me</p>
                <p class=\"mb-0\"><strong class=\"pr-1\">ส่วนสูง:</strong>$heigh_me</p>
                <p class=\"mb-0\"><strong class=\"pr-1\">น้ำหนัก:</strong>$weigth_me</p>
                <p class=\"mb-0\"><strong class=\"pr-1\">กรุ๊ปเลือด:</strong>$blood_group_me</p>
                <p class=\"mb-0\"><strong class=\"pr-1\">วันเกิด:</strong>$berd_day_me</p>
                <p class=\"mb-0\"><strong class=\"pr-1\">อายุ:</strong>$age_me</p>
                <p class=\"mb-0\"><strong class=\"pr-1\">จำนวนพี่น้อง:</strong>$siblings_number คน</p>
                <p class=\"mb-0\"><strong class=\"pr-1\">เป็นคนที่:</strong>$me_number</p>
                <p class=\"mb-0\"><strong class=\"pr-1\">ได้รับทุน:</strong>$catical_number ครั้ง</p>
                <p class=\"mb-0\"><strong class=\"pr-1\">เข้าร่วมโครงการ:</strong>$number_project โครงการ</p>
                <div class=\"row\">
                  <small class=\"mb-0 mr-2 ml-auto\"><i class=\"far fa-clock pr-1\"></i>เพิ่มข้อมูลเมื่อ $day_add_record</small>
                </div>
              </div>
            </div>
            <div class=\"card card2 shadow-sm mt-4\">
              <div class=\"card-header bg-transparent text-center\">
                <div id=\"map_canvas\" style=\"width:100%;height:300px;\" class='mb-3'></div>
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
                            <th width=\"33%\">สถานภาพครอบครัว</th>
                            <td width=\"1%\">:</td>
                            <td width=\"33%\">$family_status</td>
                        </tr>
                      </table>
                      <table class=\"table border-primary table-bordered col-lg-4\">
                        <tr>
                          <th width=\"33%\">ระดับความช่วยเหลือ</th>
                          <td width=\"1%\">:</td>
                          <td width=\"33%\">$level_help</td>
                        </tr>
                      </table>
                      <table class=\"table border-primary table-bordered col-lg-4\">
                        <tr>
                          <th width=\"33%\">สถานะการเรียน</th>
                          <td width=\"1%\">:</td>
                          <td width=\"33%\">$study_status</td
                        </tr>
                      </table>
                      <table class=\"table border-primary table-bordered col-lg-12\">
                        <tr>
                          <th width=\"7%\">สาเหตุที่หยุดเรียน</th>
                          <td width=\"1%\">:</td>
                          <td width=\"39%\">$cause_stop_study</td>
                        </tr>
                      </table>
                      <table class=\"table border-primary table-bordered col-lg-12\">
                        <tr>
                          <th width=\"20%\">ต้องการความช่วยเหลือ</th>
                          <td width=\"1%\">:1</td>
                          <td width=\"20%\">$estimate_help</td>
                          <td width=\"1%\">:2</td>
                          <td width=\"20%\">$deceased</td>
                          <td width=\"1%\">:3</td>
                          <td width=\"20%\">$cause_death</td>
                          <td width=\"1%\">:4</td>
                          <td width=\"20%\">$year_study</td>
                        </tr>
                      </table>
                      <br/>

                      
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

function btn_scolar_shipt($sstatull,$Id_scolar,$id_patronx,$number_person,$date_ticals){
  if($sstatull != "chairman"){
    if(date('Y-m-d') > date ("Y-m-d", strtotime("+09 day", strtotime($date_ticals)))){
      $btnScolar = "
        <td>
          <input type=\"checkbox\" class=\"learn-checkbox\" name=\"checkedTrash[]\" value=\"$Id_scolar\" disabled/>
        </td>
        <td>
          <button type=\"button\" class=\"item\" id=\"alertFalse\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"ลบ\">
            <i class=\"fas fa-trash-alt\"></i>
          </button>
        </td>
        ";
    }else{
    $btnScolar = "
      <td>
        <input type=\"checkbox\" class=\"learn-checkbox\" name=\"checkedTrash[]\" value=\"$Id_scolar\" />
      </td>
      <td>
        <a href=\"backend/delete-grantee-scholarship.php?idscholarship_patron=$Id_scolar&id_patron=$id_patronx&person_number=$number_person&dates=$date_ticals\" class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"ลบ\">
          <i class=\"fas fa-trash-alt\"></i>
        </a>
      </td>
      ";
    }
  }else{
    $btnScolar = "
      
    ";
  }
  return $btnScolar;
}
function showDataScholarshipt($numbar, $idscholarshipt, $photo, $namegrantee, $age, $cardId, $entrydate, $patronId,$person_number,$statul,$date_tical){
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
      ".btn_scolar_shipt($statul,$idscholarshipt,$patronId,$person_number,$date_tical)."
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
          <td>$fundationTell</td>
          <td>
            <div class=\"table-data-feature\">
              <button class=\"item\" type=\"button\" id=\"btnShowdataFundation\" data-toggle=\"modal\" data-target=\"#modalFundationShow\" 
                data-toggle=\"tooltip\" data-placement=\"edit\" data-id=\"$fundationId\" data-image=\"$fundationImg\"
              >
                  <i class=\"fas fa-list-alt\"></i>
              </button>
            </div>
          </td>
      </tr>
    ";
    echo $fundation;
  }

  function btn_list_bord($b_status,$board_id,$board_img){
    if($b_status != "chairman"){
      $b_oard = "
                 <button type=\"button\" class=\"item\" id=\"btnEditUseradd\" data-id=\"$board_id\" data-toggle=\"modal\" data-target=\"#modalEditUserBoard\">
                  <i class=\"fas fa-edit\"></i>
                </button>
                
                <button type=\"button\" id=\"confirmTrashBoard\" data-id=\"$board_id\" data-boardimage=\"$board_img\" class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Delete\">
                  <i class=\"fas fa-trash-alt\"></i>
                </button>
      ";
    }else{
      $b_oard = "";
    }
    return $b_oard;
  }
  function listBoard(
    $numse,$fullnameboard,$postionboard,$cardidboard,$occupatiobboard,$sexboard,$boardreligion,$boardID,$boardImage,$statubord
    ){
      $board = "
        <tr class=\"classDataList tr-shadow\">
            <td>$numse</td>
            <td>
              <div class=\"account-item account-item--style2 clearfix js-item-menu\">
                  <div class=\"image\">
                      <img src=\"backend/data/board/$boardImage\" alt=\"$boardImage\" />
                  </div>
              </div>
            </td>
            <td>$fullnameboard</td>
            <td>$postionboard</td>
            <td>$cardidboard</td>
            <td>$occupatiobboard</td>
            <td>
              <div class=\"table-data-feature\">
                <button type=\"button\" class=\"item\" id=\"btnShowBoard\" data-id=\"$boardID\" data-toggle=\"modal\" data-target=\"#modalShowUserBoard\">
                  <i class=\"fas fa-list\"></i>
                </button>
                ".btn_list_bord($statubord,$boardID,$boardImage)."
              </div>
            </td>
        </tr>
      ";
      echo $board;
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
