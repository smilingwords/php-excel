<?php

error_reporting(E_ALL);
set_time_limit(0);

date_default_timezone_set('Europe/London');

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>PHPExcel Reader Example #12</title>

</head>
<body>

<h1>PHPExcel Reader Example #12</h1>
<h2>Reading a Workbook in "Chunks" Using a Configurable Read Filter (Version 2)</h2>
<?php

/**  Set Include path to point at the PHPExcel Classes folder  **/
set_include_path(get_include_path() . PATH_SEPARATOR . '../../../Classes/');

/**  Include PHPExcel_IOFactory  **/
include 'PHPExcel/IOFactory.php';


$inputFileType = 'Excel5';
//    $inputFileType = 'Excel2007';
//    $inputFileType = 'Excel2003XML';
//    $inputFileType = 'OOCalc';
//    $inputFileType = 'Gnumeric';
$inputFileName = './sampleData/example2.xls';


/**  Define a Read Filter class implementing PHPExcel_Reader_IReadFilter  */
class chunkReadFilter implements PHPExcel_Reader_IReadFilter
{
    private $_startRow = 0;

    private $_endRow = 0;

    /**  Set the list of rows that we want to read  */
    public function setRows($startRow, $chunkSize) {
        $this->_startRow    = $startRow;
        $this->_endRow        = $startRow + $chunkSize;
    }

    public function readCell($column, $row, $worksheetName = '') {
        //  Only read the heading row, and the rows that are configured in $this->_startRow and $this->_endRow
        if (($row == 1) || ($row >= $this->_startRow && $row < $this->_endRow)) {
            return true;
        }
        return false;
    }
}


echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory with a defined reader type of ',$inputFileType,'<br />';
/**  Create a new Reader of the type defined in $inputFileType  **/
$objReader = PHPExcel_IOFactory::createReader($inputFileType);


echo '<hr />';


/**  Define how many rows we want to read for each "chunk"  **/
$chunkSize = 20;
/**  Create a new Instance of our Read Filter  **/
$chunkFilter = new chunkReadFilter();

/**  Tell the Reader that we want to use the Read Filter that we've Instantiated  **/
$objReader->setReadFilter($chunkFilter);

/**  Loop to read our worksheet in "chunk size" blocks  **/
for ($startRow = 2; $startRow <= 240; $startRow += $chunkSize) {
    echo 'Loading WorkSheet using configurable filter for headings row 1 and for rows ',$startRow,' to ',($startRow+$chunkSize-1),'<br />';
    /**  Tell the Read Filter, the limits on which rows we want to read this iteration  **/
    $chunkFilter->setRows($startRow,$chunkSize);
    /**  Load only the rows that match our filter from $inputFileName to a PHPExcel Object  **/
    $objPHPExcel = $objReader->load($inputFileName);

    //    Do some processing here

    $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
    var_dump($sheetData);
    echo '<br /><br />';
}


?>
<body>
</html>
