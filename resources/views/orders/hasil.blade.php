@extends('layouts.app')
@section('title', '| Pembayaran Berhasil')

@section('content')

<section class="py-20 bg-gray-50 min-h-screen flex items-center">

    <div class="max-w-3xl mx-auto w-full">

        <div class="bg-white rounded-3xl shadow-xl p-10">

            {{-- Icon --}}
            <div class="flex justify-center">

                <div class="relative">

                    <span class="absolute inset-0 rounded-full bg-green-400 animate-ping opacity-30"></span>

                    <span class="absolute inset-0 rounded-full bg-green-400 animate-ping opacity-20 [animation-delay:1s]"></span>

                    <div class="success-icon relative w-20 h-20 rounded-full bg-green-100 flex items-center justify-center shadow-xl">

                        <i class="fa-solid fa-circle-check text-5xl text-green-500"></i>

                    </div>

                </div>

            </div>

            {{-- Heading --}}
            <div class="text-center mt-8">

                <h1 class="text-4xl font-bold text-gray-800">
                    Pembayaran Berhasil
                </h1>

                <p class="mt-3 text-gray-500 leading-relaxed">
                    Terima kasih telah mempercayai
                    <span class="font-semibold text-primary">
                        Momentra
                    </span>.
                    Undangan digital Anda telah berhasil dipublikasikan dan
                    sudah siap dibagikan kepada keluarga maupun tamu undangan.
                </p>

            </div>

            {{-- Ringkasan --}}
            <div class="mt-10 border rounded-2xl overflow-hidden">

                <div class="grid grid-cols-2">

                    <div class="p-4 bg-gray-50 font-medium">
                        Template
                    </div>

                    <div class="p-4">
                        {{ $order->template->name }}
                    </div>

                    <div class="p-4 bg-gray-50 font-medium">
                        Status
                    </div>

                    <div class="p-4">

                        <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">
                            Aktif
                        </span>

                    </div>

                    <div class="p-4 bg-gray-50 font-medium">
                        Masa Aktif
                    </div>

                    <div class="p-4">
                        3 Bulan
                    </div>

                    <div class="p-4 bg-gray-50 font-medium">
                        Link Undangan
                    </div>

                    <div class="p-4">

                        <div class="flex items-center gap-2">

                            <input id="inviteLink" readonly value="{{ route('invitations.show',$order->slug) }}" class="border rounded-lg px-3 py-2 w-full text-sm bg-gray-50">

                            <button onclick="copyInvitation()" class="w-11 h-11 rounded-lg bg-primary text-white hover:opacity-90">
                                <i class="fa-solid fa-copy"></i>
                            </button>

                        </div>

                    </div>

                </div>

            </div>

            <div class="mt-10 flex flex-col md:flex-row gap-4">

                <a href="{{ route('invitations.show',$order->slug) }}" target="_blank" class="flex-1 py-3 rounded-xl bg-primary text-white font-semibold text-center hover:opacity-90 transition">
                    <i class="fa-solid fa-eye mr-2"></i>
                    Lihat Undangan
                </a>

                <a href="{{ route('dashboard.index') }}" class="flex-1 py-3 rounded-xl border border-gray-300 text-gray-700 font-semibold text-center hover:bg-gray-100 transition">
                    <i class="fa-solid fa-table-columns mr-2"></i>
                    Dashboard
                </a>

            </div>

        </div>

    </div>

</section>

<script>

function copyInvitation(){

    const input = document.getElementById("inviteLink");

    navigator.clipboard.writeText(input.value);

    alert("Link undangan berhasil disalin.");

}

</script>

@endsection