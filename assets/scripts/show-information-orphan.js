
class editImage extends HTMLElement {
    constructor() {
      super();
    }
    get count() {
      return this.getAttribute("count");
    }
    get names() {
      return this.getAttribute("names");
    }
    get defaultbtn() {
      return this.getAttribute("setdefault");
    }
    get custom() {
      return this.getAttribute("custom");
    }
    get filenames() {
      return this.getAttribute("filenames");
    }
    get wrapper() {
      return this.getAttribute("wrapper");
    }
    get cancle() {
      return this.getAttribute("cancles");
    }
    connectedCallback() {
      this.renderImage();
    }
    renderImage() {
      this.innerHTML = `
              <div class="container">
                  <div class="wrapper ${this.wrapper}">
                      <div class="image">
                         <img src="" alt="" class="${this.id}"> 
                      </div>
                      <div class="content">
                          <div class="icon">
                              <i class="fas fa-cloud-upload-alt"></i>
                          </div>
                          <div class="text">${this.names}</div>
                      </div>
                      <div class="btnCancle ${this.cancle}">
                          <i class="fas fa-times"></i>
                      </div>
                      <div class="file-name ${this.filenames}">File name hear</div>
                  </div>
                  <input type="file" name="${this.count}" class="${this.defaultbtn}" hidden>
                  <p class="BtnCustom" id="${this.custom}">Choose a file</p> 
              </div>
          `;
    }
}
customElements.define("main-edit-image", editImage)

const setImagePriviews = (
    getImage,
    setDefaultFile,
    setCustomBtn,
    btnCancle,
    getImgNames,
    setWrapper
) => {
    let setwrapper = document.querySelector(setWrapper);
    let setImgName = document.querySelector(getImgNames);
    let setBtncancle = document.querySelector(btnCancle);
    let typeImg = document.querySelector(getImage);
    let defaultInput = document.querySelector(setDefaultFile);
    let CustomButton = document.querySelector(setCustomBtn);
    let setExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
  
    CustomButton.onclick = function () {
      defaultInput.click();
    };
    defaultInput.addEventListener("change", function () {
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function () {
          const result = reader.result;
          typeImg.src = result;
          setwrapper.classList.add("active");
        };
        setBtncancle.addEventListener("click", function () {
          typeImg.src = "";
          setwrapper.classList.remove("active");
        });
        reader.readAsDataURL(file);
      }
      if (this.value) {
        let valueStore = this.value.match(setExp);
        setImgName.textContent = valueStore;
      }
    });
};

class modaleditOne extends HTMLElement{
    connectedCallback(){
        this.renderOne()
    }
    renderOne(){
        this.innerHTML = `
            <div class="modal fade bd-example-modal-xl" id="modaleditOne" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">แก้ไข ข้อมูล</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="backend/edit-show-information-orphan.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="formgroup" value="oneformdata" />
                            <input type="hidden" name="orphan_id" id="formoneid"/>
                            <input type="hidden" name="my_image" id="myimagename"/>
                            <div class="modal-body row">
                                <div class="col-md-3">
                                    <main-edit-image id="meImage" count="me_photo" wrapper="one-wrap" filenames="oneimgname" cancles="me-cancle"
                                        names="รูปเด็กกำพร้า" custom="setbtnEdit" setdefault="setDefaultImgorphan">
                                    </main-edit-image>
                                </div>
                                <div class="col-md-9 row">
                                    <div class="form-group mb-2 col-2">
                                      <label class="mb-0 text-primary" for="Fullname">title</label>
                                        <select class="form-control" name="title_me" id="title_me">
                                            <option value="เด็กชาย">เด็กชาย</option>
                                            <option value="เด็กหญิง">เด็กหญิง</option>
                                            <option value="นาย">นาย</option>
                                            <option value="นางสาว">นางสาว</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-6">
                                      <label for="firstname" class="mb-0 text-warning">first name</label>
                                      <input type="text" class="form-control" name="firstname" id="firstname" placeholder="" required />
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-4">
                                      <label for="lastname" class="mb-0 text-warning">last name</label>
                                      <input type="text" class="form-control" name="lastname" id="lastname" placeholder="" required />
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-4">
                                      <label for="cardId" class="mb-0 text-warning">บัตรประชาชน</label>
                                      <input type="text" class="form-control" name="cardid" id="cardId" placeholder="" required />
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-3">
                                      <label for="call" class="mb-0 text-warning">เบอร์โทร</label>
                                      <input type="text" class="form-control" name="call" id="call" placeholder="" required />
                                    </div>
                                    <div class="form-group mb-2 col-3">
                                      <label class="ml-1 mt-0 mb-0 font-weight-bold text-primary">วัน-เดือน-ปี เกิด </label>
                                        <div class="col-xs-5 date">
                                            <div class="input-group input-append date" id="datePicker">
                                                <input type="date" class="form-control" id="edate" name="berd_day_me" />
                                                <span class="input-group-addon add-on">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-2">
                                      <label for="age" class="mb-0 text-warning">อายุ</label>
                                      <input type="number" class="form-control" name="age" id="age" placeholder="" required />
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-2">
                                      <label for="heigh" class="mb-0 text-warning">ส่วนสูง</label>
                                      <input type="number" class="form-control" name="heigh" id="heigh" placeholder="" required />
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-2">
                                      <label for="weigth" class="mb-0 text-warning">น้ำหนัก</label>
                                      <input type="number" class="form-control" name="weigth" id="weigth" placeholder="" required />
                                    </div>
                                    
                                    <div class="form-group mb-0 mt-0 col-2">
                                      <label for="sibingsnumber" class="mb-0 text-warning">จำนวนพี่น้อง</label>
                                      <input type="number" class="form-control" name="sibingsnumber" id="sibingsnumber" placeholder="" required />
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-2">
                                      <label for="menumber" class="mb-0 text-warning">เป็นคนที่</label>
                                      <input type="number" class="form-control" name="menumber" id="menumber" placeholder="" required />
                                    </div>
                                    <div class="col-2">
                                      <label for="blood_group_me" class="mb-0 text-primary">กรุปเลือด</label>
                                      <select class="form-control" name="blood_group_me" id="blood_group_me">
                                          <option value="o">o</option>
                                          <option value="a">a</option>
                                          <option value="b">b</option>
                                          <option value="ab">ab</option>
                                      </select>
                                    </div>
                                </div>
                            </div>
                            <div class="container mb-4">
                                <button type="submit" class="btnAddSubmit">Save Student History</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        `
    }
}
customElements.define('main-edit-one', modaleditOne)
    setImagePriviews(".meImage",".setDefaultImgorphan","#setbtnEdit",".me-cancle i",".oneimgname",".one-wrap")

  $(document).on("click","#editonebtn", function(evt){
    let oneId = $(this).data('id'), profile = $(this).data('img'),titleMe = $(this).data('title')
    let firstname = $(this).data('fname'), lastname = $(this).data('lname'), cardId = $(this).data('cardid')
    let call = $(this).data('call'), heigh = $(this).data('heigh'), weigth = $(this).data('weigth')
    let bloodgroup = $(this).data('bloodgroup'),berdday = $(this).data('berdday'), age = $(this).data('age')
    let sibingsnumber = $(this).data('sibingsnumber'), menumber = $(this).data('menumber')

    $('#title_me').val(titleMe)
    $('#firstname').val(firstname)
    $('#lastname').val(lastname)
    $('#cardId').val(cardId)
    $('#call').val(call)
    $('#edate').val(berdday)
    $('#age').val(age)
    $('#heigh').val(heigh)
    $('#weigth').val(weigth)
    $('#sibingsnumber').val(sibingsnumber)
    $('#menumber').val(menumber)
    $('#blood_group_me').val(bloodgroup)
    $('#formoneid').val(oneId)
    $('.meImage').attr('src',`backend/data/orphan-information/${profile}`)
    $("#myimagename").val(profile)
    //console.log(profile)

  })

class modaleditTrue extends HTMLElement{
  connectedCallback(){
    this.renderTrue()
  }
  renderTrue(){
    this.innerHTML = `
      <div class="modal fade" id="modaleditTrue" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <form action="backend/edit-show-information-orphan.php" method="post">
              <div class="modal-body row">
                <input type="hidden" name="formgroup" value="trueformdata"/>
                <input type="hidden" name="formtrueid" id="gettrueID" />
                <div class="form-group mb-0 mt-0 col-3">
                  <label for="firstname" class="mb-0 text-warning">บ้านเลขที่</label>
                  <input type="text" class="form-control" name="home_id" id="homeId" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-4">
                  <label for="firstname" class="mb-0 text-warning">ตำบล</label>
                  <input type="text" class="form-control" name="district_home" id="districtHome" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-5">
                  <label for="firstname" class="mb-0 text-warning">อำเภอ</label>
                  <input type="text" class="form-control" name="amphoe_home" id="amphoehome" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-5">
                  <label for="firstname" class="mb-0 text-warning">จังหวัด</label>
                  <input type="text" class="form-control" name="province_home" id="provincehome" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-3">
                  <label for="firstname" class="mb-0 text-warning">รหัสไปรษณีย์</label>
                  <input type="text" class="form-control" name="zipcode_home" id="zipcodehome" placeholder="" required />
                </div>
              </div>
              <div class="container mb-4">
                  <button type="submit" class="btnAddSubmit">Save Student History</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    `
  }
}
customElements.define('main-edit-true', modaleditTrue)
 $(document).on("click","#edittruebtn", function(evt){
   let trueId = $(this).data('id'), homeId = $(this).data('homeid'),districtHome = $(this).data('districthome')
   let amphoehome = $(this).data('amphoehome'), provincehome = $(this).data('provincehome'), zipcodehome = $(this).data('zipcodehome')

   $('#gettrueID').val(trueId)
   $('#homeId').val(homeId)
   $('#districtHome').val(districtHome)
   $('#amphoehome').val(amphoehome)
   $('#provincehome').val(provincehome)
   $('#zipcodehome').val(zipcodehome)
 })

class modaleditTree extends HTMLElement{
  connectedCallback(){
    this.renderTree()
  }
  renderTree(){
    this.innerHTML = `
      <div class="modal fade" id="modaleditTree" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <form action="backend/edit-show-information-orphan.php" method="post">
              <div class="modal-body row">
                <input type="hidden" name="formgroup" value="treeformdata"/>
                <input type="hidden" name="formtreeid" id="gettreeID" />
                <div class="form-group mb-0 mt-0 col-3">
                  <label for="firstname" class="mb-0 text-warning">ชื่อโรงเรียนประถม</label>
                  <input type="text" class="form-control" name="school_name" id="schoolname" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-4">
                  <label for="firstname" class="mb-0 text-warning">ตำบล</label>
                  <input type="text" class="form-control" name="district_school" id="districtschool" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-5">
                  <label for="firstname" class="mb-0 text-warning">อำเภอ</label>
                  <input type="text" class="form-control" name="amphoe_school" id="amphoeschool" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-5">
                  <label for="firstname" class="mb-0 text-warning">จังหวัด</label>
                  <input type="text" class="form-control" name="province_school" id="provinceschool" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-3">
                  <label for="firstname" class="mb-0 text-warning">รหัสไปรษณีย์</label>
                  <input type="text" class="form-control" name="zipcode_school" id="zipcodeschool" placeholder="" required />
                </div>
              </div>
              <div class="container mb-4">
                  <button type="submit" class="btnAddSubmit">Save Student History</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    `
  }
}
customElements.define('main-edit-tree', modaleditTree)

 $(document).on("click","#edittreebtn", function(evt){
   let treeId = $(this).data('id'), schoolname = $(this).data('schoolname'), districtschool = $(this).data('districtschool')
   let amphoeschool = $(this).data('amphoeschool'), provinceschool = $(this).data('provinceschool'), zipcodeschool = $(this).data('zipcodeschool')

   $('#gettreeID').val(treeId)
   $('#schoolname').val(schoolname)
   $('#districtschool').val(districtschool)
   $('#amphoeschool').val(amphoeschool)
   $('#provinceschool').val(provinceschool)
   $('#zipcodeschool').val(zipcodeschool)
 })

 class modaleditFour extends HTMLElement{
  connectedCallback(){
    this.renderFour()
  }
  renderFour(){
    this.innerHTML = `
      <div class="modal fade" id="modaleditFour" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <form action="backend/edit-show-information-orphan.php" method="post">
              <div class="modal-body row">
                <input type="hidden" name="formgroup" value="fourformdata"/>
                <input type="hidden" name="formfourid" id="getfourID" />
                <div class="form-group mb-0 mt-0 col-3">
                  <label for="firstname" class="mb-0 text-warning">ชื่อโรงเรียนมัถยม</label>
                  <input type="text" class="form-control" name="school_name2" id="schoolname2" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-4">
                  <label for="firstname" class="mb-0 text-warning">ตำบล</label>
                  <input type="text" class="form-control" name="district_school2" id="districtschool2" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-5">
                  <label for="firstname" class="mb-0 text-warning">อำเภอ</label>
                  <input type="text" class="form-control" name="amphoe_school2" id="amphoeschool2" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-5">
                  <label for="firstname" class="mb-0 text-warning">จังหวัด</label>
                  <input type="text" class="form-control" name="province_school2" id="provinceschool2" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-3">
                  <label for="firstname" class="mb-0 text-warning">รหัสไปรษณีย์</label>
                  <input type="text" class="form-control" name="zipcode_school2" id="zipcodeschool2" placeholder="" required />
                </div>
              </div>
              <div class="container mb-4">
                  <button type="submit" class="btnAddSubmit">Save Student History</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    `
  }
}
customElements.define('main-edit-four', modaleditFour)

$(document).on('click','#editfourbtn', function(e){
    let fourId = $(this).data('id'), nameschool2 = $(this).data('school2'),schooldistrict = $(this).data('schooldistrict')
    let schoolamphoe = $(this).data('schoolamphoe'), schoolprovince = $(this).data('schoolprovince'),schoolzipcode = $(this).data('schoolzipcode')

    $('#getfourID').val(fourId)
    $("#schoolname2").val(nameschool2)
    $("#districtschool2").val(schooldistrict)
    $("#amphoeschool2").val(schoolamphoe)
    $("#provinceschool2").val(schoolprovince)
    $("#zipcodeschool2").val(schoolzipcode)

})

class modaleditFive extends HTMLElement{
  connectedCallback(){
    this.renderFive()
  }
  renderFive(){
    this.innerHTML = `
      <div class="modal fade bd-example-modal-xl" id="modaleditFive" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <form action="backend/edit-show-information-orphan.php" method="post">
              <div class="modal-body row">
                <input type="hidden" name="formgroup" value="fiveformdata"/>
                <input type="hidden" name="formfiveid" id="getfiveID" />
                <div class="form-group mb-0 mt-0 col-3">
                  <label for="fathername" class="mb-0 text-purper">ชื่อ-นามสกุล(บิดา)</label>
                  <input type="text" class="form-control" name="fathername" id="fathername" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-2">
                  <label for="occupationfather" class="mb-0 text-warning">อาชีพ</label>
                  <input type="text" class="form-control" name="occupation_father" id="occupationfather" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-1">
                  <label for="incomefather" class="mb-0 text-warning">รายได้</label>
                  <input type="text" class="form-control" name="income_father" id="incomefather" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-2">
                  <label class="ml-1 mt-0 mb-0 font-weight-bold text-primary">วัน-เดือน-ปี เกิด </label>
                    <div class="col-xs-5 date">
                        <div class="input-group input-append date" id="datePicker">
                            <input type="date" class="form-control" id="edatefather" name="berd_day_father" />
                            <span class="input-group-addon add-on">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-0 mt-0 col-1">
                  <label for="agefather" class="mb-0 text-warning">อายุ</label>
                  <input type="number" class="form-control" name="age_father" id="agefather" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-3">
                  <label for="tellfather" class="mb-0 text-warning">เบอร์โทร</label>
                  <input type="text" class="form-control" name="tell_mather" id="tellfather" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-3">
                  <label for="statusfather" class="mb-0 text-warning">สถานะภาพ</label>
                  <select class="form-control" name="status_father" id="statusfather">
                      <option value="ยังมีชีวิตอยู่">ยังมีชีวิตอยู่</option>
                      <option value="เสียชีวิต">เสียชีวิต</option>
                  </select>
                </div>
                <div class="col-9"></div>
                <div class="form-group mb-0 mt-0 col-3">
                  <label for="mathername" class="mb-0 text-greenfer">ชื่อ-นามสกุล(มารดา)</label>
                  <input type="text" class="form-control" name="mathername" id="mathername" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-2">
                  <label for="occupationmather" class="mb-0 text-warning">อาชีพ</label>
                  <input type="text" class="form-control" name="occupation_mather" id="occupationmather" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-1">
                  <label for="incomemather" class="mb-0 text-warning">รายได้</label>
                  <input type="text" class="form-control" name="income_mather" id="incomemather" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-2">
                  <label class="ml-1 mt-0 mb-0 font-weight-bold text-primary">วัน-เดือน-ปี เกิด </label>
                    <div class="col-xs-5 date">
                        <div class="input-group input-append date" id="datePicker">
                            <input type="date" class="form-control" id="edatemather" name="berd_day_mather" />
                            <span class="input-group-addon add-on">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-0 mt-0 col-1">
                  <label for="agemather" class="mb-0 text-warning">อายุ</label>
                  <input type="number" class="form-control" name="age_mather" id="agemather" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-3">
                  <label for="tellmather" class="mb-0 text-warning">เบอร์โทร</label>
                  <input type="text" class="form-control" name="tell_mather" id="tellmather" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-3">
                  <label for="statusmather" class="mb-0 text-warning">สถานะภาพ</label>
                  <select class="form-control" name="status_mather" id="statusmather">
                      <option value="ยังมีชีวิตอยู่">ยังมีชีวิตอยู่</option>
                      <option value="เสียชีวิต">เสียชีวิต</option>
                  </select>
                </div>
              </div>
              <div class="container mb-4">
                  <button type="submit" class="btnAddSubmit">Save Student History</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    `
  }
}
customElements.define('main-edit-five', modaleditFive)
 $(document).on("click","#editfivebtn", function(e){
   let fiveId = $(this).data('id'), fathername = $(this).data('fathername'),occupationfather = $(this).data('occupationfather')
   let incomefather = $(this).data('incomefather'),berddayfather = $(this).data('berddayfather'),agefather = $(this).data('agefather')
   let tellfather = $(this).data('tellfather'),statusfather = $(this).data('statusfather'),statusmather=$(this).data('statusmather')
   let mathername = $(this).data('mathername'),occupationmather = $(this).data('occupationmather'),incomemather=$(this).data('incomemather')
   let berddaymather = $(this).data('berddaymather'),agemather = $(this).data('agemather'),tellmather = $(this).data('tellmather')

   $("#getfiveID").val(fiveId)
   $("#fathername").val(fathername)
   $("#occupationfather").val(occupationfather)
   $("#incomefather").val(incomefather)
   $("#edatefather").val(berddayfather)
   $("#agefather").val(agefather)
   $("#tellfather").val(tellfather)
   $("#statusfather").val(statusfather)
   $("#mathername").val(mathername)
   $("#occupationmather").val(occupationmather)
   $("#incomemather").val(incomemather)
   $("#edatemather").val(berddaymather)
   $("#agemather").val(agemather)
   $("#tellmather").val(tellmather)
   $("#statusmather").val(statusmather)

 })

 class modaleditSix extends HTMLElement{
   connectedCallback(){
      this.renderSix()
   }
   renderSix(){
      this.innerHTML = `
      <div class="modal fade bd-example-modal-xl" id="modaleditSix" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <form action="backend/edit-show-information-orphan.php" method="post" enctype="multipart/form-data">
              <div class="modal-body row">
                  <input type="hidden" name="formgroup" value="sixformdata"/>
                  <input type="hidden" name="formsixid" id="getsixID" />
                  <div class="form-group mb-0 mt-0 col-3">
                    <label for="statusfamily" class="mb-0 text-purper">สถานะครอบครัว</label>
                    <input type="text" class="form-control" name="status_family" id="statusfamily" placeholder="" required />
                  </div>
                  <div class="form-group mb-0 mt-0 col-2">
                    <label for="revenuefamily" class="mb-0 text-purper">รายได้ครอบครัว</label>
                    <input type="number" class="form-control" name="revenue_family" id="revenuefamily" placeholder="" required />
                  </div>
                  <div class="form-group mb-0 mt-0 col-2">
                    <label for="statusfamily" class="mb-0 text-purper">ระดับความช่วยเหลือ</label>
                    <select class="form-control" name="level_holp" id="levelhelp">
                        <option value="ปกติ">ปกติ</option>
                        <option value="ปานกลาง">ปานกลาง</option>
                        <option value="เร่งด่วน">เร่งด่วน</option>
                    </select>
                  </div>
                  <div class="form-group mb-0 mt-0 col-3">
                    <label for="estimatehelp" class="mb-0 text-purper">ต้องการความช่วยเหลือ</label>
                    <select class="form-control" name="estimate_help" id="estimatehelp">
                        <option value="ด้านร่างกาย">ด้านร่างกาย</option>
                        <option value="ด้านอารมณ์และจิตใจ">ด้านอารมณ์และจิตใจ</option>
                        <option value="ด้านสังคม">ด้านสังคม</option>
                        <option value="ด้านเศรษฐกิจ">ด้านเศรษฐกิจ</option>
                    </select>
                  </div>
                  <div class="form-group mb-0 mt-0 col-2">
                    <label for="deceased" class="mb-0 text-purper">ผู้เสียชีวิต</label>
                    <select class="form-control" name="deceased" id="deceased">
                        <option value="พ่อเสียชีวิต">พ่อเสียชีวิต</option>
                        <option value="แม่เสียชีวิต">แม่เสียชีวิต</option>
                        <option value="เสียชีวิตทั้งพ่อและแม่">เสียชีวิตทั้งพ่อและแม่</option>
                    </select>
                  </div>
                  <div class="form-group mb-0 mt-0 col-3">
                    <label for="statusfamily" class="mb-0 text-purper">สาเหตุที่เสียชีวิต</label>
                    <input type="text" class="form-control" name="cause_death" id="causedeath" placeholder="" required />
                  </div>
                  <div class="col-2">
                    <div class="form-group mb-2">
                      <label class="ml-1 mt-0 mb-0 text-danger">วันที่เสียชีวิต </label>
                        <div class="col-xs-5 date">
                            <div class="input-group input-append date" id="datePicker">
                                <input type="date" class="form-control" id="deathday" name="death_day" />
                                <span class="input-group-addon add-on">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="form-group mb-0 mt-0 col-2">
                    <label for="yearstudy" class="mb-0 text-purper">ปีการศึกษา</label>
                    <input type="text" class="form-control" name="year_study" id="yearstudy" placeholder="" required />
                  </div>
                  <div class="col-2">
                    <label for="studystatus" class="mb-0 text-secondary">สถานะการเรียน</label>
                      <select class="form-control" name="study_status" id="studystatus">
                        <option selected disabled hidden>ระบุ..</option>
                        <option value="กำลังเรียน">กำลังเรียน</option>
                        <option value="หยุดเรียน">หยุดเรียน</option>
                        <option value="เรียนจบ">เรียนจบ</option>
                      </select>
                  </div>
                  <div class="form-group mb-0 mt-0 col-3">
                    <label for="causestopstudy" class="mb-0 text-purper">สาเหตุที่หยุดเรียน</label>
                    <input type="text" class="form-control" name="cause_stop_study" id="causestopstudy" placeholder="" required />
                  </div>
              </div>
              <div class="container mb-4">
                  <button type="submit" class="btnAddSubmit">Save Student History</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      `
   }
 }
customElements.define('main-edit-six', modaleditSix)
$(document).on("click","#editsixbtn", function(evn){
    let sixId = $(this).data('id'),familystatus = $(this).data('familystatus'),levelhelp=$(this).data('levelhelp'),estimatehelp = $(this).data('estimatehelp');
    let revenuefamily = $(this).data('revenuefamily'),deceased = $(this).data('deceased'),causedeath = $(this).data('causedeath'),deathday = $(this).data('deathday');
    let studystatus = $(this).data('studystatus'),yearstudy= $(this).data('yearstudy'),causestopstudy = $(this).data('causestopstudy');

    $("#getsixID").val(sixId)
    $("#statusfamily").val(familystatus)
    $("#revenuefamily").val(revenuefamily)
    $("#deceased").val(deceased)
    $("#estimatehelp").val(estimatehelp)
    $("#levelhelp").val(levelhelp)
    $("#causedeath").val(causedeath)
    $("#studystatus").val(studystatus)
    $("#yearstudy").val(yearstudy)
    $("#deathday").val(deathday)
    $("#causestopstudy").val(causestopstudy)

})


 class modaleditSeven extends HTMLElement{
   connectedCallback(){
      this.renderSeven()
   }
   renderSeven(){
      this.innerHTML = `
        <div class="modal fade bd-example-modal-sm" id="modaleditSeven" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <form action="backend/edit-show-information-orphan.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="formgroup" value="sevenformdata"/>
                <input type="hidden" name="formsevenid" id="getsevenID" />
                <input type="hidden" name="home_image_name" id="homeimagename"/>
                <div class="modal-body">
                  <div class="container">
                    <div class="wrapper true-wrap">
                        <div class="image">
                           <img src="" alt="" class="homeImg"> 
                        </div>
                        <div class="content">
                            <div class="icon">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </div>
                            <div class="text">รูปบ้าน</div>
                        </div>
                        <div class="btnCancle home-cancle">
                            <i class="fas fa-times"></i>
                        </div>
                        <div class="file-name trueimgname">File name hear</div>
                    </div>
                    <input type="file" name="home_photo" class="setDefaultImghome" hidden>
                    <p class="BtnCustom" id="setbtnhome">Choose a file</p> 
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-sm btn-primary ml-auto">save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      `
   }
 }
customElements.define('main-edit-seven', modaleditSeven)
setImagePriviews(".homeImg",".setDefaultImghome","#setbtnhome",".home-cancle i",".trueimgname",".true-wrap")
 $(document).on("click","#editsevenbtn", function(e){
    let sevenID = $(this).data('id'), imagehome = $(this).data('homeimage')

    $("#getsevenID").val(sevenID)
    $(".homeImg").attr('src',`backend/data/orphan-information/${imagehome}`)
    $("#homeimagename").val(imagehome)

 })