@extends('layouts.app')
@section('title', '| Panduan')

@section('content')
<div class="max-w-7xl mx-auto px-6 pt-20 pb-10">
    <h1 class="text-4xl md:text-5xl font-bold my-2 text-center">
        Cara Pesan
    </h1>

    <p class="text-black text-center">
        Cara pesan undangan digital di Momentra
    </p>

    <div class="max-w-6xl mx-auto text-center pt-10">
        <div class="p-6 rounded-xl flex justify-center">
            <div class="text-center mr-2">
                <img src="{{ asset('images/icons/akun.png') }}" alt="" class="w-32">
            </div>
            <div class="text-justify">
                <h1 class="text-3xl font-bold my-3">Register/Mendaftar Akun</h1>
                <p class="text-black text-md">
                    Mulai dengan membuat akun terlebih dahulu. Cukup isi nama panjang, nomor telepon, email aktif yang digunakan, dan password untuk menikmati layanan pembuatan undangan digital dengan mudah.<br><br>
                    Anda juga dapat melanjutkan proses login atau pendaftaran menggunakan akun Google agar lebih cepat dan praktis tanpa perlu mengisi data secara manual
                </p>
            </div>
        </div>
        <div class="p-6 rounded-xl flex justify-center">
            <div class="text-center mr-2">
                <img src="{{ asset('images/icons/profil.png') }}" alt="" class="w-32">
            </div>
            <div class="text-justify">
                <h1 class="text-3xl font-bold my-3">Login ke Akun Anda</h1>
                <p class="text-black text-md">
                    Setelah akun berhasil dibuat, Anda dapat login menggunakan email dan password yang telah didaftarkan. Dengan login ke akun Anda, proses pembuatan dan pengelolaan undangan digital dapat dilakukan dengan lebih mudah dan praktis.<br><br>
                    Selain menggunakan email, Anda juga dapat login dengan akun Google agar proses masuk ke akun menjadi lebih cepat tanpa perlu mengisi data secara manual.
                </p>
            </div>
        </div>
        <div class="p-6 rounded-xl flex justify-center">
            <div class="text-center mr-2">
                <img src="{{ asset('images/icons/amplop.png') }}" alt="" class="w-32">
            </div>
            <div class="text-justify">
                <h1 class="text-3xl font-bold my-3">Isi Konten Undangan</h1>
                <p class="text-black text-md">
                    Mulai dengan membuat akun terlebih dahulu. Cukup isi nama panjang, nomor telepon, email aktif yang digunakan, dan password untuk menikmati layanan pembuatan undangan digital dengan mudah.<br><br>
                    Anda juga dapat melanjutkan proses login atau pendaftaran menggunakan akun Google agar lebih cepat dan praktis tanpa perlu mengisi data secara manual
                </p>
            </div>
        </div>
        <div class="p-6 rounded-xl flex justify-center">
            <div class="text-center mr-2">
                <img src="{{ asset('images/icons/keranjang.png') }}" alt="" class="w-32">
            </div>
            <div class="text-justify">
                <h1 class="text-3xl font-bold my-3">Pembayaran</h1>
                <p class="text-black text-md">
                    Jika seluruh data undangan telah selesai diisi, Anda dapat melanjutkan ke tahap pembayaran sesuai paket yang dipilih. Untuk pengisian mandiri, pembayaran dilakukan setelah proses pengisian konten selesai.<br><br>
                    Namun, apabila menggunakan bantuan jasa admin, pembayaran dilakukan di awal sebelum proses pengisian konten dimulai. Seluruh proses pembayaran dilakukan dengan mudah dan aman.
                </p>
            </div>
        </div>
        <div class="p-6 rounded-xl flex justify-center">
            <div class="text-center mr-2">
                <img src="{{ asset('images/icons/share.png') }}" alt="" class="w-32">
            </div>
            <div class="text-justify">
                <h1 class="text-3xl font-bold my-3">Publish Konten</h1>
                <p class="text-black text-md">
                    Setelah pembayaran berhasil dikonfirmasi, undangan digital Anda akan segera dipublish dan siap dibagikan kepada keluarga, sahabat, maupun tamu undangan melalui link digital yang telah tersedia.<br><br>
                    Sebelum dipublish, pastikan seluruh informasi undangan sudah sesuai agar tampilan undangan dapat diterima dengan baik oleh para tamu undangan.
                </p>
            </div>
        </div>
        <div class="p-6 rounded-xl flex justify-center">
            <div class="text-center mr-2">
                <img src="{{ asset('images/icons/question.png') }}" alt="" class="w-32">
            </div>
            <div class="text-justify">
                <h1 class="text-3xl font-bold my-3">Butuh Bantuan?</h1>
                <p class="text-black text-md">
                    Tenang, kami siap membantu kapan saja. Jika mengalami kendala atau memiliki pertanyaan selama proses pembuatan undangan digital, silakan hubungi tim kami melalui kontak yang sudah tersedia. Kami akan dengan senang hati membantu Anda agar proses pembuatan undangan berjalan lebih mudah dan nyaman.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection