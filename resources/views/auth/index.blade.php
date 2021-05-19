<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>PBB Desa Wiyoro</title>
</head>
<body class="bg-gray-200">
    <header class="text-gray-600 body-font bg-white">
        <div class="container mx-auto flex flex-wrap py-5 flex-col md:flex-row items-center">
        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="ml-3 text-xl">Desa Wiyoro</span>
        </a>
        <!--
        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            <a href="{{ route('login') }}" class="mr-5 hover:text-gray-900">Login</a>
            <a href="{{ route('register') }}" class="mr-5 hover:text-gray-900">Registrasi</a>
        </nav>-->
        </div>
    </header>

    @yield('content')
   
    <footer class="text-gray-600 body-font bg-white">
        <div class="container mx-auto py-5 flex flex-row justify-center items-center">
          <p class="text-xs md:text-sm text-gray-500">© Pemerintah Desa Wiyoro 2021</p>
        </div>
      </footer>
</body>
</html>