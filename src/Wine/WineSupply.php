 <?php

include("WineController.php");
  
  $id = 0;
  
if(isset($_GET['id']))
  $id = $_GET['id'];

$name= "";
$quantity="";
  
$sqlSelect = "SELECT `WineName`, `WineQuantity` FROM `wine` WHERE `WineId`= ".$id;
  
$result = mysql_query($sqlSelect);
  if(isset($result))
  {
    list($name, $quantity) = mysql_fetch_array($result);
  }
  
  if(isset($_POST["btnUpdate"]))
  {
    $quantity = $_POST["numQuantity"];
    
    $sqlUpdate = 
    "UPDATE `wine` SET `WineQuantity`= `WineQuantity` + '$quantity' WHERE `WineId`= '$id'";
    
    mysql_query($sqlUpdate);
    $message = "Supplied";
    echo "<script type='text/javascript'>alert('$message');</script>";    
    echo "<script>window.location.href='./admin/'</script>";
  }
  ?>

  <div class="container">
    
    <form class="form-horizontal" action="" method="post">
     <div class="form_group">
            <label class="control-label col-sm-12" for="email"><h2>Supply Wine</h2></label>
            </div>
      <div class="form-group">
      <div class="form-group">
        <label class="control-label col-sm-2" for="name">Name:</label>
        <div class="col-sm-10">
          <input type="" class="form-control" id="txtID"  name="txtID"  value="<?php echo  $name;?>" readonly="readonly">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="details">Quantity:</label>
        <div class="col-sm-10">          
          <input type="number" class="form-control" id="numQuantity" name="numQuantity"  value="<?php echo $quantity;?>">
        </div>
      </div>

      <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-info" name="btnUpdate">Supply</button>
        </div>
      </div>
    </form>
  </div>