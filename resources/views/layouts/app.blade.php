<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    <link rel="stylesheet" href="{{asset('/fontawesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('/css/pelak.css')}}">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('/css/menustyle.css')}}">
    {{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">--}}
    {{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>--}}
    <script src="{{asset('js/jquery-3.6.3.min.js')}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style="font-family: Yekan" dir="rtl">
<div id="app">
    <nav class="main-menu" dir="rtl">
        <div class="container">
            <ul>
                <li class="current-item"><a href="{{ url('/') }}">صفحه اصلی</a></li>
                @if(Auth::check())
                    @if(auth()->user()->role==1)
                        <li class="current-item"><a href="{{ url('/users') }}">{{__('users')}}</a></li>
                        <li class="current-item"><a href="{{ url('/product') }}"> مدیریت فرآورده</a></li>
                        <li class="current-item"><a href="{{ url('/list') }}">لیست کلی</a></li>
                        @guest
                            @if (Route::has('login'))
                                <li>
                                    <a class="nav-link" href="{{ route('login') }}">{{__('login1')}}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li style="float: left;margin-top: 5px"><a href="#">{{ Auth::user()->name }}</a>
                                <ul>
                                    <li><a href="{{ route('change-password') }}"
                                           onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                            {{ __('Chnage.Password') }}</a>

                                    <li><a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{__('logout1')}}
                                        </a>


                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              class="d-none">
                                            @csrf
                                        </form>
                                </ul>
                                @endif
                                @endif
                            </li>
                        @endguest
            </ul>
    </nav>
</div>


<main class="py-4" dir="rtl">
    @include('layouts.messages')
    <di

    @yield('content')
</main>
</div>
{{--    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>--}}
</body>
</html>
