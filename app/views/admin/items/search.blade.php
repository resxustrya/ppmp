
@extends('layout.main')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="card">
                        <div class="header">
                            <h4>Search Items</h4>
                        </div>
                        <div class="form-group">
                            <form action="{{ asset('s/i') }}" method="POST" id="ppmpitems">
                                <div class="body table-responsive">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="search" id="txt_srcfunds" class="form-control" value="{{ isset($keyword) ? $keyword : "" }}" placeholder="Search here" autofocus="true" autocomplete="false">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn bg-red btn-block btn-lg waves-effect">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @if(isset($items))
                            <div class="header">
                                <h4>Search Result for "{{ $keyword }}"</h4>
                            </div>
                            <div class="body table-responsive">
                                <table  id="item_table" class="table">
                                    <thead>
                                    <tr>
                                        <th width="10%">
                                            <i class="ace-icon glyphicon glyphicon-tag"></i>
                                            Item Code
                                        </th>
                                        <th width="20%">
                                            <i class="ace-icon glyphicon glyphicon-tags"></i>
                                            Expense Title
                                        </th>
                                        <th width="40%">
                                            <i class="ace-icon glyphicon glyphicon-tags"></i>
                                            Item Description
                                        </th>
                                        <th width="20%">Item Unit</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($items as $item)
                                            <tr>
                                                <td>{{ $item->code }} </td>
                                                <td><strong>{{ DB::table('ppmp_code')->where('ppcode','=', $item->ppcode)->first()->description }}</strong></td>
                                                <td><strong style="font-size:1.2em;">{{ $item->description }}</strong> </td>
                                                <td><strong>{{ $item->unit}}</strong></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
@section('js')
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