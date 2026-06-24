<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Rsvp;
use Illuminate\Http\Request;

class RsvpController extends Controller {
    public function store(Request $request, $slug) {
        $order = Order::where(
            'slug',
            $slug
        )->firstOrFail();

        $validated = $request->validate([
            'guest_name' => 'required|max:100',
            'attendance' => 'required',
            'guest_count' => 'nullable|integer|min:1|max:10',
            'message' => 'nullable|max:500',
        ]);

        $validated['order_id'] =
            $order->id;

        Rsvp::create($validated);

        return redirect()
        ->route('invitations.show', $order->slug)
        ->with('rsvp_success', 'Terima kasih atas konfirmasinya...')
        ->withFragment('buku-tamu');
    }
}