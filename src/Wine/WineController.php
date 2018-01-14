<?php
// Addd
function addWine ($name, $strength, $price, $shortdetails, $details, 
	              $updatedate, $winequantity, $idCat, $idPub, 
	              $idCountry, $idPromotion)
{
	$insert = "
	INSERT INTO `wine`(`WineName`, `WineStrength`, `WinePrice`,  `WineShortDetails`, `WineDetails`, `WineUpdateDate`, `WineQuantity`,`CategoryId`,`PublisherId`, `CountryId`,`PromotionId`) 
	VALUES ('$name', '$strength', '$price', '$shortdetails', '$details', '$updatedate', '$winequantity','$idCat','$idPub','$idCountry','$idPromotion')";
	mysql_query($insert);
	echo $insert;
}

function bindCategoryList(){
	$sqlstring = "SELECT `CategoryId`, `CategoryName`, `CategoryDetails` FROM `category`";
	$result = mysql_query($sqlstring);
	echo "<select class='form-control'  name='slcategory'><option value= '0'>Choice Category</option>";
	// name='slcategory' : POST value
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		echo "<option value='".$row['CategoryId']."'>".$row['CategoryName']."</option>";
	}
	echo "</select>";
}

function bindCountryList(){
	$sqlstring = "SELECT `CountryId`, `CountryName`, `CountryDetails` FROM `country`";
	$result = mysql_query($sqlstring);
	echo "<select class='form-control' name='slcountry'><option value= '0'>Choice Country</option>";
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		echo "<option value='".$row['CountryId']."'>".$row['CountryName']."</option>";
	}
	echo "</select>";
}
function bindPublisherList(){
	$sqlstring = "SELECT`PublisherId`, `PublisherName`, `PublisherDetail` FROM `publisher`";
	$result = mysql_query($sqlstring);
	echo "<select class='form-control' name='slpublisher'><option value= '0'>Choice Publisher</option>";
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		echo "<option value='".$row['PublisherId']."'>".$row['PublisherName']."</option>";
	}
	echo "</select>";
}
function bindPromotitonList(){
	$sqlstring = "SELECT `PromotionId`, `PromotionName`, `PromotionContent`, `PromotionActive`, `PromotionClose`, `PromotionOpen` FROM `promotion` ";
	$result = mysql_query($sqlstring);
	echo "<select class='form-control' name='slpromotion' ><option value= '0'>Choice Promotion</option>";
	while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)){
		echo "<option value='".$row['PromotionId']."'>".$row['PromotionContent']."</option>";
	}
	echo "</select>";

}
//Update
function searchWine($id)
{
	$sqlSelect = 
	"SELECT  WineId, WineName, WineStrength, 
	         WinePrice, WineShortDetails, 
	         WineDetails, WineUpdateDate, WineQuantity,
	         CategoryId, PublisherId, CountryId, 
	         PromotionId 
	FROM `wine`
	WHERE `WineId`=$id";
	
	return mysql_query($sqlSelect);
}
function bindUpdateCategoryList($selectedValue){
	$sqlstring = "SELECT `CategoryId`, `CategoryName`, `CategoryDetails` FROM `category`";
	$result = mysql_query ($sqlstring);
	echo "<select name='slcategory' class='form-control'><option value= '0'>Choice Category</option>";
	while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)){
		if($row['CategoryId'] == $selectedValue){
			echo "<option value='".$row['CategoryId']."' selected>".$row['CategoryName']."</option>";
		}
		else{
			echo "<option value='".$row['CategoryId']."'>".$row['CategoryName']."</option>";
		}
	}
	echo "</select>";
}

function bindUpdatePublisherList($selectedValue){
	$sqlstring = 
	"SELECT `PublisherId`, `PublisherName`, `PublisherDetail` 
	 FROM `publisher`";
	$result = mysql_query ($sqlstring);
	echo "<select name='slpublisher' class='form-control' ><option value= '0'>Choice Publisher</option>";
	while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)){
		if($row['PublisherId'] == $selectedValue){
			echo "<option value='".$row['PublisherId']."' selected>".$row['PublisherName']."</option>";
		}
		else{
			echo "<option value='".$row['PublisherId']."'>".$row['PublisherName']."</option>";
		}
	}
	echo "</select>";
}

function bindUpdateCountryList($selectedValue){
	$sqlstring ="SELECT `CountryId`, `CountryName`, `CountryDetails` FROM `country`";
	$result = mysql_query($sqlstring);
	echo "<select class='form-control' name='slcountry' ><option value= '0'>Choice Country</option>";
	while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)){
		if ($row['CountryId'] == $selectedValue){
			echo "<option value='".$row['CountryId']."' selected>".$row['CountryName']."</option>";
		}
		else {
			echo "<option value='".$row['CountryId']."'>".$row['CountryName']."</option>";
		}
	}
	echo "</select>";
}

function bindUpdatePromitionList($selectedValue){
	$sqlstring ="SELECT `PromotionId`, `PromotionName`, `PromotionContent`, 
	                    `PromotionActive`, `PromotionClose`, `PromotionOpen` 
	             FROM `promotion`";
	$result = mysql_query($sqlstring);
	echo "<select class='form-control' name='slpromotion' ><option value= '0'>Choice Promotion</option>";
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		if ($row['PromotionId'] == $selectedValue){
			echo "<option value='".$row['PromotionId']."' selected>".$row['PromotionContent']."</option>";
		}
		else {
			echo "<option value='".$row['PromotionId']."'>".$row['PromotionContent']."</option>";
		}
	}
	echo "</select>";
}

function updateWine ($id, $name, $strength, $price, $shortdetails, 
	                 $details, $updatedate, $winequantity, $idCat, 
	                 $idPub, $idCountry, $idPromotion)
{
	$sqlUpdate = 
	"UPDATE `wine` 
	 SET `WineName`='$name',`WineStrength`='$strength',`WinePrice`='$price',
	     `WineShortDetails`='$shortdetails',
	     `WineDetails`='$details',`WineUpdateDate`='$updatedate',
	     `WineQuantity`='$winequantity',`CategoryId`='$idCat',
	     `PublisherId`='$idPub',`CountryId`='$idCountry',
	     `PromotionId`='$idPromotion' 
	 WHERE `WineId`= $id";
	
	mysql_query($sqlUpdate);
}

//DELETE
function deleteWine($id)
{
	$sqldelete = "DELETE FROM `wine` WHERE `WineId`=$id";
	mysql_query($sqldelete);
}

?>



