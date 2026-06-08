<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use \App\Models\Pemesanan;

class AdminController extends Controller
{
    public function dashboard() {
        $totalTemplates = Template::count();
        $totalOrders = Pemesanan::count();

        return view('admin.dashboard', compact(
            'totalTemplates',
            'totalOrders',
        ));
    }

    public function templates() {
        $templates = Template::all();
        return view('admin.templates', compact('templates'));
    }

    public function orders() {
        $orders = \App\Models\Pemesanan::with('template')->latest()->get();
        return view('admin.orders', compact('orders'));
    }
}
