<div class="card-header">
  <i class="fa fa-window-close"></i> Sold out Wine
</div>
<?php 
$sql = "SELECT WineId, WineName, WineStrength, 
WinePrice, WineUpdateDate, WineQuantity, 
CategoryName, PublisherName, CountryName
FROM wine, Category, publisher, country
WHERE wine.CategoryId = Category.CategoryId AND
wine.PublisherId = publisher.PublisherId AND
wine.CountryId = country.CountryId AND
              wine.WineQuantity = 0"; // Sort List by ...
              $list_wine = mysql_query($sql);

              $list_order =  mysql_query($cmd);
              ?>
              <table class="table table-striped table-responsive" cellpadding="0" width="" >          
                <thead>
                  <tr>
                    <th><strong>No</strong></th>
                    <th><strong>Wine Name</strong></th>
                    <th><strong>Strength</strong></th>
                    <th><strong>Price</strong></th>
                    
                    <th><strong>Date</strong></th>
                    <th><strong>Quantity</strong></th>
                    <th><strong>Category</strong></th>
                    <th><strong>Publisher</strong></th>
                    <th><strong>Country</strong></th>
                    
                    <th><strong>Supply</strong></th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $num = 1;
                  while(list ($id, $name, $strength, $price, $updatedate, $winequantity, 
                    $Cat, $Pub, $Country) = mysql_fetch_array($list_wine))
                  {
                    ?>
                    <tr>
                      <td><?= $num;?> </td>
                      <td><?= $name;?> </td>
                      <td><?= $strength;?> </td>
                      <td><?= $price;?> </td>
                      <td><?= $updatedate;?> </td>
                      <td><?= $winequantity;?> </td>
                      <td><?= $Cat;?> </td>
                      <td><?= $Pub;?> </td>
                      <td><?= $Country;?> </td>
                      <td>
                        <a class="btn btn-primary" href='./admin/wine/supply/<?=$id;?>'><i class="fa fa-plus-square"></i></a>
                      </td>      
                    </tr>
                    <?php
                    $num++;
                  }
                  ?>
                </tbody>
              </table>

              <div class="card-header">
                <i class="fa fa-exchange"></i> Waiting Order
              </div>
              <?php 
              $cmd = "
              SELECT order.OrderId, order.Username, order.OrderCreateDate, 
              order.OrderDeliverDate, order.OrderStatus, 
              paymentmethod.PaymentMethodName
              FROM `order`
              JOIN paymentmethod ON order.PaymentMethodId = paymentmethod.PaymentMethodId
              WHERE OrderStatus = 0";

              $list_order =  mysql_query($cmd);
              ?>
              <table class="table table-striped table-responsive" cellpadding="0" width="" >          
                <thead>
                  <tr>
                    <th><strong>Order</strong></th>
                    <th><strong>User</strong></th>
                    <th><strong>Create</strong></th>
                    <th><strong>Payment</strong></th>
                    <th><strong>Date</strong></th>          

                    <th><strong>Deliver</strong></th>          
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
                      <td><?= $payment;?></td>
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