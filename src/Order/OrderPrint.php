<?php
define(ROOT_PATH, dirname(dirname(__DIR__)));
include(ROOT_PATH."/library/connect.php");
require(ROOT_PATH."/library/fpdf/fpdf.php");
// Cell(x, y, Text, border, )
// if x = 0, cell width will extend up to the right margin of the page

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
        $this->Image(ROOT_PATH.'/public/images/icons/appwine.jpg',10,6,20);
        // Arial bold 15
        $this->SetFont('Courier','B',12);
        // Move to the right
        $this->Cell(25);
        // Title
        $this->Cell(0,0,'App Wine - High quality Wine',0,0);
        $this->Ln(5);
        $this->Cell(25);
        $this->SetFont('Courier','',10);
        $this->Cell(0,0,'Support 24/7',0,0);
        $this->Ln(5);
        $this->Cell(25);
        $this->SetFont('Courier','',10);
        $this->Cell(0,0,'Hotline: XXX XXX XXXX. Website: https://-------.com',0,0);
        // Line break
        $this->Ln(10);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');
    }
}

// Instanciation of inherited class
$pdf = new PDF('P', 'mm', 'A5');    // A4 Portrait
$pdf->AliasNbPages();
$pdf->AddPage();

// --Order Id--
$pdf->SetFont('Times','B',10);
$id = $_POST['id'];
$pdf->Cell(0,7,'Order Number:  #'.$id,0,1);

// --Customer Infor--
// Get Customer Info
$sql = mysql_query("    
  SELECT order.OrderCreateDate, order.OrderDeliverDate, order.OrderDeliverPlace, 
      order.Username, paymentmethod.PaymentMethodName, customer.Address, customer.Name, customer.Phone
  FROM `order`
  JOIN `paymentmethod` on order.PaymentMethodID = paymentmethod.PaymentMethodID 
  JOIN `customer` on order.Username = customer.Username 
  WHERE order.orderId = ".$id);
list($CreateDate, $DeliverDate, $DeliverPlace, $Username, $Payment, $Address, $Name, $Phone) = mysql_fetch_row($sql);
// Print Customer Info
$pdf->Cell(0,5,'Customer: '.$Name,0,1);
$pdf->SetFont('Times','',10);
$pdf->Cell(0,5,'Phone: '.$Phone,0,1);
$pdf->Cell(0,5,'Order Date: '.$CreateDate,0,1);
$pdf->Cell(0,5,'Deliver Address: '.$DeliverPlace,0,1);
$pdf->Cell(0,5,'Payment Method: '.$Payment,0,1);
$pdf->Ln();

// --Print Order Details--
// Print Table Header
$header = array('Product', 'Price', 'Qua.', 'Dis.', 'Total');
$width = array(55, 20, 10, 20, 25);
for ($i=0; $i < count($header) ; $i++) { 
    $pdf->Cell($width[$i], 7, $header[$i], 1);
}
$pdf->Ln();
// Get Order Details
$sql = mysql_query(" 
    SELECT  wine.WineName, wineorder.WineOriginalPrice, wineorder.WineOrderQuantity, 
            (wineorder.WineOriginalPrice - wineorder.WineSoldPrice) as Dis, 
            (wineorder.WineOrderQuantity * wineorder.WineSoldPrice) as Total
    from `wineorder`
    JOIN `wine` on wineorder.WineOrderID = wine.WineId
    JOIN `promotion` on wine.PromotionId = promotion.PromotionId
    where OrderId = ".$id 
    );
// Print Order Details
$total;
while ($details = mysql_fetch_array($sql, MYSQL_NUM)){
    for ($i=0; $i < count($details) ; $i++) {
        $pdf->Cell($width[$i], 7, $details[$i], 1);
    }
    $total += $details[4];
    $pdf->Ln();
}
$pdf->Cell(105, 7, 'Total', 1);
$pdf->Cell(25, 7, $total, 1);

$pdf->Output();

?>