@extends('layouts.app')

@section('content')
    {{-- Navbar (diambil dari x-navbar) --}}
    <x-navbar />

    <div class="container my-5">
        <h1 class="text-center mb-4">Your Shopping Cart</h1>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        {{-- Logika untuk menampilkan item keranjang atau pesan "kosong" --}}
                        @if (empty($cartItems)) {{-- Asumsikan $cartItems adalah array yang dilewatkan dari controller --}}
                            <p class="text-center text-muted py-5">Your cart is empty. Start shopping now!</p>
                            <div class="text-center mb-3">
                                {{-- Link ini bisa disesuaikan ke halaman utama atau halaman produk --}}
                                <a href="{{ url('/') }}" class="btn btn-primary">Continue Shopping</a>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">Product</th>
                                            <th scope="col">Price</th>
                                            <th scope="col" class="text-center">Quantity</th>
                                            <th scope="col" class="text-end">Subtotal</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- Loop melalui item keranjang. Data ini harusnya dari database/session --}}
                                        @foreach ($cartItems as $item)
                                            <tr>
                                                <td class="d-flex align-items-center">
                                                    {{-- Gambar produk --}}
                                                    <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['name'] }}" class="img-fluid rounded me-3" style="width: 70px; height: 70px; object-fit: cover;">
                                                    <div>
                                                        <h6 class="mb-0">{{ $item['name'] }}</h6>
                                                        <small class="text-muted">{{ $item['category'] ?? '' }}</small> {{-- Kategori opsional --}}
                                                    </div>
                                                </td>
                                                <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <button class="btn btn-sm btn-outline-secondary me-2" onclick="updateQuantity({{ $item['id'] }}, -1)">-</button>
                                                        <input type="number" class="form-control form-control-sm text-center" value="{{ $item['quantity'] }}" min="1" style="width: 60px;" readonly>
                                                        <button class="btn btn-sm btn-outline-secondary ms-2" onclick="updateQuantity({{ $item['id'] }}, 1)">+</button>
                                                    </div>
                                                </td>
                                                <td class="text-end">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                                                <td class="text-center">
                                                    <button class="btn btn-danger btn-sm" onclick="removeItem({{ $item['id'] }})">
                                                        <i class="fas fa-trash-alt"></i> {{-- Icon trash dari Font Awesome --}}
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex justify-content-end border-top pt-3 mt-3">
                                <h4 class="fw-bold">Total: Rp <span id="cartTotal">{{ number_format($cartTotal, 0, ',', '.') }}</span></h4>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <a href="{{ url('/') }}" class="btn btn-secondary me-md-2">Continue Shopping</a>
                                <button class="btn btn-primary" onclick="proceedToCheckout()">Proceed to Checkout</button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer (diambil dari x-footer) --}}
    <x-footer />

    {{-- Script untuk logika keranjang (Update Quantity, Remove Item, Checkout) --}}
    <script>
        function updateQuantity(itemId, change) {
            // Ini adalah fungsi dummy. Dalam aplikasi nyata, Anda akan mengirim permintaan AJAX
            // ke server (controller Laravel) untuk memperbarui jumlah item di keranjang.
            // Contoh dengan Fetch API:
            // fetch('/cart/update', {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json',
            //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Penting untuk Laravel
            //     },
            //     body: JSON.stringify({
            //         id: itemId,
            //         change: change
            //     })
            // })
            // .then(response => response.json())
            // .then(data => {
            //     if (data.success) {
            //         alert(data.message);
            //         location.reload(); // Muat ulang halaman setelah berhasil
            //     } else {
            //         alert('Error: ' + data.message);
            //     }
            // })
            // .catch(error => console.error('Error:', error));

            alert('Mengupdate kuantitas item ID: ' + itemId + ', perubahan: ' + change + '. (Ini adalah simulasi, perlu AJAX)');
            location.reload(); // Untuk demonstrasi, muat ulang halaman. Ganti ini dengan update UI dinamis.
        }

        function removeItem(itemId) {
            if (confirm('Are you sure you want to remove this item from your cart?')) {
                // Ini adalah fungsi dummy. Dalam aplikasi nyata, Anda akan mengirim permintaan AJAX
                // ke server untuk menghapus item dari keranjang.
                // fetch('/cart/remove', {
                //     method: 'POST',
                //     headers: {
                //         'Content-Type': 'application/json',
                //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                //     },
                //     body: JSON.stringify({
                //         id: itemId
                //     })
                // })
                // .then(response => response.json())
                // .then(data => {
                //     if (data.success) {
                //         alert(data.message);
                //         location.reload(); // Muat ulang halaman setelah berhasil
                //     } else {
                //         alert('Error: ' + data.message);
                //     }
                // })
                // .catch(error => console.error('Error:', error));

                alert('Menghapus item ID: ' + itemId + '. (Ini adalah simulasi, perlu AJAX)');
                location.reload(); // Untuk demonstrasi, muat ulang halaman.
            }
        }

        function proceedToCheckout() {
            alert('Mengarahkan ke halaman checkout!');
            window.location.href = '/checkout'; // Ganti dengan URL route halaman checkout Anda
        }
    </script>
@endsection