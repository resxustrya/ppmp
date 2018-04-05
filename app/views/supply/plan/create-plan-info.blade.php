
@extends('layout.main')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <form action="{{ asset('create/plan') }}" method="POST" id="ppmpitems">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <ol class="breadcrumb breadcrumb-bg-teal align-left">
                                <li><a href="{{ asset('plan') }}"><i class="glyphicon glyphicon-list-alt"></i> PPMP Plans</a></li>
                                <li><a href="javascript:void(0);"> Plan information ( {{ $plan->remarks }} )</a></li>
                            </ol>
                            <div class="header">
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-danger btn-circle-lg waves-effect waves-circle waves-float" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="glyphicon glyphicon-option-vertical" style="color: white;"></i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="{{ asset('expense/items?plancode='.$plan->plancode) }}" >
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                    Create Expense
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ asset('print/print_plan.php?plancode='.$plan->plancode) }}">

                                                    <i class="glyphicon glyphicon-print"></i>
                                                    Print Plan
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ asset('plan') }}">
                                                    <i class="glyphicon glyphicon-remove-circle"></i>
                                                    Exit
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group">
                                <div class="body table-responsive">
                                    <div class="form-line">
                                        <label for="txt_srcfunds">Source of Funds</label>
                                        <input type="text" name="txt_srcfunds" id="txt_srcfunds" value="{{ $plan->source_fund }}" class="form-control" placeholder="Enter Source of Funds" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="body table-responsive">
                                    <table border="1" id="ppmptable">
                                        <thead>
                                        <tr>
                                            <th rowspan="3" width="6%">Item No.</th>
                                            <th rowspan="3" width="20%">Item Description/ General Specification</th>
                                            <th rowspan="3" width="5%">Total Qty.</th>
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
                                                <tr class="alert alert-success">
                                                    <td></td>
                                                    <td>
                                                        <a href="{{ asset('v/'.$plan->plancode.'/'.$plan_code->ppcode) }}" style="color:white;">
                                                            <strong><em>{{ DB::table('ppmp_code')->where('ppcode','=',$plan_code->ppcode)->first()->description }}</em></strong>
                                                        </a>
                                                        <br />
                                                        (COMMON-USE/REGULAR/STANDARD OFFICE SUPPLIES)<br />
                                                        (CONSUMABLE)<br />
                                                        (PER EMPLOYEE)
                                                    </td>
                                                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                                </tr>
                                                @foreach(DB::table('ppmpitems')->where('ppcode','=',$plan_code->ppcode)->where('plancode','=', $plan->plancode)->get() as $item)
                                                    <?php
                                                    $totalqty = (float)$item->q1qty + $item->q2qty + $item->q3qty + $item->q4qty;
                                                    $subtotal = (float)$item->q1cost + $item->q2cost + $item->q3cost + $item->q4cost;
                                                    $rowtotal = (float)$totalqty * $subtotal;
                                                    $total += $rowtotal;
                                                    $item->q1qty = $item->q1qty == 0 ? '' : number_format($item->q1qty);
                                                    $item->q1cost = $item->q1cost == 0 ? '' : number_format($item->q1cost,2);

                                                    $item->q2qty = $item->q2qty == 0 ? '' : number_format($item->q2qty);
                                                    $item->q2cost = $item->q2cost == 0 ? '' : number_format($item->q2cost,2);

                                                    $item->q3qty = $item->q3qty == 0 ? '' : number_format($item->q3qty);
                                                    $item->q3cost = $item->q3cost == 0 ? '' : number_format($item->q3cost,2);

                                                    $item->q4qty = $item->q4qty == 0 ? '' : number_format($item->q4qty);
                                                    $item->q4cost = $item->q4cost == 0 ? '' : number_format($item->q4cost,2);

                                                    $rowtotal = $rowtotal == 0 ? '' : number_format($rowtotal,2);
                                                    $totalqty = $totalqty == 0 ? '' : number_format($totalqty);

                                                    ?>
                                                    <tr id="{{ $item->itemcode }}">
                                                        <td>{{ $item->itemcode }}</td>
                                                        <td>{{ $item->item_desc }}</td>
                                                        <td>{{ $totalqty }}</td>
                                                        <td>{{ $item->unit }}</td>
                                                        <td>{{ $rowtotal }}</td>
                                                        <td>{{ $item->q1qty }}</td>
                                                        <td>{{ $item->q1cost }}</td>
                                                        <td>{{ $item->q2qty }}</td>
                                                        <td>{{ $item->q2cost }}</td>
                                                        <td>{{ $item->q3qty }}</td>
                                                        <td>{{ $item->q3cost }}</td>
                                                        <td>{{ $item->q4qty }}</td>
                                                        <td>{{ $item->q4cost }}</td>
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
                                                <td colspan="10"></td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table table-responsive" style="padding: 10px;">
                                    <center class="next_code">
                                            <a href="{{ asset('expense/items?plancode='.$plan->plancode) }}" class="btn btn-danger waves-effect" >Create expense code </a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('js')

@endsection

@section('css')
    <style>
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

    </style>
@endsection