<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <!-- Favicon-->
    <!-- Favicon-->
    <title>Welcome To | PROJECT PROCUREMENT PLAN</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('public/asset/images/favicon.png') }}" type="image/x-icon">

    <link href="{{ asset('public/asset/fonts/fonts.css') }}" rel="stylesheet" type="text/css">


    <!-- Bootstrap Core Css -->
    <link href="{{ asset('public/asset/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('public/asset/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('public/asset/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{ asset('public/asset/plugins/morrisjs/morris.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/asset/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{  asset('public/asset/css/style.css') }}" rel="stylesheet">
</head>

<body class="signup-page">
<div class="signup-box">
    <div class="logo">
        <small>SECTIONS</small>
        
    </div>
    <div class="card">
        <div class="body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Section Name | <a href="{{ asset('assets/menu')}}"><em>Master</em></a></th>
                    </tr>
                    <tr></tr>
                </thead>
                <tbody>
                     <tr>
                        <td>
                            <form action="{{ asset('rexus/search/section')}}" method="GET">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="keyword" placeholder="Search Section">
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @foreach($sections as $section)
                        <tr>
                            <td>
                                <h5>{{ $section->description }}</h5> ( {{ $section->short }} ) 
                                <?php $division = DB::table('division')->where('id','=',$section->division)->first(); ?>
                                <?php $name = DB::table("users")->where('id','=',$section->head)->first(); ?>
                                @if($division)
                                    <em><h6>{{ $division->description }}</h6></em>
                                @endif    
                                @if($name)
                                    <em>{{ $name->fname ." ".$name->lname }}</em>
                                @endif    
                            </td>
                            <td>
                                <a style="color:white;" href="{{ asset('edit/section?section='. $section->id) }}" class="btn btn-primary btn-circle-lg waves-effect waves-circle waves-float">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a style="color:white;" href="{{ asset('remove/section?section='.$section->id) }}" class="btn btn-warning btn-circle-lg waves-effect waves-circle waves-float">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a>
                            </td>
                        <tr>
                    @endforeach
                </tbody>
            </table>
            <center>
                {{ $sections->links()}}
            </center>    
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="{{ asset('public/asset/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('public/asset/plugins/bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ asset('public/asset/plugins/node-waves/waves.js') }}"></script>
<script src="{{ asset('public/asset/plugins/jquery-validation/jquery.validate.js') }}"></script>
<script src="{{ asset('public/asset/js/pages/examples/sign-in.js') }}"></script>
<script src="{{ asset('public/asset/js/demo.js') }}"></script>
<script src="{{ asset('public/asset/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('public/asset/plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>
<script src="{{ asset('public/asset/js/pages/ui/notifications.js') }}"></script>

</body>

</html>