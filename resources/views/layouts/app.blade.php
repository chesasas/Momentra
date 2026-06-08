<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Momentra @yield('title')</title>
    <link rel="icon" href="/favicon.ico">

    {{-- Font Icon Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white">
    <nav id="navbar" class="fixed w-full z-50 transition-all duration-300 {{ request()->is('/') ? 'bg-transparent' : 'bg-white shadow' }}">

        <div class="mx-auto px-8 py-4 flex justify-between items-center">
            <div class="flex items-center">
                <img src="favicon.ico" alt="" class="w-11">
                <h1 id="logo" class="text-2xl font-bold transition {{ request()->is('/') ? 'text-white' : 'text-gray-800' }}">
                    Momentra
                </h1>
            </div>
            <div class="hidden md:flex gap-8 items-center">
                <a href="/"
                class="nav-link transition hover:text-primary
                {{ request()->is('/') ? 'text-white' : 'text-gray-800' }}">
                Beranda
                </a>

                <a href="/templates"
                class="nav-link transition hover:text-primary
                {{ request()->is('/') ? 'text-white' : 'text-gray-800' }}">
                Templates
                </a>

                <a href="/panduan"
                class="nav-link transition hover:text-primary
                {{ request()->is('/') ? 'text-white' : 'text-gray-800' }}">
                Panduan
                </a>

                <a href="/tentangkami"
                class="nav-link transition hover:text-primary
                {{ request()->is('/') ? 'text-white' : 'text-gray-800' }}">
                Tentang Kami
                </a>

                <p class="text-white">|</p>


                @auth
                <div class="flex items-center gap-4">

                    <span class="{{ request()->is('/') ? 'text-white' : 'text-gray-800' }} nama">
                        Hai, {{ Auth::user()->username }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                            class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                            Logout
                        </button>
                    </form>
                </div>

                @else
                <div class="flex items-center gap-4">
                    <a href="/login" class="nav-link text-sm {{ request()->is('/') ? 'text-white' : 'text-gray-800' }}">
                    Login
                    </a>

                    <a href="/register" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primaryhover transition shadow">
                    Register
                    </a>
                </div>
                @endauth
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- ================= FOOTER ================= -->
    <footer class="py-10 text-center text-gray-500 text-sm">
        © 2026 Invitee. All rights reserved.
    </footer>
</body>
</html>
