<?php

    $pdf->SetFont('Arial','B',9);
    include_once 'scripts/other_common_use_header.php';

    $pdf->SetFont('Arial','',9);

    $st = $pdo->prepare("SELECT * FROM table_z WHERE created_by = ? GROUP BY item ORDER BY item ASC");
    $st->execute(array($section));
    $items = $st->fetchAll(PDO::FETCH_ASSOC);
    $over_total = 0;
    if(count($items)) {
        $pdf->SetWidths(array(10,100,20,20,25,25,25,10,15,8,15,7,15,25,20));
        $row_total = 0;
        $row_amt = 0;
        foreach($items as $item):
            if($item['quantity']) {
                $row_total = null;
                $row_amt = null;
                if($item['quantity'] > 0)
                    $qty = number_format($item['quantity']);
                else
                    $qty = null;
            
                if($item['quantity'] >0) {
                    $total_amt = $item['quantity'] * $item['amount'];
                    if($total_amt > 0) {
                        $over_total += $total_amt;
                        $row_total = number_format($total_amt,2);
                    } else
                        $row_total = null;
                } else {
                    $total_amt = null;
                }
                $row_amt = $item['amount'] > 0 ? number_format($item['amount'],2) : null; 
                $pdf->SetFont('Arial','',9);
                $pdf->Row(array($row_num,"\t\t\t\t\t\t\t\t\t\t\t\t".$item['item'],
                            $qty,
                            $item['unit'],
                            $row_total,
                            $qty,
                            $row_amt,'','','','','','','',''
                        )); 
                $row_num++;
            }
        endforeach;
        $office_supplies_total += $over_total;
        $grand_total += $over_total;
        $pdf->SetFont('Arial','B',10);
        $pdf->Row(array("","\t\t\t\t\t\t\t\t\t\t\t\t","","Total",number_format($over_total,2),"","",'','','','','','','',''));
    }else {
        $pdf->SetWidths(array(10,100,20,20,25,25,25,10,15,8,15,7,15,25,20));
        $pdf->Row(array('',"\t\t\t\t\t\t\t\t\t\t\t\tNo Items",'','','','','','','','','','','','',''));
    }

    $pdf->SetFont('Arial','B',10);
    $pdf->Row(array("","OFFICE SUPPLIES TOTAL ","","",number_format($office_supplies_total,2),"","",'','','','','','','',''));
?>