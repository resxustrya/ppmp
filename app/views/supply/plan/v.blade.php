
@extends('layout.main')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <form action="{{ asset('v') }}" method="POST" id="ppmpitems">
                <input type="hidden" name="plancode" value="{{ $plan->plancode }}" >
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <ol class="breadcrumb breadcrumb-bg-teal align-left">
                                <li><a href="{{ asset('plan') }}"><i class="glyphicon glyphicon-list-alt"></i> PPMP Plans</a></li>
                                <li><a href="{{ asset('plan/information?plancode='.$plan->plancode) }}"> Plan information ( {{ $plan->remarks }} )</a></li>
                                <li><a href="javascript:void(0);"> {{ $expense->description }}</a></li>
                            </ol>
                            <div class="header">
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-danger btn-circle-lg waves-effect waves-circle waves-float" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="glyphicon glyphicon-option-vertical" style="color: white;"></i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="{{ asset('d/'.$plan->plancode.'/'.$expense->ppcode) }}">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                    Delete Expense
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" onclick="submit();">
                                                    <i class="glyphicon glyphicon-save"></i>
                                                    Save
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
                                    <table id="ppmpitems" border="1">
                                        <thead>
                                        <tr>
                                            <th rowspan="3">Item No.</th>
                                            <th rowspan="3">Item Description/ General Specification</th>
                                            <th rowspan="3">Total Qty.</th>
                                            <th rowspan="3">Unit</th>
                                            <th rowspan="3">Total Amount</th>
                                            <th colspan="4">First Semester</th>
                                            <th colspan="4">Second Semester</th>
                                            <th rowspan="3"></th>
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
                                        <tr class='alert alert-success' id='code_txt'><td></td> <td>
                                                <strong><em id="selected_ppcode" data-id="{{ $expense->ppcode }}">{{ $expense->description }}</em></strong>
                                                </td>
                                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                        </tr>
                                        @if(count($items) > 0)
                                            @foreach($items as $item)
                                                <?php
                                                    $totalqty = (float)$item->q1qty + $item->q2qty + $item->q3qty + $item->q4qty;
                                                    $subtotal = (float)$item->q1cost + $item->q2cost + $item->q3cost + $item->q4cost;
                                                    $rowtotal = (float)$totalqty * $subtotal;
                                                    $item->q1qty = $item->q1qty == 0 ? '' : $item->q1qty;
                                                    $item->q1cost = $item->q1cost == 0 ? '' : $item->q1cost;

                                                    $item->q2qty = $item->q2qty == 0 ? '' : $item->q2qty;
                                                    $item->q2cost = $item->q2cost == 0 ? '' : $item->q2cost;

                                                    $item->q3qty = $item->q3qty == 0 ? '' : $item->q3qty;
                                                    $item->q3cost = $item->q3cost == 0 ? '' : $item->q3cost;

                                                    $item->q4qty = $item->q4qty == 0 ? '' : $item->q4qty;
                                                    $item->q4cost = $item->q4cost == 0 ? '' : $item->q4cost;
                                                ?>
                                                <tr id="{{ $item->itemcode }}">
                                                    <td>{{ $item->itemcode }}</td>
                                                    <td>{{ $item->item_desc }}</td>
                                                    <td><strong id="quantity{{$item->itemcode}}">{{ number_format(sprintf("%0.2f",$totalqty),2) }}</strong> </td>
                                                    <td>
                                                        <input type='text' name='unit[]' value='{{ $item->unit }}' required class='numberonly form-control' readonly />
                                                    </td>
                                                    <td><strong id="amount{{$item->itemcode}}">{{ number_format(sprintf("%0.2f",$rowtotal),2) }}</strong></td>
                                                    <td>
                                                        <input type='hidden' name='code[]' value="{{ $item->itemcode }}" required class='numberonly form-control' placeholder='0'/>
                                                        <input type='hidden' name='item-desc[]' value="{{ $item->item_desc }}" required class='numberonly form-control' placeholder='0'/>
                                                        <input type='text' id='q1qty{{$item->itemcode}}' name='q1qty[]' value="{{ sprintf("%0.2f",$item->q1qty) }}" required class='numberonly form-control' onblur='computeQtyAmount(this,{{ $item->itemcode }});' placeholder='0'/>
                                                    </td>
                                                  <td><input type='number' id='q1unitcost{{ $item->itemcode }}' name='q1unitcost[]' value="{{ sprintf("%0.2f",$item->q1cost) }}" required class='numberonly form-control' onblur='computeQtyAmount(this,{{ $item->itemcode }});' placeholder='0.00'/></td>
                                                  <td><input type='number' id='q2qty{{ $item->itemcode }}' name='q2qty[]' value="{{ sprintf("%0.2f",$item->q2qty) }}" required class='numberonly form-control' onblur='computeQtyAmount(this,{{ $item->itemcode }});' placeholder='0'/></td>
                                                  <td><input type='number' id='q2unitcost{{ $item->itemcode }}' name='q2unitcost[]' value="{{ sprintf("%0.2f",$item->q2cost) }}" required class='numberonly form-control' onblur='computeQtyAmount(this,{{ $item->itemcode }});' placeholder='0.0'/></td>
                                                  <td><input type='number' id='q3qty{{ $item->itemcode }}' name='q3qty[]' value="{{ sprintf("%0.2f",$item->q3qty) }}" required class='numberonly form-control' onblur='computeQtyAmount(this,{{ $item->itemcode }});' placeholder='0' /></td>
                                                  <td><input type='number' id='q3unitcost{{ $item->itemcode }}' name='q3unitcost[]' value="{{ sprintf("%0.2f",$item->q3cost) }}" required class='numberonly form-control' onblur='computeQtyAmount(this,{{ $item->itemcode }});' placeholder='0.0'/></td>
                                                  <td><input type='number' id='q4qty{{ $item->itemcode }}' name='q4qty[]' required value="{{ sprintf("%0.2f",$item->q4qty) }}" class='numberonly form-control' onblur='computeQtyAmount(this,{{ $item->itemcode }});' placeholder='0' /></td>
                                                  <td><input type='number' id='q4unitcost{{ $item->itemcode }}' name='q4unitcost[]' value="{{ sprintf("%0.2f",$item->q4cost) }}" required class='numberonly form-control' onblur='computeQtyAmount(this,{{ $item->itemcode }});' placeholder='0.0'/></td>
                                                  <td><a href='javascript:void(0);' data-id='{{ $item->itemcode }}' onclick='removeEl(this);'> <span style='cursor: hand;' class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td>
                                                </tr>

                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                    <div class="table table-responsive" style="padding: 10px;">
                                        <center class="next_code">
                                            <button type="button" class="btn btn-danger waves-effect" onclick="showItem(this);" data-link="{{ asset('get/items') }}">Add new item </button>
                                        </center>
                                    </div>

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
    <script>
        function selectExpense()
        {
            $('#code_txt').remove();
            $("#ppmptable tbody").html('');
            var val = $("#selectpicker").val();
            var text = $("#selectpicker").find(":selected").text();
            var code =  $("#selectpicker").find(":selected").val();
            var url = $("#selectpicker").data('url');
            var data = {
                'ppcode' : code,
                'plancode' : {{ $plan->plancode }}
            };
            if(val == 0){
                $("#has_error").html("<span style='color: red;'>Before you can proceed you must select an expense code.</span>")
            } else {
                $.get(url,data,function(data){
                    if(data != code) {
                        var html = "<tr class='alert alert-success' id='code_txt'><td></td> <td>" +
                                "<strong><em>"+ text +"</em></strong>" +
                                "<input type='hidden' name='pp_code' value='" + val + "' /></td>" +
                                "<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>"+
                                "</tr>";
                        $("#ppmpitems").append(html);
                        $("#select_expense_code").modal('hide');
                    } else {
                        showNotification("alert-danger","Expense title " + text + " already exist in the plan", "bottom", "center", null, null);
                    }
                });
            }
        }
    </script>
@endsection

@section('css')
    <style>
        #ppmpitems {
            border-collapse: collapse;
            width: 100%;
        }

        #ppmpitems th,td{
            text-align: center;
            padding: 4px;
            border: 1px solid #ddd;
            font-size:1.5ex;
        }
        #ppmpitems td input {
            font-size:1.7ex;
        }
        #ppmpitems td {
            font-weight: bold;
        }

        #ppmpitems input {
            text-align: center;
        }


    </style>
@endsection