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
        <small>ADD NEW USER</small>
    </div>
    <div class="card">
        <div class="body">
            <form id="{{ asset('add/user') }}" method="POST">

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-text-color"></i>
                    </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="fname" placeholder="First Name" required>
                    </div>
                </div>
                
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-text-color"></i>
                    </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="lname"  placeholder="Last Name" required>
                    </div>
                </div>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-text-color"></i>
                    </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                    </div>
                </div>


                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-text-color"></i>
                    </span>
                    <div class="form-line">
                        <select name="division" class="form-control">
                            <option value="" selected disabled>Select division</option>
                            @foreach(DB::table('division')->get() as $division)
                                <option value="{{ $division->id }}">{{ $division->description }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-text-color"></i>
                    </span>
                    <div class="form-line">
                        <select name="section" class="form-control">
                            <option value="" selected disabled>Select section head</option>
                            @foreach(DB::table('section')->orderBy('description','ASC')->get() as $section)
                                <option value="{{ $section->id }}" >{{ $section->description }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="input-group">
                     <span class="input-group-addon">
                        <i class="glyphicon glyphicon-text-color"></i>
                    </span>
                    <div class="form-line">
                        <select name="user_type" class="form-control">
                            <option value="" selected disabled>User Type</option>
                            <option value="0">Section User</option>
                            <option value="1111">Division level user</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Submit</button>
            </form>
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