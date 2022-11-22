<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- CSRF Token -->


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Authv') }}</title>

    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

 {{--   <style>
        body {
            background: {{ config('ui.white_color') }} !important;
        }
        a {
            color: {{ config('ui.primary_color') }} !important;
        }
        a:hover {
            color: {{ config('ui.primary_color') }} !important;
        }
        .btn.btn-primary {
            background: {{ config('ui.primary_color') }} !important;
            border:1px solid {{ config('ui.primary_color') }} !important;
        }
        .custom-control-input:checked ~ .custom-control-label::before {
            border-color: {{ config('ui.primary_color') }};
            background-color: {{ config('ui.primary_color') }};
        }
        .custom-control-input:not(:disabled):active ~ .custom-control-label::before {
            background-color: {{ config('ui.white_color') }};
            border-color: {{ config('ui.white_color') }};
        }
        .custom-control-input:focus ~ .custom-control-label::before {
            box-shadow: 0 0 0 .2rem {{ config('ui.primary_color') }};
        }
        .btn-primary.focus, .btn-primary:focus {
            box-shadow: 0 0 0 .2rem #cacaca70 !important;
        }
        .btn-primary:not(:disabled):not(.disabled).active:focus, .btn-primary:not(:disabled):not(.disabled):active:focus, .show > .btn-primary.dropdown-toggle:focus {
            box-shadow: 0 0 0 .2rem #cacaca70 !important;
        }
    </style>--}}

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="/css/mw.new.css">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

@yield('body')

<snackbar v-ref:abc></snackbar>
<script src="/js/login.js"></script>
</body>
</html>
