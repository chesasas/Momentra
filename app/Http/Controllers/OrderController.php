<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Template;
use App\Models\GalleryPhoto;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function edit(Order $order) {
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        return view('orders.edit', compact('order'));
    }

    public function checkout(Request $request, Order $order) {
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        // VALIDASI
        $validated = $request->validate([
            // MEMPELAI
            'nama_panggilan_laki' => 'required|string|max:50',
            'nama_lengkap_laki' => 'required|string|max:100',
            'ayah_laki' => 'required|string|max:100',
            'ibu_laki' => 'required|string|max:100',

            'nama_panggilan_perempuan' => 'required|string|max:50',
            'nama_lengkap_perempuan' => 'required|string|max:100',
            'ayah_perempuan' => 'required|string|max:100',
            'ibu_perempuan' => 'required|string|max:100',

            // ACARA
            'hari' => 'required|string|max:50',
            'tanggal' => 'required|date',

            'jam_mulai' => 'required',
            'jam_selesai' => 'required',

            'location' => 'required|string|max:255',
            'google_maps' => 'required|url',

            // GIFT
            'bank1' => 'required|string|max:50',
            'norek_bank1' => 'required|string|max:50',
            'atasnama_bank1' => 'required|string|max:100',

            'bank2' => 'required|string|max:50',
            'norek_bank2' => 'required|string|max:50',
            'atasnama_bank2' => 'required|string|max:100',

            // FOTO
            'foto_laki' => 'required|image|max:5120',
            'foto_perempuan' => 'required|image|max:5120',

            'foto_cover' => 'nullable|image|max:4096',
            'foto_acara' => 'nullable|image|max:4096',
            'foto_bukutamu' => 'nullable|image|max:4096',
            'foto_gift' => 'nullable|image|max:4096',

            // GALLERY
            'gallery' => 'nullable|array|max:30',
            'gallery.*' => 'nullable|image|max:4096',
        ]);

        // SIMPEN FOTO STATIS
        $fileFields = [
            'foto_laki',
            'foto_perempuan',
            'foto_cover',
            'foto_acara',
            'foto_bukutamu',
            'foto_gift',
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $path = $request
                    ->file($field)
                    ->store('orders', 'public');
                $validated[$field] = $path;
            }
        }

        // UPDATE DATA ORDER
        $order->update($validated);

        $order->status = 'pending_payment';
        $order->save();

        // SIMPEN GALLERY
        if ($request->hasFile('gallery')) {
            $lastSortOrder =
                $order->galleryPhotos()->max('sort_order') ?? 0;

            foreach ($request->file('gallery') as $index => $photo) {

                $path = $photo->store(
                    'gallery',
                    'public'
                );

                GalleryPhoto::create([
                    'order_id' => $order->id,
                    'file_path' => $path,
                    'sort_order' => $lastSortOrder + $index + 1,
                ]);
            }
        }

        return redirect()->route(
            'orders.pembayaran',
            $order
        );
    }

    // PEMBAYARAN
    public function pembayaran(Order $order) {
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        $order->status = 'published';

        $order->slug = Str::slug($order->nama_panggilan_laki . '-' . $order->nama_panggilan_perempuan);
        $order->save();

        return redirect()->route('orders.success', $order);
    }

    // PEMBAYARAN SUKSES
    public function success(Order $order) {
        return view('orders.hasil', compact('order'));
    }

    // HASIL
    public function show($slug) {
        $order = Order::where('slug', $slug)->where('status','published')->firstOrFail();
        $template = Template::findOrFail($order->template_id);
        $guestName = request()->query('to', '');

        return view('templates.' . $template->slug, compact('order', 'template', 'guestName'));
    }

    private function generateInvitationSlug(Order $order) {
        $baseSlug = Str::slug($order->nama_panggilan_laki . '-' . $order->nama_panggilan_perempuan);

        $slug = $baseSlug;
        $counter = 1;

        while (Order::where('slug', $slug)
                    ->where('id', '!=', $order->id)
                    ->exists()) {

            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
