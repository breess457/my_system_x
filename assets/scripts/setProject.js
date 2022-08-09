
function fetchData(id){
    console.log("hell low" + id)
}


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
                            <div class="table-responsive table-responsive-data2">
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
    fetch(`backend/api/apiget-setdata-users.php?status_user=userplus&project_id=${getid}`,{
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

       
        console.log(apiOne)
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
                            <h5 class="modal-title" id="exampleModalLongTitle">รายชื่อผู้noเข้าร่วมโครงการ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body row">
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
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
        fetch(`backend/apiget-check-orphan.php?get_id_project=${getID}`).then(res => res.json()),
        fetch(`backend/apiget-add-orphan.php`).then(req => req.json())
    ]).then(([apiOne, apiTrue])=>{
        //console.log(apiTrue)
        elementUserNoneTables(apiTrue, apiOne, getID)
        
    }).catch(err => console.log(err))

    $(".modals").hide('hidden.bs.modal',function(){
        $("#getUserNoneElement").html("")
        console.log("hide success modalnone")
    }) 
})