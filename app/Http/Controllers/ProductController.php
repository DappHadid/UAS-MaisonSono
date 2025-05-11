<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function view()
    {
        $produk = Product::all();
        return view('dashboard', ['produk' => $produk]);
    }

    public function create(Request $request)
    {
        // dd($Request); 
        $data = $request->validate([
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $filename = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $path = $request->file('gambar')->storeAs('uploads/produk', $filename, 'public');
            $data['gambar'] = $path;
        }

        $newProduct = Product::create($data);

        return redirect(route('produk.view'));
    }
}
