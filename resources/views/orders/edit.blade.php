@extends('layouts.app')
@section('title', '| Pemesanan')

@section('content')
    <div class="max-w-7xl mx-auto pt-24">

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
                                Foto-foto
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
                    <section id="mempelai" class="mb-20 scroll-pt-20">
                        <h2 class="text-3xl font-bold mb-8">
                            Data Mempelai
                        </h2>

                        <div class="grid md:grid-cols-2 gap-10">
                            <!-- Pria -->
                            <div>
                                <h3 class="font-semibold mb-4">
                                    Mempelai Pria
                                </h3>

                                <input type="text" name="nama_panggilan_laki" placeholder="Nama Panggilan" class="w-full border-0" required>
                                <input type="text" name="nama_lengkap_laki" placeholder="Nama Lengkap" class="w-full border-0 mt-4" required>
                                <input type="text" name="ayah_laki" placeholder="Nama Ayah" class="w-full border-0 mt-4" required>
                                <input type="text" name="ibu_laki" placeholder="Nama Ibu" class="w-full border-0 my-4" required>
                                <label for="foto_laki" class="text-lg">Foto Mempelai Pria</label>
                                <input type="file" name="foto_laki" class="w-full border-0" required>
                            </div>
                            
                            <!-- Wanita -->
                            <div>
                                <h3 class="font-semibold mb-4">
                                    Mempelai Wanita
                                </h3>
                                
                                <input type="text" name="nama_panggilan_perempuan" placeholder="Nama Panggilan" class="w-full border-0" required>
                                <input type="text" name="nama_lengkap_perempuan" placeholder="Nama Lengkap" class="w-full border-0 mt-4" required>
                                <input type="text" name="ayah_perempuan" placeholder="Nama Ayah" class="w-full border-0 mt-4" required>
                                <input type="text" name="ibu_perempuan" placeholder="Nama Ibu" class="w-full my-4" required>
                                <label for="foto_perempuan" class="text-lg">Foto Mempelai Perempuan</label>
                                <input type="file" name="foto_perempuan" class="w-full" required>
                            </div>
                        </div>
                    </section>

                    {{-- DATA ACARA --}}
                    <section id="acara" class="mb-20 scroll-pt-20">
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
                    </section>

                    {{-- FOTO STATIS --}}
                    <section id="foto" class="mb-20 scroll-pt-20">
                        <h2 class="text-3xl font-bold mb-8">
                            Foto-foto
                        </h2>
                        <label class="text-lg font-semibold" for="foto_cover">Foto di bagian Cover (Awal Undangan)</label>
                        <input type="file" name="foto_cover" class="w-full mb-4" required>
                        <label class="text-lg font-semibold" for="foto_acara">Foto di bagian Tanggal Acara</label>
                        <input type="file" name="foto_acara" class="w-full mb-4" required>
                        <label class="text-lg font-semibold" for="foto_bukutamu">Foto di bagian Buku Tamu</label>
                        <input type="file" name="foto_bukutamu" class="w-full mb-4" required>
                        <label class="text-lg font-semibold" for="foto_gift">Foto di bagian Hadiah</label>
                        <input type="file" name="foto_gift" class="w-full" required>
                    </section>

                    {{-- NOREK --}}
                    <section id="gift" class="mb-20 scroll-pt-20">
                        <h2 class="text-3xl font-bold mb-8">
                            Nomor Rekening
                        </h2>

                        <div class="grid md:grid-cols-2 gap-10">
                            <div class="flex flex-col gap-4">
                                <h2>Bank 1</h2>
                                <input type="text" name="bank1" placeholder="Nama Bank" class="border-0" required>
                                <input type="text" name="norek_bank1" placeholder="Nomor Rekening" class="border-0" required>
                                <input type="text" name="atasnama_bank1" placeholder="Atas Nama" class="border-0" required>
                            </div>
                            
                            <div class="flex flex-col gap-4">
                                <h2>Bank 2</h2>
                                <input type="text" name="bank2" placeholder="Nama Bank" class="border-0" required>
                                <input type="text" name="norek_bank2" placeholder="Nomor Rekening" class="border-0" required>
                                <input type="text" name="atasnama_bank2" placeholder="Atas Nama" class="border-0" required>
                            </div>
                        </div>
                    </section>

                    {{-- GALLERY --}}
                    <section id="gallery" class="scroll-pt-20">
                        <h2 class="text-xl font-semibold mb-4">
                            Photo Gallery
                        </h2>

                        <input type="file" id="galleryInput" name="gallery[]" multiple accept="image/*">

                        <p id="galleryCount" class="mt-2 text-sm text-gray-500">
                            0 / 12 Foto
                        </p>

                        <div id="galleryPreview" class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6"></div>
                    </section>
                    
                    <div class="mt-8">
                        <button type="button" id="clearDraftBtn" class="bg-red-500 text-white px-6 py-3 rounded-xl">
                            Hapus Data
                        </button>
                        <button type="submit" class="bg-primary text-white px-6 py-3 rounded-xl">
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