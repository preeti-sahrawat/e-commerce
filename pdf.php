<?php
include('fpdf182/fpdf.php');
$fpdf  = new FPDF();
$fpdf->AddPage();
$fpdf->SetFont('Arial','B',16);
$fpdf->Cell(110,00,"Invoice",0,1,'R');
$fpdf->Cell(70,0,"Shopping Website By Traun",0,0,'C');
$fpdf->SetFont('Arial','I',8);
$fpdf->Cell(0,0,'Page '.$fpdf->PageNo(),0,1,'R');

$fpdf->SetFont('Arial','I',12);
$fpdf->Cell(0,20,"Invoice:",0,1,'L'); 

$fpdf->Cell(0,00,"Email:",0,0);



$fpdf->SetFont('Arial','I',8);
$fpdf->Output();


?>