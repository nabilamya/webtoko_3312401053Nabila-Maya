<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListProdukController;

Route::get('/listproduk', [ListProdukController::class, 'show']);
