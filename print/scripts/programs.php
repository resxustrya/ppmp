<?php

$st = $pdo->prepare("SELECT * FROM program_name WHERE section = ? AND division = ?");
$st->execute(array($section,$divisionid));
$programs = $st->fetchAll(PDO::FETCH_ASSOC);


if($programs) {
    $pdf->SetFont('Arial','B',10);
    $pdf->SetWidths(array(10,100,20,20,25,25,25,10,15,8,15,7,15,25,20));
    $pdf->Row(array('',"",'','','','','','','','','','','','',''));
    $pdf->Row(array('',"TRAINING EXPENSE FOR LOCAL HEALTH PROGRAMS",'','','','','','','','','','','','','')); 
    $pdf->Row(array('',"",'','','','','','','','','','','','','')); 

    
    
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
        $venue_meal ="Venue, Meals, Accomodation";
        $pdf->Row(array("",$venue_meal,'','','','','','','','','','','','',''));

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

   
?>