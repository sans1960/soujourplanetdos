<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script> --}}

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
    <div id="app">
        <div class="flex flex-row justify-between items-center p-4 border-b-4 text-2xl font-patua-one text-white bg-gray-700">
            <div class="flex justify-center">
                <a class="ml-5" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

            </div>
            <div class="flex flex-row justify-center" >
                    <!-- Left Side Of Navbar -->
                    <ul class="">
                    <li class="">
                        <a class="" href="{{ route('admin.home') }}">AdminBlog</a>

                    </li>

                    </ul>
            </div>
            <div class="flex justify-between">
                    <!-- Right Side Of Navbar -->
                    <ul class="flex justify-between">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="mr-5">
                                    <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                             @if (Route::has('register'))
                                <li class="mr-5">
                                    <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="" class="" href="#" >
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="" >
                                    <a class="" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @yield('js')
</body>
</html>
