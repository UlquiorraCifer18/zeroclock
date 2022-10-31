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
    $this->Cell(80,10,'Product List',1,0,'C');
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
$display_heading = array('product_id'=> 'ID', 'product_title'=> 'Keyword', 'product_price'=> '', 'product_desc'=> '','product_cat'=> 'Title','product_brand'=> 'Price', 'product_keywords'=> '','product_image'=> '','product_image2'=> '','product_image3'=> '','product_image4'=> '');
 
$result = mysqli_query($connString, "SELECT `product_id`, `product_title`, `product_price`, `product_desc` FROM `products`") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM products");
 
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','I',8);



foreach($header as $heading) {
$pdf->Cell(48,15,$display_heading[$heading['Field']],1,0,'C');
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(48,10,$column,1,0,'C');


}
$pdf->Output();
?>
