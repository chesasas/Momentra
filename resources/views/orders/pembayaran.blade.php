@extends('layouts.app')
@section('title', '| Pembayaran')

@section('content')
<div class="max-w-4xl mx-auto py-20">

    <h1 class="text-4xl font-bold mb-10">
        Pembayaran
    </h1>

    <div class="bg-white rounded-xl p-8">

        <h2 class="text-2xl font-semibold">
            {{ $order->template->name }}
        </h2>

        <p class="mt-4">
            Order #{{ $order->id }}
        </p>

        <p class="mt-2">
            Status:
            {{ $order->status }}
        </p>

        <p class="mt-8 text-3xl font-bold">
            Rp149.000
        </p>

        <form
            action="{{ route('payments.process', $order) }}"
            method="POST"
        >
            @csrf

            <button
                class="mt-8 bg-primary text-white px-8 py-4 rounded-xl">
                Bayar Sekarang
            </button>

        </form>

    </div>

</div>
@endsection