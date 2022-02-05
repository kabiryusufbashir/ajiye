@extends('layouts.login')

@section('login')
    <!-- Set Up Form  -->
    <div class="w-full flex justify-between leading-snug items-center">
        <div class="w-full lg:w-2/3 text-center mx-auto shadow-lg">
            <div class="bg-green-400 py-4">
                <img class="w-12 mx-auto" src="{{ asset('images/cashier.png') }}" alt="Cashier">
            </div>
            <form action="{{route('setup-system')}}" method="POST" class="px-6 lg:px-8 py-8">
            @csrf
                <div>
                    <input required type="text" name="name" value="{{old('name')}}" placeholder="Full Name" class="input-field">
                    @error('name')
                        {{$message}}
                    @enderror
                </div>
                <div>
                    <input required type="text" name="username" value="{{old('username')}}" placeholder="Username" class="input-field">
                    @error('username')
                        {{$message}}
                    @enderror
                </div>
                <div>
                    <input required type="email" name="email" value="{{old('email')}}" placeholder="Email Address" class="input-field">
                    @error('email')
                        {{$message}}
                    @enderror
                </div>
                <div>
                    <input required type="password" name="password" placeholder="Password" class="input-field">
                    @error('password')
                        {{$message}}
                    @enderror
                </div>
                <div>
                    <input required type="password" name="password_confirmation" placeholder="Confirm Password" class="input-field">
                    @error('password_confirmation')
                        {{$message}}
                    @enderror
                </div>
                <div class="text-center mt-6">
                    <button class="submit-button">Create Account</button>
                </div>
            </form>
        </div>
    </div>
@endsecction
