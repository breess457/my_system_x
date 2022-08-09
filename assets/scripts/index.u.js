

  class modalLogin extends HTMLElement{
      connectedCallback(){
        this.renDer()
      }
      renDer(){
          this.innerHTML = `
            <div class="modal fade" id="exampleModalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="exampleModalLongTitle">เข้าสู่ระบบ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="backend/check-login.php" method="POST">
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa fa-address-card-o" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa fa-key" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ย้อนกลับ</button>
                            <button type="submit" class="btn btn-primary">ตกลง</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
          `
      }
  }

  customElements.define('main-modallogin',modalLogin)