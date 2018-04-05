<!DOCTYPE html>
<html>
<title>PPMP</title>
<head>
    <style>
        body{
            font-family: 'Roboto', Arial, Tahoma, sans-serif;
            font-size: 5pt;
            color: #555;
        }
        #ppmptable {

            border-collapse: collapse;
            width: 100%;
        }

        #ppmptable th,td {
            text-align: center;
            padding: 4px;
            border: 1px solid #ddd;
            font-size:1.5ex;
        }
        #ppmptable td {
            font-weight: bold;
        }

        #ppmptable input {
            text-align: center;
        }
        td{
            text-align: center;
            padding: 4px;
            border: 1px solid #ddd;
            font-size: 1.5ex;
        }
        td, th {
            display: table-cell;
            vertical-align: inherit;
        }

    </style>
</head>
<body>
    <table border="1" id="ppmptable">
        <thead>
        <tr>
            <th rowspan="3" width="6%">Item No.</th>
            <th rowspan="3" width="16%">Item Description/ General Specification</th>
            <th rowspan="3" width="10%">Total Qty.</th>
            <th rowspan="3" width="5%">Unit</th>
            <th rowspan="3" width="10%">Total Amount</th>
            <th colspan="4">First Semester</th>
            <th colspan="4">Second Semester</th>
            <th rowspan="3">Recomended <br />Procurement<br /> Method</th>
            <th rowspan="3">SOURCE OF <br />FUND</th>
        </tr>
        <tr>
            <th colspan="2">Q1</th>
            <th colspan="2">Q2</th>
            <th colspan="2">Q3</th>
            <th colspan="2">Q4</th>
        </tr>
        <tr>
            <th>Qty.</th>
            <th>Unit Cost</th>
            <th>Qty.</th>
            <th>Unit Cost</th>
            <th>Qty.</th>
            <th>Unit Cost</th>
            <th>Qty.</th>
            <th>Unit Cost</th>
        </tr>
        </thead>
        <tbody>
        <?php $total = 0.00; ?>
        @if($plan_codes)
            @foreach($plan_codes as $plan_code)
                <tr>
                    <td></td>
                    <td>

                        <strong ><em>{{ DB::table('ppmp_code')->where('ppcode','=',$plan_code->ppcode)->first()->description }}</em></strong>
                    </td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                </tr>
                @foreach(DB::table('ppmpitems')->where('ppcode','=',$plan_code->ppcode)->where('plancode','=', $plan->plancode)->get() as $item)
                    <?php
                    $totalqty = $item->q1qty + $item->q2qty + $item->q3qty + $item->q4qty;
                    $subtotal = $item->q1cost + $item->q2cost + $item->q3cost + $item->q4cost;
                    $rowtotal = $totalqty * $subtotal;
                    $total += $rowtotal;
                    ?>
                    <tr id="{{ $item->itemcode }}">
                        <td>{{ $item->itemcode }}</td>
                        <td>{{ $item->item_desc }}</td>
                        <td>{{ number_format($totalqty,2) }}</td>
                        <td>{{ $item->unit }}</td>
                        <td>{{ number_format($rowtotal,2) }}</td>
                        <td>{{ number_format($item->q1qty,2) }}</td>
                        <td>{{ number_format($item->q1cost,2) }}</td>
                        <td>{{ number_format($item->q2qty,2) }}</td>
                        <td>{{ number_format($item->q2cost,2) }}</td>
                        <td>{{ number_format($item->q3qty,2) }}</td>
                        <td>{{ number_format($item->q3cost,2) }}</td>
                        <td>{{ number_format($item->q4qty,2) }}</td>
                        <td>{{ number_format($item->q4cost,2) }}</td>
                        <td>{{ $item->recomethod }}</td>
                        <td>{{ $plan->source_fund }}</td>
                    </tr>
                @endforeach
            @endforeach
            <tr>
                <td></td>
                <td colspan="3">Total</td>
                <td>
                    <strong style="font-size: small;font-weight: bold;">{{ number_format($total,2) }}</strong>
                </td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>
        @endif
        </tbody>
    </table>
</body>
</html>