<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="icon"  type="image/x-icon" href="{{ asset('images/favicon.ico')}}"/>
    <title>{{ $business->client_business_name }}</title>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="container">
        <!-- Nav  -->
        @include('includes.nav-front')
        <!-- Menu  -->
        @include('includes.menu-front')
        <!-- Accounts  -->
        <div id="accounts">
            <div id="accounts-content">
                <div id="accounts-header" class="bg-black text-white p-4 flex justify-between">
                    <span>Accounts</span>
                    <span>X</span>
                </div>
                <div id="accounts-body" class="p-4 grid grid-cols-2 gap-4">
                    <div class="menu-bar">
                        <i class="fas fa-book"></i><br>
                        Accounts
                    </div> 
                </div>
            </div> 
        </div>
    </div>
    <script src="{{ asset('js/main.js') }}"></script>  
</body>
</html>