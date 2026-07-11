<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

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

    public function edit(Order $order) {
        abort_if($order->user_id != auth()->id(), 403);

        return view('dashboard.edit-order', compact('order'));
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

    public function profil() {
        return view('dashboard.profil');
    }
}
