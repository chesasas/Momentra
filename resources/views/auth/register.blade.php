@extends('layouts.guest')

@section('content')
<section class="flex items-center">
    <div class="w-1/3 mx-auto my-10 px-4 py-6 rounded-xl shadow-2xl">
        <h1 class="text-3xl font-bold mb-2 text-center">
            Buat Akun
        </h1>

        <p class="text-gray-500 text-center mb-8">
            Buat Akun Momentra Kamu
        </p>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Name -->
            <div>
                <label class="block mb-2 font-medium">
                    Nama Lengkap
                </label>

                <input type="text" name="name" required class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary">

                @error('name')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Username -->
            <div>
                <label class="block mb-2 font-medium">
                    Username
                </label>

                <input type="text" name="username" required class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary">

                @error('username')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block mb-2 font-medium">
                    Email
                </label>

                <input type="email" name="email" required class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary">

                @error('email')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Phone -->
            <div>
                <label class="block mb-2 font-medium">
                    Nomor Telepon
                </label>

                <input type="text" name="phone" required class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary">

                @error('phone')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block mb-2 font-medium">
                    Sandi
                </label>

                <input type="password" name="password" required class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary">

                @error('password')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label class="block mb-2 font-medium">
                    Konfirmasi Sandi
                </label>

                <input type="password" name="password_confirmation" required class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary">

                @error('password')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Button -->
            <button type="submit" class="w-full bg-primary text-white py-3 rounded-xl hover:bg-primaryhover transition">
                Daftar
            </button>

            <!-- Login -->
            <p class="text-center text-sm text-gray-500">
                Sudah punya akun?
                <a href="/login" class="text-primary font-medium">
                    Masuk
                </a>
            </p>

        </form>

    </div>
</section>
@endsection