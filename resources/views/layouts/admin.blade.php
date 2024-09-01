<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    @yield('title')

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700') }}" rel="stylesheet">
    @yield('css')

    <style>
        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;
        }

        .alert.hiding {
            transform: translateX(100%);
            opacity: 0;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('partials.header')
        @include('partials.siderbar')
        @yield('content')

        <div class="content-wrapper">
            @include('partials.flash-message')
            <!-- Nội dung tiếp theo của content-wrapper -->

            @include('partials.footer')
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
        @yield('js')
        <script>
            // Auto-hide flash messages after 5 seconds with slide effect
            $(document).ready(function() {
                setTimeout(function() {
                    $('.alert').each(function() {
                        $(this).addClass('hiding');
                        var $alert = $(this);
                        setTimeout(function() {
                            $alert.remove();
                        }, 500); // Remove after transition completes
                    });
                }, 2000); // 2000 milliseconds = 2 seconds
            });
        </script>
</body>

</html>