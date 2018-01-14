<?php
include(ROOT_PATH."/library/connect.php");
$cmd = "
    SELECT order.OrderId, order.Username, order.OrderCreateDate, 
           order.OrderDeliverDate, order.OrderStatus, 
           paymentmethod.PaymentMethodName
    FROM `order`
    JOIN paymentmethod ON order.PaymentMethodId = paymentmethod.PaymentMethodId";

$list_order =  mysql_query($cmd);


if(isset($_GET['order_id']))
{
    if(isset($_GET['action']))
    {   
        mysql_query("UPDATE `order` SET OrderStatus = 1 WHERE OrderId = ".$_GET['order_id']);
        echo "<script>window.location.href='./admin/order/'</script>";
    }
}
?>
<!-- HTML  -->
<div class="col-sm-12">
  <div class="row">
    <div class="ml-3">
        <h2>Order List </h2>
    </div>
  </div>
    <!-- </div> -->
  <div class="row">
    <table id="tableluna" class="table table-striped table-responsive" cellpadding="0" width="" >          
      <thead>
          <tr>
              <th><strong>Order</strong></th>
              <th><strong>User</strong></th>
              <th><strong>Create</strong></th>
              <th><strong>Deliver</strong></th>
              <th><strong>Status</strong></th>                     
              <th><strong>Payment</strong></th>
                  
              <th><strong>Details</strong></th>
          </tr>
      </thead>
      <tbody>
          <?php 
          while(list($id, $username, $create, 
                     $deliver, $status, $payment) = mysql_fetch_array($list_order))
          {
          ?>
            <tr>
              <td><?= $id;?></td>
              <td><?= $username;?></td>
              <td><?= $create;?></td>
              <td><?= $deliver;?></td>
              <td>
                <?php
                if ($status == 0) {
                ?>
                <a class='btn btn-warning' data-toggle="modal" data-target="#Deliver">Waiting</a>  
                <!-- Confirm -->
                <div class="modal fade" id="Deliver" tabindex="-1" role="dialog" aria-labelledby="Deliver" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="Deliver">Confirm deliver wine</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">Are you sure want to deliver this order?</div>
                        <div class="modal-footer">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                          <a class="btn btn-primary" href="./admin/order/action/<?= $id ?>">Deliver it.</a>
                        </div>
                      </div>
                    </div>
                </div>
                <?php
                } 
                else {
                ?>
                <span class="btn btn-success">Delivered</span>
                <?php 
                }
                ?>            
              </td>
              <td><?= $payment;?></td>
              <td>
                <form method="post" action="./admin/order/print">
                  <input type="hidden" name="id" value="<?= $id ?>">
                  <button type="submit" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
                </form>
              </td>      
            </tr>
          <?php
          }
          ?>
      </tbody>
    </table>
  </div>
</div>

<style>
.ml-3 {margin-left: 3px; }
.mb-3 {margin-top:  3px; }
</style>

