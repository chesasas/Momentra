<!DOCTYPE html>
<html class="scroll-smooth" lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard') | Momentra</title>

    {{-- Font Awesome --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    {{-- Tailwind --}}
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body class="bg-gray-100 font-['Poppins']">

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        @include('dashboard.partials.sidebar')

        {{-- Main Content --}}
        <div class="flex-1 ml-64">

            {{-- Navbar --}}
            @include('dashboard.partials.navbar')

            {{-- Content --}}
            <main class="px-8 py-2 min-h-screen">

                @yield('content')

            </main>

            {{-- Footer --}}
            @include('dashboard.partials.footer')

        </div>

    </div>

    @stack('scripts')

</body>

</html>