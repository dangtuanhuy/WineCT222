<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("WineCountryController.php");

$name= "";
$details ="";

if (isset($_POST["btnAdd"]))
{
  $name = $_POST["txtName"];
  $details = $_POST["txtDetails"];

  addCountry($name, $details);
  echo '<script> alert("Added successful!");</script>';
  echo "<script>window.location.href='./admin/wine/country/'</script>";
}

if(isset($_POST['btnSend']))
{
	$file = $_FILES['file']['tmp_name'];
	$objReader = PHPExcel_IOFactory::createReaderForFile($file);
	$objReader->setLoadSheetsOnly('Country');
	$objExcel = $objReader->load($file);
	$sheetData = $objExcel->getActiveSheet()->toArray('null',true,true,true);
	// print_r($sheetData);
	$HighestRows = $objExcel->setActiveSheetIndex()->getHighestRow();
	//echo $HighestRows;
	for ($row=2; $row<=$HighestRows ; $row++) { 
		# code...

		$name=$sheetData[$row]['A'];
		$Net=$sheetData[$row]['B'];
		
		$sqlinsert = "INSERT INTO `country`(`CountryName`, `CountryDetails`) VALUES('$name','$Net')";
		mysql_query($sqlinsert);
		
  }
  echo "<script>window.location.href='./admin/wine/country/'</script>";
}
?>

<script language="javascript">
  function Check()
  {
    var Huy = "";
    if(document.getElementById('txtName').value == "")
      Huy += "Category Name can not null";

    if(document.getElementById('txtDetails').value == "")
      Huy += "\nCategory Details can not null";
    if(Huy == "")
      return true;
    else
    {
      alert(Huy);
      return false;
    }
  }
</script>



<div class="row">
  <div class="col-md-12"/>
  <form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" form-horizontal>
    <div class="form_group">
      <label class="control-label col-sm-12" for="email"><h2>COUNTRY</h2></label>
    </div>
    <div class="form-group">

     <label class="control-label col-sm-2" for="pwd">Import File:</label>
     <div class="col-sm-offset-2 col-sm-10">
       <input type="file" name="file" class="btn btn-default" placeholder="Chọn file import">
       <button  class="btn btn-danger" type="submit" name="btnSend" value="ImPort">Import</button>

     </div>
   </div>
 </form>
 <form class="form-horizontal" action="" method="post" accept-charset="utf-8">


  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Country:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="txtName" placeholder="Enter Name" name="txtName">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Description:</label>
    <div class="col-sm-10">          
      <input type="text" class="form-control" id="txtDetails" placeholder="Enter information details" name="txtDetails">
    </div>
  </div>

  <div class="form-group">        
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-info" name="btnAdd" onclick="return Check()">Add Country</button>
      <button type="reset" class="btn btn-dark">Reset</button>
    </div>
  </div>
</form>


</div>
</div>

