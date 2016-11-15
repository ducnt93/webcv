//Hiện ảnh CV ngay trên trình duyệt
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#avatar1').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#inputAnh").change(function () {
    readURL(this);
});

//Thêm, xóa kinh nghiệm làm việc
$(function () {
    //debugger
    var i = $('#addremoveKinh_nghiem_lam_viec li').size() + 1;
    $('a#addKinh_nghiem_lam_viec').click(function () {
        $('<li id="du_an_'+i+'">' +
            '<br/>' +
            '<div class="well">'+
                    '<div class="form-group">' +
                        '<label class="col-sm-3" for="cong_ty_lam_viec_'+i+'">Nơi làm việc: </label>' +
                        '<div class="col-sm-9">'+
                            '<input type="text" class="form-control" id="cong_ty_lam_viec_'+i+'" name="cong_ty_lam_viec_'+i+'" placeholder="Công ty D" />' +
                        '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                        '<label class="col-sm-3" for="vi_tri_lam_viec_'+i+'">Vị trí làm việc: </label>' +
                        '<div class="col-sm-9">'+
                            '<input type="text" class="form-control" id="vi_tri_lam_viec_'+i+'" name="vi_tri_lam_viec_'+i+'" placeholder="Quản trị và bảo mật hệ thống" />' +
                        '</div>'+
                    '</div>' +
                    '<div class="form-group">' +
                        '<label class="col-sm-3" for="mo_ta_cong_viec_'+i+'">Mô tả công việc: </label>' +
                        '<div class="col-sm-9">'+
                            '<textarea row="5" class="form-control" id="mo_ta_cong_viec_'+i+'" name="mo_ta_cong_viec_'+i+'" placeholder="Vận hành, quản trị mô-đun bảo mật cho hệ thống mạng doanh nghiệp"></textarea>' +
                        '</div>'+
                    '</div>' +
                    '<div class="form-group">' +
                        '<label class="col-sm-3" for="timeBat_dau_lam_viec_'+i+'">Thời gian bắt đầu: </label>' +
                        '<div class="col-sm-9">'+
                            '<input type="month" class="form-control" id="timeBat_dau_lam_viec_'+i+'" name="timeBat_dau_lam_viec_'+i+'" />' +
                        '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                        '<label class="col-sm-3" for="timeKet_thuc_lam_viec_'+i+'">Thời gian kết thúc: </label>' +
                        '<div class="col-sm-9">'+
                            '<input type="month" class="form-control" id="timeKet_thuc_lam_viec_'+i+'" name="timeKet_thuc_lam_viec_'+i+'" />' +
                        '</div>' +
                    '</div>' +
                    '<div class="clearfix"></div>' +
            '</div>' +
            '</li>').appendTo('ol#addremoveKinh_nghiem_lam_viec');
        i++;
        var i1 = $('#addremoveKinh_nghiem_lam_viec li').size();
        $('#total_kinh_nghiem').val(i1);
    });
    $('a#removeKinh_nghiem_lam_viec').click(function () {
        $('#addremoveKinh_nghiem_lam_viec li:last').remove();
        i--;
    });
})

//Thêm, xóa dự án thực tế
$(function () {
    var i = $('#addremoveDu_an_thuc_te li').size() + 1;
    $('a#addDu_an_thuc_te').click(function () {
        $('<li id="kinh_nghiem_'+i+'" >' +
            '<br/>' +
            '<div class="well">' +
                '<form class="form-horizontal">' +
                    '<div class="form-group">' +
                        '<label for="inputTen_du_an_'+i+'" class="col-sm-3 control-label">Tên dự án</label>' +
                        '<div class="col-sm-9">' +
                            '<input type="text" class="form-control" id="inputTen_du_an_'+i+'" name="inputTen_du_an_'+i+'" point="">' +
                        '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                        '<label for="inputTom_tat_du_an_'+i+'" class="col-sm-3 control-label">Tóm tắt dự án</label>' +
                        '<div class="col-sm-9">' +
                            '<input type="text" class="form-control" id="inputTom_tat_du_an_'+i+'" name="inputTom_tat_du_an_'+i+'" point="">' +
                        '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                        '<label for="inputTime_begin_du_an_'+i+'" class="col-sm-3 control-label">Ngày bắt đầu dự án</label>' +
                        '<div class="col-sm-9">' +
                            '<input type="date" class="form-control" id="inputTime_begin_du_an_'+i+'" name="inputTime_begin_du_an_'+i+'" point="">' +
                        '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                        '<label for="inputTime_end_du_an_'+i+'" class="col-sm-3 control-label">Ngày kết thúc dự án</label>' +
                        '<div class="col-sm-9">' +
                            '<input type="date" class="form-control" id="inputTime_end_du_an_'+i+'" name="inputTime_end_du_an_'+i+'" point="">' +
                        '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                        '<label for="inputSo_nguoi_du_an_'+i+'" class="col-sm-3 control-label">Số người tham gia dự án</label>' +
                        '<div class="col-sm-9">' +
                            '<input type="text" class="form-control" id="inputSo_nguoi_du_an_'+i+'" name="inputSo_nguoi_du_an_'+i+'" point="">' +
                        '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                        '<label for="inputChi_tiet_du_an_'+i+'" class="col-sm-3 control-label">Mô tả chi tiết về dự án</label>' +
                        '<div class="col-sm-9">' +
                            '<textarea row="5" class="form-control" id="inputChi_tiet_du_an_'+i+'" name="inputChi_tiet_du_an_'+i+'" point="">' +
                            '</textarea>' +
                        '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                        '<label for="inputVai_tro_trong_du_an_'+i+'" class="col-sm-3 control-label">Vai trò trong dự án</label>' +
                        '<div class="col-sm-9">' +
                            '<textarea row="5" class="form-control" id="inputVai_tro_trong_du_an_'+i+'" name="inputVai_tro_trong_du_an_'+i+'" point="">' +
                            '</textarea>' +
                        '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                        '<label for="inputCongviec_cuthe_du_an_'+i+'" class="col-sm-3 control-label">Công việc cụ thể</label>' +
                        '<div class="col-sm-9">' +
                            '<textarea row="5" class="form-control" id="inputCongviec_cuthe_du_an_'+i+'" name="inputCongviec_cuthe_du_an_'+i+'" point="">' +
                            '</textarea>' +
                        '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                        '<label for="inputEnviroment_du_an_'+i+'" class="col-sm-3 control-label">Môi trường phát triển</label>' +
                        '<div class="col-sm-9">' +
                            '<input type="text" class="form-control" id="inputEnviroment_du_an_'+i+'" name="inputEnviroment_du_an_'+i+'" point="">' +
                        '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                        '<label for="inputNgonngu_trong_du_an_'+i+'" class="col-sm-3 control-label">Ngôn ngữ được sử dụng</label>' +
                        '<div class="col-sm-9">' +
                            '<input type="text" class="form-control" id="inputNgonngu_trong_du_an_'+i+'" name="inputNgonngu_trong_du_an_'+i+'" point="">' +
                        '</div>' +
                    '</div>' +
                '</form>' +
            '</div>' +
        '</li>').appendTo('ol#addremoveDu_an_thuc_te');
        i++;
        var i2 = $('#addremoveDu_an_thuc_te li').size();
        $('#total_du_an').val(i2);
    });
    $('a#removeDu_an_thuc_te').click(function () {
        $('#addremoveDu_an_thuc_te li:last').remove();
        i--;
    });
})

