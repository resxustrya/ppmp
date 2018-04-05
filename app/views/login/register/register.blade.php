<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign Up | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->

    <link rel="icon" href="{{ asset('public/favicon.ico') }}" type="image/x-icon">

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
        <a href="javascript:void(0);">DOH RO7 <b>PPMP</b></a>
        <small>A PROJECT PROCUREMENT PLAN MANAGEMENT SYSTEM</small>
    </div>
    <div class="card">
        <div class="body">
            <form id="sign_up" method="POST">
                <div class="msg">Register a new membership</div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="fname" placeholder="Firstname" required>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="lname" placeholder="Lastname" required>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-menu-down"></i>
                        </span>
                    <div class="form-line">
                        <select class="form-control" name="section">
                            <option value="" selected>Chose section</option>
                            @foreach(DB::table('section')->get(['id','description']) as $section)
                                <option value="{{ $section->id }}">{{ $section->description }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-menu-down"></i>
                        </span>
                    <div class="form-line">
                        <select class="form-control" name="level">
                            <option value="" selected>Chose Level</option>
                            <option value="0">Regular Employee</option>
                            <option value="1">Section Head</option>
                            <option value="8888">System Administrator</option>
                        </select>
                    </div>
                </div>

                <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">
                    <i class="glyphicon glyphicon-ok"></i>
                    Submit
                </button>

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


@if(Session::has('ops'))
    <script>
        $(document).ready(function(){
            showNotification("alert-danger", "{{ Session::get('ops')  }}", "top", "center", null, null);
        });
    </script>
@endif
<script src="{{ asset('public/asset/js/pages/examples/sign-in.js') }}"></script>
<script src="{{ asset('public/asset/js/demo.js') }}"></script>

<script src="{{ asset('public/asset/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('public/asset/plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>
<script src="{{ asset('public/asset/js/pages/ui/notifications.js') }}"></script>

<script>
    $(function () {
        $('#sign_in').validate({
            highlight: function (input) {
                console.log(input);
                $(input).parents('.form-line').addClass('error');
            },
            unhighlight: function (input) {
                $(input).parents('.form-line').removeClass('error');
            },
            errorPlacement: function (error, element) {
                $(element).parents('.input-group').append(error);
            }
        });
    });
</script>
</body>

</html>