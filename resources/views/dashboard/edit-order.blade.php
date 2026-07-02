@extends('layouts.dashboard')

@section('content')

<div class="py-10">

    <div class="grid lg:grid-cols-4 gap-6">
        <!-- Sidebar -->
        <aside class="lg:col-span-1">
            <aside class="sticky top-28 h-fit">
                <div class="p-4">
                    <h3 class="font-semibold mb-6">
                        Progress Pengisian
                    </h3>

                    <div class="flex flex-col gap-4">
                        <a href="#mempelai" id="link-mempelai" class="sidebar-link px-4 py-2 rounded-full bg-secondaryhover hover:bg-primary hover:text-white transition">
                            Data Mempelai
                        </a>

                        <a href="#acara" id="link-acara" class="sidebar-link px-4 py-2 rounded-full bg-secondaryhover hover:bg-primary hover:text-white transition">
                            Data Acara
                        </a>

                        <a href="#foto" id="link-acara" class="sidebar-link px-4 py-2 rounded-full bg-secondaryhover hover:bg-primary hover:text-white transition">
                            Foto Statis
                        </a>

                        <a href="#gift" id="link-gift" class="sidebar-link px-4 py-2 rounded-full bg-secondaryhover hover:bg-primary hover:text-white transition">
                            Nomor Rekening
                        </a>

                        <a href="#gallery" id="link-gallery" class="sidebar-link px-4 py-2 rounded-full bg-secondaryhover hover:bg-primary hover:text-white transition">
                            Photo Gallery
                        </a>
                    </div>
                </div>
            </aside>
        </aside>

        <!-- Form -->
        <main class="lg:col-span-3 bg-secondaryhover p-10 rounded-xl">
            <form id="orderForm" action="{{ route('orders.checkout', $order) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-500 p-4 rounded mb-6">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-red-600">
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- DATA MEMPELAI --}}
                <section id="mempelai" class="scroll-mt-20">
                    <h2 class="text-3xl font-bold mb-8">
                        Data Mempelai
                    </h2>

                    <div class="grid md:grid-cols-2 gap-10">
                        {{-- Pria --}}
                        <div>
                            <h3 class="font-semibold mb-4">
                                Mempelai Pria
                            </h3>

                            <input type="text" name="nama_panggilan_laki" placeholder="Nama Panggilan" class="w-full border-0" required>
                            <input type="text" name="nama_lengkap_laki" placeholder="Nama Lengkap" class="w-full border-0 mt-4" required>
                            <input type="text" name="ayah_laki" placeholder="Nama Ayah" class="w-full border-0 mt-4" required>
                            <input type="text" name="ibu_laki" placeholder="Nama Ibu" class="w-full border-0 my-4" required>
                            <label for="foto_laki" class="text-lg">Foto Mempelai Pria (Potrait)</label>
                            <input type="file" name="foto_laki" class="w-full border-0" required>
                        </div>
                        
                        {{-- Wanita --}}
                        <div>
                            <h3 class="font-semibold mb-4">
                                Mempelai Wanita
                            </h3>
                            
                            <input type="text" name="nama_panggilan_perempuan" placeholder="Nama Panggilan" class="w-full border-0" required>
                            <input type="text" name="nama_lengkap_perempuan" placeholder="Nama Lengkap" class="w-full border-0 mt-4" required>
                            <input type="text" name="ayah_perempuan" placeholder="Nama Ayah" class="w-full border-0 mt-4" required>
                            <input type="text" name="ibu_perempuan" placeholder="Nama Ibu" class="w-full my-4" required>
                            <label for="foto_perempuan" class="text-lg">Foto Mempelai Perempuan (Potrait)</label>
                            <input type="file" name="foto_perempuan" class="w-full" required>
                        </div>
                    </div>

                    {{-- Keterangan --}}
                    <div class="pt-10">
                        <p class="text-success font-medium">
                            <i class="fa-solid fa-circle-check"></i>
                            Data ini masih bisa diubah setelah disimpan, <span class="text-danger">kecuali link undangan</span>.
                        </p>
                        <ul class="list-disc list-inside space-y-1 pt-4">
                            <li class="font-semibold">Semua data di atas wajib diisi.</li>
                            <li>Gunakan foto dengan <span class="font-semibold">orientasi portrait</span> dan kualitas yang jelas.</li>
                            <li>Maksimal ukuran file foto adalah <span class="font-semibold">10 MB</span>.</li>
                            <li>Nama panggilan akan ditampilkan sebagai nama utama pada beberapa bagian undangan.</li>
                            <li>Nama lengkap serta nama orang tua akan digunakan pada bagian profil mempelai.</li>
                        </ul>
                    </div>
                </section>

                <hr class="border-black w-1/2 mx-auto my-12">

                {{-- DATA ACARA --}}
                <section id="acara" class="scroll-mt-20">
                    <h2 class="text-3xl font-bold mb-8">
                        Data Acara
                    </h2>

                    <div class="grid md:grid-cols-2 gap-6">
                        <input type="text" placeholder="Hari" name="hari" class="border-0" required>
                        <input type="date" placeholder="Tanggal" name="tanggal" class="border-0" required>
                        <input type="time" placeholder="Jam Mulai" name="jam_mulai" class="border-0" required>
                        <input type="time" placeholder="Jam Selesai" name="jam_selesai" class="border-0" required>
                    </div>
                    <input type="text" placeholder="Lokasi" name="location" rows="4" class="w-full border-0 mt-6"></input required>
                    <input type="text" placeholder="Link Google Maps" name="google_maps" class="w-full border-0 mt-6" required>

                    {{-- Keterangan --}}
                    <div class="pt-10">
                        <p class="text-success font-medium">
                            <i class="fa-solid fa-circle-check"></i>
                            Data ini masih bisa diubah setelah disimpan, <span class="text-danger">kecuali link undangan</span>.
                        </p>
                        <ul class="list-disc list-inside space-y-1 pt-4">
                            <li class="font-semibold">Semua data di atas wajib diisi.</li>
                            <li>Pastikan tanggal, waktu, dan lokasi acara sudah benar sebelum melanjutkan pembayaran.</li>
                            <li>Informasi acara akan ditampilkan pada halaman detail undangan.</li>
                            <li>Link Google Maps akan digunakan sebagai tombol navigasi menuju lokasi acara.</li>
                        </ul>
                    </div>
                </section>

                <hr class="border-black w-1/2 mx-auto my-12">

                {{-- FOTO STATIS --}}
                <section id="foto" class="scroll-mt-20">
                    <h2 class="text-3xl font-bold mb-8">
                        Foto Statis
                    </h2>
                    <label class="text-lg font-semibold" for="foto_cover">Foto di bagian Cover (Awal Undangan)</label>
                    <input type="file" name="foto_cover" class="w-full mb-4" required>
                    <label class="text-lg font-semibold" for="foto_acara">Foto di bagian Tanggal Acara</label>
                    <input type="file" name="foto_acara" class="w-full mb-4" required>
                    <label class="text-lg font-semibold" for="foto_bukutamu">Foto di bagian Buku Tamu</label>
                    <input type="file" name="foto_bukutamu" class="w-full mb-4" required>
                    <label class="text-lg font-semibold" for="foto_gift">Foto di bagian Hadiah</label>
                    <input type="file" name="foto_gift" class="w-full" required>

                    {{-- Keterangan --}}
                    <div class="pt-10">
                        <p class="text-success font-medium">
                            <i class="fa-solid fa-circle-check"></i>
                            Data ini masih bisa diubah setelah disimpan, <span class="text-danger">kecuali link undangan</span>.
                        </p>
                        <ul class="list-disc list-inside space-y-1 pt-4">
                            <li class="font-semibold">Semua data di atas wajib diisi.</li>
                            <li>Setiap foto memiliki penempatan yang berbeda. <span class="font-semibold">Silakan sesuaikan dengan keterangan tiap label</span>.</li>
                            <li>Maksimal ukuran file adalah <span class="font-semibold">10 MB</span> untuk setiap gambar.</li>
                            <li>Gunakan gambar dengan resolusi tinggi agar hasil undangan terlihat lebih tajam.</li>
                        </ul>
                    </div>
                </section>

                <hr class="border-black w-1/2 mx-auto my-12">

                {{-- NOREK --}}
                <section id="gift" class="scroll-mt-20">
                    <h2 class="text-3xl font-bold mb-8">
                        Nomor Rekening
                    </h2>

                    <div class="grid md:grid-cols-2 gap-10">
                        <div class="flex flex-col gap-4">
                            <label class="text-lg font-semibold">Bank 1</label>
                            <input type="text" name="bank1" placeholder="Nama Bank" class="border-0" required>
                            <input type="text" name="norek_bank1" placeholder="Nomor Rekening" class="border-0" required>
                            <input type="text" name="atasnama_bank1" placeholder="Atas Nama" class="border-0" required>
                        </div>
                        
                        <div class="flex flex-col gap-4">
                            <label class="text-lg font-semibold">Bank 2</label>
                            <input type="text" name="bank2" placeholder="Nama Bank" class="border-0" required>
                            <input type="text" name="norek_bank2" placeholder="Nomor Rekening" class="border-0" required>
                            <input type="text" name="atasnama_bank2" placeholder="Atas Nama" class="border-0" required>
                        </div>
                    </div>

                    {{-- Keterangan --}}
                    <div class="pt-10">
                        <p class="text-success font-medium">
                            <i class="fa-solid fa-circle-check"></i>
                            Data ini masih bisa diubah setelah disimpan, <span class="text-danger">kecuali link undangan</span>.
                        </p>
                        <ul class="list-disc list-inside space-y-1 pt-4">
                            <li class="font-semibold">Anda dapat mengisi satu atau dua rekening sesuai kebutuhan.</li>
                            <li>Isi rekening yang ingin ditampilkan pada halaman Gift.</li>
                            <li>Pastikan nama pemilik rekening dan nomor rekening sudah benar sebelum dipublikasikan.</li>
                        </ul>
                    </div>
                </section>

                <hr class="border-black w-1/2 mx-auto my-12">

                {{-- GALLERY --}}
                <section id="gallery" class="scroll-mt-20">
                    <h2 class="text-3xl font-semibold mb-4">
                        Foto Gallery (Landscape)
                    </h2>

                    <label class="text-lg font-semibold">Silakan pilih beberapa foto sekaligus (Maksimal 12 foto).</label>
                    <input type="file" id="galleryInput" name="gallery[]" multiple accept="image/*">

                    <p id="galleryCount" class="mt-2 ml-4 text-sm text-gray-500">
                        0 / 12 Foto
                    </p>

                    <div id="galleryPreview" class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6 ml-4"></div>

                    {{-- Keterangan --}}
                    <div class="pt-10">
                        <p class="text-success font-medium">
                            <i class="fa-solid fa-circle-check"></i>
                            Data ini masih bisa diubah setelah disimpan, <span class="text-danger">kecuali link undangan</span>.
                        </p>
                        <ul class="list-disc list-inside space-y-1 pt-4">
                            <li class="font-semibold">Anda dapat mengunggah maksimal 12 foto dengan ukuran maksimal 5 MB per foto.</li>
                            <li>Foto-foto gallery akan ditampilkan pada bagian galeri undangan.</li>
                            <li>Gunakan foto dengan rasio yang seragam agar tampilan galeri lebih rapi (Landscape).</li>
                        </ul>
                    </div>
                </section>
                
                <div class="mt-8">
                    <button onclick="history.back()" class="bg-gray-300 hover:bg-gray-400 px-3 py-2 mr-1 rounded-xl transition">
                        <i class="fa-solid fa-arrow-left"></i>
                        Kembali
                    </button>
                    <button type="button" id="clearDraftBtn" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 mr-1 rounded-xl transition">
                        <i class="fa-solid fa-eraser"></i>
                        Reset Data
                    </button>
                    <button type="submit" class="bg-primary hover:bg-primaryhover text-white px-4 py-2 rounded-xl transition">
                        <i class="fa-solid fa-file-invoice-dollar"></i>
                        Lanjut ke Pembayaran
                    </button>
                </div>
            </form>
        </main>

    </div>

</div>

@if(session('success'))
    <script>
        localStorage.removeItem(
            'momentra-order-{{ $order->id }}'
        );
    </script>
@endif

<script>
    // UNTUK SIDEBAR
    document.addEventListener('DOMContentLoaded', () => {
        const sections = document.querySelectorAll('section[id]');
        const links = document.querySelectorAll('.sidebar-link');

        function activateLink() {
            let currentSection = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop - 150;
                const sectionHeight = section.offsetHeight;

                if (
                    window.scrollY >= sectionTop &&
                    window.scrollY < sectionTop + sectionHeight
                ) {
                    currentSection = section.getAttribute('id');
                }
            });

            links.forEach(link => {
                link.classList.remove('bg-primary', 'font-semibold', 'text-white');
                link.classList.add('bg-secondaryhover');
                if (
                    link.getAttribute('href') === '#' + currentSection
                ) {
                    link.classList.remove('bg-secondaryhover');
                    link.classList.add('bg-primary', 'font-semibold', 'text-white');
                }
            });
        }
        window.addEventListener('scroll', activateLink);
        activateLink();
    });

    // AUTOSAVE DATA INPUTAN
    const form = document.getElementById('orderForm');
    const storageKey =
        'momentra-order-{{ $order->id }}';

    // SAVE
    form.addEventListener('input', () => {
        const formData = {};
        form.querySelectorAll('input, textarea, select').forEach(field => {
            if (
                field.type !== 'file' && field.name
            ) {
                formData[field.name] = field.value;
            }
        });

        localStorage.setItem(storageKey,JSON.stringify(formData));
    });

    // LOAD
    document.addEventListener('DOMContentLoaded',() => {
            const savedData = localStorage.getItem(storageKey);

            if (!savedData) return;

            const formData = JSON.parse(savedData);

            Object.keys(formData).forEach(name => {
                const field = document.querySelector(`[name="${name}"]`);

                if (field) {
                    field.value = formData[name];
                }
            });
        }
    );

    // HAPUS
    document.getElementById('clearDraftBtn').addEventListener('click', () => {
        if (
            confirm(
                'Buang semua perubahan yang belum disimpan?'
            )
        ) {
            localStorage.removeItem(storageKey);
            location.reload();
        }
    });

    // GALLERY
    const galleryInput = document.getElementById('galleryInput');
    const galleryPreview = document.getElementById('galleryPreview');
    const galleryCount = document.getElementById('galleryCount');

    galleryInput.addEventListener('change', function() {

        console.log('Jumlah file:', this.files.length);

        for(let i = 0; i < this.files.length; i++) {
            console.log(this.files[i].name);
        }

        galleryPreview.innerHTML = '';

        const files = Array.from(this.files);

        galleryCount.textContent =
            `${files.length} / 12 Foto`;

        if (files.length > 12) {
            alert('Maksimal 12 foto');
            this.value = '';
            galleryPreview.innerHTML = '';
            galleryCount.textContent = '0 / 12 Foto';
            return;
        }

        files.forEach(file => {

            const reader = new FileReader();

            reader.onload = function(e) {

                galleryPreview.innerHTML += `
                    <img
                        src="${e.target.result}"
                        class="w-full h-40 object-cover rounded-xl"
                    >
                `;

            };

            reader.readAsDataURL(file);

        });

    });
</script>

@endsection