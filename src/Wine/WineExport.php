<?php
    define(ROOT_PATH, dirname(dirname(__DIR__)));
    include_once(ROOT_PATH."/library/connect.php");
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    if (isset($_POST['export'])) {
        $output = '';

        $result = mysql_query("SELECT * FROM wine");
        if(mysql_num_rows($result) > 0)
        {
            $output .= '
               <table class="table" bordered="1">  
                    <tr>  
                        <th>WineId</th>
                        <th>WineName</th>
                        <th>WineStrength</th>
                        <th>WinePrice</th>
                        <th>WineShortDetails</th>
                        <th>WineDetails</th>
                        <th>WineUpdateDate </th>
                        <th>WineQuantity</th>
                        <th>WineSold</th>
                        <th>CategoryId</th>
                        <th>PublisherId</th>
                        <th>CountryId</th>
                        <th>PromotionId</th>
                    </tr>';
            while($row = mysql_fetch_array($result))
            {
             $output .= '
                      <tr>  
                        <th>'.$row['WineId'].'</th>
                        <th>'.$row['WineName'].'</th>
                        <th>'.$row['WineStrength'].'</th>
                        <th>'.$row['WinePrice'].'</th>
                        <th>'.$row['WineShortDetails'].'</th>
                        <th>'.$row['WineDetails'].'</th>
                        <th>'.$row['WineUpdateDate '].'</th>
                        <th>'.$row['WineQuantity'].'</th>
                        <th>'.$row['WineSold'].'</th>
                        <th>'.$row['CategoryId'].'</th>
                        <th>'.$row['PublisherId'].'</th>
                        <th>'.$row['CountryId'].'</th>
                        <th>'.$row['PromotionId'].'</th>
                    </tr>';
            }
            $output .= '</table>';
            header('Content-Type: application/xls');
            header('Content-Disposition: attachment; filename=Wine_Data.xls');
            echo $output;
        }
    }
  
?>

