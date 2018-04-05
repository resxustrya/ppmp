
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
    @section('css')

    @show
</head>

<body class="theme-red">

@include('layout.admin_nav')
@include('layout.user_left_nav')
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


@if(Request::segments()[0] == false)
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

@endif
<!-- Custom Js -->
<script src="{{ asset('public/asset/js/admin.js') }}"></script>

<script src="{{ asset('public/asset/plugins/jquery-validation/jquery.validate.js') }}"></script>

<!-- Demo Js -->
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
@if(Request::segments()[0] == "section")
    <script>
        $('#items-sidebar').click(function(){
            $('.side-loading').show();
            $('#items-table').html('');
            var url = $(this).data('link') + "?v=display";
            setTimeout(function(){
                $.get(url, function(data){
                    $('.side-loading').hide();
                    //$('').html(data);
                });
            },1000);
        });
    </script>
@endif
</body>

</html>