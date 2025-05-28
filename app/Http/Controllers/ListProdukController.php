<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ListProdukController extends Controller
{
    public function show()
    {
        $produk = Produk::where('harga', '>', 1000000)
            ->orderBy('created_at', 'desc')
            ->get();

        foreach ($produk as $p) {
            $nama[] = $p->nama;
            $desc[] = $p->deskripsi;
            $harga[] = $p->harga;
            $created[] = $p->created_at;
        }

        return view('list_produk', compact('nama', 'desc', 'harga', 'created'));
    }
}

