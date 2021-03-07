<html>
    <head>
        <title>@yield('title')</title>
        <meta name="csfr-token" content="{{ csfr-token() }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        
         <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>