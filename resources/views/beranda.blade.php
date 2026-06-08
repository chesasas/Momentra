@extends('layouts.app')

@section('content')

<!-- ================= HERO ================= -->
<section>
    <div class="h-screen w-full">
        <img src="{{ asset('images/hero-section.png') }}" class="z-0 absolute block w-full h-screen object-cover" alt="">
        <div class="absolute block w-full h-full bg-black/40"></div>
        <div class="relative z-10 w-full h-full flex items-center px-10">

            <div class="w-1/2"></div>

            <div class="w-1/2 mr-20 text-white">
                <h1 class="text-6xl font-bold mb-6 text-primary">
                    Awali Cerita Indahmu dari Sini
                </h1>
                <p class="mb-10 mr-10 text-white">
                    Dirancang dengan detail dan sentuhan elegan untuk membuat setiap momen pernikahanmu lebih berkesan.
                </p>
                <a href="templates/" class="bg-primary font-bold px-6 py-3 rounded-lg hover:bg-primaryhover transition">
                    PESAN SEKARANG
                </a>
            </div>

        </div>
    </div>
</section>

<!-- ================= TEMPLATES ================= -->
<section class="pt-32 text-center px-6 bg-white">
    <h1 class="text-4xl md:text-5xl font-bold my-2">
        Templates
    </h1>

    <p class="text-black">
        Beragam pilihan template siap pakai. Praktis, cepat, dan tetap elegan untuk hari spesialmu.
    </p>

    <div class="mt-4 mb-6">
        <a href="templates/" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primaryhover transition shadow-lg">
            Lihat Detail
        </a>
    </div>

    <div class="w-full flex justify-center max-w-7xl mx-auto">
        <div class="w-[30%] text-center">
            <div class="w-full mb-5">
                <img src="{{ asset('images/hasil-template.png') }}" alt="">
            </div>
            <p class="text-xl font-bold">Balinese</p>
        </div>
        <div class="w-[30%] mx-5 text-center">
            <div class="w-full mb-5">
                <img src="{{ asset('images/hasil-template.png') }}" alt="">
            </div>
            <p class="text-xl font-bold">Elegant</p>
        </div>
        <div class="w-[30%] text-center">
            <div class="w-full mb-5">
                <img src="{{ asset('images/hasil-template.png') }}" alt="">
            </div>
            <p class="text-xl font-bold">Casual</p>
        </div>
    </div>
</section>

<!-- ================= CERITA KAMI ================= -->
<section class="mt-24 py-20 text-center bg-secondary">
    <div class="max-w-5xl mx-auto flex justify-between items-center">
        <div class="w-[35%] flex items-top justify-end">
            <img src="favicon.ico" alt="" class="w-96">
        </div>
        <div class="w-[60%]">
            <h1 class="text-3xl text-left font-bold">Cerita Kami</h1>
            <p class="text-left">Mengapa momentra dibuat?</p>
            <p class="mt-6 text-left">Momentra lahir dari sebuah keinginan sederhana, yaitu membantu Anda membagikan kabar bahagia lewat undangan pernikahan digital yang cantik, berkesan, dan praktis.</p>
            <div class="mt-6 pb-2 text-left">
                <a href="tentangkami/" class="bg-primary text-white px-4 py-3 rounded-lg hover:bg-primaryhover transition shadow-lg">
                    Lihat Selengkapnya
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ================= GALLERY ================= -->
<section class="pt-32 pb-20 px-10">
    <div class="max-w-7xl mx-auto text-center">
        <p class="text-black">
            Bagikan Ceritamu Melalui Undangan
        </p>

        <h1 class="text-3xl md:text-4xl font-bold mb-4">
            #CeritaDalamMomentra
        </h1>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <div>
                <img class="h-auto max-w-full rounded-base" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-base" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-base" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-base" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-base" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-base" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-base" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-6.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-base" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-7.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-base" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-8.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-base" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-9.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-base" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-10.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-base" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-11.jpg" alt="">
            </div>
        </div>
    </div>
</section>

<!-- ================= FOOTER ================= -->
<footer class="py-10 text-center text-gray-500 text-sm">
    © 2026 Invitee. All rights reserved.
</footer>

<script id="w0s3f1">
    const navbar = document.getElementById('navbar');
    const logo = document.getElementById('logo');
    const navLinks = document.querySelectorAll('.nav-link');
    const nama = document.querySelectorAll('.nama');

    window.addEventListener('scroll', function () {
        if (window.scrollY > 50) {
            navbar.classList.add('bg-white', 'shadow');
            navbar.classList.remove('bg-transparent');

            logo.classList.remove('text-white');
            logo.classList.add('text-gray-800');

            navLinks.forEach(link => {
                link.classList.remove('text-white');
                link.classList.add('text-gray-800');
            });

            nama.forEach(link => {
                link.classList.remove('text-white');
                link.classList.add('text-gray-800');
            });

        } else {
            navbar.classList.remove('bg-white', 'shadow');
            navbar.classList.add('bg-transparent');

            logo.classList.add('text-white');
            logo.classList.remove('text-gray-800');

            navLinks.forEach(link => {
                link.classList.add('text-white');
                link.classList.remove('text-gray-800');
            });

            nama.forEach(link => {
                link.classList.add('text-white');
                link.classList.remove('text-gray-800');
            });
        }
    });
</script>

@endsection