<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ajiye</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="icon"  type="image/x-icon" href="{{ asset('images/favicon.ico')}}"/>
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    </head>
    <body>
        <!-- Nav  -->
        @include('includes.nav')
        <div class="text-2xl bg-white text-center border-b shadow py-2">
            @include('layouts.messages')
        </div>
        <!-- menu  -->
        <div class="md:grid md:grid-cols-5">
            <!-- Nav link  -->
            @include('includes.menu')
            <!-- Stats -->
            
        </div>
        <script src="{{ asset('js/dashboard.js') }}"></script>
    </body>
</html>