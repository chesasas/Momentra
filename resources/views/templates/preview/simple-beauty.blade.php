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
<body class="bg-[#f6f0eb] overflow-x-hidden">
    <style>
        p,span,h1 {
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

    <!-- PAUSE BUTTON -->
    <a href="#" class="hidden fixed bottom-5 right-5 text-4xl z-30" id="PauseBtn" onclick="togglePause()">⏸️</a>
    
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
                <form action="{{ route('templates.use', $template->slug) }}" method="POST">
                    @csrf

                    <button type="submit" class="inline-block font-['Montserrat'] font-semibold bg-primary hover:bg-primaryhover text-white px-4 py-3 rounded-lg transition">
                        Gunakan Template
                    </button>
                </form>
            </div>
        </div>
    </nav>

    {{--===== COVER ====================--}}
    <section>
        <div class="relative text-center h-screen py-20 flex flex-col justify-center">
            <img src="{{ asset('images/templates/simple-beauty/all.png') }}" alt="" class="absolute -left-36 top-5 h-[90%] opacity-40">
            <img src="{{ asset('images/templates/simple-beauty/all.png') }}" alt="" class="absolute rotate-180 -right-36 top-5 h-[90%] opacity-40">

            <h1 class="italic text-3xl">Undangan Pernikahan</h1>
            
            <div class="py-10">
                <h1 class="text-7xl">NATHAN</h1>
                <h1 class="text-7xl">&</h1>
                <h1 class="text-7xl">CLARA</h1>
            </div>

            <h1 class="text-2xl font-semibold">Kepada Bapak/Ibu/Saudara/i</h1>
            <h1 class="text-4xl font-semibold py-4">Chesa Sas</h1>
            <h1 class="max-w-md mx-auto text-2xl font-semibold">Mohon maaf apabila ada kesalahan dalam penulisan nama atau gelar.</h1>

            <div class="my-8">
                <a href="#undangan" onclick="bukaUndangan()" class="font-['Cormorant_Garamond'] inline-block py-2 px-4 text-xl bg-white rounded-full font-light hover:scale-105 transition duration-200">
                    <i class="fa-regular fa-envelope"></i>
                    Buka Undangan
                </a>

                {{-- AUDIO --}}
                <audio id="bgMusic" loop>
                    <source src="{{ asset('storage/music/Perfect - Ed Sheeran.mp3') }}" type="audio/mpeg">
                </audio>
            </div>
        </div>
    </section>

<div id="kontenUndangan" class="hidden">
    {{--===== SAVE THE DATE ====================--}}
    <section class="relative bg-cover bg-center" style="background-image: url('{{ asset('images/templates/simple-beauty/simple-beauty-photo1.png') }}')">
        <div class="absolute bg-white opacity-50 w-full h-screen z-0"></div>
        
        <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-b from-[#f6f0eb] to-transparent z-10"></div>
        <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-[#f6f0eb] to-transparent z-10"></div>
        
        <img src="{{ asset('images/templates/simple-beauty/up.png') }}" alt="" class="absolute -left-36 top-0 h-[50%] opacity-40 z-20">
        <img src="{{ asset('images/templates/simple-beauty/down.png') }}" alt="" class="absolute -right-36 bottom-0 h-[50%] opacity-40 z-20">

        <div id="undangan" class="max-w-5xl mx-auto text-center h-screen py-20 flex justify-between items-center">
            <div class="w-[55%] z-20">
                <h1 class="text-3xl">Save The Date</h1>
                
                {{-- COUNTDOWN --}}
                <div class="w-full flex justify-center font-semibold">
                    <div id="countdown" class="sm:text-2xl md:text-3xl lg:text-4xl"></div>
                </div>
            </div>
            <div class="w-[45%] z-20">
                <h1 class="text-3xl">PERNIKAHAN</h1>
                <div class="py-16">
                    <h2 class="text-9xl">Nathan</h2>
                    <h1 class="text-5xl">&</h1>
                    <h2 class="text-9xl">Clara</h2>
                </div>
            </div>
        </div>
    </section>

    {{--===== LAKIK ====================--}}
    <section class="relative">
        <img src="{{ asset('images/templates/simple-beauty/up.png') }}" alt="" class="absolute -left-36 top-0 opacity-40 h-[60%]">
        <img src="{{ asset('images/templates/simple-beauty/down.png') }}" alt="" class="absolute -right-36 bottom-0 opacity-40 h-[60%]">

        <div class="max-w-4xl mx-auto text-center h-[75vh] py-4 flex justify-between items-center">
            <div class="w-[50%] h-full flex justify-center items-center">
                <img src="{{ asset('images/templates/simple-beauty/simple-beauty-photo1.png') }}" alt="" class="object-cover w-[85%] h-full rounded-full">
            </div>
            <div class="w-[50%] flex flex-col gap-6">
                <h2 class="text-9xl text-[#a59681]">Nathan</h2>
                <h1 class="text-3xl font-semibold">Nathan Christopher Gunawan</h1>
                <h1 class="text-3xl italic">Putra dari pasangan</h1>
                <div>
                    <h1 class="text-3xl font-semibold">Bapak Albert Gunawan</h1>
                    <h1 class="text-3xl font-semibold">&</h1>
                    <h1 class="text-3xl font-semibold">Ibu Siska Natalia</h1>
                </div>
            </div>
        </div>
    </section>

{{--===== DIVIDER --}}
    <div class="max-w-4xl mx-auto flex items-center justify-center my-8">
        <div class="w-full h-1 bg-black rounded-full"></div>

        <i class="fa-solid fa-heart mx-4 text-black"></i>

        <div class="w-full h-1 bg-black rounded-full"></div>
    </div>

    {{--===== PEREMPUAN ====================--}}
    <section class="relative">
        <img src="{{ asset('images/templates/simple-beauty/up.png') }}" alt="" class="absolute -left-36 top-0 opacity-40 h-[60%]">
        <img src="{{ asset('images/templates/simple-beauty/down.png') }}" alt="" class="absolute -right-36 bottom-0 opacity-40 h-[60%]">

        <div class="max-w-4xl mx-auto text-center h-[75vh] py-4 flex justify-between items-center">
            <div class="w-[50%] flex flex-col gap-6">
                <h2 class="text-9xl text-[#a59681]">Clara</h2>
                <h1 class="text-3xl font-semibold">Clara Abigail Tan</h1>
                <h1 class="text-3xl italic">Putri dari pasangan</h1>
                <div>
                    <h1 class="text-3xl font-semibold">Bapak Hendra Tan</h1>
                    <h1 class="text-3xl font-semibold">&</h1>
                    <h1 class="text-3xl font-semibold">Ibu Monica Lee</h1>
                </div>
            </div>
            <div class="w-[50%] h-full flex justify-center items-center">
                <img src="{{ asset('images/templates/simple-beauty/simple-beauty-photo1.png') }}" alt="" class="object-cover w-[85%] h-full rounded-full">
            </div>
        </div>
    </section>
    
    {{--===== INFO ACARA ====================--}}
    <section class="relative bg-cover bg-center" style="background-image: url('{{ asset('images/templates/simple-beauty/simple-beauty-photo1.png') }}')">
        <div class="absolute bg-white opacity-50 w-full h-screen z-0"></div>
        
        <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-b from-[#f6f0eb] to-transparent z-10"></div>
        <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-[#f6f0eb] to-transparent z-10"></div>
        
        <img src="{{ asset('images/templates/simple-beauty/up.png') }}" alt="" class="absolute -left-36 top-0 h-[50%] opacity-40 z-20">
        <img src="{{ asset('images/templates/simple-beauty/down.png') }}" alt="" class="absolute -right-36 bottom-0 h-[50%] opacity-40 z-20">
        
        <div class="text-center h-screen py-20 flex flex-col">
            <h2 class="text-7xl pb-8 z-20">Acara Kami</h2>
            
            <div class="flex justify-center gap-8 z-20">
                <div class="w-1/2 text-end flex flex-col gap-4 justify-center">
                    <h1 class="text-2xl font-semibold">Sabtu,</h1>
                    <h1 class="text-2xl font-semibold">20 Juni 2026</h1>
                    <h1 class="text-2xl">18.00 WITA s/d Selesai</h1>
                </div>
                <div class="w-1/2 text-start flex flex-col gap-4 justify-center">
                    <h1 class="text-2xl font-semibold">The Stone Hotel</h1>
                    <h1 class="text-2xl">Legian Bali</h1>
                </div>
            </div>

            <div class="my-8">
                <a href="#undangan" class="font-['Cormorant_Garamond'] inline-block py-2 px-4 text-lg bg-white rounded-full font-light hover:scale-105 transition duration-200">
                    <i class="fa-solid fa-location-dot"></i>
                    Lihat Lokasi
                </a>
            </div>
        </div>
    </section>
    
    {{--===== GALLERY ====================--}}
    <section>
        <div class="relative text-center h-screen py-10 flex flex-col">
            <h2 class="text-6xl pb-8">Wedding Gallery</h2>

            <div>

            </div>

            <div class="absolute bottom-0 left-0 w-full h-40 bg-gradient-to-t from-white to-transparent z-10"></div>
        </div>
    </section>

{{--===== DIVIDER --}}
    <section class="bg-white py-8">
        <div class="max-w-6xl mx-auto flex items-center justify-center">
            <div class="w-full h-1 bg-[#a59681] rounded-full"></div>
    
            <i class="fa-solid fa-heart mx-4 text-[#a59681]"></i>
    
            <div class="w-full h-1 bg-[#a59681] rounded-full"></div>
        </div>
    </section>

    {{--===== BUKU TAMU ====================--}}
    <section class="bg-white">
        <div class="text-center h-screen flex justify-between">
            <div class="w-[50%] pt-20">
                <h2 class="text-7xl text-[#a59681]">Buku Tamu</h2>

                <div class="px-20 pt-10 text-left">
                    <div class="pb-10">
                        <label class="text-xl" for="nama_tamu">Nama (Name)</label>
                        <input type="text" name="nama_tamu" class="w-full border-2 text-xl border-primary rounded-lg" required>
                    </div>
                    <div class="pb-10">
                        <label class="text-xl" for="ucapan">Ucapan (Wishes)</label>
                        <input type="text" name="ucapan" class="w-full border-2 text-xl border-primary rounded-lg" required>
                    </div>
                    <div class="pb-10">
                        <p class="text-xl">Konfirmasi Kehadiran (Attendance)</p>
                        <div class="flex flex-col gap-2">
                            <div>
                                <input type="radio" id="hadir" value="Hadir" name="kehadiran" class="p-0 rounded-full">
                                <label for="hadir">Hadir</label>
                            </div>
                            <div>
                                <input type="radio" id="tidak" value="Tidak Hadir" name="kehadiran" class="p-0 rounded-full">
                                <label for="tidak">Tidak Hadir</label>
                            </div>
                        </div>
                    </div>
                    <div class="pb-10">
                        <label class="text-xl" for="nama_tamu">Jumlah yang Hadir (Total Attandence)</label>
                        <input type="text" name="nama_tamu" class="w-full border-2 text-xl border-primary rounded-lg" required>
                    </div>
                </div>
            </div>
            <div class="w-[50%] h-full flex relative">
                <div class="absolute left-0 top-0 w-32 h-screen bg-gradient-to-r from-white to-transparent z-10"></div>

                <img src="{{ asset('images/templates/simple-beauty/simple-beauty-photo1.png') }}" alt="" class="object-cover w-full h-full">
            </div>
        </div>
    </section>

    {{--===== GIFT ====================--}}
    <section class="bg-white">
        <div class="text-center h-screen flex justify-between">
            <div class="w-[50%] h-full flex relative">
                <img src="{{ asset('images/templates/simple-beauty/simple-beauty-photo1.png') }}" alt="" class="object-cover w-full h-full">

                <div class="absolute right-0 top-0 w-32 h-screen bg-gradient-to-l from-white to-transparent z-10"></div>
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
                        <div class="px-4 py-2 rounded-xl border border-black flex flex-col gap-2">
                            <h1 class="text-xl font-semibold">BCA</h1>
                            <h1 class="text-xl font-semibold">777777777</h1>
                            <h1 class="text-xl font-semibold">Nathan Christopher Gunawan</h1>
                        </div>
                        <div class="px-4 py-2 rounded-xl border border-black flex flex-col gap-2">
                            <h1 class="text-xl font-semibold">BCA</h1>
                            <h1 class="text-xl font-semibold">777777777</h1>
                            <h1 class="text-xl font-semibold">Nathan Christopher Gunawan</h1>
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
</div>

    <script>
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

        // PLAY LAGU & REVEAL ISI UNDANGAN
        function bukaUndangan() {
            const music = document.getElementById('bgMusic');
            music.play();

            // Tampilkan konten undangan
            document.getElementById('kontenUndangan').classList.remove('hidden');

            // Tampilkan tombol pause
            document.getElementById('PauseBtn').classList.remove('hidden');

            // Scroll ke section undangan
            setTimeout(() => {
                document.getElementById('undangan').scrollIntoView({ behavior: 'smooth' });
            }, 100);
        }

        // BUTTON PAUSE
        function togglePause() {
            const music = document.getElementById('bgMusic');
            const btn = document.getElementById('PauseBtn');

            if (music.paused) {
                music.play();
                btn.textContent = '⏸️';
            } else {
                music.pause();
                btn.textContent = '▶️';
            }
        }

        // COUNTDOWN
        $(document).ready(function() {
            var tanggal = new Date("July 1, 2026 08:50:00").getTime();

            setInterval(function() {
                var today = new Date().getTime();
                var diff = tanggal - today;

                if (diff > 0) {
                    var hari = Math.floor(diff / (1000 * 60 * 60 * 24));
                    var jam = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var menit = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                    var detik = Math.floor((diff % (1000 * 60)) / 1000);

                    $("#countdown").text(hari + "h • " + jam + "j • " + menit + "m • " + detik + "d");
                } else {
                    $("#countdown").text("Event Telah Berlangsung!");
                }
            }, 1000);
        });
    </script>
</body>
</html>
