@extends('admin.layouts.app')

@section('content')


<div class="max-w-3xl mx-auto px-4 py-10">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-blue-700"><i class="fas fa-edit mr-2"></i>Edit Product</h2>
        <a href="{{ route('admin.manage-products.index') }}"
           class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-md shadow">
            <i class="fas fa-arrow-left mr-2"></i> Back
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded mb-4 flex justify-between items-center">
            <div>{{ session('success') }}</div>
            <button onclick="this.parentElement.remove()" class="hover:text-green-900">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    <div class="bg-white shadow rounded-xl p-6">
        <form action="{{ route('admin.manage-products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama_produk" class="block text-sm font-medium text-gray-700">Product Name</label>
                <input type="text" name="nama_produk" id="nama_produk" value="{{ old('nama_produk', $product->nama_produk) }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring focus:ring-blue-200 focus:outline-none">
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="deskripsi" id="deskripsi" rows="4"
                          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring focus:ring-blue-200 focus:outline-none">{{ old('deskripsi', $product->deskripsi) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="size" class="block text-sm font-medium text-gray-700">Size</label>
                <input type="text" name="size" id="size" value="{{ old('size', $product->size) }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring focus:ring-blue-200 focus:outline-none">
            </div>

            <div class="mb-4">
                <label for="harga" class="block text-sm font-medium text-gray-700">Price (Rp)</label>
                <input type="number" name="harga" id="harga" value="{{ old('harga', $product->harga) }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring focus:ring-blue-200 focus:outline-none">
            </div>

            <div class="mb-4">
                <label for="stok" class="block text-sm font-medium text-gray-700">Stock</label>
                <input type="number" name="stok" id="stok" value="{{ old('stok', $product->stok) }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring focus:ring-blue-200 focus:outline-none">
            </div>

            <div class="mb-6">
                <label for="gambar" class="block text-sm font-medium text-gray-700">Product Image</label>
                <input type="file" name="gambar" id="gambar"
                       class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0 file:text-sm file:font-semibold
                            file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                @if($product->gambar)
                    <p class="mt-2 text-sm text-gray-600">Current image:</p>
                    <img src="{{ asset('storage/' . $product->gambar) }}" alt="Product Image" class="w-32 mt-2 rounded shadow">
                @endif
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="inline-flex items-center px-5 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-md shadow">
                    <i class="fas fa-save mr-2"></i> Update Product
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
