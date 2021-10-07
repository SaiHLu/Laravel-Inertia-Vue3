<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('plugins/frontend/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset("plugins/frontend/font-awesome/css/font-awesome.min.css") }}">
    <!-- Custom icon font-->
    <link rel="stylesheet" href="{{ asset("css/frontend/fontastic.css") }}">
    <!-- Google fonts - Open Sans-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <!-- Fancybox-->
    <link rel="stylesheet" href="{{ asset("plugins/frontend/@fancyapps/fancybox/jquery.fancybox.min.css") }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset("css/frontend/style.default.css") }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset("css/frontend/custom.css") }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset("img/frontend/favicon.ico") }}">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
</head>

<body>
    @inertia

    @routes
    <script src="{{ asset("plugins/frontend/jquery/jquery.min.js") }}"></script>
    <script src="{{ asset("plugins/frontend/popper.js/umd/popper.min.js") }}"> </script>
    <script src="{{ asset("plugins/frontend/bootstrap/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("plugins/frontend/jquery.cookie/jquery.cookie.js") }}"> </script>
    <script src="{{ asset("plugins/frontend/@fancyapps/fancybox/jquery.fancybox.min.js") }}"></script>
    <script src="{{ asset("js/frontend/front.js") }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>
