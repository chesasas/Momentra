<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index() {
        $user = auth()->user();

        $total = $user->orders()
            ->where('slug', 'not like', 'draft-%')
            ->count();

        $published = $user->orders()
            ->where('status', 'published')
            ->count();

        $draft = $user->orders()
            ->where('status', 'draft')
            ->where('slug', 'not like', 'draft-%')
            ->count();

        $pending = $user->orders()
            ->where('status', 'pending_payment')
            ->count();

        $recentOrders = $user->orders()
            ->latest()
            ->take(5)
            ->get();

        $orders = auth()->user()
            ->orders()
            ->where('slug', 'not like', 'draft-%')
            ->with('template')
            ->latest()
            ->get();
    
        return view('dashboard.index', compact('total', 'published', 'draft', 'pending', 'recentOrders', 'orders'));
    }

    public function profil() {
        return view('dashboard.profil');
    }

    public function edit(Order $order) {
        abort_if($order->user_id != auth()->id(), 403);

        return view('dashboard.edit-order', compact('order'));
    }

    public function update(Request $request, Order $order) {
        if($order->user_id != auth()->id()){
            abort(403);
        }

        $validated = $request->validate([
            // MEMPELAI
            'nama_panggilan_laki'=>'required|string|max:50',
            'nama_lengkap_laki'=>'required|string|max:100',
            'ayah_laki'=>'required|string|max:100',
            'ibu_laki'=>'required|string|max:100',

            'nama_panggilan_perempuan'=>'required|string|max:50',
            'nama_lengkap_perempuan'=>'required|string|max:100',
            'ayah_perempuan'=>'required|string|max:100',
            'ibu_perempuan'=>'required|string|max:100',

            // ACARA
            'hari'=>'required|string|max:50',
            'tanggal'=>'required|date',

            'jam_mulai'=>'required',
            'jam_selesai'=>'required',

            'location'=>'required|string|max:255',
            'google_maps'=>'required|url',

            // GIFT
            'bank1'=>'required|string|max:50',
            'norek_bank1'=>'required|string|max:50',
            'atasnama_bank1'=>'required|string|max:100',

            'bank2'=>'nullable|string|max:50',
            'norek_bank2'=>'nullable|string|max:50',
            'atasnama_bank2'=>'nullable|string|max:100',

            // FOTO
            'foto_laki'=>'nullable|image|max:20480',
            'foto_perempuan'=>'nullable|image|max:20480',

            'foto_cover'=>'nullable|image|max:20480',
            'foto_acara'=>'nullable|image|max:20480',
            'foto_bukutamu'=>'nullable|image|max:20480',
            'foto_gift'=>'nullable|image|max:20480',

            // GALLERY
            'gallery'=>'nullable|array|max:12',
            'gallery.*'=>'nullable|image|max:5120',

            'existing_gallery'=>'nullable|array'
        ]);

        // Upload foto baru
        $fileFields = [
            'foto_laki',
            'foto_perempuan',

            'foto_cover',
            'foto_acara',
            'foto_bukutamu',
            'foto_gift',
        ];

        foreach($fileFields as $field){
            if($request->hasFile($field)){
                //hapus lama
                if($order->$field){
                    Storage::disk('public')->delete($order->$field);
                }

                //upload baru
                $validated[$field] = $request->file($field)->store('orders','public');
            } else{
                //tetap pakai lama
                $validated[$field] = $order->$field;
            }
        }

        $order->update($validated);

        // UPDATE GALLERY
        $existingGallery = $request->existing_gallery ?? [];
        $deletedPhotos = $order->galleryPhotos()->whereNotIn('id', $existingGallery)->get();

        foreach($deletedPhotos as $photo){
            Storage::disk('public')->delete($photo->file_path);
            $photo->delete();
        }

        if($request->hasFile('gallery')){
            $lastSortOrder = $order->galleryPhotos()->max('sort_order') ?? 0;

            foreach($request->file('gallery') as $index=>$photo){
                $path = $photo->store(
                    'gallery',
                    'public'
                );

                GalleryPhoto::create([
                    'order_id'=>$order->id,
                    'file_path'=>$path,
                    'sort_order'=>$lastSortOrder+$index+1,
                ]);
            }
        }

        return redirect()->route('dashboard.index')->with(
            'success',
            'Data undangan berhasil diperbarui.'
        );
    }

    public function destroy(Order $order) {
        abort_if($order->user_id != auth()->id(), 403);

        $order->delete();

        return redirect()
            ->route('dashboard.index')
            ->with('success', 'Undangan berhasil dihapus.');
    }


    public function share(Order $order) {
        abort_if($order->user_id != auth()->id(), 403);

        return view('dashboard.share-order', compact('order'));
    }
}
