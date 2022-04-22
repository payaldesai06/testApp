<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('meta')
    <!-- SEO -->
    <title>
        @yield('title', config('app.name'))
        @hasSection('title')
        - {{ config('app.name') }}
        @endif
    </title>

    @yield('css_before')
    <!-- CSS -->
    <link href="{{ asset('css/tabler.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-flags.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-payments.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-vendors.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" />
    <!-- include libraries(jQuery, bootstrap) -->
        {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}

    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    @yield('css_after')
</head>

<body class="antialiased">
    <input type="hidden" id="token" value="{{@Auth::user()->api_token}}">
    <div class="wrapper">
        <aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
            @include('layouts.partials.mainnav')
        </aside>
        <div class="page-wrapper">
            @yield('content')
            <footer class="footer footer-transparent d-print-none">
                @include('layouts.partials.mainfooter')
            </footer>
        </div>

    </div>
    <!-- JS -->
    <script src="{{ asset('js/tabler.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js_after')
</body>

</html>
