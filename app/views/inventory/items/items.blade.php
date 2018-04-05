
@extends('layout.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ITEMS LIST
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="glyphicon glyphicon-option-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#item" data-backdrop="static" data-keyboard="false" onclick="addItem(this);" data-link="{{ asset('new/item') }}">
                                                <i class="glyphicon glyphicon-plus"></i>
                                                Add Item
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
                            <table class="table table-bordered" id="item_table">
                                <thead>
                                <tr>
                                    <th>
                                        <i class="ace-icon glyphicon glyphicon-tag"></i>
                                        Item Code
                                    </th>

                                    <th>
                                        <i class="ace-icon glyphicon glyphicon-tags"></i>
                                        Item Description
                                    </th>
                                    <th>Item Unit</th>
                                    <th width="10"></th>
                                    <th width="10"></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{ $item->code }} </td>
                                        <td><strong style="font-size:1.2em;">{{ $item->description }}</strong> </td>
                                        <td><strong>{{ $item->unit}}</strong></td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-circle waves-effect waves-circle waves-float" data-link="{{ asset('edit/user') }}" data-id="{{ $item->code }}" onclick="edituser(this);" data-toggle="modal" data-target="#item" data-backdrop="static" data-keyboard="false">
                                                <i class="glyphicon glyphicon-log-in"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn bg-orange btn-circle waves-effect waves-circle waves-float" data-link="{{ asset('delete/user') }}" data-id="{{ $item->code }}" onclick="edituser(this);">
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
            setTimeout(function (){
                $.get(url, function(data){
                    $('.loading').hide();
                    $('.modal_content').html(data);
                });
            },1000);
        }
</script>
@endsection
