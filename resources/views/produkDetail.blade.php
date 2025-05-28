@extends('layouts.app')

@section('content')
    <x-navbar />

    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 px-5">
                <div class="mb-3">
                    <img src="{{ asset('images/story1.png') }}" class="img-fluid rounded" alt="ISLAND IN THE SUN">
                </div>
                <div class="d-flex gap-2">
                    <img src="{{ asset('images/story1.png') }}" width="130" class="img-thumbnail" alt="thumb">
                    <img src="{{ asset('images/story1.png') }}" width="130" class="img-thumbnail" alt="thumb">
                    <img src="{{ asset('images/story1.png') }}" width="130" class="img-thumbnail" alt="thumb">
                </div>
            </div>

            <div class="col-md-6">
                <p class="text-muted">MAISON SONO</p>
                <h2 class="fw-bold">ISLAND IN THE SUN – Eau De Perfume – Unisex (35 ml)</h2>
                {{-- <div class="d-flex align-items-center mb-2">
                    <del class="text-muted me-2">Rp. 200.000,00</del>
                    <span class="text-danger fw-bold">SALE 25% OFF</span>
                </div> --}}
                <h4 class="fw-bold mb-4 text-success">Rp. 150.000,00</h4>

                <div class="d-flex align-items-center mb-3">
                    <button class="btn btn-outline-secondary me-2">-</button>
                    <span>1</span>
                    <button class="btn btn-outline-secondary ms-2">+</button>
                </div>

                <button class="btn btn-dark d-flex align-items-center gap-2 mb-4">
                    <i class="bi bi-cart-plus"></i> Buy Now
                </button>

                <ul class="nav nav-tabs" id="productTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="desc-tab" data-bs-toggle="tab" data-bs-target="#desc"
                            type="button" role="tab">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review"
                            type="button" role="tab">Reviews</button>
                    </li>
                </ul>
                <div class="tab-content p-3 border border-top-0" id="productTabContent">
                    <div class="tab-pane fade show active" id="desc" role="tabpanel">
                        <p>ISLAND IN THE SUN adalah parfum unisex dengan aroma segar, cocok untuk digunakan sehari-hari maupun acara khusus.</p>
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