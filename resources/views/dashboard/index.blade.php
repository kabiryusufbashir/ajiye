<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ajiye</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="icon"  type="image/x-icon" href="{{ asset('images/favicon.ico')}}"/>
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    </head>
    <body>
        <!-- Nav  -->
        @include('includes.nav')
        <div class="text-2xl bg-white text-center border-b shadow py-2">
            @include('layouts.messages')
        </div>
        <!-- menu  -->
        <div class="md:grid md:grid-cols-5">
            <!-- Nav link  -->
            @include('includes.menu')
            <!-- Working Area -->
            <div class="col-span-4 mx-2 my-6">
                <!-- Add Client  -->
                <div class="w-1/2 text-center mx-auto shadow-lg">
                    <div class="bg-green-400 py-4">
                        <img class="w-12 mx-auto" src="{{ asset('images/client.png') }}" alt="Client">
                    </div>
                    <form action="{{ route('client-create') }}" enctype="multipart/form-data" method="POST" class="px-6 lg:px-8 py-8">
                        @csrf
                        <div>
                            <input required type="text" name="client_business_name" value="{{old('client_business_name')}}" placeholder="Business Name" class="input-field">
                            @error('client_business_name')
                                {{$message}}
                            @enderror
                        </div>
                        <div>
                            <input required type="text" name="client_username" value="{{old('client_username')}}" placeholder="Username" class="input-field">
                            @error('client_username')
                                {{$message}}
                            @enderror
                        </div>
                        <div>
                            <input required type="email" name="client_email" value="{{old('client_email')}}" placeholder="Email Address" class="input-field">
                            @error('client_email')
                                {{$message}}
                            @enderror
                        </div>
                        <div>
                            <input required type="text" name="client_phone_number" value="{{old('client_phone_number')}}" placeholder="Phone Number" class="input-field">
                            @error('client_phone_number')
                                {{$message}}
                            @enderror
                        </div>
                        <div>
                            <input type="file" name="client_photo" value="{{old('client_photo')}}" class="input-field">
                            @error('photo')
                                {{$message}}
                            @enderror
                        </div>
                        <div class="text-center mt-6">
                            <button class="submit-button">Create Client</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/dashboard.js') }}"></script>
    </body>
</html>