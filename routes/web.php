<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Produk\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::prefix('produk')->group(function () {
        Route::get('/', [ProdukController::class, 'index'])->name('produk.index');
        Route::post('/store', [ProdukController::class, 'store'])->name('produk.store');

        // Gunakan PUT untuk Update dan DELETE untuk Hapus agar sesuai dengan @method di Blade
        Route::put('/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
        Route::delete('/destroy/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    });
});
