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
    <body class="mx-12 yusuf-bg">
        <div class="grid grid-cols-2 gap-4 my-36">
            <!-- Product Logo  -->
            <div class="text-5xl my-auto">
                <img src="{{ asset('images/logo.png') }}" alt="Ajiye">
            </div>
            @yield('login')
        </div>
        <!-- Trademark  -->
        <div id="trademark" class="text-white flex flex-row justify-between border-b my-12 text-center justify-content">
            <div>Imprest System</div>
            <div>A Product of Team Piccolo v 1.0</div>
        </div>
    </body>
</html>
