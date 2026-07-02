{{-- SIDEBAR --}}
<div class="fixed top-0 left-0 h-screen w-64 bg-primary text-white shadow-xl flex flex-col z-30">

    {{-- Logo --}}
    <div class="h-20 flex items-center justify-center border-b border-white/20">

        <a href="{{ route('dashboard.index') }}"
            class="flex items-center gap-3">

            <div class="w-11 h-11 rounded-full bg-white/20 flex items-center justify-center">
                <i class="fa-solid fa-envelope text-xl"></i>
            </div>

            <div>
                <h1 class="text-2xl font-bold">
                    Momentra
                </h1>

                <p class="text-sm text-white/70">
                    Dashboard
                </p>
            </div>

        </a>

    </div>

    {{-- Menu --}}
    <nav class="flex-1 px-5 py-8 space-y-2">

        <a href="/dashboard#dashboard" class="flex items-center gap-3 px-4 py-3 rounded-xl transition hover:bg-white/10">
            <i class="fa-solid fa-chart-line w-5 text-center"></i>
            Dashboard
        </a>

        <a href="/dashboard#undangan" class="flex items-center gap-3 px-4 py-3 rounded-xl transition hover:bg-white/10">
            <i class="fa-solid fa-envelope w-5 text-center"></i>
            Undangan Saya
        </a>

        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl transition hover:bg-white/10">
            <i class="fa-solid fa-user w-5 text-center"></i>
            Profil
        </a>

    </nav>

    {{-- User --}}
    <div class="border-t border-white/20 p-5">

        <div class="flex items-center gap-3 mb-4">

            <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center">

                <i class="fa-solid fa-user text-xl"></i>

            </div>

            <div>

                <p class="font-semibold">

                    {{ Auth::user()->username }}

                </p>

                <p class="text-sm text-white/70">

                    {{ Auth::user()->email }}

                </p>

            </div>

        </div>

        <form method="POST"
            action="{{ route('logout') }}">

            @csrf

            <button
                class="w-full bg-red-500 hover:bg-red-600 transition rounded-xl py-3">

                <i class="fa-solid fa-right-from-bracket mr-2"></i>

                Logout

            </button>

        </form>

    </div>

</div>