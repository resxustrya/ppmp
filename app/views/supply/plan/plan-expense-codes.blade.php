
@extends('layout.main')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <form action="{{ asset('expense/items') }}" method="POST" id="ppmpitems">
                <input type="hidden" name="plancode" value="{{ $plan->plancode }}" >
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <ol class="breadcrumb breadcrumb-bg-teal align-left">
                                <li><a href="{{ asset('plan') }}"><i class="glyphicon glyphicon-list-alt"></i> PPMP Plans</a></li>
                                <li><a href="{{ asset('plan/information?plancode='.$plan->plancode) }}"> Plan information ( {{ $plan->remarks }} )</a></li>
                                <li><a href="javascript:void(0);"> Plan expense items</a></li>
                            </ol>
                            <div class="header">
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-danger btn-circle-lg waves-effect waves-circle waves-float" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="glyphicon glyphicon-option-vertical" style="color: white;"></i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="javascript:void(0);"  onclick="selectExpenseCode();" >
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                    Select Expense
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
                                    <table id="ppmpitems">
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
                                "<strong><em id='selected_ppcode' data-id='" + code +"'>"+ text +"</em></strong>" +
                                "<input type='hidden' name='pp_code' value='" + val + "' /></td>" +
                                "<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>"+
                                "</tr>";
                        $("#ppmpitems tbody").append(html);
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

        #ppmpitems th,td, td input {
            text-align: center;
            padding: 4px;
            border: 1px solid #ddd;
            font-size:1.5ex;
        }
        #ppmpitems td {
            font-weight: bold;
        }

        #ppmpitems input {
            text-align: center;
        }

    </style>
@endsection