
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
                      <div class="file-name ${this.filenames}">สลิป</div>
                  </div>
                  <input type="file" name="${this.count}" class="${this.defaultbtn}" hidden>
                  <p class="BtnCustom" id="${this.custom}">อัพโหลดสลิป</p> 
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

class newPatronModal extends HTMLElement{
    connectedCallback(){
        this.renderPatron()
    }
    renderPatron(){
        this.innerHTML = `
            <div class="modal fade bd-example-modal-xl" id="newPatronModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มข้อมูลผู้ให้ทุน</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div> 
                        <form action="backend/add-patrons.php" method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="status" value="CREATE"/>
                          <div class="modal-body row">
                            <div class="col-md-9 row">
                                <div class="col-md-2">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 text-default" for="title">คำนำหน้า</label>
                                          <select class="form-control" name="title" id="exampleFormControlSelect1">
                                          <option value="นาย">นาย</option>
                                          <option value="นาง">นาง</option>
                                          <option value="นางสาว">นางสาว</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                      <label class="mb-0 text-default" for="Ferstname">ชื่อเต็ม</label>
                                      <input type="text" class="form-control" name="ferst_name" id="Ferstname" placeholder="ชื่อเต็ม" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                      <label class="mb-0 text-default" for="Lastname">นามสกุล</label>
                                      <input type="text" class="form-control" name="last_name" id="Lastname" placeholder="นามสกุล" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                      <label class="mb-0 text-default" for="Ferstname">เลขบัตรประชาชน</label>
                                      <input type="text" minlength="13" maxlength="13" class="form-control" name="card_id" id="CardId" placeholder="เลขบัตรประชาชน" onkeyup="setNumber(13,'CardId')" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                      <label class="mb-0 text-default" for="Ferstname">เบอรโทรศัพท</label>
                                      <input type="text" class="form-control" name="tell" id="Tell" placeholder="เบอร.โทรศัพท.." minlength="10" maxlength="10" onkeyup="setNumber(10,'Tell')" required>
                                    </div>
                                </div>
                                <div class="form-group mb-2 col-6">
                                  <label class="mb-0 text-default" for="career">อาชีพ</label>
                                  <input type="text" class="form-control" name="career" id="career" placeholder="อาชีพ" required>
                                </div>
                                <div class="form-group mb-2 col-6">
                                  <label class="mb-0 text-default" for="Workplace">สถานที่ทำงาน</label>
                                  <input type="text" class="form-control" name="workplace" id="Workplace" placeholder="สถานที่ทำงาน" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <mian-add-image id="sliptPatron" count="photo_patron" wrapper="x-wrap" filenames="ximgname" cancles="x-cancle"
                                names="ผู้อุปถัมภ์" custom="setbtnCustom" setdefault="setDefaultImgpatron"></mian-add-image>
                            </div>
                            
                            <div class="col-md-12">
                            <label class="mb-0 text-default" for="HomeID">ที่อยู่</label>
                             <div class="demo" id="demo7" style="" autocomplete="off" uk-grid>
                              <div class="form-group mb-2 row ">
                                <div class="col-2 mt-0">
                                  <label class="mb-0 text-default" for="HomeID">บ้านเลขที่/หมู่ที่</label>
                                  <input type="text" class="form-control" name="id_home" id="HomeID" placeholder="บ้านเลขที่/หมู่ที่" required>
                                </div>
                                <div class="col-2 mt-0">
                                <label class="mb-0 text-default" for="HomeID1">ตำบล</label>
                                  <input type="text" class="uk-input uk-width-1-1" name="distric_a" id="HomeID1" placeholder="ตำบล" required>
                                </div>
                                <div class="col-3 mt-0">
                                <label class="mb-0 text-default" for="HomeID2">อำเภอ</label>
                                  <input type="text" class="uk-input uk-width-1-1" name="distric_b" id="HomeID2" placeholder="อำเภอ" required>
                                </div>
                                <div class="col-3 mt-0">
                                <label class="mb-0 text-default" for="HomeID3">จังหวัด</label>
                                  <input type="text" class="uk-input uk-width-1-1" name="distric_c" id="HomeID3" placeholder="จังหวัด" required>
                                </div>
                                <div class="col-2 mt-0">
                                <label class="mb-0 text-default" for="HomeID4">รหัสไปรษณีย์</label>
                                  <input type="number" class="uk-input uk-width-1-1" name="distric_e" id="HomeID4" placeholder="รหัสไปรษณีย์" required>
                                </div>
                              </div>
                             </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-success ml-auto mr-4">บันทึกข้อมูล</button>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        `
    }
}

customElements.define('main-new-patron', newPatronModal)

setImagePriviews(".sliptPatron",".setDefaultImgpatron","#setbtnCustom",".x-cancle i",".ximgname",".x-wrap");

$(document).on("click","#confirmTrashPatron",function(e){
  let ID = $(this).data('id')
  let Img = $(this).data('imgpatron')
  let nickname = $(this).data('nickname')
  Swal.fire({
    title: 'คุณแน่ใจไหม ?',
    text:  `ข้อมูลการให้ทุนของ คุณ${nickname} จะถูกลบทั้งหมด จะไม่สามารถย้อนกลับได้`,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'ยกเลิก',
    confirmButtonText: 'ยืนยัน'
  }).then((result)=>{
    if(result.isConfirmed){
      window.location = `backend/add-patrons.php?patron_id=${ID}&patron_img=${Img}&status=delete`;
    }
  })
});

class modaleditpatron extends HTMLElement{
  connectedCallback(){
      this.renderEdit()
  }
  renderEdit(){
      this.innerHTML = `
      <div id="editEmployeeModal" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">แก้ไขข้อมูลผู้ให้ทุน</h5>
                      
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <form action="backend/add-patrons.php" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="status" value="UPDATE"/>
                      <input type="hidden" name="editIdpatron" id="getidpatron" />
                      <input type="hidden" name="editimagenname" id="editimagename" />
                      <div class="modal-body row">
                          <div class="col-md-9 row">
                            <div class="col-md-2">
                                <div class="form-select mb-2">
                                    <label class="mb-0 text-default" for="titleID">คำนำหน้า</label>
                                    <select class="form-control" name="edit_title" >
                                      <option selected id="etitleID" hidden></option>
                                      <option value="นาย">นาย</option>
                                      <option value="นาง">นาง</option>
                                      <option value="นางสาว">นางสาว</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                  <label class="mb-0 text-default" for="Ferstname">ชื่อ</label>
                                  <input type="text" class="form-control" name="edit_ferst_name" id="eFerstname" placeholder="FerstName" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                  <label class="mb-0 text-default" for="Lastname">นามสกุล</label>
                                  <input type="text" class="form-control" name="edit_last_name" id="eLastname" placeholder="Last Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                  <label class="mb-0 text-default" for="Idcard">เลขบัตรประชาชน</label>
                                  <input type="text" class="form-control" name="edit_card_id" id="eIdcard" placeholder="เลขบัตรประชาชน" minlength="13" maxlength="13" onkeyup="setNumber(13,'eIdcard')" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                  <label class="mb-0 text-default" for="Tell">เบอรโทรศัพท</label>
                                  <input type="text" class="form-control" name="edit_tell" id="eTell" placeholder="เบอร.โทรศัพท.." minlength="10" maxlength="10" onkeyup="setNumber(10,'eTell')" required>
                                </div>
                            </div>
                            <div class="form-group mb-2 col-6">
                              <label class="mb-0 text-default" for="career">อาชีพ</label>
                              <input type="text" class="form-control" name="edit_career" id="ecareer" placeholder="อาชีพ" required>
                            </div>
                            <div class="form-group mb-2 col-6">
                              <label class="mb-0 text-default" for="Workplace">สถานที่ทำงาน</label>
                              <input type="text" class="form-control" name="edit_workplace" id="eWorkplace" placeholder="สถานที่ทำงาน" required>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <mian-add-image id="editsliptPatron" count="edit_photo_patron" wrapper="ex-wrap" filenames="editimgname" cancles="ex-cancle"
                            names="สลิปเงินทุน" custom="editbtnCustom" setdefault="setEditImgpatron"></mian-add-image>
                          </div>
                          <div class="col-md-12">
                            <label class="mb-0 text-default" for="HomeID">ที่อยู่</label>
                            <div class="demo" id="demo77" style="" autocomplete="off" uk-grid>
                              <div class="row mb-2">
                                <div class="col-2 mt-0">
                                <label class="mb-0 text-default" for="eHomeID">บ้านเลขที่/หมู่ที่</label>
                                  <input type="text" class="form-control" name="edit_id_home" id="eHomeID" placeholder="บ้านเลขที่" required>
                                </div>
                                <div class="col-2 mt-0">
                                <label class="mb-0 text-default" for="edistric_a">ตำบล</label>
                                  <input type="text" class="uk-input uk-width-1-1" name="edit_distric_a" id="edistric_a" placeholder="ตำบล" required>
                                </div>
                                <div class="col-3 mt-0">
                                <label class="mb-0 text-default" for="edistric_b">อำเภอ</label>
                                  <input type="text" class="uk-input uk-width-1-1" name="edit_distric_b" id="edistric_b" placeholder="อำเภอ" required>
                                </div>
                                <div class="col-3 mt-0">
                                <label class="mb-0 text-default" for="edistric_c">จังหวัด</label>
                                  <input type="text" class="uk-input uk-width-1-1" name="edit_distric_c" id="edistric_c" placeholder="จังหวัด" required>
                                </div>
                                <div class="col-2 mt-0">
                                <label class="mb-0 text-default" for="edistric_e">รหัสไปรษณีย์</label>
                                  <input type="number" class="uk-input uk-width-1-1" name="edit_distric_e" id="edistric_e" placeholder="รหัสไปรษณีย์" required>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success ml-auto mr-4">บันทึกข้อมูล</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
      `
  }
}
customElements.define('main-edit-patron', modaleditpatron)

setImagePriviews(".editsliptPatron",".setEditImgpatron","#editbtnCustom",".ex-cancle i",".editimgname",".ex-wrap");

const patronapiedit = (dataid, fneditpatron)=>{
  fetch(`backend/api/apiget-data-patron.php?patron_id=${dataid}`,{
      method: "GET",
      headers:{"Content-Type": "application/json; charset=UTF-8",}
  }).then(res => res.json())
  .then(data =>{
     // console.log(data)
      fneditpatron(data)
  })
  .catch(err => console.log(err))
}

function edtdatapatron(getdata){
  const selectEl = (el, data)=> document.getElementById(el).innerHTML = data;
  const inputEl = (el, eventdata) => document.getElementById(el).value = `${eventdata}`;
  return getdata.map((resdata)=>{

     selectEl('etitleID', resdata.title);
      inputEl('eFerstname',resdata.f_name);
      inputEl('eLastname', resdata.l_name);
      inputEl('eIdcard', resdata.id_card);
      inputEl('eTell', resdata.tell);
      inputEl('eHomeID', resdata.number_home);
      inputEl('edistric_a', resdata.district_t);
      inputEl('edistric_b' , resdata.district_a);
      inputEl('edistric_c', resdata.district_j);
      inputEl('edistric_e', resdata.zip_code);
      inputEl('ecareer', resdata.career);
      inputEl('eWorkplace', resdata.workplace);
      console.log(resdata.f_name)

  })
}

$(document).on('click', '#editbtnpatron', function(event){
  var patronId = $(this).data('id'),img = $(this).data('image')
  $('#showidpatron').html(patronId)
  $('#getidpatron').val(patronId)
  $(".editsliptPatron").attr('src',`backend/data/patrons/${img}`)
  $(".ex-wrap").last().addClass("active")
  $(".editimgname").html('รูปเดิม')
  $("#editimagename").val(img)
  patronapiedit(patronId, edtdatapatron)
  event.preventDefault()
})

class modalShowPatron extends HTMLElement{
  connectedCallback(){
    this.renderShow()
  }
  renderShow(){
    this.innerHTML = `
    <div id="ShowModalPatron" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">แสดงข้อมูลผู้ให้ทุน</h5>
                    <p id="showidpatron"></p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body row">
                        <div class="col-md-9 row">
                          <div class="col-md-2">
                              <div class="form-select mb-2">
                                  <label class="mb-0 text-default" for="StitleID">คำนำหน้า</label>
                                  <input type="text" class="form-control" id="StitleID" disabled>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group mb-2">
                                <label class="mb-0 text-default" for="SFerstname">ชื่อ</label>
                                <input type="text" class="form-control" id="SFerstname" disabled>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group mb-2">
                                <label class="mb-0 text-default" for="SLastname">นามสกุล</label>
                                <input type="text" class="form-control" id="SLastname" disabled>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group mb-2">
                                <label class="mb-0 text-default" for="SIdcard" id="errmsg">เลขบัตรประชาชน</label>
                                <input type="text" class="form-control" id="SIdcard" disabled>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group mb-2">
                                <label class="mb-0 text-default" for="STell">เบอรโทรศัพท</label>
                                <input type="text" class="form-control" id="STell" disabled>
                              </div>
                          </div>
                          <div class="form-group mb-2 col-6">
                            <label class="mb-0 text-default" for="Scareer">อาชีพ</label>
                            <input type="text" class="form-control" id="Scareer" disabled>
                          </div>
                          <div class="form-group mb-2 col-6">
                            <label class="mb-0 text-default" for="SWorkplace">สถานที่ทำงาน</label>
                            <input type="text" class="form-control" id="SWorkplace" disabled>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="mb-2" 
                            style="
                              position: absolute;
                              height: 100%;
                              width: 100%;
                              display: flex;
                              align-items: center;
                              justify-content: center;"
                          >
                            <img class="set-image-patron" 
                             style="height: 90%;
                                    width: 90%;
                                    background-repeat: no-repeat;
                                    object-fit: cover;
                                    background-attachment: fixed;  
                                    background-size: cover;"
                            />
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="mb-0 text-default" for="SHomeID">ที่อยู่</label>
                          <div class="row mb-2">
                            <div class="col-2 mt-0">
                              <input type="text" class="form-control"  id="SHomeID" disabled>
                            </div>
                            <div class="col-2 mt-0">
                              <input type="text" class="form-control" id="Sdistric_a" disabled>
                            </div>
                            <div class="col-3 mt-0">
                              <input type="text" class="form-control" id="Sdistric_b" disabled>
                            </div>
                            <div class="col-3 mt-0">
                              <input type="text" class="form-control" id="Sdistric_c" disabled>
                            </div>
                            <div class="col-2 mt-0">
                              <input type="text" class="form-control" id="Sdistric_e" disabled>
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
customElements.define('modal-show-patron', modalShowPatron)

function showDataElementPatron(getPatronData){
  return getPatronData.map((respatrondata,i)=>{
    $("#StitleID").val(respatrondata.title)
    $("#SFerstname").val(respatrondata.f_name)
    $("#SLastname").val(respatrondata.l_name)
    $("#SIdcard").val(respatrondata.id_card)
    $("#STell").val(respatrondata.tell)
    $("#Scareer").val(respatrondata.career)
    $("#SWorkplace").val(respatrondata.workplace)
    $("#SHomeID").val(respatrondata.number_home)
    $("#Sdistric_a").val(respatrondata.district_t)
    $("#Sdistric_b").val(respatrondata.district_a)
    $("#Sdistric_c").val(respatrondata.district_j)
    $("#Sdistric_e").val(respatrondata.zip_code)
    $(".set-image-patron").attr('src',`backend/data/patrons/${respatrondata.img_slip_patron}`)
  })
}

$(document).on("click","#ButtonShowModalPatron", function(e){
  let getPatronId = $(this).data('id')
  console.log(getPatronId)
  patronapiedit(getPatronId,showDataElementPatron)
  e.preventDefault()
})

