<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function view()
    {
        $produk = Product::all();
        return view('product', compact('produk'));
    }

    public function create(Request $request)
    {
        // dd($Request); 
        $data = $request->validate([
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'size' => 'required',
            'harga' => 'required|numeric|min:0',
            'diskon' => 'nullable|numeric|min:0|max:100',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stok' => 'required|integer|min:0'
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('uploads/produk', 'public');
        }

        $newProduct = Product::create($data);

        return redirect()->route('product')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'required',
            'size' => 'required',
            'harga' => 'required|numeric|min:0',
            'diskon' => 'nullable|numeric|min:0|max:100',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stok' => 'required|integer|min:0'
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('uploads/produk', 'public');
        }

        $product->edit($data);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }



    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product')->with('success', 'Produk berhasil dihapus!');
    }

}
