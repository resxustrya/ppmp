<?php
    
    $st = $pdo->prepare("SELECT * FROM ppmp_code WHERE id <> 1 AND id <> 2");
    $st->execute(array($section));
    $codes = $st->fetchAll(PDO::FETCH_ASSOC);
    $code_name = null;
    $ppcode = null;
    $row_amount = null;
    
    $expense_row_total_amount = 0;
    $expense_total_amount = 0;
    
    foreach($codes as $code):
        $code_name = $code['expense_name'];
        $ppcode = $code['id'];
        $id = $code['id'];
        $oneline = $code['oneline'];
        $expense_row_total_amount = 0;
        $pdf->SetWidths(array(10,100,20,20,25,25,25,10,15,8,15,7,15,25,20));
        if($oneline == 1) {
            $quantity = null;
            $row_amount = null;
            $amount = null;
            $st = $pdo->prepare("SELECT * FROM open_list WHERE ppcode = ? AND created_by = ? GROUP BY item LIMIT 1");
            $st->execute(array($ppcode,$divisionid));
            $result = $st->fetch(PDO::FETCH_ASSOC);
            
                $unit = $result['unit'] ? $result['unit'] : null;
                $quantity = $result['quantity'] ? $result['quantity'] : null;
                $amount = $result['amount'] ? $result['amount'] : null;
                $expense_name = $result['item'];
                if($amount AND $quantity) {
                    $row_amount = $quantity * $amount;
                }
                $amount = $amount > 0 ? number_format($amount,2) : null;
                $row_amount = $row_amount > 0 ? number_format($row_amount,2) : null;
                $quantity = $quantity > 0 ? number_format($quantity) : null;

                $pdf->SetFont('Arial','B',9);
                $pdf->Row(array($row_num,roman($id).".\t\t $expense_name",$quantity,$unit,$row_amount,$quantity,$amount,'','','','','','','',''));
                $row_num++;

        } else {


            $pdf->SetFont('Arial','B',9);
            $pdf->Row(array("",roman($id)."."."\t\t".$code_name,'','','','','','','','','','','','',''));
            $st = $pdo->prepare("SELECT * FROM open_list WHERE ppcode = $ppcode AND created_by = ? GROUP BY item ORDER BY item ASC");
            $st->execute(array($section));
            $open_list = $st->fetchAll(PDO::FETCH_ASSOC);
            
            
            foreach($open_list as $list):
                if($list['quantity'] > 0) {
                    $row_amount = null;
                    $amount = null;
                    if($list['item']) {
                        $unit = isset($list['unit']) ? $list['unit'] : null;
                        $quantity = $list['quantity'] ? $list['quantity'] : null;
                        $amount = $list['amount'] ? $list['amount'] : null;
                        if($amount AND $quantity) {
                            $row_amount = $quantity * $amount;
                            $expense_row_total_amount += $row_amount;
                        }
                        
                        $pdf->SetFont('Arial','',9);
                        $pdf->Row(array($row_num,$list['item'],number_format($quantity),$unit,number_format($row_amount,2),number_format($quantity),number_format($amount,2),'','','','','','','',''));
                        $row_num++;
                    }
                }
            endforeach;
            if($expense_row_total_amount > 0) {
                $grand_total += $expense_row_total_amount;
                $pdf->SetFont('Arial','B',10);
                $pdf->Row(array("","\t\t\t\t\t\t\t\t\t\t\t\t","","Total",number_format($expense_row_total_amount,2),"","",'','','','','','','',''));
            }


            // DISPLAY EACH PROGRAM EXPENSE

            

            $st = $pdo->prepare("SELECT * FROM program_name WHERE section = ? AND division = ? AND ppcode = ?");
            $st->execute(array($section,$divisionid,$code['id']));
            $programs = $st->fetchAll(PDO::FETCH_ASSOC);
            if($programs) {

                $label = 'A';
                $pdf->SetWidths(array(10,100,20,20,25,25,25,10,15,8,15,7,15,25,20));
                $row_total = 0;
                $program_row_total = 0;
                
                foreach($programs as $program):
                    $program_row_total = 0;
                    $program_name = $program['name'];
                    $row_total = 0;
                    $program_total = 0;
                
                    $pdf->SetFont('Arial','B',9);
                    $pdf->Row(array("","$label. $program_name","","","","","",'','','','','','','',''));
            
                    $st = $pdo->prepare("SELECT * FROM program_training_venue ptv LEFT JOIN training_venue tv ON ptv.venue_id = tv.id WHERE ptv.program_id = ? ORDER BY tv.order ASC");
                    $st->execute(array($program['id']));
                    $venues = $st->fetchAll(PDO::FETCH_ASSOC);
                    foreach($venues as $venue):
                        $venue_name = $venue['venue'];
                        
                        $pdf->SetFont('Arial','BI',9);
                        $pdf->Row(array("","$venue_name","","","","","",'','','','','','','',''));
                        $st = $pdo->prepare("SELECT * FROM program_items WHERE created_by = ? AND program_id =? AND venue_id = ? GROUP BY item ORDER BY item ASC");
                        $st->execute(array($section,$program['id'],$venue['id']));
                        $program_items = $st->fetchAll(PDO::FETCH_ASSOC);
                        
                        foreach($program_items as $items):
                            $item = $items['item'];
                            $unit = $items['unit'];
                            $quantity = $items['quantity'];
                            $amount = $items['amount'];
                            $row_total = $quantity * $amount;
                            $program_row_total += $row_total;
                            
                            $row_total = $row_total > 0 ? number_format($row_total,2) : '';
                            $quantity = $items['quantity'] > 0 ? number_format($items['quantity']) : '';
                            $amount = $items['amount'] > 0 ? number_format($items['amount'],2) : '';
                        
                            $pdf->SetFont('Arial','',9);
                            $pdf->Row(array($row_num,"$item",$quantity,$unit,$row_total,$quantity,$amount,'','','','','','','',''));
                            $row_num++;
                        endforeach;
                    endforeach;
                    $label++;
                    $grand_total += $program_row_total;
                    $program_row_total = $program_row_total > 0 ? number_format($program_row_total,2) : '';
                    $pdf->SetFont('Arial','B',10);
                    $pdf->Row(array("","\t\t\t\t\t\t\t\t\t\t\t\t","","Total",$program_row_total,"","",'','','','','','','',''));
                endforeach;
            }
        }
    endforeach;
   
?>