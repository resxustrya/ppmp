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
    <style>
     
    </style>
</head>

<body class="signup-page" style="background-color:#00CC99;">
<div class="signup-box">
    <div class="logo">
        <a href="javascript:void(0);">DOH RO7 <b>PPMP</b></a>
        <small>A PROJECT PROCUREMENT PLAN MANAGEMENT SYSTEM</small>
    </div>
    <div class="card">
        <div class="body">
            <div class="row">
                <div class="col-md-12">
                    <h5>Divisions</h5>
                    <a style="color:white;" href="{{ asset('view/division') }}" class="btn btn-block btn-lg btn-primary waves-effect">View Divisions</a>
                    <a style="color:white;" href="{{ asset('add/division') }}" class="btn btn-block btn-lg btn-primary waves-effect">Add Division</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h5>Sections</h5>
                    <a style="color:white;"  href="{{ asset('view/sections') }}" class="btn btn-block btn-lg btn-primary waves-effect">View Sections</a>
                    <a style="color:white;" href="{{ asset('add/section') }}" class="btn btn-block btn-lg btn-primary waves-effect">Add Section</a>
                </div>
            </div>
             <div class="row">
                <div class="col-md-12">
                    <h5>Users</h5>
                    <a style="color:white;" href="{{ asset('view/users') }}" class="btn btn-block btn-lg btn-primary waves-effect">View Users</a>
                    <a style="color:white;" href="{{ asset('add/user') }}" class="btn btn-block btn-lg btn-primary waves-effect">Add User</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <center><a href="{{ asset('login') }}">Login</a></center>
                </div>
            </div>
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