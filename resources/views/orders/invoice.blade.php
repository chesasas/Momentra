@extends('layouts.app')
@section('title', '| Pembayaran')

@section('content')
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
        <form action="{{ route('orders.success', $order) }}" method="POST">
            @csrf

            <button type="submit" class="px-8 py-3 rounded-xl bg-primary text-white hover:opacity-90 transition">
                Bayar Sekarang
            </button>
        </form>

        @if ($order->status == 'published')
            <a href="{{ route('invitations.show', $order->slug) }}" class="px-8 py-3 rounded-xl bg-primary text-white hover:opacity-90 transition">
                Lihat Undangan
            </a>
        @endif

    </div>

</div>
@endsection