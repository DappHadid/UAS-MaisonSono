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
                    <img src="{{ asset('storage/' . $produk->gambar) }}" width="130" class="img-thumbnail"
                        alt="thumb">
                    <img src="{{ asset('storage/' . $produk->gambar) }}" width="130" class="img-thumbnail"
                        alt="thumb">
                </div>
            </div>

            <div class="col-md-6">
                <p class="text-muted">MAISON SONO</p>
                <h2 class="fw-bold">{{ $produk->nama }}</h2>

                <h4 class="fw-bold mb-4 text-success">Rp. {{ number_format($produk->harga, 0, ',', '.') }}</h4>

                <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 30px;">
                    <div
                        style="display: flex; align-items: center; border: 1px solid #ccc; border-radius: 5px; width: fit-content;">
                        <button type="button"
                            onclick="if(this.nextElementSibling.value > 1) this.nextElementSibling.value--"
                            style="background: #f5f5f5; border: none; padding: 8px 12px; cursor: pointer;">-</button>
                        <input id="quantity" type="number" name="quantity" value="1" min="1" readonly
                            style="border: none; text-align: center; width: 50px; padding: 8px;">
                        <button type="button" onclick="this.previousElementSibling.value++"
                            style="background: #f5f5f5; border: none; padding: 8px 15px; cursor: pointer;">+</button>
                    </div>
                    {{-- <a href="{{ url('/add_to_cart?id=' . $produk->id . '&name=' . urlencode($produk->nama) . '&price=' . $produk->harga) }}"
                        class="btn text-white" style="background-color: #1f2f23;">
                        <i class="bi bi-cart-plus" style="padding: 20px;"></i>
                    </a> --}}
                    <a href="javascript:void(0)" onclick="addToKeranjang()" class="btn text-white"
                        style="background-color: #1f2f23;">
                        <i class="bi bi-cart-plus" style="padding: 20px;"></i>
                    </a>

                </div>

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
    <script>
        function addToKeranjang() {
    const qty = document.getElementById('quantity').value;
    console.log("Qty:", qty);
    const url = `{{ route('keranjang.add') }}?id={{ $produk->id }}&name={{ urlencode($produk->nama) }}&price={{ $produk->harga }}&quantity=${qty}`;
    window.location.href = url;
}

    </script>
@endsection
