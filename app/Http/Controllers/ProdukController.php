<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $daftarProduk = Produk::latest()->get();
        return view('produk', compact('daftarProduk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
        ]);

        Produk::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
        ]);

        return redirect('/produk');
    }
}