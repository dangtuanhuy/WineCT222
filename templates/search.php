<?php 
    session_start();
    define(ROOT_PATH, dirname(__DIR__));
    include(ROOT_PATH."/library/connect.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="AppWine">
    <meta name="author" content="Team 1 - CT241">
    <base href="/AppWine/">
    <link rel="icon" href="public/images/icons/appwine.jpg">

    <title>AppWine</title>
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='public/fonts/Roboto-Regular.ttf' rel='stylesheet' type='text/css'>
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="public/css/font-awesome/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="public/css/index/carousel.css">
    <link rel="stylesheet" href="public/css/index/style.css"/>
    <link rel="stylesheet" href="public/css/index/responsive.css"/>
    <link rel="stylesheet" href="public/css/index/prettyPhoto.css"/>
    <link rel="stylesheet" href="public/css/index/price-range.css"/>
    <link rel="stylesheet" href="public/css/index/animate.css"/>
    <link rel="stylesheet" href="public/css/index/main.css"/>
    <link rel="stylesheet" href="public/css/index/index.css"/>
    <link rel="stylesheet" href="public/css/index/owl.carousel.css"/>

</head>

<body>
  <!-- NAVBAR
  ================================================== -->
  <div class="navbar-wrapper">
    <div class="container">
    <?php include("header.php");?>
    </div>
  </div>


  <!-- Carousel
  ================================================== -->
  <?php include("carousel.php");?>
  <!--==================================================
   Carousel -->

<!-- container 
================================================== -->
<div class="container">
  <div class="maincontent-area">
    <!-- =============== SEARCH bar ===============-->
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
        <div class="latest-product"> <!-- EDIT -->
          <?php 
          if ($_GET['key'] == "")
            echo "No result found.";
          else {
            $string_search = $_GET['key'];
            $query = "
            SELECT wine.WineId, wine.WineName, category.CategoryName, 
                   publisher.PublisherName, country.CountryName
                FROM wine 
                JOIN category on wine.CategoryId = category.CategoryId
                JOIN publisher on wine.PublisherId = publisher.PublisherId
                JOIN country on wine.CountryId = country.CountryId 
                JOIN promotion on wine.PromotionId = promotion.PromotionId";
            $list_name = mysql_query($query);
            $found_it = false;
            while(list ($id, $wine, $cat, $pub, $cou, $pro) = mysql_fetch_array($list_name))
            {
              if (strpos(strtolower($wine), strtolower($string_search)) !== false || 
                  strpos(strtolower($cat), strtolower($string_search)) !== false || 
                  strpos(strtolower($pub), strtolower($string_search)) !== false || 
                  strpos(strtolower($cou), strtolower($string_search)) !== false || 
                  strpos(strtolower($pro), strtolower($string_search)) !== false) 
              {
                $found_it = true;
                $query_result = mysql_query("
                SELECT wine.WinePrice, wine.WineQuantity, promotion.PromotionDiscount,
                    (SELECT ImgWine FROM imgwine 
                     WHERE wine.WineId = imgwine.WineId 
                     LIMIT 0,1) as imgwine
                FROM wine, promotion
                WHERE wine.PromotionId = promotion.PromotionId AND wine.WineId = ".$id);
                list ($WinePrice, $wineQuantity, $WinePromotion, $WineImage) = mysql_fetch_array($query_result);
          ?>
          <div class=col-md-3>
            <div class="single-product">                          
              <div class="product-f-image-f">
                <img src="public/images/products/<?php echo ($WineImage != "") ? $WineImage : "no-image.png"; ?>" title="product-imgs" />
                <div class="product-hover">
                  <?php 
                  if ($wineQuantity > 0) 
                  {
                  ?>
                  <a href="?func=order&id=<?php echo $wine?>" class="add-to-cart-link" ><i class="fa fa-shopping-cart"></i> Add to cart</a>
                  <?php
                  } else {
                  ?>
                  <a class="add-to-cart-link" style="background-color: red;"> Sold Out</a>
                  <?php
                  }
                  ?> 
                  <a href="./wine/details/<?php echo  $id?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                </div>                
              </div>
              <h2><a href="./wine/details/<?php echo  $id?>"><?php echo  $wine?></a></h2>
              <div class="product-carousel-price">
              <?php 
                if ($WinePromotion > 0)
                {
              ?>
              <ins><?php echo $WinePrice * (100 - $WinePromotion)/100 ?> </ins> <del class="text-right"><?php echo  $WinePrice?></del>
              <?php
              } else {
              ?>
              <ins><?php echo  $WinePrice?></ins>
              <?php
                } 
              ?>
              </div>
            </div>
          </div>
          <?php
              }
            }
            if ($found_it == false)
              echo "No result found.";
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <?php include("footer.php"); ?>
</div>
<!-- /.container -->


  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <!--datatable-->
  <script src="public/js/jquery/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="public/js/jquery/jquery.min.js"><\/script>')</script>
  <script src="public/js/popper/popper.min.js"></script>
  <script src="public/bootstrap/js/bootstrap.min.js"></script> 
  <!-- <script src="public/js/slider/jssor.slider-26.1.5.min.js"></script> -->
  <!-- jQuery easing -->
  <script src="public/js/jquery-easing/jquery.easing.min.js"></script>
  <!-- Main Script -->
  <!-- jQuery sticky menu -->
  <script src="public/js/home/jquery.sticky.js"></script>
  <script src="public/js/home/owl.carousel.min.js"></script>
  
  <script src="public/js/home/main.js"></script>
  <!-- Slider -->
  <!-- <script src="public/js/home/bxslider.min.js"></script> -->
  <!-- <script src="public/js/home/script.slider.js"></script> -->

<svg xmlns="http://www.w3.org/2000/svg" width="500" height="500" viewBox="0 0 500 500" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="25" style="font-weight:bold;font-size:25pt;font-family:Arial, Helvetica, Open Sans, sans-serif">500x500</text></svg></body>
</html>