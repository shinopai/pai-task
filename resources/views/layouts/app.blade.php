<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <!-- component -->
<div class="flex">
    <!-- Nav -->
    <div
      class="flex flex-wrap justify-between h-20 md:flex-nowrap w-full"
    >
      <!-- LOGO -->
      <div class="z-30 flex items-center h-full pl-3 space-x-3">
        <p class="text-2xl text-"><a href="{{ url('/top') }}">{{ config('app.name', 'Laravel') }}</a></p>
      </div>

      <!-- Menu -->
      <div
        class="flex flex-col items-stretch text-lg text-center transform md:flex-row md:translate-y-0 md:space-x-5 md:items-center md:justify-end md:pr-3"
      >
      @guest
      <a
        href="{{ route('login') }}"
        class=""
        >{{ __('Login') }}</a
      >
      <a
        href="{{ route('register') }}"
        class=""
        >{{ __('Register') }}</a
      >
      @else
      <form action="{{ route('logout') }}" method="POST" id="logout-form">
        @csrf
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    </form>
      @endguest
      </div>
    </div>
  </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
