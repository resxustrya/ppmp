
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | PROJECT PROCUREMENT PLAN</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('public/favicon.ico') }}" type="image/x-icon">

    <link href="{{ asset('public/asset/fonts/fonts.css') }}" rel="stylesheet" type="text/css">


    <!-- Bootstrap Core Css -->
    <link href="{{ asset('public/asset/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/asset/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('public/asset/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('public/asset/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{ asset('public/asset/plugins/morrisjs/morris.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/asset/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('public/asset/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />

    <link href="{{  asset('public/asset/css/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('public/asset/css/themes/all-themes.css') }}" rel="stylesheet" />
    <link rel="stylesheet" media="screen" href="{{ asset('public/plugin/handson/handsontable.css') }}">
    
    <script src="{{ asset('public/asset/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/asset/plugins/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('public/plugin/handson/handsontable.js') }}"></script>
    <script src="{{ asset('public/asset/js/handson.js') }}"></script>
    <style>
        .footer {
            padding:10px;
            position: relative;
            bottom : 5;
            width: 100%;
            color: #fff;
            height: 60px;
            background-color: #2F4054;

        }
        ul {
            list-style-type: none;
        }
        .timeline{position:relative;margin:0 0 30px 0;padding:0;list-style:none}.timeline:before{content:'';position:absolute;top:0;bottom:0;width:4px;background:#ddd;left:31px;margin:0;border-radius:2px}.timeline>li{position:relative;margin-right:10px;margin-bottom:15px}.timeline>li:before,.timeline>li:after{content:" ";display:table}.timeline>li:after{clear:both}.timeline>li>.timeline-item{-webkit-box-shadow:0 1px 1px rgba(0,0,0,0.1);box-shadow:0 1px 1px rgba(0,0,0,0.1);border-radius:3px;margin-top:0;background:#fff;color:#444;margin-left:60px;margin-right:15px;padding:0;position:relative}.timeline>li>.timeline-item>.time{color:#999;float:right;padding:10px;font-size:12px}.timeline>li>.timeline-item>.timeline-header{margin:0;color:#555;border-bottom:1px solid #f4f4f4;padding:10px;font-size:16px;line-height:1.1}.timeline>li>.timeline-item>.timeline-header>a{font-weight:600}.timeline>li>.timeline-item>.timeline-body,.timeline>li>.timeline-item>.timeline-footer{padding:10px}.timeline>li>.fa,.timeline>li>.glyphicon,.timeline>li>.ion{width:30px;height:30px;font-size:15px;line-height:30px;position:absolute;color:#666;background:#d2d6de;border-radius:50%;text-align:center;left:18px;top:0}.timeline>.time-label>span{font-weight:600;padding:5px;display:inline-block;background-color:#fff;border-radius:4px}.timeline-inverse>li>.timeline-item{background:#f0f0f0;border:1px solid #ddd;-webkit-box-shadow:none;box-shadow:none}.timeline-inverse>li>.timeline-item>.timeline-header{border-bottom-color:#ddd}
    </style>
    @section('css')

    @show
</head>

<body class="theme-red">

@include('supply.layout.admin_nav')
@yield('content')
@include('modals.modal')
@include('supply.layout.footer')


<script src="{{ asset('public/asset/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
<script src="{{ asset('public/asset/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('public/asset/plugins/node-waves/waves.js') }}"></script>
<script src="{{ asset('public/asset/plugins/jquery-countto/jquery.countTo.js') }}"></script>
<script src="{{ asset('public/asset/plugins/jquery-validation/jquery.validate.js') }}"></script>
<script src="{{ asset('public/asset/js/demo.js') }}"></script>
<script src="{{ asset('public/asset/js/auto_search.js') }}"></script>
<script src="{{ asset('public/asset/plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>
<script src="{{ asset('public/asset/js/pages/ui/notifications.js') }}"></script>
<script src="{{ asset('public/asset/js/ppmp.js') }}"></script>


@if(Session::has('ops'))
    <script>
        $(document).ready(function(){
            showNotification("alert-danger", "{{ Session::get('ops') }}", "bottom", "center", null, null);
        });
    </script>
@endif
@section('js')

@show

</body>

</html>