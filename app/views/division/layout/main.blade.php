
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome To | PROJECT PROCUREMENT PLAN</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('public/asset/images/favicon.png') }}" type="image/x-icon">

    <link href="{{ asset('public/asset/fonts/fonts.css') }}" rel="stylesheet" type="text/css">


    <!-- Bootstrap Core Css -->
    <link href="{{ asset('public/asset/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/asset/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('public/asset/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('public/asset/plugins/animate-css/animate.css') }}" rel="stylesheet" />


    <!-- Custom Css -->
    <link href="{{ asset('public/asset/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />

    <link href="{{  asset('public/asset/css/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('public/asset/css/themes/all-themes.css') }}" rel="stylesheet" />
    <link rel="stylesheet" media="screen" href="{{ asset('public/plugin/handson/handsontable.css') }}">
    <link rel="stylesheet" media="screen" href="{{ asset('public/asset/css/division.css') }}">


    <script src="{{ asset('public/asset/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/plugin/handson/handsontable.js') }}"></script>
    <script src="{{ asset('public/asset/js/division.js')}}"></script>
    <script>
        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>
</head>
<body class="theme-red">
@include('division.layout.loading')
@include('division.layout.admin_nav')
@yield('content')
@include('modals.modal')
@include('division.layout.footer')

<script src="{{ asset('public/asset/plugins/bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ asset('public/asset/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
<script src="{{ asset('public/asset/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('public/asset/plugins/node-waves/waves.js') }}"></script>
<script src="{{ asset('public/asset/plugins/jquery-countto/jquery.countTo.js') }}"></script>
<script src="{{ asset('public/asset/plugins/jquery-validation/jquery.validate.js') }}"></script>
<script src="{{ asset('public/asset/js/demo.js') }}"></script>
<script src="{{ asset('public/asset/js/auto_search.js') }}"></script>
<screen src="{{ asset('public/asset/js/admin.js') }}"></script>
<script src="{{ asset('public/asset/plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>
<script src="{{ asset('public/asset/js/pages/ui/notifications.js') }}"></script>
<script src="{{ asset('public/asset/js/ppmp.js') }}"></script>
<script>
    $(document).ready(function(){
         setTimeout(function () { $('.page-loader-wrapper').fadeOut(); }, 50);
    });
</script>
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