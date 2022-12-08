

class AddImage extends HTMLElement {
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
      console.log('test' + this.wrapper)
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
customElements.define("mian-add-image", AddImage)
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
function remakeSex(titleId,sexId){
  let IdTitle = document.getElementById(titleId)
    IdTitle.addEventListener('change',function handleChang(){
      if(IdTitle.value == "นาย"){
         //document.getElementById(sexId).value = "ชาย"
         $("#"+sexId).val("ชาย")
        //console.log(document.getElementById(sexId).value = "ชาย")
      }else{
         //document.getElementById(sexId).value = "หญิง"
         $("#"+sexId).val("หญิง")
      }
    })
}
function boxAddressTrue(checkboxId){
  checkboxId.addEventListener('change',function handleCheck(){
    if(checkboxId.checked == true){
    document.getElementById('homeid2').value = document.getElementById('homeid').value
    document.getElementById('district2').value = document.getElementById('district1').value
    document.getElementById('amphoe2').value = document.getElementById('amphoe1').value
    document.getElementById('province2').value = document.getElementById('province1').value
    document.getElementById('zipcode2').value = document.getElementById('zipcode1').value
    }else{
      document.getElementById('homeid2').value = ""
      document.getElementById('district2').value = ""
      document.getElementById('amphoe2').value = ""
      document.getElementById('province2').value = ""
      document.getElementById('zipcode2').value = ""

    }
  })
}

class modalCreateBoardUser extends HTMLElement{
    constructor(){
        super()
    }
    get idUserAdder(){
        return this.getAttribute("getIDuserAdder")
    }

    connectedCallback(){
        this.renderForm()
    }
    
    renderForm(){
        this.innerHTML = `
            <div class="modal fade bd-example-modal-xl modal-x" id="modalFormUserBoard" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มคณะกรรมการมูลนิธิ</h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                      <form action="backend/crud-board-users.php" method="POST" id="myForm" enctype="multipart/form-data">
                            <input type="hidden" name="status" value="CREATE" />
                            <input type="hidden" name="get_id_users_adder" value="${this.idUserAdder}"/>
                        <div class="modal-body row">
                            <div class="col-md-9 row">
                                <div class="col-2">
                                    <div class="form-group">
                                          <label class="mb-0 text-default" for="title">คำนำหน้า</label>
                                          <select class="form-control" name="title" id="title">
                                          <option hidden selected >เลือก..</option>
                                          <option value="นาย">นาย</option>
                                          <option value="นาง">นาง</option>
                                          <option value="นางสาว">นางสาว</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                <div class="form-group">
                                      <label class="mb-0 text-default" for="Ferstname">ชื่อ</label>
                                      <input type="text" class="form-control" name="ferst_name" id="Ferstname" placeholder="ชื่อ" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                      <label class="mb-0 text-default" for="Lastname">นามสกุล</label>
                                      <input type="text" class="form-control" name="last_name" id="Lastname" placeholder="นามสกุล" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                      <label class="mb-0 text-default" for="Cardid">บัตรประจำตัวประชาชน</label>
                                      <input type="text" minlength="13" maxlength="13" class="form-control" name="card_id" id="Cardid" onkeyup="setNumber(13,'Cardid')" placeholder="เลขบัตรประชาชน" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group has-error">
                                      <label class="mb-0 text-default" for="Tell">เบอรโทรศัพท์</label>
                                      <input type="text" minlength="10" maxlength="10" class="form-control" name="tell" id="Tell" onkeyup="setNumber(10,'Tell')" placeholder="เบอร.โทรศัพท.." required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group mb-2">
                                    <label class="ml-1 mt-0 mb-0 font-weight-bold text-default setberdday">วัน-เดือน-ปี เกิด </label>
                                      <div class="col-xs-5 date">
                                          <div class="input-group input-append date" id="datePicker">
                                              <input type="date" class="form-control" id="edate" name="birthday_board" />
                                              <span class="input-group-addon add-on">
                                                  <span class="glyphicon glyphicon-calendar"></span>
                                              </span>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                      <label class="mb-0 text-default" for="Email">อีเมล</label>
                                      <input type="text" class="form-control" name="board_email" id="Email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                      <label class="mb-0 text-default" for="facebook">เฟสยุค</label>
                                      <input type="text" class="form-control" name="facebook_board" id="facebook" placeholder="facebook.." required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                      <label class="mb-0 text-default" for="board_religion">ศาสนา</label>
                                      <input type="text" class="form-control" name="board_religion" id="board_religion" placeholder="ศาสนา.." required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <mian-add-image id="BoardImage" count="board_image" wrapper="x-wrap" filenames="bimgname" cancles="x-cancle"
                                    names="รูปภาพ" custom="setbtnCustom" setdefault="setDefaultBoardImage"></mian-add-image>
                            </div>
                            <div class="col-12 row">
                                <div class="col-3">
                                    <div class="form-group">
                                      <label class="mb-0 text-default" for="Position">ตำแหน่งในมูลนิธิ</label>
                                      <select class="form-control" name="position_bord" id="Position">
                                        <option selected disabled hidden>ระบุ..</option>
                                        <option value="ประธานมูลนิธิ">ประธานมูลนิธิ</option>
                                        <option value="รองประธานมูลนิธิ">รองประธานมูลนิธิ</option>
                                        <option value="เหรัญญิก">เหรัญญิก</option>
                                        <option value="เลขานุการมูลนิธิ">เลขานุการมูลนิธิ</option>
                                        <option value="กรรมการมูลนิธิ">กรรมการมูลนิธิ</option>
                                        <option value="เจ้าหน้าที่มูลนิธิ">เจ้าหน้าที่มูลนิธิ</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                      <label class="mb-0 text-default" for="occupation">ปัจจุบันประกอบอาชีพ</label>
                                      <input type="text" class="form-control" name="occupation_board" id="occupation" placeholder="ปัจจุบันประกอบอาชีพ" required>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <div class="form-group">
                                        <label class="mb-0 text-default" for="Sex">เพศ</label>
                                        <input type="text" class="form-control" name="sex" id="Sex">
                                    </div>
                                </div>
                                <div class="col-1">
                                    <div class="form-group">
                                      <label class="mb-0 text-default" for="age">อายุ</label>
                                      <input type="text" class="form-control" name="age_board" id="age" placeholder="อายุ">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label class="mb-0 text-default" for="Status">สถานภาพ</label>
                                        <select class="form-control" name="board_status" id="Status">
                                          <option value="โสด">โสด</option>
                                          <option value="แต่งงาน">แต่งงาน</option>
                                          <option value="หม้าย">หม้าย</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                      <label class="mb-0 text-default" for="number_of_balls">บุตร</label>
                                      <input type="text" class="form-control" name="number_of_balls" id="number_of_balls" placeholder="จำนวนบุตร" required>
                                    </div>
                                </div>
                            </div>
                            <label class="ml-2 mb-0">ที่อยู่ตามบัตรประชาชน</label>
                            <div class="col-md-12 row ml-auto mt-0">
                                <div id="demo1" class="demo" autocomplete="off" uk-grid>
                                    <div class="col-4">
                                      <div class="form-group mb-2">
                                        <label for="homeid" class="mb-0 text-default">ที่อยู่</label>
                                        <input type="text" class="form-control" name="home1_id" id="homeid" placeholder="" required />
                                      </div>
                                    </div> 
                                    <div class="col-2">
                                      <div class="form-group mb-2">
                                          <label class="mb-0">ตำบล</label>
                                          <input name="home1_district" class="uk-input uk-width-1-1" type="text" id="district1" required>
                                      </div>
                                    </div>
                                    <div class="col-2">
                                      <div class="form-group mb-2">
                                          <label class="mb-0">อำเภอ</label>
                                          <input name="home1_amphoe" class="uk-input uk-width-1-1" type="text" id="amphoe1" required>
                                      </div>
                                    </div>
                                    <div class="col-2">
                                      <div class="form-group mb-2">
                                        <label class="mb-0">จังหวัด</label>
                                        <input name="home1_province" class="uk-input uk-width-1-1" type="text" id="province1" required>
                                      </div>
                                    </div>
                                    <div class="col-2">
                                      <div class="form-group mb-2">
                                          <label class="mb-0">รหัสไปรษณีย์</label>
                                          <input name="home1_zipcode" class="uk-input uk-width-1-1" type="number" id="zipcode1" required>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <label class="ml-2 mr-3 mb-0">ที่อยู่ปัจจุบันที่ติดต่อได้</label>
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="ิboxAddress">
                              <label class="form-check-label" for="exampleCheck1">ตามที่อยู่ในบัตรประชาชน</label>
                            </div>
                            <div class="col-md-12 row ml-auto mt-0">
                                <div id="demo2" class="demo" style="" autocomplete="off" uk-grid>
                                    <div class="col-4">
                                      <div class="form-group mb-2">
                                        <label for="homeid2" class="mb-0 text-default">ที่อยู่</label>
                                        <input type="text" class="form-control" name="home2_id" id="homeid2" placeholder="" required />
                                      </div>
                                    </div>
                                    <div class="col-2"> 
                                      <div class="form-group mb-2">
                                          <label class="mb-0">ตำบล</label>
                                          <input name="home2_district" class="uk-input uk-width-1-1" type="text" id="district2" required>
                                      </div>
                                    </div>
                                    <div class="col-2">
                                      <div class="form-group mb-2">
                                          <label class="mb-0">อำเภอ</label>
                                          <input name="home2_amphoe" class="uk-input uk-width-1-1" type="text" id="amphoe2" required>
                                      </div>
                                    </div>
                                    <div class="col-2">
                                      <div class="form-group mb-2">
                                        <label class="mb-0">จังหวัด</label>
                                        <input name="home2_province" class="uk-input uk-width-1-1" type="text" id="province2" required>
                                      </div>
                                    </div>
                                    <div class="col-2">
                                      <div class="form-group mb-2">
                                          <label class="mb-0">รหัสไปรษณีย์</label>
                                          <input name="home2_zipcode" class="uk-input uk-width-1-1" type="number" id="zipcode2" required>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <label class="mt-2 ml-2 mb-0">ประวัติการศึกษา</label>
                            <div class="col-md-12 row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="mb-0 text-default" for="Qualification">วุฒิการศึกษาสูงสุด</label>
                                    <select class="form-control" name="Qualification_board" id="Qualification">
                                      <option value="ประถมศึกษา">ประถมศึกษา</option>
                                      <option value="มัธยมศึกษา">มัธยมศึกษา</option>
                                      <option value="ปริญญาตรี">ปริญญาตรี</option>
                                      <option value="ปริญญาโท">ปริญญาโท</option>
                                      <option value="ปริญญาเอก">ปริญญาเอก</option>
                                    </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="mb-0 text-default" for="Institution">ชื่อสถาบัน</label>
                                  <input type="text" class="form-control" name="Institution_board" id="Institution" placeholder="ชื่อสถาบัน" required>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="mb-0 text-default" for="Branch">สาขาวิชา</label>
                                  <input type="text" class="form-control" name="Branch_board" id="Branch" placeholder="สาขาวิชา" required>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12 row">
                               
                               <div class="col-12">
                                   <div class="form-group">
                                     <label class="mb-0 text-default" for="work_history">ประวัติการทำงาน</label>
                                     <input type="text" class="form-control" name="work_history" id="work_history" placeholder="ประวัติการทำงาน" required>
                                   </div>
                               </div>
                               <div class="col-12">
                                   <div class="form-group">
                                     <label class="mb-0 text-default" for="motto">คติประจำใจ</label>
                                     <input type="text" class="form-control" name="motto" id="motto" placeholder="คติประจำใจ" required>
                                   </div>
                               </div>
                               <div class="col-12">
                                   <div class="form-group">
                                      <label for="talent">ความสามารถพิเศษ</label>
                                      <textarea class="form-control" id="talent" rows="3" name="talent" required></textarea>
                                   </div>
                               </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        `
    }
}
customElements.define('main-create-board-user', modalCreateBoardUser)
setImagePriviews('.BoardImage','.setDefaultBoardImage','#setbtnCustom','.x-cancle i','.bimgname','.x-wrap')

remakeDate("edate","age")
remakeSex("title","Sex")
boxAddressTrue(document.getElementById("ิboxAddress"))

class ModalShowDataBoard extends HTMLElement{
  connectedCallback(){
    this.showBoardRender()
  }
  showBoardRender(){
    this.innerHTML = `
      <div class="modal fade bd-example-modal-xl modal-xs" id="modalShowUserBoard" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">แสดงข้อมูลคณะกรรมการมูลนิธิ</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="showDatas">
              <div class="col-md-12 row">
                <div class="col-3">
                  <div class="image w-100 mt-2">
                    <img class="set-img" width="200" height="200" />
                  </div>
                </div>
                <div class="col-9 row">
                  <div class="col-2">
                    <div class="form-group mb-2">
                      <label class="mb-0 text-default" for="boardTitle">คำนำหน้า</label>
                      <input type="text" class="form-control" id="boardTitle" disabled>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group mb-2">
                      <label class="mb-0 text-default" for="boardTitle">ชื่อจริง</label>
                      <input type="text" class="form-control" id="boardFirstname" disabled>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group mb-2">
                      <label class="mb-0 text-default" for="boardTitle">นามสกุล</label>
                      <input type="text" class="form-control" id="boardLastname" disabled>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group mb-2">
                      <label class="mb-0 text-default" for="boardCardId">เลขบัตรประชาชน</label>
                      <input type="text" class="form-control" id="boardCardId" disabled>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group mb-2">
                      <label class="mb-0 text-default" for="boardTell">เบอรโทรศัพท</label>
                      <input type="text" class="form-control" id="boardTell" disabled>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group mb-2">
                      <label class="mb-0 text-default" for="boardBertday">วัน-เดือน-ปี เกิด </label>
                      <input type="text" class="form-control" id="boardBertday" disabled>
                    </div>
                  </div>
                  <div class="col-5">
                    <div class="form-group">
                      <label class="mb-0 text-default" for="EmailBoard">email</label>
                      <input type="text" class="form-control" id="EmailBoard" disabled>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label class="mb-0 text-default" for="Facebook">facebook</label>
                      <input type="text" class="form-control" id="Facebook" disabled>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-group">
                      <label class="mb-0 text-default" for="Religion">ศาสนา</label>
                      <input type="text" class="form-control" id="Religion" disabled>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 row">
                <div class="col-3">
                    <div class="form-group">
                      <label class="mb-0 text-default" for="sPosition">ดำรงตำแหน่ง</label>
                      <input type="text" class="form-control" id="sPosition" disabled>
                      
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                      <label class="mb-0 text-default" for="Soccupation">ปัจจุบันประกอบอาชีพ</label>
                      <input type="text" class="form-control" id="Soccupation" disabled>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <label class="mb-0 text-default" for="sSex">เพศ</label>
                        <input type="text" class="form-control" id="sSex" disabled>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                      <label class="mb-0 text-default" for="sAge">อายุ</label>
                      <input type="text" class="form-control" id="sAge" disabled>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label class="mb-0 text-default" for="Status">สถานภาพ</label>
                        <input type="text" class="form-control" id="sStatus" disabled>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                      <label class="mb-0 text-default" for="number_of_balls">บุตร</label>
                      <input type="text" class="form-control" id="snumber_of_balls" disabled>
                    </div>
                </div>
              </div>
              <label class="mt-3">ที่อยู่ตามบัตรประชาชน</label>
              <div class="col-md-12 row">
                <div class="col-4">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="HomeId">ที่อยู่</label>
                    <input type="text" class="form-control" id="HomeId" disabled>
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="District">ตำบล</label>
                    <input type="text" class="form-control" id="District" disabled>
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="Amphoe">อำเภอ</label>
                    <input type="text" class="form-control" id="Amphoe" disabled>
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="Province">จังหวัด</label>
                    <input type="text" class="form-control" id="Province" disabled>
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="Zipcode">รหัสไปรษณีย์</label>
                    <input type="text" class="form-control" id="Zipcode" disabled>
                  </div>
                </div>
              </div>
              <label class="mt-3">ที่อยู่ปัจจุบันที่ติดต่อได้</label>
              <div class="col-md-12 row">
                <div class="col-4">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="HomeIdTrue">ที่อยู่</label>
                    <input type="text" class="form-control" id="HomeIdTrue" disabled>
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="DistrictTrue">ตำบล</label>
                    <input type="text" class="form-control" id="DistrictTrue" disabled>
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="AmphoeTrue">อำเภอ</label>
                    <input type="text" class="form-control" id="AmphoeTrue" disabled>
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="ProvinceTrue">จังหวัด</label>
                    <input type="text" class="form-control" id="ProvinceTrue" disabled>
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="ZipcodeTrue">รหัสไปรษณีย์</label>
                    <input type="text" class="form-control" id="ZipcodeTrue" disabled>
                  </div>
                </div>
              </div>
              <label class="mt-2">ประวัติการศึกษา</label>
              <div class="col-md-12 row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="ShowQualification">วุฒิการศึกษาสูงสุด</label>
                    <input type="text" class="form-control" id="ShowQualification" placeholder="ชื่อสถาบัน" disabled>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="ShowInstitution">ชื่อสถาบัน</label>
                    <input type="text" class="form-control" id="ShowInstitution" placeholder="ชื่อสถาบัน" disabled>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="ShowBranch">สาขาวิชา</label>
                    <input type="text" class="form-control" id="ShowBranch" placeholder="สาขาวิชา" disabled>
                  </div>
                </div>
              </div>
              <div class="col-md-12 row">
                
                <div class="col-12">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="WorkHistory">ประวัติการทำงาน</label>
                    <input type="text" class="form-control" id="WorkHistory" disabled>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="Motto">คติประจำใจ</label>
                    <input type="text" class="form-control" id="Motto" disabled>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="Talent">ความสามารถพิเศษ</label>
                    <textarea class="form-control" id="Talent" rows="3" disabled></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    `
  }
}
customElements.define('main-show-boardusers', ModalShowDataBoard)
function setValueData(BoardDataRaw){
  return BoardDataRaw.map((BoardData)=>{
    $(".set-img").attr('src',`backend/data/board/${BoardData.board_image}`)
    $("#boardTitle").val(BoardData.titleboard)
    $("#boardFirstname").val(BoardData.fullname_bord)
    $("#boardLastname").val(BoardData.lastname_board)
    $("#boardCardId").val(BoardData.number_cardid_board)
    $("#boardTell").val(BoardData.board_phone)
    $("#boardBertday").val(BoardData.birthday_board)
    $("#EmailBoard").val(BoardData.board_email)
    $("#Facebook").val(BoardData.board_facebook)
    $("#Religion").val(BoardData.board_religion)
    $("#sPosition").val(BoardData.position_bord)
    $("#Soccupation").val(BoardData.occupation_board)
    $("#sSex").val(BoardData.sex)
    $("#sAge").val(BoardData.board_age)
    $("#sStatus").val(BoardData.board_status)
    $("#snumber_of_balls").val(BoardData.number_of_balls)
    $("#HomeId").val(BoardData.home1_id)
    $("#District").val(BoardData.home1_district)
    $("#Amphoe").val(BoardData.home1_amphoe)
    $("#Province").val(BoardData.home1_province)
    $("#Zipcode").val(BoardData.home1_zipcode)
    $("#HomeIdTrue").val(BoardData.home2_id)
    $("#DistrictTrue").val(BoardData.home2_district)
    $("#AmphoeTrue").val(BoardData.home2_amphoe)
    $("#ProvinceTrue").val(BoardData.home2_province)
    $("#ZipcodeTrue").val(BoardData.home2_zipcode)

    $("#ShowQualification").val(BoardData.qualification)
    $("#ShowInstitution").val(BoardData.institution)
    $("#ShowBranch").val(BoardData.branch)

    $("#WorkHistory").val(BoardData.work_history)
    $("#Motto").val(BoardData.motto)
    $("#Talent").val(BoardData.talent)

  })
}
$(document).on("click","#btnShowBoard", function(e){
  let getID = $(this).data("id");
  fetch(`backend/api/api-get-data-board.php?get_board_id=${getID}`,{
    method:"GET",
    headers:{"Content-Type": "application/json; charset=UTF-8",}
  }).then(res => res.json())
  .then(data => setValueData(data))
  .catch(errs => console.log(errs))

  e.preventDefault()
})

class ModalEditDataBoard extends HTMLElement{
  connectedCallback(){
    this.renderBoardRender()
  }
  renderBoardRender(){
    this.innerHTML = `
      <div class="modal fade bd-example-modal-xl modal-xs" id="modalEditUserBoard" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">แก้ไขข้อมูลคณะกรรมการมูลนิธิ</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="backend/crud-board-users.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="status" value="UPDATE" />
            <div class="modal-body" id="showDatas">
              <div class="col-md-12 row">
                <div class="col-3">
                  <mian-add-image id="editBoardImage" count="editboard_image" wrapper="ux-wrap" filenames="timgname" cancles="ux-cancle"
                  names="รูปภาพ" custom="setbtnEditCustom" setdefault="setDefaultEditBoardImage"></mian-add-image>
                </div>
                <div class="col-9 row">
                  <div class="col-2">
                    <div class="form-group mb-2">
                      <label class="mb-0 text-default" for="boardTitle">คำนำหน้า</label>
                      <input type="text" class="form-control" name="edit_board_title" id="EditboardTitle" required>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group mb-2">
                      <label class="mb-0 text-default" for="boardTitle">ชื่อจริง</label>
                      <input type="text" class="form-control" name="edit_board_firstname" id="EditboardFirstname" required>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group mb-2">
                      <label class="mb-0 text-default" for="boardTitle">นามสกุล</label>
                      <input type="text" class="form-control" name="edit_board_lastname" id="EditboardLastname" required>
                    </div> 
                  </div>
                  <div class="col-4">
                    <div class="form-group mb-2">
                      <label class="mb-0 text-default" for="boardCardId">เลขบัตรประชาชน</label>
                      <input type="text" maxlength="13" class="form-control" name="edit_board_cardid" id="EditboardCardId" onkeyup="setNumber(13,'EditboardCardId')"  required>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group mb-2">
                      <label class="mb-0 text-default" for="boardTell">เบอรโทรศัพท</label>
                      <input type="text" maxlength="10" class="form-control" name="edit_board_tell" id="EditboardTell" onkeyup="setNumber(10,'EditboardTell')" required>
                    </div>
                  </div>
                  
                  <div class="col-md-4">
                      <div class="form-group mb-2">
                        <label class="ml-1 mt-0 mb-0 font-weight-bold text-default setberdday">วัน-เดือน-ปี เกิด </label>
                          <div class="col-xs-5 date">
                              <div class="input-group input-append date" id="datePicker">
                                  <input type="date" class="form-control" id="EditboardBertday" name="edit_board_bertday" />
                                  <span class="input-group-addon add-on">
                                      <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-5">
                    <div class="form-group">
                      <label class="mb-0 text-default" for="EmailBoard">อีเมล</label>
                      <input type="text" class="form-control" name="edit_board_email" id="EditEmailBoard" required>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label class="mb-0 text-default" for="Facebook">เฟสบุค</label>
                      <input type="text" class="form-control" name="edit_board_facebook" id="EditFacebook" required>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-group">
                      <label class="mb-0 text-default" for="Religion">ศาสนา</label>
                      <input type="text" class="form-control" name="edit_board_religion" id="EditReligion" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 row">
                  <div class="col-3">
                      <div class="form-group">
                        <label class="mb-0 text-default" for="ePosition">ดำรงตำแหน่ง</label>
                        <input type="text" class="form-control" name="edit_position_bord" id="ePosition" placeholder="ดำรงตำแหน่ง" required>
                      </div>
                  </div>
                  <div class="col-3">
                      <div class="form-group">
                        <label class="mb-0 text-default" for="Eoccupation">ปัจจุบันประกอบอาชีพ</label>
                        <input type="text" class="form-control" name="edit_occupation_board" id="Eoccupation" placeholder="ปัจจุบันประกอบอาชีพ" required>
                      </div>
                  </div>
                  <div class="col-1">
                      <div class="form-group">
                          <label class="mb-0 text-default" for="eSex">เพศ</label>
                          <select class="form-control" name="edit_sex" id="eSex">
                            <option value="ชาย">ชาย</option>
                            <option value="หญิง">หญิง</option>
                          </select>
                      </div>
                  </div>
                  <div class="col-1">
                      <div class="form-group">
                        <label class="mb-0 text-default" for="eAge">อายุ</label>
                        <input type="text" class="form-control" name="edit_age_board" id="eAge" placeholder="อายุ" >
                      </div>
                  </div>
                  <div class="col-2">
                      <div class="form-group">
                          <label class="mb-0 text-default" for="eStatus">สถานภาพ</label>
                          <select class="form-control" name="edit_board_status" id="eStatus">
                            <option value="โสด">โสด</option>
                            <option value="แต่งงาน">แต่งงาน</option>
                            <option value="หม้าย">หม้าย</option>
                          </select>
                      </div>
                  </div>
                  <div class="col-2">
                      <div class="form-group">
                        <label class="mb-0 text-default" for="Enumber_of_balls">บุตร</label>
                        <input type="text" class="form-control" name="edit_number_of_balls" id="Enumber_of_balls" placeholder="จำนวนบุตร" required>
                      </div>
                  </div>
              </div>
              <label class="mt-3">ที่อยู่ตามบัตรประชาชน</label>
              <div class="col-md-12 row">
                <div class="col-4">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="HomeId">ที่อยู่</label>
                    <input type="text" class="form-control" name="edit_homeid" id="EditHomeId" required>
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="District">ตำบล</label>
                    <input type="text" class="form-control" name="edit_district" id="EditDistrict" required>
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="Amphoe">อำเภอ</label>
                    <input type="text" class="form-control" name="edit_amphoe" id="EditAmphoe" required>
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="Province">จังหวัด</label>
                    <input type="text" class="form-control" name="edit_province" id="EditProvince" required>
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="Zipcode">รหัสไปรษณีย์</label>
                    <input type="text" class="form-control" name="edit_zipcode" id="EditZipcode" required>
                  </div>
                </div>
              </div>
              <label class="mt-3">ที่อยู่ปัจจุบันที่ติดต่อได้</label>
              <div class="col-md-12 row">
                <div class="col-4">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="HomeIdTrue">ที่อยู่</label>
                    <input type="text" class="form-control" name="edit_homeid_true" id="EditHomeIdTrue" required>
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="DistrictTrue">ตำบล</label>
                    <input type="text" class="form-control" name="edit_district_true" id="EditDistrictTrue" required>
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="AmphoeTrue">อำเภอ</label>
                    <input type="text" class="form-control" name="edit_amphoe_true" id="EditAmphoeTrue" required>
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="ProvinceTrue">จังหวัด</label>
                    <input type="text" class="form-control" name="edit_prvince_true" id="EditProvinceTrue" required>
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="ZipcodeTrue">รหัสไปรษณีย์</label>
                    <input type="text" class="form-control" name="edit_zipcode_true" id="EditZipcodeTrue" required>
                  </div>
                </div>
              </div>
              <label class="mt-2">ประวัติการศึกษา</label>
              <div class="col-md-12 row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="EditQualification">วุฒิการศึกษาสูงสุด</label>
                      <select class="form-control" name="edit_Qualification_board" id="EditQualification">
                        <option value="ประถมศึกษา">ประถมศึกษา</option>
                        <option value="มัธยมศึกษา">มัธยมศึกษา</option>
                        <option value="ปริญญาตรี">ปริญญาตรี</option>
                        <option value="ปริญญาโท">ปริญญาโท</option>
                        <option value="ปริญญาเอก">ปริญญาเอก</option>
                      </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="EditInstitution">ชื่อสถาบัน</label>
                    <input type="text" class="form-control" name="edit_Institution_board" id="EditInstitution" placeholder="ชื่อสถาบัน" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="EditBranch">สาขาวิชา</label>
                    <input type="text" class="form-control" name="edit_Branch_board" id="EditBranch" placeholder="สาขาวิชา" required>
                  </div>
                </div>
              </div>
              <div class="col-md-12 row">
                
                <div class="col-12">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="WorkHistory">ประวัติการทำงาน</label>
                    <input type="text" class="form-control" name="edit_workhistory" id="EditWorkHistory" required>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label class="mb-0 text-default" for="Motto">คติประจำใจ</label>
                    <input type="text" class="form-control" name="edit_motto" id="EditMotto" required>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="Talent">ความสามารถพิเศษ</label>
                    <textarea class="form-control" name="edit_talent" id="EditTalent" rows="3" required></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
                  <input type="hidden" name="get_board_id" id="getBoardId"/>
                  <input type="hidden" id="getimagename" name="get_image_name" />
              <button type="submit" class="btn btn-success ml-auto mr-5">บันทึกข้อมูล</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    `
  }
}
customElements.define('main-edit-board',ModalEditDataBoard)

remakeDate("EditboardBertday","eAge")
function setEditValueData(BoardDataRaw){
  return BoardDataRaw.map((BoardData)=>{
    $(".ux-wrap").last().addClass("active")
    $("#getimagename").val(BoardData.board_image)
    $(".timgname").html(BoardData.board_image)
    $(".editBoardImage").attr('src',`backend/data/board/${BoardData.board_image}`)
    $("#getBoardId").val(BoardData.bord_id)
    $("#EditboardTitle").val(BoardData.titleboard)
    $("#EditboardFirstname").val(BoardData.fullname_bord)
    $("#EditboardLastname").val(BoardData.lastname_board)
    $("#EditboardCardId").val(BoardData.number_cardid_board)
    $("#EditboardTell").val(BoardData.board_phone)
    $("#EditboardBertday").val(BoardData.birthday_board)
    $("#EditEmailBoard").val(BoardData.board_email)
    $("#EditFacebook").val(BoardData.board_facebook)
    $("#EditReligion").val(BoardData.board_religion)
    $("#ePosition").val(BoardData.position_bord)
    $("#Eoccupation").val(BoardData.occupation_board)
    $("#eSex").val(BoardData.sex)
    $("#eAge").val(BoardData.board_age)
    $("#eStatus").val(BoardData.board_status)
    $("#Enumber_of_balls").val(BoardData.number_of_balls)
    $("#EditHomeId").val(BoardData.home1_id)
    $("#EditDistrict").val(BoardData.home1_district)
    $("#EditAmphoe").val(BoardData.home1_amphoe)
    $("#EditProvince").val(BoardData.home1_province)
    $("#EditZipcode").val(BoardData.home1_zipcode)
    $("#EditHomeIdTrue").val(BoardData.home2_id)
    $("#EditDistrictTrue").val(BoardData.home2_district)
    $("#EditAmphoeTrue").val(BoardData.home2_amphoe)
    $("#EditProvinceTrue").val(BoardData.home2_province)
    $("#EditZipcodeTrue").val(BoardData.home2_zipcode)
    $("#EditWorkHistory").val(BoardData.work_history)
    $("#EditMotto").val(BoardData.motto)
    $("#EditTalent").val(BoardData.talent)

    $("#EditQualification").val(BoardData.qualification)
    $("#EditInstitution").val(BoardData.institution)
    $("#EditBranch").val(BoardData.branch)

  })
}
$(document).on("click","#btnEditUseradd", function(e){
  let getboardID = $(this).data("id")
  fetch(`backend/api/api-get-data-board.php?get_board_id=${getboardID}`,{
    method:"GET",
    headers:{"Content-Type": "application/json; charset=UTF-8",}
  }).then(res => res.json())
  .then(data => setEditValueData(data))
  .catch(errs => console.log(errs))
  e.preventDefault()
})
setImagePriviews('.editBoardImage','.setDefaultEditBoardImage','#setbtnEditCustom','.ux-cancle i','.timgname','.ux-wrap')

$(document).on("click","#confirmTrashBoard", function(e){
  let boardID = $(this).data("id");
  let boardIMAGE = $(this).data("boardimage");
  Swal.fire({
    title: 'คุณแน่ใจไหม ?',
    text: "คุณจะไม่สามารถย้อนกลับได้!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'ยกเลิก',
    confirmButtonText: 'ยืนยัน'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location = `backend/crud-board-users.php?getboard_id=${boardID}&getboardImg=${boardIMAGE}&status=delete`
    }
  })
  e.preventDefault()
})