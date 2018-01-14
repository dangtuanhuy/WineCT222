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


  <div class="container">
  <!-- START THE FEATURETTES -->
  <!-- <hr class="featurette-divider"> -->
  <?php
  if (isset($_GET['page']))
  {
      if ($_GET['page'] == "SignUp")
          include(ROOT_PATH."/src/User/SignUp.php");
      if ($_GET['page'] == "SignIn")
          include(ROOT_PATH."/src/User/SignIn.php");
      if ($_GET['page'] == "SignOut")
          include(ROOT_PATH."/src/User/SignOut.php");

      if ($_GET['page'] == "details")
          include(ROOT_PATH."/src/Cart/WineDetails.php");

      if ($_GET['page'] == "cart")
          include(ROOT_PATH."/src/Cart/cart.php");
      if ($_GET['page'] == "checkout")
          include(ROOT_PATH."/src/Cart/checkout.php");  
      if ($_GET['page'] == "AllWine")
          include(ROOT_PATH."/src/Cart/WineAll.php"); 
      if ($_GET['page'] == "Cat")
          include(ROOT_PATH."/src/Cart/WineCat.php"); 

      if ($_GET['page'] == "CustomerUpdate")
        include(ROOT_PATH."/src/User/UpdateCustomer.php");  

  }
  else
      include("content.php");
  ?>
  <!-- /END THE FEATURETTES -->


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