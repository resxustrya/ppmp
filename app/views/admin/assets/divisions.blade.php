<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>PPMP</title>
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

<body class="signup-page" style="background-color:#00CC99;">
<div class="signup-box">
    <div class="logo">
        <a href="javascript:void(0);">DOH RO7 <b>PPMP</b></a>
        <small>Divisions</small>
    </div>
    <div class="card">
        <div class="body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Division Name | <a href="{{ asset('assets/menu')}}"><em>Master</em></a></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(DB::table('division')->orderBy('description')->get() as $division)
                        <tr>
                            <td><h5>{{ $division->description }}</h5></td>
                            <td>
                                <a href="{{ asset('edit/division?division='. $division->id) }}" class="btn btn-primary btn-circle-lg waves-effect waves-circle waves-float">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Jquery Core Js -->
<script src="{{ asset('public/asset/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Core Js -->
<script src="{{ asset('public/asset/plugins/bootstrap/js/bootstrap.js') }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('public/asset/plugins/node-waves/waves.js') }}"></script>

<!-- Validation Plugin Js -->
<script src="{{ asset('public/asset/plugins/jquery-validation/jquery.validate.js') }}"></script>

<script src="{{ asset('public/asset/js/pages/examples/sign-in.js') }}"></script>
<script src="{{ asset('public/asset/js/demo.js') }}"></script>

<script src="{{ asset('public/asset/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('public/asset/plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>
<script src="{{ asset('public/asset/js/pages/ui/notifications.js') }}"></script>
</body>

</html>