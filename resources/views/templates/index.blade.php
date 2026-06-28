@extends('layouts.app')
@section('title', '| Templates')

@section('content')
<section class="pt-24 pb-10 px-6">

    <div class="max-w-7xl mx-auto">

        <div class="text-center mb-14">
            <h1 class="text-5xl font-bold mb-4">
                Wedding Templates
            </h1>

            <p class="text-gray-500">
                Pilih template undangan pernikahan terbaik untuk momen spesialmu.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">

            @foreach ($templates as $template)
            <a href="{{ route('templates.preview', $template->slug) }}" target="_blank" class="bg-white rounded-3xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300 flex flex-col">
                <img src="{{ asset($template->thumbnail) }}" class="w-full h-72 object-cover">

                <div class="p-6 flex flex-col flex-1">
                    <h2 class="text-2xl font-bold mb-2">
                        {{ $template->name }}
                    </h2>
                    <p class="text-gray-500 mb-4">
                        {{ $template->description }}
                    </p>

                    <div class="mt-auto flex justify-between items-center">
                        <span class="font-bold text-primary text-lg">
                            Rp {{ number_format($template->price, 0, ',', '.') }}
                        </span>

                        <span class="text-primary font-medium">
                            Lihat Template
                            <i class="fa-solid fa-arrow-right"></i>
                        </span>
                    </div>
                </div>
            </a>
            @endforeach

        </div>

    </div>

</section>

@endsection