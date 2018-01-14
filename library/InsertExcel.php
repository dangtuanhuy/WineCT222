<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php 
define(ROOT_PATH, dirname(dirname(__DIR__)));
include(ROOT_PATH."/library/connect.php");
require(ROOT_PATH.'/library/PHPExcel.php');

?>
<?php

if(isset($_POST['btnGui']))
{
	$file = $_FILES['file']['tmp_name'];
	$objReader = PHPExcel_IOFactory::createReaderForFile($file);
	$objReader->setLoadSheetsOnly('Country');
	$objExcel = $objReader->load($file);
	$sheetData = $objExcel->getActiveSheet()->toArray('null',true,true,true);
	// print_r($sheetData);
	$HighestRows = $objExcel->setActiveSheetIndex()->getHighestRow();
	echo $HighestRows;
	for ($row=2; $row<=$HighestRows ; $row++) { 
		# code...
	
		$name=$sheetData[$row]['A'];
		$Net=$sheetData[$row]['B'];
		
		$sqlinsert = "INSERT INTO `country`(`CountryName`, `CountryDetails`) VALUES('$name','$Net')";
		mysql_query($sqlinsert);
		
 	}
	echo 'HaiDuoi';
 }
?>
<body>
 <form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" form-horizontal>
    <div class="form-group">
     <div class="col-sm-offset-2 col-sm-10">
       <label class="control-label col-sm-2" for="pwd">Import File:</label>
       <input type="file" name="file" class="btn btn-default" placeholder="Chọn file import">
       <button  class="btn btn-info" type="submit" name="btnGui" value="ImPort">Import</button>

     </div>
   </div>
 </form>
</body>
</html>