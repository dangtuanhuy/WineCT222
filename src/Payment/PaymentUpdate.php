<?php
include(ROOT_PATH."/library/connect.php");
include("PaymentController.php");
  
$id = 0;
  
if (isset($_GET['id']))
  $id = $_GET['id'];

$name= "";

  
$result = searchPaymentMethods($id);

if(isset($result))
{
  list($id, $name) = mysql_fetch_array($result);
}

if(isset($_POST["btnUpdate"]))
{
  $name = $_POST["txtName"];
  
  updatePaymentMethods($id, $name);  
  echo '<script> alert("Update successful!");</script>';
  echo "<script>window.location.href='./admin/payment/'</script>";
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

  <div class="container">
    <form class="form-horizontal" action="" method="post">
     <div class="form_group">
            <label class="control-label col-sm-12" for="email"><h2>Payment Method</h2></label>
            </div>
    <form class="form-horizontal" action="" method="post">
      <div class="form-group">
        <label class="control-label col-sm-2" for="name">ID:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="txtID"  name="txtID"  value="<?php echo $id;?>" readonly="readonly">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="name">Payment Method:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="txtName" placeholder="Enter Name" name="txtName"                    value="<?php echo $name;?>">
        </div>
      </div>
      

      <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-info" name="btnUpdate" onclick="return Check()">Update Payment Method</button>
        </div>
      </div>
    </form>
  </div>
