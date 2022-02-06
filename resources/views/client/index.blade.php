<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="icon"  type="image/x-icon" href="{{ asset('images/favicon.ico')}}"/>
    <title>Ajiye</title>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="container">
        <div class="text-xl welcome-title">
            Welcome <b>{{ Auth::user()->staff_username }}</b>
        </div>
        <div class="flex flex-row justify-between">
            <div class="boxes">
                <i class="fas fa-user-friends"></i>
            </div>
            <div class="boxes">
                <i class="fas fa-file-invoice"></i>
            </div>
            <div class="boxes">
                <i class="fas fa-cash-register"></i>
            </div>
            <div class="boxes">
                <i class="fas fa-user-circle"></i>
            </div>
        </div>
    </div>
</body>
</html>