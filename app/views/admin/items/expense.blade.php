
@extends('layout.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Expense Accounts Title</h2>
            </div>

            <div class="row clearfix">
                @foreach($ppcodes as $code)

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <a href="{{ asset('e/items/'.$code->ppcode) }}" class="expense_icons">
                            <div class="info-box bg-cyan hover-expand-effect">
                                <div class="icon">
                                   <i class="glyphicon glyphicon-folder-open"></i>
                                </div>
                                <div class="content">
                                    <div class="text"><p><strong>{{ $code->description }}</strong></p><p>Expense Code : {{ $code->ppcode }}</p></div>
                                    <?php $count = DB::table('items')->where('ppcode','=',$code->ppcode)->where('section','=', Auth::user()->section)->count(); ?>
                                    <div class="number count-to" data-from="0" data-to="{{ $count }}" data-speed="15" data-fresh-interval="20">{{ $count }} </div>
                                </div>
                            </div>
                        </a>
                    </div>

                @endforeach
            </div>
            <div class="row">
                <center>
                    {{ $ppcodes->links() }}
                </center>

            </div>
        </div>
    </section>

@endsection

@section('css')
    <style>
       a:hover {
           text-decoration: none;
       }
    </style>
@endsection