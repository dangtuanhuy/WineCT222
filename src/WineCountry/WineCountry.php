<?php
include(ROOT_PATH."/library/connect.php");
include("WineCountryController.php");
	
if (isset($_GET['id']))
{
	deleteCountry($_GET['id']);
    echo "<script>window.location.href='./admin/wine/country/'</script>";
}

$cmd = "SELECT `CountryId`, `CountryName`, `CountryDetails` FROM `country`";
$list_country = mysql_query($cmd);
	
?>

<div class="col-sm-12">
    <div class="row">
        <div class="ml-3">
            <h2>Category</h2>
        </div>
    </div>
    <div class="row mb-3">
        <a href="./admin/wine/country/add" class="btn btn-success ml-3 mr-3"><i class="fa fa-plus"></i> Add new</a>
    </div>
 	<div class="row">
		<table id="tableluna" class="table table-striped table-responsive table-bordered" cellpadding="0" width="" >
			<thead>
				<tr>
					<th><strong>Numberic</strong></th>
					<th><strong>Country</strong></th>
					<th><strong>Details</strong></th>
					<th><strong>Function</strong></th>
				</tr>
			</thead>
			<tbody>
			<?php 
			$num = 1;
			while(list($id, $name, $details) = mysql_fetch_array($list_country))
			{
			?>
			  <tr>
			    <td><?= $num;?> </td>
			    <td><?= $name;?> </td>
			    <td><?= $details;?> </td>
                <td>
                  <a class="btn btn-primary" href='./admin/wine/country/update/<?=$id;?>'><i class="fa fa-edit"></i></a>
                  <a class='btn btn-danger' href='./admin/wine/country/delete/<?=$id;?>' onclick="return confirm('Are you sure?')"><i class="fa fa-remove"><?php $id ?></i></a>
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