<?php

namespace App\Http\Controllers\Admin;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    /**
     * Menampilkan daftar semua produk.
     */
    public function index()
    {
        // Sesuai permintaan Anda, tidak menggunakan paginate.
        $products = Produk::orderBy('created_at', 'desc')->get();
        return view('admin.manage-products.index', compact('products'));
    }

    /**
     * Menampilkan form untuk membuat produk baru.
     */
    public function create()
    {
        return view('admin.manage-products.create');
    }

    /**
     * Menyimpan produk baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'size' => 'nullable|string|max:50',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'diskon' => 'nullable|numeric|min:0|max:100',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('produk-images', 'public');
            $validated['gambar'] = $path;
        }

        Produk::create($validated);

        return redirect()->route('admin.manage-products.index')->with('success', 'Product created successfully!');
    }

    /**
     * Menampilkan detail satu produk.
     */
    public function show($id) 
    {
        $product = Produk::findOrFail($id);
        return view('admin.manage-products.show', compact('product'));
    }

    /**
     * Menampilkan form untuk mengedit produk.
     */
    public function edit($id) 
    {
        $product = Produk::findOrFail($id);
        return view('admin.manage-products.edit', compact('product'));
    }

    /**
     * Mengupdate produk yang ada di database.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'size' => 'nullable|string|max:50',
            'harga' => 'required|numeric|min:0',
            'diskon' => 'nullable|numeric|min:0|max:100',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
            'stok' => 'required|integer|min:0',
        ]);
        
            DB::beginTransaction();
            try {
                $product = Produk::findOrFail($id);
                if ($request->hasFile('gambar')) {
                    if ($product->gambar) {
                        Storage::disk('public')->delete($product->gambar);
                    }
                    $path = $request->file('gambar')->store('produk-images', 'public');
                    $validated['gambar'] = $path;
                }

                $product->update($validated);

                DB::commit();

                return redirect()->route('admin.manage-products.index')->with('success', 'Produk berhasil diperbarui.');

            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('admin.manage-products.index')->with('error', 'Terjadi error saat update: ' . $e->getMessage());
            }
        }

    /**
     * Menghapus produk dari database.
     */
    public function destroy($id) 
    {
        DB::beginTransaction();
        try {
            $product = Produk::findOrFail($id); 
            if ($product->gambar) {
                Storage::disk('public')->delete($product->gambar);
            }
            $product->delete();
            DB::commit();
            return redirect()->route('admin.manage-products.index')->with('success', 'Produk berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.manage-products.index')->with('error', 'Terjadi error saat menghapus: ' . $e->getMessage());
        }
    }
}