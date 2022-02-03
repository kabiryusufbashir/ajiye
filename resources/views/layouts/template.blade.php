<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @yield('page-meta')
        <title>@yield('page-title')</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link href="{{ asset('images/favicon.ico') }}" rel="icon">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <!-- Navigation Bar -->
        <div class="z-40 fixed bg-white py-4 shadow lg:px-32 px-4 w-full">
           <div class="text-center text-2xl text-green-600">@include('layouts.messages')</div>
           <div class="flex justify-between mt-1 lg:grid grid-cols-5 gap-3 items-center">
               <div class="lg:col-span-1">
                   <a href="{{ route('home') }}" class="text-white">
                       <img class="w-12" src="{{ asset('images/logo.png') }}" alt="Team Piccolo Logo">
                   </a>
               </div>
               <div class="lg:col-span-3 hidden lg:block">
                   <nav class="lg:flex justify-between list-none text-green-600">
                       <li><a href="{{ route('home') }}">Home</a></li>
                       <li><a href="{{ route('about') }}">About Us</a></li>
                       <li><a href="{{ route('courses') }}">Courses</a></li>
                       <li><a href="{{ route('ebook') }}">E-books</a></li>
                       <li><a href="{{ route('blog') }}">Blog</a></li>
                       <li><a href="{{ route('contact') }}">Contact Us</a></li>
                   </nav>
               </div>
               @if(Auth::guest())
               <div class="text-xl md:text-lg relative -top-1 flex justify-end items-center lg:col-span-1 text-green-600 mt-2">
                   <a href="{{ route('login') }}" class="text-green-600 flex">
                       <span>Sign In</span>&nbsp;&nbsp;
                       <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>&nbsp;&nbsp;
                       <!-- <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path></svg> -->
                   </a>
               </div>
               @else
               <div class="md:hidden flex justify-end items-center lg:col-span-1 text-green-600 mt-2">
                    <a class="text-green-600 flex items-center">
                       <span>{{auth()->user()->name}}</span> &nbsp;&nbsp;&nbsp;
                       <img class="w-10 h-10 rounded-full" src="{{ auth()->user()->photo ?? asset('images/logo.png') }}" alt="Logo">
                    </a>
               </div>
               @endif
               <div id="menu" class="lg:hidden cursor-pointer">
                   <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
               </div>
           </div>
        </div>
        <!-- Login Button  -->
        @if(!Auth::guest())
        <div class="hidden md:block z-50 sticky inset-x-0 top-0 left-0 py-5">
            <div class="absolute top-0 right-0">
                <div class="flex justify-end items-center md:col-span-1 text-green-600 mt-5 mr-4">
                    <!-- User Account  -->
                    <div class="flex items-center relative inline-block">
                        <span class="flex cursor-pointer" id="user_caret">
                            <b class="relative top-1 font-normal">{{auth()->user()->name}}</b>
                            &nbsp;
                            <img class="w-10 h-10 rounded-full" src="{{ auth()->user()->photo ?? asset('images/logo.png') }}" alt="Logo">
                            <svg id="caret" class="w-5 h-5 my-auto" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>    
                        </span>
                        <div id="user_caret_menu" class="hidden absolute top-5 right-0 mt-2 w-48 rounded-md shadow-md bg-white ring-1 ring-black ring-opacity-5">
                            <div class="py-1 text-sm text-gray-700" aria-orientation="vertical">
                                <span class="user-setting-caret">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>&nbsp;&nbsp;
                                    &nbsp;&nbsp;
                                    <form action="{{ route('student.profile.edit', auth()->user()->id) }}" >
                                        @csrf 
                                        <button class="focus:outline-none focus:bg-gray-100 focus:text-gray-900">Edit Account</button>
                                    </form>
                                </span>
                                <span class="user-setting-caret">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>&nbsp;&nbsp;
                                    &nbsp;&nbsp;
                                    <form action="{{ route('student.profile.change-password', auth()->user()->id) }}" >
                                        @csrf 
                                        <button class="focus:outline-none focus:bg-gray-100 focus:text-gray-900">Change Password</button>
                                    </form>
                                </span>
                                <span class="user-setting-caret">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <form action="{{ route('logout.student') }}" method="POST">
                                        @csrf 
                                        <button class="focus:outline-none focus:bg-gray-100 focus:text-gray-900" type="submit" name="logout">Logout</button>
                                    </form>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu" class="md:hidden cursor-pointer">
                    <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                </div>
            </div>
        </div>
        @else
        <div class="hidden md:block z-50 sticky inset-x-0 top-0 left-0 py-5">
            <div class="absolute top-0 right-0">
                <a href="{{ route('login') }}" class="text-white flex">
                    <button class="bg-green-600 p-8 focus:outline-none">
                        <img class="w-10 h-10" src="{{ asset('images/login.png') }}" alt="Login Button">
                        Log In
                    </button>
                </a>
            </div>
        </div>
        @endif
        <!-- Mobile Nav -->
        <div id="nav" class="w-2/3 fixed h-screen z-30 hidden bg-white text-green-600 pt-3">
            <!-- <div class="pb-4 shadow">
                <svg id="close" class="ml-auto mr-6 w-10 h-10 cursor-pointer" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </div> -->
            <div class="list-none p-2 text-xl border-t bg-white pt-20">
                <li class="py-3 px-4">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <span>
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        </span>
                        &nbsp;&nbsp;
                        <span>
                            Home
                        </span>
                    </a>
                </li>
                <li class="py-3 px-4">
                    <a href="{{ route('about') }}" class="flex items-center">
                        <span>
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg>        
                        </span>
                        &nbsp;&nbsp;
                        <span>
                            About Us
                        </span>
                    </a>
                </li>
                <li class="py-3 px-4">
                    <a href="{{ route('courses') }}" class="flex items-center">
                        <span>
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path><path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path></svg>
                        </span>
                        &nbsp;&nbsp;
                        <span>
                            Courses
                        </span>
                    </a>
                </li>
                <li class="py-3 px-4">
                    <a href="{{ route('ebook') }}" class="flex items-center">
                        <span>
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>            </span>
                        <span>
                        &nbsp;&nbsp;
                            E-books
                        </span>
                    </a>
                </li>
                <li class="py-3 px-4">
                    <a href="{{ route('blog') }}" class="flex items-center">
                        <span>
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path></svg>
                        </span>
                        &nbsp;&nbsp;
                        <span>
                            Blog
                        </span>
                    </a>
                </li>
                <li class="py-3 px-4">
                    <a href="{{ route('contact') }}" class="flex items-center">
                        <span>
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg>    
                        </span>
                        &nbsp;&nbsp;
                        <span>
                            Contact Us
                        </span>
                    </a>
                </li>
                @if(Auth::guest())
                <li class="py-3 px-4">
                    <a href="{{ route('login') }}" class="flex items-center">
                        <span>
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        </span>
                        &nbsp;&nbsp;
                        <span>
                            Sign In
                        </span>
                    </a>
                </li>
                @else
                <li class="py-3 px-4">
                    <form action="{{ route('student.profile.edit', auth()->user()->id) }}" >
                        @csrf 
                        <button class="flex focus:outline-none focus:text-gray-900">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>&nbsp;&nbsp;
                            <span>Edit Account</span>
                        </button>
                    </form>
                </li>
                <li class="py-3 px-4">
                    <form action="{{ route('student.profile.change-password', auth()->user()->id) }}" >
                        @csrf 
                        <button class="flex focus:outline-none focus:text-gray-900">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>&nbsp;&nbsp;
                            <span>Change Password</span>
                        </button>
                    </form>
                </li>
                <li class="py-3 px-4">
                    <form action="{{ route('logout.student') }}" method="POST">
                        @csrf 
                        <button class="flex focus:outline-none focus:text-gray-900">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            &nbsp;&nbsp;
                            <span>Logout</span>
                        </button>
                    </form>
                </li>
                @endif
            </div>
        </div>
        <!-- header  -->
        @yield('header')
        @yield('body-content')
        <!-- footer  -->
        <div class="bg-green-600">
            <div class="md:mx-32 px-4 py-6 text-white">
                <div class="md:grid grid-cols-5 gap-6 py-4">
                    <div class="col-span-2 md:w-2/3">
                        <span class="text-3xl font-medium border-b-4 border-white">Team Piccolo</span>
                        <img class="w-20 my-4" src="{{ asset('images/logo.png') }}" alt="Team Piccolo Logo">
                        <p class="text-lg">Have an Idea you want to develop? <br>Contact us now for your Best I.C.T Training and Software solutions</p>
                        <div class="flex justify-between my-4">
                            <a href="https://web.facebook.com/Teampiccolo/" target="_blank"><i class="fab fa-facebook text-4xl"></i></a>
                            <a href="https://twitter.com/kabiryusufbashi/" target="_blank"><i class="fab fa-twitter text-4xl"></i></a>
                            <a href="https://github.com/kabiryusufbashir/" target="_blank"><i class="fab fa-github text-4xl"></i></a>
                            <a href="https://www.youtube.com/channel/UCIRHd1QIP8gfPqcib6pbbiw/" target="_blank"><i class="fab fa-youtube text-4xl"></i></i></a>
                            <a href="https://wa.link/1i4dc7" target="_blank"><i class="fab fa-whatsapp text-4xl"></i></a>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <span class="text-xl">Navigation links</span>
                        <nav class="list-none text-white mt-4">
                            <li>
                                <a class="flex items-center py-2 text-lg" href="{{ route('home') }}">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path><path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                       &nbsp; Home
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center py-2 text-lg" href="{{ route('about') }}">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path><path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                        &nbsp; About Us
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center py-2 text-lg" href="{{ route('courses') }}">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path><path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                        &nbsp; Courses
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center py-2 text-lg" href="{{ route('ebook') }}">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path><path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                        &nbsp; E-books
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center py-2 text-lg" href="{{ route('blog') }}">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path><path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                        &nbsp; Blog
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center py-2 text-lg" href="{{ route('contact') }}">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path><path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                        &nbsp; Contact Us
                                </a>
                            </li>
                        </nav>
                    </div>
                    <div class="col-span-2 my-auto">
                        <span class="text-xl">Subscribe to our newsletter</span>
                        <form action="{{ route('news-letter') }}" class="text-black flex items-center" method="POST">
                            @csrf
                            <input class="px-5 border border-gray-300 h-14 rounded-tl-lg rounded-bl-lg my-2 text-lg focus:outline-none w-full" type="email" name="emails" id="newsLetter" placeholder="Subscribe to Our Newsletter">
                            <button class="bg-green-500 py-2 px-4 text-white rounded-tr-lg rounded-br-lg uppercase h-14 focus:outline-none" type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full py-4 text-center text-green-600 text-sm">
            Copyright &copy; 2021 Team Piccolo All Rights Reserved
        </div>
        <script src="{{ asset('js/courses.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>