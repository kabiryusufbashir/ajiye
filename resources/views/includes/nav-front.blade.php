<div id="nav" class="bg-green-800 text-center py-12 h-screen text-white">
    <div id="homeNav" class="nav-front-menu">
        <a href="{{ route('dashboard-client') }}">
            <i class="fas fa-home"></i><br>
            Home
        </a>
    </div>
    <div id="accountNav" class="nav-front-menu">
        <i class="fas fa-book"></i><br>
        Accounts
    </div>
    <!-- <div id="imprestNav" class="nav-front-menu">
        <i class="fas fa-file-invoice"></i><br>
        New Imprest 
    </div> -->
    <div id="recordNav" class="nav-front-menu">
        <i class="fas fa-file-invoice"></i><br>
        New Record
    </div>
    <div id="viewReportNav" class="nav-front-menu">
        <i class="fas fa-cash-register"></i><br>        
        View Report
    </div>
    <div class="nav-front-menu">
        <i class="fas fa-user-circle"></i><br>
        Staff
    </div>
    <div class="nav-front-menu">
        <form action="{{ route('logout-client') }}" method="POST">
            @csrf
            <button type="submit">
                <i class="fas fa-sign-out-alt"></i><br>
                Logout
            </button>
        </form> 
    </div>
</div>