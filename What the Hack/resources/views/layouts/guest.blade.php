<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @yield('style')

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="typography">
        <div class="pageGrid">
            <div style="height: 112px"></div>
            <header class="header">
                <div class="container mx-auto header__innerContainer px-32">
                    <div class="header__logo">
                        <a href="/">
                            <img src="/images/logo/WHATtheHACK_logo_h64.png">
                        </a>
                    </div>
                    <div>
                        @include('layouts.nav')
                    </div>
                </div>
            </header>
            @yield('content')
            <footer class="footer">
                <h5>© 2020 What-the-hack.eu</h5>
            </footer>
        </div>
    </body>
{{--    <body>--}}
{{--        <div class="font-sans text-gray-900 antialiased">--}}
{{--            {{ $slot }}--}}
{{--        </div>--}}
{{--    </body>--}}
</html>
