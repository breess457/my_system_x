
const queryStr = window.location.search;
const urlParam = new URLSearchParams(queryStr)
const getIDpatron = urlParam.get("id_patron")

const geteventParticipant = (dataorphan, checkorphan)=>{

    let createDomEl = function(param){
        return document.createElement(param)
    }
    let appendAdd = function(cover, el){
        return cover.appendChild(el)
    }


    return dataorphan.map((datamap, i)=>{
        let elementIDorphan = document.getElementById('divIDdata');
        let divset = createDomEl("div"),divaccount = createDomEl("div"),divimage = createDomEl("div"),divtable = createDomEl("div")
        let tr = createDomEl("tr")
        let td = createDomEl("td"), td1 = createDomEl("td"),td2 = createDomEl("td"),td3 = createDomEl("td"),td4 = createDomEl("td"),
            td5 = createDomEl("td"),td6 = createDomEl("td"), td7 = createDomEl("td"), td8 = createDomEl("td")
        let image = createDomEl("img")
        let btn = createDomEl("a"),btt = createDomEl("button")
        let checkbox = createDomEl("input")

        tr.className = "classDataList tr-shadow"
        divset.className = "set-data"
        divaccount.className = "account-item account-item--style2 clearfix js-item-menu"
        divimage.className = "image"
        btn.className = "item"
        btt.className = "btn btn-red btn-sm"
        checkbox.className = "learn-checkbox"
        image.className = "hoverZoomLink"

        checkbox.type = "checkbox";
        checkbox.name = "checkboxIdgrantee[]";

        image.src = `../officer/backend/data/orphan-information/${datamap.profile_orphan}`
        td1.innerHTML = datamap.title_me + datamap.first_name_me + "&nbsp;" + datamap.last_name_me
        td2.innerHTML = datamap.district_home
        td3.innerHTML = datamap.amphoe_home
        td4.innerHTML = datamap.province_home
        td5.innerHTML = datamap.age_me
        td6.innerHTML = datamap.card_id
        btn.innerHTML = '<i class="fas fa-plus"></i>'
        btt.innerHTML = "เพิ่มแล้ว"
        checkbox.value = datamap.id_orphan
        
        
        appendAdd(elementIDorphan, tr)
        appendAdd(tr, td)
        appendAdd(td, divaccount)
        appendAdd(divaccount, divimage)
        appendAdd(divimage, image)
        appendAdd(tr, td1)
        appendAdd(tr, td2)
        appendAdd(tr, td3)
        appendAdd(tr, td4)
        appendAdd(tr, td5)
        appendAdd(tr, td6)
        appendAdd(tr, td7)
        appendAdd(td7, checkbox)

        if(getIDpatron !== checkorphan){
            return checkorphan.map(p =>{

                    switch (p.id_grantee) {
                        case datamap.id_orphan:
                            checkbox.style.display = "none"
                            let xdiv = createDomEl("div"),icon = createDomEl("i"),txt = createDomEl("small")
                            xdiv.className = "text-success"
                            icon.className = "far fa-check-square"
                            txt.innerHTML = "&nbsp; เพิ่มแล้ว"
                            appendAdd(xdiv, icon)
                            appendAdd(xdiv, txt)
                            appendAdd(td7, xdiv)
                            break;
                    } 
            })
        }
        
    })
}

const getapiParticipant = (eventelemtparticipant, idSet)=>{

/*     try{
        let [ getdata, checkgentreeadd ] = await Promise.all([
            fetch("backend/apiget-add-orphan.php"),
            fetch(`backend/api/apiget-check-gentree.php?get_id_patron=${idSet}`)

        ])
        eventelemtparticipant(getdata, checkgentreeadd)
    }catch(err){
        console.log(err)
    } */

    Promise.all([
        fetch(`backend/api/apiget-check-gentree.php?get_id_patron=${idSet}`).then(req => req.json()),
        fetch(`backend/apiget-add-orphan.php`).then(req => req.json())

    ]).then(([checkgentreeadd,getdatas])=>{
        //console.log(checkgentreeadd)
        eventelemtparticipant(getdatas, checkgentreeadd)
    }).catch((err)=>{
        console.log(err)
    }) 

}

class modalScholarship extends HTMLElement{
    connectedCallback(){
        this.renderSholarship()
    }
    renderSholarship(){
        this.innerHTML = `
            <div id="addEmployeeModal" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มผู้ต้องการรับทุน</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body col-md-12">
                            <form action="backend/crud-grantee-scholarship.php" method="post">
                                <input type="hidden" name="patronId" id="getPatronId" />
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                      <thead>
                                        <tr>
                                            <th>รูปภาพ</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <th>ตำบล</th>
                                            <th>อำเภอ</th>
                                            <th>จังหวัด</th>
                                            <th>อายุ</th>
                                            <th>บัตรประชาชน</th>
                                            <th>เลือก</th>
                                        </tr>
                                      </thead>
                                        <tbody id="divIDdata"></tbody>
                                    </table>
                                </div>
                                <button type="submit" class="btn btn-cyan btn-sm">เพิ่มข้อมูลที่เลื่อก</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }
}

customElements.define('main-add-orphan', modalScholarship)

$(document).on('click','#getbtngentree', function(e){

    var patronId = $(this).data('id');

    $('#getPatronId').val(patronId)

    e.preventDefault()

})

getapiParticipant(geteventParticipant,getIDpatron)

class modaleditpatron extends HTMLElement{
    connectedCallback(){
        this.renderEdit()
    }
    renderEdit(){
        this.innerHTML = `
        <div id="editEmployeeModal" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มผู้ต้องการรับทุน</h5>
                        <p id="showidpatron"></p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="backend/add-patrons.php" method="POST">
                        <input type="hidden" name="editIdpatron" id="getidpatron" />
                        <div class="modal-body row">
                            <div class="col-md-2">
                                <div class="form-select mb-2">
                                    <label class="mb-0 text-primary" for="titleID">คำนำหน้า</label>
                                    <select class="form-control" name="title" >
                                      <option selected id="titleID" hidden></option>
                                      <option value="นาย">นาย</option>
                                      <option value="นาง">นาง</option>
                                      <option value="นางสาว">นางสาว</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                  <label class="mb-0 text-primary" for="Ferstname">ชื่อ</label>
                                  <input type="text" class="form-control" name="ferst_name" id="Ferstname" placeholder="Ferst Name" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-2">
                                  <label class="mb-0 text-primary" for="Lastname">นามสกุล</label>
                                  <input type="text" class="form-control" name="last_name" id="Lastname" placeholder="Last Name" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                  <label class="mb-0 text-primary" for="Idcard">เลขที่บัตรประจำตัวประชาชน</label>
                                  <input type="text" class="form-control" name="card_id" id="Idcard" placeholder="เลขที่บัตรประจำตัวประชาชน" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-2">
                                  <label class="mb-0 text-primary" for="Tell">เบอรโทรศัพท</label>
                                  <input type="text" class="form-control" name="tell" id="Tell" placeholder="เบอร.โทรศัพท.." required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0 text-primary" for="HomeID">address</label>
                                <div class="row mb-2">
                                  <div class="col-2 mt-0">
                                    <input type="text" class="form-control" name="id_home" id="HomeID" placeholder="บ้านเลขที่" required>
                                  </div>
                                  <div class="col-2 mt-0">
                                    <input type="text" class="form-control" name="distric_a" id="distric_a" placeholder="ตำบล" required>
                                  </div>
                                  <div class="col-3 mt-0">
                                    <input type="text" class="form-control" name="distric_b" id="distric_b" placeholder="อำเภอ" required>
                                  </div>
                                  <div class="col-3 mt-0">
                                    <input type="text" class="form-control" name="distric_c" id="distric_c" placeholder="จังหวัด" required>
                                  </div>
                                  <div class="col-2 mt-0">
                                    <input type="number" class="form-control" name="distric_e" id="distric_e" placeholder="รหัสไปรษณีย์" required>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-12 row">
                                <div class="form-group mb-2 col-2">
                                  <label class="mb-0 text-primary" for="career">อาชีพ</label>
                                  <input type="text" class="form-control" name="career" id="career" placeholder="อาชีพ" required>
                                </div>
                                <div class="form-group mb-2 col-3">
                                  <label class="mb-0 text-primary" for="Workplace">สถานที่ทำงาน</label>
                                  <input type="text" class="form-control" name="workplace" id="Workplace" placeholder="สถานที่ทำงาน" required>
                                </div>
                                <div class="form-group mb-2 col-2">
                                  <label class="mb-0 text-primary" for="Datenew">วัน/เดือน/ปี ที่เริ่มให้ทุน</label>
                                  <input type="date" class="form-control" name="new_date" id="Datenew" placeholder="วัน/เดือน/ปี" required>
                                </div>
                                <div class="form-group mb-2 col-2">
                                  <label class="mb-0 text-primary" for="Dateend">วัน/เดือน/ปี สิ้นสุดให้ทุน</label>
                                  <input type="date" class="form-control" name="end_date" id="Dateend" placeholder="วัน/เดือน/ปี" required>
                                </div>
                                <div class="form-group mb-2 col-3">
                                  <label class="mb-0 text-primary" for="xnumber">ให้ทุนการศึกษาจำนวน บาท/เดือน/คน</label>
                                  <input type="number" class="form-control" name="num_x" id="xnumber" placeholder="จำนวน บาท/เดือน/คน" required>
                                </div>
                                <div class="form-group mb-2 col-3">
                                  <label class="mb-0 text-primary" for="allmonny">รวมเป็นเงินทั้งสิ้น</label>
                                  <input type="number" class="form-control" name="all_manny" id="allmonny" placeholder="เงินทั้งสิ้น" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-blue btn-sm">submit</button>
                    </form>
                </div>
            </div>
        </div>
        `
    }
}
customElements.define('main-edit-patron', modaleditpatron)

const patronapiedit = (dataid, fneditpatron)=>{
    fetch(`backend/api/apiget-data-patron.php?patron_id=${dataid}`,{
        method: "GET",
        headers:{"Content-Type": "application/json; charset=UTF-8",}
    }).then(res => res.json())
    .then(data =>{
        console.log(data)
        fneditpatron(data)
    })
    .catch(err => console.log(err))
}

function edtdatapatron(getdata){
    let selectEl = (el, data)=> document.getElementById(el).innerHTML = data
    let inputEl = (el, eventdata) => document.getElementById(el).value = eventdata
    return getdata.map(resdata=>{

        selectEl('titleID', resdata.title)
        inputEl('Ferstname', resdata.f_name)
        inputEl('Lastname', resdata.l_name)
        inputEl('Idcard', resdata.id_card)
        inputEl('Tell', resdata.tell)
        inputEl('HomeID', resdata.number_home)
        inputEl('distric_a', resdata.district_t)
        inputEl('distric_b' , resdata.district_a)
        inputEl('distric_c', resdata.district_j)
        inputEl('distric_e', resdata.zip_code)
        inputEl('career', resdata.career)
        inputEl('Workplace', resdata.workplace)
        inputEl('Datenew', resdata.new_date)
        inputEl('Dateend', resdata.end_date)
        inputEl('xnumber', resdata.munny)
        inputEl('allmonny', resdata.all_munny)


    })
}

$(document).on('click', '#editbtnpatron', function(event){
    var patronId = $(this).data('id')
    $('#showidpatron').html(patronId)
    $('#getidpatron').val(patronId)

    patronapiedit(patronId, edtdatapatron)
    event.preventDefault()
})