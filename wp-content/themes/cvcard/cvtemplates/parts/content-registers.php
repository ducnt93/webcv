<!-- begin div đăng ký tài khoản -->
<div class="panel panel-primary">
    <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
            <label>
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                   href="#thong_tin_tai_khoan" aria-expanded="true" aria-controls="thong_tin_tai_khoan"
                   style="color:white;">1.1.Tài
                    khoản</a>
            </label>
        </h4>
    </div>
    <div id="thong_tin_tai_khoan" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-3 control-label">Tên đăng nhập<span class="required_input">(*)</span> : </label>
                <div class="col-sm-9">
                    <input type="text" id="inputTenDangNhap" name="inputTenDangNhap" class="form-control required">
                    <label for="inputTenDangNhap" class="error"></label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Mật khẩu<span class="required_input">(*)</span> : </label>
                <div class="col-sm-9">
                    <input type="password" id="inputMatKhau" name="inputMatKhau" class="form-control required">
                    <label for="inputMatKhau" class="error"></label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Xác nhận mật khẩu<span class="required_input">(*)</span> : </label>
                <div class="col-sm-9">
                    <input type="password" id="inputMatKhauConfirm" name="inputMatKhauConfirm"
                           class="form-control required">
                    <label for="inputMatKhauConfirm" class="error"></label>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end div đăng ký tài khoản -->