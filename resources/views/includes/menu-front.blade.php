<div id="menu" class="my-4">
    <!-- Notification -->
    <div class="text-xl mb-10 flex flex-row justify-between border-b py-2">
        <div>
            Welcome <b>{{ Auth::user()->staff_username }}</b>
        </div>
        <div>
            Balance: <b>N{{ $balance }}</b>
        </div>
    </div>
    <!-- Message  -->
    <div class="py-1 mb-8 text-center">
        @include('layouts.messages')
    </div>
    <!-- Section  -->
    <div id="homeBar" class="grid grid-cols-4 gap-4">
        <div class="menu-bar">
            <i class="fas fa-home"></i><br>
            Home
        </div>
        <div class="menu-bar">
            <i class="fas fa-file-invoice"></i><br>
            Total Imprest <br>
            {{ $imprest }}
        </div>
        <div class="menu-bar">
            <i class="fas fa-cash-register"></i><br>
            Total Expenditure <br>
            {{ $records }}
        </div>
        <div class="menu-bar">
            <i class="fas fa-cash-register"></i><br>
            Balance <br>
            {{ $balance }}
        </div>
        <div class="menu-bar">
            <i class="fas fa-user-circle"></i><br>
            No of Staff <br>
            {{ count($staff) }}
        </div>
        <div class="menu-bar">
            <i class="fas fa-sign-out-alt"></i><br>
            Logout
        </div>
    </div>
    <!-- Trademark  -->
    <div id="trademark" class="flex flex-row justify-between border-b my-12 text-center justify-content">
        <div>Imprest System</div>
        <div>A Product of Team Piccolo v 1.0</div>
    </div>
</div>