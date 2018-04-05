<?php 


$st = $pdo->prepare("SELECT * FROM table_b WHERE created_by = ? OR created_by ='8888' GROUP BY item ORDER BY item ASC");
$st->execute(array($section));
$items = $st->fetchAll(PDO::FETCH_ASSOC);

$pdf->SetFont('Arial','B',9);
$pdf->SetWidths(array(10,100,20,20,25,25,25,10,15,8,15,7,15,25,20));
$pdf->Row(array("","\t\t\t\t\t\t\t\t\t\t\t\tb. PER SECTION","","","","",'','','','','','','','','')); 


$pdf->SetWidths(array(10,100,20,20,25,25,25,10,15,8,15,7,15,25,20));
$row_total = 0;
$row_amt = 0;
$tableb_total = 0;
foreach($items as $item):
    $row_total = null;
    $row_amt = null;
    if($item['quantity'] > 0)
        $qty = number_format($item['quantity']);
    else
        $qty = null;

    if($item['quantity'] >0) {
        $total_amt = $item['quantity'] * $item['amount'];
        if($total_amt > 0) {
            $tableb_total += $total_amt;
            $row_total = number_format($total_amt,2);
        }
        else
            $row_total = null;    
    } else {
        $total_amt = null;
    }
    
    $pdf->SetFont('Arial','',9);
    $row_amt = $item['amount'] > 0 ? number_format($item['amount'],2) : null; 
    $pdf->Row(array($row_num,"\t\t\t\t\t\t\t\t\t\t\t\t".$item['item'],
                $qty,
                $item['unit'],
                $row_total,
                $qty,
                $row_amt,'','','','','','','',''
            )); 
    $row_num++;
endforeach;
$office_supplies_total += $tableb_total;
$grand_total += $tableb_total;
$pdf->SetFont('Arial','B',10);
$pdf->Row(array("","\t\t\t\t\t\t\t\t\t\t\t\t","","Total",number_format($tableb_total,2),"","",'','','','','','','',''));
?>