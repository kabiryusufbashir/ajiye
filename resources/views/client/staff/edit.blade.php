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
        <div class="w-1/2 mx-auto shadow-lg">
            <form action="{{route('client-add-staff')}}" method="POST" class="px-6 lg:px-8 py-8">
                @csrf
                <div>
                    <label for="staff_name" class="text-lg font-medium">Staff Name</label><br>
                    <input type="text" name="staff_name" value="{{ $staff->staff_name }}" placeholder="Staff Name" class="input-field">
                    @error('staff_name')
                        {{$message}}
                    @enderror
                </div>
                <div>
                    <label for="staff_email" class="text-lg font-medium">Staff Email</label><br>
                    <input type="email" name="staff_email" value="{{ $staff->staff_email }}" placeholder="Staff Email" class="input-field">
                    @error('staff_email')
                        {{$message}}
                    @enderror
                </div>
                <div>
                    <label for="staff_username" class="text-lg font-medium">Staff Username</label><br>
                    <input required type="text" name="staff_username" value="{{ $staff->staff_username }}" placeholder="Staff Username" class="input-field">
                    @error('staff_username')
                        {{$message}}
                    @enderror
                </div>
                <div>
                    <label for="details" class="text-lg font-medium">Account Type</label><br>
                    <select required name="staff_type" class="input-field">
                        @if($staff->staff_type == 1)
                            <option value="1">Super User</option>
                            <option value="2">Normal User</option>
                        @else
                            <option value="2">Normal User</option>
                            <option value="1">Super User</option>
                        @endif
                    </select>
                    @error('staff_type')
                        {{$message}}
                    @enderror
                </div>
                <div class="text-center mt-6">
                    <button class="submit-button">Edit Staff</button>
                </div>
            </form>
        </div>
        <!-- Trademark  -->
        <div id="trademark" class="flex flex-row justify-between border-b my-12 text-center justify-content">
            <div>Imprest System</div>
            <div>A Product of Team Piccolo v 1.0</div>
        </div>
    </div>
@endsection