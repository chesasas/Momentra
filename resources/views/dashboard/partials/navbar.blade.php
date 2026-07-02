<!-- Top Navbar -->
<nav class="sticky top-0 z-30 bg-white border-b border-gray-200">
    <div class="flex items-center justify-between px-8 py-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                @yield('page-title', 'Dashboard')
            </h1>

            <p class="text-sm text-gray-600 mt-1">
                Kelola undangan online Anda dengan mudah.
            </p>
        </div>
        <div class="flex items-center gap-4">
            <a href="/" class="flex items-center gap-1 px-4 py-2 rounded-lg font-semibold bg-primary text-white hover:bg-primaryhover transition">
                <i class="fa-solid fa-house"></i>
                Kembali ke Beranda
            </a>
        </div>
    </div>
</nav>