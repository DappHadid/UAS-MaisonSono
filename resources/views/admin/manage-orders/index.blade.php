@extends('admin.layouts.app')
@section('title', 'Manage Orders')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-6">Manage Orders</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 px-6 text-left font-semibold text-gray-700">ID Pesanan</th>
                    <th class="py-3 px-6 text-left font-semibold text-gray-700">ID Pelanggan</th>
                    <th class="py-3 px-6 text-left font-semibold text-gray-700">Total Harga</th>
                    <th class="py-3 px-6 text-left font-semibold text-gray-700">Status</th>
                    <th class="py-3 px-6 text-left font-semibold text-gray-700">Tanggal Pesanan</th>
                    <th class="py-3 px-6 text-center font-semibold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pesanans as $pesanan)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-4 px-6">{{ $pesanan->id }}</td>
                    <td class="py-4 px-6">{{ $pesanan->pelanggans_id ?? 'N/A' }}</td>
                    <td class="py-4 px-6">Rp {{ number_format($pesanan->total_harga_produk, 0, ',', '.') }}</td>
                    <td class="py-4 px-6 capitalize">
                        <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold
                            @if($pesanan->status == 'pending') bg-yellow-200 text-yellow-800
                            @elseif($pesanan->status == 'processing') bg-blue-200 text-blue-800
                            @elseif($pesanan->status == 'shipped') bg-indigo-200 text-indigo-800
                            @elseif($pesanan->status == 'completed') bg-green-200 text-green-800
                            @elseif($pesanan->status == 'cancelled') bg-red-200 text-red-800
                            @else bg-gray-200 text-gray-800 @endif">
                            {{ $pesanan->status }}
                        </span>
                    </td>
                    <td class="py-4 px-6">{{ optional($pesanan->tanggal_pesanan)->format('d M Y') }}</td>
                    <td class="py-4 px-6 text-center">
                        <a href="{{ route('admin.manage-orders.show', $pesanan->id) }}" 
                            class="text-indigo-600 hover:text-indigo-900 font-semibold">Detail</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-6 text-gray-500">Tidak ada pesanan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $pesanans->links() }}
    </div>
</div>
@endsection
