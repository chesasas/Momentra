@extends('layouts.app')
@section('title', '| Hasil Templates')

@section('content')

<section class="min-h-screen flex items-center justify-center px-6 py-20">

    <div class="max-w-3xl w-full bg-white rounded-3xl shadow-xl overflow-hidden">

        <img src="{{ asset('storage/' . $coverPhoto) }}" class="w-full h-72 object-cover">

        <div class="p-10 text-center">

            <h1 class="text-5xl font-bold mb-4">
                {{ $data['groom_name'] }}
                &
                {{ $data['bride_name'] }}
            </h1>

            <p class="text-gray-500 mb-6">
                {{ $data['event_name'] }}
            </p>

            <div class="space-y-3 mb-10">
                <p>
                    📅 {{ $data['event_date'] }}
                </p>

                <p>
                    📍 {{ $data['location'] }}
                </p>
            </div>

            <p class="text-gray-600 leading-relaxed">
                {{ $data['description'] }}
            </p>

            <div class="mt-10">
                <a href="#" class="bg-secondary hover:bg-secondaryhover text-white px-8 py-4 rounded-2xl transition">
                    Lanjut Checkout
                </a>
            </div>

        </div>

    </div>

</section>

@endsection