@extends('auth.index')
@section('content')
    <div class="container mx-auto h-screen flex flex-col-reverse md:flex-row items-center justify-center bg-gray-200">
        <div class="flex-grow flex flex-col text-center md:text-left md:ml-5">
            <h1 class="text-5xl text-blue-500 font-bold">Desa Wiyoro</h1>
            <p class="text-3xl">Aplikasi Sistem informasi Desa Wiyoro</p>
        </div>
        <div class="flex-grow flex flex-col items-center my-4">
            <form class="shadow-lg w-80 p-4 flex flex-col bg-white rounded-lg">
            <h1 class="text-3xl font-bold mb-3 text-gray-500">Login</h1>
            <label for="username" class="sr-only">Username</label>
            <input type="text" name="username" placeholder="Username" class="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-cyan-500" />
            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" placeholder="Pasword" class="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-cyan-500" />
            <button class="w-full bg-blue-500 text-white p-3 rounded-lg font-semibold text-lg">Login</button>
            </form>
        </div>
    </div>
@endsection
