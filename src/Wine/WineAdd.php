<?php
include(ROOT_PATH."/library/connect.php");
include("WineController.php");

$name = "";
$strength = "";
$price = "";
$shortdetails = "";
$details = "";
$updatedate = date_default_timezone_set('Asia/Ho_Chi_Minh');
$winequantity = "";
$listCategory="";
$listPublisher="";
$listCountry="";
$listPromotion="";

if (isset($_POST["btnAdd"]))
{
    $name = $_POST["txtName"];
    $strength = $_POST["txtStrength"];
    $price = $_POST["txtPrice"];
    $shortdetails = $_POST["txtshortDetails"];;
    $details = $_POST["txtDetails"];
    $updatedate = date("Y-m-d");
    $winequantity = $_POST["txtQuantity"];
    $listCategory=$_POST["slcategory"];
    $listPublisher=$_POST["slpublisher"];
    $listCountry=$_POST["slcountry"];
    if (isset($_POST["slpromotion"]))
        $listPromotion = $_POST["slpromotion"];
    else
        $listPromotion;

    addWine($name, $strength, $price, $shortdetails, $details, 
        $updatedate, $winequantity, $listCategory, $listPublisher, $listCountry, $listPromotion);
    echo '<script> alert("Added successful!");</script>';
    echo "<script>window.location.href='./admin/wine/'</script>";

}

if(isset($_POST['btnSend']))
{
    $file = $_FILES['file']['tmp_name'];
    $objReader = PHPExcel_IOFactory::createReaderForFile($file);
    $objReader->setLoadSheetsOnly('Wine');
    $objExcel = $objReader->load($file);
    $sheetData = $objExcel->getActiveSheet()->toArray('null',true,true,true);
    // print_r($sheetData);
    $HighestRows = $objExcel->setActiveSheetIndex()->getHighestRow();
    //echo $HighestRows;
    for ($row=2; $row<=$HighestRows ; $row++) { 
        # code...

        $name=$sheetData[$row]['A'];
        $Net=$sheetData[$row]['B'];
        $price=$sheetData[$row]['C'];
        $Details=$sheetData[$row]['D'];
        $Description=$sheetData[$row]['E'];
        $Date=$sheetData[$row]['F'];
        $quantities=$sheetData[$row]['G'];
        $sold=$sheetData[$row]['H'];
        $cat=$sheetData[$row]['I'];
        $pub=$sheetData[$row]['J'];
        $coun=$sheetData[$row]['K'];
        $promo=$sheetData[$row]['L'];
        
        $sqlinsert = 
        "INSERT INTO 
        `wine`(`WineName`, `WineStrength`, `WinePrice`, 
        `WineShortDetails`, `WineDetails`, 
        `WineUpdateDate`, `WineQuantity`, `WineSold`, 
        `CategoryId`, `PublisherId`, `CountryId`, `PromotionId`) 
        VALUES 
        ('$name','$Net','$price',
        '$Details','$Description',
        '$Date',$quantities,$sold,
        $cat,$pub,$coun,$promo)";
        mysql_query($sqlinsert);
        
    }
    echo "<script>window.location.href='./admin/wine/'</script>";
}
?>
<script language="javascript">
function Check()
{
var err = "";
var Days = document.getElementById("slcategory").value;
var Pub = document.getElementById("slpublisher").value;
var Cou = document.getElementById("slcountry").value;
var Pro = document.getElementById("slpromotion").value;
if(document.getElementById('txtName').value == "")
  err += "Wine Name can not null";
if(document.getElementById('txtStrength').value == "")
  err += "\nStrength can not null";
if(document.getElementById('txtPrice').value == "")
  err += "\nPrice can not null";
if(document.getElementById('txtOld').value == "")
  err += "\nOld Price can not null";


if(document.getElementById('txtQuantity').value == "")
  err += "\nQuantity can not null";
if(document.getElementById('datepicker').value == "")
  err += "\nDate can not null";
if(Days==0)
err += "\nPlease choice Category";
if(Cou==0)
  err += "\nPlease choice Country";
if(Pub==0)
  err += "\nPlease choice Publisher";
if(Pro==0)
    err += "\nPlease choice Promotion";
if(err == "")
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
          <label class="control-label col-sm-12" for="email"><h2 class="text-center">ADD WINE</h2></label>
        </div>
        <div class="form-group">

        <label class="control-label col-sm-2" for="pwd">Import File:</label>
        <div class="col-sm-offset-2 col-sm-10">
         <input type="file" name="file" class="btn btn-warning" placeholder="Chose file to import">
         <button  class="btn btn-info" type="submit" name="btnSend" value="ImPort">Import</button>
         <a href="./admin/wine/export/template" class="btn btn-success">Export Input Template</a>
     </div>
 </div>
</form>

<form class="form-horizontal" action="" method="post">
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">Name:(*)</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="txtName" placeholder="Enter Name" name="txtName">
        </div>
    </div>
    <div class="form-group">   
        <label for="" class="col-sm-2 control-label">Category(*):  </label>
        <div class="col-sm-10">
            <?php 
            bindCategoryList();
            ?>
        </div>
    </div>
    <div class="form-group">   
        <label for="" class="col-sm-2 control-label">Publisher(*):  </label>
        <div class="col-sm-10">
            <?php 
            bindPublisherList();
            ?>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Strength:(*)</label>
        <div class="col-sm-10">          
            <input type="text" class="form-control" id="txtStrength" placeholder="Enter information strength" name="txtStrength">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Price:(*)</label>
        <div class="col-sm-10">          
            <input type="text" class="form-control" id="txtPrice" placeholder="Enter information Price" name="txtPrice">
        </div>
    </div>
    <div class="form-group">   
        <label for="" class="col-sm-2 control-label">Country(*):  </label>
        <div class="col-sm-10">
            <?php 
            bindCountryList();
            ?>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Short Details:(*)</label>
        <div class="col-sm-10">          
            <textarea type="text" class="form-control Editor_" 
            name="txtshortDetails" id="txtshortDetails1"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Details:(*)</label>
        <div class="col-sm-10">          
            <textarea class="form-control Editor_"
            name="txtDetails" id="txtshortDetails2"></textarea>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Quantity:(*)</label>
        <div class="col-sm-10">          
            <input type="number" class="form-control" id="txtQuantity" placeholder="Enter information Quantity" name="txtQuantity">
        </div>
    </div>
    <div class="form-group">   
        <label for="" class="col-sm-2 control-label">Promotion(*):  </label>
        <div class="col-sm-10">
            <?php 
            bindPromotitonList();
            ?>
        </div>
    </div>
    <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info" name="btnAdd" onclick="return Check()" >Add Wine</button>
            <button type="reset" class="btn btn-dark">Reset</button>
        </div>
    </div>
</form>
</div>
