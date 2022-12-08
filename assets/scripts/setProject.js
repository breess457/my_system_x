
const elementUserTables =(rawDatas, test)=>{

    function appendAdd(cover, element){
        return cover.appendChild(element)
    }
    return rawDatas.map((dataProcess,i)=>{
        
        var tableIdUserPluse = document.getElementById('getUserElement');
        var tr = document.createElement("tr");
        var image = document.createElement("img");
        var divSet = document.createElement("div"),divImage = document.createElement("div"),divAccount = document.createElement("div")
        var td = document.createElement("td"),td1 = document.createElement("td"),td2 = document.createElement("td"),td3=document.createElement("td");

        tr.className = "classDataList tr-shadow"
        divSet.className = "set-data"
        divImage.className = "image"
        divAccount.className = "account-item account-item--style2 clearfix js-item-menu"

        image.src = `../officer/backend/data/orphan-information/${dataProcess.profile_orphan}`
        td1.innerHTML = dataProcess.title_me + dataProcess.first_name_me + "&nbsp;" + dataProcess.last_name_me
        td2.innerHTML = dataProcess.age_me
        td3.innerHTML = `${dataProcess.district_home}&nbsp;${dataProcess.amphoe_home}&nbsp;${dataProcess.province_home} ${dataProcess.zipcode_home}`

        appendAdd(tableIdUserPluse,tr)
        appendAdd(tr,td)
        appendAdd(td, divAccount)
        appendAdd(divAccount, divImage)
        appendAdd(divImage, image)
        appendAdd(tr, td1)
        appendAdd(tr, td2)
        appendAdd(tr, td3)

        console.log( dataProcess.id_orphan)

    })
}

class modalShowUserPlus extends HTMLElement{
    connectedCallback(){
        this.renderUserPlus()
    }
    renderUserPlus(){
        this.innerHTML = `
            <div class="modal fade in bd-example-modal-xl modalx" id="modalShowuserAdd" tabindex="-1" role="dialog" aria-hidden="false">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">รายชื่อผู้เข้าร่วมโครงการ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body row">
                            <div class="table-responsive table-responsive-data2 table-wrapper-scroll-y my-custom-scrollbar">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>รูป</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <th>อายุ</th>
                                            <th>ที่อยู่</th>
                                        </tr>
                                    </thead>
                                    <tbody id="getUserElement"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `
    }
}
customElements.define('show-user-plus', modalShowUserPlus);



$(document).on("click","#btnShowUseradd",function(e){
    let getid = $(this).data("id")
    fetch(`http://localhost/my_system_x/admin/backend/api/apiget-setdata-users.php?status_user=userplus&project_id=${getid}`,{
        method:"GET",
        headers:{"Content-Type": "application/json; charset=UTF-8",}
    })
     .then((response) => response.json())
      .then((getdata) => {
            elementUserTables(getdata,"test")
            console.log(getdata)
        })
        .catch(err => console.log(err))
    
     $(".modalx").hide('hidden.bs.modal',function(){
        $("#getUserElement").html("")
        console.log("hide success")
    }) 
})

 

const elementUserNoneTables =(rawDatas, apiOne, projectID)=>{

    
    function appendAdd(cover, element){
        return cover.appendChild(element)
    }
    return rawDatas.map((dataProcess)=>{

        var tableIdUserPluse = document.getElementById('getUserNoneElement');
        var tr = document.createElement("tr");
        var image = document.createElement("img");
        var divSet = document.createElement("div"),divImage = document.createElement("div"),divAccount = document.createElement("div")
        var td = document.createElement("td"),td1 = document.createElement("td"),td2 = document.createElement("td"),td3=document.createElement("td");

        tr.className = "classDataList tr-shadow"
        divSet.className = "set-data"
        divImage.className = "image"
        divAccount.className = "account-item account-item--style2 clearfix js-item-menu"

        image.src = `../officer/backend/data/orphan-information/${dataProcess.profile_orphan}`
        td1.innerHTML = dataProcess.title_me + dataProcess.first_name_me + "&nbsp;" + dataProcess.last_name_me
        td2.innerHTML = dataProcess.age_me
        td3.innerHTML = `${dataProcess.district_home}&nbsp;${dataProcess.amphoe_home}&nbsp;${dataProcess.province_home} ${dataProcess.zipcode_home}`

        appendAdd(tableIdUserPluse,tr)
        appendAdd(tr,td)
        appendAdd(td, divAccount)
        appendAdd(divAccount, divImage)
        appendAdd(divImage, image)
        appendAdd(tr, td1)
        appendAdd(tr, td2)
        appendAdd(tr, td3)
        if(projectID !== apiOne){
            return apiOne.map(data=>{
                if (dataProcess.id_orphan === data.getid_participan){
                        tr.style.display = "none"
                }
            })
        }
          
        
    })
}

class modalShowUserNone extends HTMLElement{
    connectedCallback(){
        this.renderUserNone()
    }
    renderUserNone(){
        this.innerHTML = `
            <div class="modal fade bd-example-modal-xl modals" id="modalShowuserNone" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">รายชื่อผู้ที่ยังไม่เข้าร่วมโครงการ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body row">
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2 table-wrapper-scroll-y my-custom-scrollbar">
                                    <thead>
                                        <tr>
                                            <th>รูป</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <th>อายุ</th>
                                            <th>ที่อยู่</th>
                                        </tr>
                                    </thead>
                                    <tbody id="getUserNoneElement"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `
    }
}
customElements.define('show-user-none', modalShowUserNone);
$(document).on("click","#btnShowusernone", function(event){
     let getID = $(this).data("id")
    Promise.all([
        fetch(`http://localhost/my_system_x/admin/backend/apiget-check-orphan.php?get_id_project=${getID}`).then(res => res.json()),
        fetch(`http://localhost/my_system_x/admin/backend/apiget-add-orphan.php`).then(req => req.json())
    ]).then(([apiOne, apiTrue])=>{
        //console.log(apiTrue)
        elementUserNoneTables(apiTrue, apiOne, getID)
        
    }).catch(err => console.log(err))

    $(".modals").hide('hidden.bs.modal',function(){
        $("#getUserNoneElement").html("")
        console.log("hide success modalnone")
    }) 
})

class modalDetailProject extends HTMLElement{
    constructor(){
        super()
    }
    connectedCallback(){
        this.renderDetailProject()
    }
    renderDetailProject(){
        this.innerHTML = `
        
        <div class="modal fade " id="modalDetailProject" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">แสดงโครงการ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <div class="modal-body row">
                    <div class="col-md-12 mt-0">
                          <div class="form-group mb-2">
                              <label class="mb-0 text-default" for="Fullname">ชื่อโครงการ</label>
                              <input type="text" class="form-control" id="ShowProjectname" placeholder="Project Name" disabled>
                          </div>
                    </div>
                    <div class="col-md-12 row">
                      <div class="col-12">
                          <div class="form-group mb-0">
                              <label class="mb-0 text-default" for="title">ผู้รับผิดชอบ โครงการ</label>
                          </div>
                      </div>
                      <div class="col-3 mt-0">
                          <div class="form-group mb-2">
                              <input type="text" class="form-control" id="Showpersenaltitle" placeholder="title" disabled>
                          </div>
                      </div>
                      <div class="col-6 mt-0">
                          <div class="form-group mb-2">
                              <input type="text" class="form-control" id="Showpersenalname" placeholder="Ferst Name" disabled>
                          </div>
                      </div>
                      <div class="col-3 mt-0">
                          <div class="form-group mb-2">
                              <input type="text" class="form-control" id="Showpersenallastname" placeholder="Last Name" disabled>
                          </div>
                      </div>
                    </div>
                    
                    <div class="col-md-8 row mt-1">
                      <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label class="ml-1 mt-0 mb-0 font-weight-bold text-dark">รายละเอียด</label>
                            <textarea class="form-control" rows="3" id="ShowDetail" disabled></textarea>
                        </div>
                      </div>
                      <div class="col-6">
                          <div class="form-group">
                            <label class="ml-1 mt-0 mb-0 font-weight-bold text-default">เริ่มโครงการ</label>
                              <div class="col-xs-5 date">
                                  <div class="input-group input-append date" id="datePicker">
                                      <input type="date" class="form-control" id="Showstartdate" disabled/>
                                      <span class="input-group-addon add-on">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-6">
                          <div class="form-group">
                            <label class="ml-1 mt-0 mb-0 font-weight-bold text-default">สิ้นสุดโครงการ</label>
                              <div class="col-xs-5 date">
                                  <div class="input-group input-append date" id="datePicker">
                                      <input type="date" class="form-control" id="Showenddate" disabled/>
                                      <span class="input-group-addon add-on">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                  </div>
                              </div>
                          </div>
                      </div>
                    
                      <div class="col-md-12 mt-0">
                          <div class="form-group mb-2">
                              <label class="mb-0 text-default" for="area">พื่นที่ดำเนินงาน</label>
                              <input type="text" class="form-control" id="Showarea" placeholder="สถานที่ทำโครงการ" disabled />
                          </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="mb-2" 
                        style="
                          position: absolute;
                          height: 100%;
                          width: 100%;
                          display: flex;
                          align-items: center;
                          justify-content: center;"
                      >
                        <img class="set-image-project" 
                         style="height: 90%;
                                width: 90%;
                                background-repeat: no-repeat;
                                object-fit: cover;
                                background-attachment: fixed;  
                                background-size: cover;"
                        />
                      </div>
                    </div>
                </div>
              
            </div>
          </div>
        </div>
    
          `
    }
}
customElements.define('main-detail-project',modalDetailProject)
$(document).on("click","#showDetailProject", function(e){
    let projectId = $(this).data('id'),projectname=$(this).data('projectname'),year=$(this).data('year')
    let responsibletitle=$(this).data('responsibletitle'),responsiblename=$(this).data('responsiblename'),responsiblelastname=$(this).data('responsiblelastname')
    let operationarea=$(this).data('operationarea'),startdate=$(this).data('startdate'),enddate=$(this).data('enddate')
    let projectimg=$(this).data('projectimg'),detail=$(this).data('detail')
        $("#ShowProjectname").val(projectname)
        $("#Showpersenaltitle").val(responsibletitle)
        $("#Showpersenalname").val(responsiblename)
        $("#Showpersenallastname").val(responsiblelastname)
        $("#ShowDetail").val(detail)
        $("#Showstartdate").val(startdate)
        $("#Showenddate").val(enddate)
        $("#Showarea").val(operationarea)
        $(".set-image-project").attr('src',`../admin/backend/data/project/${projectimg}`)
})

$(document).on("click","#AlertEndDate", function(es){
    Swal.fire({
        icon: 'warning',
        title: 'ไม่อนุญาตจัดการข้อมูล',
        text: 'เนื่องจากเลยเวลาที่กำหนดวันที่สิ้นสุดโครงการแล้ว',
        showConfirmButton: false,
    })
    es.preventDefault()
})