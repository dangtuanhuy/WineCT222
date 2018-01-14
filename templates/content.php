<?php
function order($id)
{
  $id = $_GET["id"];
  $resultsql = mysql_query(
    "SELECT wine.WineId, wine.WineName, wine.WinePrice, wine.PublisherId, 
            publisher.PublisherName, promotion.PromotionDiscount 
     FROM wine, publisher, promotion 
     WHERE wine.publisherId = publisher.PublisherId AND
           wine.PromotionId = promotion.PromotionId AND
           WineId = ".$id);
  $rowsql = mysql_fetch_row($resultsql);
  if ($rowsql[0] >= 1)
  {
      $added = false;
      $empty = true;
      if(isset($_SESSION['cart']) && empty($_SESSION['cart'])) { // added wine
        $id = $rowsql[0];
        $name = $rowsql[1];
        $price = $rowsql[2];
        $publisher = $rowsql[3];
        $publisher_name = $rowsql[4];
        $discount = $rowsql[5];
        
        $sold_price = $discount > 0 ? ($price * (100 - $discount) / 100) : $price;
        
        $order = array(
            "id" => $id,
            "name" => $name,
            "price" => $price,
            "sold_price" => $sold_price,
            "quantity" => 1,
            "publisher" => $publisher,
            "publisher_name" => $publisher_name,
          );
        $_SESSION['cart'][$id] = $order;
      }

      foreach ($_SESSION['cart'] as $key => $row) 
      {
        if ($key == $id)
        {
            $_SESSION['cart'][$key]["quantity"] +=  1;
            $added = true;
            break;
        }
      }

      // if ($added === false || $empty === true) {
      if (!$added) {
          $id = $rowsql[0];
          $name = $rowsql[1];
          $price = $rowsql[2];
          $publisher = $rowsql[3];
          $publisher_name = $rowsql[4];
          $discount = $rowsql[5];
          
          $sold_price = $discount > 0 ? ($price * (100 - $discount) / 100) : $price;
          
          $order = array(
              "id" => $id,
              "name" => $name,
              "price" => $price,
              "sold_price" => $sold_price,
              "quantity" => 1,
              "publisher" => $publisher,
              "publisher_name" => $publisher_name,
            );
          $_SESSION['cart'][$id] = $order;
      }
      // else {

      // }
      
  
      // if (!$added)
      // {
        
      // }
      echo "<script language='javascript'>
      alert('The product has been added to your shopping cart, go to your cart to view!'); 
      </script>";
      echo "<script>window.location.href='./'</script>";
  }
    else
        echo "<script>alert('Amount exceeds the amount you put in stock.');</script>";
}

if (isset($_GET['func']) && isset($_GET['id']))
{
  $id = $_GET['id'];
  order($id);
}

?>  


<!--Search-->
<div class="maincontent-area">
  <form class="form-horizontal" method="get" action="./search/">
    <div class="form-group">
      <label class="control-label col-sm-2" for="text">Search:
      </label>
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
      <div class="latest-product"> <!-- EDIT -->
        <h2 class="section-title">BEST SELLER</h2>
          <!--Load product from db -->
          <?php
          $result = mysql_query("
          SELECT wine.*, promotion.PromotionDiscount,
              (SELECT ImgWine FROM imgwine 
               WHERE wine.WineId = imgwine.WineId 
               LIMIT 0,1) as imgwine
              -- (SELECT SUM(total_quantity) 
              --  FROM order c 
              --  WHERE a.WineId = c.WineId) AS WineQuantity 
          FROM wine, promotion
          WHERE wine.PromotionId = promotion.PromotionId
          ORDER BY WineSold DESC LIMIT 0,4");
          while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
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
                <?php 
                  if ($row['PromotionDiscount'] > 0)
                  {
                ?>
                <ins><?php echo $row['WinePrice'] * (100 - $row['PromotionDiscount'])/100 ?> </ins> <del class="text-right"><?php echo  $row['WinePrice']?></del>
                <?php
                } else {
                ?>
                <ins><?php echo  $row['WinePrice']?></ins>
                <?php
                  } 
                ?>
                </div> 
              </div>
            </div>
          <?php
          }
          ?>
      </div>
    </div>
  </div>

  <hr>

  <div class="row">
    <div class="col-md-12">
      <div class="latest-product"> <!-- EDIT -->
        <h2 class="section-title">Promotion Product</h2>
        <?php
        $result = mysql_query("
        SELECT wine.*, promotion.PromotionDiscount,
            (SELECT ImgWine FROM imgwine 
             WHERE wine.WineId = imgwine.WineId 
             LIMIT 0,1) as imgwine
        FROM wine, promotion
        WHERE wine.PromotionId = promotion.PromotionId and 
              promotion.PromotionOpen = 1");
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
            <?php 
            if ($row['PromotionDiscount'] > 0)
            {
            ?>
            <ins><?php echo $row['WinePrice'] * (100 - $row['PromotionDiscount'])/100 ?> </ins> <del class="text-right"><?php echo  $row['WinePrice']?></del> <span class="label label-success">- <?php echo $row['PromotionDiscount']; ?>%</span>

            <?php
            } else {
            ?>
            <ins><?php echo  $row['WinePrice']?></ins>
            <?php
              } 
            ?>
            </div>  
          </div>
        </div>
        <?php
        }
        ?>
      </div>
      </div>
    </div>

    <hr>
    <div class="row">
    <div class="col-md-12">
      <div class="latest-product">
        <h2 class="section-title">Products</h2>
        <?php
        $result = mysql_query("
        SELECT wine.*,
        # Get latest img of wine
           (SELECT imgwine 
            FROM imgwine 
            WHERE wine.WineId = imgwine.WineId ORDER BY ImgWineId DESC 
            LIMIT 1) as imgwine 
        # Select top 3 recent added wine
        FROM wine ORDER BY WineUpdateDate 
        DESC LIMIT 0, 8");
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
    <div class="col-md-12">
      <div class="col-md-4 col-md-offset-4">
        <a class="btn btn-primary btn-block" href="./wine/all/">View all</a>
      </div>
    </div>
  </div> 
  <!-- End main content area -->

<hr>
<div class="product-widget-area">
  <div class="zigzag-bottom"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="single-product-widget">
          <h2 class="product-wid-title">Best sellers</h2>
          <!-- <a href="" class="wid-view-more">View all</a> -->
          <?php
          $sqstr = "
          SELECT wine.*,
              (SELECT ImgWine FROM imgwine 
               WHERE wine.WineId = imgwine.WineId 
               LIMIT 0,1) as imgwine
              -- (SELECT SUM(total_WineQuantity) 
              --  FROM order c 
              --  WHERE a.WineId = c.WineId) AS WineQuantity 
          FROM wine ORDER BY WineSold DESC LIMIT 0,3";
          $result = mysql_query($sqstr);
          while ($rs=mysql_fetch_array($result, MYSQL_ASSOC))
          {
          ?>
          <div class="single-wid-product">
            <a href="./wine/details/<?php echo $rs['WineId'] ?>">
            <img src="public/images/products/<?php echo ($rs['imgwine'] != "") ? $rs['imgwine'] : "no-image.png";?>" class="product-thumb"></a>
            <h2>
              <a href="./wine/details/<?php echo $rs['WineId'] ?>">
              <?php echo $rs['WineName']; ?></a>
            </h2>
            <div class="product-wid-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <div class="product-wid-price">
              <ins><?php echo $rs['WinePrice'];?></ins>
              <del><?php echo $rs['WinePriceSold']; ?></del>
            </div>                            
          </div>
          <?php
          }
          ?>
        </div>
      </div>  
        
      <div class="col-md-4">
        <div class="single-product-widget">
          <h2 class="product-wid-title">New Product</h2>
          <!-- <a href="#" class="wid-view-more">View All</a> -->
          <?php
          $sqstr = "
          SELECT wine.*,
          # Get latest img of wine
             (SELECT imgwine 
              FROM imgwine 
              WHERE wine.WineId = imgwine.WineId ORDER BY ImgWineId DESC 
              LIMIT 1) as imgwine 
          # Select top 3 recent added wine
          FROM wine ORDER BY WineUpdateDate 
          DESC LIMIT 0, 3";
          $result = mysql_query($sqstr);
          while ($rs = mysql_fetch_array($result, MYSQL_ASSOC))
          {
          ?>
          <div class="single-wid-product">
            <a href="./wine/details/<?php echo $rs['WineId'] ?>">
                <img src="public/images/products/<?php echo ($rs['imgwine'] != "") ? $rs['imgwine'] : "no-image.png";?>" class="product-thumb"></a>
            <h2><a href="./wine/details/<?php echo $rs['WineId'] ?>">
                <?php echo $rs['WineName']; ?></a>
            </h2>
            <div class="product-wid-rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </div>
            <div class="product-wid-price">
              <ins><?php echo $rs['WinePrice'];?></ins>
              <del><?php echo $rs['WinePriceSold']; ?></del>
            </div>                            
          </div>
          <?php
          }
          ?>
          </div>
        </div>
        <div class="col-md-4">
          <div class="single-product-widget">
            <h2 class="product-wid-title">Sold Out</h2>
            <!-- <a href="#" class="wid-view-more">View All</a> -->
            <?php
            $sqstr = "
            SELECT wine.*,
            # Get latest img of wine
               (SELECT imgwine 
                FROM imgwine 
                WHERE wine.WineId = imgwine.WineId ORDER BY ImgWineId DESC 
                LIMIT 1) as imgwine 
            # Select top 3 recent added wine
            FROM wine WHERE WineQuantity = 0 ORDER BY WineUpdateDate 
            DESC LIMIT 0, 3";
            $result = mysql_query($sqstr);
            while ($rs = mysql_fetch_array($result, MYSQL_ASSOC))
            {
            ?>
            <div class="single-wid-product">
              <a href="./wine/details/<?php echo $rs['WineId'] ?>">
                  <img src="public/images/products/<?php echo ($rs['imgwine'] != "") ? $rs['imgwine'] : "no-image.png";?>" class="product-thumb"></a>
              <h2><a href="./wine/details/<?php echo $rs['WineId'] ?>">
                  <?php echo $rs['WineName']; ?></a>
              </h2>
              <div class="product-wid-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <div class="product-wid-price">
                <ins><?php echo $rs['WinePrice'];?></ins>
                <del><?php echo $rs['WinePriceSold']; ?></del>
              </div>                            
            </div>
            <?php
            }
            ?>
            </div>
          </div>
    </div>
  </div>
</div> <!-- End product widget area -->


