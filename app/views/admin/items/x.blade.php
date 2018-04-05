
@extends('layout.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <ol class="breadcrumb breadcrumb-bg-teal align-left">
                            <li><a href="{{ asset('expense/codes') }}"><i class="glyphicon glyphicon-list-alt"></i> Expense Codes</a></li>
                            <li><a href="javascript:void(0);"> {{ $ppcode->description }} ( {{ $ppcode->ppcode }} )</a></li>
                        </ol>
                        <div class="header">

                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);"  class="dropdown-toggle btn btn-danger btn-circle-lg waves-effect waves-circle waves-float" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >
                                        <i class="glyphicon glyphicon-option-vertical" style="color: white;"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#item" data-backdrop="static" data-keyboard="false" onclick="addItem(this);" data-link="{{ asset('n/item') }}">
                                                <i class="glyphicon glyphicon-plus"></i>
                                                Add Item
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ asset('e/expense/code?ppcode='.$ppcode->ppcode) }}">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                                Edit account title
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
                                    <th width="5%"></th>
                                    <th width="5%"></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{ $item->code }} </td>
                                        <td><strong>{{ $ppcode->description }}</strong></td>
                                        <td><strong style="font-size:1.2em;">{{ $item->description }}</strong> </td>
                                        <td><strong>{{ $item->unit}}</strong></td>
                                        <td>
                                            <button data-link="{{ asset('e/item?itemcode='.$item->code.'&ppcode='.$ppcode->ppcode) }}" class="btn btn-info btn-circle waves-effect waves-circle waves-float" onclick="edit(this);">
                                                <i class="glyphicon glyphicon-log-in"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn bg-orange btn-circle waves-effect waves-circle waves-float" data-container="body" data-toggle="popover" data-placement="left" title="Are you sure you want to delete?" data-content="<a type='button' href='{{ asset('remove/item/'.$item->code.'/'.$ppcode->ppcode) }}' class='btn btn-white btn-info'>Continue ?</a>">
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
            <div class="row">
                <center>
                    {{ $items->links() }}
                </center>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        function addItem(element)
        {
            var url = $(element).data('link');
            $('.modal_content').html('');
            $('#item_label').text('Add new item');
            $('.loading').show();
            var data = {
                ppcode : {{ $ppcode->ppcode }}
            };
            setTimeout(function (){
                $.get(url,data, function(data){
                    $('.loading').hide();
                    $('.modal_content').html(data);
                });
            },1000);
        }

        function edit(element)
        {
            var url = $(element).data('link');
            $('.modal_content').html('');
            $('#item_label').text('Edit item');
            $('.loading').show();
            $('#item').modal('show');
            setTimeout(function (){
                $.get(url,function(data){
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
    </script>
@endsection
