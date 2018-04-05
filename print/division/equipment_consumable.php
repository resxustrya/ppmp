<?php

    $pdf->SetFont('Arial','B',9);

    $pdf->SetWidths(array(10,100,20,20,25,25,25,10,15,8,15,7,15,25,20));
    $pdf->Row(array("","\t\t\t\t\t\t\t\t\t\t\t\td. EQUIPMENT CONSUMABLE","","","","",'','','','','','','','Public Bidding',$division_name['source_fund'])); 

    $pdf->SetFont('Arial','',9);

    $st = $pdo->prepare("SELECT * FROM table_d WHERE division = ? GROUP BY item ORDER BY item ASC ");
    $st->execute(array($divisionid));
    $items = $st->fetchAll(PDO::FETCH_ASSOC);
    
    $pdf->SetWidths(array(10,100,20,20,25,25,25,10,15,8,15,7,15,25,20));
    $row_total = 0;
    $row_amt = 0;
    $over_total = 0;
    foreach($items as $item):

            $row_total = null;
            $row_amt = null;
            
            $st = $pdo->prepare("SELECT SUM(quantity) as qty,amount from table_d WHERE item = ? AND division = ? GROUP BY item LIMIT 1");
            $st->execute(array($item['item'],$divisionid));
            $result = $st->fetch(PDO::FETCH_ASSOC);
            if($result['qty'] > 0) {
                if($result['qty']) {
                    $row_total = $result['qty'] * $result['amount'];
                    $over_total += $row_total;
                    $qty = number_format($result['qty']);
                }
                else
                    $qty = null;
                if($row_total) {
                    $row_total = number_format($row_total,2);
                }else {
                    $row_total = '';
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
    
?>