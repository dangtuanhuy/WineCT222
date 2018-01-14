<?php
include(ROOT_PATH."/library/connect.php");
include("WineController.php");
$id = 0;

if (isset($_GET['id']))
    $id = $_GET['id'];

$name="";
$strength ="";
$price ="";
$shortdetails ="";
$details ="";
$updatedate = date_default_timezone_set('Asia/Ho_Chi_Minh');
$winequantity = "";
$idCat = "";
$idPub = "";
$idCountry = "";
$idPromo = "";
$result = searchWine($id);

if (isset($result))
{
    list ($id, $name, $strength, $price, $shortdetails, $details, 
          $updatedate, $winequantity, $idCat, $idPub, 
          $idCountry, $idPromo) = mysql_fetch_array($result);
}

if (isset($_POST["btnUpdate"]))
{

    $name = $_POST["txtName"];
    $strength = $_POST["txtStrength"];
    $price = $_POST["txtPrice"];
    $shortdetails = $_POST["txtShortDetails"];
    $details = $_POST["txtDetails"];
    $updatedate = date('Y-m-d',  strtotime($_POST['txtDate']));;
    $winequantity = $_POST["txtQuantity"];
    $idCat = $_POST["slcategory"];
    $idPub = $_POST["slpublisher"];
    $idCountry = $_POST["slcountry"];
    $idPromo = $_POST["slpromotion"];

    updateWine ($id, $name, $strength, $price, $shortdetails, 
                $details, $updatedate, $winequantity, $idCat, 
                $idPub, $idCountry, $idPromo);
    echo '<script> alert("Update successful!");</script>';
    echo "<script>window.location.href='./admin/wine/'</script>";
}
?>

<div class="row">
  <div class="col-md-12"/>

  <form class="form-horizontal" action="" method="post">

    <div class="form_group">
      <label class="control-label col-sm-12" for="email"><h2>Wine</h2></label>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">ID:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="txtID"  name="txtID"  
               value="<?= $id;?>" readonly="readonly">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="txtName">Name:(*)</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" id="txtName" 
                 placeholder="Enter Name" name="txtName" value="<?= $name;?>">
      </div>
    </div>
    <div class="form-group">   
      <label for="" class="col-sm-2 control-label">Category(*):  </label>
      <div class="col-sm-10">
        <?php 
        bindUpdateCategoryList($idCat); 
        ?>
      </div>
    </div>
    <div class="form-group">   
      <label for="" class="col-sm-2 control-label">Publisher(*):  </label>
      <div class="col-sm-10">
        <?php 
        bindUpdatePublisherList($idPub);
        ?>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Strength:(*)</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="txtStrength" placeholder="Enter information strength" name="txtStrength" value="<?= $strength;?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Price:(*)</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="txtPrice" placeholder="Enter information Price" value="<?= $price;?>" name="txtPrice">
      </div>
    </div>
    <div class="form-group">   
      <label for="" class="col-sm-2 control-label">Country(*):  </label>
      <div class="col-sm-10">
        <?php 
        bindUpdateCountryList($idCountry);
        ?>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Short Detail:(*)</label>
      <div class="col-sm-10">          
        <textarea type="text" class="form-control Editor_" id="txtShortDetails" placeholder="Enter information Details" name="txtShortDetails" value="<?= $shortdetails;?>"></textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Description:(*)</label>
      <div class="col-sm-10">          
        <textarea class="form-control Editor_" name="txtDetails"><?= $details;?></textarea>
  
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Date:(*)</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="datepicker" 
               placeholder="Enter information details" name="txtDate" 
               value="<?= $updatedate;?>">              
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Quantity:(*)</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="txtQuantity" placeholder="Enter information Quantity" name="txtQuantity" value="<?= $winequantity;?>">
      </div>
    </div>
    <div class="form-group">   
      <label for="" class="col-sm-2 control-label">Promotion(*):  </label>
      <div class="col-sm-10">
        <?php 
        bindUpdatePromitionList($idPromo);
        ?>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-info" name="btnUpdate" >Update Wine</button>
        <button type="reset" class="btn btn-dark">Reset</button>
      </div>
    </div>
  </form>
</div>
