<?php
include("PromotionController.php");

$id = 0;

if (isset($_GET['id']))
    $id = $_GET['id'];

$name = "";
$content = "";
$dateActive = date_default_timezone_set('Asia/Tokyo');
$dateClose = date_default_timezone_set('Asia/Tokyo');
$Open = 1;
$discount = 0;

$result = searchPromotion($id);
if (isset($result))
{
    list($id, $name, $content, $dateActive, $dateClose, $Open, $discount) = mysql_fetch_array($result);
}

if (isset($_POST["btnUpdate"]))
{
    $name = $_POST["txtName"];
    $content = $_POST["txtContent"];
    $dateActive = date('Y-m-d',  strtotime($_POST['dateActive']));
    $dateClose = date('Y-m-d',  strtotime($_POST['dateClose']));
    $Open = isset($_POST['btnOn']) && $_POST['btnOn']  ? "1" : "0";
    // $Open = isset($_POST['btnOn']) ? 1 : 0;

    updatePromotion($id, $name, $content, $dateActive, $dateClose, $Open, $discount);
    echo '<script> alert("Update successful!");</script>';
    echo "<script>window.location.href='./admin/promotion/'</script>";
}
?>


  <div class="container">
    <form class="form-horizontal" action="" method="post">
      <div class="form_group">
        <label class="control-label col-sm-12" for="email"><h2>Promotion Update</h2></label>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="name">ID:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="txtID"  name="txtID"  value="<?php echo $id;?>" readonly="readonly">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="name">Promotion:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="txtName" 
                 placeholder="Enter Name" name="txtName" value="<?php echo $name;?>">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="details">Content:</label>
        <div class="col-sm-10">  
          <textarea type="text" class="Editor_" rows="4" name="txtContent"><?php echo $content; ?></textarea>
        </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-2" for="email">Discount (0% - 100%):</label>
          <div class="col-sm-10">
              <input type="number" class="form-control" id="txtDiscount" placeholder="<?= $discount?>" name="txtDiscount" value="<?= $discount?>" min="0" max="100">
          </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Active Date:</label>
        <div class="col-sm-10">          
            <input type="text" class="form-control tinymce" id="datepicker"
                   name="dateActive" value="<?php echo $dateActive;?>">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Close Date:</label>
        <div class="col-sm-10"> 
          <input type="text" class="form-control" id="datepicker1"
                 name="dateClose" value="<?php echo $dateClose;?>"> 
        </div>              
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Active:</label>
        <span class="col-sm-10">
          <input data-toggle="toggle"  type="checkbox" name="btnOn" 
                 data-on="Active" data-off="Deactive"
                 <?php echo ($Open) ? "checked" : ""; ?> />
        </span>
      </div>
      <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-info" name="btnUpdate" 
                  onclick="return Check()">Update Promotion
          </button>
        </div>
      </div>
    </form>
  </div>
