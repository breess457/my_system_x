<?php
    include_once("../../function/link.php");
    include_once("../../function/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Backend</title>
</head>
<body>
<script type="text/javascript">
  const MySetSweetAlert =(Icons,Titles,Texts)=>{
      Swal.fire({
          icon: Icons,
          title: Titles,
          text:Texts,
          confirmButtonText:"OK"
      }).then((result)=>{
           window.location = '../orphan_information.php'
      })
  }
</script>
<?php
    date_default_timezone_set("Asia/Bangkok");
    function setImgpath($nameImg){
        $ext = pathinfo(basename($_FILES[$nameImg]["name"]), PATHINFO_EXTENSION);
          if($ext !=""){
              $new_img_name = "img_".uniqid().".".$ext;
              
              $uploadPath = 'data/orphan-information/'.$new_img_name;
              move_uploaded_file($_FILES[$nameImg]["tmp_name"],$uploadPath);
              $newImage = $new_img_name;
              
          }else{
              $newImage = $new_img_name;
              
          }
          return $newImage;
      }

     if($_SERVER['REQUEST_METHOD'] === "POST"){

        /* Form Group One */
        $day_add_orphan = date('Y-m-d');
        $title_me = $_POST['title_me'];
        $first_name_me = $_POST['first_name_me'];
        $last_name_me = $_POST['last_name_me'];
        $berd_day_me = $_POST['berd_day_me'];
        $age_me = $_POST['age_me'];
        $heigh_me = $_POST['heigh_me'];
        $weigth_me = $_POST['weigth_me'];
        $blood_group_me = $_POST['blood_group_me'];
        $card_id = $_POST['card_id'];
        $call_me = $_POST['call_me'];
        $siblings_number = $_POST['siblings_number'];
        $me_number = $_POST['me_number'];
        
        $selectCard_id = mysqli_query($conn, "SELECT card_id FROM formone_orphan_record WHERE card_id='$card_id'");
          $num_rows = mysqli_num_rows($selectCard_id);
            if($num_rows == 1){
                echo "<script type=\"text/javascript\">
                            MySetSweetAlert(\"error\",\"เลขบัตรประชาชน ซ้ำ\",\"มี เลขบัตรประชาชน นี้อยู่แล้วโปรดสร้าง เลขบัตรประชาชน ใหม่\")
                      </script>";
            }else{
                $insertform_one = "INSERT INTO formone_orphan_record SET day_add_record='$day_add_orphan', title_me='$title_me', first_name_me='$first_name_me', last_name_me='$last_name_me',
                    berd_day_me='$berd_day_me', age_me='$age_me', heigh_me='$heigh_me', weigth_me='$weigth_me', blood_group_me='$blood_group_me', card_id='$card_id', call_me='$call_me',
                    siblings_number='$siblings_number', me_number='$me_number', profile_orphan='".setImgpath("orphan_image")."'
                ";
                  $query_one = mysqli_query($conn, $insertform_one)or die(mysqli_error());
                   if($query_one){
                       $insertID = mysqli_insert_id($conn);
                  
                        /* Form Group True */
                        $home_id = $_POST['home_id'];
                        $district = $_POST['district'];
                        $amphoe = $_POST['amphoe'];
                        $province = $_POST['province'];
                        $zipcode = $_POST['zipcode'];
                        $school_name = $_POST['school_name'];
                        $district_school = $_POST['district_school'];
                        $amphoe_school = $_POST['amphoe_school'];
                        $province_school = $_POST['province_school'];
                        $zipcode_school = $_POST['zipcode_school'];
                        $shool2_name = $_POST['shool2_name'];
                        $district_shool2 = $_POST['district_shool2'];
                        $amphoe_shool2 = $_POST['amphoe_shool2'];
                        $province_shool2 = $_POST['province_shool2'];
                        $zipcode_shool2 = $_POST['zipcode_shool2'];

                        /* Form Group Tree */
                        $title_father = $_POST['title_father'];
                        $firstname_father = $_POST['firstname_father'];
                        $lastname_father = $_POST['lastname_father'];
                        $join_fullname_father = join(array($title_father," ",$firstname_father,"  ",$lastname_father));
                        $occupation_father = $_POST['occupation_father'];
                        $income_father = $_POST['income_father'];
                        $berd_day_father = $_POST['berd_day_father'];
                        $age_father = $_POST['age_father'];
                        $tell_father = $_POST['tell_father'];
                        $status_father = $_POST['status_father']; //end father
                        $title_mather = $_POST['title_mather'];
                        $firstname_mather = $_POST['firstname_mather'];
                        $lastname_mather = $_POST['lastname_mather'];
                        $join_fullname_mather = join(array($title_mather," ",$firstname_mather,"  ",$lastname_mather));
                        $occupation_mather = $_POST['occupation_mather'];
                        $income_mather = $_POST['income_mather'];
                        $berd_day_mather = $_POST['berd_day_mather'];
                        $age_mather = $_POST['age_mather'];
                        $tell_mather = $_POST['tell_mather'];
                        $status_mather = $_POST['status_mather'];

                        /* Form Group Four */
                        //$image_home = $_FILES['image_home']['name'];
                        $family_status = $_POST['family_status'];
                        $level_help = $_POST['level_help'];
                        $estimate_help = $_POST['estimate_help'];
                        $revenue_family = $_POST['revenue_family'];
                        $deceased = $_POST['deceased'];
                        $cause_death = $_POST['cause_death'];
                        $death_day = $_POST['death_day'];
                        $study_status = $_POST['study_status'];
                        $year_study = $_POST['year_study'];
                        $cause_stop_study = $_POST['cause_stop_study'];

                         $insertform_true = "INSERT INTO formtrue_orphan_school SET home_id='$home_id', district_home='$district', amphoe_home='$amphoe',
                            province_home='$province', zipcode_home='$zipcode', school_name='$school_name', district_school='$district_school',
                            amphoe_school='$amphoe_school', province_school='$province_school', zipcode_school='$zipcode_school', school2_name='$shool2_name', 
                            district_school2='$district_shool2', amphoe_school2='$amphoe_shool2', province_school2='$province_shool2', 
                            zipcode_school2='$zipcode_shool2', getid_jion_orphan='$insertID'
                         ";
                         $insertform_tree = "INSERT INTO formtree_parents_orphan SET join_id_orphan='$insertID', fullname_father='$join_fullname_father', occupation_father='$occupation_father', 
                            income_father='$income_father', berd_day_father='$berd_day_father', age_father='$age_father', tell_father='$tell_father', status_father='$status_father',
                            fullname_mather='$join_fullname_mather', occupation_mather='$occupation_mather', income_mather='$income_mather', berd_day_mather='$berd_day_mather', age_mather='$age_mather',
                            tell_mather='$tell_mather', status_mather='$status_mather'
                         ";
                         $insertform_four = "INSERT INTO formfour_status_orphan SET id_join_orphan='$insertID', image_home='".setImgpath("image_home")."', family_status='$family_status', level_help='$level_help',
                            estimate_help='$estimate_help', revenue_family='$revenue_family', deceased='$deceased', cause_death='$cause_death', death_day='$death_day', study_status='$study_status',
                            year_study='$year_study', cause_stop_study='$cause_stop_study'
                         ";
                            $query_true = mysqli_query($conn, $insertform_true);
                            $query_tree = mysqli_query($conn, $insertform_tree);
                            $query_four = mysqli_query($conn, $insertform_four);
                                if($query_true & $query_tree & $query_four){
                                    echo "<script type=\"text/javascript\">
                                            MySetSweetAlert(\"success\",\"เรียบร้อย\",\"เพิ่มข้อมูลเด็กกำพร้าเรียบร้อยแล้ว\")
                                        </script>";
                                }else{
                                    echo "<script type=\"text/javascript\">
                                            MySetSweetAlert(\"error\",\"error\",\"เพิ่มข้อมูลล้มเหลว 2\")
                                        </script>";
                                }

                    }else{
                        echo "<script type=\"text/javascript\">
                                 MySetSweetAlert(\"error\",\"ล้มเหลว!\",\"เพิ่มข้อมูลล้มเหลว ไม่สามารถเพิ่มได้ติดต่อแอดมิน\")
                             </script>";
                    }
                }
     }else if($_SERVER['REQUEST_METHOD'] === "GET"){
         echo $_SERVER['REQUEST_METHOD'];
     }else{
         echo $_SERVER['REQUEST_METHOD'];
     }
?>
</body>
</html>