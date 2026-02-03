<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Produk\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



    Route::prefix('produk')->group(function () {
        Route::get('/', [ProdukController::class, 'index'])->name('produk.index');
        Route::post('/store', [ProdukController::class, 'store'])->name('produk.store');
        Route::put('/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
        Route::delete('/destroy', [ProdukController::class, 'destroy'])->name('produk.destroy');
        Route::post('/produk/fetch', [ProdukController::class, 'fetch'])->name('produk.fetch');
    });
});
