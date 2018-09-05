<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset(env('THEME'))}}/css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="{{asset(env('THEME'))}}/css/style.css"> <!-- Resource style -->
    <script src="{{asset(env('THEME'))}}/js/modernizr.js"></script> <!-- Modernizr -->

    <title>Сервис вопросов и ответов</title>
</head>
<body>
<header>
    <h1>Сервис вопросов и ответов</h1>
</header>


    @yield('navigation')
    @yield('content')


    <a href="#0" class="cd-close-panel">Close</a>



<script src="{{asset(env('THEME'))}}/js/jquery-2.1.1.js"></script>
<script src="{{asset(env('THEME'))}}/js/jquery.mobile.custom.min.js"></script>
<script src="{{asset(env('THEME'))}}/js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>