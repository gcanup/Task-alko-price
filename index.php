<?php
include 'functions.php';

require_once dirname(__FILE__) . '/PHPExcel-1.8/Classes/PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

$excelFile = "alko.xls";

if (file_exists($excelFile)) {
    //echo "$excelFile was last modified: " . date ("F d Y H:i:s.", filemtime($excelFile));
    $modifiedDate = filemtime($excelFile);
    $today = time(); 

    $day_diff = ($today - $modifiedDate) / (3600 * 24);
    
    //If the day is 1 or greater download the fie again
    if($day_diff >= 1) {
        downloadExcelFile();
    }

} else {
    downloadExcelFile();
}


$objReader = PHPExcel_IOFactory::createReader('Excel2007');

$objReader->setReadDataOnly(true);

$objPHPExcel = $objReader->load("alko.xls");

exit();



$objWorksheet = $objPHPExcel->getActiveSheet();
$highestRow = $objWorksheet->getHighestRow();
$highestColumn = $objWorksheet->getHighestColumn();
$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
$rows = array();


for ($row = 1; $row <= $highestRow; ++$row) {
    for ($col = 0; $col <= $highestColumnIndex; ++$col) {
        $rows[$col] = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();

        echo $rows[$col];
    }
    //Insert into database table
}


?>