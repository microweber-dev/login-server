<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="//code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script defer src="//code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- CSRF Token -->
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-1065179-29', 'auto');
        ga('require', 'displayfeatures');
        ga('require', 'linkid', 'linkid.js');
        ga('send', 'pageview');

    </script>


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Authv') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style>
        .cbtn-submit {
            border: none;
            border-radius: 2px;
            color: #fff;
            position: relative;
            height: 36px;
            min-width: 64px;
            padding: 0 16px;
            font-size: 14px;
            font-weight: 500;
            text-transform: uppercase;
            background: rgb(0, 134, 219);
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
        }
    </style>
</head>
<body>
@yield('body')
<snackbar v-ref:abc></snackbar>
<script src="/js/login.js"></script>
</body>
</html>
