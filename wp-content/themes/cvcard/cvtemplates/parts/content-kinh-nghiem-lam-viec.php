<!-- begin div Kinh nghiệm làm việc -->
<div class="panel panel-primary">
    <div class="panel-heading" role="tab" id="headingSix">
        <h4 class="panel-title">
            <label>
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                   href="#kinh_nghiem_lam_viec" aria-expanded="true" aria-controls="kinh_nghiem_lam_viec"
                   style="color:white;">4.1.Kinh nghiệm làm việc</a>
            </label>
        </h4>
    </div>
    <div id="kinh_nghiem_lam_viec" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSix">
        <div class="panel-body">
            <ol id="addremoveKinh_nghiem_lam_viec">
                <?php for ($i = 1; $i <= 3; $i++) { ?>
                    <li id="kinh_nghiem_<?php echo $i; ?>">
                        <br/>
                        <div class="well">
                            <div class="form-group">
                                <label for="cong_ty_lam_viec_<?php echo $i; ?>" class="col-sm-3 control-label">Nơi làm
                                    việc : </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="cong_ty_lam_viec_<?php echo $i; ?>"
                                           name="cong_ty_lam_viec_<?php echo $i; ?>"
                                           placeholder="Công ty A"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="vi_tri_lam_viec_<?php echo $i; ?>" class="col-sm-3 control-label">Vị trí làm
                                    việc : </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="vi_tri_lam_viec_<?php echo $i; ?>"
                                           name="vi_tri_lam_viec_<?php echo $i; ?>"
                                           placeholder="Thực tập sinh"/>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="mo_ta_cong_viec_<?php echo $i; ?>" class="col-sm-3 control-label">Mô tả công
                                    việc : </label>
                                <div class="col-sm-9">
                                    <textarea row="5" class="form-control" id="mo_ta_cong_viec_<?php echo $i; ?>"
                                              name="mo_ta_cong_viec_<?php echo $i; ?>"
                                              placeholder="Training về jQuery và Bootstrap..."></textarea>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="timeBat_dau_lam_viec_<?php echo $i; ?>" class="col-sm-3 control-label">Thời
                                    gian bắt đầu
                                    : </label>
                                <div class="col-sm-9">
                                    <input type="month" class="form-control" id="timeBat_dau_lam_viec_<?php echo $i; ?>"
                                           name="timeBat_dau_lam_viec_<?php echo $i; ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="timeKet_thuc_lam_viec_<?php echo $i; ?>" class="col-sm-3 control-label">Thời
                                    gian kết thúc
                                    : </label>
                                <div class="col-sm-9">
                                    <input type="month" class="form-control"
                                           id="timeKet_thuc_lam_viec_<?php echo $i; ?>"
                                           name="timeKet_thuc_lam_viec_<?php echo $i; ?>"/>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </li>
                <?php } ?>

            </ol>
            <input type="hidden" name="total_kinh_nghiem" id="total_kinh_nghiem" value="3">
            <!--<nav aria-label="...">
                <ul class="pager">
                    <li><a id="addKinh_nghiem_lam_viec" href="#">Thêm</a></li>
                    <li><a id="removeKinh_nghiem_lam_viec" href="#">Bớt</a></li>
                </ul>
                <input type="hidden" name="total_kinh_nghiem" id="total_kinh_nghiem">
            </nav>-->
        </div>
    </div>
</div>
<!-- end div Kinh nghiệm làm việc -->