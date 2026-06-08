@extends('layouts.templates')
@section('title', '| Romantic Floral')

@section('font')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alan+Sans:wght@300..900&family=Cormorant+Garamond:ital,wght@0,300..700;1,300..700&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alan+Sans:wght@300..900&family=Cormorant+Garamond:ital,wght@0,300..700;1,300..700&family=Cormorant+SC:wght@300;400;500;600;700&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
@endsection

@section('content')
<style>
    h1 {
        font-family: "Cormorant SC", serif !important;
    }
    p {
        font-family: "Cormorant Garamond", serif !important;
    }
</style>
<nav id="navbar" class="fixed w-full z-50 transition-all duration-300 {{ request()->is('/') ? 'bg-transparent' : 'bg-white shadow' }}">
    <div class="mx-auto px-8 py-4 flex justify-between items-center">
        <h2 id="logo" class="text-2xl font-bold transition text-gray-800">
            Momentra
        </h2>
        <div class="flex gap-4 text-center items-center">
            <a href="/templates" class="inline-block hover:text-primary transition">
                <i class="fa-solid fa-arrow-left"></i>
                Kembali
            </a>
            <a href="{{ route('templates.edit', $template->slug) }}" class="inline-block bg-primary hover:bg-primaryhover text-white px-4 py-3 rounded-lg transition">
                Gunakan Template
            </a>
        </div>
    </div>
</nav>
<section>
    <div  class="bg-[#f6f0eb] pt-20">
        
    </div>
</section>

@endsection
