@extends('admin.layouts.app')

@section('title', 'Manage Orders')

@section('content')

    <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Manage Orders</h1>

    @if(session('success'))
        <div class="bg-green-100 dark:bg-green-900 border-l-4 border-green-500 text-green-800 dark:text-green-200 px-4 py-3 rounded-lg mb-6 flex justify-between items-center shadow-md" role="alert">
            <div class="flex items-center"><i class="fas fa-check-circle mr-3"></i><span class="font-medium">{{ session('success') }}</span></div>
            <button onclick="this.parentElement.style.display='none'" class="text-green-600 dark:text-green-200 hover:text-green-800 dark:hover:text-green-100"><i class="fas fa-times"></i></button>
        </div>
    @endif

    <div class="bg-white dark:bg-gray-800 shadow-xl rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full text-base">
                <thead class="bg-gray-50 dark:bg-gray-700/50 text-sm text-gray-700 dark:text-gray-300 uppercase">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-left font-bold">Order ID</th>
                        <th scope="col" class="px-6 py-4 text-left font-bold">Customer</th>
                        <th scope="col" class="px-6 py-4 text-left font-bold">Total</th>
                        <th scope="col" class="px-6 py-4 text-center font-bold">Status</th>
                        <th scope="col" class="px-6 py-4 text-left font-bold">Order Date</th>
                        <th scope="col" class="px-6 py-4 text-center font-bold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($pesanans as $pesanan)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <td class="px-6 py-4 font-mono text-sm text-gray-500 dark:text-gray-400">#{{ $pesanan->id }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $pesanan->pelanggan->name ?? 'N/A' }}</td>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">Rp {{ number_format($pesanan->total_harga_produk, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-center">
                                <span class="px-3 py-1 text-xs font-bold rounded-full capitalize 
                                    @if($pesanan->status == 'pending') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300
                                    @elseif($pesanan->status == 'processing') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300
                                    @elseif($pesanan->status == 'shipped') bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-300
                                    @elseif($pesanan->status == 'completed') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300
                                    @elseif($pesanan->status == 'cancelled') bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300
                                    @else bg-gray-100 text-gray-800 dark:bg-gray-600 dark:text-gray-200 @endif">
                                    {{ $pesanan->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ $pesanan->created_at->format('d M Y, H:i') }}</td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('admin.manage-orders.show', $pesanan->id) }}" title="View Details" class="p-2 text-indigo-600 hover:bg-indigo-100 dark:hover:bg-gray-700 rounded-full">
                                    <i class="fas fa-eye fa-fw"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="px-6 py-10 text-center text-gray-500 italic">No orders found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($pesanans->hasPages())
            <div class="p-4 bg-gray-50 dark:bg-gray-700/50 border-t dark:border-gray-700">
                {{ $pesanans->links() }}
            </div>
        @endif
    </div>
@endsection