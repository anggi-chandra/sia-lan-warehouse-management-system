<?php

use Illuminate\Support\Facades\Route;

// Landing Page (Public)
Route::get('/', [\App\Http\Controllers\LandingController::class, 'index'])->name('landing');

// Dashboard (Protected)
Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update-password', [\App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('profile.update-password');

    Route::get('/customer/view', function () {
        return redirect()->route('customer.index')->with('error', 'Silakan pilih customer dari daftar untuk melihat detail.');
    });
    Route::resource('customer', \App\Http\Controllers\CustomerController::class);
    Route::get('/bag-gudang/view', function () {
        return redirect()->route('bag-gudang.index')->with('error', 'Silakan pilih bag gudang dari daftar untuk melihat detail.');
    });
    Route::resource('bag-gudang', \App\Http\Controllers\BagGudangController::class);
    Route::resource('gudang', \App\Http\Controllers\GudangController::class);
    Route::resource('persediaan', \App\Http\Controllers\PersediaanController::class);
    Route::get('/pengirim/view', function () {
        return redirect()->route('pengirim.index')->with('error', 'Silakan pilih pengirim dari daftar untuk melihat detail.');
    });
    Route::resource('pengirim', \App\Http\Controllers\PengirimController::class);
    Route::get('/produksi/view', function () {
        return redirect()->route('produksi.index')->with('error', 'Silakan pilih produksi dari daftar untuk melihat detail.');
    });
    Route::resource('produksi', \App\Http\Controllers\ProduksiController::class);
    Route::get('/transaksi/view', function () {
        return redirect()->route('transaksi.index')->with('error', 'Silakan pilih transaksi dari daftar untuk melihat detail.');
    });
    Route::resource('transaksi', \App\Http\Controllers\TransaksiController::class);
    Route::get('/bag-admin/view', function () {
        return redirect()->route('bag-admin.index')->with('error', 'Silakan pilih bag admin dari daftar untuk melihat detail.');
    });
    Route::resource('bag-admin', \App\Http\Controllers\BagAdminController::class);
});
