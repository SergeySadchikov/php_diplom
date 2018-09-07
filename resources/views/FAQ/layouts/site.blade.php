<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset(env('THEME'))}}/css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="{{asset(env('THEME'))}}/css/style.css"> <!-- Resource style -->
    <script src="{{asset(env('THEME'))}}/js/modernizr.js"></script> <!-- Modernizr -->

    <title>Сервис вопросов и ответов</title>
</head>
<body>
<header>
    <h1>Сервис вопросов и ответов</h1>
</header>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">На главную <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/#add">Задать вопрос</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Админ?
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('login')}}">Войти</a>
                    <a class="dropdown-item" href="{{route('logout')}}">Выйти</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('adminIndex')}}">Админ панель</a>
                </div>
                </div>
            </li>
        </ul>
    </div>
</nav>

@if ($errors->any())
    <div class="container alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<section class="cd-faq">
    @yield('navigation')
    @yield('indexContent')
    @yield('content')
    @yield('more')
    <a href="#0" class="cd-close-panel">Close</a>
</section> <!-- cd-faq -->


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{asset(env('THEME'))}}/js/jquery-2.1.1.js"></script>
<script src="{{asset(env('THEME'))}}/js/jquery.mobile.custom.min.js"></script>
<script src="{{asset(env('THEME'))}}/js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>