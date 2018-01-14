<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
    </ol>
    <!-- Icon Cards-->
    <?php
    $total_wine = mysql_fetch_array(mysql_query("SELECT COUNT(wine.WineId) AS total_wine from wine"))[0];
    $total_waiting_order = mysql_fetch_array(mysql_query("SELECT SUM(IF(`OrderStatus` = 0, 1, 0)) AS total_waiting_order FROM `order`"))[0];
    $total_active_promotion = mysql_fetch_array(mysql_query("SELECT SUM(IF(`PromotionOpen` = 1, 1, 0)) AS total_active_promotion FROM `promotion`"))[0];

    ?>
    <div class="row">
        <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-modx"></i>
                    </div>
                    <div class="mr-5"><?= $total_wine == 0 ? 0 : $total_wine ?> Products!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="./admin/wine/">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <!-- <i class="fa fa-fw fa-shopping-cart"></i> -->
                        <i class="fa fa-fw fa-cart-plus"></i>
                    </div>
                    <div class="mr-5"><?= $total_waiting_order == 0 ? 0 : $total_waiting_order ?> Waiting Orders!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="./admin/order/">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-gift"></i>
                    </div>
                    <div class="mr-5"><?= $total_active_promotion == 0 ? 0 : $total_active_promotion ?> Active Promotion!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="./admin/promotion/">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>

    <div class="card mb-3">
      <? include('main-table.php') ?>
    </div>
</div>