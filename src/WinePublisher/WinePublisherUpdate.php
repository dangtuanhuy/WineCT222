 <?php

include("WinePublisherController.php");
  
  $id = 0;
  
  if(isset($_GET['id']))
    $id = $_GET['id'];
  $name= "";
  $details="";
  
  $result = searchPublistsher($id);
  if(isset($result))
  {
    list($id, $name, $details) = mysql_fetch_array($result);
  }
  
  if(isset($_POST["btnUpdate"]))
  {
    $name = $_POST["txtName"];
    $details = $_POST["txtDetails"];
    
    updatePublisher($id, $name, $details);
    echo '<script> alert("Update successful!");</script>';
    echo "<script>window.location.href='./admin/wine/publisher/'</script>";
  }
  ?>
  <script language="javascript">
   function Check()
   {
    var warning = "";
    if(document.getElementById('txtName').value == "")
     warning += "Category Name can not null";
   
   if(document.getElementById('txtDetails').value == "")
     warning += "\nCategory Details can not null";
   if(warning == "")
     return true;
   else
   {
     alert(warning);
     return false;
   }
 }
</script>

  <div class="container">
    
    <form class="form-horizontal" action="" method="post">
     <div class="form_group">
            <label class="control-label col-sm-12" for="email"><h2>Pulisher</h2></label>
            </div>
      <div class="form-group">
      <div class="form-group">
        <label class="control-label col-sm-2" for="name">ID:</label>
        <div class="col-sm-10">
          <input type="" class="form-control" id="txtID"  name="txtID"  value="<?php echo $id;?>" readonly="readonly">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="name">Publisher:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="txtName" placeholder="Enter Name" name="txtName"                    value="<?php echo $name;?>">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="details">Details:</label>
        <div class="col-sm-10">          
          <input type="text" class="form-control" id="txtDetails" placeholder="Enter information details" name="txtDetails"  value="<?php echo $details;?>">
        </div>
      </div>

      <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-info" name="btnUpdate" onclick="return Check()">Update Publisher</button>
        </div>
      </div>
    </form>
  </div>
