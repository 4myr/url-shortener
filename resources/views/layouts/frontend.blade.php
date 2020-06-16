<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    @yield('headJS')

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style/css/main.css?') }}<?php echo time(); ?>">
    @yield('headCSS')


    <!-- Fonts -->

</head>
<body>
<div >
    <nav class="navbar navbar-expand-sm navbar-dark pb-3" dir="rtl">
        <a class="navbar-brand pull-right pl-" href="#">
            <img class="logo img-responsive" src="{{ asset('images/logo.png') }}" alt="URL Shortener">
        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
                aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId" dir="rtl">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0 text-right">
                <li class="nav-item active pl-lg-3">
                    <a class="nav-link" href="#">خانه <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item pl-lg-3">
                    <a class="nav-link" href="#">درباره ما</a>
                </li>
                <li class="nav-item pl-lg-3">
                    <a class="nav-link" href="#">تماس با ما</a>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 text-right">
                <li class="nav-item pl-lg-3">
                    <a class="nav-link" href="#">ورود</a>
                </li>
                <li class="nav-item pl-lg-3 pr-lg-3">
                    <a class="nav-link cl-secondary" href="#">ثبت نام</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="content">
        @yield('content')
    </div>
</div>
</body>
</html>
