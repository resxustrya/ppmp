<?php
$pdf->SetFont('Arial','B',9);
$pdf->SetXY(10,60);

$pdf->Cell(10,5,'Item','LTR',0,'C',0);
$pdf->Cell(100,5,'Item Description/','LTR',0,'C',0);
$pdf->Cell(20,5,'Total','LTR',0,'C',0);
$pdf->Cell(20,5,' ','LTR',0,'C',0);
$pdf->Cell(25,5,' ','LTR',0,'C',0);
$pdf->Cell(75,5,'First Semester','LTRB',0,'C',0);  
$pdf->Cell(45,5,'Second Semester','LTRB',0,'C',0);
$pdf->Cell(25,5,'Recommended','LTR',0,'C',0);
$pdf->Cell(20,5,'SOURCE OF','LTR',0,'C',0);

$pdf->Ln();

$pdf->Cell(10,5,'No.','LR',0,'C',0);
$pdf->Cell(100,5,'General Specification','LR',0,'C',0);
$pdf->Cell(20,5,'Qty.','LR',0,'C',0);
$pdf->Cell(20,5,'Unit','LR',0,'C',0);
$pdf->Cell(25,5,'Total Amount','LR',0,'C',0);
$pdf->Cell(50,5,'Q1','LTRB',0,'C',0);
$pdf->Cell(25,5,'Q2','LTRB',0,'C',0);
$pdf->Cell(23,5,'Q3','LTRB',0,'C',0);
$pdf->Cell(22,5,'Q4','LTRB',0,'C',0);
$pdf->Cell(25,5,'Procurement','LR',0,'C',0);
$pdf->Cell(20,5,'FUND','LR',0,'C',0);


$pdf->Ln();


$pdf->Cell(10,5,' ','LRB',0,'C',0);
$pdf->Cell(100,5,' ','LRB',0,'C',0);
$pdf->Cell(20,5,' ','LRB',0,'C',0);
$pdf->Cell(20,5,' ','LRB',0,'C',0);
$pdf->Cell(25,5,' ','LRB',0,'C',0);
$pdf->Cell(25,5,'Qty.','LTRB',0,'C',0);
$pdf->Cell(25,5,'Unit Cost','LTRB',0,'C',0);
$pdf->Cell(10,5,'Qty.','LTRB',0,'C',0);
$pdf->Cell(15,5,'Unit Cost','LTRB',0,'C',0);
$pdf->Cell(8,5,'Qty.','LTRB',0,'C',0);
$pdf->Cell(15,5,'Unit Cost','LTRB',0,'C',0);
$pdf->Cell(7,5,'Qty.','LTRB',0,'C',0);
$pdf->Cell(15,5,'Unit Cost','LTRB',0,'C',0);
$pdf->Cell(25,5,'Method','LRB',0,'C',0);
$pdf->Cell(20,5,'','LRB',0,'C',0);
$pdf->Ln();
?>