@extends('admin.layouts.app')

@section('content')
    @push('head')
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    @endpush

    <div class="max-w-4xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <form action="{{ route('admin.manage-products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Edit Product: {{ $product->nama_produk }}</h1>
                <a href="{{ route('admin.manage-products.index') }}" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200 rounded-lg shadow text-sm font-medium transition">
                    Back to List
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-xl p-6 lg:p-8">
                {{-- ✅ PERUBAHAN: Dibuat menjadi satu kolom dengan `space-y-6` --}}
                <div class="space-y-6">
                    {{-- Nama Produk --}}
                    <div>
                        <label for="nama_produk" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Product Name</label>
                        <input type="text" name="nama_produk" id="nama_produk" value="{{ old('nama_produk', $product->nama_produk) }}"
                            class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-900 dark:text-gray-200" required>
                    </div>

                    {{-- Deskripsi --}}
                    <div>
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                        <textarea name="deskripsi" id="deskripsi" rows="5"
                            class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-900 dark:text-gray-200">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                    </div>
                    
                    {{-- Kelompok Harga, Diskon, dan Stok tetap bersebelahan agar rapi --}}
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                        <div>
                            <label for="harga" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Price (Rp)</label>
                            <input type="number" name="harga" id="harga" value="{{ old('harga', $product->harga) }}"
                                class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-900 dark:text-gray-200" required>
                        </div>
                        <div>
                            <label for="diskon" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Discount (%)</label>
                            <input type="number" name="diskon" id="diskon" value="{{ old('diskon', $product->diskon ?? 0) }}" min="0" max="100"
                                class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-900 dark:text-gray-200">
                        </div>
                        <div>
                            <label for="stok" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Stock</label>
                            <input type="number" name="stok" id="stok" value="{{ old('stok', $product->stok) }}"
                                class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-900 dark:text-gray-200" required>
                        </div>
                    </div>

                    {{-- Ukuran --}}
                    <div>
                        <label for="size" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Size</label>
                        <input type="text" name="size" id="size" value="{{ old('size', $product->size) }}"
                            class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-900 dark:text-gray-200">
                    </div>

                    {{-- Bagian Gambar --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Product Image</label>
                        <div class="mt-2 flex items-center space-x-6">
                            @if($product->gambar)
                                <img src="{{ asset('storage/' . $product->gambar) }}" alt="Current Image" class="w-24 h-24 object-cover rounded-lg shadow-md">
                            @endif
                            <div class="flex-1">
                                <input type="file" name="gambar" id="gambar" class="block w-full text-sm text-gray-900 dark:text-gray-200 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 focus:outline-none file:bg-gray-200 dark:file:bg-gray-600 file:text-gray-700 dark:file:text-gray-300 file:border-0 file:py-2 file:px-4 file:mr-4">
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Upload a new file to replace the current image (if exists).</p>
                                @error('gambar') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                        <div class="flex justify-end">
                            <button type="submit"
                                class="inline-flex items-center px-6 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold rounded-lg shadow-md transition-transform hover:scale-105">
                                <i class="fas fa-save mr-2"></i> Update Product
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection