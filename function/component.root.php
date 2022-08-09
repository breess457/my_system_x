<?php

function navbarRoot($name, $profile){ 
    $list = "
    <nav class=\"mb-4 navbar navbar-expand-lg fixed-top navbar-dark bg-success lighten-1\">
        <a href=\"#\" class=\"d-flex p-0\" style=\"text-decoration:none;color:#fff;\">
            <img src=\"../assets/image/logox.png\" alt=\"logo\" width=\"60\" height=\"55\">
            <h3 class=\"font-root-nanika mt-2\">Nusantara Patani</h3>
        </a>
        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>
        <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
            <ul class=\"navbar-nav mr-auto ml-4\">
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"index.php\"><i class=\"fas fa-home\"></i> หน้าแรก</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"officer.root.php\"><i class=\"fas fa-address-card\"></i> ข้อมูลผู้ใช้งาน</a>
                </li>
                
                
            </ul>
            <ul class=\"navbar-nav\">
                <li class=\"nav-item dropdown\">
                    <a class=\"nav-link dropdown-toggle  font-root-nanika\" id=\"navbarDropdownMenuLink-5\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                        <img src=\"backend/data-image/$profile\" alt=\"logo\" class=\"img-fluid rounded-circle\" style=\"height: 39px; width: 39px;\"> &nbsp;$name
                    </a>
                    <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdownMenuLink-5\">
                        <a class=\"dropdown-item font-root-nanika\" href=\"profile.root.php\"><i class=\"fas fa-user-circle\"></i> profile</a>
                        <a class=\"dropdown-item font-root-nanika\" href=\"logout.root.php\"><i class=\"fas fa-sign-out-alt\"></i> logout</a>
                        <a class=\"dropdown-item font-root-nanika\" href=\"#\"><i class=\"fas fa-cogs\"></i> setting</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    ";
    echo $list;
}
function checkTypeUser($type){
    switch ($type) {
        case 'volunteer':
            return "<td class=\"font-root-nanika\">เจ้าหน้าที่</td>";
            break;
        case 'officer':
            return "<td class=\"font-root-nanika\">อาสาสมัค</td>";
            break;
        case 'chairman':
            return "<td class=\"font-root-nanika text-danger font-weight-bold\">ประธาน</td>";
        default:
            return $type;
            break;
    }
}
function tiblelistofficerRoot($num, $idUsers, $photoOfficer, $title,$firstname,$lastname, $username, $idcard, $tell, $age, $sex,$statusType,$passwd){
    $officerList = "
      <tr class=\"tr-shadow\">
          <td>$num</td>
          <td>
            <div class=\"account-item account-item--style2 clearfix js-item-menu\">
                <div class=\"image\">
                    <img src=\"backend/data-image/$photoOfficer \" alt=\"John Doe\" />
                </div>
            </div>
          </td>
          <td class=\"font-root-nanika\">$title $firstname &nbsp; $lastname</td>
          <td class=\"font-root-nanika\">$sex</td>
          <td class=\"font-root-nanika\">$age</td>
          <td class=\"font-root-nanika\">$username</td>
          <td class=\"font-root-nanika\">$tell</td>
          ".checkTypeUser($statusType)."
          <td>
              <div class=\"table-data-feature\" >
                  <button type=\"button\" class=\"item\" id=\"btnshowusers\" data-toggle=\"modal\"
                      data-target=\"#modalShowdata\" data-id=\"$idUsers\" data-title=\"$title\"
                      data-firstname=\"$firstname\" data-lastname=\"$lastname\" data-sex=\"$sex\" data-age=\"$age\" 
                      data-username=\"$username\" data-password=\"$passwd\" data-cardid=\"$idcard\" data-tell=$tell 
                      data-statususer=\"$statusType\" data-imageuser=\"$photoOfficer\"
                  >
                    <i class=\"far fa-list-alt\"></i>
                  </button>
                  <button type=\"button\" class=\"item\" id=\"btneditusers\" data-toggle=\"modal\"
                      data-target=\"#modalFormUsersupdate\" data-id=\"$idUsers\" data-title=\"$title\"
                      data-firstname=\"$firstname\" data-lastname=\"$lastname\" data-sex=\"$sex\" data-age=\"$age\" 
                      data-username=\"$username\" data-password=\"$passwd\" data-cardid=\"$idcard\" data-tell=$tell 
                      data-statususer=\"$statusType\" data-imageuser=\"$photoOfficer\"
                  >
                      <i class=\"fas fa-pencil-alt\"></i>
                  </button>
                  <button type=\"button\" id=\"myConfirm\" data-id=\"$idUsers\" data-imageuser=\"$photoOfficer\" class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Delete\">
                      <i class=\"fas fa-trash-alt\"></i>
                  </button>
              </div>
          </td>
      </tr>
    "; 
    echo $officerList;
  }
  function tiblelistvolunteerRoot($num, $idVolunteer, $photoVolunteer, $fullnameVolunteer, $nickname, $age, $tell, $district_a, $district_j){
    $volunteerList = "
      <tr class=\"tr-shadow\">
          <td>$num</td>
          <td>
            <div class=\"account-item account-item--style2 clearfix js-item-menu\">
                <div class=\"image\">
                    <img src=\"../admin/backend/data/volunteer/$photoVolunteer \" alt=\"John Doe\" />
                </div>
            </div>
          </td>
          <td class=\"font-root-nanika\">$fullnameVolunteer</td>
          <td class=\"font-root-nanika\">$age</td>
          <td class=\"font-root-nanika\">$tell</td>
          <td class=\"font-root-nanika\">$district_a</td>
          <td class=\"font-root-nanika\">$district_j</td>
          <td class=\"font-root-nanika\">
              <div class=\"table-data-feature\" >
                  <button class=\"item\" id=\"btnUpdateExpenses\" data-toggle=\"modal\" data-target=\"#modalFormprojectupdate\"
                      data-toggle=\"tooltip\" data-placement=\"edit\"
                  >
                      <i class=\"fas fa-pencil-alt\"></i>
                  </button>
                  <a href=\"backend/add-projects.php?ex_id=".$idVolunteer."&status=".'delete'."\" class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Delete\">
                      <i class=\"fas fa-trash-alt\"></i>
                  </a>
              </div>
          </td>
      </tr>
    ";
    echo $volunteerList;
}

function statusOnex($getStatus){
    if($getStatus == "chairman"){
     $l = "ประธาน";
    }else if($getStatus == "volunteer"){
      $l = "เจ้าหน้าที่";
    }else{
       $l = "แอดมิน";
    }
    return $l;
}
function cardProfileRoot($id, $title,$firstname, $lastname, $Email, $cardNumbers, $tell, $age, $sex, $photo, $statusx,$fullnames,$username){
    $listProfile = "
    <div class=\"container rounded bg-white mt-5\">
        <div class=\"row\">
            <div class=\"col-md-4 border-right\">
                <div class=\"d-flex flex-column align-items-center text-center p-3 py-5\">
                  <img src=\"backend/data-image/$photo\" class=\"mt-3\" width=\"190\"/>
                  <span class=\"font-weight-bold\">$fullnames</span>
                  <span class=\"text-black-50\">$username</span>
                  <span>สถานะ: ".statusOnex($statusx)."</span>
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
                          <label>อีเมล</label>
                          <p class=\"form-control\">$Email</p>
                        </div>
                        <div class=\"col-md-12\">
                          <label>เบอร์</label>
                          <p class=\"form-control\">$tell</p>
                        </div>
                    </div>
                    
                    <div class=\"mt-5 text-right\">
                    <button class=\"btn btn-warning\" type=\"button\" data-toggle=\"modal\" data-target=\"#modalEditProfile\"
                        id=\"btnEditProfile\" data-id=\"$id\" data-title=\"$title\" data-firstname=\"$firstname\" data-lastname=\"$lastname\"
                        data-age=\"$age\" data-sex=\"$sex\" data-username=\"$username\" data-cardid=$cardNumbers data-photo=$photo
                        data-tell=$tell data-stete=\"admin\"
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