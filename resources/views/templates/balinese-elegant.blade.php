<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Momentra</title>
    <link rel="icon" href="/favicon.ico">

    {{-- Font Icon Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alan+Sans:wght@300..900&family=Cormorant+Garamond:ital,wght@0,300..700;1,300..700&family=Cormorant+SC:wght@300;400;500;600;700&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alan+Sans:wght@300..900&family=Alex+Brush&family=Cormorant+Garamond:ital,wght@0,300..700;1,300..700&family=Cormorant+SC:wght@300;400;500;600;700&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f6f0eb]">
    <style>
        p,span,h1,a {
            font-family: "Cormorant Garamond", serif !important;
            color: #435564;
            font-weight: 200;
        }
        
        h2 {
            font-family: "Alex Brush", serif !important;
            color: #435564;
            font-weight: 200;
        }
    </style>
    <nav id="navbar" class="w-full z-50 transition-all duration-300 {{ request()->is('/') ? 'bg-transparent' : 'bg-white shadow' }}">
        <div class="mx-auto px-8 py-4 flex justify-between items-center">
            <h3 id="logo" class="text-2xl font-bold transition text-gray-800">
                Momentra
            </h3>
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

    
</body>
</html>
