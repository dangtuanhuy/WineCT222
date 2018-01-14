<?php
include(ROOT_PATH."/library/connect.php");
include("PromotionController.php");

$name = "";
$content = "";
$dateActive = date_default_timezone_set('Asia/Tokyo');
$dateClose = date_default_timezone_set('Asia/Tokyo');
$discount = 0;

if (isset($_POST["btnAdd"]))
{
    $name = $_POST["txtName"];
    $content = $_POST["txtContent"];
    $discount = $_POST["txtDiscount"];
    $dateActive = date('Y-m-d',  strtotime($_POST['dateActive']));
    $dateClose = date('Y-m-d',  strtotime($_POST['dateClose']));
    $Open = isset($_POST['btnOn']) ? 1 : 0;
    
    addPromotion($name, $content, $discount, $dateActive, $dateClose, $Open);  
    echo '<script> alert("Added successful!");</script>';  
    echo "<script>window.location.href='./admin/promotion/'</script>";
}
?>

<div class="row">
<div class="col-md-12"/>
		
		<form class="form-horizontal" action="" method="post">
        	
            <div class="form_group">
            <label class="control-label col-sm-12" for="email"><h2>Promotion</h2></label>
            </div>
        <form class="form-horizontal" action="" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtName" placeholder="Enter Name" name="txtName">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="details">Content:</label>
                <div class="col-sm-10">  
                    <textarea type="text" class="Editor_" rows="4"
                              name="txtContent"><?php echo $content;?>
                    </textarea>          
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Discount (0% - 100%):</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="txtDiscount" placeholder="Enter Name" name="txtDiscount" value="0" min="0" max="100">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Active Date:</label>
                <div class="col-sm-10">          
                    <input type="text" class="form-control" id="datepicker"
                           placeholder="Enter information details" name="dateActive">
                </div>
            </div>
             <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Close Date:</label>
                <div class="col-sm-10">          
                    <input type="text" class="form-control" id="datepicker1"
                           placeholder="Enter information details" name="dateClose">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Active:</label>
                <span class="col-sm-10">
                    <input type="checkbox" name="btnOn" value="1" checked />
                </span>
            </div>
            <div class="form-group">        
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-info" name="btnAdd" 
                            onclick="return Check()">Add Promotion</button>
                    <button type="reset" class="btn btn-dark">Reset</button>
                </div>
            </div>
        </form>
    </div>


