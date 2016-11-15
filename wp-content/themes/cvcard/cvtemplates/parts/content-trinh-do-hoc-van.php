<!-- begin div Trình độ học vấn -->
<div class="panel panel-primary">
    <div class="panel-heading" role="tab" id="headingFour">
        <h4 class="panel-title">
            <label>
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                   href="#trinh_do_hoc_van" aria-expanded="true" aria-controls="trinh_do_hoc_van" style="color:white;">2.2.Trình
                    độ học vấn</a>
            </label>
        </h4>
    </div>
    <div id="trinh_do_hoc_van" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-3 control-label" for="inputTruong">Tốt nghiệp trường<span class="required_input">(*)</span>
                    :</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control required" id="inputTruong" name="inputTruong"/>
                    <label for="inputTruong" class="error"></label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="inputNganh">Ngành<span class="required_input">(*)</span> :
                </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control required" id="inputNganh" name="inputNganh"/>
                    <label for="inputNganh" class="error"></label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="inputNam">Năm tốt nghiệp<span
                        class="required_input">(*)</span> : </label>
                <div class="col-sm-9">
                    <input type="date" class="form-control required" id="inputNam" name="inputNam"/>
                    <label for="inputNam" class="error"></label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Ngoại ngữ : </label>
                <div class="col-sm-9">
                    <?php
                    global $wpdb;
                    $table_name = $wpdb->prefix . "ngon_ngu";
                    $query = "SELECT * FROM $table_name";
                    $rows = $wpdb->get_results($query);
                    foreach ($rows as $row) { ?>
                        <label data-toggle="collapse" data-target="#collapse<?php echo $row->id; ?>"
                               aria-expanded="false"
                               aria-controls="collapse<?php echo $row->id; ?>" style="padding-left:5px;">
                            <input type="checkbox" name="input<?php echo $row->slug; ?>"
                                   id="input<?php echo $row->slug; ?>" value="<?php echo $row->id; ?>"/> <?php echo $row->ngon_ngu; ?>
                        </label>
                        <?php
                        if ($row->ngon_ngu == 'Tiếng Anh') { ?>
                            <div id="collapse<?php echo $row->id; ?>" aria-expanded="false" class="collapse">
                                <div class="well">
                                    <label data-toggle="collapse" data-target="#collapseToiec" aria-expanded="false"
                                           aria-controls="collapseToiec" style="padding-left:5px;">
                                        <input type="checkbox" name="inputToiec" id="inputToiec" value="TOIEC"/> TOIEC
                                    </label>
                                    <div id="collapseToiec" aria-expanded="false" class="collapse">
                                        <label for="inputToiecPoint">Chứng chỉ TOIEC</label>
                                        <select class="form-control" id="inputToiecPoint" name="inputToiecPoint"
                                                style="margin-bottom: 10px;">
                                            <option value="0">Chọn</option>
                                            <option value="450">450</option>
                                            <option value="500">500</option>
                                            <option value="550">550</option>
                                            <option value="600">600</option>
                                            <option value="650">650</option>
                                            <option value="700">700</option>
                                            <option value="750">750</option>
                                            <option value="800">800</option>
                                            <option value="850">850</option>
                                            <option value="900">900</option>
                                        </select>
                                    </div>
                                    <label data-toggle="collapse" data-target="#collapseIelts" aria-expanded="false"
                                           aria-controls="collapseIelts" style="padding-left:5px;">
                                        <input type="checkbox" value="IELTS" name="inputIelts" id="inputIelts"/> IELTS
                                    </label>
                                    <div id="collapseIelts" aria-expanded="false" class="collapse">
                                        <label for="inputIeltsPoint">Chứng chỉ IELTS</label>
                                        <select class="form-control" id="inputIeltsPoint" name="inputIeltsPoint"
                                                style="margin-bottom: 10px;">
                                            <option value="0">Chọn</option>
                                            <option value="5.0">5.0</option>
                                            <option value="5.5">5.5</option>
                                            <option value="6.0">6.0</option>
                                            <option value="6.5">6.5</option>
                                            <option value="7.0">7.0</option>
                                            <option value="7.5">7.5</option>
                                            <option value="8.0">8.0</option>
                                            <option value="8.5">8.5</option>
                                            <option value="9.0">9.0</option>
                                        </select>
                                    </div>
                                    <label data-toggle="collapse" data-target="#collapseToefl" aria-expanded="false"
                                           aria-controls="collapseToefl" style="padding-left:5px;">
                                        <input type="checkbox" name="inputToeft" id="inputToeft" value="TOEFT"/> TOEFL
                                    </label>
                                    <div id="collapseToefl" aria-expanded="false" class="collapse">
                                        <label for="inputToeflPoint">Chứng chỉ TOEFL iBT</label>
                                        <select class="form-control" id="inputToeflPoint" name="inputToeflPoint"
                                                style="margin-bottom: 10px;">
                                            <option value="32 - 34">32 - 34</option>
                                            <option value="35 - 45">35 - 45</option>
                                            <option value="46 - 59">46 - 59</option>
                                            <option value="60 - 78">60 - 78</option>
                                            <option value="79 - 93">79 - 93</option>
                                            <option value="94 - 101">94 - 101</option>
                                            <option value="102 - 109">102 - 109</option>
                                            <option value="110 - 114">110 - 114</option>
                                            <option value="115 - 117">115 - 117</option>
                                            <option value="118 - 120">118 - 120</option>
                                        </select>
                                        <div class="clearfix"></div>
                                    </div>
                                    <label data-toggle="collapse" data-target="#collapseCefr" aria-expanded="false"
                                           aria-controls="collapseCefr" style="padding-left:5px;">
                                        <input type="checkbox" name="inputCeft" id="inputCeft" value="Chuẩn Châu Âu"/>
                                        Chuẩn Châu Âu
                                    </label>
                                    <div id="collapseCefr" aria-expanded="false" class="collapse">
                                        <label for="inputCeftPoint">CEFR</label>
                                        <select class="form-control" id="inputCeftPoint" name="inputCeftPoint"
                                                style="margin-bottom: 10px;">
                                            <option value="0">Chọn</option>
                                            <option value="A1">A1</option>
                                            <option value="A2">A2</option>
                                            <option value="B1">B1</option>
                                            <option value="B2">B2</option>
                                            <option value="C1">C1</option>
                                            <option value="C2">C2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <?php }
                        if ($row->ngon_ngu == 'Tiếng Nhật') { ?>
                            <div id="collapse<?php echo $row->id; ?>" aria-expanded="false" class="collapse">
                                <div class="well">
                                    <div class="col-sm-4">
                                        <div class="radio">
                                            <label><input type="radio" name="chungchiTiengNhat" value="N1"/> N1 </label><br>
                                            <label><input type="radio" name="chungchiTiengNhat" value="N2"/> N2</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="radio">
                                            <label><input type="radio" name="chungchiTiengNhat" value="N3"/>
                                                N3</label><br>
                                            <label><input type="radio" name="chungchiTiengNhat" value="N5"/> N4</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="radio">
                                            <label><input type="radio" name="chungchiTiengNhat" value="N5"/> N5</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding-top: 5px;">
                                        <div class="col-sm-3">
                                            Khác:
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" id="inputChungChiTN" name="inputChungChiTN"/>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        <?php }
                        if ($row->ngon_ngu == 'Tiếng Trung') { ?>
                            <div id="collapse<?php echo $row->id; ?>" aria-expanded="false" class="collapse">
                                <div class="well">
                                    <div class="col-sm-4">
                                        <div class="radio">
                                            <label><input type="radio" name="chungchiTiengTrung" value="HSK1"/> HSK1
                                            </label><br>
                                            <label><input type="radio" name="chungchiTiengTrung" value="HSK2"/>
                                                HSK2</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="radio">
                                            <label><input type="radio" name="chungchiTiengTrung" value="HSK3"/>
                                                HSK3</label> <br>
                                            <label><input type="radio" name="chungchiTiengTrung" value="HSK4"/>
                                                HSK4</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="radio">
                                            <label><input type="radio" name="chungchiTiengTrung" value="HSK5"/>
                                                HSK5</label> <br>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding-top: 5px;">
                                        <div class="col-sm-3">
                                            Khác:
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="inputChungChiTT"
                                                   id="inputChungChiTT"/>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        <?php }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end div Trình độ học vấn -->