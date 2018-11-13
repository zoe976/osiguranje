<?php
require('./helper/pdf/fpdf.php');

class ZPDF extends FPDF
{
// Page header
function Header()
{
    $this->SetFont('Arial','B',15);
    // Move to the right
    //$this->Cell(0);
    // Title
    $this->Cell(0,10,'Polisa osiguranja',1,0,'C');
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
?>