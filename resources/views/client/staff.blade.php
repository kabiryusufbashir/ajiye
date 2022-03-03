@extends('layouts.client')

@section('container')
    <!-- Nav  -->
    <div class="col-span-1">
        @include('includes.nav-front')
    </div>
    <!-- Menu  -->
    <div class="col-span-11">
        <div id="menu" class="p-6">
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
        <div id="homeBar" class="">
            @if(count($staff) > 0)
                <div class="text-center text-2xl">
                    {{ $business->client_business_name }} Staff
                </div>
                <div class="my-2">
                    <table class="overflow-x-scroll">
                        <tbody>
                            <!-- Main Columns  -->
                            <tr class="text-left">
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Account Type</th>
                                @if(Auth::user()->staff_type == 1)
                                    <th>Action</th>
                                @endif
                            </tr>
                            <!-- Data  -->
                            @foreach($staff as $worker)
                                <tr class="text-left">
                                    <td>
                                        {{ $loop->index + 1 }}
                                    </td>
                                    <td>
                                        {{ $worker->staff_name }}
                                    </td>
                                    <td>
                                        {{ $worker->staff_email }}
                                    </td>
                                    <td>
                                        {{ $worker->staff_username }}
                                    </td>
                                    <td>
                                        @if($worker->staff_type == 1)
                                            Super User
                                        @else
                                            Normal User
                                        @endif
                                    </td>
                                    @if(Auth::user()->staff_type == 1)
                                        <!-- Action  -->
                                        <td class="flex px-2 justify-center">
                                            <form action="{{ route('client-staff-edit', $worker->id) }}">
                                                @csrf 
                                                <button class="relative top-2">
                                                    <span><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg></span>
                                                </button>
                                            </form>
                                            &nbsp;&nbsp;
                                            <form action="{{ route('client-staff-delete', $worker->id) }}" method="POST">
                                                @csrf 
                                                @method('DELETE')
                                                <button class="relative top-2">
                                                    <span><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg></span>
                                                </button>
                                            </form>
                                            &nbsp;&nbsp;
                                            <form action="{{ route('client-staff-reset-password', $worker->id) }}" method="POST">
                                                @csrf 
                                                <button class="relative top-2">
                                                    <svg class="w-6 h-6" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M288 416v-96a128 128 0 0 1 256 0v96h64v-96c0-106-86-192-192-192s-192 86-192 192v96zM512 704h-64v-64l384-384 64 64-384 384z"  /><path d="M544 736H416V608l160-160H192a64.19 64.19 0 0 0-64 64v320a64.19 64.19 0 0 0 64 64h448a64.19 64.19 0 0 0 64-64V576z"  /></svg>
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center text-2xl">
                    No Staff Found
                </div>
            @endif
        </div>
        <!-- Trademark  -->
        <div id="trademark" class="flex flex-row justify-between border-b my-12 text-center justify-content">
            <div>Imprest System</div>
            <div>A Product of Team Piccolo v 1.0</div>
        </div>
    </div>
    </div>
@endsection