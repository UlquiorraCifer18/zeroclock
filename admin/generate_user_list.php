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
    $this->Cell(80,10,'User List',1,0,'C');
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
$display_heading = array('user_id'=> 'ID', 'first_name'=> 'First Name', 'last_name'=> 'Last Name', 'gender'=> 'Gender', 'birthday'=> 'Birthday', 'email'=> 'Email', 'password'=> 'Password','mobile'=> 'Mobile', 'address1'=> 'Address','address2'=> 'Address 2',);
 
$result = mysqli_query($connString, "SELECT `user_id`, `first_name`, `last_name`, `gender`, `birthday`, `email`, `password`, `mobile`, `address1`, `address2` FROM `user_info`") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM user_info");
 
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','I',10);
foreach($header as $heading) {
$pdf->Cell(19,20,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(19,20,$column,1);
}
$pdf->Output();
?>
