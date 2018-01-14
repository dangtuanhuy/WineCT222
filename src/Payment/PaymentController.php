<?php
function addPaymentMethods($name)
{
    $insert = "INSERT INTO `paymentmethod`(`PaymentMethodName`) VALUES ('$name')";
    mysql_query($insert);
}

function deletePaymentMethods($id)
{
    $sqlDelete = "DELETE FROM `paymentmethod` WHERE `PaymentMethodId`=$id";
    mysql_query($sqlDelete);
}

function updatePaymentMethods($id, $name)
{
    $sqlUpdate = "UPDATE `paymentmethod` SET `PaymentMethodName`='$name' WHERE `PaymentMethodId`=$id";
    
    // 
    mysql_query($sqlUpdate);
}

function searchPaymentMethods($id)
{
    $sqlSelect = "SELECT `PaymentMethodId`, `PaymentMethodName` FROM `paymentmethod` WHERE `PaymentMethodId`=$id";
    
    return mysql_query($sqlSelect);
}
?>

