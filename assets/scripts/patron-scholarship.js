
const queryStr = window.location.search;
const urlParam = new URLSearchParams(queryStr)
const getIDpatron = urlParam.get("patron_setid")
const GetPerSonNumber = urlParam.get("person_numbers")

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
        let checkbox = createDomEl("input"),btnpopup = createDomEl("button")
        let button = createDomEl("button"),divdropdown=createDomEl("div"),dropdownmenu = createDomEl("div")
        
       
        let xx = (dataSex)=>{
            switch (dataSex) {
                case 'เด็กชาย':
                   return 'ชาย'
                    break;
                case 'เด็กหญิง':
                    return 'หญิง'
                    break;
                default:
                    break;
            }
        }
        let fetchNumberCapital = (getDATA,callbackFunction)=>{
            
            fetch(`backend/api/api-set-data-patron.php?status=numberCapital&get_id_orphan=${getDATA}`,{
                method:"GET",
                headers:{"Content-Type": "application/json; charset=UTF-8"}
            }).then(res => res.json())
            .then((data)=>{
                //console.log(data)
                callbackFunction(data)
                button.innerHTML = `ได้รับทุน ${data.length} ครั้ง`
              
            }).catch(errx=>console.log(errx))
        }
        
        let elNumberCapital = (GetDataArrayCapital)=>{
            //const arrSorc = GetDataArrayCapital.sort((a,b)=>a.id_grantee.localeCompare(b.id_grantee))
            //console.log(arrSorc)
            return GetDataArrayCapital.map((result,is)=>{
                let listmenu = createDomEl("a")
                is++;
                listmenu.className ="dropdown-item"
                appendAdd(dropdownmenu,listmenu)
                if(!is){
                    listmenu.innerHTML = `ไม่เคยได้รับทุน`
                }else{
                    listmenu.innerHTML = `จำนวนเงินครังที่${is} : ${result.scholarship_amount} บาท  
                        &nbsp; เมื่อวันที่:${result.entry_date} ให้โดย:${result.title} ${result.f_name} &nbsp;${result.l_name}`
                }
            })
        }
        function studCheck() {
            let total = document.querySelectorAll('input[type="checkbox"]:checked').length;
            let btnSubmit = document.getElementById("submitBtn"),getTh = document.getElementById("getTH")
             if(total == GetPerSonNumber){
                //alert("เพิ่มสูงสุดได้แค่ "+ GetPerSonNumber + "เท่านั้น")
                $('input[name="checkboxIdgrantee[]"]').each(function(){
                    if(!$(this).is(":checked")){
                        $(this).prop("disabled",true)
                        getTh.innerHTML = `เพิ่มครบ${GetPerSonNumber}คน แล้ว`
                        getTh.className = "text-danger"
                    }
                })
             }
             else{
                $('input[name="checkboxIdgrantee[]"]').each(function(){
                    $(this).prop("disabled", false); 
                    btnSubmit.disabled = false
                })
              }
            document.getElementById("totalStudents").innerHTML = "จำนวนผู้รับทุนที่คุณเพิ่ม: " + total;
            document.getElementById("setFuck").innerHTML = `ให้ทุนได้อีก: ${GetPerSonNumber - total} คน เท่านั้น`
        }
        document.addEventListener("click", studCheck)
        divdropdown.className ="dropdown"
        btnpopup.className = "getpopupbtnClass bg-none"
        btnpopup.type = "button"
        btnpopup.id="getpopupbtn"
        button.className ="bg-none dropdown-toggle"
        button.type = "button"
        button.id="BtnDropdown"
        button.setAttribute("data-toggle","dropdown")
        button.setAttribute("aria-haspopup","true")
        dropdownmenu.className ="dropdown-menu"
        dropdownmenu.setAttribute("aria-labelledby","BtnDropdown")


        tr.className = "trlist-style tr-shadow"
        divset.className = "set-data"
        divaccount.className = "account-item account-item--style2 clearfix js-item-menu"
        divimage.className = "image"
        btn.className = "item"
        btt.className = "btn btn-red btn-sm"
        checkbox.className = "learn-checkbox CheckBoxAdd"
        image.className = "hoverZoomLink"

        checkbox.type = "checkbox";
        checkbox.name = "checkboxIdgrantee[]";
        checkbox.addEventListener("click",studCheck)

        image.src = `../officer/backend/data/orphan-information/${datamap.profile_orphan}`
        td1.innerHTML = datamap.title_me + datamap.first_name_me + "&nbsp;" + datamap.last_name_me
        //td2.innerHTML = datamap.district_home
        td3.innerHTML = xx(datamap.title_me)
        td4.innerHTML = datamap.age_me
        td6.innerHTML = datamap.card_id
        btn.innerHTML = '<i class="fas fa-plus"></i>'
        btt.innerHTML = "เพิ่มแล้ว"
        checkbox.value = datamap.id_orphan
        fetchNumberCapital(datamap.id_orphan,elNumberCapital)
        
        
        appendAdd(elementIDorphan, tr)
        appendAdd(tr, td)
        appendAdd(td, divaccount)
        appendAdd(divaccount, divimage)
        appendAdd(divimage, image)
        appendAdd(tr, td1)
        appendAdd(tr, td3)
        appendAdd(tr, td4)
        appendAdd(tr, td5)
        appendAdd(td5,divdropdown)
        appendAdd(divdropdown,button)
        appendAdd(divdropdown,dropdownmenu)
        appendAdd(tr, td6)
        appendAdd(tr, td7)
        appendAdd(td7, checkbox)

        if(getIDpatron !== checkorphan){
            //console.log(checkorphan)
            return checkorphan.map(p =>{

                    switch (p.id_grantee) {
                        case datamap.id_orphan:
                            checkbox.style.display = "none"
                            checkbox.checked=true
                            checkbox.name="checkboxIdgranteefalse[]"
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
    constructor(){
        super()
    }
      get personnumber(){
        return this.getAttribute("personnumber")
      }
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
                        <div class="d-flex">
                            <label id="totalStudents" class="ml-3">จำนวนผู้รับทุนที่คุณเพิ่ม: 0</label>
                            <h5 class="ml-auto text-dark mr-5" id="setFuck"></h5>
                        </div>
                        <div class="modal-body col-md-12">
                            <form action="backend/crud-grantee-scholarship.php" method="post">
                                <input type="hidden" name="get_personnumber" value="${this.personnumber}"/>
                                <input type="hidden" name="patronId" id="getPatronId" />
                                <input type="hidden" name="dateticals" id="datetical" />
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2" id="SortTable">
                                      <thead class="thed-style">
                                        <tr>
                                            <th>รูปภาพ</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <th>เพศ</th>
                                            <th>อายุ</th>
                                            <th onclick="sortTable(0)">จำนวนทุนที่ได้รับ <i class="fas fa-sort" style="color:red;font-size:18px"></i></th>
                                            <th>บัตรประชาชน</th>
                                            <th id="getTH">เลือก</th>
                                        </tr>
                                      </thead>
                                        <tbody class="tbody-style" id="divIDdata"></tbody>
                                    </table>
                                </div>
                                <button type="submit" id="submitBtn" class="btn btn-cyan btn-sm">เพิ่มข้อมูลที่เลื่อก</button>
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
    var mydate = $(this).data('dates');

    $('#getPatronId').val(patronId)
    $('#datetical').val(mydate)

    e.preventDefault()

})

getapiParticipant(geteventParticipant,getIDpatron)

function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("SortTable");
    switching = true;
    dir = "asc";
    while (switching) {
      switching = false;
      rows = table.getElementsByTagName("TR");
      for (i = 1; i < (rows.length - 1); i++) {
        shouldSwitch = false;
        x = rows[i].getElementsByTagName("BUTTON")[n];
        y = rows[i + 1].getElementsByTagName("BUTTON")[n];
        if (dir == "asc") {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            shouldSwitch= true;
            break;
          }
        } else if (dir == "desc") {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            shouldSwitch= true;
            break;
          }
        }
      }
      if (shouldSwitch) {
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        switchcount ++;
      } else {
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
  }

  $(document).on("click","#alertFalse",function(e){
    
    Swal.fire({
        icon: 'warning',
        title: 'ไม่สามารถลบได้',
        text: 'เนื่องจากเลยเวลาที่กำหนดแล้วสามารถจัดการได้แค่10วันหลังจากวันแรกที่ให้ทุนเท่านั้น',
        showConfirmButton: false,
    })
    e.preventDefault()
  })