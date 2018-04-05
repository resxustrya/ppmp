<?php 
$pdf->SetFont('Arial','',9);
$st = $pdo->prepare("SELECT * FROM table_a WHERE created_by ='8888' GROUP BY item ORDER BY item ASC");
$st->execute();
$items = $st->fetchAll(PDO::FETCH_ASSOC);


$pdf->SetWidths(array(10,100,20,20,25,25,25,10,15,8,15,7,15,25,20));
$row_total = 0;
$row_amt = 0;
$section_total = 0;
$quantity_total = 0;
$item_amount = 0;
$over_total = 0;
foreach($items as $item):
    $item_name = $item['item'];
    $item_amount = $item['amount'];

    $st = $pdo->prepare("SELECT * FROM section WHERE division =$divisionid");
    $st->execute(array($divisionid));
    $sections = $st->fetchAll(PDO::FETCH_ASSOC);
    if(count($sections) > 0) {
        foreach($sections as $section):
            $st = $pdo->prepare("SELECT quantity from table_a WHERE item = ? AND created_by = ? LIMIT 1");
            $st->execute(array($item_name,$section['id']));
            $quantity = $st->fetch(PDO::FETCH_ASSOC);
            $quantity_total += $quantity['quantity'];
        endforeach;
    }
    if($quantity_total) {
        $section_total = $quantity_total * $item_amount;
        $over_total += $section_total;
        $quantity_total = number_format($quantity_total);
        if($section_total) {
            $section_total = number_format($section_total,2);
        } else {
            $section_total = null;
        }
    } else {
        $quantity_total = null;
    }
    
    $pdf->Row(array($row_num,"\t\t\t\t\t\t\t\t\t\t\t\t".$item['item'],
                $quantity_total,
                $item['unit'],
                $section_total,
                $quantity_total,
                number_format($item_amount,2),'','','','','','','',''
            )); 
    $row_num++;
    
    $quantity_total = null;
    $section_total = null;
endforeach;

$office_supplies_total += $over_total;
$grand_total += $over_total;

$pdf->SetFont('Arial','B',10);
$pdf->Row(array("","\t\t\t\t\t\t\t\t\t\t\t\t","","Total",number_format($over_total,2),"","",'','','','','','','',''));

?>