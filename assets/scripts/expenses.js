
class modalShowExpenses extends HTMLElement {
  connectedCallback(){
    this.renderShowexpenses()
  }
  renderShowexpenses(){
    this.innerHTML =`
    <div class="modal fade " id="modalShowExpenses" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">แสดงข้อมูล รายจ่าย</h5>
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
              </div>
              <div class="col-md-4">
                <div class="image w-100">
                  <img class="set-img" width="200" height="300" />
                </div>
              </div>
          </div>

        
      </div>
    </div>
  </div>
    `;
  }
}
customElements.define('main-show-expenses', modalShowExpenses)
$(document).on("click","#btnShowExpenses", function(e){
  let headername=$(this).data('name'),detailname=$(this).data('detail')
  let amount=$(this).data('amount'),slipImage=$(this).data('slip')

    $("#showHeader").val(headername)
    $("#showDetail").val(detailname)
    $("#showAmount").val(amount)
    $(".set-img").attr('src',`backend/data/expenses/${slipImage}`)
  e.preventDefault()
})

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
  customElements.define("mian-add-image", AddImage);
  
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
  
  class ModalFormexpenses extends HTMLElement {
    connectedCallback() {
      this.renderEventlist();
    }
  
    renderEventlist() {
      this.innerHTML = `
        
              <div class="modal fade" id="modalFormexpenses" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มข้อมูล รายจ่าย</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="backend/add-expenses.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="status" value="create" />
                      <div class="modal-body row">
                          <div class="col-md-8 mt-0">
                              <div class="form-group mb-2">
                                <label class="mb-0 text-dark" for="Fullname">หัวข้อ</label>
                                <input type="text" class="form-control" name="expenses_name" id="Fullname" placeholder="หัวข้อ" required>
                              </div>
                              <div class="form-group mb-2">
                                  <label class="ml-1 mt-0 mb-0 font-weight-bold text-dark">รายละเอียด</label>
                                  <textarea class="form-control" rows="3" name="detail" id="Detail" required></textarea>
                              </div>
                              <div class="form-group mb-2">
                                <label for="Amount" class="mb-0 text-dark">จำนวนเงิน</label>
                                <input type="number" class="form-control" name="amount" id="Amount" placeholder="จำนวนเงิน" required>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <mian-add-image id="stdImgX" count="evidence_slip" wrapper="x-wrapX" filenames="ximgnameX" cancles="x-cancleX"
                                  names="สลิป หลักฐาน" custom="setbtnCustomX" setdefault="setDefaultImgStdX"></mian-add-image>
                          </div>
                      </div>
                      <div class="container mb-4 row">
                          <button type="submit" class="ml-auto  btn btn-success">บันทึกข้อมูล</button>
                      </div>
                    </form>
                    
                  </div>
                </div>
              </div>
  
        `;
    }
  }
  
  customElements.define("main-form-expenses", ModalFormexpenses);
  
  /* upload exprense slip */
  setImagePriviews(
    ".stdImgX",
    ".setDefaultImgStdX",
    "#setbtnCustomX",
    ".x-cancleX i",
    ".ximgnameX",
    ".x-wrapX"
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
                  <p class="BtnCustom" id="${this.custom}">เพิ่ม สลิป</p> 
              </div>
          `;
    }
  }
  customElements.define("mian-edit-image", updateImage);
  
  class modalFormExpensesUpdate extends HTMLElement {
    connectedCallback() {
      this.innerHTML = `
              <div class="modal fade " id="modalFormexpensesupdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">แก้ไขข้อมูล รายรับ</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="backend/add-expenses.php" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="expensesId" id="exId" />
                      <input type="hidden" name="status" value="update" />
                      <input type="hidden" name="expensesSlip" id="exSlip" />
                      <div class="modal-body row">
                          <div class="col-md-8 mt-0">
                              <div class="form-group mb-2">
                                <label class="mb-0 text-dark" for="reName">หัวข้อ</label>
                                <input type="text" class="form-control" name="Expenses_name" id="exName" placeholder="หัวข้อ" required>
                              </div>
                              <div class="form-group mb-2">
                                  <label class="ml-1 mt-0 mb-0 font-weight-bold text-dark">รายละเอียด</label>
                                  <textarea class="form-control" rows="3" name="Edetail" id="exDetail" required></textarea>
                              </div>
                              <div class="form-group mb-2">
                                <label for="reAmount" class="mb-0 text-dark">จำนวนเงิน</label>
                                <input type="number" class="form-control" name="Eamount" id="exAmount" placeholder="จำนวนเงิน" required>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <mian-edit-image id="EstdImg" count="Eevidence_slip" wrapper="e-wrapp" filenames="eimgname" cancles="e-cancle"
                                  names="สลิป หลักฐาน" custom="setbtnCustomE" setdefault="EsetDefaultImgStd"></mian-edit-image>
                          </div>
                      </div>
                      <div class="container mb-4 row">
                          <button type="submit" class="ml-auto  btn btn-success">บันทึกข้อมูล</button>
                      </div>
                    </form>
                    
                  </div>
                </div>
              </div>
      `;
    }
  }
  customElements.define("main-update-expenses", modalFormExpensesUpdate);
  
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
  
  $(document).on("click", "#btnUpdateExpenses",function(evt){
    let revenueID = $(this).data('id'),revenueName = $(this).data('name'), revenueDetail = $(this).data('detail');
    let revenueAmount = $(this).data('amount'), revenueSlip = $(this).data('slip');
  
    $('#exName').val(revenueName) 
    $("#exId").val(revenueID);
    $("#exAmount").val(revenueAmount);
    $("#exDetail").val(revenueDetail);
    $(".EstdImg").attr('src',`backend/data/expenses/${revenueSlip}`)
    $("#exSlip").val(revenueSlip);
  
    $(".e-wrapp").last().addClass("active")
    $(".eimgname").html(revenueSlip)
    evt.preventDefault()
  });

  $(document).on('click','#confirmTrash', function(e){
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
        window.location = `backend/add-expenses.php?ex_id=${getID}&status=$del&img_slip=${getImg}`
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