@extends('admin.layouts.app')

@section('content')

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Manage Products</h1>
        @can('manage_products')
            <a href="{{ route('admin.manage-products.create') }}"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg shadow-lg transition-transform hover:scale-105">
                <i class="fas fa-plus mr-2"></i> Add Product
            </a>
        @endcan
    </div>

    @if (session('success'))
        <div class="bg-green-100 dark:bg-green-900 border-l-4 border-green-500 text-green-800 dark:text-green-200 px-4 py-3 rounded-lg mb-6 flex justify-between items-center shadow-md" role="alert">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-3"></i>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
            <button onclick="this.parentElement.style.display='none'" class="text-green-600 dark:text-green-200 hover:text-green-800 dark:hover:text-green-100">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif
    
    @if (session('error'))
        <div class="bg-red-100 dark:bg-red-900 border-l-4 border-red-500 text-red-800 dark:text-red-200 px-4 py-3 rounded-lg mb-6 flex justify-between items-center shadow-md" role="alert">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle mr-3"></i>
                <span class="font-medium">{{ session('error') }}</span>
            </div>
            <button onclick="this.parentElement.style.display='none'" class="text-red-600 dark:text-red-200 hover:text-red-800 dark:hover:text-red-100">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    <div class="bg-white dark:bg-gray-800 shadow-xl rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full text-base">
                <thead class="bg-gray-50 dark:bg-gray-700/50 text-sm text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left font-bold">Product Name</th>
                        <th scope="col" class="px-6 py-3 text-left font-bold">Size</th>
                        <th scope="col" class="px-6 py-3 text-left font-bold">Price</th>
                        <th scope="col" class="px-6 py-3 text-left font-bold">Stock</th>
                        <th scope="col" class="px-6 py-3 font-bold text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr class="border-b dark:border-gray-700 odd:bg-white even:bg-gray-50 dark:odd:bg-gray-800 dark:even:bg-gray-700/50 hover:bg-indigo-50 dark:hover:bg-gray-600 transition-colors duration-200">
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{ $product->nama_produk }}</td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ $product->size }}</td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-300">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ $product->stok }}</td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center items-center space-x-2">
                                    <a href="{{ route('admin.manage-products.show', $product) }}" title="View Details" class="p-2 text-blue-600 hover:bg-blue-100 dark:hover:bg-gray-700 rounded-full"><i class="fas fa-eye fa-fw"></i></a>
                                    @can('manage_products')
                                        <a href="{{ route('admin.manage-products.edit', $product) }}" title="Edit" class="p-2 text-green-600 hover:bg-green-100 dark:hover:bg-gray-700 rounded-full"><i class="fas fa-edit fa-fw"></i></a>
                                        <form action="{{ route('admin.manage-products.destroy', $product) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus produk ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Delete" class="p-2 text-red-600 hover:bg-red-100 dark:hover:bg-gray-700 rounded-full"><i class="fas fa-trash-alt fa-fw"></i></button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-gray-500 dark:text-gray-400 italic">
                                No products found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection