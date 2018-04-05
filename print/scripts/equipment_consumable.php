<?php

    $pdf->SetFont('Arial','B',9);

    $pdf->SetWidths(array(10,100,20,20,25,25,25,10,15,8,15,7,15,25,20));
    $pdf->Row(array("","\t\t\t\t\t\t\t\t\t\t\t\td. EQUIPMENT CONSUMABLE","","","","",'','','','','','','','','')); 

    $pdf->SetFont('Arial','',9);

    $st = $pdo->prepare("SELECT * FROM table_d WHERE created_by = ? OR created_by = '8888' GROUP BY item ORDER BY item");
    $st->execute(array($section));
    $items = $st->fetchAll(PDO::FETCH_ASSOC);
    
    $pdf->SetWidths(array(10,100,20,20,25,25,25,10,15,8,15,7,15,25,20));
    $row_total = 0;
    $row_amt = 0;
    $tabled_total = 0;
    foreach($items as $item):
        if($item['quantity'] > 0) {
            $row_total = null;
            $row_amt = null;
            if($item['quantity'] > 0)
                $qty = number_format($item['quantity']);
            else
                $qty = null;
        
            if($item['quantity'] >0) {
                $total_amt = $item['quantity'] * $item['amount'];
                $tabled_total += $total_amt;
                $row_total = number_format($total_amt,2);
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
    $office_supplies_total += $tabled_total;
    $grand_total += $tabled_total;
    $pdf->SetFont('Arial','B',10);
    $pdf->Row(array("","\t\t\t\t\t\t\t\t\t\t\t\t","","Total",number_format($tabled_total,2),"","",'','','','','','','',''));
    
?>