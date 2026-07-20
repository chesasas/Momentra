<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title class="capital">Krisna & Dewina | Momentra </title>
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
<body class="bg-[#dacfbf] overflow-x-hidden">
    <style>
        p,span,h1,label {
            font-family: "Cormorant Garamond", serif !important;
            color: #3e474f;
            font-weight: 200;
        }
        
        h2,h6 {
            font-family: "Alex Brush", serif !important;
            color: #3e474f;
            font-weight: 200;
        }
    </style>

    <!-- PAUSE BUTTON -->
    <a href="#" class="hidden fixed bottom-5 right-5 text-4xl z-30" id="btnPause" onclick="togglePause()">⏸️</a>

    <nav id="navbar" class="w-full z-50 transition-all duration-300 {{ request()->is('/') ? 'bg-transparent' : 'bg-[#ffffff] shadow' }}">
        <div class="mx-auto px-8 py-4 flex justify-between items-center">
            <h3 id="logo" class="text-2xl font-bold transition text-gray-800">
                Momentra
            </h3>
            <div class="flex gap-4 text-center items-center">
                <a href="/templates" class="inline-block hover:text-primary transition">
                    <i class="fa-solid fa-arrow-left"></i>
                    Kembali
                </a>
                <form action="{{ route('templates.use', $template->slug) }}" method="POST">
                    @csrf

                    <button type="submit" class="inline-block font-['Montserrat'] font-semibold bg-primary hover:bg-primaryhover text-[#ffffff] px-3 py-2 rounded-lg transition">
                        <i class="fa-solid fa-wand-magic-sparkles"></i>
                        Gunakan Template
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <section id="sectionCover">
        {{--===== COVER ====================--}}
        <section class="">
            <div class="relative text-center h-screen flex justify-between">
                <img src="{{ asset('images/templates/balinese-elegant/bunga.png') }}" alt="" class="absolute right-0 top-0 h-[30%] -z-20">

                <div class="w-[50%] h-full flex relative">
                    <img src="{{ asset('images/templates/simple-beauty/simple-beauty-photo1.png') }}" alt="" class="object-cover w-full h-full">

                    <div class="absolute right-0 top-0 w-32 h-screen bg-gradient-to-l from-[#dacfbf] to-transparent z-10"></div>
                </div>
                <div class="w-[50%] px-10 pt-20 flex flex-col justify-center">
                    <h1 class="text-3xl pb-12">Undangan Pernikahan</h1>
                    
                    <div class="pb-10">
                        <h2 class="text-8xl">Krisna</h2>
                        <h1 class="text-4xl">&</h1>
                        <h2 class="text-8xl">Dewina</h2>
                    </div>

                    <h1 class="text-2xl">Kepada Bapak/Ibu/Saudara/i</h1>
                    <h1 class="text-4xl font-semibold py-4">[Nama Undangan]</h1>
                    <h1 class="max-w-md mx-auto text-2xl">Mohon maaf apabila ada kesalahan dalam penulisan nama atau gelar.</h1>
                    
                    <div class="my-8">
                        <a href="#undangan" onclick="bukaUndangan()" class="font-['Cormorant_Garamond'] inline-block py-2 px-4 text-xl bg-[#ffffff] rounded-xl font-light hover:scale-105 transition duration-200">
                            <i class="fa-regular fa-envelope"></i>
                            Buka Undangan
                        </a>

                        {{-- AUDIO --}}
                        <audio id="bgMusic" loop>
                            <source src="{{ asset('storage/music/Beautiful In [#ffffff] - Shane Filan.mp3') }}" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
            </div>
        </section>
    </section>

<div id="kontenUndangan" class="hidden">
    {{--===== SAVE THE DATE ====================--}}
    <section class="relative bg-cover bg-center z-0" style="background-image: url('{{ asset('images/templates/simple-beauty/simple-beauty-photo1.png') }}')">
        <div class="absolute bg-black opacity-20 w-full h-screen z-0"></div>
        <div class="absolute top-0 right-0 w-[90%] h-full bg-gradient-to-l from-black to-transparent z-10"></div>

        <div id="undangan" class="text-center h-screen mr-20 py-20 flex justify-end items-center">
            <div class="z-20">
                <h1 class="text-3xl mb-4 text-[#ffffff]">Save The Date</h1>

                {{-- COUNTDOWN --}}
                <div class="w-full flex justify-center font-semibold">

                    <div id="countdown" class="flex justify-center gap-4 flex-wrap">
                        <div class="w-24 h-24 flex flex-col justify-center items-center shadow-lg">
                            <span id="days" class="text-5xl font-bold text-[#ffffff] mb-2">0</span>
                            <span class="text-xs uppercase tracking-widest text-[#ffffff]">
                                Hari
                            </span>
                        </div>

                        <div class="w-24 h-24 flex flex-col justify-center items-center shadow-lg">
                            <span id="hours" class="text-5xl font-bold text-[#ffffff] mb-2">0</span>
                            <span class="text-xs uppercase tracking-widest text-[#ffffff]">
                                Jam
                            </span>
                        </div>

                        <div class="w-24 h-24 flex flex-col justify-center items-center shadow-lg">
                            <span id="minutes" class="text-5xl font-bold text-[#ffffff] mb-2">0</span>
                            <span class="text-xs uppercase tracking-widest text-[#ffffff]">
                                Menit
                            </span>
                        </div>

                        <div class="w-24 h-24 flex flex-col justify-center items-center shadow-lg">
                            <span id="seconds" class="text-5xl font-bold text-[#ffffff] mb-2">0</span>
                            <span class="text-xs uppercase tracking-widest text-[#ffffff]">
                                Detik
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{--===== LAKIK ====================--}}
    <section class="relative h-screen flex flex-col justify-center items-center w-full border-b-2 border-black">
        <img src="{{ asset('images/templates/balinese-elegant/bunga.png') }}" alt="" class="absolute right-0 top-0 h-[30%]">
        <img src="{{ asset('images/templates/balinese-elegant/bunga.png') }}" alt="" class="absolute left-0 bottom-0 h-[30%] rotate-180">

        <div class="max-w-7xl h-[80%] bg-[#ffffff] rounded-3xl shadow-2xl text-center py-10 px-24 flex justify-between items-center">
            <div class="w-[50%] h-full flex justify-center items-center">
                <img src="{{ asset('images/templates/simple-beauty/simple-beauty-photo1.png') }}" alt="" class="object-cover w-[80%] h-full rounded-full">
            </div>
            <div class="w-[50%] flex flex-col gap-6">
                <h2 class="text-9xl text-[#a59681]">Nathan</h2>
                <h1 class="text-3xl font-semibold">Nathan Christopher Gunawan</h1>
                <h1 class="text-3xl italic">Putra dari pasangan</h1>
                <div>
                    <h1 class="text-3xl font-semibold">Albert Gunawan</h1>
                    <h1 class="text-3xl font-semibold">&</h1>
                    <h1 class="text-3xl font-semibold">Siska Natalia</h1>
                </div>
            </div>
        </div>
    </section>

    {{--===== PEREMPUAN ====================--}}
    <section class="relative h-screen flex flex-col justify-center items-center w-full">
        {{-- <img src="{{ asset('images/templates/balinese-elegant/bunga-rotate.png') }}" alt="" class="absolute left-0 top-0 h-[30%]">
        <img src="{{ asset('images/templates/balinese-elegant/bunga-rotate.png') }}" alt="" class="absolute right-0 bottom-0 h-[30%] rotate-180"> --}}
        <img src="{{ asset('images/templates/balinese-elegant/bunga.png') }}" alt="" class="absolute left-0 bottom-0 h-[30%] rotate-180">
        <img src="{{ asset('images/templates/balinese-elegant/bunga.png') }}" alt="" class="absolute right-0 top-0 h-[30%]">

        <div class="max-w-7xl h-[80%] bg-[#ffffff] rounded-3xl shadow-2xl text-center py-10 px-24 flex justify-between items-center">
            <div class="w-[50%] h-full flex justify-center items-center">
                <img src="{{ asset('images/templates/simple-beauty/simple-beauty-photo1.png') }}" alt="" class="object-cover w-[80%] h-full rounded-full">
            </div>
            <div class="w-[50%] flex flex-col gap-6">
                <h2 class="text-9xl text-[#a59681]">Clara</h2>
                <h1 class="text-3xl font-semibold">Clara Abigail Tan</h1>
                <h1 class="text-3xl italic">Putri dari pasangan</h1>
                <div>
                    <h1 class="text-3xl font-semibold">Hendra Tan</h1>
                    <h1 class="text-3xl font-semibold">&</h1>
                    <h1 class="text-3xl font-semibold">Monica Lee</h1>
                </div>
            </div>
        </div>
    </section>
    
    {{--===== INFO ACARA ====================--}}
    <section class="relative bg-cover bg-center z-0" style="background-image: url('{{ asset('images/templates/simple-beauty/simple-beauty-photo1.png') }}')">
        <div class="absolute bg-black opacity-20 w-full h-screen z-0"></div>
        <div class="absolute top-0 right-0 w-[90%] h-full bg-gradient-to-l from-black to-transparent z-10"></div>
        
        <div class="text-center h-screen px-20 flex justify-end items-center z-20">
            <div class="z-20">
                <h2 class="text-8xl text-[#ffffff] pb-16 z-20">Acara Kami</h2>
                
                <div class="items-center z-20">
                    <div class="flex flex-col text-center gap-6">
                        <h1 class="text-3xl text-[#ffffff] font-semibold mb-2">Sabtu, 20 Juni 2026</h1>
                        <h1 class="text-3xl text-[#ffffff]">16.00 WITA s/d 20.00 WITA</h1>
                        <h1 class="text-3xl text-[#ffffff] font-semibold mb-2">The Stone Hotel</h1>
                    </div>
                </div>
    
                <div class="my-8 z-20">
                    <a href="https://www.google.com/maps" target="_blank" class="font-['Cormorant_Garamond'] inline-block py-2 px-4 text-lg bg-[#ffffff] rounded-xl font-light hover:scale-105 transition duration-200 z-30">
                        <i class="fa-solid fa-location-dot"></i>
                        Lihat Lokasi
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    {{--===== GALLERY ====================--}}
    <section>
        <div class="relative text-center pt-10 flex flex-col">
            <h2 class="text-6xl pb-8 text-[#ffffff]">Wedding Gallery</h2>

            <section id="gallery">
                <div class="flex flex-wrap justify-center gap-4 mx-8">
                    {{-- @forelse($order->galleryPhotos as $index => $photo)

                        <img src="{{ asset('storage/'.$photo->file_path) }}" data-index="{{ $index }}" class="gallery-image cursor-pointer w-80 h-60 object-cover rounded-xl hover:scale-105 transition duration-300">

                    @empty --}}

                        <p class="col-span-full text-center text-gray-500">
                            Belum ada foto gallery.
                        </p>

                    {{-- @endforelse --}}
                </div>
            </section>

            {{-- <div id="galleryModal" class="fixed inset-0 bg-black/70 backdrop-blur-md opacity-0 invisible transition-all duration-300 flex justify-center items-center z-[999]">
                <!-- Close -->
                <button id="closeGallery" class="absolute top-8 right-8 text-[#ffffff] text-4xl">
                    <i class="fa-solid fa-circle-xmark"></i>
                </button>

                <!-- Prev -->
                <button id="prevImage" class="absolute left-10 p-4 text-[#ffffff] text-3xl">
                    <i class="fa-solid fa-angle-left"></i>
                </button>

                <!-- Image -->
                <img id="modalImage" class="max-w-[90%] max-h-[90vh] rounded-xl transition-all duration-500 ease-in-out opacity-100 translate-x-0 scale-100 select-none">

                <!-- Next -->
                <button id="nextImage" class="absolute right-10 p-4 text-[#ffffff] text-3xl">
                    <i class="fa-solid fa-angle-right"></i>
                </button>

                <!-- Counter -->
                <div id="galleryCounter" class="absolute bottom-8 text-[#ffffff]">
                    1 / 10
                </div>
            </div> --}}
        </div>
    </section>

{{--===== DIVIDER --}}
    <section class="bg-[#ffffff] py-8">
        <div class="max-w-6xl mx-auto flex items-center justify-center">
            <div class="w-full h-1 bg-[#a59681] rounded-full"></div>
    
            <i class="fa-solid fa-heart mx-4 text-[#a59681]"></i>
    
            <div class="w-full h-1 bg-[#a59681] rounded-full"></div>
        </div>
    </section>

    {{--===== BUKU TAMU ====================--}}
    <section class="bg-[#ffffff]" id="buku-tamu">
        <div class="text-center h-screen flex justify-between">
            <div class="w-[50%] pt-20">
                <h2 class="text-7xl text-[#a59681]">Buku Tamu</h2>

                    <div class="px-20 pt-10 text-left">
                        <div class="pb-10">
                            <label class="text-xl" for="guest_name">Nama (Name)</label>
                            <input type="text" name="guest_name" class="w-full border-2 text-xl border-primary rounded-lg" required>
                        </div>
                        <div class="pb-10">
                            <label class="text-xl" for="message">Ucapan (Wishes)</label>
                            <input type="text" name="message" class="w-full border-2 text-xl border-primary rounded-lg" required>
                        </div>
                        <div class="pb-10">
                            <p class="text-xl">Konfirmasi Kehadiran (Attendance)</p>
                            <div class="flex flex-col gap-2">
                                <div>
                                    <input type="radio" id="hadir" value="Hadir" name="attendance" class="p-0 rounded-full">
                                    <label for="hadir">Hadir</label>
                                </div>
                                <div>
                                    <input type="radio" id="tidak" value="Tidak Hadir" name="attendance" class="p-0 rounded-full">
                                    <label for="tidak">Tidak Hadir</label>
                                </div>
                            </div>
                        </div>
                        <button type="" class="bg-primary text-[#ffffff] px-8 py-3 rounded-lg">
                            Kirim RSVP
                        </button>
                    </div>
            </div>
            <div class="w-[50%] h-full flex relative">
                <div class="absolute left-0 top-0 w-32 h-screen bg-gradient-to-r from-[#ffffff] to-transparent z-10"></div>

                <img src="{{ asset('images/templates/simple-beauty/simple-beauty-photo1.png') }}" alt="" class="object-cover w-full h-full">
            </div>
        </div>
    </section>

    {{--===== GIFT ====================--}}
    <section class="bg-[#ffffff]">
        <div class="text-center h-screen flex justify-between">
            <div class="w-[50%] h-full flex relative">
                <img src="{{ asset('images/templates/simple-beauty/simple-beauty-photo1.png') }}" alt="" class="object-cover w-full h-full">

                <div class="absolute right-0 top-0 w-32 h-screen bg-gradient-to-l from-[#ffffff] to-transparent z-10"></div>
            </div>
            <div class="w-[50%] px-10 py-20 flex flex-col justify-center">
                <div class="pb-20">
                    <h2 class="text-7xl">Nathan</h2>
                    <h1 class="text-3xl">&</h1>
                    <h2 class="text-7xl">Clara</h2>
                </div>

                <div class="pb-32">
                    <h1 class="text-2xl font-semibold mb-2">HADIAH (GIFT)</h1>
                    <div class="flex justify-center gap-4">
                        <div class="px-4 py-2 min-w-56 max-w-56 rounded-xl border border-black flex flex-col gap-2">
                            <h1 class="text-xl font-semibold">BCA</h1>
                            <h1 class="text-xl font-semibold">7878787878</h1>
                            <h1 class="text-xl font-semibold">Nathan Christopher Gunawan</h1>
                        </div>
                        <div class="px-4 py-2 min-w-56 max-w-56 rounded-xl border border-black flex flex-col gap-2">
                            <h1 class="text-xl font-semibold">BRI</h1>
                            <h1 class="text-xl font-semibold">12312312312312</h1>
                            <h1 class="text-xl font-semibold">Clara Abigail Tan</h1>
                        </div>
                    </div>
                </div>

                <div class="text-left">
                    <div class="flex gap-4 text-3xl">
                        <a href="https://instagram.com" target="_blank" class="hover:scale-110 transition ease-in-out">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="https://tiktok.com" target="_blank" class="hover:scale-110 transition ease-in-out">
                            <i class="fa-brands fa-tiktok"></i>
                        </a>
                        <a href="https://wa.me/6281775037615?text=Halo kak saya mau pesen undangan online..." target="_blank" class="hover:scale-110 transition ease-in-out">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </div>
                    <h1 class="text-xl pt-2">Copyright Momentra</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto mt-10">
        <div class="rounded-lg bg-[#ffffff] p-4">
            <h1 class="font-semibold">Attandence Comments</h1>
            <hr class="border-black">
            <div class="border-b border-primary/20 py-4">
                <div class="flex items-center gap-2">
                    <h3 class="font-semibold text-lg">Herman Santoso</h3>
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">
                        ✓ Hadir
                    </span>
                </div>
                <p class="mt-2">
                    Wah mantap, sangat serasi sekali pasangan ini.
                </p>
            </div>
            <div class="border-b border-primary/20 py-4">
                <div class="flex items-center gap-2">
                    <h3 class="font-semibold text-lg">Melissa</h3>
                    <span class="bg-gray-100 px-3 py-1 rounded-full text-sm font-medium">
                        ✕ Tidak Hadir
                    </span>
                </div>
                <p class="mt-2">
                    Selamat ya guys, maaf aku ga bisa dateng. Lagi push rank.
                </p>
            </div>
            <div class="border-b border-primary/20 py-4">
                <div class="flex items-center gap-2">
                    <h3 class="font-semibold text-lg">Richard</h3>
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">
                        ✓ Hadir
                    </span>
                </div>
                <p class="mt-2">
                    Selamat my Bro & Sis...
                </p>
            </div>
        </div>
    </section>
</div>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        // BUKA UNDANGAN
        document.querySelectorAll('a[href^="#"]').forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault()
                const target = document.querySelector(this.getAttribute('href'))
                if (!target) return

                const start = window.scrollY
                const end = target.getBoundingClientRect().top + window.scrollY
                const duration = 1500 // ms — naik-in buat lebih lama
                const startTime = performance.now()

                function easeInOutQuint(t) {
                    return t < 0.5 ? 16 * t * t * t * t * t : 1 - Math.pow(-2 * t + 2, 2) / 2
                }

                function scroll(now) {
                    const elapsed = now - startTime
                    const progress = Math.min(elapsed / duration, 1)
                    window.scrollTo(0, start + (end - start) * easeInOutQuint(progress))
                    if (progress < 1) requestAnimationFrame(scroll)
                }

                requestAnimationFrame(scroll)
            })
        })

        // @if(session('opened'))
        //     document.addEventListener('DOMContentLoaded', () => {
        //         document.getElementById('kontenUndangan').classList.remove('hidden');
        //         document.getElementById('btnPause').classList.remove('hidden');
        //         const music = document.getElementById('bgMusic');
        //         music.play();
        //     });
        // @endif

        document.addEventListener('DOMContentLoaded', () => {
            if(
                localStorage.getItem(invitationKey) === 'true' ) 
            {
                document.getElementById('kontenUndangan').classList.remove('hidden');
                document.getElementById('btnPause').classList.remove('hidden');
            }
        });

        const invitationKey = 'momentra-opened-';

        // PLAY LAGU & REVEAL ISI UNDANGAN
        function bukaUndangan() {
            localStorage.setItem(invitationKey, 'true');

            const music = document.getElementById('bgMusic');
            music.play();

            // Tampilkan konten undangan
            document.getElementById('kontenUndangan').classList.remove('hidden');

            // Tampilkan tombol pause
            document.getElementById('btnPause').classList.remove('hidden');

            // Scroll ke section undangan
            setTimeout(() => {
                document.getElementById('undangan').scrollIntoView({ behavior: 'smooth' });
            }, 100);
        }

        // BUTTON PAUSE
        function togglePause() {
            const music = document.getElementById('bgMusic');
            const btn = document.getElementById('btnPause');

            if (music.paused) {
                music.play();
                btn.textContent = '⏸️';
            } else {
                music.pause();
                btn.textContent = '▶️';
            }
        }

        // COUNTDOWN
        $(document).ready(function () {

            const eventDate = new Date("August 1, 2026 08:50:00").getTime();

            const countdown = setInterval(function () {

                const now = new Date().getTime();

                const diff = eventDate - now;

                if (diff <= 0) {

                    clearInterval(countdown);

                    $('#countdown').html(`
                        <div class="text-3xl font-semibold text-primary">
                            🎉 Acara Telah Berlangsung
                        </div>
                    `);

                    return;
                }

                const days = Math.floor(diff / (1000 * 60 * 60 * 24));

                const hours = Math.floor(
                    (diff % (1000 * 60 * 60 * 24)) /
                    (1000 * 60 * 60)
                );

                const minutes = Math.floor(
                    (diff % (1000 * 60 * 60)) /
                    (1000 * 60)
                );

                const seconds = Math.floor(
                    (diff % (1000 * 60)) /
                    1000
                );

                $('#days').text(days);
                $('#hours').text(hours);
                $('#minutes').text(minutes);
                $('#seconds').text(seconds);

            }, 1000);

        });

        // GALLERY SLIDER
        const modal = document.getElementById('galleryModal');
        const modalImage = document.getElementById('modalImage');
        const galleryCounter = document.getElementById('galleryCounter');

        const galleryImages = document.querySelectorAll('.gallery-image');

        let currentIndex = 0;

        // OPEN MODAL
        function openModal() {

            document.body.style.overflow = 'hidden';

            modal.classList.remove('invisible');

            requestAnimationFrame(() => {
                modal.classList.remove('opacity-0');

                modalImage.classList.remove('opacity-0', 'scale-95');
                modalImage.classList.add('opacity-100', 'scale-100');
            });

        }

        // CLOSE MODAL
        function closeModal() {

            modal.classList.add('opacity-0');

            modalImage.classList.remove('opacity-100', 'scale-100');
            modalImage.classList.add('opacity-0', 'scale-95');

            setTimeout(() => {

                modal.classList.add('invisible');
                document.body.style.overflow = '';

            }, 300);

        }

        function animateTo(index, direction){

            // keluar
            modalImage.classList.add('opacity-0', direction === 'next' ? '-translate-x-16' : 'translate-x-16');

            setTimeout(()=>{
                currentIndex = index;

                modalImage.src = galleryImages[index].src;

                galleryCounter.innerHTML =
                    `${index+1} / ${galleryImages.length}`;

                // reset posisi
                modalImage.classList.remove(
                    '-translate-x-16',
                    'translate-x-16'
                );

                modalImage.classList.add(
                    direction === 'next'
                        ? 'translate-x-16'
                        : '-translate-x-16'
                );

                requestAnimationFrame(()=>{
                    modalImage.classList.remove(
                        'opacity-0',
                        'translate-x-16',
                        '-translate-x-16'
                    );
                });
            },250);
        }

        // SHOW IMAGE
        function showImage(index){
            currentIndex = index;
            openModal();
            modalImage.src = galleryImages[index].src;
            galleryCounter.innerHTML = `${index+1} / ${galleryImages.length}`;
        }

        // CLICK IMAGE
        galleryImages.forEach((img, index) => {
            img.addEventListener('click', () => {
                showImage(index);
            });
        });

        // NEXT
        nextImage.addEventListener('click',()=>{
            let next = currentIndex + 1;
            if(next >= galleryImages.length){
                next = 0;
            }

            animateTo(next,'next');
        });

        // PREVIOUS
        prevImage.addEventListener('click',()=>{
            let prev = currentIndex - 1;
            if(prev < 0){
                prev = galleryImages.length-1;
            }

            animateTo(prev,'prev');
        });

        // CLOSE BUTTON
        document.getElementById('closeGallery')
        .addEventListener('click', closeModal);

        // CLICK BACKGROUND
        modal.addEventListener('click', (e) => {

            if (e.target === modal) {
                closeModal();
            }

        });

        // KEYBOARD
        document.addEventListener('keydown', (e) => {

            if (modal.classList.contains('invisible')) return;

            if (e.key === 'Escape') {

                closeModal();

            }

            if (e.key === 'ArrowRight') {

                document.getElementById('nextImage').click();

            }

            if (e.key === 'ArrowLeft') {

                document.getElementById('prevImage').click();

            }

        });

        // SWIPE MOBILE
        let touchStartX = 0;

        modal.addEventListener('touchstart', (e) => {

            touchStartX = e.changedTouches[0].screenX;

        });

        modal.addEventListener('touchend', (e) => {

            const touchEndX = e.changedTouches[0].screenX;

            if (touchStartX - touchEndX > 50) {

                document.getElementById('nextImage').click();

            }

            if (touchEndX - touchStartX > 50) {

                document.getElementById('prevImage').click();

            }

        });
    </script>
</body>
</html>