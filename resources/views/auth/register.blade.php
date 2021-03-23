@extends('auth.index')
@section('content')
    <div class="container mx-auto h-screen flex flex-col-reverse md:flex-row items-center justify-center bg-gray-200">
        <div class="flex-grow flex flex-col text-center md:text-left md:ml-5">
            <h1 class="text-5xl text-blue-500 font-bold">Desa Wiyoro</h1>
            <p class="text-3xl">Aplikasi Sistem informasi Desa Wiyoro</p>
        </div>
        <div class="flex-grow flex flex-col items-center my-4">
            
            
            <form action="{{ route('register') }}" method="post" class="shadow-lg w-80 p-4 flex flex-col bg-white rounded-lg">
            
            @if (session('status'))
            <div class="bg-green-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto">
                <svg
                    viewBox="0 0 24 24"
                    class="text-green-600 w-5 h-5 sm:w-5 sm:h-5 mr-3"
                    >
                    <path
                        fill="currentColor"
                        d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z"
                        ></path>
                </svg>
                <span class="text-sm text-green-800">{{ session('status') }}</span>
            </div>
            @endif

            <h1 class="text-3xl font-bold mb-3 text-gray-500">Register</h1>
            
            @csrf
            @error('name')
                <div class='text-red-500 mt-1 text-xs'>
                    {{$message}}
                </div>
            @enderror
            <label for="name" class="sr-only">Nama</label>
            <input type="text" name="name" placeholder="Name" class="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-cyan-500 @error('name') border-red-500 @enderror" value="{{ old('name') }}"/>
            

            @error('username')
                <div class='text-red-500 mt-1 text-xs'>
                    {{$message}}
                </div>
            @enderror
            <label for="username" class="sr-only">Username</label>
            <input type="text" name="username" placeholder="Username" class="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-cyan-500 @error('username') border-red-500 @enderror" value="{{ old('username') }}"/>
            
            @error('email')
                <div class='text-red-500 mt-1 text-xs'>
                    {{$message}}
                </div>
            @enderror
            <label for="email" class="sr-only">Email</label>
            <input type="email" name="email" placeholder="Email" class="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-cyan-500 @error('email') border-red-500 @enderror" value="{{ old('email') }}"/>
          
            @error('password')
                <div class='text-red-500 mt-1 text-xs'>
                    {{$message}}
                </div>
            @enderror
            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" placeholder="Pasword" class="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-cyan-500 @error('password') border-red-500 @enderror" />
         

            <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-lg font-semibold text-lg">Register</button>
            </form>
        </div>
    </div>
@endsection