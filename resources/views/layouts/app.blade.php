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
                <a href="/" class="nav-link transition hover:text-primary {{ request()->is('/') ? 'text-white' : 'text-gray-800' }}">
                Beranda
                </a>

                <a href="/templates" class="nav-link transition hover:text-primary {{ request()->is('/') ? 'text-white' : 'text-gray-800' }}">
                Template
                </a>

                <a href="/panduan" class="nav-link transition hover:text-primary {{ request()->is('/') ? 'text-white' : 'text-gray-800' }}">
                Panduan
                </a>

                <a href="/tentangkami" class="nav-link transition hover:text-primary {{ request()->is('/') ? 'text-white' : 'text-gray-800' }}">
                Tentang Kami
                </a>

                @auth
                <p class="nav-link transition {{ request()->is('/') ? 'text-white' : 'text-gray-800' }}">|</p>
                
                <div class="flex items-center gap-4">

                    <span class="{{ request()->is('/') ? 'text-white' : 'text-gray-800' }} nama">
                        Hai, {{ Auth::user()->username }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                            class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            Logout
                        </button>
                    </form>
                </div>

                @else
                <div class="flex items-center gap-4">
                    <a href="/login" class="nav-link transition hover:scale-105 {{ request()->is('/') ? 'text-white' : 'text-gray-800' }}">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i>
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
    <footer class="p-5 text-left text-white bg-primary">
        <div class="flex justify-between gap-2 pb-4">
            <div class="w-1/2 flex gap-1 items-center">
                <img src="{{ asset('white-logo.png') }}" alt="" class="w-16">
                <h1 class="text-3xl">Momentra</h1>
            </div>
            <div class="w-1/4 pt-2">
                <h1 class="text-3xl">Quick Links</h1>
            </div>
            <div class="w-1/4 pt-2">
                <h1 class="text-3xl">Lihat Template</h1>
            </div>
        </div>
        <div class="flex justify-between gap-2 items-start">
            <div class="w-1/2">
                <div>
                    <p class="text-lg">Email: info@momentra.com</p>
                </div>
                <div class="flex gap-4 text-3xl pt-5">
                    <a href="https://wa.me/6281775037615" target="_blank" class="hover:scale-110 transition ease-in-out">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                    <a href="https://instagram.com" target="_blank" class="hover:scale-110 transition ease-in-out">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://tiktok.com" target="_blank" class="hover:scale-110 transition ease-in-out">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                </div>
                <div class="pt-10">
                    <button id="scrollTopBtn" class="px-3 py-2 bg-white rounded-lg hover:scale-105 transition text-sm text-black">
                        Kembali ke Atas
                        <i class="fa-solid fa-arrow-turn-up"></i>
                    </button>
                </div>
            </div>
            <div class="w-1/4 flex flex-col gap-4 text-lg">
                <a href="/" class="nav-link hover:underline">
                Beranda
                </a>
                <a href="/templates" class="nav-link hover:underline">
                Template
                </a>
                <a href="/panduan" class="nav-link hover:underline">
                Panduan
                </a>
                <a href="/tentangkami" class="nav-link hover:underline">
                Tentang Kami
                </a>
            </div>
            <div class="w-1/4 flex flex-col gap-4 text-lg">
                <a href="/templates/preview/balinese-elegant" class="nav-link hover:underline">
                Balinese Elegant
                </a>
                <a href="/templates/preview/simple-beauty" class="nav-link hover:underline">
                Simple Beauty
                </a>
                <a href="/templates/preview/romantic-floral" class="nav-link hover:underline">
                Romantic Floral
                </a>
            </div>
        </div>
        <div class="text-center pt-8 italic text-gray-200">
            <p>&copy 2026 Momentra. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>

<script>
    document
    .getElementById('scrollTopBtn')
    .addEventListener('click', () => {

        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });

    });
</script>