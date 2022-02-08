<div id="menu" class="my-4">
    <!-- Notification -->
    <div class="text-xl mb-10 flex flex-row justify-between border-b py-2">
        <div>
            Welcome <b>{{ Auth::user()->staff_username }}</b>
        </div>
        <div>
            Balance: <b>N140,000</b>
        </div>
    </div>
    <!-- Section  -->
    <div class="grid grid-cols-4 gap-4 text-center text-white text-lg">
        <div class="menu-bar">
            <i class="fas fa-home"></i><br>
            Home
        </div>
        <div class="menu-bar">
            <i class="fas fa-book"></i><br>
            Accounts
        </div>
        <div class="menu-bar">
            <i class="fas fa-file-invoice"></i><br>
            New Record
        </div>
        <div class="menu-bar">
            <i class="fas fa-cash-register"></i><br>
            View Report
        </div>
        <div class="menu-bar">
            <i class="fas fa-user-circle"></i><br>
            Staff
        </div>
        <div class="menu-bar">
            <i class="fas fa-sign-out-alt"></i><br>
            Logout
        </div>
    </div>
    <!-- Trademark  -->
    <div class="border-b my-6 text-center">
        A Product of Team Piccolo v 1.0
    </div>
</div>