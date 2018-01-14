<div class="maincontent-area">
  <form class="form-horizontal" method="get" action="./search/">
    <div class="form-group">
      <label class="control-label col-sm-2" for="text">Search:</label>
      <div class="col-sm-8">
        <div class="input-group">
          <input type="text" class="form-control" id="key" name="key" placeholder="Search for">
          <span class="input-group-btn">
            <input type="submit" class="btn btn-default" value="Search"></intput>
          </span>
        </div>
      </div>
    </div>
  </form> 
  <hr style="border-color: grey;"/>
  <div class="row">
  <div class="col-md-12">
    <div class="latest-product">
      <?php 
      $catwine = $_GET['cat_id'];
      $sql = "SELECT CategoryName FROM category WHERE CategoryId = '$catwine'";
      $result = mysql_query($sql);
      $catname = mysql_fetch_object($result);
      ?>
      <h2 class="section-title"><?= $catname->CategoryName ?></h2>
      <?php
      $result = mysql_query("
      SELECT wine.*,
         (SELECT imgwine 
          FROM imgwine 
          WHERE wine.WineId = imgwine.WineId ORDER BY ImgWineId DESC 
          LIMIT 1) as imgwine 
      FROM wine WHERE CategoryId = ".$catwine);
      while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
      ?>
      <div class=col-md-3>
        <div class="single-product">                          
          <div class="product-f-image-f">
            <img src="public/images/products/<?php echo ($row['imgwine'] != "") ? $row['imgwine'] : "no-image.png"; ?>" title="product-imgs" />
            <div class="product-hover">
              <?php 
              if ($row['WineQuantity'] > 0) 
              {
              ?>
              <a href="?func=order&id=<?php echo  $row['WineId']?>" class="add-to-cart-link" ><i class="fa fa-shopping-cart"></i> Add to cart</a>
              <?php
              } else {
              ?>
              <a class="add-to-cart-link" style="background-color: red;"> Sold Out</a>
              <?php
              }
              ?> 
              <a href="./wine/details/<?php echo  $row['WineId']?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
            </div>
          </div>
            
          <h2><a href="./wine/details/<?php echo  $row['WineId']?>"><?php echo  $row['WineName']?></a></h2>
          <div class="product-carousel-price">
              <ins><?php echo  $row['WinePrice']?></ins> <del><?php echo  $row['WinePriceSold']?></del>
          </div> 
        </div>
      </div>
      <?php
      }
      ?>
      <!-- </div> -->
    </div>      
  </div>
</div>