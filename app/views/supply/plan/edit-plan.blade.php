
@extends('layout.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <form action="{{ asset('update/plan') }}" method="POST" id="ppmpitems">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h6>UPDATE PPMP PLAN</h6>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="glyphicon glyphicon-option-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="javascript:void(0);" onclick="showItem(this);" data-link="{{ asset('get/items') }}">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                    Add Item
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" onclick="submit();">
                                                    <i class="glyphicon glyphicon-save"></i>
                                                    Save Plan
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
                                        <input type="text" name="txt_srcfunds" id="txt_srcfunds" value="{{  }}" onkeyup="setSrcFunds(this);" class="form-control" placeholder="Enter Source of Funds">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="body table-responsive">
                                    <table class="table table-bordered text-center" id="ppmptable">
                                        <thead>
                                        <tr>
                                            <th rowspan="3">Item No.</th>
                                            <th rowspan="3">Item Description/ General Specification</th>
                                            <th rowspan="3">Total Qty.</th>
                                            <th rowspan="3">Unit</th>
                                            <th rowspan="3">Total Amount</th>
                                            <th colspan="4">First Semester</th>
                                            <th colspan="4">Second Semester</th>
                                            <th rowspan="3">Recomended <br />Procurement<br /> Method</th>
                                            <th rowspan="3">SOURCE OF <br />FUND</th>
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
                                        <tr class="alert alert-success">
                                            <td></td>
                                            <td>
                                                <strong><em>{{ $pp_code->description }}</em></strong>
                                                <input type="hidden" name="pp_code" value="{{ $pp_code->ppcode }}" />
                                            </td>
                                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                        </tr>
                                            @if(count($items) > 0)
                                                @foreach($items as $item)
                                                    <tr id="{{ $item->itemcode }}">
                                                        <td>{{ $item->itemcode }}</td>
                                                        <td>{{ $item->item_desc }}</td>
                                                        <td><strong id="quantity{{ $item->itemcode }}"></strong> </td>
                                                        <td><input type='text' name='unit[]' value="{{ $item->unit }}" required class='numberonly form-control' readonly /></td>
                                                        <td><strong id="amount{{$item->itemcode}}"></strong></td>
                                                        <td>
                                                            <input type='hidden' name='code[]' value="{{ $item->itemcode }}" required class='numberonly form-control' placeholder='0'/>
                                                            <input type='hidden' name='item-desc[]' value="{{ $item->item_desc }}" required class='numberonly form-control' placeholder='0'/>
                                                            <input type='text' id="q1qty{{ $item->itemcode }}" name='q1qty[]' value="{{ $item->q1qty }}" required class='numberonly form-control' onkeyup='computeQtyAmount(this,{{ $item->itemcode }});' placeholder='0'/>
                                                        </td>
                                                        <td><input type='text' id="q1unitcost{{$item->itemcode}}" name='q1unitcost[]' value="{{ $item->q1cost }}" required class='numberonly form-control' onkeyup='computeQtyAmount(this,{{ $item->itemcode }});' placeholder='0.00'/></td>
                                                        <td><input type='text' id="q2qty{{$item->itemcode}}" name='q2qty[]' value="{{ $item->q2qty }}" required class='numberonly form-control' onkeyup='computeQtyAmount(this,{{ $item->itemcode }});' placeholder='0'/></td>
                                                        <td><input type='text' id="q2unitcost{{$item->itemcode}}" name='q2unitcost[]' value="{{ $item->q2cost }}" required class='numberonly form-control' onkeyup='computeQtyAmount(this,{{ $item->itemcode }});' placeholder='0.0'/></td>
                                                        <td><input type='text' id="q3qty{{ $item->itemcode }}" name='q3qty[]' value="{{ $item->q3qty }}" required class='numberonly form-control' onkeyup='computeQtyAmount(this,{{ $item->itemcode }});' placeholder='0' /></td>
                                                        <td><input type='text' id="q3unitcost{{ $item->itemcode }}" value="{{ $item->q3cost }}" name='q3unitcost[]' required class='numberonly form-control' onkeyup='computeQtyAmount(this,{{ $item->itemcode }});' placeholder='0.0'/></td>
                                                        <td><input type='text' id="q4qty{{ $item->itemcode }}" name='q4qty[]'  value="{{ $item->q4qty }}" required class='numberonly form-control' onkeyup='computeQtyAmount(this,{{ $item->itemcode }});' placeholder='0' /></td>
                                                        <td><input type='text' id="q4unitcost{{ $item->itemcode }}" name='q4unitcost[]' value="{{ $item->q4cost }}" required class='numberonly form-control' onkeyup='computeQtyAmount(this,{{ $item->itemcode }});' placeholder='0.0'/></td>
                                                        <td><input type='text' name='recomethod[]' value="{{ $item->recomethod }}" required class='form-control' /></td>
                                                        <td><input type='text' name='srcfunds[]' value="{{ $item->sourcefund }}" required class='form-control srcfunds' readonly /></td>
                                                        <td><a href='javascript:void(0);' data-id="{{ $item->itemcode }}" onclick='removeEl(this);'><span style='cursor: hand;' class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                    <center>
                                        <button type="button" class="btn btn-danger waves-effect" data-link="{{ asset('select/expense/code') }}" onclick="selectExpenseCode(this);">Create another expense code </button>
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

@section('css')
    <style>
        #ppmptable {
            font-size: smaller;
        }
        #ppmptable th {
            text-align: center;
        }
        #ppmptable td {
            text-align: center;
        }
        #ppmptable input {
            text-align: center;
        }

    </style>
@endsection