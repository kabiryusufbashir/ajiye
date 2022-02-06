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
    <div class="mx-8 my-6">
        <div class="text-xl mb-10 flex flex-row justify-between">
            <div>
                Welcome <b>{{ Auth::user()->staff_username }}</b>
            </div>
            <div>
                Balance: <b>N140,000</b>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-4 text-center text-white text-lg">
            <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 py-20 rounded-lg">
                <i class="fas fa-book"></i><br>
                Accounts
            </div>
            <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 py-20 rounded-lg">
                <i class="fas fa-file-invoice"></i><br>
                New Record
            </div>
            <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 py-20 rounded-lg">
                <i class="fas fa-cash-register"></i><br>
                View Report
            </div>
            <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 py-20 rounded-lg">
                <i class="fas fa-user-circle"></i><br>
                Staff
            </div>
            <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 py-20 rounded-lg">
                <i class="fas fa-sign-out-alt"></i><br>
                Logout
            </div>
        </div>
    </div>
</body>
</html>