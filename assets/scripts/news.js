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

class modalformTopnews extends HTMLElement{
    connectedCallback(){
        this.renderTopnews()
    }
    renderTopnews(){
        this.innerHTML = `
            <div class="modal fade bd-example-modal-xl" id="modalFormTopnews" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มข้อมูล ข่าวสาร</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="backend/add-topnews.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="iduser_addnews" id="getuserId" />
                            <div class="modal-body row">
                                <div class="col-md-9 mt-0">
                                    <div class="form-group mb-2">
                                        <label class="mb-0 mt-0 text-dark" for="User">หัวข้อข่าวสาร</label>
                                        <input type="text" class="form-control" name="header_news" id="headerNews" placeholder="หัวข้อข่าวสาร" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="ml-1 mt-0 mb-0 font-weight-bold text-dark">เนื่อหาข่าวสาร</label>
                                        <textarea class="form-control" rows="8" name="detail_news" id="reDetail" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="col-12">
                                        <div class="form-group mb-2">
                                          <label class="mb-0 text-dark" for="title">ประเภทข่าว</label>
                                          <select class="form-control" name="type_news" id="exampleFormControlSelect1">
                                            <option selected disabled hidden>ระบุ..</option>
                                            <option value="กิจกรรม">กิจกรรม</option>
                                            <option value="โครงการ">โครงการ</option>
                                            <option value="ข่าวสารทั่วไป">ข่าวสารทั่วไป</option>
                                          </select>
                                        </div>
                                    </div>
                                    <mian-add-image id="topnewsImage" count="image_topnews" wrapper="x-wrap" filenames="ximgname" cancles="x-cancle"
                                        names="รูปภาพประกอบ" custom="setbtnCustom" setdefault="setDefaultImgtopnew"></mian-add-image>
                                </div>
                            </div>
                            <div class="container mb-4 row">
                    <button type="submit" class="ml-auto  btn btn-success">โพสต์</button>
                </div>
                        </form>
                    </div>
                </div>
            </div>
        `
    }
}

customElements.define('main-create-topnew', modalformTopnews)

$(document).on("click","#btnCreatenews",function(e){
    let getuserid = $(this).data('user')
    $('#getuserId').val(getuserid)
    e.preventDefault()
})

setImagePriviews('.topnewsImage','.setDefaultImgtopnew','#setbtnCustom','.x-cancle i','.ximgname','.x-wrap')

class modalEditNews extends HTMLElement{
  constructor(){
    super()
  }
  connectedCallback(){
    this.renderEdit()
  }
  renderEdit(){
    this.innerHTML = `
    <div class="modal fade bd-example-modal-xl" id="modalEditTopnews" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">แก้ไขข้อมูล ข่าวสาร</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="backend/edit-topnews.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="edit_new_id" id="editNewsId" />
                    <input type="hidden" name="get_img_name" id="editImgName"/>
                    <div class="modal-body row">
                        <div class="col-md-9 mt-0">
                            <div class="form-group mb-2">
                                <label class="mb-0 mt-0 text-dark" for="User">หัวข้อข่าวสาร</label>
                                <input type="text" class="form-control" name="edit_header_news" id="editHeaderNews" placeholder="หัวข้อข่าวสาร" required>
                            </div>
                            <div class="form-group mb-2">
                                <label class="ml-1 mt-0 mb-0 font-weight-bold text-dark">เนื่อหาข่าวสาร</label>
                                <textarea class="form-control" rows="8" name="edit_detail_news" id="editDetailNew" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="col-12">
                                <div class="form-group mb-2">
                                  <label class="mb-0 text-dark" for="editTypeNews">ประเภทข่าว</label>
                                  <select class="form-control" name="edit_type_news" id="editTypeNews">
                                    <option selected disabled hidden>ระบุ..</option>
                                    <option value="กิจกรรม">กิจกรรม</option>
                                    <option value="โครงการ">โครงการ</option>
                                    <option value="ข่าวสารทั่วไป">ข่าวสารทั่วไป</option>
                                  </select>
                                </div>
                            </div>
                            <mian-add-image id="editTopnewsImage" count="e_image_topnews" wrapper="e-wrap" filenames="eimgname" cancles="e-cancle"
                                names="รูปภาพ" custom="setbtnCustomE" setdefault="setDefaultImgtopnewE"></mian-add-image>
                        </div>
                    </div>
                    <div class="container mb-4 row">
                    <button type="submit" class="ml-auto  btn btn-success">โพสต์</button>
                </div>
                </form>
            </div>
        </div>
    </div>
  `;
  }
}
customElements.define('main-edit-news', modalEditNews)

$(document).on("click","#btnUpdateTopnews", function(e){
  let newsID = $(this).data('id'), NewsHeader = $(this).data('headernews'),detailNews = $(this).data('detailnew')
  let typeNews = $(this).data('typenew'), imageNew=$(this).data('imagenew')
  $('#editNewsId').val(newsID)
  $('#editHeaderNews').val(NewsHeader)
  $('#editDetailNew').val(detailNews)
  $('#editTypeNews').val(typeNews)
  $('#editImgName').val(imageNew)

  $('.editTopnewsImage').attr('src',`backend/data/news/${imageNew}`)
  $('.eimgname').html(imageNew)
  $('.e-wrap').last().addClass("active")

  e.preventDefault()
})
setImagePriviews('.editTopnewsImage','.setDefaultImgtopnewE','#setbtnCustomE','.e-cancle i','.eimgname','.e-wrap')

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
      window.location = `backend/edit-topnews.php?get_new_id=${getID}&img_news=${getImg}`
    }
  })
  e.preventDefault()
})