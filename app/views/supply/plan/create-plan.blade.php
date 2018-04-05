
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
                                <li><a href="javascript:void(0);"><i class="glyphicon glyphicon-pencil"></i> Create plan source funds and remarks</a></li>
                            </ol>
                            <div class="form-group">
                                <div class="body table-responsive">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="txt_srcfunds" id="txt_srcfunds" required onkeyup="setSrcFunds(this);" class="form-control" placeholder="Enter plan source of fund" autocomplete="false">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="remarks" id="remarks"  class="form-control" required placeholder="Enter plan remarks" autocomplete="false">
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