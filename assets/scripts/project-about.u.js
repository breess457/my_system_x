
const listComponent=(getdata)=>{
    let createDomEl= function(param){
        return document.createElement(param)
    }
    let appendEl= function(cover, el){
        return cover.appendChild(el)
    }

    return getdata.map((data, i)=>{
        let elementId = document.getElementById("getdata")
        let li = createDomEl("li"),flexImg = createDomEl("div"),image = createDomEl("img")
        let textitem = createDomEl("div"),tagname = createDomEl("p"), smallOne = createDomEl("small")
        let smallTrue = createDomEl("small")

        li.className = "d-flex justify-content-between"
        flexImg.className="d-flex flex-row align-items-center"
        image.style.width = "60"
        image.style.height = "60"
        textitem.className = "p-0 align-items-center"
        tagname.className = "m-0"

        image.src = `officer/backend/data/orphan-information/${data.profile_orphan}`
        tagname.innerHTML = data.title_me + data.first_name_me + "&nbsp;" + data.last_name_me
        smallOne.innerHTML = `age: ${data.age_me}   กรุ๊ปเลือด:${data.blood_group_me}`
        smallTrue.innerHTML = `<i class="bx bx-map"></i>  ${data.entry_date}`

        appendEl(elementId, li)
        appendEl(li,flexImg)
        appendEl(flexImg, image)
        appendEl(li, textitem)
        appendEl(textitem, tagname)
        appendEl(textitem, smallOne)
        appendEl(textitem, smallTrue)
    })
}

const getapiParticipants = (domEventList, getID)=>{
    fetch(`admin/backend/api/api-red-orphan.php?getIDproject=${getID}`,{
        method:"GET",
        headers:{"Content-Type": "application/json; charset=UTF-8",}
    }).then(res => res.json())
    .then(datas =>{
        console.log(datas)
        domEventList(datas)
    })
    .catch(err => console.log(err))
    
}

class modalListComboData extends HTMLElement{
    connectedCallback(){
        this.renderCombo()
    }   
    renderCombo(){
        this.innerHTML = `
            <div class="modal fade bd-example-modal-xl mx-tt" id="modalListcombo" role="dialog" >
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content py-md-5 px-md-4 p-sm-3 p-4">
                        <div class="row">
                            <div class="col-md-8 card">
                                <div class="row">
                                    <div class="col-sm-5 card-img">
                                      <img class="getimg d-block" src="" alt="" id="">
                                        <span><h4 id="txt-number"></h4></span>
                                    </div>
                                    <div class="col-sm-7">
                                      <div class="card-block">
                                        <h4 class="text-h"></h4>
                                        <textarea class="form-control txt-body mb-4" rows="3" disabled></textarea>
                                        <small class="txt-area"></small>
                                        <div class="row mt-2">
                                            <small id="txt-start" class="text-dark"></small>
                                            <small id="txt-end" class="text-dark ml-3"></small>
                                        </div>
                                        <div class="row">
                                            <small class="adminname mt-4 mb-0 ml-auto"></small>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12 shadow recent-articles" style="margin-bottom: 0;">
                                    <div class="recent-articles-list">
                                        <small class="ml-4 mt-2 mb-0 text-primary" id="participan"></small>
                                        <ul class="list list-inline w-100 mt-0" id="getdata">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        `;
    }
}

customElements.define('main-auther-data',modalListComboData)

$(document).on("click","#btnComboData",function(ev){
    let id=$(this).data('id'),projectnumber=$(this).data('projectnumber'),projectname=$(this).data('projectname');
    let details=$(this).data('details'),area=$(this).data('area'),imageproject=$(this).data('imageproject');
    let start=$(this).data('start'),end=$(this).data('end'),administarter=$(this).data('administarter'),numberspese=$(this).data('numberspese');

    $(".getimg").attr('src',`admin/backend/data/project/${imageproject}`)
    $(".text-h").html(`<i class=\"fas fa-star\"></i> ${projectname}`)
    $(".txt-body").html(`รายละเอียด: ${details}`)
    $(".adminname").html(`<i class=\"far fa-user\"></i> รับผิดชอบโดย: ${administarter}`)
    $(".txt-area").html(`<i class=\"fas fa-location-arrow text-primary\"></i> location: ${area}`)
    $("#txt-number").html(`ID: ${projectnumber}`)
    $("#txt-start").html(`เริ่มโครงการ ${start}`)
    $("#txt-end").html(`สิ้นสุดโครงการ ${end}`)
    $("#participan").html(`รายชื่อผู้เข้าร่วม ${numberspese} คน`)
    ev.preventDefault()
    
})
$(document).ready(function(){
    $("#modalListcombo").on('hidden.bs.modal', function() {
        location.reload()
    });
})


function ftId(data){
    getapiParticipants(listComponent, data)
}
