@extends('layouts.app')

@section('content')
    <x-navbar />

    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 px-5">
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $produk->gambar) }}" class="img-fluid rounded" alt="{{ $produk->nama }}">
                </div>
                <div class="d-flex gap-2">
                    <img src="{{ asset('storage/' . $produk->gambar) }}" width="130" class="img-thumbnail" alt="thumb">
                    <img src="{{ asset('storage/' . $produk->gambar) }}" width="130" class="img-thumbnail" alt="thumb">
                    <img src="{{ asset('storage/' . $produk->gambar) }}" width="130" class="img-thumbnail" alt="thumb">
                </div>
            </div>

            <div class="col-md-6">
                <p class="text-muted">MAISON SONO</p>
                <h2 class="fw-bold">{{ $produk->nama }}</h2>

                <h4 class="fw-bold mb-4 text-success">Rp. {{ number_format($produk->harga, 0, ',', '.') }}</h4>

                <div class="d-flex align-items-center mb-3">
                    <button class="btn btn-outline-secondary me-2">-</button>
                    <span>1</span>
                    <button class="btn btn-outline-secondary ms-2">+</button>
                </div>

                <a href="{{ url('/add_to_cart?id=' . $produk->id . '&name=' . urlencode($produk->nama) . '&price=' . $produk->harga) }}" class="btn btn-dark d-flex align-items-center gap-2 mb-4">
                    <i class="bi bi-cart-plus"></i> Tambah ke Keranjang
                </a>

                <ul class="nav nav-tabs" id="productTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="desc-tab" data-bs-toggle="tab" data-bs-target="#desc"
                            type="button" role="tab">Deskripsi</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review"
                            type="button" role="tab">Ulasan</button>
                    </li>
                </ul>
                <div class="tab-content p-3 border border-top-0" id="productTabContent">
                    <div class="tab-pane fade show active" id="desc" role="tabpanel">
                        <p>{{ $produk->deskripsi }}</p>
                    </div>
                    <div class="tab-pane fade" id="review" role="tabpanel">
                        <p>Belum ada ulasan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-footer />
@endsection