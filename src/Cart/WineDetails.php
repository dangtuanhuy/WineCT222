<!-- <style>
#CarouseiWineDetails .item {padding-left: 0; }
.carousel-inner > .item > img{ width:auto; height:300px; }
</style> -->


<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
if(isset($_GET["id"]))
{
    //Lay ma san pham
    $id = $_GET["id"];
    //Get Wine Details
    $wine = mysql_query("
    SELECT wine.WineId, WineName, WinePrice, WineUpdateDate, WineQuantity, 
           WineShortDetails, WineDetails, category.CategoryName, publisher.PublisherId,
           publisher.PublisherName, country.CountryName, promotion.PromotionDiscount,
           (SELECT imgwine.imgwine FROM imgwine 
            WHERE imgwine.WineId = wine.WineId limit 0,1) as imgwine
    FROM wine 
    JOIN category on wine.CategoryId = category.CategoryId
    JOIN publisher on wine.PublisherId = publisher.PublisherId
    JOIN country on wine.CountryId = country.CountryId 
    JOIN promotion on wine.PromotionId = promotion.PromotionId WHERE WineId=".$id
    ) or die(mysql_error());
    
    while ($row = mysql_fetch_array($wine, MYSQL_ASSOC)) {
        $name = $row['WineName'];
        $cat = $row['CategoryName'];
        $publisher = $row['PublisherId'];
        $publisher_name = $row['PublisherName'];
        $coun = $row['CountryName'];
        $price = $row['WinePrice'];
        $discount = $row['PromotionDiscount'];
        $sold_price = $discount > 0 ? ($price * (100 - $discount) / 100) : $price;
        $details_short = $row['WineShortDetails'];
        $details = $row['WineDetails'];
        $quantity = $row['WineQuantity'];
        $up_date = date_create($row['WineUpdateDate']);
    }
    
    // Get Image, check if wine has no image
    $no_image = false;
    $image_active_query = "SELECT ImgWine FROM imgwine WHERE WineId=".$id;
    $images_query = "SELECT * FROM imgwine WHERE WineId=".$id;
    $result = mysql_query($image_active_query) or die(mysql_error());

    if (mysql_numrows($result) == 0) {
       $no_image = true;
       $image_active = "no-image.png";
    } 
    else {
       $row = mysql_fetch_array($result);
       $image_active = $row[0];
       $images = mysql_query($images_query);
    }    
    
    if(isset($_POST['txtOrder']))
    {
      if(is_numeric($_POST['txtOrder']))
      {
         $wine_in_stock = mysql_query("SELECT WineQuantity FROM wine WHERE WineId = ".$id);
         $wine_quantity = mysql_fetch_row($wine_in_stock);
         if($wine_quantity[0] >= $_POST['txtOrder'])
         {
            $added = false;
            foreach ($_SESSION["cart"] as $key => $row) 
            {
                if($key==$id)
                {
                    $_SESSION['cart'][$key]["quantity"] +=  $_POST['txtOrder'];
                    $added = true;
                }
            }
            if (!$added)
            {            
              $order = array(
                "id" => $id,
                "name" => $name,
                "price" => $price,
                "sold_price" => $sold_price,
                "quantity" => $_POST['txtOrder'],
                "publisher" => $publisher,        
                "publisher_name" => $publisher_name,
              );

              $_SESSION['cart'][$id] = $order;
            }
             echo "<script language='javascript'>
             alert('The product has been added to your shopping cart, go to your cart to view!!'); 
             window.location=window.location; 
             </script>";
        }
        else
        {
          echo "<script>alert('Order number is no valid.');</script>";
        }
      }
    }
}


?>

<div class="container">
  <div class="row">
    <ol class="breadcrumb" style="font-size: 17px;">
      <li><a href="./">AppWine</a></li>
      <?php 
      // Get cat id
      $sql = "SELECT CategoryId FROM wine WHERE WineId = '$id'";
      $result = mysql_query($sql);
      $catid = mysql_fetch_object($result);
      ?>
      <li><a href="./wine/cat/<?= $catid->CategoryId ?>"><?php echo $cat;?></a></li>
      <li class="active"><?php echo $name;?></a></li>
    </ol>
  </div>

  <div class="row" id='body'>
    <div class="col-sm-5">
      <div class="col-sm-1">
      </div>
      <div class="col-sm-11">
      <?php
      if (!$no_image) 
      {
      ?>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
        <?php
        while ($image = mysql_fetch_array($images, MYSQL_ASSOC)) 
        { 
          if ($image['ImgWine'] == $image_active) {
        ?>
          <div class="item active">
            <img class="first-slide" src="public/images/products/<?php echo $image['ImgWine']; ?>" alt="Wine">
          </div>
        <?php
          }
          else {
        ?>        
          <div class="item">
            <img class="center-block" src="public/images/products/<?php echo $image['ImgWine']; ?>" alt="Wine">
          </div>
        <?php
          }
        }
        ?>
        </div>
      </div>   
      <?php
      } else {   
      ?>
      <img class="center-block" src="public/images/products/<?php echo $image_active; ?>" alt="Wine">
      <?php 
      }
      ?>
    </div>
    </div>

    <div class="col-sm-7">
      <h2 class="text-primary"><?php echo $name; ?></h2>
      <hr>
      <div class="row">
        <div class="col-sm-6">
          <!-- Display Price on Wine Details -->
          <?php
          if ($discount == 0) { // If wine has NOT any promotion applied on it 
          ?>
          <p>
            <span class="text-danger lead">
              </i><strong>$ <?php echo number_format($price, 0, ',', '.'); ?></strong>
            </span> 
          </p>
          <?php
          }
          else {
          ?>
          <p>
            <span class="text-danger lead">
              <strong>$ <?php echo number_format($price * (100 - $discount)/100, 0, ',', '.'); ?>
              <span class="label label-success">- <?php echo $discount; ?>%</span>
              </strong>          
            </span>
          </p>
          <p>
            <span>Original price: $ <?php echo number_format($price, 0, ',', '.'); ?></span>
          </p>
          <?php
          }
          ?>
        </div>
        <div class="col-sm-3">
          <p>
            <span><strong>Publisher</strong>: <?php echo $publisher_name; ?></span>
          </p> 
          <p>
            <span><strong>Country</strong>: <?php echo $coun; ?></span> 
          </p> 
          <p>
            <span><strong>Update</strong>: <?php echo date_format($up_date, "d/m/Y") ?></span>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-9"><hr></div>
      </div>
      <div class="row">
        <?php 
        $check_quantity = mysql_result(mysql_query("SELECT WineQuantity FROM wine WHERE WineId=".$id), 0);
        if ($check_quantity > 0) 
        {
        ?>
        <form class="form-horizontal" name="frmOrder" id="frmOrder" method="post" action="">
          <div class="form-group">
            <label for="wine-quantity" class="col-sm-2 control-label">Quantity</label>
            <div class="col-sm-3">
              <div class="input-group bootstrap-touchspin">
                <input id="wine-quantity" class="form-control text-center" name="txtOrder" value="1"/>         
              </div>
            </div>
            <div class="col-sm-4">
              <input class="btn btn-danger btn-block" type="submit" name="btnOrder" id="btnOrder" value="Add to Cart">
            </div>
          </div>          
        </form>
        <?php
        } else {
        ?>
        <p><span class="text-danger lead">This products is sold out </span></p>
        <?php
        }
        ?>
      </div>
      <div class="row">
        <div class="col-sm-9"><hr></div>
      </div>        
      <p> <?php echo $details_short; ?> </p>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-sm-10">
      <p> <?php echo $details; ?> </p>
    </div>
  </div>
</div>
<script src="public/js/jquery/jquery.min.js"></script>
<script src="public/css/bootstrap-touchspin/src/jquery.bootstrap-touchspin.js"></script>
<script> $("input[id='wine-quantity']").TouchSpin({min: 1, max: 100, step: 1, boostat: 5, maxboostedstep: 10, }); </script>