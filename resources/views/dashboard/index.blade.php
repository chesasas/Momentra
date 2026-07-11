@extends('layouts.dashboard')

@section('content')

    <!-- Greeting -->
    <div id="dashboard" class="mt-4 mb-8 scroll-mt-28">
        <h1 class="text-2xl font-normal">
            Selamat Datang,
            <span class="font-semibold">
                {{ Auth::user()->name }}
            </span>
        </h1>
    </div>

    <!-- Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <!-- Total -->
        <div class="bg-white rounded-xl border-l-4 border-blue-600 shadow-lg py-8 px-4 flex justify-between gap-1 items-center">
            <div>
                <h2 class="text-xs uppercase text-blue-600">
                    Total Undangan
                </h2>
                <p class="text-3xl font-semibold mt-1">
                    {{ $total }}
                </p>
            </div>

            <div class="text-4xl text-gray-400 flex items-center justify-end">
                <i class="fa-solid fa-envelope"></i>
            </div>
        </div>

        <!-- Undangan Aktif -->
        <div class="bg-white rounded-xl border-l-4 border-green-600 shadow-lg py-8 px-4 flex justify-between gap-1 items-center">
            <div>
                <h2 class="text-xs uppercase text-green-600">
                    Undangan Aktif
                </h2>
                <p class="text-3xl font-semibold mt-1">
                    {{ $published }}
                </p>
            </div>

            <div class="text-4xl text-gray-400 flex items-center justify-end">
                <i class="fa-solid fa-earth-asia"></i>
            </div>
        </div>

        <!-- Menunggu Pembayaran -->
        <div class="bg-white rounded-xl border-l-4 border-yellow-500 shadow-lg py-8 px-4 flex justify-between gap-1 items-center">
            <div>
                <h2 class="text-xs uppercase text-yellow-500">
                    Menunggu Pembayaran
                </h2>
                <p class="text-3xl font-semibold mt-1">
                    {{ $pending }}
                </p>
            </div>

            <div class="text-4xl text-gray-400 flex items-center justify-end">
                <i class="fa-solid fa-hand-holding-dollar"></i>
            </div>
        </div>

    </div>

    <div id="undangan" class="items-center justify-between mt-10 mb-4">
        <h1 class="text-3xl">Undangan Saya</h1>
    </div>

    <!-- Content Row -->
    <div class="w-full pb-10">

        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            <div class="px-3 py-2 border-b">
                <h2 class="text-xl font-semibold text-gray-800">
                    Daftar Undangan Saya
                </h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full table-fixed divide-y divide-gray-200">

                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-3 py-4 w-[5%] text-center text-xs font-semibold uppercase tracking-wider">
                                No
                            </th>

                            <th class="px-3 py-4 w-[20%] text-left text-xs font-semibold uppercase tracking-wider">
                                Mempelai
                            </th>

                            <th class="px-3 py-4 w-[9%] text-left text-xs font-semibold uppercase tracking-wider">
                                Tanggal
                            </th>

                            <th class="px-3 py-4 w-[10%] text-left text-xs font-semibold uppercase tracking-wider">
                                Status
                            </th>

                            <th class="px-3 py-4 w-[20%] text-left text-xs font-semibold uppercase tracking-wider">
                                Link Undangan
                            </th>

                            <th class="px-3 py-4 w-[9%] text-center text-xs font-semibold uppercase tracking-wider">
                                Buat Link Undangan
                            </th>

                            <th class="px-3 py-4 w-[12%] text-center text-xs font-semibold uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">
                        @forelse($orders as $order)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-3 py-4 w-[5%] text-center">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-3 py-4 w-[20%]">
                                    <p class="font-semibold">
                                        {{ $order->nama_panggilan_laki }}
                                        &
                                        {{ $order->nama_panggilan_perempuan }}
                                    </p>

                                    <p class="text-xs text-gray-600">
                                        {{ $order->slug }}
                                    </p>
                                </td>

                                <td class="px-3 py-4 w-[9%]">
                                    <p class="text-sm">{{ \Carbon\Carbon::parse($order->tanggal)->translatedFormat('d F Y') }}</p>
                                </td>

                                <td class="px-3 py-4 w-[10%]">
                                    @if($order->status == 'published')
                                        <p class="text-success font-semibold text-xs italic">Undangan Aktif</p>
                                    @elseif($order->status == 'pending_payment')
                                        <p class="text-warning font-semibold text-xs italic">Menunggu Pembayaran</p>
                                    @else
                                        <p class="text-black font-semibold text-xs italic">Draft</p>
                                    @endif
                                </td>

                                <td class="px-3 py-4 w-[20%]">
                                    <a href="/undangan/{{ $order->slug }}?to=Nama%20Undangan" target="_blank" class="truncate max-w-[100%] text-sm block text-blue-600">
                                        https://momentra.com/{{ $order->slug }}?to=Nama%20Undangan
                                    </a>
                                </td>

                                <td class="px-3 py-4 w-[9%]">
                                    <div class="flex justify-center">
                                    @if ($order->status == "published")
                                        {{-- Share --}}
                                        <a href="{{ route('dashboard.share', $order) }}" class="py-2 px-2 gap-1 rounded-lg bg-blue-600 hover:bg-blue-700 text-white flex items-center justify-center transition">
                                            <i class="fa-solid fa-share-nodes"></i>
                                            <p class="text-xs">Buat</p>
                                        </a>
                                    @elseif ($order->status == "pending_payment")
                                        {{-- Bayar --}}
                                        <a href="{{ route('orders.pembayaran', $order->id) }}" class="py-2 px-2 gap-1 rounded-lg bg-primary hover:bg-primaryhover text-white flex items-center justify-center transition">
                                            <i class="fa-solid fa-hand-holding-dollar"></i>
                                            <p class="text-xs font-semibold">Bayar</p>
                                        </a>
                                    @endif
                                    </div>
                                </td>
                                <td class="px-3 py-4 w-[12%]">
                                    <div class="flex justify-center gap-2">
                                        {{-- Edit --}}
                                        <a href="{{ route('dashboard.orders', $order) }}" class="py-2 px-2 gap-1 rounded-lg bg-warning hover:bg-amber-400 text-white flex items-center justify-center transition">
                                            <i class="fa-solid fa-pen"></i>
                                            <p class="text-xs">Edit</p>
                                        </a>
                                        {{-- Delete --}}
                                        <form action="{{ route('dashboard.destroy', $order) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            
                                            <button onclick="return confirm('Yakin ingin menghapus?')" class="py-2 px-2 gap-1 rounded-lg bg-danger hover:bg-red-500 text-white flex items-center justify-center transition">
                                                <i class="fa-solid fa-trash"></i>
                                                <p class="text-xs">Hapus</p>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-8 text-center text-gray-500">
                                    <p class="mb-4">Belum ada data undangan.</p>
                                    <a href="/templates" class="px-3 py-2 rounded-lg text-white font-semibold bg-primary hover:bg-primaryhover">Pesan Undangan Mu Sekarang!</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>

    </div>

@endsection