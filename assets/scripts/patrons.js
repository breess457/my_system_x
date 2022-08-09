
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
                            <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มข้อมูลผู้อุปถัมภ์</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="backend/add-patrons.php" method="POST" enctype="multipart/form-data">
                          <div class="modal-body row">
                            <div class="col-md-2">
                                <div class="form-group mb-2">
                                      <label class="mb-0 text-primary" for="title">คำนำหน้า</label>
                                      <select class="form-control" name="title" id="exampleFormControlSelect1">
                                      <option value="นาย">นาย</option>
                                      <option value="นาง">นาง</option>
                                      <option value="นางสาว">นางสาว</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                  <label class="mb-0 text-primary" for="Ferstname">ชื่อเต็ม</label>
                                  <input type="text" class="form-control" name="ferst_name" id="Ferstname" placeholder="ชื่อเต็ม" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                  <label class="mb-0 text-primary" for="Lastname">นามสกุล</label>
                                  <input type="text" class="form-control" name="last_name" id="Lastname" placeholder="นามสกุล" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                  <label class="mb-0 text-primary" for="Ferstname">เลขที่บัตรประจำตัวประชาชน</label>
                                  <input type="text" class="form-control" name="card_id" id="Ferstname" placeholder="เลขที่บัตรประจำตัวประชาชน" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                  <label class="mb-0 text-primary" for="Ferstname">เบอรโทรศัพท</label>
                                  <input type="text" class="form-control" name="tell" id="Ferstname" placeholder="เบอร.โทรศัพท.." required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0 text-primary" for="HomeID">address</label>
                                <div class="form-group mb-2 row">
                                  <div class="col-2 mt-0">
                                    <input type="text" class="form-control" name="id_home" id="HomeID" placeholder="บ้านเลขที่" required>
                                  </div>
                                  <div class="col-2 mt-0">
                                    <input type="text" class="form-control" name="distric_a" id="HomeID" placeholder="ตำบล" required>
                                  </div>
                                  <div class="col-3 mt-0">
                                    <input type="text" class="form-control" name="distric_b" id="HomeID" placeholder="อำเภอ" required>
                                  </div>
                                  <div class="col-3 mt-0">
                                    <input type="text" class="form-control" name="distric_c" id="HomeID" placeholder="จังหวัด" required>
                                  </div>
                                  <div class="col-2 mt-0">
                                    <input type="number" class="form-control" name="distric_e" id="HomeID" placeholder="รหัสไปรษณีย์" required>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-9 row">
                                <div class="form-group mb-2 col-6">
                                  <label class="mb-0 text-primary" for="career">อาชีพ</label>
                                  <input type="text" class="form-control" name="career" id="career" placeholder="อาชีพ" required>
                                </div>
                                <div class="form-group mb-2 col-6">
                                  <label class="mb-0 text-primary" for="Workplace">สถานที่ทำงาน</label>
                                  <input type="text" class="form-control" name="workplace" id="Workplace" placeholder="สถานที่ทำงาน" required>
                                </div>
                                <div class="form-group mb-2 col-6">
                                  <label class="mb-0 text-primary" for="Datenew">วัน/เดือน/ปี ที่เริ่มให้ทุน</label>
                                  <input type="date" class="form-control" name="new_date" id="Datenew" placeholder="วัน/เดือน/ปี" required>
                                </div>
                                <div class="form-group mb-2 col-6">
                                  <label class="mb-0 text-primary" for="Dateend">วัน/เดือน/ปี สิ้นสุดให้ทุน</label>
                                  <input type="date" class="form-control" name="end_date" id="Dateend" placeholder="วัน/เดือน/ปี" required>
                                </div>
                                <div class="form-group mb-2 col-6">
                                  <label class="mb-0 text-primary" for="xnumber">ให้ทุนการศึกษาจำนวน บาท/เดือน/คน</label>
                                  <input type="number" class="form-control" name="num_x" id="xnumber" placeholder="จำนวน บาท/เดือน/คน" required>
                                </div>
                                <div class="form-group mb-2 col-6">
                                  <label class="mb-0 text-primary" for="allmonny">รวมเป็นเงินทั้งสิ้น</label>
                                  <input type="number" class="form-control" name="all_manny" id="allmonny" placeholder="เงินทั้งสิ้น" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <mian-add-image id="sliptPatron" count="photo_officer" wrapper="x-wrap" filenames="ximgname" cancles="x-cancle"
                                names="สลิปเงินทุน" custom="setbtnCustom" setdefault="setDefaultImgpatron"></mian-add-image>
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

customElements.define('main-new-patron', newPatronModal)

setImagePriviews(".sliptPatron",".setDefaultImgpatron","#setbtnCustom",".x-cancle i",".ximgname",".x-wrap");

$(document).on("click","#confirmTrashPatron",function(e){
  let ID = $(this).data('id')
  let Img = $(this).data('imgpatron')
  Swal.fire({
    title: 'คุณแน่ใจไหม ?',
    text: "คุณจะไม่สามารถย้อนกลับได้!",
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