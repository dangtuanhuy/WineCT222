<?php
    define(ROOT_PATH, dirname(dirname(__DIR__)));
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $columnHeader = 
        "WineId" . "\t" . "WineName" . "\t" . "WineStrength" . "\t" . 
        "WinePrice" . "\t" . "WinePriceSold" . "\t" . "WineShortDetails" . "\t" . 
        "WineDetails" . "\t" . "WineUpdateDate"  . "\t" . "WineQuantity" . "\t" . 
        "WineSold" . "\t" . "CategoryId" . "\t" . "PublisherId" . "\t" . 
        "CountryId" . "\t" . "PromotionId" . "\t";  
    
    $filename = "wine-data-template" . ".xls";
      
    header("Content-type: application/octet-stream");  
    header("Content-Disposition: attachment; filename=\"$filename\"");  
    header("Pragma: no-cache");  
    header("Expires: 0");  
      
    echo ucwords($columnHeader)."\n";  
  
?>