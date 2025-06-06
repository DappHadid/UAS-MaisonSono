@extends('admin.layouts.app')

@section('content')

@push('head')
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
@endpush

<div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 py-10"> 
    <div class="bg-white shadow-lg rounded-xl p-6">
        <h2 class="text-2xl font-semibold text-center text-blue-700 mb-6">📦 Manage Products</h2>

        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded mb-6 flex justify-between items-center">
                <div>{{ session('success') }}</div>
                <button onclick="this.parentElement.remove()" class="hover:text-green-900">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif

        @can('manage_products')
        <div class="mb-6 text-right">
            <a href="{{ route('admin.manage-products.create') }}"
                class="inline-flex items-center px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-full shadow">
                <i class="fas fa-plus mr-2"></i> Add Product
            </a>
        </div>
        @endcan

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-center border border-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Price</th>
                        <th class="px-6 py-3">Stock</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  @forelse($products as $product)
                    <tr>
                        <td class="px-6 py-4 text-left">{{ $product->nama_produk }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($product->harga, 2, ',', '.') }}</td>
                        <td class="px-6 py-4">{{ $product->stok }}</td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center space-x-2">
                                <a href="{{ route('admin.manage-products.show', $product ) }}"
                                    class="inline-flex items-center px-2 py-1 text-blue-600 hover:text-white hover:bg-blue-600 border border-blue-600 rounded-md transition">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @can('manage_products')
                                <a href="{{ route('admin.manage-products.edit', $product) }}"
                                    class="inline-flex items-center px-2 py-1 text-yellow-600 hover:text-white hover:bg-yellow-500 border border-yellow-500 rounded-md transition">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.manage-products.destroy', $product) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this product?')" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center px-2 py-1 text-red-600 hover:text-white hover:bg-red-600 border border-red-600 rounded-md transition">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-gray-500 italic">No products found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6 flex justify-center">
            {{-- {{ $products->links() }} --}}
        </div>
    </div>
</div>
@endsection
