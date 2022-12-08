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
        window.location = `backend/crud-set-patron.php?patron_id=${ID}&patron_img=${Img}&status=delete`;
      }
    })
  });

 function nStr(){
  var TotalMoney =document.getElementById('TotalMoney').value;
  var PersonNumber=document.getElementById('PersonNumber').value; 
  let input1 = parseInt(TotalMoney)
  let input2 = parseInt(PersonNumber)
  var ShowAmont = document.getElementById('Scholarship_Amount')
  if(isNaN(TotalMoney)){
    document.getElementById("Scholarship_Amount").value ="error"
    if(PersonNumber.length>0){
      if(isNaN(TotalMoney)){
        ShowAmont.value = "errorss"
      }
      else if(isNaN(PersonNumber)){
        ShowAmont.value = "errorss2"
      }
      else if(TotalMoney.length > 0){
        ShowAmont.value = input1 / input2
      }
      else if(PersonNumber.length > 0){
        ShowAmont.value = input2
      }
    }
  }else if(TotalMoney.length > 0){
    if(isNaN(PersonNumber)){
      ShowAmont.value = "erroxx"
    }
    else if(PersonNumber.length > 0){
      ShowAmont.value = input1 / input2
    }
    else if(TotalMoney.length > 0){
      ShowAmont.value = input1
    }
  }
 }


class setPatronModal extends HTMLElement{
   

    connectedCallback(){
      this.renderSetPatron()
    }
     renderSetPatron(){
       this.innerHTML = `
          <div id="modalsetPatrons" class="modal fade bd-example-modal-xl modalx" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มข้อมูลการให้ทุน</h5>   
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="backend/crud-set-patron.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="status" value="CREATE" />
                  <div class="modal-body row">
                    <div class="col-md-3">
                      <mian-add-image id="SliptPatronImg" count="slipt_patron_img" wrapper="xs-wrap" filenames="Setimgname" cancles="s-cancle"
                      names="สลิปหลักฐานโอนเงิน" custom="setbtnCustomPatronSet" setdefault="setDefaultImgPatronSet"></mian-add-image>
                    </div>
                    <div class="col-md-9 row">
                      <div class="col-md-12 mb-3">
                        <label>เลือกรายชื่อผู้อุปถัมภ์</label>
                        <select class="form-control vodiapicker" data-live-search="true" id="selectPatron" name="select_patron_id">
                        </select>
                      </div>
                      <div class="form-group mb-2 col-5"> 
                        <label class="mb-0" for="TotalMoney">รวมเป็นเงินทั้งสิ้น บาท</label>
                        <input type="number" class="form-control" name="total_money" id="TotalMoney" onkeyup="nStr()" placeholder="ระบุเป็นจำนวนตัวเลข" required>
                      </div>
                      <div class="form-group mb-2 col-2">
                        <label class="mb-0" for="PersonNumber">จำนวน คน</label>
                        <input type="number" class="form-control" name="person_number" id="PersonNumber" onkeyup="nStr()" placeholder="" required>
                      </div>
                      <div class="form-group mb-2 col-5">
                        <label class="mb-0" for="Scholarship_Amount">ให้ทุนการศึกษาแต่ละคน จํานวน บาท</label>
                        <input type="number" class="form-control" name="scholarship_amount" id="Scholarship_Amount" placeholder="ระบุเป็นจำนวนตัวเลข" required>
                      </div>
                      <div class="form-group mb-2 col-6">
                        <label class="mb-0" for="PatronDay">วันที่ให้ทุน</label>
                        <input type="date" class="form-control" name="patron_day" id="PatronDay" placeholder="" required>
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
       `;
     }
  }
customElements.define('main-set-patron', setPatronModal)
setImagePriviews(".SliptPatronImg",".setDefaultImgPatronSet","#setbtnCustomPatronSet",".s-cancle i",".Setimgname",".xs-wrap");

function createOptions(datatext) {
  //console.log(datatext)
  return datatext.map((resdata, indes)=>{
      IdlistPatron = document.getElementById("selectPatron")
      let Option = document.createElement("option")
       //Option.setAttribute("data-thumbnail","https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/LetterA.svg/2000px-LetterA.svg.png")
      IdlistPatron.appendChild(Option)

      Option.innerHTML = "ชื่อ: "+resdata.title+" "+ resdata.f_name +"  "+resdata.l_name 
      Option.value = resdata.id

  })
}
$(document).on("click","#buttonFetchPatron", function(e){
  fetch(`backend/api/api-set-data-patron.php?status=getdata`,{
      method:"GET",
      headers:{"Content-Type": "application/json; charset=UTF-8",}
  })
  .then(result => result.json())
   .then((data)=>createOptions(data))
    .catch((errs)=> console.log(errs))

  $(".modalx").hide('hidden.bs.modal',function(){
      $("#setDataPatron").html("")
      console.log("hide success")
  }) 
  e.preventDefault()
})



/* 
 this.innerHTML =`
          <div id="modalsetPatrons" class="modal fade bd-example-modal-xl modalx" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มผู้ต้องการรับทุน</h5>
                      
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">รูปภาพ</th>
                                    <th scope="col">ชื่อ สกุล</th>
                                    <th scope="col">เบอร์โทรศัพท์</th>
                                    <th scope="col">อาชีพ</th>
                                    <th scope="col">ระบุจำนวนเงิน</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody id="setDataPatron"></tbody>
                        </table>
                  </div>
              </div>
            </div>
          </div>
        `
*/

const createElementUiPatron = function(getPatronData){
    const createElement = (elements)=> document.createElement(elements)
    const setAppend = (cover, elementx)=> {
        return cover.appendChild(elementx)
    }
    const MySetSweetAlert =(Icons,Titles,Texts)=>{
        Swal.fire({
            icon: Icons,
            title: Titles,
            text:Texts,
            confirmButtonText:"OK"
        }).then((result)=>{
             window.location.reload()
        })
    }
    return getPatronData.map((result, i)=>{
        const tagTableId = document.getElementById("setDataPatron"),formGroup = createElement("form")
        const divAccount = createElement("div"),divImage = createElement("div"),divManage = createElement("div"),trDiv = createElement("div")
        const tr = createElement("tr"),image = createElement("img"),button = createElement("button"),input = createElement("input"),inputHidden = createElement("input")
        let td = createElement("td"), td1 = createElement("td"),td2 = createElement("td"),td3 = createElement("td"),td4 = createElement("td"),td5 = createElement("td"),td6 = createElement("td")

        //tr.className = "classDataList tr-shadow"
        divAccount.className = "account-item account-item--style2 clearfix js-item-menu"
        divImage.className = "image"
        divManage.className = "table-data-feature"
        button.className = "btn btn-sm btn-success ml-4"
        input.style.width = "50%"
        input.className = "form-control"
        formGroup.className = "row"

        //formGroup.action = "backend/api/api-set-data-patron.php"
        formGroup.setAttribute("id",result.id)
        formGroup.method = "POST"
        formGroup.enctype = "multipart/form-data";
        button.type = "submit"
        td5.setAttribute("colspan","2")

        input.placeholder = "ระบุเป็นตัวเลข"
        input.type = "number"
        input.name = "amount"
        input.setAttribute("id","NumberMunny")
        input.setAttribute("required","required")
        inputHidden.type = "hidden"
        inputHidden.name = "patronid"
        inputHidden.setAttribute("id","getIdPatron")

        setAppend(tagTableId, tr)
        setAppend(tr, td)
        setAppend(td1, divAccount)
        setAppend(divAccount, divImage)
        setAppend(divImage, image)
        setAppend(tr, td1)
        setAppend(tr, td2)
        setAppend(tr, td3)
        setAppend(tr, td4)
        setAppend(tr, td5)
        setAppend(td5, formGroup)
        setAppend(formGroup,input)
        setAppend(formGroup, inputHidden)
        setAppend(formGroup, button)

        image.src = `backend/data/patrons/${result.img_slip_patron}`
        td.innerHTML = i+1
        td2.innerHTML = `${result.title} ${result.f_name}  ${result.l_name}`
        td3.innerHTML = result.tell
        td4.innerHTML = result.career
        button.innerHTML = "เพิ่มข้อมูลผู้ให้ทุนเก่า"
        inputHidden.value = result.id
        
        const setForm = document.getElementById(result.id)
        setForm.addEventListener('submit', function(e){
            e.preventDefault();
            var patronID = document.getElementsByName("patronid")[i].value;
            var Amount = document.getElementsByName("amount")[i].value;
            console.log(`patronid:${patronID} |||| munny:${Amount}`)
            
              axios.post('backend/api/api-set-data-patron.php',{
                patronID,
                Amount
              },{
                headers: {
                  Accept: "application/json",
                  "Content-Type": "application/json;charset=UTF-8",
                },
              })
              .then(({data}) => {
                console.log(data)
                MySetSweetAlert(data.icons,data.title,data.text)
              })
        }) 
    })
}

$(document).on("click","#falseTrashBtn",function(){
  Swal.fire({
      icon: 'warning',
      title: 'ไม่อนุญาต',
      text: 'เนื่องจากเลยเวลาที่กำหนดสามารถจัดการลบได้แค่3วันหลังจากให้ทุนเท่านั้น',
      showConfirmButton: false,
  })
})
