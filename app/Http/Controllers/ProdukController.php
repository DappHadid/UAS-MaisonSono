<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // Ambil semua produk, bisa ditambah pagination jika perlu
        $products = Produk::orderBy('created_at', 'desc')->get();

        // $manageProducts = Produk::orderBy('created_at', 'desc')->get();

        // Kirim data ke view index
        return view('admin.manage-products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.manage-products.create');
    }


    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'nama_produk' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'size' => 'nullable|string|max:50',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
        'harga' => 'required|numeric|min:0',
        'stok' => 'required|integer|min:0',
    ]);

        // Jika ada file gambar, simpan ke storage dan simpan path ke $validated['gambar']
    if ($request->hasFile('gambar')) {
        $path = $request->file('gambar')->store('produk-images', 'public');
        $validated['gambar'] = $path;
    }

    // Simpan data produk baru
    Produk::create($validated);

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('admin.manage-products.index')->with('success', 'Product created successfully!');
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Tampilkan detail produk berdasarkan ID
        $product = Produk::findOrFail($id);

        // Kirim data ke view show
        return view('admin.manage-products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Tampilkan form edit dengan data produk
        $product = Produk::findOrFail($id);
        return view('admin.manage-products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Produk $produk)
{
    // Validasi input
    $validated = $request->validate([
        'nama_produk' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'size' => 'nullable|string|max:50',
        'harga' => 'required|numeric|min:0',
        'diskon' => 'nullable|numeric|min:0|max:100',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
        'stok' => 'required|integer|min:0',
    ]);

    if ($request->hasFile('gambar')) {
        if ($produk->gambar) {
            Storage::disk('public')->delete($produk->gambar);
        }
        $path = $request->file('gambar')->store('produk-images', 'public');
        $validated['gambar'] = $path;
    }

    $produk->update($validated);

    return redirect()->route('admin.manage-products.index')->with('success', 'Produk berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $product)
    {
        // Hapus gambar produk jika ada
        if ($product->gambar) {
            Storage::disk('public')->delete($product->gambar);
        }

        // Hapus produk
        $product->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.manage-products.index')->with('success', 'Produk berhasil dihapus.');
    }
}

