<?php
    $success = \Illuminate\Support\Facades\Session::get('success');
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }}</title>

    <!-- Scripts -->
    <script>
        let baseURL = '{{ env('APP_URL') }}'
        let titles = @json(__('titles'));
        let messages = @json(__('messages'));
        let alertTime = {'success': 1000, 'error': 2000};

    </script>

    <script src="{{ env('APP_URL') }}{{ mix('/js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    @yield('headJS')

    <!-- Styles -->
    <link rel="stylesheet" href="{{ env('APP_URL') }}{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="{{ env('APP_URL') }}{{ mix('/css/main.css') }}">

    @yield('headCSS')

    <!-- Fonts -->

</head>
<body>
    <div class="screenLoading" id="screenLoading"></div>
    <nav class="navbar navbar-expand-sm navbar-dark pb-3">
        <a class="navbar-brand pull-right pl-" href="#">
            <img class="logo img-responsive" src="{{ asset('images/logo.png') }}" alt="URL Shortener">
        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
                aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
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
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item pl-lg-3">
                    <a class="nav-link" href="#">ورود</a>
                </li>
                <li class="nav-item pl-lg-3 pr-lg-3">
                    <a class="nav-link cl-secondary" href="#">ثبت نام</a>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')

    <footer class="footer container-fluid pt-4 pb-2">
        <p>تمامی حقوق برای این سایت محفوظ است. © 1399</p>
        <p>طراحی و توسعه توسط <a href="https://xenops.ir" class="font-weight-bold">زیناپس</a></p>
    </footer>

    <!-- Body Scripts -->
</body>
</html>
