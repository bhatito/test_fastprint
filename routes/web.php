<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Produk\ProdukController as ProdukProdukController;
use App\Http\Controllers\Produk\ProdukController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [ProdukController::class, 'index'])->name('dashboard');

    Route::prefix('produk')->group(function () {
        Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk.store');
        Route::post('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
        Route::post('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    });
});
