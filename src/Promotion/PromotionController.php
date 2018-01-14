<?php
function addPromotion($name, $content, $discount, $dateActive, $dateClose, $open)
{
    $insert = "INSERT INTO `Promotion`(`PromotionName`, `PromotionContent`, 
                                       `PromotionActive`, `PromotionClose`, 
                                       `PromotionOpen`, `PromotionDiscount`) 
                            VALUES ('$name', '$content', '$dateActive', 
                                    '$dateClose', '$open', '$discount')";
    mysql_query($insert);
}

function deletePromotion($id)
{
    $delete = "DELETE FROM `promotion` WHERE `PromotionId`= $id";
    mysql_query($delete);
}

function updatePromotion($id, $name, $content, $dateActive, $dateClose, $open, $discount)
{
    $sqlUpdate = "UPDATE `Promotion` SET   `PromotionName`   = '$name',
                                           `PromotionContent`= '$content',
                                           `PromotionActive` = '$dateActive',
                                           `PromotionClose`  = '$dateClose',
                                           `PromotionOpen`   = '$open', 
                                           `PromotionDiscount` = '$discount'
                                     WHERE `PromotionId`     = $id";
    mysql_query($sqlUpdate);
}

function searchPromotion($id)
{
    $sqlSelect = "SELECT `PromotionId`, `PromotionName`, `PromotionContent`, 
                         `PromotionActive`, `PromotionClose`, `PromotionOpen`, `PromotionDiscount` 
                          FROM `promotion` WHERE `PromotionId`= $id";
    
    return mysql_query($sqlSelect);
}

function changeStatus($id, $status)
{
  $change = "UPDATE `promotion` SET `PromotionOpen` = '$status'
                                WHERE `PromotionId` = $id";
  mysql_query($change);
}
?>