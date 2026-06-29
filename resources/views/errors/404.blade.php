<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 | Momentra</title>

    @vite(['resources/css/app.css'])
</head>
<body class="bg-white">
    <div class="h-screen w-3/4 flex justify-center items-center mx-auto text-center">
        <div class="w-1/2">
            <div class="flex items-center justify-center">
                <img src="favicon.ico" alt="" class="w-11">
                <h1 id="logo" class="text-2xl font-bold transition {{ request()->is('/') ? 'text-white' : 'text-gray-800' }}">
                    Momentra
                </h1>
            </div>

            <h1 class=" text-9xl font-bold">404</h1>
            <h2 class="text-primary font-semibold text-2xl">Sepertinya kamu tersesat.</h2>

            <p class="mt-4 mb-8">Halaman yang ingin Anda akses tidak tersedia atau telah dipindahkan. Silakan kembali ke Beranda.</p>

            <a href="{{ url('/') }}" class="mt-4 bg-primary text-white px-4 py-3 rounded-lg hover:bg-primaryhover transition">
                Kembali ke Beranda
            </a>
        </div>
        <div class="w-1/2 flex justify-center">
            <img src="images/404 Not Found.png" alt="" class="">
        </div>
    </div>
</body>
</html>