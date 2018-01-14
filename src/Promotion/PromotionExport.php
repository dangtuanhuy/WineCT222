<?php
    define(ROOT_PATH, dirname(dirname(__DIR__)));
    include_once(ROOT_PATH."/library/connect.php");
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    if (isset($_POST['export'])) {
        $output = '';

        $result = mysql_query("SELECT * FROM promotion");
        if(mysql_num_rows($result) > 0)
        {
            $output .= '
               <table class="table" bordered="1">  
                    <tr>  
                        <th>Id</th>
                        <th>Name</th>
                        <th>Discount</th>
                        <th>Content</th>
                        <th>Active Date</th>
                        <th>Close Date</th>
                        <th>PromotionOpen </th>
                    </tr>';
            while($row = mysql_fetch_array($result))
            {
             $output .= '
                      <tr>  
                        <th>'.$row['PromotionId'].'</th>
                        <th>'.$row['PromotionName'].'</th>
                        <th>'.$row['PromotionDiscount'].'</th>
                        <th>'.$row['PromotionContent'].'</th>
                        <th>'.$row['PromotionActive'].'</th>
                        <th>'.$row['PromotionClose'].'</th>
                        <th>'.$row['PromotionOpen'].'</th>
                    </tr>';
            }
            $output .= '</table>';
            header('Content-Type: application/xls');
            header('Content-Disposition: attachment; filename=Wine-Promotion_Data.xls');
            echo $output;
        }
    }
  
?>

