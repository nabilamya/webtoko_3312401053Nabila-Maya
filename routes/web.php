<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListProdukController;

Route::get('/listproduk', [ListProdukController::class, 'show']);
Route::post('/listproduk', [ListProdukController::class, 'simpan'])->name('produk.simpan');
Route::delete('/listproduk/{id}', [ListProdukController::class, 'delete'])->name('produk.delete');
Route::get('/listproduk/{id}/edit', [ListProdukController::class, 'updateForm'])->name('produk.updateform');
Route::post('/listproduk/{id}/update', [ListProdukController::class, 'update'])->name('produk.update');

