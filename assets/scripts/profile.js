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


class modalEditProfile extends HTMLElement{
    constructor(){
        super()
    }
    get formAction(){
        return this.getAttribute("formlink")
    }
    get selectedStatus(){
      return this.getAttribute("selected")
    }
    get right(){
      return this.getAttribute("right")
    }
    connectedCallback(){
        this.renderEditModalProfile()
    }
    renderEditModalProfile(){
        this.innerHTML = `
        <div class="modal fade bd-example-modal-xl" id="modalEditProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-nanika" id="exampleModalLongTitle">แก้ไขข้อมูล โปรไฟล์</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <form action="${this.formAction}" method="post" enctype="multipart/form-data">
                        <div class="modal-body row mb-0">
                            <input type="hidden" name="get_user_id" id="getUserId"/>
                            <input type="hidden" name="get_img_name" id="getImgname"/>
                            <div class="col-md-3">
                              <mian-add-image id="editUserImg" count="editphoto_user" wrapper="edix-wrap" filenames="eimgname" cancles="edit-cancle"
                              names="รูปภาพ" custom="editbtnCustom" setdefault="setDefaultImgUser"></mian-add-image>
                            </div>
                            <div class="col-md-9 row">
                                <div class="col-3">
                                    <div class="form-group mb-2">
                                        <label class="mb-0 text-primary" for="title">คำนำหน้า</label>
                                        <select class="form-control" name="edit_title" id="title">
                                            <option value="mr" ${this.right}>mr (เฉพาะผู้ดูแลระบบ)</option>
                                            <option value="นาย" ${this.selectedStatus}>นาย</option>
                                            <option value="นาง" ${this.selectedStatus}>นาง</option>
                                            <option value="นางสาว" ${this.selectedStatus}>นางสาว</option>
                                        </select>
                                     </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group mb-2">
                                        <label class="mb-0 text-primary" for="firstname">ชื่อเต็ม</label>
                                        <input type="text" class="form-control" name="edit_first_name" id="firstname" placeholder="ชื่อเต็ม" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group mb-2">
                                        <label class="mb-0 text-primary" for="lastname">นามสกุล</label>
                                        <input type="text" class="form-control" name="edit_last_name" id="lastname" placeholder="นามสกุล" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-0 text-primary" for="username">อีเมล</label>
                                        <input type="text" class="form-control" name="edit_username" id="username" placeholder="อีเมล" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-2">
                                        <label class="mb-0 text-primary" for="cardid">เลขบัตรประชาชน</label>
                                        <input type="text" class="form-control" name="edit_cardid" id="cardid" placeholder="นามสกุล" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group mb-2">
                                        <label class="mb-0 text-primary" for="tell">เบอร์โทร</label>
                                        <input type="text" class="form-control" name="edit_tell" id="tell" placeholder="เบอร์โทร" required>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group mb-2">
                                        <label class="mb-0 text-primary" for="age">อายุ</label>
                                        <input type="text" class="form-control" name="edit_age" id="age" placeholder="อายุ" required>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group mb-2">
                                        <label class="mb-0 text-primary" for="sex">เพศ</label>
                                        <select class="form-control" name="edit_sex" id="sex">
                                            <option value="ชาย">ชาย</option>
                                            <option value="หญิง">หญิง</option>
                                            <option value="เพศที่3">เพศที่3(LGBQ)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container row">
                          <button type="submit" class="btn btn-primary ml-auto">update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        `
    }
}
customElements.define('main-edit-profile', modalEditProfile)

setImagePriviews(".editUserImg",".setDefaultImgUser","#editbtnCustom",".edit-cancle i",".eimgname",".edix-wrap");

$(document).on("click","#btnEditProfile", function(e){
    let userId = $(this).data('id'),title=$(this).data('title'),firstname=$(this).data('firstname');
    let lastname = $(this).data('lastname'),cardid=$(this).data('cardid'),tell=$(this).data('tell'),stete=$(this).data('stete');
    let sex = $(this).data('sex'),age=$(this).data('age'),photo=$(this).data('photo'),username=$(this).data('username')

    $("#getUserId").val(userId)
    $("#title").val(title)
    $("#firstname").val(firstname)
    $("#lastname").val(lastname)
    $("#username").val(username)
    $("#cardid").val(cardid)
    $("#tell").val(tell)
    $("#sex").val(sex)
    $("#age").val(age)

    $("#getImgname").val(photo)
    if(stete === "admin"){
      $(".editUserImg").attr('src',`backend/data-image/${photo}`)
    }else{
      $(".editUserImg").attr('src',`../root/backend/data-image/${photo}`)
    }
    $(".edix-wrap").last().addClass("active")
    $(".eimgname").html(imageUser)

    e.preventDefault()

});

$(document).on("click","#btnResetPass", function(ev){
  let dataID = $(this).data("id");
  let Password = $(this).data("password");
  Swal.fire({
    title: "ป้อน รหัสผ่าน เดิม",
      html: `<input type="text" id="password" class="swal2-input" placeholder="รหัสผ่านเดิม">`,
      inputAttributes: {
        autocapitalize: "off",
      },
      confirmButtonText: "Confirm",
      showLoaderOnConfirm: true,
      preConfirm: () => {
        const password = Swal.getPopup().querySelector("#password").value;
        if (!password) {
          Swal.showValidationMessage(`กรุณาป้อน รหัสผ่านเดิม`);
        }
        return { password: password };
      }, 
      allowOutsideClick:()=> !Swal.isLoading(),
  }).then((newData)=>{
    if(newData.value.password === (Password).toString()){
     
      Swal.fire({
        title: "ป้อน รหัสผ่าน ใหม่",
        html: `<input type="text" id="newpassword" class="swal2-input" placeholder="Password">`,
        inputAttributes: {
          autocapitalize: "off",
        },
        confirmButtonText: "ตกลง",
        showLoaderOnConfirm: true,
        preConfirm: () => {
          const newpassword = Swal.getPopup().querySelector("#newpassword").value;
          if (!newpassword) {
            Swal.showValidationMessage(`กรุณาป้อน รหัสผ่านใหม่`);
          }
          return { newpassword: newpassword };
        },
      }).then((newPassword)=>{
          let passwordNew = newPassword.value.newpassword;
          fetch(`backend/api/api-reset-password.php?getId=${dataID}&newPasswords=${passwordNew}`,{
            method:"GET",
            headers: {
              "Content-Type": "application/json; charset=UTF-8",
            },
          })
          .then((resw)=> resw.json())
          .then((setmethod)=>{
            Swal.fire({
              title:setmethod.title,
              icon:setmethod.icons,
              text:setmethod.text,
              showConfirmButton: true,
            })
          }).catch((err) => console.log(err))
      })
    }else{
      console.log(Password)
      console.log(typeof Password)
      console.log(typeof newData.value.password)
      Swal.fire({
        title: "รหัสผ่านไม่ถูกต้อง",
        text:`รหัสผ่านไม่ถูกต้อง โปรดป้อนรหัสผ่านเดิม ${typeof Password} > ${Password} >${typeof (Password).toString()}`,
        icon: "error",
        showConfirmButton: true,
      });
    }
  })
  ev.preventDefault()
})
