
<?php

function navigationsbarUsers(){
    $navbar = "
            <header id=\"header\" class=\"fixed-top\">
                <div class=\"container\">

                    <div class=\"logo float-left\">
                        <h1 class=\"text-light\"><a href=\"index.php\"><span>มูลนิธินูซันตารา</span></a></h1>
                    </div>

                    <nav class=\"nav-menu float-right d-none d-lg-block\">
                        <ul>
                            <li class=\"x\"><a href=\"index.php\">หน้าแรก</a></li>
                            <li class=\"x1\"><a href=\"news.php\">ข่าวสาร</a></li>
                            <li class=\"x2\"><a href=\"data-information.php\">ข้อมูลเด็กกำพร้า</a></li>
                            <li class=\"x3\"><a href=\"project-about.php\">โครงการ</a></li>    
                            <li class=\"x5\"><a href=\"team.php\">บุคลากร</a></li>         
                            <li class=\"x6\"><a href=\"appel.php\">แจ้งข้อมูลเด็กกำพร้า</a></li>         
                            <li class=\"x7\"><a href=\"contact.php\">ติดต่อ</a></li>
                            <li class=\"pt-1\">
                                <button type=\"button\" class=\"btn btn-primary p-1\" data-toggle=\"modal\" data-target=\"#exampleModalLogin\">
                                    เข้าสู่ระบบ
                                </button>
                            </li>
                        </ul>
                    </nav>

                </div>
            </header>
    ";

    echo $navbar;
}

function carusel($id, $headername, $typenews, $detail, $image, $preveiw, $postdate){
    $list = "
        <div class=\"carousel-item active\">
          <img src=\"assets/image/test/wall1.jpeg\" class=\"d-block h-50 w-100\" alt=\"...\">
          <div class=\"carousel-caption d-none d-md-block\">
            <h5>First slide label</h5>
            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
          </div>
        </div>
    ";
    echo $list;
}

function sectionhead($text){
    $section = "
        <section class=\"breadcrumbs\">
          <div class=\"container\">

            <div class=\"d-flex justify-content-between align-items-center\">
              <h2>$text</h2>

              <ol>
                <li><a href=\"index.php\">หน้าแรก</a></li>
                <li>$text</li>
              </ol>
            </div>

          </div>
        </section>
    ";
    echo $section;
}
function sectionheadDetail_new($text){
  $section = "
      <section class=\"breadcrumbs\">
        <div class=\"container\">

          <div class=\"d-flex justify-content-between align-items-center\">
            <h2>$text</h2>

            <ol>
              <li><a href=\"index.php\">หน้าแรก</a></li>
              <li>ข่าวสาร</li>
              <li>$text</li>
            </ol>
          </div>

        </div>
      </section>
  ";
  echo $section;
}


function articerlist($image, $headertext, $bodytext, $postdate, $view, $type, $id, $authernumber){
    $articer = "
        <article class=\"entry\">

          <div class=\"entry-img\">
            <img src=\"admin/backend/data/news/$image\" alt=\"\" width=\"100%\" class=\"img-fluid\">
          </div>

          <h2 class=\"entry-title\">
            <a href=\"#\">$headertext</a>
          </h2>

          <div class=\"entry-meta\">
            <ul>
              <li class=\"d-flex align-items-center\">
                <i class=\"icofont-user\"></i> 
                <a href=\"#\">เขียนโดย: $authernumber</a>
             </li>
              <li class=\"d-flex align-items-center\">
                <i class=\"icofont-wall-clock\"></i> 
                <a href=\"#\"><time datetime=\"2020-01-01\">$postdate</time></a>
              </li>
              <li class=\"d-flex align-items-center\">
                <i class=\"icofont-comment\"></i> 
                <a href=\"#\">$view view</a>
              </li>
              <li class=\"d-flex align-items-center\">
                <i class=\"icofont-comment\"></i> 
                <a href=\"#\"> $type</a>
              </li>
            </ul>
          </div>

          <div class=\"entry-content\">
            <p class=\"mb-0\">เนื้อหา :</p>
            <p class=\"text-cut mt-0\"> $bodytext</p>
            <div class=\"read-more\">
              <a href=\"detail-news.php?get_id_article=$id&set_view=$view\">อ่านต่อ..</a>
            </div>
          </div>

        </article>
    ";
    echo $articer;
}

function article_list(){

}

function iconbox($number, $city){
  $box = "
      <div class=\"col-xl-3 col-sm-6 col-12\"> 
        <div class=\"card\">
          <div class=\"card-content\">
            <div class=\"card-body\">
              <div class=\"media d-flex\">
                <div class=\"align-self-center\">
                  <i class=\"icon-pencil primary font-large-2 float-left\"></i>
                </div>
                <div class=\"media-body text-right\">
                  <h3>$number</h3>
                  <span>$city</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      ";
      echo $box;
}

function cardproject($dataID,$fullname,$age,$bloodgroup,$address,$photo){
  $card = "
      <div class=\"col-md-12 ml-4 mr-4 mb-4\">
        <div class=\"info-box row mb-0\">
          <div class=\"col-md-4 mb-0\">
            <img src=\"officer/backend/data/orphan-information/$photo\" width=\"100\" height=\"100\" class=\"image-avartar\" />
          </div>
          <div class=\"col-md-8 mb-0\">
              <p class=\"x-name text-cut-x\">$fullname</p>
              <div class=\"row mb-0\">
                <p class=\"ml-3 col-5 x-name\">
                  อายุ: $age ปี
                </p>
                <p class=\"col-6 x-name\">
                  กรุปเลือด $bloodgroup
                </p>
                <p class=\"col-12 x-city\">
                  <i class=\"bx bx-map\"></i>
                  $address
                </p>
                
              </div>
          </div>
        </div>
      </div>
  ";
  echo $card;
}

function newsblogcard($id,$projectnumber,$projectname,$details,$area_x,$imageproject,$start,$end,$project_administrater,$numberSpese){
  $bloglist = "
    <div class=\"col-md-6 mb-3\">
      <div class=\"square\">
        <div class=\"card-img\">
          <img src=\"admin/backend/data/project/$imageproject\" alt=\"\">
        </div>
        <div class=\"card-desc\">
            <div class=\"row ml-2 mb-1\">
              <h3><i class=\"fas fa-star\"></i> $projectname</h3>
              <small class=\"ml-auto mt-2 text-success\"><i class=\"fas fa-street-view\"></i> จำนวนผู้เข้าร่วม: $numberSpese คน</small>
            </div>
            <p class=\"text-cut-card mb-0\"><i class=\"fas fa-location-arrow text-primary\"></i> พื้นที่ดำเนินงาน $area_x </p>
            <div class=\"row mt-0\">
              <small class=\"ml-auto\"><i class=\"far fa-user\"></i> รับผิดชอบโดย: $project_administrater</small>
            </div>
            <button class=\"btn-card\" type=\"button\" data-toggle=\"modal\" data-target=\"#modalListcombo\" id=\"btnComboData\"
              data-id=\"$id\" data-projectnumber=\"$projectnumber\" data-projectname=\"$projectname\" data-details=\"$details\"
              data-area=\"$area_x\" data-imageproject=\"$imageproject\" data-start=\"$start\" data-end=\"$end\"
              data-administarter=\"$project_administrater\" data-numberspese=\"$numberSpese\" onClick=\"ftId($id)\"
            >ดูทั้งหมด</button>   
        </div>
      </div>
    </div>
  ";
  echo $bloglist;
}

function genderSymbol($sexs){
  if($sexs == "ชาย"){
    $l = "<i class=\"fas fa-mars\"></i>";
  }else{
    $l = "<i class=\"fas fa-venus\"></i>";
  }
  return $l;
}
function checkstatus_users($data){
  switch ($data) {
    case 'volunteer':
        return "เจ้าหน้าที่";
      break;
    case 'officer':
        return "อาสาสมัค";
      break;
    case 'chairman':
        return "ประธาน";
      break;
    case 'admin':
        return "ผู้ดูแลระบบ";
      break;
    default:
      return $data;
      break;
  }
}

function fnOurTeam($fullnames, $image, $position_bordx, $sex, $age, $occupation_boardx, $board_status, $id){
  $listTeam = "
    <div class=\"team-area col-lg-3 col-md-6 col-sm-12\">
      <div class=\"inner-box\">
          <ul class=\"social-icons\">
              <li><a href=\"#\"><a></li>
              <li><a href=\"#\"></a></li>
              <li><a href=\"#\"></a></li>
              <li><a href=\"#\"></a></li>
          </ul>
          <div class=\"image\">
              <a href=\"#\"><img src=\"admin/backend/data/board/$image\" alt=\"\"></a>
          </div>
          <div class=\"lower-content\">
              <h4>$fullnames</h4>
              <div class=\"designation\">$position_bordx</div>
          </div>
      </div>
    </div>
  ";
  echo $listTeam;
}

function boardOurTeam($fullnamess, $b_image, $position_bord, $b_sex, $b_age, $occupation_board, $call, $b_id){
  $board_list ="
    <div class=\"col-md-2 col-8 profile-box border p-1 rounded text-center mr-4 mb-4 bg-light\">
      <img src=\"admin/backend/data/board/$b_image\" class=\"w-100 mb-1\">
      <h5 class=\"m-0\"><strong>$fullnamess</strong></h5>
      <p class=\"mb-2\">$position_bord</p>
      <div class=\"col-12 row ml-1\">
        <small class=\"mr-auto ml-2\">อายุ: $b_age</small>
        <small class=\"ml-auto mr-2\">เพศ: $b_sex</small>
      </div>
      <small>อาชีพ: $occupation_board</small>
    </div>
  ";
  echo $board_list;
}

?>