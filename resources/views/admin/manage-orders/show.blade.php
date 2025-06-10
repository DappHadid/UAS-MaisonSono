@extends('admin.layouts.app')

@section('title', 'Order Details')

@section('content')

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Order Details <span class="font-mono text-xl text-gray-500 dark:text-gray-400">#{{ $pesanan->id }}</span></h1>
        <a href="{{ route('admin.manage-orders.index') }}" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200 rounded-lg shadow text-sm font-medium transition">
            &larr; Back to Order List
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 dark:bg-green-900 border-l-4 border-green-500 text-green-800 dark:text-green-200 px-4 py-3 rounded-lg mb-6 flex justify-between items-center shadow-md" role="alert">
            <div class="flex items-center"><i class="fas fa-check-circle mr-3"></i><span class="font-medium">{{ session('success') }}</span></div>
            <button onclick="this.parentElement.style.display='none'" class="text-green-600 dark:text-green-200 hover:text-green-800 dark:hover:text-green-100"><i class="fas fa-times"></i></button>
        </div>
    @endif
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Kolom Kiri - Detail Produk --}}
        <div class="lg:col-span-2 bg-white dark:bg-gray-800 shadow-xl rounded-xl overflow-hidden">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Items Ordered</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full text-base">
                    <thead class="bg-gray-50 dark:bg-gray-700/50 text-sm text-gray-700 dark:text-gray-300 uppercase">
                        <tr>
                            <th class="px-6 py-3 text-left font-bold">Product</th>
                            <th class="px-6 py-3 text-center font-bold">Quantity</th>
                            <th class="px-6 py-3 text-right font-bold">Unit Price</th>
                            <th class="px-6 py-3 text-right font-bold">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($pesanan->detailPesanans as $detail)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                <td class="px-6 py-4 flex items-center space-x-4">
                                    <img src="{{ asset('storage/' . $detail->produk->gambar) }}" alt="{{ $detail->produk->nama_produk }}" class="w-12 h-12 object-cover rounded-md hidden sm:block">
                                    <span class="font-medium text-gray-900 dark:text-white">{{ $detail->produk->nama_produk ?? 'N/A' }}</span>
                                </td>
                                <td class="px-6 py-4 text-center text-gray-600 dark:text-gray-300">{{ $detail->kuantitas_produk }}</td>
                                <td class="px-6 py-4 text-right text-gray-600 dark:text-gray-300">Rp {{ number_format($detail->harga, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 text-right font-semibold text-gray-800 dark:text-gray-200">Rp {{ number_format($detail->total_harga, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="bg-gray-50 dark:bg-gray-700/50">
                        <tr>
                            <td colspan="3" class="px-6 py-3 text-right text-lg font-bold text-gray-800 dark:text-white">GRAND TOTAL</td>
                            <td class="px-6 py-3 text-right text-lg font-bold text-gray-800 dark:text-white">Rp {{ number_format($pesanan->total_harga_produk, 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        
        {{-- Kolom Kanan - Info & Aksi --}}
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-xl p-6">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-4 mb-4">Customer Info</h2>
                <div class="space-y-2 text-sm">
                    <p class="text-gray-500 dark:text-gray-400"><strong>Name:</strong> <span class="font-medium text-gray-900 dark:text-gray-100">{{ $pesanan->pelanggan->name ?? 'N/A' }}</span></p>
                    <p class="text-gray-500 dark:text-gray-400"><strong>Email:</strong> <span class="font-medium text-gray-900 dark:text-gray-100">{{ $pesanan->pelanggan->email ?? 'N/A' }}</span></p>
                    <p class="text-gray-500 dark:text-gray-400"><strong>Address:</strong> <span class="font-medium text-gray-900 dark:text-gray-100">{{ $pesanan->pelanggan->alamat->alamat_lengkap ?? 'Alamat belum diatur.' }}</span></p>
                </div>
            </div>
             <div class="bg-white dark:bg-gray-800 shadow-xl rounded-xl p-6">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Update Order Status</h2>
                <form action="{{ route('admin.manage-orders.updateStatus', $pesanan->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="flex items-center space-x-2">
                        <select name="status" class="w-full border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                            @php
                                $statuses = ['pending', 'processing', 'shipped', 'completed', 'cancelled'];
                            @endphp
                            @foreach($statuses as $status)
                                <option value="{{ $status }}" {{ $pesanan->status === $status ? 'selected' : '' }}>
                                    {{ ucfirst($status) }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 transition shadow">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection