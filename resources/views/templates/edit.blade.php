@extends('layouts.app')
@section('title', '| Edit Templates')

@section('content')

<section class="pt-32 pb-20 px-6">

    <div class="max-w-4xl mx-auto">

        <h1 class="text-4xl font-bold mb-10 text-center">
            Customize Invitation
        </h1>

        <form action="{{ route('templates.hasil', $template->slug) }}" method="POST" enctype="multipart/form-data" class="space-y-6">

            @csrf

            <!-- Groom -->
            <div>
                <label class="block mb-2 font-medium">
                    Nama Mempelai Pria
                </label>

                <input type="text" name="groom_name" class="w-full border rounded-xl px-4 py-3">
            </div>

            <!-- Bride -->
            <div>
                <label class="block mb-2 font-medium">
                    Nama Mempelai Wanita
                </label>

                <input type="text" name="bride_name" class="w-full border rounded-xl px-4 py-3">
            </div>

            <!-- Event -->
            <div>
                <label class="block mb-2 font-medium">
                    Nama Acara
                </label>

                <input type="text" name="event_name" class="w-full border rounded-xl px-4 py-3">
            </div>

            <!-- Date -->
            <div>
                <label class="block mb-2 font-medium">
                    Tanggal Acara
                </label>

                <input type="date" name="event_date" class="w-full border rounded-xl px-4 py-3">
            </div>

            <!-- Location -->
            <div>
                <label class="block mb-2 font-medium">
                    Lokasi Acara
                </label>

                <textarea name="location" class="w-full border rounded-xl px-4 py-3"></textarea>
            </div>

            <!-- Description -->
            <div>
                <label class="block mb-2 font-medium">
                    Deskripsi
                </label>

                <textarea name="description" class="w-full border rounded-xl px-4 py-3"></textarea>
            </div>

            <!-- Cover -->
            <div>
                <label class="block mb-2 font-medium">
                    Foto Cover
                </label>

                <input type="file" name="cover_photo" class="w-full border rounded-xl px-4 py-3">
            </div>

            <button type="submit" class="bg-primary hover:bg-primaryhover text-white px-8 py-4 rounded-2xl transition">
                Preview Undangan
            </button>

        </form>

    </div>

</section>

@endsection