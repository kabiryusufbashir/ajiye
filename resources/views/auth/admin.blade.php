@extends('layouts.login')

@section('login')
    <!-- Login Form  -->
    <div class="w-full flex justify-between leading-snug items-center">
        <div class="w-full lg:w-2/3 text-center mx-auto shadow-lg">
            <div class="bg-green-400 py-4">
                <img class="w-12 mx-auto" src="{{ asset('images/cashier.png') }}" alt="Cashier">
            </div>
            <form action="{{route('log-in-admin')}}" method="POST" class="px-6 lg:px-8 py-8">
                @csrf
                <div>
                    <input required type="username" name="username" value="{{old('username')}}" placeholder="Username" class="border border-gray-300 rounded py-4 px-6 w-full my-2 focus:outline-none">
                    @error('username')
                        {{$message}}
                    @enderror
                </div>
                <div>
                    <input required type="password" name="password" placeholder="Password" class="border border-gray-300 rounded py-4 px-6 w-full my-2 focus:outline-none">
                    @error('password')
                        {{$message}}
                    @enderror
                </div>
                <div class="text-center mt-6">
                    <button class="text-xl mx-auto bg-green-400 rounded-full w-full py-3 text-white">LOGIN</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
