
@extends('supply.layout.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-md-offset-3">
                    <div class="card">
                        <div class="header">
                            <h2>Item Units</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);"  class="dropdown-toggle btn btn-danger btn-circle-lg waves-effect waves-circle waves-float" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >
                                        <i class="glyphicon glyphicon-option-vertical" style="color: white;"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#item" data-backdrop="static" data-keyboard="false" onclick="addUnit(this);" data-link="{{ asset('n/unit') }}">
                                                <i class="glyphicon glyphicon-plus"></i>
                                                Add unit
                                            </a>
                                        </li>

                                        <li>
                                            <a href="javascript:void(0);" class="js-search" data-close="true">
                                                <i class="glyphicon glyphicon-search"></i>
                                                Search Item
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-hover dashboard-task-infos" id="item_table">
                                <thead class="thin-border-bottom">
                                <tr>
                                    <th>
                                        <i class="ace-icon glyphicon glyphicon-tag"></i>
                                        Unit Code
                                    </th>

                                    <th>
                                        <i class="ace-icon glyphicon glyphicon-tags"></i>
                                        Unit Description
                                    </th>
                                    <th width="10"></th>
                                    <th width="10"></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($units as $unit)
                                    <tr>
                                        <td><strong>{{ $unit->unitcode }}</strong> </td>
                                        <td><strong style="font-size:1.2em;">{{ $unit->unit }}</strong> </td>
                                        <td>
                                            <button data-link="{{ asset('e/unit?id='.$unit->id) }}" onclick="edit(this);" class="btn btn-info btn-circle waves-effect waves-circle waves-float">
                                                <i class="glyphicon glyphicon-log-in"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn bg-orange btn-circle waves-effect waves-circle waves-float" data-container="body" data-toggle="popover" data-placement="left" title="Are you sure you want to delete?" data-content="<a type='button' href='{{ asset('d/unit?id='.$unit->id) }}' class='btn btn-white btn-info'>Continue ?</a>">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </button>
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
    </section>

@endsection

@section('js')
<script>
    function addUnit(element)
    {
        var url = $(element).data('link');
        
        $('.modal_content').html('');
        $('#checking').hide();
        $('#item_label').text('Add new item unit');
        $('.loading').show();
        setTimeout(function (){
            $.get(url, function(data){
                $('.loading').hide();
                $('.modal_content').html(data);
            });
        },1000);
    }
    $("[data-toggle=popover]").popover({
        html: true,
        content: function() {
            return $('#popover-content').html();
        }
    });

    function edit(el)
    {
        var url = $(el).data('link');
        $('.modal_content').html('');
        $('#checking').hide();
        $('#item_label').text('Edit item unit');
        $('.loading').show();
        $("#item").modal('show');
        setTimeout(function (){
            $.get(url, function(data){
                $('.loading').hide();
                $('.modal_content').html(data);
            });
        },1000);
    }

</script>
@endsection