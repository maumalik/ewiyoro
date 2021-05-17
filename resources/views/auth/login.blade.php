@extends('auth.index')
@section('content')
    <div class="container mx-auto h-screen flex flex-col-reverse md:flex-row items-center justify-center bg-gray-200">
        <div class="flex-grow flex flex-col text-center md:text-left md:ml-5">
            <h1 class="text-5xl text-blue-500 font-bold">Desa Wiyoro</h1>
            <p class="text-3xl">Aplikasi PBB Desa Wiyoro</p>
        </div>
        <div class="flex-grow flex flex-col items-center my-4">
            <form action="{{ route('login') }}" method="post" class="shadow-lg w-80 p-4 flex flex-col bg-white rounded-lg">

            @if (session('status'))
            <div class="bg-red-200 w-full px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto ">
            <svg
                viewBox="0 0 24 24"
                class="text-red-600 w-5 h-5 sm:w-5 sm:h-5 mr-3"
                >
                <path
                    fill="currentColor"
                    d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z"
                    ></path>
            </svg>
            <span class="text-red-800 text-sm">{{ session('status') }}</span>
            </div>
            @endif
            
            <h1 class="text-3xl font-bold mb-3 text-gray-500">Login</h1>
            
            @csrf
            @error('username')
                <div class='text-red-500 mt-1 text-xs'>
                    {{$message}}
                </div>
            @enderror
            <label for="username" class="sr-only">Username</label>
            <input type="text" name="username" placeholder="Username" class="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-cyan-500 @error('username') border-red-500 @enderror" value="{{ old('username') }}" />
            
            @error('password')
                <div class='text-red-500 mt-1 text-xs'>
                    {{$message}}
                </div>
            @enderror
            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" placeholder="Pasword" class="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-cyan-500 @error('password') border-red-500 @enderror" />
            <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-lg font-semibold text-lg">Login</button>
            </form>
        </div>
    </div>
@endsection
