
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


//console.log(formatDate(Date.now()))


class orphan_informetion extends HTMLElement{
    connectedCallback(){
        this.renderInformation()
    }

    renderInformation(){
        this.innerHTML = `
        
      <div class="modal fade " id="modalFormProject" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มข้อมูลโครงการ/กิจกรรม</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="backend/add-projects.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="status" value="create" />
            <input type="hidden" class="form-control" name="project_id" id="Id Project" value="ถ้าลบ error แน่" required>
              <div class="modal-body row">

                  <div class="col-md-12 mt-0">
                        <div class="form-group mb-2">
                            <label class="mb-0 text-primary" for="Fullname">ชื่อโครงการ/กิจกรรม</label>
                            <input type="text" class="form-control" name="project_name" id="Fullname" placeholder="ชื่อโครงการ/กิจกรรม" required>
                        </div>
                  </div> 
                  <div class="col-md-12 row">
                    <div class="col-12">
                        <div class="form-group mb-0">
                            <label class="mb-0 text-primary" for="title">ผู้รับผิดชอบโครงการ/กิจกรรม</label>
                        </div>
                    </div>
                    <div class="col-3 mt-0">
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" name="title" id="title" placeholder="title" required>
                        </div>
                    </div>
                    <div class="col-6 mt-0">
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" name="ferst_name" id="title" placeholder="ชื่อ" required>
                        </div>
                    </div>
                    <div class="col-3 mt-0">
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" name="last_name" id="title" placeholder="นามสกุล" required>
                        </div>
                    </div>
                  </div>
                  
                  <div class="col-md-8 row mt-1">
                    <div class="col-md-12">
                      <div class="form-group mb-2">
                          <label class="ml-1 mt-0 mb-0 font-weight-bold text-success">รายละเอียด</label>
                          <textarea class="form-control" rows="3" name="detail_project" id="Detail" required></textarea>
                      </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                          <label class="ml-1 mt-0 mb-0 font-weight-bold text-success">เริ่มโครงการ</label>
                            <div class="col-xs-5 date">
                                <div class="input-group input-append date" id="datePicker">
                                    <input type="date" class="form-control" id="sdate" name="start_date" />
                                    <span class="input-group-addon add-on">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                          <label class="ml-1 mt-0 mb-0 font-weight-bold text-primary">สิ้นสุดโครงการ</label>
                            <div class="col-xs-5 date">
                                <div class="input-group input-append date" id="datePicker">
                                    <input type="date" class="form-control" id="edate" name="end_date" />
                                    <span class="input-group-addon add-on">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    <div class="col-md-12 mt-0">
                        <div class="form-group mb-2">
                            <label class="mb-0 text-primary" for="area">พื่นที่ดำเนินงาน</label>
                            <input type="text" class="form-control" name="area_of_operation" id="area" placeholder="สถานที่ทำโครงการ" required />
                        </div>
                    </div>
                  </div>
                  <div class="col-md-4 mt-4">
                    <div class="mt-2"></div>
                    <mian-add-image id="projectImg" count="photo_project" wrapper="x-wrap" filenames="imgname" cancles="x-cancle"
                    names="รูปโครงการ" custom="setbtnCustom" setdefault="setDefaultImgproject"></mian-add-image>
                  </div>
              </div>
              <div class="container mb-4 row">
                <div class="custom-file col-9 ml-3">
                  <input type="file" name="file_project" multiple class="custom-file-input" required>
                  <label class="custom-file-label" for="inputGroupFile01">เพิ่มไฟล์โครงการ(PDF)</label>
                </div>
                  <button type="submit" class="ml-auto  btn btn-success">บันทึกข้อมูล</button>
              </div>
            </form>
            
          </div>
        </div>
      </div>

        `
    }
}

customElements.define('main-from-project', orphan_informetion)
setImagePriviews(".projectImg",".setDefaultImgproject","#setbtnCustom",".x-cancle i",".imgname",".x-wrap")

function formatDate(date) {
  var d = new Date(date),
      month = '' + (d.getMonth() + 1),
      day = '' + d.getDate(),
      year = d.getFullYear();

  if (month.length < 2) 
      month = '0' + month;
  if (day.length < 2) 
      day = '0' + day;

  return [day, month, year].join('/');

}

const x = formatDate(Date.now());
document.getElementById("sdate").value = x;

console.log(x)

class modalUpdateProjectForm extends HTMLElement{
  connectedCallback(){
    this.renderEdit()
  }
  renderEdit(){
    this.innerHTML = `
        
      <div class="modal fade " id="modalFormprojectupdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">แก้ไข โครงการ</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="backend/add-projects.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="status" value="edit" />
            <input type="hidden" name="idproject" id="projectID" />
            <input type="hidden" name="photoname" id="imageProjectname" />
            <input type="hidden" name="filenames" id="getfileprojectname" />
              <div class="modal-body row">
                  <div class="col-md-5 mt-0">
                      <div class="form-group mb-2">
                        <label class="mb-0 text-primary" for="Fullname">Id project</label>
                        <input type="number" class="form-control" name="editproject_number" id="editIdProject" placeholder="Id Project" required>
                      </div>
                  </div>
                  <div class="col-md-7 mt-0">
                        <div class="form-group mb-2">
                            <label class="mb-0 text-primary" for="Fullname">project name</label>
                            <input type="text" class="form-control" name="editproject_name" id="editProjectname" placeholder="Project Name" required>
                        </div>
                  </div>
                  <div class="col-md-12 row">
                    <div class="col-12">
                        <div class="form-group mb-0">
                            <label class="mb-0 text-primary" for="title">ผู้รับผิดชอบ โครงการ</label>
                        </div>
                    </div>
                    <div class="col-3 mt-0">
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" name="edittitle" id="editpersenaltitle" placeholder="title" required>
                        </div>
                    </div>
                    <div class="col-6 mt-0">
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" name="editferst_name" id="editpersenalname" placeholder="Ferst Name" required>
                        </div>
                    </div>
                    <div class="col-3 mt-0">
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" name="editlast_name" id="editpersenallastname" placeholder="Last Name" required>
                        </div>
                    </div>
                  </div>
                  
                  <div class="col-md-8 row mt-1">
                    <div class="col-md-12">
                      <div class="form-group mb-2">
                          <label class="ml-1 mt-0 mb-0 font-weight-bold text-success">รายละเอียด(Detail)</label>
                          <textarea class="form-control" rows="3" name="editdetail_project" id="editDetail" required></textarea>
                      </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                          <label class="ml-1 mt-0 mb-0 font-weight-bold text-success">เริ่มโครงการ</label>
                            <div class="col-xs-5 date">
                                <div class="input-group input-append date" id="datePicker">
                                    <input type="date" class="form-control" id="Usdate" name="editstart_date" required/>
                                    <span class="input-group-addon add-on">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                          <label class="ml-1 mt-0 mb-0 font-weight-bold text-primary">สิ้นสุดโครงการ</label>
                            <div class="col-xs-5 date">
                                <div class="input-group input-append date" id="datePicker">
                                    <input type="date" class="form-control" id="Uedate" name="editend_date" required/>
                                    <span class="input-group-addon add-on">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    <div class="col-md-12 mt-0">
                        <div class="form-group mb-2">
                            <label class="mb-0 text-primary" for="area">พื่นที่ดำเนินงาน</label>
                            <input type="text" class="form-control" name="editarea_of_operation" id="editarea" placeholder="สถานที่ทำโครงการ" required />
                        </div>
                    </div>
                  </div>
                  <div class="col-md-4 mt-4">
                    <div class="mt-2"></div>
                    <mian-add-image id="uprojectImg" count="editphoto_project" wrapper="ux-wrap" filenames="uimgname" cancles="ux-cancle"
                    names="รูปโครงการ" custom="usetbtnCustom" setdefault="usetDefaultImgproject"></mian-add-image>
                  </div>
              </div>
              <div class="container mb-4 row">
                <div class="custom-file col-9 ml-3">
                  <input type="file" name="edit_file_project" multiple class="custom-file-input">
                  <label class="custom-file-label" id="editFilename" for="inputGroupFile01">เพิ่มไฟล์โครงการ(PDF)</label>
                </div>
                  <button type="submit" class="btn btn-success ml-auto">บันทึกการแก้ไขข้อมูล</button>
              </div>
            </form>
            
          </div>
        </div>
      </div>

        `
  }
}
customElements.define('main-edit-project', modalUpdateProjectForm)

setImagePriviews(".uprojectImg",".usetDefaultImgproject","#usetbtnCustom",".ux-cancle i",".uimgname",".ux-wrap")
$(document).on("click","#btnUpdateProject", function(e){
    let projectId = $(this).data('id'),projectnumber = $(this).data('projectnumber'),projectname = $(this).data('projectname');
    let responsibleTitle = $(this).data('responsibletitle'),responsiblename = $(this).data('responsiblename'),responsiblelastname = $(this).data('responsiblelastname')
    let operationarea = $(this).data('operationarea'),yearproject = $(this).data('yearproject'), detail = $(this).data('detail');
    let startdate = $(this).data('startdate'),enddate = $(this).data('enddate'),projectimage = $(this).data('projectimage'), filenameproject=$(this).data('fileproject');

    $("#projectID").val(projectId)
    $("#editIdProject").val(projectnumber);
    $("#editProjectname").val(projectname);
    $("#editpersenaltitle").val(responsibleTitle);
    $("#editpersenalname").val(responsiblename);
    $("#editpersenallastname").val(responsiblelastname);
    $("#editDetail").val(detail);
    $("#Usdate").val(startdate);
    $("#Uedate").val(enddate);
    $("#editarea").val(operationarea)
    $("#editFilename").html(filenameproject)
    $("#getfileprojectname").val(filenameproject)

    $("#imageProjectname").val(projectimage)
    $(".uprojectImg").attr('src', `backend/data/project/${projectimage}`)
    $(".ux-wrap").last().addClass("active")
    $(".uimgname").html(projectimage)
    e.preventDefault()
})

$(document).on("click","#confirmTrashProject", function(e){
  let idProject = $(this).data('id')
  let imageProject = $(this).data('imagename')
  let fileProject = $(this).data('filename')
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
      window.location = `backend/add-projects.php?ex_id=${idProject}&image_name=${imageProject}&files_name=${fileProject}&status=delete`
    }
  })
})