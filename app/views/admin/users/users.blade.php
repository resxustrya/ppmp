
@extends('admin.layout.main')
@section('content')
    @include('admin.layout.loading_search')
    <section class="content">
        <div class="container-fluid">

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                {{ DB::table('section')->where('id','=', $section)->first()->description }}
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="glyphicon glyphicon-option-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:void(0);">
                                                <i class="glyphicon glyphicon-pencil"></i>

                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="js-search" data-close="true">
                                                <i class="glyphicon glyphicon-search"></i>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                           
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>USERNAME</th>
                                    <th>LAST NAME</th>
                                    <th>FIRST NAME</th>
                                    <th width="20"></th>
                                    <th width="20"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    @foreach($users as $user)
                                        <tr>
                                            
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->lname }}</td>
                                            <td>{{ $user->fname }}</td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-circle waves-effect waves-circle waves-float" data-link="{{ asset('edit/user') }}" data-id="{{ $user->username }}" onclick="edituser(this);" data-toggle="modal" data-target="#item" data-backdrop="static" data-keyboard="false">
                                                    <i class="glyphicon glyphicon-log-in"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn bg-orange btn-circle waves-effect waves-circle waves-float" data-link="{{ asset('delete/user') }}" data-id="{{ $user->username }}" onclick="edituser(this);">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php $count =  $count + 1; ?>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="row">
                <center>
                    {{ $users->links(); }}
                </center>
            </div>
        </div>
    </section>

@endsection
@section('js')
<script>
    function edituser(el)
    {
        var url = $(el).data('link');
        var data = {
            id : $(el).data('id')
        };
        $('#item_label').text('Edit user');
        $('.loading').show();
        $('.modal_content').html('');

        setTimeout(function(){
            $.get(url,data,function(data){
                $('.modal_content').html(data);
                $('.loading').hide();
            });
        },1000);   
    }
</script>

@endsection