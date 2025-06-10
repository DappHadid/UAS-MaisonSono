@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-6">Detail Pesanan #{{ $pesanan->id }}</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4">Informasi Pelanggan</h2>
        <p><strong>Nama:</strong> {{ $pesanan->pelanggan->nama ?? 'N/A' }}</p>
        <p><strong>Email:</strong> {{ $pesanan->pelanggan->email ?? 'N/A' }}</p>
        <p><strong>Alamat:</strong> {{ $pesanan->pelanggan->alamat->alamat ?? 'N/A' }}</p>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4">Detail Produk</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-6 text-left font-semibold text-gray-700">Produk</th>
                        <th class="py-3 px-6 text-left font-semibold text-gray-700">Gambar</th>
                        <th class="py-3 px-6 text-left font-semibold text-gray-700">Kuantitas</th>
                        <th class="py-3 px-6 text-left font-semibold text-gray-700">Harga Satuan</th>
                        <th class="py-3 px-6 text-left font-semibold text-gray-700">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pesanan->detailPesanans as $detail)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-4 px-6">{{ $detail->produk->nama_produk ?? 'N/A' }}</td>
                        <td class="py-4 px-6">
                            @if($detail->produk->gambar)
                                <img src="{{ asset('storage/' . $detail->produk->gambar) }}" alt="{{ $detail->produk->nama_produk }}" class="w-16 h-16 object-cover rounded">
                            @else
                                <span class="text-gray-400 italic">No Image</span>
                            @endif
                        </td>
                        <td class="py-4 px-6">{{ $detail->kuantitas_produk }}</td>
                        <td class="py-4 px-6">Rp {{ number_format($detail->harga, 0, ',', '.') }}</td>
                        <td class="py-4 px-6">Rp {{ number_format($detail->total_harga, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4">Status Pesanan</h2>
        <form action="{{ route('admin.manage-orders.updateStatus', $pesanan->id) }}" method="POST" class="flex items-center space-x-4">
            @csrf
            @method('PATCH')
            <select name="status" class="border border-gray-300 rounded px-6 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                @php
                    $statuses = ['pending', 'processing', 'shipped', 'completed', 'cancelled'];
                @endphp
                @foreach($statuses as $status)
                    <option value="{{ $status }}" {{ $pesanan->status === $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="bg-indigo-600 text-white px-3 py-2 rounded hover:bg-indigo-700 transition">Update Status</button>
        </form>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">Rating & Ulasan</h2>
        @if($pesanan->rating)
            <p><strong>Rating:</strong> {{ $pesanan->rating }} / 5</p>
        @else
            <p class="italic text-gray-500">Belum ada rating.</p>
        @endif

        @if($pesanan->ulasan)
            <p><strong>Ulasan:</strong> {{ $pesanan->ulasan }}</p>
        @else
            <p class="italic text-gray-500">Belum ada ulasan.</p>
        @endif
    </div>

    <div class="mt-6">
        <a href="{{ route('admin.manage-orders.index')}}" class="text-indigo-600 hover:text-indigo-900 font-semibold">&larr; Kembali ke daftar pesanan</a>
    </div>
</div>
@endsection
