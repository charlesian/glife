<?php
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
require_once 'library/PHPExcel/Classes/PHPExcel/IOFactory.php';
$objPHPExcel = PHPExcel_IOFactory::load("library/qwe.xlsx");
$styleTop = array(
  'borders' => array(
    'top' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
  ),
);

$styleLeft = array(
  'borders' => array(
    'left' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
  ),
);

$styleRight = array(
  'borders' => array(
    'right' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM)
  ),
);

$stylebottom = array(
  'borders' => array(
    'bottom' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM)
  ),
);

$objPHPExcel->setActiveSheetIndex()->setCellValue('B9','asd');
// $objPHPExcel->setActiveSheetIndex()->setCellValue('D10',$mont);
// $objPHPExcel->setActiveSheetIndex()->setCellValue('H10',$year);

// $row = 12;

// while($excelrow = mysqli_fetch_assoc($sql_items) ){

//   $id = $excelrow["EMP_N"];
//   $FIRST_M = $excelrow["FIRST_M"];  
//   $MIDDLE_M = $excelrow["MIDDLE_M"];  
//   $LAST_M = $excelrow["LAST_M"];
//   $DIVISION_M = $excelrow["DIVISION_M"];
//   $POSITION_M = $excelrow["POSITION_M"];
//   $DESIGNATION_M = $excelrow["DESIGNATION_M"];
//   $MOBILEPHONE = $excelrow["MOBILEPHONE"];
//   $ALTER_EMAIL = $excelrow["ALTER_EMAIL"];
//   $EMAIL = $excelrow["EMAIL"];
//   $BIRTH_D = $excelrow["BIRTH_D"];
//   $BIRTH = date('F d',strtotime($BIRTH_D));

//   $objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$row,$FIRST_M);
//   $objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$row,$MIDDLE_M);
//   $objPHPExcel->setActiveSheetIndex()->setCellValue('C'.$row,$LAST_M);
//   $objPHPExcel->setActiveSheetIndex()->setCellValue('D'.$row,$DIVISION_M);
//   $objPHPExcel->setActiveSheetIndex()->setCellValue('E'.$row,$POSITION_M);
//   $objPHPExcel->setActiveSheetIndex()->setCellValue('F'.$row,$DESIGNATION_M);
//   $objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$row,$MOBILEPHONE);
//   $objPHPExcel->setActiveSheetIndex()->setCellValue('H'.$row,$EMAIL);
//   $objPHPExcel->setActiveSheetIndex()->setCellValue('I'.$row,$MOBILEPHONE);
//   $objPHPExcel->setActiveSheetIndex()->setCellValue('J'.$row,$ALTER_EMAIL);
//   $objPHPExcel->setActiveSheetIndex()->setCellValue('K'.$row,$BIRTH);

//   $objPHPExcel->getActiveSheet()->getRowDimension($row)->setRowHeight(-1);
//   $row++;
// }


$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
header('location: qwe.xlsx');

?>