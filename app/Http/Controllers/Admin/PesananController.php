<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PesananController extends Controller
{
    // Menampilkan daftar pesanan dengan relasi pelanggan dan detail produk
    public function index()
    {
        $pesanans = Pesanan::with(['pelanggan', 'detailPesanans.produk'])
                    ->orderBy('created_at', 'asc')
                    ->paginate(10);

        return view('admin.manage-orders.index', compact('pesanans'));    }

    // Menampilkan detail pesanan tertentu
    public function show($id)
    {
    // Ambil pesanan beserta data pelanggan dan alamatnya
    $pesanan = Pesanan::with(['pelanggan', 'detailPesanans.produk'])->findOrFail($id);

    // Kirim data ke view
    return view('admin.manage-orders.show', compact('pesanan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,completed,cancelled',
        ]);

        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status = $request->status;
        $pesanan->save();
        return redirect()->route('admin.manage-orders.show', $pesanan->id)->with('success', 'Status pesanan berhasil diperbarui.');

    }
}
