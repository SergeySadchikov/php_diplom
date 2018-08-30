<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{asset(env('THEME'))}}/css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="{{asset(env('THEME'))}}/css/style.css"> <!-- Resource style -->
    <script src="{{asset(env('THEME'))}}/js/modernizr.js"></script> <!-- Modernizr -->
    <title>FAQ</title>
</head>
<body>
<header>
    <h1>FAQ</h1>
</header>
<section class="cd-faq">

    @yield('navigation')
    @yield('faq_items')
    @yield('content')


    <a href="#0" class="cd-close-panel">Close</a>
</section> <!-- cd-faq -->


<script src="{{asset(env('THEME'))}}/js/jquery-2.1.1.js"></script>
<script src="{{asset(env('THEME'))}}/js/jquery.mobile.custom.min.js"></script>
<script src="{{asset(env('THEME'))}}/js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>