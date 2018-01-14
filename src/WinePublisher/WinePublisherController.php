<?php
function addPublisher($name, $details)
{
	$insert = "INSERT INTO `publisher`(`PublisherName`, `PublisherDetail`) VALUES ('$name', '$details')";
	mysql_query($insert);
}

function deletePublisher($id)
{
	$sqlDelete = "DELETE FROM `publisher` WHERE `PublisherId`=$id";
	mysql_query($sqlDelete);
}

function updatePublisher($id, $name, $details)
{
	$sqlUpdate = "UPDATE `publisher` SET `PublisherName`='$name',`PublisherDetail`='$details' WHERE `PublisherId`=$id";
	
	// 
	mysql_query($sqlUpdate);
}

function searchPublistsher($id)
{
	$sqlSelect = "SELECT `PublisherId`, `PublisherName`, `PublisherDetail` FROM `publisher` WHERE `PublisherId`=$id";
	
	return mysql_query($sqlSelect);
}

