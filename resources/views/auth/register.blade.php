@extends('auth.index')
@section('content')
    <div class="container mx-auto h-screen flex flex-col-reverse md:flex-row items-center justify-center bg-gray-200">
        <div class="flex-grow flex flex-col text-center md:text-left md:ml-5">
            <h1 class="text-5xl text-blue-500 font-bold">Desa Wiyoro</h1>
            <p class="text-3xl">Aplikasi Sistem informasi Desa Wiyoro</p>
        </div>
        <div class="flex-grow flex flex-col items-center my-4">
            <form action="{{ route('register') }}" method="post" class="shadow-lg w-80 p-4 flex flex-col bg-white rounded-lg">
            <h1 class="text-3xl font-bold mb-3 text-gray-500">Register</h1>
            
            @csrf
            @error('name')
                <div class='text-red-500 mt-1 text-xs'>
                    {{$message}}
                </div>
            @enderror
            <label for="nama" class="sr-only">Nama</label>
            <input type="text" name="nama" placeholder="Name" class="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-cyan-500 @error('name') border-red-500 @enderror" />
            

            @error('username')
                <div class='text-red-500 mt-1 text-xs'>
                    {{$message}}
                </div>
            @enderror
            <label for="username" class="sr-only">Username</label>
            <input type="text" name="username" placeholder="Username" class="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-cyan-500 @error('username') border-red-500 @enderror" />
            
            @error('email')
                <div class='text-red-500 mt-1 text-xs'>
                    {{$message}}
                </div>
            @enderror
            <label for="email" class="sr-only">Username</label>
            <input type="email" name="email" placeholder="Email" class="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-cyan-500" />
          
            @error('password')
                <div class='text-red-500 mt-1 text-xs'>
                    {{$message}}
                </div>
            @enderror
            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" placeholder="Pasword" class="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-cyan-500" />
         

            <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-lg font-semibold text-lg">Register</button>
            </form>
        </div>
    </div>
@endsection