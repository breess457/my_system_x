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
                  <p class="BtnCustom" id="${this.custom}">Choose a file</p> 
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
                            <h5 class="modal-title font-nanika" id="exampleModalLongTitle">เพิ่มข้อมูล กรรมการมูลนิธิ</h5>
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
                                        <label class="mb-0 text-primary" for="titlefundation">คำนำหน้า</label>
                                        <select class="form-control" name="title_fundation" id="titlefundation">
                                            <option selected disabled hidden>ระบุ..</option>
                                            <option value="นาย">นาย</option>
                                            <option value="นาง">นาง</option>
                                            <option value="นางสาว">นางสาว</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-5">
                                      <label class="mb-0 text-primary" for="firstnamefundation">ชื่อ</label>
                                      <input type="text" class="form-control" name="firstname_fundation" id="firstnamefundation" placeholder="ชื่อเต็ม" required>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-3">
                                      <label class="mb-0 text-primary" for="lastname_fundation">นามสกุล</label>
                                      <input type="text" class="form-control" name="lastname_fundation" id="lastname_fundation" placeholder="นามสกุล" required>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-2">
                                      <label class="mb-0 text-primary" for="age_fundation">อายุ</label>
                                      <input type="number" class="form-control" name="age_fundation" id="age_fundation" placeholder="อายุ" required>
                                    </div>
                                  </div>
                                  <div class="row col-12 mb-3">
                                    <div class="form-group mb-0 mt-0 col-2">
                                        <label class="mb-0 text-primary" for="sexfundation">เพศ</label>
                                        <select class="form-control" name="sex_fundation" id="sexfundation">
                                            <option selected disabled hidden>ระบุ..</option>
                                            <option value="ชาย">ชาย</option>
                                            <option value="หญิง">หญิง</option>
                                            <option value="เพศที่สาม(LGBQ)">เพศที่สาม(LGBQ)</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-6">
                                      <label class="mb-0 text-primary" for="firstnamefundation">email</label>
                                      <input type="email" class="form-control" name="email_fundation" id="emailfundation" placeholder="email@exsample.com" required>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-4">
                                      <label class="mb-0 text-primary" for="firstnamefundation">เบอร์โทร</label>
                                      <input type="text" class="form-control" name="tell_fundation" id="tellfundation" placeholder="เบอร์โทร" required>
                                    </div>
                                  </div>
                                  <div class="col-12 row mb-0">
                                    <div class="form-group mb-0 mt-0 col-4">
                                      <label class="mb-0 text-primary" for="cardnumberfundation">เลขปัตรประชาชน</label>
                                      <input type="number" class="form-control" name="cardnumber_fundation" id="cardnumberfundation" placeholder="เลขปัตรประชาชน" required>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-4">
                                      <label class="mb-0 text-primary" for="occupationfundation">อาชีพ</label>
                                      <input type="text" class="form-control" name="occupation_fundation" id="occupationfundation" placeholder="อาชีพ" required>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-4">
                                      <label class="mb-0 text-primary" for="workplacefundation">สถานที่ทำงาน</label>
                                      <input type="text" class="form-control" name="workplace_fundation" id="workplacefundation" placeholder="อาชีพ" required>
                                    </div>
                                  </div>
                                  
                                </div>
                                <div class="col-md-3 mb-0 mt-2">
                                    <mian-add-image-fundation id="fundationImg" count="photo_fundation" wrapper="x-wrap" filenames="ximgname" cancles="x-cancle"
                                    names="รูปภาพ profile" custom="setbtnCustom" setdefault="setDefaultImgfundation"></mian-add-image-fundation>
                                </div>
                              </div>
                              <div class="demo col-md-12 pl-3 mt-0" id="demo1" style="display:none;" autocomplete="off" uk-grid>
                                <div class="row">
                                <div class="col-4">
                                  <div class="form-group mb-2">
                                    <label for="homeid" class="mb-0 text-danger">ที่อยู</label>
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
                            <div class="container mb-4">
                                <button type="submit" class="btnAddSubmit">บันทึก ข้อมูล</button>
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
                            <h5 class="modal-title font-nanika" id="exampleModalLongTitle">เพิ่มข้อมูล กรรมการมูลนิธิ</h5>
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
                                        <label class="mb-0 text-primary" for="edittitlefundation">คำนำหน้า</label>
                                        <select class="form-control" name="edit_title_fundation" id="edittitlefundation">
                                            <option selected disabled hidden>ระบุ..</option>
                                            <option value="นาย">นาย</option>
                                            <option value="นาง">นาง</option>
                                            <option value="นางสาว">นางสาว</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-5">
                                      <label class="mb-0 text-primary" for="editfirstnamefundation">ชื่อ</label>
                                      <input type="text" class="form-control" name="edit_firstname_fundation" id="editfirstnamefundation" placeholder="ชื่อเต็ม" required>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-3">
                                      <label class="mb-0 text-primary" for="editlastnamefundation">นามสกุล</label>
                                      <input type="text" class="form-control" name="edit_lastname_fundation" id="editlastnamefundation" placeholder="นามสกุล" required>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-2">
                                      <label class="mb-0 text-primary" for="editagefundation">อายุ</label>
                                      <input type="number" class="form-control" name="edit_age_fundation" id="editagefundation" placeholder="อายุ" required>
                                    </div>
                                  </div>
                                  <div class="row col-12 mb-3">
                                    <div class="form-group mb-0 mt-0 col-2">
                                        <label class="mb-0 text-primary" for="editsexfundation">เพศ</label>
                                        <select class="form-control" name="edit_sex_fundation" id="editsexfundation">
                                            <option selected disabled hidden>ระบุ..</option>
                                            <option value="ชาย">ชาย</option>
                                            <option value="หญิง">หญิง</option>
                                            <option value="เพศที่สาม(LGBQ)">เพศที่สาม(LGBQ)</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-6">
                                      <label class="mb-0 text-primary" for="editemailfundation">email</label>
                                      <input type="email" class="form-control" name="edit_email_fundation" id="editemailfundation" placeholder="email@exsample.com" required>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-4">
                                      <label class="mb-0 text-primary" for="edittellfundation">เบอร์โทร</label>
                                      <input type="text" class="form-control" name="edit_tell_fundation" id="edittellfundation" placeholder="เบอร์โทร" required>
                                    </div>
                                  </div>
                                  <div class="col-12 row mb-3">
                                    <div class="form-group mb-0 mt-0 col-4">
                                      <label class="mb-0 text-primary" for="editcardnumberfundation">เลขปัตรประชาชน</label>
                                      <input type="number" class="form-control" name="edit_cardnumber_fundation" id="editcardnumberfundation" placeholder="เลขปัตรประชาชน" required>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-4">
                                      <label class="mb-0 text-primary" for="editoccupationfundation">อาชีพ</label>
                                      <input type="text" class="form-control" name="edit_occupation_fundation" id="editoccupationfundation" placeholder="อาชีพ" required>
                                    </div>
                                    <div class="form-group mb-0 mt-0 col-4">
                                      <label class="mb-0 text-primary" for="editworkplacefundation">สถานที่ทำงาน</label>
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
                                    <label for="Edit_homeid" class="mb-0 text-danger">ที่อยู</label>
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
                            <div class="container mb-4">
                                <button type="submit" class="btnAddSubmit">บันทึก ข้อมูล</button>
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

const fundationEditApi = (getId, eventFundation)=>{
    fetch(`backend/api/apiget-data-fundation.php?fundation_id=${getId}`,{
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