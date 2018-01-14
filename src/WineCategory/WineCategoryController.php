<?php
function addCategory($name, $details)
{
    $insert = "INSERT INTO `category`(`CategoryName`, `CategoryDetails`) VALUES ('$name', '$details')";
    mysql_query($insert);
}

function deleteCategory($id)
{
    $sqlDelete = "DELETE FROM `category` WHERE `CategoryId`=$id";
    mysql_query($sqlDelete);
}

function updateCategory($id, $name, $details)
{
    $sqlUpdate = "UPDATE `category` SET `CategoryName`='$name',`CategoryDetails`='$details' WHERE `CategoryId`=$id";
    
 
    mysql_query($sqlUpdate);
}

function searchCategory($id)
{
    $sqlSelect = "SELECT `CategoryId`, `CategoryName`, `CategoryDetails` FROM `category` WHERE `CategoryId`=$id";
    
    return mysql_query($sqlSelect);
}
?>