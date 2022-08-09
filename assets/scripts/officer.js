
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
                  <p class="BtnCustom" id="${this.custom}">อัพโหลดรูปภาพ</p> 
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

class modalformcreateofficer extends HTMLElement{
    connectedCallback(){
        this.renderofficer()
    }
    renderofficer(){
        this.innerHTML = `
        <div class="modal fade bd-example-modal-xl" id="modalFormofficer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-nanika" id="exampleModalLongTitle">เพิ่มข้อมูล เจ้าหน้าที่</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="backend/add-officer-volunteer.php" method="post" enctype="multipart/form-data">
                        <div class="modal-body row mb-0">  
                            <div class="col-md-9 mt-0">
                                <input type="hidden" name="email" value="ถูกเอาออก ถ้าลบcolum นี้ออก error แน่"/>
                                <div class="col-md-12 row">
                                    <div class="col-3">
                                        <div class="form-group mb-2">
                                          <label class="mb-0 text-primary" for="title">คำนำหน้า</label>
                                          <select class="form-control" name="title" id="exampleFormControlSelect1">
                                            <option selected disabled hidden>ระบุ..</option>
                                            <option value="นาย">นาย</option>
                                            <option value="นาง">นาง</option>
                                            <option value="นางสาว">นางสาว</option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group mb-2">
                                          <label class="mb-0 text-primary" for="Ferstname">ชื่อเต็ม</label>
                                          <input type="text" class="form-control" name="ferst_name" id="Ferstname" placeholder="ชื่อเต็ม" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group mb-2">
                                          <label class="mb-0 text-primary" for="Lasttname">นามสกุล</label>
                                          <input type="text" class="form-control" name="last_name" id="Lasttname" placeholder="นามสกุล" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 row">
                                  <div class="col-3">
                                    <div class="form-group mb-2">
                                      <label class="mb-0 text-primary" for="title">สิทธ์การใช้งาน</label>
                                      <select class="form-control" name="status_user" id="exampleFormControlSelect1">
                                        <option selected disabled hidden>ระบุ..</option>
                                        <option value="volunteer">เจ้าหน้าที่</option>
                                        <option value="officer">อาสาสมัค</option>
                                        <option value="chairman">ประธาน</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-5">
                                    <div class="form-group mb-2 mt-0">
                                      <label class="mb-0 text-primary" for="User">อีเมล</label>
                                      <input type="text" class="form-control" name="user_name" id="User" placeholder="อีเมล" required>
                                    </div>
                                  </div>
                                  <div class="col-4">
                                    <div class="form-group mb-2 mt-0">
                                      <label class="mb-0 text-primary" for="Pwd">รหัสผ่าน</label>
                                      <input type="password" class="form-control" name="password_user" id="Pwd" placeholder="รหัสผ่าน" required>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-12 row">
                                  <div class="col-2">
                                    <div class="form-group mb-2">
                                      <label class="mb-0 text-primary" for="Sex">เพศ</label>
                                      <select class="form-control" name="sex" id="Sex">
                                        <option selected disabled hidden>ระบุ..</option>
                                        <option value="ชาย">ชาย</option>
                                        <option value="หญิง">หญิง</option>
                                        <option value="เพศที่3">เพศที่3(LGBQ)</option>
                                      </select>
                                    </div>
                                  </div>


                                  <div class="col-2">
                                    <div class="form-group mb-2">
                                      <label class="mb-0 text-primary" for="Age">อายุ</label>
                                      <input type="number" class="form-control" name="age" id="Age" placeholder="อายุ" required>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                  <div class="form-group mb-2">
                                    <label class="mb-0 text-primary" for="Tell">เบอร์โทร</label>
                                    <input type="number" class="form-control" name="tell" id="Tell" placeholder="เบอร์โทร" required>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                        <div class="form-group mb-2">
                                          <label class="mb-0 text-primary" for="IdCard">เลขบัตรประชาชน</label>
                                          <input type="number" class="form-control" name="id_card" id="IdCard" placeholder="เลขบัตรประชาชน" required>
                                        </div>
                                    </div> 
                                
                                </div>
                            </div>
                            <div class="col-md-3">
                                <mian-add-image id="officerImg" count="photo_officer" wrapper="x-wrap" filenames="ximgname" cancles="x-cancle"
                                names="รูปภาพ" custom="setbtnCustom" setdefault="setDefaultImgofficer"></mian-add-image>
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <button type="submit" class="btn btn-primary ml-auto">บันทึกข้อมูล</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        `;
    }
}

customElements.define('main-add-officer', modalformcreateofficer)

setImagePriviews(".officerImg",".setDefaultImgofficer","#setbtnCustom",".x-cancle i",".ximgname",".x-wrap");

class modalEditUsers extends HTMLElement{
  connectedCallback(){
    this.renderEdit()
  }
  renderEdit(){
    this.innerHTML =`
    <div class="modal fade bd-example-modal-xl" id="modalFormUsersupdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title font-nanika" id="exampleModalLongTitle">แก้ไขข้อมูล ผู้ใช้งาน</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <form action="backend/edit-officer-volunteer.php" method="post" enctype="multipart/form-data">
          <div class="modal-body row mb-0">  
              <div class="col-md-9 mt-0">
                  <input type="hidden" name="get_user_id" id="getUserId"/>
                  <input type="hidden" name="get_img_name" id="getImgname"/>
                  <div class="col-md-12 row">
                      <div class="col-3">
                          <div class="form-group mb-2">
                            <label class="mb-0 text-primary" for="editTitle">คำนำหน้า</label>
                            <select class="form-control" name="edit_title" id="editTitle">
                              <option value="นาย">นาย</option>
                              <option value="นาง">นาง</option>
                              <option value="นางสาว">นางสาว</option>
                            </select>
                          </div>
                      </div>
                      <div class="col-5">
                          <div class="form-group mb-2">
                            <label class="mb-0 text-primary" for="editFirstname">ชื่อเต็ม</label>
                            <input type="text" class="form-control" name="edit_first_name" id="editFirstname" placeholder="ชื่อเต็ม" required>
                          </div>
                      </div>
                      <div class="col-4">
                          <div class="form-group mb-2">
                            <label class="mb-0 text-primary" for="editLastname">นามสกุล</label>
                            <input type="text" class="form-control" name="edit_last_name" id="editLastname" placeholder="นามสกุล" required>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-12 row">
                    <div class="col-3">
                      <div class="form-group mb-2">
                        <label class="mb-0 text-primary" for="editStatus">สิทธ์การใช้งาน</label>
                        <select class="form-control" name="edit_status_user" id="editStatus">
                          <option value="volunteer">เจ้าหน้าที่</option>
                          <option value="officer">อาสาสมัค</option>
                          <option value="chairman">ประธาน</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-5">
                      <div class="form-group mb-2 mt-0">
                        <label class="mb-0 text-primary" for="editUsername">อีเมล</label>
                        <input type="text" class="form-control" name="edit_username" id="editUsername" placeholder="อีเมล" required>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group mb-2 mt-0">
                        <label class="mb-0 text-primary" for="editPassword">รหัสผ่าน</label>
                        <input type="password" class="form-control" name="edit_password_user" id="editPassword" placeholder="รหัสผ่าน" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 row">
                    <div class="col-2">
                      <div class="form-group mb-2">
                        <label class="mb-0 text-primary" for="editSex">เพศ</label>
                        <select class="form-control" name="edit_sex" id="editSex">
                          <option value="ชาย">ชาย</option>
                          <option value="หญิง">หญิง</option>
                          <option value="เพศที่3">เพศที่3(LGBQ)</option>
                        </select>
                      </div>
                    </div>


                    <div class="col-2">
                      <div class="form-group mb-2">
                        <label class="mb-0 text-primary" for="editAge">อายุ</label>
                        <input type="number" class="form-control" name="edit_age" id="editAge" placeholder="อายุ" required>
                      </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group mb-2">
                      <label class="mb-0 text-primary" for="editTell">เบอร์โทร</label>
                      <input type="number" class="form-control" name="edit_tell" id="editTell" placeholder="เบอร์โทร" required>
                    </div>
                </div>
                <div class="col-md-4">
                          <div class="form-group mb-2">
                            <label class="mb-0 text-primary" for="editCardId">เลขบัตรประชาชน</label>
                            <input type="number" class="form-control" name="edit_cardid" id="editCardId" placeholder="เลขบัตรประชาชน" required>
                          </div>
                      </div> 
                  
                  </div>
              </div>
              <div class="col-md-3">
                  <mian-add-image id="editUserImg" count="editphoto_user" wrapper="edix-wrap" filenames="eimgname" cancles="edit-cancle"
                  names="รูปภาพ" custom="editbtnCustom" setdefault="setDefaultImgUser"></mian-add-image>
              </div>
          </div>
          <div class="col-md-12 row">
              <button type="submit" class="btn btn-primary ml-auto">บันทึกข้อมูล</button>
          </div>
      </form>
        </div>
      </div>    
    </div>
    ` 
  }
}
customElements.define('main-edit-users', modalEditUsers)
setImagePriviews(".editUserImg",".setDefaultImgUser","#editbtnCustom",".edit-cancle i",".eimgname",".edix-wrap");
$(document).on("click","#btneditusers", function(e){
  let userId = $(this).data('id'),title=$(this).data('title'),firstname=$(this).data('firstname');
  let lastname=$(this).data('lastname'),username=$(this).data('username'),password=$(this).data('password');
  let sex=$(this).data('sex'),age=$(this).data('age'),cardid=$(this).data('cardid'),tell=$(this).data('tell');
  let statusUser=$(this).data('statususer'),imageUser=$(this).data('imageuser');

  $("#getUserId").val(userId)
  $("#editTitle").val(title);
  $("#editFirstname").val(firstname)
  $("#editLastname").val(lastname)
  $("#editStatus").val(statusUser)
  $("#editUsername").val(username)
  $("#editPassword").val(password)
  $("#editSex").val(sex)
  $("#editAge").val(age)
  $("#editTell").val(tell)
  $("#editCardId").val(cardid)

  $(".editUserImg").attr('src',`backend/data-image/${imageUser}`)
  $("#getImgname").val(imageUser)
  $(".edix-wrap").last().addClass("active")
  $(".eimgname").html(imageUser)
  e.preventDefault()
})

class modalGetUsers extends HTMLElement{
  connectedCallback(){
    this.renderGet()
  }
  renderGet(){
    this.innerHTML =`
    <div class="modal fade bd-example-modal-xl" id="modalShowdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title font-nanika" id="exampleModalLongTitle">แสดงข้อมูล</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <form action="backend/edit-officer-volunteer.php" method="post" enctype="multipart/form-data">
          <div class="modal-body row mb-0">  
              <div class="col-md-9 mt-0">
                  <div class="col-md-12 row">
                      <div class="col-3">
                          <div class="form-group mb-2">
                            <label class="mb-0 text-primary" for="getTitle">คำนำหน้า</label>
                            <input type="text" class="form-control"  id="getTitle"  disabled>
                          </div>
                      </div>
                      <div class="col-5">
                          <div class="form-group mb-2">
                            <label class="mb-0 text-primary" for="getFirstname">ชื่อเต็ม</label>
                            <input type="text" class="form-control"  id="getFirstname" disabled>
                          </div>
                      </div>
                      <div class="col-4">
                          <div class="form-group mb-2">
                            <label class="mb-0 text-primary" for="getLastname">นามสกุล</label>
                            <input type="text" class="form-control" name="" id="getLastname" disabled>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-12 row">
                    <div class="col-3">
                      <div class="form-group mb-2">
                        <label class="mb-0 text-primary" for="getStatus">สิทธ์การใช้งาน</label>
                        <input type="text" id="getStatus" class="form-control" disabled />
                      </div>
                    </div>
                    <div class="col-5">
                      <div class="form-group mb-2 mt-0">
                        <label class="mb-0 text-primary" for="getUsername">อีเมล</label>
                        <input type="text" class="form-control" name="edit_username" id="getUsername" disabled>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group mb-2 mt-0">
                        <label class="mb-0 text-primary" for="getPassword">รหัสผ่าน</label>
                        <input type="password" class="form-control" name="edit_password_user" id="getPassword" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 row">
                    <div class="col-2">
                      <div class="form-group mb-2">
                        <label class="mb-0 text-primary" for="getSex">เพศ</label>
                        <input type="text" class="form-control" id="getSex" disabled/>
                      </div>
                    </div>


                    <div class="col-2">
                      <div class="form-group mb-2">
                        <label class="mb-0 text-primary" for="getAge">อายุ</label>
                        <input type="number" class="form-control" name="edit_age" id="getAge" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group mb-2">
                      <label class="mb-0 text-primary" for="getTell">เบอร์โทร</label>
                      <input type="number" class="form-control" name="edit_tell" id="getTell" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                          <div class="form-group mb-2">
                            <label class="mb-0 text-primary" for="getCardId">เลขบัตรประชาชน</label>
                            <input type="number" class="form-control" name="edit_cardid" id="getCardId" disabled>
                          </div>
                      </div> 
                  
                  </div>
              </div>
              <div class="col-md-3">
              <div class="container">
                  <div class="wrapper x-wrap">
                      <div class="image">
                         <img src="" alt="" class="getimageuser"> 
                      </div>
                      <div class="content">
                          <div class="icon">
                              <i class="fas fa-cloud-upload-alt"></i>
                          </div>
                      </div>
                      
                  </div>
              </div>
              </div>
          </div>
          <div class="col-md-12 row">
            <button type="button" class="btn btn-secondary ml-auto" data-dismiss="modal">Close</button>
          </div>
      </form>
        </div>
      </div>    
    </div>
    ` 
  }
}
customElements.define('main-get-users',modalGetUsers);

$(document).on("click","#btnshowusers", function(e){
  let userId = $(this).data('id'),title=$(this).data('title'),firstname=$(this).data('firstname');
  let lastname=$(this).data('lastname'),username=$(this).data('username'),password=$(this).data('password');
  let sex=$(this).data('sex'),age=$(this).data('age'),cardid=$(this).data('cardid'),tell=$(this).data('tell');
  let statusUser=$(this).data('statususer'),imageUser=$(this).data('imageuser');

  $("#getTitle").val(title);
  $("#getFirstname").val(firstname)
  $("#getLastname").val(lastname)
  $("#getStatus").val(statusUser)
  $("#getUsername").val(username)
  $("#getPassword").val(password)
  $("#getSex").val(sex)
  $("#getAge").val(age)
  $("#getTell").val(tell)
  $("#getCardId").val(cardid)
  switch (statusUser) {
    case 'volunteer':
      $("#getStatus").val('เจ้าหน้าที่')
      break;
    case 'officer':
      $("#getStatus").val('อาสาสมัค')
      break;
    case 'chairman':
      $("#getStatus").val('ประธาน')
      break
    default:
      $("#getStatus").val(statusUser)
      break;
  }

  $(".getimageuser").attr('src',`backend/data-image/${imageUser}`)
  e.preventDefault()
}) 

$(document).on("click","#myConfirm", function(e){
  let idUser = $(this).data('id')
  let imageUser = $(this).data('imageuser')
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
      window.location = `backend/add-officer-volunteer.php?ex_id=${idUser}&img_user=${imageUser}`
    }
  })
})
