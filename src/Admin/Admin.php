<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Set default path -->
  <base href="/AppWine/"/>
  <title>App Wine</title>
  <link rel="icon" href="public/images/icons/appwine.jpg">
  <link rel="stylesheet" type="text/css" href="public/css/font-awesome/css/font-awesome.min.css">
  <!-- Custom Bootstrap -->
  <link rel="stylesheet" type="text/css" href="public/css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="public/css/sb-admin.css">
  <link rel="stylesheet" type="text/css" href="public/js/admin/datatables/dataTables.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="public/js/jquery-ui/jquery-ui.css">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

<?php 
define(ROOT_PATH, dirname(dirname(__DIR__)));
include(ROOT_PATH."/library/connect.php");
require(ROOT_PATH.'/library/PHPExcel.php');

?>

<!-- Footer
======================================-->
<?php include('navbar.php'); ?>
<!--======================================--> 

<div class="content-wrapper">    
    <?php
    if (isset($_GET['page'])) {
        // admin/wine/
        if ($_GET['page'] == "wine-list")
            include(ROOT_PATH."/src/Wine/Wine.php");
        if ($_GET['page'] == "wine-add")
            include(ROOT_PATH."/src/Wine/WineAdd.php");
        if ($_GET['page'] == "wine-update")
            include(ROOT_PATH."/src/Wine/WineUpdate.php");
        if ($_GET['page'] == "wine-supply")
            include(ROOT_PATH."/src/Wine/WineSupply.php");
        if ($_GET['page'] == "wine-export")
          include(ROOT_PATH."/src/Wine/Wine.php");
        if ($_GET['page'] == "wine-export-data")
            include(ROOT_PATH."/src/Wine/WineAdd.php");
        if ($_GET['page'] == "wine-update-image")
          include(ROOT_PATH."/src/Wine/WineImage.php");

        // admin/wine/category/
        if ($_GET['page'] == "category-list")
            include(ROOT_PATH."/src/WineCategory/WineCategory.php");
        if ($_GET['page'] == "category-add")
            include(ROOT_PATH."/src/WineCategory/WineCategoryAdd.php");
        if ($_GET['page'] == "category-update")
            include(ROOT_PATH."/src/WineCategory/WineCategoryUpdate.php");

        // admin/wine/country/
        if ($_GET['page'] == "country-list")
            include(ROOT_PATH."/src/WineCountry/WineCountry.php");
        if ($_GET['page'] == "country-add")
            include(ROOT_PATH."/src/WineCountry/WineCountryAdd.php");
        if ($_GET['page'] == "country-update")
            include(ROOT_PATH."/src/WineCountry/WineCountryUpdate.php");

        // admin/wine/publisher/
        if ($_GET['page'] == "publisher-list")
            include(ROOT_PATH."/src/WinePublisher/WinePublisher.php");
        if ($_GET['page'] == "publisher-add")
            include(ROOT_PATH."/src/WinePublisher/WinePublisherAdd.php");
        if ($_GET['page'] == "publisher-update")
            include(ROOT_PATH."/src/WinePublisher/WinePublisherUpdate.php");

        // admin/order/
        if ($_GET['page'] == "order")
          include(ROOT_PATH."/src/Order/Order.php");

        // admin/promotion/       
        if ($_GET['page'] == "promotion")
            include(ROOT_PATH."/src/Promotion/Promotion.php");
        if ($_GET['page'] == "promotion-add")
            include(ROOT_PATH."/src/Promotion/PromotionAdd.php");
        if ($_GET['page'] == "promotion-update")
            include(ROOT_PATH."/src/Promotion/PromotionUpdate.php"); 

        // admin/payment/
        if ($_GET['page'] == "payment")
            include(ROOT_PATH."/src/Payment/Payment.php");
        if ($_GET['page'] == "payment-add")
            include(ROOT_PATH."/src/Payment/PaymentAdd.php");
        if ($_GET['page'] == "payment-update")
            include(ROOT_PATH."/src/Payment/PaymentUpdate.php"); 

        // admin/logout
        if ($_GET['page'] == "SighOut")
            include(ROOT_PATH."/src/Admin/AdminSignOut.php");
    }
    else
      include("main-dashboard.php");
    ?>

    <!-- Footer
    ======================================-->
    <?php include('footer.php'); ?>
    <!--======================================--> 

    
    <script src="public/js/jquery/jquery.js"></script> 
    <script src="public/js/jquery-ui/jquery-ui.js"></script>    
    <!-- <script src="public/js/popper/popper.min.js"></script>           -->
    <script src="public/js/popper/popper.js"></script>          
    <script src="public/js/bootstrap/bootstrap.min.js"></script>

    <script src="library/tinymce/js/tinymce/tinymce.min.js"></script>

    <script src="public/js/admin/chart.js/Chart.min.js"></script>
    <script src="public/js/jquery-easing/jquery.easing.min.js"></script>
    <script src="public/js/admin/sb-admin.js"></script>
    <script src="public/js/admin/sb-admin-datatables.min.js"></script>
    <script src="public/js/admin/datatables/jquery.dataTables.js"></script>
    <script src="public/js/admin/datatables/dataTables.bootstrap4.js"></script>
    <script src="public/js/admin/sb-admin-charts.min.js"></script>

    <script src="public/js/calendar/jquery.ui.datepicker-vi.js"></script>
    <script>
      $(document).ready(function() {
        var table = $('#tableluna').DataTable({
          responsive: true,
          "language": {
            "paginate": {
              "first": "|<",
              "last": ">|",
              "next": ">>",
              "previous": "<<"
            }
          },
          "lengthMenu": [[5, 10, 15, 20, 25, 30, -1], [5,10,15, 20, 25, 30, "Full"]] 
        });

      });
    </script>
    <script>
      // Active Calendar for datepicker-class
      $(document).ready(function() {
        $("#datepicker").datepicker({dateFormat: 'yy-mm-dd'});
        $("#datepicker1").datepicker({dateFormat: 'yy-mm-dd'});
      });
    </script>

    <script language="javascript">
      // Config for TinyMCE  
      tinymce.init({
        selector: '.Editor_',
        plugins: 'placeholder',
      });

      // CKEDITOR.replace( "Editor_" );      
    </script>     
  </div>
</body>

</html>