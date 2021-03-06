<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Werkgroepensite - @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/AdminLTE/dist/css/AdminLTE.min.css">



    <!-- Select2 voor multiple select-->
    <link rel="stylesheet" href="/AdminLTE/bower_components/select2/dist/css/select2.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="/AdminLTE/dist/css/skins/skin-blue.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <!--    <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    {{-- CSRF token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">
        @yield('style')

    </style>
</head>

<body class="hold-transition skin-blue fixed sidebar-mini {{Request::segment(1)}}">
    <div class="wrapper">

        <!-- Main Header -->
        @if(auth()->check())
        @include('layout.partials.navbar')
        @endif


        <!-- Left side column. contains the logo and sidebar -->
        @if(auth()->check())
        @include('layout.partials.sidebar')
        @endif

        <!-- Content Wrapper. Contains page content -->

        <!-- Content Wrapper. Contains page content -->
        <div id="app" class="content-wrapper">
            @include('layout.partials.status')
            @yield('content')

        </div>
        <!-- /.content-wrapper -->



        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        @include('layout.partials.footer')
        @yield('footer')



        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 3 -->
    <script src="/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/AdminLTE/dist/js/adminlte.min.js"></script>
    <!-- Select2 voor multiple select bestanden -->
    <script src="/AdminLTE/bower_components/select2/dist/js/select2.full.min.js"></script>



    <script src="{{ mix('js/app.js') }}"></script>
    @yield('script')
    @stack('script-partials')
    <script>
        $(document).ready(function() {
            $('.notification .delete').each(function() {
                var notification = this.parentNode;
                $(this).click(function() {
                    notification.parentNode.removeChild(notification);
                });
            });

        });

    </script>
</body>

</html>
