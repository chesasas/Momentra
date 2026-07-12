@extends('layouts.dashboard')

@section('content')

<div class="max-w-4xl mx-auto space-y-8">

    {{-- Heading --}}
    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Bagikan Undangan
        </h1>

        <p class="text-gray-500 mt-2">
            Buat link undangan personal untuk setiap tamu.
        </p>
    </div>

    {{-- Preview Undangan --}}
    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <img
            src="{{ asset('storage/'.$order->foto_cover) }}"
            class="w-full h-72 object-cover object-center">

        <div class="p-6">

            <h2 class="text-3xl font-bold">

                {{ $order->nama_panggilan_laki }}

                <span class="">&</span>

                {{ $order->nama_panggilan_perempuan }}

            </h2>

            <div class="mt-4 flex flex-wrap gap-6 text-gray-600 text-sm">

                <div>
                    <i class="fa-solid fa-calendar-days text-primary mr-2"></i>

                    {{ \Carbon\Carbon::parse($order->tanggal)->translatedFormat('d F Y') }}
                </div>

                <div>
                    <i class="fa-solid fa-location-dot text-primary mr-2"></i>

                    {{ $order->location }}
                </div>

            </div>

        </div>

    </div>

    {{-- Form --}}
    <div class="bg-white rounded-2xl shadow p-6">
        <div class="grid md:grid-cols-2 gap-5">
            <div>
                <label class="font-medium mb-2 block">
                    Nama Tamu
                </label>
                <input id="guestName" type="text" placeholder="Contoh : Bapak Putu" class="w-full rounded-xl border px-4 py-3 focus:ring-2 focus:ring-primary">
            </div>

            <div>
                <label class="font-medium mb-2 block">
                    Nomor WhatsApp
                </label>
                <input id="guestPhone" type="text" placeholder="628123456789" class="w-full rounded-xl border px-4 py-3 focus:ring-2 focus:ring-primary">
            </div>
        </div>

        <button onclick="generateLink()" class="mt-6 bg-primary hover:bg-primaryhover text-white px-8 py-3 rounded-xl">
            <i class="fa-solid fa-link mr-2"></i>
            Generate Link
        </button>
    </div>

    {{-- Result --}}
    <div id="resultCard" class="hidden bg-green-50 border border-green-200 rounded-2xl p-6">
        <div class="flex items-center gap-3">
            <i class="fa-solid fa-circle-check text-2xl text-green-500"></i>
            <h3 class="font-semibold text-lg">
                Link berhasil dibuat
            </h3>
        </div>

        <input id="generatedLink" readonly class="mt-5 w-full bg-white rounded-xl border px-4 py-3">
        <div class="flex flex-wrap gap-3 mt-5">
            <button onclick="copyLink()" class="px-4 py-3 text-sm rounded-lg bg-blue-500 hover:bg-blue-600 text-white">
                <i class="fa-solid fa-copy mr-2"></i>
                Copy
            </button>
            <a id="waButton" target="_blank" class="px-4 py-3 text-sm rounded-lg bg-green-500 hover:bg-green-600 text-white">
                <i class="fa-brands fa-whatsapp mr-2"></i>
                WhatsApp
            </a>

            <a id="previewButton" target="_blank" class="px-4 py-3 text-sm rounded-lg bg-gray-800 hover:bg-gray-900 text-white">
                <i class="fa-solid fa-eye mr-2"></i>
                Preview
            </a>
        </div>
    </div>
</div>

<script>
    function generateLink() {
        const guestName = document.getElementById('guestName').value.trim();
        const phone = document.getElementById('guestPhone').value.trim();

        if (guestName == "") {
            alert("Nama tamu wajib diisi.");
            return;
        }

        const invitation = "{{ url('undangan',$order->slug) }}" + "?to=" + encodeURIComponent(guestName);
        
        document.getElementById('generatedLink').value = invitation;
        document.getElementById('previewButton').href = invitation;

        const message =
            `Halo ${guestName},

            Saya mengundang Anda untuk menghadiri acara kami.

            Silakan buka undangan berikut:
            ${invitation}`;

        document.getElementById('waButton').href = `https://wa.me/${phone}?text=${encodeURIComponent(message)}`;
        document.getElementById('resultCard').classList.remove('hidden');

    }

    function copyLink(){
        navigator.clipboard.writeText(
            document.getElementById('generatedLink').value
        );
        alert("Link berhasil disalin.");
    }
</script>

@endsection