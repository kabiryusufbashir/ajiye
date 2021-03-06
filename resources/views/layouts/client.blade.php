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
    <div class="grid grid-cols-12 gap-2">
        @yield('container')
    </div>
    <!-- Accounts  -->
    @include('includes.accounts-front')
    <!-- Record  -->
    @include('includes.records-front')
    <!-- Imprest  -->
    @include('includes.imprest-front')
    <!-- View Report  -->
    @include('includes.report-front')
    <!-- Staff  -->
    @include('includes.staff-front')
    <!-- Profile  -->
    @include('includes.profile-front')
    
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>  
</body>
</html>