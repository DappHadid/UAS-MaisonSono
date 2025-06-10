@extends('layouts.app')

@section('content')
    <x-navbar />

    <div class="container my-5">
        <h1 class="text-center mb-4">Keranjang Belanja Anda</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @if (empty($cartItems))
                            <p class="text-center text-muted py-5">Keranjang Anda kosong. Mulai belanja sekarang!</p>
                            <div class="text-center mb-3">
                                <a href="{{ route('shop') }}" class="btn btn-primary">Lanjutkan Belanja</a>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">Produk</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col" class="text-center">Kuantitas</th>
                                            <th scope="col" class="text-end">Subtotal</th>
                                            <th scope="col" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems as $item)
                                            <tr>
                                                <td class="d-flex align-items-center">
                                                    <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="img-fluid rounded me-3" style="width: 70px; height: 70px; object-fit: cover;">
                                                    <div>
                                                        <h6 class="mb-0">{{ $item['name'] }}</h6>
                                                        <small class="text-muted">{{ $item['category'] }}</small>
                                                    </div>
                                                </td>
                                                <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                                                <td class="text-center">
                                                    <form action="{{ route('keranjang.update') }}" method="POST" class="d-flex justify-content-center align-items-center">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $item['id'] }}">
                                                        <button type="button" onclick="if(this.nextElementSibling.value > 1) { this.nextElementSibling.value--; this.form.submit(); }" class="btn btn-sm btn-outline-secondary me-2">-</button>
                                                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control form-control-sm text-center" style="width: 60px;" onchange="this.form.submit()">
                                                        <button type="button" onclick="this.previousElementSibling.value++; this.form.submit();" class="btn btn-sm btn-outline-secondary ms-2">+</button>
                                                    </form>
                                                </td>
                                                <td class="text-end">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('keranjang.remove', $item['id']) }}" class="btn btn-danger btn-sm" onclick="return confirm('Hapus item ini dari keranjang?')">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex justify-content-end border-top pt-3 mt-3">
                                <h4 class="fw-bold">Total: Rp {{ number_format($cartTotal, 0, ',', '.') }}</h4>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <a href="{{ route('shop') }}" class="btn btn-secondary me-md-2">Lanjutkan Belanja</a>
                                <button class="btn btn-success" onclick="proceedToCheckout()">Proses Checkout</button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-footer />

    <script>
        function proceedToCheckout() {
            alert('Mengarahkan ke halaman checkout!');
            // window.location.href = '/checkout';
        }
    </script>
@endsection