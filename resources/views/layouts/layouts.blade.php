<html>
    <head>
        <title>@yield('title')</title>
        <meta name="csfr-token" content="{{ csfr-token() }}">
           <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        @component('components.header')
        @endcomponent
        <div class="container">
            @yield('content')
        </div>
        
        @component('components.footer')
        @endcomponent
        
         <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>