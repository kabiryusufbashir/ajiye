<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ajiye</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	    <link rel="icon"  type="image/x-icon" href="{{ asset('images/favicon.ico')}}"/>
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    </head>
    <body class="mx-12">
        <div class="grid grid-cols-2 gap-4">
            <!-- Product Logo  -->
            <div class="text-5xl">
                <img src="{{ asset('images/ajiye.jpg') }}" alt="Ajiye">
            </div>
            @yield('login')
        </div>
    </body>
</html>
