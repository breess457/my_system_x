
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
                  <p class="BtnCustom" id="${this.custom}">อัพโหลดไฟล์</p> 
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

function setNumber(number, getD){
  let getIds = document.getElementById(getD).value;
  let classID = document.getElementById(getD)
  let parseintId = parseInt(getIds)
    if(getIds.length === number){
      classID.className = "form-control"
    }else if(getIds.length < number){
      classID.className = "form-control is-invalid"
    }
}
function remakeDate(dateId,ageId){
  let edate = document.getElementById(dateId)
   edate.addEventListener('change', function handleClick(){
    let newEdtate = new Date(edate.value)
       let monthDffi = Date.now() - newEdtate.getTime()
      let ageDt = new Date(monthDffi)
      let year = ageDt.getUTCFullYear()
      let age = Math.abs(year - 1970) 
      return document.getElementById(ageId).value = age
      //console.log(age)
   })
}

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
                                      <label class="mb-0 text-dark" for="Fullname">title</label>
                                        <select class="form-control" name="title_me" id="title_me">
                                            <option value="เด็กชาย">เด็กชาย</option>
                                            <option value="เด็กหญิง">เด็กหญิง</option>
                                            <option value="นาย">นาย</option>
                                            <option value="นางสาว">นางสาว</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-6">
                                      <label for="firstname" class="mb-0 text-dark">first name</label>
                                      <input type="text" class="form-control" name="firstname" id="firstname" placeholder="" required />
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-4">
                                      <label for="lastname" class="mb-0 text-dark">last name</label>
                                      <input type="text" class="form-control" name="lastname" id="lastname" placeholder="" required />
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-4">
                                      <label for="cardId" class="mb-0 text-dark">บัตรประชาชน</label>
                                      <input type="text" class="form-control" name="cardid" id="cardId" placeholder="" minlength="13" maxlength="13" onkeyup="setNumber(13,'cardId')"  required />
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-3">
                                      <label for="call" class="mb-0 text-dark">เบอร์โทร</label>
                                      <input type="text" class="form-control" name="call" id="call" placeholder="" minlength="10" maxlength="10" onkeyup="setNumber(10,'call')" required />
                                    </div>
                                    <div class="form-group mb-2 col-3">
                                      <label class="ml-1 mt-0 mb-0 font-weight-bold text-dark">วัน-เดือน-ปี เกิด </label>
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
                                      <label for="age" class="mb-0 text-dark">อายุ</label>
                                      <input type="number" class="form-control" name="age" id="age" placeholder="" required />
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-2">
                                      <label for="heigh" class="mb-0 text-dark">ส่วนสูง</label>
                                      <input type="number" class="form-control" name="heigh" id="heigh" placeholder="" required />
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-2">
                                      <label for="weigth" class="mb-0 text-dark">น้ำหนัก</label>
                                      <input type="number" class="form-control" name="weigth" id="weigth" placeholder="" required />
                                    </div>
                                    
                                    <div class="form-group mb-0 mt-0 col-2">
                                      <label for="sibingsnumber" class="mb-0 text-dark">จำนวนพี่น้อง</label>
                                      <input type="number" class="form-control" name="sibingsnumber" id="sibingsnumber" placeholder="" required />
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-2">
                                      <label for="menumber" class="mb-0 text-dark">เป็นคนที่</label>
                                      <input type="number" class="form-control" name="menumber" id="menumber" placeholder="" required />
                                    </div>
                                    <div class="col-2">
                                      <label for="blood_group_me" class="mb-0 text-dark">กรุ๊ปเลือด</label>
                                      <select class="form-control" name="blood_group_me" id="blood_group_me">
                                          <option value="o">o</option>
                                          <option value="a">a</option>
                                          <option value="b">b</option>
                                          <option value="ab">ab</option>
                                      </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success ml-auto mr-5">บันทึกข้อมูล</button>
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
    remakeDate("edate","age")

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
                  <label for="firstname" class="mb-0 text-dark">บ้านเลขที่</label>
                  <input type="text" class="form-control" name="home_id" id="homeId" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-4">
                  <label for="firstname" class="mb-0 text-dark">ตำบล</label>
                  <input type="text" class="form-control" name="district_home" id="districtHome" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-5">
                  <label for="firstname" class="mb-0 text-dark">อำเภอ</label>
                  <input type="text" class="form-control" name="amphoe_home" id="amphoehome" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-5">
                  <label for="firstname" class="mb-0 text-dark">จังหวัด</label>
                  <input type="text" class="form-control" name="province_home" id="provincehome" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-3">
                  <label for="firstname" class="mb-0 text-dark">รหัสไปรษณีย์</label>
                  <input type="text" class="form-control" name="zipcode_home" id="zipcodehome" placeholder="" required />
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success ml-auto mr-5">บันทึกข้อมูล</button>
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
                  <label for="firstname" class="mb-0 text-dark">ชื่อโรงเรียนประถม</label>
                  <input type="text" class="form-control" name="school_name" id="schoolname" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-4">
                  <label for="firstname" class="mb-0 text-dark">ตำบล</label>
                  <input type="text" class="form-control" name="district_school" id="districtschool" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-5">
                  <label for="firstname" class="mb-0 text-dark">อำเภอ</label>
                  <input type="text" class="form-control" name="amphoe_school" id="amphoeschool" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-5">
                  <label for="firstname" class="mb-0 text-dark">จังหวัด</label>
                  <input type="text" class="form-control" name="province_school" id="provinceschool" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-3">
                  <label for="firstname" class="mb-0 text-dark">รหัสไปรษณีย์</label>
                  <input type="text" class="form-control" name="zipcode_school" id="zipcodeschool" placeholder="" required />
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success ml-auto mr-5">บันทึกข้อมูล</button>
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
                  <label for="firstname" class="mb-0 text-dark">ชื่อโรงเรียนมัถยม</label>
                  <input type="text" class="form-control" name="school_name2" id="schoolname2" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-4">
                  <label for="firstname" class="mb-0 text-dark">ตำบล</label>
                  <input type="text" class="form-control" name="district_school2" id="districtschool2" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-5">
                  <label for="firstname" class="mb-0 text-dark">อำเภอ</label>
                  <input type="text" class="form-control" name="amphoe_school2" id="amphoeschool2" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-5">
                  <label for="firstname" class="mb-0 text-dark">จังหวัด</label>
                  <input type="text" class="form-control" name="province_school2" id="provinceschool2" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-3">
                  <label for="firstname" class="mb-0 text-dark">รหัสไปรษณีย์</label>
                  <input type="text" class="form-control" name="zipcode_school2" id="zipcodeschool2" placeholder="" required />
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success ml-auto mr-5">บันทึกข้อมูล</button>
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
                  <label for="occupationfather" class="mb-0 text-dark">อาชีพ</label>
                  <input type="text" class="form-control" name="occupation_father" id="occupationfather" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-1">
                  <label for="incomefather" class="mb-0 text-dark">รายได้</label>
                  <input type="text" class="form-control" name="income_father" id="incomefather" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-2">
                  <label class="ml-1 mt-0 mb-0 font-weight-bold text-dark">วัน-เดือน-ปี เกิด </label>
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
                  <label for="agefather" class="mb-0 text-dark">อายุ</label>
                  <input type="number" class="form-control" name="age_father" id="agefather" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-3">
                  <label for="tellfather" class="mb-0 text-dark">เบอร์โทร</label>
                  <input type="text" class="form-control" name="tell_mather" id="tellfather" placeholder="" minlength="10" maxlength="10" onkeyup="setNumber(10,'tellfather')" required />
                </div>
                <div class="form-group mb-0 mt-0 col-3">
                  <label for="statusfather" class="mb-0 text-dark">สถานะภาพ</label>
                  <select class="form-control" name="status_father" id="statusfather">
                      <option selected disabled hidden>ระบุ..</option>
                      <option value="ยังมีชีวิตอยู่">ยังมีชีวิตอยู่</option>
                      <option value="เสียชีวิต">เสียชีวิต</option>
                  </select>
                </div>
                <div class="col-5">
                  <div class="form-group mt-0">
                    <label for="cause_death" class="mb-0 mt-0 text-secondary">สาเหตุที่เสียชีวิต</label>
                    <input type="hidden" class="form-control" name="edit_cause_death_f" id="edit_cause_death_f" value=".." />
                  </div>
                </div>
                <div class="col-4"></div>
                <div class="form-group mb-0 mt-0 col-3">
                  <label for="mathername" class="mb-0 text-dark">ชื่อ-นามสกุล(มารดา)</label>
                  <input type="text" class="form-control" name="mathername" id="mathername" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-2">
                  <label for="occupationmather" class="mb-0 text-dark">อาชีพ</label>
                  <input type="text" class="form-control" name="occupation_mather" id="occupationmather" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-1">
                  <label for="incomemather" class="mb-0 text-dark">รายได้</label>
                  <input type="text" class="form-control" name="income_mather" id="incomemather" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-2">
                  <label class="ml-1 mt-0 mb-0 font-weight-bold text-dark">วัน-เดือน-ปี เกิด </label>
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
                  <label for="agemather" class="mb-0 text-dark">อายุ</label>
                  <input type="number" class="form-control" name="age_mather" id="agemather" placeholder="" required />
                </div>
                <div class="form-group mb-0 mt-0 col-3">
                  <label for="tellmather" class="mb-0 text-dark">เบอร์โทร</label>
                  <input type="text" class="form-control" name="tell_mather" id="tellmather" placeholder="" minlength="10" maxlength="10" onkeyup="setNumber(10,'tellmather')" required />
                </div>
                <div class="form-group mb-0 mt-0 col-3">
                  <label for="statusmather" class="mb-0 text-dark">สถานะภาพ</label>
                  <select class="form-control" name="status_mather" id="statusmather">
                      <option selected disabled hidden>ระบุ..</option>
                      <option value="ยังมีชีวิตอยู่">ยังมีชีวิตอยู่</option>
                      <option value="เสียชีวิต">เสียชีวิต</option>
                  </select>
                </div>
                <div class="col-5">
                  <div class="form-group mt-0">
                    <label for="cause_death" class="mb-0 mt-0 text-secondary">สาเหตุที่เสียชีวิต</label>
                    <input type="hidden" class="form-control" name="edit_cause_death_m" id="edit_cause_death_m" value=".." />
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success ml-auto mr-5">บันทึกข้อมูล</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    `
  }
}
customElements.define('main-edit-five', modaleditFive)
remakeDate("edatefather","agefather")
remakeDate("edatemather","agemather")

function checkFuck(idstatusstudy,statusinput,f1){
  const studystatusid = document.getElementById(idstatusstudy)
  studystatusid.addEventListener('change',function handleFuck(){
      if(studystatusid.value == f1){
        statusinput.setAttribute("type","text")
      }else{
        statusinput.setAttribute("type","hidden")
      }
  })
  //ไอสัส
}
checkFuck("statusmather",document.getElementById("edit_cause_death_m"),"เสียชีวิต")
checkFuck("statusfather",document.getElementById("edit_cause_death_f"),"เสียชีวิต")

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
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <form action="backend/edit-show-information-orphan.php" method="post" enctype="multipart/form-data">
              <div class="modal-body row"> 
                  <input type="hidden" name="formgroup" value="sixformdata"/>
                  <input type="hidden" name="formsixid" id="getsixID" />
                  <div class="form-group mb-0 mt-0 col-12">
                    <label for="statusfamily" class="mb-0 text-purper">สถานภาพครอบครัว</label>
                      <select class="form-control" name="status_family" id="statusfamily">
                        <option selected disabled hidden>ระบุ..</option>
                        <option value="อยู่กับพ่อ">อยู่กับพ่อ</option>
                        <option value="อยู่กับเเม่">อยู่กับเเม่</option>
                        <option value="อยู่กับญาติ">อยู่กับญาติ</option>
                      </select>
                  </div>
                  <div class="form-group mb-0 mt-0 col-6">
                    <label for="statusfamily" class="mb-0 text-purper">ระดับความช่วยเหลือ</label>
                    <select class="form-control" name="level_holp" id="levelhelp">
                        <option value="ปกติ">ปกติ</option>
                        <option value="ปานกลาง">ปานกลาง</option>
                        <option value="เร่งด่วน">เร่งด่วน</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <label for="studystatus" class="mb-0 text-secondary">สถานะการเรียน</label>
                      <select class="form-control" name="study_status" id="studystatusX">
                        <option selected disabled hidden>ระบุ..</option>
                        <option value="กำลังเรียน">กำลังเรียน</option>
                        <option value="หยุดเรียน">หยุดเรียน</option>
                      </select>
                  </div>
                  <div class="form-group mb-0 mt-0 col-12">
                    <label for="causestopstudX" class="mb-0 text-purper">สาเหตุที่หยุดเรียน</label>
                    <input type="hidden" class="form-control" name="cause_stop_study" id="causestopstudX">
                  </div>
                  <label for="" class="mb-0 text-secondary mt-3">ด้านการช่วยเหลือ</label>
                  <div class="col-md-12 row mb-0 ml-4">
                    
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="estimate_help1" id="estimate_help1" value="ด้านอารมฌ์และจิตใจ">
                        <label class="form-check-label" for="estimate_help">ด้านอารมฌ์และจิตใจ</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="estimate_help2" id="estimate_help2" value="ด้านสังคม">
                        <label class="form-check-label" for="estimate_help2">ด้านสังคม</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="estimate_help3" id="estimate_help3" value="ด้านร่างกาย">
                        <label class="form-check-label" for="estimate_help3">ด้านร่างกาย</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="estimate_help4" id="estimate_help4" value="ด้านเศรษฐกิจ">
                        <label class="form-check-label" for="estimate_help4">ด้านเศรษฐกิจ</label>
                      </div>
                  </div>
                
              </div>
                
              <div class="modal-footer">
                <button type="submit" class="btn btn-success ml-auto mr-5">บันทึกข้อมูล</button>
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
    let studystatus = $(this).data('studystatus'),yearstudy= $(this).data('yearstudy'),causestopstudy = $(this).data('causestopstudy'),imagehomes=$(this).data('imageshomes');

    $("#getsixID").val(sixId)
    $("#statusfamily").val(familystatus)
    $("#revenuefamily").val(revenuefamily)
    //$("#estimate_help2").val(deceased)
    //$("#estimate_help1").val(estimatehelp)
    //$("#estimate_help3").val(causedeath)
    //$("#estimate_help4").val(yearstudy)
    $("#levelhelp").val(levelhelp)
    $("#studystatusX").val(studystatus)
    $("#deathday").val(deathday)
    $("#causestopstudX").val(causestopstudy)
    

})

checkFuck("studystatusX",document.getElementById("causestopstudX"),"หยุดเรียน")
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
                    <p class="BtnCustom" id="setbtnhome">อัพโหลดไฟล์</p> 
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success ml-auto mr-5">บันทึกข้อมูล</button>
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

 class modalMaplocation extends HTMLElement{
  connectedCallback(){
    this.renderMap()
  }
  renderMap(){
    this.innerHTML = `
      <div class="modal fade bd-example-modal-lg" id="modaleditMap" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <form>
              <div class="modal-body">
                  <div id=\"editMapCanvas\" style=\"width:100%;height:320px;\" class=''></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    `
  }
 }
 customElements.define('main-edit-gps', modalMaplocation)

$(document).on("click","#editmmapbtn", function(emap){
  let orphan_id = $(this).data("id")
  let litidudeJs = $(this).data("latitude")
  let logintudeJs = $(this).data("logitude")

  function setMapEdit(getOrphanId){
    var myOptions = {
      zoom: 8,
      center: new google.maps.LatLng(litidudeJs, logintudeJs),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById('editMapCanvas'),myOptions);
    var marker = new google.maps.Marker({ 
      map:map,
      position: new google.maps.LatLng(litidudeJs,logintudeJs),
      draggable: true
    });
    var infowindow = new google.maps.InfoWindow({
      map:map,
      content:'ที่อยู่เดิม',
      position: new google.maps.LatLng(litidudeJs,logintudeJs)
    })
      google.maps.event.addListener(map,'click',function(eventmap){
        var tultipmap = ""
          tultipmap += '<p class="text-danger text-center">ละติจูดใหม่</p> <input type="hidden" id="latidue" value="'+eventmap.latLng.lat()+'" disabled/>'
          tultipmap += '<p>'+eventmap.latLng.lat()+' &nbsp;,&nbsp; '+eventmap.latLng.lng()+'</p><input type="hidden" id="logitude" value="'+eventmap.latLng.lng()+'" disabled/>'
          tultipmap += '<input type="hidden" id="OrphanId" value="'+getOrphanId+'" disabled/>'
          tultipmap += '<button type="button" class="btn btn-success btn-sm ml-auto" id="submitEditMap">บันทึกข้อมูล</button>'
          infowindow.open(map,marker)
          infowindow.setContent(tultipmap)
          infowindow.setPosition(eventmap.latLng)

          marker.setPosition(eventmap.latLng)
      })
  }

  $(document).on("click","#submitEditMap", function(){
    var latitudex = $("#latidue").val()
    var logitudex = $("#logitude").val()
    var idx = $("#OrphanId").val()

    $.ajax({
      method:"POST",
      url:'backend/api/map-api-crud.php',
      data: {
        latitude:latitudex,
        logitude:logitudex,
        orphanid:idx
      }
    }).done(function (text){
      console.log(text)
      Swal.fire({
        icon: `success`,
        title:`เรียบร้อย`,
        text:`เปลียนแปลงข้อมูลแผนที่เรียบร้อย`,
        showConfirmButton: false,
      }).then((resulf)=>{
        window.location.reload()
        console.log(resulf)
      })
    })
  })
  setMapEdit(orphan_id)
  emap.preventDefault()
})