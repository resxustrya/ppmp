
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

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('public/asset/css/themes/all-themes.css') }}" rel="stylesheet" />
</head>

<body class="theme-red">

@include('admin.layout.admin_nav')
@include('admin.layout.admin_left')
@yield('content')
@include('modals.modal')
<!-- Jquery Core Js -->
<script src="{{ asset('public/asset/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Core Js -->
<script src="{{ asset('public/asset/plugins/bootstrap/js/bootstrap.js') }}"></script>

<!-- Select Plugin Js -->
<script src="{{ asset('public/asset/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{ asset('public/asset/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('public/asset/plugins/node-waves/waves.js') }}"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="{{ asset('public/asset/plugins/jquery-countto/jquery.countTo.js') }}"></script>

<!-- Morris Plugin Js -->
<script src="{{ asset('public/asset/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('public/asset/plugins/morrisjs/morris.js') }}"></script>

<!-- ChartJs -->
<script src="{{ asset('public/asset/plugins/chartjs/Chart.bundle.js') }}"></script>

<!-- Flot Charts Plugin Js -->
<script src="{{ asset('public/asset/plugins/flot-charts/jquery.flot.js') }}"></script>
<script src="{{ asset('public/asset/plugins/flot-charts/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('public/asset/plugins/flot-charts/jquery.flot.pie.js')}}"></script>
<script src="{{ asset('public/asset/plugins/flot-charts/jquery.flot.categories.js') }}"></script>
<script src="{{ asset('public/asset/plugins/flot-charts/jquery.flot.time.js') }}"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="{{ asset('public/asset/plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>

<!-- Custom Js -->
<script src="{{ asset('public/asset/js/admin.js') }}"></script>
<script src="{{ asset('public/asset/js/pages/index.js')}}"></script>
<script src="{{ asset('public/asset/plugins/jquery-validation/jquery.validate.js') }}"></script>

<!-- Demo Js -->
<script src="{{ asset('public/asset/js/demo.js') }}"></script>

@section('js')

@show

</body>

</html>