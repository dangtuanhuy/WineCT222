<?php
include(ROOT_PATH."/library/connect.php");
include("PaymentController.php");

if (isset($_GET['id']))
{
    deletePaymentMethods($_GET['id']);
    echo "<script>window.location.href='./admin/payment/'</script>";
}

$cmd = "SELECT `PaymentMethodId`, `PaymentMethodName` FROM `paymentmethod`";
$list_payment_method = mysql_query($cmd);

?>

<div class="col-sm-12">
  <div class="row">
    <div class="ml-3">
        <h2>Payment Method</h2>
    </div>
  </div>
  <div class="row mb-3">
    <a href="./admin/payment/add" class="btn btn-success ml-3 mr-3"><i class="fa fa-plus"></i> Add new</a>
  </div>
  <div class="row">
        <table id="tableluna" class="table table-striped table-responsive" cellpadding="0" width="" >          
            <thead>
                <tr>
                    <th><strong>Num</strong></th>
                    <th><strong>Name</strong></th>

                    <th><strong>Action</strong></th>
                </tr>
            </thead>
            <tbody>
        <?php 
        $num = 1;
        while(list($id, $name) = mysql_fetch_array($list_payment_method))
        {
        ?>
          <tr>
            <td><?= $num;?> </td>
            <td><?= $name;?> </td>
            <td>
              <a class="btn btn-primary" href='./admin/payment/update/<?=$id;?>'><i class="fa fa-edit"></i></a>
              <a class='btn btn-danger' href='./admin/payment/delete/<?=$id;?>' onclick="return confirm('Are you sure?')"><i class="fa fa-remove"></i></a>  
            </td>      
          </tr>
        <?php
            $num++;
        }
        ?>
            </tbody>
        </table>
  </div>
</div>

<style>
.ml-3 {
  margin-left: 3px;
}
.m4-3 {
  margin-right: 3px;
}
.mb-3 {
  margin-top:  3px;
}
</style>