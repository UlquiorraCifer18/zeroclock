<?php
//include connection file
include_once("connection.php");
include_once('libs/fpdf.php');
 
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../System Icons/Z-Logo-removebg-preview.png',20,3,30);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'Sales Report',1,0,'C');
    // Line break
    $this->Ln(20);
}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
 
$db = new dbObj();
$connString =  $db->getConnstring();
$display_heading = array('order_pro_id'=> 'ID','order_id'=> 'ORDER ID', 'product_id'=> 'Product ID', 'brand_title'=> 'Brand', 'qty'=> 'Quantity','amt'=> 'Amount');
 
$result = mysqli_query($connString, "SELECT `order_pro_id`, `order_id`, `product_id`, `brand_title`,`qty`,`amt` FROM `order_products`") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM order_products");
 
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','I',10);
foreach($header as $heading) {
$pdf->Cell(32,15,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(32,15,$column,1);
}
$pdf->Output();
?>