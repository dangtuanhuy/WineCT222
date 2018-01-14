<?php
include(ROOT_PATH."/library/connect.php");
include("PaymentController.php");

$name= "";
$details ="";
if(isset($_POST["btnAdd"]))
{
	$name = $_POST["txtName"];	
	addPaymentMethods($name, $details);	
	echo '<script> alert("Added successful!");</script>';
	echo "<script>window.location.href='./admin/payment/'</script>";

}
?>

<script language="javascript">
	function Check()
	{
		var err = "";
		if(document.getElementById('txtName').value == "")
			err += "Category Name can not null";
		
		if(document.getElementById('txtDetails').value == "")
			err += "\nCategory Details can not null";
		if(err == "")
			return true;
		else
		{
			alert(err);
			return false;
		}
	}
</script>

<div class="row">
<div class="col-md-12"/>
		
		<form class="form-horizontal" action="" method="post">
        	
            <div class="form_group">
            <label class="control-label col-sm-12" for="email"><h2>Payment Methods</h2></label>
            </div>
		<form class="form-horizontal" action="" method="post">
			<div class="form-group">
				<label class="control-label col-sm-2" for="email">Payment Methods:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="txtName" placeholder="Enter Name" name="txtName">
				</div>
			</div>
			

			<div class="form-group">        
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-info" name="btnAdd" onclick="return Check()">Add Payment Methods</button>
					<button type="reset" class="btn btn-dark">Reset</button>
				</div>
			</div>
		</form>
	</div>
</div>