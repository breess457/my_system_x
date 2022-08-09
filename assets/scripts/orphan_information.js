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
                  <p class="BtnCustom" id="${this.custom}">Choose a file</p> 
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
  /* ---- */

class inputgroupOne extends HTMLElement{
    connectedCallback(){
      this.renderGroup()
    }
    renderGroup(){
        this.innerHTML = `
        <div class="col-md-12 row">
          <div class="col-md-9 mt-0">
            <div class="form-group mb-2">
              <label class="mb-0 text-primary" for="Fullname">ชื่อ-นามสกุล</label>
              <div class="row">
                <div class="col-2">
                  <select class="form-control" name="title_me" id="">
                      <option selected disabled hidden>ระบุ..</option>
                      <option value="เด็กชาย">เด็กชาย</option>
                      <option value="เด็กหญิง">เด็กหญิง</option>
                      <option value="นาย">นาย</option>
                      <option value="นางสาว">นางสาว</option>
                  </select>
                </div>
                <div class="col-6">
                  <input type="text" class="form-control" name="first_name_me" id="Firstname" placeholder="Firstname" required>
                </div>
                <div class="col-4">
                  <input type="text" class="form-control" name="last_name_me" id="Lastname" placeholder="Lastname" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group mb-2">
                  <label class="ml-1 mt-0 mb-0 font-weight-bold text-primary">วัน-เดือน-ปี เกิด </label>
                    <div class="col-xs-5 date">
                        <div class="input-group input-append date" id="datePicker">
                            <input type="date" class="form-control" id="edate" name="berd_day_me" />
                            <span class="input-group-addon add-on">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group mb-2">
                  <label for="Age" class="mb-0 text-warning">อายุ</label>
                  <input type="number" class="form-control" name="age_me" id="Age" placeholder="" required />
                </div>
              </div>
              <div class="col-2">
                <div class="form-group mb-2">
                  <label for="heigh_me" class="mb-0 text-success">ส่วนสูง</label>
                  <input type="number" class="form-control" name="heigh_me" id="heigh_me" placeholder="" required />
                </div>
              </div>
              <div class="col-2">
                <div class="form-group mb-2">
                  <label for="weigth_me" class="mb-0 text-success">น้ำหนัก</label>
                  <input type="number" class="form-control" name="weigth_me" id="weigth_me" placeholder="" required />
                </div>
              </div>
              <div class="col-2">
                <label for="blood_group_me" class="mb-0 text-primary">กรุปเลือด</label>
                <select class="form-control" name="blood_group_me" id="blood_group_me">
                    <option selected disabled hidden>ระบุ..</option>
                    <option value="o">o</option>
                    <option value="a">a</option>
                    <option value="b">b</option>
                    <option value="ab">ab</option>
                </select>
              </div>
              <div class="col-md-4">
                <div class="form-group mb-2">
                  <label for="cardid" class="mb-0 text-info">เลขบัตรประชาชน </label>
                  <input type="text" class="form-control" name="card_id" id="cardid" placeholder="" required />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group mb-2">
                  <label for="Call" class="mb-0 text-info">เบอร์โทร</label>
                  <input type="text" class="form-control" name="call_me" id="Call" placeholder="" required />
                </div>
              </div>
              <div class="col-2">
                <div class="form-group mb-2">
                  <label for="siblings_number" class="mb-0 text-success">จำนวนพี่น้อง</label>
                  <input type="number" class="form-control" name="siblings_number" id="siblings_number" placeholder="" required />
                </div>
              </div>
              <div class="col-2">
                <div class="form-group mb-2">
                  <label for="me_number" class="mb-0 text-success">เป็นคนที่</label>
                  <input type="number" class="form-control" name="me_number" id="me_number" placeholder="" required />
                </div>
              </div>
              
            </div>
          </div>
          
          <div class="col-md-3 mt-2">
              <mian-add-image id="orphanImage" count="orphan_image" wrapper="x-wrapX" filenames="ximgnameX" cancles="x-cancleX"
                  names="รูปโปรไฟล์" custom="setbtnCustomX" setdefault="setDefaultImgOrphan"></mian-add-image>
          </div>
        </div>
        `
    }
}

customElements.define("main-group-one", inputgroupOne)

class inputgroupTrue extends HTMLElement{
  connectedCallback(){
      this.renderGroupTrue()
  }

  renderGroupTrue(){
    this.innerHTML = `
      <div id="demo1" class="demo mt-1" style="display:none;" autocomplete="off" uk-grid>
        
        <div class="col-4">
          <div class="form-group mb-2">
            <label for="homeid" class="mb-0 text-danger">บ.เลขที่/หมู่บ้าน/หมู่</label>
            <input type="text" class="form-control" name="home_id" id="homeid" placeholder="" required />
          </div>
        </div>
        <div class="col-2">
          <div class="form-group mb-2">
              <label class="mb-0">ตำบล</label>
              <input name="district" class="uk-input uk-width-1-1" type="text" required>
          </div>
        </div>
        <div class="col-2">
          <div class="form-group mb-2">
              <label class="mb-0">อำเภอ</label>
              <input name="amphoe" class="uk-input uk-width-1-1" type="text" required>
          </div>
        </div>
        <div class="col-2">
          <div class="form-group mb-2">
            <label class="mb-0">จังหวัด</label>
            <input name="province" class="uk-input uk-width-1-1" type="text" required>
          </div>
        </div>
        <div class="col-2">
          <div class="form-group mb-2">
              <label class="mb-0">รหัสไปรษณีย์</label>
              <input name="zipcode" class="uk-input uk-width-1-1" type="number" required>
          </div>
        </div>

      </div>
      <div id="demo2" class="demo mt-0" style="display:none;" autocomplete="off" uk-grid>
        
        <div class="col-4">
          <div class="form-group mb-2">
            <label for="shoolId" class="mb-0 text-info">ชื่อโรงเรียนมัถยม</label>
            <input type="text" class="form-control" name="school_name" id="shoolId" placeholder="" required />
          </div>
        </div>
        <div class="col-2">
          <div class="form-group mb-2">
              <label class="mb-0">ตำบล</label>
              <input name="district_school" class="uk-input uk-width-1-1" type="text" required>
          </div>
        </div>
        <div class="col-2">
          <div class="form-group mb-2">
              <label class="mb-0">อำเภอ</label>
              <input name="amphoe_school" class="uk-input uk-width-1-1" type="text" required>
          </div>
        </div>
        <div class="col-2">
          <div class="form-group mb-2">
            <label class="mb-0">จังหวัด</label>
            <input name="province_school" class="uk-input uk-width-1-1" type="text" required>
          </div>
        </div>
        <div class="col-2">
          <div class="form-group mb-2">
              <label class="mb-0">รหัสไปรษณีย์</label>
              <input name="zipcode_school" class="uk-input uk-width-1-1" type="number" required>
          </div>
        </div>
      </div>
      <div id="demo3" class="demo mt-0" style="display:none;" autocomplete="off" uk-grid>
        
        <div class="col-4">
          <div class="form-group mb-2">
            <label for="shoolId" class="mb-0 text-info">ชื่อโรงเรียนประถม</label>
            <input type="text" class="form-control" name="shool2_name" id="shoolId" placeholder="" required />
          </div>
        </div>
        <div class="col-2">
          <div class="form-group mb-2">
              <label class="mb-0">ตำบล</label>
              <input name="district_shool2" class="uk-input uk-width-1-1" type="text" required>
          </div>
        </div>
        <div class="col-2">
          <div class="form-group mb-2">
              <label class="mb-0">อำเภอ</label>
              <input name="amphoe_shool2" class="uk-input uk-width-1-1" type="text" required>
          </div>
        </div>
        <div class="col-2">
          <div class="form-group mb-2">
            <label class="mb-0">จังหวัด</label>
            <input name="province_shool2" class="uk-input uk-width-1-1" type="text" required>
          </div>
        </div>
        <div class="col-2">
          <div class="form-group mb-2">
              <label class="mb-0">รหัสไปรษณีย์</label>
              <input name="zipcode_shool2" class="uk-input uk-width-1-1" type="number" required>
          </div>
        </div>
      </div>

    `
  }
}

customElements.define("main-group-true", inputgroupTrue)

class inputgroupTree extends HTMLElement{
  connectedCallback(){
      this.renderGroupTree()
  }

  renderGroupTree(){
    this.innerHTML = `
      <div class="mt-0">
          <div class="form-group mb-2">
            <label class="mb-0 text-primary font-weight-bold" for="Fullname">ชื่อ-นามสกุล บิดา</label>
            <div class="row">
              <div class="col-2">
                <select class="form-control" name="title_father" id="">
                    <option selected disabled hidden>ระบุ..</option>
                    <option value="นาย">นาย</option>
                </select>
              </div>
              <div class="col-4">
                <input type="text" class="form-control" name="firstname_father" id="Firstname_f" placeholder="ชื่อ" required>
              </div>
              <div class="col-2">
                <input type="text" class="form-control" name="lastname_father" id="Lastname_f" placeholder="นามสกุล" required>
              </div>
              <div class="col-2">
                <input type="text" class="form-control" name="occupation_father" id="occupation_f" placeholder="อาชีพ" required>
              </div>
              <div class="col-2">
                <input type="number" class="form-control" name="income_father" id="Income_f" placeholder="รายได้" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group mb-2">
                <label class="mt-0 mb-0 font-weight-bold text-primary">วัน-เดือน-ปี เกิด </label>
                  <div class="col-xs-5 date">
                      <div class="input-group input-append date" id="datePicker">
                          <input type="date" class="form-control" id="edate" name="berd_day_father" />
                          <span class="input-group-addon add-on">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                      </div>
                  </div>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-group mb-2">
                <label class="mt-0 mb-0 font-weight-bold text-warning">อายุ</label>
                <input type="number" class="form-control" name="age_father" id="Age_f" placeholder="age" required>
              </div>  
            </div>
            <div class="col-md-3">
              <div class="form-group mb-2">
                <label class="mt-0 mb-0 font-weight-bold text-primary">เบอร์โทร</label>
                <input type="text" class="form-control" name="tell_father" id="Tell_f" placeholder="เบอร์โทร" required>
              </div>  
            </div>
            <div class="col-md-2">
              <div class="form-group mb-2">
                <label class="mt-0 mb-0 font-weight-bold text-secondary">สถานภาพ</label>
                <select class="form-control" name="status_father" id="">
                  <option selected disabled hidden>ระบุ..</option>
                  <option value="ยังมีชีวิตอยู่">ยังมีชีวิตอยู่</option>
                  <option value="เสียชีวิต">เสียชีวิต</option>
                </select>
              </div>
            </div>
            
          </div>
          <div class="form-group mb-2">
          <label class="mb-0 text-primary font-weight-bold" for="Firstname_m">ชื่อ-นามสกุล มารดา</label>
          <div class="row">
            <div class="col-2">
              <select class="form-control" name="title_mather" id="">
                  <option selected disabled hidden>ระบุ..</option>
                  <option value="นาง">นาง</option>
                  <option value="นางสาว">นางสาว</option>
              </select>
            </div>
            <div class="col-4">
              <input type="text" class="form-control" name="firstname_mather" id="Firstname_m" placeholder="ชื่อ" required>
            </div>
            <div class="col-2">
              <input type="text" class="form-control" name="lastname_mather" id="Lastname_m" placeholder="นามสกุล" required>
            </div>
            <div class="col-2">
              <input type="text" class="form-control" name="occupation_mather" id="occupation_m" placeholder="อาชีพ" required>
            </div>
            <div class="col-2">
              <input type="number" class="form-control" name="income_mather" id="Income_m" placeholder="รายได้" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="form-group mb-2">
              <label class="mt-0 mb-0 font-weight-bold text-primary">วัน-เดือน-ปี เกิด </label>
                <div class="col-xs-5 date">
                    <div class="input-group input-append date" id="datePicker">
                        <input type="date" class="form-control" id="edate" name="berd_day_mather" />
                        <span class="input-group-addon add-on">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-group mb-2">
              <label class="mt-0 mb-0 font-weight-bold text-warning">อายุ</label>
              <input type="number" class="form-control" name="age_mather" id="Age_m" placeholder="age" required>
            </div>  
          </div>
          <div class="col-md-3">
            <div class="form-group mb-2">
              <label class="mt-0 mb-0 font-weight-bold text-primary">เบอร์โทร</label>
              <input type="text" class="form-control" name="tell_mather" id="Tell_m" placeholder="เบอร์โทร" required>
            </div>  
          </div>
          <div class="col-md-2">
            <div class="form-group mb-2">
              <label class="mt-0 mb-0 font-weight-bold text-secondary">สถานภาพ</label>
              <select class="form-control" name="status_mather" id="">
                <option selected disabled hidden>ระบุ..</option>
                <option value="ยังมีชีวิตอยู่">ยังมีชีวิตอยู่</option>
                <option value="เสียชีวิต">เสียชีวิต</option>
              </select>
            </div>
          </div>

        </div>
      </div> 
      
    `
  }
}

customElements.define("main-group-tree", inputgroupTree)

class inputgroupFour extends HTMLElement{
    connectedCallback(){
        this.renderGroupFour()
    }

    renderGroupFour(){
        this.innerHTML = `
          <div class="col-md-12 row mt-0">
            <div class="col-md-3">
                <mian-add-image id="limageHome" count="image_home" wrapper="hx-wrap" filenames="hximgname" cancles="xh-cancle"
                  names="สลิป หลักฐาน" custom="setbtnCustomHome" setdefault="setDefaultImgHome"></mian-add-image>
            </div>
            <div class="col-md-9">
              <div class="col-md-12 row mb-0">
                <div class="col-6">
                  <div class="form-group mb-0">
                    <label for="family_status" class="mb-0 text-secondary">สถานะครอบครัว</label>
                    <input type="text" class="form-control" name="family_status" id="family_status" placeholder="" required />
                  </div>
                </div>
                <div class="col-3">
                    <label for="" class="mb-0 text-secondary">ระดับความช่วยเหลือ</label>
                      <select class="form-control" name="level_help" id="">
                        <option selected disabled hidden>ระบุ..</option>
                        <option value="ปกติ">ปกติ</option>
                        <option value="ปานกลาง">ปานกลาง</option>
                        <option value="เร่งด่วน">เร่งด่วน</option>
                      </select>
                </div>
                <div class="col-3">
                    <label for="" class="mb-0 text-secondary">ด้านการช่วยเหลือ</label>
                      <select class="form-control" name="estimate_help" id="">
                        <option selected disabled hidden>ระบุ..</option>
                        <option value="ด้านร่างกาย">ด้านร่างกาย</option>
                        <option value="ด้านอารมฌ์และจิตใจ">ด้านอารมฌ์และจิตใจ</option>
                        <option value="ด้านสังคม">ด้านสังคม</option>
                        <option value="ด้านเศรษฐกิจ">ด้านเศรษฐกิจ</option>
                      </select>
                </div>
              </div>
              <div class="col-md-12 row mb-0 mt-2">
                <div class="col-3">
                  <div class="form-group mt-0">
                    <label for="revenue_family" class="mb-0 mt-0 text-secondary">รายได้ ณ ปัจจุบัน</label>
                    <input type="number" class="form-control" name="revenue_family" id="revenue_family" placeholder="ระบุ.." required />
                  </div>
                </div>
                <div class="col-3">
                    <label for="" class="mb-0 text-secondary">ผู้เสียชีวิต</label>
                      <select class="form-control" name="deceased" id="">
                        <option selected disabled hidden>ระบุ..</option>
                        <option value="พ่อเสียชีวิต">พ่อเสียชีวิต</option>
                        <option value="แม่เสียชีวิต">แม่เสียชีวิต</option>
                        <option value="เสียชีวิตทั่งพ่อและแม่">เสียชีวิตทั่งพ่อและแม่</option>
                      </select>
                </div>
                <div class="col-3">
                  <div class="form-group mt-0">
                    <label for="cause_death" class="mb-0 mt-0 text-secondary">สาเหตุที่เสียชีวิต</label>
                    <input type="text" class="form-control" name="cause_death" id="cause_death" placeholder="ระบุ.." required />
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group mb-2">
                    <label class="ml-1 mt-0 mb-0 text-danger">วันที่เสียชีวิต </label>
                      <div class="col-xs-5 date">
                          <div class="input-group input-append date" id="datePicker">
                              <input type="date" class="form-control" id="edate" name="death_day" />
                              <span class="input-group-addon add-on">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 row mb-0">
                <div class="col-3">
                    <label for="" class="mb-0 text-secondary">สถานะการเรียน</label>
                      <select class="form-control" name="study_status" id="">
                        <option selected disabled hidden>ระบุ..</option>
                        <option value="กำลังเรียน">กำลังเรียน</option>
                        <option value="หยุดเรียน">หยุดเรียน</option>
                        <option value="เรียนจบ">เรียนจบ</option>
                      </select>
                </div>
                <div class="col-3">
                  <div class="form-group mt-0">
                    <label for="year_study" class="mb-0 mt-0 text-secondary">ปีการศึกษา</label>
                    <input type="text" class="form-control" name="year_study" id="year_study" placeholder="ระบุ.." required />
                  </div>
                </div>
                <div class="col-5">
                  <div class="form-group mt-0">
                    <label for="cause_stop_study" class="mb-0 mt-0 text-secondary">สาเหตุหยุดเรียน</label>
                    <input type="text" class="form-control" name="cause_stop_study" id="cause_stop_study" placeholder="กรณีหยุดเรียน" required />
                  </div>
                </div>
              </div>
            </div>
          </div>
        `
    }
}

customElements.define("main-group-four", inputgroupFour)

class orphan_informetion extends HTMLElement{
    connectedCallback(){
        this.renderInformation()
    }

    renderInformation(){
        this.innerHTML = `
        
      <div class="modal fade bd-example-modal-xl" id="modalFormInformation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content" id="msform">
            
            <form action="backend/add-orphan-information.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="status" value="create" />
              <div class="modal-body">
                  <ul id="progressbar" class="mb-1 mt-0">
                    <li class="active" id="account">
                      <strong>Account</strong>
                    </li>
                    <li id="personal">
                      <strong>School</strong>
                    </li>
                    <li id="payment">
                      <strong>Parent</strong>
                    </li>
                    <li id="status">
                      <strong>Status</strong>
                    </li>
                  </ul> 
                  <fieldset class="col-md-12 row mt-0">
                    <main-group-one></main-group-one>
                    <button type="button" name="next" class="next btn btn-sm btn-warning ml-auto">next -></button>
                  </fieldset>
                  <fieldset class="col-md-12 row mt-0">
                      <main-group-true></main-group-true>
                        <button type="button" name="previous" class="previous btn btn-sm btn-danger"><- back</button>
                        <button type="button" name="next" class="next btn btn-sm btn-warning">next -></button>
                      
                  </fieldset>
                  <fieldset class="col-md-12 row mt-0">
                      <main-group-tree></main-group-tree>
                        <button type="button" name="previous" class="previous btn btn-sm btn-danger"><- back</button>
                        <button type="button" name="next" class="next btn btn-sm btn-warning">next -></button>
                      
                  </fieldset>
                  <fieldset class="col-md-12 row mt-0">
                      <main-group-four></main-group-four>
                      <button type="button" name="previous" class="previous btn btn-sm btn-warning mr-auto"><- back</button>
                      <button type="submit" class="btn btn-sm btn-success ml-auto">enter</button>
                  </fieldset>
                  
              </div>
            </form>
            
          </div>
        </div>
      </div>

        `
    }
}

customElements.define('main-create-orphan', orphan_informetion)

setImagePriviews(".orphanImage",".setDefaultImgOrphan","#setbtnCustomX",".x-cancleX i",".ximgnameX",".x-wrapX");
setImagePriviews(".limageHome",".setDefaultImgHome","#setbtnCustomHome",".xh-cancle i",".hximgname",".hx-wrap");

