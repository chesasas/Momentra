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

<!-- ================= CERITA KAMI ================= -->
<section class="pt-32 text-center">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <div class="w-[35%] flex items-top justify-end">
            <img src="favicon.ico" alt="" class="w-96">
        </div>
        <div class="w-[60%]">
            <h1 class="text-3xl text-left font-bold">Cerita Kami</h1>
            <p class="text-left">Mengapa momentra dibuat?</p>
            <p class="mb-6 text-left pt-10">Momentra lahir dari sebuah keinginan sederhana: membantu Anda membagikan kabar bahagia lewat undangan pernikahan digital yang cantik, berkesan, dan praktis.</p>
            <p class="mb-6 text-left">Di balik Momentra, ada enam orang dengan ketertarikan mendalam di bidang teknologi dan desain pernikahan digital. Sebagai tim kecil, kami fokus memastikan setiap detail undangan Anda tampil memikat demi menyambut momen sakral sekali seumur hidup.</p>
            <p class="mb-6 text-left">Kami percaya keindahan tidak harus rumit atau mahal. Karena itu, Momentra hadir menawarkan platform yang mudah digunakan dan desain yang elegan, namun tetap ramah di kantong.</p>
        </div>
    </div>
</section>

<!-- ================= NILAI KAMI ================= -->
<section class="pt-32 text-center">
    <h1 class="text-3xl font-bold">Nilai Kami</h1>
    <p>Apa yang kami pedomi?</p>
    
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-8 text-center pt-10">
        <div class="p-6 rounded-xl flex justify-center items-center">
            <div class="text-center mr-2">
                <img src="{{ asset('images/icons/heart.png') }}" alt="" class="w-80">
            </div>
            <div class="text-justify">
                <h1 class="text-3xl font-bold mb-2 text-[#4A3B2C]">Kepedulian</h1>
                <p class="text-black text-md">Kami memahami bahwa setiap acara adalah momen berharga. Karena itu, kami usahakan yang terbaik untuk membantu Anda.</p>
            </div>
        </div>
        <div class="p-6 rounded-xl flex justify-center items-center">
            <div class="text-center mr-2">
                <img src="{{ asset('images/icons/kualitas.png') }}" alt="" class="w-80">
            </div>
            <div class="text-justify">
                <h1 class="text-3xl font-bold mb-2 text-[#4A3B2C]">Kualitas</h1>
                <p class="text-black text-md">Kami memahami bahwa setiap acara adalah momen berharga. Karena itu, kami usahakan yang terbaik untuk membantu Anda.</p>
            </div>
        </div>
        <div class="p-6 rounded-xl flex justify-center items-center">
            <div class="text-center mr-2">
                <img src="{{ asset('images/icons/personal touch.png') }}" alt="" class="w-80">
            </div>
            <div class="text-justify">
                <h1 class="text-3xl font-bold mb-2 text-[#4A3B2C]">Personal Touch</h1>
                <p class="text-black text-md">Kami memahami bahwa setiap acara adalah momen berharga. Karena itu, kami usahakan yang terbaik untuk membantu Anda.</p>
            </div>
        </div>
        <div class="p-6 rounded-xl flex justify-center items-center">
            <div class="text-center mr-2">
                <img src="{{ asset('images/icons/kejujuran.png') }}" alt="" class="w-80">
            </div>
            <div class="text-justify">
                <h1 class="text-3xl font-bold mb-2 text-[#4A3B2C]">Kejujuran</h1>
                <p class="text-black text-md">Kami memahami bahwa setiap acara adalah momen berharga. Karena itu, kami usahakan yang terbaik untuk membantu Anda.</p>
            </div>
        </div>
    </div>
</section>

<!-- ================= PERTANYAAN ================= -->
<section class="pt-32 pb-20 text-center">
    <h1 class="text-3xl font-bold">Ada Pertanyaan?</h1>
    <p class="max-w-3xl mx-auto my-16">Jangan ragu untuk menghubungi kami. Apakah Anda butuh bantuan teknis, ingin konsultasi tentang desain, atau sekadar ingin tahu lebih lanjut tentang Momentra, kami siap membantu.</p>
    <a href="https://wa.me/6281775037615?text=Halo kak, saya mau bertanya..." class="bg-primary text-white px-3 py-2 rounded-lg hover:bg-primaryhover transition shadow-lg">
        <i class="fa-brands fa-whatsapp text-xl"></i>
        Hubungi Kami
    </a>
</section>

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