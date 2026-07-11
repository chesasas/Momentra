@extends('layouts.dashboard')

@section('content')

<!-- Greeting -->
<div id="dashboard" class="mt-4 mb-8 scroll-mt-28">
    <h1 class="text-2xl font-normal">
        Halaman Profil 
        <span class="font-semibold">
            {{ Auth::user()->name }}
        </span>
    </h1>
</div>

@endsection