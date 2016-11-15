<!-- begin div Thông tin cá nhân -->
<div class="panel panel-primary">
    <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
            <label>
                <a id='thong_tin_ca_nhan_link' role="button" data-toggle="collapse" data-parent="#accordion"
                   href="#thong_tin_ca_nhan" aria-expanded="true" aria-controls="thong_tin_ca_nhan"
                   style="color:white;">1.2.Thông tin cá nhân</a>
            </label>
        </h4>
    </div>
    <div id="thong_tin_ca_nhan" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
            <div class="form-group">
                <label for="inputHo" class="col-sm-3 control-label" lang="jp">Họ và tên<span
                        class="required_input">(*)</span> :</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control required" id="inputHo"
                           placeholder="Nguyễn Văn Đức"
                           name="inputHo" point="10">
                    <label for="inputHo" class="error"></label>
                </div>
            </div>
            <div class="form-group">
                <label for="inputNgaysinh" class="col-sm-3 control-label">Ngày sinh<span
                        class="required_input">(*)</span> : </label>
                <div class="col-sm-9">
                    <input type='text' class="form-control required" id='inputNgaysinh' name="inputNgaysinh"
                           placeholder="01/02/1993"/>
                    <label for="inputNgaysinh" class="error"></label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Giới tính<span class="required_input">(*)</span> : </label>
                <div class="col-sm-9">
                    <div class="radio">
                        <label><input type="radio" name="inputGioitinh" id="inputGioitinhNam" value="0" checked
                                      point="5">Nam</label>
                        <label><input type="radio" name="inputGioitinh" id="inputGioitinhNu" value="1"
                                      point="5">Nữ</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="inputDiachi" class="col-sm-3 control-label">Địa chỉ<span class="required_input">(*)</span> :
                </label>
                <div class="col-sm-9">
                    <!--<div class="col-sm-4">
                        <select id="inputDiachi" name="select" class="form-control">
                            <option value="0">Chọn tỉnh thành</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <select id="inputDiachiHuyen" name="select" class="form-control">
                            <option value="0">Chọn huyện</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <select id="inputDiachiXa" name="select" class="form-control">
                            <option value="0">Chọn xã</option>
                        </select>
                    </div>-->
                    <input type="text" class="form-control required" id="inputDiachi"
                           placeholder="32 Duy Tân, Cầu Giấy, Hà Nội" name="inputDiachi" point="10">
                </div>
            </div>
            <div class="form-group">
                <label for="inputSdt" class="col-sm-3 control-label">Số điện thoại<span
                        class="required_input">(*)</span> : </label>
                <div class="col-sm-9">
                    <input type="number" class="form-control required" id="inputSdt"
                           placeholder="0168493209" name="inputSdt" point="10">
                    <label for="inputSdt" class="error"></label>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-sm-3 control-label">Email<span class="required_input">(*)</span> :
                </label>
                <div class="col-sm-9">
                    <input type="email" class="form-control required" id="inputEmail"
                           placeholder="mediabridge@gmail.com" name="inputEmail" point="10">
                    <label for="inputEmail" class="error"></label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Ảnh CV<span class="required_input">(*)</span> : </label>
                <div class="col-sm-9">
                    <input type='file' id="fileToUpload" name="fileToUpload"/>
                    <label for="fileToUpload" class="error"></label>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end div Thông tin cá nhân -->