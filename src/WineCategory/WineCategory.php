<?php
include(ROOT_PATH."/library/connect.php");
include("WineCategoryController.php");

if(isset($_GET['id']))
{
	deleteCategory($_GET['id']);
    echo "<script>window.location.href='./admin/wine/cat'</script>";
}

$sqlSelect = "SELECT `CategoryId`, `CategoryName`, `CategoryDetails` FROM `category`";
$list_cat = mysql_query($sqlSelect);

?>


<div class="col-sm-12">
    <div class="row">
        <div class="ml-3">
            <h2>Category</h2>
        </div>
    </div>
    <div class="row mb-3">
        <a href="./admin/wine/cat/add" class="btn btn-success ml-3 mr-3"><i class="fa fa-plus"></i> Add new</a>
    </div>
 	<div class="row">
        <table id="tableluna" class="table table-striped table-responsive" cellpadding="0" width="" >          
            <thead>
                <tr>
                    <th><strong>Num</strong></th>
                    <th><strong>Name</strong></th>
                    <th><strong>Details</strong></th>
                    <th><strong>Action</strong></th>
                </tr>
            </thead>
            <tbody>
        <?php 
        $num = 1;
        while(list($id, $name, $details) = mysql_fetch_array($list_cat))
        {
        ?>
          <tr>
            <td><?= $num;?> </td>
            <td><?= $name;?> </td>
            <td><?= $details;?> </td>
            <td>
              <a class="btn btn-primary" href='./admin/wine/cat/update/<?=$id;?>'><i class="fa fa-edit"></i></a>
              <a class='btn btn-danger' href='./admin/wine/cat/delete/<?=$id;?>' onclick="return confirm('Are you sure?')"><i class="fa fa-remove"><?php $id ?></i></a>
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