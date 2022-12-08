

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
  
  class ModalFormRevenue extends HTMLElement {
    constructor(){
      super()
    }
    get UserId(){
      return this.getAttribute("userid");
    }
    connectedCallback(){
        this.renderEvent()
    }
  
    renderEvent() {
        this.innerHTML = `
        
              <div class="modal fade " id="modalFormrevenue" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title font-nanika" id="exampleModalLongTitle">เพิ่มข้อมูล รายรับ</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="backend/add-revenue.php" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="status" value="create" />
                      <input type="hidden" name="user_id" value="${this.UserId}" />
                      <div class="modal-body row">
                          <div class="col-md-8 mt-0">
                              <div class="form-group mb-2">
                                <label class="mb-0 text-dark" for="Fullname">หัวข้อ</label>
                                <input type="text" class="form-control" name="revenue_name" id="Fullname" placeholder="หัวข้อ" required>
                              </div>
                              <div class="form-group mb-2">
                                  <label class="ml-1 mt-0 mb-0 font-weight-bold text-dark">รายละเอียด</label>
                                  <textarea class="form-control" rows="3" name="detail" id="Detail" required></textarea>
                              </div>
                              <div class="form-group mb-2 row">
                                <div class="col-5">
                                  <label for="Amount" class="mb-0 text-dark">จำนวนเงิน</label>
                                  <input type="number" class="form-control" name="amount" id="Amount" placeholder="จำนวนเงิน" required>
                                </div>
                                <div class="col-7">
                                  <label for="Funder" class="mb-0 text-dark">ชื่อ สกุลผู้ให้</label>
                                  <input type="text" class="form-control" name="funder" id="Funder" placeholder="ชื่อ สกุลผู้ให้" required>
                                </div>
                              </div>
                              
                          </div>
                          <div class="col-md-4 mb-0">
                              <mian-add-image id="stdImg" count="evidence_slip" wrapper="x-wrap" filenames="ximgname" cancles="x-cancle"
                                  names="สลิป หลักฐาน" custom="setbtnCustom" setdefault="setDefaultImgStd"></mian-add-image>
                          </div>
                      </div>
                      
                      <div class="container mb-4 row">
                          <button type="submit" class=" ml-auto  btn btn-success">บันทึกข้อมูล</button>
                      </div>
                    </form>
                    
                  </div>
                </div>
              </div>
  
        `;
    }
  }
  
  customElements.define("main-form-revenue", ModalFormRevenue)
  
  // upload revence slip
  setImagePriviews(
    ".stdImg",
    ".setDefaultImgStd",
    "#setbtnCustom",
    ".x-cancle i",
    ".ximgname",
    ".x-wrap"
  );
  
  
  class updateImage extends HTMLElement {
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
              <div class="container mt-4">
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
                  <p class="BtnCustom" id="${this.custom}">เพิ่ม สลิป</p> 
              </div>
          `;
    }
  }
  customElements.define("mian-edit-image", updateImage);
  
  class modalFormrevenueUpdate extends HTMLElement{
    constructor(){
      super()
    }
    get Userid(){
      return this.getAttribute("GetUserId")
    }
    connectedCallback(){
      this.innerHTML = `
              <div class="modal fade " id="modalFormrevenueupdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">แก้ไขข้อมูล รายรับ</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="backend/add-revenue.php" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="revenueId" id="reId" />
                      <input type="hidden" name="status" value="update" />
                      <input type="hidden" name="revenueSlip" id="reSlip" />
                      <input type="hidden" name="edit_user_id" id="edituserid"/>
                      <div class="modal-body row">
                          <div class="col-md-8 mt-0">
                              <div class="form-group mb-2">
                                <label class="mb-0 text-dark" for="reName">หัวข้อ</label>
                                <input type="text" class="form-control" name="Erevenue_name" id="reName" placeholder="หัวข้อ" required>
                              </div>
                              <div class="form-group mb-2">
                                  <label class="ml-1 mt-0 mb-0 font-weight-bold text-dark">รายละเอียด</label>
                                  <textarea class="form-control" rows="3" name="Edetail" id="reDetail" required></textarea>
                              </div>
                              <div class="form-group mb-2 row">
                                <div class="col-5">
                                  <label for="reAmount" class="mb-0 text-dark">จำนวนเงิน</label>
                                  <input type="number" class="form-control" name="Eamount" id="reAmount" placeholder="จำนวนเงิน" required>
                                </div>
                                <div class="col-7">
                                  <label for="editfunder" class="mb-0 text-dark">ชื่อ สกุลผู้ให้</label>
                                  <input type="text" class="form-control" name="edit_funder" id="editfunder" placeholder="ชื่อ สกุลผู้ให้" required>
                                </div>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <mian-edit-image id="EstdImg" count="Eevidence_slip" wrapper="e-wrapp" filenames="eimgname" cancles="e-cancle"
                                  names="สลิป หลักฐาน" custom="setbtnCustomE" setdefault="EsetDefaultImgStd"></mian-edit-image>
                          </div>
                      </div>
                      <div class="container mt-4 row">
                          <button type="submit" class="ml-auto  btn btn-success">บันทึกข้อมูล</button>
                      </div>
                    </form>
                    
                  </div>
                </div>
              </div>
      `;
    }
  }
  customElements.define('main-update-revence', modalFormrevenueUpdate);
  
      let setwrapper = document.querySelector(".e-wrapp");
      let setImgName = document.querySelector(".eimgname");
      let setBtncancle = document.querySelector(".e-cancle");
      let typeImg = document.querySelector(".EstdImg");
      let defaultInput = document.querySelector(".EsetDefaultImgStd");
      let CustomButton = document.querySelector("#setbtnCustomE");
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
  
  
  $(document).on("click", "#btnUpdateRevence",function(evt){
    let revenueID = $(this).data('id'),revenueName = $(this).data('name'), revenueDetail = $(this).data('detail');
    let revenueAmount = $(this).data('amount'), revenueSlip = $(this).data('slip'),getuserId = $(this).data('userid'),funder=$(this).data('funder')
  
    $('#reName').val(revenueName)
    $("#reId").val(revenueID);
    $("#reAmount").val(revenueAmount);
    $("#reDetail").val(revenueDetail);
    $(".EstdImg").attr('src',`backend/data/revenue/${revenueSlip}`)
    $("#reSlip").val(revenueSlip);
    $("#edituserid").val(getuserId)
    $("#editfunder").val(funder)
  
    $(".e-wrapp").last().addClass("active")
    $(".eimgname").html(revenueSlip)
    evt.preventDefault()

  });

class modalShowRevenue extends HTMLElement{
  connectedCallback(){
    this.showRevenue()
  }
  showRevenue(){
    this.innerHTML =`
    <div class="modal fade " id="modalShowRevenue" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">แสดงข้อมูล รายรับ</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body row">
              <div class="col-md-8 mt-0">
                  <div class="form-group mb-2">
                    <label class="mb-0 text-dark" for="reName">หัวข้อ</label>
                    <input type="text" class="form-control" name="Erevenue_name" id="showHeader" placeholder="หัวข้อ" disabled>
                  </div>
                  <div class="form-group mb-2">
                      <label class="ml-1 mt-0 mb-0 font-weight-bold text-dark">รายละเอียด</label>
                      <textarea class="form-control" rows="3" name="Edetail" id="showDetail" disabled></textarea>
                  </div>
                  <div class="form-group mb-2">
                    <label for="reAmount" class="mb-0 text-dark">จำนวนเงิน</label>
                    <input type="number" class="form-control" name="Eamount" id="showAmount" placeholder="จำนวนเงิน" disabled>
                  </div>
                  <div class="form-group mb-2 row">
                    <div class="col-6">
                      <label class="mb-0 text-dark" for="setFunder">ผู้ให้กองทุน</label>
                      <input type="text" class="form-control" name="Erevenue_name" id="setFunder" disabled>
                    </div>
                    <div class="col-6">
                      <label class="mb-0 text-dark" for="showUsername">ผู้รับกองทุน</label>
                      <input type="text" class="form-control" name="Erevenue_name" id="showUsername" disabled>
                    </div>
                  </div>
                  <div class="form-group mb-2">
                  </div>
              </div>
              <div class="col-md-4">
                <div class="image w-100 mt-4">
                  <img class="set-img " width="200" height="300" />
                </div>
              </div>
          </div>

        
      </div>
    </div>
  </div>
    `;
  }
}

customElements.define('main-show-revenue', modalShowRevenue);
$(document).on("click","#btnShowRevenue", function(e){
  let header=$(this).data('name'),detail=$(this).data('detail'),getUser=$(this).data('username');
  let amount=$(this).data('amount'),slip=$(this).data('slip'),funder=$(this).data('funder')

  $('#showHeader').val(header)
  $('#showDetail').val(detail)
  $('#showAmount').val(amount)
  $("#setFunder").val(funder)
  $("#showUsername").val(getUser)
  $('.set-img').attr('src',`backend/data/revenue/${slip}`)
})

$(document).on('click','#SetconfirmTrash', function(e){
  let getID=$(this).data('id'),getImg=$(this).data('image')
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
      window.location = `backend/add-revenue.php?re_id=${getID}&status=$del&img_slip=${getImg}`
    }
  })
  e.preventDefault()

})
$(document).on('click',".btnfalseDate",function(esen){
  let datese = $(this).data('datese')
  Swal.fire({
    icon: 'warning',
    title: 'ไม่อนุญาตจัดการข้อมูลได้',
    text: 'เนื่องจากเลยเวลาที่กำหนด5วันแต่นี้เกิน' + datese +'วันแล้ว',
    showConfirmButton: false,
  })
  esen.preventDefault()
})