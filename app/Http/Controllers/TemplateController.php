<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\Pemesanan;
use App\Models\Order;
use Illuminate\Support\Str;

class TemplateController extends Controller
{
    // LIST TEMPLATE
    public function index() {
        $templates = Template::where('is_active', true)->get();

        return view('templates.index', compact('templates'));
    }

    // DETAIL TEMPLATE PREVIEW
    public function preview($slug) {
        $template = Template::where('slug', $slug)->firstOrFail();

        // return view('templates.preview', compact('template'));
        return view('templates.preview.' . $slug, compact('template'));
    }

    // DRAFT ORDER
    public function useTemplate($slug) {
        $template = Template::where('slug', $slug)->firstOrFail();

        $order = Order::create([
            'user_id' => auth()->id(),
            'template_id' => $template->id,
            'slug' => 'draft-' . strtoupper(Str::random(6)),
            'status' => 'draft',
        ]);

        return redirect()->route('orders.edit', $order);
    }
}
