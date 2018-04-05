
@extends('layout.main')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <form action="{{ asset('create/expense') }}" method="POST" id="ppmpitems">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h4>Expense code details</h4>
                            </div>
                            <div class="form-group">
                                <div class="body table-responsive">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="ppcode" id="txt_srcfunds" required  class="form-control" placeholder="Expense code number here" autofocus="true" autocomplete="false">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="desc" id="remarks"  class="form-control" required placeholder="Expense code account title here" autocomplete="false">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn bg-red btn-block btn-lg waves-effect">SUBMIT</button>
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