<div id="menu" class="p-6">
    <!-- Notification -->
    <div class="text-xl mb-10 flex flex-row justify-between border-b py-2">
        <div>
            Welcome <b>{{ Auth::user()->staff_username }}</b>
        </div>
        <div>
            Balance: <b>₦{{ $balance }}</b>
        </div>
    </div>
    <!-- Message  -->
    <div class="py-1 mb-8 text-center">
        @include('layouts.messages')
    </div>
    <!-- Section  -->
    <div id="homeBar" class="grid grid-cols-4 gap-4">
        <!-- Bar Chart  -->
        <div class="col-span-3 shadow-lg">
            {!! $chart->container() !!}
        </div>
        <!-- Statistics  -->
        <div class="col-span-1 my-auto">
            <div class="stats-div">
                <span><i class="fas fa-file-invoice"></i></span> 
                <span class="text-white text-lg">Total Imprest: ₦{{ $imprest }}</span>
            </div>
            <div class="stats-div">
                <span><i class="fas fa-cash-register"></i></span> 
                <span class="text-white text-lg">Total Expenditure: ₦{{ $records }}</span>
            </div>
            <div class="stats-div">
                <span><i class="fas fa-book"></i></span> 
                <span class="text-white text-lg">Balance: ₦{{ $balance }}</span>
            </div>
            <div class="stats-div">
                <span><i class="fas fa-user-circle"></i></span> 
                <span class="text-white text-lg">Staff: {{ count($staff) }}</span>
            </div>
        </div>
    </div>
    <!-- Trademark  -->
    <div id="trademark" class="flex flex-row justify-between border-b my-12 text-center justify-content">
        <div>Imprest System</div>
        <div>A Product of Team Piccolo v 1.0</div>
    </div>
</div>