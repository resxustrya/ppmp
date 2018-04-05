<?php

require_once('fpdf.php');

class PDF extends FPDF
{

    public function test()
    {
        $this->Cell(50,5,'1','LTR',0,'L',0);




    }
}

$pdf = new PDF('L','mm','LEGAL');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$pdf->test();
$pdf->Output();
?>