<?php

namespace App\Http\Controllers;

use App\Models\DetailPesanan;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Http\Request;

class DetailPesananController extends Controller
{
    public function index()
    {
        $detailPesanans = DetailPesanan::with(['produk', 'pesanan'])->paginate(10);
        return view('manage-orders.index', compact('detailPesanans'));
    }

    public function create()
    {
        $produks = Produk::all();
        $pesanans = Pesanan::all();
        return view('manage-orders.create', compact('produks', 'pesanans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kuantitas_produk' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
            'total_harga' => 'required|numeric|min:0',
            'pesanans_id' => 'required|exists:pesanans,id',
            'produks_id' => 'required|exists:produks,id',
        ]);

        DetailPesanan::create($validated);

        return redirect()->route('manage-orders.index')->with('success', 'Detail pesanan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $detailPesanan = DetailPesanan::with(['produk', 'pesanan'])->findOrFail($id);
        return view('manage-orders.show', compact('detailPesanan'));
    }

    public function edit($id)
    {
        $detailPesanan = DetailPesanan::findOrFail($id);
        $produks = Produk::all();
        $pesanans = Pesanan::all();
        return view('manage-orders.edit', compact('detailPesanan', 'produks', 'pesanans'));
    }

    public function update(Request $request, $id)
    {
        $detailPesanan = DetailPesanan::findOrFail($id);

        $validated = $request->validate([
            'kuantitas_produk' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
            'total_harga' => 'required|numeric|min:0',
            'pesanans_id' => 'required|exists:pesanans,id',
            'produks_id' => 'required|exists:produks,id',
        ]);

        $detailPesanan->update($validated);

        return redirect()->route('manage-orders.show', $detailPesanan->id)->with('success', 'Detail pesanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $detailPesanan = DetailPesanan::findOrFail($id);
        $detailPesanan->delete();

        return redirect()->route('manage-orders.index')->with('success', 'Detail pesanan berhasil dihapus.');
    }
}
