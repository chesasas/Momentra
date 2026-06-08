@extends('layouts.guest')

@section('content')
<section class="h-screen flex items-center">
    <div class="w-1/3 mx-auto px-4 py-6 rounded-xl shadow-2xl">
        @if(session('error'))
            <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded-lg">
                {{ session('error') }}
            </div>
        @endif
        <div class="flex justify-center items-center mx-auto mb-4">
            a
            <h1 class="text-3xl font-bold">
                Momentra
            </h1>
        </div>
    
        <p class="text-gray-500 text-center mb-8">
            Masuk ke Akun Momentra Kamu
        </p>
    
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf
    
            <!-- Email -->
            <div>
                <label class="block mb-2 font-medium">
                    Email
                </label>
    
                <input type="email" name="email" required class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary">
            </div>
    
            <!-- Password -->
            <div>
                <label class="block mb-2 font-medium">
                    Password
                </label>
    
                <input type="password" name="password" required class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary">
            </div>
    
            <!-- Remember -->
            <div class="flex items-center gap-2">
                <input type="checkbox" name="remember" class="w-4">
                <span class="text-sm text-gray-600">
                    Ingat Saya
                </span>
            </div>
    
            <!-- Button -->
            <button type="submit" class="w-full bg-primary text-white py-3 rounded-xl hover:bg-primaryhover transition">
                Masuk
            </button>
    
            <!-- Register -->
            <p class="text-center text-sm text-gray-500">
                Belum punya akun?
                <a href="/register" class="text-primary font-medium">
                    Register
                </a>
            </p>
        </form>
    </div>
</section>
@endsection