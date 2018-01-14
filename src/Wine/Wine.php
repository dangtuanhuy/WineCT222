<?php
include(ROOT_PATH."/library/connect.php");
include("WineController.php");

if (isset($_GET['id']))
{
    deleteWine($_GET['id']);
    echo "<script>window.location.href='./admin/wine/'</script>";
}

$sql = "SELECT WineId, WineName, WineStrength, 
               WinePrice, WineUpdateDate, WineQuantity, 
               CategoryName, PublisherName, CountryName
        FROM wine, Category, publisher, country
        WHERE wine.CategoryId = Category.CategoryId AND
              wine.PublisherId = publisher.PublisherId AND
              wine.CountryId = country.CountryId"; // Sort List by ...
$list_wine = mysql_query($sql);
?>

<!-- HTML  -->
<div class="col-sm-12">
  <div class="row">
    <div class="ml-3">
    	<h2>Wine </h2>
    </div>
  </div>
  <div class="row mb-3">
    <a href="./admin/wine/add" class="btn btn-success ml-3 mr-3"><i class="fa fa-plus"></i> Add new</a>
    <form method="post" action="./admin/wine/export/">
      <input type="submit" class="btn btn-warning" value="Export Data" name="export">
    </form>
  </div>
  <div class="row">
		<table id="tableluna" class="table table-striped table-responsive" cellpadding="0" width="" >          
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
                      
					<th><strong>Action</strong></th>
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
              <a class="btn btn-secondary" href='./admin/wine/image/<?=$id;?>'><i class="fa fa-image"></i></a>
              <a class='btn btn-danger' href='./admin/wine/delete/<?=$id;?>' onclick="return confirm('Are you sure?')"><i class="fa fa-remove"></i></a>
              <a class="btn btn-primary" href='./admin/wine/update/<?=$id;?>'><i class="fa fa-edit"></i></a>
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