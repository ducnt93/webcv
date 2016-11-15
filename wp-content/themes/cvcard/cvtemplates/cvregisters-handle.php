<?php /* Template Name: Xử lý đăng ký */
get_header();
/*if (isset($_POST['themthanhvien'])) {
    global $wpdb;
    $table_name = $wpdb->prefix . "thong_tin_thanh_vien";
    $wpdb->insert(
        $table_name, //table
        array(
            'ten_dang_nhap' => $_POST['inputTenDangNhap'],
            'mat_khau' => $_POST['inputMatKhau'],
            'ho_ten' => $_POST['inputHo'],
        ),
        array('%s', '%s') // format
    );
    //wp_mail( 'ducnt.ts24@gmail.com', 'The subject', 'The message' );
}*/
global $wpdb;
$table_name = $wpdb->prefix . "thong_tin_thanh_vien";
$rows = $wpdb->get_results("SELECT * FROM $table_name");
foreach ($rows as $row) {
    echo $row->ho_ten . '<br>';
}
get_footer();