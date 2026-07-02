@extends('layouts.dashboard')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-white rounded-2xl shadow-lg p-8">

        <h2 class="text-3xl font-semibold mb-2">
            Bagikan Undangan
        </h2>

        <p class="text-gray-500 mb-8">
            Masukkan nama tamu dan nomor WhatsApp untuk membuat link undangan.
        </p>

        <div class="space-y-6">

            <div>

                <label class="block mb-2 font-medium">
                    Nama Undangan
                </label>

                <input
                    type="text"
                    id="guestName"
                    class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary outline-none">

            </div>

            <div>

                <label class="block mb-2 font-medium">
                    Nomor WhatsApp
                </label>

                <input
                    type="text"
                    id="guestPhone"
                    placeholder="628123456789"
                    class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary outline-none">

            </div>

            <button
                onclick="generateLink()"
                class="bg-primary hover:bg-primaryhover text-white px-6 py-3 rounded-xl">

                <i class="fa-solid fa-link mr-2"></i>

                Buat Link

            </button>

        </div>

    </div>

    <div
        id="resultCard"
        class="hidden mt-8 bg-white rounded-2xl shadow-lg p-8">

        <h3 class="text-xl font-semibold mb-5">

            Link Undangan

        </h3>

        <input
            id="generatedLink"
            readonly
            class="w-full border rounded-xl px-4 py-3 bg-gray-50">

        <div class="flex gap-3 mt-6">

            <button
                onclick="copyLink()"
                class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-3 rounded-xl">

                <i class="fa-solid fa-copy mr-2"></i>

                Copy

            </button>

            <a
                id="waButton"
                target="_blank"
                class="bg-green-500 hover:bg-green-600 text-white px-5 py-3 rounded-xl">

                <i class="fa-brands fa-whatsapp mr-2"></i>

                WhatsApp

            </a>

            <a
                id="previewButton"
                target="_blank"
                class="bg-gray-700 hover:bg-black text-white px-5 py-3 rounded-xl">

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

        const invitation =
            "{{ url('undangan',$order->slug) }}" +
            "?to=" +
            encodeURIComponent(guestName);

        document.getElementById('generatedLink').value =
            invitation;

        document.getElementById('previewButton').href =
            invitation;

        const message =
    `Halo ${guestName},

    Saya mengundang Anda untuk menghadiri acara kami.

    Silakan buka undangan berikut:
    ${invitation}`;

        document.getElementById('waButton').href =
            `https://wa.me/${phone}?text=${encodeURIComponent(message)}`;

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