<?php /* Template Name: exceltest */
# Load slim WP
//require('./wp-load.php');

/** PHPExcel_IOFactory */
require_once './wp-content/themes/cvcard/lib/PHPExcel/Classes/PHPExcel/IOFactory.php';

$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load("./wp-content/themes/cvcard/cvtemplates/CVsystemtemplate.xlsx");

$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A73', 'dsaidaskdsahdkjsahdkjsahj');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('./wp-content/themes/cvcard/cvtemplates/asd.xlsx');
