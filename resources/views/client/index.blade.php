<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="icon"  type="image/x-icon" href="{{ asset('images/favicon.ico')}}"/>
    <title>{{ Auth::user()->client_business_name }}</title>
</head>
<body>
    <i class="fas fa-user-friends"></i>
    <i class="fas fa-file-invoice"></i>
    <i class="fas fa-cash-register"></i>
    <i class="fas fa-user-circle"></i>
</body>
</html>