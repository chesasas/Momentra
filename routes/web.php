<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::middleware('guest')->group(function () {
    // REGISTER
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    // LOGIN
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

Route::get('/', function () {return view('beranda');});

Route::get('/templates',                [TemplateController::class, 'index'])->name('templates.index');
Route::get('/templates/preview/{slug}', [TemplateController::class, 'preview'])->name('templates.preview');

Route::middleware('auth.message')->group(function() {
    // PER TEMPLATE
    Route::get('/templates/{slug}/edit',    [TemplateController::class, 'edit'])->name('templates.edit');
    Route::post('/templates/{slug}/hasil',  [TemplateController::class, 'hasil'])->name('templates.hasil');
    Route::post('/templates/{slug}/use', [TemplateController::class, 'useTemplate'])->name('templates.use');

    // PEMESANAN
    Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/orders/{order}/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');
    // PEMBAYARAN
    Route::get('/orders/{order}/pembayaran', [OrderController::class, 'pembayaran'])->name('orders.pembayaran');
    Route::get('/order/{order}/success', [OrderController::class, 'success'])->name('orders.success');
});

Route::get('/undangan/{slug}', [OrderController::class, 'show'])->name('invitations.show');

Route::get('/panduan', function () {return view('panduan');});

Route::get('/tentangkami', function () {return view('tentangkami');});

// LOGOUT
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

// ADMIN
Route::get('/admin', [AdminController::class, 'dashboard']);

require __DIR__.'/auth.php';
