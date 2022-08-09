
const queryStr = window.location.search;
const urlParam = new URLSearchParams(queryStr)
const getIDproject = urlParam.get("idx_project")


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

        checkbox.type = "checkbox";
        checkbox.name = "checkboxId[]";

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

        //console.log(checkorphan)
        if(getIDproject !== checkorphan){
            return checkorphan.map(p =>{
            
                switch (datamap.id_orphan) {
                    case p.getid_participan:
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
                //console.log(p)
            })
        }
        
    })
}

const getapiParticipant = (eventelemtparticipant, idSet)=>{

    Promise.all([
        fetch(`backend/apiget-check-orphan.php?get_id_project=${idSet}`).then(req => req.json()),
        fetch(`backend/apiget-add-orphan.php`).then(req => req.json())

    ]).then(([checkmydata, getdatas])=>{
        console.log(checkmydata)
        eventelemtparticipant(getdatas, checkmydata)
    }).catch((err)=>{
        console.log(err)
    })

} 
//getapiParticipant(geteventParticipant)

class ModalAddParticipant extends HTMLElement{
    connectedCallback(){
        this.renderAdd()
    }
    renderAdd(){
        this.innerHTML = `
            <div class="modal fade bd-example-modal-xl" id="modaAddParticipant" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มผู้เข้าร่วมโครงการ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body col-md-12">
                          <form action="backend/add-orphan.php" method="post">
                            <input type="hidden" name="projectid" id="getProjectId" />
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
        `
    }
}

customElements.define('main-add-participant', ModalAddParticipant)

$(document).on('click','#btnAddParticipant', function(e){

    var projectId = $(this).data('id');

    $('#getProjectId').val(projectId)

    e.preventDefault()

})

getapiParticipant(geteventParticipant,getIDproject)

