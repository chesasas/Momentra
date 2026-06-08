@extends('layouts.app')
@section('title', '| Pembayaran')

@section('content')
<div class="max-w-4xl mx-auto py-20 text-center">

    <h1 class="text-5xl font-bold">
        Pembayaran Berhasil
    </h1>

    <p class="mt-4">
        Undangan berhasil dipublikasikan
    </p>

    <a href="{{ route('invitations.show', $order->slug) }}" class="inline-block mt-8 bg-primary text-white px-8 py-4 rounded-xl">
        Lihat Undangan
    </a>

</div>
@endsection