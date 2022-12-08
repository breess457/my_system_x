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
  /* ---- */
  function setNumber(number, getD){
    let getIds = document.getElementById(getD).value;
    let classID = document.getElementById(getD)
    let parseintId = parseInt(getIds)
      if(getIds.length === number){
        classID.className = "form-control"
      }else if(getIds.length < number){
        classID.className = "form-control is-invalid"
      }
  }
  function remakeDate(dateId,ageId){
    let edate = document.getElementById(dateId)
     edate.addEventListener('change', function handleClick(){
      let newEdtate = new Date(edate.value)
         let monthDffi = Date.now() - newEdtate.getTime()
        let ageDt = new Date(monthDffi)
        let year = ageDt.getUTCFullYear()
        let age = Math.abs(year - 1970) 
        return document.getElementById(ageId).value = age
        //console.log(age)
     })
  }
  

class inputgroupOne extends HTMLElement{
    connectedCallback(){
      this.renderGroup()
    }
    renderGroup(){
        this.innerHTML = `
        <div class="col-md-12 row">
          <div class="col-md-9 mt-0">
            <div class="form-group mb-2">
              <label class="mb-0 text-dark" for="Fullname">ชื่อ-นามสกุล</label>
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
                  <input type="text" class="form-control" name="first_name_me" id="Firstname" placeholder="ชื่อ" required>
                </div>
                <div class="col-4">
                  <input type="text" class="form-control" name="last_name_me" id="Lastname" placeholder="นามสกุล" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group mb-2">
                  <label class="ml-1 mt-0 mb-0 font-weight-bold text-dark">วัน-เดือน-ปี เกิด </label>
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
                  <label for="Age" class="mb-0 text-dark">อายุ</label>
                  <input type="number" class="form-control" name="age_me" id="Age" placeholder="" required />
                </div>
              </div>
              <div class="col-2">
                <div class="form-group mb-2">
                  <label for="heigh_me" class="mb-0 text-dark">ส่วนสูง</label>
                  <input type="number" class="form-control" name="heigh_me" id="heigh_me" placeholder="ส่วนสูง" required />
                </div>
              </div>
              <div class="col-2">
                <div class="form-group mb-2">
                  <label for="weigth_me" class="mb-0 text-dark">น้ำหนัก</label>
                  <input type="number" class="form-control" name="weigth_me" id="weigth_me" placeholder="น้ำหนัก" required />
                </div>
              </div>
              <div class="col-2">
                <label for="blood_group_me" class="mb-0 text-dark">กรุ๊ปเลือด</label>
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
                  <label for="cardid" class="mb-0 text-dark">เลขบัตรประชาชน </label>
                  <input type="text" class="form-control" name="card_id" id="cardid" placeholder="" minlength="13" maxlength="13" onkeyup="setNumber(13,'cardid')" required />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group mb-2">
                  <label for="Call" class="mb-0 text-dark">เบอร์โทร</label>
                  <input type="text" class="form-control" name="call_me" id="Call" placeholder="" minlength="10" maxlength="10" onkeyup="setNumber(10,'Call')" required />
                </div>
              </div>
              <div class="col-2">
                <div class="form-group mb-2">
                  <label for="siblings_number" class="mb-0 text-dark">จำนวนพี่น้อง</label>
                  <input type="number" class="form-control" name="siblings_number" id="siblings_number" placeholder="" required />
                </div>
              </div>
              <div class="col-2">
                <div class="form-group mb-2">
                  <label for="me_number" class="mb-0 text-dark">เป็นคนที่</label>
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
      <div id="demo1" class="demo mt-1 col-md-12" style="display:none;" autocomplete="off" uk-grid>
        
        <div class="col-4">
          <div class="form-group mb-2">
            <label for="homeid" class="mb-0 text-dark">ที่อยู่</label>
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
      <div id="demo2" class="demo mt-0 col-md-12" style="display:none;" autocomplete="off" uk-grid>
        
        <div class="col-4">
          <div class="form-group mb-2">
            <label for="shoolId" class="mb-0 text-dark">ชื่อโรงเรียนประถมศึกษา</label>
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
      <div id="demo3" class="demo mt-0 col-md-12" style="display:none;" autocomplete="off" uk-grid>
        
        <div class="col-4">
          <div class="form-group mb-2">
            <label for="shoolId" class="mb-0 text-dark">ชื่อโรงเรียนมัธยมศึกษา</label>
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
      <div class="col-md-12 row mb-0">
        <div class="col-3">
            <label for="" class="mb-0 text-secondary">สถานะการเรียน</label>
              <select class="form-control" name="study_status" id="studyStatus">
                <option selected disabled hidden>ระบุ..</option>
                <option value="กำลังเรียน">กำลังเรียน</option>
                <option value="หยุดเรียน">หยุดเรียน</option>
              </select>
        </div>
        
        <div class="col-5">
          <div class="form-group mt-0">
            <label for="cause_stop_study" class="mb-0 mt-0 text-secondary">สาเหตุที่หยุดเรียน</label>
            <input type="hidden" class="form-control" name="cause_stop_study" id="cause_stop_study" placeholder="ระบุ" value="ระบุ" />
          </div>
        </div>
        <div class="col-3">
          <div class="form-group mt-0">
            <input type="hidden" class="form-control" name="year_study" id="year_study" placeholder="" value="ไม่ใช่แล้ว" />
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
            <label class="mb-0 text-dark font-weight-bold" for="Fullname">ชื่อ-นามสกุล บิดา</label>
            <div class="col-md-12 row">
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
          <div class="col-md-12 row">
            <div class="col-md-3">
              <div class="form-group mb-2">
                <label class="mt-0 mb-0 font-weight-bold text-dark">วัน-เดือน-ปี เกิด </label>
                  <div class="col-xs-5 date">
                      <div class="input-group input-append date" id="datePicker">
                          <input type="date" class="form-control" id="dateFather" name="berd_day_father" />
                          <span class="input-group-addon add-on">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                      </div>
                  </div>
              </div>
            </div>
            
            <div class="col-md-1">
              <div class="form-group mb-2">
                <label class="mt-0 mb-0 font-weight-bold text-dark">อายุ</label>
                <input type="text" class="form-control" name="age_father" id="Age_f" placeholder="age" required>
              </div>  
            </div>
            <div class="col-md-3">
              <div class="form-group mb-2">
                <label class="mt-0 mb-0 font-weight-bold text-dark" for="Tell_f">เบอร์โทร</label>
                <input type="text" class="form-control" name="tell_father" id="Tell_f" minlength="10" maxlength="10" onkeyup="setNumber(10,'Tell_f')" placeholder="เบอร์โทร" required>
              </div>  
            </div>
            <div class="col-md-2">
              <div class="form-group mb-2">
                <label class="mt-0 mb-0 font-weight-bold text-secondary">สถานภาพ</label>
                <select class="form-control" name="status_father" id="statusdad">
                  <option selected disabled hidden>ระบุ..</option>
                  <option value="ยังมีชีวิตอยู่">ยังมีชีวิตอยู่</option>
                  <option value="เสียชีวิต">เสียชีวิต</option>
                </select>
              </div>
            </div>
            <div class="col-3">
              <div class="form-group mt-0">
                <label for="cause_death" class="mb-0 mt-0 text-secondary">สาเหตุที่เสียชีวิต</label>
                <input type="hidden" class="form-control" name="cause_death_f" id="cause_death_f" value=".." />
              </div>
            </div>
          </div>
          <div class="form-group mb-2">
          <label class="mb-0 text-dark font-weight-bold" for="Firstname_m">ชื่อ-นามสกุล มารดา</label>
          <div class="col-md-12 row">
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
        <div class="col-md-12 row">
          <div class="col-md-3">
            <div class="form-group mb-2">
              <label class="mt-0 mb-0 font-weight-bold text-dark">วัน-เดือน-ปี เกิด </label>
                <div class="col-xs-5 date">
                    <div class="input-group input-append date" id="datePicker">
                        <input type="date" class="form-control" id="datemom" name="berd_day_mather" />
                        <span class="input-group-addon add-on">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-group mb-2">
              <label class="mt-0 mb-0 font-weight-bold text-dark">อายุ</label>
              <input type="text" class="form-control" name="age_mather" id="Age_m" placeholder="age" required>
            </div>  
          </div>
          <div class="col-md-3">
            <div class="form-group mb-2">
              <label class="mt-0 mb-0 font-weight-bold text-dark" for="Tell_m">เบอร์โทร</label>
              <input type="text" class="form-control" name="tell_mather" id="Tell_m" minlength="10" maxlength="10" onkeyup="setNumber(10,'Tell_m')" placeholder="เบอร์โทร" required>
            </div>  
          </div>
          <div class="col-md-2">
            <div class="form-group mb-2">
              <label class="mt-0 mb-0 font-weight-bold text-secondary">สถานภาพ</label>
              <select class="form-control" name="status_mather" id="statusmom">
                <option selected disabled hidden>ระบุ..</option>
                <option value="ยังมีชีวิตอยู่">ยังมีชีวิตอยู่</option>
                <option value="เสียชีวิต">เสียชีวิต</option>
              </select>
            </div>
          </div>
          <div class="col-3">
            <div class="form-group mt-0">
              <label for="cause_death" class="mb-0 mt-0 text-secondary">สาเหตุที่เสียชีวิต</label>
              <input type="hidden" class="form-control" name="cause_death_m" id="cause_death_m" value=".." />
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
                <div class="col-8">
                  <div class="form-group mb-0">
                    <label for="family_status" class="mb-0 text-secondary">สถานภาพครอบครัว</label>
                    
                      <select class="form-control" name="family_status" id="family_status">
                        <option selected disabled hidden>ระบุ..</option>
                        <option value="อยู่กับพ่อ">อยู่กับพ่อ</option>
                        <option value="อยู่กับเเม่">อยู่กับเเม่</option>
                        <option value="อยู่กับญาติ">อยู่กับญาติ</option>
                      </select>
                  </div>
                </div>
                <div class="col-4">
                    <label for="" class="mb-0 text-secondary">ระดับความช่วยเหลือ</label>
                      <select class="form-control" name="level_help" id="">
                        <option selected disabled hidden>ระบุ..</option>
                        <option value="ปกติ">ปกติ</option>
                        <option value="ปานกลาง">ปานกลาง</option>
                        <option value="เร่งด่วน">เร่งด่วน</option>
                      </select>
                </div>
               
              </div>
              <label for="" class="mb-0 text-secondary mt-3">ด้านการช่วยเหลือ</label>
              <div class="col-md-12 row mb-0">
                
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="estimate_help1" id="estimate_help1" value="ด้านอารมฌ์และจิตใจ">
                    <label class="form-check-label" for="estimate_help">ด้านอารมฌ์และจิตใจ</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="estimate_help2" id="estimate_help2" value="ด้านสังคม">
                    <label class="form-check-label" for="estimate_help2">ด้านสังคม</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="estimate_help3" id="estimate_help3" value="ด้านร่างกาย">
                    <label class="form-check-label" for="estimate_help3">ด้านร่างกาย</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="estimate_help4" id="estimate_help4" value="ด้านเศรษฐกิจ">
                    <label class="form-check-label" for="estimate_help4">ด้านเศรษฐกิจ</label>
                  </div>
              </div>
              
            </div>
          </div>
        `
    }
}

customElements.define("main-group-four", inputgroupFour)
  
function setupMap() { 
    var myOptions = {
      zoom: 8,
      center: new google.maps.LatLng(6.564235967235496, 101.2952595949173),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById('map_canvasx'),myOptions);
    var marker = new google.maps.Marker({ 
      map:map,
      position: new google.maps.LatLng(6.564235967235496,101.2952595949173),
      draggable: true
    });

    var infowindow = new google.maps.InfoWindow({
        map:map,
        content: "มูนิธิเด็กกำพร้า",
        position:  new google.maps.LatLng(6.564235967235496,101.2952595949173)
    });
  
  
  google.maps.event.addListener(map,'click',function(event){
  
      var html = '';
      html += '<p class="mb-2">lat : '+event.latLng.lat()+'</p>';
      html += ' <p> lng : '+event.latLng.lat()+'</p>';
      document.getElementById("lat").value = event.latLng.lat()
      document.getElementById("lng").value = event.latLng.lng()
      infowindow.open(map,marker);
      infowindow.setContent(html);
      infowindow.setPosition(event.latLng);

      marker.setPosition(event.latLng);
  
  });
  
  
}


class orphan_informetion extends HTMLElement{
    connectedCallback(){
        this.renderInformation()
    }

    renderInformation(){
        this.innerHTML = `
        
      <div class="modal fade bd-example-modal-xl" id="modalFormInformation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
          <div class="modal-content" id="msform">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มข้อมูลเด็กกำพร้า</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="backend/add-orphan-information.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="status" value="create" />
              <div class="modal-body">
                  <main-group-one></main-group-one>
                    
                  <main-group-true></main-group-true>
                      
                  <main-group-tree></main-group-tree>
                       
                  <main-group-four></main-group-four>
                  
                  <div class="container mb-2">
                    <div class="ml-4" id="map_canvasx" style="width:1000px;height:450px;"></div>
                    <input type="hidden" name="latitude" id="lat" />
                    <input type="hidden" name="logitude" id="lng" />
                  </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-sm btn-success ml-auto mr-4">บันทึกข้อมูล</button>
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

remakeDate("edate","Age")
remakeDate("dateFather","Age_f")
remakeDate("datemom","Age_m")

const causeId = document.getElementById("cause_stop_study")
function checkFuck(idstatusstudy,statusinput,f1){
  const studystatusid = document.getElementById(idstatusstudy)
  studystatusid.addEventListener('change',function handleFuck(){
      if(studystatusid.value == f1){
        statusinput.setAttribute("type","text")
      }else{
        statusinput.setAttribute("type","hidden")
      }
  })
  //ไอสัส
}
checkFuck("studyStatus",causeId,"หยุดเรียน")
const cause_deathM = document.getElementById("cause_death_m")
checkFuck("statusmom",cause_deathM,"เสียชีวิต")
const cause_deathF = document.getElementById("cause_death_f")
checkFuck("statusdad",cause_deathF,"เสียชีวิต")

$(document).on("click","#confirmTrashOrphan", function(e){
  let orphanID = $(this).data('id'),images = $(this).data('images'),imghome=$(this).data('home')
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
      window.location = `backend/edit-show-information-orphan.php?getid_orphan=${orphanID}&img_orphan=${images}&image_home=${imghome}`
      
    }
  })
  e.preventDefault()
})

