<?php
include(ROOT_PATH."/library/connect.php");
include("PromotionController.php");

if (isset($_GET['delete_id']))
{
    deletePromotion($_GET['delete_id']);
    echo "<script>window.location.href='./admin/promotion/'</script>";
}

if (isset($_GET['action']))
{
    if ( $_GET['action'] == "Active")
      $status = 1;
    else if ($_GET['action'] == "Deactive")
      $status = 0;
    changeStatus($_GET['id'], !$status);
    echo "<script>window.location.href='./admin/promotion/'</script>";
}

$cmd = "SELECT `PromotionId`, `PromotionName`, `PromotionContent`, `PromotionDiscount`, 
                     `PromotionActive`, `PromotionClose`, `PromotionOpen` 
                      FROM `Promotion`";
$list_promotion = mysql_query($cmd);

?>

<div class="col-sm-12">
  <div class="row">
    <div class="ml-3">
        <h2>Promotion</h2>
    </div>
  </div>
  <div class="row mb-3">
    <a href="./admin/promotion/add" class="btn btn-success ml-3 mr-3"><i class="fa fa-plus"></i> Add new</a>
    <form method="post" action="./admin/promotion/export/">
      <input type="submit" class="btn btn-warning" value="Export Data" name="export">
    </form>
  </div>
  <div class="row">
        <table id="tableluna" class="table table-striped table-responsive" cellpadding="0" width="" >          
            <thead>
                <tr>
                    <th><strong>Num</strong></th>
                    <th><strong>Name</strong></th>
                    <th><strong>Content</strong></th>
                    <th><strong>Discount</strong></th>
                    <th><strong>Active Date</strong></th>
                    <th><strong>Close Date</strong></th>
                    <th><strong>Open</strong></th>
                    <th><strong>Action</strong></th>
                </tr>
            </thead>
            <tbody>
        <?php 
        $num = 1;
        while(list($id, $name, $content, $discount,
                   $dateActive, $dateClose, $Open) = mysql_fetch_array($list_promotion))
        {
            $value = $Open == 1 ? "Active" : "Deactive";
        ?>
          <tr>
            <td><?= $num;?> </td>
            <td><?= $name;?> </td>
            <td><?= $content;?> </td>
            <td><?= $discount;?> </td>
            <td><?= $dateActive;?> </td>
            <td><?= $dateClose;?> </td>
            <?php if ($id == 1) { ?>
            <td><a class='btn btn-secondary'>Default</a>
            <td>
              <a class="btn btn-primary"><i class="fa fa-edit"></i></a>
              <a class='btn btn-danger'><i class="fa fa-remove"></i></a>  
            </td>
            <?php } else { ?>
            <td><a onclick="return confirm('Are you sure?')" class='btn btn-<?= $Open == 1 ? "primary":"secondary"; ?>' href='./admin/promotion/<?= $value;?>/<?= $id;?>'><?= $value?></a>
            </td>
            <td>
              <a class="btn btn-primary" href='./admin/promotion/update/<?=$id;?>'><i class="fa fa-edit"></i></a>
              <a class='btn btn-danger' href='./admin/promotion/delete/<?=$id;?>' onclick="return confirm('Are you sure?')"><i class="fa fa-remove"></i></a>  
            </td>   
            <?php } ?>   
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