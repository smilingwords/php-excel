<?php

error_reporting(E_ALL);
set_time_limit(0);

date_default_timezone_set('Europe/London');

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>PHPExcel Reader Example #03</title>

</head>
<body>

<h1>PHPExcel Reader Example #03</h1>
<h2>Simple File Reader using the PHPExcel_IOFactory to Return a Reader</h2>
<?php

/** Include path **/
set_include_path(get_include_path() . PATH_SEPARATOR . '../../../Classes/');

/** PHPExcel_IOFactory */
include 'PHPExcel/IOFactory.php';


$inputFileType = 'Excel5';
//    $inputFileType = 'Excel2007';
//    $inputFileType = 'Excel2003XML';
//    $inputFileType = 'OOCalc';
//    $inputFileType = 'SYLK';
//    $inputFileType = 'Gnumeric';
//    $inputFileType = 'CSV';
$inputFileName = './sampleData/example1.xls';

echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory with a defined reader type of ',$inputFileType,'<br />';
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($inputFileName);


echo '<hr />';

$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
var_dump($sheetData);


?>
<body>
</html>
