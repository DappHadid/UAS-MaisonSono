@extends('admin.layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Add New Product</h1>
            <a href="{{ route('admin.manage-products.index') }}" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200 rounded-lg shadow text-sm font-medium transition">
                Back to List
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-xl p-6 lg:p-8">
            <form action="{{ route('admin.manage-products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                {{-- Nama Produk --}}
                <div>
                    <label for="nama_produk" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Product Name</label>
                    <input type="text" name="nama_produk" id="nama_produk" value="{{ old('nama_produk') }}"
                        class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-900 dark:text-gray-200" required>
                    @error('nama_produk') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4"
                        class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-900 dark:text-gray-200">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Harga & Stok (dibuat bersebelahan agar rapi) --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="harga" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Price (Rp)</label>
                        <input type="number" name="harga" id="harga" value="{{ old('harga') }}"
                            class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-900 dark:text-gray-200" required>
                        @error('harga') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="stok" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Stock</label>
                        <input type="number" name="stok" id="stok" value="{{ old('stok') }}"
                            class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-900 dark:text-gray-200" required>
                        @error('stok') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Ukuran & Diskon (dibuat bersebelahan agar rapi) --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="size" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Size</label>
                        <input type="text" name="size" id="size" value="{{ old('size') }}"
                            class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-900 dark:text-gray-200">
                        @error('size') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    {{-- ✅ FIELD DISKON DITAMBAHKAN --}}
                    <div>
                        <label for="diskon" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Discount (%)</label>
                        <input type="number" name="diskon" id="diskon" value="{{ old('diskon', 0) }}" min="0" max="100"
                            class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-900 dark:text-gray-200">
                        @error('diskon') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Gambar Produk --}}
                <div>
                    <label for="gambar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Product Image</label>
                    <input type="file" name="gambar" id="gambar"
                        class="mt-1 block w-full text-sm text-gray-900 dark:text-gray-200 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 focus:outline-none file:bg-gray-200 dark:file:bg-gray-600 file:text-gray-700 dark:file:text-gray-300 file:border-0 file:py-2 file:px-4 file:mr-4">
                    @error('gambar') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- ✅ TOMBOL CREATE PRODUCT DIPINDAHKAN KE BAWAH --}}
                <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                    <div class="flex justify-end">
                        <button type="submit"
                            class="inline-flex items-center px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg shadow-md transition-transform hover:scale-105">
                            <i class="fas fa-save mr-2"></i> Create Product
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection