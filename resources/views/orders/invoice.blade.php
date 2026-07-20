@extends('layouts.app')
@section('title', '| Pembayaran')

@section('content')
<style>
.payment-option{
    width:100%;
    display:flex;
    gap:18px;
    align-items:center;
    padding:18px;

    border:1px solid #E5E7EB;
    border-radius:16px;

    transition:.25s;
}

.payment-option:hover{
    border-color:#7A5AF8;
    background:#F8F7FF;
}
</style>
<div class="max-w-3xl mx-auto py-20">

    <h1 class="text-3xl font-bold mb-8">
        Invoice Pembayaran
    </h1>

    <div class="bg-white p-8 rounded-xl shadow">

        <img src="{{ asset($order->template->thumbnail) }}" class="rounded-xl mb-6 h-72 object-cover w-full">

        <h2 class="text-2xl font-semibold">
            {{ $order->template->name }}
        </h2>

        <div class="mt-6">
            <div class="flex justify-between">
                <span>Nama</span>
                <span>
                    {{ Auth::user()->name }}
                </span>
            </div>

            <div class="flex justify-between mt-2">
                <span>Email</span>
                <span>
                    {{ Auth::user()->email }}
                </span>
            </div>

            <hr class="my-6">

            <div class="flex justify-between mt-2">
                <span>Template</span>
                <span>
                    {{ $order->template->name }}
                </span>
            </div>

            <div class="flex justify-between mt-2">
                <span>Harga Template</span>
                <span>
                    Rp {{ number_format($order->template->price, 0, ',', '.') }}
                </span>
            </div>
            
            <div class="flex justify-between mt-2">
                <span>Jasa Admin</span>
                <span>
                    Rp -
                </span>
            </div>

            <div class="flex justify-between mt-2">
                <span>Status</span>
                @if($order->status == 'published')
                    <span class="text-success font-bold italic">Undangan Aktif</span>
                @elseif($order->status == 'pending_payment')
                    <span class="text-warning font-bold italic">Menunggu Pembayaran</span>
                @else
                    <span class="text-black font-bold italic">Draft</span>
                @endif
            </div>
            
            <div class="flex justify-between mt-2">
                <span>Masa Aktif</span>
                <span>
                    3 Bulan
                </span>
            </div>
        </div>

        <hr class="my-6">

        <div class="flex justify-between text-xl font-bold">
            <span>Total</span>

            <span>
                Rp {{ number_format($order->template->price, 0, ',', '.') }}
            </span>
        </div>

    </div>

    <div class="mt-8 flex gap-4">

        {{-- Kembali --}}
        <a href="{{ route('orders.edit', $order) }}" class="px-6 py-3 rounded-xl border border-gray-300 hover:bg-gray-100">
            Kembali Edit
        </a>

        {{-- Bayar --}}
        <button onclick="openPaymentModal()" class="px-8 py-3 rounded-xl bg-primary hover:bg-primaryhover text-white transition">
            Bayar Sekarang
        </button>

        @if ($order->status == 'published')
            <a href="{{ route('invitations.show', $order->slug) }}" class="px-8 py-3 rounded-xl bg-primary text-white hover:opacity-90 transition">
                Lihat Undangan
            </a>
        @endif

    </div>

</div>

{{-- Payment Modal --}}
<div id="paymentModal" class="hidden fixed inset-0 bg-black/50 z-[999] flex items-center justify-center p-5">

    <div class="bg-white rounded-3xl w-full max-w-5xl overflow-hidden">

        <div class="p-7 border-b">

            <h2 class="text-2xl font-bold">
                Pilih Metode Pembayaran
            </h2>

            <p class="text-gray-500 mt-2">
                Pilih salah satu metode pembayaran berikut.
            </p>

        </div>

        <div class="grid md:grid-cols-2">

            <!-- LEFT -->
            <div class="border-r p-6 space-y-4 bg-gray-50">

                <button onclick="showTransfer()" class="payment-option">

                    <i class="fa-solid fa-building-columns text-primary text-2xl"></i>

                    <div>

                        <h3 class="font-semibold">
                            Transfer Bank
                        </h3>

                        <p class="text-sm text-gray-500">
                            BCA • Mandiri • BNI • BRI
                        </p>

                    </div>

                </button>

                <button onclick="showQRIS()" class="payment-option">

                    <i class="fa-solid fa-qrcode text-primary text-2xl"></i>

                    <div>

                        <h3 class="font-semibold">
                            QRIS
                        </h3>

                        <p class="text-sm text-gray-500">
                            Scan QRIS
                        </p>

                    </div>

                </button>

                <button onclick="showVA()" class="payment-option">

                    <i class="fa-solid fa-credit-card text-primary text-2xl"></i>

                    <div>

                        <h3 class="font-semibold">
                            BCA Virtual Account
                        </h3>

                        <p class="text-sm text-gray-500">
                            Pembayaran Instan
                        </p>

                    </div>

                </button>

            </div>

            <!-- RIGHT -->
            <div id="paymentContent" class="p-8 items-center">

                <div class="text-center text-gray-400">

                    <i class="fa-solid fa-hand-pointer text-6xl mb-5"></i>

                    <h3 class="text-xl font-semibold">

                        Pilih metode pembayaran

                    </h3>

                    <p class="mt-2">

                        Informasi pembayaran akan muncul di sini.

                    </p>

                </div>

            </div>

        </div>

        <div class="p-7 border-t flex justify-end">

            <button
                onclick="closePaymentModal()"
                class="px-5 py-3 rounded-xl border">

                Tutup

            </button>

        </div>

    </div>

</div>

<script>

    const paymentModal = document.getElementById("paymentModal");
    const paymentContent = document.getElementById("paymentContent");

    function openPaymentModal() {
        paymentModal.classList.remove("hidden");
    }

    function closePaymentModal() {
        paymentModal.classList.add("hidden");
        paymentContent.classList.add("hidden");
    }

    function paymentFooter(title,body){

        paymentContent.innerHTML=`
        <h3 class="font-bold text-xl mb-5">
        ${title}
        </h3>

        ${body}

        <form
        action="{{ route('orders.success',$order) }}"
        method="POST"
        class="mt-7">

        @csrf

        <button
        class="w-full bg-primary text-white py-3 rounded-xl">

        Saya Sudah Bayar

        </button>

        </form>
        `;

    }

    function showTransfer(){

        paymentFooter (
            "Transfer Bank",
            `
            <div class="space-y-3">

            <div class="flex justify-between">

            <span>BCA</span>

            <strong>1234567890</strong>

            </div>

            <div class="flex justify-between">

            <span>Mandiri</span>

            <strong>9876543210</strong>

            </div>

            <div class="flex justify-between">

            <span>BNI</span>

            <strong>888888888</strong>

            </div>

            <div class="flex justify-between">

            <span>BRI</span>

            <strong>777777777</strong>

            </div>

            <hr>

            <div class="flex justify-between text-lg">

            <span>Total</span>

            <strong>

            Rp {{ number_format($order->template->price,0,',','.') }}

            </strong>

            </div>

            </div>
            `
        );

    }

    function showQRIS(){

        paymentFooter(
            "QRIS",
            `
            <div class="text-center">

            <img src="https://api.qrserver.com/v1/create-qr-code/?size=220x220&data=Momentra-{{ $order->id }}" class="mx-auto">

            <p class="mt-5">

            Scan QR ini menggunakan
            aplikasi pembayaran.

            </p>

            <strong class="block mt-3 text-lg">

            Rp {{ number_format($order->template->price,0,',','.') }}

            </strong>

            </div>
        `
        );

    }

    function showVA(){

        paymentFooter(
            "Virtual Account",
            `
            <div class="space-y-4">

            <div>

            <p class="text-gray-500">

            Nomor Virtual Account

            </p>

            <h2 class="font-bold text-3xl">

            7008{{ str_pad($order->id,6,'0',STR_PAD_LEFT) }}

            </h2>

            </div>

            <div class="flex justify-between">

            <span>Total</span>

            <strong>

            Rp {{ number_format($order->template->price,0,',','.') }}

            </strong>

            </div>

            </div>
            `
        );

    }
</script>
@endsection