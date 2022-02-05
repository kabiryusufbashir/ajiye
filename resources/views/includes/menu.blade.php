<!-- Nav link  -->
<div id="menu" class="hidden md:block px-3 bg-white col-span-1 shadow-lg">
    <h2 class="text-2xl py-3 border-b font-medium">Menu</h2>
    <ul>
        <li class="py-3 flex border-b cursor-pointer">
            <a class="flex" href="{{ route('dashboard-admin') }}">
                <img class="w-7 mr-4" src="{{ asset('images/dashboard.png') }}" alt="Dashboard">
                Dashboard
            </a>
        </li>
        
        <!-- Client -->
        <li id="ClientCaret" class="py-3 flex border-b cursor-pointer">
            <img class="w-7 mr-4" src="{{ asset('images/client.png') }}" alt="Client">
            <a href="#">Clients</a>
            <svg id="ClientPointer" class="users-caret" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path><path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        </li>
        <div id="ClientMenu" class="users-caret-menu hidden">
            <li class="py-3 flex border-b">
                <a href="#">Add Client</a>
            </li>
            <li class="py-3 flex border-b">
                <a href="#">All Clients</a>
            </li>
        </div>
        
        <!-- Logout  -->
        <li class="py-3 flex border-b border-t cursor-pointer">
            <form action="{{ route('logout') }}" method="POST">
                @csrf 
                <button class="flex focus:outline-none focus:bg-gray-100 focus:text-gray-900" type="submit" name="logout">
                    <img class="w-7 mr-4" src="{{ asset('images/logout_icon.png') }}" alt="Icon">
                    <span>Logout</span>
                </button>
            </form>
        </li>
    </ul>
</div>