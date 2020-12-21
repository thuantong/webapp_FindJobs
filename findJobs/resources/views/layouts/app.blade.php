<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
{{--    <title>TMTJobs</title>--}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('assets\images\animat-diamond-color.gif')}}">

    <!-- plugin css -->
    <link href="{{asset('assets\libs\jquery-vectormap\jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets\icon\themify-icons\themify-icons.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets\icon\font-awesome\css\font-awesome.min.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets\icon\icofont\css\icofont.css')}}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets\icon\feather\css\feather.css')}}">
    <!-- App css -->
    <link href="{{asset('assets\css\bootstrap.min.css')}}" rel="stylesheet" type="text/css">
{{--    <link href="{{asset('assets\css\icons.min.css')}}" rel="stylesheet" type="text/css">--}}
    <link href="{{asset('assets\css\app.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets\css\style-customs.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets\css\croppie\croppie.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets\css\croppie\demo.css')}}" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-image: url('{{asset('images/background-JOBS.jpg')}}')!important;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
{{--                    {{ config('app.name', 'Tìm việc online') }}--}}
                    {{'Tìm việc online'}}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li>
                            <a href="/" class="nav-link text-white">
                                Việc làm
                            </a>
                        </li>
                        @guest
                            <li class="nav-item">
                            @if (strtolower(Route::currentRouteName()) != 'auth.form.login')
                                    <a class="nav-link text-white" href="{{ route('auth.form.login') }}">{{ __('Đăng nhập') }}</a>
                            @endif

                            </li>

{{--                            @if (Route::has('register') == false)--}}
                            @if (strtolower(Route::currentRouteName()) != 'auth.form.register')
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('auth.form.register')}}">{{ __('Tạo tài khoản') }}</a>
                                </li>
                            @endif
                        @else

{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    {{ Auth::user()->name }}--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                        {{ __('Logout') }}--}}
{{--                                    </a>--}}

{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </li>--}}
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{asset('assets\js\vendor.min.js')}}"></script>

    <script src="{{asset('assets\libs\apexcharts\apexcharts.min.js')}}"></script>
    <script src="{{asset('assets\libs\jquery-sparkline\jquery.sparkline.min.js')}}"></script>
    {{--<script src="{{asset('assets\libs\jquery-vectormap\jquery-jvectormap-1.2.2.min.js')}}"></script>--}}
    {{--<script src="{{asset('assets\libs\jquery-vectormap\jquery-jvectormap-world-mill-en.js')}}"></script>--}}

    <!-- Peity chart-->
    <script src="{{asset('assets\libs\peity\jquery.peity.min.js')}}"></script>
    <script src="{{asset('assets\js\chat-js-customs.js')}}"></script>
    <script src="{{asset('assets\js\croppie\croppie.js')}}"></script>

    <!-- init js -->
    {{--<script src="{{asset('assets\js\pages\dashboard-2.init.js')}}"></script>chart--}}

    <!-- App js -->
    <script src="{{asset('assets\js\app.min.js')}}"></script>
    @stack('scripts')
    <script src="{{asset('assets\js\customs-js-mine.js')}}"></script>
</body>
</html>
