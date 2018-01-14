<?php
function addCountry($name, $details)
{
    $insert = "INSERT INTO `country`(`CountryName`, `CountryDetails`) VALUES ('$name', '$details')";
    mysql_query($insert);
}

function deleteCountry($id)
{
    $sqlDelete = "DELETE FROM `country` WHERE `CountryId`=$id";
    mysql_query($sqlDelete);
}

function updateCountry($id, $name, $details)
{
    $sqlUpdate = "UPDATE `country` SET `CountryName`='$name',`CountryDetails`='$details' WHERE `CountryId`=$id";
    
    // 
    mysql_query($sqlUpdate);
}

function searchCountry($id)
{
    $sqlSelect = "SELECT `CountryId`, `CountryName`, `CountryDetails` FROM `country` WHERE `CountryId`=$id";
    
    return mysql_query($sqlSelect);
}


