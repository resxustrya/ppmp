

<?php

require('dbconn.php');
require('fpdf.php');
require('roman.php');
ini_set('max_execution_time', 0);
ini_set('memory_limit','1000M');
ini_set('max_input_time','300000');
class PDF extends FPDF
{
    var $widths;
    var $aligns;

    function SetWidths($w)
    {
        //Set the array of column widths
        $this->widths=$w;
    }

    function SetAligns($a)
    {
        //Set the array of column alignments
        $this->aligns=$a;
    }

    function Row($data,$border = 0,$is_items = 1)
    {
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=5*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
            if($border == 0)
            {
                $this->Rect($x,$y,$w,$h);
            }

            //Print the text
            
            
            $this->MultiCell($w,5,$data[$i],0,$a);
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }
    

    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger) {
            $this->AddPage($this->CurOrientation);
            $this->SetFont('Arial','B',9);
            
            
            $this->Cell(10,5,'Item','LTR',0,'C',0);
            $this->Cell(100,5,'Item Description/','LTR',0,'C',0);
            $this->Cell(20,5,'Total','LTR',0,'C',0);
            $this->Cell(20,5,' ','LTR',0,'C',0);
            $this->Cell(25,5,' ','LTR',0,'C',0);
            $this->Cell(75,5,'First Semester','LTRB',0,'C',0);  
            $this->Cell(45,5,'Second Semester','LTRB',0,'C',0);
            $this->Cell(25,5,'Recommended','LTR',0,'C',0);
            $this->Cell(20,5,'SOURCE OF','LTR',0,'C',0);
            
            $this->Ln();
            
            $this->Cell(10,5,'No.','LR',0,'C',0);
            $this->Cell(100,5,'General Specification','LR',0,'C',0);
            $this->Cell(20,5,'Qty.','LR',0,'C',0);
            $this->Cell(20,5,'Unit','LR',0,'C',0);
            $this->Cell(25,5,'Total Amount','LR',0,'C',0);
            $this->Cell(50,5,'Q1','LTRB',0,'C',0);
            $this->Cell(25,5,'Q2','LTRB',0,'C',0);
            $this->Cell(23,5,'Q3','LTRB',0,'C',0);
            $this->Cell(22,5,'Q4','LTRB',0,'C',0);
            $this->Cell(25,5,'Procurement','LR',0,'C',0);
            $this->Cell(20,5,'FUND','LR',0,'C',0);
            
            
            $this->Ln();
            
            
            $this->Cell(10,5,' ','LRB',0,'C',0);
            $this->Cell(100,5,' ','LRB',0,'C',0);
            $this->Cell(20,5,' ','LRB',0,'C',0);
            $this->Cell(20,5,' ','LRB',0,'C',0);
            $this->Cell(25,5,' ','LRB',0,'C',0);
            $this->Cell(25,5,'Qty.','LTRB',0,'C',0);
            $this->Cell(25,5,'Unit Cost','LTRB',0,'C',0);
            $this->Cell(10,5,'Qty.','LTRB',0,'C',0);
            $this->Cell(15,5,'Unit Cost','LTRB',0,'C',0);
            $this->Cell(8,5,'Qty.','LTRB',0,'C',0);
            $this->Cell(15,5,'Unit Cost','LTRB',0,'C',0);
            $this->Cell(7,5,'Qty.','LTRB',0,'C',0);
            $this->Cell(15,5,'Unit Cost','LTRB',0,'C',0);
            $this->Cell(25,5,'Method','LRB',0,'C',0);
            $this->Cell(20,5,'','LRB',0,'C',0);
            
            $this->Ln();
        }
    }

    function NbLines($w,$txt)
    {
        //Computes the number of lines a MultiCell of width w will take
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;
        while($i<$nb)
        {
            $c=$s[$i];
            if($c=="\n")
            {
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep=$i;
            $l+=$cw[$c];
            if($l>$wmax)
            {
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                }
                else
                    $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }

    function headsection($funds,$division)
    {
        $this->Image(__DIR__.'/image/doh.png', 40, 20,20,20);
        $this->Image(__DIR__.'/image/ro7.png', 290, 20,20,20);

        $this->SetFont('Arial','B',9);
        $this->SetXY(120,20);
        $this->Cell(90,10,'Department of Health Regional Office VII',0,0,'C');

        $this->SetXY(120,25);
        $this->Cell(90,10,'PROJECT PROCUREMENT MANAGEMENT PLAN',0,0,'C');

        $this->SetXY(120,30);
        $this->Cell(90,10,"CY 2018",0,0,'C');

        $this->SetXY(120,35);
        $this->Cell(90,10,$funds,0,0,'C');

        $this->Ln();

        $month = date('F j, Y',strtotime(date('Y-m-d')));
        $this->SetFont('Arial','B',9);
        $this->SetXY(10,45);
        $this->Cell(40,10,"Date      : ".$month,0);

        $this->Ln();
        $this->SetFont('Arial','B',9);
        $this->SetXY(10,45);
        $this->Cell(40,20,"Office    : RO VII - ( $division )",0);
    }
}

$divisionid = null;
if(isset($_GET['division'])) {
    $divisionid = $_GET['division'];
}

$pdf = new PDF('L','mm','LEGAL');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$pdf->Ln(15);
$pdf->SetWidths(array(15,50,20,15,25,20,20,20,20,20,20,20,20,25,30));


$roman = 1;
$pdo = conn();
$st = $pdo->prepare("SELECT * FROM division WHERE id = ? LIMIT 1");
$st->execute(array($divisionid));
$division_name = $st->fetch(PDO::FETCH_ASSOC);

$row_num = 1;
if($division_name) {
    $pdf->headsection($division_name['source_fund'],$division_name['description']);
}
$grand_total = 0;
$office_supplies_total = 0;


include_once 'division/thead.php';
// FOR OFFICE SUPPLIES
include_once 'division/office_supplies_header.php';
include_once 'division/table_a.php';
include_once 'division/display_persection.php';
include_once 'division/training_supplies.php';
//further analyze
include_once 'division/equipment_consumable.php';
include_once 'division/non_consumable_per_section.php';
// further analyze
include_once 'division/other_common_use.php';
include_once 'division/semi_exapandable_equipment_furniture.php';
include_once 'division/semi_exapandable_per_section.php';
include_once 'division/open_list.php';



$pdf->SetFont('Arial','B',10);
$pdf->Row(array("",$division_name['description'] . " Grand Total ","","",number_format($grand_total,2),"","",'','','','','','','',''));


include_once 'division/footer.php';
$pdf->Output();
