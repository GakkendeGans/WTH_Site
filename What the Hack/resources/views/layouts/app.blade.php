<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @yield('cssextra')

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app1.css') }}">
        @yield('style')

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="typography">
        <div class="pageGrid">
            <div style="height: 112px"></div>
            <header class="header">
                <div class="container mx-auto header__innerContainer py-6 px-32">
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
            <main>
                @yield('content')
            </main>
            <footer class="footer">
                <h5>© 2020 What-the-hack.eu</h5>
            </footer>
        </div>
        @yield('jsextra')
    </body>
{{--    <body class="font-sans antialiased">--}}
{{--        <div class="min-h-screen bg-gray-100">--}}
{{--            @include('layouts.navigation')--}}

{{--            <!-- Page Heading -->--}}
{{--            <header class="bg-white shadow">--}}
{{--                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">--}}
{{--                    {{ $header }}--}}
{{--                </div>--}}
{{--            </header>--}}

{{--            <!-- Page Content -->--}}
{{--            <main>--}}
{{--                {{ $slot }}--}}
{{--            </main>--}}
{{--        </div>--}}
{{--    </body>--}}
</html>
