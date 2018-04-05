
@extends('layout.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="glyphicon glyphicon-tasks" aria-hidden="true"></i>
                        </div>
                        <div class="content">
                            <div class="text">PPMP Plans</div>
                            <div class="number count-to" data-from="0" data-to="{{ $plan_count }}" data-speed="15" data-fresh-interval="20">{{ $plan_count }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" id="rightsidebar">
                    <div class="info-box bg-cyan hover-expand-effect">

                        <div class="icon">
                            <i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
                        </div>
                        <div class="content">
                            <div class="text">ITEMS</div>
                            <div class="number count-to" data-from="0" data-to="{{ $items }}" data-speed="1000" data-fresh-interval="20">{{ $items }}</div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="glyphicon glyphicon-folder-open"></i>
                        </div>
                        <div class="content">
                            <div class="text">ITEM EXPENSES</div>
                            <div class="number count-to" data-from="0" data-speed="1000" data-fresh-interval="20">{{ DB::table('ppmp_code')->where('section','=', Auth::user()->section)->count() }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="glyphicon glyphicon-filter" aria-hidden="true"></i>
                        </div>
                        <div class="content">
                            <div class="text">ITEM UNITS</div>
                            <div class="number count-to" data-from="0" data-to="{{ DB::table('unit')->count() }}" data-speed="1000" data-fresh-interval="20">{{ DB::table('unit')->count() }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>PLAN INFOS</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="glyphicon glyphicon-option-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{ asset('create/plan') }}">Create Plan</a></li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                    <tr>
                                        <th>PLAN CODE</th>
                                        <th>FUNDS</th>
                                        <th>STATUS</th>
                                        <th>CREATED BY</th>
                                        <th>EXPENSE PROGRESS</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($plans as $plan)
                                        <tr>
                                            <td>{{ $plan->plancode }}</td>
                                            <td>{{ $plan->source_fund }}</td>
                                            <td>
                                                @if($plan->status == 1)
                                                    <span class="label bg-green">PLANNING</span>
                                                @else
                                                    <span class="label bg-red">DELETED</span>
                                                @endif
                                            </td>
                                            <td>{{ $plan->created_by }}</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

@endsection