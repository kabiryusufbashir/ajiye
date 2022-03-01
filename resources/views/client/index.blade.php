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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
</head>
<body>
    <div class="grid grid-cols-12 gap-2">
        <!-- Nav  -->
        <div class="col-span-1">
            @include('includes.nav-front')
        </div>
        <!-- Menu  -->
        <div class="col-span-11">
            @include('includes.menu-front')
        </div>
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

    {!! $chart->script() !!}
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>  
</body>
</html>