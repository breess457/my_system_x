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
      this.innerHTML = `
              <div class="container mb-0">
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
  customElements.define("mian-add-image-fundation", AddImage)

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
  function remakeSex(titleId,sexId){
    let IdTitle = document.getElementById(titleId)
      IdTitle.addEventListener('change',function handleChang(){
        if(IdTitle.value == "นาย"){
           document.getElementById(sexId).value = "ชาย"
        }else{
           document.getElementById(sexId).value = "หญิง"
           
        }
      })
  }

class modalFundationAdd extends HTMLElement{
    connectedCallback(){
        this.renderFundation()
    }
    renderFundation(){
        this.innerHTML = `
            <div class="modal fade bd-example-modal-xl" id="modalFundationform" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-nanika" id="exampleModalLongTitle">เพิ่มข้อมูลอาสาสมัคร</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="backend/crud-fundation.php" method="post" enctype="multipart/form-data">
                          <input type="hidden" name="status_form" value="formcreate" />
                            <div class="modal-body row mb-0">
                                <div class="col-md-9 mb-0">
                                  <div class="row col-12 mb-3">
                                    <div class="form-group mb-0 mt-0 col-2">
                                        <label class="mb-0 text-dark" for="titlefundation">คำนำหน้า</label>
                                        <select class="form-control" name="title_fundation" id="titlefundation">
                                            <option selected disabled hidden>ระบุ..</option>
                                            <option value="นาย">นาย</option>
                                            <option value="นาง">นาง</option>
                                            <option value="นางสาว">นางสาว</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-5">
                                      <label class="mb-0 text-dark" for="firstnamefundation">ชื่อ</label>
                                      <input type="text" class="form-control" name="firstname_fundation" id="firstnamefundation" placeholder="ชื่อเต็ม" required>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-3">
                                      <label class="mb-0 text-dark" for="lastname_fundation">นามสกุล</label>
                                      <input type="text" class="form-control" name="lastname_fundation" id="lastname_fundation" placeholder="นามสกุล" required>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-2">
                                      <label class="mb-0 text-dark" for="age_fundation">อายุ</label>
                                      <input type="number" class="form-control" name="age_fundation" id="age_fundation" placeholder="อายุ" required>
                                    </div>
                                  </div>
                                  <div class="row col-12 mb-3">
                                    <div class="form-group mb-0 mt-0 col-2">
                                        <label class="mb-0 text-dark" for="sexfundation">เพศ</label>
                                        <input type="text" class="form-control" name="sex_fundation" id="sexfundation" >
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-6">
                                      <label class="mb-0 text-dark" for="firstnamefundation">email</label>
                                      <input type="email" class="form-control" name="email_fundation" id="emailfundation" placeholder="email@exsample.com" required>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-4">
                                      <label class="mb-0 text-dark" for="firstnamefundation">เบอร์โทร</label>
                                      <input type="text" class="form-control" name="tell_fundation" id="tellfundation" placeholder="เบอร์โทร" minlength="10" maxlength="10" onkeyup="setNumber(10,'tellfundation')" required>
                                    </div>
                                  </div>
                                  <div class="col-12 row mb-0">
                                    <div class="form-group mb-0 mt-0 col-4">
                                      <label class="mb-0 text-dark" for="cardnumberfundation">เลขบัตรประชาชน</label>
                                      <input type="text" class="form-control" name="cardnumber_fundation" id="cardnumberfundation" placeholder="เลขบัตรประชาชน" minlength="13" maxlength="13" onkeyup="setNumber(13,'cardnumberfundation')" required>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-4">
                                      <label class="mb-0 text-dark" for="occupationfundation">อาชีพ</label>
                                      <input type="text" class="form-control" name="occupation_fundation" id="occupationfundation" placeholder="อาชีพ" required>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-4">
                                      <label class="mb-0 text-dark" for="workplacefundation">สถานที่ทำงาน</label>
                                      <input type="text" class="form-control" name="workplace_fundation" id="workplacefundation" placeholder="อาชีพ" required>
                                    </div>
                                  </div>
                                  
                                </div>
                                <div class="col-md-3 mb-0 mt-2">
                                    <mian-add-image-fundation id="fundationImg" count="photo_fundation" wrapper="x-wrap" filenames="ximgname" cancles="x-cancle"
                                    names="รูปภาพ โปรไฟล์" custom="setbtnCustom" setdefault="setDefaultImgfundation"></mian-add-image-fundation>
                                </div>
                              </div>
                              <div class="demo col-md-12 pl-3 mt-0" id="demo1" style="display:none;" autocomplete="off" uk-grid>
                                <div class="row">
                                <div class="col-4">
                                  <div class="form-group mb-2">
                                    <label for="homeid" class="mb-0 text-dark">ที่อยู่</label>
                                    <input type="text" class="form-control" name="home_id" id="homeid" placeholder="" required />
                                  </div>
                                </div>
                                <div class="col-2">
                                  <div class="form-group mb-2">
                                      <label class="mb-0">ตำบล</label>
                                      <input name="district" class="uk-input uk-width-1-1" type="text" required>
                                  </div>
                                </div>
                                <div class="col-2">
                                  <div class="form-group mb-2">
                                      <label class="mb-0">อำเภอ</label>
                                      <input name="amphoe" class="uk-input uk-width-1-1" type="text" required>
                                  </div>
                                </div>
                                <div class="col-2">
                                  <div class="form-group mb-2">
                                    <label class="mb-0">จังหวัด</label>
                                    <input name="province" class="uk-input uk-width-1-1" type="text" required>
                                  </div>
                                </div>
                                <div class="col-2">
                                  <div class="form-group mb-2">
                                      <label class="mb-0">รหัสไปรษณีย์</label>
                                      <input name="zipcode" class="uk-input uk-width-1-1" type="number" required>
                                  </div>
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
customElements.define('main-add-fundation', modalFundationAdd)

setImagePriviews(".fundationImg",".setDefaultImgfundation","#setbtnCustom",".x-cancle i",".ximgname",".x-wrap")
remakeSex("titlefundation","sexfundation")

class modalFundationEdit extends HTMLElement{
    connectedCallback(){
        this.renderFundationEdit()
    }
    renderFundationEdit(){
        this.innerHTML = `
            <div class="modal fade bd-example-modal-xl" id="modalFundationedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-nanika" id="exampleModalLongTitle">แก้ไขข้อมูลอาสาสมัคร</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="backend/crud-fundation.php" method="post" enctype="multipart/form-data">
                          <input type="hidden" name="status_form" value="formedit" />
                          <input type="hidden" name="edit_fundation_id" id="fundationId" />
                          <input type="hidden" name="get_image_name" id="getImgname" />
                            <div class="modal-body row mb-0">
                                <div class="col-md-9">
                                  <div class="row col-12 mb-3">
                                    <div class="form-group mb-0 mt-0 col-2">
                                        <label class="mb-0 text-dark" for="edittitlefundation">คำนำหน้า</label>
                                        <select class="form-control" name="edit_title_fundation" id="edittitlefundation">
                                            <option selected disabled hidden>ระบุ..</option>
                                            <option value="นาย">นาย</option>
                                            <option value="นาง">นาง</option>
                                            <option value="นางสาว">นางสาว</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-5">
                                      <label class="mb-0 text-dark" for="editfirstnamefundation">ชื่อ</label>
                                      <input type="text" class="form-control" name="edit_firstname_fundation" id="editfirstnamefundation" placeholder="ชื่อเต็ม" required>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-3">
                                      <label class="mb-0 text-dark" for="editlastnamefundation">นามสกุล</label>
                                      <input type="text" class="form-control" name="edit_lastname_fundation" id="editlastnamefundation" placeholder="นามสกุล" required>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-2">
                                      <label class="mb-0 text-dark" for="editagefundation">อายุ</label>
                                      <input type="number" class="form-control" name="edit_age_fundation" id="editagefundation" placeholder="อายุ" required>
                                    </div>
                                  </div>
                                  <div class="row col-12 mb-3">
                                    <div class="form-group mb-0 mt-0 col-2">
                                        <label class="mb-0 text-dark" for="editsexfundation">เพศ</label>
                                        <input type="text" class="form-control" name="edit_sex_fundation" id="editsexfundation">
                                        
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-6">
                                      <label class="mb-0 text-dark" for="editemailfundation">email</label>
                                      <input type="email" class="form-control" name="edit_email_fundation" id="editemailfundation" placeholder="email@exsample.com" required>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-4">
                                      <label class="mb-0 text-dark" for="edittellfundation">เบอร์โทร</label>
                                      <input type="text" class="form-control" name="edit_tell_fundation" id="edittellfundation" placeholder="เบอร์โทร" minlength="10" maxlength="10" onkeyup="setNumber(10,'edittellfundation')" required>
                                    </div>
                                  </div>
                                  <div class="col-12 row mb-3">
                                    <div class="form-group mb-0 mt-0 col-4">
                                      <label class="mb-0 text-dark" for="editcardnumberfundation">เลขบัตรประชาชน</label>
                                      <input type="text" class="form-control" name="edit_cardnumber_fundation" id="editcardnumberfundation" placeholder="เลขบัตรประชาชน" minlength="13" maxlength="13" onkeyup="setNumber(13,'editcardnumberfundation')" required>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-4">
                                      <label class="mb-0 text-dark" for="editoccupationfundation">อาชีพ</label>
                                      <input type="text" class="form-control" name="edit_occupation_fundation" id="editoccupationfundation" placeholder="อาชีพ" required>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-4">
                                      <label class="mb-0 text-dark" for="editworkplacefundation">สถานที่ทำงาน</label>
                                      <input type="text" class="form-control" name="edit_workplace_fundation" id="editworkplacefundation" placeholder="อาชีพ" required>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                    <mian-add-image-fundation id="fundationImgedit" count="photo_fundation_edit" wrapper="ex-wrap" filenames="eximgname" cancles="ex-cancle"
                                    names="รูปภาพ profile" custom="setbtnCustomEdit" setdefault="setDefaulteditImgfundation"></mian-add-image-fundation>
                                </div>
                            </div>
                            <div class="col-md-12 pl-3 mt-0">
                                <div class="row">
                                <div class="col-4">
                                  <div class="form-group mb-2">
                                    <label for="Edit_homeid" class="mb-0 text-dark">ที่อยู่</label>
                                    <input type="text" class="form-control" name="edit_home_id" id="Edit_homeid" placeholder="" required />
                                  </div>
                                </div>
                                <div class="col-2">
                                  <div class="form-group mb-2">
                                      <label class="mb-0">ตำบล</label>
                                      <input name="edit_district" class="form-control" id="EditDistrict" type="text" required>
                                  </div>
                                </div>
                                <div class="col-2">
                                  <div class="form-group mb-2">
                                      <label class="mb-0">อำเภอ</label>
                                      <input name="edit_amphoe" class="form-control" id="EditAmphoe" type="text" required>
                                  </div>
                                </div>
                                <div class="col-2">
                                  <div class="form-group mb-2">
                                    <label class="mb-0">จังหวัด</label>
                                    <input name="edit_province" class="form-control" id="EditProvince" type="text" required>
                                  </div>
                                </div>
                                <div class="col-2">
                                  <div class="form-group mb-2">
                                      <label class="mb-0">รหัสไปรษณีย์</label>
                                      <input name="edit_zipcode" class="form-control" id="EditZipcode" type="number" required>
                                  </div>
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
customElements.define('main-edit-fundation', modalFundationEdit)
setImagePriviews(".fundationImgedit",".setDefaulteditImgfundation","#setbtnCustomEdit",".ex-cancle i",".eximgname",".ex-wrap")
remakeSex("edittitlefundation","editsexfundation")

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
const editFundationEvent = (setDatas)=>{
    let selectEl = (el, datas)=> document.getElementById(el).innerHTML = datas
    let inputEl = (el, datax)=> document.getElementById(el).value = datax

    return setDatas.map(mapData =>{
        inputEl('edittitlefundation', mapData.title_fundation)
        inputEl('editfirstnamefundation', mapData.firstname_fundation)
        inputEl('editlastnamefundation', mapData.lastname_fundation)
        inputEl('editagefundation', mapData.age_fundation)
        inputEl('editsexfundation', mapData.sex_fundation)
        inputEl('editemailfundation', mapData.email)
        inputEl('edittellfundation', mapData.tell_fundation)
        inputEl('editcardnumberfundation', mapData.cardnumber)
        inputEl('editoccupationfundation', mapData.occupation)
        inputEl('editworkplacefundation', mapData.workplace)
        inputEl('Edit_homeid', mapData.homeadress)
        inputEl('EditDistrict', mapData.district)
        inputEl('EditAmphoe', mapData.amphoe)
        inputEl('EditProvince', mapData.province)
        inputEl('EditZipcode', mapData.zipcode)
    })
}

 $(document).on("click","#btndataFundation",function(e){
     let fundationID = $(this).data('id');
     let fundationImage = $(this).data('image')

     $("#fundationId").val(fundationID)
     $('.fundationImgedit').attr('src',`backend/data/fundation/${fundationImage}`)
     $("#getImgname").val(fundationImage)
     fundationEditApi(fundationID, editFundationEvent)
    // e.preventDefault()
 }) 

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

$(document).on("click","#confirmTrashFundation", function(e){
    let fundationId = $(this).data('id'),images = $(this).data('images')
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
        window.location = `backend/crud-fundation.php?id_fundation=${fundationId}&image_fundation=${images}&status=delete`
      }
    })
    e.preventDefault()
})