<?php /* Template Name: cvregisters */
get_header();
/** PHPExcel_IOFactory */
require_once './wp-content/themes/cvcard/lib/PHPExcel/Classes/PHPExcel/IOFactory.php';

function stripVN($str)
{
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);

    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    return $str;
}

if (isset($_POST['formSubmit'])) {

    //Xu ly luu file thong tin ung vien:
    //Khoi tao doi tuong doc ghi file excel
    $objReader = PHPExcel_IOFactory::createReader('Excel2007');
    //Load doi tuong file excel template
    $objPHPExcel = $objReader->load("./wp-content/themes/cvcard/cvtemplates/CVsystemtemplate.xlsx");

    // Khai bao doi tuong truy xuat db cua wordpress
    global $wpdb;
    $tendangnhap = isset($_POST['inputTenDangNhap']) ? trim($_POST['inputTenDangNhap'], ' ') : '';
    $matkhau = trim($_POST['inputMatKhau'], '');
    $hoten = isset($_POST['inputHo']) ? trim($_POST['inputHo'], '') : '';
    $ngaysinh = isset($_POST['inputNgaysinh']) ? trim($_POST['inputNgaysinh'], '') : '01/01/1990';
    $gioitinh = isset($_POST['inputGioitinh']) ? trim($_POST['inputGioitinh'], '') : '';
    $sodienthoai = isset($_POST['inputSdt']) ? trim($_POST['inputSdt'], '') : '';
    $email = isset($_POST['inputEmail']) ? trim($_POST['inputEmail'], '') : '';
    $lydo = isset($_POST['inputLyDo']) ? trim($_POST['inputLyDo'], '') : '';
    $diachi = isset($_POST['inputDiachi']) ? trim($_POST['inputDiachi'], '') : '';
    //Xu ly password
    //$wp_hasher = new PasswordHash(16, FALSE);
    $hashedPassword = wp_hash_password($matkhau);

    // Check password
    /*    $plain_password = 'mat_khau_tu_trang_login';
        if($wp_hasher->CheckPassword($plain_password, $password_hashed)) {
            echo "Trung MK";
        } else {
            echo "SAI";
        }*/

    // Xu ly anh:
    $target_dir = "./wp-content/uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        //echo "Tệp tin là một ảnh - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Tệp tin không phải là ảnh.";
        $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Xin lỗi, ảnh này đã tồn tại.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 1048576) {
        echo "Xin lỗi, ảnh có kích thước quá lớn.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Xin lỗi, Định dạng cho phép chỉ là:  JPG, JPEG, PNG & GIF.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Xin lỗi, ảnh của bạn chưa được upload.Vui lòng kiểm tra lại.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            //echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Insert vao trong clsd
    $table_name_thanhvien = $wpdb->prefix . "thong_tin_thanh_vien";
    $wpdb->insert(
        $table_name_thanhvien, //table
        // Xủ lý dữ liệu được post lên:
        array(
            'ten_dang_nhap' => $tendangnhap,
            'mat_khau' => $hashedPassword,
            'ho_ten' => $hoten,
            'ngay_sinh' => $ngaysinh,
            'gioi_tinh' => $gioitinh,
            'sdt' => $sodienthoai,
            'email' => $email,
            'dia_chi' => $diachi,
            'anh_the' => basename($_FILES["fileToUpload"]["name"]),
            'ly_do_den_nhat' => $lydo,
        ),
        array('%s', '%s') // format
    );
    // lấy last id
    $last_id = $wpdb->insert_id;

    //Check thong tin insert vao table gioi_thieu_ban_than
    $tinhcach = isset($_POST['inputTinhCach']) ? trim($_POST['inputTinhCach'], '') : '';
    $sothich = isset($_POST['inputSoThich']) ? trim($_POST['inputSoThich'], '') : '';
    $uocmo = isset($_POST['inputUocMo']) ? trim($_POST['inputUocMo'], '') : '';
    $khanang = isset($_POST['inputKhaNang']) ? trim($_POST['inputKhaNang'], '') : '';

    $table_name_gioi_thieu = $wpdb->prefix . 'gioi_thieu_ban_than';
    $wpdb->insert($table_name_gioi_thieu,
        array(
            'tinh_cach' => $tinhcach,
            'so_thich' => $sothich,
            'uoc_mo' => $uocmo,
            'kha_nang' => $khanang,
            'id_user' => $last_id
        ));

    //Check thong tin insert vao table trinh_do_hoc_van
    $truongtotnghiep = isset($_POST['inputTruong']) ? trim($_POST['inputTruong'], '') : '';
    $nganhtotnghiep = isset($_POST['inputNganh']) ? trim($_POST['inputNganh'], '') : '';
    $namtotnghiep = isset($_POST['inputNam']) ? trim($_POST['inputNam'], '') : '01/01/2010';

    $table_name_trinh_do = $wpdb->prefix . 'trinh_do_hoc_van';
    $wpdb->insert($table_name_trinh_do,
        array(
            'truong_tot_nghiep' => $truongtotnghiep,
            'chuyen_nganh_tot_nghiep' => $nganhtotnghiep,
            'nam_tot_nghiep' => $namtotnghiep,
            'id_user' => $last_id
        ));

    //Check thong tin insert vao table trinh do ngoai ngu
    $table_name_ngon_ngu_user = $wpdb->prefix . 'ngoai_ngu_user';
    if (isset($_POST['inputtienganh'])) {
        if (isset($_POST['inputToiec'])) {
            $chungchiToiec = $_POST['inputToiec'];
            $diemsoToiec = $_POST['inputToeflPoint'];
            $wpdb->insert($table_name_ngon_ngu_user,
                array(
                    'id_ngon_ngu' => $_POST['inputtienganh'],
                    'id_user' => $last_id,
                    'chung_chi' => $chungchiToiec,
                    'diem_so' => $diemsoToiec
                ));
        }
        if (isset($_POST['inputIelts'])) {
            $chungchiIelts = $_POST['inputIelts'];
            $diemsoIelts = $_POST['inputIeltsPoint'];
            $wpdb->insert($table_name_ngon_ngu_user,
                array(
                    'id_ngon_ngu' => $_POST['inputtienganh'],
                    'id_user' => $last_id,
                    'chung_chi' => $chungchiIelts,
                    'diem_so' => $diemsoIelts
                ));
        }
        if (isset($_POST['inputToeft'])) {
            $chungchiToeft = $_POST['inputToeft'];
            $diemsoToeft = $_POST['inputToeflPoint'];
            $wpdb->insert($table_name_ngon_ngu_user,
                array(
                    'id_ngon_ngu' => $_POST['inputtienganh'],
                    'id_user' => $last_id,
                    'chung_chi' => $chungchiToeft,
                    'diem_so' => $diemsoToeft
                ));
        }
        if (isset($_POST['inputCeft'])) {
            $chungchiCeft = $_POST['inputCeft'];
            $diemsoCeft = $_POST['inputCeftPoint'];
            $wpdb->insert($table_name_ngon_ngu_user,
                array(
                    'id_ngon_ngu' => $_POST['inputtienganh'],
                    'id_user' => $last_id,
                    'chung_chi' => $chungchiCeft,
                    'diem_so' => $diemsoCeft
                ));

        }
    }
    if (isset($_POST['inputtiengnhat'])) {
        $chungchiTiengnhat = $_POST['chungchiTiengNhat'];
        $diemsoTiengnhat = 0;
        $wpdb->insert($table_name_ngon_ngu_user,
            array(
                'id_ngon_ngu' => $_POST['inputtiengnhat'],
                'id_user' => $last_id,
                'chung_chi' => $chungchiTiengnhat,
                'diem_so' => $diemsoTiengnhat
            ));

    }
    if (isset($_POST['inputtiengtrung'])) {
        $chungchiTiengtrung = $_POST['chungchiTiengTrung'];
        $diemsoTiengtrung = 0;
        $wpdb->insert($table_name_ngon_ngu_user,
            array(
                'id_ngon_ngu' => $_POST['inputtiengtrung'],
                'id_user' => $last_id,
                'chung_chi' => $chungchiTiengtrung,
                'diem_so' => $diemsoTiengtrung
            ));

    }

    //Check để insert thong tin vào trong table: chuyen_mon_user
    //Duyet tat ca cac ky nang chuyen mon
    $table_name_ky_nang_chuyen_mon = $wpdb->prefix . 'ky_nang_chuyen_mon';
    $query_chuyen_mon = "SELECT chuyen_mon_ID FROM $table_name_ky_nang_chuyen_mon";
    $list_chuyenmon = $wpdb->get_results($query_chuyen_mon);
    foreach ($list_chuyenmon as $chuyenmon) {
        //duyet qua tat ca cac thang con cua ky nang chuyen mon xem thang nao duoc tich thi insert no vao bang
        $table_name_thoi_gian_kinh_nghiem = $wpdb->prefix . 'thoi_gian_kinh_nghiem';
        $query_thoi_gian_kinh_nghiem = "SELECT * FROM $table_name_thoi_gian_kinh_nghiem WHERE chuyen_mon_ID = $chuyenmon->chuyen_mon_ID";
        $list_kinhnghiem = $wpdb->get_results($query_thoi_gian_kinh_nghiem);
        foreach ($list_kinhnghiem as $kinhnghiem) {
            if (isset($_POST['kinhnghiem' . $kinhnghiem->thoi_gian_ID])) {
                //Insert vao table  chuyen mon user
                $table_name_chuyen_mon_user = $wpdb->prefix . 'chuyen_mon_user';
                $wpdb->insert($table_name_chuyen_mon_user,
                    array(
                        'id_chuyen_mon' => $kinhnghiem->thoi_gian_ID,
                        'id_user' => $last_id,
                        'thoi_gian_kinh_nghiem' => $_POST['thoigian' . $kinhnghiem->thoi_gian_ID],
                        'ten_chuyen_mon' => $kinhnghiem->ten_ngon_ngu_chuyen_mon,
                    ));
            }
        }
    }

    //Xử lý insert
    if (isset($_POST['total_kinh_nghiem'])) {
        $number_kinh_nghiem = (int)$_POST['total_kinh_nghiem'];
        $table_name_kinh_nghiem_lam_viec = $wpdb->prefix . 'kinh_nghiem_lam_viec';
        for ($i = 1; $i <= $number_kinh_nghiem; $i++) {
            if ($_POST['cong_ty_lam_viec_' . $i] != '') {
                $cong_ty_lam_viec = isset($_POST['cong_ty_lam_viec_' . $i]) ? trim($_POST['cong_ty_lam_viec_' . $i], '') : '';
                $vi_tri_lam_viec = isset($_POST['vi_tri_lam_viec_' . $i]) ? trim($_POST['vi_tri_lam_viec_' . $i], '') : '';
                $mo_ta_cong_viec = isset($_POST['mo_ta_cong_viec_' . $i]) ? trim($_POST['mo_ta_cong_viec_' . $i], '') : '';
                $timeBat_dau_lam_viec = isset($_POST['timeBat_dau_lam_viec_' . $i]) ? trim($_POST['timeBat_dau_lam_viec_' . $i], '') : '';
                $timeKet_thuc_lam_viec = isset($_POST['timeKet_thuc_lam_viec_' . $i]) ? trim($_POST['timeKet_thuc_lam_viec_' . $i], '') : '';
                $wpdb->insert($table_name_kinh_nghiem_lam_viec,
                    array(
                        'userId' => $last_id,
                        'noi_lam_viec' => $cong_ty_lam_viec,
                        'vi_tri_lam_viec' => $vi_tri_lam_viec,
                        'mo_ta_cong_viec' => $mo_ta_cong_viec,
                        'thoi_gian_bat_dau' => $timeBat_dau_lam_viec,
                        'thoi_gian_ket_thuc' => $timeKet_thuc_lam_viec
                    ));
            }
        }
    }
    if (isset($_POST['total_du_an'])) {
        $number_du_an = (int)$_POST['total_du_an'];
        $table_name_du_an_tham_gia = $wpdb->prefix . 'du_an_da_tham_gia';
        for ($i = 1; $i <= $number_du_an; $i++) {
            if ($_POST['inputTen_du_an_' . $i] != '') {
                $inputTen_du_an = isset($_POST['inputTen_du_an_' . $i]) ? trim($_POST['inputTen_du_an_' . $i], '') : '';
                $inputTom_tat_du_an = isset($_POST['inputTom_tat_du_an_' . $i]) ? trim($_POST['inputTom_tat_du_an_' . $i], '') : '';
                $inputTime_begin_du_an = isset($_POST['inputTime_begin_du_an_' . $i]) ? trim($_POST['inputTime_begin_du_an_' . $i], '') : '';
                $inputTime_end_du_an = isset($_POST['inputTime_end_du_an_' . $i]) ? trim($_POST['inputTime_end_du_an_' . $i], '') : '';
                $inputSo_nguoi_du_an = isset($_POST['inputSo_nguoi_du_an_' . $i]) ? trim($_POST['inputSo_nguoi_du_an_' . $i], '') : '';
                $inputChi_tiet_du_an = isset($_POST['inputChi_tiet_du_an_' . $i]) ? trim($_POST['inputChi_tiet_du_an_' . $i], '') : '';
                $inputVai_tro_trong_du_an = isset($_POST['inputVai_tro_trong_du_an_' . $i]) ? trim($_POST['inputVai_tro_trong_du_an_' . $i], '') : '';
                $inputCongviec_cuthe_du_an = isset($_POST['inputCongviec_cuthe_du_an_' . $i]) ? trim($_POST['inputCongviec_cuthe_du_an_' . $i], '') : '';
                $inputEnviroment_du_an = isset($_POST['inputEnviroment_du_an_' . $i]) ? trim($_POST['inputEnviroment_du_a_n' . $i], '') : '';
                $inputNgonngu_trong_du_an = isset($_POST['inputNgonngu_trong_du_an_' . $i]) ? trim($_POST['inputNgonngu_trong_du_an_' . $i], '') : '';
                $wpdb->insert($table_name_du_an_tham_gia,
                    array(
                        'userId' => $last_id,
                        'ten_du_an' => $inputTen_du_an,
                        'tom_tat_du_an' => $inputTom_tat_du_an,
                        'ngay_bat_dau' => $inputTime_begin_du_an,
                        'ngay_ket_thuc' => $inputTime_end_du_an,
                        'so_nguoi_trong_du_an' => $inputSo_nguoi_du_an,
                        'chi_tiet_du_an' => $inputChi_tiet_du_an,
                        'vai_tro_trong_du_an' => $inputVai_tro_trong_du_an,
                        'cong_viec_cu_the' => $inputCongviec_cuthe_du_an,
                        'moi_truong_phat_trien' => $inputEnviroment_du_an,
                        'ngon_ngu_su_dung' => $inputNgonngu_trong_du_an
                    ));
            }
        }
    }
    //Lay tam mot so thong tin de insert vao trong file excel
    //setActiveSheetIndex(0) ung voi sheet 1, chi so danh tu 0
    // Xu ly ten:
    $stripVNhoten = stripVN($hoten); // Xu ly ten thanh chu tieng viet khong dau
    $xuLyTen = explode(' ', $stripVNhoten);
    $firstname = $xuLyTen[0];
    unset($xuLyTen[0]);
    $lastname = implode(' ', $xuLyTen);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D3', date('d/m/Y'));
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D5', $firstname);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D7', $lastname);
    //Xu ly ngay sinh
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D13', $ngaysinh);
    //Xu ly gioi tinh:
    $gender = ($gioitinh == 0) ? 'Male' : 'Female';
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A15', $gender);
    //Xu ly dia chi:
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A17', $diachi);
    //Xu ly so dien thoai
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A19', $sodienthoai);
    //Xu ly email:
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A21', $email);
    //Xu ly trinh do hoc tap:
    $month = date("M", strtotime($namtotnghiep));
    $year = date("Y", strtotime($namtotnghiep));
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C31', $truongtotnghiep . '-' . $nganhtotnghiep);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B31', $month);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A31', $year);
    //Xu ly ly do den nhat:
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A73', $lydo);

    // Cau hinh va luu lai thong tin cua doi tuong
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('./wp-content/themes/cvcard/cvtemplates/information/' . str_replace(' ', '_', $stripVNhoten) . '.xlsx');

    // Gui mail
    $pathFile = './wp-content/themes/cvcard/cvtemplates/information/' . str_replace(' ', '_', $stripVNhoten) . '.xlsx';
    $attachments = array($pathFile);
    $headers = 'From: Duc Trung <anhtrungduc1993@gmail.com>' . "\r\n";
    wp_mail('ducnt.ts24@gmail.com', 'Thông tin ứng tuyển của ứng viên ' . $hoten, 'Thông tin ứng tuyển của ứng viên', $headers, $attachments);
}
?>
    <!-- BEGIN page-header -->
    <div class="page-header">
        <h1 class="text-center"><b>THÔNG TIN ĐĂNG KÝ</b></h1>
    </div>
    <!-- END page-header -->
    <div class="content">
        <form id="dang_ky_cv" class="form-horizontal" method="post" action="<?php echo get_site_url(); ?>/registers"
              enctype="multipart/form-data">
            <h3>Thông tin cá nhân</h3>
            <section>
                <?php
                get_template_part('cvtemplates/parts/content', 'registers');
                get_template_part('cvtemplates/parts/content', 'thong-tin-ca-nhan');
                ?>
            </section>

            <h3>Giới thiệu</h3>
            <section>
                <?php
                get_template_part('cvtemplates/parts/content', 'gioi-thieu-ban-than');
                get_template_part('cvtemplates/parts/content', 'trinh-do-hoc-van');
                get_template_part('cvtemplates/parts/content', 'ly-do-den-nhat');
                ?>

            </section>

            <h3>Kỹ năng</h3>
            <section>
                <?php get_template_part('cvtemplates/parts/content', 'ky-nang-chuyen-mon'); ?>
            </section>

            <h3>Kinh nghiệm</h3>
            <section>
                <?php
                get_template_part('cvtemplates/parts/content', 'kinh-nghiem-lam-viec');
                get_template_part('cvtemplates/parts/content', 'du-an-thuc-te');
                ?>
            </section>

        </form>
    </div>

    <!-- jQuery -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.validate.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/formValidation.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.steps.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/additional-methods.min.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/function.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/wanakana.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap-select.min.js"></script>

    <!--<script src="js/tinhthanh.js"></script>-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-datepicker3.css">

    <script>

        // Khi moi file cua web duoc load xong no se chay cai nay.
        $(document).ready(function () {
            $.validator.addMethod('filesize', function (value, element, param) {
                return this.optional(element) || (element.files[0].size <= param)
            });

            /* // Get danh sach thanh pho
             $.get("https://thongtindoanhnghiep.co/api/city", function (data, status) {
             //debugger
             var cityList = data.LtsItem;
             var $selectCity = $('#inputDiachi');
             $(cityList).each(function (index, o) {
             var string_data_tokens = convertVietnamese(o.Title);
             var $option = $("<option data-tokens = '" + string_data_tokens + "'/>").attr("value", o.ID).text(o.Title);
             $selectCity.append($option);
             });
             });
             // Get danh sach huyen cua 1 thanh pho
             $('#inputDiachi').change(function () {
             var cityID = $('#inputDiachi').val();
             var url = "https://thongtindoanhnghiep.co/api/city/" + cityID + "/district";
             $.get(url, function (data, status) {
             var districtsList = data;
             var $selectDistrict = $('#inputDiachiHuyen');
             $(districtsList).each(function (index, o) {
             var $option = $("<option/>").attr("value", o.ID).text(o.Title);
             $selectDistrict.append($option);
             });
             });
             });

             // Get danh sach xa cua 1 huyen
             $('#inputDiachiHuyen').change(function () {
             var districtID = $('#inputDiachiHuyen').val();
             var url = "https://thongtindoanhnghiep.co/api/district/" + districtID + "/ward";
             $.get(url, function (data, status) {
             var wardList = data;
             var $selectWard = $('#inputDiachiXa');
             $(wardList).each(function (index, o) {
             var $option = $("<option/>").attr("value", o.ID).text(o.Title);
             $selectWard.append($option);
             });
             });
             });

             // Ho ten
             var $_katakana_hoten = $("#inputHo");
             if ($_katakana_hoten.length > 0) {
             $_katakana_hoten.blur(function () {
             treatKatakana($(this));
             });
             }
             */
            //datetimepicker nam sinh.
            var date_input = $('input[name="inputNgaysinh"]');
            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'yyyy/mm/dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
            });
        });

        var form = $("#dang_ky_cv").show();
        form.steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            onStepChanging: function (event, currentIndex, newIndex) {
                // Allways allow previous action even if the current form is not valid!
                if (currentIndex > newIndex) {
                    return true;
                }
                // Needed in some cases if the user went back (clean up)
                if (currentIndex < newIndex) {
                    // To remove error styles
                    form.find(".body:eq(" + newIndex + ") label.error").remove();
                    form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
                }
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onFinishing: function (event, currentIndex) {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function (event, currentIndex) {
                var newInput = $("<input name='formSubmit' type='hidden' value=''>");
                $('input#fileToUpload').after(newInput);
                form.submit();
            },
        }).validate({
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            },
            rules: {
                // Thong tin ca nhan
                inputTenDangNhap: "required",
                inputMatKhau: {
                    required: true,
                    minlength: 1
                },
                inputMatKhauConfirm: {
                    required: true,
                    minlength: 1,
                    equalTo: "#inputMatKhau"
                },
                inputHo: "required",
                inputNgaysinh: "required",
                inputSdt: "required",
                inputEmail: {
                    required: true,
                    email: true
                },
                fileToUpload: {
                    required: true,
                    extension: "jpg|jpeg|png|gif",
                    filesize: 1048576
                },
                inputLyDo: "required",

                // Trinh do hoc van
                inputTruong: "required",
                inputNganh: "required",
                inputNam: "required",
            },
            messages: {
                // Thong tin ca nhan
                inputTenDangNhap: "Tên đăng nhập không được để trống.",
                inputMatKhau: {
                    required: "Mật khẩu không được để trống.",
                    minlength: "Mật khẩu phải dài hơn 8 ký tự"
                },
                inputMatKhauConfirm: {
                    required: "Xác nhận mật khẩu không được để trống.",
                    minlength: "Mật khẩu phải dài hơn 8 ký tự",
                    equalTo: "Mật khẩu không khớp",
                },
                inputHo: "Họ tên không được để trống.",
                inputNgaysinh: "Ngày sinh không được để trống",
                inputSdt: "Số điện thoại không được để trống",
                inputEmail: {
                    required: "Email không được để trống.",
                    email: "Định dạng email không đúng."
                },
                fileToUpload: {
                    required: "Ảnh đại diện không được để trống.",
                    extension: "Ảnh không đúng định dạng",
                    filesize: "Ảnh có kích thước lớn hơn 1MB. Xin chọn kích ảnh khác."
                },
                inputLyDo: "Lý do không được để trống",

                // Trinh do hoc van
                inputTruong: "Không được để trống.",
                inputNganh: "Không được để trống.",
                inputNam: "Không được để trống.",

            }
        });

        // Convert cac kieu chu romaji,katakana,haragana => katakana
        /*function treatKatakana(target) {
         var val = target.val();
         if (wanakana.isHiragana(val) == true || wanakana.isRomaji(val) == true) {
         target.val(wanakana.toKatakana(val));
         } else {
         if (wanakana.isKatakana(val) == true) {
         target.val(val);
         } else {
         target.val('');
         }
         }

         }*/

        // Convert tieng viet co dau thanh khong sau de search trong dropdowm nhanh hon
        function convertVietnamese(str) {
            str = str.toLowerCase();
            str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
            str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
            str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
            str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
            str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
            str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
            str = str.replace(/đ/g, "d");
            return str;
        }

        // Thanh ti le hoan thanh dang ky
        function checkProgress() {
            //debugger;
            $total_point = 0;
            if ($('#inputHo').val() != "") {
                $total_point += $('#inputHo').attr('point');
            }
            if ($('#inputDiachi').val() != "") {
                $total_point += $('#inputDiachi').attr('point');
            }
            if ($('#inputEmail').val() != "") {
                $total_point += $('#inputEmail').attr('point');
            }
            if ($('#inputQuequan').val() != "") {
                $total_point += $('#inputQuequan').attr('point');
            }
            if ($('#inputSdt').val() != "") {
                $total_point += $('#inputSdt').attr('point');
            }
            $("#progressBar").css({'width': $total_point + '%'});
            $("#progressBar").attr('aria-valuenow', $total_point);
            $('#ratePoint').val($total_point);
        }
    </script>
<?php get_footer(); ?>