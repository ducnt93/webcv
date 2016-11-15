<!-- begin div Kỹ năng chuyên môn -->
<div class="panel panel-primary">
    <div class="panel-heading" role="tab" id="headingFive">
        <h4 class="panel-title">
            <label>
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#chuyen_mon"
                   aria-expanded="true" aria-controls="chuyen_mon" style="color:white;">3.1.Kỹ năng chuyên môn</a>
            </label>
        </h4>
    </div>
    <div id="chuyen_mon" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFive">
        <div class="panel-body">
            <?php
            global $wpdb;
            $table_name = $wpdb->prefix . "ky_nang_chuyen_mon";
            $query = "SELECT * FROM $table_name";
            $rows = $wpdb->get_results($query);
            foreach ($rows as $row) { ?>
                <div class="form-group row">
                    <label class="col-sm-2 control-label"><?php echo $row->ten_chuyen_mon; ?></label>
                    <div class="col-sm-10">
                        <div class="row">
                            <?php
                            $table_name = $wpdb->prefix . "thoi_gian_kinh_nghiem";
                            $sub_query = "SELECT * FROM $table_name WHERE chuyen_mon_ID = $row->chuyen_mon_ID";
                            $list = $wpdb->get_results($sub_query);
                            foreach ($list as $item) { ?>
                                <label class="col-sm-3" data-toggle="collapse"
                                       data-target="#collapse<?php echo $item->thoi_gian_ID; ?>"
                                       aria-expanded="false"
                                       aria-controls="collapse<?php echo $item->thoi_gian_ID; ?>"
                                       style="padding-left:5px;">
                                    <input type="checkbox" name="kinhnghiem<?php echo $item->thoi_gian_ID; ?>"
                                           id="kinhnghiem<?php echo $item->thoi_gian_ID; ?>"/> <?php echo $item->ten_ngon_ngu_chuyen_mon; ?>
                                </label>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <?php foreach ($list as $item) { ?>
                                <div id="collapse<?php echo $item->thoi_gian_ID; ?>" aria-expanded="false"
                                     class="collapse">
                                    <div class="well">
                                        <div class="form-group">
                                            <label for="">Thời gian kinh nghiệm
                                                với <?php echo $item->ten_ngon_ngu_chuyen_mon; ?></label>
                                            <select class="form-control"
                                                    id="thoigian<?php echo $item->thoi_gian_ID; ?>"
                                                    name="thoigian<?php echo $item->thoi_gian_ID; ?>">
                                                <option value="0">Chọn</option>
                                                <option value="Chưa có kinh nghiệm">Chưa có kinh nghiệm</option>
                                                <option value="01 - 03 tháng">01 - 03 tháng</option>
                                                <option value="03 - 06 tháng">03 - 06 tháng</option>
                                                <option value="06 - 09 tháng">06 - 09 tháng</option>
                                                <option value="09 - 12 tháng">09 - 12 tháng</option>
                                                <option value="12 - 15 tháng">12 - 15 tháng</option>
                                                <option value="15 - 18 tháng">15 - 18 tháng</option>
                                                <option value="18 - 21 tháng">18 - 21 tháng</option>
                                                <option value="21 - 24 tháng">21 - 24 tháng</option>
                                                <option value="Trên 24 tháng">Trên 24 tháng</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- end div Kỹ năng chuyên môn -->