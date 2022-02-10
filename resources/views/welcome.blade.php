@extends('layouts.login')

@section('login')
    <!-- Login Form  -->
    <div class="w-full flex justify-between leading-snug items-center">
        <div class="w-full lg:w-2/3 text-center mx-auto shadow-lg">
            <div class="yusuf-bg py-4">
                <img class="w-12 mx-auto" src="{{ asset('images/cashier.png') }}" alt="Cashier">
            </div>
            <form action="{{route('log-in-client')}}" method="POST" class="bg-white px-6 lg:px-8 py-8">
                @csrf
                <div>
                    <input required type="username" name="client_username" value="{{old('client_username')}}" placeholder="Username" class="input-field">
                    @error('client_username')
                        {{$message}}
                    @enderror
                </div>
                <div>
                    <input required type="password" name="client_password" placeholder="Password" class="input-field">
                    @error('client_password')
                        {{$message}}
                    @enderror
                </div>
                <div class="text-center mt-6">
                    <button class="submit-button">LOGIN</button>
                </div>
            </form>
        </div>
    </div>
@endsection