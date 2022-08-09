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
                  <p class="BtnCustom" id="${this.custom}">Choose a file</p> 
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


class modalfromcreatevolunteer extends HTMLElement{
    connectedCallback(){
        this.renderVolunteer()
    }
    renderVolunteer(){
        this.innerHTML = `
          <div class="modal fade bd-example-modal-xl" id="modalFormVolunteer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-root-nanika" id="exampleModalLongTitle">เพิ่มข้อมูล อาสาสมัค</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="../admin/backend/add-volunteer.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="status_user" value="volunteer"/>
                        <div class="modal-body row mb-0">  
                            <div class="col-md-9 mt-0">
                                <div class="col-md-12 row">
                                  <div class="col-6">
                                    <div class="form-group mb-2 mt-0">
                                      <label class="mb-0 text-primary" for="User">user name</label>
                                      <input type="text" class="form-control" name="user_name" id="User" placeholder="User Name" required>
                                    </div>
                                  </div>
                                  <div class="col-6">
                                    <div class="form-group mb-2 mt-0">
                                      <label class="mb-0 text-primary" for="Pwd">passwerd</label>
                                      <input type="password" class="form-control" name="password_user" id="Pwd" placeholder="Password" required>
                                    </div>
                                  </div>
                                </div>
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
                                          <input type="text" class="form-control" name="ferst_name" id="Ferstname" placeholder="Ferst Name" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group mb-2">
                                          <label class="mb-0 text-primary" for="Lasttname">นามสกุล</label>
                                          <input type="text" class="form-control" name="last_name" id="Lasttname" placeholder="Last Name" required>
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
                                      <label class="mb-0 text-primary" for="Age">เพศ</label>
                                      <input type="number" class="form-control" name="age" id="Age" placeholder="อายุ" required>
                                    </div>
                                  </div>
                                  <div class="col-8">
                                    <div class="form-group mb-2">
                                      <label class="mb-0 text-primary" for="Email">อีเมลล์</label>
                                      <input type="text" class="form-control" name="email" id="Email" placeholder="Email" required>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-12 row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                          <label class="mb-0 text-primary" for="Tell">เบอร์โทร</label>
                                          <input type="number" class="form-control" name="tell" id="Tell" placeholder="เบอร์โทร" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                          <label class="mb-0 text-primary" for="IdCard">เลขบัตรประชาชน</label>
                                          <input type="number" class="form-control" name="id_card" id="IdCard" placeholder="เลขบัตรประชาชน" required>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-3">
                              <mian-add-image id="volunteerImg" count="photo_voluteer" wrapper="xl-wrap" filenames="limgname" cancles="xl-cancle"
                              names="รูปภาพ" custom="setbtnCustomVolunteer" setdefault="setDefaultImgvolunteer"></mian-add-image>
                            </div>
                        </div>
                        <div class="container mb-4">
                            <button type="submit" class="btnAddSubmit">Save Student History</button>
                        </div>
                    </form>
                </div>
            </div>
          </div>  
        `;
    }
  }
  customElements.define('main-create-volunteer', modalfromcreatevolunteer)
  
  setImagePriviews(".volunteerImg",".setDefaultImgvolunteer","#setbtnCustomVolunteer",".xl-cancle i",".limgname",".xl-wrap");