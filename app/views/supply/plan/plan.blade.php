
@extends('layout.main')
@section('content')
    @include('admin.layout.loading_search')

    <section class="content">

        <div class="container-fluid">
            <div class="row clearfix">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <ol class="breadcrumb breadcrumb-bg-teal align-left">
                            <li><a href="javascript:void(0);"><i class="glyphicon glyphicon-list-alt"></i> PPMP Plans</a></li>
                        </ol>
                        <div class="header">
                            <h4>PPMP Plans</h4>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);"  class="dropdown-toggle btn btn-danger btn-circle-lg waves-effect waves-circle waves-float" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >
                                        <i class="glyphicon glyphicon-option-vertical" style="color: white;"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="{{ asset('create/plan') }}">
                                                <i class="glyphicon glyphicon-plus"></i>
                                                Create
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="js-search" data-close="true">
                                                <i class="glyphicon glyphicon-search"></i>
                                                Search
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        @if(count($plans) > 0)
                            <div class="body table-responsive">

                                <table class="table table-hover dashboard-task-infos" border="0">
                                    <thead>
                                    <tr>
                                        <th>DATE CREATED</th>
                                        <th>PLAN SOURCE FUND</th>
                                        <th>PLAN DESCRIPTION</th>


                                        <th width="20"></th>
                                        <th width="20"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($plans as $plan)
                                        <tr>
                                            <?php
                                            $tempDate = $plan->date_created;
                                            $month = date('F j, Y',strtotime($tempDate));

                                            ?>
                                            <td>{{ $month }}</td>
                                            <td><span class="font-bold col-pink">{{ $plan->source_fund }}</span></td>
                                            <td><span class="font-bold col-pink">{{ $plan->remarks }}</span></td>

                                            <td>
                                                <a href="{{ asset('plan/information?plancode='.$plan->plancode) }}" class="btn btn-info btn-circle waves-effect waves-circle waves-float">
                                                    <i class="glyphicon glyphicon-log-in"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <button class="btn bg-orange btn-circle waves-effect waves-circle waves-float" data-container="body" data-toggle="popover" data-placement="left" title="Are you sure you want to delete?" data-content="<a type='button' href='{{ asset('remove/p/'.$plan->plancode) }}' class='btn btn-white btn-info'>Continue ?</a>">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="table-responsive">
                                <center>
                                    <strong>Plan record is empty!</strong>
                                    <p>
                                        <a href="{{ asset('create/plan') }}" class="btn bg-deep-orange waves-effect">Create Plan</a>
                                    </p>
                                </center>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <center>
                    {{ $plans->links() }}
                </center>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $("[data-toggle=popover]").popover({
            html: true,
            content: function() {
                return $('#popover-content').html();
            }
        });
    </script>
@endsection
