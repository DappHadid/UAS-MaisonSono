@extends('admin.layouts.app')

@section('content')

<div class="max-w-4xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.manage-products.index') }}"
            class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm font-medium rounded-md shadow">
            <i class="fas fa-arrow-left mr-2"></i> 
            Kembali ke Daftar Produk
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-xl overflow-hidden">
        <div class="md:flex">
            {{-- Gambar Produk --}}
            <div class="md:w-1/2 bg-gray-50 p-6 flex justify-center items-center">
                @if($product->gambar)
                    <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama_produk }}" class="max-h-96 w-full object-contain rounded-lg">
                @else
                    <div class="max-h-96 w-full object-contain rounded-lg bg-gray-200 flex items-center justify-center text-gray-400">
                        <span>Tidak ada gambar</span>
                    </div>
                @endif
            </div>

            {{-- Detail Produk --}}
            <div class="md:w-1/2 p-6 md:p-8 space-y-4">
                <h1 class="text-3xl font-bold text-gray-900">{{ $product->nama_produk }}</h1>

                @if($product->deskripsi)
                    <p class="text-gray-600 text-base">{{ $product->deskripsi }}</p>
                @else
                    <p class="text-gray-500 text-base italic">Tidak ada deskripsi.</p>
                @endif

                <div class="border-t border-gray-200 pt-4">
                    <dl class="space-y-2">
                        <div class="flex justify-between">
                            <dt class="text-sm font-medium text-gray-500">Ukuran</dt>
                            <dd class="text-sm text-gray-900">{{ $product->size ?? '-' }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-sm font-medium text-gray-500">Stok Tersedia</dt>
                            <dd class="text-sm text-gray-900">{{ $product->stok }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-sm font-medium text-gray-500">Diskon</dt>
                            <dd class="text-sm {{ $product->diskon > 0 ? 'text-red-600 font-semibold' : 'text-gray-900' }}">{{ $product->diskon ?? 0 }}%</dd>
                        </div>
                        <div class="flex justify-between items-baseline">
                            <dt class="text-sm font-medium text-gray-500">Harga Asli</dt>
                            <dd class="text-sm text-gray-900 {{ $product->diskon > 0 ? 'line-through' : '' }}">
                                Rp {{ number_format($product->harga, 0, ',', '.') }}
                            </dd>
                        </div>
                        @if($product->diskon > 0)
                            @php
                                $hargaSetelahDiskon = $product->harga - ($product->harga * $product->diskon / 100);
                            @endphp
                            <div class="flex justify-between items-baseline">
                                <dt class="text-base font-semibold text-indigo-600">Harga Setelah Diskon</dt>
                                <dd class="text-xl font-bold text-indigo-600">
                                    Rp {{ number_format($hargaSetelahDiskon, 0, ',', '.') }}
                                </dd>
                            </div>
                        @else
                             <div class="flex justify-between items-baseline">
                                <dt class="text-base font-semibold text-indigo-600">Harga</dt>
                                <dd class="text-xl font-bold text-indigo-600">
                                    Rp {{ number_format($product->harga, 0, ',', '.') }}
                                </dd>
                            </div>
                        @endif
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection