<?php
    
    $st = $pdo->prepare("SELECT * FROM ppmp_code WHERE id <> 1 AND id <> 2 ");
    $st->execute();
    $codes = $st->fetchAll(PDO::FETCH_ASSOC);
    $code_name = null;
    $ppcode = null;
    $row_amount = null;
    
    $expense_grand_total = 0;

    foreach($codes as $code):
        $expense_grand_total = 0;

        $code_name = $code['expense_name'];
        $ppcode = $code['id'];
        $id = $code['id'];
        $oneline = $code['oneline'];

        $pdf->SetWidths(array(10,100,20,20,25,25,25,10,15,8,15,7,15,25,20));
        if($oneline) {
            $quantity = null;
            $row_amount = null;
            $amount = null;
            $st = $pdo->prepare("SELECT * FROM open_list WHERE ppcode = ? AND created_by = ? LIMIT 1");
            $st->execute(array($ppcode,$divisionid));
            $result = $st->fetch(PDO::FETCH_ASSOC);
            
                $unit = $result['unit'] ? $result['unit'] : null;
                $quantity = $result['quantity'] ? $result['quantity'] : null;
                $amount = $result['amount'] ? $result['amount'] : null;
                $expense_name = $result['item'];
                if($amount AND $quantity) {
                    $row_amount = $quantity * $amount;
                    $grand_total += $row_amount;
                }
                $amount = $amount > 0 ? number_format($amount,2) : null;
                $row_amount = $row_amount > 0 ? number_format($row_amount,2) : null;
                $quantity = $quantity > 0 ? number_format($quantity) : null;

                $pdf->SetFont('Arial','B',9);
                $pdf->Row(array($row_num,roman($id).".\t\t $expense_name",$quantity,$unit,$row_amount,$quantity,$amount,'','','','','','','Public Bidding',$division_name['source_fund']));
                $row_num++;
            
        } else {
            $pdf->SetFont('Arial','B',9);
            
            $pdf->Row(array("",roman($id)."."."\t\t".$code_name,'','','','','','','','','','','','Public Bidding',$division_name['source_fund']));
            

            
            $st = $pdo->prepare("SELECT s.description as description, s.id as id FROM section s LEFT JOIN open_list ol ON s.id = ol.created_by WHERE ol.division = ? GROUP BY ol.created_by ORDER BY ol.created_by");
            $st->execute(array($divisionid));
            $open_sections = $st->fetchAll(PDO::FETCH_ASSOC);

            foreach($open_sections as $section):
                $total_quantity_row = 0;
                $total_amount_row = 0;
                $total_amount_row = 0;
                $st = $pdo->prepare("SELECT * FROM open_list WHERE ppcode = ? AND division = ? AND created_by = ? AND quantity > 0 GROUP BY item ORDER BY item");
                $st->execute(array($ppcode,$divisionid,$section['id']));
                $open_list = $st->fetchAll(PDO::FETCH_ASSOC);

                if(count($open_list) > 0) {
                    $pdf->SetFont('Arial','BI',9);
                    $pdf->Row(array("","","","","","","",'','','','','','','',''));
                    $pdf->Row(array("",strtoupper($section['description']),"","","","","",'','','','','','','',''));
                    $over_total = 0;
                    foreach($open_list as $list):
                        $total_amount_row = 0;
                        $st = $pdo->prepare("SELECT quantity as qty,amount from open_list WHERE ppcode = ? AND item = ? AND created_by = ? GROUP BY item LIMIT 1");
                        $st->execute(array($ppcode,$list['item'],$section['id']));
                        $result = $st->fetch(PDO::FETCH_ASSOC);
                        if($result) {
                            $total_quantity_row = $result['qty'];
                            if($result['amount']) {
                                $amount = $result['amount'];
                                $total_amount_row += $total_quantity_row * $amount;
                                $expense_grand_total += $total_amount_row;
                                $grand_total += $total_amount_row;
                            } else {
                                $amount = 0;
                            }
                        }
                        if($total_quantity_row > 0) {
                            $pdf->SetFont('Arial','',9);
                            $pdf->Row(array($row_num,$list['item'],number_format($total_quantity_row),$list['unit'],number_format($total_amount_row,2),number_format($total_quantity_row),number_format($amount,2),'','','','','','','',''));
                            $row_num++;
                        }
                    endforeach;

                }
                
            endforeach;

            // DISPLAY EACH PROGRAM EXPENSE


            $st = $pdo->prepare("SELECT s.id as id , s.description as description  FROM program_name pn LEFT JOIN section s on pn.section = s.id WHERE pn.division = ? AND pn.ppcode = ? GROUP BY pn.section");
            $st->execute(array($divisionid,$ppcode));
            $section_programs = $st->fetchAll(PDO::FETCH_ASSOC);

            if(count($section_programs) > 0) {

                foreach($section_programs as $section_result):

                    $st = $pdo->prepare("SELECT * FROM program_name WHERE section = ? AND division = ? AND ppcode = ?");
                    $st->execute(array($section_result['id'],$divisionid,$ppcode));
                    $programs = $st->fetchAll(PDO::FETCH_ASSOC);
                    if($programs) {

                        $pdf->SetWidths(array(0,110,20,20,25,25,25,10,15,8,15,7,15,25,20));
                        $pdf->SetFont('Arial','BIU',10);
                        $pdf->Row(array("",$section_result['description'],"","","","","",'','','','','','','',''));

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

                                
                                $st = $pdo->prepare("SELECT * FROM program_items WHERE created_by = ? AND program_id =? AND venue_id = ? AND quantity > 0 GROUP BY item ORDER BY item ASC");
                                $st->execute(array($section_result['id'],$program['id'],$venue['id']));
                                $program_items = $st->fetchAll(PDO::FETCH_ASSOC);
                                
                                if($program_items) {
                                    $pdf->SetFont('Arial','BI',9);
                                    $pdf->Row(array("","$venue_name","","","","","",'','','','','','','',''));
                                }
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

                            $expense_grand_total += $program_row_total;
                            $grand_total += $program_row_total;
                            $program_row_total = $program_row_total > 0 ? number_format($program_row_total,2) : '';
                           
                        endforeach;
                    }
                endforeach;
            }
        }
        if($expense_grand_total > 0) {
            $pdf->SetFont('Arial','B',9);
            $pdf->Row(array("",$code_name." TOTAL ","","",number_format($expense_grand_total,2),"","",'','','','','','','',''));
        }
        
    endforeach;
?>